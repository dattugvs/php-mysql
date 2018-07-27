<?php
require_once('config.php');
session_start();

$name 	= $_POST["student_name"];
$roll 	= $_POST["student_roll"];
$age  	= $_POST["student_age"];
$gender = $_POST["student_gender"];

$sql = "INSERT INTO students (Name, Roll, Age, Gender)
VALUES ('$name', '$roll', '$age', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "<script> window.location.href='/showStudents.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 echo '<a href="/student_index.html">Go to Home Page</a>';
?>
