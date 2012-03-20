<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

$igreja = Igreja::listarIgrejaVenda();
?>
<style type="text/css">
	table{
		border: 0;
		width: 900px;	
	}
	table tr td{
		height: 30px;	
	}
</style>
<script>
	$(document).ready(function() {
		$('table thead').css('background','url(../imagens/layout/menu.png)');
                $('table thead').css('background-position','0px -90px');
		$('table thead').css('color','#fff');			
		$('table tbody tr:odd').css('background','#fff');
		$('table tbody tr:even').css('background','#bbb');
	});
</script>
<table cellpadding=0 cellspacing=0 class="tbl_listaProd">
	<thead>
		<tr>
			<td>IGREJA</td>
                        <td>QTD. VENDAS</td>
		</tr>
	</thead>
	<tbody>
<?php
while($row = mysql_fetch_array($igreja)) {
	$table .= "<tr>";
	$table .= " <td>".$row['nome']."</td>";
        $table .= " <td>".$row['vendas']."</td>";
	$table .= "</tr>";	
}
print $table;
?>
	</tbody>
</table>

<?php include 'rodape.php'; ?>