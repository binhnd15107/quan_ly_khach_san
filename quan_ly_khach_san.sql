-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 04:31 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quan_ly_khach_san`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannerable_id` int(11) DEFAULT NULL,
  `bannerable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `created_at`, `updated_at`, `image`, `bannerable_id`, `bannerable_type`, `status`) VALUES
(1, '2022-07-22 13:06:47', '2022-07-22 13:06:47', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 1, NULL, 1),
(2, '2022-07-22 13:06:48', '2022-08-05 20:44:20', '2022080603441900x750-13.png', 2, NULL, 0),
(3, '2022-07-22 13:06:48', '2022-07-29 12:45:13', '2022072919451900x750-3.png', 3, NULL, 0),
(4, '2022-07-29 11:38:59', '2022-08-07 05:18:26', '2022072918381900x750_2.png', 2, NULL, 0),
(5, '2022-07-29 11:54:19', '2022-08-07 05:19:23', '202208071219true-viet-nam_banner-web_1_1571217576.jpg', 1, NULL, 0),
(6, '2022-07-29 11:57:58', '2022-08-07 05:17:52', '202208071217banner-web-1920x650px-01-1_1658480326.jpg', 1, NULL, 0),
(7, '2022-07-29 12:03:30', '2022-08-07 05:18:10', '202207291903Banner-Web-26.png', 2, NULL, 0),
(8, '2022-07-29 12:03:41', NULL, '202207291903Banner-Web-Desktop_vesion-2.png', 2, NULL, 0),
(9, '2022-07-29 12:04:25', '2022-08-07 05:16:47', '202208071216true-viet-nam_banner-web_1_1571217576.jpg', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kh_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `total_money` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa',
  `room_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`room_id`)),
  `id_voucher` int(11) DEFAULT NULL,
  `pay_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 là chưa thanh toán , 1 đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `created_at`, `updated_at`, `name`, `kh_id`, `start_time`, `end_time`, `total_money`, `status`, `room_id`, `id_voucher`, `pay_status`) VALUES
(28, '2022-08-12 09:51:43', NULL, '23202208121651', 23, '2022-08-12', '2022-08-13', '675000', 0, '[\"84\"]', 11, 1),
(30, '2022-08-12 10:44:14', '2022-08-15 06:42:20', '23202208121744', 23, '2022-08-13', '2022-08-14', '650000', 0, '[\"80\"]', NULL, 1),
(32, '2022-08-14 22:31:50', '2022-08-15 06:40:18', '2202208150531', 2, '2022-08-14', '2022-08-15', '1412500', 0, '[\"84\"]', 10, 1),
(33, '2022-08-15 06:55:37', NULL, '23202208151355', 23, '2022-08-15', '2022-08-16', '1600000', 0, '[\"73\"]', 9, 1),
(34, '2022-08-15 06:57:02', NULL, '23202208151357', 23, '2022-08-17', '2022-08-19', '1050000', 1, '[\"70\"]', 9, 1),
(35, '2022-08-15 08:43:04', NULL, '25202208151543', 25, '2022-08-15', '2022-08-16', '1512500', 0, '[\"83\"]', 10, 1),
(36, '2022-08-15 09:47:32', NULL, '25202208151647', 25, '2022-08-15', '2022-08-16', '700000', 0, '[\"82\"]', 9, 1),
(37, '2022-08-15 22:25:04', NULL, '2202208160525', 2, '2022-08-16', '2022-08-17', '712500', 0, '[\"84\"]', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_sevices`
--

CREATE TABLE `bill_sevices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `total_many` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa',
  `amount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_sevices`
--

INSERT INTO `bill_sevices` (`id`, `created_at`, `updated_at`, `bill_id`, `service_id`, `total_many`, `status`, `amount`) VALUES
(52, '2022-08-14 17:00:00', '2022-08-14 17:00:00', 32, 17, 200000, 0, 2),
(53, '2022-08-14 17:00:00', '2022-08-14 17:00:00', 32, 18, 200000, 0, 1),
(54, '2022-08-14 17:00:00', '2022-08-14 17:00:00', 33, 17, 300000, 0, 3),
(55, '2022-08-14 17:00:00', '2022-08-14 17:00:00', 33, 18, 200000, 0, 1),
(56, '2022-08-14 17:00:00', '2022-08-14 17:00:00', 34, 21, 250000, 0, 1),
(57, '2022-08-14 17:00:00', '2022-08-14 17:00:00', 35, 17, 300000, 0, 3),
(58, '2022-08-14 17:00:00', '2022-08-14 17:00:00', 35, 18, 200000, 0, 1),
(59, '2022-08-14 17:00:00', '2022-08-14 17:00:00', 35, 20, 300000, 0, 1),
(60, '2022-08-14 17:00:00', '2022-08-14 17:00:00', 36, 17, 100000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `discount_rate` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa',
  `limit` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`limit`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `created_at`, `updated_at`, `name`, `describe`, `start_time`, `end_time`, `discount_rate`, `status`, `limit`) VALUES
(1, '2022-07-22 13:59:31', '2022-07-22 13:59:31', 'HOT SALE0', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', '2022-07-31', '2022-07-31', 24, 1, NULL),
(2, '2022-07-22 13:59:31', '2022-07-22 13:59:31', 'HOT SALE1', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', '2022-07-22', '2022-07-22', 35, 1, NULL),
(3, '2022-07-22 13:59:31', '2022-07-22 13:59:31', 'HOT SALE2', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', '2022-07-22', '2022-07-22', 27, 0, NULL),
(4, '2022-07-22 13:59:31', '2022-07-22 13:59:31', 'HOT SALE3', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', '2022-07-22', '2022-07-22', 48, 1, NULL),
(5, '2022-07-22 13:59:31', '2022-07-22 13:59:31', 'HOT SALE4', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', '2022-07-22', '2022-07-22', 16, 0, NULL),
(6, '2022-07-22 13:59:31', '2022-07-22 13:59:31', 'HOT SALE5', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', '2022-07-22', '2022-07-22', 36, 0, NULL),
(7, '2022-07-22 13:59:31', '2022-07-22 13:59:31', 'HOT SALE6', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', '2022-07-22', '2022-07-22', 23, 0, NULL),
(8, '2022-07-22 13:59:31', '2022-07-22 13:59:31', 'HOT SALE7', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', '2022-07-22', '2022-07-22', 18, 0, NULL),
(9, '2022-07-22 13:59:31', '2022-08-14 21:58:17', 'HOT SALE8', '<p>Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.</p>', '2022-08-15', '2022-08-18', 20, 0, '[\"81\",\"83\",\"84\"]'),
(10, '2022-07-22 13:59:31', '2022-08-14 21:56:54', 'HOT SALE', '<p>Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.</p>', '2022-08-15', '2022-08-18', 5, 0, '[\"70\",\"73\"]'),
(11, '2022-07-30 08:29:08', NULL, 'triankhachhang', '<p>Cơ hội có hạn</p>', '2022-08-12', '2022-08-16', 10, 0, '[\"19\",\"20\",\"22\"]'),
(13, '2022-07-30 08:34:57', '2022-07-30 10:24:37', 'helo binh bong', '<p>vdsvsdvsdv</p>', '2022-07-31', '2022-08-05', 40, 0, NULL),
(14, '2022-07-30 09:39:55', '2022-08-15 22:24:21', 'Hot sale t8 new', '<p>hot vc</p>', '2022-08-16', '2022-08-20', 15, 0, '[\"72\",\"74\"]');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kh_id` bigint(20) UNSIGNED NOT NULL,
  `publish_content` int(11) NOT NULL DEFAULT 0 COMMENT ' 0 đóng , 1 mở',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `created_at`, `updated_at`, `kh_id`, `publish_content`, `content`, `status`) VALUES
(1, '2022-07-22 21:40:26', '2022-07-22 21:40:26', 23, 1, 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 0),
(2, '2022-07-22 21:40:26', '2022-07-22 21:40:26', 25, 1, 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 0),
(20, '2022-08-15 11:55:21', NULL, 25, 0, 'đẹp lắm', 1),
(21, '2022-08-15 12:00:16', NULL, 25, 0, 'đẹp lắm luôn admin ơi', 0),
(22, '2022-08-15 20:33:35', '2022-08-15 21:24:10', 25, 0, 'phòng đẹp', 0);

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
(5, '2022_07_22_165239_create_permission_tables', 2),
(8, '2022_07_22_183203_create_type_rooms_table', 3),
(9, '2022_07_22_191631_create_rooms_table', 4),
(11, '2022_07_22_194950_create_banners_table', 5),
(15, '2022_07_22_201801_create_discount_codes_table', 6),
(16, '2022_07_22_203650_create_code_rooms_table', 6),
(17, '2022_07_22_204008_create_code_type_rooms_table', 6),
(18, '2022_07_23_015504_create_services_table', 7),
(20, '2022_07_23_021337_add_colum_image_in_table_room', 8),
(22, '2022_07_23_031527_create_bills_table', 9),
(24, '2022_07_23_041303_create_bill_sevices_table', 10),
(25, '2022_07_23_042937_create_feedback_table', 11),
(27, '2022_07_23_044220_create_posts_table', 12),
(28, '2022_07_24_170417_add_colum_image_in_table_user', 13),
(29, '2022_07_25_121310_add_colum_gg_id_in_table_users', 14),
(30, '2022_07_30_032323_add_colum_limit_in_table_discount_codes', 15),
(31, '2022_08_01_034510_add_colum_status_in_table_use', 16),
(32, '2022_08_01_154149_delete_colum_room_id_in_table', 17),
(33, '2022_08_01_154555_add_colum_room_id_in_table_bills', 18),
(34, '2022_08_04_023837_add_colum_images_in_table_rooms', 19),
(35, '2022_08_11_163150_add_coulum_id_voucher_in_table_bill', 20),
(36, '2022_08_14_182440_remove_colum_amount_in_table_bill_sevices', 21),
(37, '2022_08_14_182557_add_colum_amount_in_table_bill_sevices', 22),
(38, '2022_08_15_051204_add_colum_in_pay_status_in_table_bill', 23);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 25),
(2, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 23);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `describe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `slug`, `content`, `describe`, `image`, `author`, `status`) VALUES
(1, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 0', 'bai-post-0', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 23, 0),
(2, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 1', 'bai-post-1', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 23, 0),
(3, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 2', 'bai-post-2', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 23, 0),
(4, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 3', 'bai-post-3', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 23, 0),
(5, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 4', 'bai-post-4', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 2, 0),
(6, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 5', 'bai-post-5', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 23, 0),
(7, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 6', 'bai-post-6', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 2, 0),
(8, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 7', 'bai-post-7', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 2, 0),
(9, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 8', 'bai-post-8', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 23, 0),
(10, '2022-07-22 22:19:12', '2022-07-22 22:19:12', 'bai post 9', 'bai-post-9', 'Phòng rất đẹp ,chất lượng tốt , phục vụ nhiệt tình', 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg', 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-07-22 10:26:27', '2022-07-22 10:26:27'),
(2, 'nhan vien', 'web', '2022-07-22 10:26:27', '2022-07-22 10:26:27'),
(3, 'khach hang', 'web', '2022-07-22 10:26:27', '2022-07-22 10:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_room_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_status` int(11) NOT NULL DEFAULT 0 COMMENT '0  no full , 1 full',
  `describe` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `created_at`, `updated_at`, `type_room_id`, `name`, `current_status`, `describe`, `status`, `image`, `images`) VALUES
(70, '2022-08-05 09:08:50', NULL, 24, 'P201', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051608xu-huong-thiet-ke-phong-ngu-2022-2.jpg', '[\"\",\"202208051608images.jpg\",\"202208051608nh-nguyen-khoai-4.jpeg\"]'),
(71, '2022-08-05 09:11:11', NULL, 24, 'P202', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '2022080516112673.jpg', '[\"202208051611ph\\u00f2ng ng\\u1ee7 (79).jpg\",\"202208051611phong-ngu-nha-ong-tan-co-dien (1).jpg\",\"202208051611Phong-ngu-nu-1.jpg\"]'),
(72, '2022-08-05 09:11:36', NULL, 24, 'P203', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051611thiet-ke-phong-ngu-20m2-1.jpg', '[\"202208051611thiet-ke-phong-ngu-20m2-1.jpg\",\"202208051611top-20-mau-thiet-ke-phong-ngu-dep-va-an-tuong-cho-cac-ho-gia-dinh.jpg\",\"202208051611xu-huong-thiet-ke-phong-ngu-2022-2.jpg\"]'),
(73, '2022-08-05 09:12:04', NULL, 24, 'P204', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051612xu-huong-thiet-ke-phong-ngu-2022-2.jpg', '[\"202208051612phong-ngu-nha-ong-tan-co-dien (1).jpg\",\"202208051612Phong-ngu-nu-1.jpg\",\"202208051612thiet-ke-phong-ngu-20m2-1.jpg\"]'),
(74, '2022-08-05 09:12:42', NULL, 23, 'P301', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051612phong-ngu-nha-ong-tan-co-dien (1).jpg', '[\"202208051612ph\\u00f2ng ng\\u1ee7 (79).jpg\",\"202208051612phong-ngu-nha-ong-tan-co-dien (1).jpg\",\"202208051612Phong-ngu-nu-1.jpg\"]'),
(75, '2022-08-05 09:13:17', NULL, 23, 'P302', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '2022080516131-trang-tri-phong-ngu-bang-anh.jpg', '[\"202208051613images (1).jpg\",\"202208051613images.jpg\",\"202208051613nh-nguyen-khoai-4.jpeg\",\"202208051613ph\\u00f2ng ng\\u1ee7 (79).jpg\"]'),
(76, '2022-08-05 09:14:09', NULL, 23, 'P303', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '20220805161410-hinh-anh-phong-ngu-don-gian-dep-quen-loi-ve-1.jpg', '[\"202208051614images (1).jpg\",\"202208051614phong-ngu-nha-ong-tan-co-dien (1).jpg\",\"202208051614top-20-mau-thiet-ke-phong-ngu-dep-va-an-tuong-cho-cac-ho-gia-dinh.jpg\",\"202208051614xu-huong-thiet-ke-phong-ngu-2022-2.jpg\"]'),
(77, '2022-08-05 09:15:42', NULL, 23, 'P304', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051615da-op-phong-ngu.jpg', '[\"202208051615top-20-mau-thiet-ke-phong-ngu-dep-va-an-tuong-cho-cac-ho-gia-dinh.jpg\",\"202208051615trang-tri-phong-ngu-vo-chong-don-gian.jpg\",\"202208051615xu-huong-thiet-ke-phong-ngu-2022-2.jpg\"]'),
(78, '2022-08-05 09:16:44', NULL, 22, 'P401', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051616Noi-that-phong-ngu-2.jpg', '[\"202208051616gach-op-tuong-phong-ngu-2.jpg\",\"202208051616hinh-anh-nhung-can-phong-dep + \\u201cTOP 10 nh\\u1eefng c\\u0103n ph\\u00f2ng ng\\u1ee7 \\u0111\\u1eb9p nh\\u1ea5t th\\u1ebf gi\\u1edbi\\u201d + _ H\\u00f2a h\\u1ee3p c\\u00f9ng r\\u1eebng xanh\\u201d.jpg\",\"202208051616images (1).jpg\"]'),
(79, '2022-08-05 09:17:36', NULL, 22, 'P402', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051617bceacb9f129e3858f85e1f87da220528.jpg', '[\"202208051617bceacb9f129e3858f85e1f87da220528.jpg\",\"202208051617da-op-phong-ngu.jpg\",\"202208051617gach-op-tuong-phong-ngu-2.jpg\"]'),
(80, '2022-08-05 09:17:55', NULL, 22, 'P403', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051617gach-op-tuong-phong-ngu-2.jpg', '[\"202208051617hinh-anh-nhung-can-phong-dep + \\u201cTOP 10 nh\\u1eefng c\\u0103n ph\\u00f2ng ng\\u1ee7 \\u0111\\u1eb9p nh\\u1ea5t th\\u1ebf gi\\u1edbi\\u201d + _ H\\u00f2a h\\u1ee3p c\\u00f9ng r\\u1eebng xanh\\u201d.jpg\",\"202208051617images (1).jpg\",\"202208051617images (2).jpg\"]'),
(81, '2022-08-05 09:18:21', '2022-08-05 10:28:26', 22, 'P404', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051728Noi-that-phong-ngu-2.jpg', '[\"202208051618hinh-anh-nhung-can-phong-dep + \\u201cTOP 10 nh\\u1eefng c\\u0103n ph\\u00f2ng ng\\u1ee7 \\u0111\\u1eb9p nh\\u1ea5t th\\u1ebf gi\\u1edbi\\u201d + _ H\\u00f2a h\\u1ee3p c\\u00f9ng r\\u1eebng xanh\\u201d.jpg\",\"202208051618images (1).jpg\",\"202208051618images (2).jpg\"]'),
(82, '2022-08-05 09:19:19', NULL, 21, 'P501', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '202208051619phong-ngu-nha-ong-tan-co-dien (1).jpg', '[\"202208051619Noi-that-phong-ngu-2.jpg\",\"202208051619ph\\u00f2ng ng\\u1ee7 (79).jpg\",\"202208051619phong-ngu-nha-ong-tan-co-dien (1).jpg\",\"202208051619Phong-ngu-nu-1.jpg\"]'),
(83, '2022-08-05 09:19:54', NULL, 21, 'P502', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '2022080516193-phong-ngu-co-buc-tuong-o-dau-giuong-tao-diem-nhan.jpeg', '[\"2022080516193-phong-ngu-co-buc-tuong-o-dau-giuong-tao-diem-nhan.jpeg\"]'),
(84, '2022-08-05 09:20:16', NULL, 21, 'P504', 0, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li><li>Đồ vệ sinh cá nhân miễn phí</li><li>Chậu rửa vệ sinh (bidet)</li><li>Dịch vụ streaming (như là Netflix)</li><li>Nhà vệ sinh</li><li>Bồn tắm hoặc Vòi sen</li><li>Khăn tắm</li><li>Ra trải giường</li><li>Ổ điện gần giường</li><li>Bàn làm việc</li><li>TV</li><li>Dép</li><li>Tủ lạnh</li><li>Điện thoại</li><li>Truyền hình vệ tinh</li><li>Máy sấy tóc</li><li>Quạt máy</li><li>Dịch vụ báo thức</li><li>Ấm đun nước điện</li><li>Truyền hình cáp</li><li>Dịch vụ báo thức</li><li>Giấy vệ sinh</li><li>Nước rửa tay</li><li>Máy điều hòa độc lập cho từng phòng</li></ul>', 0, '2022080516201-trang-tri-phong-ngu-bang-anh.jpg', '[\"202208051620bceacb9f129e3858f85e1f87da220528.jpg\",\"202208051620da-op-phong-ngu.jpg\",\"202208051620gach-op-tuong-phong-ngu-2.jpg\"]'),
(85, '2022-08-14 00:54:19', NULL, 21, 'duc binh', 0, '<p>cấccasc</p>', 1, '2022081407542673.jpg', NULL),
(86, '2022-08-15 22:12:06', NULL, 25, 'p601', 0, '<p>cdcascacascacacacac</p>', 0, '2022081605122673.jpg', '[\"202208160512images.jpg\",\"202208160512nh-nguyen-khoai-4.jpeg\",\"202208160512Noi-that-phong-ngu-2.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `describe` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `created_at`, `updated_at`, `name`, `price`, `image`, `describe`, `status`) VALUES
(17, '2022-07-28 23:10:08', '2022-08-14 22:02:53', 'Giặt là siêu  nhanh', 100000, '2022072906101900x750_2.png', '<p>đqưdqdưqdư</p>', 0),
(18, '2022-07-28 23:10:30', NULL, 'Dịch vụ dồ ăn', 200000, '202207290610download (5).png', '<p>Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.</p>', 0),
(19, '2022-07-28 23:10:51', NULL, 'Dịch vụ Đua xe', 44214124, '202207290610z3497174807300_b545ff1973f91374adfeca99d9d151bd.jpg', '<p>dâdasdsadad</p>', 1),
(20, '2022-07-28 23:11:54', '2022-08-14 22:03:19', 'Dịch vụ mat xa', 300000, '2022072914521609227050_d4hqLL.jpg', '<p>Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.</p>', 0),
(21, '2022-07-28 23:12:15', '2022-08-14 22:02:20', 'Thuê xe', 250000, '2022072906121609227050_d4hqLL.jpg', '<p>Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.</p>', 0),
(22, '2022-07-28 23:12:33', '2022-07-29 06:53:15', 'Dịch vụ tập gymmm giá rẻ', 250000, '2022072906121609227050_d4hqLL.jpg', '<figure class=\"image\"><img></figure><p>helo bình</p>', 1),
(23, '2022-07-29 08:49:09', '2022-08-14 22:01:45', 'Dịch vụ trông trẻ', 500000, '202207291549243919661_4364056140347865_481127046081379432_n-768x960.jpeg', '<p>vdsvsvsvdvsdv</p>', 0),
(24, '2022-08-15 22:19:11', NULL, 'dịch vụ rửa xe', 50000, '2022081605191-trang-tri-phong-ngu-bang-anh.jpg', '<p>cakc;akc;kalkc;lakc;lá</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_rooms`
--

CREATE TABLE `type_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `describe` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_rooms`
--

INSERT INTO `type_rooms` (`id`, `created_at`, `updated_at`, `name`, `price`, `describe`, `status`) VALUES
(1, '2022-07-22 12:14:31', '2022-07-22 12:14:31', 'Loại phòng0', 206958, 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 1),
(8, '2022-07-22 12:14:31', '2022-07-22 12:14:31', 'Loại phòng7', 277264, 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 1),
(9, '2022-07-22 12:14:31', '2022-07-22 12:14:31', 'Loại phòng8', 413823, 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.', 1),
(11, NULL, NULL, 'loại xịn', 2000000, 'RẤT CHI LÀ RỰC DỠ', 1),
(12, NULL, NULL, 'Binh Nguyen Duca', 313123, '<p>câcscac</p>', 1),
(21, '2022-08-05 08:07:36', '2022-08-05 09:04:35', 'Phòng Standard', 750000, '<ul><li><strong>Phòng standard</strong> có tên viết tắt là STD, đây được đánh giá là loại phòng tiêu chuẩn, thiết kế đơn giản và tối ưu nhất trong các phòng khách sạn hiện nay.</li><li>Đây là một loại phòng với diện tích khá nhỏ, thường được xây dựng ở các tầng thấp và không có view cao, đẹp.</li><li>Trang thiết bị của phòng này cũng được khách sạn đầu tư một cách tối giản đến mức tối thiểu. Chính vì vậy, giá phòng standard sẽ ở mức độ thấp nhất trong các loại phòng của khách sạn.</li><li>&nbsp;</li></ul>', 0),
(22, '2022-08-05 09:06:20', NULL, 'Phòng Superior', 650000, '<ul><li><strong>Phòng superior là gì? </strong>Câu trả lời <strong>phòng superior </strong>viết tắt là SUP, đây là loại phòng cao cấp hơn phòng standard với diện tích và khoảng từ 20m2 trở lên.&nbsp;</li><li>Được thiết kế bao gồm 1 tới 2 giường, tầm nhìn view cũng thoáng đãng và đẹp mắt hơn. Trang thiết bị được khách sạn đầu tư cho căn phòng này khá hiện đại. Vì chất lượng <strong>phòng superior</strong> tốt hơn và view đẹp hơn nên kéo theo mức giá cho phòng superior cũng sẽ cao hơn.</li></ul>', 0),
(23, '2022-08-05 09:06:49', '2022-08-05 09:07:39', 'Phòng Deluxe', 550000, '<ul><li><strong>Phòng deluxe là gì</strong>? <strong>Phòng deluxe </strong>với tên viết tắt là DLX, thường nằm&nbsp; ở tầng trên cao với view rộng và đẹp (hướng nhìn ra phía núi, biển… ).</li><li>Diện tích của loại phòng này được đánh giá là khá rộng rãi hơn so với<strong> phòng superior</strong> và đồng thời cũng được đầu tư các trang thiết bị hết sức cao cấp hiện đại như tivi, tủ lạnh, bồn rửa mặt, phòng tắm kính cao cấp, bồn tắm hướng view đẹp…</li><li>Đương nhiên, mức giá niêm yết của <strong>phòng deluxe</strong> sẽ ở mức cao hơn.</li></ul>', 0),
(24, '2022-08-05 09:07:26', NULL, 'Phòng suite', 500000, '<ul><li>Có một câu hỏi mà khá nhiều người đặt ra đó là <strong>phòng suite trong khách sạn là gì?</strong> Đây là phòng có tên viết tắt là SUT, thuộc loại phòng cao cấp nhất trong các khách sạn, được đặt ở tầng cao nhất, view thoáng đãng, nơi có không gian đẹp mắt và bầu không khí trong lành.&nbsp;</li><li>Với diện tích dao động từ 60 – 120m2, <strong>phòng suite</strong> thường bao gồm 1 phòng khách và 1 phòng ngủ được tách ra riêng biệt, có cửa sổ và ban công view đẹp để khách ngắm được phong cảnh.</li><li>Trang thiết bị của <strong>phòng suite</strong> cũng được đầu tư tối đa: điều hòa hai chiều, tivi, loa, đèn chùm… cùng với đó là bàn làm việc và thiết kế thêm quầy bar nhỏ. Phòng này có có thể đi kèm với những dịch vụ ưu đãi đặc biệt: phục vụ 24/24, xe đưa đón.</li><li>Nhắc đến phòng suite, có thể kể đến 2 loại nhỏ hơn như sau:</li></ul>', 0),
(25, '2022-08-15 22:11:02', NULL, 'phòng haaaa', 400000, '<p>cấccascasc</p>', 0);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 là xóa mềm , 0 là chưa xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`, `google_id`, `status`) VALUES
(1, 'Test User', 'test@example.com', '2022-07-22 09:25:54', '$2y$10$wQv6tstM.SWbgICmdivxouyRR.hjN5zMagGIgLZJFcw0wm3ezs6Uy', 'dcmQERSJ4c', '2022-07-22 09:25:54', '2022-07-22 09:25:54', NULL, NULL, 0),
(2, 'Nguyen Duc Binh P H 1 5 1 0 7', 'binhndph15107@fpt.edu.vn', '2022-07-22 09:27:56', '$2y$10$PnlQ1UpnqCU8pcA/63F.7.921.aw6eW6NYw3vbUNC0uycwXZVmocG', 'q1bLUsv91VGdzXzyq9sLZdwye2ZDSjPgja55aH4E2xbhyR4EMRY5CQaeMjAd', '2022-07-22 09:27:56', '2022-07-25 05:36:53', 'https://lh3.googleusercontent.com/a-/AFdZuco2lxwbQj_x9orMsM7BK55xgofrqTz5NVNB5w2y=s96-c', '107853888798505270061', 0),
(3, 'NguyễneRghaDbmyq', 'w9PUeE7Z0alV4mA@gmail.com', '2022-07-22 09:30:31', '$2y$10$terKpfIXKi5Dj.khWsQdOenCobfmNlmBqlW2U.lKE7UWMNa8rBt1a', '1BshoupTtB', '2022-07-22 09:30:31', '2022-07-22 09:30:31', NULL, NULL, 0),
(4, 'NguyễnW8v6fUFYRo', 'Ba0aaTuIaCftHEA@gmail.com', '2022-07-22 09:30:31', '$2y$10$PtjjHmob/8eSIUahQy/teefm4RStfcTQnbexrLdCYsZm.Qn0SqPwm', 'K8VAknP8d5', '2022-07-22 09:30:31', '2022-07-22 09:30:31', NULL, NULL, 0),
(5, 'Nguyễn7aMsyWVimO', 'wHrAI8oJDRlV9sD@gmail.com', '2022-07-22 09:30:31', '$2y$10$38Wmuz1YWoIjEKQZpmoUMuMBOh.J.HpCdUyUBsXloY7n3ve6PKb5u', 'sFfWW76bJi', '2022-07-22 09:30:31', '2022-07-22 09:30:31', NULL, NULL, 0),
(6, 'NguyễnHc7yRaNHZN', '5CkkbphxwwLLvYv@gmail.com', '2022-07-22 09:30:31', '$2y$10$Oh20gLgOPaEICGpc1KX2oeN5TOr5jfrlC5JJ5OiFAdMGLMqPEl3oe', 'K8xUILAkMm', '2022-07-22 09:30:31', '2022-07-22 09:30:31', NULL, NULL, 0),
(7, 'NguyễnEl0WRmzyY3', 'FJVhj4ohEuGAXAu@gmail.com', '2022-07-22 09:30:31', '$2y$10$cgDZOqqeN8em5vZByeTmxOuEO2CAiMJ8gU0TBHpVJlQMeUjyr75rS', 'N2rqRsugzN', '2022-07-22 09:30:31', '2022-07-22 09:30:31', NULL, NULL, 0),
(8, 'NguyễnaQEDTOPw5E', 'o8AZJ0PPEVBtvBo@gmail.com', '2022-07-22 09:30:31', '$2y$10$93MIWwbehjTEhE6QQpgeVu1y.KxAhcWDUw5rRIqcma5Iummon0Q1i', 'PYXAz2Smhz', '2022-07-22 09:30:31', '2022-07-22 09:30:31', NULL, NULL, 0),
(9, 'Nguyễn1r4h77NYSb', 'KGcJp76pv1HAeUF@gmail.com', '2022-07-22 09:30:31', '$2y$10$LA.u/GcKSW5FeGCVMZ44NuY/iHIUo4nfekdBCo/6/YkWmr/Nj6Hqa', 'w8ObxIsI6L', '2022-07-22 09:30:31', '2022-07-22 09:30:31', NULL, NULL, 0),
(10, 'NguyễnNBPyr3bHHy', 'CqOgOXUP1DkgZuz@gmail.com', '2022-07-22 09:30:31', '$2y$10$.473k9.ApjvIx6CPM.mL..cjqAi5Y302IYC90ceOVQDB1QuK5pUUa', 'unE43gHV62', '2022-07-22 09:30:31', '2022-07-22 09:30:31', NULL, NULL, 0),
(11, 'NguyễnLCiWjFrEFU', 'jmx6GEc9T5SEHZC@gmail.com', '2022-07-22 09:30:32', '$2y$10$SpkG5jhDLQgrKSbH8UiI.eqpVhraOUW.QIgqZWogOUOlM674QAEYG', 'qcBo0EBZqm', '2022-07-22 09:30:32', '2022-07-22 09:30:32', NULL, NULL, 0),
(12, 'NguyễnJDMHNYqg0j', 'g2b1lwf3mMyiQUF@gmail.com', '2022-07-22 09:30:32', '$2y$10$uKm4QENRf/24eeM8BhCj.ed2dKnYse9ytvmO8g03fqefVW0b5oeUO', 'agps2ujJ9m', '2022-07-22 09:30:32', '2022-07-22 09:30:32', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 1),
(13, 'NguyễnUhhJWtBONC', 'ACVrS5q2VNwr6zX@gmail.com', '2022-07-22 09:30:32', '$2y$10$VlH5v19zvKpOLGtFO3KUVugXfziBXhH238vHW4y9aG5K44UjmW0Ra', 'wqRq3ssrwG', '2022-07-22 09:30:32', '2022-07-22 09:30:32', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 1),
(14, 'NguyễnWhuGPxCSa9', 'Vtn9PLbKHEI2ARu@gmail.com', '2022-07-22 09:30:32', '$2y$10$494KB9lP68TpDkMque/6neyGvh1XD.p8pqCajmlPjfJuFpafIP0Hi', 'rnnsftdR2E', '2022-07-22 09:30:32', '2022-07-22 09:30:32', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 0),
(15, 'NguyễnUiAvOHvfPB', 'u70RQR7IksrrJxB@gmail.com', '2022-07-22 09:30:32', '$2y$10$spyebCldYHAPIXwSQQMQauyyQNKTJTGmvfhO3B2gCUWJn9Rw7WVUa', 'mdeqRdjcsz', '2022-07-22 09:30:32', '2022-07-22 09:30:32', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 0),
(16, 'NguyễnKaj6XragaV', 'ZYkhUAx8DFRctFa@gmail.com', '2022-07-22 09:30:32', '$2y$10$ikhCmU46SU.7lr8uX1cEUObY7enEPSoKSK5H/qCnq2wM7T9bKhUSq', 'T11Tot2lPz', '2022-07-22 09:30:32', '2022-07-22 09:30:32', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 0),
(17, 'NguyễnhW1IYUVr8v', 'gk0FJzDyAxMIeCQ@gmail.com', '2022-07-22 09:30:32', '$2y$10$vqryysqFsZZSj04qGlQ8ouoVkJ0zwdo6TDBlDVif1OrU1cxeYnIL6', '933JB4lTo3', '2022-07-22 09:30:32', '2022-07-22 09:30:32', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 0),
(18, 'Nguyễn3etwHH7B3t', '1eI6cZjLpQtqtGO@gmail.com', '2022-07-22 09:30:32', '$2y$10$VIj0MRUFqAZKUahav6xmS.FO8eRHqPy..0.GeVeYYpB5orfTK2F/S', 'y2TZMh48Lr', '2022-07-22 09:30:32', '2022-07-22 09:30:32', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 0),
(19, 'NguyễnQPTZvkFOLm', 'tbp82v0hSpxNHfZ@gmail.com', '2022-07-22 09:30:32', '$2y$10$aZIOVP1hpW4WmEiSaI2BVOrvplA0quo.jJMrWFwCyvi7G7tpUirs6', 'dvrzM4YJPX', '2022-07-22 09:30:32', '2022-07-22 09:30:32', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 0),
(20, 'Nguyễna4Ngm9Oh75', '4DzgHisgHYivv7p@gmail.com', '2022-07-22 09:30:33', '$2y$10$T/XCAZ7ZJ/ZcYjRU9CzvQOieNz4.cfBh4Wdjj0XHo1SCGE02mj.mG', 'VoCYnzeZ4N', '2022-07-22 09:30:33', '2022-07-22 09:30:33', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 0),
(21, 'Nguyễnfe0F8ZZGis', 'OMiNp1ItFMwRA45@gmail.com', '2022-07-22 09:30:33', '$2y$10$i5xU0bUsIzyPn/Rsz1p4IeyhLca8mlY0W2wGCZazl15nTOK0d6hV2', 'Cgn9U8egpb', '2022-07-22 09:30:33', '2022-07-22 09:30:33', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 0),
(22, 'NguyễnkBczrnTyBQ', 'L6C65fjBUo5KXwb@gmail.com', '2022-07-22 09:30:33', '$2y$10$p61hmlhtIquuC219wKQEd.msR0WXGOnm62.ONmjUXw0xTrMhASwQG', 'CzJhU3E7Hg', '2022-07-22 09:30:33', '2022-07-22 09:30:33', 'https://taimienphi.vn/tmp/cf/aut/anh-gai-xinh-1.jpg', NULL, 1),
(23, 'Nguyễn Đức Bình', 'binhnguyen29102001@gmail.com', '2022-07-22 11:14:45', '$2y$10$QQe65XKE2R/5Muxx9IOwT.JroWxRuMiYus7uDFBmiEPlHnkIUVWMe', 'V8N4PKXrWsZjSGSKzJOCaXnK9fEmpoqJYGkdgzjlhBgaV4g90CjBt9ECOCAh', '2022-07-22 11:14:45', '2022-07-25 05:43:06', 'https://lh3.googleusercontent.com/a-/AFdZucqGtu3tlIb4bKg03WQmW3sJMGjZJDCS5RI3gk9W6Q=s96-c', '111143215551555064772', 0),
(25, 'Anh Nguyễn Quỳnh', 'qanhh962k@gmail.com', NULL, '$2y$10$Cfc2WR9oxyVtgFs58u77H.8eWaURtu/JBsSY8BwUdCrBWj17uLeoi', NULL, '2022-07-25 07:15:50', '2022-07-25 07:15:50', 'https://lh3.googleusercontent.com/a-/AFdZuco3IFG4ObX-F3wWZjPGuu2GqqnGENXOs_cRzLRW=s96-c', '110675172663628655122', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_kh_id_foreign` (`kh_id`);

--
-- Indexes for table `bill_sevices`
--
ALTER TABLE `bill_sevices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_sevices_bill_id_foreign` (`bill_id`),
  ADD KEY `bill_sevices_service_id_foreign` (`service_id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_kh_id_foreign` (`kh_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_author_foreign` (`author`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_type_room_id_foreign` (`type_room_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_rooms`
--
ALTER TABLE `type_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `bill_sevices`
--
ALTER TABLE `bill_sevices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `type_rooms`
--
ALTER TABLE `type_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_kh_id_foreign` FOREIGN KEY (`kh_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill_sevices`
--
ALTER TABLE `bill_sevices`
  ADD CONSTRAINT `bill_sevices_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_sevices_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_kh_id_foreign` FOREIGN KEY (`kh_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_foreign` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_type_room_id_foreign` FOREIGN KEY (`type_room_id`) REFERENCES `type_rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
