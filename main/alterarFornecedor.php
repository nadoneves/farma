<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

$fornecedor = new Fornecedor($_POST);

if($_POST){
	
	$alt = $_POST['editar'];
    
    //condicao responsavel por efetuar as alteracoes
	if( $alt == "Alterar") {
		$alterar = $fornecedor->alterarfornecedor();
		if($alterar){
			$msg = "ok";
		}else{
			$msg = "erro";
		}
		header('Location: alterarFornecedor.php?msg='.$msg);
	}
    
    // condicao que exibe os dados do usuario no formulario para edicao
	if( $alt == "Editar") {
		$editar = $fornecedor->pesqFornecedor();
?>
<form method="post">
	<input type="hidden" name="idfornecedor" value="<?php echo $editar->idfornecedor ?>" />
<table class="tbl_cadProduto">
        <tr>
		<td>CNPJ</td>
		<td><input type="text" name="cnpj" id="cnpj" value="<?php echo $editar->cnpj ?>" disabled /></td>
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
        // condicao que exibe a tabela com os resultados da pesquisa
        if ($alt=="Buscar"){
		?>
<style rel="stylesheet" type="text/css" media="screen">
	.tbl_listaProd{
		border: 0;
		width: 900px;	
	}
	.tbl_listaProd tr td{
		height: 30px;	
	}
	a, a:visited{ color: blue; text-decoration: underline;}
</style><form method="post">
	<table class='tbl_altProduto'>
		<tr>
                    <td>fornecedor</td>
			<td>
				<input type="text" class="pad" name="nomefornecedor" id="nomefornecedor" value="<?php echo $_POST['nomefornecedor']; ?>" autocomplete="off" />
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Buscar" />
			</td>
		</tr>
	</table>
</form>
		<table class="tbl_listaProd">
			<thead>
				<tr>
					<td>Nome</td>
					<td>CNPJ</td>

				</tr>
			</thead>
			<tbody>
				
				<?php
					$consultar = $fornecedor->consultarFornecedor($_POST['nomefornecedor']);
					
					while( $consult = mysql_fetch_object( $consultar ) ){                               
				?>
				<tr>
					<td>
						<form id="formVer<?php echo $consult->idfornecedor; ?>" method="post" ation="#">
							<input type="hidden" name="editar" value="Editar" />
							<input type="hidden" name="idfornecedor" value="<?php echo $consult->idfornecedor; ?>" />
						
						<a href="#" onclick="ver(<?php echo $consult->idfornecedor; ?>)">
							<?php echo $consult->nome; ?>
						</a>
						</form>
					</td>
					<td><?php echo $consult->cnpj; ?></td>
				</tr>
				<?php } ?>
				
			</tbody>
		</table>
<?php }
} else {
 
    if( $_GET ){
        switch ($_GET['msg']) {
            case 'ok':
                $msg = "Usuario alterado";
                break;

            case 'erro':
                $msg = "Erro ao alterar o Usuario";
                break;
        }
        echo "<script>alert('".$msg."')</script>";
    }
    
?>
<form method="post">
	<table class='tbl_altProduto'>
		<tr>
			<td>fornecedor&nbsp;&nbsp;</td>
			<td>
				<input type="text" class="pad" name="nomefornecedor" id="nomefornecedor" value="" autocomplete="off" />
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Buscar" />
			</td>
		</tr>
	</table>
</form>	
<?php } ?>

<script	src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">     
    $(document).ready(function() {	
        $('.tbl_listaProd thead').css('background','url(../imagens/layout/menu.png)');
        $('.tbl_listaProd thead').css('background-position','0px -90px');
        $('.tbl_listaProd thead').css('color','#fff');		
        $('.tbl_listaProd tbody tr:odd').css('background','#fff');
        $('.tbl_listaProd tbody tr:even').css('background','#bbb');

        $('#cnpj').mask('99.999.999/9999-99');
        $('#telefone').mask('(99) 9999-9999');
        $('#cep').mask('99999-999');
    });

    function ver(id){
        $('#formVer'+id).submit();	
    }                      
</script>

<?php include 'rodape.php'; ?>

<script>
	$(document).ready(function() {	
		$('.tbl_listaProd thead').css('background','url(../imagens/layout/menu.png)');
        $('.tbl_listaProd thead').css('background-position','0px -90px');
		$('.tbl_listaProd thead').css('color','#fff');		
		$('.tbl_listaProd tbody tr:odd').css('background','#fff');
		$('.tbl_listaProd tbody tr:even').css('background','#bbb');
	});

	function ver(id){
		$('#formVer'+id).submit();	
	}

	function trocar(id){
		$('#formTrocar'+id).submit();	
	}
</script>