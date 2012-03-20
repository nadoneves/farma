<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

$usuario = new Usuario($_POST);

if($_POST){
	
	$alt = $_POST['editar'];

	if( $alt == "Alterar") {
		$alterar = $usuario->alterar( $_POST['idusuario'] );
		if($alterar){
			$msg = "Usuario alterado";
		}else{
			$msg = "Erro ao alterar o Usuario";
		}
		echo "<script>alert('".$msg."')</script>";
		//header('Location: alterarUsuario.php');
	}
	if( $alt == "Editar") {
		$editar = $usuario->pesquisar( $_POST['idusuario'] );
?>
<br /><br />
<form method="post">
	<input type="hidden" name="idusuario" value="<?php echo $editar->idusuario ?>" />
<table class="tbl_cadProduto">
	<tr>
		<td>Usu&aacute;rio</td>
		<td><input type="text" name="usuario" id="usuario" style="text-transform: none;" value="<?php echo $editar->usuario ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
                    <select name="ativo">
                        <?php
                            if($editar->ativo == 1){
                                $ativo = "Ativo";
                            }else{
                                $ativo = "Inativo";
                            }
                        ?>
                        <option value="<?php echo $editar->ativo ?>" selected><?php echo $ativo; ?></option>
                        <option>-------</option>
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
                        <?php
                                                switch ($editar->tipo) {
                                                    case "1":
                                                        $tipo = "Gerente";    
                                                        break;
                                                    case "2":
                                                        $tipo = "Estoquista";    
                                                        break;
                                                    case "3":
                                                        $tipo = "Farmaceutico";    
                                                        break;
                                                    case "4":
                                                        $tipo = "Balconista";    
                                                        break;
                                                    case "5":
                                                        $tipo = "Caixa";    
                                                        break;

                                                }
                        ?>
                        <option value="<?php echo $editar->tipo ?>" selected><?php echo $tipo; ?></option>
                        <option>------------</option>
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
			<input type="submit" class="bt_gravar" name="editar" value="Alterar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Cancelar" />
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
                    <td>Usu&Aacute;rio&nbsp;&nbsp;</td>
			<td>
				<input type="text" class="pad" name="nomeUsuario" id="nomeUsuario" value="" autocomplete="off" />
				<input type="hidden" class="pad" name="idusuario" id="idusuario" value="" />&nbsp;&nbsp;
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Editar" />
			</td>
		</tr>
	</table>
</form>	
<?php } ?>

<script language="javascript" type="text/javascript">
		<!--
			$(window).load(function() {
				$('#nomeUsuario').simpleAutoComplete('../function/autocompleteUsuario.php',{
					autoCompleteClassName:	'autocomplete',
					selectedClassName:		'sel',
					attrCallBack:			'rel',
					identifier:				'usuario'
				}, usuarioCallback);
			});
			
			function usuarioCallback( par ) {
				$("#idusuario")	.val( par[0] );
			}
		// -->
</script>


<?php include 'rodape.php'; ?>
