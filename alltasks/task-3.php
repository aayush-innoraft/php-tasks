<?php
include("./backend-3.php");
// require_once 'task7.php';
// Task7::checkAuth(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/alltasks/css/task-3.css">
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?q=3";?>" enctype="multipart/form-data">
    <div class="input-group">
      <p>First name:</p>
      <input type="text" name="first-name" id="first_name">
    </div>
    <div class="input-group">
      <p>Last name:</p>
      <input type="text" name="last-name" id="last-name">
    </div>
    <div class="input-group">
      <p>Full name:</p>
      <input type="text" name="fullname" id="fullname" readonly>
    </div>
    <div class="submit">
      <button id="button"> signup</button>
    </div>
  
    <div style="color: red;">
      <?php echo $error_message; ?>
    </div>
    <div style="color: green;">
      <?php echo $success_message; ?>
    </div>
    <br>
    <?php
    echo "fullname  :" .               $fullname;
    ?>
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

 
  
    <div style="color: red;">
      <?php echo $error; ?>
    </div>
    <div style="color: green;">
      <?php echo $success; ?>
    </div>
    <?php
    if (!empty($fullname)) {

    ?>
      <p>Full Name: <?php echo $fullname; ?></p>
    <?php
    }
    ?>
  </form>
  <form action="./task-3.php" method="post" id="form">
    <table>
      <tr>
        <th>Subject</th>
        <th>Marks</th>
      </tr>
      <tr>
        <td>
          english
        </td>
        <td><input type="number" name="marks1" placeholder="Enter Marks" id="val1"></td>
      </tr>
      <tr>
        <td>maths </td>
        <td><input type="number" name="marks2" placeholder="Enter Marks" id="val2"></td>
      </tr>
      <tr>
        <td>
          hindi
        </td>
        <td><input type="number" name="marks3" placeholder="Enter Marks" id="val3"></td>
      </tr>
    </table>
    <button type="submit" id="tablebtn">Submit</button>
    <?php
    if ($marks) {
      echo "English: " . $marks->marks1 . "<br>";
      echo "Maths: " . $marks->marks2 . "<br>";
      echo "Hindi: " . $marks->marks3 . "<br>";
    }
    ?>
  </form>
  <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
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
      $("#button").on("click", function() {
        location.reload();
      });

      function exceeds() {
        alert("Wrong input! Name should be less than 15 characters.");
      }
  
    });
  </script>
</body>
</html>