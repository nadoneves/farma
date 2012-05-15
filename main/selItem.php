<?php
include_once("../class/Call.class.php");
$rand = $_GET['rand'];
?>
<link href="../css/estilo.css" type="text/css" rel="stylesheet" media="all" />
<style>
    *{
        margin: 0;
        padding: 0;
        text-align: center;
    }
    #search{
        border: 1px solid transparent;
        width: 798px;
        height: 50px;
    }
    input[type=text]{
        text-transform: uppercase;
        width: 200px;
        height: 25px;
    }
    #keyword{ margin: 0 auto; }
    #result{
        border: 1px solid transparent;
        width: 798px;
        height: 540px;
        overflow-y: scroll;
    }
    table{
		border: 0;
		width: 780px;	
	}
	table tr td{
		height: 30px;	
	}
       #bt_imprimir { margin-top: 40px !important; }
       .tbl_listaProd { margin-top: 0 !important; }
</style>

<div id="search">
    <form method="post" action="selItem.php?rand=<?=$rand?>">
        <input type="text" name="keyword" id="keyword" />
        <input type="submit" class="bt_buscar" name="editar" id="editar" value="Buscar" />
    </form>
</div>
<div id="result">
    <table border="0" class="tbl_listaProd" cellpadding=0 cellspacing=0>
        <thead>
            <tr>
                <th>COD. BARRAS</th>
                <th>TIPO</th>
                <th>MARCA</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $p = new Produto($_POST);
                $res = $p->consultarProduto($_POST['keyword']);                
                while( $l = mysql_fetch_object($res) ){
            ?>
            <tr>
                <td><a href="#" onclick="usar(<?=$l->idProduto?>,'<?=$l->marca?>', <?=$rand?>)"><?=$l->codBarra?></a></td>
                <td><?=$l->tipo?></td>
                <td><?=$l->marca?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<script	src="../js/jquery.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('table thead').css('background','url(../imagens/layout/menu.png)');
        $('table thead').css('background-position','0px -90px');
		$('table thead').css('color','#fff');			
		$('table tbody tr:odd').css('background','#fff');
		$('table tbody tr:even').css('background','#bbb');
	});
    
    function usar( id, marca, rand ){
        var elementIdUm = 'produto'+rand;
        window.opener.document.getElementById(elementIdUm).value = marca;
		window.opener.document.getElementById('idproduto'+rand).value = id;
        window.close();
    }
        /*
        window.opener.document.formNovaOS.cliente.value = cliente;
		window.opener.document.formNovaOS.equipamento.value = equipamento;
		window.opener.document.formNovaOS.idequipamento.value = idequipamento;
		window.opener.document.formNovaOS.maodeobra.value = maodeobra;
		window.close();
        */
</script>

