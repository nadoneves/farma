<?php

class Entrada {

	function __construct($param) {
		$this->idProduto = $param['idProduto'];
        $this->idFornecedor = $param['idFornecedor'];
        $this->nf = $param['nNf'];
        $this->dataNf = data_ymd($param['dataNf']);
		$this->quantidade = $param['qtd'];
        $this->precoUnidade = $param['precoUnidade'];
		$this->quantidadeAtual = $param['quantidadeAtual'];
	}
	
	public function nova( $idProduto,$idFornecedor,$nf,$dataNf,$quantidade,$precoUnidade){
        $data = data_ymd($dataNf);
        $query = "INSERT INTO entrada_produto VALUES (null,$idProduto,$idFornecedor,'$nf','$data',$quantidade,$precoUnidade)";
        $res = mysql_query($query);
        
        if($res){
            $resEstoque = Estoque::qtdEstoque($idProduto);
            $e = mysql_fetch_array($resEstoque);
            
            $qtdEstoque = $e['qtd'] + $quantidade;
            
            Estoque::entrada($qtdEstoque, $idProduto);
            
            return $res;
            
        }else{
            return false;
        }
        
    }
	

}

?>
