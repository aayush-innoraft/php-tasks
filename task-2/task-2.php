<?php
include("./backend.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/task-2.css">
</head>
<body>
  <form action="task-2.php" method="POST" enctype="multipart/form-data">
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
      $("#tablebtn").on("click", function() {
        var mark1 = parseFloat($("#val1").val()) || 0;
        var mark2 = parseFloat($("#val2").val()) || 0;
        var mark3 = parseFloat($("#val3").val()) || 0;
        var totalMarks = mark1 + mark2 + mark3;
        var finalmarks = (totalMarks / 300) * 100;
        var fullname = $("#fullname").val();
        alert(" scored " + finalmarks.toFixed(2) + "%");
      });
    });
  </script>
</body>

</html>