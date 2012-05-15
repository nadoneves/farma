<?php
include_once("formataData.php");
include_once("../class/Call.class.php");
session_start();

extract($_POST);

/*
echo $idFornecedor."<br />";
echo $fornecedor."<br />";
echo $nNf."<br />";
echo $dataNf."<br />";
var_dump($produto);
echo "<br />";
var_dump($idProduto);
echo "<br />";
var_dump($qtd);
echo "<br />";
var_dump($precoUnidade);
*/
$data = data_ymd($dataNf);

$cont = 0;

$e = new Entrada($_POST);


for($i=0;$i<sizeof($produto);$i++){
    $res = $e->nova($idProduto[$i], $idFornecedor, $nNf, $dataNf, $qtd[$i], $precoUnidade[$i]);
    if ( $res ){ echo "Produto: ".$idProduto[$i]." - ".$produto[$i]." INSERIDO <br />"; }else{ $cont++; }
}

if ( $cont != 0 ) 
{
    echo 'Erro: '.mysql_error(); 
}
else
{
    unset( $_SESSION['entradaProduto'] ); 
    header('Location: ../main/Entrada.php?msg=Entrada Incuida com Sucesso');    
}

?>
