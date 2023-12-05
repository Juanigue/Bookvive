<?php
if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Conexión con la base de datos
    include('db.php'); // Asegúrate de que este archivo contenga la conexión a tu base de datos

    // Busca el usuario por su nombre de usuario
    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $contraseña_hash = $fila['contraseña'];

        // Verifica la contraseña ingresada con el hash almacenado
        if (password_verify($contraseña, $contraseña_hash)) {
            // Contraseña válida, inicia sesión y redirige al usuario
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("location: index.php"); // Puedes redirigir a la página de inicio
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario no encontrado. Por favor, regístrate antes de iniciar sesión.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "Los campos 'usuario' y 'contraseña' no se enviaron correctamente.";
}
?>