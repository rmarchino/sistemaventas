<!DOCTYPE html>
<html lang="en">

<?php

    session_start();
    
    require "../Util/ConexionBD.php";
    require "../DAO/ModeloCliente.php";
    require "../DAO/ModeloAdmin.php";
    require "../DAO/ModeloUsuario.php";
    require_once '../DAO/Formato.php';
    
    if(!empty($_SESSION['usuario2']) && !empty($_SESSION['pass2'])){
        header('Location: ./Administrador/');
    }
    
    if(empty($_SESSION['usuario1']) && empty($_SESSION['pass1'])){
        header('Location:../');
        exit();
    }
    
    $usuario1= $_SESSION['usuario1'];
    $pass1= $_SESSION['pass1'];
    
    $formato= new Formato();
    
    require '../front/header.php' ;
    
?>

<body>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(window).on('load', function () {
                    setTimeout(function () {
                  $(".loader-page").css({visibility:"hidden",opacity:"0"})
                }, 150);

              });
        </script>

        <div class="loader-page"></div>
        
        <?php 
        
            if($_SESSION['usuario1']!=null){

                $usuarioDAO= new ModeloUsuario();
                $adminDAO= new ModeloAdmin();

                $finaladmin= $usuarioDAO->getUsuario($usuario1, $pass1);

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
								<li><a><i class="fa fa-google-plus"></i></a></li>
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
                                                            <li><a href="profile.php"><i class="fa fa-user"></i><?= $finaladmin['nomb'] ?> <?= $finaladmin['ape'] ?></a></li>
								<li><a href="orders.php"><i class="fa fa-star"></i> Ordenes</a></li>
								<li><a href="clients.php"><i class="fa fa-crosshairs"></i> Clientes</a></li>
								<li><a href="../Controlador/logout.php"><i class="fa fa-lock"></i> Salir</a></li>								
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
                                                                <li><a href="../Administrador/">Principal</a></li>
								<li class="dropdown"><a class="active">Tienda<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="clients.php">Clientes</a></li>
                                                                        <li><a href="employee.php">Empleados</a></li>
                                                                            <li><a href="users.php" class="active">Usuarios</a></li>
                                                                            <li><a href="../Controlador/logout.php">Salir</a></li> 
                                                                    </ul>
                                                                </li> 
								<li class="dropdown"><a>Perfil<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="profile.php"><?= $finaladmin['nomb'] ?> <?= $finaladmin['ape'] ?></a></li>

                                                                    </ul>
                                                                </li> 
								<li class="dropdown"><a>Upkeep<i class="fa fa-angle-down"></i></a>
                                                                    <ul role="menu" class="sub-menu">
                                                                        <li><a href="warehouse.php">Almacén</a></li>
                                                                    </ul>
                                                                </li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
                                                    <form action="index.php" method="get" class="searchform">
							<!--<input type="text" name="search" class="form-control" placeholder="Buscar producto" style="background-color: #f0eded; color: #000"/>-->
                                                    </form>
						</div>
					</div>
				</div>
				</div>
			</div>
	</header>
	
	<section id="advertisement">
            
            <div class="container">
                
                <style>
                    @media (min-width: 1200px) {
                        .modal-la {
                           width: 60%;
                        }
                     }
                </style>
                
                <?php 
                                    
                if(isset($_GET["search"])){

                    $search= $_GET['search'];

                    $adminDAO= new ModeloAdmin();

                    $users= $adminDAO->searchSelectUsers($search);

                }

                ?>
                
                <style>
                    .search-button{width:400px;height:50px;}
                    .cc{width:400px;position:relative}
                    .cc .lupa{position:absolute;margin-left:28px;margin-top:27px;color:#FFF;-webkit-transition:.3s ease-out;transition:.3s ease-out}
                    #search{width:70px;height:70px;background-color:#335D6B;color:#FFF;border:none;font-size:.9em;float:left;padding-left:70px;-webkit-transition:.6s ease-out;transition:.6s ease-out}
                    #search:active,#search:focus{outline:0;width:400px;padding-right:20px}
                    .cc:hover #search{width:400px;background-color:#3299BB}
                    .cc:hover .lupa{color:#424242}
                    ::-webkit-input-placeholder{color:#CCC}
                    :-moz-placeholder{color:#CCC}
                    ::-moz-placeholder{color:#CCC}
                    :-ms-input-placeholder{color:#CCC}
                </style>
                
                
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center card-box">
                                <div class="member-card pt-2 pb-2" style="text-align: left">
                                    <form action="users.php" method="get" class="search-button" style="padding-left: 0; margin-left: 0">
                                        <div class="cc" id="cc">
                                        <span class="lupa">
                                        <i class="fa fa-search"></i>
                                        </span>
                                        <input type="text" name="search" id="search" placeholder="Busca a un usuario en MarketApp" />
                                        </div>
                                    </form>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    <!-- end col -->
                    
                        <style>
                            @media (min-width: 1200px) {
                                .modal-la {
                                   width: 60%;
                                }
                             }
                        </style>

                        <div class="col-md-6">
                            <div class="text-center card-box" style="background-color: #c7c7c7; border-color: red #080;">
                                <div class="member-card pt-2 pb-2">
                                    <br>
                                    <div class="panel" id="pr" style='margin-left: 13px; margin-right: 13px'>
                                        <div class="form-group">
                                            
                                        </div>
                                        <div class="panel-body">
                                                <div class="col-md-6">
                                                        <div class="metric">
                                                            <div class="form-group">
                                                                <button class="btn btn-danger" data-toggle="modal" data-target="#regcliente">REGISTRAR CLIENTE</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            
                                                <div class="modal fade " id="regcliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document"> 
                                                         <div class="modal-content">
                                                                <div class="modal-header">
                                                                <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>REGISTRAR CLIENTE</b></h4>
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

                                                                    <div class="row">
                                                                        <form action="../Controlador/OperationsAdmin.php" method="POST" id="idForm">
                                                                            <div class="col-md-12">

                                                                                    <input type="hidden" class="form-control" name="op" value="15"/>
                                                                                    <div class="form-group">
                                                                                            <label >Nombres:</label>
                                                                                            <input type="text" class="form-control" name="nombres" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label>Apellidos:</label>
                                                                                            <input type="text" class="form-control" name="apellidos" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Username:</label>
                                                                                            <input type="text" class="form-control" name="username" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Correo electrónico:</label>
                                                                                            <input type="email" class="form-control" name="correo" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Contraseña</label>
                                                                                            <input type="password" class="form-control" name="pass" required/>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <button type="submit" id="btnEnviar" class="btn btn-warning form-control">REGISTRAR CLIENTE</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        
                                                                    </div>
                                                                    <div id="mostrar">
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn btn-default cerrarModal">Cerrar</button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-6">
                                                        <div class="metric">
                                                            <div class="form-group">
                                                                <button class="btn btn-info" data-toggle="modal" data-target="#regempleado">REGISTRAR EMPLEADO</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            
                                                <div class="modal fade " id="regempleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog modal-la" role="document"> 
                                                         <div class="modal-content">
                                                                <div class="modal-header">
                                                                <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>REGISTRAR EMPLEADO</b></h4>
                                                                </div>
                                                                <div class="modal-body" style="text-align: justify;">
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
                                                                        <form action="../Controlador/OperationsAdmin.php" method="POST" id="idForm2">
                                                                            <input type="hidden" class="form-control" name="op" value="16"/>
                                                                            <div class="col-md-6">

                                                                                    <div class="form-group">
                                                                                            <label >Nombres:</label>
                                                                                            <input type="text" class="form-control" name="nombres" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label>Apellidos:</label>
                                                                                            <input type="text" class="form-control" name="apellidos" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Username:</label>
                                                                                            <input type="text" class="form-control" name="username" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Correo electrónico:</label>
                                                                                            <input type="email" class="form-control" name="correo" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Contraseña</label>
                                                                                            <input type="password" class="form-control" name="pass" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label >Función</label>
                                                                                        <select name="funcion" class="form-control" required="true">
                                                                                            <option value="" selected="">Elegir</option>

                                                                                            <?php $funcion= $adminDAO->getFuncion();?>

                                                                                            <?php foreach ($funcion as $fn){ ?>
                                                                                                <option value="<?=$fn['id_funcion']?>" ><?= strtoupper($fn['nombre_funcion'])?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-6">

                                                                                    <div class="form-group">
                                                                                        <label >Distrito</label>
                                                                                        <select name="ubigeo" class="form-control" required="true">
                                                                                            <option value="" selected="">Elegir</option>

                                                                                            <?php $ubigeo= $adminDAO->getUbigeo();?>

                                                                                            <?php foreach ($ubigeo as $ub){ ?>
                                                                                                <option value="<?=$ub['id_ubigeo']?>" ><?=$ub['distrito']?> - <?= strtoupper($ub['provincia'])?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Dirección:</label>
                                                                                            <input type="text" class="form-control" name="direccion" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label >Tipo de documento</label>
                                                                                        <select name="tipodoc" class="form-control" required="true">
                                                                                            <option value="" selected="">Elegir</option>
                                                                                            <option value="1">RUC</option>
                                                                                            <option value="2">DNI</option>
                                                                                            <option value="3">CARNÉ UNIVERSITARIO</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Número de documento:</label>
                                                                                            <input type="text" class="form-control" name="ndoc" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Teléfono:</label>
                                                                                            <input type="text" class="form-control" name="telefono" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label >Fecha de nacimiento:</label>
                                                                                            <input type="date" class="form-control" name="fenaci" required/>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <button type="submit" id="btnEnviar2" class="btn btn-success form-control">REGISTRAR EMPLEADO</button>
                                                                                </div>
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
                                            
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
                <br>
                
                <?php if(isset($users)!=null){?>
                
                <div class="table-responsive">
                        <table class="table table-striped table-hover" style="text-align: center;">
                            <thead class="thead-dark" >
                              <tr class="table-primary" style="background-color: #24009c; color: #fff; font-weight: 400">
                                <th style="text-align: center; display: table-cell; vertical-align: middle; width: 200px" scope="col">ID</th>
                                <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">NOMBRES</th>
                                <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">APELLIDOS</th>
                                <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">USERNAME</th>
                                <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">CORREO</th>
                                <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">ROL</th>
                                <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">ACCIONES</th>
                              </tr>
                            </thead>

                            <tbody>

                                    <?php 
                                    $ipp=0;
                                    $chrt=1;

                                    foreach($users as $us){
                                        $tt="a".$ipp;
                                        $infprod= "p".$ipp;
                                    ?>

                                        <tr>
                                                <td class="cart_product" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                    <center><div style="background-color: #fcc84c; border-radius: 10%; height: 40px; width: 70px ; text-align:center; display: table-cell; vertical-align: middle;"><b style="font-size: 15px"><?= $us['id_usuario'] ?></b></div></center>
                                                </td>
                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                        <h5 style="text-transform: uppercase"><?=$us['nomb']?></h5>
                                                </td>
                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                        <h5 style="text-transform: uppercase"><?=$us['ape']?></h5>
                                                </td>
                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                        <h5 style="text-transform: uppercase"><?=$us['username']?></h5>
                                                </td>
                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                        <h5 style="font-weight: 400"><?=$us['correo']?></h5>
                                                </td>
                                                <td class="cart_price" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                        <h5 style="font-weight: 400"><?= strtoupper($us['rol'])?></h5>
                                                </td>
                                                <td class="cart_delete" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$ipp?>" style="background-color: #e04646; margin-bottom: 5px; width: 120px">EDITAR</button>
                                                </td>
                                        </tr>

                                        <div class="modal fade " id="edit<?=$ipp?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document"> 
                                                 <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>USUARIO: <?=$us['nomb']?> <?=$us['ape']?></b></h4>
                                                        </div>
                                                        <div class="modal-body" style="text-align: justify;">
                                                                
                                                                <script type="text/javascript">
                                                                    $(document).ready(function(){

                                                                        $("#idForm<?=$tt?>").bind("submit",function(){
                                                                            // Capturamnos el boton de envío
                                                                            var btnEnviar = $("#btnEnviar<?=$tt?>");
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

                                                                        $("#idForm2<?=$tt?>").bind("submit",function(){
                                                                            // Capturamnos el boton de envío
                                                                            var btnEnviar = $("#btnEnviar2<?=$tt?>");
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
                                                                        <form action="../Controlador/OperationsAdmin.php" method="POST" id="idForm<?=$tt?>">
                                                                            <input type="hidden" class="form-control" name="idusuario" value="<?=$us['id_usuario']?>"/>
                                                                            <input type="hidden" class="form-control" name="op" value="17"/>
                                                                            <div class="form-group">
                                                                                    <label >Nombres:</label>
                                                                                    <input type="text" class="form-control" name="nombres" id="inputMessage" value="<?=$us['nomb']?>" required/>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                    <label>Apellidos:</label>
                                                                                    <input type="text" class="form-control" name="apellidos" value="<?=$us['ape']?>" required/>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                    <label >Correo electrónico:</label>
                                                                                    <input type="email" class="form-control" name="correo" value="<?=$us['correo']?>" required/>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" id="btnEnviar<?=$tt?>" class="btn btn-danger form-control">Actualizar información</button>
                                                                            </div>
                                                                        </form>
                                                                        <div id="mostrar">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <form action="../Controlador/OperationsAdmin.php" method="POST" id="idForm2<?=$tt?>">
                                                                            <input type="hidden" class="form-control" name="idusuario" value="<?=$finaladmin['id_usuario']?>"/>
                                                                            <input type="hidden" class="form-control" name="iddestino" value="<?=$us['id_usuario']?>"/>
                                                                            <input type="hidden" class="form-control" name="op" value="18"/>
                                                                            <div class="form-group">
                                                                                    <label >Username:</label>
                                                                                    <input type="text" class="form-control" disabled="true" value="<?=$us['username']?>"/>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                    <label>Ingresa tu contraseña actual:</label>
                                                                                    <input type="password" name="passactual" class="form-control" value="" required/>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                    <label>Ingresa una nueva contraseña para el usuario:</label>
                                                                                    <input type="password" name="passnew1" class="form-control" value="" required/>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                    <label>Confirma tu nueva contraseña para el usuario:</label>
                                                                                    <input type="password" name="passnew2" class="form-control"  value="" required/>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button type="submit" id="btnEnviar2<?=$tt?>" class="btn btn-info form-control">Actualizar contraseña</button>
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

                            <?php $ipp++; 
                                  $chrt++;
                                    } ?>
                         </tbody> 

                        </table>
                    </div>
                
                <?php } ?>
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
	
    <?php } ?>

    <script src="../js/jquery.js"></script>
    <script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    
</body>
</html>