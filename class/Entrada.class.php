<?php

class Entrada {

	function __construct($param) {
		$this->idProduto = $param['idProduto'];
		$this->quantidade = $param['quantidade'];
		$this->quantidadeAtual = $param['quantidadeAtual'];
	}
	
	public static function entradaProdutoMatriz($idProduto) {
		$query = "INSERT INTO entrada_produto VALUES (null,'$idProduto',0)";
		$res = mysql_query($query);

		return $res;
	}

	private function histEntradaProduto() {
		$query = "INSERT INTO hist_entrada_produto VALUES (null,'$this->idProduto','$this->quantidade',null)";
		$res = mysql_query($query);
	}

	public function entradaProduto() {
		$qtdFinal = $this->quantidadeAtual + $this->quantidade;
		$query = "UPDATE entrada_produto SET quantidade='$qtdFinal' WHERE idProduto='$this->idProduto'";
		$hist = self::histEntradaProduto();

		$res = mysql_query($query);

		return $res;
	}

}

?>
