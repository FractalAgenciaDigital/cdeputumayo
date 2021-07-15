<?php
include '../funciones.php';


$tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : "";
$documento = isset($_POST['documento']) ? $_POST['documento'] : "";
$nitEmpr = isset($_POST['nitEmpr']) ? $_POST['nitEmpr'] : "";
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : "";
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : "";
$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$celular = isset($_POST['celular']) ? $_POST['celular'] : "";
$direccEmpr = isset($_POST['direccEmpr']) ? $_POST['direccEmpr'] : "";
$activEcon = isset($_POST['activEcon']) ? $_POST['activEcon'] : "";
$otro_activEcon = isset($_POST['otro_activEcon']) ? $_POST['otro_activEcon'] : "";
$des_productivo = isset($_POST['des_productivo']) ? $_POST['des_productivo'] : "";
$princ_prod_serv = isset($_POST['princ_prod_serv']) ? $_POST['princ_prod_serv'] : "";
$fort_empresarial = isset($_POST['fort_empresarial']) ? $_POST['fort_empresarial'] : "";
$form_empresarial = isset($_POST['form_empresarial']) ? $_POST['form_empresarial'] : "";
$nombre_representante = isset($_POST['nombre_representante']) ? $_POST['nombre_representante'] : "";
$celular_representante = isset($_POST['celular_representante']) ? $_POST['celular_representante'] : "";
$email_representante = isset($_POST['email_representante']) ? $_POST['email_representante'] : "";
$poblacion = isset($_POST['poblacion']) ? $_POST['poblacion'] : "";
$otro_poblacion = isset($_POST['otro_poblacion']) ? $_POST['otro_poblacion'] : "";
$fecha_matricula = isset($_POST['fecha_matricula']) ? $_POST['fecha_matricula'] : "";
$matricula = isset($_POST['matricula']) ? $_POST['matricula'] : "";
$registrado = isset($_POST['registrado']) ? $_POST['registrado'] : "";
$num_cam_comercio = isset($_POST['num_cam_comercio']) ? $_POST['num_cam_comercio'] : "";
$programa_ccp = isset($_POST['programa_ccp']) ? $_POST['programa_ccp'] : "";
$estado_solicitud = isset($_POST['estado_solicitud']) ? $_POST['estado_solicitud'] : "";
$fecha_solicitud = isset($_POST['fecha_solicitud']) ? $_POST['fecha_solicitud'] : "";





if (isset($_POST['registrar'])) {

  $info_diligencias_new = "INSERT INTO diligencias_new ( `tipoDocumento`, `documento`, `nombres`, `apellidos`, `ciudad`, `email`, `celular`,`direccEmpr`, `activEcon`, `otro_activEcon`, `des_productivo`, `princ_prod_serv`, `fort_empresarial`, `form_empresarial`, `nombre_representante`, `celular_representante`, `email_representante`, `poblacion`, `otro_poblacion`, `fecha_matricula`, `matricula`, `registrado`, `num_cam_comercio`, `programa_ccp`, `estado_solicitud`, `fecha_solicitud`) VALUES ( '$tipoDocumento','$documento','$nombres','$apellidos','$ciudad','$email','$celular','$direccEmpr','$activEcon','$otro_activEcon','$des_productivo','$princ_prod_serv','$fort_empresarial','$form_empresarial','$nombre_representante','$celular_representante','$email_representante','$poblacion','$otro_poblacion','$fecha_matricula' ,'$matricula','$registrado','$num_cam_comercio','$programa_ccp','$estado_solicitud','$fecha_solicitud') ";

  $ejecutar = mysqli_query($conn, $info_diligencias_new);
  $info_diligencias_new = "SELECT id FROM diligencias_new ORDER BY id desc LIMIT 1";
  // $aux = mysqli_fetch_array($ejecutar);
  // $id_aux = xmysqli_fetch_array($res);

  // $_SESSION['message'] = 'Diligencia creada Correctamente';
  // $_SESSION['message_type'] = 'success';
  header("location: diligencias.php");
} 


// // -------------
// elseif (isset($_GET['id_edit'])) {
//   $id_edit = $id_registro = $_GET['id_edit'];
//   $cons = "SELECT * FROM diligencias_new where id=" . $id_registro;
//   $res = mysqli_query($conn, $cons);
//   $datos_usu = mysqli_fetch_array($res);

//   $cons = "SELECT * FROM extras_usus where id_usu=" . $id_registro;
//   $res = mysqli_query($conn, $cons);
//   $datos_extra = mysqli_fetch_array($res);

//   $tipoDocumento = isset($datos_extra['tipoDocumento']) ? $datos_extra['tipoDocumento'] : "";
//   $documento = isset($datos_extra['documento']) ? $datos_extra['documento'] : "";
//   $nitEmpr = isset($datos_extra['nitEmpr']) ? $datos_extra['nitEmpr'] : "";
//   $nombres = isset($datos_extra['nombres']) ? $datos_extra['nombres'] : "";
//   $apellidos = isset($datos_extra['apellidos']) ? $datos_extra['apellidos'] : "";
//   $ciudad = isset($datos_extra['ciudad']) ? $datos_extra['ciudad'] : "";
//   $email = isset($datos_extra['email']) ? $datos_extra['email'] : "";
//   $celular = isset($datos_extra['celular']) ? $datos_extra['celular'] : "";
//   $direccEmpr = isset($datos_extra['direccEmpr']) ? $datos_extra['direccEmpr'] : "";
//   $activEcon = isset($datos_extra['activEcon']) ? $datos_extra['activEcon'] : "";
//   $otro_activEcon = isset($datos_extra['otro_activEcon']) ? $datos_extra['otro_activEcon'] : "";
//   $des_productivo = isset($datos_extra['des_productivo']) ? $datos_extra['des_productivo'] : "";
//   $princ_prod_serv = isset($datos_extra['princ_prod_serv']) ? $datos_extra['princ_prod_serv'] : "";
//   $fort_empresarial = isset($datos_extra['fort_empresarial']) ? $datos_extra['fort_empresarial'] : "";
//   $form_empresarial = isset($datos_extra['form_empresarial']) ? $datos_extra['form_empresarial'] : "";
//   $nombre_representante = isset($datos_extra['nombre_representante']) ? $datos_extra['nombre_representante'] : "";
//   $celular_representante = isset($datos_extra['celular_representante']) ? $datos_extra['celular_representante'] : "";
//   $email_representante = isset($datos_extra['email_representante']) ? $datos_extra['email_representante'] : "";
//   $poblacion = isset($datos_extra['poblacion']) ? $datos_extra['poblacion'] : "";
//   $otro_poblacion = isset($datos_extra['otro_poblacion']) ? $datos_extra['otro_poblacion'] : "";
//   $fecha_matricula = isset($datos_extra['fecha_matricula']) ? $datos_extra['fecha_matricula'] : "";
//   $matricula = isset($datos_extra['matricula']) ? $datos_extra['matricula'] : "";
//   $registrado = isset($datos_extra['registrado']) ? $datos_extra['registrado'] : "";
//   $num_cam_comercio = isset($datos_extra['num_cam_comercio']) ? $datos_extra['num_cam_comercio'] : "";
//   $programa_ccp = isset($datos_extra['programa_ccp']) ? $datos_extra['programa_ccp'] : "";
//   $estado_solicitud = isset($datos_extra['estado_solicitud']) ? $datos_extra['estado_solicitud'] : "";
//   $fecha_solicitud = isset($datos_extra['fecha_solicitud']) ? $datos_extra['fecha_solicitud'] : "";
// } else {
//   $tipoDocumento = "";
//   $documento = "";
//   $nitEmpr = "";
//   $nombres = "";
//   $apellidos = "";
//   $ciudad = "";
//   $email = "";
//   $celular = "";
//   $direccEmpr = "";
//   $activEcon = "";
//   $otro_activEcon = "";
//   $des_productivo = "";
//   $princ_prod_serv = "";
//   $fort_empresarial = "";
//   $form_empresarial = "";
//   $nombre_representante = "";
//   $celular_representante = "";
//   $email_representante = "";
//   $poblacion = "";
//   $otro_poblacion = "";
//   $fecha_matricula = "";
//   $matricula = "";
//   $registrado = "";
//   $num_cam_comercio = "";
//   $programa_ccp = "";
//   $estado_solicitud = "";
//   $fecha_solicitud = "";
// }
