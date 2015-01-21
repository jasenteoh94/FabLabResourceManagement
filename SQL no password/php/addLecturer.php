<?php

session_start();

include 'dbConnect.php';

$connect = connect_database();
//error_reporting(0);

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";

if ( strpos($_SESSION['l_admin'], 's') !== false ){
	if( $_POST['id']&&$_POST['name']&&$_POST['school']&&$_POST['contact']&&$_POST['email']) 
		{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$school = $_POST['school'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$query = mysql_query("SELECT l_admin FROM lecturer WHERE l_admin ='$id'");
		$numrows = mysql_num_rows($query);
			if( $numrows == 0 ) 
				{
				$_SESSION['staffid'] = $id;
				$_SESSION['staffname'] = $name;
				$_SESSION['staffschool'] = $school;
				$_SESSION['staffcontact'] = $contact;
				$_SESSION['staffemail'] = $email;
				$password = substr( str_shuffle( $chars ), 0, 8 );
				$query2 = mysql_query(
				"INSERT INTO lecturer VALUES ('', '$name', '$id', '$password', '', '$school', '$contact', '$email')"
				);
$loguser= $_SESSION['l_admin'];
$logaction = $loguser.' has added a new lecturer: '.$id;
$logcat = 'root';
			include 'logfunction.php';
				echo "Successfully added Staff";
				header("Refresh: 0;url=staffEmail.php");
				} 
			else
				{
				echo "Staff ID Existed (No duplicate is allowed)";
				header("Refresh: 1.5;url=../addEditLecturer.php");
				}
		}
		else 
		{
		echo "Please fill in all values.";
		header("Refresh: 1.5;url=../addEditLecturer.php");
		}
}	
else
{
echo "You do not have permission to perform this action";
header("Refresh: 2;url=../index.php");
}

disconnect_database($connect);

?>
