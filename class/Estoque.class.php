<?php

class Estoque {
   
    static public function novo($idProduto, $qtd) {
		$query = "INSERT INTO estoque VALUES (null,$idProduto,$qtd)";
		$res = mysql_query($query);
	}
    
    static public function entrada($qtd,$id) {
        $query = "UPDATE estoque SET qtd='$qtd' WHERE idProduto=$id";
		$res = mysql_query($query);
    }
    
    static public function qtdEstoque( $id ){
        $query = "SELECT qtd FROM estoque WHERE idProduto=$id";
        $res = mysql_query($query);
        return $res;
    }
}

?>
