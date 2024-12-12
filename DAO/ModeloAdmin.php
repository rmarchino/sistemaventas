<?php

require_once "../Util/ConexionBD.php";

class ModeloAdmin {
    
    public $mysql;
    public $conex;
    
    public function __construct() {
        $this->mysql = new ConexionBD();
        $this->conex= $this->mysql->getConexionBD();
    }
    
    public function getEmpleado($usuario, $pass){
        //$i=0;
        try{
            
            
            $data= array($usuario, $pass);
            $records= $this->conex->prepare("call obtenerEmpleado(?,?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            $results= $records->fetch(PDO::FETCH_ASSOC);
                    
            $lista=$results; 
                      
            
        } catch (Exception $ex) {

        }
        return $lista;
    }
    
    public function getCategoriaFilter($categ){

        try{
            
            
            $data= array($categ);
            $records= $this->conex->prepare("call selectCategoriaFilter(?);");
            $records->execute($data);
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getMarcaFilter($brand){

        try{
            
            
            $data= array($brand);
            $records= $this->conex->prepare("call selectMarcaFilter(?);");
            $records->execute($data);
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getProductsFiltersCategory($category){

        try{
            
            
            $data= array($category);
            $records= $this->conex->prepare("call selectProductos_Filtrers_Categories(?);");
            $records->execute($data);
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getProductsFiltersBrand($brand){

        try{
            
            
            $data= array($brand);
            $records= $this->conex->prepare("call selectProductos_Filtrers_Brands(?);");
            $records->execute($data);
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getResultSearch($word){

        try{
            
            
            $data= array($word);
            $records= $this->conex->prepare("call searchProduct(?);");
            $records->execute($data);
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getProductsFilters($min, $max){

        try{
            
            
            $data= array($min, $max);
            $records= $this->conex->prepare("call selectProductos_Filtrers(?,?);");
            $records->execute($data);
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getAllCategorias(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectCategorias();");
                $records->execute();

                $lista= array();

                while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                    $lista[]=$results;               
                }

                //}

            } catch (Exception $ex) {

            }

            return $lista;
            
    }
    
    public function getAllMarcas(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectMarcas();");
                $records->execute();

                $lista= array();

                while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                    $lista[]=$results;               
                }

                //}

            } catch (Exception $ex) {

            }

            return $lista;
            
    }
    
    public function updateImagenProducto($idprod, $ruta){
        $i=0;
        try{
            
            
            $data= array($idprod, $ruta);
            $records= $this->conex->prepare("call updateImagenProducto(?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function updateInfoProducto($idprod, $nombre, $precio, $idcateg, $idmarca, $stock, $descrip, $tag){
        $i=0;
        try{
            
            
            $data= array($idprod, $nombre, $precio, $idcateg, $idmarca, $stock, $descrip, $tag);
            $records= $this->conex->prepare("call updateInfoProducto(?,?,?,?,?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function pedidosNoEntregados(){

        try{
            
            
            $records= $this->conex->prepare("call selectPedidosNoEntregados();");
            $records->execute();
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function pedidosNoEntregadosFilter($min, $max){

        try{
            
            
            $data= array($min, $max);
            $records= $this->conex->prepare("call selectPedidosNoEntregadosFilter(?,?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function pedidosEntregadosFilter($min, $max){

        try{
            
            
            $data= array($min, $max);
            $records= $this->conex->prepare("call selectPedidosEntregadosFilter(?,?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getTipoDocVenta($idtipodocventa){
        //$i=0;
        try{
            
            
            $data= array($idtipodocventa);
            $records= $this->conex->prepare("call selectDocVenta(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            $results= $records->fetch(PDO::FETCH_ASSOC);
                    
            $lista=$results; 
                      
            //$i=1;
            
            
            //$this->ad=new AdminBean();
            //$this->ad= $obja;
                
            //}
            
        } catch (Exception $ex) {

        }
        return $lista;
    }
    
    public function getUbigeoById($idubigeo){
        //$i=0;
        try{
            
            
            $data= array($idubigeo);
            $records= $this->conex->prepare("call selectUbigeoById(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            $results= $records->fetch(PDO::FETCH_ASSOC);
                    
            $lista=$results; 
                      
        } catch (Exception $ex) {

        }
        return $lista;
    }
    
    public function getDatosCliente($idcliente){
        //$i=0;
        try{
            
            
            $data= array($idcliente);
            $records= $this->conex->prepare("call selectDatosClientes(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            $results= $records->fetch(PDO::FETCH_ASSOC);
                    
            $lista=$results; 
                      
            //$i=1;
            
            
            //$this->ad=new AdminBean();
            //$this->ad= $obja;
                
            //}
            
        } catch (Exception $ex) {

        }
        return $lista;
    }
    
    public function getPagoFilter($idpago){

        try{
            
            
            $data= array($idpago);
            $records= $this->conex->prepare("call selectPagoFilter(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getTipodocFilter($iddoc){

        try{
            
            
            $data= array($iddoc);
            $records= $this->conex->prepare("call selectTipodocFilter(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getFilterUbigeo($idubigeo){

        try{
            
            
            $data= array($idubigeo);
            $records= $this->conex->prepare("call selectFilterUbigeo(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getDetallesVenta($idventa){

        try{
            
            
            $data= array($idventa);
            $records= $this->conex->prepare("call selectDetallesVenta(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getTotalVentas($idventa){
        //$i=0;
        try{
            
            
            $data= array($idventa);
            $records= $this->conex->prepare("call selectTotalVentas(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            $results= $records->fetch(PDO::FETCH_ASSOC);
                    
            $lista=$results; 
                      
            //$i=1;
            
            
            //$this->ad=new AdminBean();
            //$this->ad= $obja;
                
            //}
            
        } catch (Exception $ex) {

        }
        return $lista;
    }
    
    public function updateInfoVenta($idventa, $iddoc, $idubigeo, $numempresa, $idpago, $fechaentrega, $statusentrega, $statuspago, $direccionentrega){
        $i=0;
        try{
            
            
            $data= array($idventa, $iddoc, $idubigeo, $numempresa, $idpago, $fechaentrega, $statusentrega, $statuspago, $direccionentrega);
            $records= $this->conex->prepare("call updateInfoVenta(?,?,?,?,?,?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function searchPedidosNoEntregados($texto){

        try{
            
            
            $data= array($texto);
            $records= $this->conex->prepare("call searchPedidosNoEntregados(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function selectEstadisticaProducto($idprod, $mes){

        try{
            
            
            $data= array($idprod, $mes);
            $records= $this->conex->prepare("call selectStatusProducto(?,?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function searchPedidosEntregados($texto){

        try{
            
            
            $data= array($texto);
            $records= $this->conex->prepare("call searchPedidosEntregados(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function searchPedidosCancelados($texto){

        try{
            
            
            $data= array($texto);
            $records= $this->conex->prepare("call searchPedidosCancelados(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function pedidosCanceladosFilter($min, $max){

        try{
            
            
            $data= array($min, $max);
            $records= $this->conex->prepare("call selectPedidosCanceladosFilter(?,?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function selectChatClientesByAdmin(){

        try{
            
            
            $records= $this->conex->prepare("call selectChatClientesByAdmin();");
            $records->execute();
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function searchSelectChatClientesByAdmin($texto){

        try{
            
            
            $data= array($texto);
            $records= $this->conex->prepare("call searchSelectChatClientesByAdmin(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function selectMessagesCliente($idcliente){

        try{
            
            
            $data= array($idcliente);
            $records= $this->conex->prepare("call selectMessagesCliente(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function registrarMensajeEmpleado($idempleado, $idcliente, $mensaje){
        $i=0;
        try{
            
            
            $data= array($idempleado, $idcliente, $mensaje);
            $records= $this->conex->prepare("call registrarMensajeEmpleado(?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function selectClientesByAdmin(){

        try{
            
            
            $records= $this->conex->prepare("call selectClientesByAdmin();");
            $records->execute();
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function selectEmpleadosByAdmin(){

        try{
            
            
            $records= $this->conex->prepare("call selectEmpleadosByAdmin();");
            $records->execute();
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function searchSelectEmpleadosByAdmin($texto){

        try{
            
            
            $data= array($texto);
            $records= $this->conex->prepare("call searchSelectEmpleadosByAdmin(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function updateImagenCliente($idcliente, $ruta){
        $i=0;
        try{
            
            
            $data= array($idcliente, $ruta);
            $records= $this->conex->prepare("call updateImagenCliente(?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function updateInformacionCliente($idcliente, $tipodoc, $numdoc, $ubigeo, $direccion, $telefono){
        $i=0;
        try{
            
            
            $data= array($idcliente, $tipodoc, $numdoc, $ubigeo, $direccion, $telefono);
            $records= $this->conex->prepare("call updateInfoCliente(?,?,?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function searchSelectClientesByAdmin($texto){

        try{
            
            
            $data= array($texto);
            $records= $this->conex->prepare("call searchSelectClientesByAdmin(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function selectPedidosClientesGlobal($idcli){

        try{
            
            
            $data= array($idcli);
            $records= $this->conex->prepare("call selectPedidosClientesGlobal(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getFilterTipoDoc($idtipo){

        try{
            
            
            $data= array($idtipo);
            $records= $this->conex->prepare("call selectFilterTipoDoc(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function getFilterFuncion($idfuncion){

        try{
            
            
            $data= array($idfuncion);
            $records= $this->conex->prepare("call selectFilterFuncion(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function updateImagenEmpleado($idemp, $ruta){
        $i=0;
        try{
            
            
            $data= array($idemp, $ruta);
            $records= $this->conex->prepare("call updateImagenEmpleado(?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function updateInformacionEmpleado($idemp, $tipodoc, $numdoc, $ubigeo, $direccion, $fecha, $telefono){
        $i=0;
        try{
            
            
            $data= array($idemp, $tipodoc, $numdoc, $ubigeo, $direccion, $fecha, $telefono);
            $records= $this->conex->prepare("call updateInfoEmpleado(?,?,?,?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function updateInformacionEmpleadoGlobal($idemp, $funcion, $tipodoc, $numdoc, $ubigeo, $direccion, $fecha, $telefono, $nombre, $apellido){
        $i=0;
        try{
            
            
            $data= array($idemp,$funcion, $tipodoc, $numdoc, $ubigeo, $direccion, $fecha, $telefono, $nombre, $apellido);
            $records= $this->conex->prepare("call updateInfoEmpleadoGlobal(?,?,?,?,?,?,?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function getUbigeo(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectUbigeo();");
                $records->execute();
                //$lista= $stmt->fetch_array();
                //$lista= $stmt->fetch_array();

                $lista= array();

                while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                    $lista[]=$results;               
                }

                //}

            } catch (Exception $ex) {

            }

            return $lista;
            
    }
    
    public function getFuncion(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectFuncion();");
                $records->execute();
                //$lista= $stmt->fetch_array();
                //$lista= $stmt->fetch_array();

                $lista= array();

                while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                    $lista[]=$results;               
                }

                //}

            } catch (Exception $ex) {

            }

            return $lista;
            
    }
    
    public function insertEmpleados($nombre, $apellido, $username, $correo, $pass, $idfuncion, $idubigeo, $direccion, $idtipodoc, $numdoc, $telefono, $fenaci){
        $i=0;
        try{
            
            
            $data= array($nombre, $apellido, $username, $correo, $pass, $idfuncion, $idubigeo, $direccion, $idtipodoc, $numdoc, $telefono, $fenaci);
            $records= $this->conex->prepare("call insertEmpleados(?,?,?,?,?,?,?,?,?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function searchSelectUsers($texto){

        try{
            
            
            $data= array($texto);
            $records= $this->conex->prepare("call searchSelectUsers(?);");
            $records->execute($data);
            //$lista= $stmt->fetch_array();
            //$lista= $stmt->fetch_array();
            
            $lista= array();
            
            while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                $lista[]=$results;               
            }
            
            //}
            
        } catch (Exception $ex) {

        }
        
        return $lista;
    }
    
    public function insertCategoria($nombre){
        $i=0;
        try{
            
            
            $data= array($nombre);
            $records= $this->conex->prepare("call insertCategoria(?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function insertMarca($nombre){
        $i=0;
        try{
            
            
            $data= array($nombre);
            $records= $this->conex->prepare("call insertMarca(?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function insertProducto($nombre, $precio, $idcateg, $idmarca, $stock, $ruta, $descripcion, $tag){
        $i=0;
        try{
            
            
            $data= array($nombre, $precio, $idcateg, $idmarca, $stock, $ruta, $descripcion, $tag);
            $records= $this->conex->prepare("call insertProducto(?,?,?,?,?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function getAllMarcasGlobal(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectMarcasGlobal();");
                $records->execute();
                //$lista= $stmt->fetch_array();
                //$lista= $stmt->fetch_array();

                $lista= array();

                while ($results= $records->fetch(PDO::FETCH_ASSOC)) {
                    $lista[]=$results;               
                }

                //}

            } catch (Exception $ex) {

            }

            return $lista;
            
    }
    
    
}
