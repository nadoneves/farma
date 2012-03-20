<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

if($_POST){
	$fornecedor = new Fornecedor($_POST);
	$res = $fornecedor->cadfornecedor();
	($res) ? $msg = 'Fornecedor Cadastrado Com Sucesso' : $msg = 'Erro ao cadastrar o Fornecedor';
	echo "<script>alert('".$msg."');</script>";
}
?>
<form method="post">
<table class="tbl_cadProduto">
        <tr>
		<td>CNPJ</td>
		<td><input type="text" name="cnpj" id="cnpj" /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>nome</td>
		<td><input type="text" name="nome" /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
		<td>telefone</td>
		<td><input type="text" name="telefone" id="telefone" /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
		<td>email</td>
		<td><input type="text" name="email" id="email" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cep</td>
		<td><input type="text" name="cep" id="cep" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>endere&ccedil;o</td>
		<td><input type="text" name="endereco" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>numero</td>
		<td><input type="text" name="numero" id="numero" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>complemento</td>
		<td><input type="text" name="complemento" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>bairro</td>
		<td><input type="text" name="bairro" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cidade</td>
		<td><input type="text" name="cidade" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>uf</td>
		<td>
                    <select name="uf">
                        <option>SELECIONE</option>
                        <option>---------</option>
                        <?php
                            $res = Uf::listarUf();
                            while ( $row = mysql_fetch_array($res) ) {
                                echo "<option value=".$row['idUF'].">".$row['sigla']."</option>";
                            }
                        ?>
                    </select>
                </td>
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
</table>
</form>

<script	src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
<!--
    $('#cnpj').mask('99.999.999/9999-99');
    $('#telefone').mask('(99) 9999-9999');
    $('#cep').mask('99999-999');
// -->
</script>

<?php include 'rodape.php'; ?>