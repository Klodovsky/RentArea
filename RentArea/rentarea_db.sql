/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;




CREATE TABLE `bikes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bike_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handlebar_width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wheel_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frame_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_day` int(11) NOT NULL,
  `is_available` int(11) DEFAULT '1',
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `name`, `photo_id`, `type`, `bike_for`, `handlebar_width`, `max_weight`, `wheel_size`, `frame_size`, `chain`, `price_per_day`, `is_available`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Specialized Bike', 13, 'Mountain', 'Adult Male', '800mm', '120kg', '26 inch', '49 cm', 'Type Single', 35, 1, 2, '2019-09-06 07:29:35', '2019-09-15 10:50:47'),
(2, 'Scott Bicycle', 14, 'Mountain', 'Kid', '600mm', '80kg', '22 inch', '30 cm', 'Type Single', 120, 1, 2, '2019-09-06 07:41:30', '2019-09-15 10:50:52'),
(3, 'Cannondale Bicycle', 15, 'Montain', 'Adult Unisex', '800mm', '120kg', '26 inch', '49 cm', 'Type Single', 60, 1, 3, '2019-09-06 07:47:31', '2019-09-15 10:50:57'),
(4, 'Bianchi Bike', 16, 'City', 'Adult Unisex', '800mm', '120kg', '26 inch', '49 cm', 'Type Single', 60, 1, 1, '2019-09-06 08:02:23', '2019-09-06 08:02:23'),
(5, 'GT Bike', 17, 'Trekking', 'Adult Unisex', '800mm', '120kg', '26 inch', '49 cm', 'Type Single', 60, 1, 1, '2019-09-06 08:04:46', '2019-09-06 08:04:46'),
(6, 'Merida Bicycle', 18, 'Tandem', 'Adult Unisex', '800mm', '240kg', '28 inch', '52 cm', 'Type Double', 80, 1, 1, '2019-09-06 08:07:15', '2019-09-06 08:07:15'),
(7, 'Fuji Bike', 33, 'Sport', 'Kid', '800mm', '80kg', '26 inch', '49 cm', 'Type Single', 30, 1, 4, '2019-09-15 11:16:45', '2019-09-15 11:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `email`, `address`, `location`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Paris', 'rentarea@paris.barnch.fr', '113 rue des six frères Ruellan', 'Paris', '07413951623', '2019-09-06 06:36:34', '2019-09-15 10:12:06'),
(2, 'Lyon', 'rentarea@Lyon.barnch.fr', '32  rue du Château', 'Lyon', '07413951623', '2019-09-06 06:36:49', '2019-09-15 10:13:14'),
(3, 'Bordeaux', 'rentarea@Bordeaux.barnch.fr', '116  nyc st', 'Bordeaux', '123', '2019-09-15 10:13:27', '2019-09-15 10:13:27'),
(4, 'Nice', 'rentarea@Nice.barnch.fr', '405 rue des sept frères Ruellan', 'Nice', '07413951623', '2019-09-15 10:13:45', '2019-09-15 16:52:35');



-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `ac` tinyint(1) NOT NULL DEFAULT '1',
  `gearbox_id` int(10) UNSIGNED DEFAULT NULL,
  `passengers` int(11) NOT NULL,
  `doors` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_per_day_car` int(11) NOT NULL,
  `gps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baby_chair` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_seat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wifi_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snow_chains` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sky_support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_available` int(11) DEFAULT '1',
  `branch_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `fuel_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `type_id`, `ac`, `gearbox_id`, `passengers`, `doors`, `capacity`, `additional_info`, `price_per_day_car`, `gps`, `baby_chair`, `child_seat`, `wifi_price`, `snow_chains`, `sky_support`, `is_available`, `branch_id`, `photo_id`, `fuel_id`, `created_at`, `updated_at`) VALUES
(1, 'Audi RS7', 1, 1, 1, 5, 4, 1, NULL, 50, '12', '10', '10', '11', '12', '14', 0, 2, 4, 1, '2019-09-06 06:47:28', '2019-12-09 16:43:39'),
(2, 'Hyundai i20', 2, 1, 2, 6, 2, 1, NULL, 60, '12', '12', '10', '10', '20', '12', 1, 2, 5, 2, '2019-09-06 06:56:33', '2019-09-15 10:14:06'),
(3, 'Chevrolet Camaro', 2, 1, 1, 6, 4, 3, NULL, 120, '12', '10', '11', '12', '13', '14', 1, 2, 6, 1, '2019-09-06 06:57:31', '2019-09-15 10:14:14'),
(4, 'Porche Panamera', 1, 1, 2, 5, 4, 2, NULL, 120, '12', '10', '10', '10', '12', '14', 1, 1, 7, 1, '2019-09-06 06:58:27', '2019-09-06 06:58:27'),
(5, 'AUDI A7', 3, 1, 1, 6, 4, 2, NULL, 60, '90', '12', '10', '10', '12', '12', 1, 1, 8, 1, '2019-09-06 06:59:35', '2019-09-06 06:59:35'),
(6, 'Ford Fiesta', 3, 1, 1, 4, 4, 2, NULL, 65, '10', '10', '12', '12', '12', '14', 1, 1, 9, 1, '2019-09-06 07:02:07', '2019-09-06 07:02:07'),
(7, 'Tesla Model S', 3, 1, 1, 5, 4, 3, NULL, 230, '10', '12', '12', '10', '12', '12', 1, 1, 10, 3, '2019-09-06 07:03:13', '2019-09-06 07:03:13'),
(8, 'Renault triber 2020', 2, 1, 1, 5, 4, 3, NULL, 200, '12', '12', '25', '10', '12', '16', 1, 1, 11, 2, '2019-09-06 07:05:23', '2019-09-06 12:00:30'),
(9, 'Nissan Z350', 1, 1, 2, 4, 4, 3, NULL, 120, '20', '12', '12', '12', '12', '12', 1, 1, 12, 2, '2019-09-06 07:06:52', '2019-09-06 07:06:52'),
(10, 'Mercedez AMG', 1, 1, 2, 6, 5, 3, NULL, 120, '10', '12', '10', '13', '20', '14', 1, 3, 31, 1, '2019-09-15 10:20:41', '2019-09-15 10:37:47'),
(11, 'Ford Focus', 3, 1, 2, 5, 4, 3, NULL, 120, '12', '10', '10', '10', '30', '14', 1, 4, 32, 1, '2019-09-15 10:49:17', '2019-09-15 10:49:17'),
(12, 'BMW E46', 1, 1, 1, 6, 4, 2, NULL, 120, '10', '10', '10', '12', '20', '40', 1, 3, 35, 1, '2019-10-01 09:05:53', '2019-10-01 09:05:53'),
(13, 'Nissan Versa Note', 1, 1, 1, 6, 4, 2, NULL, 130, '10', '12', '12', '10', '14', '14', 1, 2, 36, 1, '2019-10-01 12:29:28', '2019-10-01 12:29:28'),
(14, 'Mercedez Benz', 1, 1, 1, 5, 4, 3, NULL, 140, '10', '10', '10', '10', '10', '10', 1, 2, 37, 2, '2019-10-01 12:30:22', '2019-10-01 12:30:22'),
(15, 'Ford Focus', 1, 1, 1, 5, 4, 2, NULL, 120, '10', '10', '10', '10', '10', '10', 1, 2, 38, 2, '2019-10-01 12:32:46', '2019-10-01 12:32:46'),
(16, 'Bentley continental GT 2018', 1, 1, 1, 4, 4, 2, NULL, 130, '10', '10', '10', '10', '10', '10', 1, 3, 39, 1, '2019-10-01 12:43:13', '2019-10-01 12:43:13'),
(17, 'Audi A5', 2, 1, 1, 4, 2, 3, NULL, 120, '10', '10', '10', '10', '10', '10', 1, 3, 40, 1, '2019-10-01 12:43:58', '2019-10-01 12:44:16'),
(18, 'Citroen C4 Cactus', 3, 1, 2, 4, 3, 2, NULL, 140, '10', '10', '10', '10', '10', '10', 1, 3, 41, 1, '2019-10-01 12:45:27', '2019-10-01 12:45:27'),
(19, 'Kia Sportage', 2, 1, 1, 2, 2, 1, NULL, 300, '10', '10', '10', '10', '10', '10', 1, 3, 42, 1, '2019-10-01 12:47:03', '2019-10-01 12:47:03'),
(20, 'BMW X6', 3, 1, 1, 4, 3, 2, NULL, 220, '10', '10', '10', '10', '10', '10', 1, 4, 43, 2, '2019-10-01 12:51:48', '2019-10-01 12:51:59'),
(21, 'Renault Megane', 1, 1, 2, 5, 4, 2, NULL, 140, '10', '10', '10', '10', '10', '10', 1, 4, 44, 1, '2019-10-01 12:55:24', '2019-10-01 12:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `car_fuels`
--

CREATE TABLE `car_fuels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_fuels`
--

INSERT INTO `car_fuels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Gas', '2019-09-06 06:39:36', '2019-09-06 06:39:36'),
(2, 'Diesel', '2019-09-06 06:39:38', '2019-09-06 06:39:38'),
(3, 'Electric', '2019-09-06 06:39:38', '2019-09-06 06:39:38');


-- --------------------------------------------------------

--
-- Table structure for table `car_gearboxes`
--

CREATE TABLE `car_gearboxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_gearboxes`
--

INSERT INTO `car_gearboxes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Automatic', '2019-09-06 06:39:44', '2019-09-06 06:39:44'),
(2, 'Manual', '2019-09-06 06:39:46', '2019-09-06 06:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `car_types`
--

CREATE TABLE `car_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_types`
--

INSERT INTO `car_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Compact', '2019-09-06 06:39:17', '2019-09-06 06:39:17'),
(2, 'Standard', '2019-09-06 06:39:21', '2019-09-06 06:39:21'),
(3, 'Premium', '2019-09-06 06:39:30', '2019-09-06 06:39:30'),
(4, '4x4', '2019-09-06 06:39:30', '2019-09-06 06:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sedan', '2019-09-06 06:24:36', '2019-09-06 06:24:50'),
(2, 'SUV', '2019-09-06 06:25:50', '2019-09-06 06:24:50'),
(3, 'Crossover', '2019-09-06 06:25:55', '2019-09-06 06:24:50'),
(4, 'Coupe', '2019-09-06 06:26:10', '2019-09-06 06:24:50'),
(5, 'Convertible', '2019-09-06 06:26:50', '2019-09-06 06:24:50');


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `is_active`, `author`, `photo`, `email`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Elon Musk', '/public/images/elonmusk.jpg', 'elonmusk@spacex.com', 'I will definetly rent a Tesla', '2019-03-10 15:52:18', '2019-03-10 15:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_10_12_000000_create_users_table', 1),
(2, '2019_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_22_211638_create_roles_table', 1),
(4, '2019_07_15_120309_add_photo_id_to_users', 1),
(5, '2019_07_15_140042_create_photos_table', 1),
(6, '2019_07_21_084950_create_posts_table', 1),
(7, '2019_07_21_142400_create_categories_table', 1),
(8, '2019_07_25_180532_create_comments_table', 1),
(9, '2019_07_25_180651_create_comment_replies_table', 1),
(10, '2019_07_29_103126_create_slug_to_post_table', 1),
(11, '2019_07_29_125423_create_branches_table', 1),
(12, '2019_07_29_162759_create_car_types_table', 1),
(13, '2019_07_29_172527_create_car_fuels_table', 1),
(14, '2019_07_29_181557_create_car_gearboxes_table', 1),
(15, '2019_07_30_153200_create_cars_table', 1),
(16, '2019_08_14_112841_create_rental_cars_table', 1),
(17, '2019_09_02_093358_create_bikes_table', 1),
(18, '2019_09_02_155813_create_rental_bikes_table', 1),
(19, '2019_09_02_193757_create_motos_table', 1),
(20, '2019_09_02_202140_create_rental_motos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `motos`
--

CREATE TABLE `motos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_speed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_economy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_day` int(11) NOT NULL,
  `is_available` int(11) DEFAULT '1',
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motos`
--

INSERT INTO `motos` (`id`, `name`, `photo_id`, `type`, `max_weight`, `max_speed`, `fuel_economy`, `engine`, `price_per_day`, `is_available`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Harley Street™ 500', 19, 'Cruiser', '140kg', '240km/h', '4.5 l/100 km', '1200 cmc', 240, 1, 2, '2019-09-06 08:26:06', '2019-09-15 17:59:09'),
(2, 'Yamaha R1-R1M', 20, 'Sport', '120kg', '280km/h', '5.5 l/100 km', '1100 cmc', 120, 1, 2, '2019-09-06 08:31:05', '2019-09-15 11:18:40'),
(3, 'Motor HQFX', 21, 'Sport', '140kg', '280km/h', '5.5 l/100 km', '1200 cmc', 140, 1, 3, '2019-09-06 08:32:42', '2019-09-15 11:18:47'),
(4, 'Yamaha R5', 22, 'Sport', '120kg', '280km/h', '5.5 l/100 km', '1200 cmc', 120, 1, 1, '2019-09-06 08:40:29', '2019-09-06 08:40:29'),
(5, 'Harley Street™ 700', 23, 'Cruiser', '120kg', '280km/h', '4.5 l/100 km', '1300 cmc', 260, 1, 1, '2019-09-06 08:41:57', '2019-09-06 08:41:57'),
(6, 'Honda Fury', 24, 'Sport', '120kg', '320km/h', '6.5 l/100 km', '1200 cmc', 120, 1, 4, '2019-09-06 08:43:38', '2019-09-15 11:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@rentarea.com', '$2y$10$hWtgAU9rX8F3K9PpPIDK6OzGF5pw6qDvRwXZWyVoDXrUlvBH7jxpi', '2019-02-21 00:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file`, `created_at`, `updated_at`) VALUES
(2, '1536225777author.jpg', '2019-09-06 06:22:57', '2019-09-06 06:22:57'),
(3, '1536226024article1.jpg', '2019-09-06 06:27:04', '2019-09-06 06:27:04'),
(4, 'audi-rs7-rendering-rs6-avant-styling.jpg', '2019-09-06 06:47:28', '2019-09-06 06:47:28'),
(5, '2018_Hyundai_i20_facelift_Front.jpg', '2019-09-06 06:56:33', '2019-09-06 06:56:33'),
(6, '2019_Chevrolet_Camaro_base,_front_11.9.19.jpg', '2019-09-06 06:57:31', '2019-09-06 06:57:31'),
(7, 'panamera.jpg', '2019-09-06 06:58:27', '2019-09-06 06:58:27'),
(8, '1920x1080_a7.jpg', '2019-09-06 06:59:35', '2019-09-06 06:59:35'),
(9, '1538407966car3-chicago.jpg', '2019-09-06 07:02:07', '2019-09-06 07:02:07'),
(10, 'tesla.jpg', '2019-09-06 07:03:13', '2019-09-06 07:03:13'),
(11, 'renault_triber_2020_0000.jpg', '2019-09-06 07:05:23', '2019-09-06 07:05:23'),
(12, '2008_Nissan_350Z_3.5_Front.jpg', '2019-09-06 07:06:52', '2019-09-06 07:06:52'),
(13, '1536229775praha_bike.jpg', '2019-09-06 07:29:35', '2019-09-06 07:29:35'),
(14, '1536230490praha_bike2.jpg', '2019-09-06 07:41:30', '2019-09-06 07:41:30'),
(15, '1536230851bike-mtb.jpg', '2019-09-06 07:47:31', '2019-09-06 07:47:31'),
(16, '1536231743city-bike.jpg', '2019-09-06 08:02:23', '2019-09-06 08:02:23'),
(17, '1536231886MTB-X-Fact.jpg', '2019-09-06 08:04:46', '2019-09-06 08:04:46'),
(18, '1536232035tandem-bike.jpg', '2019-09-06 08:07:15', '2019-09-06 08:07:15'),
(19, '1536233166harley-moto.jpg', '2019-09-06 08:26:06', '2019-09-06 08:26:06'),
(20, '1536233465Yamaha-R1-R1M-14.jpg', '2019-09-06 08:31:05', '2019-09-06 08:31:05'),
(21, '1536233562Motor-HQFX.jpg', '2019-09-06 08:32:42', '2019-09-06 08:32:42'),
(22, '1536234029yamaha-2019.jpg', '2019-09-06 08:40:29', '2019-09-06 08:40:29'),
(23, '1536234117cruiser-moto.jpg', '2019-09-06 08:41:57', '2019-09-06 08:41:57'),
(24, '1536234218honda-fury-chopper-2019-copy.jpg', '2019-09-06 08:43:38', '2019-09-06 08:43:38'),
(31, '1538407822car2-chicago.jpg', '2019-09-15 10:37:47', '2019-09-15 10:37:47'),
(32, '1537019357fordfocus.jpg', '2019-09-15 10:49:17', '2019-09-15 10:49:17'),
(33, '1537021005bmx-bike.jpg', '2019-09-15 11:16:45', '2019-09-15 11:16:45'),
(34, '1538214310who are we.jpg', '2019-09-29 06:45:10', '2019-09-29 06:45:10'),
(35, '1538395553bmw-e46 (1).jpg', '2019-10-01 09:05:53', '2019-10-01 09:05:53'),
(36, '1538407768car1-chicago.jpg', '2019-10-01 12:29:28', '2019-10-01 12:29:28'),
(37, '1538407822car2-chicago.jpg', '2019-10-01 12:30:22', '2019-10-01 12:30:22'),
(38, '1538407966car3-chicago.jpg', '2019-10-01 12:32:46', '2019-10-01 12:32:46'),
(39, '2880-1800-crop-bentley-continental-gt-2018-c633407022019190654_1.jpg', '2019-10-01 12:43:13', '2019-10-01 12:43:13'),
(40, '1538408638car2-la.jpg', '2019-10-01 12:43:58', '2019-10-01 12:43:58'),
(41, 'citroen-c4-cactus-symbolbild-min.png', '2019-10-01 12:45:27', '2019-10-01 12:45:27'),
(42, 'kia_sportage_ql_pe_my19_meet_your_match.jpg', '2019-10-01 12:47:03', '2019-10-01 12:47:03'),
(43, '1538409108car1-seatle.jpg', '2019-10-01 12:51:48', '2019-10-01 12:51:48'),
(44, '1538409324car2-seatle.jpg', '2019-10-01 12:55:24', '2019-10-01 12:55:24'),
(45, '1538491808fachada - CDB.jpg', '2019-10-02 11:50:08', '2019-10-02 11:50:08'),
(46, '15411944231536225777author.jpg', '2019-11-03 01:33:43', '2019-11-03 01:33:43'),
(47, '154183214719ER650H_44SBK1DRF2CG_A.png', '2019-11-10 11:42:27', '2019-11-10 11:42:27'),
(48, '15419311851536225777author.jpg', '2019-11-11 15:13:05', '2019-11-11 15:13:05'),
(49, '1542464255ida.jpg', '2019-11-17 19:17:35', '2019-11-17 19:17:35'),
(50, 'minecraft.jpg', '2019-11-29 19:39:39', '2019-11-29 19:39:39'),
(51, '1543502627blog -Macron-violent-tribune-avril2017.JPG', '2019-11-29 19:43:47', '2019-11-29 19:43:47'),
(52, '1543789674about.html', '2019-12-03 03:27:54', '2019-12-03 03:27:54'),
(57, '1544041531vok.php', '2019-12-06 01:25:31', '2019-12-06 01:25:31'),
(58, '1544042143theprdawg.php', '2019-12-06 01:35:43', '2019-12-06 01:35:43'),
(59, '1544045298manage.php', '2019-12-06 02:28:18', '2019-12-06 02:28:18'),
(60, '1544434337505.jpg', '2019-12-10 14:32:17', '2019-12-10 14:32:17'),
(61, '15444343595bc91bc44644c.phtml', '2019-12-10 14:32:39', '2019-12-10 14:32:39'),
(62, '15444347241536225777author.jpg', '2019-12-10 14:38:44', '2019-12-10 14:38:44'),
(63, '1544485255xsv.svg', '2019-12-11 04:40:55', '2019-12-11 04:40:55'),
(64, '1544485282xsv.svg', '2019-12-11 04:41:22', '2019-12-11 04:41:22'),
(65, '155632693328263485.jpg', '2019-04-27 05:02:13', '2019-04-27 05:02:13'),
(66, '155632703853283827_2810106515666110_4851998007304781074_n.jpg', '2019-04-27 05:03:58', '2019-04-27 05:03:58'),
(67, '1559192947radio.jpg', '2019-05-30 09:09:07', '2019-05-30 09:09:07'),
(68, '1560848541download (3).jpeg', '2019-06-18 13:02:21', '2019-06-18 13:02:21'),
(69, '1560849290download (4).jpeg', '2019-06-18 13:14:50', '2019-06-18 13:14:50'),
(70, '1560849290download (5).jpeg', '2019-07-08 02:38:58', '2019-07-08 02:38:58'),
(71, '1562539350b374k.php', '2019-07-08 02:42:30', '2019-07-08 02:42:30'),
(72, '1562540236b374k.jpg', '2019-07-08 02:57:16', '2019-07-08 02:57:16'),
(73, '1562540346b374k.jpg', '2019-07-08 02:59:06', '2019-07-08 02:59:06'),
(74, '1562540538b374k.jpg', '2019-07-08 03:02:18', '2019-07-08 03:02:18'),
(75, '1565004619Loggie.png', '2019-08-05 15:30:19', '2019-08-05 15:30:19'),
(76, '1565773909image5.png', '2019-08-14 13:11:49', '2019-08-14 13:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `photo_id`, `title`, `body`, `created_at`, `updated_at`, `slug`) VALUES
(1, 1, 1, 3, 'Tesla Cybertruck reservations hit 146,000', '146k Cybertruck orders so far, with 42% choosing dual, 41% tri & 17% single motor', '2019-09-06 06:27:04', '2019-09-06 06:27:04', 'Tesla-Cybertruck-reservations-hits-146,000'),
(2, 2, 2, 34, 'Michael Schumacher Quote', 'I\'ve always believed that you should never, ever give up and you should always keep fighting even when there\'s only a slightest chance.', '2019-09-29 06:45:10', '2019-09-29 06:45:10', 'Michael-Schumacher-Quote');

-- --------------------------------------------------------

--
-- Table structure for table `rental_bikes`
--

CREATE TABLE `rental_bikes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bike_id` int(10) UNSIGNED NOT NULL,
  `branch_pickup` int(10) UNSIGNED NOT NULL,
  `branch_return` int(10) UNSIGNED DEFAULT NULL,
  `pickupDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `pickupTime` time NOT NULL,
  `returnTime` time NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental_bikes`
--



-- --------------------------------------------------------

--
-- Table structure for table `rental_cars`
--

CREATE TABLE `rental_cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL,
  `branch_pickup` int(10) UNSIGNED NOT NULL,
  `branch_return` int(10) UNSIGNED DEFAULT NULL,
  `pickupDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `pickupTime` time NOT NULL,
  `returnTime` time NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flight_number` text COLLATE utf8mb4_unicode_ci,
  `reservation_info` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental_cars`
--



--
-- Table structure for table `rental_motos`
--

CREATE TABLE `rental_motos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `moto_id` int(10) UNSIGNED NOT NULL,
  `branch_pickup` int(10) UNSIGNED NOT NULL,
  `branch_return` int(10) UNSIGNED DEFAULT NULL,
  `pickupDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `pickupTime` time NOT NULL,
  `returnTime` time NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rental_motos`
--


-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', NULL, NULL),
(2, 'client', NULL, NULL),
(3, 'author', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `is_active`, `name`, `email`, `address`, `city`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `photo_id`) VALUES
(1, 1, 1, 'Elon Musk', 'elonmusk@spacex.com', 'Silicon Valley', 'California', '9876543210', '$2y$10$U25.MEbwfSdoRBzF5ECJvuSuK1nFmucx3kML2uvShFUZ.GxzQ5ene', 'QViv1ydG7gcKhMFLOsSB2G47ohPtoMZDyHYkyiwHi31Txdz1KrRwJSDURTfM', '2019-09-06 06:18:34', '2019-07-08 02:59:06', '73'),
(2, 3, 1, 'Khaled BENHASSEN', 'BENHASSEN@gmail.com', '962  Coffman Alley, abc rue 25', 'Sousse', '9876543210', '$2y$10$Sn/DH0VSZ0Bie9VZIP1Oeeyx1BobobThUzWbBKVp5MBtx5JWiHMoC', '2WDSasigDyJQktBFFhfoSYzulsdBGymXZ2iQbM77NWTgShlAXAIJKPmcc6B5', '2019-09-06 06:22:57', '2019-07-08 03:02:18', '74'),
(3, 2, 1, 'Ashlyn Lara', 'Ashlyn_3964@yahoo.com', '962  Coffman Alley', 'Bordeaux', '9876543210', '$2y$10$MuLF94nkJUKcrySs.trHLeJFvLeIo0Vh9FQ/XyIwlzwQLJ1ggMG6O', NULL, '2019-09-06 12:03:03', '2019-09-06 12:11:59', NULL),
(4, 2, 1, 'Macsen Lloyd', 'Macsen@gmail.com', '962  Coffman Alley', 'Paris', '9876543210', '$2y$10$akJi9b3WRy.jwL6dhzq/KucjsEenpCt2ezz39ul/s9Mv8R1iZdkLG', NULL, '2019-09-12 11:16:04', '2019-09-15 16:38:41', NULL),
(5, 2, 1, 'Francesca Neale', 'Francesca@gmail.com', '962  Coffman Alley', 'Dijon', '9876543210', '$2y$10$nYJR2HSy0g9zaT38qv/Qhef1FU9nhYQO373HMy3E.Ak6qOUTx6kGW', 'CtYC4t5Z3A7cr2RF0CuTDyRpqQxnkPQ0gM13TW9C6MrvraVDXHDxLENeohMe', '2019-09-15 06:53:40', '2019-09-15 17:30:29', NULL),
(6, 2, 1, 'Thiago Wilcox', 'Thiago@gmail.com', '962  Coffman Alley', 'Manchester', '9876543210', '$2y$10$oPViEViEXJ0B65r8ZFz9le3NLZs26f.wEg0y9Xmmgg0HBEIn8bIL2', 'dAz91yJGt4HLm8uqO0aImMnSgnLQYTmgQwl4BR0OWurD847zmyI5TnSMoMZm', '2019-09-15 07:19:06', '2019-09-15 18:07:54', NULL),
(7, 1, 1, 'Theresa Bob', 'Theresa@gmail.com', '962  Coffman Alley', 'London', '9876543210', '$2y$10$9Lz0Bxp4YGO25Y9/RtnU5ekb2kFn7PJL0tB4a9zBkLHxkMmyFP6QC', '23ghG47HLVxj4luY1skyoo92s9cM567oYsPy0MbbcDJE1LCoThoJ8x5HIHAq', '2019-09-29 07:05:52', '2019-09-29 07:06:20', NULL),
(8, 2, 1, 'Zephaniah Terrell', 'Zephaniah@gmail.com', '962  Coffman Alley', 'Lyon', '9876543210', '$2y$10$HnscVuznFRS4n69F5lCZ/u.pwBkmgp6etB1i7Ki68RqN4ojHnH6FK', 'KP0wG1AKWoCAJLvYKm9wqhSAjxlnmto0PxgTuQGm2wtOsba7RqE8hoLf0qRx', '2019-09-29 07:25:51', '2019-10-01 08:51:57', NULL),
(9, 2, 1, 'Sidney Alexander', 'Sidney@gmail.com', '962  Coffman Alley', 'Pau', '9876543210', '$2y$10$4etyp55DNwj9dT6xyXgkQ.Oj8/GdbU1kZUMnXjHFNLX79pKUxIEpC', NULL, '2019-10-01 12:48:34', '2019-10-01 12:48:34', NULL),
(10, 2, 1, 'Ava-May Wyatt', 'Wyatt@gmail.com', '962  Coffman Alley', 'Nantes', '9876543210', '$2y$10$NCB9i.Nt0cf/KbIkDtgMkOUVISjHnC6qPhliBpTgz4Sw9AYjaTo9m', 'gSQB5NPXtDcqXaba9yw1Q0vdmjB9fAeUKyTZc5dz3zgR0LFSMfPnRAbGHrZz', '2019-10-01 13:28:37', '2019-10-01 13:28:37', NULL),
(11, 2, 1, 'Cobie Corona', 'Cobie@gmail.com', '962  Coffman Alley', 'Vienna', '9876543210', '$2y$10$9vYaGxvs/MX5luAXe.T6CucDb.rMcm82QJstI2tcV.eYb7zHW7zlu', NULL, '2019-02-18 15:27:39', '2019-02-18 15:27:39', NULL);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bikes_photo_id_index` (`photo_id`),
  ADD KEY `bikes_branch_id_index` (`branch_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_type_id_index` (`type_id`),
  ADD KEY `cars_gearbox_id_index` (`gearbox_id`),
  ADD KEY `cars_branch_id_index` (`branch_id`),
  ADD KEY `cars_photo_id_index` (`photo_id`),
  ADD KEY `cars_fuel_id_index` (`fuel_id`);

--
-- Indexes for table `car_fuels`
--
ALTER TABLE `car_fuels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_gearboxes`
--
ALTER TABLE `car_gearboxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_index` (`post_id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_comment_id_index` (`comment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motos`
--
ALTER TABLE `motos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motos_photo_id_index` (`photo_id`),
  ADD KEY `motos_branch_id_index` (`branch_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`),
  ADD KEY `posts_category_id_index` (`category_id`),
  ADD KEY `posts_photo_id_index` (`photo_id`);

--
-- Indexes for table `rental_bikes`
--
ALTER TABLE `rental_bikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_bikes_user_id_index` (`user_id`),
  ADD KEY `rental_bikes_bike_id_index` (`bike_id`),
  ADD KEY `rental_bikes_branch_pickup_index` (`branch_pickup`),
  ADD KEY `rental_bikes_branch_return_index` (`branch_return`);

--
-- Indexes for table `rental_cars`
--
ALTER TABLE `rental_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_cars_user_id_index` (`user_id`),
  ADD KEY `rental_cars_car_id_index` (`car_id`),
  ADD KEY `rental_cars_branch_pickup_index` (`branch_pickup`),
  ADD KEY `rental_cars_branch_return_index` (`branch_return`);

--
-- Indexes for table `rental_motos`
--
ALTER TABLE `rental_motos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_motos_user_id_index` (`user_id`),
  ADD KEY `rental_motos_moto_id_index` (`moto_id`),
  ADD KEY `rental_motos_branch_pickup_index` (`branch_pickup`),
  ADD KEY `rental_motos_branch_return_index` (`branch_return`);

--
-- Indexes for table `roles`
--.
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `car_fuels`
--
ALTER TABLE `car_fuels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_gearboxes`
--
ALTER TABLE `car_gearboxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_types`
--
ALTER TABLE `car_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `motos`
--
ALTER TABLE `motos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rental_bikes`
--
ALTER TABLE `rental_bikes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `rental_cars`
--
ALTER TABLE `rental_cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `rental_motos`
--
ALTER TABLE `rental_motos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bikes`
--
ALTER TABLE `bikes`
  ADD CONSTRAINT `bikes_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_fuel_id_foreign` FOREIGN KEY (`fuel_id`) REFERENCES `car_fuels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_gearbox_id_foreign` FOREIGN KEY (`gearbox_id`) REFERENCES `car_gearboxes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `car_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rental_bikes`
--
ALTER TABLE `rental_bikes`
  ADD CONSTRAINT `rental_bikes_bike_id_foreign` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_bikes_branch_pickup_foreign` FOREIGN KEY (`branch_pickup`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `rental_bikes_branch_return_foreign` FOREIGN KEY (`branch_return`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `rental_bikes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rental_cars`
--
ALTER TABLE `rental_cars`
  ADD CONSTRAINT `rental_cars_branch_pickup_foreign` FOREIGN KEY (`branch_pickup`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `rental_cars_branch_return_foreign` FOREIGN KEY (`branch_return`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `rental_cars_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_cars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rental_motos`
--
ALTER TABLE `rental_motos`
  ADD CONSTRAINT `rental_motos_branch_pickup_foreign` FOREIGN KEY (`branch_pickup`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `rental_motos_branch_return_foreign` FOREIGN KEY (`branch_return`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `rental_motos_moto_id_foreign` FOREIGN KEY (`moto_id`) REFERENCES `motos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_motos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;


