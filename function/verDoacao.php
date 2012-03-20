<?php
$caminho = $_GET['caminho'];

$fp = fopen($caminho, "r");
while ( !feof($fp) ) {
    $buffer = fgets($fp, 4096);
    $lines[] = $buffer;
}
fclose($fp);

for ($i = 0; $i<= sizeof($lines); $i++) {
    echo $lines[$i],"<br />";
}

?>
