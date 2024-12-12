<?php
//Aqui alimenina lo seleccionado mediante ajax
session_start();
$idclave=$_POST['idclave'];
$op=$_POST['op'];

if($op==1){
   $_SESSION['carrito'][$idclave] =$_SESSION['carrito'][$idclave]+1; 
}elseif($op==2){
    $cantidad=$_POST['cant'];
    
    if($cantidad>1){
        $_SESSION['carrito'][$idclave] =$_SESSION['carrito'][$idclave]-1; 
    }elseif($cantidad<=1){
        unset($_SESSION['carrito'][$idclave]);
    }
}

?>
