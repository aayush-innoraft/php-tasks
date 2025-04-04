<?php
session_start();

// Handle logout request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["logout"])) {
        session_unset();
        session_destroy();
        header("Location: http://www.php-1.com/task7/task7.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All tasks</title>
  <link rel="stylesheet" href="./css/style.css" />
</head>
<body>

  <div class="welcome">
    <p>
      <?php
      if (isset($_SESSION["username"])) {
          echo "Welcome " . $_SESSION["username"];
      } else {
          echo "Welcome Guest";
      }
      ?>
    </p>
  </div>

  <div class="container">
    <a href="./task-1/task-1.php">Task 1</a>
    <a href="./task-2/task-2.php">Task 2</a>
    <a href="./task-3/task-3.php">Task 3</a>
    <a href="./task-4/task-4.php">Task 4</a>
    <a href="./task-5/task-5.php">Task 5</a>
    <a href="./task-6/task-6.php">Task 6</a>
    <a href="./task7/task7.php">Task 7</a>
  </div>

  <!-- Logout button inside a form -->
  <form method="POST" style="margin-top: 20px; text-align: center;">
    <button type="submit" name="logout">Logout</button>
  </form>

</body>
</html>
