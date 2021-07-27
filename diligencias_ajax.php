<?php
include 'funciones.php';

if (isset($_POST['email'])) {
  $mensaje = "Nombre:" . $_POST['nombre'] . "\r\n";
  $mensaje .= "Email:" . $_POST['email'] . "\r\n";
  $mensaje = "Teléfono:" . $_POST['celular'] . "\r\n";
  //mail('caffeinated@example.com', 'Mi título', $mensaje);
}

if (isset($_POST['elimin_d'])) {
  $cons = "DELETE FROM diligencias_new WHERE id_diligencia =" . $_POST['id_elim'];
  $res = mysqli_query($conn, $cons);
  $deletepxd = "DELETE FROM progsxdiligencias WHERE id_diligencia =" . $_POST['id_elim'];
  $res = mysqli_query($conn, $deletepxd);
}

// ---------------------------------
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
// ---------------------------------


if (isset($_POST['listar'])) {

  $cons = 'SELECT * FROM diligencias_new';
  $donde = '';
  if ($_POST['tipoDoc']) {
    $donde .= ' WHERE tipoDocumento = ' . $_POST['tipoDoc'];
  }
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
  $programas = array();
  while ($afila = mysqli_fetch_array($res_a)) {
    $programas2[$afila['id_programa']] = $afila['programa'];
    $programas[$afila['id_programa']] = $afila;
  }
  // while (list($tipoDocumento, $documento, $nombre, $apellido1, $apellido2, $razonSocial, $actividadEconomica, $direccDomicilio, $ciudad, $email, $telocel1, $telocel2, $nitEmpr, $actividadEconomicaEmpr, $direccEmpr, $emailPersonaEmpr, $emailEmpr, $telocel) = mysqli_fetch_array($res))
  while ($fila = mysqli_fetch_array($res)) {

    $filt_proyecto = '';

    if (isset($_POST['proyecto']) && $_POST['proyecto'] != '') {
      //$aux_proyect=$_POST['proyecto'];
      //$filt_proyecto=" and nom_progr='$aux_proyect'";
      $filt_proyecto = " AND id_programa=" . $_POST['proyecto'];
      // echo "$filt_proyecto=$filt_proyecto<br>";

    }

    // $fila2 = array();
    // $cons2 = "SELECT * FROM extras_usus where id_usu=" . $fila['id'];
    // //echo $cons2."<br>";  exit; die;
    // $res2 = $stmt = mysqli_query($conn, $cons2);
    // $fila2 = mysqli_fetch_array($res2);

    $consp = "SELECT * FROM progsxdiligencias WHERE id_diligencia=" . $fila['id_diligencia'] . " " . $filt_proyecto;
    $aux_pxd_x_id_pro = array();
    $resp = $stmt = mysqli_query($conn, $consp);
    while ($filap = mysqli_fetch_array($resp)) {
      $aux_pxd_x_id_pro[$filap['id_programa']] = $filap;
    }


    // if (($_POST['proyecto'] != '' && count($fila2) > 0) || $_POST['proyecto'] != '')


    if (($_POST['proyecto'] != '' && count($aux_pxd_x_id_pro) > 0) || $_POST['proyecto'] == '') {
      // echo $consp."<br>";  exit; die;


      //echo ' '.$_POST['proyecto'].' --- '.$cons2."<br>"; exit; die;
      $cont++;
      // $tbody .= "
      //           <tr>
      //             <td>$cont</td><td>$tipoDocumento</td><td>$documento</td><td>$nombres</td><td>$apellidos</td><td>$ciudad</td><td>$email</td><td>$celular</td><td>$direccEmpr</td><td>$activEcon</td><td>$otro_activEcon</td><td>$des_productivo</td><td>$princ_prod_serv</td><td>$fort_empresarial</td><td>$form_empresarial</td><td>$nombre_representante</td><td>$celular_representante</td><td>$email_representante</td><td>$poblacion</td>
      //             <td>$otro_poblacion</td><td>$fecha_matricula</td><td>$matricula</td><td>$registrado</td><td>$num_cam_comercio</td><td>$programa_ccp</td><td>$estado_solicitud</td><td>$fecha_solicitud</td><td>$genero</td><td>$escolaridad</td><td>$rango_edad</td><td>$solicitud</td>
      //           </tr>
      //         ";
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
      $id_f = '"' . $fila['id_diligencia'] . '"';
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
                  <td>" . $fila['estado_solicitud'] . "</td>
                  <td>" . $fila['fecha_solicitud'] . "</td>
                  <td>" . $fila['solicitud'] . "</td>
                  <td>" . $fila['genero'] . "</td>
                  <td>" . $fila['escolaridad'] . "</td>
                  <td>" . $fila['rango_edad'] . "</td>
                  <td>" . $fila['programa_ccp'] . "</td>";
      foreach ($programas as $programa) {

        if (isset($aux_pxd_x_id_pro[$programa['id_programa']])) {
          $tbody .= "<td>Si</td><td>" . $aux_pxd_x_id_pro[$programa['id_programa']]['recibe_apoyo'] . "</td><td>" . $aux_pxd_x_id_pro[$programa['id_programa']]['dinero_espcie'] . "</td><td>" . $aux_pxd_x_id_pro[$programa['id_programa']]['descrip_val'] . "</td>";
        } else {
          $tbody .= "<td>No</td><td><td></td><td></td>";
        }
        //	$tbody.="<td>".$p['programa']."</td><td >Recibe apoyo1</td><td >Tipo apoyo1</td><td >Descripción / Valor1</td>";
      }

      $tbody .= "
                  
                  <td style='vertical-align: middle; right: 0; position: sticky;'>
                    <a style='margin-bottom: 2px' href='edit_diligencias_new.php?id_diligencia=" . $fila['id_diligencia'] . "' class='btn btn-success' title='Editar'><i class='cui-pencil'></i></a>
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
  $tipoDocumento =  $documento =  $nombres =  $apellidos =  $ciudad =  $email =  $celular = $direccEmpr = $activEcon = $otro_activEcon = $des_productivo =  $princ_prod_serv =  $fort_empresarial =  $form_empresarial =  $nombre_representante =  $celular_representante =  $email_representante =  $poblacion =  $otro_poblacion =  $fecha_matricula =  $matricula =  $registrado =  $num_cam_comercio =  $programa_ccp =  $estado_solicitud = $fecha_solicitud = $updated_at = $genero = $escolaridad = $rango_edad = $solicitud = '';

  if ($tipoCons == 'nn') {
    $stmt = mysqli_query($conn, $cons);
  } elseif ($tipoCons == 'yn') {
    $stmt = mysqli_prepare($conn, $cons);
    mysqli_stmt_bind_param($stmt, 's', $_GET['tipoDocumento']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $tipoDocumento, $documento, $nombres, $apellidos, $ciudad, $email, $celular, $direccEmpr, $activEcon, $otro_activEcon, $des_productivo, $princ_prod_serv, $fort_empresarial, $form_empresarial, $nombre_representante, $celular_representante, $email_representante, $poblacion, $otro_poblacion, $fecha_matricula, $matricula, $registrado, $num_cam_comercio, $programa_ccp, $estado_solicitud, $fecha_solicitud, $genero, $escolaridad, $rango_edad, $solicitud, $updated_at);
  } elseif ($tipoCons == 'ny') {
    $stmt = mysqli_prepare($conn, $cons);
    mysqli_stmt_bind_param($stmt, 's', $_GET['txtBuscar']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $tipoDocumento, $documento, $nombres, $apellidos, $ciudad, $email, $celular, $direccEmpr, $activEcon, $otro_activEcon, $des_productivo, $princ_prod_serv, $fort_empresarial, $form_empresarial, $nombre_representante, $celular_representante, $email_representante, $poblacion, $otro_poblacion, $fecha_matricula, $matricula, $registrado, $num_cam_comercio, $programa_ccp, $estado_solicitud, $fecha_solicitud, $genero, $escolaridad, $rango_edad, $solicitud, $updated_at);
  } else {
    $stmt = mysqli_prepare($conn, $cons);
    mysqli_stmt_bind_param($stmt, 'ss', $_GET['tipoDocumento'], $_GET['txtBuscar']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $tipoDocumento, $documento, $nombres, $apellidos, $ciudad, $email, $celular, $direccEmpr, $activEcon, $otro_activEcon, $des_productivo, $princ_prod_serv, $fort_empresarial, $form_empresarial, $nombre_representante, $celular_representante, $email_representante, $poblacion, $otro_poblacion, $fecha_matricula, $matricula, $registrado, $num_cam_comercio, $programa_ccp, $estado_solicitud, $fecha_solicitud, $genero, $escolaridad, $rango_edad, $solicitud, $updated_at);
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
            <th>Genero</th>
            <th>Escolaridad</th>
            <th>Rango de Edad</th>
            <th>Solicitud</th>
          </tr>
        </thead>
        <tbody>
        ' . $tbody . '
        </tbody>
      </table>';

  // echo $_GET['exportar'];
}
// end exportar