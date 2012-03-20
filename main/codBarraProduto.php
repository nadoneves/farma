<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

?>

<form id="form" name="form">
	<table class='tbl_altProduto'>
		<tr>
			<td>Produto&nbsp;&nbsp;</td>
			<td>
				<input type="text" class="pad" name="nomeProduto" id="nomeProduto" value="" autocomplete="off" />
		</tr>
		<tr>
			<td colspan=2 align='right'>&nbsp;</td>
		</tr>
		<tr>
		<td>C&oacute;digo de barras&nbsp;&nbsp;</td>
			<td>
				<input type="text" class="pad" name="codBarra" id="codBarra" value="" />
			</td>
		</tr>
		<tr>
			<td colspan=2 align='right'>&nbsp;</td>
		</tr>
		<tr>
			<td colspan=2 align='right'>
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Editar" />
			</td>
		</tr>
	</table>
</form>	

<script language="javascript" type="text/javascript">
		<!--
			$(window).load(function() {
				// AutoComplete
				$('#nomeProduto').simpleAutoComplete('../function/autocompleteCodBarraProduto.php',{
					autoCompleteClassName:	'autocomplete',
					selectedClassName:		'sel',
					attrCallBack:			'rel',
					identifier:				'produto'
				}, usuarioCallback);
				
				// Nova Janela com o código de barras
				$("#form").submit(function(){
					var codBarra = $("#codBarra").val();
					// Centralizar a janela
					var esquerda = (screen.width - 200)/2;
					var topo = (screen.height - 100)/2;
					window.open('../function/gerarCodBarras.php?codBarra='+codBarra,'page','width=200,height=100,toolbar=no,location=no,status=no,menubar=no,scroolbars=no,resizable=no, top='+topo+',left='+esquerda+'');
				});		
			});
			
			function usuarioCallback( par ) {
				$("#codBarra")	.val( par[0] );
			}
		// -->
</script>


<?php include 'rodape.php'; ?>
