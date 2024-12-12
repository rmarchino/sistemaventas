<?php

session_start();
    
require_once '../Util/Consultas.php';
require_once '../DAO/ModeloUsuario.php';


    if(!empty($_POST)){
        if(isset($_POST["txtnombre"]) && isset($_POST["txtapellido"]) && isset($_POST["txtusername"]) && isset($_POST["txtcorreo"]) && isset($_POST["txtpass"])){
            
            $nombre=$_POST['txtnombre'];
            $apellido=$_POST['txtapellido'];
            $username=$_POST['txtusername'];
            $correo=$_POST['txtcorreo'];
            $pass=$_POST['txtpass'];
            
            $cons = new Consultas();
            $objusuDAO = new ModeloUsuario();

            if($cons->comprobarCorreo($correo)==true){
                $_SESSION['errorcorreo']=1;
                header('Location:../signup');

            }elseif($cons->comprobarUser($username)==true){
                
                $_SESSION['erroruser']=1;
                header('Location:../signup');
                
            }elseif($cons->comprobarCorreo($correo)==false && $cons->comprobarUser($username)==false){
                
                $estado= $objusuDAO->InsertUsuario($nombre,$apellido,$username,$correo,$pass);
                
                if($estado==1){
                    $_SESSION['registrook']=1;
                    $_SESSION['usuario2']= $username;
                    $_SESSION['pass2']= $pass;
                    
                    //header('Location:../signup.php');
                    header('Location:../Clientes/');
                }else{
                    $_SESSION['ups']=1;
                    header('Location:../signup');
                }
                
            }
           
        }else{
            $_SESSION['ups']=1;
            header('Location:../signup');
        }
    }
    
?>