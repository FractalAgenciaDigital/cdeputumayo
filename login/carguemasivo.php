<?php
include "cabecera.php";
include '../funciones.php';

?>

<script type="text/javascript">
    function subirArchivoExcel() {

        if (document.frmSubirArchivo.excel.value == "") {
            alert("Debe seleccionar un archivo CSV. Gracias. ");
            document.frmSubirArchivo.excel.focus();
            return false;
        }


        document.frmSubirArchivo.action = "upload.php";
        document.frmSubirArchivo.submit();

    }
</script>
<div class=" bg-light">
    <div class="container bg-white mb-4">
        <div class="form-row pt-2">
            <div class="form-group col-12">
                <strong>CSV Archivos</strong>
                <div class="dropdown-divider"></div>
            </div>

            <div class="form">
                <div class="form-row pt-1">
                    <form class="form-group" id="frmSubirArchivo" name="frmSubirArchivo" method="POST" enctype="multipart/form-data">
                        <?php
                        if (isset($_SESSION['message'])) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= $_SESSION['message'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            // session_unset();
                        }
                        ?>
                        <div class="form-group col-12>
                            <label for=" documento"></label>
                            <input id="excel" type="file" name="excel" class="form-control">
                        </div>
                        <div class="form-group col-12" style="margin-left: 0.5rem">
                            <input type="submit" class="btn btn-info" value="Subir" onclick="subirArchivoExcel()">
                        </div>

                        <!-- <div id=" alertSI" class="alert alert-success alert-dismissible fade show" role="alert">¡OK!
                        </div>
                        <div id="alertNO" class="alert alert-danger" role="alert">Debe seleccionar un archivo CSV. Gracias.</div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<script type="text/javascript">
    $(document).ready(function() {
        $("#alertSI").hide();
        $("#alertNO").hide();
        $("#frmSubirArchivo").submit(function(e) {
            e.preventDefault();
            excel = $.trim($("#excel").val());
            if (excel.length > 1) {
                $("#alertSI").fadeTo(2000, 500).slideUp(500, function() {
                    $("#alertSI").slideUp(500);
                });
            } else {
                $("#alertNO").fadeTo(2000, 500).slideUp(500, function() {
                    $("#alertNO").slideUp(500);
                });
            }
        });
    });
</script> -->