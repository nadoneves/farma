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

<form action="../function/login.php" method="POST">
    <table border="1">
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
                <td colspan="2">
                        <input type="submit" value="Logar" /> 
                        <input type="reset" value="Cancelar" />
                </td>
            </tr>
        </tbody>
    </table>

</form>