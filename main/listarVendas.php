<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include 'topo.php';

$doacao = Venda::listarVendas();
?>
<style rel="stylesheet" type="text/css" media="print">
<!--
.bt_imprimir, #sup { display: none; }
#container { height: auto !important; }
.tbl_listaProd { display:block;	}
.tbl_listaProd tr td { border: 1px solid #000; }
.tbl_listaProd thead { color: #000 !important; font-weight: bold !important; }
-->
</style>
<style rel="stylesheet" type="text/css" media="screen">
	table{
		border: 0;
		width: 900px;	
	}
	table tr td{
		height: 30px;	
	}
       #bt_imprimir { margin-top: 40px !important; }
       .tbl_listaProd { /*margin-top: 20px !important;*/ width:600px }
</style>
<script>
	$(document).ready(function() {
		$('table thead').css('background','url(../imagens/layout/menu.png)');
                $('table thead').css('background-position','0px -90px');
		$('table thead').css('color','#fff');			
		$('table tbody tr:odd').css('background','#fff');
		$('table tbody tr:even').css('background','#bbb');
                $('#bt_imprimir').click(function(){
                    window.print();
                });                
	});
    
        function verCupom(caminho){
            var esquerda = (screen.width - 300)/2;
            var topo = (screen.height - 600)/2;
            window.open('../function/verDoacao.php?caminho='+caminho,'page','width=300,height=600,toolbar=no,location=no,status=no,menubar=no,scroolbars=no,resizable=no, top='+topo+',left='+esquerda+'');
        }
</script>
<!--<input type="button" class="bt_imprimir" id="bt_imprimir" value="Imprimir Lista" />-->
<table cellpadding=0 cellspacing=0 class="tbl_listaProd">
	<thead>
		<tr>
                    <td>C&oacute;digo Venda</td>
                    <td>DATA</td>
		</tr>
	</thead>
	<tbody>
<?php
while($row = mysql_fetch_array($doacao)) {
	echo  "<tr>";
	 ?>
        <td><a href="#" onclick="verCupom('<?php echo $row['caminho']; ?>')"><?php echo $row['codVenda']; ?></a></td>
        <?php ;
        echo "<td>".date("d/m/Y H:i", strtotime($row['data']))."</td>";
	echo "</tr>";	
}

?>
	</tbody>
</table>
<?php include 'rodape.php'; ?>