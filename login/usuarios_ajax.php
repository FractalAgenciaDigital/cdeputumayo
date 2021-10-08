<?php
include "funciones.php";

if(isset($_POST['usuario'])&&isset($_POST['clave'])){
	
	$cons="SELECT * FROM usuarios where usuario='".$_POST['usuario']."' and clave='".md5($_POST['clave'])."' and estado=1";
	$res = mysqli_query($conn,$cons);
	$fila = mysqli_fetch_assoc($res);
	
	if($fila){
		$fila['respuesta'] = 1;		
		session_start();
		$_SESSION['usuario'] = $fila['usuario'];
		$_SESSION['nombre'] = $fila['nombre'];
		$_SESSION['cargo'] = $fila['cargo'];
		$_SESSION['correo'] = $fila['correo'];
		$_SESSION['id_usu'] = $fila['id'];
	}
	else{
		$fila['respuesta'] = 0;
	}
	echo json_encode($fila);
	
}
if(isset($_POST['listar_usus'])){
	$condicion="";
	if(isset($_POST['parametro'])&&$_POST['parametro']!=''){
		//$condicion = " and (nombre like '%".$_POST['parametro']."')";
	}
	$cons="select * from usuarios where id>0 order by nombre";
	$res=mysqli_query($conn,$cons);
	$tabla="";
	$cont=0;
	while($fila=mysqli_fetch_array($res)){
		$cont++;
		$estado="activo";
		if($fila['estado']=="0") $estado="inactivo";
		
		$opc_eliminar="<button title='Eliminar' type='button' class='btn btn-ghost-danger active' onClick='".'eliminar("'.$fila['id'].'")'."'>
						<i class='cui-trash'></i>
					</button>";		
		if($fila['id']==1){
			$opc_eliminar="";
		}
		
		$tabla.="
			<tr>
				<td>$cont</td><td>".$fila['nombre']."</td><td>".$fila['usuario']."</td><td>".$fila['cargo']."</td><td>$estado</td>
				<td>
					<button title='Editar' type='button' class='btn btn-ghost-warning active' data-toggle='modal' data-target='#exampleModal' onClick='".'cargar_editar("'.$fila['id'].'")'."'>
						<i class='cui-pencil'></i>
					</button>
					$opc_eliminar
				</td>
			</tr>";
	}
	echo $tabla;
}
if(isset($_POST['crear'])){
	$clave = md5($_POST['clave']);
	$cons="INSERT INTO usuarios (usuario, nombre, clave, cargo, estado, correo, celular) values ('".$_POST['usuario']."','".$_POST['nombre']."','".$clave."','".$_POST['cargo']."','".$_POST['estado']."','".$_POST['correo']."','".$_POST['celular']."')";
	$res=mysqli_query($conn,$cons);
	//print_r($_POST);	
}

if(isset($_POST['cargar_editar'])){
	$cons="SELECT * FROM usuarios where id = ".$_POST['cargar_editar'];
	$res=mysqli_query($conn,$cons);
	$fila = mysqli_fetch_assoc($res);
	echo json_encode($fila);
}

if(isset($_POST['editar'])){
	$clave="";
	//print_r($_POST);	
	if($_POST['clave']!='')$clave = ",clave='".md5($_POST['clave'])."'";
	
	$cons="UPDATE usuarios SET  usuario='".$_POST['usuario']."', nombre='".$_POST['nombre']."' $clave , cargo='".$_POST['cargo']."', estado='".$_POST['estado']."', correo='".$_POST['correo']."', celular='".$_POST['celular']."' WHERE id='".$_POST['editar']."'";
	$res=mysqli_query($conn,$cons);
	
}

if(isset($_POST['eliminar'])){
	$cons="DELETE FROM usuarios where id =".$_POST['eliminar'];
	$res=mysqli_query($conn,$cons);
}

?>

