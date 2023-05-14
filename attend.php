<?php
	session_start();
	if( !isset($_SESSION['USER']) ) header('Location: index.php'); 
	if( !isset($_GET['sem']) || $_GET['sem'] == '') header('Location: userform.php'); 
?>

<?php
	$sem = $_GET['sem'] ;
	$servername = "localhost:3307";
	$username = "root";
	$password = "";
	$db = 'student' ;
	$conn = mysqli_connect($servername, $username, $password, $db);
	if(!$conn) header('location: adminform.php') ;
	$qry = 'select * from studinfo where sem = '.$sem.' ;' ;
	$res = mysqli_query($conn, $qry) ;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Attendance Form</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1 id="attend_head">Attendance Form</h1>
	<div class="big_main_box">
		<form method="post" action="attend.php?sem=<?php echo $sem; ?>">
			<select class="margin_10_10" name="subject">
				<option value="c" >C Programming</option>
				<option value="cpp" >C++ Programming</option>
				<option value="java" >Java Programming</option>
				<option value="web" >Web Technology</option>
				<option value="db" >Database System</option>
				<option value="os" >Operating System</option>
			</select>
			<select class="margin_10_10" name="month">
				<option value="1" >January</option>
				<option value="2" >February</option>
				<option value="3" >March</option>
				<option value="4" >April</option>
				<option value="5" >May</option>
				<option value="6" >June</option>
				<option value="7" >July</option>
				<option value="8" >August</option>
				<option value="9" >September</option>
				<option value="10" >October</option>
				<option value="11" >November</option>
				<option value="12" >December</option>
			</select><br>
			<div class="list_box">
				<table>
					<?php
						while($row = mysqli_fetch_assoc($res)){
							echo '<tr><td><input type="checkbox" name="att[]" value="'.$row['id'].'"></td><td>'.$row['name'].'</td></tr>' ;
						}
					?>
				</table>
			</div>
			<input class="margin_10_10" type="submit" name="save" value="Save">
			<input class="margin_10_10" type="reset" name="clear" value="Clear">
			<input class="margin_10_10" type="submit" name="cancel" value="Cancel">
		</form>
	</div>
</body>
</html>

<?php
	if(isset($_POST['cancel'])) header('location: semform.php');
	$bqry = 'insert into attend values ( "' ;
	$qry = '' ;
	if(isset($_POST['save'])){
		$sub = $_POST['subject'] ;
		$mon = $_POST['month'] ;
		if( empty($_POST['att']) ) echo '<script>alert("Please select names!");</script>' ;
		else{
			foreach($_POST['att'] as $attended){
				$qry = $bqry.$attended.'", '.'"'.$sem.'", '.'"'.$mon.'", '.'"'.$sub.'" ) ;' ;
				$res = mysqli_query($conn, $qry) ;
				if(!$res) echo '<script>alert("Something is wrong!");</script>' ;
			}
		}
		
	}
?>