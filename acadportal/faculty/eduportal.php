<html>
	<head>
		<?php include "navbar.php" ?>
	</head>
	<body>
	<form action="eduportal" method="POST" enctype="multipart/form-data">
		<input type="file" name="file" />
		<input type="submit" name="submit" />
	</form>
		<?php 
		if(isset($_POST['submit'])){
				$filename = $_FILES['file']['name'];
				$tmpname = $_FILES['file']['tmp_name'];
				$file_size = $_FILES['file']['size'];
				$file_type = $_FILES['file']['type'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				
				$fp      = fopen($tmpname, 'r');
				$content = fread($fp, filesize($tmpname));
				$content = addslashes($content);
				fclose($fp);

				if($ext=="png"||$ext=="PNG"||$ext=="JPG"||$ext=="jpg"||$ext=="jpeg"||$ext=="JPEG"
					||$ext=="pdf"||$ext=="PDF"||$ext=="doc"||$ext=="DOC"||$ext=="docx"||$ext=="DOCX"
					||$ext=="XLS"||$ext=="xls"||$ext=="XLSX"||$ext=="xlsx"||$ext=="xlsm"||$ext=="XLSM")
				{
				 $sql="INSERT INTO tbl_uploads(filename,filetype,size,data) VALUES('$filename','$file_type','$file_size','$content')";
					$i=mysqli_query($con,$sql);
					if ($i==1)
					{
						?>
					
					<script>
					alert('successfully uploaded');
					//window.location.href='index';
					</script>
					<?php
					mysqli_close($con);
					}
				else
					{


					?>
					<script>
					alert("error while uploading file");
					//window.location.href='index';
					</script>

					<?php 
					echo $sql;
					mysqli_close($con);
					}		

				
			}
			else
			{  mysqli_close($con);
				?>
					<script>
					alert('error File Format might not be supported, please check and try again');
					window.location.href='index';
					</script>
			<?php
				
			}
			}

			?>
	</form>
	</body>
</html>