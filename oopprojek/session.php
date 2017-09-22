<?php
	require("koneksi.php");
	require("session.class.php");

	$db = Database::connect();
	$siswa = new Admin($db);
	
	$siswa->id_mahasiswa = $_POST['id_mahasiswa'];
	$siswa->tanggal_lahir = $_POST['tanggal_lahir'];
	
	$login2 = $siswa->login();

	if($login2){
		$_SESSION['id_mahasiswa'] = $login2->id_mahasiswa;
		$_SESSION['tanggal_lahir'] = $login2->tanggal_lahir;
	}

	header("location:tampil.php");
?>