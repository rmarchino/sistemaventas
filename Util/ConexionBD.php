<?php 

class ConexionBD{

    public function getConexionBD(){

        try{
            $conn= new PDO('mysql:host=localhost;dbname=sistema_ventas','root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            //echo "Todo bien";
        } catch (PDOException $e) {
            die("Conexion fallida".$e->getMessage());
        }
        return $conn;
    }
}
   

