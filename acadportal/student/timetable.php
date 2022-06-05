<!DOCTYPE HTML>
<html>
	<head>
		<?php
			include "navbar.php";
		?>
	</head>
	<body>
		<center>
		<?php
			$un = $_SESSION['username'];
			$query = "SELECT * FROM timetable a, groups b WHERE a.groupname=b.groupname AND b.id='$un'";
			
			$res=$con->query($query);
			
			while($rows=$res->fetch_assoc()){
		?>
		<div class="col-md-10">
		<br>
		<table border=1 class="table table-hover">
		<tr>
			<th colspan="9" class="bg-danger" style="color: white"><center><strong>TIMETABLE FOR ACADEMIC YEAR 2020-21</strong></center></th>
		</tr>
		<tr class="table-warning">
			<th>DAYS</th>
			<th>9:00 - 9:50</th>
			<th>10:00 - 10:50</th>
			<th>11:00 - 11:50</th>
			<th>12:00 - 12:50</th>
			<th>1:00 - 2:00</th>
			<th colspan="3">2:00 - 4:00</th>
		</tr>
		<!--Monday-->
		<tr>
			<th class="table-warning">MONDAY</th>
			<td <?php if($rows['p1']) echo 'class="table-success"' ?>><?php echo $rows['p1']; ?></td>
			<td <?php if($rows['p2']) echo 'class="table-success"' ?>><?php echo $rows['p2']; ?></td>
			<td <?php if($rows['p3']) echo 'class="table-success"' ?>><?php echo $rows['p3']; ?></td>
			<td <?php if($rows['p1']) echo 'class="table-success"' ?>><?php echo $rows['p1']; ?>(OPT)</td>
			<td class="table-info">L</td>
			<td colspan="3" <?php if($rows['l1']) echo 'class="table-success"' ?>><?php echo $rows['l1']; ?></td>
		</tr>
		<!--Tuesday-->
			<th class="table-warning">TUESDAY</th>
			<td <?php if($rows['p4']) echo 'class="table-success"' ?>><?php echo $rows['p4']; ?></td>
			<td <?php if($rows['p5']) echo 'class="table-success"' ?>><?php echo $rows['p5']; ?></td>
			<td <?php if($rows['p1']) echo 'class="table-success"' ?>><?php echo $rows['p1']; ?></td>
			<td <?php if($rows['p2']) echo 'class="table-success"' ?>><?php echo $rows['p2']; ?>(OPT)</td>
			<td class="table-info">U</td>
			<td colspan="3" <?php if($rows['l2']) echo 'class="table-success"' ?>><?php echo $rows['l2']; ?></td>
		<!--Wednesday-->
		<tr>
			<th class="table-warning">WEDNESDAY</th>
			<td <?php if($rows['p2']) echo 'class="table-success"' ?>><?php echo $rows['p2']; ?></td>
			<td <?php if($rows['p3']) echo 'class="table-success"' ?>><?php echo $rows['p3']; ?></td>
			<td <?php if($rows['p4']) echo 'class="table-success"' ?>><?php echo $rows['p4']; ?></td>
			<td <?php if($rows['p3']) echo 'class="table-success"' ?>><?php echo $rows['p3']; ?>(OPT)</td>
			<td class="table-info">N</td>
			<td colspan="3" <?php if($rows['l3']) echo 'class="table-success"' ?>><?php echo $rows['l3']; ?></td>
		</tr>
		<!--Thursday-->
		<tr>
			<th class="table-warning">THURSDAY</th>
			<td <?php if($rows['p5']) echo 'class="table-success"' ?>><?php echo $rows['p5']; ?></td>
			<td <?php if($rows['p1']) echo 'class="table-success"' ?>><?php echo $rows['p1']; ?></td>
			<td <?php if($rows['p2']) echo 'class="table-success"' ?>><?php echo $rows['p2']; ?></td>
			<td <?php if($rows['p4']) echo 'class="table-success"' ?>><?php echo $rows['p4']."(OPT)"; ?></td>
			<td class="table-info">C</td>
			<td colspan="3" <?php if($rows['l4']) echo 'class="table-success"' ?>><?php echo $rows['l4']; ?></td>
		</tr>
		<!--Friday-->
		<tr>
			<th class="table-warning">FRIDAY</th>
			<td <?php if($rows['p3']) echo 'class="table-success"' ?>><?php echo $rows['p3']; ?></td>
			<td <?php if($rows['p4']) echo 'class="table-success"' ?>><?php echo $rows['p4']; ?></td>
			<td <?php if($rows['p5']) echo 'class="table-success"' ?>><?php echo $rows['p5']; ?></td>
			<td <?php if($rows['p5']) echo 'class="table-success"' ?>><?php echo $rows['p5']; ?>(OPT)</td>
			<td class="table-info">H</td>
			<td colspan="3" <?php if($rows['l5']) echo 'class="table-success"' ?>><?php echo $rows['l5']; ?></td>
		</tr>
		</table>
		
		
		<?php 
			}
			?>
		<strong><h5>Details of Teaching Faculty:<br></h5></strong>
		<?php
			$query = "SELECT * FROM faculty a, fac_timetable b, groups c WHERE a.username=b.username AND b.groupname=c.groupname AND c.id='$un' ORDER BY a.username DESC";
			echo "<table class='table table-striped'>"; ?>
			<tr>
				<th>Subject</th>
				<th>Slot</th>
				<th>Faculty Incharge</th>
			</tr>
			<?php $res = $con->query($query);
			while($rows=$res->fetch_assoc()){
				if($rows['p1']){ 
					$p1 = $rows['p1'];
					$p1name = $rows['firstname']." ".$rows['lastname'];
				?> </td></tr> <?php 
				}
				if($rows['p2']){
					$p2 = $rows['p2'];
					$p2name = $rows['firstname']." ".$rows['lastname'];
				?></td></tr> <?php 
				}
				if($rows['p3']){
					$p3 = $rows['p3'];
					$p3name = $rows['firstname']." ".$rows['lastname'];
				?></td></tr><?php 
				}
				if($rows['p4']){
					$p4 = $rows['p4'];
					$p4name = $rows['firstname']." ".$rows['lastname'];
				?></td></tr><?php 
				}
				if($rows['p5']){
					$p5 = $rows['p5'];
					$p5name = $rows['firstname']." ".$rows['lastname'];
				?></td></tr><?php 
				}
				if($rows['l1']){
					$l1 = $rows['l1'];
					$l1name = $rows['firstname']." ".$rows['lastname'];
				?></td></tr><?php 
				}if($rows['l2']){
					$l2 = $rows['l2'];
					$l2name = $rows['firstname']." ".$rows['lastname'];
				?></td></tr><?php 
				}if($rows['l3']){
					$l3 = $rows['l3'];
					$l3name = $rows['firstname']." ".$rows['lastname'];
				?></td></tr><?php 
				}if($rows['l4']){
					$l4 = $rows['l4'];
					$l4name = $rows['firstname']." ".$rows['lastname'];
				?></td></tr><?php 
				}if($rows['l5']){
					$l5 = $rows['l5'];
					$l5name = $rows['firstname']." ".$rows['lastname'];
				?> </td></tr><?php 
				}
			}
				if(isset($p1)){ 
				echo "<tr><td>".$p1."</td><td>P1</td><td>".$p1name;
				?> </td></tr> <?php 
				}
				if(isset($p2)){
				echo "<tr><td>".$p2."</td><td>P2</td><td>".$p2name;
				?></td></tr> <?php 
				}
				if(isset($p3)){
				echo "<tr><td>".$p3."</td><td>P3</td><td>".$p3name;
				?></td></tr><?php 
				}
				if(isset($p4)){
				echo "<tr><td>".$p4."</td><td>P4</td><td>".$p4name;
				?></td></tr><?php 
				}
				if(isset($p5)){
				echo "<tr><td>".$p5."</td><td>P5</td><td>".$p5name;
				?></td></tr><?php 
				}
				if(isset($l1)){
				echo "<tr><td>".$l1."</td><td>L1</td><td>".$l1name;
				?></td></tr><?php 
				}if(isset($l2)){
				echo "<tr><td>".$l2."</td><td>L2</td><td>".$l2name;
				?></td></tr><?php 
				}if(isset($l3)){
				echo "<tr><td>".$l3."</td><td>L3</td><td>".$l3name;
				?></td></tr><?php 
				}if(isset($l4)){
				echo "<tr><td>".$l4."</td><td>L4</td><td>".$l4name;
				?></td></tr><?php 
				}if(isset($l5)){
				echo "<tr><td>".$l5."</td><td>L5</td><td>".$l5name;
				?> </td></tr><?php 
				}
			echo "</table>";
		?>
		</div>
		</center>	
	</body>
</html>