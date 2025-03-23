-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 05:17 AM
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
-- Database: `mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_name`, `product_id`, `quantity`, `created_at`) VALUES
(62, 'krishna46', 24, 1, '2024-02-28 08:21:19'),
(81, 'janak', 42, 4, '2024-03-07 07:28:03'),
(83, 'jan123', 41, 1, '2024-03-07 07:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `status`) VALUES
(1, 'Samsung', '2024-02-18 19:07:50', 1),
(2, 'Xiaomi', '2024-02-18 19:07:50', 1),
(3, 'I-phone', '2024-02-18 19:07:50', 1),
(7, 'Oppo', '2024-02-19 13:46:13', 1),
(9, 'Nokia', '2024-02-19 13:56:01', 1),
(12, 'oneplus', '2024-02-27 18:40:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `fphone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `text` varchar(250) NOT NULL,
  `submitted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `fname`, `fphone`, `email`, `text`, `submitted_at`) VALUES
(1, 'janak joshi', '9848840530', 'janakjoshi6789@gmail.com', 'second hand j9 available?', '2024-02-17 16:02:29'),
(2, 'krishna shrestha', '9848840530\r\n', 'manish@gmail.com', 'iphone 15 price drop?', '2024-02-17 16:02:29'),
(4, 'manish bhatt', '9809414839', 'manish@gmail.com', 'what about accessories?', '2024-02-17 16:02:29'),
(6, 'jenish shrestha', '9808313748', 'jenish@gmail.com', 'feedback', '2024-02-17 16:02:29'),
(8, 'janak joshi', '9838474643', 'janak@6789gmail.com', 'abcd', '2024-08-09 16:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `city_state` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `total_price`, `city_state`, `street_address`, `postcode`, `payment_type`, `created_at`) VALUES
(7, 'raBbn', 342000.00, 'Bhaktapur', 'Jagati', '4845760', 'cash_on_delivery', '2024-02-27 18:12:22'),
(8, 'raBbn', 342000.00, 'Bhaktapur', 'Jagati', '4845760', 'khalti', '2024-02-27 18:13:08'),
(9, 'raBbn', 342000.00, 'Bhaktapur', 'Jagati', '4845760', 'khalti', '2024-02-27 18:15:53'),
(10, 'raBbn', 147000.00, 'bhaktapur', 'bhaktapur', '44800', 'cash_on_delivery', '2024-02-27 18:16:52'),
(11, 'janak', 51000.00, 'Bhaktapur', 'Jagati', '4845760', 'cash_on_delivery', '2024-02-27 18:25:42'),
(12, 'janak', 12000.00, 'Bhaktapur', 'bhaktapur', '4845760', 'khalti', '2024-02-27 18:29:16'),
(13, 'janak', 13000.00, 'kanchanpur', 'jhalari', '2354657', 'khalti', '2024-02-27 18:36:12'),
(14, 'janak', 1300.00, 'Bhaktapur', 'jhalari', '44800', 'cash_on_delivery', '2024-02-27 18:39:35'),
(15, 'jan123', 6999.00, 'kathmandu', '11111', '11112', 'cash_on_delivery', '2024-02-28 03:39:00'),
(16, 'jan123', 6999.00, 'kathmandu', '11111', '11112', 'cash_on_delivery', '2024-02-28 03:44:12'),
(17, 'jan123', 328470.00, 'kathmandu', 'bhaktapur', '4845760', 'khalti', '2024-02-28 03:45:50'),
(18, 'jan123', 79614.00, 'sas', 'sdsd', 'sdsd', 'khalti', '2024-02-28 07:16:25'),
(19, 'jan123', 139999.00, 'sss', 'ddd', 'ss', 'khalti', '2024-02-28 07:17:22'),
(20, 'jan123', 139999.00, 'ss', 'dd', 'aa', 'cash_on_delivery', '2024-02-28 07:22:07'),
(21, 'jan123', 139999.00, 'kathmandu', 'sdsd', '2354657', 'khalti', '2024-02-28 07:26:41'),
(22, 'jan123', 139999.00, 'qqq', 'www', '111', 'khalti', '2024-02-28 07:53:04'),
(23, 'jan123', 139999.00, 'kanchanpur', 'qqq', '123', 'khalti', '2024-02-28 07:53:37'),
(24, 'jan123', 24620.00, 'kathmandu', 'bhaktapur', '2354657', 'khalti', '2024-02-28 07:54:41'),
(25, 'jan123', 24620.00, 'kathmandu', 'bhaktapur', '44800', 'khalti', '2024-02-28 07:55:20'),
(26, 'jan123', 22999.00, 'kanchanpur', '11111', '44800', 'khalti', '2024-02-28 07:56:44'),
(27, 'jan123', 22999.00, 'Bhaktapur', '11111', '44800', 'khalti', '2024-02-28 07:57:24'),
(28, 'krishna46', 419997.00, 'sanga', 'banepa', '111222', 'khalti', '2024-02-28 07:58:50'),
(29, 'krishna46', 144998.00, 'kathmandu', 'Jagati', 'ss', 'khalti', '2024-02-28 08:14:26'),
(30, 'jan123', 24620.00, 'bhaktapur', 'jhalari', '44800', 'khalti', '2024-02-28 14:50:33'),
(31, 'jan123', 24620.00, 'kathmandu', 'sdsd', '11112', 'khalti', '2024-02-28 14:52:44'),
(32, 'jan123', 24620.00, 'kanchanpur', 'jhalari', '2354657', 'khalti', '2024-02-28 14:59:50'),
(33, 'jan123', 22999.00, 'bhaktapur', 'jhalari', '11112', 'khalti', '2024-02-28 15:01:46'),
(34, 'jan123', 35290.00, 'bhaktapur', 'Jagati', '44800', 'khalti', '2024-02-28 15:02:53'),
(35, 'jenish', 699995.00, 'kathmandu', 'jhalari', '44800', 'khalti', '2024-02-29 04:26:29'),
(36, 'jan123', 39999.00, 'Bhaktapur', 'bhaktapur', '11112', 'cash_on_delivery', '2024-03-07 04:42:27'),
(37, 'janak', 54994.00, 'bhaktapur', 'bhaktapur', '2354657', 'cash_on_delivery', '2024-03-07 06:55:03'),
(38, 'janak', 744500.00, 'Bhaktapur', '11111', '11112', 'cash_on_delivery', '2024-03-07 07:09:34'),
(39, 'janak', 39999.00, 'Bhaktapur', 'bhaktapur', '44800', 'khalti', '2024-03-07 07:11:28'),
(40, 'janak', 4999.00, 'ww', 'ee', '123', 'cash_on_delivery', '2024-03-07 07:16:45'),
(41, 'janak', 148900.00, 'kathmandu', 'bhaktapur', '4845760', 'khalti', '2024-03-07 07:21:47'),
(42, 'jan123', 39999.00, 'pp', 'ii', '098', 'cash_on_delivery', '2024-03-07 07:38:44'),
(43, 'BINU', 6999.00, 'Bhaktapur', 'Jagati', '44000', 'khalti', '2024-03-07 08:00:06'),
(44, 'janak12345', 235289.00, 'ghj', 'rtgggg', '456', 'khalti', '2024-08-09 09:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `detailed_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`detailed_id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 16, 38, 1),
(2, 17, 24, 4),
(3, 17, 26, 10),
(4, 18, 24, 1),
(5, 18, 32, 1),
(6, 18, 1, 0),
(7, 19, 1, 1),
(8, 20, 1, 1),
(9, 21, 1, 1),
(10, 22, 1, 1),
(11, 23, 1, 1),
(12, 24, 24, 1),
(13, 25, 24, 1),
(14, 26, 26, 1),
(15, 27, 26, 1),
(16, 28, 1, 3),
(17, 29, 1, 1),
(18, 29, 39, 1),
(19, 30, 24, 1),
(20, 31, 24, 1),
(21, 32, 24, 1),
(22, 33, 26, 1),
(23, 34, 25, 1),
(24, 35, 1, 5),
(25, 36, 41, 1),
(26, 37, 32, 1),
(27, 38, 31, 5),
(28, 39, 41, 1),
(29, 40, 39, 1),
(30, 41, 31, 1),
(31, 42, 41, 1),
(32, 43, 38, 1),
(33, 44, 1, 1),
(34, 44, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `product` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(15) NOT NULL,
  `qty` int(3) NOT NULL,
  `sim-type` varchar(15) NOT NULL,
  `display-size` varchar(255) NOT NULL,
  `resolution` varchar(10) NOT NULL,
  `refresh-rate` varchar(10) NOT NULL,
  `os` varchar(20) NOT NULL,
  `chipset` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `status` tinyint(10) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `dimension` varchar(100) NOT NULL,
  `display_type` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `micro_sd_card` varchar(100) NOT NULL,
  `back_camera` varchar(100) NOT NULL,
  `front_camera` varchar(100) NOT NULL,
  `security_sensor` varchar(100) NOT NULL,
  `battery` varchar(100) NOT NULL,
  `Added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `category`, `price`, `qty`, `sim-type`, `display-size`, `resolution`, `refresh-rate`, `os`, `chipset`, `ram`, `status`, `filename`, `filepath`, `weight`, `dimension`, `display_type`, `storage`, `micro_sd_card`, `back_camera`, `front_camera`, `security_sensor`, `battery`, `Added_at`) VALUES
(1, 'Samsung Galaxy S24 Ultra', 'Samsung', 100000, 10, 'Dual SIM, GSM+G', '6.8 inches (17.27 cm)', '1440 x 312', '', 'android', 'Qualcomm Snapdragon ', '12 GB', 1, 'samsung-galaxy-s24-ultra-5g-sm-s928-stylus.jpg', 'uploads/samsung-galaxy-s24-ultra-5g-sm-s928-stylus.jpg', '232 grams', 'height:162.3 whdth:79 thickness:8.6', '6.8 inches (17.27 cm)', '256 GB', 'n a', '200 MP + 12 MP + 10 MP + 50 MP', '12 MP', 'Fingerprint', '5000 mAh', '2024-02-27 20:20:43'),
(24, 'Samsung Galaxy F54 5G', 'Samsung', 24620, 5, 'Dual SIM, GSM+G', '6.7 inches (17.02 cm)', '1080 x 240', '', 'Android v13', 'Samsung Exynos 1380', '8 GB', 1, '148929-v7-samsung-galaxy-f54-mobile-phone-large-5.webp', 'uploads/148929-v7-samsung-galaxy-f54-mobile-phone-large-5.webp', '199 grams', 'height:164.9mm width:77.3mm thickness;8.4mm', '6.7 inches (17.02 cm)', '256 GB', 'n a', '108 MP + 8 MP + 2 MP', '32 MP', ' Fingerprint Sensor', '6000 mAh', '2024-02-27 20:33:20'),
(25, 'Samsung Galaxy A54 5G', 'Samsung', 35290, 10, 'Dual SIM, GSM+G', '6.4 inches (16.26 cm)', '1080 x 234', '', 'Android v13', 'Samsung Exynos 1380', '8 GB', 1, '148192-v10-samsung-galaxy-a54-5g-mobile-phone-large-1.webp', 'uploads/148192-v10-samsung-galaxy-a54-5g-mobile-phone-large-1.webp', '202 grams', 'height:158.2mm width:76.7mm thickness:mm', '6.4 inches (16.26 cm)', '	128 GB', 'n a', '50 MP + 12 MP + 5 MP', '32 MP', 'Fingerprint', '5000 mAh', '2024-02-27 20:58:20'),
(26, 'Samsung Galaxy A34', 'Samsung', 22999, 10, 'Dual SIM, GSM+G', 'Display 6.6 inches (16.76 cm)', '1080 x 234', '', 'Android v13', 'MediaTek Dimensity 1', '6 GB RAM', 1, '148150-v22-samsung-galaxy-a34-mobile-phone-large-1.webp', 'uploads/148150-v22-samsung-galaxy-a34-mobile-phone-large-1.webp', '199 grams', 'height:161.3 whdth:78.1 thickness:8.2', 'Display 6.6 inches (16.76 cm)', '128 GB', 'n a', '13 MP', '48 MP + 8 MP + 5 MP', 'Fingerprint', '5000 mAh', '2024-02-27 21:02:53'),
(27, 'Xiaomi Redmi Note 13 Pro', 'Xiaomi', 24198, 5, 'Dual SIM, GSM+G', '6.67 inches (16.94 cm)', '1220 x 271', '', 'Android v13', 'Qualcomm Snapdragon ', '8 GB', 1, '150247-v6-xiaomi-redmi-note-13-pro-mobile-phone-large-1.webp', 'uploads/150247-v6-xiaomi-redmi-note-13-pro-mobile-phone-large-1.webp', '187 grams', 'height:161.1mm whdth:74.24mm thickness:7.98mm', '6.67 inches (16.94 cm)', '128 GB', 'n a', '200 MP + 8 MP + 2 MP', '16 MP', 'Fingerprint', '5100 mAh', '2024-02-27 21:14:22'),
(28, 'Xiaomi Redmi Note 13', 'Xiaomi', 16907, 5, 'Dual SIM, GSM+G', '6.67 inches (16.94 cm)', '1080 x 240', '', 'Android v13', 'MediaTek Dimensity 6', '6 GB', 1, '8b2f48d4afa84c9c6a4e928fe02e2122e21da7d2.webp', 'uploads/8b2f48d4afa84c9c6a4e928fe02e2122e21da7d2.webp', '173.5 grams', 'height:161.11mm whdth:74.95mm thickness:7.6mm', '6.67 inches (16.94 cm)', '128 GB', 'n a', '16 MP', '108 MP + 8 MP + 2 MP', 'Fingerprint', '5000 mAh', '2024-02-27 21:22:09'),
(29, 'Xiaomi 12 Pro 5G', 'Xiaomi', 55999, 1, 'Dual SIM, GSM+G', '6.73 inches (17.09 cm)', '1440 x 320', '', 'Android v12', 'Qualcomm Snapdragon ', '8 GB', 1, '145393-v8-xiaomi-mi-12-pro-mobile-phone-large-1.webp', 'uploads/145393-v8-xiaomi-mi-12-pro-mobile-phone-large-1.webp', '205 grams', 'height:163.6mm width:74.6mm thickness:8.1mm', '6.73 inches (17.09 cm)', '', 'n a', '50 MP + 50 MP + 50 MP', '32 MP', ' Fingerprint Sensor', '4600 mAh', '2024-02-27 21:28:57'),
(30, 'Xiaomi 14 Ultra', 'Xiaomi', 74890, 5, 'Dual SIM, GSM+G', '6.73 inches (17.09 cm)', '1440 x 320', '', 'Android v14', 'Qualcomm Snapdragon ', '12 GB', 1, '7fed23e8dc4ce173eaa4163302f7fe3b76003edc.webp', 'uploads/7fed23e8dc4ce173eaa4163302f7fe3b76003edc.webp', '224.4 grams', 'height:161.4mm whdth:75.3mm thickness:9.2mm', '6.73 inches (17.09 cm)', '', 'n a', '32 MP', '50 MP + 50 MP + 50 MP + 50 MP', ' Fingerprint Sensor', '5300 mAh', '2024-02-27 21:32:46'),
(31, 'Apple iPhone 15 Pro Max', 'I-phone', 148900, 5, 'Dual SIM, GSM+G', '6.7 inches (17.02 cm)', '1290 x 279', '', 'iOS v17', 'Apple A17 Pro', '8 GB', 1, '27b2d1e844d380c80d4ca1e62c2f98ffccccda98.webp', 'uploads/27b2d1e844d380c80d4ca1e62c2f98ffccccda98.webp', '221 grams', 'height:159.9mm width:76.7mm thickness;8.2mm', '6.7 inches (17.02 cm)', '256 GB', 'n a', '48 MP + 12 MP + 12 MP', '12 MP', 'no fingerprint sensor', '4422 mAh', '2024-02-27 21:39:39'),
(32, 'Apple iPhone 14', 'I-phone', 54994, 10, 'Dual SIM, GSM+G', '6.1 inches (15.49 cm)', '1170 x 253', '', 'iOS v16', 'Apple A15 Bionic', '6 GB', 1, '143993-v4-apple-iphone-14-mobile-phone-large-4.webp', 'uploads/143993-v4-apple-iphone-14-mobile-phone-large-4.webp', '172 grams', 'height:146.7mm width:71.5mm thickness:7.8mm', '6.1 inches (15.49 cm)', '128 GB', 'n a', '12 MP + 12 MP', '12 MP', 'no fingerprint sensor', '3279 mAh', '2024-02-27 21:45:21'),
(33, 'Apple iPhone 13', 'I-phone', 49200, 5, 'Dual SIM, GSM+G', '6.1 inches (15.49 cm)', '1170 x 253', '', 'iOS v15', 'Apple A15 Bionic', '4 GB', 1, 'cc5ab0a9bb4c0dfcc0efbc51d9096f59df67af71.webp', 'uploads/cc5ab0a9bb4c0dfcc0efbc51d9096f59df67af71.webp', '173 grams', 'height:146.7mm width:71.5mm thickness:7.6mm', '6.1 inches (15.49 cm)', '128 GB', 'n a', '12 MP + 12 MP', '12 MP', 'no fingerprint sensor', '3227 mAh', '2024-02-27 21:51:45'),
(34, 'OPPO Reno11', 'Oppo', 27390, 10, 'Dual SIM, GSM+G', '6.7 inches (17.02 cm)', '1080 x 241', '', 'Android v14', 'MediaTek Dimensity 7', '8 GB', 1, 'c95ea7a3c42fd03cf2ba127fb48ae530e9bdec83.webp', 'uploads/c95ea7a3c42fd03cf2ba127fb48ae530e9bdec83.webp', '182 grams', 'height:162.4mm width:74.3mm thickness:7.9mm', '6.7 inches (17.02 cm)', '128 GB', 'n a', '	50 MP + 8 MP + 32 MP', '32 MP', 'Fingerprint', '5000 mAh', '2024-02-27 21:57:08'),
(35, 'OPPO Reno8 T 5G', 'Oppo', 39000, 5, 'Dual SIM, GSM+G', '6.7 inches (17.02 cm)', '1080 x 241', '', 'Android v13', 'Qualcomm Snapdragon ', '8 GB', 1, '154189-v4-oppo-reno8-t-mobile-phone-large-7.webp', 'uploads/154189-v4-oppo-reno8-t-mobile-phone-large-7.webp', '171 grams', 'height:162.3mm whdth:74.3mm thickness:7.7mm', '6.7 inches (17.02 cm)', '128 GB', 'n a', '108 MP + 2 MP + 2 MP', '32 MP', 'Fingerprint', '4800 mAh', '2024-02-27 22:01:27'),
(36, 'OPPO Reno10 5G', 'Oppo', 29999, 10, 'Dual SIM, GSM+G', '6.7 inches (17.02 cm)', '1080 x 241', '', 'Android v13', 'MediaTek Dimensity 7', '8 GB', 1, '1da186c57de82524e21e8b5cb4dfe6d2f9350053.webp', 'uploads/1da186c57de82524e21e8b5cb4dfe6d2f9350053.webp', '185 grams', 'height:162.4mm whdth:74.2mm thickness:7.9mm', '6.7 inches (17.02 cm)', '256 GB', 'n a', '64 MP + 8 MP + 32 MP', '32 MP', 'Fingerprint', '5000 mAh', '2024-02-27 22:05:30'),
(37, 'Nokia G42', 'Nokia', 12499, 5, 'Dual SIM, GSM+G', '6.56 inches (16.66 cm)', '720 x 1612', '', 'Android v13', 'Qualcomm Snapdragon ', '6 GB', 1, '157051-v6-nokia-g42-mobile-phone-large-3.webp', 'uploads/157051-v6-nokia-g42-mobile-phone-large-3.webp', '193.8 grams', 'height:165mm width:75.8mm thickness:8.5mm', '6.56 inches (16.66 cm)', '128 GB', 'n a', '50 MP + 2 MP + 2 MP', '8 MP', 'Fingerprint', '5000 mAh', '2024-02-28 07:53:47'),
(38, 'Nokia C32', 'Nokia', 6999, 5, 'Dual SIM, GSM+G', '6.51 inches (16.54 cm)', '720 x 1600', '', 'Android v13', 'Unisoc SC9863A1', '4 GB', 1, '155027-v5-nokia-c32-mobile-phone-large-5.webp', 'uploads/155027-v5-nokia-c32-mobile-phone-large-5.webp', '199.4 grams', 'height:164.2mm width:75.9mm thickness:8.5mm', '6.51 inches (16.54 cm)', '64 GB', 'n a', '50 MP + 2 MP', '8 MP', 'Fingerprint', '5000 mAh', '2024-02-28 07:58:35'),
(39, 'Nokia 3.1 Plus 32GB', 'Nokia', 4999, 5, 'Dual SIM, GSM+G', '6.0 inches (15.24 cm)', '720 x 1440', '', 'Android v8.1 (Oreo)', 'MediaTek Helio P22', '3 GB', 1, '130500-v3-nokia-3.1-plus-32gb-mobile-phone-large-4.webp', 'uploads/130500-v3-nokia-3.1-plus-32gb-mobile-phone-large-4.webp', '', 'height:156.8mm whdth:76.4mm thickness:8.1mm', '6.0 inches (15.24 cm)', '32 GB', 'available', '13 MP', '5 MP ', 'Fingerprint', '3500 mAh', '2024-02-28 08:03:08'),
(41, 'OnePlus 12R', 'oneplus', 39999, 12, 'Dual SIM, GSM+G', '6.78 inches (17.22 cm)', '1264 x 278', '', 'Android v14', 'Qualcomm Snapdragon ', '8 GB', 1, '12r.webp', 'uploads/12r.webp', '207 grams', 'height:163.7mm width:75.3mm  thickness:8.8mm', '6.78 inches (17.22 cm)', '128 GB', 'n a', '50 MP + 8 MP + 2 MP', '16 MP', 'fingerprint', '5500 mAh', '2024-02-28 09:52:47'),
(42, 'OnePlus Nord CE 3 Lite 5G', 'oneplus', 17990, 20, 'Dual SIM, GSM+G', '6.72 inches (17.07 cm)', '1080 x 240', '', 'Android v13', 'Qualcomm Snapdragon ', '8 GB', 1, 'nord.webp', 'uploads/nord.webp', '195 grams', 'height:165.5mm width:76mm  thickness:8.3mm', '6.72 inches (17.07 cm)', '128 GB', 'n a', '108 MP + 2 MP + 2 MP', '16 MP', 'fingerprint', '5000mah', '2024-02-28 09:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `description` text DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `username`, `product_id`, `review`, `description`, `submission_date`) VALUES
(1, 'jan123', 1, 'janak ', 'first try', '2024-02-27 06:30:07'),
(2, 'jan123', 7, 'hgf', 'se tr', '2024-02-27 06:30:36'),
(4, 'jan123', 0, 'bad', 'bdfh', '2024-02-27 06:50:20'),
(5, 'jan123', 7, 'awesome', 'vff', '2024-02-27 06:53:00'),
(6, 'jan123', 1, 'bad', 'hdjd', '2024-02-27 07:09:41'),
(7, 'jan123', 14, 'bad', 'gghhh', '2024-02-27 07:10:43'),
(8, 'jan123', 14, 'average', 'gghhh', '2024-02-27 07:12:38'),
(9, 'jan123', 14, 'awesome', 'guuuiio', '2024-02-27 07:12:56'),
(10, 'janak', 1, 'good', 'ggg', '2024-02-27 07:42:21'),
(11, 'raBbn', 7, 'good', 'this is a test review.', '2024-02-27 09:34:33'),
(12, 'jan123', 24, 'average', 'test', '2024-02-28 03:53:13'),
(13, 'jenish', 1, 'worst', 'jgfx', '2024-02-29 04:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `full_name`, `username`, `email`, `password`, `created_at`) VALUES
(13, 'binu prajapati', 'BINU', 'binupra@gmail.com', '$2y$10$0GMU4qWb53j791MEARx//eTCAvq7rLrNJvtYPugHVKCbeQ2iTgmN2', '2024-03-07 13:43:03'),
(3, 'janak joshi', 'janak24', 'janak456@gmail.com', '$2y$10$EunhzMDzYbap0xu7xLlDVugmeQ.xT2IFcl9qw6IPo1D2Ql68v4fo2', '2024-02-17 15:58:59'),
(10, 'Krishna Shrestha', 'krishna46', 'janak4595775@gmail.com', '$2y$10$7iToH8GNeD.DvpTqI7hQM.AlPEXf07uXPOl9joGKl9A8nSYYRuriC', '2024-02-26 20:05:30'),
(4, 'janakjoshi', 'jan123', 'janakjoshi6789@gmail.com', '$2y$10$CHwv1up2k6Gr57Txk3JIPuMyEW3P8va/KJAf9COMmSXPgzGS6zfsm', '2024-02-17 15:58:59'),
(5, 'janak', 'janak', 'janakjoshi678@gmail.com', '$2y$10$xWUXST8hT2EJlFmFXRtHNe2Um57nCbK4klIoB4MjqaCTvvxwsXynS', '2024-02-17 15:58:59'),
(6, 'janakjoshi', 'jan234', 'janakjoshi67@gmail.com', '$2y$10$ZQQ7VwI1ImYmfaipQFGgpeEXakcG0EAXFASoIFZHXe0nLVfKUq65S', '2024-02-17 15:58:59'),
(12, 'jenish prajapati', 'jenish', 'jenishprajapati14@gmail.com', '$2y$10$mduMdfkMPrVuowXAWcW6xeixmmwZKBlMTjv.bcRzlpNq6FTlDWt1.', '2024-02-29 10:08:20'),
(8, 'janak raj joshi', 'joshi123', 'joshi6789@gmail.com', '$2y$10$zOL29xSZLOHzI8GvTtoM1e6RmJvJRtvADupNw.Zvf/Knkc0CY7jde', '2024-02-17 16:01:30'),
(14, 'janak joshi', 'janak12345', 'joshijanak6789@gmail.com', '$2y$10$juxKk6ouZV9318zKhT.GWezEC5sk4qyg2N6nzgGWiUwKz6aCrFbyG', '2024-08-09 15:41:43'),
(9, 'krishna', 'krishna123', 'kri@gmail.com', '$2y$10$ICtCHjO/ZlV9iwaaSDziJO80qxguoG.zexAG5lW8yuomAz0BX5PGy', '2024-02-17 15:58:59'),
(11, 'Rabin Dumaru', 'raBbn', 'rabindumaru@gmail.com', '$2y$10$uvLO/pkKBbOY5bdMOquDauiHRPTcdPXQtI/g51PRiwUOQAQi3/x6S', '2024-02-27 15:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_name`, `product_id`, `created_at`) VALUES
(3, 'janak', 18, '2024-02-25 09:55:22'),
(4, 'janak', 21, '2024-02-25 09:56:15'),
(6, 'janak', 19, '2024-02-25 09:57:56'),
(10, 'jan123', 7, '2024-02-25 10:46:42'),
(13, 'krishna46', 1, '2024-02-26 14:21:24'),
(14, 'raBbn', 7, '2024-02-27 10:02:15'),
(17, 'jan123', 41, '2024-02-28 06:32:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detailed_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detailed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
