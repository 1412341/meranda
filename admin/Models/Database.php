<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");

/**
* Database configuration
*/
class Database
{
	private  $host = 'localhost';
	private  $username = 'root';
	private  $password = '';
	private  $dbName = 'meranda';

	private  $db;


	public function __construct() {
		$this->db = mysqli_connect($this->host, $this->username, $this->password, $this->dbName);
		mysqli_set_charset($this->db,'utf8');

		if (!$this->db) {
			$error = "Can't connect to database";
			include("error.php");
			exit();
		} else {
			$con = mysqli_select_db($this->db, $this->dbName);
			if (!$con) {
				$error = "Can't get database";
				include("error.php");
				exit();
			}
		}

	}

	function executeQueryGetOne($sql) {

		$record = $this->db->query($sql);

		if (!$record) {
			var_dump($this->db->error);
		} else {

			$result = $record->fetch_array();
			$record->close();
			return $result;
		}
	}

	function executeQueryGetList($sql) {

		$record = $this->db->query($sql);

		if (!$record) {
			var_dump($this->db->error);
		} else {
			$result = array();
			while ($row = $record->fetch_array()) {
				array_push($result, $row);
			}
			$record->close();

			return $result;
		}
	}

	function executeUpdate($sql) {
		$this->db->query($sql);

		if ($this->db->error) {
			$error = "Cannot connect to Database: " . $this->db->error;
			return $error;
		} else {
			return $this->db->affected_rows;
		}
	}

	function escapeString($str) {
	    return mysqli_real_escape_string($this->db, $str);
	}

	public function getResult($query) {

		$result = $this->db->query($query);
		// mysqli_close($this->db);

		return $result;
	}

	function __destruct() {
		$this->db->close();
	}
}
