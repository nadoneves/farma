<?php
include '../class/Call.class.php';
#-----------------------\\
//$conexao = new Conexao();

extract($_GET);

# seleciona os produtos e exibe para montar a lista de venda
$query4 = "SELECT p.*, v.* FROM venda v
			INNER JOIN produto p ON p.idProduto = v.idProduto			
						WHERE v.codVenda='$codVenda' and v.finalizada=0";
$res4 = mysql_query($query4);
$carrinho = "<table width='600px' cellpadding=0 cellspacing=0 class='tbl_vendaD'>";
$carrinho .= "<thead><tr>";
$carrinho .= "<td>C&oacute;digo</td>";
$carrinho .= "<td>Produto</td>";
$carrinho .= "<td>Quantidade</td>";
$carrinho .= "<td>Pre&ccedil;o</td>";
$carrinho .= "<td>&nbsp;</td>";
$carrinho .= "</tr></thead><tbody>";
while( $l4 = mysql_fetch_array($res4) ) {
	$carrinho .= "<input type='hidden' name='produto[]' value='".$l4['idProduto']."' />";
        $carrinho .= "<input type='hidden' name='nomeProduto[]' value='".$l4['marca']."' />";
	$carrinho .= "<input type='hidden' name='qtd[]' value='".$l4['qtd']."' />";
	$carrinho .= "<tr align='center'>";
	$carrinho .= "<td>".$l4['codBarra']."</td>";
	$carrinho .= "<td>".$l4['marca']."</td>";
	$carrinho .= "<td>".$l4['qtd']."</td>";
	$carrinho .= "<td>R$ ".$l4['total']."<input type='hidden' name='total1[]' value='".$l4['total']."'></td>";
	$carrinho .= "<td><a href='../function/cancelarItemCaixa.php?item=".$l4['idProduto']."&venda=".$codVenda."' border=0><img src='../imagens/layout/ico_del.png' /></a></td>";
	$carrinho .= "</tr>";
	$carrinho .= "<tr align='right'><td>&nbsp;</td></tr>";
}
$carrinho .= "</tbody><tr><td colspan=5>&nbsp;</td></tr>";
$carrinho .= "<tr>";
$total = Venda::totalVenda($codVenda);
$carrinho .= "<td align='right' colspan='4'  style='border-top:2px solid #aaa;'>TOTAL:</td>";
if($total->precoTotal == "") $aPagar = "0.00"; else $aPagar = $total->precoTotal;
$carrinho .= "<td style='border-top:2px solid #aaa;' align='right'>R$ ".$aPagar."</td>";
$carrinho .= "<input type='hidden' name='total2' id='total2' value='".$aPagar."' />";
$carrinho .= "</tr></table>";
print $carrinho;
#-----------------------------------------------------------------------------------------------


?>
















