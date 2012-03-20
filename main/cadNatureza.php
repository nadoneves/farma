<?php
include '../class/Call.class.php';
include 'topo.php';

if($_POST){
	$natureza = new Natureza($_POST);
	$res = $natureza->cadNatureza();
	($res) ? $msg = 'Natureza Cadastrada Com Sucesso' : $msg = 'Erro ao cadastrar a Natureza';
	echo "<script>alert('".$msg."');</script>";
}
?>
<div id="p_natureza">
<form method="post" action="">
	<table>
		<tr>
			<td>Natureza</td>
			<td><input type="text" name="natureza" style="text-transform: uppercase" />
				<input type="button" class="bt_salvar"  onclick="submit();" value="Salvar" />
				<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Voltar" />
			</td>
		</tr>
	</table>		
</form>
</div>
<?php
$listarNatureza = Natureza::listarNatureza();
echo "<table cellspacing=0 cellpadding=0 class='lista_natureza'>";
echo "<thead>";
echo "<tr><td>Natureza</td><td>C&oacute;digo</td></tr>";
echo "</thead><tbody>";
while( $row = mysql_fetch_array($listarNatureza) ) {
	echo "<tr><td>{$row['natureza']}</td><td>{$row['codNatureza']}</td></tr>";
}
echo "</tbody></table>";
?>
<script>
	$(document).ready(function() {
                $('.lista_natureza thead').css('background','url(../imagens/layout/menu.png)');
                $('.lista_natureza thead').css('background-position','0px -90px');
		$('.lista_natureza thead').css('color','#fff');		
		$('.lista_natureza tbody tr:odd').css('background','#fff');
		$('.lista_natureza tbody tr:even').css('background','#bbb');
	});
</script>
<?php include 'rodape.php'; ?>
