-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-05-2017 a las 15:11:10
-- Versión del servidor: 5.6.35-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `buscapension`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `id_favorito` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `pension_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_favorito`),
  KEY `favoritos_usuario_id_foreign` (`usuario_id`),
  KEY `favoritos_pension_id_foreign` (`pension_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id_favorito`, `usuario_id`, `pension_id`, `created_at`, `updated_at`) VALUES
(43, 11, 38, NULL, NULL),
(45, 9, 38, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `pension_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imagenes_usuario_id_foreign` (`usuario_id`),
  KEY `imagenes_pension_id_foreign` (`pension_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `imagen`, `usuario_id`, `pension_id`, `created_at`, `updated_at`) VALUES
(68, '30_01_2017_03_31_15IMG_0109.JPG', NULL, 38, '2017-01-30 06:31:16', '2017-01-30 06:31:16'),
(69, '30_01_2017_03_31_16IMG_0110.JPG', NULL, 38, '2017-01-30 06:31:16', '2017-01-30 06:31:16'),
(70, '30_01_2017_03_31_16IMG_0112.JPG', NULL, 38, '2017-01-30 06:31:17', '2017-01-30 06:31:17'),
(71, '30_01_2017_03_31_1729CBC296-E141-42F6-B236-AA302541C5A7.JPG', NULL, 38, '2017-01-30 06:31:17', '2017-01-30 06:31:17'),
(72, '30_01_2017_03_31_176CCD8443-997D-4937-B1DF-3F9F39E17585.JPG', NULL, 38, '2017-01-30 06:31:17', '2017-01-30 06:31:17'),
(73, '30_01_2017_03_31_17IMG_1016.JPG', NULL, 38, '2017-01-30 06:31:17', '2017-01-30 06:31:17'),
(77, '01_02_2017_05_59_2714440903_10154076416746871_2913074628632315103_n.jpg', NULL, 42, '2017-02-01 08:59:27', '2017-02-01 08:59:27'),
(78, '01_02_2017_05_59_2714495521_10154076416756871_8150610889859693255_n.jpg', NULL, 42, '2017-02-01 08:59:27', '2017-02-01 08:59:27'),
(79, '01_02_2017_05_59_2714449864_10154076416741871_8599121011125927246_n.jpg', NULL, 42, '2017-02-01 08:59:27', '2017-02-01 08:59:27'),
(80, '04_02_2017_06_10_52pension.jpeg', NULL, 43, '2017-02-04 13:10:55', '2017-02-04 13:10:55'),
(81, '04_02_2017_06_10_55pension2.jpeg', NULL, 43, '2017-02-04 13:10:55', '2017-02-04 13:10:55'),
(82, '04_02_2017_06_10_55pension3.jpeg', NULL, 43, '2017-02-04 13:10:55', '2017-02-04 13:10:55'),
(83, '04_02_2017_06_10_55WhatsApp Image 2017-02-02 at 20.21.44.jpeg', NULL, 43, '2017-02-04 13:10:56', '2017-02-04 13:10:56'),
(89, '05_02_2017_18_31_0916523478_10211983261886782_442153699_o.jpg', NULL, 44, '2017-02-06 01:31:09', '2017-02-06 01:31:09'),
(90, '05_02_2017_18_31_0916522220_10211983261606775_431239928_o.jpg', NULL, 44, '2017-02-06 01:31:09', '2017-02-06 01:31:09'),
(91, '05_02_2017_18_31_0916492305_10211983261486772_2060308993_o.jpg', NULL, 44, '2017-02-06 01:31:09', '2017-02-06 01:31:09'),
(92, '05_02_2017_18_31_0916523113_10211983260806755_1998653978_o.jpg', NULL, 44, '2017-02-06 01:31:09', '2017-02-06 01:31:09'),
(93, '05_02_2017_18_31_0916507588_10211983260326743_1825430812_n.jpg', NULL, 44, '2017-02-06 01:31:09', '2017-02-06 01:31:09'),
(94, '14_03_2017_01_45_44IMG_8048.JPG', NULL, 45, '2017-03-14 08:45:44', '2017-03-14 08:45:44'),
(95, '14_03_2017_01_45_44IMG_8050.JPG', NULL, 45, '2017-03-14 08:45:44', '2017-03-14 08:45:44'),
(96, '14_03_2017_01_45_44IMG_8505.JPG', NULL, 45, '2017-03-14 08:45:44', '2017-03-14 08:45:44'),
(97, '14_03_2017_01_45_44IMG_7971.JPG', NULL, 45, '2017-03-14 08:45:44', '2017-03-14 08:45:44'),
(98, '14_03_2017_01_45_44IMG_8507.JPG', NULL, 45, '2017-03-14 08:45:44', '2017-03-14 08:45:44'),
(99, '14_03_2017_01_45_44IMG_8051.JPG', NULL, 45, '2017-03-14 08:45:45', '2017-03-14 08:45:45'),
(100, '14_03_2017_01_45_45IMG_7969.JPG', NULL, 45, '2017-03-14 08:45:45', '2017-03-14 08:45:45'),
(101, '14_03_2017_01_45_45IMG_0607.JPG', NULL, 45, '2017-03-14 08:45:45', '2017-03-14 08:45:45'),
(102, '14_03_2017_01_45_45IMG_0608.JPG', NULL, 45, '2017-03-14 08:45:45', '2017-03-14 08:45:45'),
(103, '14_03_2017_01_45_45IMG_0609.JPG', NULL, 45, '2017-03-14 08:45:45', '2017-03-14 08:45:45'),
(104, '14_03_2017_01_45_45IMG_0610.JPG', NULL, 45, '2017-03-14 08:45:45', '2017-03-14 08:45:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_01_04_025738_create_usuarios_table', 1),
(3, '2017_01_04_025751_create_pensiones_table', 1),
(4, '2017_01_04_025805_create_imagenes_table', 1),
(5, '2017_01_17_030421_create_favoritos_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensiones`
--

CREATE TABLE IF NOT EXISTS `pensiones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL,
  `telefone` text COLLATE utf8_unicode_ci NOT NULL,
  `direction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rules` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alone` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `near` text COLLATE utf8_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `visits` int(11) NOT NULL DEFAULT '0',
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pensiones_usuario_id_foreign` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `pensiones`
--

INSERT INTO `pensiones` (`id`, `title`, `description`, `price`, `telefone`, `direction`, `rules`, `city`, `country`, `alone`, `near`, `latitude`, `longitude`, `visits`, `usuario_id`, `created_at`, `updated_at`) VALUES
(38, 'Excelente Habitación ', 'Hermosa habitación, excelente zona, todos los servicios, amoblado y con un ambiente acogedor', '500,000', '3014123842', 'carrera 42 a2 ', '', 'Barranquilla', NULL, 'ambas', '', NULL, NULL, 161, 17, '2017-01-30 06:31:15', '2017-05-27 00:49:56'),
(42, 'Habitación x cupo', 'A una cuadra de la Universidad del Magdalena, servicios incluidos', '280,000', '3015517567', 'Calle 29H3 21D1-56', 'No es casa de familía, no hay reglas. Aseo compartido.', 'Santa Marta', NULL, 'compartida', 'Universidad Del Magdalena', 11.2253729, -74.19009609999999, 203, 18, '2017-02-01 08:59:27', '2017-05-27 04:01:24'),
(43, 'Habitación por cupo', 'Aire Acondicionado, Tv Cable, Wifi, Lavado de ropa, Alimentación opcional.', '300,000', '3045336862', 'Calle 29j #21D-78', 'Reglas de convivencia. secar el piso cuando se bañan, si salen de los cuartos apagar el aire, ventiladores, focos, asegurar la puerta de la calle con llaves', 'Santa Marta', NULL, 'compartida', 'Tienda el Piñon # 2', 11.2257619, -74.188571, 82, 13, '2017-02-04 13:10:52', '2017-05-24 00:40:44'),
(44, 'Arriendo habitacion', 'Arriendo habitación individual $300.000, compartida $250.000 servicios incluidos, wifi y lavado en lavadora, acceso a cocina, área de estudio o trabajo. Opcional alimentación.', '250,000', '3012158536 - 3005558852', 'Calle 28 #30A - 31', 'Ambiente familiar.', 'Santa Marta', NULL, 'ambas', 'universidad del magdalena, ucc, sergio arboleda.', NULL, NULL, 324, 9, '2017-02-05 23:00:23', '2017-05-25 05:01:57'),
(45, 'Edificio Dimar', 'Comidas Habitaciones con Aire en apartamento totalmente amueblado, con circuito cerrado de Tv para garantizar seguridad ', '300,000', '3126918112', 'Calle 29 j número 21c-237', 'Si hay un manual de uso, convivencia, cuidado y seguridad', 'Santa Marta', NULL, 'compartida', 'Universidad del magdalena ', 11.2231557, -74.1897919, 69, 16, '2017-03-14 08:45:44', '2017-05-24 00:40:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `imagen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Hernan Castilla Quintero', 'hcastillaq@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/10358698_10201699046036176_5947009358173266085_n.jpg?oh=cf6687a5aa6522bb2feedda58648d1d8&oe=59AA991C', '$2y$10$EU/UGv10QAtefGTUb3Hf.eqZogPxIsZ2BqrU9yBytb0gBcrmeov.y', '9cGgGV12afpVfo495ZFSK4nR55nzaT2W2eKqZAK1UfszbpkXjG7AmiM4oTFE', '2017-01-25 18:37:19', '2017-05-22 03:52:09'),
(10, 'Rafael Ramirez', 'zgj62194@dsiay.com', 'https://fb-s-d-a.akamaihd.net/h-ak-xpf1/v/t1.0-1/p50x50/16195596_105334819979486_650039632996446714_n.jpg?oh=a3f0eda4d37fcda6d0112ee55073c824&oe=59222665&__gda__=1493700107_27c9b0cba459a9ff05ab177589b0341a', '$2y$10$w1svcX.TYPslQ0p2ZbwzyOU2e7j9MW3m8xwkLBiqW0th1kXAULqyi', NULL, '2017-01-25 18:56:56', '2017-01-25 18:56:56'),
(11, 'Yesselis Lopez Batista', 'yeselis97-@hotmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12800109_1009255099133368_2365144085975140075_n.jpg?oh=c9cabe2ac3ce2923041dfc632c3daaf1&oe=5903DABE', '$2y$10$THQn8arFVnEpNrsFedqYWeV5StZr5PJOAMpBXagdwfUMNDdLVqS3y', NULL, '2017-01-25 20:04:00', '2017-02-01 07:00:35'),
(12, 'Miller De Jesús Meriño Miranda', 'millermemi@hotmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/14568249_1063086700475389_1483949096050954050_n.jpg?oh=2993420e6f5127c7d01e116f7f3a1f7b&oe=594103DA', '$2y$10$AGYHB6ujwXjEYd5qrk9CEefl1uUNNvYjHfvx1aGAHrw6m7jAAyg1q', NULL, '2017-01-25 20:50:17', '2017-02-21 21:12:32'),
(13, 'Rubén Carrascal', 'krrskl97@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/16806780_1270192633067966_8859904358032021718_n.jpg?oh=a0f45bc02bb8fbf5b642a3736a04bc8f&oe=5972DC3E', '$2y$10$hZvf3JeSweTtGU6ypNz0POL8jOampNcZRm6qbFmO5Nw.GZW6i4bWK', NULL, '2017-01-26 18:43:38', '2017-03-19 03:23:01'),
(14, 'Samantha Brown', 'karlam16@latinmail.com', 'https://fb-s-d-a.akamaihd.net/h-ak-xta1/v/t1.0-1/p50x50/15337667_104403620051910_8930619821874096095_n.jpg?oh=50347ba8c3d61ad0887ec4eb83cad004&oe=591B4820&__gda__=1494022871_9e5fe09c1c8de640db4d94c0b79ebd80', '$2y$10$W8kL8UnQNrDnt8WyUnaYzex.74r/hS8g7xIeU9wMuNwIVmtfp91ly', NULL, '2017-01-26 19:22:52', '2017-01-26 19:22:52'),
(15, 'Rubén Carrascal Ruiz', 'carrascalruben2@gmail.com', 'https://fb-s-d-a.akamaihd.net/h-ak-xpt1/v/t1.0-1/c0.0.50.50/p50x50/14516596_306988423002607_9184764397211896490_n.jpg?oh=c2609539396a2e167f3e073aa4c44267&oe=590A5B63&__gda__=1493258777_ba0466234de810ed4e618cc329b22d0d', '$2y$10$Tc3s/3ZKcLIMZ/pHiOOj3OAGjcSYBsyo/V2MGV5Vc9GETk8p48J4a', NULL, '2017-01-28 20:11:01', '2017-01-29 06:06:20'),
(16, 'Diana Margarita Amaya Ripoll', 'dianamargaritaar@gmail.com', 'https://fb-s-b-a.akamaihd.net/h-ak-xft1/v/t1.0-1/p50x50/14358971_10209583688244200_7730304839874670318_n.jpg?oh=2cff41a59e9e2553c1cf2a3c6cc5efa6&oe=5927079A&__gda__=1496206514_c6f046f950a75edf21afb1075a77b2b0', '$2y$10$F/lITk7Nsvp264e9wtSsEe9NyMLxaDOhaH0sybh6gvr4oGM2G9RN.', NULL, '2017-01-30 03:59:57', '2017-03-14 08:35:31'),
(17, 'Julieth Castilla', 'juliethc_14@hotmail.com', 'https://fb-s-c-a.akamaihd.net/h-ak-xfp1/v/t1.0-1/p50x50/15894650_10154941437209704_3186493043190919409_n.jpg?oh=bacaff2a1d928873de75c51b6a7c734d&oe=5908CC5C&__gda__=1493768278_3ee208f421681bc9a7c76e35c03d7016', '$2y$10$riVRz/TiRHpm2uR9valC7u9RmTIA6/RPsk7CXgelLGHBRRyKhPfY6', NULL, '2017-01-30 06:24:55', '2017-01-30 06:24:55'),
(18, 'Luis Miguel Mendoza Rada', 'luism1821@hotmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/14671325_10154091742112945_2672194662193178190_n.jpg?oh=e1f85429ea686d489cde2c9488975ee0&oe=5907D749', '$2y$10$75Rh.Npvr.1juW10fE5IEOz7ySlztxyXrdRrL4wcx4R.ekJvO9Enu', NULL, '2017-02-01 08:54:07', '2017-02-01 08:54:07'),
(19, 'Jeison Marin Marin', 'jeisonm70@hotmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/15326563_10211282095184630_6956345658322048105_n.jpg?oh=f146e3dbdc7919e5a5161520055f43f1&oe=59169175', '$2y$10$u7R0JlcqnZ3bCpQFzrp3tezwQs8mGjbsN.x9oOGtxhIxStIkdni1q', NULL, '2017-02-02 02:55:57', '2017-02-02 02:55:57'),
(20, 'Lize Miranda', '', 'https://scontent.fbog1-1.fna.fbcdn.net/v/t1.0-1/p50x50/17884396_10210917537628314_4375027807510450247_n.jpg?oh=9086727814a7b2a40d4d13de8ddd3905&oe=59802D31', '$2y$10$5tB21T5q0ow6ZCtay1zGNeSOSBa5v0dq5cBrttDoPkx3JpeVC4QMm', NULL, '2017-02-05 22:21:33', '2017-05-13 13:46:37'),
(21, 'Andrés Aguirre', 'jaideraguirre.r@hotmail.com', 'https://fb-s-b-a.akamaihd.net/h-ak-xlf1/v/t1.0-1/p50x50/16195562_1263192830439224_1832415204571635058_n.jpg?oh=89b0f5bb8996c9865a6ad1c2c9d13ea5&oe=590BB1BB&__gda__=1497120020_3a3c23448c9a769e329b1e2af8a6d53d', '$2y$10$84pK1KE/UQ0j/F1ifSIio.OyKebal6QaSJRwY6lS0ZcWX2xknlMxe', NULL, '2017-02-08 05:14:10', '2017-02-08 05:14:10'),
(22, 'Yelena Medina Medina', 'medinayele@gmail.com', 'https://scontent.feoh1-1.fna.fbcdn.net/v/t1.0-1/p50x50/15826587_10211187921311460_7642500699277023410_n.jpg?_nc_eui2=v1%3AAeFgqDptrQJfgfLYx7WSQirAeX7xipEJEyoJEqzN-QbGLVzvdIbuTtux5jM4UshjCgvbf_tbhspHcZNw09zzbgsTD9a9d6PZwLerBWVul8r8oeO8v79u6WXEBiMGyzwuTMo&oh=fa742bf4eb296d176d825a200f4d4fee&oe=593D18C3', '$2y$10$XOr2T1qky.Q4RubdM3gyCOH6Y4YCKYJExGtJNfaLrgEa23qxaJOm.', NULL, '2017-02-09 01:26:42', '2017-02-09 01:26:42'),
(23, 'Angely Perez Pimienta', 'angely_87_@hotmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12239734_10153728590031252_855013141646193369_n.jpg?_nc_eui2=v1%3AAeHq1uEWiOj6qzM_M_grXsl6pq_o0uOX77jvvADma6lWoH-LCo2xWGcxCdjWTnORCoFdtfbyuhX5BwLdVAxXzE9DQUOMEsQ1SfGzjsVYob2mSA&oh=4789260cab8c505ea34866e2ea548214&oe=59034706', '$2y$10$vSmTGdVo4ydV.etRfe70.eDlIZ91jXJFm.MUPOKaQfsjpFEUWvclq', NULL, '2017-02-09 12:07:46', '2017-02-09 12:07:46'),
(24, 'Federico Guillermo Grünwaldt Rueda', 'fi.o26@hotmail.com', 'https://fb-s-c-a.akamaihd.net/h-ak-xpt1/v/t1.0-1/p50x50/16003051_10155768254374863_4764989001057996414_n.jpg?oh=2c375c146235ed32b7d069576a8dd6e9&oe=59352C8A&__gda__=1499819670_24d9eca8f10c70f6ea801b6a3955cca0', '$2y$10$HCkEQSHoRV1b/Ins5X5Bb.2OyPzkETCmDT0quPLfSzSD4TxnU69G6', 'u70S7QDZt4uB7OgLC91fWGsUmIpSxBFEWSnzKuAxTWP7KacO8NrQRRrSzmws', '2017-02-16 04:56:15', '2017-03-07 07:06:25'),
(25, 'Yolanda Rivas', 'yolanda-1999@hotmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/14344935_1158059124251243_6773262904498824650_n.jpg?oh=5194c62fa34329c1a08d6d1d2666d15c&oe=58FDAFD0', '$2y$10$EmWZ4ScbWGLinJyeV32P9eid6vYk0lwMP22p.o9TPUiXqoIuF7Dae', NULL, '2017-02-20 23:50:54', '2017-02-20 23:50:54'),
(26, 'Keysy Jael Mendoza Nieto', 'keisymendo_23@hotmail.com', 'https://fb-s-c-a.akamaihd.net/h-ak-xtp1/v/t1.0-1/p50x50/14369959_10209523249415590_1789986507588955227_n.jpg?oh=b7cbd607dbf465fc28c9e4a5f0fd6d52&oe=5941676D&__gda__=1497205952_bdaab8ad0d9a69f9435ee4257a0a40fc', '$2y$10$6jMZulyxdX2YtLZ2TwEILuxmPH.EPuI.zRf1OG9Mt7PM4IPv0LQiC', NULL, '2017-02-28 00:13:41', '2017-02-28 00:13:41'),
(27, 'Andres Felipe', 'fvalgi@hotmail.com', 'https://scontent.feoh4-1.fna.fbcdn.net/v/t1.0-1/p50x50/15747476_10211323196334026_3539363517410707575_n.jpg?_nc_eui2=v1%3AAeG7zt18WOJ9fOuFv2nxEFJxv7OFfVSblS70PZlJTQeh8Lb1IrD-fJorGsW3dj_gKoSNusj6GQfARRc32lel2ApU6JyV4wLL3y7M2kU_wmxVoTjeLAOxkg8EDAIo37bNjpA&oh=9b30f1d6b0c3713f423d9f732185458d&oe=59725C30', '$2y$10$FMLuRNcRCwJQxG2Mlv74eu8QaR1ohKp2TfYSCOQW.CdqQ7/wqv0H2', NULL, '2017-03-06 11:02:30', '2017-03-06 21:14:42'),
(28, 'Yexiid Sanchexx Ramoxx', 'sanchez_yesid@hotmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c0.17.50.50/p50x50/13770369_10206157698402180_3709741977401486606_n.jpg?oh=918d473e2bc4a995e331829e9f4ae73d&oe=59389EB0', '$2y$10$pPOmu65ysVTRnSf4Sd9Oie47BIM8RN6CAB7jZou6XfXRj/dJgJ5ue', NULL, '2017-03-07 08:58:24', '2017-03-07 08:58:24'),
(29, 'Alex Ivan Bornachera', 'buenivan_1994@hotmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13178761_10154128392090987_3889129562252910790_n.jpg?oh=3787956f86e0235f985a6b8a62018597&oe=59396CB9', '$2y$10$MTaf.OvZPdPMGi6nwY3re.DFW29DP9qcpQwnNkzNOOoOu3oGpI68u', NULL, '2017-03-07 09:08:42', '2017-03-07 09:08:42'),
(30, 'Kevin David Castellar Ulloa', 'kevindcu@hotmail.com', 'https://fb-s-c-a.akamaihd.net/h-ak-xtp1/v/t1.0-1/p50x50/15698039_1256683447729544_2375707994088763825_n.jpg?oh=a976c0163aacdf620a02bbbfcd1d9765&oe=59328912&__gda__=1499413502_7fc161f48c51757123a65095f051fd31', '$2y$10$W4XRtZG1nCw.K5E36n27O.iVAwbApznAXNd0XoXdE3JPWOVWD8bQS', NULL, '2017-03-10 04:24:20', '2017-03-11 22:47:52'),
(31, 'Miguel Angel Sampayo', 'miguel.a_trak@live.com', 'https://scontent.feoh1-1.fna.fbcdn.net/v/t1.0-1/p50x50/17098292_10155176448685559_5351302854580967711_n.jpg?_nc_eui2=v1%3AAeFcfFIDoBmOhPPv6Sir9_WmdmizwoCPzcBQdXDC3rL1ObdU14DvQ_EcTyzQUtLHAJL4LtGjVsrtgI_xQpy1-laYjOP6RrRDUmKzU85uAy4vZw&oh=05d81159c7c6857a0116406343689a71&oe=596A0038', '$2y$10$pXr8sTDuz/ktl/mG0ZqvOe9ASDxtSVguVf/PJIgMboW3itCZlJmzS', NULL, '2017-03-10 09:40:51', '2017-03-10 09:40:51'),
(32, 'Jeal Djesús Obispo', 'jeal_1416@hotmail.com', 'https://fb-s-d-a.akamaihd.net/h-ak-xta1/v/t1.0-1/p50x50/16114674_10202749146926298_3355794660953682274_n.jpg?oh=6034813f2ddfd843639f863982b02188&oe=592D06C1&__gda__=1496043150_e27fca5bc53b70d05ba89c9d451c2216', '$2y$10$CrRjq6457r/.ZeYAuW6zGuFt9hxXFilI3L9WcDdJDnqjvlS/0r9wu', 'M6AD2vd8eBqZBpxsKfwaOrB1yZVtH3VkgBiZR3RzojfojykRPPZpkgkDZvpY', '2017-03-13 09:05:59', '2017-03-13 09:09:01'),
(33, 'Cindy Paola', 'tejedacindy86@gmail.com', 'https://scontent.fctg1-2.fna.fbcdn.net/v/t1.0-1/p50x50/16681921_339484923112574_4392775860033915723_n.jpg?oh=6fdd0936f001eea27ef512f09b070d58&oe=59705DCC', '$2y$10$t/xHft5B74Y3zI/1gQGdo.7mKwNm/l77uj9iBFV6CQEsGVgsFgISy', NULL, '2017-03-24 01:49:10', '2017-03-24 01:49:10'),
(34, 'Marimar Carpio Carrillo', 'mary1416_2011@hotmail.com', 'https://scontent.fctg1-2.fna.fbcdn.net/v/t1.0-1/p50x50/17309774_1457023264372814_7145355086341381961_n.jpg?oh=280f85ae83dfec31d6368733aa27973b&oe=59685C39', '$2y$10$AU/24qN8IQ8pvLECHTbhZ.auQxcQTJuZ4VNsYkWbAbdhBzK84c8X2', NULL, '2017-04-01 01:21:22', '2017-04-01 01:21:22'),
(35, 'Jorge Castillo', 'maestroneil05@gmail.com', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/14068099_1784351391812023_531790741250669220_n.jpg?oh=12b50b28ed801a9b81632bae5c157ac9&oe=59757988', '$2y$10$F0WpPUoo0ncSQeP9Y1TWC.1yzOMLmrMxquWHhWwaVe6ZiNDl8xf1y', NULL, '2017-04-25 02:01:27', '2017-04-25 02:01:27'),
(36, 'Jose Altamar', 'ijoralmopro@gmail.com', 'https://fb-s-d-a.akamaihd.net/h-ak-fbx/v/t1.0-1/p50x50/18034370_210431882784231_5981426140384598597_n.jpg?oh=e36431e6155e923cb6cbccf237697979&oe=59B11744&__gda__=1504895091_3b20ad99b9bfc0958d8099e1ab140d08', '$2y$10$HjlSyEYFHThNGueVtKtbse6d96PEz8dSPXyZNzGYCQVYeDsPOLWIG', NULL, '2017-05-25 04:29:07', '2017-05-27 04:01:20');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_pension_id_foreign` FOREIGN KEY (`pension_id`) REFERENCES `pensiones` (`id`),
  ADD CONSTRAINT `favoritos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_pension_id_foreign` FOREIGN KEY (`pension_id`) REFERENCES `pensiones` (`id`),
  ADD CONSTRAINT `imagenes_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pensiones`
--
ALTER TABLE `pensiones`
  ADD CONSTRAINT `pensiones_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
