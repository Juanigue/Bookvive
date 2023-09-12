<?php
if (isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Conexión con la base de datos
    include('db.php'); // Asegúrate de que este archivo contenga la conexión a tu base de datos

    // Comprueba si el usuario ya existe en la base de datos
    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // El usuario ya existe, muestra un mensaje de error
        echo "El usuario ya existe. Por favor, elige otro nombre de usuario.";
    } else {
        // El usuario no existe, procede a insertarlo en la base de datos
        $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT); // Genera el hash de la contraseña

        $insertar = "INSERT INTO usuarios (nombre, usuario, contraseña, id_cargo) VALUES ('$nombre','$usuario', '$contraseña_hash', 2)";
        if (mysqli_query($conexion, $insertar)) {
            // Registro exitoso, redirige a la página de inicio de sesión o muestra un mensaje de éxito
            header("location: login.php"); // Puedes redirigir a la página de inicio de sesión
            // echo "Registro exitoso. Puedes iniciar sesión <a href='login.php'>aquí</a>.";
        } else {
            // Error en la inserción de datos
            echo "Error en el registro. Por favor, inténtalo de nuevo.";
        }
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "Los campos 'usuario' y 'contraseña' no se enviaron correctamente.";
}
?>
