<?php
	    include 'navbar.php';

	    if (isset($_GET['id'])) 
	           {
				     $id = $_GET['id'];
				     $query = "SELECT * FROM tbl_uploads WHERE fileid = '$id'";
				     $result = mysqli_query($con,$query) or die('Error, query failed');
				     list($id, $file, $type, $size,$content) = mysqli_fetch_array($result);
				 				   //echo $id . $file . $type . $size;
				 				   //echo 'sampath';
				     header("Content-length: ".$size);
				     header("Content-type: ".$type);
				     header('Content-Disposition: attachment; filename="'.$file.'"');
					$context = stream_context_create();
					$filer = fopen($file, 'rb', FALSE, $context);
					while(!feof($filer))
					{
					   echo stream_get_contents($filer, max_bytes_to_read);
					}
					fclose($filer);
				     ob_clean();
				     flush();
		                     $content = stripslashes($content);
				     echo $content;
				     mysqli_close($connection);
				     exit;
	           }

	       ?>