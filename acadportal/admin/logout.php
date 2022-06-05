<?php
	include "navbar.php";
	session_destroy();
?>
<script>
	swal("Logged out", "Logged out successfully.", "success")
.then((value) => {
	if(value){
		window.location="../index";
	}
	else{
		window.location="../index";
	}
});
</script>