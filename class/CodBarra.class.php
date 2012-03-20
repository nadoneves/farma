<?php

class CodBarra {

	private static function getCodNatureza($idNatureza){
		$query = "SELECT * FROM natureza WHERE idNatureza='$idNatureza'";
		$res = mysql_query($query);
		$obj = mysql_fetch_array($res);
	
		return $obj;
	}
	private static function getCodBens($idBens){
		$query = "SELECT * FROM bens WHERE idBens='$idBens'";
		$res = mysql_query($query);
		$obj = mysql_fetch_array($res);
	
		return $obj;
	}
	private static function getUltimoIdProduto(){
		$query = "SELECT * FROM produto ORDER BY idProduto DESC";
		$res = mysql_query($query);
		$obj = mysql_fetch_array($res);
	
		return $obj;	
	}

	public static function gerarCodBarra($idNatureza,$idBens){
		$N = self::getCodNatureza($idNatureza);
		$B = self::getCodBens($idBens);
		$P = self::getUltimoIdProduto();
		$cod = $N['codNatureza'].$B['codBens'].($P['idProduto'] + 1);
		
		return $cod;
	}
}

?>
