<?php 

session_start();

require_once '../Util/Consultas.php';

    if(!empty($_POST)){
        
        if(isset($_POST["usuario"]) && isset($_POST["pass"])){
             if($_POST["usuario"]!="" && $_POST["pass"]!=""){
                 
                 //$usuario=$_POST["usuario"];
                 //$pass=$_POST["pass"];
                 //$user_id=null;
                 //$sql1= "select * from tbl_usuarios where(username=\"$_POST[usuario]\" or correo=\"$_POST[usuario]\") and password=\"$_POST[pass]\" and rol='cliente' ";
                 $consult= new Consultas();
                 
                 if ($consult->autenticacionAdmin($_POST["usuario"], $_POST["pass"])==true){
                     //$consult->getUsuario($_POST["usuario"], $_POST["pass"]);
                     $_SESSION['usuario1']=$_POST["usuario"];
                     $_SESSION['pass1']=$_POST["pass"];
                     header('Location:../Administrador/');
                 }else if ($consult->autenticacionCliente($_POST["usuario"], $_POST["pass"])==true){
                      //$consult->getUsuario($_POST["usuario"], $_POST["pass"]);
                      $_SESSION['usuario2']=$_POST["usuario"];
                      $_SESSION['pass2']=$_POST["pass"];
                      header('Location:../Clientes/');
                 }else{
                     $mensaje="Usuario y/o password incorrecto.";
                     $_SESSION['mensaje1']= $mensaje;
                     $_SESSION['nombreusuario']=$_POST["usuario"];
                     header('Location:../login');
                 }
                 /*
                 }else if($consult->autenticacionAdmin($_POST["usuario"], $_POST["pass"])==false){
                     $mensaje="Usuario y/o contraseña incorrectos";
                     $_SESSION['mensaje1']= $mensaje;
                     header('Location: /login.php');
                 }
                 */
             }else{
                 $mensaje="Ingrese el usuario y contraseña";
                 $_SESSION['mensaje1']= $mensaje;
                 header('Location:../login');
             }
        }             
    }
    
/*
    if(!empty($_POST)){
        if(isset($_POST["usuario"]) && isset($_POST["pass"])){
             if($_POST["usuario"]!="" && $_POST["pass"]!=""){
                 include "../Util/conexion.php";
                 
                 $user_id=null;
                 //$sql1= "select * from tbl_usuarios where(username=\"$_POST[usuario]\" or correo=\"$_POST[usuario]\") and password=\"$_POST[pass]\" and rol='cliente' ";
                 $sql1= "call validarCliente(\"$_POST[usuario]\",\"$_POST[pass]\")";
                 $query = $con->query($sql1);
                 while ($r=$query->fetch_array()){
                     $user_id=$r["id_usuario"];
                     break;
                 }
                 if($user_id!=null){
                    $_SESSION['user']=$_POST["usuario"];
                    $_SESSION['password']=$_POST['pass'];
                     $_SESSION["user_id1"]=$user_id;
                     print "<script>window.location='../Clientes/shop.php';</script>";
                 }
             }
             if($_POST["usuario"]!="" && $_POST["pass"]!=""){
                 include "../Util/conexion.php";
                 
                 $user_id2=null;
                 //$sql1= "select * from tbl_usuarios where(username=\"$_POST[usuario]\" or correo=\"$_POST[usuario]\") and password=\"$_POST[pass]\" and rol='cliente' ";
                 $sql2= "call validarAdmin(\"$_POST[usuario]\",\"$_POST[pass]\")";
                 $query = $con->query($sql2);
                 while ($r2=$query->fetch_array()){
                     $user_id2=$r2["id_usuario"];
                     break;
                 }
                 if($user_id2==null){
                     print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
                 }else{
                     
                     $_SESSION["user_id2"]=$user_id2;
                     print "<script>window.location='../Administrador/admin.php';</script>";
                 }
             }
        }
            
        
    }
 */
    
?>