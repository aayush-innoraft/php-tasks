<?php
class Task4
{
    public $phoneno = "";
    public $errors = "";
    public $succed = "";

    public function __construct($phoneno)
    {
        $this->phoneno = trim($phoneno); // Remove spaces
    }

    public function verify()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->phoneno = trim($_POST["pnumber"] ?? "");

            // var_dump($this->phoneno) or die();

            if (!preg_match("/^\+91\d{10}$/", $this->phoneno)) {
                $this->errors = "Phone number is not valid. It should start with +91.";
            } else {
                $this->succed = "Phone number verified successfully!";
            }
        }
    }
}

$phoneno = $_POST["pnumber"] ?? "";
$task4 = new Task4($phoneno);
$task4->verify();
?>