<?php
	include "navbar.php";
	
?>
<html>
	<head>
	
	</head>
	<body>
		<?php
			if(isset($_POST['post'])){
				$group = $_SESSION['group'];
				$slot = $_SESSION['slot'];
				$date = $_POST['postingfor'];
				$user = $_SESSION['username'];
			$q = "SELECT * FROM attendance WHERE date='$date' AND slot='$slot' AND group_id='$group' AND fac_id='$user'";
			$check = $con->query($q);
			if(mysqli_num_rows($check)>0){
				$timestamp = strtotime($date);
			$day = date('w', $timestamp); 
			$_SESSION['date'] = $date;
			
			if(($day=='0')||($day=='6')){
				echo "<script> swal('Unable to post attendance', 'You have chosen weekends, please try again.', 'error').then(() => {
					  window.location='modifyattendancepost';
					}); </script>";
			}
			else{
			if(($slot=='p1')&&($day=='5')){
				echo "<script> swal('Unable to post attendance', 'You do not have any p1 slot classes on Friday, try again by changing the date.', 'error').then(() => {
					  window.location='modifyattendancepost';
					}); </script>";
			}
			else if(($slot=='p2')&&($day=='4')){ 
				echo "<script> swal('Unable to post attendance', 'You do not have any p2 slot classes on Thursday, try again by changing the date.', 'error').then(() => {
					  window.location='modifyattendancepost';
					}); </script>";
			}
			else if(($slot=='p3')&&($day=='3')){
				echo "<script> swal('Unable to post attendance', 'You do not have any p3 slot classes on Wednesday, try again by changing the date.', 'error').then(() => {
					  window.location='modifyattendancepost';
					}); </script>";
			}
			else if(($slot=='p4')&&($day=='2')){
				echo "<script> swal('Unable to post attendance', 'You do not have any p4 slot classes on Tuesday, try again by changing the date.', 'error').then(() => {
					  window.location='modifyattendancepost';
					}); </script>";
			}
			else if(($slot=='p5')&&($day=='1')){
				echo "<script> swal('Unable to post attendance', 'You do not have any p5 slot classes on Monday, try again by changing the date.', 'error').then(() => {
					  window.location='modifyattendancepost';
					}); </script>";
			}
			else{ 
				?>
				<center>
				<div class="alert alert-warning col-10" role="alert">
				  Posting for <strong><?php echo $group; ?></strong> Slot: <strong> <?php echo $slot; ?></strong> Date: <strong> <?php echo date("d-m-Y",strtotime($date)); ?></strong>
				</div>
				<?php
				
					$result = $con->query("SELECT * FROM student WHERE groupid='$group'");				
					?>
				<form action="modifyattendanceupload" method="post">
				<table border=1>
					<colgroup>
					   <col span="1" style="width: 15%;">
					   <col span="1" style="width: 40%;">
					   <col span="1" style="width: 40%;">
					   <col span="1" style="width: 25%;">
					</colgroup>
					<tr>
						<th>ID</th>
						<th>USERID</th>
						<th>NAME</th>
						<th>STATUS</th>
					</tr>
					<?php 
						$id = 1;
						while($row = $result->fetch_assoc()){
						?>
					<tr>
						<td><?php echo $id ?></td>
						<td><input type="text" name="student[]" value="<?php echo $row['username'] ?>" style="width: 100%" readonly="true" /></td>
						<td><input type="text" value="<?php echo $row['firstname']." ".$row['lastname'] ?>" style="width: 100%" disabled /></td>
						<?php
							$un = $row['username'];
							$stat=$con->query("SELECT status FROM attendance WHERE `stu_id`='$un' AND `date`='$date' AND `slot`='$slot' AND `group_id`='$group' AND`fac_id`='$user'"); 
							$srow = $stat->fetch_assoc();
							$checkstat = $srow['status'];
						?>
						<td><center><input type="checkbox" name="status[]" value="Present" <?php if($checkstat=='Present'){ echo "checked='checked'"; } ?> /></center></td>
					</tr>
					<?php
						$id = $id+1;
						}
					?>
					<tr>
						<td colspan="4">
							<center>
							<input type="submit" name="upload" class="btn btn-secondary" value="Upload Attendance" />
							</center>
						</td>
					</tr>
				</table>
				
				</center>
				</form>
			<?php 
			}
			}
			}
			else{
				echo "<script> swal('Unable to modify', 'You have not posted attendance for this day and time, try again by changing the date.. ', 'error').then(() => {
					  window.location='modifyattendancepost';
					}); </script>";
			}
			}
		?>
		
	</body>
</html>