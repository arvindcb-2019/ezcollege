<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
	<center>
		<?php
			if(isset($_POST['upload'])){
				$user = $_SESSION['username'];
				
				$id = $_POST['id'];
				$mark = $_POST['mark'];
				
				$slot = $_SESSION['slot'];
				$group = $_SESSION['group'];
				
				$name = $_SESSION['testname'];
				$maxmark = $_SESSION['maxmark'];
				
				$n=count($id);
				for($i=0; $i<$n; $i++){
					$con->query("INSERT INTO `marks`(`slot`, `id`, `groupname`, `testname`, `mark`, `totalmark`, `facid`) VALUES ('$slot','$id[$i]','$group','$name',$mark[$i],$maxmark, '$user')");
				}
			}
		?>
		<script> swal('Uploaded Successfully', 'You have uploaded the marks successfully', 'success').then(() => {
					  window.location='markpost';
					}); </script>
	</center>
	</body>
</html>