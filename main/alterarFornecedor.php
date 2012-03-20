<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

$fornecedor = new Fornecedor($_POST);

if($_POST){
	
	$alt = $_POST['editar'];

	if( $alt == "Alterar") {
		$alterar = $fornecedor->alterarfornecedor();
		if($alterar){
			$msg = "Fornecedor alterado";
		}else{
			$msg = "Erro ao alterar o Fornecedor";
		}
		echo "<script>alert('".$msg."')</script>";
//		header('Location: alterarProduto.php');
	}
	if( $alt == "Editar") {
		$editar = $fornecedor->pesqFornecedor();
?>
<form method="post">
	<input type="hidden" name="idfornecedor" value="<?php echo $editar->idfornecedor ?>" />
<table class="tbl_cadProduto">
        <tr>
		<td>CNPJ</td>
		<td><input type="text" name="cnpj" id="cnpj" value="<?php echo $editar->cnpj ?>" /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>nome</td>
		<td><input type="text" name="nome" value="<?php echo $editar->nome ?>" /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
		<td>telefone</td>
		<td><input type="text" name="telefone" value="<?php echo $editar->telefone ?>" id="telefone" /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
		<td>email</td>
		<td><input type="text" name="email" value="<?php echo $editar->email ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cep</td>
		<td><input type="text" name="cep" value="<?php echo $editar->cep ?>" id="cep" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>endere&ccedil;o</td>
		<td><input type="text" name="endereco" value="<?php echo $editar->endereco ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>numero</td>
		<td><input type="text" name="numero" value="<?php echo $editar->numero ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>complemento</td>
		<td><input type="text" name="complemento" value="<?php echo $editar->complemento ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>bairro</td>
		<td><input type="text" name="bairro" value="<?php echo $editar->bairro ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cidade</td>
		<td><input type="text" name="cidade" value="<?php echo $editar->cidade ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>uf</td>
		<td>
                    <select name="uf">
                        <option value="<?php echo $editar->idUF ?>"><?php echo $editar->sigla ?></option>
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
			<input type="submit" class="bt_gravar" name="editar" value="Alterar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Voltar" />
		</td>
	</tr>
</table>
</form>
<?php 

	} 
} else {

 ?>
<form method="post">
	<table class='tbl_altProduto'>
		<tr>
			<td>fornecedor&nbsp;&nbsp;</td>
			<td>
				<input type="text" class="pad" name="nomefornecedor" id="nomefornecedor" value="" autocomplete="off" />
				<input type="hidden" class="pad" name="idfornecedor" id="idfornecedor" value="" />&nbsp;&nbsp;
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Editar" />
			</td>
		</tr>
	</table>
</form>	
<?php } ?>

<script	src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
		<!--
			$(window).load(function() {
				$('#nomefornecedor').simpleAutoComplete('../function/autocompleteFornecedor.php',{
					autoCompleteClassName:	'autocomplete',
					selectedClassName:		'sel',
					attrCallBack:			'rel',
					identifier:			'fornecedor'
				}, usuarioCallback);
			});
			
			function usuarioCallback( par ) {
				$("#idfornecedor").val( par[0] );
			}
                        
                        $('#cnpj').mask('99.999.999/9999-99');
                        $('#telefone').mask('(99) 9999-9999');
                        $('#cep').mask('99999-999');
		// -->
</script>

<?php include 'rodape.php'; ?>

