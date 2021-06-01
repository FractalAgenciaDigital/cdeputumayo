<?php
    include 'funciones.php';

    if (isset( $_POST['listar'] )) {
        $cons = 'SELECT tipoDocumento, nitEmpr, documento, nombres, apellido1, apellido2, apellidos, razonSocial, activEcon, ciudad, email, emailPersonalEmpr, emailEmpr, telocel1, telocel2, telocel, ctde, dp, forme, forte, create_at, solicitud FROM diligencias';
        $donde = '';
        if ($_POST['tipoDoc']) {
            $donde .= ' WHERE tipoDocumento = '.$_POST['tipoDoc'];
        }
        if ($_POST['txtBuscar']) {
            $txt = "LIKE '%". $_POST['txtBuscar'] ."%'";
            $bloque = "nombres $txt OR apellido1 $txt OR apellido2 $txt OR apellidos $txt OR razonSocial $txt or documento $txt or nitEmpr $txt";
            $donde .= $donde? " AND ($bloque)" : " WHERE $bloque";
        }
        if ($_POST['fechaDesde']) {
           $fechaDesde = "create_at >= '". $_POST['fechaDesde'] ." 00:00:00'";
           $donde .= $donde? " AND $fechaDesde" : " WHERE $fechaDesde";
        }
        if ($_POST['fechaHasta']) {
            $fechaHasta = "create_at <= '". $_POST['fechaHasta'] ." 23:59:59'";
            $donde .= $donde? " AND $fechaHasta" : " WHERE $fechaHasta";
        }
        $cons .= $donde;
        
        $res = mysqli_query($conn, $cons);
        //echo mysqli_error($conn);
        $cont = 0;
        $tbody = '';
        //echo json_encode(mysqli_fetch_array($res));
        while ($fila = mysqli_fetch_array($res))
        {
            $cont++;
            $tipoDocumento = $fila['tipoDocumento'] == '1' ? 'CÉDULA DE CIUDADANÍA'
            : ($fila['tipoDocumento'] == '2'? 'NIT' : 'OTROS');

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
            $update_at = $fechaSol[2]."/".$fechaSol[1]."/".$fechaSol[0];
            $tbody .= "
            <tr>
                <td>$cont</td>
                <td>$tipoDocumento</td>
                <td>". (!is_null($fila['nitEmpr']) ? $fila['nitEmpr'] : '') ."</td>
                <td>". $fila['documento'] ."</td>
                <td>". $fila['nombres'] .' '. (!is_null($fila['apellido1']) ? $fila['apellido1']. (!is_null($fila['apellido2']) ? ' '. $fila['apellido2']: '') : $fila['apellidos']) ."</td>
                <td>". (!is_null($fila['razonSocial']) ? $fila['razonSocial'] : '') ."</td>
                <td>". $fila['activEcon'] ."</td>
                <td>$ciudad</td>
                <td>". $fila['email'] .'<br>'. $fila['emailPersonalEmpr'] .'<br>'. $fila['emailEmpr'] ."</td>
                <td>". $fila['telocel1'] . (!is_null($fila['telocel2'])? '<br>'. $fila['telocel2'] : '') . (!is_null($fila['telocel'])? '<br>'. $fila['telocel'] : '') ."</td>
                <td>". ($fila['ctde'] ? 'Si' : 'No') ."</td>
                <td>". ($fila['dp'] ? 'Si' : 'No') ."</td>
                <td>". ($fila['forme'] ? 'Si' : 'No') ."</td>
                <td>$forte</td>
                <td>$create_at</td>
                <td>$update_at</td>
                <td>". (!is_null($fila['solicitud']) ? $fila['solicitud'] : '') ."</td>
            </tr>";
        }
        echo $tbody;
    }
?>