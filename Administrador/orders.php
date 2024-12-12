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
                                                                        <li><a href="clients.php">Clientes</a></li>
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
            
            <div class="container container-web-page">
                <div class="category-tab shop-details-tab" style="margin: 0; padding: 0" ><!--category-tab-->
                        <div class="col-sm-12">
                                <ul class="nav nav-tabs">

                                        <li id="noentregadoss" class="active"><a href="#noentregados" data-toggle="tab">NO ENTREGADOS</a></li>
                                        <li id="entregadoss"><a href="#entregados" data-toggle="tab">ENTREGADOS</a></li>
                                        <li id="canceladoss"><a href="#cancelados" data-toggle="tab">CANCELADOS</a></li>
                                </ul>
                        </div>
                    
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
                                   width: 80%;
                                }
                             }
                        </style>
                        
                        <div class="tab-content" >

                                <div class="tab-pane fade active in" id="noentregados">
                                    
                                    <?php 
        
                                        $objc= new ConexionBD();
                                        $conex= $objc->getConexionBD();
                                        $records= $conex->prepare("select count(*) as total from tbl_ubigeo UB inner join tbl_ventas V on(UB.id_ubigeo=V.id_ubigeo) inner join tbl_pago P on(V.id_pago=P.id_pago) where (V.status='No entregado') order by V.id_venta");
                                        $records->execute();
                                        //$lista= $stmt->fetch_array();
                                        //$lista= $stmt->fetch_array();
                                        $results= $records->fetch(PDO::FETCH_ASSOC);

                                        $count=$results;

                                        $paginas= $count['total']/5;

                                        round($paginas,0);

                                        $pagfinal= round($paginas,0);


                                    ?>

                                    <?php 

                                            if(isset($_GET["page"])){


                                                $pageact= $_GET['page'];

                                                if($_GET['page']==1){

                                                    $max= 5;

                                                    $min= 0;

                                                }else{
                                                    $max= 5;

                                                    $min= ($pageact-1) * 5;
                                                }

                                                $adminDAO= new ModeloAdmin();

                                                $pedidosNoEntregados= $adminDAO->pedidosNoEntregadosFilter($min, $max);


                                            }elseif(isset($_GET["search"])){

                                                $search= $_GET['search'];

                                                $adminDAO= new ModeloAdmin();

                                                $pedidosNoEntregados= $adminDAO->searchPedidosNoEntregados($search);
                                                ?>

                                                <script>
                                                  $(document).ready(function() {
                                                        $('#pagination').remove();
                                                    });
                                                </script>

                                                <?php

                                            }else{

                                                $adminDAO= new ModeloAdmin();
                                                $pedidosNoEntregados= $adminDAO->pedidosNoEntregadosFilter(0, 5);

                                            }

                                        

                                    ?>
                                    
                                    <div class="container">
                                        
                                        <ul class="pagination" id="pagination" style="padding: 0; margin: 0; background-color: #fafafa;">
                            
                                                <?php if(!empty($_GET['page'])){ ?>

                                                    <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                                    <li class="<?php if($pageact==$i){?> active <?php }?>"><a href="orders.php?page=<?=$i?>"><?=$i?></a></li>

                                                    <?php }?>

                                                <?php }else{?>

                                                    <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                                        <li class="<?php if($i==1){?> active <?php }?>"><a href="orders.php?page=<?=$i?>"><?=$i?></a></li>

                                                    <?php }?>

                                                <?php }?>

                                                <li><a >&raquo;</a></li>
                                        </ul>

                                        <br><br>
                                        
                                        <form action="orders.php" method="get" class="searchform">
                                            <input type="text" name="search" class="form-control" placeholder="Buscar pedido no entregado" style="background-color: #f0eded; color: #000; width: 30%;"/>
                                        </form>
                                        
                                        <br>
                                        
                                        <?php if($pedidosNoEntregados!=null){ ?>
                                        
                                        <div class="table-responsive" style="margin-right: 15px; padding-right: 15px">
                                            <table class="table table-striped table-hover" style="text-align: center;">
                                                <thead class="thead-dark" >
                                                  <tr class="table-primary" style="background-color: #3aa628;">
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">N° DE PEDIDO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">TIPO DE PAGO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">TIPO DE DOC.</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">FECHA DE PEDIDO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">FECHA DE ENTREGA</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">STATUS DE ENTREGA</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">STATUS DE PAGO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">ACCIONES</th>
                                                  </tr>
                                                </thead>

                                                <tbody>
                                                    
                                                    <?php 
                                                    $cc=0;
                                                    foreach ($pedidosNoEntregados as $ped){ ?>
                                                    
                                                    <tr>
                                                            <td class="cart_product" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                <center><div style="background-color: #fad775; border-radius: 5%; height: 40px; width: 70px ; text-align:center; display: table-cell; vertical-align: middle;"><b style="font-size: 15px"><?=$ped['numdocumento']?></b></div></center> 
                                                            </td>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <h5 style="text-transform: uppercase"><?=$ped['detalle_pago']?></h5>
                                                            </td>
                                                            <?php $docventa= $adminDAO->getTipoDocVenta($ped['id_doc']); ?>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <h5 style="text-transform: uppercase"><?=$docventa['documento']?></h5>
                                                            </td>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p><?= date('d-m-Y', strtotime($ped['fecha_pedido'])); ?></p>
                                                            </td>
                                                            <td class="cart_price" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p><?= date('d-m-Y', strtotime($ped['fecha_entrega'])); ?></p>
                                                            </td>
                                                            <td class="cart_total" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p class="cart_total_price"><?= $ped['status'] ?></p>
                                                            </td>
                                                            <td class="cart_total" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p class="cart_total_price"><?= $ped['status_pago'] ?></p>
                                                            </td>
                                                            <td class="cart_delete" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#info<?=$cc?>" style="background-color: #e04646; margin-bottom: 5px;">MÁS INFO</button><br><button data-toggle="modal" data-target="#detalles<?=$cc?>" class="btn btn-info">DETALLES</button>
                                                            </td>
                                                    </tr>
                                                    
                                                    <div class="modal fade " id="info<?=$cc?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-la" role="document"> 
                                                             <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>PEDIDO: N° <?=$ped['numdocumento']?></b></h4>
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: justify;">
                                                                        <div class="row">
                                                                            
                                                                            <script type="text/javascript">
                                                                                $(document).ready(function(){

                                                                                    $("#idFormInfoPedido<?=$cc?>").bind("submit",function(){
                                                                                        // Capturamnos el boton de envío
                                                                                        var btnEnviar = $("#btnEnviarFormPedido<?=$cc?>");
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
                                                                                                swal("Información actualizada del pedido!", "Se recomienda informar por chat al cliente sobre la actualización!", "success");
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
                                                                            
                                                                            <form action="../Controlador/OperationsAdmin.php" method="POST" id="idFormInfoPedido<?=$cc?>">
                                                                                <input type="hidden" class="form-control" name="idventa" value="<?=$ped['id_venta']?>"/>
                                                                                <input type="hidden" class="form-control" name="op" value="3"/>
                                                                                <?php 
                                                                                    $adminDAO= new ModeloAdmin();
                                                                                ?>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">N° DE PEDIDO </label>
                                                                                            <input type="text" class="form-control" id="inputMessage" value="<?=$ped['numdocumento']?>" disabled/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">SOBRE EL CLIENTE:  </label>
                                                                                            <?php $cliente= $adminDAO->getDatosCliente($ped['id_cliente']); ?>
                                                                                            <input type="text" class="form-control" value="NOMBRES:  <?=$cliente['nom_cli']?> <?=$cliente['ape_cli']?>" disabled/>
                                                                                             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/css/prettyPhoto.min.css" integrity="sha512-aB3UdGCt+QZdSlPCgDsJBJ+JytRb8oq/cdMEpLTaypINSyom0h5vcw2HsF1m0eZtWsetJllPtQOfCPM9UrdKYw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

                                                                                            <!-- jQuery Library (skip this step if already called on page ) -->
                                                                                            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> <!-- (do not call twice) -->

                                                                                            <!-- DC LightBox JS -->
                                                                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/css/prettyPhoto.min.css" integrity="sha512-aB3UdGCt+QZdSlPCgDsJBJ+JytRb8oq/cdMEpLTaypINSyom0h5vcw2HsF1m0eZtWsetJllPtQOfCPM9UrdKYw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                                                                                              <script type="text/javascript">
                                                                                                $(function(){
                                                                                                    $("a[rel^='prettyPhoto<?=$cc?>']").prettyPhoto({
                                                                                                        theme:'pp_default',
                                                                                                        social_tools: false,
                                                                                                        deeplinking:false,
                                                                                                        overlay_gallery: false
                                                                                                    });
                                                                                                });
                                                                                                </script>
                                                                                                <a class="btn btn-primary" style="width: 100%" href="../Controlador/ReportePerfil.php?idcliente=<?=$ped['id_cliente']?>&iframe=true&width=100%&height=100%" rel="prettyPhoto<?=$cc?>[iframes]">Visualizar datos del cliente </a>
                                                                                                
                                                                                    </div>
                                                                                    <script type="text/javascript">
                                                                                        function mostrar<?=$cc?>(id) {
                                                                                            if (id == "2") {
                                                                                                $("#contentruc<?=$cc?>").show();
                                                                                                $('#camporuc<?=$cc?>').prop("required", true);
                                                                                            }

                                                                                            if (id== "1"){
                                                                                                $("#contentruc<?=$cc?>").hide();
                                                                                                $('#camporuc<?=$cc?>').removeAttr("required");
                                                                                            }

                                                                                            if (id== "3"){
                                                                                                $("#contentruc<?=$cc?>").hide();
                                                                                                $('#camporuc<?=$cc?>').removeAttr("required");
                                                                                            }
                                                                                        }
                                                                                    </script>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">TIPO DE DOCUMENTO DE VENTA: </label>
                                                                                            <select name="iddoc" class="form-control"  required="true" onChange="mostrar<?=$cc?>(this.value);">
                                                                                                    <option value="<?=$ped['id_doc']?>" selected=""><?=$docventa['documento']?></option>
                                                                                                    <?php $tipodocs= $adminDAO->getTipodocFilter($ped['id_doc']); ?>
                                                                                                    
                                                                                                    <?php foreach ($tipodocs as $tpdocs){ ?>
                                                                                                    <option value="<?=$tpdocs['id_doc']?>"><?=$tpdocs['documento']?></option>
                                                                                                    <?php }?>
                                                                                                    
                                                                                            </select>
                                                                                    </div>
                                                                                    
                                                                                    <?php if($ped['id_doc']==2){ ?>
                                                                                    
                                                                                        <div class="form-group">
                                                                                            <input type="text" class="form-control" value="RUC: <?=$ped['numempresa']?>" disabled>
                                                                                            <input type="hidden" class="form-control" name="rucactual" value="<?=$ped['numempresa']?>">
                                                                                        </div>
                                                                                    
                                                                                    <?php } ?>
                                                                                    
                                                                                    <div class="form-group" id="contentruc<?=$cc?>" style="display: none">
                                                                                        <input type="text" class="form-control" id="camporuc<?=$cc?>" placeholder="Ingrese el RUC" name="ruc">
                                                                                    </div>
                                                                                    
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">TIPO DE PAGO: </label>
                                                                                            <select name="idpago" class="form-control"  required="true">
                                                                                                    <option value="<?=$ped['id_pago']?>"><?=$ped['detalle_pago']?></option>
                                                                                                    <?php $tipospago= $adminDAO->getPagoFilter($ped['id_pago']); ?>
                                                                                                    
                                                                                                    <?php foreach ($tipospago as $tppg){ ?>
                                                                                                    <option value="<?=$tppg['id_pago']?>"><?=$tppg['detalle_pago']?></option>
                                                                                                    <?php }?>
                                                                                                    
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">DISTRITO DE DESTINO DE PEDIDO: </label>
                                                                                            <select name="idubigeo" class="form-control" required="true">
                                                                                                <option value="<?=$ped['id_ubigeo']?>" selected=""><?=$ped['distrito']?> - <?= strtoupper($ped['provincia'])?></option>     
                                                                                                    
                                                                                                    <?php $ubgs= $adminDAO->getFilterUbigeo($ped['id_ubigeo']); ?>
                                                                                                    
                                                                                                    <?php foreach ($ubgs as $ubg){ ?>
                                                                                                        <option value="<?=$ubg['id_ubigeo']?>"><?=$ubg['distrito']?> - <?= strtoupper($ubg['provincia'])?></option>
                                                                                                    <?php }?>
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="inputMessage">DIRECCIÓN DE ENTREGA: </label>
                                                                                        <input type="text" class="form-control" name="direccion" value="<?=$ped['direccion_entrega']?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">FECHA Y HORA DE PEDIDO:</label>
                                                                                            <input type="date" class="form-control" value="<?=date('Y-m-d', strtotime($ped['fecha_pedido']));?>" disabled/>
                                                                                            <br>
                                                                                            <input type="text" class="form-control" value="<?=date('H:i:s A', strtotime($ped['fecha_pedido']));?>" disabled/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">FECHA DE ENTREGA: </label>
                                                                                            <input type="date" class="form-control" name="fechaentrega" value="<?=$ped['fecha_entrega']?>" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">STATUS DE ENTREGA: </label>
                                                                                            <select name="statusentrega" class="form-control" required="true">
                                                                                                <option value="<?=$ped['status']?>" selected=""><?=$ped['status']?></option>     
                                                                                                <option value="Entregado">Entregado</option>
                                                                                                <option value="No entregado">No entregado</option>
                                                                                                <option value="Cancelado">Cancelado</option>
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">STATUS DE PAGO: </label>
                                                                                            <select name="statuspago" class="form-control" required="true">
                                                                                                <option value="<?=$ped['status_pago']?>" selected=""><?=$ped['status_pago']?></option>     
                                                                                                <option value="Pagado">Pagado</option>
                                                                                                <option value="No verificado">No verificado</option>
                                                                                                <option value="Programado">Programado</option>
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">NOTAS DEL CLIENTE </label>
                                                                                            <textarea type="text" name="nota" class="form-control" disabled><?=$ped['nota']?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <button type="submit" id="btnEnviarFormPedido<?=$cc?>" class="btn btn-danger form-control">EDITAR INFORMACIÓN DE VENTA</button>
                                                                                </div>
                                                                            </form>
                                                                            
                                                                            <div class="col-md-6">
                                                                                <form action="../Controlador/ReporteVentas.php" method="POST">
                                                                                    <input type="hidden" name="tipodoc" value="<?=$ped['id_doc']?>">
                                                                                    <input type="hidden" name="idventa" value="<?=$ped['id_venta']?>">
                                                                                    <input type="hidden" name="idcliente" value="<?=$ped['id_cliente']?>">
                                                                                    <p>Puedes dar clic para generar el documento de venta</p>
                                                                                    <button type="submit" class="form-control btn btn-success">OBTENER DOCUMENTO</button>
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
                                                    
                                                    <?php $cc++; } ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <?php 
                                        $ccc=0;
                                        foreach ($pedidosNoEntregados as $pdnt){ ?>
                                        
                                            <?php $adminDAO2= new ModeloAdmin(); ?>
                                        
                                            <div class="modal fade " id="detalles<?=$ccc?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lj" role="document"> 
                                                     <div class="modal-content">
                                                            <div class="modal-header">
                                                            <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>DETALLES DEL PEDIDO N° <?= $pdnt['numdocumento'] ?> </b></h4>
                                                            </div>
                                                            <div class="modal-body" style="text-align: justify;">
                                                                <div class="container table-responsive">
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
                                                                                    <?php $detalles= $adminDAO2->getDetallesVenta($pdnt['id_venta']); ?>
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
                                                                                                <?php $total= $adminDAO2->getTotalVentas($pdnt['id_venta']); ?>
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
                                        
                                        
                                        <?php 
                                        $ccc++;
                                        }?>
                                        
                                        <?php }?>
                                        
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="entregados" >
                                    
                                    <?php 
        
                                        $objc2= new ConexionBD();
                                        $conex2= $objc2->getConexionBD();
                                        $records2= $conex2->prepare("select count(*) as total from tbl_ubigeo UB inner join tbl_ventas V on(UB.id_ubigeo=V.id_ubigeo) inner join tbl_pago P on(V.id_pago=P.id_pago) where (V.status='Entregado') order by V.id_venta");
                                        $records2->execute();
                                        //$lista= $stmt->fetch_array();
                                        //$lista= $stmt->fetch_array();
                                        $results2= $records2->fetch(PDO::FETCH_ASSOC);

                                        $count2=$results2;

                                        $paginas2= $count2['total']/5;

                                        round($paginas2,0);

                                        $pagfinal2= round($paginas2,0);


                                    ?>

                                    <?php 

                                         
                                            if(isset($_GET["pagetwo"])){


                                                $pageact2= $_GET['pagetwo'];

                                                if($_GET['pagetwo']==1){

                                                    $max= 5;

                                                    $min= 0;

                                                }else{
                                                    $max= 5;

                                                    $min= ($pageact2-1) * 5;
                                                }

                                                $adminDAO= new ModeloAdmin();

                                                $pedidosEntregados= $adminDAO->pedidosEntregadosFilter($min, $max);
                                                
                                                ?>

                                                <script type="text/javascript">
                                                     $("#entregadoss").addClass("active");
                                                     $("#entregados").addClass("active in");
                                                     $("#noentregadoss").removeClass("active");
                                                     $("#noentregados").removeClass("active in");
                                                </script>

                                                <?php


                                            }elseif(isset($_GET["searchtwo"])){

                                                $search2= $_GET['searchtwo'];

                                                $adminDAO= new ModeloAdmin();

                                                $pedidosEntregados= $adminDAO->searchPedidosEntregados($search2);
                                                ?>

                                                <script>
                                                  $(document).ready(function() {
                                                        $('#pagination2').remove();
                                                        $("#entregadoss").addClass("active");
                                                        $("#entregados").addClass("active in");
                                                        $("#noentregadoss").removeClass("active");
                                                        $("#noentregados").removeClass("active in");
                                                    });
                                                </script>

                                                <?php

                                            }else{

                                                $adminDAO= new ModeloAdmin();
                                                $pedidosEntregados= $adminDAO->pedidosEntregadosFilter(0, 5);

                                            }

                                        

                                    ?>
                                        <div class="container">
                                        
                                        <ul class="pagination" id="pagination2" style="padding: 0; margin: 0; background-color: #fafafa;">
                            
                                                <?php if(!empty($_GET['pagetwo'])){ ?>

                                                    <?php for ($i=1; $i<= round($paginas2,0); $i++){ ?>
                                                    <li class="<?php if($pageact2==$i){?> active <?php }?>"><a href="orders.php?pagetwo=<?=$i?>"><?=$i?></a></li>

                                                    <?php }?>

                                                <?php }else{?>

                                                    <?php for ($i=1; $i<= round($paginas2,0); $i++){ ?>
                                                        <li class="<?php if($i==1){?> active <?php }?>"><a href="orders.php?pagetwo=<?=$i?>"><?=$i?></a></li>

                                                    <?php }?>

                                                <?php }?>

                                                <li><a >&raquo;</a></li>
                                        </ul>

                                        <br><br>
                                        
                                        <form action="orders.php" method="get" class="searchform">
                                            <input type="text" name="searchtwo" class="form-control" placeholder="Buscar pedido entregado" style="background-color: #f0eded; color: #000; width: 30%;"/>
                                        </form>
                                        
                                        <br>
                                        
                                        <?php if($pedidosEntregados!=null){ ?>
                                        
                                        <div class="table-responsive" style="margin-right: 15px; padding-right: 15px">
                                            <table class="table table-striped table-hover" style="text-align: center;">
                                                <thead class="thead-dark" >
                                                  <tr class="table-primary" style="background-color: #053fa3;">
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">N° DE PEDIDO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">TIPO DE PAGO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">TIPO DE DOC.</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">FECHA DE PEDIDO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">FECHA DE ENTREGA</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">STATUS DE ENTREGA</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">STATUS DE PAGO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">ACCIONES</th>
                                                  </tr>
                                                </thead>

                                                <tbody>
                                                    
                                                    <?php 
                                                    $cc=0;
                                                    foreach ($pedidosEntregados as $ped){ ?>
                                                    
                                                    <tr>
                                                            <td class="cart_product" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                <center><div style="background-color: #fad775; border-radius: 5%; height: 40px; width: 70px ; text-align:center; display: table-cell; vertical-align: middle;"><b style="font-size: 15px"><?=$ped['numdocumento']?></b></div></center> 
                                                            </td>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <h5 style="text-transform: uppercase"><?=$ped['detalle_pago']?></h5>
                                                            </td>
                                                            <?php $docventa= $adminDAO->getTipoDocVenta($ped['id_doc']); ?>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <h5 style="text-transform: uppercase"><?=$docventa['documento']?></h5>
                                                            </td>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p><?= date('d-m-Y', strtotime($ped['fecha_pedido'])); ?></p>
                                                            </td>
                                                            <td class="cart_price" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p><?= date('d-m-Y', strtotime($ped['fecha_entrega'])); ?></p>
                                                            </td>
                                                            <td class="cart_total" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p class="cart_total_price"><?= $ped['status'] ?></p>
                                                            </td>
                                                            <td class="cart_total" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p class="cart_total_price"><?= $ped['status_pago'] ?></p>
                                                            </td>
                                                            <td class="cart_delete" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#info2<?=$cc?>" style="background-color: #e04646; margin-bottom: 5px;">MÁS INFO</button><br><button data-toggle="modal" data-target="#detalles2<?=$cc?>" class="btn btn-info">DETALLES</button>
                                                            </td>
                                                    </tr>
                                                    
                                                    <div class="modal fade " id="info2<?=$cc?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-la" role="document"> 
                                                             <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>PEDIDO: N° <?=$ped['numdocumento']?></b></h4>
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: justify;">
                                                                        <div class="row">
                                                                            
                                                                            <script type="text/javascript">
                                                                                $(document).ready(function(){

                                                                                    $("#idFormInfoPedidoE<?=$cc?>").bind("submit",function(){
                                                                                        // Capturamnos el boton de envío
                                                                                        var btnEnviar = $("#btnEnviarFormPedidoE<?=$cc?>");
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
                                                                                                swal("Información actualizada del pedido!", "Se recomienda informar por chat al cliente sobre la actualización!", "success");
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
                                                                            
                                                                            <form action="../Controlador/OperationsAdmin.php" method="POST" id="idFormInfoPedidoE<?=$cc?>">
                                                                                <input type="hidden" class="form-control" name="idventa" value="<?=$ped['id_venta']?>"/>
                                                                                <input type="hidden" class="form-control" name="op" value="3"/>
                                                                                <?php 
                                                                                    $adminDAO= new ModeloAdmin();
                                                                                ?>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">N° DE PEDIDO </label>
                                                                                            <input type="text" class="form-control" id="inputMessage" value="<?=$ped['numdocumento']?>" disabled/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">SOBRE EL CLIENTE:  </label>
                                                                                            <?php $cliente= $adminDAO->getDatosCliente($ped['id_cliente']); ?>
                                                                                            <input type="text" class="form-control" value="NOMBRES:  <?=$cliente['nom_cli']?> <?=$cliente['ape_cli']?>" disabled/>
                                                                                             <link rel="stylesheet" type="text/css" href="dreamcodes/prettyPhoto/css/prettyPhoto.css" />
 
                                                                                                <!-- jQuery Library (skip this step if already called on page ) -->
                                                                                                <script type="text/javascript" src="dreamcodes/jquery.min.js"></script> <!-- (do not call twice) -->

                                                                                                <!-- DC LightBox JS -->
                                                                                                <script type="text/javascript" src="dreamcodes/prettyPhoto/js/jquery.prettyPhoto.js"></script>
                                                                                              <script type="text/javascript">
                                                                                                $(function(){
                                                                                                    $("a[rel^='prettyPhoto<?=$cc?>']").prettyPhoto({
                                                                                                        theme:'pp_default',
                                                                                                        social_tools: false,
                                                                                                        deeplinking:false,
                                                                                                        overlay_gallery: false
                                                                                                    });
                                                                                                });
                                                                                                </script>
                                                                                                <a class="btn btn-primary" style="width: 100%" href="../Controlador/ReportePerfil.php?idcliente=<?=$ped['id_cliente']?>&iframe=true&width=100%&height=100%" rel="prettyPhoto<?=$cc?>[iframes]">Visualizar datos del cliente </a>
                                                                                                
                                                                                    </div>
                                                                                    <script type="text/javascript">
                                                                                        function mostrar<?=$cc?>(id) {
                                                                                            if (id == "2") {
                                                                                                $("#contentruc<?=$cc?>").show();
                                                                                                $('#camporuc<?=$cc?>').prop("required", true);
                                                                                            }

                                                                                            if (id== "1"){
                                                                                                $("#contentruc<?=$cc?>").hide();
                                                                                                $('#camporuc<?=$cc?>').removeAttr("required");
                                                                                            }

                                                                                            if (id== "3"){
                                                                                                $("#contentruc<?=$cc?>").hide();
                                                                                                $('#camporuc<?=$cc?>').removeAttr("required");
                                                                                            }
                                                                                        }
                                                                                    </script>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">TIPO DE DOCUMENTO DE VENTA: </label>
                                                                                            <select name="iddoc" class="form-control"  required="true" onChange="mostrar<?=$cc?>(this.value);">
                                                                                                    <option value="<?=$ped['id_doc']?>" selected=""><?=$docventa['documento']?></option>
                                                                                                    <?php $tipodocs= $adminDAO->getTipodocFilter($ped['id_doc']); ?>
                                                                                                    
                                                                                                    <?php foreach ($tipodocs as $tpdocs){ ?>
                                                                                                    <option value="<?=$tpdocs['id_doc']?>"><?=$tpdocs['documento']?></option>
                                                                                                    <?php }?>
                                                                                                    
                                                                                            </select>
                                                                                    </div>
                                                                                    
                                                                                    <?php if($ped['id_doc']==2){ ?>
                                                                                    
                                                                                        <div class="form-group">
                                                                                            <input type="text" class="form-control" value="RUC: <?=$ped['numempresa']?>" disabled>
                                                                                            <input type="hidden" class="form-control" name="rucactual" value="<?=$ped['numempresa']?>">
                                                                                        </div>
                                                                                    
                                                                                    <?php } ?>
                                                                                    
                                                                                    <div class="form-group" id="contentruc<?=$cc?>" style="display: none">
                                                                                        <input type="text" class="form-control" id="camporuc<?=$cc?>" placeholder="Ingrese el RUC" name="ruc">
                                                                                    </div>
                                                                                    
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">TIPO DE PAGO: </label>
                                                                                            <select name="idpago" class="form-control"  required="true">
                                                                                                    <option value="<?=$ped['id_pago']?>"><?=$ped['detalle_pago']?></option>
                                                                                                    <?php $tipospago= $adminDAO->getPagoFilter($ped['id_pago']); ?>
                                                                                                    
                                                                                                    <?php foreach ($tipospago as $tppg){ ?>
                                                                                                    <option value="<?=$tppg['id_pago']?>"><?=$tppg['detalle_pago']?></option>
                                                                                                    <?php }?>
                                                                                                    
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">DISTRITO DE DESTINO DE PEDIDO: </label>
                                                                                            <select name="idubigeo" class="form-control" required="true">
                                                                                                <option value="<?=$ped['id_ubigeo']?>" selected=""><?=$ped['distrito']?> - <?= strtoupper($ped['provincia'])?></option>     
                                                                                                    
                                                                                                    <?php $ubgs= $adminDAO->getFilterUbigeo($ped['id_ubigeo']); ?>
                                                                                                    
                                                                                                    <?php foreach ($ubgs as $ubg){ ?>
                                                                                                        <option value="<?=$ubg['id_ubigeo']?>"><?=$ubg['distrito']?> - <?= strtoupper($ubg['provincia'])?></option>
                                                                                                    <?php }?>
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="inputMessage">DIRECCIÓN DE ENTREGA: </label>
                                                                                        <input type="text" class="form-control" name="direccion" value="<?=$ped['direccion_entrega']?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">FECHA Y HORA DE PEDIDO:</label>
                                                                                            <input type="date" class="form-control" value="<?=date('Y-m-d', strtotime($ped['fecha_pedido']));?>" disabled/>
                                                                                            <br>
                                                                                            <input type="text" class="form-control" value="<?=date('H:i:s A', strtotime($ped['fecha_pedido']));?>" disabled/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">FECHA DE ENTREGA: </label>
                                                                                            <input type="date" class="form-control" name="fechaentrega" value="<?=$ped['fecha_entrega']?>" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">STATUS DE ENTREGA: </label>
                                                                                            <select name="statusentrega" class="form-control" required="true">
                                                                                                <option value="<?=$ped['status']?>" selected=""><?=$ped['status']?></option>     
                                                                                                <option value="Entregado">Entregado</option>
                                                                                                <option value="No entregado">No entregado</option>
                                                                                                <option value="Cancelado">Cancelado</option>
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">STATUS DE PAGO: </label>
                                                                                            <select name="statuspago" class="form-control" required="true">
                                                                                                <option value="<?=$ped['status_pago']?>" selected=""><?=$ped['status_pago']?></option>     
                                                                                                <option value="Pagado">Pagado</option>
                                                                                                <option value="No verificado">No verificado</option>
                                                                                                <option value="Programado">Programado</option>
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">NOTAS DEL CLIENTE </label>
                                                                                            <textarea type="text" name="nota" class="form-control" disabled><?=$ped['nota']?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <button type="submit" id="btnEnviarFormPedidoE<?=$cc?>" class="btn btn-danger form-control">EDITAR INFORMACIÓN DE VENTA</button>
                                                                                </div>
                                                                            </form>
                                                                            
                                                                            <div class="col-md-6">
                                                                                <form action="../Controlador/ReporteVentas.php" method="POST">
                                                                                    <input type="hidden" name="tipodoc" value="<?=$ped['id_doc']?>">
                                                                                    <input type="hidden" name="idventa" value="<?=$ped['id_venta']?>">
                                                                                    <input type="hidden" name="idcliente" value="<?=$ped['id_cliente']?>">
                                                                                    <p>Puedes dar clic para generar el documento de venta</p>
                                                                                    <button type="submit" class="form-control btn btn-success">OBTENER DOCUMENTO</button>
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
                                                    
                                                    <?php $cc++; } ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <?php 
                                        $ccc=0;
                                        foreach ($pedidosEntregados as $pdnt){ ?>
                                        
                                            <?php $adminDAO2= new ModeloAdmin(); ?>
                                        
                                            <div class="modal fade " id="detalles2<?=$ccc?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lj" role="document"> 
                                                     <div class="modal-content">
                                                            <div class="modal-header">
                                                            <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>DETALLES DEL PEDIDO N° <?= $pdnt['numdocumento'] ?> </b></h4>
                                                            </div>
                                                            <div class="modal-body" style="text-align: justify;">
                                                                <div class="container table-responsive">
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
                                                                                    <?php $detalles= $adminDAO2->getDetallesVenta($pdnt['id_venta']); ?>
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
                                                                                                <?php $total= $adminDAO2->getTotalVentas($pdnt['id_venta']); ?>
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
                                        
                                        
                                        <?php 
                                        $ccc++;
                                        }?>
                                        
                                        <?php }?>
                                        
                                    </div>
                                </div>
                            
                                <div class="tab-pane fade " id="cancelados" >
                                        
                                    <?php 
        
                                        $objc2= new ConexionBD();
                                        $conex2= $objc2->getConexionBD();
                                        $records2= $conex2->prepare("select count(*) as total from tbl_ubigeo UB inner join tbl_ventas V on(UB.id_ubigeo=V.id_ubigeo) inner join tbl_pago P on(V.id_pago=P.id_pago) where (V.status='Entregado') order by V.id_venta");
                                        $records2->execute();
                                        //$lista= $stmt->fetch_array();
                                        //$lista= $stmt->fetch_array();
                                        $results2= $records2->fetch(PDO::FETCH_ASSOC);

                                        $count2=$results2;

                                        $paginas2= $count2['total']/5;

                                        round($paginas2,0);

                                        $pagfinal2= round($paginas2,0);


                                    ?>

                                    <?php 

                                         
                                            if(isset($_GET["searchthree"])){

                                                $search3= $_GET['searchthree'];

                                                $adminDAO= new ModeloAdmin();

                                                $pedidosCancelados= $adminDAO->searchPedidosCancelados($search3);
                                                ?>

                                                <script>
                                                  $(document).ready(function() {
                                                        $("#canceladoss").addClass("active");
                                                        $("#cancelados").addClass("active in");
                                                        $("#noentregadoss").removeClass("active");
                                                        $("#noentregados").removeClass("active in");
                                                    });
                                                </script>

                                                <?php

                                            }else{

                                                $adminDAO= new ModeloAdmin();
                                                $pedidosCancelados= $adminDAO->pedidosCanceladosFilter(0, 5);

                                            }

                                    ?>
                                        <div class="container">
                                        
                                        <form action="orders.php" method="get" class="searchform">
                                            <input type="text" name="searchthree" class="form-control" placeholder="Buscar pedido cancelado" style="background-color: #f0eded; color: #000; width: 30%;"/>
                                        </form>
                                        
                                        <br>
                                        
                                        <?php if($pedidosCancelados!=null){ ?>
                                        
                                        <div class="table-responsive" style="margin-right: 15px; padding-right: 15px">
                                            <table class="table table-striped table-hover" style="text-align: center;">
                                                <thead class="thead-dark" >
                                                  <tr class="table-primary" style="background-color: #db2504;">
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">N° DE PEDIDO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">TIPO DE PAGO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">TIPO DE DOC.</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">FECHA DE PEDIDO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">FECHA DE ENTREGA</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">STATUS DE ENTREGA</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">STATUS DE PAGO</th>
                                                    <th style="text-align: center; display: table-cell; vertical-align: middle; color: #fff; font-weight: 400" scope="col">ACCIONES</th>
                                                  </tr>
                                                </thead>

                                                <tbody>
                                                    
                                                    <?php 
                                                    $cc=0;
                                                    foreach ($pedidosCancelados as $ped){ ?>
                                                    
                                                    <tr>
                                                            <td class="cart_product" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                <center><div style="background-color: #fad775; border-radius: 5%; height: 40px; width: 70px ; text-align:center; display: table-cell; vertical-align: middle;"><b style="font-size: 15px"><?=$ped['numdocumento']?></b></div></center> 
                                                            </td>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <h5 style="text-transform: uppercase"><?=$ped['detalle_pago']?></h5>
                                                            </td>
                                                            <?php $docventa= $adminDAO->getTipoDocVenta($ped['id_doc']); ?>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <h5 style="text-transform: uppercase"><?=$docventa['documento']?></h5>
                                                            </td>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p><?= date('d-m-Y', strtotime($ped['fecha_pedido'])); ?></p>
                                                            </td>
                                                            <td class="cart_price" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p><?= date('d-m-Y', strtotime($ped['fecha_entrega'])); ?></p>
                                                            </td>
                                                            <td class="cart_total" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p class="cart_total_price"><?= $ped['status'] ?></p>
                                                            </td>
                                                            <td class="cart_total" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p class="cart_total_price"><?= $ped['status_pago'] ?></p>
                                                            </td>
                                                            <td class="cart_delete" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#info3<?=$cc?>" style="background-color: #e04646; margin-bottom: 5px;">MÁS INFO</button><br><button data-toggle="modal" data-target="#detalles3<?=$cc?>" class="btn btn-info">DETALLES</button>
                                                            </td>
                                                    </tr>
                                                    
                                                    <div class="modal fade " id="info3<?=$cc?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-la" role="document"> 
                                                             <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>PEDIDO: N° <?=$ped['numdocumento']?></b></h4>
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: justify;">
                                                                        <div class="row">
                                                                            
                                                                            <form method="POST">
                                                                                <input type="hidden" class="form-control" name="idventa" value="<?=$ped['id_venta']?>"/>
                                                                                <input type="hidden" class="form-control" name="op" value="3"/>
                                                                                <?php 
                                                                                    $adminDAO= new ModeloAdmin();
                                                                                ?>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">N° DE PEDIDO </label>
                                                                                            <input type="text" class="form-control" id="inputMessage" value="<?=$ped['numdocumento']?>" disabled/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">SOBRE EL CLIENTE:  </label>
                                                                                            <?php $cliente= $adminDAO->getDatosCliente($ped['id_cliente']); ?>
                                                                                            <input type="text" class="form-control" value="NOMBRES:  <?=$cliente['nom_cli']?> <?=$cliente['ape_cli']?>" disabled/>
                                                                                             <link rel="stylesheet" type="text/css" href="dreamcodes/prettyPhoto/css/prettyPhoto.css" />
 
                                                                                                <!-- jQuery Library (skip this step if already called on page ) -->
                                                                                                <script type="text/javascript" src="dreamcodes/jquery.min.js"></script> <!-- (do not call twice) -->

                                                                                                <!-- DC LightBox JS -->
                                                                                                <script type="text/javascript" src="dreamcodes/prettyPhoto/js/jquery.prettyPhoto.js"></script>
                                                                                              <script type="text/javascript">
                                                                                                $(function(){
                                                                                                    $("a[rel^='prettyPhoto<?=$cc?>']").prettyPhoto({
                                                                                                        theme:'pp_default',
                                                                                                        social_tools: false,
                                                                                                        deeplinking:false,
                                                                                                        modal: false,
                                                                                                        showTitle: false,
                                                                                                        overlay_gallery: false
                                                                                                    });
                                                                                                });
                                                                                                </script>
                                                                                                <a class="btn btn-primary" style="width: 100%" href="../Controlador/ReportePerfil.php?idcliente=<?=$ped['id_cliente']?>&iframe=true&width=100%&height=100%" rel="prettyPhoto<?=$cc?>[iframes]">Visualizar datos del cliente </a>
                                                                                                
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">TIPO DE DOCUMENTO DE VENTA: </label>
                                                                                            <select name="iddoc" class="form-control"  disabled>
                                                                                                    <option value="<?=$ped['id_doc']?>" selected=""><?=$docventa['documento']?></option>
                                                                                            </select>
                                                                                    </div>
                                                                                    
                                                                                    <?php if($ped['id_doc']==2){ ?>
                                                                                    
                                                                                        <div class="form-group">
                                                                                            <input type="text" class="form-control" value="RUC: <?=$ped['numempresa']?>" disabled>
                                                                                            <input type="hidden" class="form-control" name="rucactual" value="<?=$ped['numempresa']?>" disabled>
                                                                                        </div>
                                                                                    
                                                                                    <?php } ?>
                                                                                    
                                                                                    
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">TIPO DE PAGO: </label>
                                                                                            <select name="idpago" class="form-control"  disabled>
                                                                                                    <option value="<?=$ped['id_pago']?>"><?=$ped['detalle_pago']?></option>
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">DISTRITO DE DESTINO DE PEDIDO: </label>
                                                                                            <select name="idubigeo" class="form-control" disabled>
                                                                                                <option value="<?=$ped['id_ubigeo']?>" selected=""><?=$ped['distrito']?> - <?= strtoupper($ped['provincia'])?></option>                                         
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="inputMessage">DIRECCIÓN DE ENTREGA: </label>
                                                                                        <input type="text" class="form-control" name="direccion" value="<?=$ped['direccion_entrega']?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">FECHA Y HORA DE PEDIDO:</label>
                                                                                            <input type="date" class="form-control" value="<?=date('Y-m-d', strtotime($ped['fecha_pedido']));?>" disabled/>
                                                                                            <br>
                                                                                            <input type="text" class="form-control" value="<?=date('H:i:s A', strtotime($ped['fecha_pedido']));?>" disabled/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">FECHA DE ENTREGA: </label>
                                                                                            <input type="date" class="form-control" name="fechaentrega" value="<?=$ped['fecha_entrega']?>" disabled/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">STATUS DE ENTREGA: </label>
                                                                                            <select name="statusentrega" class="form-control" disabled>
                                                                                                <option value="<?=$ped['status']?>" selected=""><?=$ped['status']?></option>
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">STATUS DE PAGO: </label>
                                                                                            <select name="statuspago" class="form-control" disabled>
                                                                                                <option value="<?=$ped['status_pago']?>" selected=""><?=$ped['status_pago']?></option>
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">NOTAS DEL CLIENTE </label>
                                                                                            <textarea type="text" name="nota" class="form-control" disabled><?=$ped['nota']?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                            
                                                                            <div class="col-md-6">
                                                                                <form action="../Controlador/ReporteVentas.php" method="POST">
                                                                                    <input type="hidden" name="tipodoc" value="<?=$ped['id_doc']?>">
                                                                                    <input type="hidden" name="idventa" value="<?=$ped['id_venta']?>">
                                                                                    <input type="hidden" name="idcliente" value="<?=$ped['id_cliente']?>">
                                                                                    <p>Puedes dar clic para generar el documento de venta</p>
                                                                                    <button type="submit" class="form-control btn btn-success">OBTENER DOCUMENTO</button>
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
                                                    
                                                    <?php $cc++; } ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <?php 
                                        $ccc=0;
                                        foreach ($pedidosCancelados as $pdnt){ ?>
                                        
                                            <?php $adminDAO2= new ModeloAdmin(); ?>
                                        
                                            <div class="modal fade " id="detalles3<?=$ccc?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lj" role="document"> 
                                                     <div class="modal-content">
                                                            <div class="modal-header">
                                                            <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>DETALLES DEL PEDIDO N° <?= $pdnt['numdocumento'] ?> </b></h4>
                                                            </div>
                                                            <div class="modal-body" style="text-align: justify;">
                                                                <div class="container table-responsive">
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
                                                                                    <?php $detalles= $adminDAO2->getDetallesVenta($pdnt['id_venta']); ?>
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
                                                                                                <?php $total= $adminDAO2->getTotalVentas($pdnt['id_venta']); ?>
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
                                        
                                        
                                        <?php 
                                        $ccc++;
                                        }?>
                                        
                                        <?php }?>
                                        
                                    </div>
                                        
                                </div>

                        </div>
                </div><!--/category-tab-->
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