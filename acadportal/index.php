<html>
	<head>
		<?php
			include "navbar.php";
			session_start();
		?>
		<title>EzCollege - AcadPortal </title>
		<link rel="stylesheet" type="text/css" href="login.css">

		<script>
			function display(){	
				swal("Good job!", "You clicked the button!", "success");
			}
		</script>
	</head>
	<body>
	<div class="container">
  <div class="login">
    <h1>Login to App</h1>
    <form method="post" action="index">
      <p><input type="text" name="username" value="" placeholder="Username"onkeyup="this.value = this.value.toUpperCase()"></p>
      <p><input type="password" name="password" value="" placeholder="Password"></p>
      
      <p class="submit"><input type="submit" name="login" value="Login"></p>
    </form>
	<div class="login-help">
    <p style="background-color: black">Forgot your password? <a href="#">Click here to reset it</a>.<br>.</p>
  </div>
  </div>
</div>
	<?php
		if(isset($_POST['login'])){
				$name = $_POST['username'];
				$pass = $_POST['password'];
				
				//SQL Query
				$query = "SELECT * FROM `login` WHERE `username`='$name' and `password` = '$pass'";
				$res = $con->query($query);
				$role=0;
				if(mysqli_num_rows($res)>0){
					while($row = $res->fetch_assoc()){
						$role = $row['role'];
					}
					//Student
				if($role==2){
					$_SESSION['username']=$name;
					echo "<script>window.location='student/index'</script>";
				}
				//Faculty
				if($role==1){
					$_SESSION['username']=$name;
					echo "<script>window.location='faculty/index'</script>";
				}
				
				//Admin
				if($role==3){
					$_SESSION['username']=$name;
					echo "<script>window.location='admin/index'</script>";
				}
				}
				else{
				
				?>
				<script>	
					swal("Unable to login", "Incorrect username/password. Try again with correct credentials or use forgot password option", "error");
			//}
				</script>
	<?php
		}
		}
	?>
	</body>
</html>