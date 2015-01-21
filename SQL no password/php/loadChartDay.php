<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="../js/attc.googleCharts.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <!--optional css-->
    <link rel="stylesheet" type="text/css" href="../css/attc.css">
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
        <title>View History</title>
</head>
<body>

	<div class="wrap">

		<?php include 'logheader.php'; ?>

		<div class="content">
			<form id='selectInfo' action='loadChartDay.php' method='POST'><center>Enter date (eg. 2014-1-13): <input name='variable' type='text' id='datepicker'><input type='submit' value='Submit'></center></form><br>
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
			                        <th id="colDescription">Time</th>
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

			$connect = connect_database();

			$day = array('08', '09', '10', '11', '12', '13', '14', '15', '16');
			$x = 0;
			$totalusers = 0;
			$user = array('08'=>0, '09'=>0, '10'=>0, '11'=>0, '12'=>0, '13'=>0, '14'=>0, '15'=>0, '16'=>0);
			$printer = array('08'=>0, '09'=>0, '10'=>0, '11'=>0, '12'=>0, '13'=>0, '14'=>0, '15'=>0, '16'=>0);
			$laser = array('08'=>0, '09'=>0, '10'=>0, '11'=>0, '12'=>0, '13'=>0, '14'=>0, '15'=>0, '16'=>0);

			$todaydate = date("Y-n-j");
			list($todayyear, $todaymonthvalue, $todayday) = explode("-", $todaydate);

			$checkdate = (!isset($_POST['variable']) ? $todaydate : $_POST['variable']); 
			echo "<center><h1>$checkdate</h1></center>";
			if( $connect )
			{
				$queryGet = mysql_query( "SELECT * FROM trackmachine WHERE tr_date = '$checkdate'");
					
				  while( $row=mysql_fetch_array($queryGet) ) {
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
						   //Get the today user and sort by printer or laser
					list($hour, $min, $sec) = explode(":", $dbtime);
					if ($dbdate == $checkdate)
					{
					$user[$hour]++;
					list($machinetype, $machinenumber) = explode("_", $machineid);
					if ($machinetype == 'P')
					$printer[$hour]++;
					else
					$laser[$hour]++;
					$totalusers++;
					}
			} // end of while
			} // end of if connected

				while($x!=9)
				{
				$timecheck = $day[$x];
				$timename = 'pm';
				if ($timecheck < 12)
				{
					$timename = 'am';
					if ($timecheck > 12)
					$day[$x] = $day[$x] - 12;
				}
				else
				{
				if ($timecheck > 12)
					$day[$x] = $day[$x] - 12;
				}
				
					$content .= "<tr>
					<td>$day[$x] $timename</td>
					<td>$user[$timecheck]</td>
					<td>$printer[$timecheck]</td>
					<td>$laser[$timecheck]</td>
					";
					$x++;
				}


			echo $content;
			?>
					</tr>
			        </tbody>
			</table>
			<div id="TrackingDataPie"></div>
			<table><tr>
				<form>
					<td><center><input type="submit" value='Back' formaction='../adminPanel.php'></center></td>
					<td><center><input type="submit" value='Machine Usage' formaction='loadMachineUsage.php'></center></td>
				</form>
				</tr>
				</table>
				
			</div>			
		</div>
	</div>

	<?php include '../footer.php'; ?>

</body>
</html>

<script>
  $(function() {

    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-m-dd',  
      onSelect: ("option", "onSelect", function() { 
        $( "#selectInfo" ).submit();
      } )
    });

});

$( document ).ready(function() {

	$("div.header a").removeClass("selected");
	$("#day").addClass("selected");

});

</script>
