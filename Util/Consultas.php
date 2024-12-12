<?php

require_once "../Util/ConexionBD.php";

class Consultas{
    
    public $mysql;
    public $conex;
    
    public function __construct() {
        $this->mysql = new ConexionBD();
        $this->conex= $this->mysql->getConexionBD();
    }
    
    public function autenticacionAdmin($usuario, $pass){
        try{
            
            
            $data= array($usuario, $pass);
            $records= $this->conex->prepare("call validarAdmin(?,?);");
            $records->execute($data);
            
            if($records->rowCount()){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {
            
        }
    }
    
    public function autenticacionCliente($usuario, $pass){
        try{
            
            
            $data= array($usuario, $pass);
            $records= $this->conex->prepare("call validarCliente(?,?);");
            $records->execute($data);
            
            if($records->rowCount()){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {
            
        }
    }
    
    public function comprobarCorreo($correo){
        //$i=0;
        try{
            
            
            $data= array($correo);
            $records= $this->conex->prepare("call comprobarCorreo(?);");
            $records->execute($data);
            
            if($records->rowCount()){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {

        }
    }
    
    public function comprobarCorreoById($iduser, $correo){
        //$i=0;
        try{
            
            
            $data= array($iduser, $correo);
            $records= $this->conex->prepare("call comprobarCorreoById(?,?);");
            $records->execute($data);
            
            if($records->rowCount()){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {

        }
    }
    
    public function updatePass($iduser, $pass){
        //$i=0;
        try{
            
            
            $data= array($iduser, $pass);
            $records= $this->conex->prepare("call updatePass(?,?);");
            $records->execute($data);
            
            if($records->rowCount()){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {

        }
    }
    
    public function ComprobarClaveUser($iduser, $pass){
        //$i=0;
        try{
            
            
            $data= array($iduser, $pass);
            $records= $this->conex->prepare("call ComprobarClaveUser(?,?);");
            $records->execute($data);
            
            if($records->rowCount()){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {

        }
    }
    
    public function comprobarUser($user){
        //$i=0;
        try{
            
            
            $data= array($user);
            $records= $this->conex->prepare("call comprobarUser(?);");
            $records->execute($data);
            
            if($records->rowCount()){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {

        }
    }
    

}
