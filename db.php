<?php

$conexion=mysqli_connect("localhost","root","","rol");

// Display error if failed to connect  
if ($conexion->connect_errno) {  
    printf("Connect failed: %s\n", $conexion->connect_error);  
    exit();  
} 
?>