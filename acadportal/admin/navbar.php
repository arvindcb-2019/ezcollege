<!DOCTYPE HTML>
<html>
	<head>
	<?php 
		include "config.php";
		session_start();
	?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Script code for Sweet Alert -->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #df9fdf">
		  <a class="navbar-brand" href="index">EZCollege Admin</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link" href="newuser">Add User</a>
			  </li>
			  <!--<li class="nav-item">
				<a class="nav-link" href="#"></a>
			  </li>-->
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Students
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="creategroup">Create Groups</a>
				  <a class="dropdown-item" href="editgroup">Edit Groups</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="createtimetable">Timetable</a>
				</div>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Faculty
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="createcourse">Allocate Courses</a>
				  <a class="dropdown-item" href="facgroup">Timetable Mapping</a>
				  <a class="dropdown-item" href="addfacgroup">Map to Group</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Manage Courses</a>
				</div>
			  </li>
			</ul>
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item">
				<a class="nav-link" href="logout">Log Out</a>
			  </li>
			  </ul>
		  </div>
		</nav>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>