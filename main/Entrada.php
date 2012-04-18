<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include_once '../function/formataData.php';
include 'topo.php';





if($_GET or !empty($_SESSION['entradaProduto']) ){
    
    
    
    $acao = $_GET['acao'];
        
    if( $acao == 'novo' or $acao == '' ){
        if($_GET['idfornecedor'] != ''){
            $_SESSION['entradaProduto']['idfornecedor'] = $_GET['idfornecedor'];
        }
        
        $fornecedor = new Fornecedor($_SESSION['entradaProduto']);
        
        $f = $fornecedor->pesqFornecedor();
?>
<br /><br />
        <table border="1">
            <tbody>
                <tr>
                    <td>Fornecedor</td>
                    <td>
                        <input type="text" name="fornecedo" value="<?=$f->nome?>" readonly="readonly" />
                    </td>
                </tr>
                <tr>
                    <td>Nota Fiscal*</td>
                    <td><input type="text" name="nNf" value="" /></td>
                </tr>
                <tr>
                    <td>Data Nota Fiscal*</td>
                    <td><input type="text" name="dataNf" id="dataNf" value="" /></td>
                </tr>
                <tr>
                    <td>Itens*</td>
                    <td><input type="button" id="add" value="add Item" />
                        <table border="1" id="tableItens"  width="700" style="display: none">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Qtd.</th>
                                            <th>R$ Unidade</th>
                                            <th>R$ Venda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type='button' value='Cadastrar' />
                        <input type='button' onclick='cancelar()' value='Cancelar' />
                    </td>
                </tr>
            </tbody>
        </table>



<?php 
    }
    
    if( $acao == 'cancel' ){
        unset( $_SESSION['entradaProduto'] );
        header('Location: Entrada.php');
    }
    
    
}elseif( $_POST){

$fornecedor = new Fornecedor($_POST);

$alt = $_POST['editar'];

if ($alt=="Buscar"){
        
        if( $_POST['nome'] )
            $nomefornecedor = $_POST['nome'];
        elseif( $_POST['cnpj'] )
            $nomefornecedor = $_POST['cnpj'];
        else
            $nomefornecedor = $_POST['nomefornecedor'];      
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
</style>
<form method="post">
	<table class='tbl_altProduto'>
		<tr>
                    <td>fornecedor</td>
			<td>
				<input type="text" class="pad" name="nomefornecedor" id="nomefornecedor" value="<?php echo $nomefornecedor; ?>" autocomplete="off" />
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Buscar" />
                <input type="button" class="bt_voltar" onclick="javascript: window.location='Entrada.php';" value="Voltar" />
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
					if( mysql_num_rows($consultar) >=1 ){    
                    
                        while( $consult = mysql_fetch_object( $consultar ) ){                               
                ?>
                    <tr>
                        <td>			
                            <a href="#" onclick="ver(<?php echo $consult->idfornecedor; ?>)">
                                <?php echo $consult->nome; ?>
                            </a>
                        </td>
                        <td><?php echo $consult->cnpj; ?></td>
                    </tr>
				<?php } // fim while
                    
                
                    } // fim if mysql_num_rows
                    else{
                       echo "<tr><td colspan='2'>Sem Registros</td></tr>";
                       echo "<tr><td colspan='2'><input type='button' onclick='novoFornecedor()' value='Novo Fornecedor' /></td></tr>";
                    }
                ?>
				
			</tbody>
		</table>

<?php } // fim if Buscar

}else{
?>

<form method="post">
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

<?php } // fim if $_POST ?>

<!--
<form method="post">
	<table class="tbl_entradaProd">
		<tr>
			<td>Produto</td>
			<td>
				<input type="text" class="pad" name="nomeProduto" id="nomeProduto" value="" autocomplete="off" />
				<input type="hidden" class="pad" name="idProduto" id="idProduto" value="" />
			</td>
		</tr>
		<tr>	
			<td colspan=2>&nbsp;</td>
		</tr>
		<tr>
			<td>Quantidade Atual</td>
			<td><input type="text" name="quantidadeAtual" id="quantidadeAtual" readonly /></td>
		</tr>
		<tr>	
			<td colspan=2>&nbsp;</td>
		</tr>
		<tr>
			<td>Quantidade</td>
			<td><input type="text" name="quantidade" /></td>
		</tr>
		<tr>	
			<td colspan=2>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<input type="button" class="bt_gravar" onclick="submit()" name="cadastrar" value="Cadastrar" />
				<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Cancelar" />
			</td>
		</tr>
	</table>
</form>
-->

<script language="javascript" type="text/javascript">
    $(document).ready(function() {
        $('.tbl_listaProd thead').css('background','url(../imagens/layout/menu.png)');
        $('.tbl_listaProd thead').css('background-position','0px -90px');
        $('.tbl_listaProd thead').css('color','#fff');		
        $('.tbl_listaProd tbody tr:odd').css('background','#fff');
        $('.tbl_listaProd tbody tr:even').css('background','#bbb');
        
        $('#add').click( function(){
            $('#tableItens').fadeIn(200);
            $('#tableItens').append("<tr><td><input type='text' name='produto[]' value='' /></td><td><input type='text' name='qtd[]' value='' /></td><td><input type='text' name='precoUnidade[]' value='' /></td><td><input type='text' name='precoVenda[]' value='' /></td></tr>");
        });
        
        $("#dataNf").datepicker();
    });
    
    function ver( id ){
       window.location='Entrada.php?acao=novo&idfornecedor='+id;
    }
    
    function novoFornecedor(){
        window.location='cadFornecedor.php';
    }
    
    function cancelar(){
        window.location='Entrada.php?acao=cancel';
    }
    
    
</script>	
<?php include 'rodape.php'; ?>
