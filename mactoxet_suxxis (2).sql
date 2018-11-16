-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2018 at 11:26 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mactoxet_suxxis`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `careated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `parent_id`, `careated_at`) VALUES
(1, '1522070759_no_bk.jpg', 0, '2018-03-26 13:25:59'),
(2, '1522070947_download.jpg', 0, '2018-03-26 13:29:07'),
(5, '1522070990_1522070947_download.jpg', 0, '2018-03-26 13:29:50'),
(7, '1522071611_inter.jpg', 0, '2018-03-26 13:40:11'),
(12, '1522153525_Baidu-Tieba.png', 0, '2018-03-27 12:25:25'),
(27, '100x100_1522153525_Baidu-Tieba.png', 12, '2018-03-27 13:48:07'),
(28, '1522158850_download.jpg', 0, '2018-03-27 13:54:10'),
(29, '1522159034_download.jpg', 0, '2018-03-27 13:57:14'),
(30, '1522159159_images.png', 0, '2018-03-27 13:59:19'),
(31, '100x100_1522159159_images.png', 30, '2018-03-27 14:00:06'),
(32, '1522159335_inter.jpg', 0, '2018-03-27 14:02:15'),
(33, '50x50_1522159335_inter.jpg', 32, '2018-03-27 14:02:35'),
(34, '1522390048_AlecJones.jpg', 0, '2018-03-30 06:07:29'),
(35, '1522390050_AngiesList.jpg', 0, '2018-03-30 06:07:30'),
(36, '1522390051_BBB.jpg', 0, '2018-03-30 06:07:31'),
(37, '1522390052_BBBColor.gif', 0, '2018-03-30 06:07:32'),
(38, '1522390052_BBB-logo-.png', 0, '2018-03-30 06:07:32'),
(39, '1522741293_page_photo.jpg', 0, '2018-04-03 07:41:34'),
(40, '200x400_1522153525_Baidu-Tieba.png', 12, '2018-04-03 10:10:22'),
(41, '100x100_1522070759_no_bk.jpg', 1, '2018-04-03 10:11:07'),
(42, '1522752563_IMG-20180403-WA0002.jpg', 0, '2018-04-03 10:49:23'),
(43, 'x_1522070947_download.jpg', 2, '2018-04-03 10:49:42'),
(44, '100x150_1522752563_IMG-20180403-WA0002.jpg', 42, '2018-04-03 10:49:47'),
(45, '1522753489_IMG-20180325-WA0053.jpg', 0, '2018-04-03 11:04:49'),
(46, '400x500_1522753489_IMG-20180325-WA0053.jpg', 45, '2018-04-03 11:07:04'),
(47, '1523062254_AlecJones.jpg', 0, '2018-04-07 00:50:54'),
(48, '1523062255_AngiesList.jpg', 0, '2018-04-07 00:50:55'),
(49, '1523062256_BBB.jpg', 0, '2018-04-07 00:50:56'),
(50, '1523062257_BBBColor.gif', 0, '2018-04-07 00:50:57'),
(51, '1523062258_BBB-logo-.png', 0, '2018-04-07 00:50:58'),
(52, '1524422621_9B849219-2sm.jpg', 0, '2018-04-22 18:43:41'),
(53, '1524422622_9B849219-6sm.jpg', 0, '2018-04-22 18:43:42'),
(54, '1524422622_9B849219-8sm.jpg', 0, '2018-04-22 18:43:42'),
(55, '1524422622_9B849219-25sm.jpg', 0, '2018-04-22 18:43:42'),
(56, '1524422623_9B849219-27sm.jpg', 0, '2018-04-22 18:43:43'),
(57, '1524422623_9B849219-33sm.jpg', 0, '2018-04-22 18:43:43'),
(58, '1524422623_9B849219-34sm.jpg', 0, '2018-04-22 18:43:43'),
(59, '1524422623_9B849219-35sm.jpg', 0, '2018-04-22 18:43:43'),
(60, '1524422623_9B849219-36sm.jpg', 0, '2018-04-22 18:43:43'),
(61, '1524422623_9B849219-40sm.jpg', 0, '2018-04-22 18:43:43'),
(62, '1524422624_9B849219-41sm.jpg', 0, '2018-04-22 18:43:44'),
(63, '1524422956_11_main_f.jpg', 0, '2018-04-22 18:49:16'),
(105, '1524566145_girl-user.png', 0, '2018-04-24 10:35:45'),
(106, '100x100_1524566145_girl-user.png', 105, '2018-04-24 10:35:45'),
(107, '200x200_1524566145_girl-user.png', 105, '2018-04-24 10:35:45'),
(108, '1524566214_user.png', 0, '2018-04-24 10:36:54'),
(109, '100x100_1524566214_user.png', 108, '2018-04-24 10:36:54'),
(110, '200x200_1524566214_user.png', 108, '2018-04-24 10:36:54'),
(111, '300x300_1524566214_user.png', 108, '2018-04-24 10:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_admin`
--

CREATE TABLE `mlm_admin` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'no_image.jpg',
  `is_login` enum('0','1') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` varchar(100) DEFAULT NULL,
  `pro_price` varchar(100) NOT NULL,
  `days_cycle` int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_admin`
--

INSERT INTO `mlm_admin` (`id`, `f_name`, `l_name`, `email`, `username`, `password`, `image`, `is_login`, `created_at`, `last_login`, `pro_price`, `days_cycle`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1521461702images.png', NULL, '2018-02-21 13:08:09', NULL, '5', 30);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_ci_sessions`
--

CREATE TABLE `mlm_ci_sessions` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob,
  `session_id` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `last_activity` varchar(255) NOT NULL,
  `user_data` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_ci_sessions`
--

INSERT INTO `mlm_ci_sessions` (`id`, `ip_address`, `timestamp`, `data`, `session_id`, `user_agent`, `last_activity`, `user_data`) VALUES
(671, '103.83.253.176', 0, NULL, '21a3255a9871b4db304d84732f79c456', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '1538925138', ''),
(672, '52.114.14.102', 0, NULL, 'ab17cb7cd6445c40bef11f0fa888fe16', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', '1538925140', ''),
(673, '86.165.9.49', 0, NULL, '2d717af3f6869fba6bf1e78091e37d20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '1538925144', ''),
(674, '103.42.248.29', 0, NULL, '9f391ba7a39954bed9a2871a5ceee681', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '1538927022', '');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_countries`
--

CREATE TABLE `mlm_countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_countries`
--

INSERT INTO `mlm_countries` (`id`, `name`, `code`, `date`) VALUES
(1, 'Canada', 'CA', '2018-01-10 07:26:05'),
(2, 'Greece', 'GR', '2018-01-10 07:26:05'),
(3, 'Slovenia', 'SI', '2018-01-10 07:26:05'),
(4, 'Saint Lucia', 'LC', '2018-01-10 07:26:05'),
(5, 'United States', 'US', '2018-01-10 07:26:05'),
(6, 'Czech Republic', 'CZ', '2018-01-10 07:26:05'),
(7, 'Germany', 'DE', '2018-01-10 07:26:06'),
(8, 'United Kingdom', 'UK', '2018-01-10 07:26:06'),
(9, 'Albania', 'AL', '2018-01-10 07:26:06'),
(10, 'Andorra', 'AD', '2018-01-10 07:26:06'),
(11, 'Denmark', 'DK', '2018-01-10 07:26:06'),
(12, 'Antigua And Barbuda', 'AG', '2018-01-10 07:26:06'),
(13, 'Argentina', 'AR', '2018-01-10 07:26:06'),
(14, 'Austria', 'AT', '2018-01-10 07:26:06'),
(15, 'Armenia', 'AM', '2018-01-10 07:26:06'),
(16, 'Aruba', 'AW', '2018-01-10 07:26:06'),
(17, 'Australia', 'AU', '2018-01-10 07:26:06'),
(18, 'Dominican Republic', 'DO', '2018-01-10 07:26:06'),
(19, 'Ecuador', 'EC', '2018-01-10 07:26:06'),
(20, 'Egypt', 'EG', '2018-01-10 07:26:06'),
(21, 'Cameroon', 'CM', '2018-01-10 07:26:06'),
(22, 'El Salvador', 'SV', '2018-01-10 07:26:06'),
(23, 'Estonia', 'EE', '2018-01-10 07:26:06'),
(24, 'Fiji', 'FJ', '2018-01-10 07:26:06'),
(25, 'Finland', 'FI', '2018-01-10 07:26:07'),
(26, 'Azerbaijan', 'AZ', '2018-01-10 07:26:07'),
(27, 'Bahamas', 'BS', '2018-01-10 07:26:07'),
(28, 'Bahrain', 'BH', '2018-01-10 07:26:07'),
(29, 'Barbados', 'BB', '2018-01-10 07:26:07'),
(30, 'Belarus', 'BY', '2018-01-10 07:26:07'),
(31, 'Belgium', 'BE', '2018-01-10 07:26:07'),
(32, 'Bolivia', 'BO', '2018-01-10 07:26:07'),
(33, 'France', 'FR', '2018-01-10 07:26:07'),
(34, 'Brazil', 'BR', '2018-01-10 07:26:07'),
(35, 'Bulgaria', 'BG', '2018-01-10 07:26:07'),
(36, 'Cambodia', 'KH', '2018-01-10 07:26:07'),
(37, 'Cayman Islands', 'KY', '2018-01-10 07:26:07'),
(38, 'New Zealand', 'NZ', '2018-01-10 07:26:07'),
(39, 'Chile', 'CL', '2018-01-10 07:26:07'),
(40, 'China', 'CN', '2018-01-10 07:26:07'),
(41, 'Indonesia', 'ID', '2018-01-10 07:26:07'),
(42, 'Colombia', 'CO', '2018-01-10 07:26:07'),
(43, 'Costa Rica', 'CR', '2018-01-10 07:26:07'),
(44, 'Croatia', 'HR', '2018-01-10 07:26:07'),
(45, 'Cyprus', 'CY', '2018-01-10 07:26:07'),
(46, 'Georgia', 'GE', '2018-01-10 07:26:07'),
(47, 'Gibraltar', 'GI', '2018-01-10 07:26:07'),
(48, 'Grenada', 'GD', '2018-01-10 07:26:08'),
(49, 'Guadeloupe', 'GP', '2018-01-10 07:26:08'),
(50, 'Guatemala', 'GT', '2018-01-10 07:26:08'),
(51, 'Honduras', 'HN', '2018-01-10 07:26:08'),
(52, 'Hong Kong', 'HK', '2018-01-10 07:26:08'),
(53, 'Hungary', 'HU', '2018-01-10 07:26:08'),
(54, 'Iceland', 'IS', '2018-01-10 07:26:08'),
(55, 'India', 'IN', '2018-01-10 07:26:08'),
(56, 'Ireland', 'IE', '2018-01-10 07:26:08'),
(57, 'Israel', 'IL', '2018-01-10 07:26:08'),
(58, 'Italy', 'IT', '2018-01-10 07:26:08'),
(59, 'Jamaica', 'JM', '2018-01-10 07:26:08'),
(60, 'Japan', 'JP', '2018-01-10 07:26:08'),
(61, 'Jordan', 'JO', '2018-01-10 07:26:08'),
(62, 'South Korea', 'KR', '2018-01-10 07:26:08'),
(63, 'Kuwait', 'KW', '2018-01-10 07:26:08'),
(64, 'Latvia', 'LV', '2018-01-10 07:26:08'),
(65, 'Liechtenstein', 'LI', '2018-01-10 07:26:08'),
(66, 'Lithuania', 'LT', '2018-01-10 07:26:08'),
(67, 'Luxembourg', 'LU', '2018-01-10 07:26:08'),
(68, 'Macedonia', 'MK', '2018-01-10 07:26:08'),
(69, 'Malaysia', 'MY', '2018-01-10 07:26:08'),
(70, 'Malta', 'MT', '2018-01-10 07:26:09'),
(71, 'Mexico', 'MX', '2018-01-10 07:26:09'),
(72, 'Moldova', 'MD', '2018-01-10 07:26:09'),
(73, 'Monaco', 'MC', '2018-01-10 07:26:09'),
(74, 'Morocco', 'MA', '2018-01-10 07:26:09'),
(75, 'Mozambique', 'MZ', '2018-01-10 07:26:09'),
(76, 'Netherlands', 'NL', '2018-01-10 07:26:09'),
(77, 'Norway', 'NO', '2018-01-10 07:26:09'),
(78, 'Netherlands Antilles', 'AN', '2018-01-10 07:26:09'),
(79, 'Nicaragua', 'NI', '2018-01-10 07:26:09'),
(80, 'Oman', 'OM', '2018-01-10 07:26:09'),
(81, 'Panama', 'PA', '2018-01-10 07:26:09'),
(82, 'Paraguay', 'PY', '2018-01-10 07:26:09'),
(83, 'Peru', 'PE', '2018-01-10 07:26:09'),
(84, 'Philippines', 'PH', '2018-01-10 07:26:09'),
(85, 'Poland', 'PL', '2018-01-10 07:26:09'),
(86, 'Portugal', 'PT', '2018-01-10 07:26:09'),
(87, 'Puerto Rico', 'PR', '2018-01-10 07:26:09'),
(88, 'Qatar', 'QA', '2018-01-10 07:26:10'),
(89, 'Romania', 'RO', '2018-01-10 07:26:10'),
(90, 'Russia', 'RU', '2018-01-10 07:26:10'),
(91, 'San Marino', 'SM', '2018-01-10 07:26:10'),
(92, 'Serbia', 'RS', '2018-01-10 07:26:10'),
(93, 'Singapore', 'SG', '2018-01-10 07:26:10'),
(94, 'Slovakia', 'SK', '2018-01-10 07:26:10'),
(95, 'South Africa', 'ZA', '2018-01-10 07:26:10'),
(96, 'Spain', 'ES', '2018-01-10 07:26:10'),
(97, 'Sri Lanka', 'LK', '2018-01-10 07:26:10'),
(98, 'Sweden', 'SE', '2018-01-10 07:26:10'),
(99, 'Switzerland', 'CH', '2018-01-10 07:26:10'),
(100, 'Tanzania', 'TZ', '2018-01-10 07:26:10'),
(101, 'Taiwan', 'TW', '2018-01-10 07:26:10'),
(102, 'Thailand', 'TH', '2018-01-10 07:26:10'),
(103, 'Tunisia', 'TN', '2018-01-10 07:26:10'),
(104, 'Turkey', 'TR', '2018-01-10 07:26:10'),
(105, 'Turks And Caicos Islands', 'TC', '2018-01-10 07:26:10'),
(106, 'Ukraine', 'UA', '2018-01-10 07:26:10'),
(107, 'United Arab Emirates', 'AE', '2018-01-10 07:26:10'),
(108, 'Uruguay', 'UY', '2018-01-10 07:26:10'),
(109, 'US Virgin Islands', 'VI', '2018-01-10 07:26:10'),
(110, 'Uzbekistan', 'UZ', '2018-01-10 07:26:11'),
(111, 'Vanuatu', 'VU', '2018-01-10 07:26:11'),
(112, 'Venezuela', 'VE', '2018-01-10 07:26:11'),
(113, 'Vietnam', 'VN', '2018-01-10 07:26:11'),
(114, 'Bosnia And Herzegovina', 'BA', '2018-01-10 07:26:11'),
(115, 'Brunei Darussalam', 'BN', '2018-01-10 07:26:11'),
(116, 'Laos', 'LA', '2018-01-10 07:26:11'),
(117, 'Nepal', 'NP', '2018-01-10 07:26:11'),
(118, 'Ghana', 'GH', '2018-01-10 07:26:11'),
(119, 'Saudi Arabia', 'SA', '2018-01-10 07:26:11'),
(120, 'Trinidad And Tobago', 'TT', '2018-01-10 07:26:11'),
(121, 'Yemen', 'YE', '2018-01-10 07:26:11'),
(122, 'Djibouti', 'DJ', '2018-01-10 07:26:11'),
(123, 'Macau', 'MO', '2018-01-10 07:26:11'),
(124, 'Benin', 'BJ', '2018-01-10 07:26:11'),
(125, 'Swaziland', 'SZ', '2018-01-10 07:26:11'),
(126, 'Cuba', 'CU', '2018-01-10 07:26:11'),
(127, 'Myanmar', 'MM', '2018-01-10 07:26:11'),
(128, 'Martinique', 'MQ', '2018-01-10 07:26:11'),
(129, 'Maldives', 'MV', '2018-01-10 07:26:11'),
(130, 'Namibia', 'NA', '2018-01-10 07:26:11'),
(131, 'Suriname', 'SR', '2018-01-10 07:26:11'),
(132, 'Anguilla', 'AI', '2018-01-10 07:26:11'),
(133, 'Saint Kitts And Nevis', 'KN', '2018-01-10 07:26:11'),
(134, 'Montenegro', 'ME', '2018-01-10 07:26:11'),
(135, 'Belize', 'BZ', '2018-01-10 07:26:12'),
(136, 'Eritrea', 'ER', '2018-01-10 07:26:12'),
(137, 'Kazakhstan', 'KZ', '2018-01-10 07:26:12'),
(138, 'Kenya', 'KE', '2018-01-10 07:26:12'),
(139, 'Lebanon', 'LB', '2018-01-10 07:26:12'),
(140, 'Pakistan', 'PK', '2018-01-10 07:26:12'),
(141, 'Papua New Guinea', 'PG', '2018-01-10 07:26:12'),
(142, 'French Polynesia', 'PF', '2018-01-10 07:26:12'),
(143, 'Zambia', 'ZM', '2018-01-10 07:26:12'),
(144, 'Algeria', 'DZ', '2018-01-10 07:26:12'),
(145, 'Zimbabwe', 'ZW', '2018-01-10 07:26:12'),
(146, 'Bermuda', 'BM', '2018-01-10 07:26:12'),
(147, 'Botswana', 'BW', '2018-01-10 07:26:12'),
(148, 'Burkina Faso', 'BF', '2018-01-10 07:26:12'),
(149, 'Uganda', 'UG', '2018-01-10 07:26:12'),
(150, 'Cape Verde', 'CV', '2018-01-10 07:26:12'),
(151, 'Syrian Arab Republic', 'SY', '2018-01-10 07:26:12'),
(152, 'New Caledonia', 'NC', '2018-01-10 07:26:12'),
(153, 'Palau', 'PW', '2018-01-10 07:26:12'),
(154, 'Reunion', 'RE', '2018-01-10 07:26:12'),
(155, 'Mauritius', 'MU', '2018-01-10 07:26:12'),
(156, 'Mali', 'ML', '2018-01-10 07:26:12'),
(157, 'Malawi', 'MW', '2018-01-10 07:26:13'),
(158, 'Madagascar', 'MG', '2018-01-10 07:26:13'),
(159, 'Libyan Arab Jamahiriya', 'LY', '2018-01-10 07:26:13'),
(160, 'Iran', 'IR', '2018-01-10 07:26:13'),
(161, 'Gambia', 'GM', '2018-01-10 07:26:13'),
(162, 'Saint Martin', 'MF', '2018-01-10 07:26:13'),
(163, 'Senegal', 'SN', '2018-01-10 07:26:13'),
(164, 'Seychelles', 'SC', '2018-01-10 07:26:13'),
(165, 'Angola', 'AO', '2018-01-10 07:26:13'),
(166, 'British Virgin Islands', 'VG', '2018-01-10 07:26:13'),
(167, 'Saint Vincent And The Grenadines', 'VC', '2018-01-10 07:26:13'),
(168, 'Equatorial Guinea', 'GQ', '2018-01-10 07:26:13'),
(169, 'Gabon', 'GA', '2018-01-10 07:26:13'),
(170, 'Bangladesh', 'BD', '2018-01-10 07:26:13'),
(171, 'Ethiopia', 'ET', '2018-01-10 07:26:13'),
(172, 'Guam', 'GU', '2018-01-10 07:26:13'),
(173, 'Nigeria', 'NG', '2018-01-10 07:26:13'),
(174, 'Dominica', 'DM', '2018-01-10 07:26:13'),
(175, 'Faroe Islands', 'FO', '2018-01-10 07:26:13'),
(176, 'Rwanda', 'RW', '2018-01-10 07:26:13'),
(177, 'Burundi', 'BI', '2018-01-10 07:26:13'),
(178, 'Cook Islands', 'CK', '2018-01-10 07:26:13'),
(179, 'Kyrgyzstan', 'KG', '2018-01-10 07:26:13'),
(180, 'Tajikistan', 'TJ', '2018-01-10 07:26:13'),
(181, 'Greenland', 'GL', '2018-01-10 07:26:14'),
(182, 'Haiti', 'HT', '2018-01-10 07:26:14'),
(183, 'Iraq', 'IQ', '2018-01-10 07:26:14'),
(184, 'Liberia', 'LR', '2018-01-10 07:26:14'),
(185, 'Palestinian Territory', 'PS', '2018-01-10 07:26:14'),
(186, 'Micronesia', 'FM', '2018-01-10 07:26:14'),
(187, 'Sudan', 'SD', '2018-01-10 07:26:14'),
(188, 'Northern Mariana Islands', 'MP', '2018-01-10 07:26:14'),
(189, 'Sao Tome And Principe', 'ST', '2018-01-10 07:26:14'),
(190, 'Saint Barthelemy', 'BL', '2018-01-10 07:26:14'),
(191, 'Mauritania', 'MR', '2018-01-10 07:26:14'),
(192, 'Guinea', 'GN', '2018-01-10 07:26:14'),
(193, 'Guinea-Bissau', 'GW', '2018-01-10 07:26:14'),
(194, 'French Guiana', 'GF', '2018-01-10 07:26:14'),
(195, 'Samoa', 'WS', '2018-01-10 07:26:14'),
(196, 'Tonga', 'TO', '2018-01-10 07:26:14'),
(197, 'Afghanistan', 'AF', '2018-01-10 07:26:14'),
(198, 'Guyana', 'GY', '2018-01-10 07:26:14'),
(199, 'American Samoa', 'AS', '2018-01-10 07:26:14'),
(200, 'Bhutan', 'BT', '2018-01-10 07:26:14'),
(201, 'Lesotho', 'LS', '2018-01-10 07:26:15'),
(202, 'Mongolia', 'MN', '2018-01-10 07:26:15'),
(203, 'Norfolk Island', 'NF', '2018-01-10 07:26:15'),
(204, 'Svalbard And Jan Mayen', 'SJ', '2018-01-10 07:26:15'),
(205, 'Togo', 'TG', '2018-01-10 07:26:15'),
(206, 'Turkmenistan', 'TM', '2018-01-10 07:26:15'),
(207, 'Comoros', 'KM', '2018-01-10 07:26:15'),
(208, 'Jersey', 'JE', '2018-01-10 07:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_downline`
--

CREATE TABLE `mlm_downline` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_downline`
--

INSERT INTO `mlm_downline` (`id`, `user_id`, `child_id`, `status`, `created_at`) VALUES
(4, 1, 7, 0, '2018-04-11 06:50:38'),
(20, 7, 10, 0, '2018-04-11 06:50:38'),
(21, 7, 11, 0, '2018-04-11 06:50:38'),
(22, 10, 21, 0, '2018-04-11 06:50:38'),
(23, 10, 22, 0, '2018-04-11 06:50:38'),
(24, 11, 18, 0, '2018-04-11 06:50:38'),
(25, 11, 19, 0, '2018-04-11 06:50:38'),
(26, 21, 23, 0, '2018-04-11 06:50:38'),
(27, 21, 24, 0, '2018-04-11 06:50:38'),
(28, 22, 25, 0, '2018-05-10 12:01:45'),
(29, 22, 26, 0, '2018-05-10 12:02:35'),
(30, 18, 27, 0, '2018-05-10 12:04:29'),
(31, 18, 28, 0, '2018-05-10 12:05:31'),
(32, 19, 29, 0, '2018-05-10 12:06:52'),
(33, 19, 30, 0, '2018-05-10 12:08:08'),
(34, 23, 31, 0, '2018-05-10 13:09:22'),
(35, 23, 32, 0, '2018-05-10 13:10:50'),
(36, 24, 33, 0, '2018-05-11 06:38:45'),
(37, 24, 34, 0, '2018-05-11 06:39:49'),
(38, 25, 35, 0, '2018-05-11 07:10:46'),
(39, 25, 36, 0, '2018-05-11 07:11:40'),
(40, 26, 37, 0, '2018-05-11 09:22:03'),
(41, 26, 38, 0, '2018-05-11 09:22:51'),
(42, 31, 39, 0, '2018-05-11 13:08:17'),
(43, 31, 40, 0, '2018-05-11 13:09:15'),
(44, 32, 41, 0, '2018-05-11 13:12:02'),
(45, 32, 42, 0, '2018-05-11 13:12:53'),
(46, 33, 43, 0, '2018-05-14 06:20:43'),
(47, 33, 44, 0, '2018-05-14 06:22:03'),
(49, 1, 46, 0, '2018-05-18 12:16:28'),
(52, 46, 49, 0, '2018-05-18 12:35:56'),
(53, 46, 50, 0, '2018-05-18 12:38:14'),
(54, 34, 51, 0, '2018-05-21 07:48:32'),
(55, 34, 52, 0, '2018-05-21 08:15:39'),
(60, 35, 59, 0, '2018-05-22 09:50:23'),
(61, 35, 60, 0, '2018-05-22 09:51:41'),
(62, 1, 61, 0, '2018-06-02 09:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_images`
--

CREATE TABLE `mlm_images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `careated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_images`
--

INSERT INTO `mlm_images` (`id`, `name`, `parent_id`, `careated_at`) VALUES
(1, '1522070759_no_bk.jpg', 0, '2018-03-26 13:25:59'),
(2, '1522070947_download.jpg', 0, '2018-03-26 13:29:07'),
(3, '1522070990_1522070571_no_bk.jpg', 0, '2018-03-26 13:29:50'),
(4, '1522070990_1522070759_no_bk.jpg', 0, '2018-03-26 13:29:50'),
(5, '1522070990_1522070947_download.jpg', 0, '2018-03-26 13:29:50'),
(7, '1522071611_inter.jpg', 0, '2018-03-26 13:40:11'),
(12, '1522153525_Baidu-Tieba.png', 0, '2018-03-27 12:25:25'),
(23, '75x50_1522153525_Baidu-Tieba.png', 12, '2018-03-27 13:27:59'),
(24, '75x50_1522071611_inter.jpg', 7, '2018-03-27 13:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_loan_cost`
--

CREATE TABLE `mlm_loan_cost` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `cost` varchar(100) DEFAULT NULL,
  `limit` varchar(100) DEFAULT NULL,
  `loan_allowed` int(11) NOT NULL,
  `min_lend_required` int(11) NOT NULL,
  `max_period` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_loan_cost`
--

INSERT INTO `mlm_loan_cost` (`id`, `name`, `level`, `cost`, `limit`, `loan_allowed`, `min_lend_required`, `max_period`, `rate`, `created_at`) VALUES
(1, '7.1', 'Executive', '', '1500', 1, 2, '60', '12', '2018-05-14 10:35:38'),
(2, '7.2', 'Super Executive', '150', '3000', 2, 3, '90', '18', '2018-05-14 10:35:38'),
(3, '7.3', 'Presidential', '300', '5000', 3, 0, '120', '35', '2018-05-14 10:35:38'),
(4, '7', 'Executive', NULL, '1500', 1, 2, '60', '12', '2018-05-14 10:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_loan_distribution`
--

CREATE TABLE `mlm_loan_distribution` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `wallet_address` varchar(500) DEFAULT NULL,
  `txn_hash` varchar(500) DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `receiver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_loan_distribution`
--

INSERT INTO `mlm_loan_distribution` (`id`, `sender_id`, `wallet_address`, `txn_hash`, `amount`, `status`, `receiver_id`, `created_at`) VALUES
(1, 7, '123b5E9SUQBzP87g9tcNB9N2ghghgub', '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', '750', 1, 10, '2018-06-28 10:49:42'),
(2, 10, '35eMb5E9SUQBzP87g9tcNB9N2ghghgub', '35eMb5E9SUQBzP87g9th78df56dsf6', '840', 1, 7, '2018-06-28 10:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_loan_invest`
--

CREATE TABLE `mlm_loan_invest` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_loan_invest`
--

INSERT INTO `mlm_loan_invest` (`id`, `sender_id`, `status`, `created_at`) VALUES
(7, 7, 1, '2018-06-26 12:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_loan_payment`
--

CREATE TABLE `mlm_loan_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_address` varchar(500) DEFAULT NULL,
  `txn_hash` varchar(500) DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  `due_amount` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `lender_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_loan_payment`
--

INSERT INTO `mlm_loan_payment` (`id`, `user_id`, `wallet_address`, `txn_hash`, `amount`, `duration`, `rate`, `due_amount`, `status`, `lender_id`, `created_at`, `updated_at`) VALUES
(7, 10, '', '', '750', '30', '12', '840', 3, 7, '2018-06-26 12:35:59', '2018-06-26 12:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_matrix`
--

CREATE TABLE `mlm_matrix` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `profit` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `invest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_matrix`
--

INSERT INTO `mlm_matrix` (`id`, `user_id`, `level`, `profit`, `deposit`, `income`, `invest`) VALUES
(1, 1, '3', NULL, NULL, NULL, 40),
(16, 7, '7', NULL, NULL, NULL, 40),
(23, 11, '2', NULL, NULL, NULL, 21),
(24, 10, '7', NULL, NULL, NULL, 40),
(25, 21, '2', NULL, NULL, NULL, 21),
(26, 22, '2', NULL, NULL, NULL, 21),
(27, 18, '2', NULL, NULL, NULL, 21),
(28, 19, '2', NULL, NULL, NULL, 21),
(29, 23, '2', NULL, NULL, NULL, 21),
(30, 24, '2', NULL, NULL, NULL, 21),
(31, 25, '2', NULL, NULL, NULL, 21),
(32, 26, '2', NULL, NULL, NULL, 21),
(33, 27, '1', NULL, NULL, NULL, 11),
(34, 28, '1', NULL, NULL, NULL, 11),
(35, 29, '1', NULL, NULL, NULL, 11),
(36, 30, '1', NULL, NULL, NULL, 11),
(37, 31, '2', NULL, NULL, NULL, 21),
(38, 32, '2', NULL, NULL, NULL, 21),
(39, 33, '2', NULL, NULL, NULL, 21),
(40, 34, '1', NULL, NULL, NULL, 11),
(41, 35, '1', NULL, NULL, NULL, 11),
(42, 36, '1', NULL, NULL, NULL, 11),
(43, 37, '1', NULL, NULL, NULL, 11),
(44, 38, '1', NULL, NULL, NULL, 11),
(45, 39, '1', NULL, NULL, NULL, 11),
(46, 40, '1', NULL, NULL, NULL, 11),
(47, 41, '1', NULL, NULL, NULL, 11),
(48, 42, '1', NULL, NULL, NULL, 11),
(49, 43, '1', NULL, NULL, NULL, 11),
(50, 44, '1', NULL, NULL, NULL, 11),
(52, 46, '2', NULL, NULL, NULL, 21);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_news`
--

CREATE TABLE `mlm_news` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_news`
--

INSERT INTO `mlm_news` (`id`, `title`, `description`, `user_id`, `created_at`) VALUES
(1, 'test', '<p>this is testing</p>\n', 1, '2018-04-17 07:20:01'),
(5, 'Earn-1000$-every-month', '<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p><p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n<p>Earn 1000$ every month&nbsp;Earn 1000$ every month&nbsp;Earn 1000$ every month</p>\n\n', 1, '2018-04-17 07:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_notifications`
--

CREATE TABLE `mlm_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_notifications`
--

INSERT INTO `mlm_notifications` (`id`, `user_id`, `text`, `url`, `status`, `created_at`) VALUES
(1, 34, 'New User added to your downline.', 'referal_link/my_referal', 1, '2018-05-21 07:48:32'),
(2, 34, 'New User added to your downline.', 'referal_link/my_referal', 1, '2018-05-21 08:15:39'),
(12, 1, 'New User added to your downline.', 'referal_link/my_referal', 0, '2018-06-02 09:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_pages`
--

CREATE TABLE `mlm_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_pages`
--

INSERT INTO `mlm_pages` (`id`, `title`, `description`, `email`, `phone`, `created_at`) VALUES
(1, 'about-us', '<p><strong>About Us</strong></p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n', '', '', '2018-03-20 05:53:24'),
(2, 'contact-us', '<p><strong>Address</strong></p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n\n<p>Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;Lorem Epsum&nbsp;</p>\n', 'info@suxxis.com', '9876543210', '2018-03-20 05:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_support`
--

CREATE TABLE `mlm_support` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_support`
--

INSERT INTO `mlm_support` (`id`, `question`, `answer`, `created_at`) VALUES
(1, 'How to earn maximum from suxxis?', '<p>Earn maximum Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.</p>\n', '2018-05-19 07:26:58'),
(2, 'when I get paid from downline', ' Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '2018-05-19 07:26:58'),
(3, 'What if i have not paid monthly subscription?', ' Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', '2018-05-19 07:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_testimonial`
--

CREATE TABLE `mlm_testimonial` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_testimonial`
--

INSERT INTO `mlm_testimonial` (`id`, `user_id`, `text`, `created_at`) VALUES
(1, 31, 'Lorem ipsum pharetra lorem felis. Aliquam egestas consectetur elementum class aptentea taciti sociosqu ad litora torquent perea conubia nostra lorem consectetur adipiscing elit. Donec vestibulum justo a diam ultricies pellentesque.', '2018-05-16 05:50:57'),
(2, 39, 'Lorem ipsum pharetra lorem felis. Aliquam egestas consectetur elementum class aptentea taciti sociosqu ad litora torquent perea conubia nostra lorem consectetur adipiscing elit. Donec vestibulum justo a diam ultricies pellentesque.', '2018-05-19 06:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_tutorial`
--

CREATE TABLE `mlm_tutorial` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_tutorial`
--

INSERT INTO `mlm_tutorial` (`id`, `title`, `link`, `user_id`, `created_at`) VALUES
(4, 'Suxxis explained in 10 minutes', 'https://www.youtube.com/embed/eRF8ELEa8PQ', 1, '2018-05-04 06:41:15'),
(5, 'How suxxis works?', 'https://www.youtube.com/embed/_py60efrzhM', 1, '2018-05-04 06:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_upgrade_cost`
--

CREATE TABLE `mlm_upgrade_cost` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `limit` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_upgrade_cost`
--

INSERT INTO `mlm_upgrade_cost` (`id`, `name`, `level`, `cost`, `limit`, `created_at`) VALUES
(1, 'level1', 'Level 1', '11', NULL, '2018-03-19 13:07:36'),
(2, 'level2', 'Level 2', '21', NULL, '2018-03-19 13:07:43'),
(3, 'level3', 'Level 3', '40', NULL, '2018-03-19 13:07:51'),
(4, 'level4', 'Level 4', '100', NULL, '2018-03-19 13:07:58'),
(5, 'level5', 'Level 5', '200', NULL, '2018-03-19 13:09:14'),
(6, 'level6', 'Level 6', '500', NULL, '2018-03-19 13:09:22'),
(7, 'level7', 'Level 7', '1000', NULL, '2018-03-19 13:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_users`
--

CREATE TABLE `mlm_users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `image` varchar(100) NOT NULL DEFAULT 'no_image.jpg',
  `referal_link` varchar(255) DEFAULT NULL COMMENT 'free or pro',
  `show_email` int(11) NOT NULL DEFAULT '1',
  `show_avatar` int(11) NOT NULL DEFAULT '1',
  `show_links` int(11) NOT NULL DEFAULT '1',
  `show_skype` int(11) NOT NULL DEFAULT '1',
  `show_phone` int(11) NOT NULL DEFAULT '1',
  `send_referal_email` int(11) NOT NULL DEFAULT '0',
  `send_donation_submitted_email` int(11) NOT NULL DEFAULT '0',
  `send_donation_approved_email` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL,
  `is_verified` enum('0','1') NOT NULL DEFAULT '1',
  `key` varchar(255) DEFAULT NULL,
  `is_login` enum('0','1') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` varchar(100) DEFAULT NULL,
  `total_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_users`
--

INSERT INTO `mlm_users` (`id`, `f_name`, `l_name`, `email`, `phone`, `gender`, `dob`, `country`, `username`, `password`, `image`, `referal_link`, `show_email`, `show_avatar`, `show_links`, `show_skype`, `show_phone`, `send_referal_email`, `send_donation_submitted_email`, `send_donation_approved_email`, `parent_id`, `is_verified`, `key`, `is_login`, `created_at`, `last_login`, `total_views`) VALUES
(1, 'admin', '', 'admin@gmail.com', NULL, NULL, NULL, NULL, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1521547930download.jpg', '5acdad957714c', 1, 1, 1, 1, 1, 0, 0, 0, 1, '1', '9fc3ac7e32fdf99a826a0cdcbf5c3b96', NULL, '2018-02-21 13:08:09', NULL, 101),
(7, 'parvez', 'khan', 'mss.parvezkhan@gmail.com', '9876543210', 'Male', '05/29/2018', 'Australia', 'parvezkhan', 'e10adc3949ba59abbe56e057f20f883e', '1525428259user.png', '5acdb1c7ad860', 1, 1, 1, 1, 1, 1, 0, 0, 1, '1', '47f6656c57f43dd51b1b4497319c7ede', NULL, '2018-04-11 06:47:56', NULL, 0),
(10, 'A', 'A', 'a@gmail.com', NULL, NULL, NULL, NULL, 'user_A', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5acdb1c7ad861', 1, 1, 1, 1, 1, 0, 0, 0, 7, '1', 'f29db1d35193375b2ee52c797aef2206', NULL, '2018-04-11 07:55:48', NULL, 0),
(11, 'B', 'B', 'b@gmail.com', NULL, NULL, NULL, NULL, 'user_B', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af14fed713c9', 1, 1, 1, 1, 1, 0, 0, 0, 7, '1', '238bd3774ccc0071114773a083cdbae9', NULL, '2018-04-11 08:03:45', NULL, 0),
(18, 'E', 'E', 'e@gmail.com', NULL, 'Male', '05/17/2018', 'Antigua And Barbuda', 'user_E', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af1a9c632d21', 1, 1, 1, 1, 1, 0, 0, 0, 11, '1', '0a114bc1ba5ea060638941de8e50a539', NULL, '2018-05-08 12:52:37', NULL, 0),
(19, 'F', 'F', 'f@gmail.com', NULL, 'Female', '05/17/2018', 'Antigua And Barbuda', 'user_F', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af4359f25d74', 1, 1, 1, 1, 1, 0, 0, 0, 11, '1', '035b2e10c971fc41f8b430e38a594fe6', NULL, '2018-05-08 12:55:31', NULL, 0),
(20, 'test', 'test', 'test@gmail.com', NULL, NULL, NULL, NULL, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 1, '1', 'f29db1d35193375b2ee52c797aef2206', NULL, '2018-04-11 07:55:48', NULL, 0),
(21, 'C', 'C', 'c@gmail.com', NULL, 'Male', '05/24/2018', 'Austria', 'user_C', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af43079d3fe8', 1, 1, 1, 1, 1, 0, 0, 0, 10, '1', '2b463d69e29467ba3979afa0cda488e6', NULL, '2018-05-08 19:09:10', NULL, 0),
(22, 'D', 'D', 'd@gmail.com', NULL, 'Female', '05/10/2012', 'Indonesia', 'user_D', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af4328b423c5', 1, 1, 1, 1, 1, 0, 0, 0, 10, '1', 'c88a81a1049e2dcf999089a6b24420ca', NULL, '2018-05-08 19:10:41', NULL, 0),
(23, 'G', 'G', 'g@gmail.com', NULL, 'Male', '05/24/2018', 'Antigua And Barbuda', 'user_G', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af444406ec87', 0, 1, 1, 1, 1, 0, 0, 0, 21, '1', 'ab0b278b39ecd5757c3764c881d4ce6b', NULL, '2018-05-09 15:02:00', NULL, 0),
(24, 'H', 'H', 'h@gmail.com', NULL, 'Female', '03/20/2018', 'New Zealand', 'user_H', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af53a25dbbd6', 1, 1, 1, 1, 1, 0, 0, 0, 21, '1', '2817acbc6b24b0df16feedfe2c3effb4', NULL, '2018-05-09 15:03:09', NULL, 0),
(25, 'i', 'i', 'i@gmail.com', NULL, 'Female', '05/23/2018', 'Indonesia', 'user_I', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af541ae66a67', 1, 1, 1, 1, 1, 0, 0, 0, 22, '1', '7befc7f35ba9f6084012ae3c8f3e2a0a', NULL, '2018-05-10 17:31:45', NULL, 0),
(26, 'j', 'j', 'j@gmail.com', NULL, 'Male', '05/18/2016', 'Chile', 'user_J', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af5603850104', 1, 1, 1, 1, 1, 0, 0, 0, 22, '1', '0fe227c394ecb4c357e8351e2fd4268e', NULL, '2018-05-10 17:32:35', NULL, 0),
(27, 'k', 'k', 'k@gmail.com', NULL, 'Female', '10/16/2018', 'Australia', 'user_K', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 18, '1', '7e3a475d077c15b7e733651226172a34', NULL, '2018-05-10 17:34:29', NULL, 0),
(28, 'L', 'L', 'l@gmail.com', NULL, 'Male', '05/09/2018', 'Azerbaijan', 'user_L', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 18, '1', '449c41316eb3cd86512c1140a29c7ec4', NULL, '2018-05-10 17:35:31', NULL, 0),
(29, 'M', 'M', 'm@gmail.com', NULL, 'Female', '03/27/2018', 'Israel', 'user_M', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 19, '1', '3e034c8ccde0bba74a8a9c13f17246c1', NULL, '2018-05-10 17:36:52', NULL, 0),
(30, 'N', 'N', 'n@gmail.com', NULL, 'Male', '05/24/2018', 'Liechtenstein', 'user_N', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 19, '1', 'c9f4ada6b2700193a0c4b05f2e0c73ed', NULL, '2018-05-10 17:38:08', NULL, 0),
(31, 'O', 'O', 'o@gmail.com', NULL, 'Female', '05/29/2018', 'Croatia', 'user_O', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af5957430e5c', 1, 1, 0, 0, 1, 1, 0, 1, 23, '1', 'c9281952746a2e185a9740c882df47cf', NULL, '2018-05-10 18:39:22', NULL, 0),
(32, 'P', 'P', 'p@gmail.com', NULL, 'Male', '05/18/2005', 'Dominican Republic', 'user_P', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af5964634595', 1, 1, 1, 1, 1, 0, 0, 0, 23, '1', '9721a695255ebe1bd6060d318bb41842', NULL, '2018-05-10 18:40:50', NULL, 0),
(33, 'Q', 'Q', 'q@gmail.com', NULL, 'Female', '05/10/2017', 'Estonia', 'user_Q', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5af92a587bb3f', 1, 1, 1, 1, 1, 0, 0, 0, 24, '1', 'e804f9cb6789a0fde50cfc784c45a057', NULL, '2018-05-11 12:08:45', NULL, 0),
(34, 'R', 'R', 'r@gmail.com', NULL, 'Male', '05/25/2018', 'Bolivia', 'user_R', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5b026bcf2f2d3', 1, 1, 1, 1, 1, 0, 0, 0, 24, '1', '1814666b4290b957b02227f67578cc34', NULL, '2018-05-11 12:09:49', NULL, 0),
(35, 'S', 'S', 's@gmail.com', NULL, 'Male', '05/19/2010', 'Czech Republic', 'user_S', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5b02a50eaf736', 1, 1, 1, 1, 1, 0, 0, 0, 25, '1', '3341ae9c2e3fdd71383398806a589108', NULL, '2018-05-11 12:40:46', NULL, 0),
(36, 'T', 'T', 't@gmail.com', NULL, 'Female', '05/22/2018', 'Antigua And Barbuda', 'user_T', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 25, '1', '1df755c2d6e69dfb405ab203d998846c', NULL, '2018-05-11 12:41:40', NULL, 0),
(37, 'U', 'U', 'u@gmail.com', NULL, 'Male', '05/30/2018', 'Bahamas', 'user_U', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 26, '1', '3723defafcceb94823cf41271bb22875', NULL, '2018-05-11 14:52:03', NULL, 0),
(38, 'V', 'V', 'v@gmail.com', NULL, 'Female', '05/17/2018', 'Australia', 'user_V', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 26, '1', 'cf1154145d73133185cdb15fead6fec4', NULL, '2018-05-11 14:52:51', NULL, 0),
(39, 'AA', 'AA', 'aa@gmail.com', NULL, 'Female', '05/22/2010', 'Bulgaria', 'user_AA', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 0, 0, 0, 1, 1, 1, 1, 31, '1', 'fabbfc0ff0dcbdf2e9fdb224a1ea0049', NULL, '2018-05-11 18:38:17', NULL, 0),
(40, 'BB', 'BB', 'bb@gmail.com', NULL, 'Female', '05/24/2018', 'Cameroon', 'user_BB', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 31, '1', 'f1538b681bb3ced500ac5f9ada90b1e6', NULL, '2018-05-11 18:39:15', NULL, 0),
(41, 'CC', 'CC', 'cc@gmail.com', NULL, 'Male', '05/29/2018', 'Ecuador', 'user_CC', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 32, '1', '30af11b22231e9dd99ed643540c2e106', NULL, '2018-05-11 18:42:02', NULL, 0),
(42, 'DD', 'DD', 'dd@gmail.com', NULL, 'Female', '05/29/2018', 'Brazil', 'user_DD', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 32, '1', 'd1dfe9981206f2034d05763cb2a6481d', NULL, '2018-05-11 18:42:53', NULL, 0),
(43, 'EE', 'EE', 'ee@gmail.com', NULL, 'Male', '05/30/2018', 'Bolivia', 'user_EE', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 33, '1', 'cc2202a057e9c71f7f8973bf118a3c44', NULL, '2018-05-14 11:50:43', NULL, 0),
(44, 'ff', 'ff', 'ff@gmail.com', NULL, 'Male', '05/23/2018', 'France', 'user_FF', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 33, '1', '4f58f183f0b069f5cfe393d1fe94b1b9', NULL, '2018-05-14 11:52:03', NULL, 0),
(46, 'david', 'boon', 'david@gmail.com', NULL, 'Male', '05/30/2018', 'France', 'david', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', '5afec624a928d', 1, 1, 1, 1, 1, 0, 0, 0, 1, '1', '3cef8b292095e04608268286c4d842d1', NULL, '2018-05-18 17:46:28', NULL, 0),
(49, 'jos', 'jos', 'jos@gmail.com', NULL, 'Male', '05/23/2018', 'Belarus', 'Jos', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 46, '1', '6cf375394bb8d76d51563042e496b7f2', NULL, '2018-05-18 18:05:56', NULL, 0),
(50, 'Bob', 'bob', 'bob@gmail.com', NULL, 'Male', '05/16/2018', 'Barbados', 'Bob', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 46, '1', '5e39110fbee0713ff7bc97b2e74fedfb', NULL, '2018-05-18 18:08:14', NULL, 0),
(51, 'GG', 'GG', 'gg@gmail.com', NULL, 'Female', '05/22/2018', 'Chile', 'user_GG', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 34, '1', '46c944f34b7fe94631b23187fb230fd7', NULL, '2018-05-21 13:18:32', NULL, 0),
(52, 'HH', 'HH', 'hh@gmail.com', NULL, 'Male', '05/31/2018', 'Argentina', 'user_HH', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 34, '1', 'f45f2b0878683608a3332a7aaac4da37', NULL, '2018-05-21 13:45:39', NULL, 0),
(59, 'II', 'II', 'ii@gmail.com', NULL, 'Male', '05/17/2018', 'Azerbaijan', 'user_II', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 35, '1', '1bdf3183389bf4f40a4dc0626101da80', NULL, '2018-05-22 15:20:23', NULL, 0),
(60, 'JJ', 'JJ', 'jj@gmail.com', NULL, 'Female', '05/17/2012', 'Armenia', 'user_JJ', 'e10adc3949ba59abbe56e057f20f883e', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 35, '1', 'd288232e62202bb31a00e26d0a273232', NULL, '2018-05-22 15:21:41', NULL, 0),
(61, 'harshit', 'verma', 'harshitverma8083@gmail.com', NULL, 'Male', '06/27/2018', 'India', 'harshit', 'e114d2c57421fc271040f0821c6d51b1', 'no_image.jpg', NULL, 1, 1, 1, 1, 1, 0, 0, 0, 1, '1', 'bda55c609747b19e6200d4377da7ba9a', NULL, '2018-06-02 14:58:44', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_user_payment`
--

CREATE TABLE `mlm_user_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_address` varchar(500) DEFAULT NULL,
  `txn_hash` varchar(500) DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_subscription_fee` int(11) DEFAULT NULL,
  `is_lending_fee` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_user_payment`
--

INSERT INTO `mlm_user_payment` (`id`, `user_id`, `wallet_address`, `txn_hash`, `amount`, `status`, `is_subscription_fee`, `is_lending_fee`, `created_at`) VALUES
(30, 7, '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', '35eMb5E9SU4QBzP87g9tcNB59N26g54hghgub', '11', 1, NULL, NULL, '2018-04-24 13:19:28'),
(31, 11, '35eMb5E9SUQBzP87g9tcNB9N2ghghgub', '35eMb5E9SU4QBzP87g9tcNB59N26ghghgub', '11', 1, NULL, NULL, '2018-04-24 13:19:28'),
(40, 10, '35eMb5E9SUQBzP87g9tcNB9N2ghghgub', '35eMb5E9SUQBzP87g9tc587NB9N2ghghgub', '11', 1, NULL, NULL, '2018-05-10 10:33:02'),
(41, 7, '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', '35eMb5E9SUQBzP87g9tc4NB7N2uWobJP6BW', '21', 1, NULL, NULL, '2018-05-10 11:09:46'),
(43, 21, '123b5E9SUQBzP87g9tcNB9N2ghghgub', '123b5E9SUQBzP87g9tcNB9N2ghghgubbb', '11', 1, NULL, NULL, '2018-05-10 11:25:50'),
(49, 22, '123b5E9SUQBzP87g9tcNB9N2ghghgub', '123b5E9SU3QBzP87g9tcNB69N2ghghgub5', '11', 1, NULL, NULL, '2018-05-10 11:50:47'),
(50, 18, '35eMb5E9SUQBzP87g9tcNB9N2g3hgh3g', '35eMb5E9SjsweP87g9tcNB9N2g3hgh3g', '11', 1, NULL, NULL, '2018-05-10 11:55:05'),
(52, 19, '35eMb5E9SUQBzP87g9tcNB9N2g3hgh3g', '35eMb5E9SUQBzP87g9tcNB9N2g3hgh3gjk', '11', 1, NULL, NULL, '2018-05-10 11:55:44'),
(53, 23, '35eM159SUQBzP87g9tcNB9N72ghghgub', '35e0159SUQBzP87gtcNB9N72ghghgub', '11', 1, NULL, NULL, '2018-05-10 12:09:16'),
(54, 24, '35eM159SUQBzP87g9tcNB9N72ghghgub', '35eM159SUQdfBzP87g9thcNB9N72ghghgub', '11', 1, NULL, NULL, '2018-05-10 12:10:05'),
(55, 21, '35eMb5E9SUQBzP87g9tcNB9N2ghghgub', '35eMb5E9SUQBzP7gtcN9N2ghghgub', '21', 1, NULL, NULL, '2018-05-10 12:12:42'),
(56, 25, '35eMb5E9SUQBzP87g9th78df56dsf6mnj', '35eMb5EmeiBzP87g9th78df56dsf6mnj', '11', 1, NULL, NULL, '2018-05-10 12:16:27'),
(57, 26, '35eMb5E9SUQBzP87g9th78df56dsf6mnj', '35eMb5E9SUbbQBzP87g9th78df56dsf6mnj', '11', 1, NULL, NULL, '2018-05-10 12:17:17'),
(58, 22, '35eMb5E9SUQBzP87g9tcNB9N2ghghgub', '35eMb5E9SUgQBzP87g9tcNB9gN2ghghgubsgd', '21', 1, NULL, NULL, '2018-05-10 12:18:11'),
(59, 27, '35eMb5QBzP87g9tcNB9N2uWobJP6BW', '35eMb5Q6697g9tcNB9N2uWobJP6BW', '11', 1, NULL, NULL, '2018-05-10 12:23:21'),
(60, 28, '35eMb5QBzP87g9tcNB9N2uWobJP6BW', '35eMffffBzP87g9tcNB9N2uWobJP6BW', '11', 1, NULL, NULL, '2018-05-10 12:24:10'),
(61, 18, '35eMb5E9SUQBzP87g9tcNB9N2ghghgub', '35eMb5356E9SUQBzP87g69tcNB9N2ghghgub', '21', 1, NULL, NULL, '2018-05-10 12:25:24'),
(62, 29, '35eMb5E9SUQBzP87g9th78df56dsf67ju', '35eMb5E9SUQ6j89k7g9th78df56dsf67ju', '11', 1, NULL, NULL, '2018-05-10 12:28:18'),
(63, 30, '35eMb5E9SUQBzP87g9th78df56dsf67ju', '35eMb5E9SUvvvQBzP87g9th78df56dsf67ju', '11', 1, NULL, NULL, '2018-05-10 12:30:08'),
(64, 19, '35eMb5E9SUQBzP87g9tcNB9N2ghghgub', '35eMb5E9SUQBzP87mfhg9tcNB9N2ghghgub', '21', 1, NULL, NULL, '2018-05-10 12:30:50'),
(65, 7, '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', '35eMb5E9SUQBzP87g9wwB9N2uWobJP6BW', '40', 1, NULL, NULL, '2018-05-10 12:32:01'),
(66, 10, '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', '35eMb5E9SUQnhuicNB9N2uWobJP6BW', '21', 1, NULL, NULL, '2018-05-10 12:48:07'),
(67, 11, '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', '35xeMxb5E9SUQxBzP87g9tcNB9N2uWobJP6BW', '21', 1, NULL, NULL, '2018-05-10 12:48:44'),
(68, 31, '35eMb5E9SUQBzP87gj7657jhr7jhSUQBzP87g', '35eMb5E9SddQBzP87fgj7657jhr7jhSUQBzP87gd', '11', 1, NULL, NULL, '2018-05-10 13:12:00'),
(69, 32, '35eMb5E9SUQBzP87gj7657jhr7jhSUQBzP87g', '35eMb5E9SUQBzP87gj7657jhr7jhSUQBzPmm', '11', 1, NULL, NULL, '2018-05-10 13:13:00'),
(70, 23, '123b5E9SUQBzP87g9tcNB9N2ghghgub', '123b5E9SUQBzP87g9tcjjkNB9N2ghghgub', '21', 1, NULL, NULL, '2018-05-10 13:14:37'),
(71, 33, '35eMb5E9SUQBzP87gj7657jhr7jh35eM', '35eMb5E9SyiBzP87gj7657jhr7jh35eM', '11', 1, NULL, NULL, '2018-05-11 06:41:46'),
(72, 34, '35eMb5E9SUQBzP87gj7657jhr7jh35eM', '35eMb5E9SUQBzzzzP87gj7657jhr7jh35eM', '11', 1, NULL, NULL, '2018-05-11 06:44:33'),
(73, 24, '123b5E9SUQBzP87g9tcNB9N2ghghgub', '123b5E9SUQBzh8p7gl9tcNB9N2ghghgub', '21', 1, NULL, NULL, '2018-05-11 06:59:26'),
(74, 35, '35eMb5E9SUQBzP87gj7657jhr7jh5E9', '35eMb5E9SUQBzP697j7657jhr7jh5E9', '11', 1, NULL, NULL, '2018-05-11 07:13:41'),
(75, 36, '35eMb5E9SUQBzP87gj7657jhr7jh5E9', '35mjkb5E9SUQBzP87gj7657jhr7jh5E9', '11', 1, NULL, NULL, '2018-05-11 07:14:59'),
(76, 25, '123b5E9SUQBzP87g9tcNB9N2ghghgub', '123b5E9SUQBzvvvP87g9tcNB9N2ghghgub', '21', 1, NULL, NULL, '2018-05-11 07:17:38'),
(77, 37, '35eMb5E9SUQBzP87gj7657jhr7jh35eMb', '35eMb5rtkE9SUQBzP87gj7657jhr7jh35eMb', '11', 1, NULL, NULL, '2018-05-11 09:25:10'),
(78, 38, '35eMb5E9SUQBzP87gj7657jhr7jh35eMb', '35eMb5E9SUQBzP87gj7657jhr7jh35eMbdfg', '11', 1, NULL, NULL, '2018-05-11 09:26:25'),
(79, 26, '123b5E9SUQBzP87g9tcNB9N2ghghgub', '123b5E9SUQBzP87g9tcNB9N2ghghgub123b5', '21', 1, NULL, NULL, '2018-05-11 09:28:13'),
(80, 10, '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', '35eMb5E9SUQBtcNB9N2uWobJP6BW', '40', 1, NULL, NULL, '2018-05-11 12:57:37'),
(82, 39, '35eMb5E9SUQBzP87g9tUQB9N2uWUQB6BW', '35eMb5E9SUQBz809g9tUQB9N2uWUQB6BW', '11', 1, NULL, NULL, '2018-05-11 13:15:53'),
(83, 40, '35eMb5E9SUQBzP87g9tUQB9N2uWUQB6BW', '35eMb5E9SUQBz23567tUQB9N2uWUQB6BW', '11', 1, NULL, NULL, '2018-05-11 13:16:53'),
(84, 41, '355E9eMb5E9SUQBzP87g9tcNB9N5E9ghgub', '355E9eMb5E9S3332P87g9tcNB9N5E9ghgub', '11', 1, NULL, NULL, '2018-05-11 13:18:41'),
(85, 42, '355E9eMb5E9SUQBzP87g9tcNB9N5E9ghgub', '355E9eMb5BzP87g9tcNB9N5E9ghGUY', '11', 1, NULL, NULL, '2018-05-11 13:30:01'),
(86, 31, '35eM159SUQBzP87g9tcNB9N72ghghgub', '35eM159SUQBg999cNB9N72ghghgub', '21', 1, NULL, NULL, '2018-05-11 13:31:34'),
(87, 32, '35eM159SUQBzP87g9tcNB9N72ghghgub', '35eM159SUQBzP87g9tcNB9N72ghghgubG', '21', 1, NULL, NULL, '2018-05-11 13:33:48'),
(88, 43, '35eMb5Ere9SUQBzgfP87jg9thjj78df56dsf6', 'dgbhfgj36454hth4675GGH08', '11', 1, NULL, NULL, '2018-05-14 07:45:18'),
(89, 44, '35eMb5Ere9SUQBzgfP87jg9thjj78df56dsf6', 'QBzgfP87jg9thjj78df56dsf6KIUNJ', '11', 1, NULL, NULL, '2018-05-14 07:47:03'),
(90, 33, '35eM159SUQBzP87g9tcNB9N72ghghgub', '35eM159SUQBzP87787KKKB9N72ghghgub', '21', 1, NULL, NULL, '2018-05-14 08:09:30'),
(92, 46, '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', 'GHJHHjhhkjlkjkjkljkllklk876', '11', 1, NULL, NULL, '2018-05-18 12:19:12'),
(95, 49, 'GFG6567HBHBhghgbKJH6577bnbFGG', 'dgbhfgj36425332323th4675', '11', 1, NULL, NULL, '2018-05-18 12:36:50'),
(96, 50, 'GFG6567HBHBhghgbKJH6577bnbFGG', 'zgbsfhdhdjgfgj', '11', 1, NULL, NULL, '2018-05-18 12:39:06'),
(97, 46, '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', 'gsgRRWET564GHSHTEhh', '21', 1, NULL, NULL, '2018-05-18 12:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_wallet`
--

CREATE TABLE `mlm_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mlm_wallet`
--

INSERT INTO `mlm_wallet` (`id`, `user_id`, `website`, `address`, `created_at`) VALUES
(4, 1, 'http://coinbase.com', '35eMb5E9SUQBzP87g9tcNB9N2uWobJP6BW', '2018-04-11 06:17:09'),
(5, 7, 'http://coinbase.com', '35eMb5E9SUQBzP87g9tcNB9N2ghghgub', '2018-04-11 06:52:10'),
(6, 8, 'http://coinbase.com', '35eMb5E9SUQBzP87g9th78df56dsf6', '2018-04-11 07:09:13'),
(7, 12, 'http://coinbase.com', '35eMb5E9SUQBzP87gj7657jhr7jh', '2018-04-11 10:56:00'),
(8, 11, 'http://coinbase.com', '35eMb5E9SUQBzP87g9tcNB9N2g3hgh3g', '2018-05-08 07:18:41'),
(9, 10, 'http://coinbase.com', '123b5E9SUQBzP87g9tcNB9N2ghghgub', '2018-05-08 10:33:53'),
(10, 18, 'http://coinbase.com', '35eMb5QBzP87g9tcNB9N2uWobJP6BW', '2018-05-08 13:42:39'),
(11, 19, 'http://coinbase.com', '35eMb5E9SUQBzP87g9th78df56dsf67ju', '2018-05-09 07:13:11'),
(12, 23, 'http://coinbase.com', '35eMb5E9SUQBzP87gj7657jhr7jhSUQBzP87g', '2018-05-09 09:33:50'),
(13, 24, 'http://coinbase.com', '35eMb5E9SUQBzP87gj7657jhr7jh35eM', '2018-05-09 09:35:39'),
(14, 21, 'http://coinbase.com', '35eM159SUQBzP87g9tcNB9N72ghghgub', '2018-05-10 11:17:49'),
(15, 22, 'http://coinbase.com', '35eMb5E9SUQBzP87g9th78df56dsf6mnj', '2018-05-10 11:50:17'),
(16, 25, 'http://coinbase.com', '35eMb5E9SUQBzP87gj7657jhr7jh5E9', '2018-05-10 12:15:53'),
(17, 26, 'http://coinbase.com', '35eMb5E9SUQBzP87gj7657jhr7jh35eMb', '2018-05-10 12:17:01'),
(18, 27, 'http://coinbase.com', 'hjb5E9SUQBz35eMb5E9SUQB', '2018-05-10 12:23:05'),
(19, 28, 'http://coinbase.com', '5E9SUQBzP87g9th78df56dsf635eMb', '2018-05-10 12:23:57'),
(20, 29, 'http://coinbase.com', '87g9th78df56dsf635eMb5E9SUQBzP', '2018-05-10 12:28:01'),
(21, 30, 'http://coinbase.com', 'cf78E9SUQBzP87g9tcNB9N2ghghgub', '2018-05-10 12:28:57'),
(22, 31, 'http://coinbase.com', '35eMb5E9SUQBzP87g9tUQB9N2uWUQB6BW', '2018-05-10 13:11:45'),
(23, 32, 'http://coinbase.com', '355E9eMb5E9SUQBzP87g9tcNB9N5E9ghgub', '2018-05-10 13:12:40'),
(24, 33, 'http://coinbase.com', '35eMb5Ere9SUQBzgfP87jg9thjj78df56dsf6', '2018-05-11 06:41:23'),
(25, 34, 'http://coinbase.com', '35ennb5E9SUQBzP87g9tcNB9N2uWobJP6BW', '2018-05-11 06:44:11'),
(26, 35, 'http://coinbase.com', '256iioiTGB6798yoyyukjk&880090', '2018-05-11 07:13:12'),
(27, 36, 'http://coinbase.com', '35eMb5E9SUQBzP87g9tcNB9N2QBzP8', '2018-05-11 07:14:27'),
(28, 37, 'http://coinbase.com', '35eM8db5E98dSUQBzP87g9th78df56dsf6', '2018-05-11 09:24:50'),
(29, 38, 'http://coinbase.com', '35eMb5E9SUQBzP87gj7657jhr7jh35eMb5E9SUQBzP87gj7657jhr7jh35eMb', '2018-05-11 09:25:50'),
(30, 39, 'http://coinbase.com', 'JP6BWE9SUQJP6BW87g9tcNB9N2uWobJP6BW', '2018-05-11 13:13:40'),
(31, 40, 'http://coinbase.com', '35eMb5E9SUQBzP8tUQB9N2uWUQB6BWobJP6BW', '2018-05-11 13:16:32'),
(32, 41, 'http://coinbase.coms', '35eMb5E9SUQBzP87gj7657jhr7jhOIuV587GR', '2018-05-11 13:18:09'),
(33, 42, 'http://coinbase.com', '465gffjn2SGS787AGSUG9U0HGS9GSGS0', '2018-05-11 13:29:35'),
(34, 43, 'http://coinbase.com', 'UQB35eMb5E9SdfsgsgzP87g9tcNB9N2uWobJP6BW', '2018-05-14 06:22:47'),
(35, 44, 'http://coinbase.com', '35eMb5E9SUQB2569B9N2uWobJP6BW', '2018-05-14 07:46:37'),
(36, 45, 'www.test.com', 'GHUY65oiMKUGHkjnjhggTR4465', '2018-05-18 12:01:30'),
(37, 46, 'www.test.com', 'GFG6567HBHBhghgbKJH6577bnbFGG', '2018-05-18 12:18:17'),
(38, 47, 'http://coinbase.com', '35eMb5E9SUtcNB9N2ghghgubasfa', '2018-05-18 12:28:48'),
(39, 48, 'http://coinbase.com', '35eMb5BzP87g9th78df56dsf6E9SUQ', '2018-05-18 12:31:28'),
(40, 49, 'http://coinbase.com', '35eMb5E9SUQBzP87g9tJHHJJJJJ', '2018-05-18 12:36:31'),
(41, 50, 'http://coinbase.com', 'aasgsdgssgdsfhjjhgfj', '2018-05-18 12:38:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_admin`
--
ALTER TABLE `mlm_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_ci_sessions`
--
ALTER TABLE `mlm_ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `mlm_countries`
--
ALTER TABLE `mlm_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_downline`
--
ALTER TABLE `mlm_downline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_images`
--
ALTER TABLE `mlm_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_loan_cost`
--
ALTER TABLE `mlm_loan_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_loan_distribution`
--
ALTER TABLE `mlm_loan_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_loan_invest`
--
ALTER TABLE `mlm_loan_invest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_loan_payment`
--
ALTER TABLE `mlm_loan_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_matrix`
--
ALTER TABLE `mlm_matrix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_news`
--
ALTER TABLE `mlm_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_notifications`
--
ALTER TABLE `mlm_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_pages`
--
ALTER TABLE `mlm_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_support`
--
ALTER TABLE `mlm_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_testimonial`
--
ALTER TABLE `mlm_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_tutorial`
--
ALTER TABLE `mlm_tutorial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_upgrade_cost`
--
ALTER TABLE `mlm_upgrade_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_users`
--
ALTER TABLE `mlm_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_user_payment`
--
ALTER TABLE `mlm_user_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlm_wallet`
--
ALTER TABLE `mlm_wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `mlm_admin`
--
ALTER TABLE `mlm_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mlm_ci_sessions`
--
ALTER TABLE `mlm_ci_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=675;

--
-- AUTO_INCREMENT for table `mlm_countries`
--
ALTER TABLE `mlm_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `mlm_downline`
--
ALTER TABLE `mlm_downline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `mlm_images`
--
ALTER TABLE `mlm_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mlm_loan_cost`
--
ALTER TABLE `mlm_loan_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mlm_loan_distribution`
--
ALTER TABLE `mlm_loan_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mlm_loan_invest`
--
ALTER TABLE `mlm_loan_invest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mlm_loan_payment`
--
ALTER TABLE `mlm_loan_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mlm_matrix`
--
ALTER TABLE `mlm_matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `mlm_news`
--
ALTER TABLE `mlm_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mlm_notifications`
--
ALTER TABLE `mlm_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mlm_pages`
--
ALTER TABLE `mlm_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mlm_support`
--
ALTER TABLE `mlm_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mlm_testimonial`
--
ALTER TABLE `mlm_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mlm_tutorial`
--
ALTER TABLE `mlm_tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mlm_upgrade_cost`
--
ALTER TABLE `mlm_upgrade_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mlm_users`
--
ALTER TABLE `mlm_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `mlm_user_payment`
--
ALTER TABLE `mlm_user_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `mlm_wallet`
--
ALTER TABLE `mlm_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
