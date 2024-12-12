
<?php 

    session_start();
    
    if(!empty($_SESSION['usuario1']) && !empty($_SESSION['pass1'])){
        header('Location: ./Administrador/');
    }elseif (!empty($_SESSION['usuario2']) && !empty($_SESSION['pass2'])) {
        header('Location: ./Clientes/');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Sistema LOGICLAYER S.A.C</title>

<!--

Template 2099 Scenic

http://www.tooplate.com/view/2099-scenic

-->

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<link href="css/bootstrap.min_1.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/font-awesome.min_1.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/owl.theme.css">
<link rel="stylesheet" href="css/owl.carousel.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="css/tooplate-style.css">
<link rel="icon" type="image/png" href="imagenes/foto.png" />

</head>
<body>

<!-- PRE LOADER -->
<div class="preloader">
     <div class="spinner">
          <span class="sk-inner-circle"></span>
     </div>
</div>


<!-- MENU -->
<div class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">

          <!-- NAVBAR HEADER -->
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
               <!-- lOGO -->
               <a href="" class="navbar-brand">LOGICLAYER</a>
          </div>

          <!-- MENU LINKS -->
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" class="smoothScroll">Principal</a></li>
                    <li><a href="#about" class="smoothScroll">Cónocenos</a></li>
                    <li><a href="#team" class="smoothScroll">Sobre nosotros</a></li>  
                    <li><a href="login" class="smoothScroll">Ingresar</a></li>
               </ul>
          </div>

     </div>
</div>


<!-- HOME -->
<section id="home" class="parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-8 col-sm-12">
                    <div class="home-text">
                         <h1>Comprar nunca fue tan fácil</h1>
                         <p>Estamos para ofrecerte productos de primera calidad y atención especializada.</p>
                         <ul class="section-btn">
                              <a href="#about" class="smoothScroll"><span data-hover="Explorar">Vamos allá!</span></a>
                         </ul>
                    </div>
               </div>

          </div>
     </div>

     <!-- Video -->
     <video controls autoplay loop muted>
         <source src="videos/videosupermercado_of.mp4" type="video/mp4">
          Your browser does not support the video tag.
     </video>
</section>


<!-- ABOUT -->
<section id="about" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="about-info">
                        <h2><b>¿QUÉ ES LOGICLAYER?</b></h2>
                         <h2>Es un sistema desarrollado para administradores y clientes para 
                         compra y ventas mediante un catálogo de productos.</h2>
                        <br><br>
                         <h1>En Sistema LOGICLAYER encontrarás las siguientes categorías:</h1>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- PROJECT -->
<section id="project" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">
                         <a href="imagenes/imagen1.jpg" class="image-popup">
                              <img src="imagenes/frutas1.jpg" class="img-responsive" alt="">

                         <a href="imagenes/images/imagen1.jpg" class="image-popup">
                              <img src="imagenes/images/frutas1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Frutas</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">

                         <a href="images/imagen2.jpg" class="image-popup">
                              <img src="images/verduras1.jpg" class="img-responsive" alt="">

                         <a href="imagenes/images/imagen2.jpg" class="image-popup">
                              <img src="imagenes/images/verduras1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Verduras</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>
              
               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">

                         <a href="imagenes/imagen3.jpg" class="image-popup">
                              <img src="imagenes/abarrotes1.jpg" class="img-responsive" alt="">

                         <a href="imagenes/images/imagen3.jpg" class="image-popup">
                              <img src="imagenes/images/abarrotes1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Abarrotes</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">

                         <a href="imagenes/imagen4.jpg" class="image-popup">
                              <img src="imagenes/dulces1.jpg" class="img-responsive" alt="">

                         <a href="imagenes/images/imagen4.jpg" class="image-popup">
                              <img src="imagenes/images/dulces1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Dulces</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>
              
              <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">

                         <a href="imagenes/imagen5.jpg" class="image-popup">
                              <img src="imagenes/lacteos1.jpg" class="img-responsive" alt="">

                         <a href="imagenes/images/imagen5.jpg" class="image-popup">
                              <img src="imagenes/images/lacteos1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Lácteos</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>
              
              <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">

                         <a href="imagenes/imagen6.jpg" class="image-popup">

                         <a href="imagenes/images/imagen6.jpg" class="image-popup">
                              <img src="imagenes/images/menestras1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Menestras</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>
              
              <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">

                         <a href="imagenes/imagen7.jpg" class="image-popup">
                              <img src="imagenes/embutidos1.jpg" class="img-responsive" alt="">

                         <a href="imagenes/images/imagen7.jpg" class="image-popup">
                              <img src="imagenes/images/embutidos1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Embutidos</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>
              
              <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">

                         <a href="imagenes/imagen8.jpg" class="image-popup">
                              <img src="imagenes/carnes1.jpg" class="img-responsive" alt="">

                         <a href="imagenes/images/imagen8.jpg" class="image-popup">
                              <img src="imagenes/images/carnes1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Carnes y pescados</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>
              
              <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">

                         <a href="imagenes/imagen9.jpg" class="image-popup">
                              <img src="imagenes/cereales1.jpg" class="img-responsive" alt="">

                         <a href="imagenes/images/imagen9.jpg" class="image-popup">
                              <img src="imagenes/images/cereales1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Cereales</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>
              
              <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">

                         <a href="imagenes/imagen10.jpg" class="image-popup">
                              <img src="imagenes/pastas1.jpg" class="img-responsive" alt="">

                         <a href="imagenes/images/imagen10.jpg" class="image-popup">
                              <img src="imagenes/images/pastas1.jpg" class="img-responsive" alt="">

                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Pastas</h1>
                                        <h3>Clic para ver imagen referencial</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- TEAM -->
<section id="team" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="section-title">
                         <h1>Conoce a nuestro equipo</h1>
                    </div>
               </div>

               <div class="clearfix"></div>

               <div id="owl-team" class="owl-carousel">
                    <div class="col-md-4 col-sm-4 item">
                         <div class="team-item">
                             <img src="imagenes/images/fondo.jpg" class="img-responsive" alt="" width="350px" height="350px">
                              <div class="team-overlay">
                                   <ul class="social-icon">
                                        <li><a href="" target="_blank" class="fa fa-facebook"></a></li>
                                        <li><a href="" target="_blank" class="fa fa-linkedin"></a></li>
                                        <li><a href="" target="_blank" class="fa fa-github"></a></li>
                                   </ul>
                              </div>
                         </div>
                         <p>Robert Marchino</p>
                         <h3>Gerente de TI</h3>
                    </div>
                   
               </div>

          </div>
     </div>
</section>


<!-- CONTACT -->
<section id="contact" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-3 col-md-6 col-sm-12">
                    <div class="section-title">
                         <h1>Escríbenos!</h1>
                    </div>
               </div>

               <div class="clearfix"></div>

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <!-- CONTACT FORM HERE -->
                    <form id="contact-form" action="mailto:anderson.fuentes@ieee.org" method="post" role="form" enctype="text/plain">

                         <!-- IF MAIL SENT SUCCESSFULLY -->
                         <h6 class="text-success">Your message has been sent successfully. </h6>
                         
                         <!-- IF MAIL SENDING UNSUCCESSFULL -->
                         <h6 class="text-danger">E-mail must be valid and message must be longer than 1 character.</h6>

                         <div class="col-md-6 col-sm-6">
                              <input type="text" class="form-control" id="cf-name" name="Nombre:" placeholder="Nombre">
                         </div>

                         <div class="col-md-6 col-sm-6">
                              <input type="email" class="form-control" id="cf-email" name="E-mail" placeholder="Dirección de correo electrónico">
                         </div>

                         <div class="col-md-12 col-sm-12">
                              <input type="text" class="form-control" id="cf-subject" name="Asunto" placeholder="Asunto">
                              <textarea class="form-control" rows="5" id="cf-message" name="Mensaje" placeholder="Mensaje"></textarea>
                         </div>

                         <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4">
                              <div class="section-btn">
                                   <button type="submit" class="form-control" id="cf-submit" name=""><span data-hover="Enviar mensaje">Enviar mensaje</span></button>
                              </div>
                         </div>
                    </form>
               </div>

          </div>
     </div>
</section>

<!-- FOOTER -->
<footer>
     <div class="container">
          <div class="row">

               <div class="col-md-5 col-sm-6">
                    <h2>LOGICLAYER</h2>
                    <p>Primero de mayo<br> San Juan de Miraflores<br> Lima - Perú</p>
                    
                    
               </div>

               <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                    	<h2>Conócenos</h2>
                         <p><a href="tel:010-090-0780">+51 - 972487645</a></p>
                         <p><a href="mailto:anderson.fuentes@ieee.org">logiclayer@gmail.com</a></p>
                         <p><a href="https://www.google.com/maps/place/Universidad+Aut%C3%B3noma+del+
                               Per%C3%BA/@-12.1956783,-76.9717862,19.12z/data=!4m5!3m4!1s0x91157f78ac
                               4dc955:0xd267131e6b012132!8m2!3d-12.195444!4d-76.9719563" target="_blank">Ubicación</a></p>
                    </div>
               </div>

               <div class="col-md-3 col-sm-12">
               		
                    <h2>Sobre nosotros</h2>
                    <p>Somos un grupo de estudiantes universitarios y traemos a MarketApp.</p>
                    <ul class="social-icon">
                         <li><a href="https://twitter.com/autonomadelperu" target="_blank" class="fa fa-twitter"></a></li>
                         <li><a href="https://es-la.facebook.com/autonomadelperu/" target="_blank" class="fa fa-facebook"></a></li>
                         <li><a href="https://www.instagram.com/uautonoma/?hl=es-la" target="_blank" class="fa fa-instagram"></a></li>
                         <li><a href="https://pe.linkedin.com/school/universidad-aut%C3%B3noma-del-per%C3%BA/" target="_blank" class="fa fa-linkedin"></a></li>
                    </ul>
                    
               </div>

               <div class="clearfix"></div>

               <div class="col-md-12 col-sm-12">
                    <div class="copyright-text">
                         <p>LOGICLAYER © 2024 All rights reserved 
                         
                         | Desarrollado por: LOGICLAYER S.A.C</p>
                    </div>
               </div>
               
          </div>
     </div>
</footer>

<!-- SCRIPTS -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>


</body>
</html>
