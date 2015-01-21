<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
	<title>Add/Edit Lecturer</title>
</head>

<body>

<div class="wrap">

	<?php 
	session_start();
include 'staffheader.php'; ?>

	<div class="content">
		<table width ="100%">
		<form action="php/addLecturer.php" method="POST">
		<tr>
				<td>Name:</td>
				<td><input type="text" name="name" width ="300"></td>
			</tr>
			<tr>
				<td>Staff ID:</td>
				<td><input type="text" name="id" width ="300"></td>
			</tr>
			<tr>
				<td>School:</td>
				<td><input type="text" name="school" width ="300"></td>
			</tr>
			<tr>
				<td>Contact No:</td>
				<td><input type="text" name="contact" width ="300"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" width ="300"></td>
			</tr>
		<tr>
		<td width = "16%"></td>
		<td width = "84%"><input type="submit" value="Add Lecturer"></td>
		</tr></form>

		<h2>
					Add/View Lecturer
					
				</h2>
				<table width="100%" border ="1">
					<tr>		
						<td width ="10%"><b>Staff ID</b></td>
						<td width ="30%"><b>Name</b></td>
						<td width = "20%"><b>School</b></td>
						<td width = "20%"><b>Contact</b></td>		
						<td width = "20%"><b>Email</b></td>
					</tr>
					
		<?php
		$content = "";

		$query = mysql_query(
			"SELECT * FROM lecturer Order by l_admin");
			
		$numrows = mysql_num_rows($query);

		if($numrows != 0) {
			while( $row = mysql_fetch_array($query) ) {
				$dblecturerid= $row['l_admin'];
				$dblecturername= $row['l_name'];
				$dblecturerschool= $row['l_school'];
				$dblecturercontact= $row['l_contact'];
				$dblectureremail= $row['l_email'];
				$content .="<tr>";
				$content .="<td width ='10%'>$dblecturerid</td>";
				$content .="<td width ='30%'>$dblecturername</td>";
				$content .="<td width ='20%'>$dblecturerschool</td>";
				$content .="<td width ='20%'>$dblecturercontact</td>";
				$content .="<td width ='20%'>$dblectureremail</td>";
				$content .="</tr>";
				$content .="</form>";
			}
		} else echo("No rows found!");

		echo $content;

		?>
			</table>
			<hr>
			<h2>Delete account</h2>
			<table width ="100%">
			<form action="php/delLecturer.php" method="POST" onsubmit="return confirm('WARNING! This action cannot be undo. Do you sure you want to delete?')">
		<tr>
				<td>Name:</td>
				<td><input type="text" name="name" width ="300"></td>
			</tr>
			<tr>
				<td>Staff ID:</td>
				<td><input type="text" name="id" width ="300"></td>
			</tr>
		<tr>
		<td width = "16%"></td>
		<td width = "84%"><input type="submit" value="Delete Lecturer"></td>
		</tr></form><br><br>
		</table>

		<table width="100%" border="0">
				<tr align="left">
					<td>
						<form><input type="submit" formaction="adminPanel.php" value="Back"></form>
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
