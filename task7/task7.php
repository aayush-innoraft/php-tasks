<?php
session_start();


class Task7
{
    public $username;
    public $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        // Store in session
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
    }

    public static function verify()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // If "logout" was clicked
            if (isset($_POST["logout"])) {
                session_destroy();
                header("Location: ./task7.php");
                exit();
            }

            // If "login" was clicked
            if (isset($_POST["login"])) {
                if (!empty($_SESSION["username"])) {
                    header("Location: http://www.php-1.com");
                    exit();
                } else {
                    header("Location: ./task7.php");
                    exit();
                }
            }
        }
    }
}

// Run only if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $task7 = new Task7($username, $password);
    Task7::verify();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Form</title>
  <link rel="stylesheet" href="../css/task7.css">
</head>
<body>
  <div class="form-container">
    <h2>Login Portal</h2>
    <form method="POST" action="./task7.php">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <div class="btn-group">
        <button type="submit" name="login">Login</button>
        <button type="submit" name="logout">Logout</button>
      </div>
    </form>
  </div>
</body>
</html>
