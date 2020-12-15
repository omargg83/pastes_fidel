<?php
	require_once("db_.php");
	if(!isset($_SESSION['idusuario']) or strlen($_SESSION['idusuario'])==0 or $_SESSION['autoriza']==0){
		header("location: login/");
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <title>SAGYC POS</title>

    <link rel="icon" type="image/png" href="img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">


    <link rel="stylesheet" href="demo.css" />
    <link rel="stylesheet" href="lib/load/css-loader.css">
    <!-- <link rel="stylesheet" type="text/css" href="lib/modulos.css"/>-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="chat/chat.css" />
    <link href="lib/animate.min.css" rel="stylesheet"/>
    

  </head>
  <?php
    $valor=$_SESSION['idfondo'];
    echo "<body style='background-image: url(\"$valor\")'>";
  ?>
    <div class="loader loader-double is-active" id='cargando_div'>
      <h2><span style='font-color:white'></span></h2>
    </div>


  <div class="grid-container">
   <div class="menu-icon">
    <i class="fas fa-bars header__menu"></i>
  </div>
   
  <header class="header">
    <div class="header__search">Search...</div>
    <div class="header__avatar">Your face</div>
  </header>

  <aside class="sidenav">
    <div class="sidenav__close-icon">
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>

    <ul class="sidenav__list">
      
      <li class="sidenav__list-item"><a href='#a_ventas/index' is='menu-link'><i class='fas fa-home'></i><span>Ventas</span></a></li>
      <li class="sidenav__list-item">Item Two</li>
      <li class="sidenav__list-item">Item Three</li>
      <li class="sidenav__list-item">Item Four</li>
      <li class="sidenav__list-item">Item Five</li>
    </ul>
  </aside>

  <main class="main" id='contenido'>
    <div class="main-header">
      <div class="main-header__heading">Hello User</div>
      <div class="main-header__updates">Recent Items</div>
    </div>

    <div class="main-overview">
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
    </div>

    <div class="main-cards">
      <div class="card">Card</div>
      <div class="card">Card</div>
      <div class="card">Card</div>
    </div>
  </main>

  <footer class="footer">
    <div class="footer__copyright">&copy; 2020 SAGYC</div>
    <div class="footer__signature">Made with love by pure genius</div>
  </footer>
</div>

 <!--   Core JS Files   -->
	<script src="lib/jquery-3.5.1.js" type="text/javascript"></script>

	<!--   url   -->
	<script src="lib/jquery/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="lib/jquery/jquery-ui.min.css" />



	<!--   Alertas   -->
	<script src="lib/swal/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="lib/swal/dist/sweetalert2.min.css">

	<!--   para imprimir   -->
	<script src="lib/VentanaCentrada.js" type="text/javascript"></script>

	<!--   Cuadros de confirmación y dialogo   -->
	<link rel="stylesheet" href="lib/jqueryconfirm/css/jquery-confirm.css">
	<script src="lib/jqueryconfirm/js/jquery-confirm.js"></script>

	<!--   iconos   -->
	<link rel="stylesheet" href="lib/fontawesome-free-5.12.1-web/css/all.css">

	<script src="lib/popper.min.js"></script>
	<script src="lib/tooltip.js"></script>

	<!--   Propios   -->
	<script src="chat/chat.js"></script>
  <script src="sagyc.js"></script>
	<script src="vainilla.js"></script>

	<link rel="stylesheet" type="text/css" href="lib/modulos.css"/>

	<!--- calendario -->
	<link href='lib/fullcalendar-4.0.1/packages/core/main.css' rel='stylesheet' />
	<link href='lib/fullcalendar-4.0.1/packages/daygrid/main.css' rel='stylesheet' />
	<link href='lib/fullcalendar-4.0.1/packages/timegrid/main.css' rel='stylesheet' />

	<script src='lib/fullcalendar-4.0.1/packages/core/main.js'></script>
	<script src='lib/fullcalendar-4.0.1/packages/interaction/main.js'></script>
	<script src='lib/fullcalendar-4.0.1/packages/daygrid/main.js'></script>
	<script src='lib/fullcalendar-4.0.1/packages/timegrid/main.js'></script>
	<script src='lib/fullcalendar-4.0.1/packages/core/locales/es.js'></script>

  <!--   Boostrap   -->
  
	<link rel="stylesheet" href="lib/boostrap/css/bootstrap.css">
	<script src="lib/boostrap/js/bootstrap.js"></script>


    <script>
      const menuIconEl = $('.menu-icon');
      const sidenavEl = $('.sidenav');
      const sidenavCloseEl = $('.sidenav__close-icon');

      // Add and remove provided class names
      function toggleClassName(el, className) {
        if (el.hasClass(className)) {
          el.removeClass(className);
        } else {
          el.addClass(className);
        }
      }

      // Open the side nav on click
      menuIconEl.on('click', function() {
        toggleClassName(sidenavEl, 'active');
      });

      // Close the side nav on click
      sidenavCloseEl.on('click', function() {
        toggleClassName(sidenavEl, 'active');
      });
    </script>
  </body>
</html>
