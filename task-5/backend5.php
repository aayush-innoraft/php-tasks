
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $api_key = "3bfe1b787bf49b4b427fccb63b39b5ad"; // Replace with your actual API key

    // MailboxLayer API URL
    $api_url = "https://apilayer.net/api/check?access_key=$api_key&email=" . urlencode($email) . "&smtp=1&format=1";

    // Fetch API response
    $response = file_get_contents($api_url);
    $data = json_decode($response, true); // Convert JSON to PHP array

    // Check email validation result
    if ($data && isset($data['format_valid'], $data['smtp_check']) && $data['format_valid'] && $data['smtp_check']) {
        $apisuccess   =  " Email is valid!";
    } else {
        $apifailed = " Email is not valid!";
    }
}
class Task5
{
    public $email ="";
    public $error = "";
    public $done = "";

    public function __construct($email)
    {
        $this->email = trim($email);
    }

    public function emailverify()
    {
        if ($_SERVER["REQUEST_METHOD"]== "POST"){
        
        if (!empty($this->email)) { 

            if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $this->email)) {
                $this->error = "Email is not valid";
            } else {
                $this->done = "Email verified successfully";
            }
        }
    }
}
}

$emails = $_POST["email"] ?? "";


$task5 = new Task5($emails);
$task5->emailverify();

?>

