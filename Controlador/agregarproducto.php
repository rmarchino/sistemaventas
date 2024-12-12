<?php 

$cantidad=$_POST['cantidad'];
$idprod=$_GET['id'];
session_start();

if((isset($_SESSION['carrito']))==false){
 $_SESSION['carrito']=array($idprod => $cantidad);
    
}else{

if((isset($_SESSION['carrito'][$idprod]))==false){
    $_SESSION['carrito']=$_SESSION['carrito']+array($idprod => $cantidad);
    
}else{
    $_SESSION['carrito'][$idprod] =$_SESSION['carrito'][$idprod]+$cantidad;
}
}
header('Location:../Clientes/cart.php');
?>