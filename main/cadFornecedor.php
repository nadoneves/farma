<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include '../function/validar.php';
include 'topo.php';

# Se o formulário form submetido executar a condição abaixo
if($_POST){
    if( !cnpj($_POST['cnpj'])){
        echo "<script>alert('ERRO. CNPJ nao e valido.'); history.back();</script>";
    }else{
        $fornecedor = new Fornecedor($_POST);
	$res = $fornecedor->cadfornecedor();
	($res) ? $msg = 'Fornecedor Cadastrado Com Sucesso' : $msg = 'Erro ao cadastrar o Fornecedor';
	echo "<script>alert('".$msg."');</script>";
    }
}
?>
<form method="post" id="form" name="form" action="#">
<table class="tbl_cadProduto">
        <tr>
		<td>CNPJ</td>
		<td class="input"><input type="text" name="cnpj" id="cnpj" /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>nome</td>
		<td class="input"><input type="text" name="nome" /></td>
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
		<td>email</td>
		<td class="input"><input type="text" name="email" id="email" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cep</td>
		<td class="input"><input type="text" name="cep" id="cep" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>endere&ccedil;o</td>
		<td class="input"><input type="text" name="endereco" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>numero</td>
		<td class="input"><input type="text" name="numero" id="numero" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>complemento</td>
		<td class="input"><input type="text" name="complemento" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>bairro</td>
		<td class="input"><input type="text" name="bairro" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cidade</td>
		<td class="input"><input type="text" name="cidade" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>uf</td>
		<td class="input">
                    <select name="uf">
                        <option value="" selected>SELECIONE</option>
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
        <td></td>
		<td class="input">
			<input type="button" class="bt_gravar" id="gravar" value="Gravar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Voltar" />
            <input type="button" class="bt_buscar" name="editar" id="editar" value="Buscar" />
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
<script	src="../js/jquery.validate.js" type="text/javascript"></script>
<script>
    // mascara dos campos
    $('#cnpj').mask('99.999.999/9999-99');
    $('#telefone').mask('(99) 9999-9999');
    $('#cep').mask('99999-999');
    
    // Validacao do formulario
    $('#gravar').click( function(){
        $('#form').validate({
            // define regras para os campos
            rules: {
                nome: {
                    required: true,
                    minlength: 10
                },
                cnpj: {
                    required: true
                },
                telefone: {
                    required: true
                },
                cep: {
                    required: true
                },
                endereco: {
                    required: true
                },
                numero: {
                    required: true
                },
                bairro: {
                    required: true
                },
                cidade: {
                    required: true
                },
                uf: {
                    required: true
                }
            }
        });
        $('#form').submit();
    });
    
    $("#editar").click( function(){
        document.forms["form"].action = "alterarFornecedor.php";
        document.forms["form"].submit();
    });

</script>

<?php include 'rodape.php'; ?>