<?php

class Produto {

	function __construct($param){
		$this->idProduto = $param['idProduto'];
        $this->tipo = $param['tipo'];
        $this->marca = $param['marca'];
		$this->quantidade = $param['quantidade'];	
		$this->descricao = $param['descricao'];
		$this->codBarras = $param['codBarras'];
        $this->dataFab = data_ymd($param['dataFab']);
		$this->lote = $param['lote'];
        $this->dataVal = data_ymd($param['dataVal']);
	}
	
	public function cadProduto(){	
		
		$query = "INSERT INTO produto VALUES (null, '$this->tipo', '$this->marca', '$this->descricao', '$this->codBarras', '$this->dataFab', '$this->lote','$this->dataVal', null)";
		$res = mysql_query($query);
        
        Estoque::novo( mysql_insert_id(),0 );

		return $res;
	}
	
	public static function listarBens() {
		$query = "SELECT * FROM bens";
		$res = mysql_query($query);	
		
		return $res;
	}
	
	public static function listarProdutos() {
		$query = "SELECT p.*, e.* FROM produto p
                    inner join entrada_produto e";
		$res = mysql_query($query);	
		
		return $res;
	}

	public static function listarProdutosEstoque() {
		$query = "SELECT p.* , e.* FROM produto p 
                    INNER JOIN entrada_produto e ON e.idProduto = p.idProduto";
		$res = mysql_query($query);	
		
		return $res;
	}
	
	public function pesqProduto() {
		$query = "SELECT * FROM produto WHERE idProduto='$this->idProduto' ";
		$res = mysql_query($query);	
		$obj = mysql_fetch_object($res);
		
		return $obj;	
		//return $query;
	}

	public function alterarProduto() {
		$query = "UPDATE produto SET tipo='$this->tipo',
                                    marca='$this->marca',
                                    descricao='$this->descricao',
                                    codBarra='$this->codBarras',
                                    dataFab='$this->dataFab',
									lote='$this->lote',
                                    dataVal='$this->dataVal'
                                WHERE idProduto='$this->idProduto'";
		$res = mysql_query($query);

		return $res;
		//echo $query;
	}
    
    public function consultarProduto( $key ) {
        $query = "SELECT * FROM produto WHERE tipo like '%$key%' or marca like '%$key%' or codBarra like '%$key%'";
        $res = mysql_query($query);

		return $res;
    }
    
    static public function precoProd( $id ){
        $query = "SELECT round( sum(precoUnidade)/count(precounidade) ) AS precoVenda FROM entrada_produto WHERE idProduto=$id";
        $res = mysql_query($query);
		$p = mysql_fetch_array($res);
        return $p['precoVenda'];
    }
	
}

?>
