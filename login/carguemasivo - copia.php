<?php
// ESTE ARCHIVO FUNCIONA PERO SE IMPLEMENTO UNO MEJOR POR LO TANTO NO SE ESTA UTILIZANDO
include "cabecera.php";
include '../funciones.php';

?>
<div class=" bg-light">
    <div class="container bg-white mb-4">
        <div class="form-row pt-2">
            <div class="form-group col-12">
                <strong>Archivo Prueba</strong>
                <div class="dropdown-divider"></div>
            </div>

            <div class="form">
                <div class="form-row pt-1">
                    <form action="importarCSV.php" class="form-group" id="subida" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-12>
                            <label for=" documento"></label>
                            <input type="file" id="csv" name="csv" class="form-control">
                        </div>
                        <div class="form-group col-12" style="margin-left: 0.5rem">
                            <input type="submit" style="margin-left: 0.5rem" class="btn btn-info" value="Subir">
                        </div>
                        <div class="form-group col">
                            <p id="respuesta"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>