<?php 
	include "navbar.php";
	$group = $_SESSION['group'];
	if(isset($_POST['update'])){
		$p1 = $_POST['p1'];
		$p2 = $_POST['p2'];
		$p3 = $_POST['p3'];
		$p4 = $_POST['p4'];
		$p5 = $_POST['p5'];
		$l1 = $_POST['l1'];
		$l2 = $_POST['l2'];
		$l3 = $_POST['l3'];
		$l4 = $_POST['l4'];
		$l5 = $_POST['l5'];
		$res = $con->query("UPDATE `timetable` SET`p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5', `l1`='$l1',`l2`='$l2',`l3`='$l3',`l4`='$l4',`l5`='$l5' WHERE `groupname`='$group'");
		if($res){ ?>
			<script>
				swal("Timetable updated for <?php echo $group ?>", "Timetable updated successfully", "success")
				.then((value) => {
				  window.location='createtimetable';
				});
			</script>
		<?php }
		echo "<script>  </script>";
	}
?>