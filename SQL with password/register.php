<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="wrap">

	<div class="header">

  <div class="upper">
      </div>

  <p class="title">
    <a href="student.php">Fab-lab <br>Resource Managment<br> System</a>
  </p>
  <a href="student.php"><img width="400px" height="200px" src="img/fablab.jpg"></a>

	<ul class="studentNav">
		<li>
		</li>
	</ul>
</div>

	<div class="content">
		<form action="php/storeRegister.php" method="POST">
			<table width="450" style="margin: auto; margin-top: 20px">
			<tr>
				<td>Full Name:</td>
				<td><input type="text" name="name" width ="200"></td>
			</tr>
			<tr>
				<td>Student ID:</td>
				<td><input type="text" name="admin" width ="200"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="pass" width ="200"></td>
			</tr>
				<tr>
				<td>Confirm Password:</td>
				<td><input type="password" name="confirmpass" width ="200"></td>
			</tr>
			<tr>
				<td>School:</td>
				<td><input type="text" name="school" width ="200"></td>
			</tr>
			<tr>
				<td>Diploma:</td>
				<td><input type="text" name="diploma" width ="200"></td>
			</tr>
			<tr>
				<td>Contact Number:</td>
				<td><input type="text" name="contact" width ="200"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" width ="200"></td>
			</tr>
			</table><br>

			<table width="600" border="0" style="margin: auto;">
				<tr align="left">
					<td><input type="submit" formaction="index.php" value="Back">
					<br></td>
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
