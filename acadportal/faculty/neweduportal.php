<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
	<center>
		<h3>Upload File - Resources for Students</h3>
		<form action="neweduportal" method="post" enctype="multipart/form-data">
			<div class="col-8">
			<table class="table">
			<tr>
				<td>Visible to Groups</td>
				<td>
				<select name="group">
					<option value="all">ALL GROUPS</option>
					<?php 
					$user = $_SESSION['username'];
					$gq = $con->query("SELECT groupname FROM fac_timetable WHERE username='$user'");
					while($grows = $gq->fetch_assoc()){ ?>
						<option value="<?php echo $grows['groupname']?>"><?php echo $grows['groupname']?></option>
					<?php } ?>
				</select>
				</td>
			</tr>
			<tr>
				<td>File</td>
				<td><input type="file" name="fileupload" accept=".png, .jpg, .ppt, .jpeg, .doc, .docx, .pdf, .pptx, .xls, .xlsx, .csv" required /></td> 
			</tr>
			<!--<tr>
				<td>File Rename(Optional)</td>
				<td><input type="text" name="rename" />
			</tr>-->
			<tr>
				<td>Description</td>
				<td><textarea name="descr"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><center><input type="submit" class="btn btn-success" value="Upload File" name="submit" /></center></td>
			</tr>
			</table>
			</div>
		</form>
		<?php
			if(isset($_POST['submit'])){
				$visib = $_POST['group'];
				$des = $_POST['descr'];
				
				//File Handling
				$img_name = $_FILES['fileupload']['name'];
				$img_size = $_FILES['fileupload']['size'];
				$img_tmp = $_FILES['fileupload']['tmp_name'];
				
				/*if($_POST['rename']){
					$img_name=$_POST['rename'];
				} */
				
				$directory = '../eduportalfiles/';
				$target_file = $directory.$img_name;
				
				$file_type = $_FILES['fileupload']['type'];
				
				move_uploaded_file($img_tmp, $target_file);
				$query = "INSERT INTO `fileupload`(`filename`, `type`, `path`, `visibility`, `owner`, `description`) VALUES ('$img_name','$file_type', '$target_file','$visib', '$user', '$des')";
				$query_run = $con->query($query);
				
				if($query_run){ ?>
					<script>
						alert("success");
					</script>
				<?php }
				else{ ?>
					<script>
						alert("failed");
					</script>
				<?php } 
			}
		?>
	<div class="col-8">
	<h3>My Content</h3>
	<table class="table">
		<?php
			$res2 = $con->query("SELECT * FROM fileupload WHERE owner='$user'");
			$i=1;
			if(mysqli_num_rows($res2)==0){ ?>
				<tr><td><div class="alert alert-danger" role="alert">
  No data found in table
</div></td></tr>
			<?php }
			else{ ?>
			<tr>
				<th>S No</th>
				<th>File Name</th>
				<th>File Type</th>
				<th>Link</th>
			</tr>
			<?php
			while($row2=$res2->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $i; $i=$i+1; ?></td>
					<td><?php echo $row2['filename']; ?></td>
					<td><?php echo $row2['type'];;?></td>
					<td><a target="_blank" href="<?php echo $row2['path'] ?>" class="btn btn-primary">Download</a></td>
				</tr>
			<?php }
			}
		?>
	</table>
	</div>
	</center>
	</body>
</html>