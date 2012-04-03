<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

if($_POST){
	$produto = new Produto($_POST);
	$res = $produto->cadProduto();
	($res) ? $msg = 'Produto Cadastrado Com Sucesso' : $msg = 'Erro ao cadastrar o Produto';
	echo "<script>alert('".$msg."');</script>";
}
?>
<form method="post">
<table class="tbl_cadProduto">
	<tr>
		<td>Cod. Barra</td>
		<td>
			<input type="text" name="codBarras" />	
		</td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
    <tr>
		<td>Tipo</td>
		<td>
			<input type="text" name="tipo" />	
		</td>
	</tr>
    <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
    <tr>
		<td>Marca</td>
		<td>
			<input type="text" name="marca" />	
		</td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Descri&ccedil;&atilde;o</td>
		<td><textarea name="descricao"></textarea></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
        <td>Fabrica&ccedil;&atilde;o</td>
		<td><input type="text" name="dataFab" id="dataFab" readonly /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Validade</td>
		<td><input type="text" name="dataVal" id="dataVal" readonly /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="right">
			<input type="button" class="bt_gravar" onclick="submit()" value="Gravar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Voltar" />
		</td>
	</tr>
</form>

<script	src="../js/jquery.maskMoney.js" type="text/javascript"></script>
<script>
<!--
    $('#precoUnidade').maskMoney({allowZero:false, allowNegative:false, defaultZero:false});
    $('#precoVenda').maskMoney({allowZero:false, allowNegative:false, defaultZero:false});
    $("#dataFab").datepicker();
    $("#dataVal").datepicker();
-->    
</script>

<?php include 'rodape.php'; ?>
