<?php

include '../funciones.php';
$today = date('Y-m-d');

$tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : "";
$documento = isset($_POST['documento']) ? $_POST['documento'] : "";
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
$ciudad = isset($_POST['ciudad']) ? utf8_decode($_POST['ciudad']) : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$celular = isset($_POST['celular']) ? $_POST['celular'] : "";
$razonSocial = isset($_POST['razonSocial']) ? $_POST['razonSocial'] : "";
$nitEmpr = isset($_POST['nitEmpr']) ? $_POST['nitEmpr'] : "0";
$direccEmpr = isset($_POST['direccEmpr']) ? $_POST['direccEmpr'] : "";
$activEcon = isset($_POST['activEcon']) ? $_POST['activEcon'] : "";
$otro_activEcon = isset($_POST['otro_activEcon']) ? $_POST['otro_activEcon'] : "";
$des_productivo = isset($_POST['des_productivo']) ? $_POST['des_productivo'] : "";
$fort_empresarial = isset($_POST['fort_empresarial']) ? $_POST['fort_empresarial'] : "";
$form_empresarial = isset($_POST['form_empresarial']) ? $_POST['form_empresarial'] : "";
$nombre_representante = isset($_POST['nombre_representante']) ? $_POST['nombre_representante'] : "";
$celular_representante = isset($_POST['celular_representante']) ? $_POST['celular_representante'] : "";
$email_representante = isset($_POST['email_representante']) ? $_POST['email_representante'] : "";
$poblacion = isset($_POST['poblacion']) ? $_POST['poblacion'] : "";
$otro_poblacion = isset($_POST['otro_poblacion']) ? $_POST['otro_poblacion'] : "";
$fecha_matricula = isset($_POST['fecha_matricula']) &&  $_POST['fecha_matricula'] != "" ? $_POST['fecha_matricula'] : $today;
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "";
$registrado = isset($_POST['registrado']) ? $_POST['registrado'] : "";
$programa_ccp = isset($_POST['programa_ccp']) ? $_POST['programa_ccp'] : "";
$estado_solicitud = isset($_POST['estado_solicitud']) ? $_POST['estado_solicitud'] : "";
$fecha_solicitud = isset($_POST['fecha_solicitud']) &&  $_POST['fecha_solicitud'] != '' ? $_POST['fecha_solicitud'] : '2021-01-01';
$genero = isset($_POST['genero']) ? $_POST['genero'] : "";
$escolaridad = isset($_POST['escolaridad']) ? $_POST['escolaridad'] : "";
$rango_edad = isset($_POST['rango_edad']) ? utf8_decode($_POST['rango_edad']) : "";
$solicitud = isset($_POST['solicitud']) ? utf8_decode($_POST['solicitud']) : "";

if (isset($_POST['registrar'])) {


  $info_diligencias_new = "INSERT INTO diligencias_new ( `tipoDocumento`, `documento`, `nombres`, `apellidos`, `ciudad`, `email`, `celular`, `razonSocial`, `nitEmpr`, `direccEmpr`, `activEcon`, `otro_activEcon`, `des_productivo`, `fort_empresarial`, `form_empresarial`, `nombre_representante`, `celular_representante`, `email_representante`, `poblacion`, `otro_poblacion`, `fecha_matricula`, `matricula`, `registrado`, `programa_ccp`, `estado_solicitud`, `fecha_solicitud`, `genero`, `escolaridad`, `rango_edad`, `solicitud`) VALUES ( '$tipoDocumento','$documento','$nombres','$apellidos','$ciudad','$email','$celular','$razonSocial','$nitEmpr','$direccEmpr','$activEcon','$otro_activEcon','$des_productivo', '$fort_empresarial','$form_empresarial','$nombre_representante','$celular_representante','$email_representante','$poblacion','$otro_poblacion','$fecha_matricula' ,'$matricula','$registrado','$programa_ccp','$estado_solicitud','$fecha_solicitud', '$genero', '$escolaridad', '$rango_edad', '$solicitud') ";

  $exe_diligencias_new = mysqli_query($conn, $info_diligencias_new);

  // ---------------------PROGXDILIGENCIAS TABLE------------------------
  if ($exe_diligencias_new != false) {
    $id_ultimo = mysqli_insert_id($conn);

    $id_diligencia = isset($_POST['id_diligencia']) ? $_POST['id_diligencia'] : "";
    $id_programa = 0;
    $datos_programa = isset($_POST['datos_programa']) ? $_POST['datos_programa'] : "";
    $select_progs = "SELECT * FROM programas";


    foreach ($datos_programa as $program) {
      if (isset($program['si_programa'])) {

        $info_progsxdiligencias = "INSERT INTO progsxdiligencias ( `id_diligencia`, `id_programa`, `recibe_apoyo`, `dinero_espcie`, `descrip_val`) VALUES ('$id_ultimo', '{$program['si_programa']}', '{$program['recibe_apoyo']}', '{$program['dinero_espcie']}', '{$program['descrip_val']}')";

        $exe_diligencias_new = mysqli_query($conn, $info_progsxdiligencias);
      }
    }
  }
}

include "cabecera.php";
