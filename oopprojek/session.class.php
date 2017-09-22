<?php
	class Admin
	{

		public $adminId;
		public $pass;
		public $hakAkses;

		private $db;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function login(){
			$query  = "SELECT * FROM murid WHERE id_mahasiswa = ? AND tanggal_lahir = ?";
			$action = $this->db->prepare($query);
			$value  = array($this->id_mahasiswa, $this->tanggal_lahir);
			$action->execute($value);

			return $action->fetchObject();
		}

		public function loggedin(){
			return (($_SESSION['id_mahasiswa'] != "") ? true : false );
		}

		public function logout(){
			$_SESSION['id_mahasiswa']="";
			$_SESSION['nama']="";
			return true;
		}
	}
?>