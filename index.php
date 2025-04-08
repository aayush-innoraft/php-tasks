<?php
// start of session
session_start();
// check if user is logged in session or not
if (!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
  //  redirect to login.php
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Php Basics</title>

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="./src/index.js"></script>

  <!-- styles -->
  <link rel="stylesheet" href="/alltasks/css/style.css">

</head>

<body>
  <!-- navigation bar to move arround pages -->
  <header>
    <div class="container">
      <nav>
        <ul>
          <li><a href="./index.php?q=1">task 1</a></li>
          <li><a href="./index.php?q=2">task 2</a></li>
          <li><a href="./index.php?q=3">task 3</a></li>
          <li><a href="./index.php?q=4">task 4</a></li>
          <li><a href="./index.php?q=5">task 5</a></li>
          <li><a href="./index.php?q=6">task 6</a></li>
          <li><a href="./logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <!-- main section -->
    <section class="all-tasks">
      <div class="container">
        <div class="all-tasks-wrapper">
          <?php
          // autoloader function to include classes 
          spl_autoload_register(function ($class) {
            include "./classes/" . $class . ".php";
          });

          // refine incomming data
          function datarefine($data)
          {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

          if (!isset($_GET['q'])) {
            $_GET['q'] = 0;
          }

          // different cases to include different tasks
          switch ($_GET['q']) {

            case 1:
              include "./alltasks/task-1.php";
              break;

            case 2:
              include "./alltasks/task-2.php";
              break;

            case 3:
              include "./alltasks/task-3.php";
              break;

            case 4:
              include "./alltasks/task-4.php";
              break;

            case 5:
              include "./alltasks/task-5.php";
              break;

            case 6:
              include "./alltasks/task-6.php";
              break;

            default:
              include "./index.php";
              break;
          }
          ?>
        </div>
      </div>
    </section>
  </main>

</body>

</html>