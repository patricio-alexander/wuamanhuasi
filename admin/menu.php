<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>


<header class="site-navbar mb-5 site-navbar-target" role="banner">

  <div class="container">


    <div class="row align-items-center">

      <div class="col">
        <h1 class="mb-0 site-logo"><a href="index.html">Brand<span class="text-primary">.</span> </a></h1>
      </div>

      <div class="col justify-content-center">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
            <?php if ($_SESSION["usuario"]->getTipo() === "ADMIN" || $_SESSION["usuario"]->getTipo() === "DOCENTE") { ?>
              <li><a href="#home-section" class="nav-link">
                  <?= $_SESSION["usuario"]->getTipo() ?>
                </a></li>
            <?php } ?>

            <?php if ($_SESSION["usuario"]->getTipo() === "ESTUDIANTE") { ?>
              <li><a href="#home-section" class="nav-link">
                  <?= $_SESSION["usuario"]->getTipo() ?>
                </a></li>
            <?php } ?>

            <li class="has-children">
              <a href="#about-section" class="nav-link">Ir a</a>
              <ul class="dropdown">
                
                <?php if ($_SESSION["usuario"]->getTipo() === "ADMIN" || $_SESSION["usuario"]->getTipo() === "DOCENTE") { ?>
                  <li><a href="ruta.php" class="nav-link">Rutas</a></li>
                  <li><a href="arbol.php" class="nav-link">Arboles</a></li>
                  <li><a href="asignar.php" class="nav-link">Asignar arbol</a></li>
                <?php } ?>

                <?php if ($_SESSION["usuario"]->getTipo() === "ESTUDIANTE") { ?>
                  <li><a href="#gallery-section" class="nav-link">Mantemimiento</a></li>
                <?php } ?>


                <li class="has-children">
                  <a href="#">More Links</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="has-children">
              <a href="#about-section" class="nav-link">
                <?= $_SESSION["usuario"]->getNombre() ?>
              </a>


              <ul class="dropdown">
                <li><a href="../include/controller_login.php?accion=CERRARCESION" onclick="return confirm('Estas seguro de cerrar sesión')"
                    class="nav-link">Cerrar</a></li>
              </ul>
            </li>



            <!-- <li class="social"><a href="#contact-section" class="nav-link"><span class="icon-twitter"></span></a></li> -->
            <!-- <li class="social"><a href="#contact-section" class="nav-link"><span class="icon-linkedin"></span></a></li> -->
          </ul>
        </nav>
      </div>


      <div class="col d-flex justify-content-end d-inline-block d-xl-none ml-md-0 py-3"
        style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span
            class="icon-menu h3"></span></a></div>

    </div>
  </div>

</header>