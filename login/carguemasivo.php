<?php
include "cabecera.php";
include '../funciones.php';

?>

<script type="text/javascript">
    function subirArchivoExcel() {

        if (document.frmSubirArchivo.excel.value == "") {
            alert('Debe seleccionar un archivo CSV. Gracias.');
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

            <!-- <div style="background:orange; padding:10px" class="form"> -->

            <form style="padding:10px" class="container" id="frmSubirArchivo" name="frmSubirArchivo" method="POST" enctype="multipart/form-data">
                <div class="form-group col-5">
                    <strong>Diligencias-Clientes</strong>
                    <div class=" form-group">
                        <label for=" documento"></label>
                        <input id="excel" type="file" name="excel" class="">
                    </div>
                    <div class="form-group" style="margin-left: 0.5rem;">
                        <input type="submit" style="margin-left: 2rem;" class="btn btn-info" value="Subir" onclick="subirArchivoExcel()">
                    </div>


                    <div>
                        <h3>errorss</h3>
                        <?php
                        if (isset($error))
                            echo "<p>" . $error . "</p>";
                        ?>
                    </div>
                    <?php
                    if (isset($error)) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo "$error" ?>
                            <div type="text" class="btn-close" data-bs-dismiss="alert" aria-label="Close">Nada</div>
                        </div>
                    <?php
                    } ?>
                    <div id=" alertSI" class="alert alert-success alert-dismissible fade" role="alert">¡OK!</div>
                    <div class="form-group">
                        here
                    </div>
                </div>
            </form>
            <!-- </div> -->
        </div>
    </div>
</div>