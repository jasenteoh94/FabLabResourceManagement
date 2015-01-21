<?php

session_start();

include 'dbConnect.php';

$connect = connect_database();
//error_reporting(0);

if ( strpos($_SESSION['l_admin'], 's') !== false ){
	if( $_POST['id']) 
		{
		$id = $_POST['id'];
		$query = mysql_query("SELECT r_lecturerid FROM root WHERE r_lecturerid ='$id'");
		$numrows = mysql_num_rows($query);
			if( $numrows == 0 ) 
				{
echo $_POST['password'];				
			if($_POST['password'] == 'root'){
				$query2 = mysql_query(
				"INSERT INTO root VALUES ('', '$id')"
				);
$loguser= $_SESSION['l_admin'];
$logaction = 'WARNING! '.$loguser.' has added a root: '.$id;
$logcat = 'root';
include 'logfunction.php';
				echo "Successfully added root user";
				header("Refresh: 0;url=../addEditRoot.php");
				} else {echo("Super-User password is incorrect "); header("Refresh: 1.5;url=../addEditRoot.php"); }
				} 
			else
				{
				echo "The staff id that you haved entered is already root";
				header("Refresh: 1.5;url=../addEditRoot.php");
				}
		}
		else 
		{
		echo "Please fill in the staff id.";
		header("Refresh: 1.5;url=../addEditRoot.php");
		}
}	
else
{
echo "You do not have permission to perform this action";
header("Refresh: 2;url=../index.php");
}

disconnect_database($connect);

?>
