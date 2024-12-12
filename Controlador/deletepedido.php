<?php

session_start();

require_once '../DAO/ModeloCliente.php';

unset($_SESSION['deletepedido']);

$id_venta=$_GET['id'];

$clienteDAO= new ModeloCliente();
$estadoupd= $clienteDAO->deletePedido($id_venta);

$_SESSION['deletepedido']=$estadoupd;
header('Location:../Clientes/orders.php');


