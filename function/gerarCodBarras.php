<?php
require_once("Image/Barcode.php"); // chamada para a biblioteca Image_Barcode

// O parâmetro deve ser passado via GET
// se for passado via POST não será possível
// salvar o código gerado como .PNG
$cod = $_GET['codBarra'];
$type = "code128";
Image_Barcode::draw($cod, $type);

?>
