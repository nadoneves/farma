<?php
include "../class/Call.class.php";

$codBarras = $_GET['codBarras'];
$codVenda = $_GET['codVenda'];
if($_GET['qtd'] == null)
    $qtdVenda = 0;
else
    $qtdVenda = $_GET['qtd'];

# Seleciona o produto através do Código de Barras
$query = "SELECT p.*, e.precoUnidade, es.qtd FROM produto p 
				INNER JOIN entrada_produto e ON e.idProduto = p.idProduto
                    INNER JOIN estoque es ON es.idProduto = p.idProduto
                        WHERE p.codBarra='$codBarras' and es.qtd > $qtdVenda";

$res = mysql_query($query);
$l = mysql_fetch_array($res);

$id_produto = $l['idProduto'];


if ($res){
if( !empty($codBarras) && $qtdVenda > $l['qtd']){
    echo "<script>alert('Produto sem estoque')</script>";
}else{
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
	$qtd = $l22['qtd'] + $qtdVenda;
	$total = $l22['total'] + Produto::precoProd($id_produto) * $qtdVenda;
	$query3 = "UPDATE venda SET qtd='$qtd', total='$total' WHERE idProduto='".$l['idProduto']."' AND codVenda='$codVenda'";
	$res3 = mysql_query($query3);
}else{
	# se não adiciona o novo produto
	if(	$l['idProduto'] != "") {
		//echo "upa";
		$query4 = "INSERT INTO venda VALUES (null,'$codVenda','".$l['idProduto']."','".$qtdVenda."','".Produto::precoProd($id_produto) * $qtdVenda."',null,null,null)";
		$res4 = mysql_query($query4);
	}
}
#-----------------------------------------------------------------------------------------------

} }

# seleciona os produtos e exibe para montar a lista de venda
$query4 = "SELECT p.*, v.* FROM venda v
			INNER JOIN produto p ON p.idProduto = v.idProduto			
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
        $carrinho .= "<input type='hidden' name='nomeProduto[]' value='".$l4['marca']."' />";
	$carrinho .= "<input type='hidden' name='qtd[]' value='".$l4['qtd']."' />";
	$carrinho .= "<tr align='center'>";
	$carrinho .= "<td>".$l4['codBarra']."</td>";
	$carrinho .= "<td>".$l4['marca']."</td>";
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
#------------------------------------------------------------------------------------------------


?>
















