<?php

class Estoque {
   
    static public function novo($idProduto, $qtd) {
		$query = "INSERT INTO estoque VALUES (null,$idProduto,$qtd)";
		$res = mysql_query($query);
	}
    
    static public function entrada($param) {
        $query = "UPDATE estoque SET qtd='$qtd' WHERE idProduto=$id";
		$res = mysql_query($query);
    }
}

?>
