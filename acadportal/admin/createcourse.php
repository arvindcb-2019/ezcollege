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
		<div class="card col-6 ">
		  <h5 class="card-header">Add Courses</h5>
		  <div class="card-body align-self-center">
			<h5 class="card-title">Enter Course Details here</h5>
			<form action="createcourse" method="post">
			<table>
			<tr>
				<td>Course Code: </td>
				<td> <input type="text" name="code" placeholder="Course Code"onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Course Name: </td>
				<td> <input type="text" name="name" placeholder="Course Name"onkeyup="this.value = this.value.toUpperCase()" required /></td>
			</tr>
			<tr>
				<td>Credits: </td>
				<td> <input type="number" name="credit" required /></td>
			</tr>
			<tr>
				<td>Type: </td>
				<td> <input type="radio" name="type" value="T" />Theory<br>
				<input type="radio" name="type" value="L" />Lab<br>
				<input type="radio" name="type" value="P" />Project </td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
					<input type="submit" name="submit" class="btn btn-danger" value="Add Course">
					</center>
				</td>
			</tr>
			</table>
			</form>
		  </div>
		</div>
		<?php
			if(isset($_POST['submit'])){
				$code = $_POST['code'];
				$name = $_POST['name'];
				$credits = $_POST['credit'];
				$type = $_POST['type'];
				
				$res = $con->query("INSERT INTO `courses`(`coursecode`, `name`, `credits`, `type`) VALUES ('$code', '$name', $credits, '$type')");
				if($res){ ?>
					<script>
						swal("Course <?php echo $code ?> created", "Your course has been created successfully", "success");
					</script>
				<?php }
			}
		?>
	</body>
</html>