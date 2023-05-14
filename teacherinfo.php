<?php
	session_start();
	if( !isset($_SESSION['ADMIN']) ) header('Location: index.php'); 
	if(isset($_POST['cancel'])) header('location: adminform.php');
?>

<?php
	$servername = "localhost:3307";
	$username = "root";
	$password = "";
	$db = 'student' ;
	$conn = mysqli_connect($servername, $username, $password, $db);
	if(!$conn) header('location: adminform.php') ;
	$qry = 'select * from teainfo;' ;
	$res = mysqli_query($conn, $qry) ;
	$teaid = mysqli_num_rows($res) + 1 ;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Teacher Information</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1 >Teachers Information</h1>
	<div class="main_box">
		<form action="teacherinfo.php" method="post">
			<label>Teacher Id</label><br>
			<input class="margin_10_10" type="text" name="teaid" disabled value="<?php echo $teaid ; ?>"><br>
			</select><br>
			<label>Teacher Name</label><br>
			<input class="margin_10_10" type="text" name="name" ><br>
			</select><br>
			<input class="margin_10_10" type="submit" name="save" value="Save">
			<input class="margin_10_10" type="reset" name="clear" value="Clear">
			<input class="margin_10_10" type="submit" name="cancel" value="Cancel">
		</form>
	</div>
</body>
</html>

<?php
if(isset($_POST['save'])){
	$name = $_POST['name'] ;
	$qry = 'insert into teainfo values ( "'.$teaid.'", "'.$name.'" );' ;
	$res = mysqli_query($conn, $qry) ;
	if($res) header("location: adminform.php") ;
	else header('location: teacherinfo.php') ;
}
?>