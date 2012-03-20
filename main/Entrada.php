<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

if($_POST){
	$entrada = new Entrada($_POST);
	$entradaProduto = $entrada->entradaProduto();
	if($entradaProduto){
		$msg = "Produto Cadastrado";	
	}else{
		$msg = "Erro ao cadastrar o Produto verifique o SQL";
	}
	echo "<script>alert('".$msg."')</script>";
}
?>
<form method="post">
	<table class="tbl_entradaProd">
		<tr>
			<td>Produto</td>
			<td>
				<input type="text" class="pad" name="nomeProduto" id="nomeProduto" value="" autocomplete="off" />
				<input type="hidden" class="pad" name="idProduto" id="idProduto" value="" />
			</td>
		</tr>
		<tr>	
			<td colspan=2>&nbsp;</td>
		</tr>
		<tr>
			<td>Quantidade Atual</td>
			<td><input type="text" name="quantidadeAtual" id="quantidadeAtual" readonly /></td>
		</tr>
		<tr>	
			<td colspan=2>&nbsp;</td>
		</tr>
		<tr>
			<td>Quantidade</td>
			<td><input type="text" name="quantidade" /></td>
		</tr>
		<tr>	
			<td colspan=2>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="button" class="bt_gravar" onclick="submit()" name="cadastrar" value="Cadastrar" />
				<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Cancelar" />
			</td>
		</tr>
	</table>
</form>

<script language="javascript" type="text/javascript">
		<!--
			$(window).load(function() {
				$('#nomeProduto').simpleAutoComplete('../function/autocomplete.php',{
					autoCompleteClassName:	'autocomplete',
					selectedClassName:		'sel',
					attrCallBack:			'rel',
					identifier:				'produto'
				}, usuarioCallback);
			});
			
			function usuarioCallback( par ) {
				$("#idProduto")			.val( par[0] );
				$("#quantidadeAtual")	.val( par[1] );
			}
		// -->
		</script>	
<?php include 'rodape.php'; ?>
