<?php

include 'php/dbConnect.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<title>Staff Activation</title>
</head>

<body>
<h2>This account has not been verified!<br></h2>
<h3>For verification, please fill up your Staff ID and your default password.<br>
Your default password can be found in your email.<br>
</h2>
<table width ="100%">
<form action="php/staffActivation.php" method="POST">
<tr>
		<td>Staff ID:</td>
		<td><input type="text" name="staffid" width ="300"></td>
	</tr>
<tr>
		<td>Default password:</td>
		<td><input type="password" name="defaultpass" width ="300"></td>
	</tr>
	<tr>
		<td>New Password:</td>
		<td><input type="password" name="newpass" width ="300"></td>
	</tr>
	<tr>
		<td>Confirm New Password:</td>
		<td><input type="password" name="confirmnewpass" width ="300"></td>
	</tr>
<tr>
<td width = "16%"></td>
<td width = "84%"><input type="submit" value="Change Password"></td>
</tr></form>
	

</body>

</html>