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
      $mail->Username   = 'mailer@gmail.com';                     //SMTP username
      $mail->Password   = 'tu contraseña';                              //SMTP password
      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
      $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      //Recipients
      $mail->setFrom('mailer@gmail.com', 'Mailer');
      $mail->addAddress('mailer@gmail.com', 'Mailer');     //Add a recipient - Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      //Attachments: Especificar URL
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

      //Content: Formateo del mensaje
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Solicitud de Taller';
      $mail->Body = '<h2>Solicitud Taller<h2>' . 'Nombre Usuario: ' . $nombre . '<br/>Correo: ' . $email . '<br/>' . 'Ayuda Solicitada: <br/>' . $comentario;
      // ------------
      /* $mail->Body = "<html>" .
        "<head><title>Email de Prueba</title>" .
        "<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            color: #888;
            background-color:rgba(230, 225, 225, 0.5);
            line-height: 30px;
            text-align: center;
        }
        .contenedor{
            width: 80%;
            min-height:auto;
            text-align: center;
            margin: 0 auto;
            padding: 40px;
            background: #ececec;
            border-top: 3px solid #E64A19;
        }
        .bold{
            color:#333;
            font-size:25px;
            font-weight:bold;
        }
        img{
            margin-left: auto;
            margin-right: auto;
            display: block;
            padding:0px 0px 20px 0px;
        }
        </style>
    </head>" .
        "<body>" .
        "<div class='contenedor'>" .
        "<p>&nbsp;</p>" .
        "<p>&nbsp;</p>" .
        "<span>Felicitaciones <strong class='bold'>" . $nombre . " . . .!</strong></span>" .
        "<p>&nbsp;</p>" .
        "<p>Su formulario de Contacto funciona perfectamente...!</p> " .
        "<p>&nbsp;</p>" .
        "<p>&nbsp;</p>" .
        "<p><strong>Email: </strong> " . $email . " </p>" .
        "<p>&nbsp;</p>" .
        "<p><strong>Celular: </strong> " . $telefono . " </p>" .
        "<p>&nbsp;</p>" .
        "<p><strong>Empresa: </strong> " . $empresa . " </p>" .
        "<p>&nbsp;</p>" .
        "<p><strong>Comentario: </strong> " . $comentario . " </p>" .
        "<p>&nbsp;</p>" .
        "<p><span class='bold'> Centro de Desarrollo Empresarial </span></p>" .
        "<p>&nbsp;</p>" .
        "<p>" .
        "<a title='Centro de Desarrollo Empresarial' href='https://cdeputumayo.com/'>" . "</a>" .
        "</p>" .
        "</div>" .
        "</body>" .
        "</html>"; */
      // ------------

      $mail->send();
      echo "<script>
                alert('Email enviado con éxito');
                window.location= 'index.php'
    </script>";
      // header("location: index.php");

      // echo 'Message has been sent';
    } catch (Exception $e) {        //En caso de que haya error
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // ------GitMailerEND
  } else {
    return;
  }
}
