<?php

session_start();

include 'dbConnect.php';

$connect = connect_database();
//error_reporting(0);

if ( strpos($_SESSION['l_admin'], 's') !== false ){		
	$classid = $_POST['class_id'];
	$checkclass = mysql_query("SELECT c_staffname,c_subject,c_staffid FROM class WHERE c_id='$classid'");
	while($row=mysql_fetch_array($checkclass))
	{
	$staffnameclass = $row['c_staffname'];
	$nameclass = $row['c_subject'];	
	$staffidclass = $row['c_staffid'];
	}
	$query2 = mysql_query(
		"DELETE FROM class WHERE c_id = '$classid'"
		);
$loguser= $_SESSION['l_admin'];
$logaction = $_SESSION['l_admin'].' has deleted class '.$nameclass.' that is created by '.$staffnameclass.'('.$staffidclass.')';
$logcat = 'class';
include 'logfunction.php';
		echo "Delete class successful";
		header("Refresh: 0;url=../staffClass.php");
	}
else
{
echo "You do not have permission to perform this action";
header("Refresh: 2;url=../index.php");
}
disconnect_database($connect);

?>
