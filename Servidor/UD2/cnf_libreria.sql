-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-11-2023 a las 08:16:53
-- Versión del servidor: 8.0.34-0ubuntu0.22.04.1
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cnf_libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int NOT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Ficción'),
(2, 'Terror'),
(3, 'Novela'),
(4, 'Cómic'),
(5, 'Historia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `autor` varchar(40) NOT NULL,
  `id_categoria` int DEFAULT NULL,
  `precio` decimal(5,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `id_categoria`, `precio`) VALUES
(1, 'Harry Potter y la piedra filosofal', 'JK Rowling', 1, 15),
(2, 'Harry Potter y la cámara secreta', 'JK Rowling', 1, NULL),
(3, 'El ocho', 'Katherin Neville', 1, 10),
(4, 'Wonder Woman', 'William Moulton', 4, 10),
(5, 'Alicia en el país de las maravillas', 'Lewis Carroll', 3, 11),
(6, 'Los pilares de la tierra', 'Ken Follett', 5, 12),
(7, 'El alquimista', 'Paolo Coelho', 3, NULL),
(8, 'El fuego', 'Katherin Neville', 1, 10),
(9, 'La clave está en Rebeca', 'Ken Follett', 1, 8),
(10, 'Secretos', 'Paolo Coelho', 1, 11),
(11, 'Harry Potter y el prisionero de Azkabán', 'JK Rowling', 1, 15),
(12, 'Harry Potter y el cáliz de fuego', 'JK Rowling', 1, 16);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
