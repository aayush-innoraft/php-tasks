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
          if (isset($_SESSION['q'])) {
            $_GET['q'] = $_SESSION['q'];
            unset($_SESSION['q']);
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