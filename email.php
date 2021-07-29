<?php
// Vídeo con el que me ayude: https://www.youtube.com/watch?v=ol0EAYvwyH4
// https://support.google.com/mail/thread/29017293/como-puedo-usar-smtp-de-gmail-con-php-sin-oauth2?hl=es&authuser=1
// activa el acceso a aplicaciones menos seguras: 
// https://myaccount.google.com/lesssecureapps?pli=1&rapt=AEjHL4PTtGCJ7lWZzcAa7ayIxk9HyoHDFs8IG4a3LBozsr5ZK11WcBtl-FBuTZqWGvdu2PUsedG728YVbcCvPXax9KDmvdLO0A
// _______


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
// require 'vendor/autoload.php';

enviarEmail();

function enviarEmail()
{
  if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['telefono']) && isset($_POST['empresa']) && !empty($_POST['comentario'])) {
    // Mandar correo
    // Mapear las variables a los variables en POST
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $empresa = $_POST['empresa'];
    $comentario = $_POST['comentario'];

    // ------GitMailer


    //Create an instance; passing `true` enables exceptions
    // Creamos object tipo PHPMailer que nos permite construir nuestro correo para mandarlo
    // True para que pueda manejar excepciones
    $mail = new PHPMailer(true);

    try {
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->SMTPDebug = 3;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP 
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'correo@gmail.com';                     //SMTP username
      $mail->Password   = 'tucontraseña';                              //SMTP password
      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('kremled@gmail.com', 'Mailer');
      $mail->addAddress('otrocorrero@gmail.com', 'Mailer');     //Add a recipient - Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      //Attachments: Especificar URL
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content: Formateo del mensaje
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Correo Contacto';
      $mail->Body = 'Nombre: ' . $nombre . '<br/>Correo: ' . $email . '<br/>' . $comentario;

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {        //En caso de que haya error
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // ------GitMailerEND
  } else {
    return;
  }
}
