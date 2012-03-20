<?php

class Usuario{
    
    function __construct( $param ){
        $this->usuario = $param['usuario'];
        $this->senha = md5($param['senha']);
        $this->ativo = $param['ativo'];
        $this->tipo = $param['tipo'];
    }
    
    public function novo() {
        $query = "INSERT INTO usuario values (null,'$this->usuario','$this->senha',$this->ativo,$this->tipo)";
        $result = mysql_query($query);
        return $result;
    }
    
    public function consultar(){
        $query = "SELECT * FROM usuario where usuario='$this->usuario' and senha='$this->senha'";
        $result = mysql_query($query);
        $obj = mysql_fetch_object($result);
        return $obj;
    }
    
    public function pesquisar($id){
        $query = "SELECT * FROM usuario where idusuario=$id";
        $result = mysql_query($query);
        $obj = mysql_fetch_object($result);
        return $obj;
    }
    
    public function alterar($id) {
        $query = "update usuario set usuario='$this->usuario',
                                     ativo='$this->ativo',
                                     tipo='$this->tipo'
                where idusuario=$id";
        $res = mysql_query($query);
        return $res;
    }
    
    
}