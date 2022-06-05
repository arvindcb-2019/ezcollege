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
	  <h5 class="card-header">Create Timetable for Group</h5>
	  <div class="card-body">
		<h5 class="card-title">Enter Details Correctly for the group</h5>
		<p class="card-text">
		
		<form action="createtimetable" method="post">
			<select name="group">
			<?php
				$res = $con->query("SELECT groupname FROM timetable");
				while($rows=$res->fetch_assoc()){ ?>
					<option value="<?php echo $rows['groupname']?>"><?php echo $rows['groupname']?> </option>
			<?php 
				}
				?>
			</select>
			<input type="submit" name="submit" class="btn btn-success" />
		</form>
		<?php
			if(isset($_POST['submit'])){
				$group = $_POST['group'];
				$_SESSION['group'] = $group;
				$res = $con->query("SELECT * FROM timetable WHERE groupname='$group'"); ?>
				<div class="alert alert-success" role="alert">
				You are editing details of <strong><?php echo $group; ?> </strong>
				</div>
				<form action="createtimetableprocess" method="post">
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
					<td>Period 1</td>
					<td><textarea name="p1" style="width:200px"><?php echo $rows['p1'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 1<br>2:00-4:00</td>
					<td><textarea name="l1" style="width:300px"><?php echo $rows['l1'] ?></textarea></td>
				</tr>
				
				<!-- P2 AND L2 -->
				<tr>
					<td>Period 2</td>
					<td><textarea name="p2" style="width:200px"><?php echo $rows['p2'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 2<br>2:00-4:00</td>
					<td><textarea name="l2" style="width:300px"><?php echo $rows['l2'] ?></textarea></td>
				</tr>
				
				<!-- P3 AND L3 -->
				<tr>
					<td>Period 3</td>
					<td><textarea name="p3" style="width:200px"><?php echo $rows['p3'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 3<br>2:00-4:00</td>
					<td><textarea name="l3" style="width:300px"><?php echo $rows['l3'] ?></textarea></td>
				</tr>
				
				<!-- P4 AND L4 -->
				<tr>
					<td>Period 4</td>
					<td><textarea name="p4" style="width:200px"><?php echo $rows['p4'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 4<br>2:00-4:00</td>
					<td><textarea name="l4" style="width:300px"><?php echo $rows['l4'] ?></textarea></td>
				</tr>
				
				<!-- P5 AND L5 -->
				<tr>
					<td>Period 5</td>
					<td><textarea name="p5" style="width:200px"><?php echo $rows['p5'] ?></textarea>
					<td> <p style="visibility: hidden">BREAK BREAK BREAK</p> </td>
					<td>Lab 5<br>2:00-4:00</td>
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
			}?>
			
		</p>
		
	  </div>
	</div>
	</body>
</html>