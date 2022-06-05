<html>
	<head>
	<?php
		include "navbar.php";
	?>
	<style>
		.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
		</style>
	</head>
	<body>
	<br><br>
	<div class="row">
	<div class="col-2"></div>
	<br>
	<div class="col-8">
		<div class="card bg-secondary text-white">
			<div class="card-header">
				<h3>Notifications</h3>
			</div>
			<div class="card-body">
				<?php 
					$date = date("D-m-y");
					$query = "SELECT * FROM notifications WHERE visibility>'$date'";
					$res = $con->query($query);
					while($rows=$res->fetch_assoc()){
						echo "<li>".$rows['content']."</li><br>";
					}
				?>
			</div>
		</div>
	</div>
	</div>
	</body>
</html>