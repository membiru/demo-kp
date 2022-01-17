<?php 
class DTable{

	private $mysqli;

	function __construct($conn){
		$this->mysqli = $conn;
	}

	public function tampilkanTable(){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM `data_text`";
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}

	public function tampilkanTerbaru(){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM `data_text` ORDER BY date DESC LIMIT 1";
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}

	public function tambah($text){
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO `data_text` VALUES ('', current_timestamp(),'$text', '')") or die ($db->error);
	}

	public function hapus($id){
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM `data_text` WHERE id='$id'") or die ($db->error);
	}
	
	public function edit($sql){
		$db = $this->mysqli->conn;
		$db->query($sql) or die ($db->error);
	}
	
	function __destruct(){
		$db = $this->mysqli->conn;
		$db->close();
	}
}
?>