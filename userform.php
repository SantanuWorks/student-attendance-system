<?php
	session_start();
	if( !isset($_SESSION['USER']) ) header('Location: index.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Form</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1 >User Form</h1>
	<div class="main_box">
		<a href="semform.php?go=attend"><button class="margin_10_10 height_button" >Attendence</button></a>
		<a href="semform.php?go=report"><button class="margin_10_10 height_button" >Report</button></a>
		<a href="logout.php"><button class="margin_10_10 height_button" >Logout</button></a>
		<a href="userform.php"><button class="margin_10_10 height_button" >Cancel</button></a>
	</div>
</body>
</html>
