<html>
	<head>
		<?php include "navbar.php"; ?>
	</head>
	<body>
		<?php
			if(isset($_POST['upload'])){
				$group = $_SESSION['group'];
				$slot = $_SESSION['slot'];
				$date = $_SESSION['date'];
				$facid = $_SESSION['username'];
				
				$stuid = $_POST['student'];
				
				$status = $_POST['status'];

				$n = count($stuid);
				for($i=0; $i<$n; $i++){
					if(empty($status[$i])){
						$con->query("INSERT INTO `attendance`(`stu_id`, `status`, `date`, `slot`, `group_id`, `fac_id`) VALUES ('$stuid[$i]','Absent','$date','$slot','$group','$facid')");
						//echo "INSERT INTO `attendance`(`stu_id`, `status`, `date`, `slot`, `group_id`, `fac_id`) VALUES ('$stuid[$i]','Absent','$date','$slot','$group','$facid')"."<br>";
					}
					else{
					$con->query("INSERT INTO `attendance`(`stu_id`, `status`, `date`, `slot`, `group_id`, `fac_id`) VALUES ('$stuid[$i]','Present','$date','$slot','$group','$facid')");
					//echo "INSERT INTO `attendance`(`stu_id`, `status`, `date`, `slot`, `group_id`, `fac_id`) VALUES ('$stuid[$i]','Present','$date','$slot','$group','$facid')"."<br>";
					}
					//echo "<script> alert('group - $group, id = $stuid[$i], status = $status[$i]') </script>";
				}
			}
			$q = $con->query("SELECT COUNT(*) AS cpresent FROM attendance WHERE date='$date' AND slot='$slot' AND group_id='$group' AND fac_id='$facid' AND status='Present'");
			$alertcount = $q->fetch_assoc();
			$alco = $alertcount['cpresent'];
		?>
		<script> swal('Posted attendance', 'Attendance has been uploaded successfully. <?php //echo $alco ?> students are present', 'success').then(() => {
					  window.location='attendancepost';
					}); </script>
	</body>
</html>