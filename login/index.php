<?php 

    session_start();
    
    if(!empty($_SESSION['usuario1']) && !empty($_SESSION['pass1'])){
        header('Location: ../Administrador/');
    }elseif (!empty($_SESSION['usuario2']) && !empty($_SESSION['pass2'])) {
        header('Location: ../Clientes/');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGICLAYER</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <script src="../js/sweetalert2.js" type="text/javascript"></script>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>
        <script src="../js/sweetalert.js" type="text/javascript"></script>
        
        <link href="../css/sweetalert.css" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="../css/login.css">
        <link href="../css/estilos_3.css" rel="stylesheet" type="text/css"/>
        <link href="../css/loader.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" href="../imagenes/foto.png" />
</head>
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
    
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
              <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner" style="">
                  <div class="carousel-item active">
                      <img class="d-none d-sm-none d-md-block w-120" style="height: 670px; pointer-events: none" src="../imagenes/supermercado.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                      <img class="d-none d-sm-none d-md-block w-110" style="height: 670px; width: 800px; pointer-events: none" src="../imagenes/super2.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                      <img class="d-none d-sm-none d-md-block w-110" style="height: 670px; width: 800px; pointer-events: none" src="../imagenes/super3.jpg" alt="Third slide">
                  </div>
                </div>
              </div>
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper" style="text-decoration:none">
                  <a href="../"  style=" text-decoration: none"><img style="pointer-events: none;" src="../imagenes/foto.png" alt="logo" class="logo" width="85" height="85"> <b style="font-size: 28px;">LOGICLAYER</b></a>
              </div>
              <p class="login-card-description">Bienvenido, inicia sesión</p>
              <form action="../Controlador/InicioSesion.php" method="post">
                  <div class="form-group">
                    <label for="email" class="sr-only">Usuario</label>
                    
                    <?php if(isset($_SESSION['nombreusuario'])){?>
                            <input type="text" name="usuario" id="email" class="form-control" autofocus="true" value="<?= $_SESSION['nombreusuario'] ?>" placeholder="Nombre de usuario">
                    <?php 
                            unset($_SESSION['nombreusuario']);
                          }else{?>
                            <input type="text" name="usuario" id="email" class="form-control" autofocus="true" required="true" placeholder="Nombre de usuario">
                    <?php }?>
                            
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input type="password" name="pass" id="password" class="form-control" required="true" placeholder="Contraseña">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Iniciar sesión">
                  <div class="form-group mb-4" style="color:red; font-size:14px">
                  </div>
                  <div class="modal fade" id="dialogo1">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- cabecera del diálogo -->
                        <div class="modal-header">
                          <h4 class="modal-title" style="color: slategrey;">TÉRMINOS DE USO</h4>
                          <button type="button" class="close" data-dismiss="modal">X</button>
                        </div>

                        <!-- cuerpo del diálogo -->
                        <div class="modal-body" style="text-align: justify;">
                            INFORMACIÓN RELEVANTE <br><br>

                        Es requisito necesario para la adquisición de los servicios que se ofrecen en este sitio, 
                        que lea y acepte los siguientes Términos y Condiciones que a continuación se redactan. 
                        <br> El uso de nuestros servicios así como la reserva de nuestros servicios implicará que usted ha leído 
                        y aceptado los Términos y Condiciones de Uso en el presente documento. <br>Todos los servicios  que son 
                        ofrecidos por nuestro sitio web pudieran ser creadas, cobradas, enviadas o presentadas por una página web 
                        tercera y en tal caso estarían sujetas a sus propios Términos y Condiciones. En algunos casos, para adquirir 
                        un servicio, será necesario el registro por parte del usuario, con ingreso de datos personales fidedignos y 
                        definición de una contraseña.

                        <br>El usuario puede elegir y cambiar la clave para su acceso de administración de la cuenta en cualquier momento, 
                        en caso de que se haya registrado y que sea necesario para la reserva de alguno de nuestros servicios. 
                        <br>Sistema LOGICLAYER no asume la responsabilidad en caso de que entregue dicha clave a terceros.
                     
                        <!--Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros servicios, modificado o sin 
                        modificar. Todos los servicios son propiedad  de los proveedores del contenido. -->
                        </div>

                        <!-- pie del diálogo -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>

                      </div>
                    </div>
                   </div> 
                  
                  <div class="modal fade" id="dialogo2">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- cabecera del diálogo -->
                        <div class="modal-header">
                          <h4 class="modal-title" style="color: slategrey;">POLITICA DE PRIVACIDAD</h4>
                          <button type="button" class="close" data-dismiss="modal">X</button>
                        </div>

                        <!-- cuerpo del diálogo -->
                        <div class="modal-body" style="text-align: justify;">
                            ACERCA DE: <br><br>

                        Sistema LOGICLAYER usa y protege la información que es proporcionada por los usuarios al momento 
                        de utilizar su sitio web. Estamos comprometidos con la seguridad de los datos de los usuarios. 
                        <br>
                        Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, 
                        lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo 
                        esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y 
                        enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.
                        
                        <!--Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros servicios, modificado o sin 
                        modificar. Todos los servicios son propiedad  de los proveedores del contenido. -->
                        </div>

                        <!-- pie del diálogo -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>

                      </div>
                    </div>
                  </div> 
                  
                </form>
                <p class="login-card-footer-text">No tienes una cuenta? <a href="../signup" class="text-reset">Regístrate aquí</a></p>
                <nav class="login-card-footer-nav">
                    <a href="" data-toggle="modal" data-target="#dialogo1">Términos de uso</a><br>
                  <a href="" data-toggle="modal" data-target="#dialogo2">Política de privacidad</a>
                  <div class="underlay-photo"></div>
                  <div class="underlay-black"></div>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
    
   <?php
      if(isset($_SESSION['mensaje1'])){

          ?>

          <script type="text/javascript">
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuario y/o password incorrecto',
                        text: 'Inténtalo de nuevo'
                      })
          </script>

      <?php
      
      unset($_SESSION['mensaje1']);
      }
  ?>
    
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>