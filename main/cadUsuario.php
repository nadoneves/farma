<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include '../function/validar.php';
include 'topo.php';

# Se o formulário form submetido executar a condição abaixo
if($_POST){
    $verificaCpf = cpf( $_POST['cpf'] );
    if( $verificaCpf ){
        $usuario = new Usuario($_POST);
        $res = $usuario->novo();
        ($res) ? $msg = 'Usuario Cadastrado Com Sucesso' : $msg = 'Erro ao cadastrar o Usuario';
        echo "<script>alert('".$msg."');</script>";
    }else{
        echo "<script>alert('CPF invalido.'); history.back();</script>";
    }
}
?>
<form method="post" id="form">
<table class="tbl_cadProduto" border="0">
	<tr>
		<td>Nome</td>
		<td class="input"><input type="text" name="nome" id="nome" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cpf</td>
		<td class="input"><input type="text" name="cpf" id="cpf" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>telefone</td>
		<td class="input"><input type="text" name="telefone" id="telefone" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Usu&aacute;rio</td>
		<td class="input"><input type="text" name="usuario" id="usuario" style="text-transform: none;" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Senha</td>
		<td class="input"><input type="password" name="senha" id="senha" style="text-transform: none;" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Status</td>
		<td class="input">
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
		<td class="input">
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
        <td>
		<td class="input">
			<input type="button" class="bt_gravar" id="gravar" value="Gravar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Voltar" />
		</td>
	</tr>
        </table>
</form>
<style>
label.error {
    margin: 0 !important;
    padding: 0;
    font-size: 10px;
    /*top: 20px;*/
    position: relative;
    /*left: -200px;*/
    color: #8A1F11;
	background: #FBE3E4;
	border: 1px solid #FBC2C4;
}
input.error{ 
    margin:0 auto !important; 
    padding: 0 !important;

}
table{ margin-left: 300px}
td.input{ width: 500px; text-align: left;}
</style>
<script	src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
    // mascara de campos
    $('#cpf').mask('999.999.999-99');
    $('#telefone').mask('(99) 9999-9999');
    
    // Validacao do formulario
    $('#gravar').click( function(){
        $('#form').validate({
            // define regras para os campos
            rules: {
                nome: {
                    required: true,
                    minlength: 10
                },
                cpf: {
                    required: true
                },
                telefone: {
                    required: true
                },
                usuario: {
                    required: true
                },
                senha: {
                    required: true
                },
                ativo: {
                    required: true
                },
                tipo: {
                    required: true
                }
            }
        });
        $('#form').submit();
    });
</script>
<?php include 'rodape.php'; ?>
