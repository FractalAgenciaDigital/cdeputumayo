<?php
  include 'funciones.php';
  
  if(isset($_POST['elimin_d'])){
      $cons="DELETE FROM diligencias WHERE id =".$_POST['id_elim'];
      $res = mysqli_query($conn, $cons);
  }
  
    if(isset($_GET['extras'])){
       $aux_id = $_GET['id_usu'];
      $cons3="SELECT sexo, escolaridad, rango_edad, poblacion FROM extras_usus WHERE id_usu=".$aux_id;
      
      $res3 = mysqli_query ($conn, $cons3);
       
      //echo mysqli_error();
      $fila3 = mysqli_fetch_row($res3);
      echo json_encode([
          'genero' => $fila3[0], 
          'escolaridad' => $fila3[1], 
          'rango_edad' => $fila3[2], 
          'poblacion' => $fila3[3], 
     ]);
      //var_dump($res3);
  }
  
    if (isset( $_GET['buscar'] ))
    {
        $sexo = '';    $escolaridad = '';  $rango_edad = '';  $poblacion = '';    
        $aux_id='';
        $id= $documento = $nombres = $razonSocial = $razonSocial2 = $razonSocial3 = $activEcon = $direccDomic
        = $ciudad      = $email      = $telocel1      = $telocel2      = $sectorEcon
        = $sectorEconOtro      = $ppalProdServ      = $formeTema      = $forte
        = $forteOtro      = $solicitud = '';
    
        $cons = 'SELECT id      , documento      , nombres      , razonSocial, razonSocial2 , razonSocial3
        , activEcon      , direccDomic      , ciudad      , email      , telocel1
        , telocel2      , sectorEcon      , sectorEconOtro      , ppalProdServ
        , formeTema      , forte      , forteOtro      , solicitud';
      
        if (isset( $_GET['nitEmpr'] ))
        {
            
            $activEconEmpr
            = $direccEmpr
            = $emailPersonalEmpr
            = $emailEmpr
            = $apellidos
            = $telocel = '';
            
            $cons .= ', activEconEmpr, direccEmpr, emailPersonalEmpr, emailEmpr'; // No obtengo a nitEmpr, es el empleado para el filtro
            
            $cons .= ', apellidos        , telocel        FROM diligencias WHERE nitEmpr = ?';
            $stmt = mysqli_prepare($conn, $cons);
            mysqli_stmt_bind_param($stmt, 's', $_GET['nitEmpr']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id , $documento , $nombres , $razonSocial  , $razonSocial2  , $razonSocial3  , $activEcon
            , $direccDomic , $ciudad , $email , $telocel1 , $telocel2 , $sectorEcon  , $sectorEconOtro
            , $ppalProdServ , $formeTema , $forte   , $forteOtro, $solicitud, $activEconEmpr, $direccEmpr
            , $emailPersonalEmpr, $emailEmpr , $apellidos , $telocel  );
            mysqli_stmt_fetch($stmt);
      
            
            $aux_id = $id;
            
            $cons4="select sexo, escolaridad, rango_edad, poblacion from extras_usus where id_usu='?'";
            $stmt2 = mysqli_prepare($conn, $cons4);
            mysqli_stmt_bind_param($stmt2, 's', $aux_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id , $documento , $nombres , $razonSocial  ,$razonSocial2  ,$razonSocial3  , $activEcon
            , $direccDomic , $ciudad , $email , $telocel1 , $telocel2 , $sectorEcon  , $sectorEconOtro
            , $ppalProdServ , $formeTema , $forte   , $forteOtro, $solicitud, $activEconEmpr, $direccEmpr
            , $emailPersonalEmpr, $emailEmpr , $apellidos , $telocel  );
            mysqli_stmt_fetch($stmt);
            /*
            
            $res4 = mysqli_query ($conn, $cons4);
            $fila3 = mysqli_fetch_row($res4);
           // echo "aaa= ".$fila3[0];
            if($fila3[0]){
                $sexo = $fila3[0];    $escolaridad = $fila3[1];  
                $rango_edad = $fila3[2];  $poblacion = $fila3[1];    
            }
            */
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
                , 'sectorEcon' => is_null($sectorEcon)? '' : $sectorEcon
                , 'sectorEconOtro' => is_null($sectorEconOtro)? '' : $sectorEconOtro
                , 'ppalProdServ' => is_null($ppalProdServ)? '' : $ppalProdServ
                , 'formeTema' => is_null($formeTema)? '' : $formeTema
                , 'forte' => is_null($forte)? '' : $forte
                , 'forteOtro' => is_null($forteOtro)? '' : $forteOtro
                , 'solicitud' => is_null($solicitud)? '' : $solicitud
                , 'activEconEmpr' => is_null($activEconEmpr)? '' : $activEconEmpr
                , 'direccEmpr' => is_null($direccEmpr)? '' : $direccEmpr
                , 'emailPersonalEmpr' => is_null($emailPersonalEmpr)? '' : $emailPersonalEmpr
                , 'emailEmpr' => is_null($emailEmpr)? '' : $emailEmpr
                , 'apellidos' => is_null($apellidos)? '' : $apellidos
                , 'telocel' => is_null($telocel)? '' : $telocel
                , 'genero' => $sexo
                , 'escolaridad' => $escolaridad
                , 'rango_edad' => $rango_edad
                , 'poblacion' => $poblacion
            ]);
            mysqli_stmt_close($stmt);
        }
        elseif (isset( $_GET['documento'] ))
        {
            $apellido1 = $apellido2 = '';
            
            $cons .= ', apellido1, apellido2
            FROM diligencias WHERE documento = ? AND nitEmpr IS NULL';
            
            $stmt = mysqli_prepare($conn, $cons);
            mysqli_stmt_bind_param($stmt, 's', $_GET['documento']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id  , $documento, $nombres , $razonSocial, $razonSocial2, $razonSocial3
            , $activEcon , $direccDomic , $ciudad  , $email  , $telocel1 , $telocel2
            , $sectorEcon  , $sectorEconOtro , $ppalProdServ , $formeTema , $forte
            , $forteOtro , $solicitud   , $apellido1 , $apellido2);
            mysqli_stmt_fetch($stmt);
      
            $aux_id = $id;
            /*$cons3="SELECT sexo, escolaridad, rango_edad, poblacion FROM extras_usus WHERE id_usu= ? ";
      
            $res3 = mysqli_query ($conn, $cons3);
            var_dump($res3);
            echo mysqli_error();
            $fila3 = mysqli_fetch_row($res3);
      
            $stmt2 = mysqli_prepare($conn, $cons3);
            mysqli_stmt_bind_param($stmt2, 'i', $aux_id);
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_bind_result($stmt2, $sexo2, $escolaridad2, $rango_edad2, $poblacion2);
            mysqli_stmt_fetch($stmt2);
      
            if(isset($sexo2)){
                $sexo = $sexo2;    $escolaridad = $escolaridad2;  $rango_edad = $rango_edad2;  $poblacion = $poblacion2;    
            }*/
      /*
      
            if($fila3[0]){
                $sexo = $fila3[0];    $escolaridad = $fila3[1];  $rango_edad = $fila3[2];  $poblacion = $fila3[1];    
            }*/
            $cons4="select sexo, escolaridad, rango_edad, poblacion from  extras_usus where id_usu='".$aux_id."'";
            $res4 = mysqli_query ($conn, $cons4);
            $fila3 = mysqli_fetch_row($res4);
            if($fila3[0]){
                $sexo = $fila3[0];    $escolaridad = $fila3[1];  
                $rango_edad = $fila3[2];  $poblacion = $fila3[1];    
            }
            
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
                , 'sectorEcon' => is_null($sectorEcon)? '' : $sectorEcon
                , 'sectorEconOtro' => is_null($sectorEconOtro)? '' : $sectorEconOtro
                , 'ppalProdServ' => is_null($ppalProdServ)? '' : $ppalProdServ
                , 'formeTema' => is_null($formeTema)? '' : $formeTema
                , 'forte' => is_null($forte)? '' : $forte
                , 'forteOtro' => is_null($forteOtro)? '' : $forteOtro
                , 'solicitud' => is_null($solicitud)? '' : $solicitud
                , 'apellido1' => is_null($apellido1)? '' : $apellido1
                , 'apellido2' => is_null($apellido2)? '' : $apellido2
                , 'genero' => $sexo
                , 'escolaridad' => $escolaridad
                , 'rango_edad' => $rango_edad
                , 'poblacion' => $poblacion
            ]);
            mysqli_stmt_close($stmt);
        }
        
        
        mysqli_close($conn);
    }

  if (isset( $_POST['regAct'] ))
  {
      
    $cons = '';
    if ( $_POST['idSolicitud'] == 0 ) {
       
        $cons = 'INSERT INTO diligencias (
        tipoDocumento, documento, nombres, razonSocial, razonSocial2, razonSocial3, activEcon, direccDomic
        , ciudad, email, telocel1, telocel2, sectorEcon, sectorEconOtro
        , ppalProdServ  , formeTema, forte, forteOtro, solicitud,';
        if( $_POST['sectorEcon'] == ''){$_POST['sectorEcon']='0';}
        if( $_POST['forte'] == ''){$_POST['forte']='0';}
        $values = "values ('".$_POST['tipoDocumento']."','".$_POST['documento']."','".$_POST['nombres']."'
        ,'".$_POST['razonSocial']."','".$_POST['razonSocial2']."','".$_POST['razonSocial3']."','".$_POST['activEcon']."','".$_POST['direccDomic']."'
        ,'".$_POST['ciudad']."','".$_POST['email']."','".$_POST['telocel1']."','".$_POST['telocel2']."'
        ,'".$_POST['sectorEcon']."','".$_POST['sectorEconOtro']."','".$_POST['ppalProdServ']."','".$_POST['formeTema']."'
        ,'".$_POST['forte']."','".$_POST['forteOtro']."','".$_POST['solicitud']."'";
       
       //echo "aca";
        if ( $_POST['tipoDocumento'] == 2 ) {
            $cons .= 'apellidos
            , telocel
            , nitEmpr
            , activEconEmpr
            , direccEmpr
            , emailPersonalEmpr
            , emailEmpr
             ) ';
              //echo "xxxxxx";
             $values.=",'".$_POST['apellidos']."','".$_POST['telocel']."','".$_POST['nitEmpr']."','".$_POST['activEconEmpr']."','".$_POST['direccEmpr']."','".$_POST['emailPersonalEmpr']."','".$_POST['emailEmpr']."')";
            
         
        }
        else {
            $cons .= " apellido1, apellido2) ";
     
            
             $values.=",'".$_POST['apellido1']."','".$_POST['apellido2']."')";
            
        }
        
        //mysqli_close($conn);
        $cons .= $values;
        //echo $cons;
    }
    else {
        $cons = "UPDATE diligencias SET tipodocumento = '".$_POST['tipoDocumento']."'
        , documento = '".$_POST['documento']."'
        , nombres = '".$_POST['nombres']."'
        , razonSocial= '".$_POST['razonSocial']."'
        , razonSocial2= '".$_POST['razonSocial2']."'
        , razonSocial3= '".$_POST['razonSocial3']."'
        , activEcon = '".$_POST['activEcon']."'
        , direccDomic = '".$_POST['direccDomic']."'
        , ciudad = '".$_POST['ciudad']."'
        , email = '".$_POST['email']."'
        , telocel1 = '".$_POST['telocel1']."'
        , telocel2 = '".$_POST['telocel2']."'
        , sectorEcon = '".$_POST['sectorEcon']."'
        , sectorEconOtro = '".$_POST['sectorEconOtro']."'
        , ppalProdServ = '".$_POST['ppalProdServ']."'
        , formeTema = '".$_POST['formeTema']."'
        , forte = '".$_POST['forte']."'
        , forteOtro = '".$_POST['forteOtro']."'
        , solicitud = '".$_POST['solicitud']."' ";
        
        if ( $_POST['tipoDocumento'] == 2 ) {
            $cons .= ", apellidos = '".$_POST['apellidos']."'
              , telocel = '".$_POST['telocel']."'
              , nitEmpr = '".$_POST['nitEmpr']."'
              , activEconEmpr = '".$_POST['activEconEmpr']."'
              , direccEmpr = '".$_POST['direccEmpr']."'
              , emailPersonalEmpr = '".$_POST['emailPersonalEmpr']."'
              , emailEmpr = '".$_POST['emailEmpr']."'
              WHERE id = '".$_POST['idSolicitud']."'";
             
     /*        
                $stmt = mysqli_prepare($conn, $cons);
                mysqli_stmt_bind_param($stmt, 'ssssssssssisssisssssssssi'
                , $_POST['tipoDocumento']
                , $_POST['documento']
                , $_POST['nombres']
                , $_POST['razonSocial']
                , $_POST['activEcon']
                , $_POST['direccDomic']
                , $_POST['ciudad']
                , $_POST['email']
                , $_POST['telocel1']
                , $_POST['telocel2']
                , $_POST['sectorEcon']
                , $_POST['sectorEconOtro']
                , $_POST['ppalProdServ']
                , $_POST['formeTema']
                , $_POST['forte']
                , $_POST['forteOtro']
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
                mysqli_stmt_close($stmt);*/ 
            } 
        else {
            $cons .= ", apellido1 = '".$_POST['apellido1']."'
            , apellido2 = '".$_POST['apellido2']."'
            WHERE id = '".$_POST['idSolicitud']."'";
            
           /* $stmt = mysqli_prepare($conn, $cons);
            mysqli_stmt_bind_param($stmt, 'ssssssssssisssissssi'
            , $_POST['tipoDocumento']
            , $_POST['documento']
            , $_POST['nombres']
            , $_POST['razonSocial']
            , $_POST['activEcon']
            , $_POST['direccDomic']
            , $_POST['ciudad']
            , $_POST['email']
            , $_POST['telocel1']
            , $_POST['telocel2']
            , $_POST['sectorEcon']
            , $_POST['sectorEconOtro']
            , $_POST['ppalProdServ']
            , $_POST['formeTema']
            , $_POST['forte']
            , $_POST['forteOtro']
            , $_POST['solicitud']
            , $_POST['apellido1']
            , $_POST['apellido2']
            , $_POST['idSolicitud']
            );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);*/
        }
       
        
    }
    echo $cons;
    $res = mysqli_query ($conn, $cons);
     if($_POST['tipoDocumento'] == 2){
        $cons2 = "select id from diligencias where nitEmpr='".$_POST['nitEmpr']."'";
    }
    else{
        $cons2 = "select id from diligencias where documento='".$_POST['documento']."'";
    }
    $res2 = mysqli_query ($conn, $cons2);
    $fila = mysqli_fetch_row($res2);
    
    if($fila[0]){
        
        $cons4="select id from  extras_usus where id_usu='".$fila[0]."'";
        
        $res4 = mysqli_query ($conn, $cons4);
        $fila4 = mysqli_fetch_row($res4);
        
        if($fila4[0])
        {
            $cons3="update extras_usus set sexo='".$_POST['genero']."',escolaridad='".$_POST['escolaridad']."',rango_edad='".$_POST['rango_edad']."',
            poblacion='".$_POST['poblacion']."'
            where id=".$fila4[0];
        }
        else
        {
            $cons3="insert into extras_usus (sexo, escolaridad, rango_edad, poblacion, id_usu) values ('".$_POST['genero']."','".$_POST['escolaridad']."',
            '".$_POST['rango_edad']."','".$_POST['poblacion']."','".$fila[0]."')";
        }
        //echo $cons3;
        $res3 = mysqli_query ($conn, $cons3);
    }
    else{
        echo "no se encont??o ";
    }
    mysqli_close($conn);
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
      $bloque = "nombres $txt
        OR apellido1 $txt
        OR apellido2 $txt
        OR apellidos $txt
        OR razonSocial $txt
        OR razonSocial2 $txt
        OR razonSocial3 $txt
        OR documento $txt
        OR nitEmpr $txt";
      $donde .= $donde? " AND ($bloque)" : " WHERE $bloque";
    }
    $cons .= $donde;
    $res = $stmt = mysqli_query($conn, $cons);
    $tbody = '';
    $cont = 0;
    //while (list($tipoDocumento, $documento, $nombre, $apellido1, $apellido2, $razonSocial, $actividadEconomica, $direccDomicilio, $ciudad, $email, $telocel1, $telocel2, $nitEmpr, $actividadEconomicaEmpr, $direccEmpr, $emailPersonaEmpr, $emailEmpr, $telocel) = mysqli_fetch_array($res))
    while ($fila = mysqli_fetch_array($res))
    {
      $cont++;
      /*$tbody .= "
        <tr>
          <td>$cont</td><td>$tipoDocumento</td><td>$documento</td><td>$nombre</td><td>$apellido1</td><td>$apellido2</td><td>$razonSocial</td><td>$actividadEconomica</td><td>$direccDomicilio</td><td>$ciudad</td><td>$email</td><td>$telocel1</td><td>$telocel2</td><td>$nitEmpr</td><td>$actividadEconomicaEmpr</td><td>$direccEmpr</td><td>$emailPersonaEmpr</td><td>$emailEmpr</td><td>$telocel</td>
        </tr>
      ";*/
      $tipoDocumento = $fila['tipoDocumento'] == '1' ? 'C??DULA DE CIUDADAN??A'
        : ($fila['tipoDocumento'] == '2' ? 'NIT' : 'OTROS');

      $ciudad = $fila['ciudad'] == 1? 'COL??N'
        : ($fila['ciudad'] == 2 ? 'MOCOA'
        : ($fila['ciudad'] == 3 ? 'ORITO'
        : ($fila['ciudad'] == 4 ? 'PUERTO AS??S'
        : ($fila['ciudad'] == 5 ? 'PUERTO CAICEDO'
        : ($fila['ciudad'] == 6 ? 'PUERTO GUZM??N'
        : ($fila['ciudad'] == 7 ? 'PUERTO LEGU??ZAMO'
        : ($fila['ciudad'] == 8 ? 'SANTIAGO'
        : ($fila['ciudad'] == 9 ? 'SAN FRANCISCO'
        : ($fila['ciudad'] == 10 ? 'SAN MIGUEL'
        : ($fila['ciudad'] == 11 ? 'SIBUNDOY'
        : ($fila['ciudad'] == 12 ? 'VALLE DEL GUAMUEZ' : 'VILLAGARZ??N')))))))))));

      $sectorEcon = $fila['sectorEcon'] == '1' ? 'Sector agropecuario'
          : ($fila['sectorEcon'] == '2'? 'Sector de servicios'
          : ($fila['sectorEcon'] == '3'? 'Sector industrial'
          : ($fila['sectorEcon'] == '4'? 'Sector de transporte'
          : ($fila['sectorEcon'] == '5'? 'Sector de comercio'
          : ($fila['sectorEcon'] == '6'? 'Sector financiero'
          : ($fila['sectorEcon'] == '7'? 'Sector de la construcci??n'
          : ($fila['sectorEcon'] == '8'? 'Sector minero y energ??tico'
          : ($fila['sectorEcon'] == '9'? 'Sector solidario'
          : ($fila['sectorEcon'] == '10'? 'Sector de comunicaciones'
          : ($fila['sectorEcon'] == '11'? 'Sector agroindustrial' : 'Otro'))))))))));

      $forte = $fila['forte'] == '1' ? 'Alianzas para la innovaci??n'
        : ($fila['forte'] == '2'? 'F??bricas de productividad'
        : ($fila['forte'] == '3'? 'Propiedad industrial'
        : ($fila['forte'] == '4'? 'Ferias, misiones comerciales, ruedas de negocio y postulaciones'
        : ($fila['forte'] == '5'? 'Centro de transformaci??n digital empresarial'
        : ($fila['forte'] == '6'? 'T??cnicas y acompa??amiento especializado'
        : ($fila['forte'] == '7'? 'Marcas y Patentes' : 'Otro'))))));
        
      $fechaSol = explode('-', explode(' ', $fila['updated_at'])[0]);
      $updated_at = $fechaSol[2]."/".$fechaSol[1]."/".$fechaSol[0];
      $id_f = '"'.$fila['id'].'"';
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
          <td>".$fila['razonSocial2']."</td>
          <td>".$fila['razonSocial3']."</td>
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
          <td>$sectorEcon</td>
          <td>".$fila['sectorEconOtro']."</td>
          <td>".$fila['ppalProdServ']."</td>
          <td>".$fila['formeTema']."</td>
          <td>$forte</td>
          <td>".$fila['forteOtro']."</td>
          <td>$updated_at</td>
          <td>".$fila['solicitud']."</td>
          <td style='vertical-align: middle;'>
            <a href='diligencias_new.php?id_edit=".$fila['id']."' class='btn btn-success' title='Editar'><i class='cui-pencil'></i></a>
          </td>
          <td style='vertical-align: middle;'>
            <button class='btn btn-danger' title='Eliminar' onClick='Eliminar($id_f)'>
            <i class='cui-trash'></i></button>
          </td>
        </tr>";
    }
    //echo utf8_encode($tbody);
    echo $tbody;
  } 

  if (isset( $_GET['exportar'] )) {
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
      $bloque = "nombres $txt
        OR apellido1 $txt
        OR apellido2 $txt
        OR apellidos $txt
        OR razonSocial $txt";
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
    $tipoDocumento
      = $documento
      = $nombres
      = $apellido1
      = $apellido2
      = $apellidos
      = $razonSocial
      = $razonSocial2
      = $razonSocial3
      = $activEcon
      = $direccDomic
      = $ciudad
      = $email
      = $telocel1
      = $telocel2
      = $nitEmpr
      = $activEconEmpr
      = $direccEmpr
      = $emailPersonalEmpr
      = $emailEmpr
      = $telocel
      = $sectorEcon
      = $sectorEconOtro
      = $ppalProdServ
      = $formeTema
      = $forte
      = $forteOtro
      = $solicitud
      = $updated_at = '';
    if ($tipoCons == 'nn') {
      $stmt = mysqli_query($conn, $cons);
    }
    elseif ($tipoCons == 'yn') {
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param($stmt, 's', $_GET['tipoDoc']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt
        , $tipoDocumento
        , $documento
        , $nombres
        , $apellido1
        , $apellido2
        , $apellidos
        , $razonSocial
        , $razonSocial2
        , $razonSocial3
        , $activEcon
        , $direccDomic
        , $ciudad
        , $email
        , $telocel1
        , $telocel2
        , $nitEmpr
        , $activEconEmpr
        , $direccEmpr
        , $emailPersonalEmpr
        , $emailEmpr
        , $telocel
        , $sectorEcon
        , $sectorEconOtro
        , $ppalProdServ
        , $formeTema
        , $forte
        , $forteOtro
        , $solicitud
        , $updated_at
      );
    }
    elseif ($tipoCons == 'ny') {
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param($stmt, 's', $_GET['txtBuscar']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt
        , $tipoDocumento
        , $documento
        , $nombres
        , $apellido1
        , $apellido2
        , $apellidos
        , $razonSocial
        , $razonSocial2
        , $razonSocial3
        , $activEcon
        , $direccDomic
        , $ciudad
        , $email
        , $telocel1
        , $telocel2
        , $nitEmpr
        , $activEconEmpr
        , $direccEmpr
        , $emailPersonalEmpr
        , $emailEmpr
        , $telocel
        , $sectorEcon
        , $sectorEconOtro
        , $ppalProdServ
        , $formeTema
        , $forte
        , $forteOtro
        , $solicitud
        , $updated_at
      );
    }
    else {
      $stmt = mysqli_prepare($conn, $cons);
      mysqli_stmt_bind_param($stmt, 'ss', $_GET['tipoDoc'], $_GET['txtBuscar']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt
        , $tipoDocumento
        , $documento
        , $nombres
        , $apellido1
        , $apellido2
        , $apellidos
        , $razonSocial
        , $razonSocial2
        , $razonSocial3
        , $activEcon
        , $direccDomic
        , $ciudad
        , $email
        , $telocel1
        , $telocel2
        , $nitEmpr
        , $activEconEmpr
        , $direccEmpr
        , $emailPersonalEmpr
        , $emailEmpr
        , $telocel
        , $sectorEcon
        , $sectorEconOtro
        , $ppalProdServ
        , $formeTema
        , $forte
        , $forteOtro
        , $solicitud
        , $updated_at
      );
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
            <th>R. social 1</th>
            <th>R. social 2</th>
            <th>R. social 3</th>    
            <th>Act. econ??mica</th>
            <th>Dir. domicilio</th>
            <th>Ciudad</th>
            <th>Correo</th>
            <th>Tel. o cel. 1</th>
            <th>Tel. o cel. 2</th>
            <th>Act. econ??mica empresa</th>
            <th>Dir. empresa</th>
            <th>Correo empresarial</th>
            <th>Correo empresa</th>
            <th>Tel. o cel.</th>
            <th>Desarrollo prod.</th>
            <th>Desarrollo prod. otro</th>
            <th>Ppal. producto/servicio</th>
            <th>Form. empresarial</th>
            <th>Fort. empresarial</th>
            <th>Fort. empresarial otro</th>
            <th>Fecha solicitud</th>
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