<?php

session_start();

?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
	<title>Log File</title>
</head>

<body>

<div class="wrap">

<?php include 'staffheader.php'; ?>

	<div class="content">
		<h2>
			View Log File
		</h2>
	<table width="100%" border ="1">
			<tr>		
				<td width ="10%"><b>Date</b></td>
				<td width ="10%"><b>Time</b></td>
				<td width = "10%"><b>User</b></td>
				<td width = "60%"><b>Action</b></td>		
				<td width = "10%"><b>Type</b></td>
			</tr>		
<?php
$content = "";

$connect = connect_database();

$date = date('Y-n-j'); //insert date here

echo "<form action='logfile.php' method='POST'><input type='submit' value='Click to refresh log'></form>";
    
//$query = mysql_query(	"SELECT * FROM logfile WHERE log_date='$date' Order by log_ID desc");

$query = mysql_query("Select * From logfile order by log_ID desc");
	
$numrows = mysql_num_rows($query);

if($numrows != 0) {
	while( $row = mysql_fetch_array($query) ) {
		$dbdate= $row['log_date'];
		$dbhour= $row['log_hour'];
		$dbmin= $row['log_min'];
		$dbsec= $row['log_sec'];
		$dbuser= $row['log_user'];
		$dbaction= $row['log_action'];
		$dbcat= $row['log_category'];
		$time=$dbhour.':'.$dbmin.':'.$dbsec;
		$content .="<tr>";
		$content .="<td width ='10%'>$dbdate</td>";
		$content .="<td width ='10%'>$time</td>";
		$content .="<td width ='10%'>$dbuser</td>";
		$content .="<td width ='60%'>$dbaction</td>";
		$content .="<td width ='10%'>$dbcat</td>";
		$content .="</tr>";
		$content .="</form>";
	}
} else echo("No rows found!");

echo $content;
?></table>
	</div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>
