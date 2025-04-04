<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handling name input
    if (isset($_POST["first-name"]) && isset($_POST["last-name"])) {
        $firstName = trim($_POST["first-name"]);
        $lastName = trim($_POST["last-name"]);
        if (strlen($firstName) <= 15 && strlen($lastName) <= 15) {
            $fullname = htmlspecialchars($firstName . " " . $lastName);
        } else {
            $error .= "First name and last name must be less than 15 characters.<br>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/task-1.css">
</head>

<body>
    <form action="task-1.php" method="POST" enctype="multipart/form-data">
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