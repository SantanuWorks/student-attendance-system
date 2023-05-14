<!DOCTYPE html>
<html>
<head>
	<title>Login Information</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1 >Attendance Management System</h1>
	<div class="main_box">
		<form method="post" action="index.php">
			<label >User name</label><br>
			<input class="margin_10_10" type="text" name="username"><br>
			<label>Password</label><br>
			<input class="margin_10_10" type="password" name="password"><br>
			<label>User Type</label><br>
			<select class="margin_10_10" name="usertype">
				<option value="1" selected >Administrator</option>
				<option value="2" >User</option>
			</select><br>
			<input class="margin_10_10" type="submit" name="submit" value="OK">
			<input class="margin_10_10" type="submit" name="cancel" value="Cancel">
		</form>
	</div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	$servername = "localhost:3307";
	$username = "root";
	$password = "";
	$db = 'student' ;
	$conn = mysqli_connect($servername, $username, $password, $db);
	if ($conn){
	$username = $_POST['username'] ;
	$password = $_POST['password'] ;
	$type = $_POST['usertype'] ;
	$user = '' ;
	$pass = '' ;
	$qry = '' ;
	$adminqry = 'select * from admin ;' ;
	$userqry = 'select * from user ;' ;
	if( $type == 1 ) $qry = $adminqry ; else $qry = $userqry ; 
	$res = mysqli_query($conn, $qry) ;
	if( mysqli_num_rows($res) > 0 )
		$row = mysqli_fetch_assoc($res) ;
		$user = $row['username'] ;
		$pass = $row['password']  ;
		if( $username == $user && $password == $pass ){
			if( $type == 1 ){
				session_start();
				$_SESSION['ADMIN'] = $user ;
				header("location: adminform.php") ;
			}
			else{
				session_start();
				$_SESSION['USER'] = $user ;
				header("location: userform.php") ;
			}
		}
		else header("location: index.php") ;
	}
}
?>