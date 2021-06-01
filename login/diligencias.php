<?php
		include "cabecera.php";
		 include '../funciones.php'; 
		 /*
		echo  $cons3="SELECT * FROM `extras_usus` WHERE nom_progr4 like '%CISP%'  ";
	    $res3 = mysqli_query($conn, $cons3);
		while($fila3= mysqli_fetch_array($res3)){
		    $cons2="insert into progsxdiligendias (id_diligencia,id_programa,recive_apoyo, dinero_espcie, descrip_val) values (".$fila3['id_usu'].", 17,'".$fila3['apoyo4']."','"
    		    .$fila3['dinero_espcie4']."','".$fila3['especie4']."')";
    		    echo "$cons2 <br>";
    		    $res2 = mysqli_query($conn, $cons2);
		}
		 
		 $cons3="select id, programa from programas ";
        $aux_progs = array();
        $res3 = mysqli_query($conn, $cons3);
		while($fila3= mysqli_fetch_array($res3)){
		    $aux_progs[$fila3['programa']] = $fila3;
		}
		$cons="select * from extras_usus ";
		$res = mysqli_query($conn, $cons);
		while($fila = mysqli_fetch_array($res)){
		    //echo $fila['nom_progr']."siiiiii <br>";
		    if($fila['nom_progr'] && $aux_progs[$fila['nom_progr']]){
	       
    		    $cons2="insert into progsxdiligendias (id_diligencia,id_programa,recive_apoyo, dinero_espcie, descrip_val) values (".$fila['id_usu'].",".$aux_progs[$fila['nom_progr']]['id'].",'".$fila['apoyo']."','"
    		    .$fila['dinero_espcie']."','".$fila['especie']."')";
    		    $res2 = mysqli_query($conn, $cons2);
        	   // echo "<br>$cons2";
		    }
		    if($fila['nom_progr2'] && $aux_progs[$fila['nom_progr2']]){
	       
    		    $cons2="insert into progsxdiligendias (id_diligencia,id_programa,recive_apoyo, dinero_espcie, descrip_val) values (".$fila['id_usu'].",".$aux_progs[$fila['nom_progr2']]['id'].",'".$fila['apoyo2']."','"
    		    .$fila['dinero_espcie2']."','".$fila['especie2']."')";
    		    $res2 = mysqli_query($conn, $cons2);
        	    //echo "<br>$cons2";
		    }
		    if($fila['nom_progr3'] && $aux_progs[$fila['nom_progr3']]){
	       
    		    $cons2="insert into progsxdiligendias (id_diligencia,id_programa,recive_apoyo, dinero_espcie, descrip_val) values (".$fila['id_usu'].",".$aux_progs[$fila['nom_progr3']]['id'].",'".$fila['apoyo3']."','"
    		    .$fila['dinero_espcie3']."','".$fila['especie3']."')";
    		   $res2 = mysqli_query($conn, $cons2);
        	    //echo "<br>$cons2";
		    }
		    if($fila['nom_progr4'] && $aux_progs[$fila['nom_progr4']]){
	       
    		    $cons2="insert into progsxdiligendias (id_diligencia,id_programa,recive_apoyo, dinero_espcie, descrip_val) values (".$fila['id_usu'].",".$aux_progs[$fila['nom_progr4']]['id'].",'".$fila['apoyo4']."','"
    		    .$fila['dinero_espcie4']."','".$fila['especie4']."')";
    		   $res2 = mysqli_query($conn, $cons2);
        	    //echo "<br>$cons2";
		    }
		    if($fila['nom_progr5'] && $aux_progs[$fila['nom_progr5']]){
	       
    		    $cons2="insert into progsxdiligendias (id_diligencia,id_programa,recive_apoyo, dinero_espcie, descrip_val) values (".$fila['id_usu'].",".$aux_progs[$fila['nom_progr5']]['id'].",'".$fila['apoyo5']."','"
    		    .$fila['dinero_espcie5']."','".$fila['especie5']."')";
    		   $res2 = mysqli_query($conn, $cons2);
        	    //echo "<br>$cons2";
		    }
		    if($fila['nom_progr6'] && $aux_progs[$fila['nom_progr6']]){
	       
    		    $cons2="insert into progsxdiligendias (id_diligencia,id_programa,recive_apoyo, dinero_espcie, descrip_val) values (".$fila['id_usu'].",".$aux_progs[$fila['nom_progr6']]['id'].",'".$fila['apoyo6']."','"
    		    .$fila['dinero_espcie6']."','".$fila['especie6']."')";
    		   $res2 = mysqli_query($conn, $cons2);
        	    //echo "<br>$cons2";
		    }
		    
		} 
		//echo "acaaaa";
		exit;*/
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
	
?>
        <script>
            function ruta() {
                var td = document.getElementById("tipoDoc").value;
                var tb = document.getElementById("txtBuscar").value;
                var prog = document.getElementById("proyectos").value;
		        var proyecto = "info_d.php?tipoDoc="+td+"&txtBuscar="+tb+"&proyecto="+prog;
		        
		        window.open(proyecto, "_blank"); 
		    }
		</script>
        <div class="row">
    		<div class="col-sm-12">
    			<div class="card">
    				<div class="card-header">
    					<div class="d-flex justify-content-between">
    						<div class="align-self-center">
    							<strong>Diligencias</strong>
    						</div>
    						<button class="btn btn-success" id="btn_export" onclick="ruta();">Exportar</button> 
    						<div class="col-1"></div>
    					</div>
    				</div>
    				    <div class="card-body">
    					    <div class="form-group row">
    						    <label class="col-md-auto col-form-label">Tipo documento
    						    </label>
						        <div class="col-md-auto">
    							    <select id="tipoDoc" class="form-control">
        								<option value="">Seleccione</option>
        								<option value="1">CEDULA DE CIUDADANIA</option>
        								<option value="2">NIT</option>
        								<option value="3">OTROS</option>
        							</select>
    						    </div>
    						    <label class="col-md-auto col-form-label">Programa
    						    </label>
						        <div class="col-md-auto">
    							    <select id="proyectos" name="proyectos" class="form-control">
        							
        								
        							</select>
    						    </div>
    						    <label class="col-md-auto col-form-label">Tercero o Raz&oacute;n social</label>
    						    <div class="col-md-2">
    							    <input id="txtBuscar" type="text" class="form-control">
    						    </div>
    						    <div class="col-md-1">
    							    <button type="button" class="btn btn-ghost-primary active" name="nuevo" onClick="listar()">
    								    Buscar
    							    </button>
    						    </div>
    					</div>
    					<!--<button type="button" class="btn btn-ghost-primary active" name="nuevo" id="nuevo" data-toggle="modal" data-target="#exampleModal" onClick="limpiar()">
    						Nuevo
    					</button><br><br>-->
    					<table class="table table-responsive table-bordered table-striped table-sm" style="font-size: 12px; max-height: 425px;">
    						<thead>
    							<tr>
    								<th class="text-center align-middle">#</th>
    								<th class="text-center align-middle">Tipo documento</th>
    								<th class="text-center align-middle">Nit</th>
    								<th class="text-center align-middle">Doc. persona</th>
    								<th class="text-center align-middle">Nombre</th>
    								<th class="text-center align-middle">Ape. 1</th>
    								<th class="text-center align-middle">Ape. 2</th>
    								<th class="text-center align-middle">Raz&oacute;n social</th>
    								<th class="text-center align-middle">Act. econ&oacute;mica</th>
    								<th class="text-center align-middle">Dir. domicilio</th>
    								<th class="text-center align-middle">Ciudad</th>
    								<th class="text-center align-middle">Correo</th>
    								<th class="text-center align-middle">Tel. o cel. 1</th>
    								<th class="text-center align-middle">Tel. o cel. 2</th>
    								<th class="text-center align-middle">Act. econ&oacute;mica empresa</th>
    								<th class="text-center align-middle">Dir. empresa</th>
    								<th class="text-center align-middle">Correo empresarial</th>
    								<th class="text-center align-middle">Correo empresa</th>
    								<th class="text-center align-middle">Tel. o cel.</th>
    								<th class="text-center align-middle">Desarrollo prod.</th>
    								<th class="text-center align-middle">Otro Des. prod.</th>
    								<th class="text-center align-middle">Ppal. Serv/Prod</th>
    								<th class="text-center align-middle">Formación Empresarial</th>
    								<th class="text-center align-middle">Fortalecimiento Empresarial</th>
    								<th class="text-center align-middle">Otro Forta. Empresarial</th>
    								<th class="text-center align-middle">Fecha solicitud</th>
    								<th class="text-center align-middle">Fecha actualiza</th>
    								<th class="text-center align-middle">Solicitud</th>
    								<th class="text-center align-middle">Genero</th>
    								<th class="text-center align-middle">Tipo Población</th>
    								<th class="text-center align-middle">Otro Tipo Población</th>
    								<th class="text-center align-middle">Escolaridad</th>
    								<th class="text-center align-middle">Rango Edad</th>
    								<th class="text-center align-middle">Registrado en Cámara</th>
    								<th class="text-center align-middle">Número Matricula</th>
    								<th class="text-center align-middle">Fecha Matricula</th>
    								<th class="text-center align-middle">Proyecto CPP u otros</th>
    						<?php   foreach($programas2 as $p) {?>
        								<th class="text-center align-middle">Proyecto = <?= $p?></th>
        								<th class="text-center align-middle">Recibe apoyo1</th>
        								<th class="text-center align-middle">Tipo apoyo1</th>
        								<th class="text-center align-middle">Descripción / Valor1</th>
    						<?php   }?>
    						<!--
    								<th class="text-center align-middle">Nom. Proyecto 1</th>
    								<th class="text-center align-middle">Recibe apoyo1</th>
    								<th class="text-center align-middle">Tipo apoyo1</th>
    								<th class="text-center align-middle">Descripción / Valor1</th>
    								<th class="text-center align-middle">Nom. Proyecto 2</th>
    								<th class="text-center align-middle">Recibe apoyo2</th>
    								<th class="text-center align-middle">Tipo apoyo2</th>
    								<th class="text-center align-middle">Descripción / Valor2</th>
    								<th class="text-center align-middle">Nom. Proyecto 3</th>
    								<th class="text-center align-middle">Recibe apoyo3</th>
    								<th class="text-center align-middle">Tipo apoyo3</th>
    								<th class="text-center align-middle">Descripción / Valor3</th>
    								<th class="text-center align-middle">Nom. Proyecto 4</th>
    								<th class="text-center align-middle">Recibe apoyo4</th>
    								<th class="text-center align-middle">Tipo apoyo4</th>
    								<th class="text-center align-middle">Descripción / Valor4</th>
    								<th class="text-center align-middle">Nom. Proyecto 5</th>
    								<th class="text-center align-middle">Recibe apoyo5</th>
    								<th class="text-center align-middle">Tipo apoyo5</th>
    								<th class="text-center align-middle">Descripción / Valor5</th>
    								<th class="text-center align-middle">Nom. Proyecto 6</th>
    								<th class="text-center align-middle">Recibe apoyo6</th>
    								<th class="text-center align-middle">Tipo apoyo6</th>-->
    								<th class="text-center align-middle">Descripción / Valor6</th>
    								<th class="text-center align-middle">Estado Solicitud</th>
    								<th class="text-center align-middle">Fecha Respuesta</th>
    								<th class="text-center align-middle">Enero</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Febrero</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Marzo</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Abril</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Mayo</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Junio</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Julio</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Agosto</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Septiembre</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Octubre</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Noviembre</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle">Diciembre</th>
    								<th class="text-center align-middle">Observación</th>
    								<th class="text-center align-middle" colspan="2">-</th>
    							</tr>
    						</thead>
    						<tbody id="cuerpo">
    							
    						</tbody>
    					</table>
    				
    				    </div>
    			   </div>
    		    </div>  
            </div>

<?php
		include "pie.php";
?>
<script>
    function listar()
    {
		let cuerpo = {
		    listar : '1', 
		    tipoDoc: $('#tipoDoc').val(), 
		    proyecto: $('#proyectos').val(),
		    
		    txtBuscar: $('#txtBuscar').val()
		};
		$("#exportar").attr('href', `info_d.php?exportar=1&tipoDoc=${cuerpo.tipoDoc}&txtBuscar=${cuerpo.txtBuscar}`);
	
        $.post('../diligencias_ajax.php', cuerpo).done(function ( resp ) {
            $('#cuerpo').html(resp);
        });
    }
    function listar_proyects()
    {
		let cuerpo = {
		    listar : '1', 
		    tipoDoc: $('#tipoDoc').val(), 
		    proyecto: $('#proyectos').val(),
		    
		    txtBuscar: $('#txtBuscar').val()
		};
		
		$.post('proyectos_ajax.php', cuerpo).done(function ( resp ) {
            $('#proyectos').html(resp);
        });
		
    }
    
    $( document ).ready(function () {
       // listar();
        listar_proyects();
    });

   
    
    function Eliminar(id){
        let cuerpo = {
            elimin_d : '1',
            id_elim : id
        };
        
        if(confirm("Esta seguro de eliminar este registro?")){
            $.post('../diligencias_ajax.php',cuerpo).done(function ( resp ){
                listar();
            });
        }
    }
</script>