<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Administracion </title>
    <!-- Icons-->
    <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
		<form name="FORMA" method="POST" onSubmit="return validar()">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card-group">
					<div class="card p-4">
						<div class="card-body">
							<h1>Login</h1>
							<p class="text-muted">Ingresa a tu cuenta</p>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="icon-user"></i>
									</span>
								</div>
								<input class="form-control" type="text" id="usuario" name="usuario" onKeyup="limpiar_errores()" placeholder="Usuario" required>
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="icon-lock"></i>
									</span>
								</div>
								<input class="form-control" id="clave" name="clave" onKeyup="limpiar_errores()" type="password" placeholder="Password" required>
							</div>
							<div class="row">
								<div class="col-6">
									<button class="btn btn-primary px-4" type="submit" name="acceder" ">Acceder</button>
								</div>
                  <!--<div class="col-6 text-right">
                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                  </div>-->
							</div>
							 <br>
							<div style="display:none" id="errores" class="row">							
								<div class="col-6">
									<div class="alert alert-danger" role="alert">
										Datos incorrectos o usuario desactivado!!!
									</div>
								</div>
							</div>
						</div>
					</div>            
				</div>
			</div>
		</div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
	
	<script>
		function limpiar_errores(){
			$("#errores").hide();
		}
		
		function validar(){			
			var clave = $("#clave").val();
			var usu = $("#usuario").val();
			
			
			$.post( "usuarios_ajax.php", { usuario: usu, clave: clave })
			.done(function( data ) {
				resultado =  JSON.parse(data) ;
				//console.log(resultado.respuesta);
				if(resultado.respuesta==0){
					$("#errores").show();
				}
				else{
					document.location.href="principal.php";
				}
			});
			return false;
		}
	</script>
  </body>
</html>
