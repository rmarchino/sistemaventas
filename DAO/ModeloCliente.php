<?php

require_once "../Util/ConexionBD.php";

class ModeloCliente{
    
    public $mysql;
    public $conex;
    
    public function __construct() {
        $this->mysql = new ConexionBD();
        $this->conex= $this->mysql->getConexionBD();
    }
    
    public function getAllProductos(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectProductos();");
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
    
    public function getCliente($usuario, $pass){
        //$i=0;
        try{
            
            
            $data= array($usuario, $pass);
            $records= $this->conex->prepare("call obtenerCliente(?,?);");
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
    
    public function pedidosClientes($idcliente){

        try{
            
            
            $data= array($idcliente);
            $records= $this->conex->prepare("call selectPedidosCliente(?);");
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
    
    public function getProductsFilters($min, $max){

        try{
            
            
            $data= array($min, $max);
            $records= $this->conex->prepare("call selectProductos_Filtrers_Clientes(?,?);");
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
    
    public function getProductsFiltersCategory($category){

        try{
            
            
            $data= array($category);
            $records= $this->conex->prepare("call selectProductos_Filtrers_Categories_Clientes(?);");
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
    
    public function getProductsFiltersBrand($brand){

        try{
            
            
            $data= array($brand);
            $records= $this->conex->prepare("call selectProductos_Filtrers_Brands_Clientes(?);");
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
    
    public function getResultSearch($word){

        try{
            
            
            $data= array($word);
            $records= $this->conex->prepare("call searchProductClientes(?);");
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
    
    public function getAllCategorias(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectCategorias();");
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
    
    public function getAllMarcas(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectMarcas();");
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
    
    public function getTipoDoc($idtipodoc){
        //$i=0;
        try{
            
            
            $data= array($idtipodoc);
            $records= $this->conex->prepare("call selectTipoDoc(?);");
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
    
    public function getPedidoClienteReporte($idcliente, $idventa){
        //$i=0;
        try{
            
            
            $data= array($idcliente, $idventa);
            $records= $this->conex->prepare("call selectPedidoClienteReporte(?,?);");
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
    
    public function getProductsOfertas(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectProductsOferta();");
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
    
    public function getProductsRecomendados(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectProductsRecomendados();");
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
    
    public function getProductsRecomendados2(){
           
            try{
                
                
                $records= $this->conex->prepare("call selectProductsRecomendados2();");
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
    
    public function getProductsRecomendadosFilters($min, $max){

        try{
            
            
            $data= array($min, $max);
            $records= $this->conex->prepare("call selectProductsRecomendadosFilters(?,?);");
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
    
    public function deletePedido($idventa){
        $i=0;
        try{
            
            
            $data= array($idventa);
            $records= $this->conex->prepare("call deletePedido(?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
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
    
    public function registrarMensajeCliente($idcliente, $mensaje){
        $i=0;
        try{
            
            
            $data= array($idcliente, $mensaje);
            $records= $this->conex->prepare("call registrarMensajeCliente(?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function selectDatosVenta($idventa){
        //$i=0;
        try{
            
            
            $data= array($idventa);
            $records= $this->conex->prepare("call selectDatosVenta(?);");
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
    
}