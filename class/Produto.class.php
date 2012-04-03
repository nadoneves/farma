<?php

class Produto {

	function __construct($param){
		$this->idProduto = $param['idProduto'];
        $this->tipo = $param['tipo'];
        $this->marca = $param['marca'];
		$this->quantidade = $param['quantidade'];
		$this->precoUnidade = $param['precoUnidade'];
		$this->precoVenda = $param['precoVenda'];	
		$this->descricao = $param['descricao'];
		$this->codBarras = $param['codBarras'];
        $this->dataFab = data_ymd($param['dataFab']);
        $this->dataVal = data_ymd($param['dataVal']);
	}
	
	public function cadProduto(){	
		
		$query = "INSERT INTO produto VALUES (null, '$this->tipo', '$this->marca', null, null, '$this->descricao', '$this->codBarras', '$this->dataFab','$this->dataVal', null)";
		$res = mysql_query($query);

		return $res;
	}
	
	public static function listarBens() {
		$query = "SELECT * FROM bens";
		$res = mysql_query($query);	
		
		return $res;
	}
	
	public static function listarProdutos() {
		$query = "SELECT p.*, n.natureza FROM produto p 
                            INNER JOIN natureza n ON n.idNatureza = p.idNatureza
				ORDER BY n.natureza ASC";
		$res = mysql_query($query);	
		
		return $res;
	}

	public static function listarProdutosEstoque() {
		$query = "SELECT p.*, n.natureza, e.quantidade FROM produto p 
                            INNER JOIN natureza n ON n.idNatureza = p.idNatureza
				INNER JOIN entrada_produto e ON e.idProduto = p.idProduto
                                    ORDER BY n.natureza ASC";
		$res = mysql_query($query);	
		
		return $res;
	}
	
	public function pesqProduto() {
		$query = "SELECT p.*, n.natureza, b.bens FROM produto p
                            INNER JOIN natureza n ON n.idNatureza = p.idNatureza 
				INNER JOIN bens b ON b.idBens = p.idBens	 
					WHERE p.idProduto='$this->idProduto' ";
		$res = mysql_query($query);	
		$obj = mysql_fetch_object($res);
		
		return $obj;	
		//return $query;
	}

	public function alterarProduto() {
		$query = "UPDATE produto SET idNatureza='$this->idNatureza',
                            idBens='$this->idBens',
                            precoUnidade='$this->precoUnidade',
                            precoVenda='$this->precoVenda',
                            descricao='$this->descricao',
                            unidade='$this->unidade'
                                WHERE idProduto='$this->idProduto'";
		$res = mysql_query($query);

		return $res;
		//echo $query;
	}
	
}

?>
