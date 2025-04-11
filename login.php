<?php
session_start();

// Redirect to main page if already logged in
if (isset($_SESSION["login"]) && $_SESSION["login"]) {
    header('Location: ./index.php');
    exit();
}

$username = '';
$password = '';
$err = "";

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if 'Forget Password?' button was clicked
  

    // Only process login if the login button was specifically clicked
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Database connection
        $conn = mysqli_connect("localhost", "root", "aayush777", "php_1");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute SQL statement
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verify login credentials
        if ($result->num_rows > 0) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;

            // Redirect based on 'q' parameter if set
            if (isset($_GET['q'])) {
                $_SESSION['q'] = $_GET['q'];
                header("Location: task.php?q=" . $_GET['q']);
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $err = "<br><br><p style='color:red;'>Invalid username or password</p>";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./alltasks/css/login.css">
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="login-form">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <input type="submit" name="login" value="Login">
        <?php echo $err; ?>
        <br><br>
        <a href="./register.php"> foregt password ?</a>
    </form>


</body>
</html>