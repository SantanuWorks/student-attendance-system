<?php
	session_start();
	if( !isset($_SESSION['USER']) ) header('Location: index.php'); 
	if( !isset($_GET['go']) || $_GET['go'] == '') header('Location: userform.php'); 
	$web = $_GET['go'] ;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Semester Form</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1 >Semester Form</h1>
	<div class="main_box">
		<a href="<?php echo $web ;?>.php?sem=1"><button class="margin_10_10 height_button" >Semester 1</button></a>
		<a href="<?php echo $web ;?>.php?sem=2"><button class="margin_10_10 height_button" >Semester 2</button></a>
		<a href="<?php echo $web ;?>.php?sem=3"><button class="margin_10_10 height_button" >Semester 3</button></a>
		<a href="<?php echo $web ;?>.php?sem=4"><button class="margin_10_10 height_button" >Semester 4</button></a>
		<a href="userform.php"><input  class="margin_10_10" style="width: 100%" type="submit" name="cancel" value="Cancel"></a>
	</div>
</body>
</html>