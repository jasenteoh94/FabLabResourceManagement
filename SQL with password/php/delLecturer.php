<?php

session_start();

include 'dbConnect.php';

$connect = connect_database();
error_reporting(0);

if ( strpos($_SESSION['l_admin'], 's') !== false ){		
if( $_POST['id']) {
	$StaffID = $_POST['id'];
	$query = mysql_query("SELECT * FROM lecturer WHERE l_admin ='$StaffID'");
    $numrows = mysql_num_rows($query);
	if( $numrows != 0 ) {

if( $connect ) {
	$query2 = mysql_query(
		"DELETE FROM lecturer WHERE l_admin = '$StaffID'"
		);
$loguser= $_SESSION['l_admin'];
$logaction =$loguser.' has remove a lecturer: '.$StaffID;
$logcat = 'root';
include 'logfunction.php';
		echo "Delete Lecturer successful";
		header("Refresh: 0;url=../addEditLecturer.php");
		} else die("Unable to connect!");
	} else {
		echo "This lecturer id does not exist";
		header("Refresh: 1.5;url=../addEditLecturer.php");
		die();
	}
} else {
	echo "Please fill in lecturer id.";
	header("Refresh: 1.5;url=../addEditLecturer.php");
	die();
}
}	
else
{
echo "You do not have permission to perform this action";
header("Refresh: 2;url=../index.php");
}
disconnect_database($connect);

?>
