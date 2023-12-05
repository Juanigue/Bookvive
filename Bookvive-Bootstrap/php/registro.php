<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet" />
</head>

<body class="body-login">
    <div class="container">
        <header>
            <img src="Logo.png" alt="Logo de Bookvive">
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
                <li><a href="productos.html">Productos</a></li>
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
            <h2>Registrarse</h2>
            <form id="registrationForm" action="crearCuenta.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
                <input type="submit" value="Registrarse" class="button-submit">
                <div class="span-1">
                    <span>Ya tenes cuenta?</span>
                    <a href="login.php">Iniciar Sesion</a>
                </div>
            </form>
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