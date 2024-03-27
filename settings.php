<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s104973106"; // your user name
	$pwd = "180405"; // your password (date of birth ddmmyy unless changed)
	$sql_db = "s104973106_db"; // your database
	$conn = @mysqli_connect(
		$host,
		$user,
		$pwd,
		$sql_db
	);
?>
