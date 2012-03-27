<?php

class Fornecedor {

	function __construct($param) {
		$this->idfornecedor = $param['idfornecedor'];
        $this->cnpj = $param['cnpj'];
		$this->nome = $param['nome'];
        $this->telefone = $param['telefone'];
        $this->email = $param['email'];
		$this->cep = $param['cep'];
		$this->endereco = $param['endereco'];
		$this->numero = $param['numero'];
		$this->complemento = $param['complemento'];
		$this->bairro = $param['bairro'];
		$this->cidade = $param['cidade'];
		$this->uf = $param['uf'];
	} 

	public function cadfornecedor() {
		$query = "INSERT INTO fornecedor VALUES (null,'$this->cnpj','$this->nome','$this->telefone','$this->email','$this->cep','$this->endereco','$this->numero','$this->complemento','$this->bairro','$this->cidade','$this->uf')";
		$res = mysql_query($query);

		return $res;
	}
        
    public function alterarfornecedor() {
        $query = "UPDATE fornecedor SET 
                    nome='$this->nome',
                    telefone='$this->telefone',
                    email='$this->email',
                    cep='$this->cep',
                    endereco='$this->endereco',
                    numero='$this->numero',
                    complemento='$this->complemento',
                    bairro='$this->bairro',
                    cidade='$this->cidade',
                    uf='$this->uf'
                        WHERE idfornecedor='$this->idfornecedor'";
        $res = mysql_query($query);

        return $res;
    }
        
    public function pesqFornecedor() {
        $query = "SELECT f.*, u.* FROM fornecedor f
                            INNER JOIN uf u ON u.idUF = f.uf
                                WHERE f.idfornecedor='$this->idfornecedor'";
        $res = mysql_query($query);	
        $obj = mysql_fetch_object($res);

        return $obj;	
        //return $query;
    }
        
    public static function listarfornecedors() {
        $query = "SELECT * FROM fornecedor ORDER BY nome ASC";
        $res = mysql_query($query);

        return $res;
    }
        
    public static function listarfornecedorVenda() {
        $query = "SELECT COUNT( v.codVenda ) AS vendas, f.nome FROM venda_fornecedor v
                    INNER JOIN fornecedor f ON f.idfornecedor = v.idfornecedor
                        GROUP BY f.nome
                            ORDER BY f.nome ASC";
        $res = mysql_query($query);

        return $res;
    }
        
    public static function verfornecedor($id) {
        $query = "SELECT * FROM fornecedor WHERE idfornecedor='$id'";
        $res = mysql_query($query);	
        $obj = mysql_fetch_object($res);

        return $obj;	
        //return $query;
	}
        
    public function consultarFornecedor( $word ) {
        $query = "SELECT f.*, u.* FROM fornecedor f
                            INNER JOIN uf u ON u.idUF = f.uf
                                WHERE nome like '%$word%' or cnpj like '%$word%'";
        $res = mysql_query($query);			
        return $res;	
        //return $query;
	}
        
}
?>
