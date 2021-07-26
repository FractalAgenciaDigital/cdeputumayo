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
$genero = isset($_POST['genero']) ? $_POST['genero'] : "";
$escolaridad = isset($_POST['escolaridad']) ? $_POST['escolaridad'] : "";
$rango_edad = isset($_POST['rango_edad']) ? $_POST['rango_edad'] : "";
$solicitud = isset($_POST['solicitud']) ? $_POST['solicitud'] : "";


if (isset($_POST['registrar'])) {

  $info_diligencias_new = "INSERT INTO diligencias_new ( `tipoDocumento`, `documento`, `nombres`, `apellidos`, `ciudad`, `email`, `celular`,`direccEmpr`, `activEcon`, `otro_activEcon`, `des_productivo`, `princ_prod_serv`, `fort_empresarial`, `form_empresarial`, `nombre_representante`, `celular_representante`, `email_representante`, `poblacion`, `otro_poblacion`, `fecha_matricula`, `matricula`, `registrado`, `num_cam_comercio`, `programa_ccp`, `estado_solicitud`, `fecha_solicitud`, `genero`, `escolaridad`, `rango_edad`, `solicitud`) VALUES ( '$tipoDocumento','$documento','$nombres','$apellidos','$ciudad','$email','$celular','$direccEmpr','$activEcon','$otro_activEcon','$des_productivo','$princ_prod_serv','$fort_empresarial','$form_empresarial','$nombre_representante','$celular_representante','$email_representante','$poblacion','$otro_poblacion','$fecha_matricula' ,'$matricula','$registrado','$num_cam_comercio','$programa_ccp','$estado_solicitud','$fecha_solicitud', '$genero', '$escolaridad', '$rango_edad', '$solicitud') ";

  $exe_diligencias_new = mysqli_query($conn, $info_diligencias_new);
  if ($exe_diligencias_new != false) {
    // $info_programas = "SELECT id_programa FROM programas ORDER BY id_programa desc LIMIT 1";
    // $info_new_diligencias = "SELECT id_diligencia FROM diligencias_new ORDER BY id_diligencia desc LIMIT 1";
    // $info_new_diligencias = "SELECT MAX(id_diligencia) AS id_diligencia FROM diligencias_new";
    // $info_new_diligencias = "SELECT MAX(`id_diligencia`) FROM `diligencias_new`";
    // $info_new_diligencias = mysqli_insert_id($conn, 'id_diligencia');
    // $info_new_diligencias = mysqli_insert_id($conn, 'id_diligencia');
    $id_ultimo = mysqli_insert_id($conn);

    // $exe = mysqli_query($conn, $info_new_diligencias);

    // var_dump($id_ultimo);



    // if (!$_POST['']) {
    //   // SELECT  DILIG
    // }

    // ---------------------PROGXDILIGENCIAS TABLE------------------------

    // $id_diligencia = $info_new_diligencias;
    $id_diligencia = isset($_POST['id_diligencia']) ? $_POST['id_diligencia'] : "";
    // var_dump($id_diligencia);
    $id_programa = 0;
    $datos_programa = isset($_POST['datos_programa']) ? $_POST['datos_programa'] : "";
    $select_progs = "SELECT * FROM programas";


    foreach ($datos_programa as $program) {
      if (isset($program['si_programa'])) {

        $info_progsxdiligencias = "INSERT INTO progsxdiligencias ( `id_diligencia`, `id_programa`, `recibe_apoyo`, `dinero_espcie`, `descrip_val`) VALUES ('$id_ultimo', '{$program['si_programa']}', '{$program['recibe_apoyo']}', '{$program['dinero_espcie']}', '{$program['descrip_val']}')";

        $exe_diligencias_new = mysqli_query($conn, $info_progsxdiligencias);

      }
    }
    header("Location: diligencias.php");
  }
}
