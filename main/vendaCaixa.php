<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';
session_start();

?>
<table class="tbl_venda">
	<tr align="right">
		<td>Venda N&#176; <input type="text" name="venda" id="venda" value="<?php echo $_GET['codVenda']; ?>" /></td>
	</tr>
</table>

<hr />
<br />

<form method="post" action="../function/finalizarVenda.php">
<table width="603px" border="0">
        <tr>
            <td>
		<div id="carrinho"></div>
            </td>
	</tr>
    <tr>
        <td align="right">Tipo Pagamento
            <select name="tpPag" id="tpPag">
                <option selected>Tipo Pagamento</option>
                <option>-------</option>
                <option value="1">C. Credito</option>
                <option value="2">C. Debito</option>
                <option value="3">Dinheiro</option>
            </select>
        </td>
    </tr>    
    <tr style="display:none" class="pag">
        <td align="right">Valor Pago
        <input type="text" name="valorPago" id="valorPago" /></td>
    </tr>   
    <tr style="display:none" class="pag">
        <td align="right">Troco
        <input type="text" name="troco" id="troco" readonly/></td>
    </tr>   
	<tr align="right">
		<td align="right">
			<input type="button" name="" value="FINALIZAR VENDA" />
			<input type="button" name="" id="cancelarVenda" value="CANCELAR VENDA" />
		</td>
	</tr>
</table>
</form>


<script	src="../js/autocomplete.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#venda").keyup(function() {
            var tecla = window.event.keyCode; 
            if ( tecla == 13 ) { // 13 = Tecla Enter
                var venda =  $("#venda").val(); 
                $("#carrinho").load('../function/consultVendaCaixa.php?codVenda='+venda);
            }
        });
        
        $("#valorPago").keyup(function() {
            var tecla = window.event.keyCode; 
            var vP = parseFloat($('#valorPago').val());
            var total = parseFloat($('#total2').val());
            var troco = vP - total;
            if ( tecla == 13 ) { // 13 = Tecla Enter
                $('#troco').val(troco);
            }
        });
			    
        $('#cancelarVenda').click(function(){
            var venda =  $("#venda").val(); 
            window.location='../function/cancelarVendaCaixa.php?venda='+venda;
        });
        
        $('#tpPag').click(function(){
            var tp = $('#tpPag').val();
            if ( tp == 3)
                $('.pag').show(200);
            $('#valorPago').focus();
        });
        
        var vendaD =  $("#venda").val(); 
		$("#carrinho").load('../function/consultVendaCaixa.php?&codVenda='+vendaD);

    });
	
    
</script>

<?php include 'rodape.php'; ?>
