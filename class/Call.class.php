<?php

require_once("../function/formataData.php");

// Classe global de chamada para todas as classes 

include 'Conexao.class.php';
#-----------------------\\
$conexao = new Conexao();
#-----------------------//
include 'CodBarra.class.php';
include 'Doacao.class.php';
include 'Entrada.class.php';
include 'Fornecedor.class.php';
include 'Natureza.class.php';
include 'Produto.class.php';
include 'Uf.class.php';
include 'Usuario.class.php';
include 'Venda.class.php';

?>
