<?php

require_once "../Util/ConexionBD.php";

class ModeloUsuario{
    
    public $mysql;
    public $conex;
    
    public function __construct() {
        $this->mysql = new ConexionBD();
        $this->conex= $this->mysql->getConexionBD();
    }
    
    public function InsertUsuario($nombre, $apellido, $username, $correo, $pass){
        $i=0;
        try{
            
            
            $data= array($nombre, $apellido, $username, $correo, $pass);
            $records= $this->conex->prepare("call insertUsuarios(?,?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function getUsuario($usuario, $pass){
        //$i=0;
        try{
            
            
            $data= array($usuario, $pass);
            $records= $this->conex->prepare("call obtenerUsuario(?,?);");
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
    
    public function updateInfoUsuario($idusuario, $nombre, $apellido, $correo){
        $i=0;
        try{
            
            
            $data= array($idusuario, $nombre, $apellido, $correo);
            $records= $this->conex->prepare("call updateInfoUsuario(?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
    public function updateInfoUsuarioAdmin($idusuario, $nombre, $apellido, $correo){
        $i=0;
        try{
            
            
            $data= array($idusuario, $nombre, $apellido, $correo);
            $records= $this->conex->prepare("call updateInfoUsuarioAdmin(?,?,?,?);");
            $i= $records->execute($data);
            
        } catch (Exception $ex) {

        }
        return $i;
    }
    
}
