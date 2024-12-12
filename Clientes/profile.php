<!DOCTYPE html>
<html lang="en">

<?php

    session_start();
    
    require "../Util/ConexionBD.php";
    require "../DAO/ModeloCliente.php";
    require "../DAO/ModeloUsuario.php";
    require_once '../DAO/Formato.php';
    
    if(!empty($_SESSION['usuario1']) && !empty($_SESSION['pass1'])){
        header('Location: ./Administrador/');
    }
    
    if(empty($_SESSION['usuario2']) && empty($_SESSION['pass2'])){
        header('Location:../');
        exit();
    }
    
    $usuario2= $_SESSION['usuario2'];
    $pass2= $_SESSION['pass2'];
    
    $formato= new Formato();
    
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

                $finalcliente= $usuarioDAO->getUsuario($usuario2, $pass2);

        ?>
	
        <header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="tel:972-487-645""><i class="fa fa-phone"></i> +51 972 487 645</a></li>
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
                                           
                                                                        $objcc= new ConexionBD();
                                                                        $conexx= $objcc->getConexionBD();
                                                                        $productcarrito=0;

                                                                        $recordss= $conexx->prepare("call selectProductos();");
                                                                        $ii= $recordss->execute();

                                                                                 if (($ii) > 0) {
                                                                                     //instanciamos todos los produtos que tengamos
                                                                                     while($listaa= $recordss->fetch(PDO::FETCH_ASSOC)){
                                                                                         
                                                                                         if(!empty($_SESSION['carrito'])){
                                                                                         //como en este tenemos un array clave-valor es mas facil que recorra todos los documentos
                                                                                            foreach($_SESSION['carrito'] as $clave => $valor){
                                                                                                //verifica que nuestro iventario coicida con algo de nuestra lista para que solo muestre lo de deseemos
                                                                                               if($listaa['id_producto']==$clave && $valor!=0){
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
								<li class="dropdown"><a class="active">Perfil<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="../Clientes/profile.php" class="active"><?= $finalcliente['nomb'] ?> <?= $finalcliente['ape'] ?></a></li>
                                                                    </ul>
                                                                </li> 
								<li><a href="../Clientes/orders.php">Mis pedidos</a></li>
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
		
            <div class="container container-web-page">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="text-center card-box">
                                <div class="member-card pt-2 pb-2" style="text-align: left">
                                    <h3 class="font-weight-bold poppins-regular text-uppercase">MIS DATOS DE USUARIO</h3>
                                    <p style="font-size: 16px"><?= $formato->saludo() ?> <b><?= $finalcliente['nomb'] ?> </b>! En esta sección podrás visualizar tu información de seguridad y acceso</p>
                                    <hr>
                                    <div class="row">
                                    <div class="container">
                                        <div class="main-body">

                                              <!-- Breadcrumb -->

                                              <!-- /Breadcrumb -->

                                              <div class="row gutters-sm">
                                                    <div class="col-md-7">
                                                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                                                        <ol class="breadcrumb">
                                                          <li class="breadcrumb-item"><a href="javascript:window.history.go(-2);">Inicio</a></li>
                                                          <li class="breadcrumb-item active" aria-current="page">Perfil de usuario</li>
                                                        </ol>
                                                      </nav>
                                                      <div class="card mb-7">
                                                        <div class="card-body">
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage">Nombres y apellidos:</label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage" style="font-weight: 400"><?=$finalcliente['nomb']?> <?=$finalcliente['ape']?></label>
                                                            </div>
                                                          </div>
                                                          <hr>
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage">Correo electrónico:</label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage" style="font-weight: 400"><?=$finalcliente['correo']?></label>
                                                            </div>
                                                          </div>
                                                          <hr>
                                                          <div class="row">
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage">Username:</label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                 <label for="inputMessage" style="font-weight: 400"><?=$finalcliente['username']?></label>
                                                            </div>
                                                          </div>
                                                          <hr>

                                                          <div class="modal fade " id="editinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document"> 
                                                                     <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>EDITAR DATOS DE ACCESO</b></h4>
                                                                            </div>
                                                                            <div class="modal-body" style="text-align: justify;">
                                                                                <script type="text/javascript">
                                                                                    $(document).ready(function(){

                                                                                        $("#idForm").bind("submit",function(){
                                                                                            // Capturamnos el boton de envío
                                                                                            var btnEnviar = $("#btnEnviar");
                                                                                            $.ajax({
                                                                                                type: $(this).attr("method"),
                                                                                                url: $(this).attr("action"),
                                                                                                data:$(this).serialize(),
                                                                                                beforeSend: function(){
                                                                                                    /*
                                                                                                    * Esta función se ejecuta durante el envió de la petición al
                                                                                                    * servidor.
                                                                                                    * */
                                                                                                    // btnEnviar.text("Enviando"); Para button 
                                                                                                    btnEnviar.val("Enviando"); // Para input de tipo button
                                                                                                    btnEnviar.attr("disabled","disabled");
                                                                                                },
                                                                                                complete:function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta al termino de la petición
                                                                                                    * */
                                                                                                    btnEnviar.val("Enviar formulario");
                                                                                                    btnEnviar.removeAttr("disabled");
                                                                                                },
                                                                                                success: function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta cuando termina la petición y esta ha sido
                                                                                                    * correcta
                                                                                                    * */
                                                                                                    $("#mostrar").html(data);
                                                                                                },
                                                                                                error: function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta si la peticón ha sido erronea
                                                                                                    * */
                                                                                                    alert("Problemas al tratar de enviar el formulario");
                                                                                                }
                                                                                            });
                                                                                            // Nos permite cancelar el envio del formulario
                                                                                            return false;
                                                                                        });
                                                                                    });
                                                                                </script>

                                                                                <script type="text/javascript">
                                                                                    $(document).ready(function(){

                                                                                        $("#idForm2").bind("submit",function(){
                                                                                            // Capturamnos el boton de envío
                                                                                            var btnEnviar = $("#btnEnviar2");
                                                                                            $.ajax({
                                                                                                type: $(this).attr("method"),
                                                                                                url: $(this).attr("action"),
                                                                                                data:$(this).serialize(),
                                                                                                beforeSend: function(){
                                                                                                    /*
                                                                                                    * Esta función se ejecuta durante el envió de la petición al
                                                                                                    * servidor.
                                                                                                    * */
                                                                                                    // btnEnviar.text("Enviando"); Para button 
                                                                                                    btnEnviar.val("Enviando"); // Para input de tipo button
                                                                                                    btnEnviar.attr("disabled","disabled");
                                                                                                },
                                                                                                complete:function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta al termino de la petición
                                                                                                    * */
                                                                                                    btnEnviar.val("Enviar formulario");
                                                                                                    btnEnviar.removeAttr("disabled");
                                                                                                },
                                                                                                success: function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta cuando termina la petición y esta ha sido
                                                                                                    * correcta
                                                                                                    * */
                                                                                                    $("#mostrar").html(data);
                                                                                                },
                                                                                                error: function(data){
                                                                                                    /*
                                                                                                    * Se ejecuta si la peticón ha sido erronea
                                                                                                    * */
                                                                                                    alert("Problemas al tratar de enviar el formulario");
                                                                                                }
                                                                                            });
                                                                                            // Nos permite cancelar el envio del formulario
                                                                                            return false;
                                                                                        });
                                                                                    });
                                                                                </script>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <form action="../Controlador/OperationsCliente.php" method="POST" id="idForm">
                                                                                            <input type="hidden" class="form-control" name="idusuario" value="<?=$finalcliente['id_usuario']?>"/>
                                                                                            <input type="hidden" class="form-control" name="op" value="1"/>
                                                                                            <div class="form-group">
                                                                                                    <label >Nombres:</label>
                                                                                                    <input type="text" class="form-control" name="nombres" id="inputMessage" value="<?=$finalcliente['nomb']?>" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label>Apellidos:</label>
                                                                                                    <input type="text" class="form-control" name="apellidos" value="<?=$finalcliente['ape']?>" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label >Correo electrónico:</label>
                                                                                                    <input type="email" class="form-control" name="correo" value="<?=$finalcliente['correo']?>" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <button type="submit" id="btnEnviar" class="btn btn-danger form-control">Actualizar información</button>
                                                                                            </div>
                                                                                        </form>
                                                                                        <div id="mostrar">

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <form action="../Controlador/OperationsCliente.php" method="POST" id="idForm2">
                                                                                            <input type="hidden" class="form-control" name="idusuario" value="<?=$finalcliente['id_usuario']?>"/>
                                                                                            <input type="hidden" class="form-control" name="op" value="2"/>
                                                                                            <div class="form-group">
                                                                                                    <label >Username:</label>
                                                                                                    <input type="text" class="form-control" disabled="true" value="<?=$finalcliente['username']?>"/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label>Ingresa tu contraseña actual:</label>
                                                                                                    <input type="password" name="passactual" class="form-control" value="" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label>Ingresa una nueva contraseña:</label>
                                                                                                    <input type="password" name="passnew1" class="form-control" value="" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                    <label>Confirma tu nueva contraseña:</label>
                                                                                                    <input type="password" name="passnew2" class="form-control"  value="" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <button type="submit" id="btnEnviar2" class="btn btn-info form-control">Actualizar contraseña</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" data-dismiss="modal" class="btn btn-default cerrarModal">Cerrar</button>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                          <div class="row">
                                                            <div class="col-sm-12">
                                                              <a class="btn btn-success " data-toggle="modal" data-target="#editinfo">Editar información de seguridad y acceso</a>
                                                            </div>
                                                          </div>
                                                          <hr>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end col -->

                        <?php 

                            $clienteDAO= new ModeloCliente();

                            $clientedatos= $clienteDAO->getCliente($usuario2, $pass2);

                        ?>

                        <?php if($clientedatos!=null){ ?>

                        <style>
                            @media (min-width: 1200px) {
                                .modal-la {
                                   width: 60%;
                                }
                             }
                        </style>

                        <div class="col-md-5" style="background-color: #f7f7f7; border-color: red #080;">
                            <div class="text-center card-box">
                                <div class="member-card pt-2 pb-2" >
                                    <h3 class="font-weight-bold poppins-regular text-uppercase" style="text-align: left">MI PERFIL DE CLIENTE</h3>
                                    <p style="text-align: left; font-size: 16px" >En esta sección podrás visualizar tu información como cliente</p>
                                    <hr>
                                    <div class="thumb-lg member-thumb mx-auto"><img src="../<?=$clientedatos['imagen']?>" class="rounded-circle img-thumbnail" alt="profile-image" style="width: 205px; height: 195px; border-radius: 20%; pointer-events: none"></div>
                                    <div class="">
                                        <h4><?=$clientedatos['nom_cli']?> <?=$clientedatos['ape_cli']?></h4>
                                        <button type="button" data-toggle="modal" data-target="#editinfocliente" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Editar datos</button>
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mt-3">
                                                        <h4><?=$clientedatos['numdocumento_cli']?></h4>
                                                        <p class="mb-0 text-muted">Número de documento</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mt-3">
                                                        <h4><?=$clientedatos['tel_cli']?></h4>
                                                        <p class="mb-0 text-muted">Teléfono</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mt-3">
                                                        <?php $ubigg= $clienteDAO->getUbigeoById($clientedatos['id_ubigeo']); ?>
                                                        <h4><?=$clientedatos['dir_cli']?> - <?= strtoupper($ubigg['distrito'])?> - <?= strtoupper($ubigg['provincia'])?></h4>
                                                        <p class="mb-0 text-muted">Dirección</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade " id="editinfocliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-la" role="document"> 
                             <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>EDITAR INFORMACIÓN DEL CLIENTE</b></h4>
                                    </div>
                                    <div class="modal-body" style="text-align: justify;">
                                        <div class="row">
                                            <script type="text/javascript">
                                                $(document).ready(function(){

                                                    $("#idForm3").bind("submit",function(){
                                                        // Capturamnos el boton de envío
                                                        var btnEnviar = $("#btnEnviar3");
                                                        //var formData = new FormData(this);
                                                        $.ajax({
                                                            type: $(this).attr("method"),
                                                            url: $(this).attr("action"),
                                                            data:new FormData(this),
                                                            enctype: 'multipart/form-data',
                                                            processData: false,
                                                            contentType: false,
                                                            cache: false,
                                                            beforeSend: function(){

                                                                btnEnviar.val("Enviando"); // Para input de tipo button
                                                                btnEnviar.attr("disabled","disabled");
                                                            },
                                                            complete:function(data){

                                                                btnEnviar.val("Enviar formulario");
                                                                //btnEnviar.removeAttr("disabled");
                                                            },
                                                            success: function(data){

                                                                swal("Imagen actualizada", "La foto de perfil se actualizó correctamente!", "success");
                                                                function myFunction() {
                                                                    location.reload();
                                                                  }
                                                                  setTimeout(myFunction, 2000);

                                                            },
                                                            error: function(data){
                                                                /*
                                                                * Se ejecuta si la peticón ha sido erronea
                                                                * */
                                                                alert("Problemas al tratar de enviar el formulario");
                                                            }
                                                        });
                                                        // Nos permite cancelar el envio del formulario
                                                        return false;
                                                    });
                                                });
                                            </script>
                                            <form action="../Controlador/OperationsCliente.php" method="POST" id="idForm3">
                                                <input type="hidden" class="form-control" name="idcliente" value="<?=$clientedatos['id_cli']?>"/>
                                                <input type="hidden" class="form-control" name="op" value="3"/>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <center>
                                                            <img src="../<?=$clientedatos['imagen']?>" class="form-control" style="pointer-events: none; width: 265px; height: 260px;" alt="">
                                                        </center>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">EDITAR IMAGEN</label>
                                                            <input type="file" class="form-control" name="archivo" accept="image/gif, image/jpeg, image/png" required/>
                                                    </div>
                                                    <div class="form-group">
                                                            <button type="submit" id="btnEnviar3" class="btn btn-warning form-control">EDITAR IMAGEN</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <script type="text/javascript">
                                                $(document).ready(function(){

                                                    $("#idForm4").bind("submit",function(){
                                                        // Capturamnos el boton de envío
                                                        var btnEnviar = $("#btnEnviar4");
                                                        $.ajax({
                                                            type: $(this).attr("method"),
                                                            url: $(this).attr("action"),
                                                            data:$(this).serialize(),
                                                            beforeSend: function(){
                                                                /*
                                                                * Esta función se ejecuta durante el envió de la petición al
                                                                * servidor.
                                                                * */
                                                                // btnEnviar.text("Enviando"); Para button 
                                                                btnEnviar.val("Enviando"); // Para input de tipo button
                                                                btnEnviar.attr("disabled","disabled");
                                                            },
                                                            complete:function(data){
                                                                /*
                                                                * Se ejecuta al termino de la petición
                                                                * */
                                                                btnEnviar.val("Enviar formulario");
                                                                btnEnviar.removeAttr("disabled");
                                                            },
                                                            success: function(data){
                                                                /*
                                                                * Se ejecuta cuando termina la petición y esta ha sido
                                                                * correcta
                                                                * */
                                                                $("#mostrar").html(data);
                                                            },
                                                            error: function(data){
                                                                /*
                                                                * Se ejecuta si la peticón ha sido erronea
                                                                * */
                                                                alert("Problemas al tratar de enviar el formulario");
                                                            }
                                                        });
                                                        // Nos permite cancelar el envio del formulario
                                                        return false;
                                                    });
                                                });
                                            </script>

                                            <form action="../Controlador/OperationsCliente.php" method="POST" id="idForm4">
                                                <input type="hidden" class="form-control" name="idcliente" value="<?=$clientedatos['id_cli']?>"/>
                                                <input type="hidden" class="form-control" name="op" value="4"/>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                            <label for="inputMessage">TIPO DE DOCUMENTO: </label>
                                                            <select name="tipodoc" class="form-control"  required="true">
                                                                    <option value="<?=$clientedatos['id_tipodocumento']?>" selected=""><?=$clientedatos['descripcion_tipodoc']?></option>

                                                                    <?php $tipo= $clienteDAO->getFilterTipoDoc($clientedatos['id_tipodocumento']); ?>

                                                                    <?php foreach ($tipo as $tp){ ?>
                                                                        <option value="<?=$tp['id_tipodocumento']?>"><?=$tp['descripcion_tipodoc']?></option>
                                                                    <?php } ?>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">N° DE DOCUMENTO: </label>
                                                            <input type="text" name="numdoc" class="form-control" value="<?=$clientedatos['numdocumento_cli']?>" required/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">DISTRITO: </label>
                                                            <?php $ubig= $clienteDAO->getUbigeoById($clientedatos['id_ubigeo']); ?>

                                                            <select name="ubigeo" class="form-control"  required="true">
                                                                    <option value="<?=$clientedatos['id_ubigeo']?>" selected=""><?=$ubig['distrito']?> - <?=strtoupper($ubig['provincia'])?></option>

                                                                    <?php $listubigeo= $clienteDAO->getFilterUbigeo($clientedatos['id_ubigeo']); ?>

                                                                    <?php foreach ($listubigeo as $ub){ ?>
                                                                        <option value="<?=$ub['id_ubigeo']?>"><?=$ub['distrito']?> - <?=strtoupper($ub['provincia'])?></option>
                                                                    <?php } ?>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">DIRECCIÓN: </label>
                                                            <input type="text" name="direccion" class="form-control" value="<?=$clientedatos['dir_cli']?>" required/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">TELÉFONO: </label>
                                                            <input type="text" name="telefono" class="form-control" value="<?=$clientedatos['tel_cli']?>" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <button type="submit" id="btnEnviar4" class="btn btn-danger form-control">EDITAR INFORMACIÓN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default cerrarModal">Cerrar</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <?php }?>
                </div>
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
					<p class="pull-left">Copyright © <?=$Year?> LOGICLAYER Inc. All rights reserved.</p>
					<p class="pull-right">Desarrollado por <span><a target="_blank" href="#">LOGICLAYER S.A.C</a></span></p>
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
    
    <?php } ?>
    
</body>
</html>


