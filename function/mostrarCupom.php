<?php

$fopen2 = fopen( $_GET['value'], "r" );

while (!feof ($fopen2)) {
  $linha = fgets($fopen2, 4096);
  echo $linha."<br>";
}
fclose ($fopen2);