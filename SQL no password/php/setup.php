<?php 
if($_POST['db_server']&&$_POST['db_username']&&$_POST['db_name']&&$_POST['root_id']&&$_POST['root_name']&&$_POST['root_password']&&$_POST['root_contact']&&$_POST['root_email']) 
{ $db_server = $_POST['db_server']; $db_username = 
$_POST['db_username']; 
$db_name = $_POST['db_name']; 
$rootname = $_POST['root_name']; 
$rootid = $_POST['root_id']; 
$rootpassword = $_POST['root_password']; 
$rootcontact = $_POST['root_contact']; 
$rootemail = $_POST['root_email']; 
$host = '$host'; 
$username = '$username'; 
$password = '$password'; 
$db = '$db'; 
$connect = '$connect'; 
$connection = '$connection'; 
$connectionfile = 
"<?php function connect_database() {
	$host = '$db_server';
	$username = '$db_username';
	$password = '$db_password';
	$db = '$db_name';
	$connect = mysql_connect($host, $username);
	mysql_select_db($db, $connect);
	return $connect;
}
function disconnect_database($connection) {
	mysql_close($connection);
}
?> "; 
$fh = fopen("dbConnect.php", 'w') or die("can't open file"); 
fwrite($fh, $connectionfile);
fclose($fh);
echo "Database connection 
file has been created<br>";
echo "Now creating SQL tables, please 
wait...<br>"; 

$conn = mysql_connect($db_server,$db_username);
 $createDatabase = "CREATE 
Database $db_name"; 
$returnvalues = mysql_query($createDatabase, $conn 
); 
if(! $returnvalues ) {
  die('Could not create database: ' . mysql_error());
}
echo "Database $db_name created successfully<br>";
$selectdb = 
mysql_select_db($db_name) or die("cannot use database");
$createTable = 
" CREATE TABLE IF NOT EXISTS adminpanel (
  ap_index int(11) NOT NULL,
  total_log int(255) NOT NULL,
  PRIMARY KEY (ap_index) )"; $returnvaluesTable = 
mysql_query($createTable, $conn ); 
if(! $returnvaluesTable ) die('Could 
not create table: ' . mysql_error()); 
else echo "Table adminpanel 
created successfully <br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS 
banlist (
  ba_adminno varchar(8) NOT NULL,
  ba_banby varchar(8) NOT NULL,
  ba_date varchar(11) NOT NULL,
  ba_reason varchar(255) NOT NULL,
  PRIMARY KEY (ba_adminno) )"; $returnvaluesTable = 
mysql_query($createTable, $conn ); 
if(! $returnvaluesTable ) die('Could 
not create table: ' . mysql_error()); 
else echo "Table banlist created 
successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS booking (
  b_id int(11) NOT NULL AUTO_INCREMENT,
  b_date date NOT NULL,
  b_machine varchar(150) NOT NULL,
  b_timefrom time NOT NULL,
  b_timeto time NOT NULL,
  b_admin varchar(50) NOT NULL,
  b_taken tinyint(1) NOT NULL,
  PRIMARY KEY (b_id) )"; 
$returnvaluesTable = mysql_query($createTable, 
$conn ); 
if(! $returnvaluesTable ) die('Could not create table: ' . 
mysql_error()); 
else echo "Table booking created successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS class (
  c_id int(11) NOT NULL AUTO_INCREMENT,
  c_staffname varchar(150) NOT NULL,
  c_staffid varchar(50) NOT NULL,
  c_subject varchar(150) NOT NULL,
  c_date date NOT NULL,
  c_timestart varchar(50) NOT NULL,
  c_timeend varchar(50) NOT NULL,
  c_filled int(50) NOT NULL,
  c_totalstudents int(50) NOT NULL,
  c_sypnosis text NOT NULL,
  c_description text NOT NULL,
  c_studentid text NOT NULL,
  c_studentname text NOT NULL,
  c_attend text NOT NULL,
  c_orientation tinyint(1) NOT NULL,
  PRIMARY KEY (c_id) )"; 
$returnvaluesTable = mysql_query($createTable, 
$conn ); 
if(! $returnvaluesTable ) die('Could not create table: ' . 
mysql_error()); 
else echo "Table class created successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS lecturer (
  l_id int(11) NOT NULL AUTO_INCREMENT,
  l_name varchar(50) NOT NULL,
  l_admin varchar(50) NOT NULL,
  l_pass varchar(50) NOT NULL,
  l_newpass varchar(50) NOT NULL,
  l_school varchar(50) NOT NULL,
  l_contact int(20) NOT NULL,
  l_email varchar(150) NOT NULL,
  PRIMARY KEY (l_id) )"; 
$returnvaluesTable = mysql_query($createTable, 
$conn ); 
if(! $returnvaluesTable ) die('Could not create table: ' . 
mysql_error()); 
else echo "Table lecturer created successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS logfile (
  log_date varchar(10) NOT NULL,
  log_hour varchar(2) NOT NULL,
  log_min varchar(2) NOT NULL,
  log_sec varchar(2) NOT NULL,
  log_user varchar(8) NOT NULL,
  log_action text NOT NULL,
  log_category text NOT NULL,
  log_ID int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (log_ID) )"; 
$returnvaluesTable = 
mysql_query($createTable, $conn ); 
if(! $returnvaluesTable ) die('Could 
not create table: ' . mysql_error()); 
else echo "Table logfile created 
successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS machine (
  m_index int(5) NOT NULL AUTO_INCREMENT,
  m_id varchar(7) NOT NULL,
  m_name varchar(150) NOT NULL,
  m_available tinyint(1) NOT NULL,
  m_venue varchar(50) NOT NULL,
  PRIMARY KEY (m_index) )"; 
$returnvaluesTable = 
mysql_query($createTable, $conn ); 
if(! $returnvaluesTable ) die('Could 
not create table: ' . mysql_error()); 
else echo "Table machine created 
successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS points (
  p_id int(11) NOT NULL AUTO_INCREMENT,
  p_studentid varchar(50) NOT NULL,
  p_action varchar(150) NOT NULL,
  p_datetime varchar(50) NOT NULL,
  p_points int(20) NOT NULL,
  PRIMARY KEY (p_id) )"; 
$returnvaluesTable = mysql_query($createTable, 
$conn ); 
if(! $returnvaluesTable ) die('Could not create table: ' . 
mysql_error()); 
else echo "Table points created successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS proposal (
  pr_id int(11) NOT NULL AUTO_INCREMENT,
  pr_studentname varchar(150) NOT NULL,
  pr_studentid varchar(50) NOT NULL,
  pr_partnerid varchar(50) NOT NULL,
  pr_title varchar(150) NOT NULL,
  pr_sypnosis text NOT NULL,
  pr_message text,
  pr_complete varchar(50) NOT NULL,
  pr_approve tinyint(1) NOT NULL,
  pr_lecturerid varchar(50) NOT NULL,
  pr_awarded int(20) NOT NULL,
  pr_datetime varchar(50) NOT NULL,
  PRIMARY KEY (pr_id) )"; 
$returnvaluesTable = mysql_query($createTable, 
$conn ); 
if(! $returnvaluesTable ) die('Could not create table: ' . 
mysql_error()); 
else echo "Table proposal created successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS root (
  r_id int(11) NOT NULL AUTO_INCREMENT,
  r_lecturerid varchar(20) NOT NULL,
  PRIMARY KEY (r_id) )"; $returnvaluesTable = mysql_query($createTable, 
$conn ); 
if(! $returnvaluesTable ) die('Could not create table: ' . 
mysql_error()); 
else echo "Table root created successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS student (
  s_id int(11) NOT NULL AUTO_INCREMENT,
  s_name varchar(150) NOT NULL,
  s_admin varchar(50) NOT NULL,
  s_pass varchar(50) NOT NULL,
  s_school varchar(150) NOT NULL,
  s_diploma varchar(50) NOT NULL,
  s_contact int(20) NOT NULL,
  s_email varchar(150) NOT NULL,
  s_activated tinyint(1) NOT NULL,
  s_orientated tinyint(1) NOT NULL,
  PRIMARY KEY (s_id) )"; 
$returnvaluesTable = mysql_query($createTable, 
$conn ); 
if(! $returnvaluesTable ) die('Could not create table: ' . 
mysql_error()); 
else echo "Table student created successfully<br>"; 
$createTable = " CREATE TABLE IF NOT EXISTS trackmachine (
  tr_trackid int(11) NOT NULL AUTO_INCREMENT,
  tr_machineid varchar(150) NOT NULL,
  tr_admin varchar(150) NOT NULL,
  tr_duration int(50) NOT NULL,
  tr_date varchar(150) NOT NULL,
  tr_time varchar(150) NOT NULL,
  PRIMARY KEY (tr_trackid) )"; 
$returnvaluesTable = 
mysql_query($createTable, $conn ); 
if(! $returnvaluesTable ) die('Could 
not create table: ' . mysql_error()); 
else echo "Table trackmachine 
created successfully<br>"; 

$lecturerSQL = "INSERT INTO lecturer VALUES 
('', '$rootname', '$rootid', '$rootpassword', '', 'ROOT', 
'$rootcontact', '$rootemail')"; 
$lectureraccount = mysql_query($lecturerSQL, $conn ); 
$rootSQL = "INSERT INTO root VALUES ('', '$rootid')"; 
$rootaccount = mysql_query($rootSQL, $conn ); if(! 
$lectureraccount && !$rootaccount ) die('Could not create root 
account: ' . mysql_error()); else echo "Root Account created 
successfully<br>";

echo"You have finish setting up your Fab Lab Resource Management System<br>";
echo"Now you need to change your password for encryption purposes<br>";
echo"You will be redirect...";

header("Refresh: 5;url=../staffActivate.php");
}
?>
