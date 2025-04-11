<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Initialize message variable
$message = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn'])) {
    // Retrieve user inputs
    $userEmail = $_POST['email'] ?? '';
    $userName = $_POST['name'] ?? '';

    // Validate inputs
    if (!empty($userEmail) && !empty($userName)) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'aayush.pathak@innoraft.com'; // Your Gmail address
            $mail->Password   = 'fnfs xikg ievl jkwa';         // Your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('aayush.pathak@innoraft.com', 'Aayush');
            $mail->addAddress($userEmail, $userName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Thank you for your submission';
            $mail->Body    = "Hello <b>$userName</b>,<br>Thank you for        submitting the form!";

            $mail->send();
            $message = 'Email has been sent successfully!';
        } catch (Exception $e) {
            $message = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $message = 'Please provide both name and email.';
    }
}
// $token = bin2hex(openssl_random_pseudo_bytes(64));
// for genrating random token 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
    <style>
        /* Basic page styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        /* Form container styling */
        form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        /* Input field styling */
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #4a90e2;
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }

        /* Submit button styling */
        input[type="submit"] {
            background-color: #4a90e2;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #3a7bc8;
        }

        /* Placeholder styling */
        ::placeholder {
            color: #aaa;
            opacity: 1;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            form {
                padding: 20px;
            }

            input[type="text"],
            input[type="email"],
            input[type="submit"] {
                padding: 10px 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="submit" name="btn" value="Send Email">
        <?php if (!empty($message)) {
            echo '<p>' . htmlspecialchars($message) . '</p>';
        } ?>
    </form>
</body>
</html>
