<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

$produto = new Produto($_POST);

if($_POST){
	
	$alt = $_POST['editar'];

	if( $alt == "Alterar") {
		$alterar = $produto->alterarProduto();
		if($alterar){
			$msg = "Produto alterado";
		}else{
			$msg = "Erro ao alterar o produto";
		}
		echo "<script>alert('".$msg."')</script>";
//		header('Location: alterarProduto.php');
	}
	if( $alt == "Editar") {
		$editar = $produto->pesqProduto();
?>
<br /><br />
<form method="post">
	<input type="hidden" name="idProduto" value="<?php echo $editar->idProduto ?>" />
<table>
	<tr>
		<td>Natureza</td>
		<td>
			<select name="natureza">
				<?php
					echo "<option value='".$editar->idNatureza."' selected>".converteM($editar->natureza,1)."</option>";
					echo "<option>---</option>";
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
				<?php
					echo "<option value='".$editar->idBens."' selected>".converteM($editar->bens,1)."</option>";
					echo "<option>---</option>";
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
		<td>Pre&ccedil;o Unidade</td>
		<td><input type="text" name="precoUnidade" id="precoUnidade" value="<?php echo $editar->precoUnidade; ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Pre&ccedil;o Venda</td>
		<td><input type="text" name="precoVenda" id="precoVenda" value="<?php echo $editar->precoVenda; ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Unidade</td>
		<td><input type="text" name="unidade" value="<?php echo $editar->unidade; ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Descri&ccedil;&atilde;o</td>
		<td><textarea name="descricao"><?php echo $editar->descricao; ?></textarea></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="right">
			<input type="submit" class="bt_gravar" name="editar" value="Alterar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Cancelar" />
		</td>
	</tr>
</form>
<?php 

	} 
} else {

 ?>
<form method="post">
	<table class='tbl_altProduto'>
		<tr>
			<td>Produto&nbsp;&nbsp;</td>
			<td>
				<input type="text" class="pad" name="nomeProduto" id="nomeProduto" value="" autocomplete="off" />
				<input type="hidden" class="pad" name="idProduto" id="idProduto" value="" />&nbsp;&nbsp;
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Editar" />
			</td>
		</tr>
	</table>
</form>	
<?php } ?>


<script	src="../js/jquery.maskMoney.js" type="text/javascript"></script>
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
				$("#idProduto")	.val( par[0] );
			}
                        
    $('#precoUnidade').maskMoney({allowZero:false, allowNegative:true, defaultZero:false});
    $('#precoVenda').maskMoney({allowZero:false, allowNegative:true, defaultZero:false});
		// -->
</script>


<?php include 'rodape.php'; ?>
