<?php
class Task3
{
  public $marks1;
  public $marks2;
  public $marks3;

  public function __construct($marks1, $marks2, $marks3)
  {
    $this->marks1 = $marks1;
    $this->marks2 = $marks2;
    $this->marks3 = $marks3;
  }

  public static function form()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $marks1 = $_POST["marks1"] ?? "";
      $marks2 = $_POST["marks2"] ?? "";
      $marks3 = $_POST["marks3"] ?? "";

      return new Task3($marks1, $marks2, $marks3);
    }
    return null;
  }
}

$marks = Task3::form();