<?php
  include 'funciones.php';
  
  if(isset($_POST['email'])) 
  {
    $mensaje = "Nombre:".$_POST['nombre']."\r\n";
    $mensaje .= "Email:".$_POST['email']."\r\n";
    $mensaje = "Teléfono:".$_POST['telefono']."\r\n";
    //mail('caffeinated@example.com', 'Mi título', $mensaje);
  }

  if(isset($_POST['elimin_d']))
  {
      $cons="DELETE FROM diligencias WHERE id =".$_POST['id_elim'];
      $res = mysqli_query($conn, $cons);
  }
  
  if (isset( $_GET['buscar'] ))
  {
    $id = $documento = $nombres = $razonSocial = $razonSocial2 = $razonSocial3 = $activEcon = $direccDomic = $ciudad = $email = $telocel1 = $telocel2 = $ctde = $dp = $forme = $forte = $solicitud = '';
    $cons = 'SELECT id, documento, nombres, razonSocial, razonSocial2, razonSocial3, activEcon, direccDomic, ciudad, email, telocel1, telocel2, ctde, dp, forme, forte, solicitud';
    if (isset( $_GET['nitEmpr'] ))
    {
      $activEconEmpr = $direccEmpr = $emailPersonalEmpr = $emailEmpr = $apellidos = $telocel = '';
      $cons .= ', activEconEmpr, direccEmpr, emailPersonalEmpr, emailEmpr'; // No obtengo a nitEmpr, es el empleado para el filtro
      $cons .= ', apellidos, telocel FROM diligencias WHERE nitEmpr = ?';
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param($stmt, 's', $_GET['nitEmpr']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt
        , $id, $documento, $nombres, $razonSocial, $razonSocial2, $razonSocial3, $activEcon, $direccDomic, $ciudad, $email, $telocel1, $telocel2, $ctde, $dp, $forme, $forte, $solicitud
        , $activEconEmpr, $direccEmpr, $emailPersonalEmpr, $emailEmpr
        , $apellidos, $telocel);
      mysqli_stmt_fetch($stmt);
      echo json_encode([
        'id' => is_null($id)? 0 : $id
        , 'documento' => is_null($documento)? '' : $documento
        , 'nombres' => is_null($nombres)? '' : $nombres
        , 'razonSocial' => is_null($razonSocial)? '' : $razonSocial
        , 'razonSocial2' => is_null($razonSocial2)? '' : $razonSocial2
        , 'razonSocial3' => is_null($razonSocial3)? '' : $razonSocial3
        , 'activEcon' => is_null($activEcon)? '' : $activEcon
        , 'direccDomic' => is_null($direccDomic)? '' : $direccDomic
        , 'ciudad' => is_null($ciudad)? '' : $ciudad
        , 'email' => is_null($email)? '' : $email
        , 'telocel1' => is_null($telocel1)? '' : $telocel1
        , 'telocel2' => is_null($telocel2)? '' : $telocel2
        , 'ctde' => is_null($ctde)? '' : $ctde
        , 'dp' => is_null($dp)? '' : $dp
        , 'forme' => is_null($forme)? '' : $forme
        , 'forte' => (is_null($forte) || $forte == 0)? '' : $forte
        , 'solicitud' => is_null($solicitud)? '' : $solicitud
        , 'activEconEmpr' => is_null($activEconEmpr)? '' : $activEconEmpr
        , 'direccEmpr' => is_null($direccEmpr)? '' : $direccEmpr
        , 'emailPersonalEmpr' => is_null($emailPersonalEmpr)? '' : $emailPersonalEmpr
        , 'emailEmpr' => is_null($emailEmpr)? '' : $emailEmpr
        , 'apellidos' => is_null($apellidos)? '' : $apellidos
        , 'telocel' => is_null($telocel)? '' : $telocel
      ]);
      mysqli_stmt_close($stmt);
    } elseif (isset( $_GET['documento'] ))
    {
      $apellido1 = $apellido2 = '';
      $cons .= ', apellido1, apellido2 FROM diligencias WHERE documento = ?';
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param($stmt, 's', $_GET['documento']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt
        , $id, $documento, $nombres, $razonSocial, $razonSocial2, $razonSocial3, $activEcon, $direccDomic, $ciudad, $email, $telocel1, $telocel2, $ctde, $dp, $forme, $forte, $solicitud
        , $apellido1, $apellido2);
      mysqli_stmt_fetch($stmt);
      echo json_encode([
        'id' => is_null($id)? 0 : $id
        , 'nombres' => is_null($nombres)? '' : $nombres
        , 'razonSocial' => is_null($razonSocial)? '' : $razonSocial
        , 'razonSocial2' => is_null($razonSocial2)? '' : $razonSocial2
        , 'razonSocial3' => is_null($razonSocial3)? '' : $razonSocial3
        , 'activEcon' => is_null($activEcon)? '' : $activEcon
        , 'direccDomic' => is_null($direccDomic)? '' : $direccDomic
        , 'ciudad' => is_null($ciudad)? '' : $ciudad
        , 'email' => is_null($email)? '' : $email
        , 'telocel1' => is_null($telocel1)? '' : $telocel1
        , 'telocel2' => is_null($telocel2)? '' : $telocel2
        , 'ctde' => is_null($ctde)? '' : $ctde
        , 'dp' => is_null($dp)? '' : $dp
        , 'forme' => is_null($forme)? '' : $forme
        , 'forte' => (is_null($forte) || $forte == 0)? '' : $forte
        , 'solicitud' => is_null($solicitud)? '' : $solicitud
        , 'apellido1' => is_null($apellido1)? '' : $apellido1
        , 'apellido2' => is_null($apellido2)? '' : $apellido2
      ]);
      mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
  }

  if (isset( $_POST['regAct'] ))
  {
    $cons = '';
    if ( $_POST['idSolicitud'] == 0 ) {
      $cons = 'INSERT INTO diligencias (tipoDocumento, documento, nombres, razonSocial,razonSocial2,razonSocial3, activEcon, direccDomic, ciudad, email, telocel1, telocel2, ctde, dp, forme, forte, solicitud, ';
      if ( $_POST['tipoDocumento'] == 2 ) {
        $cons .= 'apellidos, telocel, nitEmpr, activEconEmpr, direccEmpr, emailPersonalEmpr, emailEmpr) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = mysqli_prepare($conn, $cons);
        mysqli_stmt_bind_param($stmt, 'ssssssssssssssssssssss'
          , $_POST['tipoDocumento']
          , $_POST['documento']
          , $_POST['nombres']
          , $_POST['razonSocial']
          , $_POST['razonSocial2']
          , $_POST['razonSocial3']
          , $_POST['activEcon']
          , $_POST['direccDomic']
          , $_POST['ciudad']
          , $_POST['email']
          , $_POST['telocel1']
          , $_POST['telocel2']
          , $_POST['ctde']
          , $_POST['dp']
          , $_POST['forme']
          , $_POST['forte']
          , $_POST['solicitud']
          , $_POST['apellidos']
          , $_POST['telocel']
          , $_POST['nitEmpr']
          , $_POST['activEconEmpr']
          , $_POST['direccEmpr']
          , $_POST['emailPersonalEmpr']
          , $_POST['emailEmpr']
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
      } else {
        $cons .= 'apellido1, apellido2) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = mysqli_prepare($conn, $cons);
        mysqli_stmt_bind_param($stmt, 'ssssssssssiiiisss'
          , $_POST['tipoDocumento']
          , $_POST['documento']
          , $_POST['nombres']
          , $_POST['razonSocial']
          , $_POST['razonSocial2']
          , $_POST['razonSocial3']
          , $_POST['activEcon']
          , $_POST['direccDomic']
          , $_POST['ciudad']
          , $_POST['email']
          , $_POST['telocel1']
          , $_POST['telocel2']
          , $_POST['ctde']
          , $_POST['dp']
          , $_POST['forme']
          , $_POST['forte']
          , $_POST['solicitud']
          , $_POST['apellido1']
          , $_POST['apellido2']
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
      }
      mysqli_close($conn);
    } else {
      $cons = 'UPDATE diligencias SET tipodocumento = ?, documento = ?, nombres = ?, razonSocial= ?, razonSocial2= ?, razonSocial3= ?, activEcon = ?, direccDomic = ?, ciudad = ?, email = ?, telocel1 = ?, telocel2 = ?, ctde = ?, dp = ?, forme = ?, forte = ?, solicitud = ?, ';
      if ( $_POST['tipoDocumento'] == 2 ) {
        $cons .= 'apellidos = ?, telocel = ?, nitEmpr = ?, activEconEmpr = ?, direccEmpr = ?, emailPersonalEmpr = ?, emailEmpr = ? WHERE id = ?';
        $stmt = mysqli_prepare($conn, $cons);
        mysqli_stmt_bind_param($stmt, 'ssssssssssiiiissssssssi'
          , $_POST['tipoDocumento']
          , $_POST['documento']
          , $_POST['nombres']
          , $_POST['razonSocial']
          , $_POST['razonSocial2']
          , $_POST['razonSocial3']
          , $_POST['activEcon']
          , $_POST['direccDomic']
          , $_POST['ciudad']
          , $_POST['email']
          , $_POST['telocel1']
          , $_POST['telocel2']
          , $_POST['ctde']
          , $_POST['dp']
          , $_POST['forme']
          , $_POST['forte']
          , $_POST['solicitud']
          , $_POST['apellidos']
          , $_POST['telocel']
          , $_POST['nitEmpr']
          , $_POST['activEconEmpr']
          , $_POST['direccEmpr']
          , $_POST['emailPersonalEmpr']
          , $_POST['emailEmpr']
          , $_POST['idSolicitud']
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
      } else {
        $cons .= 'apellido1 = ?, apellido2 = ? WHERE id = ?';
        $stmt = mysqli_prepare($conn, $cons);
        mysqli_stmt_bind_param($stmt, 'ssssssssssiiiisssi'
          , $_POST['tipoDocumento']
          , $_POST['documento']
          , $_POST['nombres']
          , $_POST['razonSocial']
          , $_POST['razonSocial2']
          , $_POST['razonSocial3']
          , $_POST['activEcon']
          , $_POST['direccDomic']
          , $_POST['ciudad']
          , $_POST['email']
          , $_POST['telocel1']
          , $_POST['telocel2']
          , $_POST['ctde']
          , $_POST['dp']
          , $_POST['forme']
          , $_POST['forte']
          , $_POST['solicitud']
          , $_POST['apellido1']
          , $_POST['apellido2']
          , $_POST['idSolicitud']
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
      }
      mysqli_close($conn);
    }
  }

  if (isset( $_POST['listar'] ))
  {
      
    $cons = 'SELECT * FROM diligencias';
    $donde = '';
    if ($_POST['tipoDoc']) {
      $donde .= ' WHERE tipoDocumento = '.$_POST['tipoDoc'];
    }
    if ($_POST['txtBuscar']) {
      $txt = "LIKE '%". $_POST['txtBuscar'] ."%'";
      $bloque = "nombres $txt OR apellido1 $txt OR apellido2 $txt OR apellidos $txt OR razonSocial $txt or documento $txt OR nitEmpr $txt";
      $donde .= $donde? " AND ($bloque)" : " WHERE $bloque";
    }
     $cons .= $donde;
    
    $res = $stmt = mysqli_query($conn, $cons);
    $tbody = '';
    $cont = 0;
    $sectores["1"]="Sector agropecuario";
    $sectores["2"]="Sector de servicios";
    $sectores["3"]="Sector industrial";
    $sectores["4"]="Sector de transporte";
    $sectores["5"]="Sector de comercio";
    $sectores["6"]="Sector financiero";
    $sectores["7"]="Sector de la construcción";
    $sectores["8"]="Sector minero y energético";
    $sectores["9"]="Sector solidario";
    $sectores["10"]="Sector de comunicaciones";
    $sectores["11"]="Sector agroindustrial";
    $sectores["12"]="Otro";
    
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
    $cons_a="SELECT * FROM programas where estado = 1 order by programa";
    $res_a = mysqli_query($conn, $cons_a);
    $programas = array();

    while($afila = mysqli_fetch_array($res_a)){
        $programas[]=$afila['programa'];
    }

    $cons_a="SELECT * FROM programas   order by programa";
    $res_a = mysqli_query($conn, $cons_a);
    $programas2 = array(); $programas3 = array();
    while($afila = mysqli_fetch_array($res_a)){
        $programas2[$afila['id']]=$afila['programa'];
        $programas3[$afila['id']]=$afila;
    }
    //while (list($tipoDocumento, $documento, $nombre, $apellido1, $apellido2, $razonSocial, $actividadEconomica, $direccDomicilio, $ciudad, $email, $telocel1, $telocel2, $nitEmpr, $actividadEconomicaEmpr, $direccEmpr, $emailPersonaEmpr, $emailEmpr, $telocel) = mysqli_fetch_array($res))
    while ($fila = mysqli_fetch_array($res))
    {
      
        $filt_proyecto='';
       
        if(isset($_POST['proyecto']) && $_POST['proyecto']!='' ){
            //$aux_proyect=$_POST['proyecto'];
            //$filt_proyecto=" and nom_progr='$aux_proyect'";
            $filt_proyecto=" and id_programa=".$_POST['proyecto'];
           // echo "$filt_proyecto=$filt_proyecto<br>";
            
        }
        $fila2=array();
        $cons2="select * from extras_usus where id_usu=".$fila['id'];
        //echo $cons2."<br>";  exit; die;
        
        $res2 = $stmt = mysqli_query($conn, $cons2);
        $fila2 = mysqli_fetch_array($res2);
        
        $consp="select * from progsxdiligendias where id_diligencia=".$fila['id']." ".$filt_proyecto;
        $aux_pxd_x_id_pro = array();
        $resp = $stmt = mysqli_query($conn, $consp);
        while($filap = mysqli_fetch_array($resp)){
            $aux_pxd_x_id_pro[$filap['id_programa']] = $filap;
        }
        //if( ($_POST['proyecto']!=''&&count($fila2)>0)||$_POST['proyecto']!='')
        if( ($_POST['proyecto']!=''&&count($aux_pxd_x_id_pro)>0)||$_POST['proyecto']=='')
        {
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
        
              $ciudad = $fila['ciudad'] == 1? 'COLÓN'
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
        
                $forte = $fila['forte'] == '1' ? 'Innovación'
                        : ($fila['forte'] == '2'? 'Fábricas de productividad'
                        : ($fila['forte'] == '3'? 'Propiedad industrial'
                        : ($fila['forte'] == '4'? 'Ferias, Misiones, otros.' : '')));
                
              $fechaSol = explode('-', explode(' ', $fila['create_at'])[0]);
              $create_at = $fechaSol[2]."/".$fechaSol[1]."/".$fechaSol[0];
              $fechaSol = explode('-', explode(' ', $fila['updated_at'])[0]);
              $updated_at = $fechaSol[2]."/".$fechaSol[1]."/".$fechaSol[0];
              $id_f = '"'.$fila['id'].'"';
              $auxsector = $fila['sectorEcon']? $fila['sectorEcon'] : '';
              
              $tbody .= "
              <tr>
                  <td>$cont</td>
                  <td>".$tipoDocumento."</td>
                  <td>".$fila['nitEmpr']."</td>
                  <td>".$fila['documento']."</td>
                  <td>".$fila['nombres']."</td>
                  <td>".$fila['apellido1']."</td>
                  <td>".$fila['apellido2']."</td>
                  <td>".$fila['razonSocial']."</td>
                  
                  <td>".$fila['activEcon']."</td>
                  <td>".$fila['direccDomic']."</td>
                  <td>".$ciudad."</td>
                  <td>".$fila['email']."</td>
                  <td>".$fila['telocel1']."</td>
                  <td>".$fila['telocel2']."</td>
                  <td>".$fila['activEconEmpr']."</td>
                  <td>".$fila['direccEmpr']."</td>
                  <td>".$fila['emailPersonalEmpr']."</td>
                  <td>".$fila['emailEmpr']."</td>
                  <td>".$fila['telocel']."</td>
                  <td>".$auxsector."</td>
                  <td>".$fila['sectorEconOtro']."</td>
                  <td>".$fila['ppalProdServ']."</td>
                  <td>".$fila['formeTema']."</td>
                  <td>".$formtal[$fila['forte']]."</td>
                  <td>".$fila['forteOtro']."</td>
                  <td>$create_at</td>
                  <td>$updated_at</td>
                  <td>".$fila['solicitud']."</td>
                  <td>".$fila2['sexo']."</td>
                  <td>".$fila2['poblacion']."</td>
                  <td>".$fila2['otro_poblacion']."</td>
                  <td>".$fila2['escolaridad']."</td>
                  <td>".$fila2['rango_edad']."</td>
                  <td>".$fila2['registrado']."</td>
                  <td>".$fila2['matricula']."</td>
                  <td>".$fila2['fecha_matricula']."</td>
                  <td>".$fila2['programa_ccp']."</td>";
                    foreach($programas3 as $p) {  
                        
                        if(isset($aux_pxd_x_id_pro[$p['id']])){
                           $tbody.="<td>Si</td><td>".$aux_pxd_x_id_pro[$p['id']]['recive_apoyo']."</td><td>".$aux_pxd_x_id_pro[$p['id']]['dinero_espcie']."</td><td>".$aux_pxd_x_id_pro[$p['id']]['descrip_val']."</td>";
                        }
                        else{
                             $tbody.="<td>No</td><td></td><td></td><td></td>";
                        }
            			//	$tbody.="<td>".$p['programa']."</td><td >Recibe apoyo1</td><td >Tipo apoyo1</td><td >Descripción / Valor1</td>";
        			}
                
                  /*$tbody.="<td>".$fila2['nom_progr']."</td>
                  <td>".$fila2['apoyo']."</td>
                  <td>".$fila2['dinero_espcie']."</td>
                  <td>".$fila2['especie']."</td>
                  <td>".$fila2['nom_progr2']."</td>
                  <td>".$fila2['apoyo2']."</td>
                  <td>".$fila2['dinero_espcie2']."</td>
                  <td>".$fila2['especie2']."</td>
                  <td>".$fila2['nom_progr3']."</td>
                  <td>".$fila2['apoyo3']."</td>
                  <td>".$fila2['dinero_espcie3']."</td>
                  <td>".$fila2['especie3']."</td>
                  <td>".$fila2['nom_progr4']."</td>
                  <td>".$fila2['apoyo4']."</td>
                  <td>".$fila2['dinero_espcie4']."</td>
                  <td>".$fila2['especie4']."</td>
                  <td>".$fila2['nom_progr5']."</td>
                  <td>".$fila2['apoyo5']."</td>
                  <td>".$fila2['dinero_espcie5']."</td>
                  <td>".$fila2['especie5']."</td>
                  <td>".$fila2['nom_progr6']."</td>
                  <td>".$fila2['apoyo6']."</td>
                  <td>".$fila2['dinero_espcie6']."</td>
                  <td>".$fila2['especie6']."</td>";*/
                  
                $tbody.="<td>".$fila2['estado_solicitud']."</td>
                  <td>".$fila2['fecha_solicitud']."</td>
                  <td>".$fila2['enero']."</td>
                  <td>".$fila2['obs_ene']."</td>
                  <td>".$fila2['febrero']."</td>
                  <td>".$fila2['obs_feb']."</td>
                  <td>".$fila2['marzo']."</td>
                  <td>".$fila2['obs_mar']."</td>
                  <td>".$fila2['abril']."</td>
                  <td>".$fila2['obs_abr']."</td>
                  <td>".$fila2['mayo']."</td>
                  <td>".$fila2['obs_may']."</td>
                  <td>".$fila2['junio']."</td>
                  <td>".$fila2['obs_jun']."</td>
                  <td>".$fila2['julio']."</td>
                  <td>".$fila2['obs_jul']."</td>
                  <td>".$fila2['agosto']."</td>
                  <td>".$fila2['obs_ago']."</td>
                  <td>".$fila2['septiembre']."</td>
                  <td>".$fila2['obs_sep']."</td>
                  <td>".$fila2['octubre']."</td>
                  <td>".$fila2['obs_oct']."</td>
                  <td>".$fila2['noviembre']."</td>
                  <td>".$fila2['obs_nov']."</td>
                  <td>".$fila2['diciembre']."</td>
                  <td>".$fila2['obs_dic']."</td>
                  <td style='vertical-align: middle;'>
                    <a href='diligencias_new.php?id_edit=".$fila['id']."' class='btn btn-success' title='Editar'><i class='cui-pencil'></i></a>
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

  if (isset( $_GET['exportar'] )) 
  {
    //header("Content-Type: application/; charset=utf-8"); -> .xls
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8");
    header('Content-Disposition: attachment; filename=diligencias.xlsx');
    $cons = 'SELECT * FROM diligencias';
    $donde = '';
    $tipoCons = 'nn';
    if ($_GET['tipoDoc']) {
      $donde .= ' WHERE tipoDocumento = '.$_GET['tipoDoc'];
      $tipoCons = 'yn';
    }
    if ($_GET['txtBuscar']) {
      $txt = "LIKE '%". $_GET['txtBuscar'] ."%'";
      $bloque = "nombres $txt OR apellido1 $txt OR apellido2 $txt OR apellidos $txt OR razonSocial $txt";
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
    $tipoDocumento = $documento = $nombres = $apellido1 = $apellido2 = $apellidos = $razonSocial = $razonSocial2 = $razonSocial2 = $activEcon = $direccDomic = $ciudad = $email = $telocel1 = $telocel2 = $nitEmpr = $activEconEmpr = $direccEmpr = $emailPersonalEmpr = $emailEmpr = $telocel = $ctde = $dp = $forme = $forte = $solicitud = $updated_at = '';
    if ($tipoCons == 'nn') {
      $stmt = mysqli_query($conn, $cons);
    }
    elseif ($tipoCons == 'yn') {
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param($stmt, 's', $_GET['tipoDoc']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt, $tipoDocumento, $documento, $nombres, $apellido1, $apellido2, $apellidos, $razonSocial, $razonSocia2l, $razonSocial3, $activEcon, $direccDomic, $ciudad, $email, $telocel1, $telocel2, $nitEmpr, $activEconEmpr, $direccEmpr, $emailPersonalEmpr, $emailEmpr, $telocel, $ctde, $dp, $forme, $forte, $solicitud, $updated_at);
    }
    elseif ($tipoCons == 'ny') {
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param($stmt, 's', $_GET['txtBuscar']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt, $tipoDocumento, $documento, $nombres, $apellido1, $apellido2, $apellidos, $razonSocial, $razonSocial2, $razonSocial3, $activEcon, $direccDomic, $ciudad, $email, $telocel1, $telocel2, $nitEmpr, $activEconEmpr, $direccEmpr, $emailPersonalEmpr, $emailEmpr, $telocel, $ctde, $dp, $forme, $forte, $solicitud, $updated_at);
    }
    else {
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param($stmt, 'ss', $_GET['tipoDoc'], $_GET['txtBuscar']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt, $tipoDocumento, $documento, $nombres, $apellido1, $apellido2, $apellidos, $razonSocial, $razonSocial2, $razonSocial3, $activEcon, $direccDomic, $ciudad, $email, $telocel1, $telocel2, $nitEmpr, $activEconEmpr, $direccEmpr, $emailPersonalEmpr, $emailEmpr, $telocel, $ctde, $dp, $forme, $forte, $solicitud, $updated_at);
    }
    
    //'ssssssssssssssssssssssssss'
    
    echo '
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Tipo documento</th>
            <th>Nit</th>
            <th>Doc. persona</th>
            <th>Nombre</th>
            <th>Ape. 1</th>
            <th>Ape. 2</th>
            <th>R. social1</th>
            <th>R. social2</th>
            <th>R. social3</th>
            <th>Act. económica</th>
            <th>Dir. domicilio</th>
            <th>Ciudad</th>
            <th>Correo</th>
            <th>Tel. o cel. 1</th>
            <th>Tel. o cel. 2</th>
            <th>Act. económica empresa</th>
            <th>Dir. empresa</th>
            <th>Correo empresarial vv</th>
            <th>Correo empresa</th>
            <th>Tel. o cel.</th>
            <th>Ctde</th>
            <th>Desarrollo prod.</th>
            <th>Form. empresarial</th>
            <th>Fort. empresarial</th>
            <th>Fecha solicitud</th>
            <th>Fecha actualiza</th>
            <th>Solicitud</th>
          </tr>
        </thead>
        <tbody>
        '. $tbody .'
        </tbody>
      </table>';

      // echo $_GET['exportar'];
  }
?>