<?php

class Produto {

	function __construct($param){
		$this->idProduto = $param['idProduto'];
		$this->idNatureza = $param['natureza'];
		$this->idBens = $param['bens'];
		$this->quantidade = $param['quantidade'];
		$this->precoUnidade = $param['precoUnidade'];
		$this->precoVenda = $param['precoVenda'];	
		$this->descricao = $param['descricao'];
		$this->unidade = $param['unidade'];
	}
	
	public function cadProduto(){
		$codBarras = CodBarra::gerarCodBarra($this->idNatureza,$this->idBens);		
		
		$query = "INSERT INTO produto VALUES (null,'$this->idNatureza','$this->idBens','$this->precoUnidade','$this->precoVenda','$this->descricao', '$this->unidade','$codBarras',null)";
		$res = mysql_query($query);

		//Gerar matriz na tabela entrada ao adicionar um produto novo!	
		$id = mysql_insert_id();
		$geraMatrix = Entrada::entradaProdutoMatriz($id);

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
