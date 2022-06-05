<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
		<center>
		<h3>My Academic Details</h3>
			<div class="col-8">
				<table class="table table-hover">
					<?php 
						if (!isset ($_GET['page']) ) {  
							$page = 1;  
						} else {  
							$page = $_GET['page'];  
						}
						//$res = $con->query("SELECT * FROM courses");
						$results_per_page = 10;  
						$page_first_result = ($page-1) * $results_per_page;
						$query = "select * from courses";  
						$result = mysqli_query($con, $query);  
						$number_of_result = mysqli_num_rows($result);  
						  
						//determine the total number of pages available  
						$number_of_page = ceil ($number_of_result / $results_per_page); 
 						
						$query = "SELECT *FROM courses LIMIT " . $page_first_result . ',' . $results_per_page;
						
						$res = mysqli_query($con, $query);  
      
						$i=1;
						while($rows=$res->fetch_assoc()){ ?>
							<tr>
								<td><?php echo $i; $i=$i+1;?></td>
								<td><?php echo $rows['coursecode']; ?></td>
								<td><?php echo $rows['name']; ?></td>
								<td><?php if($rows['type']=='T'){echo "Theory";}
								else if($rows['type']=='L'){echo "Lab";}
								else{echo "Project";} ?></td>
								<td><?php echo $rows['credits'] ?></td>
							</tr>
						<?php }
					?>
				</table>
			</div>
			<ul class="pagination">
			<?php 
			 
			for($page = 1; $page<= $number_of_page; $page++) {  ?>
			<li class="page-item"><?php  echo '<a class="page-link" href = "curriculum?page=' . $page . '">' . $page . ' </a>'; ?></li> 
			<?php }
			?>
			</ul>
		</center>
	</body>
</html>