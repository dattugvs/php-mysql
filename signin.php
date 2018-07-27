<?php
session_start();

require_once('config.php');
session_start();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email  = $_POST["faculty_email"];
$pwd 	= $_POST["faculty_pwd"];

$sql = "SELECT * FROM faculty WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    echo $row["password"];
    echo "<br>";
    echo $pwd;
    if($row["password"] == $pwd)
    {
        $_SESSION["user"] = $email;
    	print_r($_SESSION);
    	header('Location: showStudents.php');
	//exit();
    }
    else
    {
	header('Location: auth.php');
	exit();
    }
} 
else
{
	header('Location: auth.php');
	exit();
}
?>
