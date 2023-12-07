-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2023 a las 01:24:30
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de datos: `bd_tec_55`
--
-- Elimina la base de datos si existe
DROP DATABASE IF EXISTS bd_tec_55;

-- Crea la base de datos
CREATE DATABASE bd_tec_55;

-- Selecciona la base de datos recién creada
USE bd_tec_55;

-- --------------------------------------------------------
-- Elimina las tablas si existen
DROP TABLE IF EXISTS `administrador`;

DROP TABLE IF EXISTS `ficha`;

--
-- Estructura de tabla para la tabla `administrador`
--
CREATE TABLE `administrador` (
  `id_admin` int(5) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(10) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--
INSERT INTO
  `administrador` (`id_admin`, `nombres`, `usuario`, `contraseña`)
VALUES
  (1, 'Angelo', 'angelo', '0honey0515');

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `ficha`
--
CREATE TABLE `ficha` (
  `id_ficha` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `fotoA` longblob DEFAULT NULL,
  `curp` varchar(100) DEFAULT NULL,
  `genero` varchar(11) DEFAULT NULL,
  `fecha_n` date DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `est_nacimiento` varchar(50) DEFAULT NULL,
  `est_nac_cd` varchar(50) DEFAULT NULL,
  `cp` int(10) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `n_in_ext` varchar(50) DEFAULT NULL,
  `nombre_pmt` varchar(50) DEFAULT NULL,
  `pmt_apellidoP` varchar(50) DEFAULT NULL,
  `pmt_apellidoM` varchar(50) DEFAULT NULL,
  `pmt_fecha_nacim` date DEFAULT NULL,
  `pmt_nacionalidad` varchar(50) DEFAULT NULL,
  `pmt_est_naci` varchar(50) DEFAULT NULL,
  `pmt_cd_naci` varchar(50) DEFAULT NULL,
  `n_primaria` varchar(100) DEFAULT NULL,
  `p_estado` varchar(50) DEFAULT NULL,
  `p_ciudad` varchar(50) DEFAULT NULL,
  `p_direccion` varchar(50) DEFAULT NULL,
  `promedio` decimal(10, 2) DEFAULT NULL,
  `ultima_boleta` longblob DEFAULT NULL,
  `costo_ficha` int(10) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ficha`
--
INSERT INTO
  `ficha` (
    `id_ficha`,
    `nombres`,
    `apellidoP`,
    `apellidoM`,
    `fotoA`,
    `curp`,
    `genero`,
    `fecha_n`,
    `nacionalidad`,
    `est_nacimiento`,
    `est_nac_cd`,
    `cp`,
    `estado`,
    `ciudad`,
    `calle`,
    `colonia`,
    `n_in_ext`,
    `nombre_pmt`,
    `pmt_apellidoP`,
    `pmt_apellidoM`,
    `pmt_fecha_nacim`,
    `pmt_nacionalidad`,
    `pmt_est_naci`,
    `pmt_cd_naci`,
    `n_primaria`,
    `p_estado`,
    `p_ciudad`,
    `p_direccion`,
    `promedio`,
    `ultima_boleta`,
    `costo_ficha`
  )
VALUES
  (
    1,
    'Angel Eduardo',
    'Cisneros',
    'Ortega',
    0x576861747341707020496d61676520323032332d31312d313420617420392e32392e323720504d2e6a706567,
    'CIOA060705HCHSRNA0',
    'Masculino',
    '2006-07-05',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    32695,
    'Chihuahua',
    'Juarez',
    'Praderas de eucalipto #8641-7',
    'Praderas de los alamos',
    '86417',
    'Rigoberto',
    'Cisneros',
    'Reyes',
    '1978-09-27',
    'Americana',
    '',
    '',
    'Tlacaelel',
    'Chihuahua',
    'Juarez',
    'Tlacaelel',
    8.40,
    0x2e2e2f626f6c657461732f62746e626b312e706e67,
    1400
  ),
  (
    2,
    'Sergio Uziel ',
    'Paez',
    'Rivas',
    0x323032322d31302d3037202831292e706e67,
    'PARS060317HCHZVRA1',
    'Masculino',
    '2006-03-17',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    32674,
    'Chihuahua',
    'juarez',
    'eligio pasten',
    'Oasis',
    '1804',
    'Sergio Martin',
    'Paez',
    'Flores',
    '1982-10-08',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    'Libertad',
    'Chihuahua',
    'Juarez',
    'liberrad',
    10.00,
    0x2e2e2f626f6c657461732f323032322d31302d3037202832292e706e67,
    1400
  ),
  (
    3,
    'Gael Alberto',
    'Molina',
    'Nuñez',
    0x576861747341707020496d61676520323032332d31302d32342061742031302e30392e303720414d2e6a706567,
    'MONG060320HCHLXLA4',
    'Masculino',
    '2006-03-20',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    32690,
    'Chihuahua',
    'juarez',
    'Cañaveral',
    'El Granjero',
    '6282',
    'Ana Rosa',
    'Nuñez ',
    'Alvarez',
    '1982-07-26',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    'Esc. Primaria America',
    'Chihuahua',
    'Juarez',
    'Jilotepec',
    9.00,
    0x2e2e2f626f6c657461732f576861747341707020496d61676520323032332d31302d32342061742031302e30392e303720414d2e6a706567,
    1400
  ),
  (
    4,
    'Veronica',
    'ruiz',
    'avila',
    0x57494e5f32303232303230315f30385f31305f34335f50726f2e6a7067,
    'RUAV060823MCHZVRA2',
    'Femenino',
    '2006-08-23',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    32680,
    'Chihuahua',
    'Juarez',
    'Ghana',
    'oasis sur',
    '6427',
    'Veronica ',
    'Ruiz',
    'Avila',
    '1980-08-12',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    'fernando ahuatzin reyes',
    'Chihuahua',
    'juarez',
    'nose',
    10.00,
    0x2e2e2f626f6c657461732f57494e5f32303233313132335f31325f32305f30395f50726f2e6a7067,
    1400
  ),
  (
    6,
    'Haydee Esmeralda',
    'Jimenez',
    'Guevara',
    0x57494e5f32303233313132335f31325f32325f32365f50726f2e6a7067,
    'JIGHMNEMVYA4A34H67J',
    'Femenino',
    '2006-02-07',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    32699,
    'Chihuahua',
    'Juarez',
    'Guinea',
    'Infonavit Tecnologico',
    '7405',
    'Michelle',
    'Guevara',
    'Gonzalez',
    '1982-04-23',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    'Rafael Ramirez',
    'Chihuahua',
    'Juarez',
    'Africa #7432',
    9.80,
    0x2e2e2f626f6c657461732f57494e5f32303233313132335f31325f32325f30385f50726f2e6a7067,
    1400
  ),
  (
    7,
    'Elmer Fabian',
    'Melendez',
    'Moreno',
    0x57494e5f32303233313132335f31325f34375f34315f50726f2e6a7067,
    'MEMEO60729HCHLRLA6',
    'Masculino',
    '2006-07-29',
    'Mexicana',
    'Chihuahua',
    'Ciudad Juarez',
    32699,
    'Chihuahua',
    'Juarez',
    'Leales de Oaxaca',
    'Casas Grandes',
    '2908',
    'Javier',
    'Melendez',
    'Zaragoza',
    '1982-04-16',
    'Mexicana',
    'Zacatecas',
    'Juarez',
    'Hector Manuel Muela Reyes',
    'Chihuahua',
    'Juarez',
    '1',
    8.50,
    0x2e2e2f626f6c657461732f57494e5f32303233313132335f31325f34375f33375f50726f2e6a7067,
    1400
  ),
  (
    8,
    'Angel',
    'Cisneros',
    'Ortega',
    0x57494e5f32303233313132335f31325f32325f30385f50726f2e6a7067,
    'CIOA060705HCHSRNA1',
    'Masculino',
    '2006-07-05',
    'Mexicana',
    'Chihuahua',
    'Juarez',
    32695,
    'Chihuahua',
    'Juarez',
    'Praderas de eucalipto #8641-7',
    'Praderas de los alamos',
    '86417',
    'Rigoberto',
    'Cisneros',
    'Reyes',
    '1978-09-27',
    'Mexicana',
    'Durango',
    'Durango',
    'Tlacaelel',
    'Chihuahua',
    'Juarez',
    'Tlacaelel',
    9.40,
    0x2e2e2f626f6c657461732f57494e5f32303233313132335f31325f32325f31315f50726f2e6a7067,
    1400
  );

--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `administrador`
--
ALTER TABLE
  `administrador`
ADD
  PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE
  `ficha`
ADD
  PRIMARY KEY (`id_ficha`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE
  `administrador`
MODIFY
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE
  `ficha`
MODIFY
  `id_ficha` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;