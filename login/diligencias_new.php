<?php
		include "cabecera.php";
		 include '../funciones.php'; 
		$id_edit = $id_registro = isset($_GET['id_edit'])? $_GET['id_edit'] : $_POST['id_edit'];
		
		//echo "<pre>"; print_r($_POST); echo "</pre>";
		if(isset($_POST['Guardar'])){
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
		
		$cons="SELECT * FROM diligencias where id=".$id_registro;
		$res = mysqli_query($conn, $cons);
		$datos_usu = mysqli_fetch_array($res);
		
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
		
		$cons="SELECT * FROM extras_usus where id_usu=".$id_registro;
		$res = mysqli_query($conn, $cons);
		$datos_extra = mysqli_fetch_array($res);
		//echo "<pre>"; print_r($datos_extra); echo "</pre>";
		
		$genero = $datos_extra['sexo'] ? $datos_extra['sexo'] : "";
		$poblacion = $datos_extra['poblacion'] ? $datos_extra['poblacion'] : "";
		$escolaridad = $datos_extra['escolaridad'] ? $datos_extra['escolaridad'] : "";
		$rango_edad = $datos_extra['rango_edad'] ? $datos_extra['rango_edad'] : "";
		$registrado = $datos_extra['registrado'] ? $datos_extra['registrado'] : "";
		$matricula = $datos_extra['matricula'] ? $datos_extra['matricula'] : "";
		$fecha_matricula = $datos_extra['fecha_matricula'] ? $datos_extra['fecha_matricula'] : "";
		$programa_ccp = $datos_extra['programa_ccp'] ? $datos_extra['programa_ccp'] : "";
		$nom_progr = $datos_extra['nom_progr'] ? $datos_extra['nom_progr'] : "";
		$nom_progr2 = $datos_extra['nom_progr2'] ? $datos_extra['nom_progr2'] : "";
		$nom_progr3 = $datos_extra['nom_progr3'] ? $datos_extra['nom_progr3'] : "";
		$nom_progr4 = $datos_extra['nom_progr4'] ? $datos_extra['nom_progr4'] : "";
		$nom_progr5 = $datos_extra['nom_progr5'] ? $datos_extra['nom_progr5'] : "";
		$nom_progr6 = $datos_extra['nom_progr6'] ? $datos_extra['nom_progr6'] : "";
		$apoyo = $datos_extra['apoyo'] ? $datos_extra['apoyo'] : "";
		$apoyo2 = $datos_extra['apoyo2'] ? $datos_extra['apoyo2'] : "";
        $apoyo3 = $datos_extra['apoyo3'] ? $datos_extra['apoyo3'] : "";		
        $apoyo4 = $datos_extra['apoyo4'] ? $datos_extra['apoyo4'] : "";
        $apoyo5 = $datos_extra['apoyo5'] ? $datos_extra['apoyo5'] : "";
        $apoyo6 = $datos_extra['apoyo6'] ? $datos_extra['apoyo6'] : "";
		$dinero_espcie = $datos_extra['dinero_espcie'] ? $datos_extra['dinero_espcie'] : "";
		$dinero_espcie2 = $datos_extra['dinero_espcie2'] ? $datos_extra['dinero_espcie2'] : "";
		$dinero_espcie3 = $datos_extra['dinero_espcie3'] ? $datos_extra['dinero_espcie3'] : "";
		$dinero_espcie4 = $datos_extra['dinero_espcie4'] ? $datos_extra['dinero_espcie4'] : "";
		$dinero_espcie5 = $datos_extra['dinero_espcie5'] ? $datos_extra['dinero_espcie5'] : "";
		$dinero_espcie6 = $datos_extra['dinero_espcie6'] ? $datos_extra['dinero_espcie6'] : "";
	    $especie = $datos_extra['especie'] ? $datos_extra['especie'] : "";
	    $especie2 = $datos_extra['especie2'] ? $datos_extra['especie2'] : "";
	    $especie3 = $datos_extra['especie3'] ? $datos_extra['especie3'] : "";
	    $especie4 = $datos_extra['especie4'] ? $datos_extra['especie4'] : "";
	    $especie5 = $datos_extra['especie5'] ? $datos_extra['especie5'] : "";
	    $especie6 = $datos_extra['especie6'] ? $datos_extra['especie6'] : "";
		$estado_solicitud = $datos_extra['estado_solicitud'] ? $datos_extra['estado_solicitud'] : "";
		$fecha_solicitud = $datos_extra['fecha_solicitud'] ? $datos_extra['fecha_solicitud'] : "";
		$enero = $datos_extra['enero'] ? $datos_extra['enero'] : "";
		$febrero = $datos_extra['febrero'] ? $datos_extra['febrero'] : "";
		$marzo = $datos_extra['marzo'] ? $datos_extra['marzo'] : "";
		$abril = $datos_extra['abril'] ? $datos_extra['abril'] : "";
		$mayo = $datos_extra['mayo'] ? $datos_extra['mayo'] : "";
		$junio = $datos_extra['junio'] ? $datos_extra['junio'] : "";
		$julio = $datos_extra['julio'] ? $datos_extra['julio'] : "";
		$agosto = $datos_extra['agosto'] ? $datos_extra['agosto'] : "";
		$septiembre = $datos_extra['septiembre'] ? $datos_extra['septiembre'] : "";
		$octubre = $datos_extra['octubre'] ? $datos_extra['octubre'] : "";
		$noviembre = $datos_extra['noviembre'] ? $datos_extra['noviembre'] : "";
		$diciembre = $datos_extra['diciembre'] ? $datos_extra['diciembre'] : "";
		$obs_ene = $datos_extra['obs_ene'] ? $datos_extra['obs_ene'] : "";
		$obs_feb = $datos_extra['obs_feb'] ? $datos_extra['obs_feb'] : "";
		$obs_mar = $datos_extra['obs_mar'] ? $datos_extra['obs_mar'] : "";
		$obs_abr = $datos_extra['obs_abr'] ? $datos_extra['obs_abr'] : "";
		$obs_may = $datos_extra['obs_may'] ? $datos_extra['obs_may'] : "";
		$obs_jun = $datos_extra['obs_jun'] ? $datos_extra['obs_jun'] : "";
		$obs_jul = $datos_extra['obs_jul'] ? $datos_extra['obs_jul'] : "";
		$obs_ago = $datos_extra['obs_ago'] ? $datos_extra['obs_ago'] : "";
		$obs_sep = $datos_extra['obs_sep'] ? $datos_extra['obs_sep'] : "";
		$obs_oct = $datos_extra['obs_oct'] ? $datos_extra['obs_oct'] : "";
		$obs_nov = $datos_extra['obs_nov'] ? $datos_extra['obs_nov'] : "";
		$obs_dic = $datos_extra['obs_dic'] ? $datos_extra['obs_dic'] : "";
		$otro_poblacion = $datos_extra['otro_poblacion'] ? $datos_extra['otro_poblacion'] : "";
		
?>
<style>
    .form-control {
        background-color: #e6e6e6 !important;
        color: #1c1c1d;
    }
</style>
        <div class="row">
    		<div class="col-sm-12">
    			<div class="card">
    				<div class="card-header">
    					<div class="d-flex justify-content-between">
    						<div class="align-self-center">
    							<strong>Datos Registro </strong>
    						</div>
    						<!--<a id="exportar" class="btn btn-success" target="_blank" role="button">Exportar</a>-->
    					</div>
    				</div>
    				    <div class="card-body">
    				        <div class="form-group row">
    				            <div class="col-12">
    				                <button type="button" class="float-right btn btn-info" id="ocultar" onClick="ocultar()">Ocultar Datos Registro</button>
    				                <button type="button" class="float-right btn btn-info" style="display:none" id="mostrar" onClick="mostrar()">Mostrar Datos Registro</button>
    				            </div>
    				        </div>
    					    <div class="form-group row">
    					        <div class="table-responsive" id="datos_reg">
        				            <table class="table" style="font-size: 12px; background-color: #ececec;">
        				                <tbody>
        				        <?php   if($datos_usu['tipoDocumento']!="2"){?>
        				                    <tr>
        				                        <td colspan="8" align="center">
        				                            <b>
        				                            <?php   if($datos_usu['tipoDocumento']=="1"){ echo "DATOS PERSONA";}
        				                                    else{echo "DATOS";}        ?>
        				                            </b>
        				                        </td>
        				                    </tr>
        				                    <tr>
            				                    <td><b>Tipo Documento: </b></td><td> <?= $tipo_docs[$datos_usu['tipoDocumento']]?></td>
            				                    <td><b>Documento: </b></td><td> <?= $datos_usu['documento']?></td>
            				                    <td><b>Nombres: </b></td><td> <?= $datos_usu['nombres']?></td>
            				                    <td><b>Apellidos: </b></td><td> <?= $datos_usu['apellido1']." ".$datos_usu['apellido2']?></td>
            				                </tr>
            				                <tr>
            				                    <td><b>Nom. Establecimiento1: </b></td><td colspan="3"> <?= $datos_usu['razonSocial']?></td>
            				                    <td><b>Nom. Establecimiento2: </b></td><td colspan="3"> <?= $datos_usu['razonSocial2']?></td>
            				                </tr>
            				                <tr>
            				                    <td><b>Nom. Establecimiento3: </b></td><td colspan="3"> <?= $datos_usu['razonSocial3']?></td>
            				                    <td><b>Ciudad: </b></td><td> <?= $ciudades[$datos_usu['ciudad']]?></td>
            				                    
            				                </tr>
            				                <tr>
            				                    <td><b>Email: </b></td><td> <?= $datos_usu['email']?></td>
            				                    <td><b>Dirección: </b></td><td colspan="5"> <?= $datos_usu['direccDomic']?></td>
            				                    
            				                    
            				                </tr>
            				                <tr>
            				                    <td><b>Tels/Cels 1: </b></td><td> <?= $datos_usu['telocel1']." - ".$datos_usu['telocel2']?></td>
            				                    <td><b>Act. Económica: </b></td><td  colspan="5"> <?= $datos_usu['activEcon']?></td>
            				                </tr>
        				        <?php   }
        				                else
        				                {?>
        				                    <tr>
        				                        <td colspan="8" align="center"><b>DATOS EMPRESA</b></td>
        				                    </tr>
        				                    <tr>
            				                    <td><b>Nit: </b></td><td> <?= $datos_usu['nitEmpr']?></td>
            				                    <td><b>Razón Social: </b></td><td colspan="5"> <?= $datos_usu['razonSocial']?></td>
            				                </tr>
            				                <tr>
            				                    <td><b>Ciudad: </b></td><td> <?= $ciudades[$datos_usu['ciudad']]?></td>
            				                    <td><b>Email: </b></td><td> <?= $datos_usu['emailEmpr']?></td>
            				                    <td><b>Tel/Cel 1: </b></td><td> <?= $datos_usu['telocel1']?></td>
            				                    <td><b>Tel/Cel 2: </b></td><td> <?= $datos_usu['telocel2']?></td>
            				                </tr>
            				                <tr>
            				                    <td><b>Act. Económica</b></td><td colspan="3"> <?= $datos_usu['activEconEmpr']?></td>
            				                    <td><b>Dirección: </b></td><td colspan="3"> <?= $datos_usu['direccEmpr']?></td>
            				                </tr>
            				                <tr>
        				                        <td colspan="8" align="center"><b>DATOS PERSONALES</b></td>
        				                    </tr>
        				                    <tr>
        				                        <td><b>Nombres: </b></td><td colspan="2"> <?= $datos_usu['nombres']?></td>
        				                        <td><b>Apellidos: </b></td><td colspan="2"> <?= $datos_usu['apellidos']?></td>
        				                        <td><b>Documento: </b></td><td> <?= $datos_usu['documento']?></td>
        				                        
        				                    </tr>
        				                    <tr>
        				                        <td><b>Dirección: </b></td><td colspan="3"> <?= $datos_usu['direccDomic']?></td>
        				                        <td><b>Act. Económica: </b></td><td colspan="3"> <?= $datos_usu['activEcon']?></td>
        				                    </tr>
        				                    <tr>
            				                    <td><b>Email: </b></td><td> <?= $datos_usu['email']?></td>
            				                    <td><b>Tel/Cel 1: </b></td><td> <?= $datos_usu['telocel']?></td>
            				                    
            				                </tr>
        				        <?php   }?>
        				                    <tr>
        				                        <td colspan="8" align="center"><b>EN QUE ESTA INTERESADO</b></td>
        				                    </tr>
        				                    <tr>
        				                        <td><b>Des. Productivo: </b></td>
        				                        <td> <?= $sectores[$datos_usu['sectorEcon']]?></td>
        				                        <td>
            				                <?php   if($datos_usu['sectorEcon']==12){?>
            				                            <b>Cual: </b>
            				                            
            				                <?php   }?>
            				                    </td>
        				                        <td> 
        				                    <?php   if($datos_usu['sectorEcon']==12){echo $datos_usu['sectorEconOtro'];} ?>
        				                        </td>
        				                        <td><b>Principal Prod/Serv: </b></td>
        				                        <td colspan="3"> <?= $datos_usu['ppalProdServ']?></td>
        				                    </tr>
        				                    <tr>
        				                        <td><b>Fortalecimiento Empresarial: </b></td>
        				                        <td> <?= $formtal[$datos_usu['forte']]?></td>
        				                        <td>
            				                <?php   if($datos_usu['forteOtro']==8){?>
            				                            <b>Cual: </b>
            				                            
            				                <?php   }?>
            				                    </td>
        				                        <td> 
        				                    <?php   if($datos_usu['sectorEcon']==12){echo $datos_usu['sectorEconOtro'];} ?>
        				                        </td>
        				                        <td><b>Formación Empresarial: </b></td>
        				                        <td colspan="3"> <?= $datos_usu['formeTema']?></td>
        				                    </tr>
        				                    <tr>
        				                        <td><b>Solicitud: </b></td>
        				                        <td colspan="5"> <?= $datos_usu['solicitud']?></td>
        				                        
        				                    </tr>
        				                </tbody>
        				            </table>
        				        </div>
    					    </div>
    					    <div class="form-group row">
    		                    <form method="POST" onSubmit="return validar()">
    		                        <input type="hidden" name="id_edit" id="id_edit" value="<?= $id_edit?>">
                                    <div class="table-responsive" id="datos_extra">
    				                    <table class="table" style="font-size: 12px;">
    				                        <tr>
    				                            <td colspan="8" align="center"><b>DATOS ADICIONALES</b></td>
    				                        </tr>
    				                        <tr>
    				                            <td><b>Genero:</b> </td>
    				                            <td> 
    				                                <select class="form-control" name="genero" id="genero">
                                                        <option value="Mujer"<?php if($genero=="Mujer"){ echo "selected";}?>>Mujer</option>
                                                        <option value="Hombre" <?php if($genero=="Hombre"){ echo "selected";}?>>Hombre</option>
                                                    </select>
    				                            </td>
    				                            <td><b>Tipo Poblacion: </b></td>
    				                            <td> 
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
    				                            </td>
    				                            <td>
    				                                <label id="lbl_otro_poblacion" class="aux_cual" style="display:none"><b>Cual?</b></label>
    				                            </td>
    				                            <td>
    				                                <input class="form-control aux_cual" type="text" style="display:none" name="otro_poblacion" id="otro_poblacion" value="<?= $otro_poblacion?>">
    				                            </td>
    				                        </tr>
    				                        <tr>
    				                            <td><b>Escolaridad: </td>
    				                            <td> 
    				                                <select class="form-control" name="escolaridad" id="escolaridad">
                                                        <option value="Ninuna"<?php if($escolaridad == "Ninuna"){ echo "selected";}?>>Ninguna</option>
                                                        <option value="Primaria" <?php if($escolaridad == "Primaria"){ echo "selected";}?>>Básica (Primaria)</option>
                                                        <option value="Media" <?php if($escolaridad == "Media"){ echo "selected";}?>>Media (Secundaria)</option>
                                                        <option value="Superior" <?php if($escolaridad == "Superior"){ echo "selected";}?>>Superior (Técnico, Tecnólogo)</option>
                                                        <option value="Universitario" <?php if($escolaridad == "Universitario"){ echo "selected";}?>>Universitario</option>
                                                        <option value="Posgrado" <?php if($escolaridad == "Posgrado"){ echo "selected";}?>>Posgrado (Espcialización, maestría, doctorado)</option>
                                                    </select>
    				                            </td>
    				                            <td><b>Rango de edad: </b></td>
    				                            <td> 
    				                                <select class="form-control" name="rango_edad" id="rango_edad">
                                                        <option value="Menor a 18" <?php if($rango_edad == "Menor a 18"){ echo "selected";}?>>Menor a 18</option>
                                                        <option value="18 a 24 anios" <?php if($rango_edad == "18 a 24 anios"){ echo "selected";}?>>18 a 24 años</option>
                                                        <option value="25 a 34 anios" <?php if($rango_edad == "25 a 34 anios"){ echo "selected";}?>>25 a 34 años</option>
                                                        <option value="35 a 44 anios" <?php if($rango_edad == "35 a 44 anios"){ echo "selected";}?>>35 a 44 años</option>
                                                        <option value="45 a 54 anios" <?php if($rango_edad == "45 a 54 anios"){ echo "selected";}?>>45 a 54 años</option>
                                                        <option value="Mas de 54" <?php if($rango_edad == "Mas de 54"){ echo "selected";}?>>Mas de 54</option>
                                                    </select>
    				                            </td>
    				                            <td><b>Registrado en C. de Comercio: </b></td>
    				                            <td>
    				                                <select class="form-control" style="width: 5em;" name="registrado" id="registrado">
                                                        <option value="Si"<?php if($registrado=="Si"){ echo "selected";}?>>Si</option>
                                                        <option value="No" <?php if($registrado=="No"){ echo "selected";}?>>No</option>
                                                    </select>
    				                            </td>
    				                        </tr>
    				                        <tr>
    				                            <td><b>Número Matricula: </b></td>
    				                            <td>
    				                                <input class="form-control" type="text" name="matricula" id="matricula" value="<?= $matricula?>">
    				                            </td>
    				                            <td><b>Fecha Matricula: </b></td>
    				                            <td>
    				                                <input class="form-control" type="date" name="fecha_matricula" id="fecha_matricula" value="<?= $fecha_matricula?>">
    				                            </td>
    				                            <td><b>Pertenece a programa/proyecto de CCP u otras organizaciones: </b></td>
    				                            <td>
    				                                <select class="form-control" style="width: 5em;" name="programa_ccp" id="programa_ccp" onChange="cpp(this.value)">
                                                        <option value="No" <?php if($programa_ccp=="No"){ echo "selected";}?>>No</option>
                                                        <option value="Si"<?php if($programa_ccp=="Si"){ echo "selected";}?>>Si</option>
                                                    </select>
    				                            </td>
    				                            </td>
    				                        </tr>
    				                        <tr>
    				                            <td><b><label class="aux_program">Estado solicitud: </label></b></td>
    				                            <td>
    				                                <select class="form-control aux_program" name="estado_solicitud" id="estado_solicitud">
    				                                    <option value="En proceso" <?php if($estado_solicitud=="En proceso"){ echo "selected";}?>>En proceso</option>
                                                        <option value="Resuelta"<?php if($estado_solicitud=="Resuelta"){ echo "selected";}?>>Resuelta</option>
                                                    </select>
    				                            </td>
    				                            <td><b><label class="aux_program">Fecha respuesta: </label></b></td>
    				                            <td>
    				                                <input class="form-control aux_program" type="date" name="fecha_solicitud" id="fecha_solicitud" value="<?= $fecha_solicitud?>">
    				                            </td><td colspan="2"> </td>
    				                        </tr>
    				                        <tr>
    				                            <td colspan="8">
    				                                <table class="table">
    				                                    <tr>
    				                                        <th>#</th></tg><th width="40%">Nom Proyecto/ Programa</th><th>Participa</th><th>Recibe apoyo</th><th>Tipo de apoyo</th><th>Descripción/ Valor</th>
    				                                    </tr>
    				                            <?php   
    				                                    $conspxd="SELECT * FROM progsxdiligendias where id_diligencia=$id_registro";
		                                                $respxd = mysqli_query($conn, $conspxd);
		                                                $aux_pxd=array();
		                                                while($filapxd = mysqli_fetch_array($respxd)){ 
		                                                    $aux_pxd[$filapxd['id_programa']] = $filapxd;
		                                                }
		                                                
    				                                    $consp="SELECT * FROM programas where estado=1 order by programa";
		                                                $resp = mysqli_query($conn, $consp);  
		                                                $cont=1;
		                                                while($filap = mysqli_fetch_array($resp)){  ?>
		                                                    <tr>
		                                                        <td><?= $cont++?></td>
        				                                        <td>
        				                                            <?= $filap['programa']?>
        				                                        </td>
        				                                        <td>
        				                                            <input type="checkbox" name="si_programa[]" value="<?= $filap['id']?>" <?php if($aux_pxd[$filap['id']]) echo "checked";?>>
        				                                        </td>
        				                                        <td>
        				                                            <select class="form-control " style="width: 5em;" name="apoyo_l['<?= $filap['id']?>']" id="apoyo">
                    				                                    <option value="No" <?php if($aux_pxd[$filap['id']]['recive_apoyo']=="No"){ echo "selected";}?>>No</option>
                                                                        <option value="Si"<?php if($aux_pxd[$filap['id']]['recive_apoyo']=="Si"){ echo "selected";}?>>Si</option>
                                                                    </select>
        				                                        </td>
        				                                        <td>
        				                                            <select class="form-control " name="dinero_espcie_l['<?= $filap['id']?>']" id="dinero_espcie">
                    				                                    <option value="Dinero" <?php if($aux_pxd[$filap['id']]['dinero_espcie']=="Dinero"||$aux_pxd[$filap['id']]=="Di"){ echo "selected";}?>>Dinero</option>
                                                                        <option value="Especie"<?php if($aux_pxd[$filap['id']]['dinero_espcie']!="Dinero"&&$aux_pxd[$filap['id']]!="Di"){ echo "selected";}?>>Especie</option>
                                                                    </select>
        				                                        </td>
        				                                        <td>   
        				                                            <input class="form-control " type="text" name="especie_l['<?= $filap['id']?>']" id="especie" value="<?= $aux_pxd[$filap['id']]['descrip_val']?>">
        				                                        </td>
        				                                    </tr>
        				                        <?php   }
        				                        /*
		   			                                    <tr>
    				                                        <td>
    				                                            1
    				                                        </td>
    				                                        <td>
    				                                            <select name="nom_progr" class="form-control" id="nom_progr">
    				                                                <option value=""></option>
    				                                        <?php   foreach($programas as $prog){?>
    				                                                    <option value="<?= $prog?>"<?php if($prog==$nom_progr){ echo "selected";}?>><?= $prog?></option>
    				                                        <?php   }?>
    				                                            </select>
    				                                            <!--<input class="form-control " type="text" name="nom_progr" id="nom_progr" value="<?= $nom_progr?>">-->
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " style="width: 5em;" name="apoyo" id="apoyo">
                				                                    <option value="No" <?php if($apoyo=="No"){ echo "selected";}?>>No</option>
                                                                    <option value="Si"<?php if($apoyo=="Si"){ echo "selected";}?>>Si</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " name="dinero_espcie" id="dinero_espcie">
                				                                    <option value="Dinero" <?php if($dinero_espcie=="Dinero"||$dinero_espcie=="Di"){ echo "selected";}?>>Dinero</option>
                                                                    <option value="Especie"<?php if($dinero_espcie!="Dinero"&&$dinero_espcie!="Di"){ echo "selected";}?>>Especie</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <input class="form-control " type="text" name="especie" id="especie" value="<?= $especie?>">
    				                                        </td>
    				                                    </tr>
    				                                    <tr>
    				                                        <td>
    				                                            2
    				                                        </td>
    				                                        <td>
    				                                            <select name="nom_progr2" class="form-control" id="nom_progr2">
    				                                                <option value=""></option>
    				                                        <?php   foreach($programas as $prog){?>
    				                                                    <option value="<?= $prog?>"<?php if($prog==$nom_progr2){ echo "selected";}?>><?= $prog?></option>
    				                                        <?php   }?>
    				                                            </select>
    				                                            <!--<input class="form-control " type="text" name="nom_progr2" id="nom_progr2" value="<?= $nom_progr2?>">-->
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " style="width: 5em;" name="apoyo2" id="apoyo2">
                				                                    <option value="No" <?php if($apoyo2=="No"){ echo "selected";}?>>No</option>
                                                                    <option value="Si"<?php if($apoyo2=="Si"){ echo "selected";}?>>Si</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " name="dinero_espcie2" id="dinero_espcie2">
                				                                    <option value="Dinero" <?php if($dinero_espcie2=="Dinero"){ echo "selected";}?>>Dinero</option>
                                                                    <option value="Especie"<?php if($dinero_espcie2=="Especie"){ echo "selected";}?>>Especie</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <input class="form-control " type="text" name="especie2"2 id="especie2" value="<?= $especie2?>">
    				                                        </td>
    				                                    </tr>
    				                                    <tr>
    				                                        <td>
    				                                            3
    				                                        </td>
    				                                        <td><select name="nom_progr3" class="form-control" id="nom_progr3">
    				                                                <option value=""></option>
    				                                        <?php   foreach($programas as $prog){?>
    				                                                    <option value="<?= $prog?>"<?php if($prog==$nom_progr3){ echo "selected";}?>><?= $prog?></option>
    				                                        <?php   }?>
    				                                            </select>
    				                                            <!--<input class="form-control " type="text" name="nom_progr3" id="nom_progr3" value="<?= $nom_progr3?>">-->
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " style="width: 5em;" name="apoyo3" id="apoyo3">
                				                                    <option value="No" <?php if($apoyo3=="No"){ echo "selected";}?>>No</option>
                                                                    <option value="Si"<?php if($apoyo3=="Si"){ echo "selected";}?>>Si</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " name="dinero_espcie3" id="dinero_espcie3">
                				                                    <option value="Dinero" <?php if($dinero_espcie3=="Dinero"){ echo "selected";}?>>Dinero</option>
                                                                    <option value="Especie"<?php if($dinero_espcie3=="Especie"){ echo "selected";}?>>Especie</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <input class="form-control " type="text" name="especie3" id="especie3" value="<?= $especie3?>">
    				                                        </td>
    				                                    </tr>
    				                                    <tr>
    				                                        <td>
    				                                            4
    				                                        </td>
    				                                        <td>
    				                                            <select name="nom_progr4" class="form-control" id="nom_progr4">
    				                                                <option value=""></option>
    				                                        <?php   foreach($programas as $prog){?>
    				                                                    <option value="<?= $prog?>"<?php if($prog==$nom_progr4){ echo "selected";}?>><?= $prog?></option>
    				                                        <?php   }?>
    				                                            </select>
    				                                            <!--<input class="form-control " type="text" name="nom_progr4" id="nom_progr4" value="<?= $nom_progr4?>">-->
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " style="width: 5em;" name="apoyo4" id="apoyo4">
                				                                    <option value="No" <?php if($apoyo4=="No"){ echo "selected";}?>>No</option>
                                                                    <option value="Si"<?php if($apoyo4=="Si"){ echo "selected";}?>>Si</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " name="dinero_espcie4" id="dinero_espcie4">
                				                                    <option value="Dinero" <?php if($dinero_espcie4=="Dinero"){ echo "selected";}?>>Dinero</option>
                                                                    <option value="Especie"<?php if($dinero_espcie4=="Especie"){ echo "selected";}?>>Especie</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <input class="form-control " type="text" name="especie4" id="especie4" value="<?= $especie4?>">
    				                                        </td>
    				                                    </tr>
    				                                    <tr>
    				                                        <td>
    				                                            5
    				                                        </td>
    				                                        <td>
    				                                            <select name="nom_progr5" class="form-control" id="nom_progr5">
    				                                                <option value=""></option>
    				                                        <?php   foreach($programas as $prog){?>
    				                                                    <option value="<?= $prog?>"<?php if($prog==$nom_progr5){ echo "selected";}?>><?= $prog?></option>
    				                                        <?php   }?>
    				                                            </select>
    				                                            <!--<input class="form-control " type="text" name="nom_progr5" id="nom_progr5" value="<?= $nom_progr5?>">-->
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " style="width: 5em;" name="apoyo5" id="apoyo5">
                				                                    <option value="No" <?php if($apoyo5=="No"){ echo "selected";}?>>No</option>
                                                                    <option value="Si"<?php if($apoyo5=="Si"){ echo "selected";}?>>Si</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " name="dinero_espcie5" id="dinero_espcie5">
                				                                    <option value="Dinero" <?php if($dinero_espcie5=="Dinero"){ echo "selected";}?>>Dinero</option>
                                                                    <option value="Especie"<?php if($dinero_espcie5=="Especie"){ echo "selected";}?>>Especie</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <input class="form-control " type="text" name="especie5" id="especie5" value="<?= $especie5?>">
    				                                        </td>
    				                                    </tr>
    				                                    <tr>
    				                                        <td>
    				                                            6
    				                                        </td>
    				                                        <td>
    				                                            <select name="nom_progr6" class="form-control" id="nom_progr6">
    				                                                <option value=""></option>
    				                                        <?php   foreach($programas as $prog){?>
    				                                                    <option value="<?= $prog?>"<?php if($prog==$nom_progr6){ echo "selected";}?>><?= $prog?></option>
    				                                        <?php   }?>
    				                                            </select>
    				                                            <!--<input class="form-control " type="text" name="nom_progr6" id="nom_progr6" value="<?= $nom_progr6?>">-->
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " style="width: 5em;" name="apoyo6" id="apoyo6">
                				                                    <option value="No" <?php if($apoyo6=="No"){ echo "selected";}?>>No</option>
                                                                    <option value="Si"<?php if($apoyo6=="Si"){ echo "selected";}?>>Si</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <select class="form-control " name="dinero_espcie6" id="dinero_espcie6">
                				                                    <option value="Dinero" <?php if($dinero_espcie6=="Dinero"){ echo "selected";}?>>Dinero</option>
                                                                    <option value="Especie"<?php if($dinero_espcie6=="Especie"){ echo "selected";}?>>Especie</option>
                                                                </select>
    				                                        </td>
    				                                        <td>
    				                                            <input class="form-control " type="text" name="especie6" id="especie6" value="<?= $especie6?>">
    				                                        </td>*/?>
    				                                    </tr>
    				                                </table>
    				                            </td>
    				                        </tr>
    				                        <!--<tr>
    				                            <td><b><label class="aux_program">Nombre proyecto/programa: </label></b></td>
    				                            <td colspan="3">
    				                                <input class="form-control aux_program" type="text" name="nom_progr" id="nom_progr" value="<?= $nom_progr?>">
    				                            </td>
    				                            <td><b><label class="aux_program">Recibe apoyo: </label></b></td>
    				                            <td>
    				                                <select class="form-control aux_program" style="width: 5em;" name="apoyo" id="apoyo">
    				                                    <option value="No" <?php if($apoyo=="No"){ echo "selected";}?>>No</option>
                                                        <option value="Si"<?php if($apoyo=="Si"){ echo "selected";}?>>Si</option>
                                                    </select>
    				                            </td>
    				                        </tr>
    				                        <tr>
    				                            <td><b><label class="aux_program">Tipo de apoyo: </label></b></td>
    				                            <td>
    				                                <select class="form-control aux_program" name="dinero_espcie" id="dinero_espcie">
    				                                    <option value="Dinero" <?php if($dinero_espcie=="Dinero"){ echo "selected";}?>>Dinero</option>
                                                        <option value="Especie"<?php if($dinero_espcie=="Especie"){ echo "selected";}?>>Especie</option>
                                                    </select>
    				                            </td>
    				                            <td><b><label class="aux_program">Descripción/Valor: </label></b></td>
    				                            <td colspan="2">
    				                                <input class="form-control aux_program" type="text" name="especie" id="especie" value="<?= $especie?>">
    				                            </td><td > </td>
    				                        </tr>-->
    				                        
    				                        <tr>
    				                            <td colspan="8"><b>Seguimiento</b></td>
    				                        </tr>
    				                        <tr>
    				                            <td colspan="8">
    				                                <table class="table" style="font-size: 12px;">
    				                                    <thead>
    				                                        <tr>
    				                                            <th><b>Mes</b></th><th><b>Fecha</b></th><th><b>Descripcion</b></th>
    				                                        </tr>
    				                                    </thead>
    				                                    <tbody>
    				                                        <tr>
    				                                            <td>Enero</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="enero" id="enero" placeholder="Fecha" value="<?= $enero?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_ene" id="obs_ene" placeholder="Descripción" value="<?= $obs_ene?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Febrero</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="febrero" id="febrero" placeholder="Fecha" value="<?= $febrero?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_feb" id="obs_feb" placeholder="Descripción" value="<?= $obs_feb?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Marzo</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="marzo" id="marzo" placeholder="Fecha" value="<?= $marzo?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_mar" id="obs_mar" placeholder="Descripción" value="<?= $obs_mar?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Abril</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="abril" id="abril" placeholder="Fecha" value="<?= $abril?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_abr" id="obs_abr" placeholder="Descripción" value="<?= $obs_abr?>">
                    				                            </td>
    				                                        </tr>
    				                                        
    				                                        <tr>
    				                                            <td>Mayo</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="mayo" id="mayo" placeholder="Fecha" value="<?= $mayo?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_may" id="obs_may" placeholder="Descripción" value="<?= $obs_may?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Junio</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="junio" id="jun" placeholder="Fecha" value="<?= $junio?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_jun" id="obs_jun" placeholder="Descripción" value="<?= $obs_jun?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Julio</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="julio" id="julio" placeholder="Fecha" value="<?= $julio?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_jul" id="obs_jul" placeholder="Descripción" value="<?= $obs_jul?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Agosto</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="agosto" id="agosto" placeholder="Fecha" value="<?= $agosto?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_ago" id="obs_ago" placeholder="Descripción" value="<?= $obs_ago?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Septiembre</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="septiembre" id="septiembre" placeholder="Fecha" value="<?= $septiembre?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_sep" id="obs_sep" placeholder="Descripción" value="<?= $obs_sep?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Octubre</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="octubre" id="octubre" placeholder="Fecha" value="<?= $octubre?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_oct" id="obs_oct" placeholder="Descripción" value="<?= $obs_oct?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Noviembre</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="noviembre" id="noviembre" placeholder="Fecha" value="<?= $noviembre?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_nov" id="obs_nov" placeholder="Descripción" value="<?= $obs_nov?>">
                    				                            </td>
    				                                        </tr>
    				                                        <tr>
    				                                            <td>Diciembre</td>
    				                                            <td>
                    				                                <input class="form-control" type="date" name="diciembre" id="diciembre" placeholder="Fecha" value="<?= $diciembre?>">
                    				                            </td>
                    				                            <td >
                    				                                <input class="form-control" type="text" name="obs_dic" id="obs_dic" placeholder="Descripción" value="<?= $obs_dic?>">
                    				                            </td>
    				                                        </tr>
    				                                    </tbody>
    				                                </table>
    				                            </td>
    				                        </tr>
    				                    </table>
    				                    <input type="button" value="Regresar" class="btn btn-danger" onClick="document.location.href='diligencias.php?ruta=Diligencias'">
    				                    <input type="submit" value="Guardar" class="btn btn-success" name="Guardar">
    				                </div>
                                    
                                </form>
    					    </div>
                        </div>
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