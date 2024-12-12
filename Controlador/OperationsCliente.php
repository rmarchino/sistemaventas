<?php

session_start();

require_once '../DAO/ModeloCliente.php';
require_once '../DAO/ModeloUsuario.php';
require_once '../DAO/Formato.php';
require_once '../Util/Consultas.php';

$op=$_POST['op'];

$consultas= new Consultas();
    
$usuarioDAO= new ModeloUsuario();

if($op==1){
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

}elseif($op==2){
    
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
    
    }else if($consultas->comprobarClaveUser($idusuario, $passactual)==true){

        if($pass1 == $pass2){
            $estado= $consultas->updatePass($idusuario, $pass2);
            
            $_SESSION['pass2']= $pass2;
            
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
    
}elseif($op==3){
    
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

                        $clienteDAO = new ModeloCliente();
                        $estado= $clienteDAO->updateImagenCliente($idcliente, $ruta1);

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

                $clienteDAO = new ModeloCliente();
                $estado= $clienteDAO->updateImagenCliente($idcliente, $ruta1);

        }else{
                
            ?>

                <script>

                       swal("Ups, ocurrió algo", "Algo pasó de forma inesperada", "error");

               </script>      

            <?php
            
        }
    }
    
}elseif($op==4){
    
    $idcliente=$_POST['idcliente'];
    $tipodoc=$_POST['tipodoc'];
    $numdoc=$_POST['numdoc'];
    $ubigeo=$_POST['ubigeo'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    
    $clienteDAO = new ModeloCliente();
    $estadoupd= $clienteDAO->updateInformacionCliente($idcliente, $tipodoc, $numdoc, $ubigeo, $direccion, $telefono);
        
        ?>
        
        <script>

                swal("Información actualizada!", "Los datos se actualizaron de forma correcta!", "success");
                function myFunction() {
                    location.reload();
                  }
                  setTimeout(myFunction, 1800);
        </script>
        
<?php
}
?>



