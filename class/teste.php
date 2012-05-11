<?php

include 'Call.class.php';

$r = Estoque::qtdEstoque(1);
$e = mysql_fetch_array($r);

echo "a<br>";
echo $e['qtd'];
