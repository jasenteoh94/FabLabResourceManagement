<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>First Setup</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="wrap">

	<div class="header">

  <div class="upper">
    <p>
      
    </p>
  </div>

  <p class="title">
    <a href="student.php">Fab-lab <br>Reservation System</a>
  </p>
  <a href="student.php"><img width="400px" height="200px" src="img/fablab.jpg"></a>

	<ul class="studentNav">
		<li>
		</li>
	</ul>
</div>

	<div class="content">
<p>If you are on this page, this means you are have not configured your database settings. Please fill up all the fields to use the fablab reservation system.</p>
		<form action="php/setup.php" method="POST">
			<table width="450" style="margin: auto; margin-top: 20px">
			<tr>
				<td>Database server (localhost/IP address):</td>
				<td><input type="text" name="db_server" width ="200"></td>
			</tr>
			<tr>
				<td>Database Username:</td>
				<td><input type="text" name="db_username" width ="200"></td>
			</tr>
			<tr>
				<td>Database Password:</td>
				<td><input type="text" name="db_password" width ="200"></td>
			</tr>
				<tr>
				<td>Database name:</td>
				<td><input type="text" name="db_name" width ="200"></td>
			</tr>
			<tr>
				<td>Root account id:</td>
				<td><input type="text" name="root_id" width ="200"></td>
			</tr>
			<tr>
				<td>Root Name:</td>
				<td><input type="text" name="root_name" width ="200"></td>
			</tr>
			<tr>
				<td>Root password:</td>
				<td><input type="text" name="root_password" width ="200"></td>
			</tr>
			<tr>
				<td>Contact:</td>
				<td><input type="text" name="root_contact" width ="200"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="root_email" width ="200"></td>
			</tr>
			</table><br>

			<table width="600" border="0" style="margin: auto;">
				<tr align="left">
					<td width="100" align="right"><input type="submit" value="Submit">
					<br></td>
				</tr>
			</table>
		</form>			
	</div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>
