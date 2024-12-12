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
								<li><a href="#"><i class="fa fa-envelope"></i> logiclayer@gmail.com</a></li>
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
                                                                        <li><a href="clients.php" class="active">Clientes</a></li>
                                                                        <li><a href="employee.php">Empleados</a></li>
                                                                            <li><a href="users.php">Usuarios</a></li>
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
            
            <div class="container" id="clientscontainer">
                <style>
                    nav{
                        width:100%;
                        height:60px;
                        font-family:sans-serif;
                        background:#aeb6bf;
                        border-bottom:4px solid rgba(0,0,0,0.1);
                    }

                    .cont{
                        height:100%;
                        padding-top:0px;
                        float:right;
                    }
                    .cont label{
                        color:#fff;
                        font-size:12.9px;
                    }

                    #sear{
                        width:170px;
                        margin:10px;
                        padding:10px 16px;
                        border-radius:32px;
                        outline:none;
                        border:2px solid #ccd1d1;
                        background:#ebeef0;
                        transition:all 0.5s;
                    }
                    #sear:focus{
                        background:#fff;
                        width:300px;
                    }
                </style>
                <style>
                    @media (min-width: 1200px) {
                        .modal-la {
                           width: 60%;
                        }
                     }
                </style>
                <nav>
                    <div class="cont">
                        <form action="clients.php" method="GET">
                            <label>Buscar</label>
                            <input type="text" id="sear" name="search" placeholder="clientes" title="Busque al cliente por sus datos">
                        </form>
                    </div>
                </nav>
                <br>
                <div class="table-responsive">
                                <table class="table table-striped" style="text-align: center;">
                                    <thead class="thead-dark" >
                                      <tr class="table-primary" style="background-color: #ff8519; color: #fff; font-weight: 400">
                                        <th style="text-align: center; display: table-cell; vertical-align: middle; width: 200px" scope="col">CLIENTE</th>
                                        <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">NOMBRES</th>
                                        <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">N° DOC</th>
                                        <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">TELÉFONO</th>
                                        <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">DISTRITO</th>
                                        <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">DIRECCIÓN</th>
                                        <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">ACCIONES</th>
                                      </tr>
                                    </thead>
                                    
                                    <?php 
                                    
                                    if(isset($_GET["search"])){

                                        $search= $_GET['search'];

                                        $adminDAO= new ModeloAdmin();

                                        $clients= $adminDAO->searchSelectClientesByAdmin($search);

                                    }else{
                                        $clients= $adminDAO->selectClientesByAdmin();
                                    }
                                    
                                    ?>

                                    <tbody>

                                            <?php if($clients!=null){?>

                                                    <?php 
                                                    $ipp=0;
                                                    $chrt=1;
                                                    $clienteDAO= new ModeloCliente();
                                                    
                                                    foreach($clients as $cli){
                                                        $tt="a".$ipp;
                                                        $chart="ch".$ipp;
                                                        $infprod= "p".$ipp;
                                                    ?>
                                        
                                                        
                                                        <tr>
                                                            <script type="text/javascript">
                                                            $(document).ready(function(){
                                                                $(document).on("click","#verpedidos<?=$ipp?>", function(){
                                                                //var valor = "update";
                                                                    var idcli = jQuery('#idcli<?=$ipp?>').val();
                                                                //$('#Msg').html('<div class="loading"><img src="files/busy.gif" alt="loading" />&nbsp;&nbsp;Procesando, por favor espere...</div>');
                                                                    $.ajax({
                                                                        url:"../Controlador/OperationsAdmin.php",
                                                                        type:"POST",
                                                                        cache:false,
                                                                        data:{idcliente:idcli,op:9},
                                                                        success:function(data){

                                                                        $("#clientscontainer").hide();
                                                                        $("#resultpedidos").html(data);

                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        </script>
                                                                <td class="cart_product" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <img src="../<?=$cli['imagen']?>" style="width: 50%; pointer-events: none; border: 1px solid #bab9b6;" alt="">
                                                                </td>
                                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                        <h5 style="text-transform: uppercase"><?=$cli['nom_cli']?> <?=$cli['ape_cli']?></h5>
                                                                </td>
                                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                        <h5 style="text-transform: uppercase"><?=$cli['numdocumento_cli']?></h5>
                                                                </td>
                                                                <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                        <h5 style="font-weight: 400"><?=$cli['tel_cli']?></h5>
                                                                </td>
                                                                <td class="cart_price" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                        <h5 style="font-weight: 400"><?=$cli['distrito']?></h5>
                                                                </td>
                                                                <td class="cart_total" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                        <h5 style="font-weight: 400"><?=$cli['dir_cli']?></h5>
                                                                </td>
                                                                <input type="hidden" value="<?= $cli['id_cli'] ?>" id="idcli<?=$ipp?>">
                                                                
                                                                <td class="cart_delete" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$ipp?>" style="background-color: #e04646; margin-bottom: 5px; width: 120px">EDITAR</button><br><button style="width: 120px" id="verpedidos<?=$ipp?>" class="btn btn-info">VER PEDIDOS</button>
                                                                </td>
                                                        </tr>

                                                        <div class="modal fade " id="edit<?=$ipp?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog modal-la" role="document"> 
                                                                 <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>CLIENTE: <?=$cli['nom_cli']?> <?=$cli['ape_cli']?></b></h4>
                                                                        </div>
                                                                        <div class="modal-body" style="text-align: justify;">
                                                                            <div class="row">
                                                                                <script type="text/javascript">
                                                                                    $(document).ready(function(){

                                                                                        $("#formImg<?=$tt?>").bind("submit",function(){
                                                                                            // Capturamnos el boton de envío
                                                                                            var btnEnviar = $("#btnenviarimg<?=$tt?>");
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
                                                                                                    swal("Imagen actualizada del cliente", "La imagen del cliente se actualizó con éxito!", "success");
                                                                                                    function myFunction() {
                                                                                                        location.reload();
                                                                                                      }
                                                                                                      setTimeout(myFunction, 1800);

                                                                                                      $("#mostrarresImg").html(data);
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
                                                                                <form action="../Controlador/OperationsAdmin.php" method="POST" id="formImg<?=$tt?>" enctype="multipart/form-data">
                                                                                    <input type="hidden" class="form-control" name="idcliente" value="<?=$cli['id_cli']?>"/>
                                                                                    <input type="hidden" class="form-control" name="op" value="7"/>
                                                                                    <div class="col-md-5">
                                                                                        <div class="form-group">
                                                                                            <center>
                                                                                                <img src="../<?=$cli['imagen']?>" class="form-control" style="pointer-events: none; width: 265px; height: 260px;" alt="">
                                                                                            </center>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                                <label for="inputMessage">EDITAR IMAGEN</label>
                                                                                                <input type="file" name="archivo" class="form-control" required="true"/>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                                <button type="submit" id="btnenviarimg<?=$tt?>" class="btn btn-warning form-control">EDITAR IMAGEN</button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="mostrarresImg">

                                                                                    </div>
                                                                                </form>

                                                                                <script type="text/javascript">
                                                                                    $(document).ready(function(){

                                                                                        $("#idFormTwo<?=$infprod?>").bind("submit",function(){
                                                                                            // Capturamnos el boton de envío
                                                                                            var btnEnviar = $("#btnEnviarTwo<?=$infprod?>");
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
                                                                                                    swal("Información actualizada del cliente", "La información del cliente se actualizó con éxito!", "success");
                                                                                                    function myFunction() {
                                                                                                        location.reload();
                                                                                                      }
                                                                                                      setTimeout(myFunction, 1200);
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

                                                                                <form action="../Controlador/OperationsAdmin.php" method="POST" id="idFormTwo<?=$infprod?>">
                                                                                    <input type="hidden" class="form-control" name="idcliente" value="<?=$cli['id_cli']?>"/>
                                                                                    <input type="hidden" class="form-control" name="op" value="8"/>
                                                                                    <div class="col-md-7">
                                                                                        <div class="form-group">
                                                                                                <label for="inputMessage">TIPO DE DOCUMENTO: </label>
                                                                                                <select name="tipodoc" class="form-control"  required="true">
                                                                                                        <option value="<?=$cli['id_tipodocumento']?>" selected=""><?=$cli['descripcion_tipodoc']?></option>

                                                                                                        <?php $tipo= $clienteDAO->getFilterTipoDoc($cli['id_tipodocumento']); ?>

                                                                                                        <?php foreach ($tipo as $tp){ ?>
                                                                                                            <option value="<?=$tp['id_tipodocumento']?>"><?=$tp['descripcion_tipodoc']?></option>
                                                                                                        <?php } ?>
                                                                                                </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                                <label for="inputMessage">N° DE DOCUMENTO: </label>
                                                                                                <input type="text" name="numdoc" class="form-control" value="<?=$cli['numdocumento_cli']?>" required/>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                                <label for="inputMessage">DISTRITO: </label>
                                                                                                <?php $ubig= $clienteDAO->getUbigeoById($cli['id_ubigeo']); ?>

                                                                                                <select name="ubigeo" class="form-control"  required="true">
                                                                                                        <option value="<?=$cli['id_ubigeo']?>" selected=""><?=$ubig['distrito']?> - <?=strtoupper($ubig['provincia'])?></option>

                                                                                                        <?php $listubigeo= $clienteDAO->getFilterUbigeo($cli['id_ubigeo']); ?>

                                                                                                        <?php foreach ($listubigeo as $ub){ ?>
                                                                                                            <option value="<?=$ub['id_ubigeo']?>"><?=$ub['distrito']?> - <?=strtoupper($ub['provincia'])?></option>
                                                                                                        <?php } ?>
                                                                                                </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                                <label for="inputMessage">DIRECCIÓN: </label>
                                                                                                <input type="text" name="direccion" class="form-control" value="<?=$cli['dir_cli']?>" required/>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                                <label for="inputMessage">TELÉFONO: </label>
                                                                                                <input type="text" name="telefono" class="form-control" value="<?=$cli['tel_cli']?>" required/>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-7">
                                                                                        <button type="submit" id="btnEnviarTwo<?=$infprod?>" class="btn btn-danger form-control">EDITAR INFORMACIÓN</button>
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

                                            <?php $ipp++; 
                                                  $chrt++;
                                                    }

                                               } ?>
                                    </tbody> 

                                </table>
                            </div>
            </div>
            
            <div id="resultpedidos">
                
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
								<li><a href="mailto:anderson.fuentes@ieee.org">Contactános</a></li>
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