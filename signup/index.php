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
	<title>Regístrate en Sistema LOGICLAYER</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/login.css">
        <link href="../css/estilos_3.css" rel="stylesheet" type="text/css"/>
        <link href="../css/loader.css" rel="stylesheet" type="text/css"/>
        
        <script src="../js/sweetalert2.js" type="text/javascript"></script>
        <script src="../js/sweetalert.min.js" type="text/javascript"></script>
        <script src="../js/sweetalert.js" type="text/javascript"></script>
        
        <link href="../css/sweetalert.css" rel="stylesheet" type="text/css"/>
        
        <link rel="icon" type="image/png" href="../imagenes/foto.png" />
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(window).on('load', function () {
                setTimeout(function () {
              $(".loader-page").css({visibility:"hidden",opacity:"0"})
            }, 200);

          });
    </script>
    
    <div class="loader-page"></div>
    
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
              <img style="pointer-events: none;" src="../imagenes/products.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper" style="text-decoration:none">
                  <a href="../login"  style=" text-decoration: none"><img style="pointer-events: none;" src="../imagenes/foto.png" alt="logo" class="logo" width="85" height="85"> <b style="font-size: 28px;">LOGICLAYER</b></a>
              </div>
              <form action="../Controlador/RegistroClientes.php" method="post">
                  <div class="form-group">
                    <label for="text" class="sr-only">Nombres</label>
                    <input type="text" name="txtnombre" id="email" class="form-control" autofocus="true" required="true" placeholder="Nombres">
                  </div>
                  <div class="form-group mb-4">
                    <label for="text" class="sr-only">Apellidos</label>
                    <input type="text" name="txtapellido" id="password" class="form-control" required="true" placeholder="Apellidos">
                  </div>
                  <div class="form-group mb-4">
                    <label for="text" class="sr-only">Nombre de usuario</label>
                    <input type="text" name="txtusername" id="password" class="form-control" required="true" placeholder="Nombre de usuario">
                  </div>
                  <div class="form-group mb-4">
                    <label for="email" class="sr-only">Correo electrónico</label>
                    <input type="email" name="txtcorreo" id="password" class="form-control" required="true" placeholder="Correo electrónico">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input type="password" name="txtpass" id="password" class="form-control" required="true" placeholder="Contraseña">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Registrarse en LOGICLAYER">
                  
                </form>
                
                <nav class="login-card-footer-nav">
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
      if(isset($_SESSION['errorcorreo'])){

          ?>

          <script type="text/javascript">
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups, el correo ya existe',
                        text: 'Intente con otro correo electrónico'
                      })
                </script>

      <?php
      
      unset($_SESSION['errorcorreo']);
      }
  ?>
                
  <?php
      if(isset($_SESSION['erroruser'])){

          ?>

          <script type="text/javascript">
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups, el nombre de usuario ya existe',
                        text: 'Intente con otro username'
                      })
                </script>

      <?php
      
      unset($_SESSION['erroruser']);
      }
  ?>
                
  <?php
      if(isset($_SESSION['ups'])){

          ?>

          <script type="text/javascript">
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups, algo pasó'
                      })
                </script>

      <?php
      
      unset($_SESSION['ups']);
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