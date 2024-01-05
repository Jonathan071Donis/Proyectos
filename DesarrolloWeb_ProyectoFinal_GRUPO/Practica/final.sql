-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-10-2023 a las 16:24:02
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `icono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombreCategoria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estadoCategoria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fechaIngresoCategoria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fechaBajaCategoria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `icono`, `nombreCategoria`, `estadoCategoria`, `fechaIngresoCategoria`, `fechaBajaCategoria`) VALUES
(2, 'fa-laptop', 'vitaminas', 'Activo', '2023-10-28', '2023-11-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nit` int NOT NULL,
  `telefono` int NOT NULL,
  `fecha_ingreso` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_baja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `nombre`, `estado`, `imagen`, `direccion`, `nit`, `telefono`, `fecha_ingreso`, `fecha_baja`, `tipo_cliente`) VALUES
(4, 'Elvis', 'Activo', '1697860347_Rudy.jpg', 'Cuilapa', 1223442, 32263715, '2023-10-20', '2023-11-05', 'Especial'),
(5, 'pelsar Donis', 'Activo', '1698078051_pelsar.jpg', 'Sana Rosa de lima', 12345678, 12345678, '2023-09-29', '2025-11-23', 'Especial'),
(6, 'Walfred Donis', 'Inactivo', '1698078110_walfred.jpg', 'Nueva Santa Rosa', 12345678, 45678998, '2023-10-23', '2034-10-23', 'Especial'),
(7, 'pablo Monteroso', 'Activo', '1698078178_pablo.jpg', 'Nueva Santa Rosa', 12345678, 12345678, '2023-10-23', '2025-12-23', 'Especial'),
(8, 'Damaris', 'Activo', '1698079052_Damaris.jpg', 'Santa Rosa De lima', 12345678, 45678998, '2023-10-23', '2025-08-23', 'Especial'),
(9, 'Jareth', 'Activo', '1698079139_Gema.jpg', 'Nueva Santa rosa', 12345678, 12345678, '2023-11-04', '2027-12-23', 'Especial'),
(10, 'Katy^_~', 'Activo', '1698079152_katy.jpg', 'Nueva Santa Rosa', 12345678, 45678998, '2023-10-29', '2038-12-23', 'Potencial'),
(11, 'Maylin', 'Activo', '1698079161_Maylin.jpg', 'Nueva Santa Rosa', 12345678, 32263715, '2023-10-29', '2026-12-23', 'Especial'),
(13, 'Miguel', 'Activo', '1698594563_walfred.jpg', 'Nueva Santa Rosa', 9076543, 12345678, '2023-11-05', '2024-01-29', 'Especial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(20) COLLATE utf8mb3_bin NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `numero`, `fecha`) VALUES
(15, 'FAC1', '2023-10-28 16:27:05'),
(16, 'FAC16', '2023-10-28 16:41:16'),
(17, 'FAC17', '2023-10-28 17:07:13'),
(18, 'FAC17', '2023-10-28 17:07:35'),
(19, 'FAC19', '2023-10-28 22:02:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
CREATE TABLE IF NOT EXISTS `medicamentos` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcionMedicamentos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lote_Medicamentos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cantidadMedicamentso` int NOT NULL,
  `precioCompraMedicamentos` int NOT NULL,
  `precioVentaMedicamentos` int NOT NULL,
  `estadoMedicamentos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `proveedorMedicamentos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_ingreso` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_vencimiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `unidad_medida` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `numero_estanteria` int NOT NULL,
  `nivel_estanteria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `posicion_estanteria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`ID`, `imagen`, `descripcionMedicamentos`, `lote_Medicamentos`, `cantidadMedicamentso`, `precioCompraMedicamentos`, `precioVentaMedicamentos`, `estadoMedicamentos`, `proveedorMedicamentos`, `categoria`, `fecha_ingreso`, `fecha_vencimiento`, `unidad_medida`, `numero_estanteria`, `nivel_estanteria`, `posicion_estanteria`) VALUES
(3, '1698361582_puto (2).jpg', 'producto de calidad', 'AAA322', 71, 12, 16, 'Eficiente', 'Luis', 'aaa1', '2023-11-03', '2023-11-03', 'GR', 0, 'Derecha', 'al fondo a la izquierda'),
(4, '1698551786_R (1).jpg', 'Curas', 'A33', 20, 20, 25, 'Inactivo', 'Pharma', 'Antiinflamatorios', '2023-11-09', '2023-11-02', 'Tabletas', 1, '1', '1'),
(5, '1698551678_R.jpg', 'Proteína', 'A40', 50, 50, 55, 'Inactivo', 'Pharma', 'Antiinflamatorios', '2023-10-29', '2023-10-23', 'Oz (Onzas)', 1, '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `icono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ultimas_ventas_realizas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `productomas_vendidos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `productosProximos_vencer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `icono`, `nombre`, `descripcion`, `ultimas_ventas_realizas`, `productomas_vendidos`, `productosProximos_vencer`) VALUES
(11, 'fa fa-heart', 'Enalapril ', 'Ayuda para estar saludable', '2023-10-29', 'vitaminas', '2026-12-23'),
(9, 'fa fa-user-md', 'Vitaminas', 'Hidratacion', '2023-10-23', 'vitaminas', '2027-12-23'),
(10, 'fa fa-ambulance', 'sueros', 'Hidratacion', '2023-10-28', 'vitaminas', '2027-12-23'),
(12, 'fa fa-user-md', 'Acetaminfone', 'Analgesico', '2023-10-08', 'vitaminas', '2023-10-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_ingreso` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_baja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_proveedor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ID`, `nombre`, `imagen`, `estado`, `direccion`, `nit`, `telefono`, `fecha_ingreso`, `fecha_baja`, `tipo_proveedor`) VALUES
(2, 'Walfred Donis', '1698078867_mauri.jpg', 'Activo', 'Nueva Santa Rosa', '12345678', '45678998', '2023-10-26', '2025-12-23', 'Especial'),
(3, 'pelsar Donis', '1698079251_pelsar.jpg', 'Activo', 'Serinal Barberena ', '12345678', '12345678', '2023-10-27', '2024-12-23', 'Regular'),
(4, 'Jareth Hernandez', '1698079365_Gema.jpg', 'Activo', 'Nueva Santa Rosa', '1145897', '12345678', '2023-10-25', '2025-08-23', 'Especial'),
(5, 'Katy^_~', '1698079411_katy.jpg', 'Activo', 'Nueva Santa Rosa', '12345678', '12345678', '2023-10-29', '2025-11-23', 'Regular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_configuraciones`
--

DROP TABLE IF EXISTS `tbl_configuraciones`;
CREATE TABLE IF NOT EXISTS `tbl_configuraciones` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `nombreconfiguracion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_configuraciones`
--

INSERT INTO `tbl_configuraciones` (`ID`, `nombreconfiguracion`, `valor`) VALUES
(1, 'Titulo', 'BIENVENIDO A LA FARMACIA LOS MAISTROS'),
(3, 'SERVICES', 'LOS MAISTROS.'),
(4, 'PORTFOLIO', 'Empezar'),
(5, 'Clientes', '	#Productos'),
(6, 'OUR AMAZING TEAM', 'CONOCE NUSTROS PRODUCTOS.'),
(7, 'CONTACT US', 'Nuestros productos son de calidad, y eso hace la diferencia...'),
(8, 'link_tw', 'Clientes'),
(9, 'link_facebook', 'Nuestros Clientes'),
(10, 'link_linkedin', 'PROVEEDORES'),
(11, 'PORTFOLIO', 'Nuestros proveedores'),
(12, 'button', 'ahora solo faltas tu'),
(13, 'Equipo', 'Categoria'),
(14, 'Descripcion', 'Menú Categoría'),
(15, 'CONTACT US', 'Medicamentos'),
(16, 'ABOUT', 'Menu Medicamentos'),
(17, 'CONTACT US', 'Vista Productos'),
(18, 'ptio galactico', 'Conoce Nuestro Equipo de Trabajo'),
(19, 'PORTFOLIO', 'Nuestro personal cuenta con altos valores Éticos '),
(20, 'ABOUT', 'Puesdes registrate aqui'),
(21, 'SERVICES', 'https://www.facebook.com/joseli.barrera.9/'),
(22, 'ABOUT', 'https://www.facebook.com/joseli.barrera.9/'),
(23, 'PORTFOLIO', 'https://www.facebook.com/joseli.barrera.9/'),
(24, 'CONTACT US', 'https://www.facebook.com/joseli.barrera.9/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipo`
--

DROP TABLE IF EXISTS `tbl_equipo`;
CREATE TABLE IF NOT EXISTS `tbl_equipo` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombrecompleto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `puesto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `twiter` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_equipo`
--

INSERT INTO `tbl_equipo` (`ID`, `imagen`, `nombrecompleto`, `puesto`, `twiter`, `facebook`, `linkedin`) VALUES
(1, '1697338046_1.jpg', 'Jonathan Donis', 'Gerente informatica', 'https://www.facebook.com/joseli.barrera.', 'https://www.facebook.com/joseli.barrera.9/', 'https://www.facebook.com/joseli.barre'),
(3, '1697335653_3.jpg', 'Luis Herrera', 'Gerente informatica', 'https://www.facebook.com/joseli.barrera.9/', 'https://www.facebook.com/luisf.herreradonis', 'https://www.facebook.com/joseli.barrera.9/'),
(4, '1697335838_4.jpg', 'Rudy Reyes', 'Gerente informatica', 'https://www.facebook.com/rudyanselml.reyesmedina', 'https://www.facebook.com/rudyanselml.reyesmedina', 'https://www.linkedin.com/in/rudy-anselmo-reyes-medina-2580a2224?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app'),
(5, '1697335894_Fredy.jpg', 'Fredy Ernesto', 'Gerente informatica', 'https://www.facebook.com/Ernestoosoy', 'https://www.facebook.com/Ernestoosoy', 'https://www.facebook.com/Ernestoosoy'),
(6, '1697339392_mauri.jpg', 'Mauricio Mejia', 'Gerente informatica', 'https://www.facebook.com/rudyanselml.reyesmedina', 'https://www.facebook.com/rudyanselml.reyesmedina', 'https://www.facebook.com/Ernestoosoy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Rol` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`ID`, `usuario`, `password`, `correo`, `Rol`) VALUES
(1, 'JDonis071', '12345', 'jonathanbarrera03@gamil.ms', 'Administrador'),
(3, 'Mauricio', '123456', 'jonathanbarrera03@gamil.ms', 'Vendedor'),
(5, 'Luis', '123', 'luis@gmail.com', 'Analista'),
(6, 'Fredy', '123', 'fredy@gmail.com', 'Reciclador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `item` int NOT NULL AUTO_INCREMENT,
  `factura` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `cod_cliente` int DEFAULT NULL,
  `cliente` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `nit` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `descuento` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_de_pago` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  `cod_producto` int DEFAULT NULL,
  `producto` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `unidad` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`item`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `orden` int NOT NULL AUTO_INCREMENT,
  `factura` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `cod_cliente` int DEFAULT NULL,
  `cliente` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `nit` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `descuento` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_de_pago` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  `cod_producto` int DEFAULT NULL,
  `producto` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `unidad` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`orden`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`orden`, `factura`, `cod_cliente`, `cliente`, `nit`, `descuento`, `fecha`, `tipo_de_pago`, `cod_producto`, `producto`, `unidad`, `precio`, `cantidad`, `sub_total`, `iva`, `total`) VALUES
(20, 'FAC19', 4, 'Elvis', '34345345', '18.00', '2023-10-28', 'Tarjeta', 11, 'Enalapril ', 'Bolsa', '45.00', 2, '90.00', '10.80', '82.80'),
(21, 'FAC19', 4, 'Elvis', '34345345', '32.00', '2023-10-28', 'Tarjeta', 10, 'sueros', 'Litro', '40.00', 4, '160.00', '19.20', '147.20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
