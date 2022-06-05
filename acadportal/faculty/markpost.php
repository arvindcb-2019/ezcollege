<html>
	<head>
		<?php
			include "navbar.php";
		?>
	</head>
	<body>
		<center>
		<h3>Upload Marks for Students</h3>
		<?php 
			$username = $_SESSION['username'];
			$res = $con->query("SELECT groupname FROM fac_timetable WHERE username='$username'");
		?>
		<div class="col-md-6">
		
		<form action="markpost" method="post">
			<table border=1>
				<tr id="first">
					<td>Group</td>
					<td><select name="group" style="width: 100%">
					<?php while($grows=$res->fetch_assoc()){ ?>
						<option value="<?php echo $grows['groupname'] ?>"><?php echo $grows['groupname'] ?></option>
					<?php } ?>
					</select>
				</tr>
				<tr id="second">
					<td>Slot</td>
					<td><select name="slot" style="width: 100%">
						<option value="p1">p1</option>
						<option value="p2">p2</option>
						<option value="p3">p3</option>
						<option value="p4">p4</option>
						<option value="p5">p5</option>
						<option value="l1">l1</option>
						<option value="l1">l1</option>
						<option value="l2">l2</option>
						<option value="l3">l3</option>
						<option value="l4">l4</option>
						<option value="l5">l5</option>
					</select>
					</td>
				</tr>
				<tr id="third">
					<td colspan="2"><center><input type="submit" name="submit" class="btn btn-secondary" value="Continue" /></center></td>
				</tr>
			</div>
		</form>
		
		</center>
		<?php if (isset($_POST['submit'])){ 
			$group = $_POST['group'];
			$slot = $_POST['slot'];
			$checkres = $con->query("SELECT * FROM fac_timetable WHERE groupname='$group' AND $slot!='' AND username='$username'");
			if(mysqli_num_rows($checkres)>0){
				$_SESSION['group'] = $group;
				$_SESSION['slot'] = $slot;
		?>
			
			<script>
				document.getElementById("first").style.visibility="hidden";
				document.getElementById("second").style.visibility="hidden";
				document.getElementById("third").style.visibility="hidden";
			</script>
			<form action="markpostprocess" method="post">
		<center>
				<tr>
					<td>Name of the test: </td>
					<td><input type="text" name="test" placeholder="Test name" /></td>
				</tr>
				<tr>
					<td>Maximum marks </td>
					<td><input type="number" name="maxmark" placeholder="Maxmimum Marks" /></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="process" class="btn btn-success" value="Continue" /></center>
				</tr>
		</table>
		</form>
		</center>
		</div>
		<?php
			}
			else{ ?>
				<script>
					swal('Unable to upload marks', 'You do not have any <?php echo $slot ?> slot classes in <?php echo $group ?>, try again by changing the group or slot.', 'error').then(() => {
					  window.location='markpost';
					}); </script>
				</script>
			<?php }	
		} ?>
		
	</body>
</html>