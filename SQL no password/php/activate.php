<?php

include 'dbConnect.php';

$studentID = $_GET['admin'];
if(strlen($studentID)==8)
{
$connect = connect_database();

if($connect) {
	$queryCheck = mysql_query(
				"SELECT
					p_studentid
				FROM
					points
				WHERE
					p_studentid = '$studentID'"
				);
	$numrows = mysql_num_rows($queryCheck);
	if( $numrows != 0 ) {
		echo "Account already activated!";
	} else {
		$queryInsert = mysql_query(
						"INSERT INTO 
							points 
						VALUES 
							('', '$studentID', '', '', 10)"
						);	

		$queryUpdate = mysql_query(
				"UPDATE
					student
				SET
					s_activated = 1
				WHERE
					s_admin = '$studentID'"
				);
$loguser= $studentID;
$logaction =$loguser.' has been activated';
$logcat = 'activation';
include 'logfunction.php';
		echo "Account activated!";			
	}
	header ('Refresh:3; url=../index.php');
} else {	//end of if($connect)
	die('Unable to connect to database');
}
}
?>
