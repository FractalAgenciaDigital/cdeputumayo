<?php
include '../funciones.php';

// ---------------------------------Subir Excel
// substr substraer cadena
if (isset($_FILES['excel'])) {
	if (substr($_FILES['excel']['name'], -3) == "csv") {

		$fecha = date("Y-m-d");

		$ruta = "../site/assets/Upload/";
		$excel = $fecha	. "-" . $_FILES['excel']['name'];

		move_uploaded_file($_FILES['excel']['tmp_name'], "$ruta$excel");

		$row = 1;

		$handle = fopen("$ruta$excel", "r");

		// fgetcsv() obtiene los valores que estan en el csv y los extrae mediante ;
		while ($data = fgetcsv($handle, 1000, ";")) {

			// si la linea es igual a 1 no guardamos porque serian los titulos de la hoja del excel, el indice 0
			if ($row != 1) {
				$sql_guardar = "INSERT INTO programas(programa, estado) VALUES ('$data[0]','$data[1]')";
				$sql = mysqli_query($conn, $sql_guardar);

				if (!$sql) {
					// echo "<div>Problema al momento de importar el archivo, vuelva a intentarlo.</div>";
					$_SESSION['message'] = 'Problema al momento de importar el archivo, vuelva a intentarlo.';
					$_SESSION['message_type'] = 'danger';
					header("location: carguemasivo.php");
					exit;
				}
			}

			$row++;
		}

		fclose($handle);
		// echo "<div>La importación del archivo se realizo satisfactoriamente</div>";
		$_SESSION['message'] = 'La importación del archivo se realizo satisfactoriamente';
		$_SESSION['message_type'] = 'success';
		header("location: carguemasivo.php");
		// exit;
	} else {
		$_SESSION['message'] = 'No es un archivo excel. Vuelva a intentarlo porfavor.';
		$_SESSION['message_type'] = 'info';
		header("location: carguemasivo.php");

		// echo "No es un archivo excel. Vuelva a intentarlo porfavor.";
	}
}
