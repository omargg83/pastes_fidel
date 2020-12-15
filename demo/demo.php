<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style>

      .footer {
        grid-area: footer;
        background-color: #648ca6;
      }

      body {
        margin: 0;
        padding: 0;
        color: #fff;
        font-family: 'Open Sans', Helvetica, sans-serif;
        box-sizing: border-box;
      }

      /* Assign grid instructions to our parent grid container, mobile-first (hide the sidenav) */
      .grid-container {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 50px 1fr 50px;
        grid-template-areas:
          'header'
          'main'
          'footer';
        height: 100vh;
      }

      .menu-icon {
        position: fixed; /* Needs to stay visible for all mobile scrolling */
        display: flex;
        top: 5px;
        left: 10px;
        align-items: center;
        justify-content: center;
        background-color: #DADAE3;
        border-radius: 50%;
        z-index: 1;
        cursor: pointer;
        padding: 12px;
      }

      /* Give every child element its grid name */
      .header {
        grid-area: header;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        background-color: #648ca6;
      }

      /* Make room for the menu icon on mobile */
      .header__search {
        margin-left: 42px;
      }

      .sidenav {
        grid-area: sidenav;
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 240px;
        position: fixed;
        overflow-y: auto;
        transform: translateX(-245px);
        transition: all .6s ease-in-out;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16), 0 0 0 1px rgba(0, 0, 0, 0.08);
        z-index: 2; /* Needs to sit above the hamburger menu icon */
        background-color: #394263;
      }

      .sidenav.active {
        transform: translateX(0);
      }

      .sidenav__close-icon {
        position: absolute;
        visibility: visible;
        top: 8px;
        right: 12px;
        cursor: pointer;
        font-size: 20px;
        color: #ddd;
      }

      .sidenav__list {
        padding: 0;
        margin-top: 85px;
        list-style-type: none;
      }

      .sidenav__list-item {
        padding: 20px 20px 20px 40px;
        color: #ddd;
      }

      .sidenav__list-item:hover {
        background-color: rgba(255, 255, 255, 0.2);
        cursor: pointer;
      }

      .main {
        grid-area: main;
        background-color: #8fd4d9;
        overflow: auto;
        padding: 10px;
      }

      .main-header {
        display: flex;
        justify-content: space-between;
        margin: 20px;
        padding: 20px;
        height: 150px;
        background-color: #e3e4e6;
        color: slategray;
      }

      .main-overview {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(265px, 1fr));
        grid-auto-rows: 94px;
        grid-gap: 20px;
        margin: 20px;
      }

      .overviewcard {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        background-color: #d3d3;
      }

      .main-cards {
        column-count: 1;
        column-gap: 20px;
        margin: 20px;
      }

      .card {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        background-color: #82bef6;
        margin-bottom: 20px;
        -webkit-column-break-inside: avoid;
        padding: 24px;
        box-sizing: border-box;
      }

      /* Force varying heights to simulate dynamic content */
      .card:first-child {
        height: 485px;
      }

      .card:nth-child(2) {
        height: 200px;
      }

      .card:nth-child(3) {
        height: 265px;
      }

      .footer {
        grid-area: footer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        background-color: #648ca6;
      }

      /* Non-mobile styles, 750px breakpoint */
      @media only screen and (min-width: 46.875em) {
        /* Show the sidenav */
        .grid-container {
          grid-template-columns: 240px 1fr;
          grid-template-areas:
            "sidenav header"
            "sidenav main"
            "sidenav footer";
        }

        .header__search {
          margin-left: 0;
        }

        .sidenav {
          position: relative;
          transform: translateX(0);
        }

        .sidenav__close-icon {
          visibility: hidden;
        }
      }

      /* Medium screens breakpoint (1050px) */
      @media only screen and (min-width: 65.625em) {
        /* Break out main cards into two columns */
        .main-cards {
          column-count: 2;
        }
      }
    </style>
  </head>
  <body>
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
          <li class="sidenav__list-item">Item One</li>
          <li class="sidenav__list-item">Item Two</li>
          <li class="sidenav__list-item">Item Three</li>
          <li class="sidenav__list-item">Item Four</li>
          <li class="sidenav__list-item">Item Five</li>
        </ul>
      </aside>

      <main class="main">
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
        <div class="footer__copyright">&copy; 2018 MTH</div>
        <div class="footer__signature">Made with love by pure genius</div>
      </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
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
