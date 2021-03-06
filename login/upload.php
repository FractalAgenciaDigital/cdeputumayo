<?php
include '../funciones.php';


$error = '';

if (isset($_FILES['excel'])) {
	// substr substraer cadena
	if (substr($_FILES['excel']['name'], -3) == "csv") {

		$fecha = date("Y-m-d");

		$ruta = "../site/assets/Upload/";
		$excel = $fecha	. "-" . $_FILES['excel']['name'];

		move_uploaded_file($_FILES['excel']['tmp_name'], "$ruta$excel");

		$row = 1;

		$handle = fopen("$ruta$excel", "r");

		// fgetcsv() obtiene los valores que estan en el csv y los extrae mediante ;
		while ($data = fgetcsv($handle, 0, ";")) {

			// si la linea es igual a 1 no guardamos porque serian los titulos de la hoja del excel, el indice 0
			if ($row != 1) {
				$data[20] = date("Y-m-d");
				$data[26] = date("Y-m-d");

				$sql_guardar = "INSERT INTO diligencias_new(tipoDocumento, documento, nombres, apellidos, ciudad, email, celular, direccEmpr, activEcon, otro_activEcon, des_productivo, fort_empresarial, form_empresarial, nombre_representante, celular_representante, email_representante, poblacion, otro_poblacion, fecha_matricula, matricula, registrado,  programa_ccp, estado_solicitud, fecha_solicitud, genero, escolaridad, rango_edad, solicitud, create_at, updated_at) VALUES ('$data[0]','$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]', '$data[16]', '$data[17]', '$data[18]', '$data[19]', '$data[20]', '$data[21]', '$data[22]', '$data[23]', '$data[24]', '$data[25]', '$data[26]', '$data[27]', '$data[28]', '$data[29]')";

				$sql = mysqli_query($conn, $sql_guardar);

				if (!$sql) {
					$error = "Problema al momento de importar el archivo, vuelva a intentarlo.";
					header("location: carguemasivo.php");
					exit;
				}
			}

			$row++;
		}

		fclose($handle);
		$error = "La importación del archivo se realizo satisfactoriamente.";
		header("location: carguemasivo.php");
		// exit;
	} else {
		$error = "No es un archivo excel. Vuelva a intentarlo porfavor.";
		header("location: carguemasivo.php");
	}
}
