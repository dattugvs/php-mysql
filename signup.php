<?php
require_once('config.php');
session_start();

$name 	= $_POST["faculty_name"];
$phone 	= $_POST["faculty_phone"];
$email  = $_POST["faculty_email"];
$pwd 	= $_POST["faculty_pwd"];
$class 	= $_POST["faculty_class"];

$sql = "INSERT INTO faculty (Name, Phone, email, class, password)
VALUES ('$name', '$phone', '$email', '$class', '$pwd')";

if ($conn->query($sql) === TRUE) {
    $_SESSION["user"] = $name;
    print_r($_SESSION);
    header('Location: showStudents.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 echo '<br><a href="/auth.php">Go to Home Page</a>';
?>
