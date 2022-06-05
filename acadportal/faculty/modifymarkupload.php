<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
	<?php
		if(isset($_POST['upload'])){
			$id = $_POST['id'];
			$group = $_SESSION['group'];
			$slot = $_SESSION['slot'];
			$tname = $_SESSION['testname'];
			
			$mark = $_POST['mark'];
			$n = count($mark);
			
			for($i=0; $i<$n; $i++){
				$con->query("UPDATE `marks` SET `mark`=$mark[$i] WHERE `slot`='$slot' AND `id`='$id[$i]' AND `groupname`='$group' AND `testname`='$tname'");
			}
		}
	?>
	<script>
	swal('Modified Successfully', 'You have modified the marks successfully', 'success').then(() => {
					  window.location='modifymarkpost';
					});
	</script>
	</body>
</html>