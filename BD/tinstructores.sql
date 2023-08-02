-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2023 a las 00:42:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senacba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinstructores`
--

CREATE TABLE `tinstructores` (
  `ID` int(5) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `area` text NOT NULL,
  `competencias` varchar(300) NOT NULL,
  `jornada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tinstructores`
--

INSERT INTO `tinstructores` (`ID`, `nombres`, `apellidos`, `especialidad`, `correo_electronico`, `imagen`, `telefono`, `descripcion`, `area`, `competencias`, `jornada`) VALUES
(1, 'Juan', 'Pérez', 'Contabilidad y Finanzas', 'juan.perez@example.com', 'img/guardada/profesor1.jpg', 1234567890, 'reconocido instructor especializado en contabilidad y finanzas. Con su amplio conocimiento y experiencia en el campo, brinda formación práctica y especializada a los estudiantes, ayudándoles a desarrollar habilidades sólidas en contabilidad y comprensión de los aspectos financieros de las organizaciones.', 'Contabilidad', '- Elaboración y análisis de estados financieros\r\n- Gestión de presupuestos y control de costos\r\n- Registros contables y conciliaciones bancarias', 'nocturna'),
(2, 'María', 'López', 'Desarrollo de Aplicaciones Web', 'maria.lopez@example.com', 'img/guardada/foto.webp', 2147483647, 'Con su amplia experiencia y sólidos conocimientos, se encarga de impartir formación práctica y orientada a proyectos, brindando a los estudiantes las habilidades necesarias para enfrentar los desafíos del análisis de software en la industria. Su enfoque pedagógico y compromiso con la excelencia académica la convierten en una valiosa integrante del equipo docente del SENA.', 'Análisis de Software', '- Análisis de requisitos y especificaciones de software\r\n- Diseño de interfaces de usuario intuitivas y atractivas\r\n- Implementación de pruebas de software y depuración de errores', 'mixta'),
(3, 'Carlos', 'Rodríguez', 'Gestión Empresarial', 'carlos.rodriguez@example.com', 'img/guardada/header.png', 2147483647, ' con amplia experiencia en administración de empresas y gestión. Su conocimiento profundo en estas áreas le permite impartir formación especializada y práctica a los estudiantes, brindándoles las habilidades necesarias para enfrentar los desafíos del entorno empresarial actual.', 'Administración de Empresas', '- Planificación y estrategia empresarial\r\n- Gestión financiera y control presupuestario\r\n- Análisis de mercado y estudios de viabilidad', 'mixta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tinstructores`
--
ALTER TABLE `tinstructores`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tinstructores`
--
ALTER TABLE `tinstructores`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
