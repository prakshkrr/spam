-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 01:11 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spam`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `image`, `color`, `created_at`, `updated_at`) VALUES
(4, 'Overpromise', '1667912004.png', '#fdba74', '2022-11-08 07:23:24', '2022-11-08 07:57:42'),
(5, 'Urgency', '1667912023.png', '#f87171', '2022-11-08 07:23:43', '2022-11-08 07:23:43'),
(6, 'Shady', '1667912040.png', '#f9a8d4', '2022-11-08 07:24:00', '2022-11-08 07:24:00'),
(7, 'Money', '1667912060.png', '#fcd34d', '2022-11-08 07:24:20', '2022-11-08 07:24:20'),
(8, 'Unnatural', '1667912180.jpeg', '#d1d5db', '2022-11-08 07:24:38', '2022-11-08 07:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_02_040423_create_categories_table', 1),
(6, '2022_11_02_040515_create_word_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prakash shrivastava', 'prakash@gmail.com', NULL, '$2y$10$mnc8s1nIgBqhi.EDRKasNOXOVti0NfUVdz.NvTXqwlo1iQLF8rHO6', 'admin', NULL, '2022-11-08 07:05:31', '2022-11-08 07:05:31'),
(2, 'Aakash kumar', 'akash@gmail.com', NULL, '$2y$10$F.erbW47VxBECNIpxwj4MuT7jrfAQt/Mfh3agrQ2fZwcrJlwxlMl6', 'user', NULL, '2022-11-08 07:05:49', '2022-11-08 07:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `wordname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `category_id`, `wordname`, `highlight`, `created_at`, `updated_at`) VALUES
(1, 5, 'Access', ' /\\baccess\\b/gi', '2022-11-08 07:29:43', '2022-11-08 07:29:43'),
(2, 5, 'Access now', ' /\\baccess now\\b/gi', '2022-11-08 07:29:56', '2022-11-08 07:29:56'),
(3, 5, 'Act', ' /\\bact\\b/gi', '2022-11-08 07:30:07', '2022-11-08 07:30:07'),
(4, 5, 'Act immediately', ' /\\bact immediately\\b/gi', '2022-11-08 07:30:22', '2022-11-08 07:30:22'),
(5, 5, 'Act now', ' /\\bact now\\b/gi', '2022-11-08 07:30:36', '2022-11-08 07:30:36'),
(6, 5, 'Act now!', ' /\\bact now!\\b/gi', '2022-11-08 07:30:48', '2022-11-08 07:30:48'),
(7, 5, 'Action', ' /\\baction\\b/gi', '2022-11-08 07:31:02', '2022-11-08 07:31:02'),
(8, 5, 'Action required', ' /\\baction required\\b/gi', '2022-11-08 07:31:17', '2022-11-08 07:31:17'),
(9, 5, 'Apply here', ' /\\bapply here\\b/gi', '2022-11-08 07:31:30', '2022-11-08 07:31:30'),
(10, 5, 'Apply now', ' /\\bapply now\\b/gi', '2022-11-08 07:31:45', '2022-11-08 07:31:45'),
(11, 5, 'Apply now!', ' /\\bapply now!\\b/gi', '2022-11-08 07:31:56', '2022-11-08 07:31:56'),
(12, 5, 'Apply online', ' /\\bapply online\\b/gi', '2022-11-08 07:32:09', '2022-11-08 07:32:09'),
(13, 5, 'ASAP', ' /\\basap\\b/gi', '2022-11-08 07:32:25', '2022-11-08 07:32:25'),
(14, 5, 'Become a member', ' /\\bbecome a member\\b/gi', '2022-11-08 07:32:41', '2022-11-08 07:32:41'),
(15, 5, 'Before it\'s too late', ' /\\bbefore it\'s too late\\b/gi', '2022-11-08 07:32:55', '2022-11-08 07:32:55'),
(16, 5, 'Being a member', ' /\\bbeing a member\\b/gi', '2022-11-08 07:33:11', '2022-11-08 07:33:11'),
(17, 5, 'Buy', ' /\\bbuy\\b/gi', '2022-11-08 07:33:20', '2022-11-08 07:33:20'),
(18, 5, 'Buy direct', ' /\\bbuy direct\\b/gi', '2022-11-08 07:33:31', '2022-11-08 07:33:31'),
(19, 5, 'Buy now', ' /\\bbuy now\\b/gi', '2022-11-08 07:35:05', '2022-11-08 07:35:05'),
(20, 5, 'Buy today', ' /\\bbuy today\\b/gi', '2022-11-08 07:35:20', '2022-11-08 07:35:20'),
(21, 5, 'Call', ' /\\bcall\\b/gi', '2022-11-08 07:35:31', '2022-11-08 07:35:31'),
(22, 5, 'Call free', ' /\\bcall free\\b/gi', '2022-11-08 07:35:43', '2022-11-08 07:35:43'),
(23, 5, 'Call free/now', ' /\\bcall free/now\\b/gi', '2022-11-08 07:35:55', '2022-11-08 07:35:55'),
(24, 5, 'Call me', ' /\\bcall me\\b/gi', '2022-11-08 07:36:11', '2022-11-08 07:36:11'),
(25, 5, 'Call now', ' /\\bcall now\\b/gi', '2022-11-08 07:36:22', '2022-11-08 07:36:22'),
(26, 5, 'Call now!', ' /\\bcall now!\\b/gi', '2022-11-08 07:36:32', '2022-11-08 07:36:32'),
(27, 5, 'Can we have a minute of your time?', ' /\\bcan we have a minute of your time?\\b/gi', '2022-11-08 07:37:12', '2022-11-08 07:37:12'),
(28, 4, 'You will not believe your eyes', ' /\\byou will not believe your eyes\\b/gi', '2022-11-08 07:38:22', '2022-11-08 07:38:22'),
(29, 6, 'You have been selected', ' /\\byou have been selected\\b/gi', '2022-11-08 07:39:23', '2022-11-08 07:39:23'),
(30, 5, 'While stocks last', ' /\\bwhile stocks last\\b/gi', '2022-11-08 07:39:48', '2022-11-08 07:39:48'),
(31, 4, 'Special promotion', ' /\\bspecial promotion\\b/gi', '2022-11-08 07:39:58', '2022-11-08 07:39:58'),
(32, 5, 'Cancel now', ' /\\bcancel now\\b/gi', '2022-11-08 07:40:09', '2022-11-08 07:40:09'),
(33, 5, 'Cancellation required', ' /\\bcancellation required\\b/gi', '2022-11-08 07:40:23', '2022-11-08 07:40:23'),
(34, 5, 'Claim now', ' /\\bclaim now\\b/gi', '2022-11-08 07:40:36', '2022-11-08 07:40:36'),
(35, 5, 'Click', ' /\\bclick\\b/gi', '2022-11-08 07:40:53', '2022-11-08 07:40:53'),
(36, 5, 'Click below', ' /\\bclick below\\b/gi', '2022-11-08 07:41:08', '2022-11-08 07:41:08'),
(37, 5, 'Click here', ' /\\bclick here\\b/gi', '2022-11-08 07:41:19', '2022-11-08 07:41:19'),
(38, 5, 'Click me to download', ' /\\bclick me to download\\b/gi', '2022-11-08 07:41:51', '2022-11-08 07:41:51'),
(39, 8, 'unnatural', ' /\\bclick now\\b/gi', '2022-11-08 07:42:06', '2022-11-08 07:42:06'),
(40, 5, 'Click this link', ' /\\bclick this link\\b/gi', '2022-11-08 07:42:21', '2022-11-08 07:42:21'),
(41, 5, 'Click to get', ' /\\bclick to get\\b/gi', '2022-11-08 07:42:33', '2022-11-08 07:42:33'),
(42, 5, 'Click to remove', ' /\\bclick to remove\\b/gi', '2022-11-08 07:42:43', '2022-11-08 07:42:43'),
(43, 5, 'Contact us immediately', ' /\\bcontact us immediately\\b/gi', '2022-11-08 07:42:59', '2022-11-08 07:42:59'),
(44, 5, 'Deal ending soon', ' /\\bdeal ending soon\\b/gi', '2022-11-08 07:43:10', '2022-11-08 07:43:10'),
(45, 5, 'Do it now', ' /\\bdo it now\\b/gi', '2022-11-08 07:43:22', '2022-11-08 07:43:22'),
(46, 5, 'Do it today', ' /\\bdo it today\\b/gi', '2022-11-08 07:43:33', '2022-11-08 07:43:33'),
(47, 5, 'Don\'t delete', ' /\\bdon\'t delete\\b/gi', '2022-11-08 07:43:44', '2022-11-08 07:43:44'),
(48, 5, 'Don\'t hesitate', ' /\\bdon\'t hesitate\\b/gi', '2022-11-08 07:43:55', '2022-11-08 07:43:55'),
(49, 5, 'Don\'t waste time', ' /\\bdon\'t waste time\\b/gi', '2022-11-08 07:44:04', '2022-11-08 07:44:04'),
(50, 5, 'Don’t delete', ' /\\bdon’t delete\\b/gi', '2022-11-08 07:44:17', '2022-11-08 07:44:17'),
(51, 5, 'Exclusive deal', ' /\\bexclusive deal\\b/gi', '2022-11-08 07:44:27', '2022-11-08 07:44:27'),
(52, 5, 'Expire', ' /\\bexpire\\b/gi', '2022-11-08 07:44:39', '2022-11-08 07:44:39'),
(53, 5, 'Expires today', ' /\\bexpires today\\b/gi', '2022-11-08 07:44:52', '2022-11-08 07:44:52'),
(54, 5, 'Final call', ' /\\bfinal call\\b/gi', '2022-11-08 07:45:08', '2022-11-08 07:45:08'),
(55, 5, 'For instant access', ' /\\bfor instant access\\b/gi', '2022-11-08 07:45:18', '2022-11-08 07:45:18'),
(56, 5, 'For Only', ' /\\bfor only\\b/gi', '2022-11-08 07:45:30', '2022-11-08 07:45:30'),
(57, 5, 'For you', ' /\\bfor you\\b/gi', '2022-11-08 07:45:40', '2022-11-08 07:45:40'),
(58, 5, 'Friday before [holiday]', ' /\\bfriday before [holiday]\\b/gi', '2022-11-08 07:45:53', '2022-11-08 07:45:53'),
(59, 5, 'Get it today', ' /\\bget it today\\b/gi', '2022-11-08 07:46:07', '2022-11-08 07:46:07'),
(60, 5, 'Get it away', ' /\\bget it away\\b/gi', '2022-11-08 07:46:19', '2022-11-08 07:46:19'),
(61, 5, 'Get it now', ' /\\bget it now\\b/gi', '2022-11-08 07:46:31', '2022-11-08 07:46:31'),
(62, 5, 'Get now', ' /\\bget now\\b/gi', '2022-11-08 07:46:40', '2022-11-08 07:46:40'),
(63, 4, 'Get paid', ' /\\bget paid\\b/gi', '2022-11-08 07:47:05', '2022-11-08 07:47:05'),
(64, 5, 'Get started', ' /\\bget started\\b/gi', '2022-11-08 07:47:17', '2022-11-08 07:47:17'),
(65, 5, 'Get started now', ' /\\bget started now\\b/gi', '2022-11-08 07:47:30', '2022-11-08 07:47:30'),
(66, 5, 'Great offer', ' /\\bgreat offer\\b/gi', '2022-11-08 07:47:40', '2022-11-08 07:47:40'),
(67, 5, 'Hurry up', ' /\\bhurry up\\b/gi', '2022-11-08 07:47:49', '2022-11-08 07:47:49'),
(68, 5, 'Immediately', ' /\\bimmediately\\b/gi', '2022-11-08 07:47:59', '2022-11-08 07:47:59'),
(69, 5, 'Info you requested', ' /\\binfo you requested\\b/gi', '2022-11-08 07:49:46', '2022-11-08 07:49:46'),
(70, 5, 'Information you requested', ' /\\binformation you requested\\b/gi', '2022-11-08 07:50:00', '2022-11-08 07:50:00'),
(71, 5, 'Instant', ' /\\binstant\\b/gi', '2022-11-08 07:50:14', '2022-11-08 07:50:14'),
(72, 5, 'Limited time', ' /\\blimited time\\b/gi', '2022-11-08 07:50:24', '2022-11-08 07:50:24'),
(73, 5, 'New customers only', ' /\\bnew customers only\\b/gi', '2022-11-08 07:50:37', '2022-11-08 07:50:37'),
(74, 5, 'Now', ' /\\bnow\\b/gi', '2022-11-08 07:50:47', '2022-11-08 07:50:47'),
(75, 5, 'Now only', ' /\\bnow only\\b/gi', '2022-11-08 07:50:59', '2022-11-08 07:50:59'),
(76, 5, 'Offer expires', ' /\\boffer expires\\b/gi', '2022-11-08 07:51:14', '2022-11-08 07:51:14'),
(77, 5, 'Once in lifetime', ' /\\bonce in lifetime\\b/gi', '2022-11-08 07:51:24', '2022-11-08 07:51:24'),
(78, 5, 'Only', ' /\\bonly\\b/gi', '2022-11-08 07:51:34', '2022-11-08 07:51:34'),
(79, 5, 'Order now', ' /\\border now\\b/gi', '2022-11-08 07:51:45', '2022-11-08 07:51:45'),
(80, 5, 'Order today', ' /\\border today\\b/gi', '2022-11-08 07:52:00', '2022-11-08 07:52:00'),
(81, 5, 'Please read', ' /\\bplease read\\b/gi', '2022-11-08 07:52:09', '2022-11-08 07:52:09'),
(82, 5, 'Purchase now', ' /\\bpurchase now\\b/gi', '2022-11-08 07:52:19', '2022-11-08 07:52:19'),
(83, 5, 'Sign up free', ' /\\bsign up free\\b/gi', '2022-11-08 07:52:27', '2022-11-08 07:52:27'),
(84, 5, 'Sign up free today', ' /\\bsign up free today\\b/gi', '2022-11-08 07:52:36', '2022-11-08 07:52:36'),
(85, 5, 'Supplies are limited', ' /\\bsupplies are limited\\b/gi', '2022-11-08 07:52:45', '2022-11-08 07:52:45'),
(86, 5, 'Take action', ' /\\btake action\\b/gi', '2022-11-08 07:52:59', '2022-11-08 07:52:59'),
(87, 5, 'Take action now', ' /\\btake action now\\b/gi', '2022-11-08 07:53:13', '2022-11-08 07:53:13'),
(88, 5, 'This won’t last', ' /\\bthis won’t last\\b/gi', '2022-11-08 07:53:25', '2022-11-08 07:53:25'),
(89, 5, 'Time limited', ' /\\btime limited\\b/gi', '2022-11-08 07:53:34', '2022-11-08 07:53:34'),
(90, 5, 'Today', ' /\\btoday\\b/gi', '2022-11-08 07:53:45', '2022-11-08 07:53:45'),
(91, 5, 'Top urgent', ' /\\btop urgent\\b/gi', '2022-11-08 07:53:57', '2022-11-08 07:53:57'),
(92, 6, 'Trial', ' /\\btrial\\b/gi', '2022-11-08 07:54:14', '2022-11-08 07:54:14'),
(93, 6, 'This is an ad', ' /\\bthis is an ad\\b/gi', '2022-11-08 07:54:27', '2022-11-08 07:54:27'),
(94, 5, 'What are you waiting for?', ' /\\bwhat are you waiting for?\\b/gi', '2022-11-08 07:54:41', '2022-11-08 07:54:41'),
(95, 5, 'While supplies last', ' /\\bwhile supplies last\\b/gi', '2022-11-08 07:54:51', '2022-11-08 07:54:51'),
(96, 5, 'You are a winner', ' /\\byou are a winner\\b/gi', '2022-11-08 07:55:03', '2022-11-08 07:55:03'),
(97, 5, 'Can’t live without', ' /\\bcan’t live without\\b/gi', '2022-11-08 07:55:15', '2022-11-08 07:55:15'),
(98, 5, 'Clearance', ' /\\bclearance\\b/gi', '2022-11-08 07:55:24', '2022-11-08 07:55:24'),
(99, 4, 'Drastically reduced', ' /\\bdrastically reduced\\b/gi', '2022-11-08 07:55:37', '2022-11-08 07:55:37'),
(100, 5, 'Important information regarding', ' /\\bimportant information regarding\\b/gi', '2022-11-08 07:56:53', '2022-11-08 07:56:53'),
(101, 4, 'One time', ' /\\bone time\\b/gi', '2022-11-08 07:57:06', '2022-11-08 07:57:06'),
(102, 4, 'Online business opportunity', ' /\\bonline business opportunity\\b/gi', '2022-11-08 07:57:25', '2022-11-08 07:57:25'),
(103, 6, '0 down', ' /\\b0 down\\b/gi', '2022-11-08 07:58:00', '2022-11-08 07:58:00'),
(104, 6, 'All', ' /\\ball\\b/gi', '2022-11-08 07:58:09', '2022-11-08 07:58:09'),
(105, 6, 'All natural', ' /\\ball natural\\b/gi', '2022-11-08 07:58:20', '2022-11-08 07:58:20'),
(106, 6, 'All natural/new', ' /\\ball natural/new\\b/gi', '2022-11-08 07:58:35', '2022-11-08 07:58:35'),
(107, 6, 'All new', ' /\\ball new\\b/gi', '2022-11-08 07:58:46', '2022-11-08 07:58:46'),
(108, 4, 'All-natural', ' /\\ball-natural\\b/gi', '2022-11-08 07:58:56', '2022-11-08 07:58:56'),
(109, 4, 'All-new', ' /\\ball-new\\b/gi', '2022-11-08 07:59:05', '2022-11-08 07:59:05'),
(110, 6, 'Allowance', ' /\\ballowance\\b/gi', '2022-11-08 07:59:14', '2022-11-08 07:59:14'),
(111, 6, 'As seen on', ' /\\bas seen on\\b/gi', '2022-11-08 07:59:29', '2022-11-08 07:59:29'),
(112, 6, 'As seen on Oprah', ' /\\bas seen on oprah\\b/gi', '2022-11-08 07:59:40', '2022-11-08 07:59:40'),
(113, 4, 'At no cost', ' /\\bat no cost\\b/gi', '2022-11-08 07:59:50', '2022-11-08 07:59:50'),
(114, 6, 'Auto email removal', ' /\\bauto email removal\\b/gi', '2022-11-08 07:59:59', '2022-11-08 07:59:59'),
(115, 6, 'Avoice bankruptcy', ' /\\bavoice bankruptcy\\b/gi', '2022-11-08 08:00:10', '2022-11-08 08:00:10'),
(116, 7, 'Money', ' /\\bmoney\\b/gi', '2022-11-22 10:42:41', '2022-11-22 10:42:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
