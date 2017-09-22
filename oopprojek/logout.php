<?php
	require("koneksi.php");
	require("session.class.php");

	$db = Database::connect();
	$Admin = new Admin($db);

	$Admin->logout();

	header("location:index_login.php");
