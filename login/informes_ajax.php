<?php
include 'funciones.php';

if (isset($_POST['listar'])) {
    $cons = 'SELECT tipoDocumento, documento, nombres, apellidos, ciudad, email, celular,direccEmpr, activEcon, otro_activEcon, des_productivo, princ_prod_serv, fort_empresarial, form_empresarial, nombre_representante, celular_representante, email_representante, poblacion, otro_poblacion, fecha_matricula, matricula, registrado, num_cam_comercio, programa_ccp, estado_solicitud, fecha_solicitud, genero, escolaridad, rango_edad, solicitud FROM diligencias_new';
    $donde = '';

    // ------------------------
    if ($_POST['tipoDoc']) {
        $donde .= ' WHERE tipoDocumento = ' . $_POST['tipoDoc'];
    } else {

        if ($_POST['txtBuscar']) {

            $txt = "LIKE '%" . $_POST['txtBuscar'] . "%'";
            $bloque = "nombres $txt OR apellidos $txt OR documento $txt";
            $donde .= $donde ? " AND ($bloque)" : " WHERE $bloque";
        } else {

            if ($_POST['fechaDesde']) {
                $fechaDesde = "create_at >= '" . $_POST['fechaDesde'] . " 00:00:00'";
                $donde .= $donde ? " AND $fechaDesde" : " WHERE $fechaDesde";
            }
            if ($_POST['fechaHasta']) {
                $fechaHasta = "create_at <= '" . $_POST['fechaHasta'] . " 23:59:59'";
                $donde .= $donde ? " AND $fechaHasta" : " WHERE $fechaHasta";
            }
        }
    }

    // -------------------------

    // $limit = ' ORDER BY id_diligencia DESC LIMIT 20';
    // $cons .= $donde .= $limit;
    $cons .= $donde;


    $res = mysqli_query($conn, $cons);
    // echo "<pre>";
    // print_r($cons);
    // echo "</pre>";
    // exit;
    // print_r($cons);
    // echo mysqli_error($conn);
    $cont = 0;
    $tbody = '';
    //echo json_encode(mysqli_fetch_array($res));
    while ($fila = mysqli_fetch_array($res)) {
        $cont++;
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

        $forte = $fila['fort_empresarial'] == '1' ? 'Innovación'
            : ($fila['fort_empresarial'] == '2' ? 'Fábricas de productividad'
                : ($fila['fort_empresarial'] == '3' ? 'Propiedad industrial'
                    : ($fila['fort_empresarial'] == '4' ? 'Ferias, Misiones, otros.' : '')));

        // $fechaSol = explode('-', explode(' ', $fila['create_at'])[0]);
        // $create_at = $fechaSol[2] . "/" . $fechaSol[1] . "/" . $fechaSol[0];
        // $fechaSol = explode('-', explode(' ', $fila['updated_at'])[0]);
        // $update_at = $fechaSol[2] . "/" . $fechaSol[1] . "/" . $fechaSol[0];
        $tbody .= "
            <tr>
                <td>$cont</td>
                <td>$tipoDocumento</td>
                <td>" . $fila['documento'] . "</td>
                <td>" . $fila['nombres'] . ' ' . (!is_null($fila['apellidos']) ? $fila['apellidos'] : '') . "</td>
                <td>" . $fila['email'] . '<br>' . $fila['email_representante'] . "</td>
                <td>" . $fila['celular'] . '<br>' . $fila['celular_representante'] . "</td>
                <td>" . $fila['ciudad'] . "</td>
                <td>" . $fila['direccEmpr'] . "</td>
                <td>" . $fila['activEcon'] . '<br>' . $fila['otro_activEcon'] . "</td>
                <td>" . $fila['des_productivo'] . "</td>
                <td>" . $fila['princ_prod_serv'] . "</td>
                <td>" . $fila['fort_empresarial'] . "</td>
                <td>" . $fila['form_empresarial'] . "</td>
                <td>" . $fila['nombre_representante'] . "</td>
                <td>" . $fila['poblacion'] . '<br>' . $fila['otro_poblacion'] . "</td>
                <td>" . $fila['fecha_matricula'] . "</td>
                <td>" . $fila['matricula'] . "</td>
                <td>" . $fila['registrado'] . "</td>
                <td>" . $fila['num_cam_comercio'] . "</td>
                <td>" . $fila['programa_ccp'] . "</td>
                <td>" . $fila['estado_solicitud'] . "</td>
                <td>" . $fila['fecha_solicitud'] . "</td>
                <td>" . $fila['solicitud'] . "</td>
                <td>" . $fila['genero'] . "</td>
                <td>" . $fila['escolaridad'] . "</td>
                <td>" . $fila['rango_edad'] . "</td>
            </tr>";
    }
    echo $tbody;
}
