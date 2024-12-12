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
                $adminDAOO= new ModeloAdmin();

                $finaladmin= $usuarioDAO->getUsuario($usuario1, $pass1);

        ?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="tel:956-393-447""><i class="fa fa-phone"></i> +51 972 487 645</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>LOGICLAYER</a></li>
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
                                                                <li><a href="../Administrador/" class="active">Principal</a></li>
								<li class="dropdown"><a>Tienda<i class="fa fa-angle-down"></i></a>
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
						<div class="">
                                                    <form action="index.php" method="get">
                                                        <div class=" rounded">
                                                           <input type="text" class="form-control rounded" placeholder="Buscar producto" name="search"
                                                                  aria-describedby="search-addon" style="width: 100%" required=""/>
                                                           <span class="" id="search-addon">
                                                             <button type="submit" class="btn btn-primary" style="float: next; margin-top: -57px; margin-left: 225px; ">
                                                                 <i class="fas fa-search"></i>
                                                             </button>
                                                           </span>
                                                         </div>   
                                                   </form>
						</div>
					</div>
				</div>
				</div>
			</div>
	</header>
	
	<section id="advertisement">
            
                <?php 
        
                    $objc= new ConexionBD();
                    $conex= $objc->getConexionBD();
                    $records= $conex->prepare("select count(*) as total from tbl_producto;");
                    $records->execute();
                    //$lista= $stmt->fetch_array();
                    //$lista= $stmt->fetch_array();
                    $results= $records->fetch(PDO::FETCH_ASSOC);

                    $count=$results;

                    $paginas= $count['total']/20;

                    round($paginas,0);

                    $pagfinal= round($paginas,0);


                ?>
            
                <?php 
                
                     if(!empty($_GET)){
                
                        if(isset($_GET["page"])){


                            $pageact= $_GET['page'];

                            if($_GET['page']==1){

                                $max= $pageact*20+1;

                                $min= $max - 20;

                            }else{
                                $max= $pageact*20;

                                $min= $max - 20;
                            }

                            $adminDAO= new ModeloAdmin();

                            $products= $adminDAO->getProductsFilters($min, $max);


                        }elseif(isset($_GET["category"])){

                            $category= $_GET['category'];

                            $adminDAO= new ModeloAdmin();

                            $products= $adminDAO->getProductsFiltersCategory($category);

                            ?>

                            <script>
                              $(document).ready(function() {
                                    $('#pagination').remove();
                                    $('#pagination2').remove();
                                    $('#resultcategory').show();
                                });
                            </script>

                            <?php


                        }elseif(isset($_GET["brand"])){

                            $brand= $_GET['brand'];

                            $adminDAO= new ModeloAdmin();

                            $products= $adminDAO->getProductsFiltersBrand($brand);

                            ?>

                            <script>
                              $(document).ready(function() {
                                    $('#pagination').remove();
                                    $('#pagination2').remove();
                                    $('#resultbrand').show();
                                });
                            </script>

                            <?php

                        }elseif(isset($_GET["search"])){

                            $search= $_GET['search'];

                            $adminDAO= new ModeloAdmin();

                            $products= $adminDAO->getResultSearch($search);
                            ?>

                            <script>
                              $(document).ready(function() {
                                    $('#pagination').remove();
                                    $('#pagination2').remove();
                                    $('#resultword').show();
                                });
                            </script>

                            <?php

                        }

                    }else{

                        $adminDAO= new ModeloAdmin();
                        $products= $adminDAO->getProductsFilters(1, 20);

                    }
                
                ?>
                         
                
                <div class="container container-web-page">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center card-box">
                                <div class="member-card pt-2 pb-2" style="text-align: left">
                                    <h2><?= $formato->saludo() ?> <b><?= $finaladmin['nomb'] ?>!</b></h2>
                                    <p style="font-size: 16px">En esta sección podrás visualizar el estado de productos actuales</p>
                                    <hr>
                                    <div class="row">
                                    <div class="container">
                                        <div class="main-body">

                                              <!-- Breadcrumb -->

                                              <!-- /Breadcrumb -->

                                              <div class="row gutters-sm">
                                                    <div class="col-md-7">
                                                      <div class="card mb-7">
                                                        <div class="card-body">
                                                          <div class="row">
                                                            <div class="col-sm-12">
                                                              <a class="btn btn-success" data-toggle="modal" data-target="#elegantModalForm">Visualizar todas las marcas y categorías</a>
                                                            </div>
                                                          </div>
                                                          <hr>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>
                                              
                                              <div class="modal fade " id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-la" role="document"> 
                                                             <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>MARCAS Y CATEGORÍAS</b></h4>
                                                                    
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: justify;">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="left-sidebar">
                                                                                <h2>Categorías</h2>
                                                                                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                                                                        
                                                                                    <?php 

                                                                                    $adminDAO= new ModeloAdmin();
                                                                                    $categorias= $adminDAO->getAllCategorias();

                                                                                    ?>

                                                                                    <?php foreach ($categorias as $categ){ ?>
                                                                                        <div class="panel panel-default">
                                                                                                <div class="panel-heading">
                                                                                                    <h4 class="panel-title"><a href="index.php?category=<?=$categ['categoria']?>"><?= $categ['categoria'] ?></a></h4>
                                                                                                </div>
                                                                                        </div>
                                                                                    <?php }?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="left-sidebar"><!--brands_products-->

                                                                                        <?php 

                                                                                        $marcas= $adminDAO->getAllMarcas();

                                                                                        ?>
                                                                                        <h2>MARCAS</h2>
                                                                                        <div class="brands-name">
                                                                                                <ul class="nav nav-pills nav-stacked">
                                                                                                    <?php foreach ($marcas as $marc){ ?>
                                                                                                        <li><a href="index.php?brand=<?=$marc['MARCA']?>"> <span class="pull-right">(<?= $marc['CUENTA'] ?>)</span><?= $marc['MARCA'] ?></a></li>
                                                                                                    <?php } ?>
                                                                                                </ul>
                                                                                        </div>
                                                                                </div><!--/brands_products-->
                                                                            </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end col -->

                        <div class="col-md-6">
                            <div class="text-center card-box" style="background-color: #c7c7c7; border-color: red #080;">
                                <div class="member-card pt-2 pb-2">
                                    <br>
                                    <div class="panel" id="pr" style='margin-left: 13px; margin-right: 13px'>
                                        <div class="panel-heading">
                                                <h3 class="panel-title" style="color:black; text-transform: uppercase; font-weight: 900">DASHBOARD</h3>
                                        </div>
                                        <div class="panel-body">
                                                <div class="col-md-4">
                                                        <div class="metric" style='border: 2px solid #292929; border-radius: 1.5%'>
                                                                <span class="icon"><i class="fa fa-coffee fa-2x" style="margin-top: 15px"></i></span>
                                                                <?php 
                                                                
                                                                    $objcg= new ConexionBD();
                                                                    $conexf= $objcg->getConexionBD();
                                                                    $recordsf= $conexf->prepare("select count(*) as total from tbl_producto;");
                                                                    $recordsf->execute();
                                                                    //$lista= $stmt->fetch_array();
                                                                    //$lista= $stmt->fetch_array();
                                                                    $resultsf= $recordsf->fetch(PDO::FETCH_ASSOC);
                                                                
                                                                ?>
                                                                <p><?=$resultsf['total']?> PRODUCTOS</p>
                                                        </div>
                                                </div>
                                                <div class="col-md-4">
                                                        <div class="metric" style='border: 2px solid #292929; border-radius: 1.5%'>
                                                                <span class="icon"><i class="fa fa-user fa-2x" style="margin-top: 15px"></i></span>
                                                                <?php 
                                                                
                                                                    $objcp= new ConexionBD();
                                                                    $conexp= $objcp->getConexionBD();
                                                                    $recordsp= $conexp->prepare("select count(*) as totalcli from tbl_clientes;");
                                                                    $recordsp->execute();
                                                                    //$lista= $stmt->fetch_array();
                                                                    //$lista= $stmt->fetch_array();
                                                                    $resultsp= $recordsp->fetch(PDO::FETCH_ASSOC);
                                                                
                                                                ?>
                                                                <p><?=$resultsp['totalcli']?> CLIENTES</p>
                                                        </div>
                                                </div>
                                                <div class="col-md-4">
                                                        <div class="metric" style='border: 2px solid #292929; border-radius: 1.5%'>
                                                                <span class="icon"><i class="fa fa-bar-chart fa-2x" style="margin-top: 15px"></i></span>
                                                                <?php 
                                                                
                                                                    $objcm= new ConexionBD();
                                                                    $conexm= $objcm->getConexionBD();
                                                                    $recordsm= $conexm->prepare("select count(*) as totalv from tbl_ventas;");
                                                                    $recordsm->execute();
                                                                    //$lista= $stmt->fetch_array();
                                                                    //$lista= $stmt->fetch_array();
                                                                    $recordsk= $recordsm->fetch(PDO::FETCH_ASSOC);
                                                                
                                                                ?>
                                                                <p><?=$recordsk['totalv']?> VENTAS</p>
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
                <div class="container">
                        <div class="mainmenu pull-left">
                            
                        </div>
                        
                        <ul class="pagination" id="pagination" style="padding: 0; margin: 0">
                            
                                <?php if(!empty($_GET['page'])){ ?>
                                                 
                                    <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                    <li class="<?php if($pageact==$i){?> active <?php }?>"><a href="index.php?page=<?=$i?>"><?=$i?></a></li>

                                    <?php }?>

                                <?php }else{?>

                                    <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                        <li class="<?php if($i==1){?> active <?php }?>"><a href="index.php?page=<?=$i?>"><?=$i?></a></li>

                                    <?php }?>

                                <?php }?>
                                        
                                <li><a >&raquo;</a></li>
                        </ul>
                        
                        <br><br>
                        
                        <div class="" id="resultword" style="display: none;">
                            <?php if(isset($_GET["search"])){ ?>
                            <b style="font-size: 18px">Resultados para: <?= $search ?></b>
                            <br><br>
                            <?php } ?>
                        </div>

                        <div class="" id="resultcategory" style="display: none;">
                            <?php if(isset($_GET["category"])){ ?>
                            <b style="font-size: 18px; text-transform: uppercase"><?= $category ?> en MarketApp</b>
                            <br><br>
                            <?php } ?>
                        </div>

                        <div class="" id="resultbrand" style="display: none;">
                            <?php if(isset($_GET["brand"])){ ?>
                            <b style="font-size: 18px; text-transform: uppercase">MARCA: <?= $brand ?></b>
                            <br><br>
                            <?php } ?>
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
                        
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" style="text-align: center;">
                                <thead class="thead-dark" >
                                  <tr class="table-primary" style="background-color: #f7c71b">
                                    <th style="text-align: center; display: table-cell; vertical-align: middle; width: 200px" scope="col">PRODUCTO</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">NOMBRE</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">MARCA</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">PRECIO ACTUAL</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">STOCK</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">DESCRIPCIÓN</th>
                                    <th style="text-align: center; display: table-cell; vertical-align: middle;" scope="col">ACCIONES</th>
                                  </tr>
                                </thead>

                                <tbody>
                                    
                                        <?php if($products!=null){?>
                                                
						<?php 
                                                $ipp=0;
                                                $chrt=1;
                                                foreach( $products as $producto){
                                                    $tt="a".$ipp;
                                                    $chart="ch".$ipp;
                                                    $infprod= "p".$ipp;
                                                ?>
                                   
                                                    <tr>
                                                            <td class="cart_product" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                <img src="../<?=$producto['imagen']?>" style="width: 50%; pointer-events: none; border: 1px solid #bab9b6;" alt="">
                                                            </td>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <h5 style="text-transform: uppercase"><?=$producto['nom_prod']?></h5>
                                                            </td>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <h5 style="text-transform: uppercase"><?=$producto['marca']?></h5>
                                                            </td>
                                                            <td class="cart_description" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p>S/. <?=$producto['precio_prod']?></p>
                                                            </td>
                                                            <td class="cart_price" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p><?=$producto['stock']?></p>
                                                            </td>
                                                            <td class="cart_total" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <p class="cart_total_price"><?=$producto['descripcion']?></p>
                                                            </td>
                                                            <td class="cart_delete" style="text-align:center; display: table-cell; vertical-align: middle;">
                                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$ipp?>" style="background-color: #e04646; margin-bottom: 5px; width: 120px">EDITAR</button><br><button data-toggle="modal" data-target="#statics<?=$ipp?>" class="btn btn-info">ESTADÍSTICAS</button>
                                                            </td>
                                                    </tr>
                                                 
                                                    <div class="modal fade " id="edit<?=$ipp?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-la" role="document"> 
                                                             <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>PRODUCTO: <?=$producto['nom_prod']?></b></h4>
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
                                                                                                swal("Imagen actualizada del producto", "La imagen del producto se actualizó con éxito!", "success");
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
                                                                                <input type="hidden" class="form-control" name="idprod" value="<?=$producto['id_producto']?>"/>
                                                                                <input type="hidden" class="form-control" name="op" value="1"/>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <center>
                                                                                            <img src="../<?=$producto['imagen']?>" class="form-control" style="pointer-events: none; width: 265px; height: 260px;" alt="">
                                                                                        </center>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">EDITAR IMAGEN</label>
                                                                                            <input type="file" name="file" class="form-control" required="true"/>
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
                                                                                                swal("Información actualizada del producto", "La información del producto se actualizó con éxito!", "success");
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
                                                                                <input type="hidden" class="form-control" name="idprod" value="<?=$producto['id_producto']?>"/>
                                                                                <input type="hidden" class="form-control" name="op" value="2"/>
                                                                                <?php 
                                                                                    $adminDAO= new ModeloAdmin();
                                                                                ?>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">NOMBRE DEL PRODUCTO: </label>
                                                                                            <input type="text" class="form-control" id="inputMessage" name="nombre" value="<?=$producto['nom_prod']?>" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">PRECIO: </label>
                                                                                            <input type="number" step="0.10" class="form-control" name="precio" id="inputMessage" value="<?=$producto['precio_prod']?>" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">CATEGORÍA: </label>
                                                                                            <select name="categ" class="form-control"  required="true">
                                                                                                    <option value="<?=$producto['id_categ']?>" selected=""><?=$producto['categoria']?></option>
                                                                                                    <?php $categories= $adminDAO->getCategoriaFilter($producto['id_categ']); ?>
                                                                                                    
                                                                                                    <?php foreach ($categories as $cat){ ?>
                                                                                                    <option value="<?=$cat['id_categ']?>"><?=$cat['categoria']?></option>
                                                                                                    <?php }?>
                                                                                                    
                                                                                            </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">MARCA: </label>
                                                                                            <select name="marca" class="form-control"  required="true">
                                                                                                    <option value="<?=$producto['id_marca']?>" selected=""><?=$producto['marca']?></option>     
                                                                                                    
                                                                                                    <?php $brands= $adminDAO->getMarcaFilter($producto['id_marca']); ?>
                                                                                                    
                                                                                                    <?php foreach ($brands as $brd){ ?>
                                                                                                    <option value="<?=$brd['id_marca']?>"><?=$brd['marca']?></option>
                                                                                                    <?php }?>
                                                                                            </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">STOCK ACTUAL:</label>
                                                                                            <input type="number" name="stock" class="form-control" id="inputMessage" value="<?=$producto['stock']?>" required/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">DESCRIPCIÓN: </label>
                                                                                            <textarea type="text" name="descripcion" class="form-control" required><?=$producto['descripcion']?></textarea>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <label for="inputMessage">TAG: </label>
                                                                                            <select name="tag" class="form-control"  required="true">
                                                                                                    <option value="<?=$producto['tag']?>" selected=""><?=$producto['tag']?></option>                                                                             
                                                                                                    <option value="Nuevo producto">Nuevo producto</option>
                                                                                                    <option value="Recomendado">Recomendado</option>
                                                                                                    <option value="Oferta">Oferta</option>
                                                                                                    <option value="Cancelado">Cancelado</option>
                                                                                            </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-8">
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
                                
                                                    <div class="modal fade " id="statics<?=$ipp?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog modal-lj" role="document"> 
                                                                 <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>ESTADÍSTICAS DEL PRODUCTO: <?=$producto['nom_prod']?></b></h4>
                                                                        </div>
                                                                        <div class="modal-body" style="text-align: justify;">
                                                                            
                                                                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                                                                            <script src="http://code.highcharts.com/highcharts.js"></script>
                                                                            <script src="http://code.highcharts.com/modules/exporting.js"></script>
                                                                            
                                                                            <div id="containerm<?=$chrt?>" style="width:100%; height:400px;"></div>
                                                                            
                                                                            <?php 
                                                                            
                                                                                $Object = new DateTime();
                                                                                $month = $Object->format("m");
                                                                                
                                                                                date_default_timezone_set("America/Lima");

                                                                                setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                                                                                $fecha=strftime("%B");

                                                                                $fcc= strtoupper($fecha);
                                                                                
                                                                                
                                                                                $admin2DAO= new ModeloAdmin();
                                                                                
                                                                                $statics= $admin2DAO->selectEstadisticaProducto($producto['id_producto'], $month);
                                                                                
                                                                                $dia=array();
                                                                                $tot= array();
                                                                                
                                                                                foreach ($statics as $st){
                                                                                    array_push($dia, $st['dia']);
                                                                                    array_push($tot, $st['total']);
                                                                                }
                                                                                
                                                                                //$etiquetas = array("Enero", "Febrero", "Marzo", "Abril");
                                                                                //$datosVentas = [20, 30, 40, 50];
                                                                                // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
                                                                                /*
                                                                                $respuesta = [
                                                                                    "etiquetas" => $etiquetas,
                                                                                    "datos" => $datosVentas,
                                                                                ];
                                                                                echo json_encode($respuesta);
                                                                                 */
                                                                            
                                                                            ?>
                                                                            
                                                                            <script>
                                                                                document.addEventListener('DOMContentLoaded', function () {
                                                                                    
                                                                                    var cat= [];
                                                                                    var dtcant= [];
                                                                                    
                                                                                    var labels=<?php echo json_encode($dia);?>;
                                                                                    var dtcantidad=<?php echo json_encode($tot);?>;
                                                                                    
                                                                                    for(var i=0;i<labels.length;i++)
                                                                                        {
                                                                                            cat.push(labels[i]);
                                                                                        }
                                                                                        
                                                                                    for(var ii=0;ii<dtcantidad.length;ii++)
                                                                                        {
                                                                                            dtcant.push(dtcantidad[ii]);
                                                                                        }
                                                                                    
                                                                                    const chart = Highcharts.chart('containerm<?=$chrt?>', {
                                                                                        chart: {
                                                                                            type: 'column'
                                                                                        },
                                                                                        title: {
                                                                                            text: 'Ventas del producto: <?=$producto['nom_prod']?> en el mes de <?=$fcc ?>'
                                                                                        },
                                                                                        xAxis: {
                                                                                            categories:  cat
                                                                                        },
                                                                                        yAxis: {
                                                                                            title: {
                                                                                                text: 'Cantidad'
                                                                                            }
                                                                                        },
                                                                                        series: [{
                                                                                            name: '<?=$producto['nom_prod']?>',
                                                                                            data: [<?php foreach ($tot as $dv){ ?>
                                                                                                    <?= $dv ?>,
                                                                                                  <?php }?>]
                                                                                        }]
                                                                                    });
    });
                                                                            </script>

                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn btn-default cerrarModal">Cerrar</button>
                                                                        </div>
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
                        
                        <ul class="pagination" id="pagination2" style="padding: 0; margin: 0">
                            
                                <?php if(!empty($_GET['page'])){ ?>
                                                 
                                    <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                    <li class="<?php if($pageact==$i){?> active <?php }?>"><a href="index.php?page=<?=$i?>"><?=$i?></a></li>

                                    <?php }?>

                                <?php }else{?>

                                    <?php for ($i=1; $i<= round($paginas,0); $i++){ ?>
                                        <li class="<?php if($i==1){?> active <?php }?>"><a href="index.php?page=<?=$i?>"><?=$i?></a></li>

                                    <?php }?>

                                <?php }?>
                                        
                                <li><a >&raquo;</a></li>
                                
                        </ul>
                        
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