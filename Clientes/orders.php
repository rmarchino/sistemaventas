<!DOCTYPE html>
<html lang="en">

<?php

    session_start();
    
    require "../Util/ConexionBD.php";
    require "../DAO/ModeloCliente.php";
    require "../DAO/ModeloUsuario.php";
    
    if(!empty($_SESSION['usuario1']) && !empty($_SESSION['pass1'])){
        header('Location: ./Administrador/');
    }
    
    if(empty($_SESSION['usuario2']) && empty($_SESSION['pass2'])){
        header('Location:../');
        exit();
    }
    
    $usuario2= $_SESSION['usuario2'];
    $pass2= $_SESSION['pass2'];
       
    require '../front/header.php' ;
    
?>

<body>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(window).on('load', function () {
                    setTimeout(function () {
                  $(".loader-page").css({visibility:"hidden",opacity:"0"})
                }, 300);

              });
        </script>

        <div class="loader-page"></div>
    
        <?php 
        
            if($_SESSION['usuario2']!=null){

                $usuarioDAO= new ModeloUsuario();
                $clienteDAO= new ModeloCliente();

                $finalcliente= $usuarioDAO->getUsuario($usuario2, $pass2);

        ?>
	
        <header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="tel:956-393-447""><i class="fa fa-phone"></i> +51 972 487 645</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> LOGICLAYER S.A.C</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://es-la.facebook.com/autonomadelperu/" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/autonomadelperu" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://pe.linkedin.com/school/universidad-aut%C3%B3noma-del-per%C3%BA/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<li><a><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="."><img src="../imagenes/images/MARKETAPP_OF.jpg" alt="" width="145"/></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									PERU
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">LIMA</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									MONEDA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">SOLES</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                                            <li><a href="../Clientes/profile.php"><i class="fa fa-user"></i><?= $finalcliente['nomb'] ?></a></li>
								<li><a href="../Clientes/"><i class="fa fa-star"></i> Lista de deseos</a></li>
								<li><a href="../Clientes/checkout.php"><i class="fa fa-crosshairs"></i> Revisar</a></li>
								<li><a href="../Clientes/cart.php">
                                                                        
                                                                    <i class="fa fa-shopping-cart">
                                                                        
                                                                        <?php
                                           
                                                                        $objc= new ConexionBD();
                                                                        $conex= $objc->getConexionBD();
                                                                        $productcarrito=0;

                                                                        $records= $conex->prepare("call selectProductos();");
                                                                        $i= $records->execute();

                                                                                 if (($i) > 0) {
                                                                                     //instanciamos todos los produtos que tengamos
                                                                                     while($lista= $records->fetch(PDO::FETCH_ASSOC)){
                                                                                         
                                                                                         if(isset($_SESSION['carrito'])){
                                                                                         //como en este tenemos un array clave-valor es mas facil que recorra todos los documentos
                                                                                            foreach($_SESSION['carrito'] as $clave => $valor){
                                                                                                //verifica que nuestro iventario coicida con algo de nuestra lista para que solo muestre lo de deseemos
                                                                                               if($lista['id_producto']==$clave && $valor!=0){
                                                                                                   $productcarrito++;
                                                                                               }
                                                                                            }
                                                                                         }
                                                                                     }
                                                                                 }


                                                                        ?>
                                                                        
                                                                        <?php if($productcarrito>0){ ?>
                                                                            
                                                                        <span style="font-family: sans-serif" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                                            <?=$productcarrito?>
                                                                            <span class="visually-hidden">

                                                                            </span>
                                                                        </span>
                                                                        
                                                                        <?php }?>
                                                                        
                                                                    </i> Carrito</a>
                                                                </li>
								
                                                                <style>
                                                                    @media (min-width: 1200px) {
                                                                        .modal-lj {
                                                                           width: 85%;
                                                                        }
                                                                     }
                                                                     .Custom_Cancel > .sa-button-container > .cancel  {
                                                                            background-color: #cccccc;
                                                                            border-color: #cccccc;
                                                                            margin-top: 15px;
                                                                         }
                                                                         .Custom_Cancel > .sa-button-container > .cancel:hover {
                                                                            background-color: #dedcdc;
                                                                            border-color: #dedcdc;
                                                                            margin-top: 15px;
                                                                         }
                                                                </style>
                                                                
                                                                <script>
                                                                        
                                                                    function salir() {
                                                                    swal({
                                                                        title: "Hay productos en el carrito!",
                                                                        text: "¿Seguro que quieres salir?",
                                                                        type: "info",
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: '#DD6B55',
                                                                        confirmButtonText: 'Sí, estoy seguro',
                                                                        cancelButtonText: "No, no cancelar",
                                                                        closeOnConfirm: false,
                                                                        closeOnCancel: false,
                                                                        customClass: "Custom_Cancel"
                                                                     },
                                                                     function(isConfirm){

                                                                       if (isConfirm){
                                                                         swal("Nos vemos!", "Muchas gracias por tu confianza", "success");

                                                                         function myFunction() {
                                                                            window.location = '../Controlador/logout.php';
                                                                          }
                                                                          setTimeout(myFunction, 2000);

                                                                        } else {
                                                                          swal("No hay problema!", "Los productos en el carrito están a salvo", "error");
                                                                             e.preventDefault();
                                                                        }
                                                                     });
                                                                };
                                                                </script>
                                                                
                                                                <?php if($productcarrito>0){ ?>
                                                                
								<li><a href="javascript:salir()"><i class="fa fa-lock"></i> Salir</a></li>
                                                                <?php }else{?>
                                                                <li><a href="../Controlador/logout.php"><i class="fa fa-lock"></i> Salir</a></li>
                                                                <?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="../Clientes/">Inicio</a></li>
								<li class="dropdown"><a>Tienda<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="../Clientes/" >Productos</a></li>
                                                                        <li><a href="../Clientes/checkout.php">Revisar</a></li> 
                                                                        <li><a href="../Clientes/cart.php">Carrito</a></li> 
                                                                        <li><a href="../Controlador/logout.php">Salir</a></li> 
                                                                    </ul>
                                                                </li> 
								<li class="dropdown"><a>Perfil<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="../Clientes/profile.php"><?= $finalcliente['nomb'] ?> <?= $finalcliente['ape'] ?></a></li>
                                                                    </ul>
                                                                </li> 
								<li><a href="../Clientes/orders.php" class="active">Mis pedidos</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<!--<input type="text" placeholder="Buscar"/>-->
						</div>
					</div>
				</div>
                        </div>
                    
                </div>
	</header>
	
	<section id="advertisement">
		
                <div class="container">
                        <div class="mainmenu pull-left">
                            <span class="badge rounded-pill bg-warning" style="font-size: 20px; background-color: orange">MIS PEDIDOS</span>
                        </div>
                        <br><br><br>
                        <style>
                            @media (min-width: 1200px) {
                                .modal-la {
                                   width: 60%;
                                }
                             }
                        </style>
                        
                        <style>
                            @media (min-width: 1200px) {
                                .modal-lj {
                                   width: 85%;
                                }
                             }
                             .Custom_Cancel > .sa-button-container > .cancel  {
                                    background-color: #cccccc;
                                    border-color: #cccccc;
                                    margin-top: 15px;
                                 }
                                 .Custom_Cancel > .sa-button-container > .cancel:hover {
                                    background-color: #dedcdc;
                                    border-color: #dedcdc;
                                    margin-top: 15px;
                                 }
                        </style>
                        
                        <script>
                                                                        
                        function deletePedido(id) {
                        event.preventDefault(); // prevent form submit
                        swal({
                            title: "Estás seguro?",
                            text: "Esta acción no se puede deshacer",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Sí, estoy seguro',
                            cancelButtonText: "No, no cancelar",
                            closeOnConfirm: false,
                            closeOnCancel: false,
                            customClass: "Custom_Cancel"
                         },
                         function(isConfirm){

                           if (isConfirm){
                             swal("Pedido cancelado!", "Muchas gracias por tu confianza", "success");

                             function myFunction() {
                                window.location = '../Controlador/deletepedido.php?id='+id;
                              }
                              setTimeout(myFunction, 2000);

                            } else {
                              swal("Está bien :) !", "Tu pedido está a salvo", "error");
                                 e.preventDefault();
                            }
                         });
                    };
                    </script>
                        
                        <?php $pedidos= $clienteDAO->pedidosClientes($finalcliente['id_usuario']); ?>

                        <?php if($pedidos!=null){ ?>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" style="text-align: center;">
                                <thead class="thead-dark" >
                                  <tr class="table-primary" style="background-color: #ccc">
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">N° PEDIDO</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">TIPO DE PAGO</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">TIPO DE DOC.</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">FECHA DE PEDIDO</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">FECHA DE ENTREGA</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">STATUS DE LA ENTREGA</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">ACCIONES</th>
                                  </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php $pedidocont=0; ?>

                                    <?php foreach ($pedidos as $ped){ ?>
                                    
                                        <tr>                               
                                          <td style="text-align:center; display: table-cell; vertical-align: middle;"><center><div style="background-color: #afd9ee; border-radius: 70%; height: 40px; width: 70px ; text-align:center; display: table-cell; vertical-align: middle;"><b style="font-size: 15px"><?= $ped['numdocumento'] ?></b></div></center> </td>
                                          <td style="text-align:center; display: table-cell; vertical-align: middle;"><span style="font-size: 15px" class="badge rounded-pill bg-success"><?= $ped['detalle_pago'] ?></span></td>
                                          <?php $docventa= $clienteDAO->getTipoDocVenta($ped['id_doc']); ?>
                                          <td style="text-align:center; display: table-cell; vertical-align: middle;"><span style="font-size: 15px; background-color: #ebd778; color: #000" class="badge rounded-pill"><?= $docventa['documento'] ?></span></td>
                                          <td style="text-align:center; display: table-cell; vertical-align: middle;"><?= date('d-m-Y', strtotime($ped['fecha_pedido'])); ?></td>
                                          <td style="text-align:center; display: table-cell; vertical-align: middle;"><?= date('d-m-Y', strtotime($ped['fecha_entrega'])); ?></td>
                                          <td style="text-align:center; display: table-cell; vertical-align: middle;"><p style="text-transform: uppercase"><?= $ped['status'] ?></p></td>
                                          <td style="text-align:center; display: table-cell; vertical-align: middle;"><button class="btn btn-warning" data-toggle="modal" data-target="#masinfo<?=$pedidocont?>" style="background-color: #e04646; margin-bottom: 5px">MÁS INFO.</button><br><button data-toggle="modal" data-target="#detalle<?=$pedidocont?>" class="btn btn-success">DETALLES</button></td>
                                        </tr>

                                    <?php $pedidocont++;
                                    
                                    } ?>
                                  
                                </tbody> 

                            </table>
                        </div>
                        
                                <?php $pedidocontt=0; ?>
                        
                                <?php foreach ($pedidos as $ped2){ ?>
                    
                                    <div class="modal fade " id="masinfo<?=$pedidocontt?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-la" role="document"> 
                                                 <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>PEDIDO N° <?= $ped2['numdocumento'] ?></b></h4>
                                                        <br>
                                                         <h5 style="text-transform: uppercase;" class="modal-title" id="myModalLabel">CLIENTE: <?= $finalcliente['nomb'] ?> <?= $finalcliente['ape'] ?></h5>
                                                        </div>
                                                        <div class="modal-body" style="text-align: justify;">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <label for="inputMessage">N° DE PEDIDO:</label>
                                                                            <input type="text" class="form-control" id="inputMessage" disabled="true" value="<?= $ped2['numdocumento'] ?>"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="inputMessage">FECHA DE PEDIDO:</label>
                                                                            <input type="text" class="form-control" id="inputMessage" disabled="true" value="<?= date('d-m-Y', strtotime($ped2['fecha_pedido']));  ?>"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="inputMessage">FECHA DE ENTREGA:</label>
                                                                            <input type="text" class="form-control" id="inputMessage" disabled="true" value="<?= date('d-m-Y', strtotime($ped2['fecha_entrega'])); ?>"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="inputMessage">STATUS DE LA ENTREGA</label>
                                                                            <input type="text" class="form-control" id="inputMessage" disabled="true" value="<?= $ped2['status'] ?>"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="inputMessage">STATUS DEL PAGO: </label>
                                                                            <input type="text" class="form-control" id="inputMessage" disabled="true" value="<?= $ped2['status_pago'] ?>"/>
                                                                    </div>
                                                                    
                                                                    <?php if($ped2['id_pago']==4){ 
                                                                        
                                                                        $datostransact= json_decode($ped2['transaction_sale'], TRUE);
                                                                        
                                                                        $datosfinal= (array) $datostransact;
                                                                        
                                                                        ?>
                                                                    
                                                                        <div class="form-group">
                                                                                <label for="inputMessage">ID DE PAGO DE PAYPAL: </label>
                                                                                <input type="text" class="form-control" id="inputMessage" value="<?= $datosfinal['purchase_units'][0]['payments']['captures'][0]['id'] ?>" readonly/>
                                                                        </div>
                                                                    
                                                                        <div class="form-group">
                                                                                <label for="inputMessage">CORREO DE PAGO - PAYPAL: </label>
                                                                                <input type="text" class="form-control" id="inputMessage" value="<?= $datosfinal['payer']['email_address'] ?>" readonly/>
                                                                        </div>
                                                                    
                                                                        <div class="form-group">
                                                                                <label for="inputMessage">MONEDA: </label>
                                                                                <input type="text" class="form-control" id="inputMessage" value="<?= $datosfinal['purchase_units'][0]['amount']['currency_code'] ?>" readonly/>
                                                                        </div>
                                                                    
                                                                        <form action="../Controlador/ReportePaypal.php" method="POST" enctype='application/json'>
                                                                            <input type="hidden" name="idventa" value="<?=$ped2['id_venta']?>">
                                                                            <input type="hidden" name="idcliente" value="<?=$finalcliente['id_usuario']?>">
                                                                            <button type="submit" class="btn btn-primary">OBTENER REPORTE PAYPAL</button>
                                                                        </form>
                                                                    
                                                                    <?php }?>
                                                                    
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <label for="inputMessage">DIRECCIÓN DE ENTREGA: </label>
                                                                            <input type="text" class="form-control" id="inputMessage" disabled="true" value="<?= $ped2['direccion_entrega'] ?>"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label for="inputMessage">NOTA EXTRA: </label>
                                                                            <textarea type="text" class="form-control" disabled=""><?= $ped2['nota'] ?></textarea>
                                                                    </div>
                                                                    <?php $docventa= $clienteDAO->getTipoDocVenta($ped2['id_doc']); ?>
                                                                    <div class="form-group">
                                                                        <form action="../Controlador/ReporteVentas.php" method="POST">
                                                                            <input type="hidden" name="tipodoc" value="<?=$ped2['id_doc']?>">
                                                                            <input type="hidden" name="idventa" value="<?=$ped2['id_venta']?>">
                                                                            <input type="hidden" name="idcliente" value="<?=$finalcliente['id_usuario']?>">
                                                                            <label for="inputMessage">DOC. DE VENTA </label>
                                                                            <p>Puedes dar clic para generar el documento de venta</p>
                                                                            <span style="font-size: 15px; background-color: #ebd778; color: #000" class="badge rounded-pill"><?= $docventa['documento'] ?></span>
                                                                            <br><br>
                                                                            <?php if($ped2['id_doc']==2){ ?>
                                                                            <input type="hidden" class="form-control" name="ruc" value="<?=$ped2['numempresa']?>"/>
                                                                            <input type="text" class="form-control" value="RUC: <?=$ped2['numempresa']?>" disabled/>
                                                                            <br>
                                                                            <?php } ?>
                                                                            <button type="submit" class="form-control">OBTENER DOCUMENTO</button>
                                                                        </form>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                            <button class="btn btn-info" id="removeme" onclick="deletePedido(<?=$ped2['id_venta']?>)" href="#">Cancelar pedido</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn btn-default cerrarModal">Cerrar</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                    <div class="modal fade " id="detalle<?=$pedidocontt?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lj" role="document"> 
                                                 <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>DETALLES DEL PEDIDO N° <?= $ped2['numdocumento'] ?> </b></h4>
                                                        </div>
                                                        <div class="modal-body" style="text-align: justify;">
                                                            <div class="table-responsive">
                                                                        <table class="table table-hover" id="shop-table">
                                                                                <thead class="thead-dark">
                                                                                        <tr class="table-primary" style="background-color: #f05c0c; color: #fff">
                                                                                                <th class="image" style="text-align:center; display: table-cell; vertical-align: middle; width: 180px" scope="col">Producto</th>
                                                                                                <th class="description" style="text-align:center; display: table-cell; vertical-align: middle;" scope="col">Marca</th>
                                                                                                <th class="description" style="text-align:center; display: table-cell; vertical-align: middle;" scope="col">Nombre</th>
                                                                                                <th class="description" style="text-align:center; display: table-cell; vertical-align: middle;" scope="col">Descripción</th>
                                                                                                <th class="price" style="text-align:center; display: table-cell; vertical-align: middle;" scope="col">Cantidad</th>
                                                                                                <th class="total" style="text-align:center; display: table-cell; vertical-align: middle;" scope="col">Precio</th>
                                                                                                <th style="text-align:center; display: table-cell; vertical-align: middle;" scope="col">Subtotal</th>
                                                                                        </tr>
                                                                                </thead>
                                                                                <?php $detalles= $clienteDAO->getDetallesVenta($ped2['id_venta']); ?>
                                                                                <tbody>
                                                                                    
                                                                                    <?php foreach ($detalles as $det){ ?>
                                                                                        <tr>
                                                                                                <td class="cart_product" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                                                    <img src="../<?=$det['imagen'] ?>" style="width: 70%; pointer-events: none; border: 1px solid #bab9b6;" alt="">
                                                                                                </td>
                                                                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                                                        <h4 style="text-transform: uppercase"><?=$det['marca'] ?></h4>
                                                                                                </td>
                                                                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                                                        <h4><?=$det['nom_prod'] ?></h4>
                                                                                                </td>
                                                                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                                                        <p><?=$det['descripcion'] ?></p>
                                                                                                </td>
                                                                                                <td class="cart_price" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                                                        <p><?=$det['cantidad'] ?></p>
                                                                                                </td>
                                                                                                <td class="cart_total" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                                                        <p class="cart_total_price">S/. <?=$det['precio'] ?></p>
                                                                                                </td>
                                                                                                <td class="cart_delete" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                                                        <p class="cart_total_price">S/. <?=$det['RESULTADO'] ?></p>
                                                                                                </td>
                                                                                        </tr> 
                                                                                        
                                                                                    <?php } ?>
                                                                                        
                                                                                        <tr>
                                                                                            <?php $total= $clienteDAO->getTotalVentas($ped2['id_venta']); ?>
                                                                                            <td class="cart_delete" style="text-align:left; display: table-cell; vertical-align: middle;" colspan="6">
                                                                                                <h4>TOTAL (Inc. IGV y costo de envío):</h4>
                                                                                            </td>
                                                                                            <td class="cart_delete" style="text-align:center; display: table-cell; vertical-align: middle;" colspan="1">
                                                                                                <p class="cart_total_price">S/. <?= $total['TOTAL'] ?></p>
                                                                                            </td>
                                                                                        </tr>
                                                                                </tbody>
                                                                        </table>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn btn-default cerrarModal">Cerrar</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                        
                                <?php $pedidocontt++;
                                
                                    } ?>
                        
                        <?php }else{?>
                        
                        
                        <div >
                            <div>
                                <b style="font-size: 20px;">NO HAY PEDIDOS REALIZADOS</b>
                                <center>
                                    <img src="../imagenes/joven.jpg" style="pointer-events: none; height: 420px; width: 470px">
                                </center>
                            </div>
                        </div>
                        
                        <?php }?>
                    
                </div>

	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>E-</span>COMMERCE</h2>
							<p>Estamos para ofrecerte productos de primera calidad y atención especializada.</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=qQFFqM3TTH4" target="_blank">
									<div class="iframe-img">
										<img src="../imagenes/images/home/plazavea1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Historia de Plaza Vea</p>
								<h2>07 OCTUBRE 2O19</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=OV988963HGk" target="_blank">
									<div class="iframe-img">
										<img src="../imagenes/images/home/tottus1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>TOTTUS</p>
								<h2>24 MAYO 2019</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=cuVer5IkwnY" target="_blank">
									<div class="iframe-img">
										<img src="../imagenes/images/home/metro1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>METRO FIESTAS PATRIAS</p>
								<h2>06 JULIO 2020</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="https://www.youtube.com/watch?v=MjNV7DvYrv0" target="_blank">
									<div class="iframe-img">
										<img src="../imagenes/images/home/falabella1.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>SAGA FALABELLA</p>
								<h2>05 JUNIO 2020</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="../imagenes/images/home/map.png" alt="" />
							<p>Panamericana Sur km. 16.3 - Villa El Salvador</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Servicios</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Contactános</a></li>
								<li><a href="https://www.google.com/maps/place/Universidad+Aut%C3%B3noma+del+
                                                                Per%C3%BA/@-12.1956783,-76.9717862,19.12z/data=!4m5!3m4!1s0x91157f78ac
                                                                4dc955:0xd267131e6b012132!8m2!3d-12.195444!4d-76.9719563" target="_blank">Ubicación</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Socios</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="https://www.plazavea.com.pe/" target="_blank">Plaza Vea</a></li>
								<li><a href="https://www.tottus.com.pe/tottus/" target="_blank">Tottus</a></li>
								<li><a href="https://www.metro.pe/" target="_blank">Metro</a></li>
								<li><a href="https://www.falabella.com.pe/falabella-pe/" target="_blank">Saga Falabella</a></li>
						
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Políticas</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="http://www2.congreso.gob.pe/sicr/cendocbib/con4_uibd.nsf/0AC1BCBF94F59BD705257EEA0057F060/$FILE/PoliticaNutrici%C3%B3n_y_SeguridadAlimentaria.pdf" target="_blank">Nutrición</a></li>
								<li><a href="http://www.digesa.minsa.gob.pe/compial/archivos/Politica_Nacional_Inocuidad_Alimentos.pdf" target="_blank">Inocuidad alimentaria</a></li>
								<li><a href="https://acuerdonacional.pe/politicas-de-estado-del-acuerdo-nacional/politicas-de-estado%E2%80%8B/politicas-de-estado-castellano/ii-equidad-y-justicia-social/15-promocion-de-la-seguridad-alimentaria-y-nutricion/" target="_blank">Seguridad alimentaria</a></li>
								<li><a href="http://repositorio.up.edu.pe/bitstream/handle/11354/2018/PortocarreroFelipe2000.pdf?sequence=1" target="_blank">Gestión pública</a></li>
								<li><a href="https://docs.wfp.org/api/documents/WFP-0000050572/download/" target="_blank">Programa Mundial de Alimentos</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Proveedores</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="https://www.gloria.com.pe/" target="_blank" >Gloria</a></li>
								<li><a href="https://www.nestle.com.pe/" target="_blank" >Nestle</a></li>
								<li><a href="https://www.alicorp.com.pe/pe/es/" target="_blank">Alicorp</a></li>
								<li><a href="https://www.fritolay.com/" target="_blank">Frito Lay</a></li>
								<li><a href="http://costenoalimentos.com.pe/costeno" target="_blank">Costeño</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Sobre ti</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Correo electrónico" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Obtenga las actualizaciones más recientes de
                                                                nuestro sitio y se actualizará usted mismo ...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
                                        <?php 
                                        $Object = new DateTime();
                                        $Year = $Object->format("Y");
                                        ?>
					<p class="pull-left">Copyright © <?=$Year?> E-COMMERCE Inc. All rights reserved.</p>
					<p class="pull-right">Desarrollado por <span><a target="_blank" href="https://pe.linkedin.com/in/andersonfuentes">Anderson Fuentes</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

    <script src="../js/jquery.js"></script>
    <script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    
    <?php }?>
    
</body>
</html>




