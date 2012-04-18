<?php

class Venda {

	public static function gerarCodVenda() {
		$query = "SELECT * FROM venda ORDER BY codVenda DESC";
		$res = mysql_query($query);
		$obj = mysql_fetch_object($res);		
		$cod = $obj->codVenda;

		return $cod;
	}

	public static function totalVenda($codVenda) {
		$query = "SELECT SUM(total) AS precoTotal FROM venda WHERE codVenda='$codVenda'";
		$res = mysql_query($query);
		$obj = mysql_fetch_object($res);

		return $obj;
	}
        
	public static function listarVendas(){
		$query = "SELECT * FROM venda GROUP BY codVenda ORDER BY data DESC";
		$res = mysql_query($query);	

		return $res;
	}

	public static function saidasXatual(){
		$query = "SELECT CONCAT_WS(  ' - ', n.natureza, p.descricao ) AS produto, SUM( v.qtd ) AS qtdSaida, quantidade AS qtdAtual
					FROM produto p
						INNER JOIN natureza n ON n.idNatureza = p.idNatureza
						INNER JOIN venda v ON v.idProduto = p.idProduto
						INNER JOIN entrada_produto ep ON ep.idProduto = p.idProduto
							GROUP BY p.idProduto
								ORDER BY n.natureza ASC ";
		$res = mysql_query($query);	

		return $res;
	}
        
}

?>
