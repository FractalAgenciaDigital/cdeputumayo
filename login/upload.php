<?php
include '../funciones.php';

// ---------------------------------Subir Excel
// substr substraer cadena
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
				echo "<div>Problema al momento de importar el archivo, vuelva a intentarlo.</div>";
				exit;
			}
		}

		$row++;
	}

	fclose($handle);
	// echo "<div>La importación del archivo se subio satisfactoriamente</div>";
	header("location: carguemasivo.php");
	// exit;
} else {
	echo "No es un archivo excel. Vuelva a intentarlo porfavor.";
}
