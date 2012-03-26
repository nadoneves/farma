<?php

class Usuario{
    
    function __construct( $param ){
        $this->nome = $param['nome'];
        $this->cpf = $param['cpf'];
        $this->telefone = $param['telefone'];
        $this->usuario = $param['usuario'];
        $this->senha = md5($param['senha']);
        $this->ativo = $param['ativo'];
        $this->tipo = $param['tipo'];
    }
    
    public function novo() {
        $query = "insert into usuario values (null, '$this->nome', '$this->cpf','$this->telefone','$this->usuario','$this->senha',$this->ativo,$this->tipo)";
        $result = mysql_query($query);
        return $result;
    }
    
    public function consultar(){
        $query = "select * from usuario where usuario='$this->usuario' and senha='$this->senha'";
        $result = mysql_query($query);
        $obj = mysql_fetch_object($result);
        return $obj;
    }
    
    public function pesquisar($id){
        $query = "select * from usuario where idusuario=$id";
        $result = mysql_query($query);
        $obj = mysql_fetch_object($result);
        return $obj;
    }
    
    public function alterar($id) {
        $query = "update usuario set nome='$this->nome',
                                    telefone='$this->telefone',
                                    usuario='$this->usuario',
                                    ativo='$this->ativo',
                                    tipo='$this->tipo'
                where idusuario=$id";
        $res = mysql_query($query);
        return $res;
    }

    public function consultarUsuario( $word, $ativo ){
        $query = "select * from usuario where usuario like '%$word%' and ativo='$ativo'";
        $result = mysql_query($query); 
        return $result;
    }
    
     public function trocar($id,$ativo) {
        $query = "update usuario set ativo='$ativo' where idusuario=$id";
        $res = mysql_query($query);
        return $res;
    }

}