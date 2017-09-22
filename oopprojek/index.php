<?php
	require("koneksi.php");
	require("session.class.php");

	$db = Database::connect();
	$Admin = new Admin($db);

	if($Admin->loggedin()){
		header("location:tampil.php");
	}

	else{
		header("location:index_login.php");
	}
?>
