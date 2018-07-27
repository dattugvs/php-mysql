<?php
	session_start();
        if (isset($_SESSION["user"]))
        {
   		//echo "Welcome";
        }
	else {
		header('Location: auth.php'); exit(); }
?>
<html>
<head>
<title>Database</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 <style>
    .hide {
	display : none;
    }
</style>
</head>
<body>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Student Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<form method="POST" action="/addStudent.php" id="addForm">
				<div class="form-group">
				    <label for="student_name">Student Name :</label>
				    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter Student Name" required>
				</div>
				<div class="form-group">
				    <label for="student_roll">Student Roll Number :</label>
				    <input type="text" class="form-control" id="student_roll" name="student_roll" placeholder="Enter Student Roll" required>
				</div>
				<div class="form-group">
				    <label for="student_age">Student Age :</label>
				    <input type="number" class="form-control" id="student_age" name="student_age" placeholder="Enter Student Age" required>
				</div>
				<div class="form-group">
				    <label for="student_gender">Student Gender :</label>
				    <div class="radio">
					  <label><input type="radio" name="student_gender" value="male"  checked="checked">Male</label>
					  <label><input type="radio" name="student_gender" value="female">Female</label>
 					  <label><input type="radio" name="student_gender" value="others">Others</label>
				    </div>
				</div>
			</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
	   <button type="submit" class="btn btn-primary" id="submitForm">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<div class="modal fade" id="editFormModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Student Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		<form method="POST" action="/saveChanges.php" id="editForm">
				<div class="form-group">
					<input type="hidden" name="ID" >
				    <label for="edit_student_name">Student Name :</label>
				    <input type="text" class="form-control"                      id="edit_student_name" name="edit_student_name" placeholder="Enter Student Name"   required>
				</div>
				<div class="form-group">
				    <label for="edit_student_roll">Student Roll Number :</label>
				    <input type="text" class="form-control" id="edit_student_roll" name="edit_student_roll" placeholder="Enter Student Roll"  required>
				</div>
				<div class="form-group">
				    <label for="edit_student_age">Student Age :</label>
				    <input type="number" class="form-control" id="edit_student_age" name="edit_student_age" placeholder="Enter Student Age"   required>
				</div>
				<div class="form-group">
				    <label for="edit_student_gender">Student Gender :</label>
				    <div class="radio">
					  <label><input type="radio" id="radio1" name="edit_student_gender" value="male"  checked="checked">Male</label>
					  <label><input type="radio" id="radio2" name="edit_student_gender" value="female">Female</label>
 					  <label><input type="radio" id="radio3" name="edit_student_gender" value="others">Others</label>
				    </div>
				</div>
				
			</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
	   <button type="submit" class="btn btn-primary" id="submitEditForm">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
<?php
	    require_once('config.php');
	    
	    echo '<br><b><center><a href="/signout.php">Sign Out</a></b></center>';
	    echo "<h3>Students Details</h3><hr>";
	    $sql = "SELECT * FROM students";
	    $result = $conn->query($sql);
	    $rowCount=0;
	    $divCount=0;
	    $table = '<table id="tabs" class="table  table-hover table-bordered"><thead><tr>
		<th>Id</th>
		<th>Name</th>
		<th>Roll</th>
		<th>Age</th>
		<th>Gender</th>
		<th></th>
		<th></th>
	    	</tr></thead><tbody>';
	    echo $table;
	    if ($result->num_rows > 0)
	    {
		$rowcount=mysqli_num_rows($result);
		echo "<p id='number'>Total Students : ".$rowcount. "</p><br>";					
		while ($row = $result->fetch_assoc()) 
		{			
						
			$tr =  "<tr id=\"".$row['ID']."\">" ."<td>" . $row['ID'] ."</td>"."<td>" . $row['Name'] . "</td>". "<td>" . $row['Roll'] . "</td>"."<td>" . $row['Age'] . "</td>". "<td>" . $row['Gender'] . "</td>". "<td>" .'<button type="button" id="editBtn'.$row['ID'].'" class="btn btn-default editBtn" data-toggle="modal" data-target="#editFormModal">Edit Student Details</button>'."</td>"."<td>" . "<a href='deleteStudent.php?ID=" .$row['ID']. '\' onclick="return confirm(\'Delete : Are you sure?\')">Delete</a>'."</td>"."</tr>";
			echo $tr;
		}
		echo "</tbody></table></div>";
echo '<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new User</button></center>';
		echo "<br>";
	    }
	    else
		echo "Error: " . $sql . "<br>" . $conn->error;
	?>
	<script>
		var totalRows;
$(document).ready(()=> {   
    $('#tabs').DataTable({
        "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
        "iDisplayLength": 5
    });
});

	$('#submitForm').on('click', function(){
		$('#addForm').submit();
	});
	var sid, sname, sroll, sage, sgend;
	$('.editBtn').on('click', (event)=> {
		let id = '#'+event.target.id;
		sid   =  $(id).parent().parent().children().eq(0).text();
		sname =  $(id).parent().parent().children().eq(1).text();
		sroll =  $(id).parent().parent().children().eq(2).text();
		sage  =  $(id).parent().parent().children().eq(3).text();
		sgend =  $(id).parent().parent().children().eq(4).text();
		console.log(typeof sage);
		$('[name="ID"]').val(sid);
		$('[name="edit_student_name"]').val(sname)
		$('[name="edit_student_roll"]').val(sroll)
		$('[name="edit_student_age"]').val(sage);
		if(sgend == "male")
			$('#radio1').prop('checked',true);
		else if(sgend == "female")
			$('#radio2').prop('checked',true);
		else
			$('#radio3').prop('checked',true);
		console.log($('[name="edit_student_gender"]'));
	});

	$('#submitEditForm').on('click', function(){
		$('#editForm').submit();
	});
</script>
</body>
</html>
