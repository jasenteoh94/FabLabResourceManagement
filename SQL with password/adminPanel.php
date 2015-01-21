<?php

session_start();

?>

<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
	<title>Admin Panel</title>
</head>

<body>

<div class="wrap">

<?php include 'staffheader.php'; ?>

	<div class="content">
		<h2>
			Admin Panel
		</h2>
		<form>
			<input type="submit" formaction="addEditRoot.php" value="Add/Del Root User">
		</form><br><br>
		<form>
			<input type="submit" formaction="addEditMachine.php" value="Add/Del Machine">
		</form><br><br>
		<form>
			<input type="submit" formaction="addEditLecturer.php" value="Add/Del Lecturer">
		</form><br><br>
		<form>
			<input type="submit" formaction="addEditBanlist.php" value="Student Banlist">
		</form><br><br>
		<form>
			<input type="submit" formaction="php/loadChartYear.php" value="View Log">
		</form><br><br>
		<!-- <form><input type="submit" formaction="" value="Database Entry">
		</form><br><br> -->
	</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>