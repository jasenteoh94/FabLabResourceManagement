<?php	

include 'dbConnect.php';

header('Content-Type: application/x-excel');
header('Content-Disposition: attachment; filename="log_report.csv"');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');

$headers = array('Machine ID','Admin Number','Duration','Date','Time');
echo(implode(',',$headers));
echo("\n");

$connect = connect_database();

$query = mysql_query("SELECT
						*
					FROM
						trackmachine");
		
while( $row = mysql_fetch_array($query) ) {
	$machineID = $row['tr_machineid'];
	$admin = $row['tr_admin'];
	$duration = $row['tr_duration'];
	$date = $row['tr_date'];
	$time = $row['tr_time'];

	$info = array($machineID, $admin, $duration, $date, $time);
	echo(implode(',',$info)); 
	echo("\n");
}

?>