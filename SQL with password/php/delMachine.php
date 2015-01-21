<?php

session_start();

include 'dbConnect.php';

$connect = connect_database();
error_reporting(0);

if ( strpos($_SESSION['l_admin'], 's') !== false ){		
if( $_POST['id']) {
	$machineid = $_POST['id'];
	$query = mysql_query("SELECT * FROM machine WHERE m_id ='$machineid'");
    $numrows = mysql_num_rows($query);
	if( $numrows != 0 ) {

if( $connect ) {
	$query2 = mysql_query(
		"DELETE FROM machine WHERE m_id = '$machineid'"
		);
$loguser= $_SESSION['l_admin'];
$logaction = $_SESSION['l_admin'].' has deleted a machine: '.$machineid;
$logcat = 'machine';
include 'logfunction.php';
		echo "Delete Machine successful";
		header("Refresh: 0;url=../addMachine.php");
		} else die("Unable to connect!");
	} else {
		echo "This machine id does not exist";
		header("Refresh: 1.5;url=../addMachine.php");
		die();
	}
} else {
	echo "Please fill in machine id.";
	header("Refresh: 1.5;url=../addMachine.php");
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
