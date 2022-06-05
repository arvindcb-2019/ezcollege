<html>
	<head>
		<?php include "navbar.php" ?>
		<style>
		.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
		</style>
	</head>
	<body>
		<center>
		<h3>Student EduPortal</h3>
		<div class="col-8">
		
			<?php 
				$user = $_SESSION['username'];
				$gquery = $con->query("SELECT groupid FROM student WHERE username='$user'");
				while($grows=$gquery->fetch_assoc()){
					$group = $grows['groupid'];
				}
				$res = $con->query("SELECT * FROM fileupload WHERE visibility='all' OR visibility='$group'");
				while($row = $res->fetch_assoc()){ ?>
					<div class="card">
						<?php echo $row['description']; ?>
						<br>
						<?php 
							$facid = $row['owner'];
							$fquery = $con->query("SELECT firstname, lastname FROM faculty WHERE username='$facid'");
							while($frow = $fquery->fetch_assoc()){
								$name = $frow['firstname']." ".$frow['lastname'];
							}?>
						File Uploaded: <?php echo $row['filename']; ?> <br> 
						<div class="col-2">
						<a target="_blank" href="<?php echo $row['path'] ?>" class="btn btn-success">Download</a>
						</div>
						<div class="card-footer text-muted">
							Posted by <strong><?php echo $name ?></strong> in <strong><?php echo $row['visibility'] ?></strong> group
						</div>
					</div>
				<?php }
			?>
			<div class="card">
			
			</div>
		</div>
		</center>
	</body>
</html>