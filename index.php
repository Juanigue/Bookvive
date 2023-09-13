<?php
session_start();

// Comprobar si el usuario está autenticado
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
} else {
  // Redireccionar si el usuario no está autenticado
  header("location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Bookvive</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    <header>
      <img src="Logo.png" alt="Logo de Bookvive" />
    </header>
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <?php
          if (isset($_SESSION['usuario'])) {
            // Si el usuario ha iniciado sesión, aparece la opcion de cerrar sesion
            echo '<li><a href="productos.php">Productos</a></li>';
          } else {
            echo '<li><a href="productos.html">Productos</a></li>';
          }
          ?>
        <li><a href="login.php">Cuenta</a></li>
        <li>
          <?php
          if (isset($_SESSION['usuario'])) {
            // Si el usuario ha iniciado sesión, aparece la opcion de cerrar sesion
            echo '<a href="logout.php" class="cerrar-sesion">Cerrar Sesion</a>';
          } else {
            //No muestra nada porque no esta iniciada la sesion
          }
          ?>
        </li>
      </ul>
    </nav>
    <div class="slider">
      <img src="slider.png" alt="Imagen del slider" />
    </div>
    <div class="presentation">
      <p>
        ¡Bienvenidos a nuestro mundo literario de segundas oportunidades!
        Nuestro objetivo es darles una nueva vida, conectando a aquellos que
        buscan sumergirse en las palabras impresas con aquellos libros que
        anhelan ser releídos y apreciados una vez más. En nuestro e-commerce
        de ventas de libros usados, te ofrecemos una experiencia
        enriquecedora, donde cada adquisición no solo te brinda la oportunidad
        de expandir tu biblioteca personal, sino también de preservar la
        belleza de los libros que han sido amados antes. ¡Sumérgete en el
        encanto de las páginas desgastadas y descubre la emoción de encontrar
        verdaderas joyas literarias en nuestro rincón virtual de literatura
        reciclada!
      </p>
      <i>
        "Los libros usados son testigos silenciosos de múltiples vidas,
        esperando pacientemente ser descubiertos y revividos por nuevos
        lectores que les darán un amor renovado."
      </i>
      <p>- Carlos Ruiz Zafón</p>
    </div>
    <div class="container-img">
      <div class="left">
        <div class="image-container">
          <a href="productos.php"><img src="rectangle-4.png" alt="Image 1" /></a>
          <div class="overlay-text"><a href="productos.html">Nuestros Productos</a></div>
        </div>
      </div>
      <div class="right">
        <img src="rectangle-2.png" alt="Image 2" />
        <img src="rectangle-3.png" alt="Image 3" />
      </div>
    </div>
    <div class="slider-2">
      <div class="slider-2-content">
        <h1>Elige tu proxima aventura</h1>
        <a href="productos.html"><button>Ver Libros</button></a>
      </div>
      <img src="rectangle-5.jpg" alt="Imagen del slider 2" width="100%" />
    </div>
  </div>
  <footer>
    <div>
      <img src="LogoBlanco.png" alt="Bookvive Logo" height="80px" />
    </div>
    <div>
      <p class="contacto">Contactanos</p>
      <a href="https://www.instagram.com/">@Bookvive</a>
      <p>booksrevives@gmail.com</p>
      <p>+54 9 2616275466</p>
    </div>
  </footer>
</body>

</html>