<!DOCTYPE HTML>
<html>
	<head>
		<?php
			include "config.php";
			session_start();
		?>
		<title>EZCollege - Student </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Script code for Sweet Alert -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="index">EZCollege Student</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
		  <li class="nav-item">
			<a class="nav-link" href="timetable">Timetable</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="viewattendance">Attendance</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="viewmarks">Marks</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="exam.php">Examination/Test</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#mcqexam.php">MCQ Exam</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="curriculum">Curriculum</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="eduportalstudent">EduPortal</a>
		  </li>
		  
		</ul>
		<ul class="navbar-nav ml-auto">
				<li class="nav-item">
				<a class="btn btn-outline-warning" href="myprofile">My Profile</a>
			  </li>
			  <li class="nav-item">
				<p style="visibility: hidden">....</p>
			  </li>
			  <li class="nav-item">
				<a class="btn btn-outline-danger" href="logout">Log Out</a>
			  </li>
			  </ul>
	  </div>
</nav>
	
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>