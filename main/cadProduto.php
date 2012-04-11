<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include_once '../function/formataData.php';
include 'topo.php';

if($_POST){
      
    $produto = new Produto($_POST);
        
    $alt = $_POST['editar'];
    
    if( $alt=="Gravar"){
        
        extract($_POST);
        $cont = 0;
        
        if( $codBarras == "" ){
            $msgAlert .= 'O campo Cod. Barras e obrigatorio';
            $cont++;
        }        
        if( $tipo == "" ){
           $msgAlert .= '\nO campo Tipo e obrigatorio';
            $cont++;
        }        
        if( $marca == "" ){
            $msgAlert .= '\nO campo Marca e obrigatorio';
            $cont++;
        }        
        if( $descricao == "" ){
            $msgAlert .= '\nO campo Descricao e obrigatorio';
            $cont++;
        }        
        if( $dataFab == "" ){
            $msgAlert .= '\nO campo Fabricacao e obrigatorio';
            $cont++;
        }        
        if( $dataVal == "" ){
            $msgAlert .= '\nO campo Validade e obrigatorio';
            $cont++;
        }
        
        if( $cont < 1){
            $produto = new Produto($_POST);
            $res = $produto->cadProduto();
            ($res) ? $msg = 'Produto Cadastrado Com Sucesso' : $msg = 'Erro ao cadastrar o Produto';
            echo "<script>alert('".$msg."');</script>";
        }else{
            echo "<script>alert('".$msgAlert."');
                    history.back()</script>";
        }
    }
    
    //condicao responsavel por efetuar as alteracoes
	if( $alt == "Alterar") {
		$alterar = $produto->alterarProduto();
		if($alterar){
			$msg = "ok";
		}else{
			$msg = "erro";
		}
		header('Location: cadProduto.php?msg='.$msg);
	}
    
    
    if ($alt=="Buscar"){
        
        if( $_POST['codBarras'] )
            $nomeproduto = $_POST['codBarras'];
        elseif( $_POST['tipo'] )
            $nomeproduto = $_POST['tipo'];
        elseif( $_POST['marca'] )
            $nomeproduto = $_POST['marca'];
        else
            $nomeproduto = $_POST['nomeproduto'];
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
                    <td>produto</td>
			<td>
				<input type="text" class="pad" name="nomeproduto" id="nomeproduto" value="<?php echo $nomeproduto; ?>" autocomplete="off" />
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Buscar" />
                <input type="button" class="bt_voltar" onclick="javascript: window.location='cadProduto.php';" value="Voltar" />
			</td>
		</tr>
	</table>
</form>
		<table class="tbl_listaProd">
			<thead>
				<tr>
                    <td>Cod. Barras</td>
					<td>Tipo</td>
					<td>marca</td>

				</tr>
			</thead>
			<tbody>
				
				<?php                  
                            
					$consultar = $produto->consultarProduto($nomeproduto);
					
					while( $consult = mysql_fetch_object( $consultar ) ){                               
				?>
				<tr>
                    <td><?php echo $consult->codBarra; ?></td>
                    <td><?php echo $consult->tipo; ?></td>
					<td>
						<form id="formVer<?php echo $consult->idProduto; ?>" method="post" ation="#">
							<input type="hidden" name="editar" value="Editar" />
							<input type="hidden" name="idProduto" value="<?php echo $consult->idProduto; ?>" />
						
						<a href="#" onclick="ver(<?php echo $consult->idProduto; ?>)">
							<?php echo $consult->marca; ?>
						</a>
						</form>
					</td>
				</tr>
				<?php } ?>
				
			</tbody>
		</table>
<?php } //fim if buscar
    

    if( $alt == "Editar"){
          
      $editar = $produto->pesqProduto();
?>
<form method="post">
	<input type="hidden" name="idProduto" value="<?php echo $editar->idProduto ?>" />
<table class="tbl_cadProduto">
	<tr>
		<td>Cod. Barra</td>
		<td class="input">
			<input type="text" name="codBarras" value="<?php echo $editar->codBarra; ?>" />	
		</td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
    <tr>
		<td>Tipo</td>
		<td class="input">
			<input type="text" name="tipo" value="<?php echo $editar->tipo; ?>" />	
		</td>
	</tr>
    <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
    <tr>
		<td>Marca</td>
		<td class="input">
			<input type="text" name="marca" value="<?php echo $editar->marca; ?>" />	
		</td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Descri&ccedil;&atilde;o</td>
		<td class="input"><textarea name="descricao"><?php echo $editar->descricao; ?></textarea></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
        <td>Fabrica&ccedil;&atilde;o</td>
		<td class="input"><input type="text" name="dataFab" id="dataFab" readonly value="<?php echo data_dmY($editar->dataFab); ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Validade</td>
		<td class="input"><input type="text" name="dataVal" id="dataVal" readonly value="<?php echo data_dmy($editar->dataVal); ?>"  /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
        <td></td>
		<td class="input">
			<input type="submit" class="bt_gravar" id="gravar" name="editar" value="Alterar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='cadProduto.php';" value="Voltar" />
		</td>
	</tr>
</form>

<?php    
    } // fim if Editar
}else{
?>
<form method="post" id="form" name="form">
<table class="tbl_cadProduto">
	<tr>
		<td>Cod. Barra*</td>
		<td class="input">
			<input type="text" name="codBarras" id="codBarras" />	
		</td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
    <tr>
		<td>Tipo*</td>
		<td class="input">
			<input type="text" name="tipo" />	
		</td>
	</tr>
    <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
    <tr>
		<td>Marca*</td>
		<td class="input">
			<input type="text" name="marca" />	
		</td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Descri&ccedil;&atilde;o</td>
		<td class="input"><textarea name="descricao"></textarea></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
        <td>Fabrica&ccedil;&atilde;o*</td>
		<td class="input"><input type="text" name="dataFab" id="dataFab" readonly /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Validade*</td>
		<td class="input"><input type="text" name="dataVal" id="dataVal" readonly /></td>
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
</form>

<?php

if( $_GET ){
    switch ($_GET['msg']) {
        case 'ok':
            $msg = "Produto alterado";
            break;

        case 'erro':
            $msg = "Erro ao alterar o Produto";
            break;
    }
    echo "<script>alert('".$msg."')</script>";
}


} // fim if $_POST ?>


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
textarea.error{ 
    margin:0 auto !important; 
    padding: 0 !important;

}
table{ margin-left: 300px}
td.input{ width: 500px; text-align: left;}
</style>
<script	src="../js/jquery.maskMoney.js" type="text/javascript"></script>
<script	src="../js/jquery.validate.js" type="text/javascript"></script>
<script>
    $('#precoUnidade').maskMoney({allowZero:false, allowNegative:false, defaultZero:false});
    $('#precoVenda').maskMoney({allowZero:false, allowNegative:false, defaultZero:false});
    $("#dataFab").datepicker();
    $("#dataVal").datepicker();
    
   
    
    $('.tbl_listaProd thead').css('background','url(../imagens/layout/menu.png)');
    $('.tbl_listaProd thead').css('background-position','0px -90px');
    $('.tbl_listaProd thead').css('color','#fff');		
    $('.tbl_listaProd tbody tr:odd').css('background','#fff');
    $('.tbl_listaProd tbody tr:even').css('background','#bbb');
    
    function ver(id){
       $('#formVer'+id).submit();	
    }
</script>

<?php include 'rodape.php'; ?>
