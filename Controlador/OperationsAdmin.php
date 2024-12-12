<?php

session_start();

require_once '../DAO/ModeloAdmin.php';
require_once '../DAO/ModeloCliente.php';
require_once '../DAO/ModeloUsuario.php';
require_once '../DAO/Formato.php';
require_once '../Util/Consultas.php';

$op=$_POST['op'];

$consultas= new Consultas();
    
$usuarioDAO= new ModeloUsuario();

if($op==1){
    
    $idprod=$_POST['idprod'];
    
    $nombre1=$_FILES['file']['name'];
    $guardado1=$_FILES['file']['tmp_name'];
      
    $objFormato= new Formato();
    $fecha= $objFormato->fecha();
    $horasimp= $objFormato->hora_simple();
    
    $fechahora= $fecha."_".$horasimp;

    $ruta1= 'imagenes/productos/'.$fechahora."_".$nombre1;

    if(!file_exists('../imagenes/productos')){
        mkdir('../imagenes/productos',0777,true);
        if(file_exists('../imagenes/productos')){
                //$ruta= 'archivos/'.$nombre;
                if(move_uploaded_file($guardado1, '../imagenes/productos/'.$fechahora."_".$nombre1)){

                        $adminDAO = new ModeloAdmin();
                        $estado= $adminDAO->updateImagenProducto($idprod, $ruta1);
                        
                        ?>

                        <script>

                                swal("Imagen actualizada del producto", "La imagen del producto se actualizó con éxito!", "success");
                                function myFunction() {
                                    location.reload();
                                  }
                                  setTimeout(myFunction, 1800);
                        </script>

                        <?php   
  
                }else{
                    
                    ?>

                        <script>

                               swal("Ups, ocurrió algo", "Algo pasó de forma inesperada", "error");

                       </script>      

                    <?php
                    
                }
        }
        
    }else{
        if(move_uploaded_file($guardado1, '../imagenes/productos/'.$fechahora."_".$nombre1)){

                $adminDAO = new ModeloAdmin();
                $estado= $adminDAO->updateImagenProducto($idprod, $ruta1);

                ?>

                <script>

                        swal("Imagen actualizada del producto", "La imagen del producto se actualizó con éxito!", "success");
                        function myFunction() {
                            location.reload();
                          }
                          setTimeout(myFunction, 1800);
                </script>

                <?php    

        }else{
                
            ?>

                <script>

                       swal("Ups, ocurrió algo", "Algo pasó de forma inesperada", "error");

               </script>      

            <?php
            
        }
    }
    
}elseif($op==2){
    
    $idprod=$_POST['idprod'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $categ=$_POST['categ'];
    $marca=$_POST['marca'];
    $stock=$_POST['stock'];
    $descripcion=$_POST['descripcion'];
    $tag=$_POST['tag'];
    
    $adminDAO = new ModeloAdmin();
    $estadoupd= $adminDAO->updateInfoProducto($idprod, $nombre, $precio,$categ, $marca, $stock, $descripcion, $tag);
        
}elseif($op==3){
    
    $idventa=$_POST['idventa'];
    $iddoc=$_POST['iddoc'];
    $idpago=$_POST['idpago'];
    $idubigeo=$_POST['idubigeo'];
    $direccion=$_POST['direccion'];
    $fechaentrega=$_POST['fechaentrega'];
    $statusentrega=$_POST['statusentrega'];
    $statuspago=$_POST['statuspago'];
    
    if($iddoc==1){
        $ruc= NULL;
    }elseif($iddoc==2){
        if(!empty($_POST['ruc'])){
            $ruc= $_POST['ruc'];
        }elseif(empty($_POST['ruc'])){
            $ruc= $_POST['rucactual'];
        }
    }elseif($iddoc==3){
        $ruc= NULL;
    }
    
    $adminDAO = new ModeloAdmin();
    $estadoupd= $adminDAO->updateInfoVenta($idventa, $iddoc, $idubigeo,$ruc, $idpago, $fechaentrega, $statusentrega, $statuspago, $direccion);
    
}elseif($op==7){
    
    $nombre1=$_FILES['archivo']['name'];
    $guardado1=$_FILES['archivo']['tmp_name'];
    
    $objFormato= new Formato();
    $fecha= $objFormato->fecha();
    $horasimp= $objFormato->hora_simple();

    $fechahora= $fecha."_".$horasimp;

    $ruta1= 'imagenes/clientes/'.$fechahora."_".$nombre1;

    $idcliente=$_POST['idcliente'];
    
    if(!file_exists('../imagenes/clientes')){
        mkdir('../imagenes/clientes',0777,true);
        if(file_exists('../imagenes/clientes')){
                //$ruta= 'archivos/'.$nombre;
                if(move_uploaded_file($guardado1, '../imagenes/clientes/'.$fechahora."_".$nombre1)){

                        $adminDAO = new ModeloAdmin();
                        $estado= $adminDAO->updateImagenCliente($idcliente, $ruta1);

                }else{
                    
                    ?>

                        <script>

                               swal("Ups, ocurrió algo", "Algo pasó de forma inesperada", "error");

                       </script>      

                    <?php
                    
                }
        }
        
    }else{
        if(move_uploaded_file($guardado1, '../imagenes/clientes/'.$fechahora."_".$nombre1)){

                $adminDAO = new ModeloAdmin();
                $estado= $adminDAO->updateImagenCliente($idcliente, $ruta1);

        }else{
                
            ?>

                <script>

                       swal("Ups, ocurrió algo", "Algo pasó de forma inesperada", "error");

               </script>      

            <?php
            
        }
    }
    
}elseif($op==8){
    
    $idcliente=$_POST['idcliente'];
    $tipodoc=$_POST['tipodoc'];
    $numdoc=$_POST['numdoc'];
    $ubigeo=$_POST['ubigeo'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    
    $adminDAO = new ModeloAdmin();
    $estadoupd= $adminDAO->updateInformacionCliente($idcliente, $tipodoc, $numdoc, $ubigeo, $direccion, $telefono);
        
        ?>
        
        <script>

                swal("Información actualizada!", "Los datos se actualizaron de forma correcta!", "success");
                function myFunction() {
                    location.reload();
                  }
                  setTimeout(myFunction, 1800);
        </script>
        
        <?php
        
}elseif($op==9){
    
    $clienteDAO= new ModeloCliente();
    $adminDAO= new ModeloAdmin();
    
    $idcliente= $_POST['idcliente'];
    $datos= $clienteDAO->getDatosCliente($idcliente);
    $pedidosglobal= $adminDAO->selectPedidosClientesGlobal($idcliente);
    
    ?>
        
        <div id="muestra">
            
            <script type="text/javascript">
                $(document).ready(function(){
                    $(document).on("click","#volver", function(){

                            $("#muestra").hide();
                            $("#clientscontainer").show();                   
                    });
                });
            </script>
            
            <div class="container">
                
                <div class="mainmenu pull-left">
                    <span class="badge rounded-pill bg-warning" style="font-size: 20px; background-color: orange">PEDIDOS DE <?= strtoupper($datos['nom_cli'])?> <br><?= strtoupper($datos['ape_cli'])?></span>
                    <span class="badge bg-success" id="volver" style="font-size: 17px; cursor: pointer; float: right; background-color: #e04646; margin-top: 10px; margin-left: 10px"><i class="fa fa-arrow-left fa-1x" aria-hidden="true"></i> Regresar</span>
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
                           width: 80%;
                        }
                     }
                </style>
                                        
                
                <?php if($pedidosglobal!=null){ ?>

                <div class="table-responsive" style="margin-right: 15px; padding-right: 15px">
                    <table class="table table-striped table-hover" style="text-align: center;">
                        <thead class="thead-dark" >
                          <tr class="table-primary" style="background-color: #2298d4;">
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
                            foreach ($pedidosglobal as $ped){ ?>

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
                            <?php $cc++; } ?>

                        </tbody>
                    </table>
                </div>

                <?php 
                $ccc=0;
                foreach ($pedidosglobal as $pdnt){ ?>
                
                    <div class="modal fade " id="info<?=$ccc?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-la" role="document"> 
                             <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close cerrarModal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 style="text-transform: uppercase;" class="modal-title" id="myModalLabel"><b>PEDIDO: N° <?=$pdnt['numdocumento']?></b></h4>
                                    </div>
                                    <div class="modal-body" style="text-align: justify;">
                                        <div class="row">

                                            <script type="text/javascript">
                                                $(document).ready(function(){

                                                    $("#idFormInfoPedido<?=$ccc?>").bind("submit",function(){
                                                        // Capturamnos el boton de envío
                                                        var btnEnviar = $("#btnEnviarFormPedido<?=$ccc?>");
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

                                            <form action="../Controlador/OperationsAdmin.php" method="POST" id="idFormInfoPedido<?=$ccc?>">
                                                <input type="hidden" class="form-control" name="idventa" value="<?=$pdnt['id_venta']?>"/>
                                                <input type="hidden" class="form-control" name="op" value="3"/>
                                                <?php 
                                                    $adminDAO= new ModeloAdmin();
                                                ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="inputMessage">N° DE PEDIDO </label>
                                                            <input type="text" class="form-control" id="inputMessage" value="<?=$pdnt['numdocumento']?>" disabled/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">SOBRE EL CLIENTE:  </label>
                                                            <?php $cliente= $adminDAO->getDatosCliente($pdnt['id_cliente']); ?>
                                                            <input type="text" class="form-control" value="NOMBRES:  <?=$cliente['nom_cli']?> <?=$cliente['ape_cli']?>" disabled/>
                                                             
                                                    </div>
                                                    <script type="text/javascript">
                                                        function mostrart<?=$ccc?>(id) {
                                                            if (id == "2") {
                                                                $("#contentruc<?=$ccc?>").show();
                                                                $('#camporuc<?=$ccc?>').prop("required", true);
                                                            }

                                                            if (id== "1"){
                                                                $("#contentruc<?=$ccc?>").hide();
                                                                $('#camporuc<?=$ccc?>').removeAttr("required");
                                                            }

                                                            if (id== "3"){
                                                                $("#contentruc<?=$ccc?>").hide();
                                                                $('#camporuc<?=$ccc?>').removeAttr("required");
                                                            }
                                                        }
                                                    </script>
                                                    <div class="form-group">
                                                            <label for="inputMessage">TIPO DE DOCUMENTO DE VENTA: </label>
                                                            <?php $docventa= $adminDAO->getTipoDocVenta($pdnt['id_doc']); ?>
                                                            <select name="iddoc" class="form-control"  required="true" onChange="mostrart<?=$ccc?>(this.value);">
                                                                    <option value="<?=$pdnt['id_doc']?>" selected=""><?=$docventa['documento']?></option>
                                                                    <?php $tipodocs= $adminDAO->getTipodocFilter($pdnt['id_doc']); ?>
                                                                    <?php foreach ($tipodocs as $tpdocs){ ?>
                                                                    <option value="<?=$tpdocs['id_doc']?>"><?=$tpdocs['documento']?></option>
                                                                    <?php }?>

                                                            </select>
                                                    </div>

                                                    <?php if($pdnt['id_doc']==2){ ?>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control" value="RUC: <?=$pdnt['numempresa']?>" disabled>
                                                            <input type="hidden" class="form-control" name="rucactual" value="<?=$pdnt['numempresa']?>">
                                                        </div>

                                                    <?php } ?>

                                                    <div class="form-group" id="contentruc<?=$ccc?>" style="display: none">
                                                        <input type="text" class="form-control" id="camporuc<?=$ccc?>" placeholder="Ingrese el RUC" name="ruc">
                                                    </div>

                                                    <div class="form-group">
                                                            <label for="inputMessage">TIPO DE PAGO: </label>
                                                            <select name="idpago" class="form-control"  required="true">
                                                                    <option value="<?=$pdnt['id_pago']?>"><?=$pdnt['detalle_pago']?></option>
                                                                    <?php $tipospago= $adminDAO->getPagoFilter($pdnt['id_pago']); ?>

                                                                    <?php foreach ($tipospago as $tppg){ ?>
                                                                    <option value="<?=$tppg['id_pago']?>"><?=$tppg['detalle_pago']?></option>
                                                                    <?php }?>

                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">DISTRITO DE DESTINO DE PEDIDO: </label>
                                                            <select name="idubigeo" class="form-control" required="true">
                                                                <option value="<?=$pdnt['id_ubigeo']?>" selected=""><?=$pdnt['distrito']?> - <?= strtoupper($pdnt['provincia'])?></option>     

                                                                    <?php $ubgs= $adminDAO->getFilterUbigeo($pdnt['id_ubigeo']); ?>

                                                                    <?php foreach ($ubgs as $ubg){ ?>
                                                                        <option value="<?=$ubg['id_ubigeo']?>"><?=$ubg['distrito']?> - <?= strtoupper($ubg['provincia'])?></option>
                                                                    <?php }?>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputMessage">DIRECCIÓN DE ENTREGA: </label>
                                                        <input type="text" class="form-control" name="direccion" value="<?=$pdnt['direccion_entrega']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="inputMessage">FECHA Y HORA DE PEDIDO:</label>
                                                            <input type="date" class="form-control" value="<?=date('Y-m-d', strtotime($pdnt['fecha_pedido']));?>" disabled/>
                                                            <br>
                                                            <input type="text" class="form-control" value="<?=date('H:i:s A', strtotime($pdnt['fecha_pedido']));?>" disabled/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">FECHA DE ENTREGA: </label>
                                                            <input type="date" class="form-control" name="fechaentrega" value="<?=$pdnt['fecha_entrega']?>" required/>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">STATUS DE ENTREGA: </label>
                                                            <select name="statusentrega" class="form-control" required="true">
                                                                <option value="<?=$pdnt['status']?>" selected=""><?=$pdnt['status']?></option>     
                                                                <option value="Entregado">Entregado</option>
                                                                <option value="No entregado">No entregado</option>
                                                                <option value="Cancelado">Cancelado</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">STATUS DE PAGO: </label>
                                                            <select name="statuspago" class="form-control" required="true">
                                                                <option value="<?=$pdnt['status_pago']?>" selected=""><?=$pdnt['status_pago']?></option>     
                                                                <option value="Pagado">Pagado</option>
                                                                <option value="No verificado">No verificado</option>
                                                                <option value="Programado">Programado</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="inputMessage">NOTAS DEL CLIENTE </label>
                                                            <textarea type="text" name="nota" class="form-control" disabled><?=$pdnt['nota']?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="submit" id="btnEnviarFormPedido<?=$ccc?>" class="btn btn-danger form-control">EDITAR INFORMACIÓN DE VENTA</button>
                                                </div>
                                            </form>
                                            <br>
                                            <div class="col-md-6">
                                                <form action="../Controlador/ReporteVentas.php" method="POST">
                                                    <input type="hidden" name="tipodoc" value="<?=$pdnt['id_doc']?>">
                                                    <input type="hidden" name="idventa" value="<?=$pdnt['id_venta']?>">
                                                    <input type="hidden" name="idcliente" value="<?=$pdnt['id_cliente']?>">
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
        
        <?php 
        
}elseif($op==10){
    $idusuario=$_POST['idusuario'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
     
    if($consultas->comprobarCorreoById($idusuario, $correo)==false){
    
        if($consultas->comprobarCorreo($correo)==false){
            $estadoupd= $usuarioDAO->updateInfoUsuarioAdmin($idusuario, $nombres, $apellidos, $correo);

        ?>

        <script>
            swal("Información actualizada del usuario!", "Los datos se actualizaron correctamente!", "success");
            function myFunction() {
                location.reload();
              }
              setTimeout(myFunction, 1800);
        </script>

        <?php
        }else{

        ?>

        <script>
            swal("El correo ya existe", "Comprueba la información ingresada e intenta de nuevo", "error");
        </script>

        <?php
        }
    
    }else{
        $estadoupd= $usuarioDAO->updateInfoUsuarioAdmin($idusuario, $nombres, $apellidos, $correo);
        
        ?>
        
        <script>

                swal("Información actualizada del usuario!", "Los datos se actualizaron correctamente!", "success");
                function myFunction() {
                    location.reload();
                  }
                  setTimeout(myFunction, 1800);
        </script>
        
        <?php
        
    }
    
}elseif($op==11){
    $idusuario=$_POST['idusuario'];
    $passactual=$_POST['passactual'];
    $pass1=$_POST['passnew1'];
    $pass2=$_POST['passnew2'];
    
    if($consultas->ComprobarClaveUser($idusuario, $passactual)==false){  
        
        ?>
        
        <script>
            swal("La contraseña ingresada no coindice", "No coincide tu contraseña actual", "error");
        </script>
        
        <?php
    
    }elseif($consultas->comprobarClaveUser($idusuario, $passactual)==true){

        if($pass1 == $pass2){
            $estado= $consultas->updatePass($idusuario, $pass2);
            
            $_SESSION['pass1']= $pass2;
            
            ?>
        
            <script>

                    swal("Contraseña actualizada", "Los datos se actualizaron correctamente!", "success");
                    function myFunction() {
                        location.reload();
                      }
                      setTimeout(myFunction, 1800);
            </script>
            
        <?php
            
        }elseif ($pass1 != $pass2) {
            
            ?>
            
            <script>

                    swal("No coincide la confirmación de la contraseña!", "No coinciden las dos contraseñas de confirmación", "error");

            </script>
            
        <?php
            
        }

    }
    
}elseif($op==12){
    
    $nombre1=$_FILES['archivo']['name'];
    $guardado1=$_FILES['archivo']['tmp_name'];
    
    $objFormato= new Formato();
    $fecha= $objFormato->fecha();
    $horasimp= $objFormato->hora_simple();

    $fechahora= $fecha."_".$horasimp;

    $ruta1= 'imagenes/empleados/'.$fechahora."_".$nombre1;

    $idempleado=$_POST['idempleado'];
    
    if(!file_exists('../imagenes/empleados')){
        mkdir('../imagenes/empleados',0777,true);
        if(file_exists('../imagenes/empleados')){
                //$ruta= 'archivos/'.$nombre;
                if(move_uploaded_file($guardado1, '../imagenes/empleados/'.$fechahora."_".$nombre1)){

                        $adminDAO = new ModeloAdmin();
                        $estado= $adminDAO->updateImagenEmpleado($idempleado, $ruta1);

                }else{
                    
                    ?>

                        <script>

                               swal("Ups, ocurrió algo", "Algo pasó de forma inesperada", "error");

                       </script>      

                    <?php
                    
                }
        }
        
    }else{
        if(move_uploaded_file($guardado1, '../imagenes/empleados/'.$fechahora."_".$nombre1)){

                $adminDAO = new ModeloAdmin();
                $estado= $adminDAO->updateImagenEmpleado($idempleado, $ruta1);

        }else{
                
            ?>

                <script>

                       swal("Ups, ocurrió algo", "Algo pasó de forma inesperada", "error");

               </script>      

            <?php
            
        }
    }
    
}elseif($op==13){
    
    $idempleado=$_POST['idemp'];
    $tipodoc=$_POST['tipodoc'];
    $numdoc=$_POST['numdoc'];
    $ubigeo=$_POST['ubigeo'];
    $direccion=$_POST['direccion'];
    $fecha=$_POST['fecha'];
    $telefono=$_POST['telefono'];
    
    $adminDAO = new ModeloAdmin();
    $estadoupd= $adminDAO->updateInformacionEmpleado($idempleado, $tipodoc, $numdoc, $ubigeo, $direccion, $fecha, $telefono);
        
    ?>

    <script>

            swal("Información actualizada!", "Los datos se actualizaron de forma correcta!", "success");
            function myFunction() {
                location.reload();
              }
              setTimeout(myFunction, 1800);
    </script>

    <?php
        
}elseif($op==14){
    
    $idempleado=$_POST['idemp'];
    $funcion=$_POST['funcion'];
    $tipodoc=$_POST['tipodoc'];
    $numdoc=$_POST['numdoc'];
    $ubigeo=$_POST['ubigeo'];
    $direccion=$_POST['direccion'];
    $fecha=$_POST['fecha'];
    $telefono=$_POST['telefono'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    
    $adminDAO = new ModeloAdmin();
    $estadoupd= $adminDAO->updateInformacionEmpleadoGlobal($idempleado,$funcion, $tipodoc, $numdoc, $ubigeo, $direccion, $fecha, $telefono, $nombre, $apellido);
        
    ?>

    <script>

            swal("Información actualizada!", "Los datos se actualizaron de forma correcta!", "success");
            function myFunction() {
                location.reload();
              }
              setTimeout(myFunction, 1800);
    </script>

    <?php
    
}elseif($op==15){
    
    $nombre=$_POST['nombres'];
    $apellido=$_POST['apellidos'];
    $username=$_POST['username'];
    $correo=$_POST['correo'];
    $pass=$_POST['pass'];

    $cons = new Consultas();
    $objusuDAO = new ModeloUsuario();

    if($cons->comprobarCorreo($correo)==true){
        
        ?>

            <script>

                   swal("El correo ya existe!", "Verifique el correo", "error");

           </script>      

        <?php
        
    }elseif($cons->comprobarUser($username)==true){

        ?>

            <script>

                   swal("El username ya existe!", "Verifique el username", "error");

           </script>      

        <?php
        
        
    }elseif($cons->comprobarCorreo($correo)==false && $cons->comprobarUser($username)==false){

        $estado= $objusuDAO->InsertUsuario($nombre,$apellido,$username,$correo,$pass);

        ?>

        <script>

                swal("El usuario se registró", "Se registró satisfactoriamente", "success");
                function myFunction() {
                    location.reload();
                  }
                  setTimeout(myFunction, 1300);
        </script>

        <?php

    }
    
}elseif($op==16){
    
    $nombre=$_POST['nombres'];
    $apellido=$_POST['apellidos'];
    $username=$_POST['username'];
    $correo=$_POST['correo'];
    $pass=$_POST['pass'];
    $funcion=$_POST['funcion'];
    $ubigeo=$_POST['ubigeo'];
    $direccion=$_POST['direccion'];
    $tipodoc=$_POST['tipodoc'];
    $ndoc=$_POST['ndoc'];
    $telefono=$_POST['telefono'];
    $fenaci=$_POST['fenaci'];

    $cons = new Consultas();
    $objusuDAO = new ModeloUsuario();
    $adminDAO= new ModeloAdmin();

    if($cons->comprobarCorreo($correo)==true){
        
        ?>

            <script>

                   swal("El correo ya existe!", "Verifique el correo", "error");

           </script>      

        <?php
        
    }elseif($cons->comprobarUser($username)==true){

        ?>

            <script>

                   swal("El username ya existe!", "Verifique el username", "error");

           </script>      

        <?php
        
        
    }elseif($cons->comprobarCorreo($correo)==false && $cons->comprobarUser($username)==false){

        $estado= $adminDAO->insertEmpleados($nombre, $apellido, $username, $correo, $pass, $funcion, $ubigeo, $direccion, $tipodoc, $ndoc, $telefono, $fenaci)

        ?>

        <script>

                swal("El empleado se registró", "Se registró satisfactoriamente", "success");
                function myFunction() {
                    location.reload();
                  }
                  setTimeout(myFunction, 1300);
        </script>

        <?php

    }
    
}elseif($op==17){
    
    $consultas= new Consultas();
    
    $usuarioDAO= new ModeloUsuario();
    
    $idusuario=$_POST['idusuario'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
     
    if($consultas->comprobarCorreoById($idusuario, $correo)==false){
    
        if($consultas->comprobarCorreo($correo)==false){
            $estadoupd= $usuarioDAO->updateInfoUsuario($idusuario, $nombres, $apellidos, $correo);

        ?>

        <script>

                swal("Información actualizada del usuario!", "Los datos se actualizaron correctamente!", "success");
                function myFunction() {
                    location.reload();
                  }
                  setTimeout(myFunction, 1800);
        </script>

        <?php
        }else{

        ?>

        <script>

                swal("El correo ya existe", "Comprueba la información ingresada e intenta de nuevo", "error");

        </script>

        <?php
        }
    
    }else{
        $estadoupd= $usuarioDAO->updateInfoUsuario($idusuario, $nombres, $apellidos, $correo);
        
        ?>
        
        <script>

                swal("Información actualizada del usuario!", "Los datos se actualizaron correctamente!", "success");
                function myFunction() {
                    location.reload();
                  }
                  setTimeout(myFunction, 1800);
        </script>
        
        <?php
        
    }
    
}elseif($op==18){
    
    $consultas= new Consultas();
    
    $usuarioDAO= new ModeloUsuario();
    
    $idusuario=$_POST['idusuario'];
    $iddestino=$_POST['iddestino'];
    $passactual=$_POST['passactual'];
    $pass1=$_POST['passnew1'];
    $pass2=$_POST['passnew2'];
    
    if($consultas->ComprobarClaveUser($idusuario, $passactual)==false){  
        
        ?>
        
        <script>

                swal("La contraseña ingresada no coindice", "No coincide tu contraseña actual", "error");

        </script>
        
        <?php
    
    }else if($consultas->comprobarClaveUser($idusuario, $passactual)==true){

        if($pass1 == $pass2){
            $estado= $consultas->updatePass($iddestino, $pass2);
            
            if($idusuario==$iddestino){
                $_SESSION['pass1']= $pass2;
            }
            
            ?>
        
            <script>

                    swal("Contraseña actualizada", "Los datos se actualizaron correctamente!", "success");
                    function myFunction() {
                        location.reload();
                      }
                      setTimeout(myFunction, 1800);
            </script>
            
        <?php
            
        }elseif ($pass1 != $pass2) {
            
            ?>
            
            <script>

                    swal("No coincide la confirmación de la contraseña!", "No coinciden las dos contraseñas de confirmación", "error");

            </script>
            
        <?php
            
        }

    }
    
}elseif($op==19){
    
    $nombres=$_POST['nombres'];
    
    $adminDAO = new ModeloAdmin();
    $estadoupd= $adminDAO->insertCategoria($nombres);
        
    ?>

    <script>

            swal("Categoría registrada", "La categoría se registró correctamente", "success");
            function myFunction() {
                location.reload();
              }
              setTimeout(myFunction, 1300);
    </script>

    <?php
    
}elseif($op==20){
    
    $nombres=$_POST['nombres'];
    
    $adminDAO = new ModeloAdmin();
    $estadoupd= $adminDAO->insertMarca($nombres);
        
    ?>

    <script>

            swal("Marca registrada", "La marca se registró correctamente", "success");
            function myFunction() {
                location.reload();
              }
              setTimeout(myFunction, 1300);
    </script>

    <?php
    
}elseif($op==21){
    
    $nombre1=$_FILES['archivo']['name'];
    $guardado1=$_FILES['archivo']['tmp_name'];
    
    $nombres=$_POST['nombre'];
    $precio=$_POST['precio'];
    $idcateg=$_POST['categ'];
    $idmarca=$_POST['marca'];
    $stock=$_POST['stock'];
    $descripcion=$_POST['descripcion'];
    $tag=$_POST['tag'];
      
    $objFormato= new Formato();
    $fecha= $objFormato->fecha();
    $horasimp= $objFormato->hora_simple();
    
    $fechahora= $fecha."_".$horasimp;

    $ruta1= 'imagenes/productos/'.$fechahora."_".$nombre1;

    if(!file_exists('../imagenes/productos')){
        mkdir('../imagenes/productos',0777,true);
        if(file_exists('../imagenes/productos')){
                //$ruta= 'archivos/'.$nombre;
                if(move_uploaded_file($guardado1, '../imagenes/productos/'.$fechahora."_".$nombre1)){

                        $adminDAO = new ModeloAdmin();
                        $estado= $adminDAO->insertProducto($nombres, $precio, $idcateg, $idmarca, $stock, $ruta1, $descripcion, $tag);
                        
                        ?>

                        <script>

                                swal("Producto registrado!", "El producto se registró con éxito!", "success");
                                function myFunction() {
                                    location.reload();
                                  }
                                  setTimeout(myFunction, 1300);
                        </script>

                        <?php   
  
                }else{
                    
                    ?>

                        <script>

                               swal("Ups, ocurrió algo", "Algo pasó de forma inesperada", "error");

                       </script>      

                    <?php
                    
                }
        }
        
    }else{
        if(move_uploaded_file($guardado1, '../imagenes/productos/'.$fechahora."_".$nombre1)){

                $adminDAO = new ModeloAdmin();
                $estado= $adminDAO->insertProducto($nombres, $precio, $idcateg, $idmarca, $stock, $ruta1, $descripcion, $tag);

                ?>

                <script>

                        swal("Producto registrado!", "El producto se registró con éxito!", "success");
                        function myFunction() {
                            location.reload();
                          }
                          setTimeout(myFunction, 1300);
                </script>

                <?php    

        }else{
                
            ?>

                <script>

                       swal("Ups, ocurrió algo", "Algo pasó de forma inesperada", "error");

               </script>      

            <?php
            
        }
    }
    
}
    

?>



