-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2024 a las 17:17:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `donaciondb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE `alimento` (
  `IDAlimento` int(11) NOT NULL,
  `IDDonacion` int(11) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Tipo` enum('No perecedero','Perecedero') DEFAULT 'No perecedero',
  `Cantidad` int(11) DEFAULT NULL,
  `FechaVencimiento` date DEFAULT NULL,
  `Detalles` text DEFAULT NULL,
  `TemperaturaAlmacenamiento` varchar(50) DEFAULT NULL,
  `EstadoCalidad` enum('Excelente','Bueno','Regular','Malo') DEFAULT 'Excelente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `IDContenido` int(11) NOT NULL,
  `IDAdministrador` int(11) DEFAULT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `TituloContenido` varchar(255) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Contenido` text DEFAULT NULL,
  `FechaPublicacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`IDContenido`, `IDAdministrador`, `Titulo`, `TituloContenido`, `Descripcion`, `Contenido`, `FechaPublicacion`) VALUES
(1, 1, 'Consejos para voluntarios', 'Cómo ser un voluntario eficaz', 'En este artículo encontrarás consejos útiles para mejorar tu experiencia como voluntario.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...', '2023-03-01 10:00:00'),
(2, 1, 'Historias de donación', 'La historia de Juan y su labor como donante', 'Conoce la historia de Juan, un donante comprometido que ha cambiado la vida de muchas personas con sus acciones.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...', '2023-04-05 15:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE `donacion` (
  `IDDonacion` int(11) NOT NULL,
  `IDDonante` int(11) DEFAULT NULL,
  `FechaDonacion` date DEFAULT NULL,
  `Estado` enum('Pendiente','Aceptada','Rechazada') DEFAULT 'Pendiente',
  `TipoDeDonacion` enum('Producto','Alimento','Producto y Alimento','Servicio') DEFAULT 'Producto',
  `IDSolicitud` int(11) DEFAULT NULL,
  `ImagenDonacion` varchar(255) DEFAULT NULL,
  `EstadoDonacion` enum('Pendiente','Entregada','Cancelada') DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donacion`
--

INSERT INTO `donacion` (`IDDonacion`, `IDDonante`, `FechaDonacion`, `Estado`, `TipoDeDonacion`, `IDSolicitud`, `ImagenDonacion`, `EstadoDonacion`) VALUES
(10, 1, '2023-03-15', 'Aceptada', 'Producto', 17, 'imagen1.jpg', 'Pendiente'),
(11, 1, '2023-04-20', 'Aceptada', 'Alimento', 18, 'imagen2.jpg', 'Entregada'),
(13, 1, '2023-05-02', 'Rechazada', 'Producto', 17, 'imag', 'Cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donante`
--

CREATE TABLE `donante` (
  `IDDonante` int(11) NOT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  `Tipo` enum('Organizacion','PersonaNatural') NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `NumeroTelefono` varchar(20) DEFAULT NULL,
  `CorreoElectronico` varchar(100) DEFAULT NULL,
  `SitioWeb` varchar(100) DEFAULT NULL,
  `OtrosDetalles` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donante`
--

INSERT INTO `donante` (`IDDonante`, `IDUsuario`, `Tipo`, `Nombre`, `Direccion`, `Ciudad`, `NumeroTelefono`, `CorreoElectronico`, `SitioWeb`, `OtrosDetalles`) VALUES
(1, 1, 'PersonaNatural', 'Juan Perez', 'Calle 123', 'Ciudad A', '123456789', 'juan@example.com', 'www.juanperez.com', 'Otros detalles de Juan Perez Donante'),
(2, 2, 'Organizacion', 'Fundación María', 'Avenida Principal', 'Ciudad B', '987654321', 'maria@example.com', 'www.fundacionmaria.org', 'Otros detalles de Fundación María'),
(5, 29, '', 'admin', '', '', NULL, 'admin@mail.com', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregadedonacion`
--

CREATE TABLE `entregadedonacion` (
  `IDEntrega` int(11) NOT NULL,
  `IDDonacion` int(11) DEFAULT NULL,
  `IDSolicitud` int(11) DEFAULT NULL,
  `FechaHoraEntrega` datetime DEFAULT NULL,
  `ConformidadEntrega` enum('Satisfactoria','Pendiente','Insatisfactoria') DEFAULT 'Pendiente',
  `Observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `IDMensaje` int(11) NOT NULL,
  `Remitente` int(11) DEFAULT NULL,
  `Destinatario` int(11) DEFAULT NULL,
  `Asunto` varchar(255) DEFAULT NULL,
  `Contenido` text DEFAULT NULL,
  `FechaHoraEnvio` datetime DEFAULT NULL,
  `Leido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`IDMensaje`, `Remitente`, `Destinatario`, `Asunto`, `Contenido`, `FechaHoraEnvio`, `Leido`) VALUES
(1, 1, 2, 'Gracias por la colaboración', 'Hola María, queríamos agradecerte por tu donación. ¡Fue de gran ayuda para nuestra fundación!', '2023-03-16 10:00:00', 1),
(2, 2, 1, 'Confirmación de entrega', 'Hola Juan, te confirmamos que recibimos tu donación de juguetes. ¡Muchas gracias!', '2023-04-20 14:00:00', 1),
(3, 10, 11, 'Ofrecimiento de ayuda', 'Hola Laura, me gustaría ofrecerte mi ayuda como voluntario en tu organización. ¿Cómo puedo colaborar?', '2023-05-12 08:30:00', 1),
(4, 11, 10, 'Confirmación de disponibilidad', 'Hola Carlos, ¡gracias por tu ofrecimiento! Te contactaremos para coordinar tu participación como voluntario.', '2023-05-12 09:00:00', 1),
(5, 10, 11, 'Ofrecimiento de ayuda', 'Hola Laura, me gustaría ofrecerte mi ayuda como voluntario en tu organización. ¿Cómo puedo colaborar?', '2023-05-12 08:30:00', 1),
(6, 11, 10, 'Confirmación de disponibilidad', 'Hola Carlos, ¡gracias por tu ofrecimiento! Te contactaremos para coordinar tu participación como voluntario.', '2023-05-12 09:00:00', 1),
(7, 10, 11, 'Ofrecimiento de ayuda', 'Hola Laura, me gustaría ofrecerte mi ayuda como voluntario en tu organización. ¿Cómo puedo colaborar?', '2023-05-12 08:30:00', 1),
(8, 11, 10, 'Confirmación de disponibilidad', 'Hola Carlos, ¡gracias por tu ofrecimiento! Te contactaremos para coordinar tu participación como voluntario.', '2023-05-12 09:00:00', 1),
(9, 10, 11, 'Ofrecimiento de ayuda', 'Hola Laura, me gustaría ofrecerte mi ayuda como voluntario en tu organización. ¿Cómo puedo colaborar?', '2023-05-12 08:30:00', 1),
(10, 11, 10, 'Confirmación de disponibilidad', 'Hola Carlos, ¡gracias por tu ofrecimiento! Te contactaremos para coordinar tu participación como voluntario.', '2023-05-12 09:00:00', 1),
(11, 10, 11, 'Ofrecimiento de ayuda', 'Hola Laura, me gustaría ofrecerte mi ayuda como voluntario en tu organización. ¿Cómo puedo colaborar?', '2023-05-12 08:30:00', 1),
(12, 11, 10, 'Confirmación de disponibilidad', 'Hola Carlos, ¡gracias por tu ofrecimiento! Te contactaremos para coordinar tu participación como voluntario.', '2023-05-12 09:00:00', 1),
(13, 10, 11, 'Ofrecimiento de ayuda', 'Hola Laura, me gustaría ofrecerte mi ayuda como voluntario en tu organización. ¿Cómo puedo colaborar?', '2023-05-12 08:30:00', 1),
(14, 11, 10, 'Confirmación de disponibilidad', 'Hola Carlos, ¡gracias por tu ofrecimiento! Te contactaremos para coordinar tu participación como voluntario.', '2023-05-12 09:00:00', 1),
(17, 31, 3, 'Confirmación de disponibilidad', 'Hola Laura, me gustaría ofrecerte mi ayuda como voluntario en tu organización. ¿Cómo puedo colaborar?', '2024-04-07 22:53:51', 0),
(18, 31, 2, 'Ayuda', NULL, '2024-04-07 23:17:47', 0),
(19, 31, 2, 'Entrega', 'puedes llamarme mi numero es 7777', '2024-04-07 23:19:25', 0),
(20, 31, 2, 'administracion', 'hola un gusto saludarlo', '2024-04-07 23:23:57', 0),
(23, 2, 1, 'entrega ', 'buenos dias ', '2024-04-09 11:03:12', 0),
(26, 2, 1, 'Hola', 'hola', '2024-04-09 11:11:07', 0),
(27, 2, 31, 'hola', 'hola\r\n', '2024-04-09 11:22:29', 0),
(28, 1, 2, 'hola', 'hola', '2024-04-09 11:41:50', 0),
(29, 31, 3, 'aaaa', 'aaa', '2024-04-09 12:26:55', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacionvoluntario`
--

CREATE TABLE `participacionvoluntario` (
  `IDParticipacion` int(11) NOT NULL,
  `IDVoluntario` int(11) DEFAULT NULL,
  `IDDonacion` int(11) DEFAULT NULL,
  `TipoOperacion` enum('Recojo','Entrega') DEFAULT 'Recojo',
  `FechaHora` datetime DEFAULT NULL,
  `CantidadColaboradores` int(11) DEFAULT NULL,
  `ConformidadEntrega` enum('Satisfactoria','Pendiente','Insatisfactoria') DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participacionvoluntario`
--

INSERT INTO `participacionvoluntario` (`IDParticipacion`, `IDVoluntario`, `IDDonacion`, `TipoOperacion`, `FechaHora`, `CantidadColaboradores`, `ConformidadEntrega`) VALUES
(10, 4, 10, 'Entrega', '2023-03-15 11:00:00', 5, 'Satisfactoria'),
(11, 4, 11, 'Recojo', '2023-04-20 12:00:00', 3, 'Satisfactoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulaciones`
--

CREATE TABLE `postulaciones` (
  `IDPostulacion` int(11) NOT NULL,
  `IDVoluntario` int(11) DEFAULT NULL,
  `TipoOperacion` enum('Recojo','Entrega') DEFAULT 'Recojo',
  `IDSolicitud` int(11) DEFAULT NULL,
  `FechaPostulacion` datetime DEFAULT NULL,
  `EstadoPostulacion` enum('Pendiente','Aceptada','Rechazada') DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `postulaciones`
--

INSERT INTO `postulaciones` (`IDPostulacion`, `IDVoluntario`, `TipoOperacion`, `IDSolicitud`, `FechaPostulacion`, `EstadoPostulacion`) VALUES
(2, 4, 'Entrega', 17, '2023-03-16 09:30:00', 'Aceptada'),
(3, 4, 'Recojo', 18, '2023-04-21 10:00:00', 'Rechazada'),
(4, 5, 'Recojo', 17, '2024-04-07 22:05:55', 'Aceptada'),
(5, 5, 'Entrega', 18, '2024-04-07 22:06:00', 'Aceptada'),
(6, 5, 'Recojo', 32, '2024-04-09 12:26:22', 'Aceptada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IDProductoDonado` int(11) NOT NULL,
  `IDDonacion` int(11) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Marca` varchar(100) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receptor`
--

CREATE TABLE `receptor` (
  `IDReceptor` int(11) NOT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  `Tipo` enum('Organizacion','PersonaNatural') NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `NumeroTelefono` varchar(20) DEFAULT NULL,
  `CorreoElectronico` varchar(100) DEFAULT NULL,
  `SitioWeb` varchar(100) DEFAULT NULL,
  `OtrosDetalles` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `receptor`
--

INSERT INTO `receptor` (`IDReceptor`, `IDUsuario`, `Tipo`, `Nombre`, `Direccion`, `Ciudad`, `NumeroTelefono`, `CorreoElectronico`, `SitioWeb`, `OtrosDetalles`) VALUES
(1, 2, 'PersonaNatural', 'Maria Gomez', 'Calle 456', 'Ciudad A', '987654321', 'maria@example.com', 'www.mariagomez.org', 'Otros detalles de Maria Gomez Receptor'),
(2, 3, 'Organizacion', 'Asociación Pedro', 'Avenida Secundaria', 'Ciudad C', '456789012', 'pedro@example.com', 'www.asociacionpedro.com', 'Otros detalles de Asociación Pedro'),
(3, 2, 'PersonaNatural', 'Maria Gomez', 'Calle 456', 'Ciudad A', '987654321', 'maria@example.com', 'www.mariagomez.org', 'Otros detalles de Maria Gomez Receptor'),
(4, 3, 'Organizacion', 'Asociación Pedro', 'Avenida Secundaria', 'Ciudad C', '456789012', 'pedro@example.com', 'www.asociacionpedro.com', 'Otros detalles de Asociación Pedro'),
(5, 2, 'PersonaNatural', 'Maria Gomez', 'Calle 456', 'Ciudad A', '987654321', 'maria@example.com', 'www.mariagomez.org', 'Otros detalles de Maria Gomez Receptor'),
(6, 3, 'Organizacion', 'Asociación Pedro', 'Avenida Secundaria', 'Ciudad C', '456789012', 'pedro@example.com', 'www.asociacionpedro.com', 'Otros detalles de Asociación Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicituddedonacion`
--

CREATE TABLE `solicituddedonacion` (
  `IDSolicitud` int(11) NOT NULL,
  `IDReceptor` int(11) DEFAULT NULL,
  `FechaSolicitud` date DEFAULT NULL,
  `EstadoSolicitud` enum('Pendiente','Aceptada','Rechazada') DEFAULT 'Pendiente',
  `Cantidad` int(11) DEFAULT NULL,
  `DescripcionNecesidad` text DEFAULT NULL,
  `Prioridad` enum('Alta','Media','Baja') DEFAULT 'Media',
  `FechaLimiteEntrega` date DEFAULT NULL,
  `InstruccionesEntrega` text DEFAULT NULL,
  `ConfirmacionRecepcion` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicituddedonacion`
--

INSERT INTO `solicituddedonacion` (`IDSolicitud`, `IDReceptor`, `FechaSolicitud`, `EstadoSolicitud`, `Cantidad`, `DescripcionNecesidad`, `Prioridad`, `FechaLimiteEntrega`, `InstruccionesEntrega`, `ConfirmacionRecepcion`) VALUES
(17, 6, '2023-05-10', 'Aceptada', 100, 'Necesitamos alimentos no perecederos para nuestra comunidad.', 'Alta', '2023-05-31', 'Entregar en la dirección indicada', 0),
(18, 5, '2023-06-15', 'Aceptada', 50, 'Ropa para adultos y niños en situación de vulnerabilidad.', 'Alta', '2023-06-30', 'Entregar en la dirección especificada', 0),
(30, 4, '2024-04-04', 'Pendiente', 15, 'Se necesitan materiales de construcción para reparar una escuela rural.', 'Media', '2024-04-18', 'Entregar en la escuela ubicada en la aldea El Rosario, de lunes a viernes de 9:00 a 13:00.', 0),
(31, 5, '2024-04-03', 'Rechazada', 30, 'Se solicitaba un vehículo para transportar donaciones.', 'Alta', '2024-04-08', 'No se proporcionaron instrucciones de entrega.', 0),
(32, 6, '2024-04-02', 'Aceptada', 5, 'Se necesitan libros de texto para niños de primaria.', 'Media', '2024-04-14', 'Entregar en la biblioteca pública ubicada en la Plaza Mayor, de lunes a sábado de 10:00 a 22:00.', 0),
(33, 2, '2024-04-01', 'Pendiente', 25, 'Se necesitan juguetes para una campaña navideña.', 'Alta', '2024-12-24', 'Entregar en la juguetería ubicada en la Avenida del Progreso 123, de lunes a sábado de 9:00 a 20:00.', 0),
(34, 1, '2024-03-31', 'Pendiente', 1000, 'Se necesita ayuda financiera para cubrir los gastos médicos de un paciente con cáncer.', 'Alta', '2024-04-15', 'Se puede realizar una donación en efectivo en la cuenta bancaria número 1234567890.', 0),
(35, 2, '2024-03-30', 'Aceptada', 50, 'Se necesitan voluntarios para pintar una casa de ancianos.', 'Media', '2024-04-10', 'Presentarse en la casa de ancianos ubicada en la Calle de la Esperanza 456, de lunes a viernes de 9:00 a 17:00.', 0),
(36, 3, '2024-03-29', 'Rechazada', 20, 'Se solicitaba un equipo de sonido para un evento cultural.', 'Media', '2024-04-05', 'No se proporcionaron instrucciones de entrega.', 0),
(37, 4, '2024-03-28', 'Pendiente', 150, 'Se necesitan alimentos y agua potable para las víctimas de un desastre natural.', 'Alta', '2024-04-12', 'Entregar en el centro de acopio ubicado en la Calle Mayor 123, de lunes a domingo de 8:00 a 20:00.', 0),
(38, 5, '2024-03-27', 'Aceptada', 10, 'Se necesitan kits de higiene personal para personas en situación de calle.', 'Media', '2024-04-14', 'Entregar en el refugio ubicado en la Calle del Sol 456, de lunes a viernes de 10:00 a 17:00.', 0),
(39, 6, '2024-03-26', 'Pendiente', 3, 'Se necesita un traductor para una entrevista con un refugiado.', 'Alta', '2024-04-08', 'Contactar con la organización a través del correo electrónico info@organizacion.com.', 0),
(40, 2, '2024-03-25', 'Rechazada', 2, 'Se solicitaba un perro guía para una persona con discapacidad visual.', 'Alta', '2024-04-05', 'No se proporcionaron instrucciones de entrega.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDUsuario` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Usuario` varchar(255) DEFAULT NULL,
  `CorreoElectronico` varchar(100) DEFAULT NULL,
  `Contrasena` varchar(100) DEFAULT NULL,
  `Rol` enum('Administrador','Donante','Receptor','Voluntario') DEFAULT 'Voluntario',
  `Habilitado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDUsuario`, `Nombre`, `Usuario`, `CorreoElectronico`, `Contrasena`, `Rol`, `Habilitado`) VALUES
(1, 'Juan', 'juan', 'juan@example.com', '$2y$10$caAQ/HL.aiYbrVJgHg4JGeM5qSqFeGiOyrhx//F39HFqR5SeT52FC', 'Donante', 1),
(2, 'Maria', 'Gomez', 'maria@example.com', '$2y$10$UKcHPDGzdeP9aJDqT9.Jc.jK6IA6lhjIH8sV6VAr6u6YSckuvXfle', 'Receptor', 1),
(3, 'Pedro', 'Lopez', 'pedro@example.com', '$2y$10$LXjOWGJboSylQwY1vP23Mek4fM1s2jlnIcTvU3F.g8vnue1OU5ITq', 'Voluntario', 1),
(10, 'Ana', 'Martinez', 'ana@example.com', '$2y$10$3lYxVUBsLZ0iqKcmmQBfJePTI4dWaL/iQuxUULRbkQBRnkJNJeLgG', 'Donante', 1),
(11, 'Carlos', 'Garcia', 'carlos@example.com', '$2y$10$4n2I3QoCZXS7hOip2XiqleYNWaiWdrXfpA1yPUk.kbNunn5RSjXsC', 'Receptor', 1),
(12, 'Laura', 'Rodriguez', 'laura@example.com', '$2y$10$p4Y/0xkv3UHQ4u6f9dBNW.B9XmeYkPtddmu5whVQrXndXX/Dq9Koe', 'Voluntario', 1),
(13, 'Sofia', 'sofia', 'sofia@example.com', '$2y$10$RZiRaLvEdQAlY6S/gnmpDO67ZM43fhF0A2mGCoJRKJTFQ1zsYCklK', 'Donante', 1),
(14, 'Jorge', 'Sanchez', 'jorge@example.com', '$2y$10$h0bjopJX29nNb2w85ZnsoO88HeAkzeZdOP3U4Iopi66j4YXZqazIi', 'Receptor', 1),
(15, 'Elena', 'Fernandez', 'elena@example.com', '$2y$10$Y7mjtfs1hAI6B/npPO2/Keo73HRIxJhQSKvJBohk4.yOSTaTHxBmy', 'Voluntario', 1),
(29, 'admin', 'admin', 'admin@mail.com', '$2y$10$N5QzGhMrB.ECWw0QnL3yu.vAhVyh0ak2g6Sy1M9ngVkQMt.J/l7gK', 'Administrador', 1),
(30, 'Voluntario', 'voluntario', 'voluntario@mail.com', '$2y$10$ZQRwn5Si9FXu4Dl/Z8fH7e16PmdaL1ayXlgaO8VQl6eX7FUZpyw.W', 'Voluntario', 1),
(31, 'vol', 'vol', 'vol@mail.com', '$2y$10$lh1qYRbeQ.zpwv6dGxZYUOGsIW0uWuHtx1IbOmNgwVNELfDNdjKi.', 'Voluntario', 1),
(32, 'vol1', 'vol1', 'vol1@mail.com', '$2y$10$9OxcAEULXCTgmjq5CTSPsuj/5MtR6bCgChbTHE7bGu1j4B9zIaqc6', 'Voluntario', 1),
(44, 'Nil', 'nil', 'n@mail.com', '$2y$10$rvR1bF9f9UxjbG7UgcF1beShxgi8GMEpZMqNNBHIVjE7.S.IgWZzG', 'Administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario`
--

CREATE TABLE `voluntario` (
  `IDVoluntario` int(11) NOT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  `ExperienciaLaboral` text DEFAULT NULL,
  `Habilidades` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `voluntario`
--

INSERT INTO `voluntario` (`IDVoluntario`, `IDUsuario`, `ExperienciaLaboral`, `Habilidades`) VALUES
(1, 3, 'Experiencia previa en trabajos voluntarios en organizaciones sin fines de lucro.', 'Trabajo en equipo, liderazgo, comunicación'),
(2, 3, 'Experiencia previa en trabajos voluntarios en organizaciones sin fines de lucro.', 'Trabajo en equipo, liderazgo, comunicación'),
(4, 30, 'voluntario', 'voluntario'),
(5, 31, 'vol', 'vol'),
(6, 32, 'a', 'a'),
(11, 44, 'ninguno', 'ninguno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`IDAlimento`),
  ADD KEY `IDDonacion` (`IDDonacion`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`IDContenido`),
  ADD KEY `IDAdministrador` (`IDAdministrador`);

--
-- Indices de la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`IDDonacion`),
  ADD KEY `IDDonante` (`IDDonante`),
  ADD KEY `IDSolicitud` (`IDSolicitud`);

--
-- Indices de la tabla `donante`
--
ALTER TABLE `donante`
  ADD PRIMARY KEY (`IDDonante`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Indices de la tabla `entregadedonacion`
--
ALTER TABLE `entregadedonacion`
  ADD PRIMARY KEY (`IDEntrega`),
  ADD KEY `IDDonacion` (`IDDonacion`),
  ADD KEY `IDSolicitud` (`IDSolicitud`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`IDMensaje`),
  ADD KEY `Remitente` (`Remitente`),
  ADD KEY `Destinatario` (`Destinatario`);

--
-- Indices de la tabla `participacionvoluntario`
--
ALTER TABLE `participacionvoluntario`
  ADD PRIMARY KEY (`IDParticipacion`),
  ADD KEY `IDVoluntario` (`IDVoluntario`),
  ADD KEY `IDDonacion` (`IDDonacion`);

--
-- Indices de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  ADD PRIMARY KEY (`IDPostulacion`),
  ADD KEY `IDVoluntario` (`IDVoluntario`),
  ADD KEY `IDSolicitud` (`IDSolicitud`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IDProductoDonado`),
  ADD KEY `IDDonacion` (`IDDonacion`);

--
-- Indices de la tabla `receptor`
--
ALTER TABLE `receptor`
  ADD PRIMARY KEY (`IDReceptor`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Indices de la tabla `solicituddedonacion`
--
ALTER TABLE `solicituddedonacion`
  ADD PRIMARY KEY (`IDSolicitud`),
  ADD KEY `IDReceptor` (`IDReceptor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUsuario`),
  ADD UNIQUE KEY `CorreoElectronico` (`CorreoElectronico`);

--
-- Indices de la tabla `voluntario`
--
ALTER TABLE `voluntario`
  ADD PRIMARY KEY (`IDVoluntario`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimento`
--
ALTER TABLE `alimento`
  MODIFY `IDAlimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `IDContenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `donacion`
--
ALTER TABLE `donacion`
  MODIFY `IDDonacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `donante`
--
ALTER TABLE `donante`
  MODIFY `IDDonante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `entregadedonacion`
--
ALTER TABLE `entregadedonacion`
  MODIFY `IDEntrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `IDMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `participacionvoluntario`
--
ALTER TABLE `participacionvoluntario`
  MODIFY `IDParticipacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  MODIFY `IDPostulacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IDProductoDonado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `receptor`
--
ALTER TABLE `receptor`
  MODIFY `IDReceptor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `solicituddedonacion`
--
ALTER TABLE `solicituddedonacion`
  MODIFY `IDSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `voluntario`
--
ALTER TABLE `voluntario`
  MODIFY `IDVoluntario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD CONSTRAINT `alimento_ibfk_1` FOREIGN KEY (`IDDonacion`) REFERENCES `donacion` (`IDDonacion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`IDAdministrador`) REFERENCES `usuario` (`IDUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD CONSTRAINT `donacion_ibfk_1` FOREIGN KEY (`IDDonante`) REFERENCES `donante` (`IDDonante`) ON DELETE CASCADE,
  ADD CONSTRAINT `donacion_ibfk_2` FOREIGN KEY (`IDSolicitud`) REFERENCES `solicituddedonacion` (`IDSolicitud`) ON DELETE CASCADE;

--
-- Filtros para la tabla `donante`
--
ALTER TABLE `donante`
  ADD CONSTRAINT `donante_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuario` (`IDUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entregadedonacion`
--
ALTER TABLE `entregadedonacion`
  ADD CONSTRAINT `entregadedonacion_ibfk_1` FOREIGN KEY (`IDDonacion`) REFERENCES `donacion` (`IDDonacion`) ON DELETE CASCADE,
  ADD CONSTRAINT `entregadedonacion_ibfk_2` FOREIGN KEY (`IDSolicitud`) REFERENCES `solicituddedonacion` (`IDSolicitud`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`Remitente`) REFERENCES `usuario` (`IDUsuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`Destinatario`) REFERENCES `usuario` (`IDUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `participacionvoluntario`
--
ALTER TABLE `participacionvoluntario`
  ADD CONSTRAINT `participacionvoluntario_ibfk_1` FOREIGN KEY (`IDVoluntario`) REFERENCES `voluntario` (`IDVoluntario`) ON DELETE CASCADE,
  ADD CONSTRAINT `participacionvoluntario_ibfk_2` FOREIGN KEY (`IDDonacion`) REFERENCES `donacion` (`IDDonacion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  ADD CONSTRAINT `postulaciones_ibfk_1` FOREIGN KEY (`IDVoluntario`) REFERENCES `voluntario` (`IDVoluntario`) ON DELETE CASCADE,
  ADD CONSTRAINT `postulaciones_ibfk_2` FOREIGN KEY (`IDSolicitud`) REFERENCES `solicituddedonacion` (`IDSolicitud`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IDDonacion`) REFERENCES `donacion` (`IDDonacion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `receptor`
--
ALTER TABLE `receptor`
  ADD CONSTRAINT `receptor_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuario` (`IDUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `solicituddedonacion`
--
ALTER TABLE `solicituddedonacion`
  ADD CONSTRAINT `solicituddedonacion_ibfk_1` FOREIGN KEY (`IDReceptor`) REFERENCES `receptor` (`IDReceptor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `voluntario`
--
ALTER TABLE `voluntario`
  ADD CONSTRAINT `voluntario_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuario` (`IDUsuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
