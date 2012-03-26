<?php
session_start();
include_once '../class/Call.class.php';

$usuario = new Usuario($_POST);
$logar = $usuario->consultar();

if( empty ($logar) ){
    header("Location: ../main/index.php?msg=erro");
}else{
    if ($logar->ativo == '0') {
        header("Location: ../main/index.php?msg=useroff");
    }else{
        $_SESSION['usuario']['usuario'] = $logar->usuario;
        $_SESSION['usuario']['nome'] = $logar->nome;
        $_SESSION['usuario']['tipo'] = $logar->tipo;
        
        switch ($logar->tipo) {
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
        $_SESSION['usuario']['funcao'] = $tipo;                                        
        
        header("Location: ../main/home.php");
    }
}