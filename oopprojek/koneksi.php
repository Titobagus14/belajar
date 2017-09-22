<?php
	session_start();

	class Database
	{
		public static $host="localhost";

		public static $dbname="projek_siswa";
		public static $user="root";
		public static $password="";

		public static $db = null ;

		public function __construct()
		{
			die("init function not allowed");
		}

		public static function connect()
		{
			self::$db = new PDO("mysql:host=".self::$host.";"."dbname=".self::$dbname, self::$user, self::$password);

			return self::$db;
		}

		public static function disconnect(){
			self::$db = null;
		}
	} 
?>
