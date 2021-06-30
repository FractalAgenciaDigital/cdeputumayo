<?php
		include "cabecera.php";
		include '../funciones.php'; 
		$id_edit = ''; $id_registro = ''; 
		if(isset($_GET['id_edit'])) {
			$id_edit = $id_registro = $_GET['id_edit'];
			$cons="SELECT * FROM diligencias where id=".$id_registro;
			$res = mysqli_query($conn, $cons);
			$datos_usu = mysqli_fetch_array($res);

			$cons="SELECT * FROM extras_usus where id_usu=".$id_registro;
			$res = mysqli_query($conn, $cons);
			$datos_extra = mysqli_fetch_array($res);
			
		} elseif(isset($_POST['id_edit'])) {
			$id_edit = $id_registro = $_POST['id_edit'];
		}

		//echo "<pre>"; print_r($_POST); echo "</pre>";
		if(isset($_POST['Guardar'])) {
		    //echo "id_registro=$id_registro ".$_POST['Guardar']." ---- enttrando";
		    //apoyo_l dinero_espcie_l especie_l
		    //echo "<pre>";print_r($_POST['dinero_espcie_l']);echo "</pre>";
		    //echo "<pre>";print_r($_POST['especie_l']);echo "</pre>"; 
		    $cons="delete from progsxdiligendias where id_diligencia=".$id_registro;
		    $res = mysqli_query($conn, $cons);
		    $aux_apoyo=array();
		    foreach($_POST['apoyo_l'] as $key =>$ap){
		       // echo "<br> ap=$ap key=$key";
		        $aux_apoyo[$key]=$ap;
		    }
		    // echo "<pre>";print_r($aux_apoyo);echo "</pre>"; 
		    if(count($_POST['si_programa'])>0) {
		        foreach($_POST['si_programa'] as $prog){
		            //echo "test".$aux_apoyo["'".$prog."'"]."<br>";
		            $cons2="INSERT INTO progsxdiligendias (id_diligencia,id_programa,recive_apoyo,dinero_espcie,descrip_val) values ($id_registro,$prog,'".$aux_apoyo["'".$prog."'"]."','".$_POST['dinero_espcie_l']["'".$prog."'"]."','".$_POST['especie_l']["'".$prog."'"]."')";
		            $res2 = mysqli_query($conn, $cons2);
		        }
		    }
		    
		    
		    
		    $cons="delete from extras_usus where id_usu=".$id_registro;
		    $res = mysqli_query($conn, $cons);
		    
		    $datos_usu = mysqli_fetch_array($res);
		    $aux_fec_sol = '';$aux_fec_sol1 = '';
		    if($_POST['fecha_solicitud']!=''){ $aux_fec_sol = ",'".$_POST['fecha_solicitud']."'"; $aux_fec_sol1=", fecha_solicitud";} 
		    $enero = 'null'; $febrero = 'null'; $marzo = 'null'; $abril = 'null'; $mayo = 'null'; $junio = 'null'; $julio = 'null'; $agosto = 'null'; $septiembre = 'null'; $octubre = 'null'; $noviembre = 'null'; $diciembre = 'null'; 
	        if($_POST['enero']!='') { $enero="'".$_POST['enero']."'";}
	        if($_POST['febrero']!='') { $febrero="'".$_POST['febrero']."'";}
	        if($_POST['marzo']!='') { $marzo="'".$_POST['marzo']."'";}
	        if($_POST['abril']!='') { $abril="'".$_POST['abril']."'";}
	        if($_POST['mayo']!='') { $mayo="'".$_POST['mayo']."'";}
	        if($_POST['junio']!='') { $junio="'".$_POST['junio']."'";}
	        if($_POST['julio']!='') { $julio="'".$_POST['julio']."'";}
	        if($_POST['agosto']!='') { $agosto="'".$_POST['agosto']."'";}
	        if($_POST['septiembre']!='') { $septiembre="'".$_POST['septiembre']."'";}
	        if($_POST['octubre']!='') { $octubre="'".$_POST['octubre']."'";}
	        if($_POST['noviembre']!='') { $noviembre="'".$_POST['noviembre']."'";}
	        if($_POST['diciembre']!='') { $diciembre="'".$_POST['diciembre']."'";}
	        
	        //foreach($)
	        
		     $cons = "INSERT INTO extras_usus(id_usu, sexo, poblacion, escolaridad, rango_edad, registrado, matricula, fecha_matricula
		            , programa_ccp, nom_progr, nom_progr2, nom_progr3, nom_progr4, nom_progr5, nom_progr6, apoyo, apoyo2, apoyo3, apoyo4, apoyo5, apoyo6, dinero_espcie, dinero_espcie2, dinero_espcie3, dinero_espcie4, dinero_espcie5,
		            dinero_espcie6, especie, especie2, especie3, especie4, especie5, especie6, estado_solicitud  $aux_fec_sol1, enero, febrero, marzo
		            , abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre, obs_ene, obs_feb, obs_mar, obs_abr, obs_may
		            , obs_jun, obs_jul, obs_ago, obs_sep, obs_oct, obs_nov, obs_dic, otro_poblacion) values ($id_registro,'".$_POST['genero']."'
		            ,'".$_POST['poblacion']."'
		            ,'".$_POST['escolaridad']."','".$_POST['rango_edad']."','".$_POST['registrado']."','".$_POST['matricula']."'
		            ,'".$_POST['fecha_matricula']."','".$_POST['programa_ccp']."','".$_POST['nom_progr']."','".$_POST['nom_progr2']."','".$_POST['nom_progr3']."','".$_POST['nom_progr4']."'
		            ,'".$_POST['nom_progr5']."','".$_POST['nom_progr6']."','".$_POST['apoyo']."','".$_POST['apoyo2']."','".$_POST['apoyo3']."','".$_POST['apoyo4']."','".$_POST['apoyo5']."'
		            ,'".$_POST['apoyo6']."','".$_POST['dinero_espcie']."','".$_POST['dinero_espcie2']."','".$_POST['dinero_espcie3']."','".$_POST['dinero_espcie4']."','".$_POST['dinero_espcie5']."',
		            '".$_POST['dinero_espcie6']."'
		            ,'".$_POST['especie']."','".$_POST['especie2']."','".$_POST['especie3']."','".$_POST['especie4']."','".$_POST['especie5']."','".$_POST['especie6']."','".$_POST['estado_solicitud']."'
		            $aux_fec_sol ,$enero , $febrero , $marzo , $abril, $mayo , $junio , $julio, $agosto, $septiembre, $octubre,$noviembre ,$diciembre
		            ,'".$_POST['obs_ene']."','".$_POST['obs_feb']."','".$_POST['obs_mar']."','".$_POST['obs_abr']."',
		            '".$_POST['obs_may']."','".$_POST['obs_jun']."','".$_POST['obs_jul']."','".$_POST['obs_ago']."','".$_POST['obs_sep']."'
		            ,'".$_POST['obs_oct']."','".$_POST['obs_nov']."','".$_POST['obs_dic']."','".$_POST['otro_poblacion']."')";
		           
		    //echo $cons;
		    $res = mysqli_query($conn, $cons);
		    
		}
		//echo "se paso";
		//exit;
		$cons_a="SELECT * FROM programas   order by programa";
		$res_a = mysqli_query($conn, $cons_a);
		$programas2 = array();
		while($afila = mysqli_fetch_array($res_a)){
		    $programas2[$afila['id']]=$afila['programa'];
		}
		
		$cons_a="SELECT * FROM programas where estado = 1 order by programa";
		$res_a = mysqli_query($conn, $cons_a);
		$programas = array();
		while($afila = mysqli_fetch_array($res_a)){
		    $programas[]=$afila['programa'];
		}
		
		
		$tipo_docs['1']="CÉDULA DE CIUDADANÍA";
		$tipo_docs['2']="NIT";
		$tipo_docs['3']="OTROS";
		//print_r($datos_usu); exit; die;
		
		$ciudades['1'] = "COLON";
		$ciudades['2'] = "MOCOA";
		$ciudades['3'] = "ORITO";
		$ciudades['4'] = "PUERTO ASÍS";
		$ciudades['5'] = "PUERTO CAICEDO";
		$ciudades['6'] = "PUERTO GUZMÁN";
		$ciudades['7'] = "PUERTO LEGUÍZAMO";
		$ciudades['8'] = "SANTIAGO";
		$ciudades['9'] = "SAN FRANCISCO";
		$ciudades['10'] = "SAN MIGUEL";
		$ciudades['11'] = "SIBUNDOY";
		$ciudades['12'] = "VALLE DEL GUAMUÉZ";
		$ciudades['13'] = "VILLAGARZÓN";
		
		$sectores["1"]="Sector agropecuario";
    $sectores["2"]="Sector de servicios";
    $sectores["3"]="Sector industrial";
    $sectores["4"]="Sector de transporte";
    $sectores["5"]="Sector de comercio";
    $sectores["6"]="Sector financiero";
    $sectores["7"]="Sector de la construcción";
    $sectores["8"]="Sector minero y energético";
    $sectores["9"]="Sector solidario";
    $sectores["10"]="Sector de comunicaciones";
    $sectores["11"]="Sector agroindustrial";
    $sectores["12"]="Otro";
    
    $formtal["1"] = "Alianzas para la innovación";
    $formtal["2"] = "Fábricas de productividad";
    $formtal["3"] = "Propiedad industrial";
    $formtal["4"] = "Ferias, misiones comerciales, ruedas de negocio y postulaciones";
    $formtal["5"] = "Centro de transformación digital empresarial";
    $formtal["6"] = "Técnicas y acompañamiento especializado";
    $formtal["7"] = "Marcas y Patentes";
    $formtal["8"] = "Otro";
    $formtal["9"] = "Vitrina empresarial";
    $formtal["10"] = "Domicilios putumayo";
    $formtal["11"] = "Visita Putumayo";
    $formtal["12"] = "Club de afiliados";
		
		
		//echo "<pre>"; print_r($datos_extra); echo "</pre>";
		
		$genero = isset($datos_extra['sexo']) ? $datos_extra['sexo'] : "";
		$poblacion = isset($datos_extra['poblacion']) ? $datos_extra['poblacion'] : "";
		$escolaridad = isset($datos_extra['escolaridad']) ? $datos_extra['escolaridad'] : "";
		$rango_edad = isset($datos_extra['rango_edad']) ? $datos_extra['rango_edad'] : "";
		$registrado = isset($datos_extra['registrado']) ? $datos_extra['registrado'] : "";
		$matricula = isset($datos_extra['matricula']) ? $datos_extra['matricula'] : "";
		$fecha_matricula = isset($datos_extra['fecha_matricula']) ? $datos_extra['fecha_matricula'] : "";
		$programa_ccp = isset($datos_extra['programa_ccp']) ? $datos_extra['programa_ccp'] : "";
		$nom_progr = isset($datos_extra['nom_progr']) ? $datos_extra['nom_progr'] : "";
		$nom_progr2 = isset($datos_extra['nom_progr2']) ? $datos_extra['nom_progr2'] : "";
		$nom_progr3 = isset($datos_extra['nom_progr3']) ? $datos_extra['nom_progr3'] : "";
		$nom_progr4 = isset($datos_extra['nom_progr4']) ? $datos_extra['nom_progr4'] : "";
		$nom_progr5 = isset($datos_extra['nom_progr5']) ? $datos_extra['nom_progr5'] : "";
		$nom_progr6 = isset($datos_extra['nom_progr6']) ? $datos_extra['nom_progr6'] : "";
		$apoyo = isset($datos_extra['apoyo']) ? $datos_extra['apoyo'] : "";
		$apoyo2 = isset($datos_extra['apoyo2']) ? $datos_extra['apoyo2'] : "";
    $apoyo3 = isset($datos_extra['apoyo3']) ? $datos_extra['apoyo3'] : "";		
    $apoyo4 = isset($datos_extra['apoyo4']) ? $datos_extra['apoyo4'] : "";
    $apoyo5 = isset($datos_extra['apoyo5']) ? $datos_extra['apoyo5'] : "";
    $apoyo6 = isset($datos_extra['apoyo6']) ? $datos_extra['apoyo6'] : "";
		$dinero_espcie = isset($datos_extra['dinero_espcie']) ? $datos_extra['dinero_espcie'] : "";
		$dinero_espcie2 = isset($datos_extra['dinero_espcie2']) ? $datos_extra['dinero_espcie2'] : "";
		$dinero_espcie3 = isset($datos_extra['dinero_espcie3']) ? $datos_extra['dinero_espcie3'] : "";
		$dinero_espcie4 = isset($datos_extra['dinero_espcie4']) ? $datos_extra['dinero_espcie4'] : "";
		$dinero_espcie5 = isset($datos_extra['dinero_espcie5']) ? $datos_extra['dinero_espcie5'] : "";
		$dinero_espcie6 = isset($datos_extra['dinero_espcie6']) ? $datos_extra['dinero_espcie6'] : "";
    $especie = isset($datos_extra['especie']) ? $datos_extra['especie'] : "";
    $especie2 = isset($datos_extra['especie2']) ? $datos_extra['especie2'] : "";
    $especie3 = isset($datos_extra['especie3']) ? $datos_extra['especie3'] : "";
    $especie4 = isset($datos_extra['especie4']) ? $datos_extra['especie4'] : "";
    $especie5 = isset($datos_extra['especie5']) ? $datos_extra['especie5'] : "";
    $especie6 = isset($datos_extra['especie6']) ? $datos_extra['especie6'] : "";
		$estado_solicitud = isset($datos_extra['estado_solicitud']) ? $datos_extra['estado_solicitud'] : "";
		$fecha_solicitud = isset($datos_extra['fecha_solicitud']) ? $datos_extra['fecha_solicitud'] : "";
		$enero = isset($datos_extra['enero']) ? $datos_extra['enero'] : "";
		$febrero = isset($datos_extra['febrero']) ? $datos_extra['febrero'] : "";
		$marzo = isset($datos_extra['marzo']) ? $datos_extra['marzo'] : "";
		$abril = isset($datos_extra['abril']) ? $datos_extra['abril'] : "";
		$mayo = isset($datos_extra['mayo']) ? $datos_extra['mayo'] : "";
		$junio = isset($datos_extra['junio']) ? $datos_extra['junio'] : "";
		$julio = isset($datos_extra['julio']) ? $datos_extra['julio'] : "";
		$agosto = isset($datos_extra['agosto']) ? $datos_extra['agosto'] : "";
		$septiembre = isset($datos_extra['septiembre']) ? $datos_extra['septiembre'] : "";
		$octubre = isset($datos_extra['octubre']) ? $datos_extra['octubre'] : "";
		$noviembre = isset($datos_extra['noviembre']) ? $datos_extra['noviembre'] : "";
		$diciembre = isset($datos_extra['diciembre']) ? $datos_extra['diciembre'] : "";
		$obs_ene = isset($datos_extra['obs_ene']) ? $datos_extra['obs_ene'] : "";
		$obs_feb = isset($datos_extra['obs_feb']) ? $datos_extra['obs_feb'] : "";
		$obs_mar = isset($datos_extra['obs_mar']) ? $datos_extra['obs_mar'] : "";
		$obs_abr = isset($datos_extra['obs_abr']) ? $datos_extra['obs_abr'] : "";
		$obs_may = isset($datos_extra['obs_may']) ? $datos_extra['obs_may'] : "";
		$obs_jun = isset($datos_extra['obs_jun']) ? $datos_extra['obs_jun'] : "";
		$obs_jul = isset($datos_extra['obs_jul']) ? $datos_extra['obs_jul'] : "";
		$obs_ago = isset($datos_extra['obs_ago']) ? $datos_extra['obs_ago'] : "";
		$obs_sep = isset($datos_extra['obs_sep']) ? $datos_extra['obs_sep'] : "";
		$obs_oct = isset($datos_extra['obs_oct']) ? $datos_extra['obs_oct'] : "";
		$obs_nov = isset($datos_extra['obs_nov']) ? $datos_extra['obs_nov'] : "";
		$obs_dic = isset($datos_extra['obs_dic']) ? $datos_extra['obs_dic'] : "";
		$otro_poblacion = isset($datos_extra['otro_poblacion']) ? $datos_extra['otro_poblacion'] : "";
		
?>
<style>
    .form-control {
        background-color: #e6e6e6 !important;
        color: #1c1c1d;
    }
</style>
<div class=" bg-light">  
  <form method="POST" onSubmit="return validar()">
    <div class="container bg-white mb-4">
      <div  class="form-row pt-2">
        <div class="form-group col-12">
          <strong>DATOS PRINCIPALES </strong>
          <div class="dropdown-divider"></div>
        </div>
      </div>    

      <div class="form-row">
        <div class="form-group col-3">
          <label for="tipo_documento">Tipo Documento</label>                          
          <select v-model="tipo_documento" id="tipo_documento" class="form-control">
            <option value="0" disabled>Seleccione</option>
            <option value="CC">Cedula de Ciudadania</option>
            <option value="NIT">NIT</option>
            <option value="CE">Cedula de Extranjeria</option>
            <option value="NA">Otro</option>
          </select>
        </div>
        <div class="form-group col-3">
          <label for="num_documento">Documento</label>                                                                  
          <input type="text" v-model="num_documento" id="num_documento" class="form-control" placeholder="Documento">
        </div>
        <div class="form-group col-3">
          <label for="nombre1">Nombres</label>                                        
          <input type="text" v-model="nombre1" id="nombre1" class="form-control" placeholder="Nombres">
        </div>
        <div class="form-group col-3">
          <label for="apellido1">Apellidos</label>                                      
          <input type="text" v-model="apellido1" id="apellido1" class="form-control" placeholder="Apellidos">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-3">
          <label for="inputCiudad">Ciudad</label>
          <input type="text" class="form-control" id="inputCiudad" placeholder="Ciudad">
        </div>
        <div class="form-group col-3">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-3">
          <label for="number-input">Celular</label>                                    
          <input type="number" id="Cels" v-model="Cels" class="form-control" placeholder="Celular">
        </div>
        <div class="form-group col-md-3">
          <label for="inputActEconómica">Act. Económica:</label>
          <input type="text" class="form-control" placeholder="example" aria-label="ActEconómica">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-3">
          <label for="inputDesProductivo">Des. Productivo:</label>
          <input type="text" class="form-control" placeholder="example" aria-label="DesProductivo">
        </div>
        <div class="form-group col-3">
          <label for="inputPrincipalProd/Serv">Principal Prod/Serv:</label>
          <input type="text" class="form-control" placeholder="example" aria-label="PrincipalProd/Serv">
        </div>
        <div class="form-group col-3">
          <label for="inputFortalecimientoEmpresarial">Fortalecimiento Empresarial</label>
          <input type="text" class="form-control" placeholder="example" aria-label="FortalecimientoEmpresarial">
        </div>
        <div class="form-group col-3">
          <label for="inputFormaciónEmpresarial">Formación Empresarial:</label>
          <input type="text" class="form-control" placeholder="Formación Empresarial" aria-label="FormaciónEmpresarial">
        </div>
      </div>	

      <div class="form-row">
        <div class="form-group col-12">          
          <b>DATOS ADICIONALES</b>
          <div class="dropdown-divider"></div><br>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-3">
          <label for="poblacion">Tipo Poblacion:</label>
          <select class="form-control" name="poblacion" id="poblacion" onChange="tipoPobla(this.value)">
            <option value="Ninuna"<?php if($poblacion == "Ninuna"){ echo "selected";}?>>Ninguno</option>
            <option value="Desplazado" <?php if($poblacion == "Desplazado"){ echo "selected";}?>>Desplazado</option>
            <option value="Afrocolombiano" <?php if($poblacion == "Afrocolombiano"){ echo "selected";}?>>Afrocolombiano</option>
            <option value="Indigena" <?php if($poblacion == "Indigena"){ echo "selected";}?>>Indígena</option>
            <option value="Victima" <?php if($poblacion == "Victima"){ echo "selected";}?>>Victima</option>
            <option value="Cabeza de Familia" <?php if($poblacion == "Cabeza de Familia"){ echo "selected";}?>>Cabeza de Familia</option>
            <option value="Condicion Discapacidad" <?php if($poblacion == "Condicion Discapacidad"){ echo "selected";}?>>Condición Discapacidad</option>
            <option value="Otro" <?php if($poblacion == "Otro"){ echo "selected";}?>>Otro</option>
          </select>
        </div>
        <div class="form-group col-3 aux_cual" style="display:none">
          <label id="lbl_otro_poblacion" for="otro_poblacion">Tipo Poblacion:</label>
          <input class="form-control aux_cual" type="text" style="display:none" name="otro_poblacion" id="otro_poblacion" value="<?= $otro_poblacion?>">
        </div>
        <div class="form-group col-3">
          <label for="escolaridad">Registrado en C. de Comercio:</label>
          <select class="form-control" style="width: 5em;" name="registrado" id="registrado">
            <option value="Si"<?php if($registrado=="Si"){ echo "selected";}?>>Si</option>
            <option value="No" <?php if($registrado=="No"){ echo "selected";}?>>No</option>
          </select>
        </div>
        <div class="form-group col-3">
          <label for="escolaridad">Registrado en C. de Comercio:</label>
          <input class="form-control" type="text" name="matricula" id="matricula" value="<?= $matricula?>">
        </div>
      </div>

      <div class="form-row">      
        <div class="form-group col-3">
          <label for="escolaridad">Número Matricula:</label>
          <input class="form-control" type="text" name="matricula" id="matricula" value="<?= $matricula?>">
        </div>
        <div class="form-group col-3">
          <label for="escolaridad">Fecha Matricula:</label>
          <input class="form-control" type="date" name="fecha_matricula" id="fecha_matricula" value="<?= $fecha_matricula?>">
        </div>
        <div class="form-group col-3">
          <label for="escolaridad">Pertenece a programa/proyecto de CCP u otras organizaciones:</label>
          <select class="form-control" style="width: 5em;" name="programa_ccp" id="programa_ccp" onChange="cpp(this.value)">
            <option value="No" <?php if($programa_ccp=="No"){ echo "selected";}?>>No</option>
            <option value="Si"<?php if($programa_ccp=="Si"){ echo "selected";}?>>Si</option>
          </select>
        </div>
      </div>    
      <div class="form-row">
        <div class="form-group col-3">
          <label for="escolaridad">Estado solicitud:</label>
          <select class="form-control aux_program" name="estado_solicitud" id="estado_solicitud">
            <option value="En proceso" <?php if($estado_solicitud=="En proceso"){ echo "selected";}?>>En proceso</option>
            <option value="Resuelta"<?php if($estado_solicitud=="Resuelta"){ echo "selected";}?>>Resuelta</option>
          </select>
        </div>
        <div class="form-group col-3">
          <label for="escolaridad">Fecha respuesta:</label>
          <input class="form-control aux_program" type="date" name="fecha_solicitud" id="fecha_solicitud" value="<?= $fecha_solicitud?>">
        </div>
      </div>  
      <div class="form-row">
        <div class="form-group col-12">
          <div class="table-responsive" id="datos_extra">
    				<table class="table" style="font-size: 12px;">
              <tr>
                  <th>#</th></tg><th width="40%">Nom Proyecto/ Programa</th><th>Participa</th><th>Recibe apoyo</th><th>Tipo de apoyo</th>
                  <th>Descripción/ Valor</th>
              </tr><?php   
              $conspxd="SELECT * FROM progsxdiligendias where id_diligencia=$id_registro";
              $respxd = mysqli_query($conn, $conspxd);
              $aux_pxd=array();
              if($respxd) {
                while($filapxd = mysqli_fetch_array($respxd)){ 
                    $aux_pxd[$filapxd['id_programa']] = $filapxd;
                }
              }
              $consp="SELECT * FROM programas where estado=1 order by programa";
              $resp = mysqli_query($conn, $consp);  
              $cont=1;
              while($filap = mysqli_fetch_array($resp)) {  ?>
                <tr>
                    <td><?= $cont++?></td>
                  <td>
                      <?= $filap['programa']?>
                  </td>
                  <td>
                      <input type="checkbox" name="si_programa[]" value="<?= $filap['id']? $filap['id'] : ''?>" <?php if(isset($aux_pxd[$filap['id']]) && $aux_pxd[$filap['id']]) echo "checked";?>>
                  </td>
                  <td>
                      <select class="form-control " style="width: 5em;" name="apoyo_l['<?= $filap['id']?>']" id="apoyo">
                        <option value="No" <?php if(isset($aux_pxd[$filap['id']]['recive_apoyo']) && $aux_pxd[$filap['id']]['recive_apoyo'] == "No"){ echo "selected";}?>>No</option>
                        <option value="Si"<?php if(isset($aux_pxd[$filap['id']]['recive_apoyo']) && $aux_pxd[$filap['id']]['recive_apoyo'] == "Si"){ echo "selected";}?>>Si</option>
                      </select>
                  </td>
                  <td>
                      <select class="form-control " name="dinero_espcie_l['<?= isset($filap['id'])? $filap['id'] : ''?>']" id="dinero_espcie">
                          <option value="Dinero" <?php 
                            if( isset($aux_pxd[$filap['id']]['dinero_espcie']) && ($aux_pxd[$filap['id']]['dinero_espcie']=="Dinero" 
                            || $aux_pxd[$filap['id']]=="Di")){ echo "selected";}?>
                          >
                            Dinero
                          </option>
                          <option value="Especie"<?php if( isset($aux_pxd[$filap['id']]['dinero_espcie']) && ($aux_pxd[$filap['id']]['dinero_espcie']!="Dinero"&&$aux_pxd[$filap['id']]!="Di")){ echo "selected";}?>>Especie</option>
                      </select>
                  </td>
                  <td>   
                      <input class="form-control " type="text" name="especie_l['<?= isset($filap['id'])? $filap['id'] : ''?>']" id="especie" value="<?= isset($aux_pxd[$filap['id']]['descrip_val'])? $aux_pxd[$filap['id']]['descrip_val'] : ''?>">
                  </td>
                </tr> <?php   
              } ?>
            </table>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-12">
          <input type="button" value="Regresar" class="btn btn-danger" onClick="document.location.href='diligencias.php?ruta=Diligencias'">
          <input type="submit" value="Guardar" class="btn btn-success" name="Guardar">
        </div>      
      </div>
    </div>
  </div>
    
<?php
		include "pie.php";
?>

<script>
    $( document ).ready(function() {
    <?php
        if($programa_ccp=="No" || $programa_ccp == ""){?>
		    $(".aux_program").hide();
<?php   } 
        if($poblacion=="Otro")
        {?>
            $(".aux_cual").show();
<?php   }?>
	});
	 
    function validar(){
        
    }
    function ocultar(){
        $("#datos_reg").hide();
        $("#ocultar").hide();
        $("#mostrar").show();
    }
    function mostrar(){
        $("#datos_reg").show();
        $("#ocultar").show();
        $("#mostrar").hide();
    }
    function tipoPobla(tipo_pob){
        if(tipo_pob!="Otro"){ 
            $(".aux_cual").hide();
        }
        else{
            $(".aux_cual").show();
        }
    }
    function cpp(cpp){
        if(cpp=="Si"){
            $(".aux_program").show();
        }
        else{
            $(".aux_program").hide();
        }
    }    
</script>