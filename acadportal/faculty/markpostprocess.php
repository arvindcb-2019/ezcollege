<html>
	<head>
		<?php include "navbar.php"; ?>
	</head>
	<body>
		<?php 
			if(isset($_POST['process'])){
				$name = $_POST['test'];
				$mark = $_POST['maxmark'];
				
				$_SESSION['testname']=$name;
				$_SESSION['maxmark'] = $mark;
				
				$slot = $_SESSION['slot'];
				$group = $_SESSION['group'];
				
				$att = $con->query("SELECT * FROM student WHERE groupid='$group'");
				$i=1;
				?>
				<center>
				<h3>Test Mark Upload </h3>
				<form action="markupload.php" method="post">
				<table border=1>
				<tr>
					<th>S. No</th>
					<th>ID Number</th>
					<th>Name of the student</th>
					<th>Mark out of <?php echo $mark ?></th>
				</tr>
				<?php while($attrow = $att->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $i ?></td>
						<td><input type="text" name="id[]" style="border-top-style: hidden;  border-right-style: hidden;  border-left-style:hidden;  border-bottom-style: hidden;" value="<?php echo $attrow['username'] ?>" readonly />
						<td><input type="text" style="border-top-style: hidden;  border-right-style: hidden;  border-left-style:hidden;  border-bottom-style: hidden;" value="<?php echo $attrow['firstname']." ".$attrow['lastname'] ?>" readonly />
						<td><input type="number" step=0.5 name="mark[]" placeholder="Mark of the student" max=<?php echo $mark ?> required /></td>
					</tr>
				<?php }
			}
		?>
				<tr>
					<td colspan="4"><center> <input type="submit" name="upload" class="btn btn-success" value="Upload & Save Marks" /></center></td>
				</tr>
				</table>
				</form>
				</center>
	</body>
</html>