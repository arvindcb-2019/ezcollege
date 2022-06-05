<?php 
	include "navbar.php";
?>
<html>
	<head>
		<title>Examination Student</title>
		<style>
			.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
	</style>
	</head>
	<body>
		<div class="container">
		<?php
			$date = date("Y-m-d");
			date_default_timezone_set("Asia/Kolkata");
			$time = date("H:i:s");
			$user = $_SESSION['username'];
			$result = $con->query("SELECT groupid FROM student WHERE username='$user'")->fetch_assoc();
			$group = $result['groupid'];
			$query = "SELECT * FROM examination WHERE classgroup='$group' AND startdate>='$date' AND starttime<='$time' AND enddate<='$date' AND endtime>'$time'";
			$res = $con->query($query);
			if(mysqli_num_rows($res)>0){
			while($rows=$res->fetch_assoc()){ ?>
				<br>
			<div class="row">
				<div class="col-9">
					<div class="card">
					  <div class="card-header">
						<h5><?php echo $rows['testid']." - ".$rows['testname']; ?></h5>
					  </div>
					  <div class="card-body text-center">
						<p class="card-text">The question paper files will be attached in the link given below. Check the instructions in the same and submit the files before the deadline. Only one upload allowed, so make sure you submit the correct files. All documents submitted will be subject to plagiarism check.<br>
						<a class="btn btn-warning" target="_blank" href="../examinationfiles/<?php echo $rows['testid'] ?>/QPaper.pdf">Download Question Paper here</a></p>
						<div class="row">
							<div class="alert alert-success col-4" role="alert">
							  Test opens at: <br><strong><?php echo $rows['startdate']." - ".$rows['starttime']; ?></strong>
							</div>
							<div class="alert alert-danger col-4" role="alert">
							  Test closes at: <br><strong><?php echo $rows['enddate']." - ".$rows['endtime']; ?></strong>
							</div>
							<div class="alert alert-warning col-4" role="alert">
							  Time Limit: <br> <strong>NA</strong>
							</div>
						</div>
					  </div>
					  <div class="card-footer">
						<form action="exam" method="POST" enctype="multipart/form-data">
							<input type="hidden" value="<?php echo $rows['testid']; $testid = $rows['testid'];?>" name="id">
							<input type="file" name="fileupload" accept=".pdf" required>
							<?php
								$check=$con->query("SELECT * FROM examstudent WHERE testid='$testid' AND username='$user'");
								if(mysqli_num_rows($check)==0){
							?>
							<input type="submit" class="btn btn-success" name="submit" style="float: right;" value="Submit the Exam">
								<?php } 
								else{ ?>
									<input type="submit" class="btn btn-success" name="submit" style="float: right;" value="File Submitted Successfully" disabled>
								<?php }?>
						</form>
						<?php
							if(isset($_POST['submit'])){
								$testname = $_POST['id'];
								$directory = "../examinationfiles/$testname/";
					
								 # Get file name
								$filename = $_FILES['fileupload']['name'];

								  # Get File size
								$filesize = $_FILES['fileupload']['size'];

								  # Location
								$location = $directory;
								$location .= "$user.pdf";
								move_uploaded_file($_FILES['fileupload']['tmp_name'],$location);
								
								$q = "INSERT INTO `examstudent`(`testid`, `username`, `file`) VALUES ('$testname','$user','$location')";
								$r = $con->query($q);
								if($r){ ?>
								
									<script>
										swal("Exam Submitted Successfully")
									.then((value) => {
										if(value){
											window.location="exam";
										}
										else{
											window.location="exam";
										}
									});
									</script>
								<?php }
							}
						?>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<?php
			}
			}
			else{
		?>
			<div class="alert alert-warning" role="alert">
  No tests has been scheduled for you at this moment. 
</div>
			<?php } ?>
	</body>
</html>