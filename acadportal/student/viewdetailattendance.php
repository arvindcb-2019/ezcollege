<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
		<?php
			if(isset($_GET['slot'])){
				$slot = $_GET['slot'];
				$user = $_SESSION['username'];
				
				$res = $con->query("SELECT * FROM attendance WHERE slot='$slot' AND stu_id='$user'"); ?>
				<center>
				<div class="col-7">
				<h3>View Detailed Attendance</h3>
				<table class="table" border=1>
					<tr>
						<th>S No</th>
						<th>Slot</th>
						<th>Date of Class</th>
						<th>Status</td>
					</tr>
				<?php
				$i=1;
				while($rows = $res->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $i; $i=$i+1; ?></td>
						<td><center><?php echo strtoupper($rows['slot']) ?></td>
						<td><?php $date = $rows['date'];
						echo date("d-m-y", strtotime($date))." - ".date('l', strtotime($date));?></td>
						<td <?php if($rows['status']=="Absent"){ echo "class='table-danger'"; } else { echo "class='table-success'";} ?> ><?php echo $rows['status'] ?></td>
					<tr>
				<?php }
			} 
		?>
		</div>
		</table>
		<a class="btn btn-info" href="viewattendance">Go back</a>
		</center>
		
	</body>
</html>