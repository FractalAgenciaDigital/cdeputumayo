<?php
include "cabecera.php";
include '../funciones.php';
$id_edit = '';
$id_registro = '';

// $tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : "";


if (isset($_POST['registrar'])) {
  $tipoDocumento = trim($_POST['tipoDocumento']);
  $documento = trim($_POST['documento']);
  $nombres = trim($_POST['nombres']);
  $apellidos = trim($_POST['apellidos']);
  $ciudad = trim($_POST['ciudad']);
  $email = trim($_POST['email']);
  $celular = trim($_POST['celular']);
  $activEcon = trim($_POST['activEcon']);
  $des_productivo = trim($_POST['des_productivo']);
  $princ_prod_serv = trim($_POST['princ_prod_serv']);
  $fort_empresarial = trim($_POST['fort_empresarial']);
  $form_empresarial = trim($_POST['form_empresarial']);
  $nombre_representante = trim($_POST['nombre_representante']);
  $celular_representante = trim($_POST['celular_representante']);
  $email_representante = trim($_POST['email_representante']);
  $poblacion = trim($_POST['poblacion']);
  $otro_poblacion = trim($_POST['otro_poblacion']);
  $fecha_matricula = trim($_POST['fecha_matricula']);
  $matricula = trim($_POST['matricula']);
  $registrado = trim($_POST['registrado']);
  $num_cam_comercio = trim($_POST['num_cam_comercio']);
  $programa_ccp = trim($_POST['programa_ccp']);
  $estado_solicitud = trim($_POST['estado_solicitud']);
  $fecha_solicitud = trim($_POST['fecha_solicitud']);


  $consulta = "INSERT INTO diligencias_new ( `tipoDocumento`, `documento`, `nombres`, `apellidos`, `ciudad`, `email`, `celular`, `activEcon`, `des_productivo`, `princ_prod_serv`, `fort_empresarial`, `form_empresarial`, `nombre_representante`, `celular_representante`, `email_representante`, `poblacion`, `otro_poblacion`, `fecha_matricula`, `matricula`, `registrado`, `num_cam_comercio`, `programa_ccp`, `estado_solicitud`, `fecha_solicitud`) VALUES ( '$tipoDocumento','$documento','$nombres','$apellidos','$ciudad','$email','$celular','$activEcon','$des_productivo','$princ_prod_serv','$fort_empresarial','$form_empresarial','$nombre_representante','$celular_representante','$email_representante','$poblacion','$otro_poblacion','$fecha_matricula' ,'$matricula','$registrado','$num_cam_comercio','$programa_ccp','$estado_solicitud','$fecha_solicitud') ";

  $ejecutar = mysqli_query($conn, $consulta);
  $consulta = "SELECT id FROM diligencias_new ORDER BY id desc LIMIT 1";
  //$aux = mysqli_fetch_array($ejecutar);
  $ejecutar = mysqli_query($conn, $consulta);
  // $id_aux = xmysqli_fetch_array($res);


  // print_r($ejecutar);
?>
  <script>
    //documento.location.href = "diligencias.php";
  </script>
<?php

} elseif (isset($_GET['id_edit'])) {
  $id_edit = $id_registro = $_GET['id_edit'];
  $cons = "SELECT * FROM diligencias_new where id=" . $id_registro;
  $res = mysqli_query($conn, $cons);
  $datos_usu = mysqli_fetch_array($res);

  $cons = "SELECT * FROM extras_usus where id_usu=" . $id_registro;
  $res = mysqli_query($conn, $cons);
  $datos_extra = mysqli_fetch_array($res);

  $tipoDocumento = isset($datos_extra['tipoDocumento']) ? $datos_extra['tipoDocumento'] : "";
  $documento = isset($datos_extra['documento']) ? $datos_extra['documento'] : "";
  $nitEmpr = isset($datos_extra['nitEmpr']) ? $datos_extra['nitEmpr'] : "";
  $nombres = isset($datos_extra['nombres']) ? $datos_extra['nombres'] : "";
  $apellidos = isset($datos_extra['apellidos']) ? $datos_extra['apellidos'] : "";
  $ciudad = isset($datos_extra['ciudad']) ? $datos_extra['ciudad'] : "";
  $email = isset($datos_extra['email']) ? $datos_extra['email'] : "";
  $celular = isset($datos_extra['celular']) ? $datos_extra['celular'] : "";
  $activEcon = isset($datos_extra['activEcon']) ? $datos_extra['activEcon'] : "";
  $des_productivo = isset($datos_extra['des_productivo']) ? $datos_extra['des_productivo'] : "";
  $princ_prod_serv = isset($datos_extra['princ_prod_serv']) ? $datos_extra['princ_prod_serv'] : "";
  $fort_empresarial = isset($datos_extra['fort_empresarial']) ? $datos_extra['fort_empresarial'] : "";
  $form_empresarial = isset($datos_extra['form_empresarial']) ? $datos_extra['form_empresarial'] : "";
  $nombre_representante = isset($datos_extra['nombre_representante']) ? $datos_extra['nombre_representante'] : "";
  $celular_representante = isset($datos_extra['celular_representante']) ? $datos_extra['celular_representante'] : "";
  $email_representante = isset($datos_extra['email_representante']) ? $datos_extra['email_representante'] : "";
  $poblacion = isset($datos_extra['poblacion']) ? $datos_extra['poblacion'] : "";
  $otro_poblacion = isset($datos_extra['otro_poblacion']) ? $datos_extra['otro_poblacion'] : "";
  $fecha_matricula = isset($datos_extra['fecha_matricula']) ? $datos_extra['fecha_matricula'] : "";
  $matricula = isset($datos_extra['matricula']) ? $datos_extra['matricula'] : "";
  $registrado = isset($datos_extra['registrado']) ? $datos_extra['registrado'] : "";
  $num_cam_comercio = isset($datos_extra['num_cam_comercio']) ? $datos_extra['num_cam_comercio'] : "";
  $programa_ccp = isset($datos_extra['programa_ccp']) ? $datos_extra['programa_ccp'] : "";
  $estado_solicitud = isset($datos_extra['estado_solicitud']) ? $datos_extra['estado_solicitud'] : "";
  $fecha_solicitud = isset($datos_extra['fecha_solicitud']) ? $datos_extra['fecha_solicitud'] : "";
} else {
  $tipoDocumento = "";
  $documento = "";
  $nitEmpr = "";
  $nombres = "";
  $apellidos = "";
  $ciudad = "";
  $email = "";
  $celular = "";
  $activEcon = "";
  $des_productivo = "";
  $princ_prod_serv = "";
  $fort_empresarial = "";
  $form_empresarial = "";
  $nombre_representante = "";
  $celular_representante = "";
  $email_representante = "";
  $poblacion = "";
  $otro_poblacion = "";
  $fecha_matricula = "";
  $matricula = "";
  $registrado = "";
  $num_cam_comercio = "";
  $programa_ccp = "";
  $estado_solicitud = "";
  $fecha_solicitud = "";
}



?>
<style>
  .form-control {
    background-color: #e6e6e6 !important;
    color: #1c1c1d;
  }
</style>

<div class=" bg-light">
  <form name="registro_diligencia" method="POST">
    <div class="container bg-white mb-4">
      <div class="form-row pt-2">
        <div class="form-group col-12">
          <strong>DATOS PRINCIPALES </strong>
          <div class="dropdown-divider"></div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-3">
          <label for="tipoDocumento">Tipo Documento</label>
          <select required name="tipoDocumento" id="tipoDocumento" class="form-control">
            <option value="">Seleccione</option>
            <option value="CC" <?php if ($tipoDocumento == "CC") {
                                  echo "selected";
                                } ?>>Cedula de Ciudadania</option>
            <option value="NIT" <?php if ($tipoDocumento == "NIT") {
                                  echo "selected";
                                } ?>>NIT</option>
            <option value="CE" <?php if ($tipoDocumento == "CE") {
                                  echo "selected";
                                } ?>>Cedula de Extranjeria</option>
            <option value="NA" <?php if ($tipoDocumento == "NA") {
                                  echo "selected";
                                } ?>>Otro</option>
          </select>
        </div>
        <div class="form-group col-3">
          <label for="documento">Documento</label>
          <input type="text" name="documento" required="" id="documento" class="form-control" placeholder="Documento" value="<?php echo $documento ?>">
        </div>
        <!-- <div class="form-group col-3">
          <label for="nitEmpr">NIT Empresa</label>
          <input type="text" name="nitEmpr" v-model="nitEmpr" id="nitEmpr" class="form-control" placeholder="NIT">
        </div> -->
        <div class="form-group col-3">
          <label for="nombres">Nombres</label>
          <input type="text" v-model="" id="nombres" value="<?php echo $nombres ?>" name="nombres" class="form-control" value="">
        </div>
        <div class="form-group col-3">
          <label for="apellidos">Apellidos</label>
          <input type="text" v-model="apellidos" value="<?php echo $apellidos ?>" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-3">
          <label for="ciudad">Ciudad</label>
          <input type="text" class="form-control" value="<?php echo $ciudad ?>" id="ciudad" name="ciudad" placeholder="Ciudad">
        </div>
        <div class="form-group col-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" value="<?php echo $email ?>" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group col-md-3">
          <label for="celular">Celular</label>
          <input type="number" id="celular" value="<?php echo $celular ?>" name="celular" v-model="celular" class="form-control" placeholder="Celular">
        </div>
        <div class="form-group col-md-3">
          <label for="activEcon">Act. Económica:</label>
          <input type="text" id="activEcon" value="<?php echo $activEcon ?>" v-model="activEcon" name="activEcon" class="form-control" placeholder="example" aria-label="ActEconómica">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-3">
          <label for="des_productivo">Des. Productivo:</label>
          <input type="text" id="des_productivo" value="<?php echo $des_productivo ?>" name="des_productivo" class="form-control" placeholder="example" aria-label="DesProductivo">
        </div>
        <div class="form-group col-3">
          <label for="princ_prod_serv">Principal Prod/Serv:</label>
          <input type="text" id="princ_prod_serv" value="<?php echo $princ_prod_serv ?>" name="princ_prod_serv" class="form-control" placeholder="Principal Prod/Serv" aria-label="PrincipalProd/Serv">
        </div>
        <div class="form-group col-3">
          <label for="fort_empresarial">Fortalecimiento Empresarial</label>
          <input type="text" id="fort_empresarial" value="<?php echo $fort_empresarial ?>" name="fort_empresarial" class="form-control" placeholder="Fortalecimiento Empresarial" aria-label="fort_empresarial">
        </div>
        <div class="form-group col-3">
          <label for="form_empresarial">Formación Empresarial:</label>
          <input type="text" id="form_empresarial" value="<?php echo $form_empresarial ?>" name="form_empresarial" class="form-control" placeholder="Formación Empresarial" aria-label="form_empresarial">
        </div>
      </div>


      <div class="form-row">
        <div class="form-group col-12">
          <b>DATOS ADICIONALES</b>
          <div class="dropdown-divider"></div><br>
        </div>
      </div>

      <div class="form-row ">
        <div class="form-group col-3">
          <label for="nombre_representante">Nombre Representante</label>
          <input type="text" value="<?php echo $nombre_representante ?>" name="nombre_representante" id="nombre_representante" class="form-control" placeholder="Nombre Completo">
        </div>
        <div class="form-group col-3">
          <label for=fecha_matricula">Fecha Matricula:</label>
          <input class="form-control" type="date" name="fecha_matricula" id="fecha_matricula" value="<?= $fecha_matricula ?>">
        </div>
        <!-- ---------------------------------------------- -->

        <div class="form-group col-3">
          <label for="poblacion">Tipo Poblacion:</label>
          <select class="form-control" name="poblacion" v-model="select" onChange="tipoPobla(this.value)">
            <option value="Ninguna" <?php if (isset($poblacion) && $poblacion == "Ninguna") {
                                      echo "selected";
                                    } ?>>Ninguno</option>
            <option value="Desplazado" <?php if (isset($poblacion) && $poblacion == "Desplazado") {
                                          echo "selected";
                                        } ?>>Desplazado</option>
            <option value="Afrocolombiano" <?php if (isset($poblacion) && $poblacion == "Afrocolombiano") {
                                              echo "selected";
                                            } ?>>Afrocolombiano</option>
            <option value="Indigena" <?php if (isset($poblacion) && $poblacion == "Indigena") {
                                        echo "selected";
                                      } ?>>Indígena</option>
            <option value="Victima" <?php if (isset($poblacion) && $poblacion == "Victima") {
                                      echo "selected";
                                    } ?>>Victima</option>
            <option value="Cabeza de Familia" <?php if (isset($poblacion) && $poblacion == "Cabeza de Familia") {
                                                echo "selected";
                                              } ?>>Cabeza de Familia</option>

            <option value="Condicion Discapacidad" <?php if (isset($poblacion) && $poblacion == "Condicion Discapacidad") {
                                                      echo "selected";
                                                    } ?>>Condición Discapacidad</option>

            <option value="Otro" onclick="mostrarOtro();" <?php if (isset($poblacion) && $poblacion == "Otro") {
                                                            echo "selected";
                                                          } ?>>Otro</option>
          </select>
        </div>

        <div class="form-group col-3 aux_cual" style="display:none">
          <label for="otro_poblacion">¿Cual es su Tipo Población?</label>
          <input class="form-control" type="text" placeholder="Escriba su tipo de población" name="otro_poblacion" value="<?php echo $otro_poblacion ?>">
        </div>
      </div>
      <!-- ------------------------------------- -->
      <!-- ------------------------------------- -->

      <div class="form-row">
        <div class="form-group col-3">
          <label for="email_representante">Email Representante</label>
          <input type="text" v-model="email_representante" name="email_representante" id="email_representante" class="form-control" value="<?php echo $email_representante ?>" placeholder="Email Representante">
        </div>
        <div class="form-group col-3">
          <label for="matricula" id="matricula" name="matricula">Número Matricula:</label>
          <input class="form-control" type="text" value="<?php echo $matricula ?>" placeholder="matricula" name="matricula" v-model="matricula" id="matricula">
        </div>


        <div class=" form-group col-3">
          <label for="regis_camc">Registrado en C. de Comercio:</label>
          <select class="form-control" name="registrado" id="registrado" v-model="registrado" onChange="siRegistrado(this.value)">
            <option value="No" <?php if (isset($registrado) && $registrado == "No") {
                                  echo "selected";
                                } ?>>No</option>
            <option value="Si" <?php if (isset($registrado) && $registrado == "Si") {
                                  echo "selected";
                                } ?>>Si</option>
          </select>
        </div>
        <div class="form-group col-3 aux_regis " style="display:none">
          <label id="num_cam_comercio" for="num_cam_comercio">Número C. de Comercio:</label>
          <input class="form-control" type="text" placeholder="Número C. de Comercio:" name="num_cam_comercio" id="num_cam_comercio" value="<?= $num_cam_comercio ?>">
        </div>
      </div>
      <!-- --------------------------------------------------- -->
      <!-- 
        <div class="form-group col-3">
          <label for="registrado">Registrado en C. de Comercio:</label>
          <select class="form-control" style="width: 5em;" name="registrado" v-model="" id="registrado">
            <option value="Si" <?php if ($registrado == "Si") {
                                  echo "selected";
                                } ?>>Si</option>
            <option value="No" <?php if ($registrado == "No") {
                                  echo "selected";
                                } ?>>No</option>
          </select>
        </div>
        <div class="form-group col-3" style="display:none">
          <label id="registrado" for="registrado">Número C. de Comercio:</label>
          <input class="form-control" type="text" placeholder="Número cámara comercio" name="registrado" id="registrado" value="<?= $registrado ?>">
        </div> -->

      <d class="form-row">
        <div class="form-group col-3">
          <label for="celular_representante">Celular Representante</label>
          <input type="number" value="<?php echo $celular_representante ?>" id="celular_representante" name="celular_representante" class="form-control" placeholder="Celular Representante">
        </div>

        <div class="form-group col-3">
          <label for="programa_ccp">Pertenece a programa/proyecto de CCP u otras organizaciones:</label>
          <select class="form-control" style="width: 5em;" name="programa_ccp" v-model="programa_ccp" id="programa_ccp" onChange="cpp(this.value)">
            <option value="No" <?php if (isset($programa_ccp) && $programa_ccp == "No") {
                                  echo "selected";
                                } ?>>No</option>
            <option value="Si" <?php if (isset($programa_ccp) && $programa_ccp == "Si") {
                                  echo "selected";
                                } ?>>Si</option>
          </select>
        </div>

        <div class="form-group col-3 aux_program">
          <label for="estado_solicitud">Estado solicitud:</label>
          <select class="form-control " name="estado_solicitud" id="estado_solicitud">
            <option value="En proceso" <?php if (isset($estado_solicitud) && $estado_solicitud == "En proceso") {
                                          echo "selected";
                                        } ?>>En proceso</option>
            <option value="Resuelta" <?php if (isset($estado_solicitud) && $estado_solicitud == "Resuelta") {
                                        echo "selected";
                                      } ?>>Resuelta</option>
          </select>
        </div>
        <div class="form-group col-3 aux_program">
          <label for="fecha_solicitud">Fecha respuesta:</label>
          <input class="form-control" type="date" name="fecha_solicitud" id="fecha_solicitud" value="<?= $fecha_solicitud ?>">
        </div>

    </div>
    <div class="d-flex justify-content-between">
      <div class="form-group col-12">
        <input type="button" value="Regresar" class="btn btn-danger" onClick="document.location.href='diligencias.php?ruta=Diligencias'">
        <input type="submit" value="Guardar" class="btn btn-success" name="registrar">
        <!-- <input type="submit" value="Guardar" class="btn btn-success" name="Guardar"> -->
      </div>
    </div>
  </form>
  <!-- ----------------------------------- -->
  <form action="">
    <div class="form-row">
      <div class="form-group col-12">
        <div class="table-responsive" id="datos_extra">
          <table class="table" style="font-size: 12px;">
            <tr>
              <th>#</th>
              </tg>
              <th width="40%">Nom Proyecto/ Programa</th>
              <th>Participa</th>
              <th>Recibe apoyo</th>
              <th>Tipo de apoyo</th>
              <th>Descripción/ Valor</th>
            </tr>
            <?php
            $conspxd = "SELECT * FROM progsxdiligendias where id_diligencia=$id_registro";
            $respxd = mysqli_query($conn, $conspxd);
            $aux_pxd = array();
            if ($respxd) {
              while ($filapxd = mysqli_fetch_array($respxd)) {
                $aux_pxd[$filapxd['id_programa']] = $filapxd;
              }
            }




            $consp = "SELECT * FROM programas where estado=1 order by programa";
            $resp = mysqli_query($conn, $consp);
            $cont = 1;
            while ($filap = mysqli_fetch_array($resp)) {  ?>
              <tr>
                <td><?= $cont++ ?></td>
                <td>
                  <?= $filap['programa'] ?>
                </td>
                <td>
                  <input type="checkbox" name="si_programa[]" value="<?= $filap['id'] ? $filap['id'] : '' ?>" <?php if (isset($aux_pxd[$filap['id']]) && $aux_pxd[$filap['id']]) echo "checked"; ?>>
                </td>
                <td>
                  <select class="form-control " style="width: 5em;" name="apoyo_l['<?= $filap['id'] ?>']" id="apoyo">
                    <option value="No" <?php if (isset($aux_pxd[$filap['id']]['recive_apoyo']) && $aux_pxd[$filap['id']]['recive_apoyo'] == "No") {
                                          echo "selected";
                                        } ?>>No</option>
                    <option value="Si" <?php if (isset($aux_pxd[$filap['id']]['recive_apoyo']) && $aux_pxd[$filap['id']]['recive_apoyo'] == "Si") {
                                          echo "selected";
                                        } ?>>Si</option>
                  </select>
                </td>
                <td>
                  <select class="form-control " name="dinero_espcie_l['<?= isset($filap['id']) ? $filap['id'] : '' ?>']" id="dinero_espcie">
                    <option value="Dinero" <?php
                                            if (isset($aux_pxd[$filap['id']]['dinero_espcie']) && ($aux_pxd[$filap['id']]['dinero_espcie'] == "Dinero"
                                              || $aux_pxd[$filap['id']] == "Di")) {
                                              echo "selected";
                                            } ?>>
                      Dinero
                    </option>
                    <option value="Especie" <?php if (isset($aux_pxd[$filap['id']]['dinero_espcie']) && ($aux_pxd[$filap['id']]['dinero_espcie'] != "Dinero" && $aux_pxd[$filap['id']] != "Di")) {
                                              echo "selected";
                                            } ?>>Especie</option>
                  </select>
                </td>
                <td>
                  <input class="form-control " type="text" name="especie_l['<?= isset($filap['id']) ? $filap['id'] : '' ?>']" id="especie" value="<?= isset($aux_pxd[$filap['id']]['descrip_val']) ? $aux_pxd[$filap['id']]['descrip_val'] : '' ?>">
                </td>
              </tr> <?php
                  } ?>
          </table>
        </div>
      </div>

    </div>
  </form>
</div>

<?php

include "pie.php";
?>

<script>
  $(document).ready(function() {
    <?php
    if ($programa_ccp == "No" || $programa_ccp == "") { ?>
      $(".aux_program").hide();
    <?php   }
    if ($poblacion == "Otro") { ?>
      $(".aux_cual").show();
    <?php   }
    if ($registrado == "Si") { ?>
      $(".aux_regis").show();
    <?php   } ?>
  });

  function validar() {

  }

  function ocultar() {
    $("#datos_reg").hide();
    $("#ocultar").hide();
    $("#mostrar").show();
  }

  function mostrar() {
    $("#datos_reg").show();
    $("#ocultar").show();
    $("#mostrar").hide();
  }

  function tipoPobla(tipo_pob) {
    if (tipo_pob != "Otro") {
      $(".aux_cual").hide();
    } else {
      $(".aux_cual").show();
    }
  }

  function siRegistrado(si_regis) {
    if (si_regis != "Si") {
      $(".aux_regis").hide();
    } else {
      $(".aux_regis").show();
    }
  }

  function cpp(cpp_p) {
    if (cpp_p == "Si") {
      $(".aux_program").show();
    } else {
      $(".aux_program").hide();
    }
  }
</script>