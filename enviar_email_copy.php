<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$empresa = $_POST['empresa'];
$comentario = $_POST['comentario'];


$paraCliente = $email;
$tituloCliente = "Formulario de Contacto";
$mensajeCliente = "<html>" .
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
  "<a title='Centro de Desarrollo Empresarial' href='https://cdeputumayo.com/'>" .
  "<img src='' alt='Centro de Desarrollo Empresarial' width='100px'/>" .
  "</a>" .
  "</p>" .
  "</div>" .
  "</body>" .
  "</html>";

$cabecerasCliente  = 'MIME-Version: 1.0' . "\r\n";
$cabecerasCliente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabecerasCliente .= 'From: Bogota Colombia<delmerk2000@gmail.com>';
$enviadoCliente   = mail($paraCliente, $tituloCliente, $mensajeCliente, $cabecerasCliente);


// echo "<script>
//     window.location='https://cdeputumayo.com/';
// </script>";
