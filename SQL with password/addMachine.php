<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<title>Add Machine</title>
</head>

<body>

<div class="wrap">

	<?php 
	session_start();
	include 'staffheader.php'; ?>

	<div class="content">
		<table width ="100%">
		<form action="php/addMachine.php" method="POST">
		<tr>
				<td>Machine ID:</td>
				<td><input type="text" name="id" width ="300"></td>
			</tr>
			<tr>
				<td>Machine Name:</td>
				<td><input type="text" name="name" width ="300"></td>
			</tr>
			<tr>
				<td>Venue:</td>
				<td><input type="text" name="venue" width ="300"></td>
			</tr>
		<tr>
		<td width = "16%"></td>
		<td width = "84%"><input type="submit" value="Add Machine"></td>
		</tr></form>

		<h2>
					Add/View Machines
				</h2>
				<table width="100%" border ="1">
					<tr>		
						<td width ="20%"><b>Machine ID</b></td>
						<td width ="30%"><b>Machine Name</b></td>
						<td width = "30%"><b>Venue</b></td>
						<td width = "20%"><b>Available</b></td>			
					</tr>
					
		<?php
		$content = "";

		$connect = connect_database();

		$query = mysql_query(
			"SELECT * FROM machine Order by m_id");
			
		$numrows = mysql_num_rows($query);

		if($numrows != 0) {
			while( $row = mysql_fetch_array($query) ) {
				$dbmachineid= $row['m_id'];
				$dbmachinename = $row['m_name'];
				$dbavailable = $row['m_available'];
				$dbvenue = $row['m_venue'];
				$content .="<tr>";
				$content .="<td width ='20%'>$dbmachineid</td>";
				$content .="<td width ='30%'>$dbmachinename</td>";
				$content .="<td width ='30%'>$dbvenue</td>";
				$content .="<td width ='20%'>$dbavailable</td>";
				$content .="</tr>";
				$content .="</form>";
			}
		} else echo("No rows found!");

		echo $content;

		?>
			</table>

			<hr>
			<h2>Delete Machine</h2>
			<table width ="100%">
			<form action="php/delMachine.php" method="POST" onsubmit="return confirm('WARNING! This action cannot be undo. Do you sure you want to delete?')">
		<tr>
				<td>Machine ID:</td>
				<td><input type="text" name="id" width ="300"></td>
			</tr>
		<tr>
		<td width = "16%"></td>
		<td width = "84%"><input type="submit" value="Delete Machine"></td>
		</tr></form>
		</table>
			
			<table width="100%" border="0">
				<tr align="left">
					<td>
						<form><input type="submit" formaction="addEditMachine.php" value="Back"></form>
					</td>
					<td width="100" align="right">
						
					</td>
				</tr>
			</table>		
	</div>
</div>

<?php include 'footer.php'; ?>

</body>

</html>
