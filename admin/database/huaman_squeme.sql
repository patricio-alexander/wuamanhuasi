-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2023 at 02:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patricio_huaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `arbol`
--

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

--
-- Dumping data for table `arbol`
--

INSERT INTO `arbol` (`id_especie`, `id_ruta`, `id_registro`, `id_docente`, `id_arbol`, `descripcion`, `fecha_s`, `estado`) VALUES
(3, 2, 1, NULL, 25, 'editando', '2023-07-29 23:27:53', 'Saludable'),
(1, 2, 1, NULL, 26, 'hola                                              ', '2023-08-09 14:15:16', 'Saludable');

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`id_docente`, `nombre`, `apellido`, `telefono`, `correo`) VALUES
(1, 'Gino', 'Jimenez', '343434', 'gino@gmail.com'),
(2, 'katy', 'chuquimarca', '9999999999', 'katy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `especialidad` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `especialidad`) VALUES
(1, 'desarrollo de software');

-- --------------------------------------------------------

--
-- Table structure for table `especie`
--

CREATE TABLE `especie` (
  `id_especie` int(11) NOT NULL,
  `especie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `especie`
--

INSERT INTO `especie` (`id_especie`, `especie`) VALUES
(1, 'Pino'),
(2, 'Nispero'),
(3, 'Eucalipto');

-- --------------------------------------------------------

--
-- Table structure for table `estudiante`
--

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

INSERT INTO `estudiante` (`cedula`, `nombre`, `apellido`, `telefono`, `correo`, `foto_perfil`) VALUES
(1106011420, 'patricio', 'briceno', '923242334', 'pato@gmail.com', 'imagenFotoPato.jpg'),
(1106011421, 'Alex', 'Sarango', '2687655', 'alex@gmail.com', 'alex-1112303434.jpg'),
(1106011425, 'Diego', 'Merino', '2687655', 'merino@gmail.com', 'merino-1112f34.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fichero`
--

CREATE TABLE `fichero` (
  `id_fichero` int(10) NOT NULL,
  `id_administrador` int(10) NOT NULL DEFAULT 0,
  `id_docente` int(10) NOT NULL DEFAULT 0,
  `id_estudiante` int(11) NOT NULL DEFAULT 0,
  `nombre` varchar(250) NOT NULL,
  `ruta` varchar(250) NOT NULL DEFAULT '/var/www/ficheros/',
  `descripcion` text NOT NULL,
  `tipo` text NOT NULL DEFAULT '-',
  `estado` varchar(20) NOT NULL DEFAULT 'ACTIVO',
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fichero`
--

INSERT INTO `fichero` (`id_fichero`, `id_administrador`, `id_docente`, `id_estudiante`, `nombre`, `ruta`, `descripcion`, `tipo`, `estado`, `fecha`) VALUES
(1, 1103313811, 0, 0, '149261691538920.pdf', '/var/www/ficheros/', 'a', '-', 'ACTIVO', '2023-08-08 18:55:20'),
(2, 1103313811, 0, 0, '113541691539110.pdf', '/var/www/ficheros/', 'a', '-', 'ACTIVO', '2023-08-08 18:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_arbol` int(11) DEFAULT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periodo_academico`
--

CREATE TABLE `periodo_academico` (
  `id_periodo_academico` int(11) NOT NULL,
  `nombre_ac` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periodo_academico`
--

INSERT INTO `periodo_academico` (`id_periodo_academico`, `nombre_ac`) VALUES
(1, 'abr-sept 2023');

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE `registro` (
  `cedula` int(11) DEFAULT NULL,
  `id_registro` int(11) NOT NULL,
  `id_periodo_academico` int(11) DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`cedula`, `id_registro`, `id_periodo_academico`, `id_especialidad`) VALUES
(1106011420, 1, 1, 1),
(1106011425, 3, 1, 1),
(1106011421, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ruta`
--

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `nombre_ruta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `nombre_ruta`) VALUES
(1, 'Ruta los olives'),
(2, 'Ruta Nispero'),
(3, 'Ruta eucalito'),
(33, 'Ruta robles');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(5) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `tipo`, `nombre`, `apellidos`) VALUES
(1, '1106011420', '$2y$10$RGKhVdJiOewKOZMVd4f2LOWZOfZGCac12Wefua2WaMfMICJf0g5ka', 'DOCENTE', 'pato', 'Briceno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arbol`
--
ALTER TABLE `arbol`
  ADD PRIMARY KEY (`id_arbol`),
  ADD KEY `id_especie_fk` (`id_especie`),
  ADD KEY `id_ruta_fk` (`id_ruta`),
  ADD KEY `id_registro_fk` (`id_registro`),
  ADD KEY `id_docente_fk` (`id_docente`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indexes for table `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indexes for table `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id_especie`);

--
-- Indexes for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `fichero`
--
ALTER TABLE `fichero`
  ADD PRIMARY KEY (`id_fichero`);

--
-- Indexes for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `id_arbol_fk` (`id_arbol`);

--
-- Indexes for table `periodo_academico`
--
ALTER TABLE `periodo_academico`
  ADD PRIMARY KEY (`id_periodo_academico`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `cedula_fk` (`cedula`),
  ADD KEY `id_periodo_fk` (`id_periodo_academico`),
  ADD KEY `id_especialidad_fk` (`id_especialidad`);

--
-- Indexes for table `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arbol`
--
ALTER TABLE `arbol`
  MODIFY `id_arbol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `especie`
--
ALTER TABLE `especie`
  MODIFY `id_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fichero`
--
ALTER TABLE `fichero`
  MODIFY `id_fichero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periodo_academico`
--
ALTER TABLE `periodo_academico`
  MODIFY `id_periodo_academico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arbol`
--
ALTER TABLE `arbol`
  ADD CONSTRAINT `id_docente_fk` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`),
  ADD CONSTRAINT `id_especie_fk` FOREIGN KEY (`id_especie`) REFERENCES `especie` (`id_especie`),
  ADD CONSTRAINT `id_registro_fk` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id_registro`),
  ADD CONSTRAINT `id_ruta_fk` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`);

--
-- Constraints for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `id_arbol_fk` FOREIGN KEY (`id_arbol`) REFERENCES `arbol` (`id_arbol`);

--
-- Constraints for table `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `cedula_fk` FOREIGN KEY (`cedula`) REFERENCES `estudiante` (`cedula`),
  ADD CONSTRAINT `id_especialidad_fk` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`),
  ADD CONSTRAINT `id_periodo_fk` FOREIGN KEY (`id_periodo_academico`) REFERENCES `periodo_academico` (`id_periodo_academico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
