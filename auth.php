<?php
    session_start();
    //print_r($_SESSION);
    if (isset($_SESSION["user"]))
    {
   	header('Location: showStudents.php');
	exit();
    }	
?>
<html>
  <head>
	<title>Web App on Facultys Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style>
	    #space {
	  	padding-right: 10px;
	  	padding-left: 10px;
	}
	</style>
  </head>
<body>
    <center><h1>Faculty Authentication<h1></center><br>
	<div class="container">
		<div class="col-md-12 row">
			<div id="register" > 
				<button type="button" class="btn btn-default">Register</button>
			</div>
			<div class="col-md-6">
				<div id="space"></div>
		    	</div>
			<div id="login" >
    			    <button type="submit" class="btn btn-default">Login</button>
 			</div>
			
		</div>
		<div class="registerFaculty col-md-12">
			<br>
			<form method="POST" action="/signup.php">
				<div class="form-group">
				    <label for="faculty_name">Faculty Name :</label>
				    <input type="text" class="form-control" id="faculty_name" name="faculty_name" placeholder="Enter Faculty Name" required>
				</div>
				<div class="form-group">
				    <label for="faculty_phone">Faculty Phone Number :</label>
				    <input type="number" pattern=".{10,10}" title="5 to 10 characters" class="form-control" id="faculty_phone" name="faculty_phone" placeholder="Enter Faculty Phone Number" required>
				</div>
				<div class="form-group">
				    <label for="faculty_email">Faculty Email :</label>
				    <input type="email" class="form-control" id="faculty_email" name="faculty_email" placeholder="Enter Faculty Email" required>
				</div>
				<div class="form-group">
				    <label for="faculty_pwd">Faculty Password :</label>
				    <input type="password" class="form-control" id="faculty_pwd" name="faculty_pwd" placeholder="Enter Password" required>
				</div>
				<div class="form-group">
				    <label for="faculty_class">Faculty Class :</label>
				    <input type="number" pattern=".{1,2}" title="Invalid" class="form-control" id="faculty_class" name="faculty_class" placeholder="Enter Faculty Class" required>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>		
		</div>
		<div class="loginFaculty col-md-12">
			<br>
			<h3>Faculty Login</h3>
			<form method="POST" action="/signin.php">
				<div class="form-group">
				    <label for="faculty_email">Faculty Email :</label>
				    <input type="email" class="form-control" id="faculty_email" name="faculty_email" placeholder="Enter Faculty Email" required>
				</div>
				<div class="form-group">
				    <label for="faculty_pwd">Faculty Password :</label>
				    <input type="password" class="form-control" id="faculty_pwd" name="faculty_pwd" placeholder="Enter Password" required>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>			
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$(".loginFaculty").hide();
		});
		$("#register").click(function(){
    			$(".registerFaculty").toggle();
			$(".loginFaculty").hide();
		});
		$("#login").click(function(){
    			$(".loginFaculty").toggle();
			$(".registerFaculty").hide();
		});
	</script>
</html>
