<?php


if (isset($_POST['submit'])) {

  if (!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['telefono']) && !empty($_POST['empresa']) && !empty($_POST['comentario'])) {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $empresa = $_POST['empresa'];
    $comentario = $_POST['comentario'];

    $header = "From:CDE Putumayo<correspondencia@ccputumayo.org.co> " . "\r\n";
    $header .= "Reply-To: delmerk2000@gmail.com" . "\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    // correo al que se envia - Se agraga el @ a la function mail para que no arroje error...
    $mail =  mail($email, $comentario, $header);

    if ($mail) {
      echo "<h4>Enviado Exitosamente</h4>";
    }
  }
}
