<html>
	<head>
		<?php
			include "navbar.php"
		?>
		
	</head>
	<body>
		<center>
		<?php $user = $_SESSION['username']; ?>
		<form action="attendancepost" method="post">
			Group:<select name="group">
				<?php
					$res = $con->query("SELECT groupname FROM fac_timetable WHERE username='$user'"); 
					while($row = $res->fetch_assoc()){ ?>
						<option value="<?php echo $row['groupname'] ?>"><?php echo $row['groupname'] ?> </option>
					<?php }
				?>
			</select>
			<br>
			Slot: <select name="slot">
				<option value="p1">p1</option>
				<option value="p2">p2</option>
				<option value="p3">p3</option>
				<option value="p4">p4</option>
				<option value="p5">p5</option>
				<option value="l1">l1</option>
				<option value="l2">l2</option>
				<option value="l3">l3</option>
				<option value="l4">l4</option>
				<option value="l5">l5</option>
			</select>
			<br>
			<input type="submit" name="submit" class="btn btn-info" value="Continue" />
			
		</form>
		<?php
			if(isset($_POST['submit'])){
				$group = $_POST['group'];
				$slot = $_POST['slot'];
				$res = $con->query("SELECT * FROM fac_timetable WHERE username='$user' AND $slot != ' ' AND groupname='$group'");
				if(mysqli_num_rows($res)>0){
					$_SESSION['group'] = $group;
					$_SESSION['slot'] = $slot; ?>
					<form action="attendanceprocess" method="post">
						Posting for: <input type="date" id="postdate" name="postingfor" min="2020-10-05" max="<?php echo date('Y-m-d'); ?>" />
						<input type="submit" class="btn btn-success" name='post' />
					</form>
					<table>
						<?php $res2 = $con->query("SELECT DISTINCT(date) as date FROM attendance WHERE fac_id='$user' AND slot = '$slot' AND group_id='$group'");
						echo "<h5>Attendance posted for $slot - $group on</h5><br>";
						while($row2 = $res2->fetch_assoc()){?>
							<tr><td><?php echo date("d-m-y", strtotime($row2['date']))." - ".date('l', strtotime($row2['date'])); ?></td></tr>
						<?php } ?>
					</table>
				<?php }
				else{
					echo "<script> swal('Unable to post attendance', 'You do not have any classes in that slot, try again with correct group and slot.', 'error'); </script>";
				}
			}
		?>
		</center>
		<script type="text/javascript">
    $('.datepicker').datepicker({
        daysOfWeekDisabled: [0,6]
    });
</script>
	</body>
</html>