<?php
$usuario = "root";
$contrasena = "";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
$servidor = "localhost";
$basededatos = "ccputuma_cde";

$conn = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conn, "utf-8");

// if (!$conn->set_charset("utf8")) {
//     echo "Error No: " . mysqli_connect_errno();
//     echo "Error Description: " . mysqli_connect_error();
//     exit;
// }
