<?php

session_start();

include 'dbConnect.php';

$connect = connect_database();
//error_reporting(0);

	if( $_POST['defaultpass']&&$_POST['newpass']&&$_POST['confirmnewpass']&&$_POST['staffid']) 
		{
		$default = $_POST['defaultpass'];
		$lecturerid =$_POST['staffid'];
		$new = $_POST['newpass'];
		$confirm = $_POST['confirmnewpass'];
		$passwordset = md5($confirm.$default);
		$query = mysql_query("SELECT * FROM lecturer WHERE l_admin ='$lecturerid'");
		$row = mysql_fetch_array($query);
		$dbdefault = $row['l_pass'];
		$dbname = $row['l_name'];
		if($default==$dbdefault&&$new==$confirm)
		{
				$query2 = mysql_query(
				"UPDATE lecturer SET l_newpass='$passwordset' WHERE l_admin ='$lecturerid'"
				);
$loguser= $lecturerid;
$logaction = $lecturerid.' has been activated.';
$logcat = 'activation';
			include 'logfunction.php';
				echo "Successfully updated password";
				$_SESSION['l_name'] = $dbname ;
				$_SESSION['l_admin'] = $lecturerid ;
				header("Refresh: 2;url=../index.php");
				} 
			else
				{
				echo "Either your password is wrong or your password is not matched";
				header("Refresh: 1.5;url=../staffActivate.php");
				}
		}
		else 
		{
		echo "Please fill in all values.";
		header("Refresh: 1.5;url=../staffActivate.php");
		}

disconnect_database($connect);

?>
