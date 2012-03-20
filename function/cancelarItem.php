<?php
include "../class/Call.class.php";

$produto = $_GET['item'];
$codVenda = $_GET['venda']; 

$query = "SELECT * FROM venda WHERE codVenda='$codVenda' AND idProduto='$produto'";
$res = mysql_query($query);
$l = mysql_fetch_array($res);

$query2 = "SELECT * FROM produto WHERE idProduto='$produto'";
$res2 = mysql_query($query2);
$l2 = mysql_fetch_array($res2);


$qtd = $l['qtd'] - 1;
$total = $l['total'] - $l2['precoVenda'];

if($l['qtd'] == 1){
	$query4 = "DELETE FROM venda WHERE codVenda='$codVenda' AND idProduto='$produto'";
	$res4 = mysql_query($query4);
}else{
	$query3 = "UPDATE venda SET qtd='$qtd', total='$total' WHERE codVenda='$codVenda' AND idProduto='$produto'";
	$res3 = mysql_query($query3);
}


header('Location: ../main/venda.php');
?>
