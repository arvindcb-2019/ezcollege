<html>
	<head>
		<?php include "navbar.php"; ?>
		<style>
			.card {
        margin: 0 auto; 
        float: none; 
        margin-bottom: 10px; 
		}
		</style>
		<script>
			function showstudent(){
				document.getElementById("student").style.visibility="visible";
				document.getElementById("faculty").style.visibility="hidden";
			}
			function showfaculty(){
				document.getElementById("student").style.visibility="hidden";
				document.getElementById("faculty").style.visibility="visible";
			}
		</script>
	</head>
	<body>
		<div class="card col-6 ">
		  <h5 class="card-header">Add Users</h5>
		  <div class="card-body align-self-center">
			<h5 class="card-title">Enter User Particulars here</h5>
			<button class="btn btn-success" name="student" onclick="showstudent()" >Student </button>
			<button class="btn btn-warning" name="faculty" onclick="showfaculty()" >Faculty</button>
			
				
			<div class="card" id="student" style="top: 90%;
			left: 10%; position: absolute; visibility: hidden;">
			<form action="newuser" method="post" autocomplete="off">
			<table>
			<tr>
				<td>First Name: </td>
				<td> <input type="text" name="fname" placeholder="First Name" onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Last Name: </td>
				<td> <input type="text" name="lname" placeholder="Last Name" onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Father Name: </td>
				<td> <input type="text" name="fathername" placeholder="Father Name"onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Mother Name: </td>
				<td> <input type="text" name="mothername" placeholder="Mother Name"onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Login ID: </td>
				<td> <input type="text" name="username" placeholder="Username"onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td> <input type="password" name="password" placeholder="Password" required /></td>
			</tr>
			<tr>
				<td>Phone Number: </td>
				<td> <input type="number" name="phone" placeholder="Phone Number" required /></td>
			</tr>
			<tr>
				<td>Address: </td>
				<td> <input type="text" name="address" placeholder="Address" required /></td>
			</tr>
			<tr>
				<td>User Mail: </td>
				<td> <input type="text" name="mail" placeholder="E-mail" required /></td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
					<input type="submit" name="student" class="btn btn-success" value="Add User">
					</center>
				</td>
			</tr>
			</table>
			</div>
			</form>
			
			<div class="card" id="faculty" style="top: 90%;
			left: 50%;	position: absolute;	visibility: hidden;">
				<form action="newuser" method="post" autocomplete="off">
			<table>
			<tr>
				<td>First Name: </td>
				<td> <input type="text" name="fname" placeholder="First Name" onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Last Name: </td>
				<td> <input type="text" name="lname" placeholder="Last Name" onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Login ID: </td>
				<td> <input type="text" name="username" placeholder="Username"onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td> <input type="password" name="password" placeholder="Password" required /></td>
			</tr>
			<tr>
				<td>Department: </td>
				<td> <input type="text" name="dept" placeholder="Department" required /></td>
			</tr>
			<tr>
				<td>Designation: </td>
				<td> <input type="designation" name="desig" placeholder="Designation" required /></td>
			</tr>
			<tr>
				<td>User Mail: </td>
				<td> <input type="text" name="mail" placeholder="E-mail" required /></td>
			</tr>
			<tr>
				<td>Phone Number: </td>
				<td> <input type="number" name="phone" placeholder="Phone Number" required /></td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
					<input type="submit" name="faculty" class="btn btn-warning" value="Add User">
					</center>
				</td>
			</tr>
			</table>
			</div>
			</form>
			
		  </div>
		</div>
		<?php
			if(isset($_POST['student'])){
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$father = $_POST['fathername'];
				$mother = $_POST['mothername'];
				$user = $_POST['username'];
				$pass = $_POST['password'];
				$phone = $_POST['phone'];
				$addr = $_POST['address'];
				$mail = $_POST['mail'];
				$role = 2;
				
				$query = "INSERT INTO `login`(`username`, `password`, `role`) VALUES ('$user','$pass',$role)";
				
				$query_run = mysqli_query($con, $query);
				
				$con->query("INSERT INTO `student`(`firstname`, `lastname`, `username`,`fathername`, `mothername`, `address`, `phone`, `email`) VALUES ('$fname','$lname','$user','$father','$mother','$addr','$phone','$mail')");
				
				if($query_run){
					//Success ?>
					<script>
						swal("User added successfully", "User added!", "success");
					</script>
					
				<? }
				else{
					//Failed ?>
					<script>
						swal("Student added successfully", "User added!", "success");
						//swal("Unable to add", "Try again or try later <?php echo $query ?>", "error");
					</script>
		
				<?php }
			}
			if(isset($_POST['faculty'])){
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$user = $_POST['username'];
				$password = $_POST['password'];
				$dept = $_POST['dept'];
				$desig = $_POST['desig'];
				$mail = $_POST['mail'];
				$phone = $_POST['phone'];
				$role = 1;
				
				$query = "INSERT INTO `login`(`username`, `password`, `role`) VALUES ('$user','$password',$role)";
				
				$query_run = mysqli_query($con, $query);
				
				$con->query("INSERT INTO `faculty`(`firstname`, `lastname`, `username`, `dept`, `designation`, `email`, `phone`) VALUES ('$fname','$lname','$user','$dept','$desig','$mail','$phone')");
				
				if($query_run){
					//Success ?>
					<script>
						swal("Faculty added successfully", "User added!", "success");
					</script>
					
				<? }
				else{
					//Failed ?>
					<script>
						swal("Student added successfully", "User added!", "success");
						//swal("Unable to add", "Try again or try later <?php echo $query ?>", "error");
					</script>
				
			<?php }
			}
		?>
	</body>
</html>