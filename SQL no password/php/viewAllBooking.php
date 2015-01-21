<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="../js/attc.googleCharts.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/jsapi.js"></script>
	<script src="../js/jquery.min.js"></script>
    <!--optional css-->
    <link rel="stylesheet" type="text/css" href="../css/attc.css">
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
        <title>View All Booking</title>
</head>
<body>
	<div class="wrap">

		<?php include 'logheader.php'; ?>

		<div class="content">
			<div class="mainContent">
			<table
			title="Tracking Data" 
			                id="TrackingData" 
			                summary="Description of table" 
			                data-attc-createChart="true"
			                data-attc-colDescription="colDescription" 
			                data-attc-colValues="colValue1" 
			                data-attc-location="TrackingDataPie" 
			                data-attc-hideTable="true" 
			                data-attc-type="pie"
			                data-attc-googleOptions='{"is3D":true}'
			                data-attc-controls='{"showHide":true,"create":true,"chartType":true}'>
			        <thead>
			                <tr>
			                        <th id="colDescription">Date</th>
			                        <th id="colValue1">Number of Booking</th>
									<th>3D Printer Only</th>
									<th>Laser Cutter Only</th>
			                </tr>
			        </thead>
			        <tbody>
					<tr>
			<?php
			$content = " ";
			$extracontent = " ";
			$countdate = 0;
			$availabledate = array();
			$printer = array();
			$laser = array();
			$user = array();

			$connect = connect_database();

			if( $connect )
			{

					$queryGetDateName = mysql_query( 
			      "SELECT DISTINCT tr_date FROM trackmachine ORDER BY tr_date DESC"
			      );
				  
				  while( $row=mysql_fetch_array($queryGetDateName) )
				  {
				  $availabledate[] = $row['tr_date'];
				  $printer[] = 0;
				  $laser[] = 0;
				  $user[] = 0;
				  $countdate++;
				  }
				  
					$queryGetDate = mysql_query( 
			      "SELECT * FROM trackmachine ORDER BY tr_date DESC"
			      );
					$x = 0;
				  while( $row=mysql_fetch_array($queryGetDate) ) {
			        $id = $row['tr_trackid'];
			        $machineid = $row['tr_machineid'];
			        $adminno = $row['tr_admin'];
					$duration = $row['tr_duration'];
					$dbdate = $row['tr_date'];
					$dbtime = $row['tr_time'];
			        $extracontent .= "
							<tr>
			                    <td>$id</td>
								<td>$machineid</td>
								<td>$adminno</td>
								<td>$duration</td>
								<td>$dbdate</td>
								<td>$dbtime</td>
			               </tr>";
					if($dbdate == $availabledate[$x])
					{
					list($machinetype, $machinenumber) = explode("_", $machineid);
					if ($machinetype == 'P')
					$printer[$x]++;
					else
					$laser[$x]++;
					$user[$x]++;
					}
					else
					{
					$x++;
					list($machinetype, $machinenumber) = explode("_", $machineid);
					if ($machinetype == 'P')
					$printer[$x]++;
					else
					$laser[$x]++;
					$user[$x]++;
					}
			} // end of while
			} // end of if connected

			$x = 0;

			while($countdate > $x )
				  {
					$content .= "<tr>
					<td>$availabledate[$x]</td>
					<td>$user[$x]</td>
					<td>$printer[$x]</td>
					<td>$laser[$x]</td>
					";
					$x++;
				}
				echo $content;
			?>
					</tr>
			        </tbody>
			</table>

			<div id="TrackingDataPie"></div><br>
			<!--<table><<tr>
				<form>
					<td><center><input type="submit" value='Back' formaction='../adminPanel.php'></center></td>
					<td><center><input type="submit" value='Download Report' formaction='csvDownload.php'></center></td>
				</form>
				</tr>
				</table>-->
				<table>
				<tr>
					<td>Track ID</td>
					<td>Machine ID</td>
					<td>Admin Number</td>
					<td>Duration</td>
					<td>Date</td>
					<td>Time</td>
				</tr>
			<?php
			echo $extracontent
			?>
</table>
<br>
<table><form><td><center><input type="submit" value='Back' formaction='../adminPanel.php'></center></td>
<td><center><input type ="submit" value = 'Download Report' formaction='csvDownload.php'></center></td></form></tr></table>
			</div>			
		</div>
	</div>

	<?php include '../footer.php'; ?>

</body>
</html>

<script>

$( document ).ready(function() {

	$("div.header a").removeClass("selected");
	$("#allBooking").addClass("selected");

});

</script>
