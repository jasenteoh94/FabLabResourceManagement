<?php

session_start();

include 'dbConnect.php';

$connect = connect_database();
error_reporting(0);

if ( strpos($_SESSION['l_admin'], 's') !== false ){		
if( $_POST['id']) {
	$StaffID = $_POST['id'];
	$query = mysql_query("SELECT * FROM root WHERE r_lecturerid ='$StaffID'");
    $numrows = mysql_num_rows($query);
	if( $numrows != 0 ) {

if( $_POST['password'] == 'root' ) {
	$query2 = mysql_query(
		"DELETE FROM root WHERE r_lecturerid = '$StaffID'"
		);
$loguser= $_SESSION['l_admin'];
$logaction =$loguser.' has remove a root: '.$StaffID;
$logcat = 'root';
include 'logfunction.php';
		echo "Delete root successful";
		header("Refresh: 0;url=../addEditRoot.php");
		} else {echo("Super-User password is incorrect "); header("Refresh: 1.5;url=../addEditRoot.php"); }
	} else {
		echo "This staff id does not exist";
		header("Refresh: 1.5;url=../addEditRoot.php");
		die();
	}
} else {
	echo "Please fill in staff id.";
	header("Refresh: 1.5;url=../addEditRoot.php");
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
