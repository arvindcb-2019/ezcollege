<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
	<div class="table-responsive-lg">
		<?php
		$user = $_SESSION['username'];
		$res = $con->query("SELECT DISTINCT(slot) FROM marks WHERE id='$user' ORDER BY slot");
		$rows = $res->fetch_all();
		foreach($rows as $row){
		?>
		<center>
		<table border=1 width="80%">
			<colgroup>
				<col width = "75%"></col>
				<col width = "25%"></col>
			</colgroup>
			<?php 
				$slot = $row[0];
				$res1 = $con->query("SELECT groupid FROM student WHERE username='$user'");
				$row1 = $res1->fetch_assoc();
				$group = $row1['groupid'];
				$res2 = $con->query("SELECT $slot FROM timetable WHERE groupname='$group'");
				$row2 = $res2->fetch_assoc();
				$name = $row2[$slot];
				$res4 = $con->query("SELECT facid FROM marks WHERE slot='$slot' AND id='$user' AND slot='$slot'");
				$row4 = $res4->fetch_assoc();
				$fac = $row4['facid'];
				$res5 = $con->query("SELECT firstname, lastname FROM faculty WHERE username='$fac'"); 
				$row5 = $res5->fetch_assoc();
				$facname = $row5['firstname']." ".$row5['lastname'];
		 ?>
				<tr class="table-info">
					<th><?php echo strtoupper($slot)."–".$group."–".$name; ?> </th>
					<th><?php echo $facname ?></th>
				</tr>
				<tr>
					<td colspan="2">
					<center>
					<table border=1 width="75%" class="table table-striped  table-hover">
						<tr>
							<th>S. No</th>
							<th>Test Name</th>
							<th>Scored Mark</th>
							<th>Maximum Mark</th>
						</tr>
					<?php $res3 = $con->query("SELECT * FROM marks WHERE id='$user' AND slot='$slot' ORDER BY totalmark DESC"); 
					$i=1;
					while($row3 = $res3->fetch_assoc()){?>
						<tr>
							<td style="height: 45px"><?php echo $i; $i=$i+1; ?></td>
							<td><?php echo $row3['testname'] ?></td>
							<td><?php echo $row3['mark'] ?></td>
							<td><?php echo $row3['totalmark'] ?></td>
						</tr>
					<?php } ?>
					</table>
					</center>
					</td>
				</tr>
				<br>
		</table>
		</center>
		<?php } ?>
	</div>
	</body>
</html>