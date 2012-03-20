<?php
include_once '../function/autenticacao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=latin-1">
		<title>Rede Pharma</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
		<link href="../css/estilo.css" type="text/css" rel="stylesheet" media="all" />
		<link href="../css/autocomplete.css" type="text/css" rel="stylesheet" media="all" />
		<link href="../css/menu.css" type="text/css" rel="stylesheet" media="all" />
		<script	src="../js/jquery.js" type="text/javascript"></script>
		<script	src="../js/autocomplete.js" type="text/javascript"></script>
                <script	src="../js/jquery.validate.js" type="text/javascript"></script>
		<script language="JavaScript">
			/*function trava() {
				var tecla = window.event.keyCode; 
				if (tecla == 116) {
					alert("Tecla cancelada"); 
					event.keyCode = 0;
					event.returnValue = false;
				}
			}*/
		</script>
	</head>
        <body><!-- onKeyDown="javascript:return trava();">-->

<?php include 'menu.php'; ?>

<div id="container">
