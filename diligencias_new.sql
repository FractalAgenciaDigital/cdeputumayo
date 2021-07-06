
CREATE TABLE `diligencias_new` (
  `id` int(11) NOT NULL,
  `tipoDocumento` tinyint(1) DEFAULT NULL,
  `documento` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nitEmpr` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



INSERT INTO `diligencias_new` (`id`, `tipoDocumento`, `documento`, `nitEmpr`, `nombres`, `apellidos`, `ciudad`, `email`, `celular`, `activEcon`, `des_productivo`, `princ_prod_serv`, `fort_empresarial`, `form_empresarial`, `nombre_representante`, `celular_representante`, `email_representante`, `poblacion`, `otro_poblacion`, `fecha_matricula`, `matricula`, `registrado`, `num_cam_comercio`, `programa_ccp`, `estado_solicitud`, `fecha_solicitud`, `create_at`, `updated_at`) VALUES ('1', '1', '1007305000', '1010909', 'Usuario', 'Lastname', 'Puerto Asís', 'mail@mail.com', '3213070000', 'Programación', 'Código', 'Empresota', 'NULL', 'NULL', 'user', '3213070000', 'mail@mail.com', 'Ninguno', NULL, '2021-07-01', '1000001', 'Si', '099009', 'Si', 'Resuelta', '2021-06-02', current_timestamp(), current_timestamp());