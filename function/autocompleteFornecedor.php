<?php
header('Content-type: text/html; charset=UTF-8');

session_start();
include '../class/Call.class.php';


if( isset($_REQUEST['query']) && $_REQUEST['query'] != "" ) {
	//$q = mysql_real_escape_string( $_REQUEST['query'] );
	$q = utf8_decode($_REQUEST['query']);
	
	// BUSCA O PRODUTO COM O TEXTO DIGITADO
	$sql	= "SELECT * FROM fornecedor WHERE nome like'%$q%' ORDER BY nome ASC LIMIT 10";
	$r	= mysql_query( $sql );
	if ($r) {
		echo '<ul>'."\n";
		$cont	= 0;
		while($l = mysql_fetch_array($r)) {
			
			$p = $l['nome'];
			$p = preg_replace('/('.$q.')/i', '<span style="font-weight:bold;">$1</span>', $p);
			$p = strtoupper($p);
			
			echo "\t".'<li id="autocomplete_'.$l['idfornecedor'].'" rel="'.$l['idfornecedor'].'">'.utf8_encode($p).'</li>'."\n";
			$cont++;
		}
		if ($cont < 1) {
			$p	= "NENHUM FORNECEDOR ENCONTRADO!";
			echo "\t".'<li style="cursor: default;">'.utf8_encode($p).'</li>'."\n";
		}
		echo '</ul>';
	}

}
?>
