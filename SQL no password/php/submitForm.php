<?php

include 'dbConnect.php';

session_start();

$studentName = $_SESSION['s_name'];
$studentID = $_SESSION['s_admin'];
$partner = $_POST['partner'];
$lecturerID = $_POST['lecturer'];
$title = $_POST['title'];
$sypnosis = $_POST['sypnosis'];
$complete = $_POST['complete'];
$message = $_POST['message'];
$date = date('d-m-Y');

$connect = connect_database();

if($connect) {
	$query = mysql_query(
		"INSERT INTO proposal VALUES ('', '$studentName', '$studentID', '$partner', '$title', '$sypnosis', '$message', '$complete', 0, '$lecturerID', '', '$date')"
		);	
$loguser= $studentID;
$logaction = $loguser.' has submit proposal: '.$title.' to '.$lecturerID;
$logcat = 'proposal';
include 'logfunction.php';
	echo "Proposal sent!";
	header("Refresh: 0; ../student.php");
} else {
	die ("Unable to connect");
}
?>
