<?php

session_start();

class DBConnection
{
	private static $dbName = 'IFPE';
	private static $host = 'localhost';
	private static $user = 'root';
	private static $instance;
	public $connection;

	private function __construct()
	{
		$this->connection = new PDO("mysql:dbname=" . self::$dbName . ";" . "host=" . self::$host, self::$user);
	}

	public static function getConnection()
	{
		if (self::$instance == null) {
			self::$instance = new DbConnection();
		}
		return self::$instance;
	}

}