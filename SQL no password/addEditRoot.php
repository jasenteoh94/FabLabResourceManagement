<?php

$name = $_SESSION['l_name'];
$admin = $_SESSION['l_admin'];

?>

<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
	<title>Add/Edit Roots</title>
</head>

<body>

	<div class="wrap">

		<?php
		session_start();
 include 'staffheader.php'; ?>

		<div class="content">
			<table width ="100%">
			<form action="php/addRoot.php" method="POST" onsubmit="return confirm('Are you sure?')">
			<tr>
					<td>Staff ID:</td>
					<td><input type="text" name="id" width ="300"></td>
				</tr>
				<tr>
					<td>Super-User Password:</td>
					<td><input type="password" name="password" width ="300"></td>
				</tr>
			<tr>
			<td width = "16%"></td>
			<td width = "84%"><input type="submit" value="Add to Root User"></td>
			</tr></form>
			<h2>
						Add/View Root User
					</h2>
					<table width="100%" border ="1">
						<tr>		
							<td width ="100"><b>Root ID</b></td>
							<td width ="100"><b>Staff ID</b></td>		
						</tr>
						
			<?php
			$content = "";

			$connect = connect_database();

			$query = mysql_query(
				"SELECT * FROM root Order by r_id");
				
			$numrows = mysql_num_rows($query);

			if($numrows != 0) {
				while( $row = mysql_fetch_array($query) ) {
					$dbrootid= $row['r_id'];
					$dbstaffid = $row['r_lecturerid'];
					$content .="<tr>";
					$content .="<td width ='100'>$dbrootid</td>";
					$content .="<td width ='100'>$dbstaffid</td>";
					$content .="</tr>";
					$content .="</form>";
				}
			} else echo("No rows found!");

			echo $content;

			?>
				</table>

				<hr>
				<h2>Delete Root</h2>
				<table width ="100%">
				<form action="php/delRoot.php" method="POST" onsubmit="return confirm('Are you sure?')">
			<tr>
					<td>Staff ID:</td>
					<td><input type="text" name="id" width ="300"></td>
				</tr>
				<tr>
					<td>Super-User Password:</td>
					<td><input type="password" name="password" width ="300"></td>
				</tr>
			<tr>
			<td width = "16%"></td>
			<td width = "84%"><input type="submit" value="Delete Staff From Root"></td>
			</tr></form>
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
