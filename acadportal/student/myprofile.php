<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
		<?php
			$user = $_SESSION['username'];
			$res=$con->query("SELECT * FROM student WHERE username='$user'");
		?>
		<center>
		<div class="col-10">
			<h3>My Profile</h3>
		<table class="table table-striped table-dark table-hover">
			<?php while($rows=$res->fetch_assoc()){ ?>
			<tr>
				<th>First Name</th>
				<td><?php echo $rows['firstname'] ?>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?php echo $rows['lastname'] ?>
			</tr>
			<tr>
				<th>Official Username</th>
				<td><?php echo $rows['username'] ?>
			</tr>
			<tr>
				<th>Assigned Group</th>
				<td><?php echo $rows['groupid'] ?>
			</tr>
			<tr>
				<th>Father Name</th>
				<td><?php echo $rows['fathername'] ?>
			</tr>
			<tr>
				<th>Mother Name</th>
				<td><?php echo $rows['mothername'] ?>
			</tr>
			<tr>
				<th>Address</th>
				<td><?php echo $rows['address'] ?>
			</tr>
			<tr>
				<th>Mobile Phone</th>
				<td><?php echo $rows['phone'] ?>
			</tr>
			<tr>
				<th>Mail ID</th>
				<td><?php echo $rows['email'] ?>
			</tr>
			<?php } ?>
			<tr>
		</table>
		</div>
		</center>
	</body>
</html>