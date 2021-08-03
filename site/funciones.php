<?php
$usuario = "ccputuma_CDE";
$contrasena = "C4m1l0.M2017!";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
$servidor = "localhost";
$basededatos = "ccputuma_CDE";

$conn = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

if (!$conn) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}
