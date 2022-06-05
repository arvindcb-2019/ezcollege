<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
		<?php
			/*$user = $_SESSION['username'];
			$pre = $con->query("SELECT groupid FROM student WHERE username='$user'");
			$group='';
			while($preres = $pre->fetch_assoc()){
				$group=$preres['groupid'];
			}
			//Getting slot name
			$res = $con->query("SELECT DISTINCT(slot) AS slot FROM attendance WHERE stu_id='$user'");
			$rows = $res->fetch_all();
			//Processing through every slot
			foreach ($rows as $row){
				$slot = $row[0];
				echo $slot."<br>";
				//Getting Subject name
				$res1 = $con->query("SELECT $slot FROM timetable WHERE groupname='$group'");
				$subname='';
				while($row1 = $res1->fetch_assoc()){
					$subname = $row1[$slot];
				}
				echo $subname."<br>"; 
				
				//Getting faculty ID
				$res2 = $con->query("SELECT fac_id FROM attendance WHERE slot='$slot' AND stu_id='$user'");
				$facid='';
				while($row2 = $res2->fetch_assoc()){
					$facid = $row2['fac_id'];
				}
				echo $facid."<br>";
				//Getting faculty name
				$res3 = $con->query("SELECT firstname, lastname FROM faculty WHERE username='$facid'");
				while($row3 = $res3->fetch_assoc()){
					$facname = $row3['firstname']." ".$row3['lastname'];
				}
				echo $facname."<br>";
				//Getting count of attended classes
				$res4 = $con->query("SELECT COUNT(*) AS present FROM attendance WHERE status='Present' AND slot='$slot' AND stu_id='$user'");
				while($row4 = $res4->fetch_assoc()){
					$present = $row4['present'];
				}
				echo $present."<br>";
				//Getting count of total classes
				$res5 = $con->query("SELECT COUNT(*) AS total FROM attendance WHERE slot='$slot' AND stu_id='$user'");
				while($row5 = $res5->fetch_assoc()){
					$total = $row5['total'];
				}
				echo $total."<br>";
				//Calculating Percentage
				$att = ($present/$total)*100;
				echo number_format($att)."<br>";
				
				//Button for Viewing 
				
			}
				
		*/	
		?>
		<!--<table>
							<tr>
								<th>S. No</th>
								<th>Date</th>
								<th>Day</th>
								<th>Status</th>
							</tr>
							<?php 
								$prmodal = $con->query("SELECT * FROM attendance WHERE stu_id='$user' AND slot='$slot'");
								$i=1;
								while($prows = $prmodal->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $i; $i=$i+1; ?></td>
								<td><?php echo $prows['date']?></td>
								<td><?php echo $prows['date']; ?></td>
								<td <?php if($prows['status']=='Present'){ echo "class='table-success'"; } else{ echo "class='table-danger'"; } ?>><?php echo $prows['status'] ?></td>
							</tr> 
								<?php } ?>
						</table> -->
						<a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg">Launch demo modal</a>

<div class="modal fade" id="myModal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Modal title</h4>
    </div>
    <div class="modal-body">
      <table>
          <thead>
          </thead>
          <tbody class="table">
              <tr>
                  <td>1</td>
                  <td>2</td>
              </tr>
              <tr>
                  <td>3</td>
                  <td>4</td>
              </tr>
          </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	</body>
</html>