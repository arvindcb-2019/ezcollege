<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
		<center>
		<h3>Student View Attendance </h3>
		<div class="col-10">
		<table border=1 class="table table-striped">
			<tr>
				<th>S. No</th>
				<th>Subject</th>
				<th>Slot</th>
				<th>Faculty Incharge</th>
				<th>Attended Classes</th>
				<th>Total Classes</th>
				<th>Attendance Percentage</th>
				<th>View Details</th>
			</tr>
			<?php
				$user = $_SESSION['username'];
				$pre = $con->query("SELECT groupid FROM student WHERE username='$user'");
				$group='';
				while($preres = $pre->fetch_assoc()){
					$group=$preres['groupid'];
				}
				//Getting slot name
				$res = $con->query("SELECT DISTINCT(slot) AS slot FROM attendance WHERE stu_id='$user' ORDER BY slot");
				$rows = $res->fetch_all();
				
				$i=1;
				
				//Processing through every slot
				foreach ($rows as $row){ 
				$slot = $row[0]; ?>
				<tr>
				<td><?php echo $i; $i=$i+1; ?></td>
				<?php 
				//Getting Subject name
				$res1 = $con->query("SELECT $slot FROM timetable WHERE groupname='$group'");
				$subname='';
				while($row1 = $res1->fetch_assoc()){
					$subname = $row1[$slot];
				} ?>
				<td><?php echo $subname; ?></td>
				<td><center><?php echo strtoupper($slot); ?></center></td>
				<?php 
				//Getting faculty ID
				$res2 = $con->query("SELECT fac_id FROM attendance WHERE slot='$slot' AND stu_id='$user'");
				$facid='';
				while($row2 = $res2->fetch_assoc()){
					$facid = $row2['fac_id'];
				} ?>
				<td><?php echo $facid."<br>"; ?>
				<?php //Getting faculty name
				$res3 = $con->query("SELECT firstname, lastname FROM faculty WHERE username='$facid'");
				while($row3 = $res3->fetch_assoc()){
					$facname = $row3['firstname']." ".$row3['lastname'];
				} ?>
				<?php echo $facname; ?></td>
				<?php //Getting count of attended classes
				$res4 = $con->query("SELECT COUNT(*) AS present FROM attendance WHERE status='Present' AND slot='$slot' AND stu_id='$user'");
				while($row4 = $res4->fetch_assoc()){
					$present = $row4['present'];
				} ?>
				<td><center><?php echo $present; ?></center></td>
				<?php //Getting count of total classes
				$res5 = $con->query("SELECT COUNT(*) AS total FROM attendance WHERE slot='$slot' AND stu_id='$user'");
				while($row5 = $res5->fetch_assoc()){
					$total = $row5['total'];
				} ?>
				<td><center><?php echo $total; ?></center></td>
				<?php //Calculating Percentage
				$att = ($present/$total)*100; ?>
				<td><center><?php echo number_format($att, 2); ?></center></td>
				<?php
				//Button for Viewing 
				?>
				<td><center><a class="btn btn-success" href="viewdetailattendance?slot=<?php echo $slot; ?>">View Details</a>
</div>
			<?php
			}
			?>
		</table>
		</center>
		</div>
	</body>
</html>