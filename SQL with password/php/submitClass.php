<?php

session_start();

include 'dbConnect.php';

$connect = connect_database();

$staffName = $_SESSION['l_name'];
$staffID = $_SESSION['l_admin'];

$subject = $_POST['subject'];
$date = $_POST['date'];

//---Start time---
	$startTime = $_POST['startHr'];
	$startTime .=':';
	$startTime .=$_POST['startMin'];
//---Start time---

//---End time---
	$endTime = $_POST['endHr'];
	$endTime .= ':';
	$endTime .= $_POST['endMin'];
//---End time---

$totalStudents = $_POST['totalStudents'];
$sypnosis = $_POST['sypnosis'];
$description = $_POST['description'];

if($_POST['subject']&&$_POST['date']&&$_POST['startHr']&&$_POST['startMin']&&$_POST['endHr']&&$_POST['endMin']&&$_POST['totalStudents']&&$_POST['sypnosis']&&$_POST['description']){
if( $connect ) {
	$date = date("Y-m-d",strtotime($date));

	$query = mysql_query(
		"INSERT INTO
			class
		VALUES
			('', '$staffName', '$staffID', '$subject', '$date', '$startTime', '$endTime', '0', '$totalStudents', '$sypnosis', '$description', '', '', '', '')"
		);
$loguser= $_SESSION['l_admin'];
$logaction = $_SESSION['l_admin'].' has created class '.$subject.' on '.$date. ' from '.$startTime.' to '.$endTime;
$logcat = 'class';
include 'logfunction.php';
	header('Refresh: 0; url=../staffClass.php');
} else {
	die("Couldn't connect to database!");
	header('Refresh: 2; url=../staffClass.php');
}
}
else
{ echo "No empty field is allowed";
header('Refresh: 1.5; url=../createClass.php');
}

?>
