<?php

class Entrada {

	function __construct($param) {
		$this->idProduto = $param['idProduto'];
		$this->quantidade = $param['quantidade'];
		$this->quantidadeAtual = $param['quantidadeAtual'];
	}
	
	public static function entradaProdutoMatriz($idProduto, $qtd) {
		$query = "INSERT INTO entrada_produto VALUES (null,$idProduto,$qtd)";
		$res = mysql_query($query);
        self::histEntradaProduto($idProduto, $qtd);
		return $res;
	}

	private function histEntradaProduto($idProduto, $qtd) {
		$query = "INSERT INTO hist_entrada_produto VALUES (null,$idProduto,$qtd,null)";
		$res = mysql_query($query);
	}

	public function entradaProduto() {
		$qtdFinal = $this->quantidadeAtual + $this->quantidade;
		$query = "UPDATE entrada_produto SET quantidade='$qtdFinal' WHERE idProduto='$this->idProduto'";
		$hist = self::histEntradaProduto($idProduto, $qtd);

		$res = mysql_query($query);

		return $res;
	}

}

?>
