<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
		<center>
		<h3>View Students in Groups</h3>
		<form action="viewstudents" method="post">
		<select name="groupname">
		<?php
			$res = $con->query("SELECT name FROM group_data");
			while($row=$res->fetch_assoc()){
		?>
		<option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
		<?php
			}
			?>
		</select>
		<input type="submit" class="btn btn-danger" value="View Students" name="view"/>
		</form>
		<?php
			if(isset($_POST['view'])){
				$gname = $_POST['groupname'];
				$result = $con->query("SELECT * FROM student WHERE groupid='$gname'"); ?>
				<div class="col-6">
				<h5>Group Name: <?php echo $gname ?></h5>
				<table border=1 style="width:100%">
				<tr>
					<th>S. No</th>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Student Contact Mail Address</th>
				</tr>
				<?php 
				$i=1;
				while($rows = $result->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $rows['username'] ?></td>
						<td><?php echo $rows['firstname']." ".$rows['lastname']; ?></td>
						<td><?php echo $rows['email'] ?></td>
					</tr>
				<?php
				$i=$i+1;
				}
			}
		?>
		</center>
		</table>
		</div>
	</body>
</html>