-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2021 at 03:28 PM
-- Server version: 10.3.29-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubtbook_bubtbooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coursecode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyingprice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sellingprice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalquantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookpdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookpic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bookdefault.jpg',
  `view_count` int(11) NOT NULL DEFAULT 0,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookname`, `authorname`, `depname`, `semname`, `coursecode`, `buyingprice`, `sellingprice`, `totalquantity`, `bookpdf`, `bookpic`, `view_count`, `admin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Fundamentals of Electric Circuits (4th ED)', 'Alexander Sadiku', 'CSE', '2nd', 'EEE 101', '0', '0', '0', '1609396300.pdf', '1609396300.jpg', 30, 'Khaled Hassan', NULL, '2020-12-31 04:31:57', '2021-06-09 08:55:28'),
(2, 'Discrete Mathematics (7th ED)', 'Kenneth H. Rosen', 'CSE', '3rd', 'CSE 103', '0', '0', '0', '1609396859.pdf', '1609396858.jpeg', 56, 'Khaled Hassan', NULL, '2020-12-31 04:41:08', '2021-06-09 16:39:48'),
(3, 'The Complete Reference C++ (3rd ED)', 'Herbert Schildt', 'CSE', '3rd', 'CSE 121', '0', '0', '0', '1609472636.pdf', '1609472636.jpg', 26, 'Khaled Hassan', NULL, '2021-01-01 01:44:04', '2021-06-04 23:29:24'),
(4, 'Accounting Principles (12th ED)', 'Jerry Weygandt, Kimmel, Kieso', 'CSE', '3rd', 'ECO 101', '0', '0', '0', '1609472905.pdf', '1609472905.jpg', 80, 'Khaled Hassan', NULL, '2021-01-01 01:48:59', '2021-06-09 16:39:43'),
(5, 'Microeconomics', 'Michael Parkin', 'CSE', '3rd', 'ECO 101', '0', '0', '0', '1609473187.pdf', '1609473185.jpg', 16, 'Khaled Hassan', NULL, '2021-01-01 01:53:23', '2021-06-04 23:29:23'),
(6, 'Theory of Computation (3rd ED)', 'Michael Sipser', 'CSE', '4th', 'CSE 213', '0', '0', '0', '1609473605.pdf', '1609473605.jpg', 45, 'Khaled Hassan', NULL, '2021-01-01 02:00:09', '2021-06-04 23:29:33'),
(7, 'Data Structure Using C (2nd ED)', 'Reema Thareja', 'CSE', '4th', 'CSE 231', '0', '0', '0', '1609507584.pdf', '1609507584.png', 18, 'Khaled Hassan', NULL, '2021-01-01 11:26:42', '2021-06-04 23:29:34'),
(8, 'Electronic Device Circuit Theory (11th ED)', 'Boylsted', 'CSE', '4th', 'EEE 211', '0', '0', '0', '1609508390.pdf', '1609508390.jpg', 25, 'Khaled Hassan', NULL, '2021-01-01 11:40:16', '2021-06-04 23:29:35'),
(9, 'Digital Logic And Computer Design (5th Edition)', 'M. Morris Mano', 'CSE', '5th', 'CSE 206', '0', '0', '0', '1611479626.pdf', '1611479626.jpg', 17, 'Khaled Hassan', NULL, '2021-01-24 07:13:51', '2021-06-04 23:29:21'),
(10, 'Digital Systems Principles and Applications (10th ED)', 'Ronald J. Tocci', 'CSE', '5th', 'CSE 206', '0', '0', '0', '1611482914.pdf', '1611482914.png', 45, 'Khaled Hassan', NULL, '2021-01-24 08:08:42', '2021-06-04 23:29:22'),
(11, 'Data Communications and Networking (5th ED)', 'Behrouz A. Forouzan', 'CSE', '5th', 'CSE 209', '0', '0', '0', '1611577625.pdf', '1611577624.jpg', 58, 'Khaled Hassan', NULL, '2021-01-25 10:28:12', '2021-06-09 16:40:08'),
(12, 'Fundamentals of Computer Algorithms (2nd ED)', 'Horowitz Sahani', 'CSE', '5th', 'CSE 241', '0', '0', '0', '1611577987.pdf', '1611577986.jpg', 25, 'Khaled Hassan', NULL, '2021-01-25 10:33:34', '2021-06-06 20:18:41'),
(13, 'Introduction to Algorithms (2nd ED)', 'Thomas H. Cormen', 'CSE', '5th', 'CSE 241', '0', '0', '0', '1611578159.pdf', '1611578159.jpg', 15, 'Khaled Hassan', NULL, '2021-01-25 10:36:11', '2021-06-04 23:29:13'),
(14, 'Introduction to Algorithms (3rd ED)', 'Thomas H. Cormen', 'CSE', '5th', 'CSE 241', '0', '0', '0', '1611578518.pdf', '1611578518.jpeg', 38, 'Khaled Hassan', NULL, '2021-01-25 10:42:02', '2021-06-04 23:29:19'),
(15, 'Accounting Principles (12th ED)', 'Jerry Weygandt, Kimmel, Kieso', 'CSE', '6th', 'ACT 201', '0', '0', '0', '1611585149.pdf', '1611585149.jpg', 0, 'Khaled Hassan', NULL, '2021-01-25 12:33:01', '2021-01-25 12:33:01'),
(16, 'Database System Concepts (6th ED)', 'Abraham, Henry, Sudarshan', 'CSE', '6th', 'CSE 207', '0', '0', '0', '1611585533.pdf', '1611585533.jpg', 42, 'Khaled Hassan', NULL, '2021-01-25 12:39:09', '2021-06-04 23:29:37'),
(17, 'Computer Organization and Architecture (9th ED)', 'Stallings', 'CSE', '6th', 'CSE 215', '0', '0', '0', '1611586130.pdf', '1611586130.jpg', 15, 'Khaled Hassan', NULL, '2021-01-25 12:48:54', '2021-06-04 23:29:39'),
(18, 'Computer Organization and Design (5th ED)', 'Patterson Hannessy', 'CSE', '6th', 'CSE 215', '0', '0', '0', '1611586744.pdf', '1611586744.jpg', 19, 'Khaled Hassan', NULL, '2021-01-25 12:59:32', '2021-06-04 23:29:38'),
(19, 'Complex Analysis', 'A.F. Rahman', 'CSE', '5th', 'MAT 231', '0', '0', '0', '1611649876.pdf', '1611649876.jpg', 57, 'Khaled Hassan', NULL, '2021-01-26 06:31:48', '2021-06-09 16:40:01'),
(20, 'Assembly Language Programming Organization', 'C. Marut _ Y. Yu', 'CSE', '7th', 'CSE 315', '0', '0', '0', '1612096646.pdf', '1612096646.jpg', 65, 'Khaled Hassan', NULL, '2021-01-31 10:37:43', '2021-06-09 16:40:13'),
(21, 'The Intel Microprocessors (8th Ed)', 'BARRY B. BREY', 'CSE', '7th', 'CSE 315', '0', '0', '0', '1612096768.pdf', '1612096768.jpg', 57, 'Khaled Hassan', NULL, '2021-01-31 10:39:36', '2021-06-09 16:40:32'),
(22, 'System Analysis and Design (8th Edition)', 'K. Kendall and J. Kendall', 'CSE', '7th', 'CSE 317', '0', '0', '0', '1612097198.pdf', '1612097198.jpg', 125, 'Khaled Hassan', NULL, '2021-01-31 10:46:54', '2021-06-09 16:40:27'),
(23, 'Java - How To Program (9th Ed)', 'Deitel', 'CSE', '7th', 'CSE 331', '0', '0', '0', '1612097401.pdf', '1612097400.jpg', 53, 'Khaled Hassan', NULL, '2021-01-31 10:50:24', '2021-06-09 16:40:17'),
(24, 'Java - The Complete Reference (9th Ed)', 'Herbert Schildt', 'CSE', '7th', 'CSE 331', '0', '0', '0', '1612097622.pdf', '1612097622.jpg', 56, 'Khaled Hassan', NULL, '2021-01-31 10:54:22', '2021-06-09 16:40:23'),
(25, 'Operating System Concepts 9th ED', 'Abraham Silberschatz, Peter Galvin, Greg Gagne', 'CSE', '8th', 'CSE 309', '0', '0', '0', '1612097974.pdf', '1612097974.jpg', 56, 'Khaled Hassan', NULL, '2021-01-31 10:59:42', '2021-06-09 16:40:58'),
(26, 'Concrete Mathematics 2nd ED', 'Ronald L. Graham, Donald E. Knuth, Oren Patashnik', 'CSE', '8th', 'CSE 313', '0', '0', '0', '1612098219.pdf', '1612098219.jpg', 62, 'Khaled Hassan', NULL, '2021-01-31 11:03:51', '2021-06-09 16:40:44'),
(27, 'Introduction to Probability Models 9th ED', 'Sheldon M. Ross', 'CSE', '8th', 'CSE 313', '0', '0', '0', '1612098298.pdf', '1612098298.jpg', 57, 'Khaled Hassan', NULL, '2021-01-31 11:04:58', '2021-06-09 16:40:53'),
(28, 'Compilers - Principles, Techniques, and Tools 2nd ED', 'Aho, Lam, Sethi _ Ullman', 'CSE', '8th', 'CSE 323', '0', '0', '0', '1612098644.pdf', '1612098644.jpg', 54, 'Khaled Hassan', NULL, '2021-01-31 11:11:32', '2021-06-06 12:12:27'),
(29, 'Flex _ Bison', 'John R. Levine', 'CSE', '8th', 'CSE 323', '0', '0', '0', '1612098768.pdf', '1612098768.jpg', 49, 'Khaled Hassan', NULL, '2021-01-31 11:12:53', '2021-06-04 23:53:34'),
(30, 'Software Engineering - A Practitioner’s Approach 8th ED', 'Roger S. Pressman', 'CSE', '8th', 'CSE 327', '0', '0', '0', '1612099023.pdf', '1612099023.jpg', 65, 'Khaled Hassan', NULL, '2021-01-31 11:17:31', '2021-06-09 16:41:04'),
(31, 'Software Engineering 9th ED', 'Lan Somerville', 'CSE', '8th', 'CSE 327', '0', '0', '0', '1612099316.pdf', '1612099315.jpg', 151, 'Khaled Hassan', NULL, '2021-01-31 11:22:11', '2021-06-09 17:23:21'),
(32, 'Computer Networking A Top-Down Approach 6th ED', 'James F. Kurose, Keith W. Ross', 'CSE', '9th', 'CSE 319', '0', '0', '0', '1619154068.pdf', '1619154068.jpg', 9, 'Khaled Hassan', NULL, '2021-04-23 09:01:12', '2021-06-04 23:29:32'),
(33, 'Computer Networks 5th ED', 'Andrew S. Tanenbaum, David J. Wetherall', 'CSE', '9th', 'CSE 319', '0', '0', '0', '1619154180.pdf', '1619154180.jpg', 9, 'Khaled Hassan', NULL, '2021-04-23 09:03:04', '2021-06-04 23:29:27'),
(34, 'Computer Graphics C Version 2nd ED', 'Donald Hearn, M Pauline Baker', 'CSE', '9th', 'CSE 341', '0', '0', '0', '1619154529.pdf', '1619154529.jpg', 9, 'Khaled Hassan', NULL, '2021-04-23 09:08:59', '2021-06-04 23:29:30'),
(35, 'Schaum’s Outlines of Theory', 'ZHIGANG XIANG, ROY A. PLASTOCK', 'CSE', '9th', 'CSE 341', '0', '0', '0', '1619155108.pdf', '1619155108.jpg', 9, 'Khaled Hassan', NULL, '2021-04-23 09:18:50', '2021-06-04 23:29:29'),
(36, 'A Guide to Intelligent Systems 2nd ED', 'Michael Negnevitsky', 'CSE', '9th', 'CSE 351', '0', '0', '0', '1619155299.pdf', '1619155298.jpg', 9, 'Khaled Hassan', NULL, '2021-04-23 09:21:44', '2021-06-04 23:29:31'),
(37, 'Artificial Intelligence - A Modern Approach 3rd ED', 'Stuart J. Russell _ Peter Norvig', 'CSE', '9th', 'CSE 351', '0', '0', '0', '1619155516.pdf', '1619155516.jpg', 9, 'Khaled Hassan', NULL, '2021-04-23 09:25:26', '2021-06-04 23:29:33'),
(38, 'Foundations of Computational Agents', 'David L. Poole, Alan K. Mackworth', 'CSE', '9th', 'CSE 351', '0', '0', '0', '1619155622.pdf', '1619155622.jpg', 9, 'Khaled Hassan', NULL, '2021-04-23 09:27:04', '2021-06-04 23:29:29'),
(39, 'Management Information System', 'Kenneth C. Laudon, Jane P. Laudon', 'CSE', '10th', 'CSE 407', '0', '0', '0', '1619156624.pdf', '1619156624.jpg', 39, 'Khaled Hassan', NULL, '2021-04-23 09:43:55', '2021-06-09 16:34:31'),
(40, 'Principles Of Distributed Database Systems', 'M. Tamer Ozsu, Patrick Valduriez', 'CSE', '10th', 'CSE 418', '0', '0', '0', '1619156730.pdf', '1619156730.jpeg', 38, 'Khaled Hassan', NULL, '2021-04-23 09:45:32', '2021-06-06 12:16:36'),
(41, 'The 8051 Microcontroller and Embedded System', 'Muhammad Ali Mazidi, Janice Gillispie Mazidi', 'CSE', '10th', 'CSE 425', '0', '0', '0', '1619156822.pdf', '1619156822.jpg', 42, 'Khaled Hassan', NULL, '2021-04-23 09:47:03', '2021-06-09 16:38:51'),
(42, 'Cybersecurity Fundamentals', 'Mr. Md. Maruf Hassan', 'CSE', '11th', 'CSE 413', '0', '0', '0', '1619157185.pdf', '1619157185.jpg', 15, 'Khaled Hassan', NULL, '2021-04-23 09:53:07', '2021-06-09 16:38:55'),
(43, 'Fundamentals of Machine Learning', 'John D. Kelleher, Brain Mac Namee, Aoife D_Arcy', 'CSE', '11th', 'CSE 465', '0', '0', '0', '1619157455.pdf', '1619157455.jpg', 14, 'Khaled Hassan', NULL, '2021-04-23 09:57:46', '2021-06-09 16:38:59'),
(44, 'Data Mining - Concepts _ Techniques (3rd ED)', 'Jiawei Han, Micheline Kamber, Jian Pei', 'CSE', '12th', 'CSE 475', '0', '0', '0', '1619157757.pdf', '1619157757.jpg', 15, 'Khaled Hassan', NULL, '2021-04-23 10:02:43', '2021-06-09 16:39:33'),
(45, 'Pattern Classification (2nd ED)', 'Richard O. Duda, Peter E. Hart _ Dvid G. Stork', 'CSE', '12th', 'CSE 467', '0', '0', '0', '1619158129.pdf', '1619158129.jpg', 18, 'Khaled Hassan', NULL, '2021-04-23 10:08:56', '2021-06-09 16:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `senderid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sendername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiverid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `depname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `depname`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CSE', NULL, '2020-12-31 03:43:29', '2020-12-31 03:43:29'),
(2, 'BBA', NULL, '2021-01-15 07:11:53', '2021-01-15 07:11:53'),
(3, 'EEE', NULL, '2021-01-15 07:11:59', '2021-01-15 07:11:59');

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_01_064352_create_books_table', 1),
(5, '2020_10_04_010509_create_departments_table', 1),
(6, '2020_10_09_044010_create_semesters_table', 1),
(11, '2020_11_06_110925_create_notices_table', 1),
(13, '2020_12_18_165433_create_settings_table', 1),
(16, '2020_10_20_092135_create_orders_table', 2),
(17, '2020_10_27_072848_create_order_books_table', 2),
(18, '2020_10_28_121623_create_payments_table', 2),
(19, '2020_11_01_190718_create_chats_table', 2),
(20, '2020_12_08_200723_create_order_details_table', 2),
(26, '2021_01_02_195852_create_request_books_table', 3),
(27, '2021_01_02_225600_create_requests_table', 3),
(28, '2021_02_07_153015_create_sell_books_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'notice.jpg',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`, `file`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to BUBTBOOKS', 'Short Description:\r\nThere is a lack to collect departmental or non-departmental book from our varsity library due to insufficient amount of book. So, we are trying to develop a website using HTML, CSS, Java Script and\r\nMySQL database where we can read, download pdf books or buy\r\ndepartmental or non-departmental old and new version books with among ourselves.\r\n\r\nSpecial Features:\r\n1. Available All Department’s All Course books.\r\n2. Available All Department’s All Course Slides.\r\n3. Students can read books from the website or download soft copies\r\nfrom the website.\r\n4. Students also can buy books from the website.\r\n5. Students can buy old and new books from the website.\r\n6. Students can search books writing book names, department name, course code and author name.\r\n7. Live chat with the admin.', '1609399889.png', NULL, '2020-12-31 05:31:29', '2020-12-31 13:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderid` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `paymentid` bigint(20) UNSIGNED NOT NULL,
  `senderphonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trxid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentmethod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentamount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_books`
--

CREATE TABLE `order_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderid` bigint(20) UNSIGNED NOT NULL,
  `paymentid` bigint(20) UNSIGNED NOT NULL,
  `bookid` bigint(20) UNSIGNED NOT NULL,
  `bookname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookprice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('khaledbubt@gmail.com', '$2y$10$RjKm8KlA3BOc6B5vqEOZG.8fWGtTf//7ptvpQbeUX8m2oZL7RIUB2', '2020-12-31 03:31:13'),
('rakibpranto123@gmail.com', '$2y$10$Bntq4E3FKd.cIhgs6rxqjuhPZ9Ycblgr/iscBsarLDcOxq54w5SO6', '2021-01-15 12:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderid` bigint(20) UNSIGNED NOT NULL,
  `senderphonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trxid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentmethod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentamount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bubtid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coursecode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booktype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_books`
--

CREATE TABLE `request_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coursecode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookpdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookpic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bookdefault.jpg',
  `reqby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sell_books`
--

CREATE TABLE `sell_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bubtid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookpic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bookdefault.jpg',
  `authorname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coursecode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booktype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sell_books`
--

INSERT INTO `sell_books` (`id`, `name`, `bubtid`, `email`, `phonenumber`, `bookname`, `bookpic`, `authorname`, `depname`, `semname`, `coursecode`, `booktype`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Khaled Hassan', '17182103108', 'khaledbubt@gmail.com', '01733000689', 'Physics For CSE', '1614065119.jpg', 'Narciso Garcia, Arthur Damask, Steven Schwarz', 'CSE', '1st', 'PHY 101', 'Used', '40', 'Used Book For Sale', 'Published', '2021-02-23 05:25:20', '2021-02-23 05:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semname`, `depname`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1st', 'CSE', NULL, '2020-12-31 03:43:42', '2020-12-31 03:43:42'),
(2, '2nd', 'CSE', NULL, '2020-12-31 03:43:53', '2020-12-31 03:43:53'),
(3, '3rd', 'CSE', NULL, '2020-12-31 03:44:10', '2020-12-31 03:44:10'),
(4, '4th', 'CSE', NULL, '2020-12-31 03:44:18', '2020-12-31 03:44:18'),
(5, '5th', 'CSE', NULL, '2020-12-31 03:44:23', '2020-12-31 03:44:23'),
(6, '6th', 'CSE', NULL, '2020-12-31 03:44:31', '2020-12-31 03:44:31'),
(7, '7th', 'CSE', NULL, '2020-12-31 03:44:40', '2020-12-31 03:44:40'),
(8, '8th', 'CSE', NULL, '2020-12-31 03:44:49', '2020-12-31 03:44:49'),
(9, '9th', 'CSE', NULL, '2020-12-31 03:44:55', '2020-12-31 03:44:55'),
(10, '10th', 'CSE', NULL, '2020-12-31 03:45:04', '2020-12-31 03:45:04'),
(11, '11th', 'CSE', NULL, '2020-12-31 03:45:11', '2020-12-31 03:45:11'),
(12, '12th', 'CSE', NULL, '2020-12-31 03:45:17', '2020-12-31 03:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gplus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `github` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo`, `cover1`, `cover2`, `cover3`, `phonenumber`, `email`, `address`, `facebook`, `twitter`, `instagram`, `gplus`, `mail`, `github`, `created_at`, `updated_at`) VALUES
(1, 'BUBTBOOKS - BUBT Books Store', 'logo.png', 'cover1.jpg', 'cover2.jpg', 'cover3.jpg', '+8801733000689', 'admin@bubtbooks.com', 'Rupnagar R/A, Mirpur-2, Dhaka-1216', 'https://facebook.com/bubtbooks', 'https://twitter.com/KhaledH96632575', 'https://www.instagram.com/khaledhassanreza/', '#', 'admin@bubtbooks.com', 'https://github.com/khaledbubt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userpic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bubtid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intake` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userpic`, `name`, `bubtid`, `department`, `email`, `gender`, `intake`, `is_admin`, `email_verified_at`, `password`, `section`, `phonenumber`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1610724611.jpg', 'Khaled Hassan', '17182103108', 'CSE', 'khaledbubt@gmail.com', 'Male', '38', 1, NULL, '$2y$10$K4laxuFXfMKWfHGyiOc9qe.benZeNuuLS9sKOleqRW1l8JVeb5EX.', '03', '01733000689', NULL, NULL, NULL, '2021-01-15 13:30:12'),
(2, 'default.png', 'M.M.Tanvir Ahmed', '17182103099', 'CSE', 'm.m.tanvirahmedtaintsn@gmail.com', 'Male', '38', 0, NULL, '$2y$10$y/9Q.TU5B86oqoYRe3T7h.W6t4sRV8POAqDAx01GW6shlIegjXnNK', '03', '01521432632', NULL, NULL, '2021-01-01 14:12:36', '2021-01-01 14:12:36'),
(3, 'default.png', 'Saifur Rahaman Sourav', '17182103118', 'CSE', 'souravbubt01@gmail.com', 'Male', '38', 0, NULL, '$2y$10$Ux7YxFpZOhXNB2npHi1YSuFoLKtrBpIARRfY2hESVa0WpWV1uPZDS', '03', '01789014685', NULL, NULL, '2021-01-09 10:56:44', '2021-01-09 10:56:44'),
(4, 'default.png', 'Israt Jahan', '17182103090', 'CSE', 'isratjahantara29@gmail.com', 'Female', '30', 0, NULL, '$2y$10$P/Mqnxu7.Y76Xv99rivF8OpcNGTqzVSeD1ZRgzxIDBrZdgW.n8mU2', '03', '01723946694', NULL, NULL, '2021-01-09 12:08:19', '2021-01-09 12:08:19'),
(5, '1610720710.png', 'Rakibul Hassan', '17182103096', 'CSE', 'rakibpranto123@gmail.com', 'Male', '38', 0, NULL, '$2y$10$CHPUgdvW4UD5QnK.enz7e.SMVcR9CvbdfVleZ5uHKpubViIfwRZCi', '03', '01982280031', NULL, NULL, '2021-01-15 10:09:02', '2021-01-15 12:25:27'),
(6, 'default.png', 'Md. Sakim Hossain', '16173203039', 'CSE', 'sakimpranto247@gmail.com', 'Male', '27', 0, NULL, '$2y$10$fO84pJ4JzYRrtETTloRWjOkJ4TTY5ConHrBUkCrSNTdJSSHFXxzaq', '1', '01516186085', NULL, NULL, '2021-02-01 08:36:52', '2021-02-01 08:36:52'),
(7, 'default.png', 'tkbd', '12345678901', 'CSE', 'tkbd@yopmail.com', 'Male', '41', 0, NULL, '$2y$10$tENWxGUQCD0GaC7TvGLjnudhUdh14NeoQFHGu5uAL9AdGS9Z2LiFW', '1', '01234567890', NULL, '2021-02-07 15:29:39', '2021-02-04 04:21:22', '2021-02-07 15:29:39'),
(8, 'default.png', 'Nazmur Raihan', '18192103038', 'CSE', 'nazmurraihan46@gmail.com', 'Male', '41', 0, NULL, '$2y$10$PZEkmhyA.bhvMeX/2yaKHeK/R4W0yaclAiRymcH/.fiiJ0uGR0Qbm', '01', '01873927850', NULL, NULL, '2021-05-19 12:28:19', '2021-05-19 12:28:19'),
(9, 'default.png', 'Tahmid Ahmed', '17182103311', 'CSE', 'tahmid.ahmed66@gmail.com', 'Male', '38', 0, NULL, '$2y$10$pNGHHHIj8IZvwVywJalVVORDNCoRh07tF6h3sQ3DE8Ef0npxbvE06', '07', '01781997907', NULL, NULL, '2021-05-24 18:25:14', '2021-05-24 18:25:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_books`
--
ALTER TABLE `order_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_books_bookid_foreign` (`bookid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_books`
--
ALTER TABLE `request_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_books`
--
ALTER TABLE `sell_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_bubtid_unique` (`bubtid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_books`
--
ALTER TABLE `order_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_books`
--
ALTER TABLE `request_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sell_books`
--
ALTER TABLE `sell_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_books`
--
ALTER TABLE `order_books`
  ADD CONSTRAINT `order_books_bookid_foreign` FOREIGN KEY (`bookid`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
