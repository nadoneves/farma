<?php
include_once '../class/Call.class.php';

if($_GET){
    switch ($_GET['msg']) {
        case "erro":
            echo "<script>alert('Erro ao efetuar Login.');</script>";
            break;
        
        case "useroff":
            echo "<script>alert('Usuario inativo.');</script>";
            break;
        
        case "sessionoff":
            echo "<script>alert('Nenhum Usuario logado.');</script>";
            break;
        
        case "logout":
            echo "<script>alert('Desconectado');</script>";
            break;

    }
}
?>
<style>
    body{
        background: url(../imagens/Login.jpg) no-repeat;
        background-position: -200px -100px;
    }
    form{
        position:absolute;
        top: 180px;
        left: 200px;
    }
    input[type=text],input[type=password]{
        width: 150px;
    }
    input{
        height: 30px;
    }
</style>
<form action="../function/login.php" method="POST">
    <table border="0">
        <tbody>
            <tr>
                <td>Usu&aacute;rio</td>
                <td><input type="text" name="usuario" value="" /></td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td><input type="password" name="senha" value="" /></td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                        <input type="reset" value="Cancelar" />
                        <input type="submit" value="Entrar" /> 
                </td>
            </tr>
        </tbody>
    </table>

</form>