<?php

// Função para transformar strings em Maiúscula ou Minúscula com acentos
// $palavra = a string propriamente dita
// $tp = tipo da conversão: 1 para maiúsculas e 0 para minúsculas
function converteM($term, $tp) {
    if ($tp == 1) $palavra = strtr(strtoupper($term),"àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ","ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
    elseif ($tp == 0) $palavra = strtr(strtolower($term),"ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß","àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
    return $palavra;
}

// Exemplo de Utilização - Maiúscula
//$exemplo1 = "notícias";
//echo convertem($exemplo1, 1);

// Exemplo de Utilização - Minúscula
//$exemplo2 = "NOTÍCIAS";
//echo convertem($exemplo2, 0);

?>
