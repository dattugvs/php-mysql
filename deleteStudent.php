<?php
require_once('config.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ID	= $_GET['ID'];

$sql = "DELETE FROM students WHERE id='$ID'";

if ($conn->query($sql) === TRUE) {
    echo "<script> window.location.href='/showStudents.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 echo '<a href="/student_index.html">Go to Home Page</a>';
?>
