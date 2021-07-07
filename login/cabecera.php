	<?php
	session_start();
	$ruta = "";
	if (isset($_GET['ruta'])) {
		$ruta = $_GET['ruta'];
	}

	//echo "<pre>"; print_r($_SESSION); echo "</pre>";
	?>
	<!DOCTYPE html>
	<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

	<html lang="es">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
		<base href="./">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
		<meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
		<title>Aministrador</title>
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