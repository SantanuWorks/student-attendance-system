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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Report | Short List Form</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1 id="attend_head">Short List Form</h1>
	<div class="big_main_box" >
		<form method="post" action="report.php?sem=<?php echo $sem; ?>">
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
			<input class="margin_10_10" type="submit" name="view" value="View">
		</form>
		<div class="list_box" style="height: 300px;">
			<table>
				<?php
					$on = 0 ;
					if( isset($_POST['view']) ){
						$on = 1 ;
						$sub = $_POST['subject'] ;
						$mon = $_POST['month'] ;
						$qry = 'select distinct studinfo.name from studinfo join attend on studinfo.id = attend.id and attend.sem = '.$sem.' and attend.sub = "'.$sub.'" and attend.mon = '.$mon.' order by studinfo.name ; ' ;
						$res = mysqli_query($conn, $qry) ;
						while($row = mysqli_fetch_assoc($res)){
							echo '<tr><td>'.$row['name'].'</td></tr>' ;
						}
					}
				?>
			</table>
		</div>
		<a href="status.php?sem=<?php echo $sem ; ?>&sub=<?php echo $sub ; ?>&mon=<?php echo $mon ; ?>"><input class="margin_10_10" type="submit" name="save" value="View Status" <?php  if($on == 0) echo 'disabled' ; ?> ></a>
		<a href="userform.php"><input class="margin_10_10" type="submit" name="ok" value="OK"></a>
	</div>
</body>
</html>
