-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-01-2018 a las 08:34:20
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 7.1.10-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `macetaslacioppa`
--
CREATE SCHEMA IF NOT EXISTS `macetaslacioppa` DEFAULT CHARACTER SET utf8 ;
USE `macetaslacioppa` ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT '/../storage/default.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Fibrocemento', 'fibrocemento', 'DSe', 'storage/categories/cat_img_1.png', '2018-01-16 02:20:42', '2018-01-18 05:14:19'),
(2, 'Cemento', 'cemento', '', 'storage/categories/cat_img_2.png', '2018-01-16 02:26:08', '2018-01-16 02:26:08'),
(3, 'Luminosas', 'luminosas', '', 'storage/categories/cat_img_3.png', '2018-01-16 02:28:24', '2018-01-16 02:28:24'),
(4, 'Plástico', 'plastico', '', 'storage/categories/cat_img_4.png', '2018-01-16 02:28:51', '2018-01-16 02:28:51'),
(5, 'Fibra de Vidrio', 'fibra-de-vidrio', '', 'storage/categories/cat_img_5.png', '2018-01-16 02:30:10', '2018-01-16 02:30:10'),
(6, 'Otros', 'otros', '', 'storage/categories/cat_img_6.png', '2018-01-16 03:08:36', '2018-01-16 03:08:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birth_date` date NOT NULL,
  `nationality` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `web` varchar(45) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `interest` varchar(45) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `job_applications` CHANGE `file_path` `file_path` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT '/../storage/default.jpg',
  `description` longtext,
  `public_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE  `news` DROP  `public_date` ;
ALTER TABLE  `news` ADD  `public_date` VARCHAR( 255 ) NULL AFTER  `description` ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(6, 1, 'Barril', 'barril', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae odio id lorem vestibulum accumsan quis et sapien. Mauris neque libero, euismod at molestie a, commodo at lectus. Duis id quam posuere, commodo risus quis, sagittis urna. Sed a sapien faucibus est tempor vulputate. In rhoncus venenatis est, at facilisis nisi varius et. Vivamus in feugiat leo, nec convallis nunc. Nullam a dictum nisl, ac dignissim odio. Mauris malesuada augue metus, sed maximus est dictum quis. Phasellus ac neque neque.\r\n\r\nNunc eros augue, venenatis sit amet rhoncus vitae, luctus a leo. Morbi tristique massa orci, quis malesuada sem bibendum et. Curabitur nec mauris ac magna tristique rhoncus. Donec enim dolor, maximus sit amet justo eu, eleifend sagittis lorem. Integer facilisis massa et orci tincidunt elementum. In ut suscipit orci. Pellentesque sit amet neque a nulla rutrum fringilla sed et mi. Nullam hendrerit risus ut tristique vestibulum. Quisque non risus quis tortor viverra laoreet sed nec dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam erat dolor, tincidunt in rhoncus eget, pellentesque convallis augue. Donec nulla turpis, viverra quis placerat vitae, fringilla quis augue. Duis ac hendrerit ante. Vivamus sit amet consequat massa. Nullam ut tortor                                                                ', '2018-01-18 06:31:32', '2018-01-18 08:27:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(45) DEFAULT ' 	/../storage/default.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(6, 6, 'storage/products/pro_img_6.jpg', '2018-01-18 06:31:33', '2018-01-18 06:31:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_measures`
--

CREATE TABLE `product_measures` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `measure` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product_measures`
--

INSERT INTO `product_measures` (`id`, `product_id`, `measure`, `created_at`, `updated_at`) VALUES
(11, 6, '00 x 00 x 00', '2018-01-18 06:32:28', '2018-01-18 06:32:28'),
(12, 6, ' 01 x 01 x 01', '2018-01-18 06:32:28', '2018-01-18 06:32:28'),
(14, 6, '02 x 02 x 01', '2018-01-18 08:22:41', '2018-01-18 08:22:41'),
(15, 6, ' 04 x 04 x 04', '2018-01-18 08:22:41', '2018-01-18 08:22:41'),
(16, 6, '05 x 05 x 05', '2018-01-18 08:22:41', '2018-01-18 08:22:41'),
(17, 6, '  01 x 01 x 01', '2018-01-18 08:27:36', '2018-01-18 08:27:36'),
(18, 6, ' 02 x 02 x 01', '2018-01-18 08:27:37', '2018-01-18 08:27:37'),
(19, 6, '  04 x 04 x 04', '2018-01-18 08:27:37', '2018-01-18 08:27:37'),
(20, 6, ' 05 x 05 x 05', '2018-01-18 08:27:37', '2018-01-18 08:27:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `image_path`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'storage/services/ser_img_1.jpg', '2018-01-18 03:24:19', NULL),
(2, NULL, NULL, 'storage/services/ser_img_2.jpg', '2018-01-18 03:24:19', NULL),
(3, NULL, NULL, 'storage/services/ser_img_3.jpg', '2018-01-18 03:24:19', NULL),
(4, NULL, NULL, 'storage/services/ser_img_4.jpg', '2018-01-18 03:24:19', NULL),
(5, NULL, NULL, 'storage/services/ser_img_5.jpg', '2018-01-18 03:24:19', NULL),
(6, NULL, NULL, 'storage/services/ser_img_6.jpg', '2018-01-18 03:24:19', NULL),
(7, NULL, NULL, 'storage/services/ser_img_7.jpg', '2018-01-18 03:24:19', NULL),
(8, NULL, NULL, 'storage/services/ser_img_8.jpg', '2018-01-18 03:24:19', NULL),
(9, NULL, NULL, 'storage/services/ser_img_9.jpg', '2018-01-18 03:24:19', NULL),
(10, NULL, NULL, 'storage/services/ser_img_10.jpg', '2018-01-18 03:24:19', NULL),
(11, NULL, NULL, 'storage/services/ser_img_11.jpg', '2018-01-18 03:24:19', NULL),
(12, NULL, NULL, 'storage/services/ser_img_12.jpg', '2018-01-18 03:24:19', NULL),
(13, NULL, NULL, 'storage/services/ser_img_13.jpg', '2018-01-18 03:24:19', NULL),
(14, NULL, NULL, 'storage/services/ser_img_14.jpg', '2018-01-18 03:24:19', NULL),
(15, NULL, NULL, 'storage/services/ser_img_15.jpg', '2018-01-18 03:24:19', NULL),
(16, NULL, NULL, 'storage/services/ser_img_16.jpg', '2018-01-18 03:24:19', NULL),
(17, NULL, NULL, 'storage/services/ser_img_17.jpg', '2018-01-18 03:24:19', NULL),
(18, NULL, NULL, 'storage/services/ser_img_18.jpg', '2018-01-18 03:24:19', NULL),
(19, NULL, NULL, 'storage/services/ser_img_19.jpg', '2018-01-18 03:24:19', NULL),
(20, NULL, NULL, 'storage/services/ser_img_20.jpg', '2018-01-18 03:24:19', NULL),
(21, NULL, NULL, 'storage/services/ser_img_21.jpg', '2018-01-18 03:24:19', NULL),
(22, NULL, NULL, 'storage/services/ser_img_22.jpg', '2018-01-18 03:24:19', NULL),
(23, NULL, NULL, 'storage/services/ser_img_23.jpg', '2018-01-18 03:24:19', NULL),
(24, NULL, NULL, 'storage/services/ser_img_24.jpg', '2018-01-18 03:24:19', NULL),
(25, NULL, NULL, 'storage/services/ser_img_25.jpg', '2018-01-18 03:24:19', NULL),
(26, NULL, NULL, 'storage/services/ser_img_26.jpg', '2018-01-18 03:24:19', NULL),
(27, NULL, NULL, 'storage/services/ser_img_27.jpg', '2018-01-18 03:24:19', NULL),
(28, NULL, NULL, 'storage/services/ser_img_28.jpg', '2018-01-18 03:24:19', NULL),
(29, NULL, NULL, 'storage/services/ser_img_29.jpg', '2018-01-18 03:24:19', NULL),
(30, NULL, NULL, 'storage/services/ser_img_30.jpg', '2018-01-18 03:24:19', NULL),
(31, NULL, NULL, 'storage/services/ser_img_31.jpg', '2018-01-18 03:24:19', NULL),
(32, NULL, NULL, 'storage/services/ser_img_32.jpg', '2018-01-18 03:24:19', NULL),
(33, NULL, NULL, 'storage/services/ser_img_33.jpg', '2018-01-18 03:24:19', NULL),
(34, NULL, NULL, 'storage/services/ser_img_34.jpg', '2018-01-18 03:24:19', NULL),
(35, NULL, NULL, 'storage/services/ser_img_35.jpg', '2018-01-18 03:24:19', NULL),
(36, NULL, NULL, 'storage/services/ser_img_36.jpg', '2018-01-18 03:24:19', NULL),
(37, NULL, NULL, 'storage/services/ser_img_37.jpg', '2018-01-18 03:24:19', NULL),
(38, NULL, NULL, 'storage/services/ser_img_38.jpg', '2018-01-18 03:24:19', NULL),
(39, NULL, NULL, 'storage/services/ser_img_39.jpg', '2018-01-18 03:24:19', NULL),
(40, NULL, NULL, 'storage/services/ser_img_40.jpg', '2018-01-18 03:24:19', NULL),
(41, NULL, NULL, 'storage/services/ser_img_41.jpg', '2018-01-18 03:24:19', NULL),
(42, NULL, NULL, 'storage/services/ser_img_42.jpg', '2018-01-18 03:24:19', NULL),
(43, NULL, NULL, 'storage/services/ser_img_43.jpg', '2018-01-18 03:24:19', NULL),
(44, NULL, NULL, 'storage/services/ser_img_44.jpg', '2018-01-18 03:24:19', NULL),
(45, NULL, NULL, 'storage/services/ser_img_45.jpg', '2018-01-18 03:24:19', NULL),
(46, NULL, NULL, 'storage/services/ser_img_46.jpg', '2018-01-18 03:24:19', NULL),
(47, NULL, NULL, 'storage/services/ser_img_47.jpg', '2018-01-18 03:24:19', NULL),
(48, NULL, NULL, 'storage/services/ser_img_48.jpg', '2018-01-18 03:24:19', NULL),
(49, NULL, NULL, 'storage/services/ser_img_49.jpg', '2018-01-18 03:24:19', NULL),
(50, NULL, NULL, 'storage/services/ser_img_50.jpg', '2018-01-18 03:24:19', NULL),
(51, NULL, NULL, 'storage/services/ser_img_51.jpg', '2018-01-18 03:24:19', NULL),
(52, NULL, NULL, 'storage/services/ser_img_52.jpg', '2018-01-18 03:24:19', NULL),
(53, NULL, NULL, 'storage/services/ser_img_53.jpg', '2018-01-18 03:24:19', NULL),
(56, '', NULL, 'storage/services/ser_img_56.jpg', '2018-01-18 08:11:21', '2018-01-18 08:19:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags_news`
--

CREATE TABLE `tags_news` (
  `tags_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(45) NOT NULL,
  `is_root` tinyint(4) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `password`, `is_root`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2018-01-16 00:54:51', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories_idx` (`category_id`);

--
-- Indices de la tabla `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_images_products1_idx` (`product_id`);

--
-- Indices de la tabla `product_measures`
--
ALTER TABLE `product_measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_measures_products1_idx` (`product_id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags_news`
--
ALTER TABLE `tags_news`
  ADD PRIMARY KEY (`tags_id`,`news_id`),
  ADD KEY `fk_tags_has_news_news1_idx` (`news_id`),
  ADD KEY `fk_tags_has_news_tags1_idx` (`tags_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `product_measures`
--
ALTER TABLE `product_measures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_product_images_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_measures`
--
ALTER TABLE `product_measures`
  ADD CONSTRAINT `fk_product_measures_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tags_news`
--
ALTER TABLE `tags_news`
  ADD CONSTRAINT `fk_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tags` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
