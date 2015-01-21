<?php

session_start();

include 'dbConnect.php';

if( isset($_SESSION['staffid']) )
	$staffid = $_SESSION['staffid'];

$IPAdd = $_SERVER['SERVER_ADDR'];
if($IPAdd != '127.0.0.1')
$IPAdd = "cursakandine.dlinkddns.com";

$connect = connect_database();

if( $connect ) {
	$query = mysql_query("SELECT
							*
						FROM
							lecturer
						WHERE
							l_admin = '$staffid'");

	$row = mysql_fetch_array($query);
	$dblecturerid= $row['l_admin'];
	$dblecturername= $row['l_name'];
	$dblectureremail= $row['l_email'];
	$dblecturerpassword= $row['l_pass'];
	$name = $dblecturername;
	$to  = $dblectureremail;
	$subject = 'Your registeration with Fablab!';
	$body = "Dear $name,\n\nYou have been registered to the Staff Fab-Lab Reservation System! 
	\n\nYou need to activate your account and change your password immediately! To activate your account please click on the link below!";
	$body .= "\n\nhttps://$IPAdd/fyp/staffActivate.php?admin=$dblecturerid \n\n \n\nThis is your default password \n\n$dblecturerpassword";
	$headers = 'From: Fab-Lab Reservation System <fablab@reserve.com>';
	
	if(mail($to, $subject, $body, $headers)) {
		echo "Email has been sent $to";
	} else {
		echo "There was an error sending the mail.";
	}
	
}	//end of if( $connect )

header("Refresh: 1.5;url=../addEditLecturer.php");
?>
