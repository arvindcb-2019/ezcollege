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
		  <h5 class="card-header">Add Users to Group</h5>
		  <div class="card-body align-self-center">
			<h5 class="card-title">Click on Add to add the user to the chosen group</h5>
			<form action="editgroup" method="post">
			<table>
			<?php
				$res = $con->query("SELECT * FROM `login` WHERE `role`=2");
				while($rows=$res->fetch_assoc()){
			?>
			
			<tr>
				<td><?php echo $rows['username']; ?></td>
				<td> <input type="checkbox" name="member[]" value="<?php echo $rows['username']; ?>" />
				</td>
			</tr>
			<?php 
				}
				$res = $con->query("SELECT * FROM `group_data`");
				?>
			<tr>
				<td>Group:  </td>
				<td> 
					<select name="group">
					<?php while($rows=$res->fetch_assoc()){ ?>
					  <option value="<?php echo $rows['name'];?>"><?php echo $rows['name'];?></option>
					<?php 
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
					<input type="submit" name="submit" class="btn btn-success" value="Add User">
					</center>
				</td>
			</tr>
			
			</table>
			</form>
			<?php
				if(isset($_POST['submit'])){
					$user = $_POST['member'];
					$group = $_POST['group'];
					if(empty($user)) 
					{
						echo("You didn't select any buildings.");
					}
					else{
						$N = count($user);
						for($i=0; $i < $N; $i++)
						{
						  
						  $con->query("INSERT INTO `groups`(`id`, `groupname`) VALUES ('$user[$i]', '$group')");
						  $con->query("UPDATE student SET groupid='$group' WHERE username='$user[$i]'");
						  
						}
						?>
						<script>
						swal("User added successfully", "User added!", "success");
						</script>
					<?php }
				}
			?>
		  </div>
		</div>
	</body>
</html>