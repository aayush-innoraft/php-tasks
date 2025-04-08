<?php
// require_once 'task7.php';
// Task7::checkAuth(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["first-name"]);
    $lastName = trim($_POST["last-name"]);
    $phoneno = trim($_POST["pnumber"]);
    $email = trim($_POST["email"]);
        $filename = "newfile.txt"; 
        $txt = "Firstname: $firstName\n" .
               "Lastname: $lastName\n" .
               "Phone No: $phoneno\n" .
               "Email: $email\n";
        file_put_contents($filename, $txt);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        readfile($filename);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>
  <link rel="stylesheet" href="../css/task-6.css">
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?q=6";?>" enctype="multipart/form-data">
    <div class="input-group">
      <p>First name:</p>
      <input type="text" name="first-name" id="first_name" maxlength="15">
    </div>
    <div class="input-group">
      <p>Last name:</p>
      <input type="text" name="last-name" id="last-name" maxlength="15">
    </div>
    <div class="input-group">
      <p>Full name:</p>
      <input type="text" name="fullname" id="fullname" readonly>
    </div>
    <div class="phone">
      <p> phone no :</p>
      <input type="tel" name="pnumber" placeholder="+91XXXXXXXXXX" required>
    </div>
    <div class="email">
      <p> email id :</p>
      <input type="text" name="email" required>
    </div>
    <div class="submit">
      <button type="submit" name="signup" id="button">Signup</button>
    </div>
    
    <!-- Your existing message displays -->
    <div style="color: red;">
      <?php echo $task4->errors ?? ""; ?>
    </div>
    <div style="color: green;">
      <?php echo $task4->succed ?? ""; ?>
    </div>
    <!-- More message displays... -->
    
    <div class="ends">
      <input type="file" name="fileToUpload" id="upload">
    </div>
    <div class="user-img">
      <?php
      if (!empty($target_file)) {
        echo "<img src='$target_file' style='max-width:300px; margin-top:10px;' alt='User Image'><br>";
      }
      if (!empty($fullname)) {
        echo htmlspecialchars($fullname);
      }
      ?>
    </div>
  </form>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script>
    $(document).ready(function() {
      $("#first_name, #last-name").on("input", function() {
        var fname = $("#first_name").val();
        var lname = $("#last-name").val();
        $("#fullname").val(fname + " " + lname);
        if (fname.length > 15 || lname.length > 15) {
          exceeds();
          $("#first_name").val("");
          $("#last-name").val("");
          $("#fullname").val("");
        }
      });
      function exceeds() {
        alert("Wrong input! Name should be less than 15 characters.");
      }
    });
  </script>
</body>
</html>