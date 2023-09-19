-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 09:29 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2ksupermart`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `article` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bannerimages`
--

CREATE TABLE `bannerimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bannerimages`
--

INSERT INTO `bannerimages` (`id`, `title`, `content_1`, `content_2`, `image`, `created_at`, `updated_at`) VALUES
(1, '2K SUPERMART', 'Everything', '₦2K and below', 'images/slides/08/slide-0.jpg', NULL, NULL),
(2, 'GREAT OFFERS', 'Starting at', '₦2K and below', 'images/slides/08/slide-02.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image_path`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', 'Description for this category', 'images/category/shirts.jpeg', 1, NULL, NULL),
(2, 'Luggage', 'Description for this category', 'images/category/luggage.jpg', 2, NULL, NULL),
(3, 'Shoes', 'Description for this category', 'images/category/null.jpg', 1, NULL, NULL),
(4, 'Accessories', 'Description for this category', 'images/category/null.jpg', 1, NULL, NULL),
(5, 'Toys', 'Description for this category', 'images/category/toy.jpg', 1, NULL, NULL),
(6, 'Drinks', 'Description for this category', 'images/category/drinks.jpg', 7, NULL, NULL),
(7, 'Beverage', 'Description for this category', 'images/category/null.jpg', 7, NULL, NULL),
(8, 'Sport Equipments', 'Description for this category', 'images/category/null.jpg', 1, NULL, NULL),
(9, 'kitchen', 'Description for this category', 'images/category/null.jpg', 1, NULL, NULL),
(10, 'Samsung', 'Description for this category', 'images/category/phones.jpg', 8, NULL, NULL),
(11, 'IPhone', 'Description for this category', 'images/category/phones.jpg', 8, NULL, NULL),
(12, 'Tecno', 'Description for this category', 'images/category/phones.jpg', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, '2k-1234567890', 'percentage', '20', 'unused', NULL, NULL),
(2, '2k-abcdefghij', 'value', '100', 'unused', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '2k Supermart', 'At the 2k Supermart customers have a delightful guarantee that everything is N2,000 and below. Our customers are constantly wowed by the prices and we ensure that they always leave smiling. We like to call this the “2k effect”. We are proud to say that our prices are cheerful and our products are GREAT! You can get Beverages, Cereals, Biscuits, Household Provisions, Cooking Oils, Canned Foods, Health and Beauty Products, Air Freshners, Cleaning Materials, Toys, Footwear, Clothing for Kids and Adults, Kitchen and Bathroom Products, Party Disposable Goods and Party Supplies – all at N2,000 and below. We always put smiles on our customers’ faces because the value we provide on our products surpasses our price tags.', 'images/custom/supermart.jpg', NULL, NULL),
(2, 'Luggage Masters', 'The Luggage Masters offer an assortment of Travel Bags, Laptop Bags, Belts and Leather Accessories. The travelling luggages can come in different sets and sizes. There are luggage tags. There are incredible selections of luggages and suitcases that are designed as either soft or hard styles. Prices are affordable and can match any prices in the open market. Come and experience the luggage master hospitality and offerings. 10% discount on suitcases are ongoing!!!', 'images/custom/luggage.jpg', NULL, NULL),
(3, 'Orange Discount Corner', 'The Orange Discount Corner is a “Gifts and More” corner in the 2k Supermart Plaza. At the Orange Discount Corner, products that are over N2,000 are displayed and sold to meet the needs of discerning customers looking to stretch the Naira beyond N2,000 but with a guarantee that the pricing is fully discounted.', 'images/custom/orange.jpg', NULL, NULL),
(4, 'Ice Cream', 'We stock both soft and hard ice cream for the whole family’s delight. Our customers trust and love 2k Ice cream for its creamy and exciting toppings and mixes. At the ice cream corner shop, you can also get fresh instantly made popcorn.', 'images/custom/icecream.jpg', NULL, NULL),
(5, 'Shawarma and Part Jollof', '2k offers the best party jollof Rice in the FCT. Come and savour our delicious party jollof rice – real licking good. Our tasty chicken shawarma comes as either a sausage/chicken combo or chicken only wrap. The only regret is that you will ask for another wrap of our shawarma after the first one. It’s seriously that good!!!', 'images/custom/shawarma.jpg', NULL, NULL),
(6, 'Pharmacy', 'Our pharmacy stocks the best authentic drugs, medications, health and wellness products. You can refill your prescriptions at our pharmacy where experienced pharmacists will manage your health information. We are a trusted name in pharmaceutical and chemical pharmacy delivery within our locality and beyond. We Source Right!', 'images/custom/pharmacy.jpg', NULL, NULL),
(7, 'Drinks and Beverages', 'des', 'image', NULL, NULL),
(8, 'Phones', 'des', 'image', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_10_125532_create_products_table', 1),
(4, '2019_08_10_125557_create_features_table', 1),
(5, '2019_08_11_163704_create_feedback_table', 1),
(6, '2019_08_12_134657_create_abouts_table', 1),
(7, '2019_08_14_125837_create_categories_table', 1),
(8, '2019_08_15_042112_create_pricelists_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_09_02_112209_create_orders_table', 1),
(11, '2020_06_10_055738_create_departments_table', 1),
(12, '2020_06_22_073819_create_specifications_table', 1),
(13, '2020_06_26_181824_create_bannerimages_table', 1),
(14, '2020_06_26_190840_create_quotes_table', 1),
(15, '2020_06_26_203834_create_sitesettings_table', 1),
(16, '2020_06_30_153128_create_emails_table', 1),
(17, '2020_07_01_063514_create_coupons_table', 1),
(18, '2020_07_04_131547_create_wishlists_table', 1),
(19, '2020_07_07_223106_create_reviews_table', 1),
(20, '2020_09_08_144305_create_order_parents_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_parent_id` int(11) NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_qty` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_parent_id`, `product`, `image`, `price`, `quantity`, `unit_qty`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Oat Barister', 'images/product/oat-barister.jpg', '1800.00', 1, '1.00', '2020-09-09 18:12:44', '2020-09-09 18:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_parents`
--

CREATE TABLE `order_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentReference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricelists`
--

CREATE TABLE `pricelists` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `normalPrice` int(11) NOT NULL,
  `discountPrice` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricelists`
--

INSERT INTO `pricelists` (`id`, `product_id`, `quantity`, `normalPrice`, `discountPrice`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2000, 1800, NULL, NULL),
(2, 2, 1, 1500, 1200, NULL, NULL),
(3, 3, 1, 1300, 1100, NULL, NULL),
(4, 4, 1, 1400, 1200, NULL, NULL),
(5, 5, 1, 2000, 1900, NULL, NULL),
(6, 6, 1, 1250, 1000, NULL, NULL),
(7, 7, 1, 1900, 1500, NULL, NULL),
(8, 8, 1, 2000, 1700, NULL, NULL),
(9, 9, 1, 1900, 1500, NULL, NULL),
(10, 10, 1, 1300, 1100, NULL, NULL),
(11, 11, 1, 1300, 1100, NULL, NULL),
(12, 12, 1, 1300, 1100, NULL, NULL),
(13, 13, 1, 1300, 1100, NULL, NULL),
(14, 14, 1, 1300, 1100, NULL, NULL),
(15, 15, 1, 1300, 1100, NULL, NULL),
(16, 16, 1, 1300, 1100, NULL, NULL),
(17, 17, 1, 700, 6500, NULL, NULL),
(18, 18, 1, 1200, 1100, NULL, NULL),
(19, 19, 1, 1500, 1300, NULL, NULL),
(20, 20, 1, 1700, 1650, NULL, NULL),
(21, 21, 1, 1000, 900, NULL, NULL),
(22, 22, 1, 1100, 900, NULL, NULL),
(23, 23, 1, 1500, 1200, NULL, NULL),
(24, 24, 1, 1100, 900, NULL, NULL),
(25, 25, 1, 700, 500, NULL, NULL),
(26, 26, 1, 2000, 1900, NULL, NULL),
(27, 27, 1, 2000, 1800, NULL, NULL),
(28, 28, 1, 1500, 1200, NULL, NULL),
(29, 29, 1, 1300, 1100, NULL, NULL),
(30, 30, 1, 1400, 1200, NULL, NULL),
(31, 31, 1, 2000, 1900, NULL, NULL),
(32, 32, 1, 1250, 1000, NULL, NULL),
(33, 33, 1, 1900, 1500, NULL, NULL),
(34, 34, 1, 2000, 1700, NULL, NULL),
(35, 35, 1, 1900, 1500, NULL, NULL),
(36, 36, 1, 1300, 1100, NULL, NULL),
(37, 37, 1, 1300, 1100, NULL, NULL),
(38, 38, 1, 1300, 1100, NULL, NULL),
(39, 39, 1, 1300, 1100, NULL, NULL),
(40, 40, 1, 1300, 1100, NULL, NULL),
(41, 41, 1, 1300, 1100, NULL, NULL),
(42, 42, 1, 1300, 1100, NULL, NULL),
(43, 43, 1, 700, 6500, NULL, NULL),
(44, 44, 1, 1200, 1100, NULL, NULL),
(45, 45, 1, 1500, 1300, NULL, NULL),
(46, 46, 1, 1700, 1650, NULL, NULL),
(47, 47, 1, 1000, 900, NULL, NULL),
(48, 48, 1, 1100, 900, NULL, NULL),
(49, 49, 1, 1500, 1200, NULL, NULL),
(50, 50, 1, 1100, 900, NULL, NULL),
(51, 51, 1, 700, 500, NULL, NULL),
(52, 52, 1, 2000, 1900, NULL, NULL),
(53, 53, 1, 2000, 1800, NULL, NULL),
(54, 54, 1, 1500, 1200, NULL, NULL),
(55, 55, 1, 1300, 1100, NULL, NULL),
(56, 56, 1, 1400, 1200, NULL, NULL),
(57, 57, 1, 2000, 1900, NULL, NULL),
(58, 58, 1, 1250, 1000, NULL, NULL),
(59, 59, 1, 1900, 1500, NULL, NULL),
(60, 60, 1, 2000, 1700, NULL, NULL),
(61, 61, 1, 1900, 1500, NULL, NULL),
(62, 62, 1, 1300, 1100, NULL, NULL),
(63, 63, 1, 1300, 1100, NULL, NULL),
(64, 64, 1, 1300, 1100, NULL, NULL),
(65, 65, 1, 1300, 1100, NULL, NULL),
(66, 66, 1, 1300, 1100, NULL, NULL),
(67, 67, 1, 1300, 1100, NULL, NULL),
(68, 68, 1, 1300, 1100, NULL, NULL),
(69, 69, 1, 700, 6500, NULL, NULL),
(70, 70, 1, 1200, 1100, NULL, NULL),
(71, 71, 1, 1500, 1300, NULL, NULL),
(72, 72, 1, 1700, 1650, NULL, NULL),
(73, 73, 1, 1000, 900, NULL, NULL),
(74, 74, 1, 1100, 900, NULL, NULL),
(75, 75, 1, 1500, 1200, NULL, NULL),
(76, 76, 1, 1100, 900, NULL, NULL),
(77, 77, 1, 700, 500, NULL, NULL),
(78, 78, 1, 2000, 1900, NULL, NULL),
(79, 79, 1, 1300, 1100, NULL, NULL),
(80, 80, 1, 700, 6500, NULL, NULL),
(81, 81, 1, 1200, 1100, NULL, NULL),
(82, 82, 1, 1500, 1300, NULL, NULL),
(83, 83, 1, 1700, 1650, NULL, NULL),
(84, 84, 1, 1000, 900, NULL, NULL),
(85, 85, 1, 1100, 900, NULL, NULL),
(86, 86, 1, 1500, 1200, NULL, NULL),
(87, 87, 1, 1100, 900, NULL, NULL),
(88, 88, 1, 700, 500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion` tinyint(1) NOT NULL DEFAULT 0,
  `hasSpec` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `image_link1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_link2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_link3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inventory_qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `promotion`, `hasSpec`, `category_id`, `rate`, `image_link1`, `image_link2`, `image_link3`, `inventory_qty`, `created_at`, `updated_at`) VALUES
(1, 'Oat Barister', 'Some random description for the product Some random description for the product  Some random description for the product  ', 1, 0, 7, NULL, 'images/product/oat-barister.jpg', 'images/product/oat-barister.jpg', '', 99, NULL, '2020-09-09 18:12:44'),
(2, 'Stephens Cocoa', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 7, NULL, 'images/product/stephens-cocoa.jpg', 'images/product/stephens-cocoa.jpg', '', 100, NULL, NULL),
(3, 'B&G CUVEE', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 6, NULL, 'images/product/Drink.jpg', 'images/product/Drink.jpg', '', 100, NULL, NULL),
(4, 'Andre Rose', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 6, NULL, 'images/product/Drink.jpg', 'images/product/Drink.jpg', '', 100, NULL, NULL),
(5, 'Brown Bag', 'Some random description for the product Some random description for the product  Some random description for the product  ', 1, 0, 2, NULL, 'images/product/product-02.jpg', 'images/product/product-02-02.jpg', '', 100, NULL, NULL),
(6, 'Blue Long Sleeve', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 1, NULL, 'images/product/product-05.jpg', 'images/product/product-05.jpg', '', 100, NULL, NULL),
(7, 'Blue Denim Shoe', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 3, NULL, 'images/product/product-45.jpg', 'images/product/product-45-01.jpg', '', 100, NULL, NULL),
(8, 'White Skin belt', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 4, NULL, 'images/product/product-23.jpg', 'images/product/product-23.jpg', '', 100, NULL, NULL),
(9, 'Female Sneaker', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 3, NULL, 'images/product/product-21.jpg', 'images/product/product-21.jpg', '', 100, NULL, NULL),
(10, 'Flared Shirt', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 1, NULL, 'images/product/product-32-01.jpg', 'images/product/product-32-01.jpg', '', 100, NULL, NULL),
(11, 'Glasses', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 4, NULL, 'images/product/product-24.jpg', 'images/product/product-24.jpg', '', 100, NULL, NULL),
(12, 'White Polo', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 1, NULL, 'images/product/product-31.jpg', 'images/product/product-31.jpg', '', 100, NULL, NULL),
(13, 'Juice Extractor', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 9, NULL, 'images/product/juice-extractor.jpg', 'images/product/juice-extractor.jpg', '', 100, NULL, NULL),
(14, 'Skipping Rope', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 8, NULL, 'images/product/skipping-rope.jpg', 'images/product/skipping-rope.jpg', '', 100, NULL, NULL),
(15, 'Buzz Light Year', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/buzz-light-year.jpg', 'images/product/buzz-light-year.jpg', '', 100, NULL, NULL),
(16, 'Puzzle', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/puzzle-toy.jpg', 'images/product/puzzle-toy.jpg', '', 100, NULL, NULL),
(17, 'Lego Set', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/lego-set.jpg', 'images/product/lego-set.jpg', '', 100, NULL, NULL),
(18, 'Johnnie Walker', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 7, NULL, 'images/product/johnnie-walker.jpg', 'images/product/johnnie-walker.jpg', '', 100, NULL, NULL),
(19, 'Head Phone', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 4, NULL, 'images/product/headphone-01.jpg', 'images/product/headphone-02.jpg', '', 100, NULL, NULL),
(20, 'IPhone 11', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 11, NULL, 'images/product/iphone-11-01.jpg', 'images/product/iphone-11-01.jpg', '', 100, NULL, NULL),
(21, 'IPhone Airpods', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 11, NULL, 'images/product/iphone-11-airpods.jpg', 'images/product/iphone-11-airpods.jpg', '', 100, NULL, NULL),
(22, 'Samsung S9', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 10, NULL, 'images/product/samsung-s9-01.jpg', 'images/product/samsung-s9-01.jpg', '', 100, NULL, NULL),
(23, 'Samsung Charger', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 10, NULL, 'images/product/samsung-charger.jpg', 'images/product/samsung-charger.jpg', '', 100, NULL, NULL),
(24, 'Tecno Pouvoir 3 Pro', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 12, NULL, 'images/product/TECNO-Pouvoir.jpg', 'images/product/TECNO-Pouvoir.jpg', '', 100, NULL, NULL),
(25, 'Dumb Bell', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 8, NULL, 'images/product/dumb-bells.jpg', 'images/product/dumb-bells.jpg', '', 100, NULL, NULL),
(26, 'Oat Barister', 'Some random description for the product Some random description for the product  Some random description for the product  ', 1, 0, 7, NULL, 'images/product/oat-barister.jpg', 'images/product/oat-barister.jpg', '', 100, NULL, NULL),
(27, 'Stephens Cocoa', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 7, NULL, 'images/product/stephens-cocoa.jpg', 'images/product/stephens-cocoa.jpg', '', 100, NULL, NULL),
(28, 'B&G CUVEE', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 6, NULL, 'images/product/Drink.jpg', 'images/product/Drink.jpg', '', 100, NULL, NULL),
(29, 'Andre Rose', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 6, NULL, 'images/product/Drink.jpg', 'images/product/Drink.jpg', '', 100, NULL, NULL),
(30, 'Brown Bag', 'Some random description for the product Some random description for the product  Some random description for the product  ', 1, 0, 2, NULL, 'images/product/product-02.jpg', 'images/product/product-02-02.jpg', '', 100, NULL, NULL),
(31, 'Blue Long Sleeve', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 1, NULL, 'images/product/product-05.jpg', 'images/product/product-05.jpg', '', 100, NULL, NULL),
(32, 'Blue Denim Shoe', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 3, NULL, 'images/product/product-45.jpg', 'images/product/product-45-01.jpg', '', 100, NULL, NULL),
(33, 'White Skin belt', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 4, NULL, 'images/product/product-23.jpg', 'images/product/product-23.jpg', '', 100, NULL, NULL),
(34, 'Female Sneaker', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 3, NULL, 'images/product/product-21.jpg', 'images/product/product-21.jpg', '', 100, NULL, NULL),
(35, 'Flared Shirt', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 1, NULL, 'images/product/product-32-01.jpg', 'images/product/product-32-01.jpg', '', 100, NULL, NULL),
(36, 'Glasses', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 4, NULL, 'images/product/product-24.jpg', 'images/product/product-24.jpg', '', 100, NULL, NULL),
(37, 'White Polo', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 1, NULL, 'images/product/product-31.jpg', 'images/product/product-31.jpg', '', 100, NULL, NULL),
(38, 'Juice Extractor', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 9, NULL, 'images/product/juice-extractor.jpg', 'images/product/juice-extractor.jpg', '', 100, NULL, NULL),
(39, 'Skipping Rope', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 8, NULL, 'images/product/skipping-rope.jpg', 'images/product/skipping-rope.jpg', '', 100, NULL, NULL),
(40, 'Buzz Light Year', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/buzz-light-year.jpg', 'images/product/buzz-light-year.jpg', '', 100, NULL, NULL),
(41, 'Puzzle', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/puzzle-toy.jpg', 'images/product/puzzle-toy.jpg', '', 100, NULL, NULL),
(42, 'Lego Set', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/lego-set.jpg', 'images/product/lego-set.jpg', '', 100, NULL, NULL),
(43, 'Johnnie Walker', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 7, NULL, 'images/product/johnnie-walker.jpg', 'images/product/johnnie-walker.jpg', '', 100, NULL, NULL),
(44, 'Head Phone', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 4, NULL, 'images/product/headphone-01.jpg', 'images/product/headphone-02.jpg', '', 100, NULL, NULL),
(45, 'IPhone 11', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 11, NULL, 'images/product/iphone-11-01.jpg', 'images/product/iphone-11-01.jpg', '', 100, NULL, NULL),
(46, 'IPhone Airpods', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 11, NULL, 'images/product/iphone-11-airpods.jpg', 'images/product/iphone-11-airpods.jpg', '', 100, NULL, NULL),
(47, 'Samsung S9', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 10, NULL, 'images/product/samsung-s9-01.jpg', 'images/product/samsung-s9-01.jpg', '', 100, NULL, NULL),
(48, 'Samsung Charger', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 10, NULL, 'images/product/samsung-charger.jpg', 'images/product/samsung-charger.jpg', '', 100, NULL, NULL),
(49, 'Tecno Pouvoir 3 Pro', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 12, NULL, 'images/product/TECNO-Pouvoir.jpg', 'images/product/TECNO-Pouvoir.jpg', '', 100, NULL, NULL),
(50, 'Dumb Bell', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 8, NULL, 'images/product/dumb-bells.jpg', 'images/product/dumb-bells.jpg', '', 100, NULL, NULL),
(51, 'Juice Extractor', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 9, NULL, 'images/product/juice-extractor.jpg', 'images/product/juice-extractor.jpg', '', 100, NULL, NULL),
(52, 'Skipping Rope', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 8, NULL, 'images/product/skipping-rope.jpg', 'images/product/skipping-rope.jpg', '', 100, NULL, NULL),
(53, 'Buzz Light Year', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/buzz-light-year.jpg', 'images/product/buzz-light-year.jpg', '', 100, NULL, NULL),
(54, 'Puzzle', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/puzzle-toy.jpg', 'images/product/puzzle-toy.jpg', '', 100, NULL, NULL),
(55, 'Lego Set', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/lego-set.jpg', 'images/product/lego-set.jpg', '', 100, NULL, NULL),
(56, 'Johnnie Walker', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 7, NULL, 'images/product/johnnie-walker.jpg', 'images/product/johnnie-walker.jpg', '', 100, NULL, NULL),
(57, 'Head Phone', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 4, NULL, 'images/product/headphone-01.jpg', 'images/product/headphone-02.jpg', '', 100, NULL, NULL),
(58, 'IPhone 11', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 11, NULL, 'images/product/iphone-11-01.jpg', 'images/product/iphone-11-01.jpg', '', 100, NULL, NULL),
(59, 'IPhone Airpods', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 11, NULL, 'images/product/iphone-11-airpods.jpg', 'images/product/iphone-11-airpods.jpg', '', 100, NULL, NULL),
(60, 'Samsung S9', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 10, NULL, 'images/product/samsung-s9-01.jpg', 'images/product/samsung-s9-01.jpg', '', 100, NULL, NULL),
(61, 'Samsung Charger', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 10, NULL, 'images/product/samsung-charger.jpg', 'images/product/samsung-charger.jpg', '', 100, NULL, NULL),
(62, 'Tecno Pouvoir 3 Pro', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 12, NULL, 'images/product/TECNO-Pouvoir.jpg', 'images/product/TECNO-Pouvoir.jpg', '', 100, NULL, NULL),
(63, 'Dumb Bell', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 8, NULL, 'images/product/dumb-bells.jpg', 'images/product/dumb-bells.jpg', '', 100, NULL, NULL),
(64, 'Oat Barister', 'Some random description for the product Some random description for the product  Some random description for the product  ', 1, 0, 7, NULL, 'images/product/oat-barister.jpg', 'images/product/oat-barister.jpg', '', 100, NULL, NULL),
(65, 'Stephens Cocoa', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 7, NULL, 'images/product/stephens-cocoa.jpg', 'images/product/stephens-cocoa.jpg', '', 100, NULL, NULL),
(66, 'B&G CUVEE', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 6, NULL, 'images/product/Drink.jpg', 'images/product/Drink.jpg', '', 100, NULL, NULL),
(67, 'Andre Rose', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 6, NULL, 'images/product/Drink.jpg', 'images/product/Drink.jpg', '', 100, NULL, NULL),
(68, 'Brown Bag', 'Some random description for the product Some random description for the product  Some random description for the product  ', 1, 0, 2, NULL, 'images/product/product-02.jpg', 'images/product/product-02-02.jpg', '', 100, NULL, NULL),
(69, 'Blue Long Sleeve', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 1, NULL, 'images/product/product-05.jpg', 'images/product/product-05.jpg', '', 100, NULL, NULL),
(70, 'Blue Denim Shoe', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 3, NULL, 'images/product/product-45.jpg', 'images/product/product-45-01.jpg', '', 100, NULL, NULL),
(71, 'White Skin belt', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 4, NULL, 'images/product/product-23.jpg', 'images/product/product-23.jpg', '', 100, NULL, NULL),
(72, 'Female Sneaker', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 3, NULL, 'images/product/product-21.jpg', 'images/product/product-21.jpg', '', 100, NULL, NULL),
(73, 'Flared Shirt', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 1, NULL, 'images/product/product-32-01.jpg', 'images/product/product-32-01.jpg', '', 100, NULL, NULL),
(74, 'Glasses', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 4, NULL, 'images/product/product-24.jpg', 'images/product/product-24.jpg', '', 100, NULL, NULL),
(75, 'White Polo', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 1, NULL, 'images/product/product-31.jpg', 'images/product/product-31.jpg', '', 100, NULL, NULL),
(76, 'Juice Extractor', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 9, NULL, 'images/product/juice-extractor.jpg', 'images/product/juice-extractor.jpg', '', 100, NULL, NULL),
(77, 'Skipping Rope', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 8, NULL, 'images/product/skipping-rope.jpg', 'images/product/skipping-rope.jpg', '', 100, NULL, NULL),
(78, 'Buzz Light Year', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/buzz-light-year.jpg', 'images/product/buzz-light-year.jpg', '', 100, NULL, NULL),
(79, 'Puzzle', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/puzzle-toy.jpg', 'images/product/puzzle-toy.jpg', '', 100, NULL, NULL),
(80, 'Lego Set', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 5, NULL, 'images/product/lego-set.jpg', 'images/product/lego-set.jpg', '', 100, NULL, NULL),
(81, 'Johnnie Walker', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 7, NULL, 'images/product/johnnie-walker.jpg', 'images/product/johnnie-walker.jpg', '', 100, NULL, NULL),
(82, 'Head Phone', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 4, NULL, 'images/product/headphone-01.jpg', 'images/product/headphone-02.jpg', '', 100, NULL, NULL),
(83, 'IPhone 11', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 11, NULL, 'images/product/iphone-11-01.jpg', 'images/product/iphone-11-01.jpg', '', 100, NULL, NULL),
(84, 'IPhone Airpods', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 11, NULL, 'images/product/iphone-11-airpods.jpg', 'images/product/iphone-11-airpods.jpg', '', 100, NULL, NULL),
(85, 'Samsung S9', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 10, NULL, 'images/product/samsung-s9-01.jpg', 'images/product/samsung-s9-01.jpg', '', 100, NULL, NULL),
(86, 'Samsung Charger', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 10, NULL, 'images/product/samsung-charger.jpg', 'images/product/samsung-charger.jpg', '', 100, NULL, NULL),
(87, 'Tecno Pouvoir 3 Pro', 'Some random description for the product Some random description for the product  Some random description for the product  ', 0, 0, 12, NULL, 'images/product/TECNO-Pouvoir.jpg', 'images/product/TECNO-Pouvoir.jpg', '', 100, NULL, NULL),
(88, 'Dumb Bell', 'Some random description for the product ome random description for the product ome random description for the product ome random description for the product ome random description for the product', 0, 0, 8, NULL, 'images/product/dumb-bells.jpg', 'images/product/dumb-bells.jpg', '', 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `name`, `content`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'John Adekunle', 'Easy to shop on this platform, I only visit the store once in a while.', 'Student', NULL, NULL),
(2, 'Ugo Alex', 'A reliable store, I shop on this platform with assurance that i\'m getting good quality products.', 'Business Man', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `message`, `rating`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'John Adekunle', 'A good product.', 4, 1, NULL, NULL, NULL),
(2, 'Ugo Alex', 'What I expected!', 3, 2, NULL, NULL, NULL),
(3, 'Anonymous', 'Coooooool!', 5, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_letter_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_letter_msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `title`, `logo`, `about`, `footer_about`, `address`, `email`, `phone_number`, `work_hour`, `facebook`, `twitter`, `instagram`, `news_letter_title`, `news_letter_msg`, `created_at`, `updated_at`) VALUES
(1, '2K Supermart', 'images/custom/logo.png', '2k supermart is a family oriented discount store that sells everything for N2,000 and below. It’s the first of its kind in Nigeria to sell Beverages, Health and Beauty Products, Cleaning Products, Toys, Stationery, Footwear and Clothing all N2,000 and below under one roof. The flagship 2k plaza is located at 69 Alex Ekwueme Way, Kado Estate, Abuja. It comprises of a Phone Shop, Shawarma & Party Jollof Rice Stand, Smoothie & Sugar Cane Juice Stand, Ice Cream Shop, Farmer’s Market, Luggage Masters Shop, Pharmacy and Orange Discount Corner.', '2k supermart is a family oriented discount store that sells everything for N2,000 and below. It’s the first of its kind in Nigeria to sell Beverages, Health and Beauty Products, Cleaning Products, Toys, Stationery, Footwear and Clothing all N2,000 and below under one roof.', '69 Alex Ekwueme Way, Kado, Abuja', 'info@mydomain.com', '(+234) 815 237 2923', '7 Days a week from 9 am to 10 pm', 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'NEWSLETTER SIGNUP', 'Sign up for our e-mail and be the first who know our special offers! Furthermore, we will give a 15% discount on the next order after you sign up.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `isAdmin`, `email_verified_at`, `phone_number`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, '2k', 'Supermart', 'admin@2ksupermart.com', '1', NULL, NULL, NULL, '$2y$10$C0Il/6cQobkhqALemE8ZOeukU98.0WiVTxEz.U5Puth3XupROIXnK', NULL, '2020-09-09 18:27:14', '2020-09-09 18:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bannerimages`
--
ALTER TABLE `bannerimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emails_address_unique` (`address`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_parents`
--
ALTER TABLE `order_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pricelists`
--
ALTER TABLE `pricelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bannerimages`
--
ALTER TABLE `bannerimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_parents`
--
ALTER TABLE `order_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricelists`
--
ALTER TABLE `pricelists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
