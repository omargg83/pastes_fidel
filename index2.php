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
            /*
            echo "<ul class='sidenav__list'>";
              echo "<li class='sidenav__list-item'><a href='#dash/index' is='menu-link'><i class='fas fa-home'></i><span>Inicio</span></a></li>";
            */
              if((array_key_exists('VENTA', $db->derecho) and $_SESSION['a_sistema']==1) or $_SESSION['nivel']==66)
              echo "<li><a href='#a_venta/venta' id='ventax' is='menu-link' title='Pedidos'><i class='fas fa-cash-register'></i><span>+ Venta</span></a></li>";
            
              /*
              if(array_key_exists('VENTAREGISTRO', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class='sidenav__list-item'><a href='#a_ventas/index' id='ventas' is='menu-link' title='Pedidos'><i class='fas fa-shopping-basket'></i><span>Ventas</span></a></li>";

              if(array_key_exists('COMPRAS', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class='sidenav__list-item'><a href='#a_compras/index' is='menu-link' title='Compras'><i class='fas fa-shopping-bag'></i><span>Compras</span></a></li>";

              if((array_key_exists('PRODUCTOS', $db->derecho) and $_SESSION['matriz']==1) or $_SESSION['nivel']==66)
              echo "<li class='sidenav__list-item'><a href='#a_productos/index' is='menu-link' title='Productos'><i class='fab fa-product-hunt'></i><span>Catalogo</span></a></li>";

              if(array_key_exists('INVENTARIO', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class='sidenav__list-item'><a href='#a_inventario/index' is='menu-link' title='inventario'><i class='fas fa-boxes'></i><span>Inventario</span></a></li>";

              if(array_key_exists('CLIENTES', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class='sidenav__list-item'><a href='#a_cliente/index' is='menu-link' title='Clientes'><i class='fas fa-user-tag'></i><span>Clientes</span></a></li>";

              if(array_key_exists('CITAS', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class='sidenav__list-item'><a href='#a_citas/index' is='menu-link' title='Citas'><i class='far fa-calendar-check'></i><span>Citas/Agenda</span></a></li>";

              if(array_key_exists('PROVEEDORES', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class='sidenav__list-item'><a href='#a_proveedores/index' is='menu-link' title='Proveedores'><i class='fas fa-people-carry'></i><span>Proveedores</span></a></li>";

              if(array_key_exists('TRASPASOS', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class='sidenav__list-item'><a href='#a_traspasos/index' is='menu-link' title='Traspasos'><i class='fas fa-arrows-alt-h'></i><span>Traspasos</span></a></li>";

              if(array_key_exists('GASTOS', $db->derecho) or $_SESSION['nivel']==66)
                  echo "<li class='sidenav__list-item'><a href='#a_gastos/index' is='menu-link' title='Datosemp'><i class='fas fa-donate'></i><span>Gastos</span></a></li>";

              if(array_key_exists('REPORTES', $db->derecho) and $_SESSION['a_sistema']==1)
              echo "<li class='sidenav__list-item'><a href='#a_reporte/index' is='menu-link' title='Reportes'><i class='far fa-chart-bar'></i> <span>Reportes</span></a></li>";

              if(array_key_exists('USUARIOS', $db->derecho) or $_SESSION['nivel']==66)
              echo "<li class='sidenav__list-item'><a href='#a_usuarios/index' is='menu-link' title='Usuarios'><i class='fas fa-users'></i> <span>Usuarios</span></a></li>";

              if(array_key_exists('DATOSEMP', $db->derecho) or $_SESSION['nivel']==66)
                  echo "<li class='sidenav__list-item'><a href='#a_datosemp/index' is='menu-link' title='Datos de la empresa'><i class='fas fa-wrench'></i><span>Datos Emp.</span></a></li>";

              if(array_key_exists('SUPERVISOR', $db->derecho) or $_SESSION['nivel']==66)
                  echo "<li class='sidenav__list-item'><a href='#a_supervisor/index' is='menu-link' title='Supervisor'><i class='far fa-eye'></i><span>Supervisor</span></a></li>";
              echo "</ul>";
              */
          ?>



          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Dashboard 1
                    
                  </a>
                </li>
                <li>
                  <a href="#">Dashboard 2</a>
                </li>
                <li>
                  <a href="#">Dashboard 3</a>
                </li>
              </ul>
            </div>
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
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-gem"></i>
              <span>Components</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">General</a>
                </li>
                <li>
                  <a href="#">Panels</a>
                </li>
                <li>
                  <a href="#">Tables</a>
                </li>
                <li>
                  <a href="#">Icons</a>
                </li>
                <li>
                  <a href="#">Forms</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>Charts</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Pie chart</a>
                </li>
                <li>
                  <a href="#">Line chart</a>
                </li>
                <li>
                  <a href="#">Bar chart</a>
                </li>
                <li>
                  <a href="#">Histogram</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span>Maps</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Google maps</a>
                </li>
                <li>
                  <a href="#">Open street map</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Documentation</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Examples</span>
            </a>
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
