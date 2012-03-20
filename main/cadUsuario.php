<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

if($_POST){
	$usuario = new Usuario($_POST);
	$res = $usuario->novo();
	($res) ? $msg = 'Usuario Cadastrado Com Sucesso' : $msg = 'Erro ao cadastrar o Usuario';
	echo "<script>alert('".$msg."');</script>";
}
?>
<form method="post">
<table class="tbl_cadProduto">
	<tr>
		<td>Usu&aacute;rio</td>
		<td><input type="text" name="usuario" id="usuario" style="text-transform: none;" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Senha</td>
		<td><input type="password" name="senha" id="senha" style="text-transform: none;" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
                    <select name="ativo">
                        <option></option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
            <td>Fun&ccedil;&atilde;o</td>
		<td>
                    <select name="tipo">
                        <option></option>
                        <option value="4">Balconista</option>
                        <option value="5">Caixa</option>
                        <option value="2">Estoquista</option>
                        <option value="3">Farmac&ecirc;utico</option>
                        <option value="1">Gerente</option>
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

<?php include 'rodape.php'; ?>
