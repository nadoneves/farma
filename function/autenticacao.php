<?php
session_start();

//Verifica se existe uma sessao criada permitindo o usuario masnter-se logado
if( empty( $_SESSION['usuario'] )){
    session_destroy();
    header("Location: ../main/index.php?msg=sessionoff");
}