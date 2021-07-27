<?php
include 'funciones.php';
if (isset($_POST['listar'])) {

	$cons = 'SELECT * FROM programas  order by programa';
	$res = $stmt = mysqli_query($conn, $cons);
	$opts_select_proyects = "<option value=''>Seleccione</option>";
	while ($fila = mysqli_fetch_array($res)) {
		$opts_select_proyects .= "<option value='" . $fila['id_programa'] . "'>" . $fila['programa'] . "</option>";
	}
	echo $opts_select_proyects;
}

if (isset($_POST['lista_proyectos'])) {
	$condicion = "";
	if (isset($_POST['parametro']) && $_POST['parametro'] != '') {
		//$condicion = " and (nombre like '%".$_POST['parametro']."')";
	}
	$cons = "select * from programas  order by programa";
	$res = mysqli_query($conn, $cons);
	$tabla = "";
	$cont = 0;
	while ($fila = mysqli_fetch_array($res)) {
		$cont++;
		$estado = "activo";
		if ($fila['estado'] == "0") {
			$estado = "inactivo";
			$opc_eliminar = "<button title='Eliminar' type='button' class='btn btn-ghost-secondary inactive'>
    						<i class='cui-trash'></i>
    					</button>";
		} else {
			$opc_eliminar = "<button title='Eliminar' type='button' class='btn btn-ghost-danger active' onClick='" . 'eliminar("' . $fila['id_programa'] . '")' . "'>
    						<i class='cui-trash'></i>
    					</button>";
		}





		$tabla .= "
    			<tr>
    				<td>$cont</td><td>" . $fila['programa'] . "</td><td>$estado</td>
    				<td>
    					<button title='Editar' type='button' class='btn btn-ghost-warning active' data-toggle='modal' data-target='#exampleModal' onClick='" . 'cargar_editar("' . $fila['id_programa'] . '")' . "'>
    						<i class='cui-pencil'></i>
    					</button>
    					$opc_eliminar
    				</td>
    			</tr>";
	}
	echo $tabla;
}

if (isset($_POST['crear'])) {

	$cons = "INSERT INTO programas (programa,  estado) values ('" . $_POST['programa'] . "'," . $_POST['estado'] . ")";
	$res = mysqli_query($conn, $cons);
	//print_r($_POST);	
}

if (isset($_POST['editar'])) {

	print_r($_POST);

	$cons = "UPDATE programas SET  programa='" . $_POST['programa'] . "', estado='" . $_POST['estado'] . "' WHERE id='" . $_POST['editar'] . "'";
	$res = mysqli_query($conn, $cons);
}

if (isset($_POST['cargar_editar'])) {
	$cons = "SELECT * FROM programas where id = " . $_POST['cargar_editar'];
	$res = mysqli_query($conn, $cons);
	$fila = mysqli_fetch_assoc($res);
	echo json_encode($fila);
}
if (isset($_POST['eliminar'])) {
	$cons = "Update  programas set estado = 0 where id =" . $_POST['eliminar'];
	$res = mysqli_query($conn, $cons);
}
