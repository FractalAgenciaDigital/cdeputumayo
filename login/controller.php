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
    $info_new_diligencias = "SELECT id_diligencia FROM diligencias_new ORDER BY id_diligencia desc LIMIT 1";




    // ---------------------PROGXDILIGENCIAS TABLE------------------------

    $id_diligencia = isset($_POST['id_diligencia']) ? $_POST['id_diligencia'] : "";
    $id_programa = isset($_POST['si_programa']) ? $_POST['si_programa'] : "";
    $recibe_apoyo = isset($_POST['recibe_apoyo']) ? $_POST['recibe_apoyo'] : "";
    $dinero_espcie = isset($_POST['dinero_espcie']) ? $_POST['dinero_espcie'] : "";
    $descrip_val = isset($_POST['descrip_val']) ? $_POST['descrip_val'] : "";


    $info_new_diligencias = "SELECT id_diligencia FROM diligencias_new ORDER BY id_diligencia desc LIMIT 1";

    $select_progs = "SELECT * FROM programas";

    // return $info_diligencias_new;
    // if (count($_POST['si_programa']) > 0) {
    //   foreach ($_POST['si_programa'] as $prog) {




    $dpx = array(

      'programa' => $id_programa,
      'recibe_apoyo' => $recibe_apoyo,
      'dinero_especie' => $dinero_espcie,
      'descrip_val' => $descrip_val

    );
    // echo "<pre>";
    // print_r($dpx);
    // echo "</pre>";
    // exit;

    foreach ($dpx as $key => $value) {
      $k[] = $key;
      $v[] = "'" . $value . "'";
    }

    $k = implode(",", $k);
    $v = implode(",", $v);

    // $info_progsxdiligencias = "INSERT INTO progsxdiligencias ( `id_diligencia`, `id_programa`, `recibe_apoyo`, `dinero_espcie`, `descrip_val`) VALUES ( '$info_new_diligencias->id_diligencia','$id_programa','$recibe_apoyo','$dinero_espcie','$descrip_val') ";

    $info_progsxdiligencias = "INSERT INTO progsxdiligencias ($k) VALUES ($v) ";
    $exe_progsxdiligencias = mysqli_query($conn, $info_progsxdiligencias);

    // echo "$k";
    // exit;

    //   }
    // }


    // // ---------------------------------CODE DOWN REFERENCIA
    // if (count($_POST['si_programa']) > 0) {
    //   foreach ($_POST['si_programa'] as $prog) {
    //     $cons2 = "INSERT INTO progsxdiligendias (id_diligencia,id_programa,recibe_apoyo,dinero_espcie,descrip_val) values ($id_registro,$prog,'" . $aux_apoyo["'" . $prog . "'"] . "','" . $_POST['dinero_espcie_l']["'" . $prog . "'"] . "','" . $_POST['especie_l']["'" . $prog . "'"] . "')";
    //     $res2 = mysqli_query($conn, $cons2);
    //   }
    // }

    // -------CLOSE
  }

  // $info_diligencias_new = "SELECT id_diligencia FROM diligencias_new ORDER BY id_diligencia desc LIMIT 1";
  // echo "<pre>";
  // print_r($info_diligencias_new);
  // echo "new";
  // echo "</pre>";
  // // die();







  // echo "<pre>";
  // print_r($exe_progsxdiligencias);
  // echo "</pre>";
  // header("location: diligencias.php");
}



// // -----------------------
// if (isset($_GET['id_edit'])) {
//   $id_edit = $id_registro = $_GET['id_edit'];
//   $cons = "SELECT * FROM diligencias where id=" . $id_registro;
//   $res = mysqli_query($conn, $cons);
//   $datos_usu = mysqli_fetch_array($res);

//   $cons = "SELECT * FROM extras_usus where id_usu=" . $id_registro;
//   $res = mysqli_query($conn, $cons);
//   $datos_extra = mysqli_fetch_array($res);
// } elseif (isset($_POST['id_edit'])) {
//   $id_edit = $id_registro = $_POST['id_edit'];
// }
