<html>
	<head>
		<?php
			include "navbar.php";
		?>
	</head>
	<body>
		<center>
		<h3>View Timetable</h3>
		<?php
			$un = $_SESSION['username'];
			$res = $con->query("SELECT DISTINCT(groupname) FROM fac_timetable WHERE username='$un'");
			 ?>
			<form action="timetable" method="post">
			Group: 
				<select name="groupchoice">
					<?php
						while($rows=$res->fetch_assoc()){
					?>
					<option value="<?php echo $rows['groupname']?>"><?php echo $rows['groupname']?> </option>
					<?php
						}
					?>
				</select>
				<input type="submit" name="fetch" class="btn btn-success">
			</form>
		<?php
			if(isset($_POST['fetch'])){
			$group = $_POST['groupchoice'];
			$query = "SELECT * FROM fac_timetable WHERE username='$un' AND groupname='$group'";
			
			$res=$con->query($query); ?>
			<div class="alert alert-info" role="alert">
			  <strong><?php echo $un." - ".$group; ?></strong>
			</div>
			<?php
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
			<td <?php if($rows['p1']) echo 'class="table-success"' ?>><?php echo $rows['p1']; ?><?php if($rows['p1']) echo '(OPT)' ?></td>
			<td class="table-info">L</td>
			<td colspan="3" <?php if($rows['l1']) echo 'class="table-success"' ?>><?php echo $rows['l1']; ?></td>
		</tr>
		<!--Tuesday-->
			<th class="table-warning">TUESDAY</th>
			<td <?php if($rows['p4']) echo 'class="table-success"' ?>><?php echo $rows['p4']; ?></td>
			<td <?php if($rows['p5']) echo 'class="table-success"' ?>><?php echo $rows['p5']; ?></td>
			<td <?php if($rows['p1']) echo 'class="table-success"' ?>><?php echo $rows['p1']; ?></td>
			<td <?php if($rows['p2']) echo 'class="table-success"' ?>><?php echo $rows['p2']; ?><?php if($rows['p2']) echo '(OPT)' ?></td>
			<td class="table-info">U</td>
			<td colspan="3" <?php if($rows['l2']) echo 'class="table-success"' ?>><?php echo $rows['l2']; ?></td>
		<!--Wednesday-->
		<tr>
			<th class="table-warning">WEDNESDAY</th>
			<td <?php if($rows['p2']) echo 'class="table-success"' ?>><?php echo $rows['p2']; ?></td>
			<td <?php if($rows['p3']) echo 'class="table-success"' ?>><?php echo $rows['p3']; ?></td>
			<td <?php if($rows['p4']) echo 'class="table-success"' ?>><?php echo $rows['p4']; ?></td>
			<td <?php if($rows['p3']) echo 'class="table-success"' ?>><?php echo $rows['p3']; ?><?php if($rows['p3']) echo '(OPT)' ?></td>
			<td class="table-info">N</td>
			<td colspan="3" <?php if($rows['l3']) echo 'class="table-success"' ?>><?php echo $rows['l3']; ?></td>
		</tr>
		<!--Thursday-->
		<tr>
			<th class="table-warning">THURSDAY</th>
			<td <?php if($rows['p5']) echo 'class="table-success"' ?>><?php echo $rows['p5']; ?></td>
			<td <?php if($rows['p1']) echo 'class="table-success"' ?>><?php echo $rows['p1']; ?></td>
			<td <?php if($rows['p2']) echo 'class="table-success"' ?>><?php echo $rows['p2']; ?></td>
			<td <?php if($rows['p4']) echo 'class="table-success"' ?>><?php echo $rows['p4']; ?><?php if($rows['p4']) echo '(OPT)' ?></td>
			<td class="table-info">C</td>
			<td colspan="3" <?php if($rows['l4']) echo 'class="table-success"' ?>><?php echo $rows['l4']; ?></td>
		</tr>
		<!--Friday-->
		<tr>
			<th class="table-warning">FRIDAY</th>
			<td <?php if($rows['p3']) echo 'class="table-success"' ?>><?php echo $rows['p3']; ?></td>
			<td <?php if($rows['p4']) echo 'class="table-success"' ?>><?php echo $rows['p4']; ?></td>
			<td <?php if($rows['p5']) echo 'class="table-success"' ?>><?php echo $rows['p5']; ?></td>
			<td <?php if($rows['p5']) echo 'class="table-success"' ?>><?php echo $rows['p5']; ?><?php if($rows['p5']) echo '(OPT)' ?></td>
			<td class="table-info">H</td>
			<td colspan="3" <?php if($rows['l5']) echo 'class="table-success"' ?>><?php echo $rows['l5']; ?></td>
		</tr>
		</table>
		
		
		<?php 
			}
			}
			?>
		
		</div>
		</center>	
	</body>
</html>