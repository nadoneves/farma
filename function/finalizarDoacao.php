<?php
include "../class/Call.class.php";

session_start();
extract($_POST);

for($i = 0; $i < count($produto); $i++){
	$query = "SELECT * FROM entrada_produto WHERE idProduto='".$produto[$i]."'";
	$res = mysql_query($query);
	$obj = mysql_fetch_array($res);

	$sub = $obj['quantidade'] - $qtd[$i];
	
	$query2 = "UPDATE entrada_produto SET quantidade='$sub' WHERE idProduto='".$produto[$i]."'";
	$res2 = mysql_query($query2);

}

$nomeIgreja = Igreja::verIgreja($igreja);


$query3 = "UPDATE doacao SET idIgreja='$igreja' WHERE codDoacao='".$_SESSION['codDoacao']."'";
$res3 = mysql_query($query3);

$dia = date('d-m-Y_H-i');

// Servidor de Aplicação
$caminho = "C:\wamp\www\pai\imp\doacao\doacao_$dia.txt";

// Servidor de Desenvolvimento
//$caminho = "/var/www/pai/imp/doacao/doacao_$dia.txt";

// CRIA/ABRE O ARQUIVO IMPRIMIR.TXT E APAGA OS DADOS EXISTENTE
$fp = fopen($caminho, "w+");

$imprimir = "                CUPOM DE DOACAO                  ";
$imprimir .= "\n"; 
$imprimir .= "\n------------------------------------------------";
$imprimir .= "\n               Jeova Shalom"; 
$imprimir .= "\n          Artigos Evangelicos em Geral";
$imprimir .= "\nRua Piraquara, LT39 Loja 6 - Realengo";
$imprimir .= "\nCEP: 21755-270 / Rio de janeiro - RJ";
$imprimir .= "\njeova2011shalom@gmail.com";
$imprimir .= "\n(21) 3253-9364 / (21) 7757-3140 / 106*171737";
$imprimir .= "\n------------------------------------------------";
$imprimir .= "\nDOACAO: ".$_SESSION['codDoacao'];
$imprimir .= "\nBENEFICIARIO: $nomeIgreja->nome";
$imprimir .= "\n------------------------------------------------";
$imprimir .= "\nQtd      Produto";
     
    $query4 = "SELECT * FROM produto WHERE idProduto='".$produto."'";
    $res4 = mysql_query($query4);
    $obj4 = mysql_fetch_object($res4);
    
for($j = 0; $j < count($produto); $j++){
    $imprimir .= "\n".$qtd[$j]."x       ".$nomeProduto[$j]."      DOACAO";
}
$imprimir .= "\n                                          ------";
$imprimir .= "\n                               Total: DOACAO";
$imprimir .= "\n------------------------------------------------";
$imprimir .= "\n           'O Senhor e a Nossa Paz'";
$imprimir .= "\n           Obrigado e Volte Sempre";
$imprimir .= "\n------------------------------------------------";
$imprimir .= "\n        Bazar v1.0 ".date('d/m/Y H:i');
$imprimir .= "\n------------------------------------------------";

// espa�o ap�s impress�o
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
$imprimir .= "\n";
//print $imprimir;

$salva = fwrite($fp, $imprimir);

// FECHA O ARQUIVO IMPRIMIR.TXT
fclose($fp);

// Salva o caminho do aqrquivo txt no DB
mysql_query("UPDATE doacao SET caminho='$caminho' WHERE codDoacao='".$_SESSION['codDoacao']."'");


// ENVIA O ARQUIVO PARA PORTA COM3
exec("copy " . $caminho . " com3:");

unset($_SESSION['codDoacao']);
header("Location: ../main/doacao.php");
//session_destroy();
?>

