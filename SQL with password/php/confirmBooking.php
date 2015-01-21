<?php

include 'dbConnect.php';

session_start();

$connect = connect_database();

$studentID = $_SESSION['s_admin'];
$cost = $_SESSION['cost'];
$points = $_SESSION['points'];
$b_date = $_SESSION['trackdate'];
$timefrom = $_SESSION['timefrom'];
$b_machine = $_SESSION['$b_machine'];
if( $connect ) {
$query = mysql_query ( "Select m_id from machine WHERE m_name = '$b_machine'"); 
while( $row=mysql_fetch_array($query) ) {
        $id = $row['m_id'];
	if( ($points - $cost) >= 0 ) 
	{	
		$queryDeduct = mysql_query(
			"UPDATE
				points
			SET
				p_points = p_points - '$cost'
			WHERE
				p_studentid = '$studentID'"
			);
			$duration = $cost * 60;
			$queryUpdate = mysql_query(
			"INSERT INTO trackmachine VALUES ('', '$id', '$studentID', '$duration', '$b_date', '$timefrom')"
			);
			$loguser= $studentID;
			$logaction = $studentID.' booked '.$b_machine.'('.$id.')'.' on '.$b_date.' ('.$timefrom.') '.' for '.$duration.'mins';
			$logcat = 'booking';
			include 'logfunction.php';

		
		echo "Booking successful!";
	} else {	//end of if( ($cost - $points) > 0 )
		echo "Insufficient points!";
	}
}} else {	//end of if( $connect )
	die('Could not connect to database!');
}
header('Refresh: 1.5; url=../student.php');

?>
