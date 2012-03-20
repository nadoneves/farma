<?php

class Natureza {

	function __construct($param) {
		$this->natureza = $param['natureza'];
	}

	private function setCodNatureza() {
		$query = "SELECT * FROM natureza ORDER BY codNatureza DESC";
		$res = mysql_query($query);
		$obj = mysql_fetch_array($res);

		$cod = $obj['codNatureza'] + 1;

		return $cod;
	}
	
	public function cadNatureza(){
		$codNatureza = $this->setCodNatureza();
		$query = "INSERT INTO natureza VALUES (null,'$this->natureza','$codNatureza')";
		$res = mysql_query($query);

		return $res;
	}

	public static function listarNatureza(){
		$query = "SELECT * FROM natureza ORDER BY natureza ASC";
		$res = mysql_query($query);
			
		return $res;
	}

}

?>
