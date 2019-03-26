<?php

class Sql extends PDO{

	private $conn;

	public function __construct(){

		$this -> conn = new PDO("mysql:dbname=epiz_23666771_bd; host=sql209.epizy.com", "epiz_23666771", "GEsthOwhKTWLBr");
		//$this -> conn = new PDO("mysql:dbname=bd; host=localhost", "root", "");
	}

	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value){
			
			$this -> setParam($statement, $key, $value);
		}
	}

	private function setParam($statement, $key, $value){

		$statement -> bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){

		$stmt = $this -> conn -> prepare($rawQuery);

		$this -> setParams($stmt, $params);

		$stmt -> execute();

		return $stmt;
	}

	public function select ($rawQuery, $params=array()):array{

		$stmt = $this -> query ($rawQuery, $params);

		return $stmt -> fetchAll(PDO::FETCH_ASSOC);
	}
}

?>
