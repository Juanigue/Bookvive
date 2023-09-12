<?php
// Iniciar la sesión (si aún no está iniciada)
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redireccionar a la página de inicio de sesión o a donde desees
header("location: index.html");
exit();
?>