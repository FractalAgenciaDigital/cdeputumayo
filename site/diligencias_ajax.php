<?php
include "funciones.php";

if (isset($_POST['Guardar'])) {

  $cons = "SELECT * FROM diligencias_new where nombres='" . $_POST['nombres'];
  $res = mysqli_query($conn, $cons);
  $fila = mysqli_fetch_assoc($res);

  if ($fila) {
    $fila['respuesta'] = 1;
    session_start();
    $_SESSION['nombres'] = $fila['nombres'];
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['cargo'] = $fila['cargo'];
    $_SESSION['correo'] = $fila['correo'];
    $_SESSION['id_usu'] = $fila['id'];
  } else {
    $fila['respuesta'] = 0;
  }
  //print_r($_SESSION);
  //echo json_encode($fila,JSON_UNESCAPED_SLASHES);

  echo json_encode($fila);
}
if (isset($_POST['crear'])) {
  $cons = "INSERT INTO diligencias_new( tipoDocumento, documento, nombres, apellidos, ciudad, email, celular, activEcon, des_productivo, fort_empresarial, form_empresarial, nombre_representante, celular_representante, email_representante, poblacion, otro_poblacion, fecha_matricula, matricula, registrado, num_cam_comercio, programa_ccp, estado_solicitud, fecha_solicitud) values ('tipoDocumento','documento','nombres','apellidos','ciudad','email','celular','activEcon','des_productivo','fort_empresarial','form_empresarial','nombre_representante','celular_representante','email_representante','poblacion','otro_poblacion','fecha_matricula' ,'matricula','registrado','num_cam_comercio','programa_ccp','estado_solicitud','fecha_solicitud')";
  $res = mysqli_query($conn, $cons);
  //print_r($_POST);	
}

if (isset($_POST['cargar_editar'])) {
  $cons = "SELECT * FROM diligencias_new where id = " . $_POST['cargar_editar'];
  $res = mysqli_query($conn, $cons);
  $fila = mysqli_fetch_assoc($res);
  echo json_encode($fila);
}

if (isset($_POST['editar'])) {
  //print_r($_POST);
  $cons = "UPDATE diligencias_new SET  tipoDocumento='" . $_POST['tipoDocumento'] . "', documento='" . $_POST['documento'] . "', nitEmpr='" . $_POST['nitEmpr'] . "', nombres='" . $_POST['nombres'] . "', apellidos='" . $_POST['apellidos'] . "', ciudad='" . $_POST['ciudad'] . "', email='" . $_POST['email'] . "', celular='" . $_POST['celular'] . "', activEcon='" . $_POST['activEcon'] . "', des_productivo='" . $_POST['des_productivo'] . "', fort_empresarial='" . $_POST['fort_empresarial'] . "', form_empresarial='" . $_POST['form_empresarial'] . "', nombre_representante='" . $_POST['nombre_representante'] . "', celular_representante='" . $_POST['celular_representante'] . "', email_representante='" . $_POST['email_representante'] . "', fecha_matricula='" . $_POST['fecha_matricula'] . "', matricula='" . $_POST['matricula'] . "', registrado='" . $_POST['registrado'] . "', num_cam_comercio='" . $_POST['num_cam_comercio'] . "', programa_ccp='" . $_POST['programa_ccp'] . "', estado_solicitud='" . $_POST['estado_solicitud'] . "', fecha_solicitud='" . $_POST['fecha_solicitud'] . "', create_at='" . $_POST['create_at'] . "', updated_at='" . $_POST['updated_at'] . "' WHERE id='" . $_POST['editar'] . "'";
  $res = mysqli_query($conn, $cons);
}

if (isset($_POST['eliminar'])) {
  $cons = "DELETE FROM diligencias_new where id =" . $_POST['eliminar'];
  $res = mysqli_query($conn, $cons);
}
