
CREATE TABLE `diligencias_new` (
  `id` int(11) NOT NULL,
  `tipoDocumento` tinyint(1) DEFAULT NULL,
  `documento` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` tinyint(2) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `activEcon` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `des_productivo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `princ_prod_serv` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `fort_empresarial` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `form_empresarial` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `nombre_representante` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular_representante` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_representante` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `poblacion` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otro_poblacion` text COLLATE utf8_unicode_ci,
  `fecha_matricula` date DEFAULT NULL,
  `matricula` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `registrado` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_cam_comercio` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `programa_ccp` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado_solicitud` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,



  `nom_progr` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido1` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido2` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `razonSocial` varchar(450) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccDomic` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `telocel1` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telocel2` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nitEmpr` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `activEconEmpr` varchar(450) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccEmpr` varchar(450) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailPersonalEmpr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailEmpr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `telocel` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ctde` tinyint(1) DEFAULT NULL,
  `dp` tinyint(1) DEFAULT NULL,
  `forme` tinyint(1) DEFAULT NULL,
  `forte` tinyint(1) UNSIGNED DEFAULT NULL,
  `solicitud` text COLLATE utf8_unicode_ci,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sectorEcon` tinyint(2) UNSIGNED DEFAULT NULL,
  `sectorEconOtro` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ppalProdServ` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `forteOtro` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `formeTema` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `razonSocial2` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `razonSocial3` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;