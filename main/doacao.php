<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';
session_start();

if ( empty($_SESSION['codDoacao']) ){
	$cod = Doacao::gerarCodDoacao();	
	$_SESSION['codDoacao'] = $cod + 1;
	$codDoacao = $_SESSION['codDoacao'];
}else{
	$codDoacao = $_SESSION['codDoacao'];
}
?>
<table class="tbl_venda">
	<tr align="right">
            <td>Doa&ccedil;&atilde;o N&#176; <input type="text" name="doacao" id="doacao" value="<?php echo $codDoacao; ?>" readonly /></td>
	</tr>
	<tr align="right">
		<td>&nbsp;</td>
	</tr>
	<tr align="right">
		<td><input type="text" name="codBarras" id="codBarras" value="" /></td>
	</tr>
</table>

<hr />
<br />

<form method="post" action="../function/finalizarDoacao.php">
<table width="603px">
        <tr>
            <td>
		<div id="carrinho"></div>
            </td>
	</tr>
        <tr align="right">
            <td>igreja 
                <select name="igreja">
                    <option value="0">SELECIONE</option>
                    <option value="0">---------</option>
                    <?php
                        $igj = Igreja::listarIgrejas();
                        while ($row = mysql_fetch_array($igj)) {
                            echo "<option value='".$row['idIgreja']."'>".$row['nome']."</option>";
                        }
                    ?>
                </select>            
            </td>
	</tr>
	<tr align="right">
		<td>
			<input type="submit" name="" value="FINALIZAR DOA&Ccedil;&Atilde;O" />
                        <input type="button" name="" onclick="javascript: window.location='../function/cancelarDoacao.php?doacao=<?php echo $codDoacao; ?>';" value="CANCELAR DOA&Ccedil;&Atilde;O" />
		</td>
	</tr>
</table>
</form>

<script>
    $(document).ready(function() {
        $("#codBarras").keyup(function() {
            var tecla = window.event.keyCode; 
            if ( tecla == 13 ) { // 13 = Tecla Enter
                var codigo = $("#codBarras").val(); 
                var doacao =  $("#doacao").val(); 
                $("#carrinho").load('../function/consultDoacao.php?codBarras='+codigo+'&codDoacao='+doacao);
                $("#codBarras").val("");
            }
        });
        
 	var doacaoD =  $("#doacao").val(); 
	$("#carrinho").load('../function/consultDoacao.php?&codDoacao='+doacaoD);
    });
</script>

<?php include 'rodape.php'; ?>