<?php
include 'funciones.php';

if (isset($_POST['email'])) {
  $mensaje = "Nombre:" . $_POST['nombre'] . "\r\n";
  $mensaje .= "Email:" . $_POST['email'] . "\r\n";
  $mensaje = "Teléfono:" . $_POST['telefono'] . "\r\n";
  //mail('caffeinated@example.com', 'Mi título', $mensaje);
}

if (isset($_POST['elimin_d'])) {
  $cons = "DELETE FROM diligencias_new WHERE id =" . $_POST['id_elim'];
  $res = mysqli_query($conn, $cons);
}

// $id = $_GET['id'];

// $new_diligencias = "SELECT *FROM diligencias_new WHERE id = '$id'";



if (isset($_GET['buscar'])) {
  $id = $tipoDocumento = $documento = $nombres = $apellidos = $ciudad = $email = $celular = $direccEmpr = $activEcon = $otro_activEcon = $des_productivo = $princ_prod_serv = $fort_empresarial = $form_empresarial = $nombre_representante = $celular_representante = $email_representante = $poblacion = $otro_poblacion = $fecha_matricula = $matricula = $registrado = $num_cam_comercio = $programa_ccp = $estado_solicitud = $fecha_solicitud = '';
  $cons = 'SELECT id, tipoDocumento, documento, nombres, apellidos, ciudad, direccEmpr, email, celular, activEcon, otro_activEcon, des_productivo, princ_prod_serv, fort_empresarial, form_empresarial, nombre_representante, celular_representante, email_representante, poblacion, otro_poblacion, fecha_matricula, matricula, registrado, num_cam_comercio, programa_ccp, estado_solicitud, fecha_solicitud';
  if (isset($_GET['nitEmpr'])) {
    $activEconEmpr = $direccEmpr = $emailPersonalEmpr = $emailEmpr = $apellidos = $telocel = '';
    $cons .= ', activEconEmpr, direccEmpr, emailPersonalEmpr, emailEmpr'; // No obtengo a nitEmpr, es el empleado para el filtro
    $cons .= ', apellidos, telocel FROM diligencias_new WHERE nitEmpr = ?';
    $stmt = mysqli_prepare($conn, $cons);
    mysqli_stmt_bind_param($stmt, 's', $_GET['nitEmpr']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result(
      $stmt,
      $id,
      $tipoDocumento,
      $documento,
      $nombres,
      $apellidos,
      $ciudad,
      $email,
      $celular,
      $direccEmpr,
      $activEcon,
      $otro_activEcon,
      $des_productivo,
      $princ_prod_serv,
      $fort_empresarial,
      $form_empresarial,
      $nombre_representante,
      $celular_representante,
      $email_representante,
      $poblacion,
      $otro_poblacion,
      $fecha_matricula,
      $matricula,
      $registrado,
      $num_cam_comercio,
      $programa_ccp,
      $estado_solicitud,
      $fecha_solicitud
    );
    mysqli_stmt_fetch($stmt);
    echo json_encode([
      'id' => is_null($id) ? 0 : $id, 'tipoDocumento' => is_null($tipoDocumento) ? '' : $tipoDocumento, 'documento' => is_null($documento) ? '' : $documento, 'nombres' => is_null($nombres) ? '' : $nombres, 'apellidos' => is_null($apellidos) ? '' : $apellidos, 'ciudad' => is_null($ciudad) ? '' : $ciudad, 'email' => is_null($email) ? '' : $email, 'celular' => is_null($celular) ? '' : $celular,  'direccEmpr' => is_null($direccEmpr) ? '' : $direccEmpr, 'activEcon' => is_null($activEcon) ? '' : $activEcon,  'otro_activEcon' => is_null($otro_activEcon) ? '' : $otro_activEcon, 'des_productivo' => is_null($des_productivo) ? '' : $des_productivo, 'princ_prod_serv' => is_null($princ_prod_serv) ? '' : $princ_prod_serv, 'fort_empresarial' => is_null($fort_empresarial) ? '' : $fort_empresarial, 'form_empresarial' => is_null($form_empresarial) ? '' : $form_empresarial, 'nombre_representante' => is_null($nombre_representante) ? '' : $nombre_representante, 'celular_representante' => is_null($celular_representante) ? '' : $celular_representante, 'email_representante' => is_null($email_representante) ? '' : $email_representante, 'poblacion' => is_null($poblacion) ? '' : $poblacion, 'otro_poblacion' => is_null($otro_poblacion) ? '' : $otro_poblacion, 'fecha_matricula' => is_null($fecha_matricula) ? '' : $fecha_matricula, 'matricula' => is_null($matricula) ? '' : $matricula, 'registrado' => is_null($registrado) ? '' : $registrado, 'num_cam_comercio' => is_null($num_cam_comercio) ? '' : $num_cam_comercio, 'programa_ccp' => is_null($programa_ccp) ? '' : $programa_ccp, 'estado_solicitud' => is_null($estado_solicitud) ? '' : $estado_solicitud, 'fecha_solicitud' => is_null($fecha_solicitud) ? '' : $fecha_solicitud
    ]);
    mysqli_stmt_close($stmt);
  } 
  /*
  elseif (isset($_GET['documento'])) {
    $nombres = $apellidos = '';
    $cons .= ', nombres, apellidos FROM diligencias_new WHERE documento = ?';
    $stmt = mysqli_prepare($conn, $cons);
    mysqli_stmt_bind_param($stmt, 's', $_GET['documento']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result(
      $stmt,
      $id,
      $tipoDocumento,
      $documento,
      $nombres,
      $apellidos,
      $ciudad,
      $email,
      $celular,
      $direccEmpr,
      $activEcon,
      $otro_activEcon,
      $des_productivo,
      $princ_prod_serv,
      $fort_empresarial,
      $form_empresarial,
      $nombre_representante,
      $celular_representante,
      $email_representante,
      $poblacion,
      $otro_poblacion,
      $fecha_matricula,
      $matricula,
      $registrado,
      $num_cam_comercio,
      $programa_ccp,
      $estado_solicitud,
      $fecha_solicitud
    );
     mysqli_stmt_fetch($stmt);
    echo json_encode([
      'id' => is_null($id) ? 0 : $id, 'tipoDocumento' => is_null($tipoDocumento) ? '' : $tipoDocumento, 'documento' => is_null($documento) ? '' : $documento, 'nombres' => is_null($nombres) ? '' : $nombres, 'apellidos' => is_null($apellidos) ? '' : $apellidos, 'ciudad' => is_null($ciudad) ? '' : $ciudad, 'email' => is_null($email) ? '' : $email, 'celular' => is_null($celular) ? '' : $celular,  'direccEmpr' => is_null($direccEmpr) ? '' : $direccEmpr, 'activEcon' => is_null($activEcon) ? '' : $activEcon,  'otro_activEcon' => is_null($otro_activEcon) ? '' : $otro_activEcon, 'des_productivo' => is_null($des_productivo) ? '' : $des_productivo, 'princ_prod_serv' => is_null($princ_prod_serv) ? '' : $princ_prod_serv, 'fort_empresarial' => is_null($fort_empresarial) ? '' : $fort_empresarial, 'form_empresarial' => is_null($form_empresarial) ? '' : $form_empresarial, 'nombre_representante' => is_null($nombre_representante) ? '' : $nombre_representante, 'celular_representante' => is_null($celular_representante) ? '' : $celular_representante, 'email_representante' => is_null($email_representante) ? '' : $email_representante, 'poblacion' => is_null($poblacion) ? '' : $poblacion, 'otro_poblacion' => is_null($otro_poblacion) ? '' : $otro_poblacion, 'fecha_matricula' => is_null($fecha_matricula) ? '' : $fecha_matricula, 'matricula' => is_null($matricula) ? '' : $matricula, 'registrado' => is_null($registrado) ? '' : $registrado, 'num_cam_comercio' => is_null($num_cam_comercio) ? '' : $num_cam_comercio, 'programa_ccp' => is_null($programa_ccp) ? '' : $programa_ccp, 'estado_solicitud' => is_null($estado_solicitud) ? '' : $estado_solicitud, 'fecha_solicitud' => is_null($fecha_solicitud) ? '' : $fecha_solicitud
    ]);
    mysqli_stmt_close($stmt);
  }
  mysqli_close($conn);*/
} 

/* if (isset($_POST['documento'])) {
  $cons = '';
  if ($_POST['documento']) {
    // if ($_POST['idSolicitud'] == 0) {
    $cons = 'INSERT INTO diligencias_new (tipoDocumento, documento, nombres, apellidos, ciudad, direccEmpr, email, celular, activEcon, des_productivo, princ_prod_serv, fort_empresarial, form_empresarial, nombre_representante, celular_representante, email_representante, poblacion, otro_poblacion, fecha_matricula, matricula, registrado, num_cam_comercio, programa_ccp, estado_solicitud, fecha_solicitud';
    if ($_POST['tipoDocumento'] == 2) {
      $cons .= 'nombres, apellidos, ciudad, activEconEmpr, direccEmpr, emailPersonalEmpr, emailEmpr) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param(
        $stmt,
        'ssssssssssssssssssssss',
        $_POST['tipoDocumento'],
        $_POST['documento'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['ciudad'],
        $_POST['email'],
        $_POST['celular'],
        $_POST['direccEmpr'],
        $_POST['activEcon'],
        $_POST['otro_activEcon'],
        $_POST['des_productivo'],
        $_POST['princ_prod_serv'],
        $_POST['fort_empresarial'],
        $_POST['form_empresarial'],
        $_POST['nombre_representante'],
        $_POST['celular_representante'],
        $_POST['email_representante'],
        $_POST['poblacion'],
        $_POST['otro_poblacion'],
        $_POST['fecha_matricula'],
        $_POST['matricula'],
        $_POST['registrado'],
        $_POST['num_cam_comercio'],
        $_POST['programa_ccp'],
        $_POST['estado_solicitud'],
        $_POST['fecha_solicitud']
      );
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    } else {
      $cons .= 'apellido1, apellido2) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param(
        $stmt,
        'ssssssssssiiiisss',
        $_POST['tipoDocumento'],
        $_POST['documento'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['ciudad'],
        $_POST['email'],
        $_POST['celular'],
        $_POST['direccEmpr'],
        $_POST['activEcon'],
        $_POST['otro_activEcon'],
        $_POST['des_productivo'],
        $_POST['princ_prod_serv'],
        $_POST['fort_empresarial'],
        $_POST['form_empresarial'],
        $_POST['nombre_representante'],
        $_POST['celular_representante'],
        $_POST['email_representante'],
        $_POST['poblacion'],
        $_POST['otro_poblacion'],
        $_POST['fecha_matricula'],
        $_POST['matricula'],
        $_POST['registrado'],
        $_POST['num_cam_comercio'],
        $_POST['programa_ccp'],
        $_POST['estado_solicitud'],
        $_POST['fecha_solicitud']
      );
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
  } else {
    $cons = 'UPDATE diligencias_new SET tipoDocumento = ?, documento = ?, nombres = ?, apellidos= ?, ciudad= ?, email= ?, celular = ?, direccEmpr = ?, activEcon = ?, otro_activEcon = ?, des_productivo = ?, princ_prod_serv = ?, fort_empresarial = ?, form_empresarial = ?, nombre_representante = ?, celular_representante = ?, email_representante = ?, poblacion = ?, otro_poblacion = ?,  fecha_matricula = ?, matricula = ?, registrado = ?, num_cam_comercio = ?, programa_ccp = ?, estado_solicitud = ?, fecha_solicitud = ?, ';
    if ($_POST['tipoDocumento'] == 2) {
      $cons .= 'tipoDocumento = ?, documento = ?, nombres = ?, apellidos= ?, ciudad= ?, email= ?, celular = ?, direccEmpr = ?, activEcon = ?, des_productivo = ?, princ_prod_serv = ?, fort_empresarial = ?, form_empresarial = ?, nombre_representante = ?, celular_representante = ?, email_representante = ?, poblacion = ?, otro_poblacion = ?,  fecha_matricula = ?, matricula = ?, registrado = ?, num_cam_comercio = ?, programa_ccp = ?, estado_solicitud = ?, fecha_solicitud = ? WHERE id = ?';
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param(
        $stmt,
        'ssssssssssiiiissssssssi',
        $_POST['tipoDocumento'],
        $_POST['documento'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['ciudad'],
        $_POST['email'],
        $_POST['celular'],
        $_POST['direccEmpr'],
        $_POST['activEcon'],
        $_POST['otro_activEcon'],
        $_POST['des_productivo'],
        $_POST['princ_prod_serv'],
        $_POST['fort_empresarial'],
        $_POST['form_empresarial'],
        $_POST['nombre_representante'],
        $_POST['celular_representante'],
        $_POST['email_representante'],
        $_POST['poblacion'],
        $_POST['otro_poblacion'],
        $_POST['fecha_matricula'],
        $_POST['matricula'],
        $_POST['registrado'],
        $_POST['num_cam_comercio'],
        $_POST['programa_ccp'],
        $_POST['estado_solicitud'],
        $_POST['fecha_solicitud']
      );
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    } else {
      $cons .= 'nombres = ?, apellidos = ? WHERE id = ?';
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param(
        $stmt,
        'ssssssssssiiiisssi',
        $_POST['tipoDocumento'],
        $_POST['documento'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['ciudad'],
        $_POST['email'],
        $_POST['celular'],
        $_POST['direccEmpr'],
        $_POST['activEcon'],
        $_POST['otro_activEcon'],
        $_POST['des_productivo'],
        $_POST['princ_prod_serv'],
        $_POST['fort_empresarial'],
        $_POST['form_empresarial'],
        $_POST['nombre_representante'],
        $_POST['celular_representante'],
        $_POST['email_representante'],
        $_POST['poblacion'],
        $_POST['otro_poblacion'],
        $_POST['fecha_matricula'],
        $_POST['matricula'],
        $_POST['registrado'],
        $_POST['num_cam_comercio'],
        $_POST['programa_ccp'],
        $_POST['estado_solicitud'],
        $_POST['fecha_solicitud']
      );
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
  }
} */

if (isset($_POST['listar'])) {

  $cons = 'SELECT * FROM diligencias_new';
  $donde = '';
  // if ($_POST['tipoDo']) {
  //   $donde .= ' WHERE tipoDocumento = ' . $_POST['tipoDo'];
  // }
  if ($_POST['txtBuscar']) {
    $txt = "LIKE '%" . $_POST['txtBuscar'] . "%'";
    $bloque = "nombres $txt OR apellidos $txt OR documento $txt OR email $txt OR nombre_representante $txt";
    $donde .= $donde ? " AND ($bloque)" : " WHERE $bloque";
  }
  $cons .= $donde;

  $res = $stmt = mysqli_query($conn, $cons);
  $tbody = '';
  $cont = 0;
  $sectores["1"] = "Sector agropecuario";
  $sectores["2"] = "Sector de servicios";
  $sectores["3"] = "Sector industrial";
  $sectores["4"] = "Sector de transporte";
  $sectores["5"] = "Sector de comercio";
  $sectores["6"] = "Sector financiero";
  $sectores["7"] = "Sector de la construcción";
  $sectores["8"] = "Sector minero y energético";
  $sectores["9"] = "Sector solidario";
  $sectores["10"] = "Sector de comunicaciones";
  $sectores["11"] = "Sector agroindustrial";
  $sectores["12"] = "Otro";

  $formtal["1"] = "Alianzas para la innovación";
  $formtal["2"] = "Fábricas de productividad";
  $formtal["3"] = "Propiedad industrial";
  $formtal["4"] = "Ferias, misiones comerciales, ruedas de negocio y postulaciones";
  $formtal["5"] = "Centro de transformación digital empresarial";
  $formtal["6"] = "Técnicas y acompañamiento especializado";
  $formtal["7"] = "Marcas y Patentes";
  $formtal["8"] = "Otro";
  $formtal["9"] = "Vitrina empresarial";
  $formtal["10"] = "Domicilios putumayo";
  $formtal["11"] = "Visita Putumayo";
  $formtal["12"] = "Club de afiliados";
  $cons_a = "SELECT * FROM programas where estado = 1 order by programa";
  $res_a = mysqli_query($conn, $cons_a);
  $programas = array();

  while ($afila = mysqli_fetch_array($res_a)) {
    $programas[] = $afila['programa'];
  }

  $cons_a = "SELECT * FROM programas   order by programa";
  $res_a = mysqli_query($conn, $cons_a);
  $programas2 = array();
  $programas3 = array();
  while ($afila = mysqli_fetch_array($res_a)) {
    $programas2[$afila['id']] = $afila['programa'];
    $programas3[$afila['id']] = $afila;
  }
  //while (list($tipoDocumento, $documento, $nombre, $apellido1, $apellido2, $razonSocial, $actividadEconomica, $direccDomicilio, $ciudad, $email, $telocel1, $telocel2, $nitEmpr, $actividadEconomicaEmpr, $direccEmpr, $emailPersonaEmpr, $emailEmpr, $telocel) = mysqli_fetch_array($res))
  while ($fila = mysqli_fetch_array($res)) {

    $filt_proyecto = '';

    if (isset($_POST['proyecto']) && $_POST['proyecto'] != '') {
      //$aux_proyect=$_POST['proyecto'];
      //$filt_proyecto=" and nom_progr='$aux_proyect'";
      $filt_proyecto = " and id_programa=" . $_POST['proyecto'];
      // echo "$filt_proyecto=$filt_proyecto<br>";

    }
    $fila2 = array();
    $cons2 = "SELECT * FROM extras_usus where id_usu=" . $fila['id'];
    //echo $cons2."<br>";  exit; die;

    $res2 = $stmt = mysqli_query($conn, $cons2);
    $fila2 = mysqli_fetch_array($res2);

    $consp = "SELECT * FROM progsxdiligendias where id_diligencia=" . $fila['id'] . " " . $filt_proyecto;
    $aux_pxd_x_id_pro = array();
    $resp = $stmt = mysqli_query($conn, $consp);
    while ($filap = mysqli_fetch_array($resp)) {
      $aux_pxd_x_id_pro[$filap['id_programa']] = $filap;
    }
    //if( ($_POST['proyecto']!=''&&count($fila2)>0)||$_POST['proyecto']!='')
    if (($_POST['proyecto'] != '' && count($aux_pxd_x_id_pro) > 0) || $_POST['proyecto'] == '') {
      // echo $consp."<br>";  exit; die;


      //echo ' '.$_POST['proyecto'].' --- '.$cons2."<br>"; exit; die;
      $cont++;
      /*$tbody .= "
                <tr>
                  <td>$cont</td><td>$tipoDocumento</td><td>$documento</td><td>$nombre</td><td>$apellido1</td><td>$apellido2</td><td>$razonSocial</td><td>$actividadEconomica</td><td>$direccDomicilio</td><td>$ciudad</td><td>$email</td><td>$telocel1</td><td>$telocel2</td><td>$nitEmpr</td><td>$actividadEconomicaEmpr</td><td>$direccEmpr</td><td>$emailPersonaEmpr</td><td>$emailEmpr</td><td>$telocel</td>
                </tr>
              ";*/
      $tipoDocumento = $fila['tipoDocumento'] == '1' ? 'CÉDULA DE CIUDADANÍA'
        : ($fila['tipoDocumento'] == '2' ? 'NIT' : 'OTROS');

      $ciudad = $fila['ciudad'] == 1 ? 'COLÓN'
        : ($fila['ciudad'] == 2 ? 'MOCOA'
          : ($fila['ciudad'] == 3 ? 'ORITO'
            : ($fila['ciudad'] == 4 ? 'PUERTO ASÍS'
              : ($fila['ciudad'] == 5 ? 'PUERTO CAICEDO'
                : ($fila['ciudad'] == 6 ? 'PUERTO GUZMÁN'
                  : ($fila['ciudad'] == 7 ? 'PUERTO LEGUÍZAMO'
                    : ($fila['ciudad'] == 8 ? 'SANTIAGO'
                      : ($fila['ciudad'] == 9 ? 'SAN FRANCISCO'
                        : ($fila['ciudad'] == 10 ? 'SAN MIGUEL'
                          : ($fila['ciudad'] == 11 ? 'SIBUNDOY'
                            : ($fila['ciudad'] == 12 ? 'VALLE DEL GUAMUEZ' : 'VILLAGARZÓN')))))))))));

      $fort_empresarial = $fila['fort_empresarial'] == '1' ? 'Innovación'
        : ($fila['fort_empresarial'] == '2' ? 'Fábricas de productividad'
          : ($fila['fort_empresarial'] == '3' ? 'Propiedad industrial'
            : ($fila['fort_empresarial'] == '4' ? 'Ferias, Misiones, otros.' : '')));

      $fechaSol = explode('-', explode(' ', $fila['create_at'])[0]);
      $create_at = $fechaSol[2] . "/" . $fechaSol[1] . "/" . $fechaSol[0];
      $fechaSol = explode('-', explode(' ', $fila['updated_at'])[0]);
      $updated_at = $fechaSol[2] . "/" . $fechaSol[1] . "/" . $fechaSol[0];
      $id_f = '"' . $fila['id'] . '"';
      // $auxsector = $fila['sectorEcon'] ? $fila['sectorEcon'] : '';

      $tbody .= "
              <tr>
                  <td>$cont</td>
                  <td>" . $tipoDocumento . "</td>
                  <td>" . $fila['documento'] . "</td>
                  <td>" . $fila['nombres'] . "</td>
                  <td>" . $fila['apellidos'] . "</td>
                  <td>" . $fila['ciudad'] . "</td>
                  <td>" . $fila['email'] . "</td>
                  <td>" . $fila['celular'] . "</td>
                  <td>" . $fila['direccEmpr'] . "</td>
                  <td>" . $fila['activEcon'] . "</td>
                  <td>" . $fila['otro_activEcon'] . "</td>
                  <td>" . $fila['des_productivo'] . "</td>
                  <td>" . $fila['princ_prod_serv'] . "</td>
                  <td>" . $fila['fort_empresarial'] . "</td>
                  <td>" . $fila['form_empresarial'] . "</td>
                  <td>" . $fila['nombre_representante'] . "</td>
                  <td>" . $fila['celular_representante'] . "</td>
                  <td>" . $fila['email_representante'] . "</td>
                  <td>" . $fila['poblacion'] . "</td>
                  <td>" . $fila['otro_poblacion'] . "</td>
                  <td>" . $fila['fecha_matricula'] . "</td>
                  <td>" . $fila['matricula'] . "</td>
                  <td>" . $fila['registrado'] . "</td>
                  <td>" . $fila['num_cam_comercio'] . "</td>
                  <td>" . $fila['programa_ccp'] . "</td>
                  <td>" . $fila['estado_solicitud'] . "</td>
                  <td>" . $fila['fecha_solicitud'] . "</td>";
      foreach ($programas3 as $p) {

        if (isset($aux_pxd_x_id_pro[$p['id']])) {
          $tbody .= "<td>Si</td><td>" . $aux_pxd_x_id_pro[$p['id']]['recive_apoyo'] . "</td><td>" . $aux_pxd_x_id_pro[$p['id']]['dinero_espcie'] . "</td><td>" . $aux_pxd_x_id_pro[$p['id']]['descrip_val'] . "</td>";
        } else {
          $tbody .= "<td>No</td></td></td></td>";
        }
        //	$tbody.="<td>".$p['programa']."</td><td >Recibe apoyo1</td><td >Tipo apoyo1</td><td >Descripción / Valor1</td>";
      }
      
      $tbody .= "
                  
                  <td style='vertical-align: middle;'>
                    <a href='edit_diligencias_new.php?id=" . $fila['id'] . "' class='btn btn-success' title='Editar'><i class='cui-pencil'></i></a>
                  </td>
                  <td style='vertical-align: middle;'>
                    <button class='btn btn-danger' title='Eliminar' onClick='Eliminar($id_f)'>
                    <i class='cui-trash'></i></button>
                  </td>
                  </tr>";
    }
  }
  //echo utf8_encode($tbody);
  echo $tbody;
}











// ---------------------------------------------
if (isset($_GET['exportar'])) {
  //header("Content-Type: application/; charset=utf-8"); -> .xls
  header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8");
  header('Content-Disposition: attachment; filename=diligencias_new.xlsx');
  $cons = 'SELECT * FROM diligencias_new';
  $donde = '';
  $tipoCons = 'nn';
  if ($_GET['tipoDocumento']) {
    $donde .= ' WHERE tipoDocumento = ' . $_GET['tipoDocumento'];
    $tipoCons = 'yn';
  }
  if ($_GET['txtBuscar']) {
    $txt = "LIKE '%" . $_GET['txtBuscar'] . "%'";
    $bloque = "nombres $txt OR apellidos $txt OR email $txt OR documento $txt OR nombre_representante $txt";
    if ($donde) {
      $donde .= " AND ($bloque)";
      $tipoCons = 'yy';
    } else {
      $donde .= " WHERE $bloque";
      $tipoCons = 'ny';
    }
  }
  $cons .= $donde;

  $stmt = NULL;
  $tipoDocumento =  $documento =  $nombres =  $apellidos =  $ciudad =  $email =  $celular = $direccEmpr = $activEcon = $otro_activEcon = $des_productivo =  $princ_prod_serv =  $fort_empresarial =  $form_empresarial =  $nombre_representante =  $celular_representante =  $email_representante =  $poblacion =  $otro_poblacion =  $fecha_matricula =  $matricula =  $registrado =  $num_cam_comercio =  $programa_ccp =  $estado_solicitud = $fecha_solicitud = $updated_at = '';

  if ($tipoCons == 'nn') {
    $stmt = mysqli_query($conn, $cons);
  } elseif ($tipoCons == 'yn') {
    $stmt = mysqli_prepare($conn, $cons);
    mysqli_stmt_bind_param($stmt, 's', $_GET['tipoDocumento']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $tipoDocumento, $documento, $nombres, $apellidos, $ciudad, $email, $celular, $direccEmpr, $activEcon, $otro_activEcon, $des_productivo, $princ_prod_serv, $fort_empresarial, $form_empresarial, $nombre_representante, $celular_representante, $email_representante, $poblacion, $otro_poblacion, $fecha_matricula, $matricula, $registrado, $num_cam_comercio, $programa_ccp, $estado_solicitud, $fecha_solicitud, $updated_at);
  } elseif ($tipoCons == 'ny') {
    $stmt = mysqli_prepare($conn, $cons);
    mysqli_stmt_bind_param($stmt, 's', $_GET['txtBuscar']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $tipoDocumento, $documento, $nombres, $apellidos, $ciudad, $email, $celular, $direccEmpr, $activEcon, $otro_activEcon, $des_productivo, $princ_prod_serv, $fort_empresarial, $form_empresarial, $nombre_representante, $celular_representante, $email_representante, $poblacion, $otro_poblacion, $fecha_matricula, $matricula, $registrado, $num_cam_comercio, $programa_ccp, $estado_solicitud, $fecha_solicitud, $updated_at);
  } else {
    $stmt = mysqli_prepare($conn, $cons);
    mysqli_stmt_bind_param($stmt, 'ss', $_GET['tipoDocumento'], $_GET['txtBuscar']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $tipoDocumento, $documento, $nombres, $apellidos, $ciudad, $email, $celular, $direccEmpr, $activEcon, $otro_activEcon, $des_productivo, $princ_prod_serv, $fort_empresarial, $form_empresarial, $nombre_representante, $celular_representante, $email_representante, $poblacion, $otro_poblacion, $fecha_matricula, $matricula, $registrado, $num_cam_comercio, $programa_ccp, $estado_solicitud, $fecha_solicitud, $updated_at);
  }

  //'ssssssssssssssssssssssssss'

  echo '
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Tipo Documento</th>
            <th>Doc. persona</th>
            <th>NombreS</th>
            <th>Apellidos</th>
            <th>Ciudad</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Dirección Empresa</th>
            <th>Actividad Económica</th>
            <th>Otra Actividad Económica</th>
            <th>Des. Productivo</th>
            <th>Principal-Provedor-Servicio</th>
            <th>Foratalecimiento Empresarial</th>
            <th>Formulario Empresarial</th>
            <th>Nombre Representante</th>
            <th>Celular Representante</th>
            <th>Email Representante</th>
            <th>Población</th>
            <th>Otro Población</th>
            <th>Fecha Matricula</th>
            <th>Matricula</th>
            <th>Registro Matricula</th>
            <th># Cámara Comercio</th>
            <th>Programa CCP</th>
            <th>Estado Solicitud</th>
            <th>Fecha solicitud</th>
          </tr>
        </thead>
        <tbody>
        ' . $tbody . '
        </tbody>
      </table>';

  // echo $_GET['exportar'];
}
// end exportar