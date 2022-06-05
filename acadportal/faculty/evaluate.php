<?php
	include "navbar.php"
?>
<html>
	<head>
		<title>Evaluate Test</title>
	</head>
	<body>
		<?php 
			$user = $_SESSION['username'];
			$query = "SELECT * FROM examination WHERE teacherid='$user'";
			$res = $con->query($query);
		?>
		<center>
			<h3>Evaluate Test Submissions</h3>
			<form action="evaluate" method="POST">
				<select name="testname">
					<?php 
						while($rows = $res->fetch_assoc()){ ?>
						<option value="<?php echo $rows['testid']?>"><?php echo $rows['classgroup']." - ".$rows['testname']?></option>
					<?php } ?>
				</select>
				<input type="submit" class="btn btn-secondary" name="submit" value="Evaluate the Test" >
			</form>
			<?php
				if(isset($_POST['submit'])){
					$testname = $_POST['testname'];
					$query2 = "SELECT * FROM examination WHERE testid='$testname'";
					$result = $con->query($query2);
					$group; ?>
					<table>
					<?php 
						while($rows=$result->fetch_assoc()){ ?>
						<tr>
							<td>
								<h5><?php echo "Test Name: ".$rows['testname'] ?></h5>
							</td>
							<td rowspan="2">
							<?php 
								date_default_timezone_set("Asia/Kolkata");
								if($rows['enddate']<=date("Y-m-d")){
									if($rows['endtime']>date("H:i:s")){ 
							?>
								<div class="alert alert-success" role="alert">
									Test is in progress/not started.
								</div>
								<?php }								
								else{ ?>
								<div class="alert alert-danger" role="alert">
									Test has been conducted. Test is closed.
								</div>
								<?php } } ?>
							</td>
						</tr>
						<tr>
							<td>
								<h5><?php echo "GroupID: ".$rows['classgroup']."</h5>" ?>
							</td>
						</tr>
					<?php
						$group = $rows['classgroup'];
					} ?>
					</table>
					<?php
					$query3 = "SELECT * FROM student WHERE groupid='$group'";
					$result = $con->query($query3); 
						$submit = 0;
						$notsubmit = 0;
						while($rows=$result->fetch_assoc()){
							$un = $rows['username'];
							$query4 = "SELECT * FROM examstudent WHERE username='$un' AND testid='$testname'";
							$res = $con->query($query4);
							if($res->num_rows==0){
								$notsubmit = $notsubmit+1;
							}
							else{ 
								$submit = $submit+1;
							}
							}
					?>
					<h5>Exam Statistics:</h5>
							<button type="button" class="btn btn-success">
							  <span class="badge bg-secondary"><?php echo $submit ?></span>Files Submitted 
							</button>
							<button type="button" class="btn btn-warning text-white">
							  <span class="badge bg-secondary">0</span>Files Submitted Late
							</button>
							<button type="button" class="btn btn-danger">
							  <span class="badge bg-secondary"><?php echo $notsubmit ?></span>Files Not Submitted 
							</button>
					<table border=1 style="width:60%">
						<colgroup>
							<col width = "10"></col>
							<col width = "50"></col>
							<col width = "100"></col>
							<col width = "100"></col>
						 </colgroup>
						<tr>
							<th>S. No</th>
							<th>Student ID</th>
							<th>Name</th>
							<th>File Status</th>
						</tr>
			<?php
						$result = $con->query($query3);
						$id=1;
						while($rows=$result->fetch_assoc()){
							echo "<tr>";
							echo "<td>$id</td>";
							echo "<td>".$rows['username']."</td>";
							
							$un = $rows['username'];
							$query4 = "SELECT * FROM examstudent WHERE username='$un' AND testid='$testname'";
							$res = $con->query($query4);
							if($res->num_rows==0){
								echo "<td><code style='font-size: 20px'>".$rows['firstname']." ".$rows['lastname']."</code></td>";
								echo "<td><center><a href='#' class='btn btn-danger' >File Not Submitted </a></center></td>";
								$notsubmit = $notsubmit+1;
							}
							else{ 
								echo "<td>".$rows['firstname']." ".$rows['lastname']."</td>";
								$submit = $submit+1;
								while($link=$res->fetch_assoc()){ ?>
								<td><center><a target="_blank" href="<?php echo $link['file'] ?>" class="btn btn-success"> Download File </center></a></td>
							<?php }
							}
							echo "</tr>";
							$id=$id+1;
						}
			?>
					</table>
					<br>
					
			<?php
				}
			?>
		</center>
	</body>
</html>