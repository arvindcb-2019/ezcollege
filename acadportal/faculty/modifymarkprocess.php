<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
	<center>
	<h3>Modify Student Marks</h3>
	<table border=1>
	<tr>
		<th>S. No</th>
		<th>Student ID</th>
		<th>Student Name </th>
		<th>Scored Mark </th>
	</tr>
	<form action="modifymarkupload" method="post">
		<?php
			if(isset($_POST['process'])){
				$tname = $_POST['testname'];
				
				$group = $_SESSION['group'];
				$slot = $_SESSION['slot'];
				$_SESSION['testname']=$tname;
				$markres = $con->query("SELECT * FROM marks WHERE slot='$slot' AND groupname='$group' AND testname='$tname'");
				$id=1;
				while($markrow=$markres->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $id ?></td>
						<td><input type="text" name="id[]" value="<?php echo $markrow['id'] ?>" style="border-top-style: hidden;  border-right-style: hidden;  border-left-style:hidden;  border-bottom-style: hidden;" readonly /></td>
						<td>
						<?php
							$uid = $markrow['id'];
							$tres = $con->query("SELECT * FROM student WHERE username='$uid'");
							while($trow = $tres->fetch_assoc()){
								$fname = $trow['firstname'];
								$lname = $trow['lastname'];
							}
						?><input type="text" name="name" value="<?php echo $fname." ".$lname; ?>" style="border-top-style: hidden;  border-right-style: hidden;  border-left-style:hidden;  border-bottom-style: hidden;" readonly /></td>
						<td><input type="number" step=0.5 name="mark[]" max=<?php echo $markrow['totalmark'] ?> value=<?php echo $markrow['mark']?> />
						</td>
					</tr>
				<?php }
			}
			
		?>
		<tr>
			<td colspan="4"><center><input type="submit" name="upload" class="btn btn-success" value="Update Marks" /></center></td>
		</tr>
	</form>
	</table>
	</center>
	</body>
</html>