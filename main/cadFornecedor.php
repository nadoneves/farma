<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include '../function/validar.php';
include 'topo.php';

# Se o formulário form submetido executar a condição abaixo
if($_POST){
    
    $fornecedor = new Fornecedor($_POST);
    
    $alt = $_POST['editar'];
    
    if( $alt == "Gravar" ){
        
        extract($_POST);
        $cont = 0;
        
        if( $cnpj == "" ){
            $msgAlert .= 'O campo CNPJ e obrigatorio';
            $cont++;
        }        
        if( $nome == "" ){
           $msgAlert .= '\nO campo Nome e obrigatorio';
            $cont++;
        }        
        if( $telefone == "" ){
            $msgAlert .= '\nO campo Telefone e obrigatorio';
            $cont++;
        }        
        if( $cep == "" ){
            $msgAlert .= '\nO campo CEP e obrigatorio';
            $cont++;
        }        
        if( $endereco == "" ){
            $msgAlert .= '\nO campo Endereco e obrigatorio';
            $cont++;
        }        
        if( $numero == "" ){
            $msgAlert .= '\nO campo Numero e obrigatorio';
            $cont++;
        }
        if( $bairro == "" ){
            $msgAlert .= '\nO campo Bairro e obrigatorio';
            $cont++;
        }
        if( $cidade == "" ){
            $msgAlert .= '\nO campo Cidade e obrigatorio';
            $cont++;
        }
        if( $uf == "" ){
            $msgAlert .= '\nO campo UF e obrigatorio';
            $cont++;
        }
        
        if( $cont < 1){
            if( !cnpj($_POST['cnpj'])){
                echo "<script>alert('ERRO. CNPJ nao e valido.'); history.back();</script>";
            }else{
                $fornecedor = new Fornecedor($_POST);
            $res = $fornecedor->cadfornecedor();
            ($res) ? $msg = 'Fornecedor Cadastrado Com Sucesso' : $msg = 'Erro ao cadastrar o Fornecedor';
            echo "<script>alert('".$msg."');</script>";
            }
        }else{
            echo "<script>alert('".$msgAlert."');
                    history.back()</script>";
        }
        
        
        
    }
    
    if( $alt == "Alterar") {
		$alterar = $fornecedor->alterarfornecedor();
		if($alterar){
			$msg = "ok";
		}else{
			$msg = "erro";
		}
		header('Location: cadFornecedor.php?msg='.$msg);
	}
    
    
    if ($alt=="Buscar"){
        
        if( $_POST['nome'] )
            $nomefornecedor = $_POST['nome'];
        elseif( $_POST['cnpj'] )
            $nomefornecedor = $_POST['cnpj'];
        else
            $nomefornecedor = $_POST['nomefornecedor'];
	
        // condicao que exibe a tabela com os resultados da pesquisa
        
		?>
<style rel="stylesheet" type="text/css" media="screen">
	.tbl_listaProd{
		border: 0;
		width: 900px;
        margin: 10px auto;
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
				<input type="text" class="pad" name="nomefornecedor" id="nomefornecedor" value="<?php echo $nomefornecedor; ?>" autocomplete="off" />
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Buscar" />
                <input type="button" class="bt_voltar" onclick="javascript: window.location='cadFornecedor.php';" value="Voltar" />
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
                            
					$consultar = $fornecedor->consultarFornecedor($nomefornecedor);
					
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
<?php } //fim if buscar

      if( $alt == "Editar"){
          
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
			<input type="button" class="bt_voltar" onclick="javascript: window.location='cadFornecedor.php';" value="Voltar" />
		</td>
	</tr>
</table>
</form>
<?php 

	}// fim if editar
    
    
    
    
}else{
?>
<form method="post" id="form" name="form" action="#">
<table class="tbl_cadProduto">
        <tr>
		<td>CNPJ*</td>
		<td class="input"><input type="text" name="cnpj" id="cnpj" /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>nome*</td>
		<td class="input"><input type="text" name="nome" /></td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
		<td>telefone*</td>
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
		<td>cep*</td>
		<td class="input"><input type="text" name="cep" id="cep" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>endere&ccedil;o*</td>
		<td class="input"><input type="text" name="endereco" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>numero*</td>
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
		<td>bairro*</td>
		<td class="input"><input type="text" name="bairro" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cidade*</td>
		<td class="input"><input type="text" name="cidade" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>uf*</td>
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
			<input type="submit" class="bt_gravar" id="gravar" name="editar" value="Gravar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Voltar" />
            <input type="submit" class="bt_buscar" name="editar" id="editar" value="Buscar" />
		</td>
	</tr>
</table>
</form>
<?php 

if( $_GET ){
    switch ($_GET['msg']) {
        case 'ok':
            $msg = "Fornecedor alterado";
            break;

        case 'erro':
            $msg = "Erro ao alterar o Fornecedor";
            break;
    }
    echo "<script>alert('".$msg."')</script>";
}


} // fim do if $_POST ?>

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
    
    $('.tbl_listaProd thead').css('background','url(../imagens/layout/menu.png)');
    $('.tbl_listaProd thead').css('background-position','0px -90px');
    $('.tbl_listaProd thead').css('color','#fff');		
    $('.tbl_listaProd tbody tr:odd').css('background','#fff');
    $('.tbl_listaProd tbody tr:even').css('background','#bbb');
    
    function ver(id){
        $('#formVer'+id).submit();	
    }

</script>

<?php 
include 'rodape.php';     
?>