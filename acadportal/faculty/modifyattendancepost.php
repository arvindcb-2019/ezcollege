<html>
	<head>
		<?php
			include "navbar.php"
		?>
		
	</head>
	<body>
		<center>
		<h3>Modify Posted Attendance</h3>
		<div class="card col-8">
			<div class="card-body">
				You can modify the attendance only if you have posted attendance for the selected date and slot. If not, you have to post the attendance and only then modify option will be enabled.
			</div>
		</div>
		<?php $user = $_SESSION['username']; ?>
		<form action="modifyattendancepost" method="post">
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
				$res = $con->query("SELECT * FROM fac_timetable WHERE username='$user' AND $slot != ' '");
				if(mysqli_num_rows($res)>0){
					$_SESSION['group'] = $group;
					$_SESSION['slot'] = $slot; ?>
					<form action="modifyattendanceprocess" method="post">
						Posting for: <input type="date" id="postdate" name="postingfor" min="2020-10-05" max="<?php echo date('Y-m-d'); ?>" />
						<input type="submit" class="btn btn-success" name='post' />
					</form>
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