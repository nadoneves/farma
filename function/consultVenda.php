<?php
include "../class/Call.class.php";

$codBarras = $_GET['codBarras'];
$codVenda = $_GET['codVenda'];

# Seleciona o produto através do Código de Barras
$query = "SELECT p.*, n.natureza, e.quantidade FROM produto p 
			INNER JOIN natureza n ON n.idNatureza = p.idNatureza
				INNER JOIN entrada_produto e ON e.idProduto = p.idProduto
					WHERE p.codBarra='$codBarras'";

$res = mysql_query($query);
$l = mysql_fetch_array($res);
#-----------------------------------------------------------------------------------------------

# Verifica se o Produto ja se encontra na lista de venda
$query2 = "SELECT * FROM venda WHERE idProduto='".$l['idProduto']."' AND codVenda='$codVenda'";
//echo $query2;
$res2 = mysql_query($query2); 
$l2 = mysql_num_rows($res2);
$l22 = mysql_fetch_array($res2);
#-----------------------------------------------------------------------------------------------

# se sim atualiza a quantidade e o valor
if( $l2 != 0 ){
	$qtd = $l22['qtd'] + 1;
	$total = $l22['total'] + $l['precoVenda'];
	$query3 = "UPDATE venda SET qtd='$qtd', total='$total' WHERE idProduto='".$l['idProduto']."' AND codVenda='$codVenda'";
	$res3 = mysql_query($query3);
}else{
	# se não adiciona o novo produto
	if(	$l['idProduto'] != "") {
		//echo "upa";
		$query4 = "INSERT INTO venda VALUES (null,'$codVenda','".$l['idProduto']."','1','".$l['precoVenda']."',null,null)";
		$res4 = mysql_query($query4);
	}
}
#-----------------------------------------------------------------------------------------------

# seleciona os produtos e exibe para montar a lista de venda
$query4 = "SELECT p.*, n.natureza, e.quantidade, v.* FROM venda v
			INNER JOIN produto p ON p.idProduto = v.idProduto			 
				INNER JOIN natureza n ON n.idNatureza = p.idNatureza
					INNER JOIN entrada_produto e ON e.idProduto = p.idProduto
						WHERE v.codVenda='$codVenda'";
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
        $carrinho .= "<input type='hidden' name='nomeProduto[]' value='".$l4['natureza']." - ".$l4['descricao']."' />";
	$carrinho .= "<input type='hidden' name='qtd[]' value='".$l4['qtd']."' />";
	$carrinho .= "<tr align='center'>";
	$carrinho .= "<td>".$l4['codBarra']."</td>";
	$carrinho .= "<td>".$l4['natureza']." - ".$l4['descricao']."</td>";
	$carrinho .= "<td>".$l4['qtd']."</td>";
	$carrinho .= "<td>R$ ".$l4['total']."<input type='hidden' name='total1[]' value='".$l4['total']."'></td>";
	$carrinho .= "<td><a href='../function/cancelarItem.php?item=".$l4['idProduto']."&venda=".$codVenda."' border=0><img src='../imagens/layout/ico_del.png' /></a></td>";
	$carrinho .= "</tr>";
	$carrinho .= "<tr align='right'><td>&nbsp;</td></tr>";
}
$carrinho .= "</tbody><tr><td colspan=5>&nbsp;</td></tr>";
$carrinho .= "<tr>";
$total = Venda::totalVenda($codVenda);
$carrinho .= "<td align='right' colspan='4'  style='border-top:2px solid #aaa;'>TOTAL:</td>";
if($total->precoTotal == "") $aPagar = "0.00"; else $aPagar = $total->precoTotal;
$carrinho .= "<td style='border-top:2px solid #aaa;' align='right'>R$ ".$aPagar."</td>";
$carrinho .= "<input type='hidden' name='total2' value='".$aPagar."' />";
$carrinho .= "</tr></table>";
print $carrinho;
#-----------------------------------------------------------------------------------------------















