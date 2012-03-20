<?php

class Doacao {
    
    	public static function gerarCodDoacao() {
		$query = "SELECT * FROM doacao ORDER BY codDoacao DESC";
		$res = mysql_query($query);
		$obj = mysql_fetch_object($res);		
		$cod = $obj->codDoacao;

		return $cod;
	}

	public static function totalDoacao($codDoacao) {
		$query = "SELECT SUM(total) AS precoTotal FROM doacao WHERE codDoacao='$codDoacao'";
		$res = mysql_query($query);
		$obj = mysql_fetch_object($res);

		return $obj;
	}
        
        public static function listarDoacoes(){
            $query = "SELECT d.*, i.nome FROM doacao d
                        INNER JOIN igreja i ON i.idIgreja = d.idIgreja
                            GROUP BY codDoacao";
            $res = mysql_query($query);	
	
            return $res;
        }
        
        public static function verDoacoes(){
            $query = "SELECT p.descricao, n.natureza, i.*, d.* FROM doacao d 
                            INNER JOIN produto p ON p.idProduto = d.idProduto
                                INNER JOIN natureza n ON n.idNatureza = p.idNatureza
                                    INNER JOIN igreja i ON i.idIgreja = d.idIgreja
                                        ORDER BY n.natureza ASC";
            $res = mysql_query($query);	
	
            return $res;
        }
        
}

?>
