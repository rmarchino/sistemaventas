<?php 
//Aqui alimenina lo seleccionado mediante ajax
session_start();
$idclave=$_POST['idclave'];
unset($_SESSION['carrito'][$idclave]);
?>
