<?php 

$logdate = date('Y-n-j');
$logtime = date('H:i:s');
list($loghour, $logmin, $logsec) = explode(":", $logtime);

$querylog = mysql_query("INSERT INTO logfile VALUES ('$logdate', '$loghour', '$logmin', '$logsec', '$loguser', '$logaction', '$logcat', '')");

$querylogupdate = mysql_query("UPDATE adminpanel SET total_log=total_log+ap_index");
?>
