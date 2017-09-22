<?php
	class Siswa
	{
		private $db;
		public $id_mahasiswa;
		public $nama;
		public $tanggal_lahir;
		public $jenis_kelamin;
		public $alamat;
		public $foto;

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function select()
		{
			$query = "SELECT * FROM murid";
			$out = $this->db->query($query);	

			return $out; 
		}

		public function select_by_npm(){
		$query  = "SELECT * FROM murid WHERE id_mahasiswa = ?";
		$out = $this->db->prepare($query);
		$value  = array($this->id_mahasiswa);
		$out->execute($value);

			return $out;
		}

		public function insert()
		{
			$query = "INSERT INTO murid(id_mahasiswa, nama, tanggal_lahir, jenis_kelamin, jurusan, alamat, foto) values(?, ?, ?, ?, ?, ?, ?)";
			$out = $this->db->prepare($query);
			$mahasiswa = array($this->id_mahasiswa, $this->nama, $this->tanggal_lahir, $this->jenis_kelamin, $this->jurusan, $this->alamat, $this->foto);
			$exec = $out->execute($mahasiswa);

			if($exec)
			{
				return true;
			}
			else
			{
				return false; 
			}
		}

		public function delete(){
			$query = "DELETE FROM murid WHERE id_mahasiswa= ?";

			$out = $this->db->prepare($query);

			$mahasiswa = array($this->id_mahasiswa);

			$out->execute($mahasiswa);	
			
			if($out){
				return true;
			}
			else{
				echo($echo->errorInfo());
				return false;
			}		
		}

		public function update(){
			$query = "UPDATE murid set nama= ?, tanggal_lahir= ?, jenis_kelamin= ?, jurusan= ?, alamat= ?, foto= ? where id_mahasiswa= ?";

			$out = $this->db->prepare($query);

			$mahasiswa = array($this->nama, $this->tanggal_lahir, $this->jenis_kelamin, $this->jurusan, $this->alamat, $this->foto ,$this->id_mahasiswa);

			$out2 = $out->execute($mahasiswa);

			if($out2){
				return true;
			}
			else{
				$error = $out->errorInfo();
				echo($error[2]);
				return false;
			}

		}

		public function laki_laki(){
			$query = "SELECT COUNT(jenis_kelamin) as jumlahLaki FROM murid WHERE jenis_kelamin = 'Laki-laki'";

			$out = $this->db->query($query);

			return $out;

		}

		public function perempuan(){
			$query = "SELECT COUNT(jenis_kelamin) as jumlahPerempuan FROM murid WHERE jenis_kelamin = 'perempuan'";

			$out = $this->db->query($query);

			return $out;

		}

		public function totalSiswa(){
			$query = "SELECT COUNT(*) as total FROM murid";

			$out = $this->db->query($query);

			return $out;

		}

		public function UpdateNotImage(){
			$query = "UPDATE murid set nama= ?, tanggal_lahir= ?, jenis_kelamin= ?, alamat= ? where id_mahasiswa= ?";

			$aksi = $this->db->prepare($query);

			$mahasiswa = array($this->nama, $this->tanggal_lahir, $this->jenis_kelamin, $this->alamat, $this->id_mahasiswa);

			$out2 = $out->execute($mahasiswa);

			if($out2){
				return true;
			}
			else{
				$error = $out->errorInfo();
				echo($error[2]);
				return false;
			}

		}

}
?>

