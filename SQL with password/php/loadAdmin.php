<?php
error_reporting(0);
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="../js/attc.googleCharts.js"></script>
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
			<form action='loadAdmin.php' method='POST'><center>Enter Admin number (eg. p1234567): <input name='variable' type='text'><input type='submit' value='Submit'></center><br>
			</form><br>
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
			                        <th id="colDescription">Admin No</th>
			                        <th id="colValue1">Total Booking</th>
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

			$master = 'pmaster';
			$checkadmin = (!isset($_POST['variable']) ? $master : $_POST['variable']); 
			list($p, $adminnumberid) = explode("p", $checkadmin);

			if( $connect)
			{
			$queryGetAdmin = mysql_query( 
			      "SELECT DISTINCT tr_admin FROM trackmachine"
			      );
				  while( $row=mysql_fetch_array($queryGetAdmin) ) {
				  $adminnodist = $row['tr_admin'];
				  $printer = array($adminnodist=>0);
				  $laser = array($adminnodist=>0);
				  $totalbook = array($adminnodist=>0);
				  }
				  
			$queryGet = mysql_query( 
			      "SELECT * FROM trackmachine"
			      );

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
						   //Get the day user and sort by printer or laser
			;
					list($machinetype, $machinenumber) = explode("_", $machineid);
					if ($machinetype == 'P')
					$printer[$adminno]++;
					else
					$laser[$adminno]++;
					$totalbook[$adminno]++;
					}
			} // end of if connected

			$queryGetAdmin = mysql_query( 
			      "SELECT DISTINCT tr_admin FROM trackmachine"
			      );
				  
			if($checkadmin == 'pmaster')
			{
			while( $row=mysql_fetch_array($queryGetAdmin) ) {
				  $admindist = $row['tr_admin'];
					$content .= "<tr>
					<td>$admindist</td>
					<td>$totalbook[$admindist]</td>
					<td>$printer[$admindist]</td>
					<td>$laser[$admindist]</td>
					";
				  }
			}
			else
			{
			$content .= "<tr>
					<td>$checkadmin</td>
					<td>$totalbook[$checkadmin]</td>
					<td>$printer[$checkadmin]</td>
					<td>$laser[$checkadmin]</td>
					";
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
					<td><center><input type="submit" value='Download Report' formaction='csvDownload.php'></center></td>
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

$( document ).ready(function() {

	$("div.header a").removeClass("selected");
	$("#adminNo").addClass("selected");

});

</script>