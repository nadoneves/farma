<?php
include "../class/Call.class.php";

$codDoacao = $_GET['doacao'];

$query = "DELETE FROM doacao WHERE codDoacao='$codDoacao'";
$res = mysql_query($query);


header('Location: ../main/doacao.php');
?>
