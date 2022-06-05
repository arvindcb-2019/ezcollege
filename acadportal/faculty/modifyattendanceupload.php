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
						$con->query("UPDATE `attendance` SET `status`='Absent' WHERE`stu_id`='$stuid[$i]' AND `date`='$date' AND `slot`='$slot' AND `group_id`='$group' AND `fac_id`='$facid'");
					}
					else{
					$con->query("UPDATE `attendance` SET `status`='Present' WHERE`stu_id`='$stuid[$i]' AND `date`='$date' AND `slot`='$slot' AND `group_id`='$group' AND `fac_id`='$facid'");
					}
					//echo "<script> alert('group - $group, id = $stuid[$i], status = $status[$i]') </script>";
				}
			}
			$q = $con->query("SELECT COUNT(*) AS cpresent FROM attendance WHERE date='$date' AND slot='$slot' AND group_id='$group' AND fac_id='$facid' AND status='Present'");
			$alertcount = $q->fetch_assoc();
			$alco = $alertcount['cpresent'];
		?>
		<script> swal('Modified attendance', 'Attendance has been modified successfully. <?php echo $alco ?> students are present', 'success').then(() => {
					  window.location='modifyattendancepost';
					}); </script>
	</body>
</html>