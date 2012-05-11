<?php
include "../class/Call.class.php";

$codVenda = $_GET['venda'];

$query = "DELETE FROM venda WHERE codVenda='$codVenda'";
$res = mysql_query($query);


header('Location: ../main/vendaCaixa.php');
?>
