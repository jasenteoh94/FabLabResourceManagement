<?php

include 'php/dbConnect.php';

$name = $_SESSION['l_name'];
$admin = $_SESSION['l_admin'];

$connect = connect_database();

?>

<div class="header">

  <div class="upper">
    <p>
      <?php echo "Welcome, $name&nbsp;&nbsp;&nbsp;&nbsp;ID: $admin" ?>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <a href="logout.php"><img src="img/logout.png">Logout</a>
    </p>
  </div>

  <p class="title">
    <a href="staff.php">Fab-lab <br>Resource Management<br> System</a>
  </p>
  <a href="staff.php"><img width="400px" height="200px" src="img/fablab.jpg"></a>

  <ul class="staffNav">
<li>
      <a href="readRequest.php"><img src="img/request.png">Read Request</a>     
    </li>
    <li>
      <a href="staffClass.php"><img src="img/classes.png">Classes</a>       
    </li>
    <li>
<?php
	//session_start();
	$query = mysql_query("SELECT r_lecturerid FROM root WHERE r_lecturerid ='$admin'");
	$numrows = mysql_num_rows($query);
	if($numrows != 0)
	echo'<a href="logfile.php"><img src="img/addpoint.png">View Log File</a></li><li><a href="adminPanel.php"><img src="img/setting.png">Admin Panel</a></li>' ;
     ?>
  </ul> 
</div>
