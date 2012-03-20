<?php

class Uf {

    public static function listarUf() {
        $query = "SELECT * FROM uf ORDER BY sigla ASC";
        $res = mysql_query($query);
        
        return $res;
    }
    
    public static function ufId($id) {
        $query = "SELECT * FROM uf WHERE idUF='$id'";
        $res = mysql_query($query);
        $obj = mysql_fetch_object($res);
        
        return $obj;
    }
}

?>
