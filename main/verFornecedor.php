<?php
include '../class/Call.class.php';
include 'topo.php';

$idfornecedor = $_GET['fornecedor'];

$editar = Fornecedor::verfornecedor($idfornecedor);
$uf = Uf::ufId($editar->uf);
?>

<table class="tbl_cadProduto">
        <tr>
		<td>cnpj</td>
		<td><input type="text" name="cnpj" value="<?php echo $editar->cnpj ?>" disabled /></td>
	</tr>
	<tr>
		<td>nome</td>
		<td><input type="text" name="nome" value="<?php echo $editar->nome ?>" disabled /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
		<td>telefone</td>
		<td><input type="text" name="telefone" value="<?php echo $editar->telefone ?>" disabled /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
		<td>email</td>
		<td><input type="text" name="email" value="<?php echo $editar->email ?>" disabled /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cep</td>
		<td><input type="text" name="cep" value="<?php echo $editar->cep ?>" disabled /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>endere&ccedil;o</td>
		<td><input type="text" name="endereco" value="<?php echo $editar->endereco ?>" disabled /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>numero</td>
		<td><input type="text" name="numero" value="<?php echo $editar->numero ?>" disabled /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>complemento</td>
		<td><input type="text" name="complemento" value="<?php echo $editar->complemento ?>" disabled /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>bairro</td>
		<td><input type="text" name="bairro" value="<?php echo $editar->bairro ?>" disabled /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cidade</td>
		<td><input type="text" name="cidade" value="<?php echo $editar->cidade ?>" disabled /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>uf</td>
		<td><input type="text" name="uf" value="<?php echo $uf->sigla ?>" disabled /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="right">
			<input type="button" class="bt_voltar" onclick="javascript: window.location='listarFornecedores.php';" value="Voltar" />
		</td>
	</tr>
</table>
