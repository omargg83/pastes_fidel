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

	<div class="modal" tabindex="-1" role="dialog" id="myModal" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-xl" role="document" id='modal_dispo'>
			<div class="modal-content" id='modal_form'>

			</div>
		</div>
	</div>


  <div class="grid-container">
   <div class="menu-icon">
    <i class="fas fa-bars header__menu"></i>
  </div>

  <header class="header">
    <div class="header__search"><?php echo trim($_SESSION['n_sistema']); ?></div>
    <div class="header__avatar">


      <ul class='nav navbar-nav navbar-right px-1' id='chatx'></ul>

      <?php
        if($_SESSION['a_sistema']==1){
          echo "<ul class='nav navbar-nav navbar-right px-1' id='fondo'></ul>";
        }
      ?>
      <ul class='nav navbar-nav navbar-right px-1' id='precios'>
        <?php
          if($_SESSION['a_sistema']==1){
            echo "<li class='nav-item'>";
          echo "<a class='nav-link pull-left bg-warning rounded' is='b-link' des='a_precios/index' omodal='1'>";
          echo "<i class='fas fa-search-dollar'></i>";
          echo "</a>";
        echo "</li>";
          }
        ?>
      </ul>


      <ul class='nav navbar-nav navbar-right px-1'>
        <li class='nav-item'>
          <a class='nav-link pull-left border border-warning rounded' onclick='salir()'>
            <i class='fas fa-sign-out-alt text-red'></i>
          </a>
        </li>
      </ul>
    </div>

  </header>

  <aside class="sidenav">
    <div class="sidenav__close-icon">
      <i class="fas fa-times sidenav__brand-close"></i>
    </div>



    <div class="sidebar-header">
      <div class="user-pic">
        <?php
          if(strlen($_SESSION['foto'])>0 and file_exists($db->f_usuarios."/".$_SESSION['foto'])){
            echo "<img class='img-responsive img-rounded' src='".$db->f_usuarios.$_SESSION['foto']."' alt='User picture'>";
          }
          else{
            echo "<img class='img-responsive img-rounded' src='img/user.jpg' alt='User picture'>";
          }
        ?>
      </div>
      <div class="user-info">
        <span class="user-name"><?php echo $_SESSION['nombre']; ?>
        </span>
        <span class="user-role">Administrator</span>
        <span class="user-status">
          <i class="fa fa-circle"></i>
          <span>Online</span>
        </span>
      </div>
    </div>

     <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>

          <li>
            <a href='#dash/index' is='menu-link'>
              <i class='fas fa-home'></i>
              <span>Inicio</span>
            </a>
          </li>

           <?php

              if((array_key_exists('VENTA', $db->derecho) and $_SESSION['a_sistema']==1) or $_SESSION['nivel']==66)
              echo "<li><a href='#a_venta/venta' id='ventax' is='menu-link' title='Pedidos'><i class='fas fa-cash-register'></i><span>+ Venta</span></a></li>";

              if(array_key_exists('VENTAREGISTRO', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class=''><a href='#a_ventas/index' id='ventas' is='menu-link' title='Pedidos'><i class='fas fa-shopping-basket'></i><span>Ventas</span></a></li>";

              if(array_key_exists('COMPRAS', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class=''><a href='#a_compras/index' is='menu-link' title='Compras'><i class='fas fa-shopping-bag'></i><span>Compras</span></a></li>";

              if((array_key_exists('PRODUCTOS', $db->derecho) and $_SESSION['matriz']==1) or $_SESSION['nivel']==66)
              echo "<li class=''><a href='#a_productos/index' is='menu-link' title='Productos'><i class='fab fa-product-hunt'></i><span>Catalogo</span></a></li>";

              if(array_key_exists('INVENTARIO', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class=''><a href='#a_inventario/index' is='menu-link' title='inventario'><i class='fas fa-boxes'></i><span>Inventario</span></a></li>";

              if(array_key_exists('CLIENTES', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class=''><a href='#a_cliente/index' is='menu-link' title='Clientes'><i class='fas fa-user-tag'></i><span>Clientes</span></a></li>";

              if(array_key_exists('CITAS', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class=''><a href='#a_citas/index' is='menu-link' title='Citas'><i class='far fa-calendar-check'></i><span>Citas/Agenda</span></a></li>";

              if(array_key_exists('PROVEEDORES', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class=''><a href='#a_proveedores/index' is='menu-link' title='Proveedores'><i class='fas fa-people-carry'></i><span>Proveedores</span></a></li>";

              if(array_key_exists('TRASPASOS', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class=''><a href='#a_traspasos/index' is='menu-link' title='Traspasos'><i class='fas fa-arrows-alt-h'></i><span>Traspasos</span></a></li>";

              if(array_key_exists('GASTOS', $db->derecho) or $_SESSION['nivel']==66)
                  echo "<li class=''><a href='#a_gastos/index' is='menu-link' title='Datosemp'><i class='fas fa-donate'></i><span>Gastos</span></a></li>";

              if(array_key_exists('REPORTES', $db->derecho) and $_SESSION['a_sistema']==1)
              echo "<li class=''><a href='#a_reporte/index' is='menu-link' title='Reportes'><i class='far fa-chart-bar'></i> <span>Reportes</span></a></li>";

              if(array_key_exists('USUARIOS', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class=''><a href='#a_usuarios/index' is='menu-link' title='Usuarios'><i class='fas fa-users'></i> <span>Usuarios</span></a></li>";

              if(array_key_exists('DATOSEMP', $db->derecho) or $_SESSION['nivel']==66)
                  echo "<li class=''><a href='#a_datosemp/index' is='menu-link' title='Datos de la empresa'><i class='fas fa-wrench'></i><span>Datos Emp.</span></a></li>";

              if(array_key_exists('SUPERVISOR', $db->derecho) or $_SESSION['nivel']==66)
                  echo "<li class=''><a href='#a_supervisor/index' is='menu-link' title='Supervisor'><i class='far fa-eye'></i><span>Supervisor</span></a></li>";

          ?>
            <li class="header-menu">
              <span>Empresa</span>
            </li>

            <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>E-commerce</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Products

                  </a>
                </li>
                <li>
                  <a href="#">Orders</a>
                </li>
                <li>
                  <a href="#">Credit cart</a>
                </li>
              </ul>
            </div>
          </li>

          </ul>
      </div>

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

      $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
          $(this)
            .parent()
            .hasClass("active")
        ) {
          $(".sidebar-dropdown").removeClass("active");
          $(this)
            .parent()
            .removeClass("active");
        } else {
          $(".sidebar-dropdown").removeClass("active");
          $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
          $(this)
            .parent()
            .addClass("active");
        }
      });



    </script>
  </body>
</html>