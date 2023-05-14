<?php
	session_start();
	if( !isset($_SESSION['USER']) ) header('Location: index.php'); 
	if( !isset($_GET['sem']) || $_GET['sem'] == '') header('Location: userform.php'); 
	if( !isset($_GET['sub']) || $_GET['sub'] == '') header('Location: userform.php'); 
	if( !isset($_GET['mon']) || $_GET['mon'] == '') header('Location: userform.php'); 
?>

<?php
	$sem = $_GET['sem'] ;
	$sub = $_GET['sub'] ;
	$mon = $_GET['mon'] ;
	$servername = "localhost:3307";
	$username = "root";
	$password = "";
	$db = 'student' ;
	$conn = mysqli_connect($servername, $username, $password, $db);
	if(!$conn) header('location: adminform.php') ;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Attendance Status Form</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1 id="attend_head">Attendance Status Form</h1>
	<div class="big_main_box" >
		<div class="list_box" style="height: 300px;">
			<table style="width: 100%;">
				<?php	
					$qry = 'select studinfo.name, count(studinfo.name) as count from studinfo join attend on studinfo.id = attend.id and attend.sem = '.$sem.' and attend.sub = "'.$sub.'" and attend.mon = '.$mon.' group by studinfo.name order by studinfo.name ; ' ;

					$res = mysqli_query($conn, $qry) ;
					while($row = mysqli_fetch_assoc($res)){
						echo '<tr style="width:50%; text-align:left;" ><td>'.$row['name'].'</td><td>'.$row['count'].'</td></tr>' ;
					}
				?>
			</table>
		</div>
		<a href="userform.php"><input class="margin_10_10" type="submit" name="ok" value="OK"></a>
	</div>
</body>
</html>
