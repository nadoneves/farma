<?php
session_start();

if( empty( $_SESSION['usuario'] )){
    header("Location: ../main/index.php?msg=sessionoff");
}