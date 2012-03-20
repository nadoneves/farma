<?php

class Conexao {

	function __construct() {
                        
            // Servidor de Produção
            $con = mysql_connect("localhost","root","");
            
            // Banco Funcional
            $bd = mysql_select_db("pharma",$con);
            
        }
}

?>