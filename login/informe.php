<?php
//include 'funciones.php';

header('Content-type: application/vnd.ms-excel; charset=utf8');
header("Content-Disposition: attachment; filename=innforme.xls");
header("Pragma: no-cache");
header("Expires: 0");

$usuario = "root";
// $contrasena = "C4m1l0.M2017!";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
$contrasena = "";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
$servidor = "localhost";
$basededatos = "ccputuma_CDE";

$conn = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

if (!$conn) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}

if (isset($_GET)) {

    $cons = 'SELECT * FROM diligencias_new';
    // $cons = 'SELECT tipoDocumento, nitEmpr, documento, nombres, apellido1, apellido2, apellidos, razonSocial, activEcon, ciudad, email, emailPersonalEmpr, emailEmpr, telocel1, telocel2, telocel, ctde, dp, forme, forte, create_at, solicitud FROM diligencias';
    $donde = '';
    if ($_GET['tipoDoc']) {
        $donde .= ' WHERE tipoDocumento = ' . $_GET['tipoDoc'];
    }
    if ($_GET['txtBuscar']) {
        $txt = "LIKE '%" . $_GET['txtBuscar'] . "%'";
        $bloque = "nombres $txt OR apellidos $txt OR documento $txt";
        $donde .= $donde ? " AND ($bloque)" : " WHERE $bloque";
    }
    if ($_GET['fechaDesde']) {
        $fechaDesde = "create_at >= '" . $_GET['fechaDesde'] . " 00:00:00'";
        $donde .= $donde ? " AND $fechaDesde" : " WHERE $fechaDesde";
    }
    if ($_GET['fechaHasta']) {
        $fechaHasta = "create_at <= '" . $_GET['fechaHasta'] . " 23:59:59'";
        $donde .= $donde ? " AND $fechaHasta" : " WHERE $fechaHasta";
    }
    $cons .= $donde;
    // echo "$cons <br>";
    $res = mysqli_query($conn, $cons);
    //echo mysqli_error($conn);
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

        // $forte = $fila['forte'] == '1' ? 'Innovación'
        //     : ($fila['forte'] == '2' ? 'Fábricas de productividad'
        //         : ($fila['forte'] == '3' ? 'Propiedad industrial'
        //             : ($fila['forte'] == '4' ? 'Ferias, Misiones, otros.' : '')));

        $fechaSol = explode('-', explode(' ', $fila['create_at'])[0]);
        $updated_at = $fechaSol[2] . "/" . $fechaSol[1] . "/" . $fechaSol[0];

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
                <td>" . $fila['genero'] . "</td>
                <td>" . $fila['escolaridad'] . "</td>
                <td>" . $fila['rango_edad'] . "</td>
                <td>" . (!is_null($fila['solicitud']) ? $fila['solicitud'] : '') . "</td>
            </tr>";
    }
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Infome CDE</title>
</head>

<body>
    <table border="1" class="table table-responsive table-bordered table-striped table-sm" style="font-size: 12px;">
        <thead>
            <tr>
                <th class="text-center align-middle">#</th>
                <th class="text-center align-middle">Tipo documento</th>
                <th class="text-center align-middle">Doc. persona</th>
                <th class="text-center align-middle">Nombres completos</th>
                <th class="text-center align-middle">Correos</th>
                <th class="text-center align-middle">Celulares</th>
                <th class="text-center align-middle">Ciudad</th>
                <th class="text-center align-middle">Direcc. Empresa</th>
                <th class="text-center align-middle">Actividad Económica</th>
                <th class="text-center align-middle">Des. Productivo</th>
                <th class="text-center align-middle">Princ. Prod. Serv</th>
                <th class="text-center align-middle">Fort. Empresarial</th>
                <th class="text-center align-middle">Form. Empresarial</th>
                <th class="text-center align-middle">Nombre Representante</th>
                <th class="text-center align-middle">Población</th>
                <th class="text-center align-middle">Fecha Matricula</th>
                <th class="text-center align-middle">Matricula</th>
                <th class="text-center align-middle">Registrado</th>
                <th class="text-center align-middle">Num. Cam. Comercio</th>
                <th class="text-center align-middle">Programa CCP</th>
                <th class="text-center align-middle">Estado Solicitud</th>
                <th class="text-center align-middle">Fecha Solicitud</th>
                <th class="text-center align-middle">Genero</th>
                <th class="text-center align-middle">Escolaridad</th>
                <th class="text-center align-middle">Rango edad</th>
                <th class="text-center align-middle">Solicitud</th>
            </tr>
        </thead>
        <tbody id="cuerpo">
            <?= $tbody ?>
        </tbody>
    </table>
</body>

</html>