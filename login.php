<!DOCTYPE html>
<html lang="es">

<head>
  <title>Bookvive | Iniciar Sesión</title>
  <!-- Tus enlaces a las hojas de estilo y otros encabezados -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body class="body-login">
  <div class="container">
    <header>
      <img src="Logo.png" alt="Logo de Bookvive" />
    </header>
    <nav>
      <ul>
        <li>
          <?php
          session_start();
          if (isset($_SESSION['usuario'])) {
            // Si el usuario ha iniciado sesión, redirige a index.php
            echo '<a href="index.php">Inicio</a>';
          } else {
            // Si el usuario no ha iniciado sesión, redirige a index.html
            echo '<a href="index.html">Inicio</a>';
          }
          ?>
        </li>
        <?php
          if (isset($_SESSION['usuario'])) {
            // Si el usuario ha iniciado sesión, aparece la opcion de cerrar sesion
            echo '<li><a href="productos.php">Productos</a></li>';
          } else {
            echo '<li><a href="productos.html">Productos</a></li>';
          }
          ?>
        <li><a href="login.php">Cuenta</a></li>
        <?php
          if (isset($_SESSION['usuario'])) {
            // Si el usuario ha iniciado sesión, aparece la opcion de cerrar sesion
            echo '<li><a href="logout.php" class="cerrar-sesion">Cerrar Sesion</a></li>';
          } else {
            //No muestra nada porque no esta iniciada la sesion
          }
          ?>
      </ul>
    </nav>
    <div class="recuadro-form">
      <h2>Iniciar Sesión</h2>
      <form id="myForm" action="validar.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuario" />
        <input type="password" name="contraseña" placeholder="Contraseña" />
        <input type="submit" value="Iniciar Sesión" class="button-submit"/>
        <div class="span-1">
            <span>No tenes cuenta?</span>
            <a href="registro.php">Registrate</a>
          </div>
      </form>
    </div>
  </div>
  <footer>
    <div>
      <img src="LogoBlanco.png" alt="Bookvive Logo" height="80px" />
    </div>
    <div>
      <p class="contacto">Contáctanos</p>
      <p>@book_vive</p>
      <p>booksrevives@gmail.com</p>
      <p>+54 9 2616275466</p>
    </div>
  </footer>
</body>

</html>