<?php

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