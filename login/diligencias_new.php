<?php
include "cabecera.php";
include '../funciones.php';

$id_edit = '';
$id_registro = '';


?>
<style>
  .form-control {
    background-color: #e6e6e6 !important;
    color: #1c1c1d;
  }
</style>

<div class="bg-light">
  <form action="./controller.php"  method="POST">
    <div class="container bg-white mb-4">
      <div class="form-row pt-2">
        <div class="form-group col-12">
          <strong>DATOS PRINCIPALES</strong>
          <div class="dropdown-divider"></div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-3">
          <label for="tipoDocumento">Tipo Documento</label>
          <select required name="tipoDocumento" v-model="select" id="tipoDocumento" class="form-control">
            <option value="">Seleccione</option>
            <option value="1" <?php if ($tipoDocumento == "1") {
                                echo "selected";
                              } ?>>Cedula de Ciudadania</option>
            <option value="2" <?php if ($tipoDocumento == "2") {
                                echo "selected";
                              } ?>>NIT</option>
            <option value="3" <?php if ($tipoDocumento == "3") {
                                echo "selected";
                              } ?>>Cedula de Extranjeria</option>
            <option value="NA" <?php if ($tipoDocumento == "0") {
                                  echo "selected";
                                } ?>>Otro</option>
          </select>
        </div>
        <div class="form-group col-3">
          <label for="documento">Documento</label>
          <input required type="text" name="documento" required="" id="documento" class="form-control" placeholder="Documento" value="<?php echo $documento ?>">
        </div>
        <div class="form-group col-3">
          <label for="nombres">Nombres</label>
          <input required type="text" v-model="" id="nombres" value="<?php echo $nombres ?>" name="nombres" class="form-control" value="">
        </div>
        <div class="form-group col-3">
          <label for="apellidos">Apellidos</label>
          <input required type="text" v-model="apellidos" value="<?php echo $apellidos ?>" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-3">
          <label for="ciudad">Ciudad</label>
          <input type="text" class="form-control" value="<?php echo $ciudad ?>" id="ciudad" name="ciudad" placeholder="Ciudad">
        </div>
        <div class="form-group col-3">

          <label for="email" class="form-label">Email</label>
          <input required type="email" class="form-control" value="<?php echo $email ?>" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group col-md-3">
          <label for="celular">Celular</label>
          <input type="number" id="celular" value="<?php echo $celular ?>" name="celular" v-model="celular" class="form-control" placeholder="Celular">
        </div>
        <div class="form-group col-md-3">
          <label for="direccEmpr">Direcci??n Empresa:</label>
          <input type="text" id="direccEmpr" value="<?php echo $direccEmpr ?>" v-model="direccEmpr" name="direccEmpr" class="form-control" placeholder="Direcci??n Empresa" aria-label="DirEmpresa">
        </div>

      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="razonSocial">Raz??n Social:</label>
          <input type="text" id="razonSocial" value="<?php echo $razonSocial ?>" v-model="razonSocial" name="razonSocial" class="form-control" placeholder="Raz??n Social" aria-label="Raz??n Social">
        </div>
        <div class="form-group col-md-3">
          <label for="nitEmpr">NIT Empresa:</label>
          <input type="text" id="nitEmpr" value="<?php echo $nitEmpr ?>" v-model="nitEmpr" name="nitEmpr" class="form-control" placeholder="NIT Empresa" aria-label="NIT Empresa">
        </div>


        <div class="form-group col-md-3">
          <label for="solicitud">Solicitud:</label>
          <input type="text" id="solicitud" value="<?php echo $solicitud ?>" v-model="solicitud" name="solicitud" class="form-control" placeholder="Solicitud" aria-label="Solicitud">
        </div>
        <!-- ---------------------------------------------- -->
        <div class="form-group col-3">
          <label for="activEcon">Actividad Econ??mica:</label>
          <select class="form-control" name="activEcon" v-model="select" onChange="activEconomica(this.value)">
            <option value="Supermercados - Tiendas - Autoservicios - Minimercados" <?php if (isset($activEcon) && $activEcon == "Supermercados - Tiendas - Autoservicios - Minimercados") {
                                                                                      echo "selected";
                                                                                    } ?>>
              Supermercados - Tiendas - Autoservicios - Minimercados</option>

            <option value="Venta de celulares - Accesorios - Tecnologia - Internet" <?php if (isset($activEcon) && $activEcon == "Venta de celulares - Accesorios - Tecnologia - Internet") {
                                                                                      echo "selected";
                                                                                    } ?>>
              Venta de celulares - Accesorios - Tecnologia - Internet</option>

            <option value="Calzado - Boutique - Prendas de Vestir - Confecciones" <?php if (isset($activEcon) && $activEcon == "Calzado - Boutique - Prendas de Vestir - Confecciones") {
                                                                                    echo "selected";
                                                                                  } ?>>
              Calzado - Boutique - Prendas de Vestir - Confecciones</option>

            <option value="Resturantes - Piqueteaderos - Asaderos" <?php if (isset($activEcon) && $activEcon == "Resturantes - Piqueteaderos - Asaderos") {
                                                                      echo "selected";
                                                                    } ?>>
              Resturantes - Piqueteaderos - Asaderos</option>

            <option value="Cafeteria - Panaderia - Heladeria" <?php if (isset($activEcon) && $activEcon == "Cafeteria - Panaderia - Heladeria") {
                                                                echo "selected";
                                                              } ?>>
              Cafeteria - Panaderia - Heladeria</option>

            <option value="Ferreterias - Obras civiles" <?php if (isset($activEcon) && $activEcon == "Ferreterias - Obras civiles") {
                                                          echo "selected";
                                                        } ?>>
              Ferreterias - Obras civiles</option>

            <option value="Publicidad - Imprentas" <?php if (isset($activEcon) && $activEcon == "Publicidad - Imprentas") {
                                                      echo "selected";
                                                    } ?>>Publicidad
              - Imprentas</option>

            <option value="Taller de motos y bicicletas- Venta de Respuestos - Montallantas" <?php if (isset($activEcon) && $activEcon == "Taller de motos y bicicletas- Venta de Respuestos - Montallantas") {
                                                                                                echo "selected";
                                                                                              } ?>>
              Taller de motos y bicicletas- Venta de Respuestos - Montallantas</option>

            <option value="Discotekas - Bares - Licoreras - Estancos" <?php if (isset($activEcon) && $activEcon == "Discotekas - Bares - Licoreras - Estancos") {
                                                                        echo "selected";
                                                                      } ?>>
              Discotekas - Bares - Licoreras - Estancos</option>

            <option value="Billares" <?php if (isset($activEcon) && $activEcon == "Billares") {
                                        echo "selected";
                                      } ?>>
              Billares</option>

            <option value="Cacharrerias - Variedades - Accesorios - Distribuidoras" <?php if (isset($activEcon) && $activEcon == "Cacharrerias - Variedades - Accesorios - Distribuidoras") {
                                                                                      echo "selected";
                                                                                    } ?>>
              Cacharrerias - Variedades - Accesorios - Distribuidoras</option>

            <option value="Publicidad - Imprentas" <?php if (isset($activEcon) && $activEcon == "Publicidad - Imprentas") {
                                                      echo "selected";
                                                    } ?>>Publicidad
              - Imprentas</option>

            <option value="Droguerias - Servicios medicos (odontologia-citologia-otros)" <?php if (isset($activEcon) && $activEcon == "Droguerias - Servicios medicos (odontologia-citologia-otros)") {
                                                                                            echo "selected";
                                                                                          } ?>>
              Droguerias - Servicios medicos (odontologia-citologia-otros)</option>

            <option value="Tapicerias - Venta de muebles - Carpinterias" <?php if (isset($activEcon) && $activEcon == "Tapicerias - Venta de muebles - Carpinterias") {
                                                                            echo "selected";
                                                                          } ?>>
              Tapicerias - Venta de muebles - Carpinterias</option>

            <option value="Papelerias - Fotocopiadoras" <?php if (isset($activEcon) && $activEcon == "Papelerias - Fotocopiadoras") {
                                                          echo "selected";
                                                        } ?>>
              Papelerias - Fotocopiadoras</option>

            <option value="Hoteles - Residencias - Hostales - Moteles - Reservados" <?php if (isset($activEcon) && $activEcon == "Hoteles - Residencias - Hostales - Moteles - Reservados") {
                                                                                      echo "selected";
                                                                                    } ?>>
              Hoteles - Residencias - Hostales - Moteles - Reservados</option>

            <option value="Casa de lenocidio" <?php if (isset($activEcon) && $activEcon == "Casa de lenocidio") {
                                                echo "selected";
                                              } ?>>Casa de
              lenocidio</option>

            <option value="Expendio de carnes (Cerdo - Res - Pollo - Pescado)" <?php if (isset($activEcon) && $activEcon == "Expendio de carnes (Cerdo - Res - Pollo - Pescado)") {
                                                                                  echo "selected";
                                                                                } ?>>
              Expendio de carnes (Cerdo - Res - Pollo - Pescado)</option>

            <option value="Peluquerias - Barberias - Spa" <?php if (isset($activEcon) && $activEcon == "Peluquerias - Barberias - Spa") {
                                                            echo "selected";
                                                          } ?>>
              Peluquerias - Barberias - Spa</option>

            <option value="Espect??culos musicales en vivo" <?php if (isset($activEcon) && $activEcon == "Espect??culos musicales en vivo") {
                                                              echo "selected";
                                                            } ?>>
              Espect??culos musicales en vivo</option>

            <option value="Servicios ambientales" <?php if (isset($activEcon) && $activEcon == "Servicios ambientales") {
                                                    echo "selected";
                                                  } ?>>Servicios
              ambientales</option>

            <option value="Other" onclick="mostrarOther();" <?php if (isset($activEcon) && $activEcon == "Other") {
                                                              echo "selected";
                                                            } ?>>Otro</option>
          </select>
        </div>

        <div class="form-group col-3 act_econ" style="display:none">
          <label for="otro_activEcon">??Cual es su Actividad Econ??mica?</label>
          <input class="form-control" type="text" placeholder="Escriba su tipo de poblaci??n" name="otro_activEcon" value="<?php echo $otro_activEcon ?>">
        </div>

        <!-- ---------------------------------------------- -->

        <style>
          .btn-outline-secondary {
            color: black;
            background-color: #e6e6e6;
            border-color: #c8ced3;
          }

          .btn-outline-secondary:hover {
            color: black;
            background-color: #c8ced3;
            border-color: #c8ced3;
          }
        </style>

        <!-- ---------------------------------------------- -->
        <div class="form-row">
          <!-----EL Script para mostrar u ocultar es en la cabecera = form_empresarial ------- -->
          <div class="form-group col-3">
            <label for="">Componentes:</label></br>
          </div>
          <div class="form-group col-3">
            <input class="form-check-input" name="des_productivo" v-model="des_productivo" type="checkbox" value="Desarrollo Productivo" <?php if (isset($des_productivo) && $des_productivo == "Desarrollo Productivo") {
                                                                                                                                            echo "checked";
                                                                                                                                          } ?> id="des_productivo">
            <label class="form-check-label" for="des_productivo">
              Desarrollo Productivo.
            </label>
          </div>
          <div class="form-group col-3">
            <input class="form-check-input" name="fort_empresarial" v-model="fort_empresarial" type="checkbox" value="Fortalecimiento Empresarial" <?php if (isset($fort_empresarial) && $fort_empresarial == "Fortalecimiento Empresarial") {
                                                                                                                                                      echo "checked";
                                                                                                                                                    } ?> id="fort_empresarial">
            <label class="form-check-label" for="fort_empresarial">
              Fortalecimiento Empresarial
            </label>
          </div>
          <div class="form-group col-3">
            <input class="form-check-input" type="checkbox" name="check" value="" name="form_empresarial" v-model="form_empresarial" id="check" onchange="javascript:showContent()" <?php if (isset($form_empresarial) && $form_empresarial != "") {
                                                                                                                                                                                      echo "checked";
                                                                                                                                                                                    } ?>>
            <label class="form-check-label" for="check">
              Formaci??n Empresarial
            </label>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-3" id="content" style="display: none;">
            <select class="btn btn-outline-secondary" name="form_empresarial" v-model="select">
              <option value="" <?php if (isset($form_empresarial) && $form_empresarial == "") {
                                  echo "selected";
                                } ?>>
                Ninguno</option>
              <option value="Mercadeo y Ventas" <?php if (isset($form_empresarial) && $form_empresarial == "Mercadeo y Ventas") {
                                                  echo "selected";
                                                } ?>>
                Mercadeo y Ventas</option>

              <option value="Administrativo" <?php if (isset($form_empresarial) && $form_empresarial == "Administrativo") {
                                                echo "selected";
                                              } ?>>
                Administrativo</option>

              <option value="Desarrollo del Empresario " <?php if (isset($form_empresarial) && $form_empresarial == "Desarrollo del Empresario ") {
                                                            echo "selected";
                                                          } ?>>
                Desarrollo del Empresario </option>

              <option value="Entidades sin ??nimo de lucro" <?php if (isset($form_empresarial) && $form_empresarial == "Entidades sin ??nimo de lucro") {
                                                              echo "selected";
                                                            } ?>>
                Entidades sin ??nimo de lucro</option>

              <option value="Financiero y Tributario" <?php if (isset($form_empresarial) && $form_empresarial == "Financiero y Tributario") {
                                                        echo "selected";
                                                      } ?>>
                Financiero y Tributario</option>

              <option value="Juridico" <?php if (isset($form_empresarial) && $form_empresarial == "Juridico") {
                                          echo "selected";
                                        } ?>>Jur??dico
              </option>

              <option value="Emprendimiento e Innovacion" <?php if (isset($form_empresarial) && $form_empresarial == "Emprendimiento e Innovacion") {
                                                            echo "selected";
                                                          } ?>>
                Emprendimiento e Innovaci??n</option>

              <option value="Produccion" <?php if (isset($form_empresarial) && $form_empresarial == "Produccion") {
                                            echo "selected";
                                          } ?>>
                Producci??n</option>

              <option value="Comercio Exterior" <?php if (isset($form_empresarial) && $form_empresarial == "Comercio Exterior") {
                                                  echo "selected";
                                                } ?>>
                Comercio Exterior</option>

            </select>

          </div>


        </div>
      </div>
      <script type="text/javascript">
        function showContent() {
          element = document.getElementById("content");
          check = document.getElementById("check");
          if (check.checked) {
            element.style.display = 'block';
          } else {
            element.style.display = 'none';
          }
        }
      </script>
      <!-- ------------------------------------- -->

      <br>
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
          <input class="form-control" type="date" name="fecha_matricula" id="fecha_matricula" value="<?= date('Y-m-d') ?>">
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
                                      } ?>>Ind??gena</option>
            <option value="Victima" <?php if (isset($poblacion) && $poblacion == "Victima") {
                                      echo "selected";
                                    } ?>>Victima</option>
            <option value="Cabeza de Familia" <?php if (isset($poblacion) && $poblacion == "Cabeza de Familia") {
                                                echo "selected";
                                              } ?>>Cabeza de Familia</option>

            <option value="Condicion Discapacidad" <?php if (isset($poblacion) && $poblacion == "Condicion Discapacidad") {
                                                      echo "selected";
                                                    } ?>>Condici??n Discapacidad</option>

            <option value="Otro" <?php if (isset($poblacion) && $poblacion == "Otro") {
                                    echo "selected";
                                  } ?>>Otro</option>
          </select>
        </div>

        <div class="form-group col-3 aux_cual" style="display:none">
          <label for="otro_poblacion">??Cual es su Tipo Poblaci??n?</label>
          <input class="form-control" type="text" placeholder="Escriba su tipo de poblaci??n" name="otro_poblacion" value="<?php echo $otro_poblacion ?>">
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
          <label for="matricula" id="matricula" name="matricula">N??mero Matricula:</label>
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
        
      </div>

      <div class="form-row">
        <div class="form-group col-3">
          <label for="celular_representante">Celular Representante</label>
          <input type="number" value="<?php echo $celular_representante ?>" id="celular_representante" name="celular_representante" class="form-control" placeholder="Celular Representante">
        </div>
        <!-- -------------------------- -->
        <div class="form-group col-3">
          <label for="genero">G??nero:</label>
          <select class="form-control" name="genero" v-model="select">
            <option value="">Seleccione</option>
            <option value="Mujer" <?php if (isset($genero) && $genero == "Mujer") {
                                    echo "selected";
                                  } ?>>Mujer</option>

            <option value="Hombre" <?php if (isset($genero) && $genero == "Hombre") {
                                      echo "selected";
                                    } ?>>Hombre</option>
          </select>
        </div>
        <!-- -------------- -->
        <div class="form-group col-3">
          <label for="escolaridad">Escolaridad:</label>
          <select class="form-control" name="escolaridad" v-model="select">
            <option value="Ninguna" <?php if (isset($escolaridad) && $escolaridad == "Ninguna") {
                                      echo "selected";
                                    } ?>>Ninguna</option>

            <option value="Basica" <?php if (isset($escolaridad) && $escolaridad == "'Basica") {
                                      echo "selected";
                                    } ?>>B??sica (Primaria)</option>

            <option value="Media" <?php if (isset($escolaridad) && $escolaridad == "Media") {
                                    echo "selected";
                                  } ?>>Media (Secundaria)</option>
            <option value="Superior" <?php if (isset($escolaridad) && $escolaridad == "Superior") {
                                        echo "selected";
                                      } ?>>Superior (T??cnico, Tecn??logo)</option>
            <option value="Universitario" <?php if (isset($escolaridad) && $escolaridad == "Universitario") {
                                            echo "selected";
                                          } ?>>Universitario</option>
            <option value="Posgrado" <?php if (isset($escolaridad) && $escolaridad == "Posgrado") {
                                        echo "selected";
                                      } ?>>Posgrado (Especializaci??n, Maestr??a, Doctorado)</option>
          </select>
        </div>
        <!-- -------------------------- -->
        <div class="form-group col-3">
          <label for="rango_edad">Rango de edad:</label>
          <select class="form-control" name="rango_edad" v-model="select">
            <option value="Menor a 18" <?php if (isset($rango_edad) && $rango_edad == "Menor a 18") {
                                          echo "selected";
                                        } ?>>Menor a 18</option>

            <option selected value="18 a 24 a??os" <?php if (isset($rango_edad) && $rango_edad == "'18 a 24 a??os") {
                                                    echo "selected";
                                                  } ?>>18 a 24 a??os</option>

            <option value="25 a 34 a??os" <?php if (isset($rango_edad) && $rango_edad == "25 a 34 a??os") {
                                            echo "selected";
                                          } ?>>25 a 34 a??os</option>
            <option value="25 a 44 a??os" <?php if (isset($rango_edad) && $rango_edad == "25 a 44 a??os") {
                                            echo "selected";
                                          } ?>>25 a 44 a??os</option>
            <option value="45 a 54 a??os" <?php if (isset($rango_edad) && $rango_edad == "45 a 54 a??os") {
                                            echo "selected";
                                          } ?>>45 a 54 a??os</option>
            <option value="M??s de 54" <?php if (isset($rango_edad) && $rango_edad == "M??s de 54") {
                                        echo "selected";
                                      } ?>>M??s de 54</option>
          </select>
        </div>
        <!-- ------ -->


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
            <option value="">Seleccione</option>
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
        <!-- --------------------------------------------------------- -->
        <br><br>
        <div class="form-group col-12">
          <b>PROYECTOS - PROGRAMAS</b>
          <div class="dropdown-divider"></div><br>

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
                  <th>Descripci??n/ Valor</th>
                </tr>
                <?php
                $conspxd = "SELECT * FROM progsxdiligencias WHERE id_diligencia=$id_registro";
                $query_pxd = mysqli_query($conn, $conspxd);
                $aux_pxd = array();
                if ($query_pxd) {
                  while ($filapxd = mysqli_fetch_array($query_pxd)) {
                    $aux_pxd[$filapxd['id_programa']] = $filapxd;
                  }
                }


                $consp = "SELECT * FROM programas WHERE estado=1 ORDER BY programa";


                $query_programas = mysqli_query($conn, $consp);

                $cont = 1;
                while ($filap = mysqli_fetch_array($query_programas)) {  ?>
                  <tr>
                    <td><?= $cont++ ?></td>
                    <td>
                      <?= $filap['programa'] ?>
                    </td>
                    <td>
                      <input type="checkbox" name="datos_programa[<?= isset($filap['id_programa']) ?  $filap['id_programa'] : '' ?>][si_programa]" value="<?= $filap['id_programa'] ? $filap['id_programa'] : '' ?>" <?php if (isset($aux_pxd[$filap['id_programa']]) && $aux_pxd[$filap['id_programa']]) echo "checked"; ?>>
                    </td>
                    <td>
                      <select class="form-control" style="width: 5em;" name="datos_programa[<?= isset($filap['id_programa']) ?  $filap['id_programa'] : '' ?>][recibe_apoyo]" id="apoyo">
                        <option value="No" <?php if (isset($aux_pxd[$filap['id_programa']]['recibe_apoyo']) && $aux_pxd[$filap['id_programa']]['recibe_apoyo'] == "No") {
                                              echo "selected";
                                            } ?>>No</option>
                        <option value="Si" <?php if (isset($aux_pxd[$filap['id_programa']]['recibe_apoyo']) && $aux_pxd[$filap['id_programa']]['recibe_apoyo'] == "Si") {
                                              echo "selected";
                                            } ?>>Si</option>
                      </select>
                    </td>
                    <td>
                      <select class="form-control " name="datos_programa[<?= isset($filap['id_programa']) ?  $filap['id_programa'] : '' ?>][dinero_espcie]" id="dinero_espcie">
                        <option value="Dinero" <?php
                                                if (isset($aux_pxd[$filap['id_programa']]['dinero_espcie']) && ($aux_pxd[$filap['id_programa']]['dinero_espcie'] == "Dinero"
                                                  || $aux_pxd[$filap['id_programa']] == "Di")) {
                                                  echo "selected";
                                                } ?>>Dinero</option>

                        <option value="Especie" <?php if (isset($aux_pxd[$filap['id_programa']]['dinero_espcie']) && ($aux_pxd[$filap['id_programa']]['dinero_espcie'] != "Dinero" && $aux_pxd[$filap['id_programa']] != "Di")) {
                                                  echo "selected";
                                                } ?>>Especie</option>
                      </select>
                    </td>
                    <td>
                      <input class="form-control " type="text" name="datos_programa[<?= isset($filap['id_programa']) ?  $filap['id_programa'] : '' ?>][descrip_val]" id="especie" value="<?= isset($aux_pxd[$filap['id_programa']]['descrip_val']) ? $aux_pxd[$filap['id_programa']]['descrip_val'] : '' ?>">
                    </td>
                  </tr> <?php
                      } ?>
              </table>
            </div>
          </div>

        </div>

        <!-- --------- -->
        <div class="d-flex justify-content-between">
          <div class="form-group col-12">
            <input type="button" value="Regresar" class="btn btn-danger" onClick="document.location.href='diligencias.php?ruta=Diligencias'">
            <input type="submit" value="Guardar" class="btn btn-success" name="registrar">
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
    if ($poblacion == "Otro") { ?>
      $(".aux_compon").show();
    <?php   }
    if ($activEcon == "Other") { ?>
      $(".act_econ").show();
    <?php  }
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

  function activEconomica(activ_econ) {
    if (activ_econ != "Other") {
      $(".act_econ").hide();
    } else {
      $(".act_econ").show();
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