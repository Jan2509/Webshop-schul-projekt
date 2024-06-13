<!-- Leon René Stoltenberg -->
<?php
# Start der Session
session_start();
# Laden der Config
require "backend/config.php";
?>
<html>
<!-- Klassicher HTML Header -->
<head>
<!-- Laden der Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
<!-- Laden von Icons von Fontawesome -->
<script src="https://kit.fontawesome.com/3e0faec911.js" crossorigin="anonymous"></script>
<!-- Laden der CSS Datei -->
<link rel="stylesheet" href="css/css/own_bulma.css">
<!-- Laden des Java Scripts -->
<script src="js/own.js"></script>
<title>LonTech OnlineShop</title>
</head>
<body>
<section class="container">
  <div id="app">
  <!-- Navigations Leiste oben auf der Website -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <!-- Home Button auf dem Titelnamen -->
      <div class="navbar-brand"> <a class="navbar-item" href="?section=home">
        <h1 style="font-family: 'Roboto', sans-serif;">LonTech</h1>
        </a>
        <!-- Placeholder -->
        <div class="navbar-item block"></div>
        <div class="navbar-item block"></div>
        <!-- Orientierung der Searchbar -->
        <div class="navbar-item is-fullheight is-vcentered">
          <!-- Übergabe des inhaltes erfolgt via POST -->
          <form action="index.php" method="post">
            <div class="field has-addons has-addons-centered">
              <p class="control is-expanded has-icons-right">
                <!-- Input Feld der Suchleiste -->
                <input class="input" type="search" name="valueToSearch" placeholder="Suche" />
              </p>
              <p class="control">
                <input type="submit" name="search" class="button is-info" value="Suche">
                </input>
              </p>
            </div>
          </form>
        </div>
        <!-- Burger Menu für Mobile, Not tested -->
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample"> <span aria-hidden="true"></span> <span aria-hidden="true"></span> <span aria-hidden="true"></span> </a> </div>
      <div id="navbarBasicExample" class="navbar-menu">
      <!-- Warenkorb Link im Burger Menu -->
        <div class="navbar-end"> <a href="<?php echo "?".http_build_query(array_merge($_GET, array("section"=>"warenkorb")));?>" class="navbar-item"> Warenkorb </a>
          <!-- Burger Menu Überschritf und link -->
          <div class="navbar-item has-dropdown is-hoverable"> <a href="<?php echo "?".http_build_query(array_merge($_GET, array("section"=>"konto")));?>" class="navbar-link"> Konto </a>
            <!-- Dropdown des Burger Menus in Konto -->
            <div class="navbar-dropdown">
              <?php if(!isset($_SESSION['id'])):?>
              <!-- Falls nicht eingeloggt Link für Registrierung -->
              <a href="<?php echo "?".http_build_query(array_merge($_GET, array("section"=>"login")));?>" class="navbar-item"> Log In </a> <a href="<?php echo "?".http_build_query(array_merge($_GET, array("section"=>"register")));?>" class="navbar-item"> Registrieren </a>
              <?php else:?>
              <!-- Falls eingeloggt Link für Log Out statt Registrierung -->
              <a href="<?php echo "?".http_build_query(array_merge($_GET, array("section"=>"konto")));?>" class="navbar-item"> Bearbeiten </a> <a href="<?php echo "?".http_build_query(array_merge($_GET, array("section"=>"logout")));?>" class="navbar-item"> Log Out </a>
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="notification is-danger">
      Es handelt sich hier um ein Schulprojekt und nicht um eine Reale Seite
    </div>
    <section class="main-content columns is-fullheight">
      <?php
      # Includes der einzelenen Seiten Sections, genauere Erklärung durch mich, textlich nicht einfach zu erläutern.
      # Im Header sind die notwendigen Informationen eingegeben, worüber dieser Teil weiß was geöffnet werden muss in der Section.
      if ( !isset( $_GET[ 'section' ] ) || $_GET[ 'section' ] == 'home' ):
        include( 'include/ar_list.php' );
      elseif ( $_GET[ 'section' ] == 'warenkorb' && !isset( $_SESSION[ 'id' ] ) ):
        include( 'include/login.php' );
      elseif ( $_GET[ 'section' ] == 'register' && !isset( $_SESSION[ 'id' ] ) ):
        include( 'include/registrierung.php' );
      elseif ( $_GET[ 'section' ] == 'warenkorb' && isset( $_SESSION[ 'id' ] ) ):
        include( 'include/warenkorb.php' );
      elseif ( $_GET[ 'section' ] == 'konto' && isset( $_SESSION[ 'id' ] ) ):
        include( 'include/konto.php' );
      elseif ( $_GET[ 'section' ] == 'login' ):
        include( 'include/login.php' );
      elseif ( $_GET[ 'section' ] == 'logout' ):
        include( 'backend/logout.php' );
      else :
        include( 'include/ar_list.php' );
      endif;
      ?>
    </section>
    <!-- Platz für Impressum etc, wozu ich einfach keine Lust habe was zu schreiben. -->
    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <p>Moin <?php echo $_SESSION['id']?> <br> Diese Seite wurde von Leon René Stoltenberg und Florian Spanier verfasst und durch Jan Schmale getestet, Jan hat ebenso sich mit auf Fehler suche begeben.</p>
        </div>
      </div>
    </footer>
  </div>
</section>
</body>
</html>