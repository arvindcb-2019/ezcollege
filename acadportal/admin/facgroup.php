<html>
	<head>
	<?php
		include "navbar.php";
	?>
	<style>
			.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
		}
		</style>
	</head>
	<body>
		<div class="card col-md-10">
	  <h5 class="card-header">Map Timetable to Faculty</h5>
	  <div class="card-body">
		<h5 class="card-title">Enter Details Correctly</h5>
		<p class="card-text">
		
		<form action="facgroup" method="post">
			<select name="faculty">
			<?php
				$res = $con->query("SELECT firstname, lastname, username FROM faculty ");
				while($rows=$res->fetch_assoc()){ ?>
					<option value="<?php echo $rows['username']?>"><?php echo $rows['username']." - ".$rows['firstname']." ".$rows['lastname']; ?> </option>
			<?php 
				}
				?>
			</select>
			<select name="group">
				<?php
					$res = $con->query("SELECT DISTINCT(`groupname`) FROM `fac_timetable`");
					while($rows = $res->fetch_assoc()){ ?>
						<option value="<?php echo $rows['groupname']?>"><?php echo $rows['groupname']?></option>
			
			<?php
					}
				?>
			</select>
			<input type="submit" name="submit" class="btn btn-success" />
		</form>
		<?php
			if(isset($_POST['submit'])){
				$fac = $_POST['faculty'];
				$_SESSION['fac'] = $fac;
				$group = $_POST['group'];
				$_SESSION['group'] = $group;
				//$_SESSION['group'] = $group;
				$res = $con->query("SELECT * FROM fac_timetable WHERE username='$fac' AND `groupname` = '$group' "); 
				if(mysqli_num_rows($res)>0){
				?>
				
				<div class="alert alert-success" role="alert">
				You are editing details of <strong><?php echo $fac; ?> </strong>
				in group <strong><?php echo $group; ?> </strong></div>
				<form action="facgroupprocess" method="post">
				<table>
				<tr>
					<th colspan="2"><center>THEORY</center></th>
					<th></th>
					<th colspan="2"><center>LABORATORY/PRACTICAL</center></th>
				</tr>
				<?php 
				while($rows=$res->fetch_assoc()){ ?>
				<!-- P1 AND L1 -->
				<tr>
					<td>Period 1<br>MON, TUE, WED, THU</td>
					<td><textarea name="p1" style="width:200px"><?php echo $rows['p1'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 1<br>MON 2:00-4:00</td>
					<td><textarea name="l1" style="width:300px"><?php echo $rows['l1'] ?></textarea></td>
				</tr>
				
				<!-- P2 AND L2 -->
				<tr>
					<td>Period 2<br>MON, TUE, WED, THU</td>
					<td><textarea name="p2" style="width:200px"><?php echo $rows['p2'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 2<br>TUE 2:00-4:00</td>
					<td><textarea name="l2" style="width:300px"><?php echo $rows['l2'] ?></textarea></td>
				</tr>
				
				<!-- P3 AND L3 -->
				<tr>
					<td>Period 3<br>MON, WED, FRI</td>
					<td><textarea name="p3" style="width:200px"><?php echo $rows['p3'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 3<br>WED 2:00-4:00</td>
					<td><textarea name="l3" style="width:300px"><?php echo $rows['l3'] ?></textarea></td>
				</tr>
				
				<!-- P4 AND L4 -->
				<tr>
					<td>Period 4<br>TUE, WED, THU, FRI</td>
					<td><textarea name="p4" style="width:200px"><?php echo $rows['p4'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 4<br>THU 2:00-4:00</td>
					<td><textarea name="l4" style="width:300px"><?php echo $rows['l4'] ?></textarea></td>
				</tr>
				
				<!-- P5 AND L5 -->
				<tr>
					<td>Period 5<br>TUE, THU, FRI</td>
					<td><textarea name="p5" style="width:200px"><?php echo $rows['p5'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 5<br>FRI 2:00-4:00</td>
					<td><textarea name="l5" style="width:300px"><?php echo $rows['l5'] ?></textarea></td>
				</tr>
			<?php } ?>
			<tr>
				<td>
				<input type="submit" name="update" class="btn btn-success" value="Update" />
				</td>
			</tr>
			</table>
			</form>
			<?php 
			}
			else{ ?>
				<script>
					swal("Unable to edit timetable details", "Add the user <?php echo $fac ?> to group <?php echo $group ?> to edit or create timetable", "error"); 
				</script>
			<?php }
			}
			?>
			
		</p>
		
	  </div>
	</div>
	</body>
</html>