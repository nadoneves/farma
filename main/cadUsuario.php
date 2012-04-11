<?php
include '../class/Call.class.php';
include '../function/Uppercase.func.php';
include '../function/validar.php';
include 'topo.php';

# Se o formulário form submetido executar a condição abaixo
if($_POST){
    
    $usuario = new Usuario($_POST);
    
    $alt = $_POST['editar'];
    
    if( $alt == "Gravar" ){
        $verificaCpf = cpf( $_POST['cpf'] );
        if( $verificaCpf ){
            $usuario = new Usuario($_POST);
            $res = $usuario->novo();
            ($res) ? $msg = 'Usuario Cadastrado Com Sucesso' : $msg = 'Erro ao cadastrar o Usuario';
            echo "<script>alert('".$msg."');</script>";
        }else{
            echo "<script>alert('CPF invalido.'); history.back();</script>";
        }
    }
    
    if( $alt == "Trocar") {
		$alterar = $usuario->trocar( $_POST['idusuario'], $_POST['ativo'] );
		if($alterar){
			$msg = "ok";
		}else{
			$msg = "erro";
		}
		header('Location: cadUsuario.php?msg='.$msg);
	}
    
    //condicao responsavel por efetuar as alteracoes
	if( $alt == "Alterar") {
		$alterar = $usuario->alterar( $_POST['idusuario'] );
		if($alterar){
			$msg = "ok";
		}else{
			$msg = "erro";
		}
		header('Location: cadUsuario.php?msg='.$msg);
	}
    
    
    // condicao que exibe os dados do usuario no formulario para edicao
	if( $alt == "Editar") {
		$editar = $usuario->pesquisar( $_POST['idusuario'] );
?>
<br /><br />
<form method="post">
	<input type="hidden" name="idusuario" value="<?php echo $editar->idusuario ?>" />
<table class="tbl_cadProduto">
	<tr>
		<td>nome</td>
		<td><input type="text" name="nome" id="nome" value="<?php echo $editar->nome ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cpf</td>
		<td><input type="text" name="cpf" id="cpf" style="text-transform: none;" value="<?php echo $editar->cpf ?>" disabled /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>telefone</td>
		<td><input type="text" name="usuario" id="usuario" style="text-transform: none;" value="<?php echo $editar->usuario ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Usu&aacute;rio</td>
		<td><input type="text" name="telefone" id="telefone" style="text-transform: none;" value="<?php echo $editar->telefone ?>" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
                    <select name="ativo">
                        <?php
                            if($editar->ativo == 1){
                                $ativo = "Ativo";
                            }else{
                                $ativo = "Inativo";
                            }
                        ?>
                        <option value="<?php echo $editar->ativo ?>" selected><?php echo $ativo; ?></option>
                        <option>-------</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
            <td>Fun&ccedil;&atilde;o</td>
		<td>
                    <select name="tipo">
                        <?php
                                                switch ($editar->tipo) {
                                                    case "1":
                                                        $tipo = "Gerente";    
                                                        break;
                                                    case "2":
                                                        $tipo = "Estoquista";    
                                                        break;
                                                    case "3":
                                                        $tipo = "Farmaceutico";    
                                                        break;
                                                    case "4":
                                                        $tipo = "Balconista";    
                                                        break;
                                                    case "5":
                                                        $tipo = "Caixa";    
                                                        break;

                                                }
                        ?>
                        <option value="<?php echo $editar->tipo ?>" selected><?php echo $tipo; ?></option>
                        <option>------------</option>
                        <option value="4">Balconista</option>
                        <option value="5">Caixa</option>
                        <option value="2">Estoquista</option>
                        <option value="3">Farmac&ecirc;utico</option>
                        <option value="1">Gerente</option>
                    </select>
                </td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="right">
			<input type="submit" class="bt_gravar" name="editar" value="Alterar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='alterarUsuario.php';" value="Cancelar" />
		</td>
	</tr>
        </table>
</form>
<?php 

	}
    
    // condicao que exibe a tabela com os resultados da pesquisa
	if ($alt=="Buscar"){
        
        if( $_POST['usuario']){
            $keyConsulta = $_POST['usuario'];
        }elseif( $_POST['nomeUsuario'] ){
            $keyConsulta = $_POST['nomeUsuario'];
        }
        
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
                    <td>Usu&Aacute;rio&nbsp;&nbsp;</td>
			<td>
				<input type="text" class="pad" name="nomeUsuario" id="nomeUsuario" value="<?php echo $keyConsulta; ?>" autocomplete="off" />
				<input type="submit" class="bt_buscar" name="editar" id="editar" value="Buscar" />
			</td>
		</tr>
		<tr>
			<td colspan=2 align="left">
				<input type="radio" name="ativo" value="1" <?php if($_POST['ativo'] == 1 ) echo 'checked';?> /><label style="margin:0 -50px 0 -80px">Ativo</label>
				<input type="radio" name="ativo" value="0" <?php if($_POST['ativo'] == 0 ) echo 'checked';?> /><label style="margin:0 0px 0 -80px">Inativo</label>
			</td>
		</tr>
	</table>
</form>
		<table class="tbl_listaProd">
			<thead>
				<tr>
					<td>Nome</td>
					<td>Usuario</td>
					<td>Funcao</td>
					<td>Situacao</td>
				</tr>
			</thead>
			<tbody>
				
				<?php
					$consultar = $usuario->consultarUsuario($keyConsulta,$_POST['ativo']);
					
					while( $consult = mysql_fetch_object( $consultar ) ){  
                        if($consult->ativo == 1){
                            $ativo = "Ativo";
                            $trocar = 0;
                        }else{
                            $ativo = "Inativo";
                            $trocar = 1; 
                        }

                        switch ($consult->tipo) {
                            case "1":
                                $tipo = "Gerente";    
                                break;
                            case "2":
                                $tipo = "Estoquista";    
                                break;
                            case "3":
                                $tipo = "Farmaceutico";    
                                break;
                            case "4":
                                $tipo = "Balconista";    
                                break;
                            case "5":
                                $tipo = "Caixa";    
                                break;

                        }      
				?>
				<tr>
					<td><?php echo $consult->nome; ?></td>
					<td>
						<form id="formVer<?php echo $consult->idusuario; ?>" method="post" ation="#">
							<input type="hidden" name="editar" value="Editar" />
							<input type="hidden" name="idusuario" value="<?php echo $consult->idusuario; ?>" />
						
						<a href="#" onclick="ver(<?php echo $consult->idusuario; ?>)">
							<?php echo $consult->usuario; ?>
						</a>
						</form>
					</td>
					<td><?php echo $tipo; ?></td>
					<td>
						<form id="formTrocar<?php echo $consult->idusuario; ?>" method="post" ation="#">
							<input type="hidden" name="editar" value="Trocar" />
							<input type="hidden" name="idusuario" value="<?php echo $consult->idusuario; ?>" 
							/>
							<input type="hidden" name="ativo" value="<?php echo $trocar; ?>" />

						<a href="#" onclick="trocar(<?php echo $consult->idusuario; ?>)">
							<?php echo $ativo; ?>
						</a>
						</form>
					</td>
				</tr>
				<?php } ?>
				
			</tbody>
		</table>

<?php
	} 
    
    
    
}else{
?>
<form method="post" id="form">
<table class="tbl_cadProduto" border="0">
	<tr>
		<td>Nome</td>
		<td class="input"><input type="text" name="nome" id="nome" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>cpf</td>
		<td class="input"><input type="text" name="cpf" id="cpf" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>telefone</td>
		<td class="input"><input type="text" name="telefone" id="telefone" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Usu&aacute;rio</td>
		<td class="input"><input type="text" name="usuario" id="usuario" style="text-transform: none;" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Senha</td>
		<td class="input"><input type="password" name="senha" id="senha" style="text-transform: none;" /></td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
		<td>Status</td>
		<td class="input">
                    <select name="ativo">
                        <option value="a" selected></option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </td>
	</tr>
        <tr>
		<td colspan=2>&nbsp;</td>
	</tr>
        <tr>
            <td>Fun&ccedil;&atilde;o</td>
		<td class="input">
                    <select name="tipo">
                        <option></option>
                        <option value="4">Balconista</option>
                        <option value="5">Caixa</option>
                        <option value="2">Estoquista</option>
                        <option value="3">Farmac&ecirc;utico</option>
                        <option value="1">Gerente</option>
                    </select>
                </td>
	</tr>
	<tr>
		<td colspan=2>&nbsp;</td>
	</tr>
	<tr>
        <td>
		<td class="input">
			<input type="button" class="bt_gravar" id="gravar" value="Gravar" />
			<input type="button" class="bt_voltar" onclick="javascript: window.location='home.php';" value="Voltar" />
            <input type="submit" class="bt_buscar" name="editar" id="editar" value="Buscar" />
		</td>
	</tr>
        </table>
</form>

<?php

if( $_GET ){
	switch ($_GET['msg']) {
		case 'ok':
			$msg = "Usuario alterado";
			break;

		case 'erro':
			$msg = "Erro ao alterar o Usuario";
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
table{ margin-left: 300px}
td.input{ width: 500px; text-align: left;}
</style>
<script	src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
    // mascara de campos
    $('#cpf').mask('999.999.999-99');
    $('#telefone').mask('(99) 9999-9999');
    
    // Validacao do formulario
    $('#gravar').click( function(){
        $('#form').validate({
            // define regras para os campos
            rules: {
                nome: {
                    required: true,
                    minlength: 10
                },
                cpf: {
                    required: true
                },
                telefone: {
                    required: true
                },
                usuario: {
                    required: true
                },
                senha: {
                    required: true
                },
                ativo: {
                    required: true
                },
                tipo: {
                    required: true
                }
            }
        });
        $('#form').submit();
    });
    
    $('.tbl_listaProd thead').css('background','url(../imagens/layout/menu.png)');
    $('.tbl_listaProd thead').css('background-position','0px -90px');
    $('.tbl_listaProd thead').css('color','#fff');		
    $('.tbl_listaProd tbody tr:odd').css('background','#fff');
    $('.tbl_listaProd tbody tr:even').css('background','#bbb');


	function ver(id){
		$('#formVer'+id).submit();	
	}

	function trocar(id){
		$('#formTrocar'+id).submit();	
	}
</script>
<?php include 'rodape.php'; ?>
