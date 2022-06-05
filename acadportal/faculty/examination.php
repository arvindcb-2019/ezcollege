<?php 
	include "navbar.php";
?>
<html>
	<head>
		<title>Faculty Examination Dashboard</title>
	</head>
	<body>
		<center>
			<h3>Create Test</h3>
			<table>
				<form action="examination" method="POST" enctype="multipart/form-data">
				<tr>
					<td>Name of the test: </td>
					<td><input type="text" name="testname" style="width:100%" onkeyup="this.value = this.value.toUpperCase()" required></td>
				</tr>
				<tr>
					<td>Test ID: </td>
					<td><input type="text" name="testid" style="width:100%" onkeyup="this.value = this.value.toUpperCase()" required></td>
				</tr>
				<tr>
					<td>Assign to Group: </td>
					<td>
						<select name="group" style="width:100%">
							<?php 
								$un = $_SESSION['username']; 
								$groupquery = "SELECT groupname FROM fac_timetable WHERE username='$un'";
								$groupres = $con->query($groupquery);
								while($grouprow=$groupres->fetch_assoc()){
							?>
							
							<option value="<?php echo $grouprow['groupname'] ?>"><?php echo $grouprow['groupname'] ?></option>
								<?php } ?>
						</select>
					</td>
				</tr>
				<?php 
					$date = date("Y-m-d");
				?>
				<tr>
					<td>Test open date: </td>
					<td><input type="date" name="startdate" min="<?php echo $date ?>" style="width:100%" required></td>
				</tr>
				<tr>
					<td>Test open time: </td>
					<td><input type="time" name="starttime" style="width:100%" required></td>
				</tr>
				<tr>
					<td>Test close date: </td>
					<td><input type="date" name="closedate" min="<?php echo $date ?>" style="width:100%" required></td>
				</tr>
				<tr>
					<td>Test close time: </td>
					<td><input type="time" name="closetime" style="width:100%" required></td>
				</tr>
				<tr>
					<td>Question Paper Upload: </td>
					<td><input type="file" name="fileupload" accept=".pdf" required /></td>
				</tr>
				<tr>
					<td colspan="2">
						<center>
							<input type="submit" class="btn btn-success" value="Create Test" name="submit" />
						</center>
					</td>
				</tr>
				</form>
			</table>
			<?php 
				if(isset($_POST['submit'])){
					$name = $_POST['testname'];
					$id = $_POST['testid'];
					$opendate = $_POST['startdate'];
					$opentime = $_POST['starttime'];
					$closedate = $_POST['closedate'];
					$closetime = $_POST['closetime'];
					$group = $_POST['group'];
					
					mkdir("../examinationfiles/$id");
					//File Handling
					
					
					$directory = "../examinationfiles/$id/";
					
					 # Get file name
					$filename = $_FILES['fileupload']['name'];

					  # Get File size
					$filesize = $_FILES['fileupload']['size'];

					  # Location
					$location = $directory;
					$location .= "QPaper.pdf";
					move_uploaded_file($_FILES['fileupload']['tmp_name'],$location);
					
					$query = "INSERT INTO `examination`(`teacherid`, `testid`, `testname`, `startdate`, `starttime`, `enddate`, `endtime`, `qpaper`, `classgroup`) VALUES ('$un', '$id', '$name', '$opendate', '$opentime', '$closedate', '$closetime', '$location', '$group')";
					
					$result = $con->query($query);
				}
			?>
			<br>
			<h4>Previously Created Tests</h4>
			<table border=1 class="table" style="width: 70%">
				<tr class="bg-dark text-white">
					<th>Test ID</th>
					<th>Test Name</th>
					<th>Class Group</th>
					<th>Test Start Date</th>
					<th>Test Start Time</th>
					<th>Test End Date</th>
					<th>Test End Time</th>
				</tr>
				<?php 
					$testsquery = "SELECT * FROM examination WHERE teacherid='$un'";
					$testresult = $con->query($testsquery);
					while($testrows=$testresult->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $testrows['testid'] ?></td>
							<td><?php echo $testrows['testname'] ?></td>
							<td><?php echo $testrows['classgroup'] ?></td>
							<td><?php echo $testrows['startdate'] ?></td>
							<td><?php echo $testrows['starttime'] ?></td>
							<td><?php echo $testrows['enddate'] ?></td>
							<td><?php echo $testrows['endtime'] ?></td>
						</tr>
					<?php }
				?>
			</table>
		</center>
	</body>
</html>