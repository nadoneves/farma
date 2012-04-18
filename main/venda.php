<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';
session_start();

if ( empty($_SESSION['codVenda']) ){
	$cod = Venda::gerarCodVenda();	
	$_SESSION['codVenda'] = $cod + 1;
	$codVenda = $_SESSION['codVenda'];
}else{
	$codVenda = $_SESSION['codVenda'];
}
?>
<table class="tbl_venda">
	<tr align="right">
		<td>Venda N&#176; <input type="text" name="venda" id="venda" value="<?php echo $codVenda; ?>" readonly /></td>
	</tr>
	<tr align="right">
		<td>&nbsp;</td>
	</tr>
	<tr align="right">
		<td>Quantidade: <input type="text" name="qtd" id="qtd" value="1" /></td>
	</tr>
	<tr align="right">
		<td>&nbsp;</td>
	</tr>
	<tr align="right">
		<td>Produto: <input type="text" class="pad" name="nomeProduto" id="nomeProduto" value="" autocomplete="off" />
		<input type="hidden" name="codBarras" id="codBarras" value="" /></td>
	</tr>
</table>

<hr />
<br />

<form method="post" action="../function/finalizarVenda.php">
<table width="603px">
        <tr>
            <td>
		<div id="carrinho"></div>
            </td>
	</tr>
        
	<tr align="right">
		<td>
			<input type="submit" name="" value="FINALIZAR VENDA" />
			<input type="button" name="" onclick="javascript: window.location='../function/cancelarVenda.php?venda=<?php echo $codVenda; ?>';" value="CANCELAR VENDA" />
		</td>
	</tr>
</table>
</form>


<script	src="../js/autocomplete.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#nomeProduto").keyup(function() {
            var tecla = window.event.keyCode; 
            if ( tecla == 13 ) { // 13 = Tecla Enter
                var codigo = $("#codBarras").val(); 
                var venda =  $("#venda").val(); 
				var qtd = $("#qtd").val();
                $("#carrinho").load('../function/consultVenda.php?codBarras='+codigo+'&codVenda='+venda+'&qtd='+qtd);
                $("#codBarras").val("");
				$("#nomeProduto").val("");
				$("#qtd").val("1");
            }
        });
		
		$("#qtd").click( function(){
			$("#qtd").val("");
		});
		
		$("#nomeProduto").click( function(){
			var qtd = $("#qtd").val();
			if( qtd >= 1 ){
				$("#qtd").val(qtd);
			}else{
				$("#qtd").val("1");
			}
		});
        
		$('#nomeProduto').simpleAutoComplete('../function/autocompleteVenda.php',{
			autoCompleteClassName:	'autocomplete',
			selectedClassName:		'sel',
			attrCallBack:			'rel',
			identifier:				'produto'
		}, usuarioCallback);
				
		var vendaD =  $("#venda").val(); 
		$("#carrinho").load('../function/consultVenda.php?&codVenda='+vendaD);
    });
	
	function usuarioCallback( par ) {
		$("#codBarras")	.val( par[0] );
	}
</script>

<?php include 'rodape.php'; ?>
