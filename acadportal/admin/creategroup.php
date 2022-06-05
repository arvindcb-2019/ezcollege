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
		<div class="card col-6 ">
		  <h5 class="card-header">Create New Group</h5>
		  <div class="card-body align-self-center">
			<h5 class="card-title">Enter Group Particulars here</h5>
			<form action="creategroup" method="post">
			<table>
			<tr>
				<td>Group Name: </td>
				<td> <input type="text" name="name" placeholder="Group name" required /></td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
					<input type="submit" name="submit" class="btn btn-success" value="Create Group">
					</center>
				</td>
			</tr>
			</table>
			</form>
		  </div>
		</div>
		<?php
			if(isset($_POST['submit'])){
				$name = $_POST['name'];
				
				$query = "insert into `group_data` (`name`) values ('$name')";
				$res = $con->query($query);
				$query = "insert into `timetable` (`groupname`) values ('$name')";
				$res = $con->query($query);
				if($res){ ?>
					<script>
						swal("Group created successfully", "Group created!", "success");
					</script>
				<?php }
			}
		?>
	</body>
</html>