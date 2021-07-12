<?php
  require_once('vendor/autoload.php');
  require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

  $mail = new PHPMailer(true);

  $mailchimp = new MailchimpTransactional\ApiClient();
  $mailchimp->setApiKey('pv_eILpApJ0LahW_2XXKBg');
  /*
  $response = $mailchimp->senders->addDomain(["domain" => "fractalagenciadigital.com"]);
  print_r($response);
  */
  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mandrillapp.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'fractalagenciadigital';                     //SMTP username
    $mail->Password   = 'pv_eILpApJ0LahW_2XXKBg';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contacto@fractalagenciadigital.com', 'Mailer');
    $mail->addAddress('ccmonpan@hotmail.com', 'Camilo');     //Add a recipient
    $mail->addAddress('marck123.mcdd@gmail.com');               //Name is optional

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  /*
  function run(){
  try {
      $mailchimp = new MailchimpTransactional\ApiClient();
      $mailchimp->setApiKey('pv_eILpApJ0LahW_2XXKBg');
      $response = $mailchimp->users->ping();
      print_r($response);
    } catch (Error $e) {
          echo 'Error: ',  $e->getMessage(), "\n";
    }
  }
  run();*/
  include 'funciones.php';
  /*
  function run($message){
    try {
      $mailchimp = new MailchimpTransactional\ApiClient();
      $mailchimp->setApiKey('28WdtqJRJIrpb9SmhNbVCQ');
      $response = $mailchimp->users->ping();
      print_r($response);

      $response = $mailchimp->messages->sendTemplate  (["message" => $message]);
      print_r($response);

      //echo "pasa";
      return $response;
    } catch (Error $e) {
            echo "Error";
    }
  }
  $message = [
    "from_email" => "hello@example.com",
    "subject" => "Hello world",
    "text" => "Welcome to Mailchimp Transactional!",
    "to" => [
      [
        "email" => "marck123.mcdd@gmail.com",
        "type" => "to"
      ]
    ]
  ];
  run($message);
  */

  if(isset($_POST['enviar']))
  {
    //var_dump($_POST);
  }

?>