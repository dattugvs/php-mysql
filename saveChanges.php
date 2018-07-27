<?php
require_once('config.php');
$ID	= $_POST["ID"];
$name 	= $_POST["edit_student_name"];
$roll 	= $_POST["edit_student_roll"];
$age  	= $_POST["edit_student_age"];
$gender = $_POST["edit_student_gender"];

$sql = "UPDATE students SET Name='$name', Roll='$roll', Age='$age', Gender='$gender' WHERE id=$ID";

if ($conn->query($sql) === TRUE) {
    echo "<script> window.location.href='/showStudents.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 echo '<a href="/showStudents.php">Go to Students List</a>';
?>
