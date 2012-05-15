<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

$produtos = Produto::listarProdutosEstoque();
?>
<style rel="stylesheet" type="text/css" media="print">
<!--
.bt_imprimir, #sup { display: none; }
#container { height: auto !important; }
.tbl_estoque { display:block;	}
.tbl_estoque tr td { border: 1px solid #000; }
.tbl_estoque thead { color: #000 !important; font-weight: bold !important; }
-->
</style>
<style rel="stylesheet" type="text/css" media="screen">
	table{
		border: 0;
		width: 900px;	
	}
	table tr td{
		height: 30px;	
	}
        #bt_imprimir { margin-top: 40px !important; }
        .tbl_estoque { margin-top: 20px !important; }
</style>
<script>
	$(document).ready(function() {	
		$('table thead').css('background','url(../imagens/layout/menu.png)');
                $('table thead').css('background-position','0px -90px');
		$('table thead').css('color','#fff');		
		$('table tbody tr:odd').css('background','#fff');
		$('table tbody tr:even').css('background','#bbb');
                $('#bt_imprimir').click(function(){
                    window.print();
                });
	});
</script>
<input type="button" class="bt_imprimir" id="bt_imprimir" value="Imprimir Lista" />
<table cellpadding=0 cellspacing=0 class="tbl_estoque">
	<thead>
		<tr>
			<td>C&oacute;digo</td>
			<td>Produto</td>
			<td>Pre&ccedil;o</td>
			<td>Estoque</td>
		</tr>
	</thead>
	<tbody>
<?php
while($row = mysql_fetch_array($produtos)) {
	$table .= "<tr>";
	$table .= " <td>".$row['codBarra']."</td>";
    $table .= " <td>".converteM($row['tipo'],1)." - ".converteM($row['marca'],1)."</td>";
	//$table .= " <td>".converteM($row['unidade'],1)."</td>";
	$table .= " <td>R$ ".$row['precoUnidade']."</td>";
	//$table .= " <td>R$ ".$row['precoVenda']."</td>";
	$table .= " <td>".$row['quantidade']."</td>";
	$table .= "</tr>";	
}
print $table;
?>
	</tbody>
</table>
<?php include 'rodape.php'; ?>