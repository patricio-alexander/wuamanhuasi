
CREATE TABLE `arbol` (
  `id_especie` int(11) DEFAULT NULL,
  `id_ruta` int(11) DEFAULT NULL,
  `id_registro` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `id_arbol` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha_s` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `registro` (
  `cedula` int(11) DEFAULT NULL,
  `id_registro` int(11) NOT NULL,
  `id_periodo_academico` int(11) DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `estudiante` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `foto_perfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estudiante`
--

CREATE TABLE `periodo_academico` (
  `id_periodo_academico` int(11) NOT NULL,
  `nombre_ac` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periodo_academico`
--
CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `especialidad` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `periodo_academico` (`id_periodo_academico`, `nombre_ac`) VALUES
(1, 'abr-sept 2023');



INSERT INTO `especialidad` (`id_especialidad`, `especialidad`) VALUES
(1, 'desarrollo de software');



INSERT INTO `estudiante` (`cedula`, `nombre`, `apellido`, `telefono`, `correo`, `foto_perfil`) VALUES
(1106011420, 'patricio', 'briceno', '923242334', 'pato@gmail.com', 'imagenFotoPato.jpg'),
(1106011421, 'Alex', 'Sarango', '2687655', 'alex@gmail.com', 'alex-1112303434.jpg'),
(1106011425, 'Diego', 'Merino', '2687655', 'merino@gmail.com', 'merino-1112f34.jpg');


INSERT INTO `registro` (`cedula`, `id_registro`, `id_periodo_academico`, `id_especialidad`) VALUES
(1106011420, 1, 1, 1),
(1106011425, 3, 1, 1),
(1106011421, 4, 1, 1);





ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `cedula_fk` (`cedula`),
  ADD KEY `id_periodo_fk` (`id_periodo_academico`),
  ADD KEY `id_especialidad_fk` (`id_especialidad`);

ALTER TABLE `arbol`
  ADD PRIMARY KEY (`id_arbol`),
  ADD KEY `id_especie_fk` (`id_especie`),
  ADD KEY `id_ruta_fk` (`id_ruta`),
  ADD KEY `id_registro_fk` (`id_registro`),
  ADD KEY `id_docente_fk` (`id_docente`);

ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`cedula`);

ALTER TABLE `periodo_academico`
  ADD PRIMARY KEY (`id_periodo_academico`);