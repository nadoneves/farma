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
		<td>Natureza</td>
		<td>
			<select name="natureza">
				<option value="">-- SELECIONE</option>
				<?php
					$listarNatureza = Natureza::listarNatureza();
					while( $nat = mysql_fetch_array($listarNatureza) ) {
						echo "<option value='".$nat['idNatureza']."'>".converteM($nat['natureza'],1)."</option>";					
					}
				?>
			</select>	
		</td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Bens</td>
		<td>
			<select name="bens">
				<option value="">-- SELECIONE</option>
				<?php
					$listarBens = Produto::listarBens();
					while( $bens = mysql_fetch_array($listarBens) ) {
						echo "<option value='".$bens['idBens']."'>".converteM($bens['bens'],1)."</option>";					
					}
				?>
			</select>
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
		<td>Pre&ccedil;o Unidade</td>
		<td><input type="text" name="precoUnidade" id="precoUnidade" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Pre&ccedil;o Venda</td>
		<td><input type="text" name="precoVenda" id="precoVenda" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Unidade</td>
		<td><input type="text" name="unidade" /></td>
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
    $('#precoUnidade').maskMoney({allowZero:false, allowNegative:true, defaultZero:false});
    $('#precoVenda').maskMoney({allowZero:false, allowNegative:true, defaultZero:false});
-->    
</script>

<?php include 'rodape.php'; ?>
