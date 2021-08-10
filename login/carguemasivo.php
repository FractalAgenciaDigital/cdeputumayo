<?php
// ESTE ARCHIVO FUNCIONA PERO SE IMPLEMENTO UNO MEJOR POR LO TANTO NO SE ESTA UTILIZANDO
include "cabecera.php";
include '../funciones.php';

// $sql = "SELECT CONCAT_WS(\' \',apellido1, apellido2, apellidos) datos FROM diligencias";
// SELECT fecha_matricula FROM `extras_usus` INNER JOIN diligencias ON extras_usus.id_usu=diligencias.id ORDER BY `extras_usus`.`id_usu` ASC
// 

if (isset($_POST["enviar"])) {

    $archivo_name = $_FILES["csv"]["name"];
    $ruta_tmp = $_FILES["csv"]["tmp_name"];

    // echo $archivo_name . $ruta_tmp;

    // --------------------Copiar Archivo
    //Copiar archivo a Ruta
    // $archivo_save = "copia_" . $archivo_name;
    // if (copy($ruta_tmp, $archivo_save)) {
    //     echo "Archivo Guardado Correctamente";
    // } else {
    //     echo "Hubo un error";
    // }

    // -----------------end up


    // Si existe el archivo: Ya sea guardado o en tmp
    if (file_exists($ruta_tmp)) {
        if (substr($_FILES['csv']['name'], -3) == "csv") {
            // Declarar var de lectura
            $fp = fopen($ruta_tmp, "r");   //Abrir archivo o ruta

            // Para que no genere error al insertar la cabecera
            $rows = 1;

            while ($data = fgetcsv($fp, 0, ";")) {

                // echo $datos[0] . " " . $datos[1] . " " . $datos[2] . " " . $datos[3] . " " . $datos[4] . " " . $datos[5]  . " " . $datos[6]  . " " . $datos[7]  . " " . $datos[8]  . " " . $datos[9]  . " " . $datos[10]  . " " . $datos[11]  . " " . $datos[12]  . " " . $datos[13]  . " " . $datos[14]  . " " . $datos[15]  . " " . $datos[16]  . " " . $datos[17]  . " " . $datos[18]  . " " . $datos[19]  . " " . $datos[20]  . " " . $datos[21]  . " " . $datos[22]  . " " . $datos[23]  . " " . $datos[24]  . " " . $datos[25]  . " " . $datos[26]  . " " . $datos[27]  . " " . $datos[28] . " " . $datos[29] . "<br>";

                // if ($rows > 1) {
                if ($rows != 1) {

                    $data[19] = date("Y-m-d");
                    $data[25] = date("Y-m-d");
                    // $data[32] = date("Y-m-d");
                    // $data[33] = date("Y-m-d");

                    // $resultado = insertar_datos($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9], $datos[10], $datos[11], $datos[12], $datos[13], $datos[14], $datos[15], $datos[16], $datos[17], $datos[18], $datos[19], $datos[20], $datos[21], $datos[22], $datos[23], $datos[24], $datos[25], $datos[26], $datos[27], $datos[28], $datos[29]);

                    // para insertar con id_diligencia y create_at y updated_at
                    // $sql_guardar = "INSERT INTO diligencias_new(id_diligencia, tipoDocumento, documento, nombres, apellidos, ciudad, email, celular, razonSocial, nitEmpr, direccEmpr, activEcon, otro_activEcon, des_productivo, fort_empresarial, form_empresarial, nombre_representante, celular_representante, email_representante, poblacion, otro_poblacion, fecha_matricula, matricula, registrado, num_cam_comercio, programa_ccp, estado_solicitud, fecha_solicitud, genero, escolaridad, rango_edad, solicitud,create_at,updated_at) VALUES ('$data[0]','$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]', '$data[16]', '$data[17]', '$data[18]', '$data[19]', '$data[20]', '$data[21]', '$data[22]', '$data[23]', '$data[24]', '$data[25]', '$data[26]', '$data[27]', '$data[28]', '$data[29]', '$data[30]', '$data[31]', '$data[32]', '$data[33]')";
                    $sql_guardar = "INSERT INTO diligencias_new(tipoDocumento, documento, nombres, apellidos, ciudad, email, celular, razonSocial, nitEmpr, direccEmpr, activEcon, otro_activEcon, des_productivo, fort_empresarial, form_empresarial, nombre_representante, celular_representante, email_representante, poblacion, otro_poblacion, fecha_matricula, matricula, registrado, num_cam_comercio, programa_ccp, estado_solicitud, fecha_solicitud, genero, escolaridad, rango_edad, solicitud) VALUES ('$data[0]','$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]', '$data[16]', '$data[17]', '$data[18]', '$data[19]', '$data[20]', '$data[21]', '$data[22]', '$data[23]', '$data[24]', '$data[25]', '$data[26]', '$data[27]', '$data[28]', '$data[29]', '$data[30]')";

                    $resultado = mysqli_query($conn, $sql_guardar);
                    if ($resultado) {
                        $mensaje = "Se inserto los datos Correctamente<br/>";
                        // return;
                    } else {
                        $mensaje = "No se realizo la insercción<br/>";
                    }
                }
                $rows++;
            }
        } else {
            $mensaje =  "No es un archivo excel. Vuelva a intentarlo porfavor.";
            // $mensaje = "No hay un archivo";
        }
    } else {
        $mensaje = "No hay un archivo seleccionado";
        // $mensaje =  "No es un archivo excel. Vuelva a intentarlo porfavor.";
    }
}


?>
<div class=" bg-light">
    <div class="container bg-white mb-4">
        <div class="form-row pt-2">
            <div class="form-group col-12">
                <strong>Archivo Prueba</strong>
                <div class="dropdown-divider"></div>
            </div>

            <form style="padding:10px" action="carguemasivo.php" class="form-group" id="subida" method="POST" enctype="multipart/form-data">
                <div class="form-group">

                    <strong>Diligencias-Clientes</strong>

                    <div class="form-group>
                            <label  for=" documento"></label>
                        <input style="margin-top: 5px;" type="file" id="csv" name="csv" class="form-control">
                    </div>
                    <div class="form-group" style="margin-left: 0.5rem; margin-top: 5px;">
                        <input type="submit" name="enviar" style="margin-left: 0.5rem" class="btn btn-info" value="Subir">
                    </div>
                    <div>
                        <a href="../site/assets/Upload/Plantillas/diligencias_new.csv">Descargar PLantilla de Diligencias</a>
                    </div>
                    <div class="form-group" style="margin-top: 5px;">
                        <?php
                        if (isset($mensaje)) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= $mensaje ?>
                                <button style="margin-top:-4.5px;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                    </div>
            </form>
        </div>
    </div>
</div>