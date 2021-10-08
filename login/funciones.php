<?php
$usuario = "root";
$contrasena = ""; 
$servidor = "localhost";
$basededatos = "ccputuma_cde";
$conn = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

if (!$conn) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}
