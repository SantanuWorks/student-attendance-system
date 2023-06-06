<?php
	session_start(); 
	if( !isset($_SESSION['ADMIN']) ) header('Location: index.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Information</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1 >Add Information Form</h1>
	<div class="main_box">
		<a href="studentinfo.php"><button class="margin_10_10 height_button" >Add Student</button></a>
		<a href="teacherinfo.php"><button class="margin_10_10 height_button" >Add Teacher</button></a>
		<a href="logout.php"><button class="margin_10_10 height_button" >Logout</button></a>
		<a href="adminform.php"><button class="margin_10_10 height_button" >Cancel</button></a>
	</div>
</body>
</html>
