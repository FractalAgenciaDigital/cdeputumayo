	<?php
	session_start();
	$ruta = "";
	if (isset($_GET['ruta'])) {
		$ruta = $_GET['ruta'];
	}

	//echo "<pre>"; print_r($_SESSION); echo "</pre>";
	?>
	<!DOCTYPE html>

	<html lang="es">

	<head>
		<!-- <meta http-equiv="Content-Type" content="text/html; charset=shift_jis"> -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
		<meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
		<title>Administrador</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Icons-->
		<link rel="icon" type="image/ico" href="./img/favicon.ico" sizes="any" />
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

	<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<header class="app-header navbar">
			<button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="#">
				<img class="navbar-brand-full" src="img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
				<img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
			</a>
			<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
				<span class="navbar-toggler-icon"></span>
			</button>

			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item">
					Usuario: &nbsp;
					<strong><?= $_SESSION['nombre'] ?></strong>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						<i class="nav-icon cui-cog"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout.php">
							<i class="fa fa-lock"></i> Salir</a>
					</div>
				</li>
			</ul>

			<button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
				<span class="navbar-toggler-icon"></span>
			</button>
		</header>
		<div class="app-body">
			<?php
			include "lateral.php";
			?>
			<main class="main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="principal.php?ruta=">Home</a></li>
					<li class="breadcrumb-item"><?= $ruta ?></li>
					<!-- Breadcrumb Menu-->
				</ol>
				<div class="container-fluid">
					<div class="animated fadeIn">