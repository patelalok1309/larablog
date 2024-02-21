-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 02:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'Flutter', 'flutter', NULL, '2024-02-21 00:41:39', '2024-02-21 00:41:39'),
(6, 'PHP', 'php', NULL, '2024-02-21 00:41:44', '2024-02-21 00:41:44'),
(7, 'Dart', 'dart', NULL, '2024-02-21 00:41:49', '2024-02-21 00:41:49'),
(8, 'NextJS', 'nextjs', NULL, '2024-02-21 00:41:56', '2024-02-21 00:41:56'),
(9, 'VueJS', 'vuejs', NULL, '2024-02-21 00:42:06', '2024-02-21 00:42:06'),
(10, 'Laravel', 'laravel', NULL, '2024-02-21 00:42:11', '2024-02-21 00:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(12, 'App\\Models\\User', 1, 'd7f9afe9-b8f9-445f-a72f-3a6f12e0d89a', 'user_avatar', 'pexels-albin-berlin-919073', 'pexels-albin-berlin-919073.jpg', 'image/jpeg', 'public', 'public', 550901, '[]', '[]', '[]', '[]', 1, '2024-02-20 01:12:21', '2024-02-20 01:12:21'),
(14, 'App\\Models\\User', 5, '0b0ba5ad-71cf-4090-9589-226283d5bb8c', 'user_avatar', 'pexels-simon-berger-1323550', 'pexels-simon-berger-1323550.jpg', 'image/jpeg', 'public', 'public', 1136624, '[]', '[]', '[]', '[]', 1, '2024-02-20 01:41:09', '2024-02-20 01:41:09'),
(16, 'App\\Models\\User', 6, '20529c3e-0d06-46bc-bff1-da1b14b901a0', 'user_avatar', 'download', 'download.jpeg', 'image/jpeg', 'public', 'public', 5643, '[]', '[]', '[]', '[]', 1, '2024-02-20 04:19:04', '2024-02-20 04:19:04'),
(17, 'App\\Models\\Post', 8, 'c0e499c4-cc37-4059-bef7-453b8a5fbba4', 'feature_image', 'pexels-albin-berlin-919073', 'pexels-albin-berlin-919073.jpg', 'image/jpeg', 'public', 'public', 550901, '[]', '[]', '[]', '[]', 1, '2024-02-21 04:52:38', '2024-02-21 04:52:38'),
(18, 'App\\Models\\Post', 9, 'fc87d97e-4fc7-4920-8ff6-abe7319f6f82', 'feature_image', 'pexels-albin-berlin-919073', 'pexels-albin-berlin-919073.jpg', 'image/jpeg', 'public', 'public', 550901, '[]', '[]', '[]', '[]', 1, '2024-02-21 04:53:08', '2024-02-21 04:53:08'),
(19, 'App\\Models\\Post', 10, '6fb470e0-ee2f-418e-a8f4-85db6a5a7bd2', 'feature_image', 'download', 'download.png', 'image/png', 'public', 'public', 6451, '[]', '[]', '[]', '[]', 1, '2024-02-21 05:39:37', '2024-02-21 05:39:37'),
(20, 'App\\Models\\Post', 11, '9c891a32-38d9-42af-b057-ad35e3960b22', 'feature_image', 'pexels-pixabay-268533', 'pexels-pixabay-268533.jpg', 'image/jpeg', 'public', 'public', 159428, '[]', '[]', '[]', '[]', 1, '2024-02-21 05:42:29', '2024-02-21 05:42:29'),
(21, 'App\\Models\\Post', 11, 'd84f6005-5ddc-4fe2-b21f-3f4f6f71ee53', 'feature_image', 'pexels-simon-berger-1323550', 'pexels-simon-berger-1323550.jpg', 'image/jpeg', 'public', 'public', 1136624, '[]', '[]', '[]', '[]', 2, '2024-02-21 06:44:08', '2024-02-21 06:44:08'),
(24, 'App\\Models\\Post', 12, '5f1753e9-c2cf-4cd4-adae-756e739bd529', 'feature_image', 'pexels-sebastiaan-stam-1097456', 'pexels-sebastiaan-stam-1097456.jpg', 'image/jpeg', 'public', 'public', 386391, '[]', '[]', '[]', '[]', 1, '2024-02-21 06:59:15', '2024-02-21 06:59:15'),
(25, 'App\\Models\\Post', 4, 'e8e92e97-26a8-40a2-9f61-b83db4c3f718', 'feature_image', 'pexels-stephan-seeber-1261728', 'pexels-stephan-seeber-1261728.jpg', 'image/jpeg', 'public', 'public', 1174473, '[]', '[]', '[]', '[]', 1, '2024-02-21 07:00:28', '2024-02-21 07:00:28'),
(26, 'App\\Models\\Post', 2, 'eeb37c6e-28b8-47a0-b678-db1e0dfc3b40', 'feature_image', 'pexels-simon-berger-1323550', 'pexels-simon-berger-1323550.jpg', 'image/jpeg', 'public', 'public', 1136624, '[]', '[]', '[]', '[]', 1, '2024-02-21 07:00:48', '2024-02-21 07:00:48'),
(27, 'App\\Models\\Post', 13, '9f92c571-cca1-45f8-964e-c622c79dfe8b', 'feature_image', 'pexels-photo-1131774', 'pexels-photo-1131774.webp', 'image/webp', 'public', 'public', 8638, '[]', '[]', '[]', '[]', 1, '2024-02-21 07:59:05', '2024-02-21 07:59:05'),
(28, 'App\\Models\\Post', 14, '5bc951fb-acff-44ed-9390-9d7d79ea8e07', 'feature_image', 'sea-bay-waterfront-beach-50594', 'sea-bay-waterfront-beach-50594.jpeg', 'image/jpeg', 'public', 'public', 134145, '[]', '[]', '[]', '[]', 1, '2024-02-21 08:01:48', '2024-02-21 08:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_19_065224_create_permission_tables', 2),
(7, '2024_02_19_133226_create_media_table', 3),
(9, '2024_02_20_121618_create_categories_table', 4),
(14, '2024_02_21_051949_create_posts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 25),
(1, 'App\\Models\\User', 35),
(1, 'App\\Models\\User', 37),
(1, 'App\\Models\\User', 39),
(2, 'App\\Models\\User', 34),
(2, 'App\\Models\\User', 40),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 36),
(3, 'App\\Models\\User', 38);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'create user', 'web', '2024-02-20 04:33:26', '2024-02-20 04:33:26'),
(3, 'Edit user details', 'web', '2024-02-20 04:34:50', '2024-02-20 04:34:50'),
(4, 'Create Blog', 'web', '2024-02-20 06:37:39', '2024-02-20 06:37:39'),
(5, 'Update Blog', 'web', '2024-02-20 06:37:47', '2024-02-20 06:37:47'),
(6, 'Delete Blog', 'web', '2024-02-20 06:37:53', '2024-02-20 06:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `excerpt` mediumtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` enum('publish','draft') NOT NULL DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `user_id`, `category_id`, `excerpt`, `content`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'ck editor 5', 'ck-editor-5', 1, 6, 'ck editor', '<ul>\r\n	<li>content editor from ck editor</li>\r\n	<li>paragraph</li>\r\n	<li>\r\n	<p>new line</p>\r\n\r\n	<h2>heading 1</h2>\r\n	</li>\r\n</ul>', 'publish', '2024-02-21 01:26:25', '2024-02-21 07:00:48', NULL),
(3, 'Bugati', 'bugati', 1, 10, 'There are many variations of passag', '<p>&nbsp;<img alt=\"\" src=\"http://127.0.0.1:8000/storage/blog/images/pexels-albin-berlin-919073_1708506229.jpg\" style=\"height:133px; width:200px\" />There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition</p>', 'draft', '2024-02-21 03:38:15', '2024-02-21 05:40:36', '2024-02-21 05:40:36'),
(4, 'Laravel spatie media files', 'laravel-spatie-media-files', 1, 5, 'There are many variations of passages of Lorem Ipsum availabl', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition</p>', 'publish', '2024-02-21 04:45:05', '2024-02-21 07:00:15', NULL),
(5, 'asdf', 'asdf', 1, 6, 'asdf', '<p>asdf</p>', 'draft', '2024-02-21 04:46:08', '2024-02-21 04:53:25', '2024-02-21 04:53:25'),
(6, 'asdfasdf', 'asdfasdf', 1, 5, 'sadf', '<p>asdf</p>', 'publish', '2024-02-21 04:47:47', '2024-02-21 04:53:26', '2024-02-21 04:53:26'),
(7, 'asdf', 'asdf', 1, 8, 'asdf', '<p>asdf</p>', 'draft', '2024-02-21 04:48:22', '2024-02-21 04:53:28', '2024-02-21 04:53:28'),
(8, 'asdf', 'asdf', 1, 6, 'qwer', '<p>asdf</p>', 'publish', '2024-02-21 04:52:37', '2024-02-21 04:53:31', '2024-02-21 04:53:31'),
(9, 'asdf', 'asdf', 1, 6, 'qwer', '<p>asdf</p>', 'draft', '2024-02-21 04:53:08', '2024-02-21 04:53:32', '2024-02-21 04:53:32'),
(10, 'feature image', 'feature-image', 1, 5, 'excerpt', '<p>feature imgage</p>', 'publish', '2024-02-21 05:39:36', '2024-02-21 05:40:42', '2024-02-21 05:40:42'),
(11, 'Laravel Blog Development', 'laravel-blog-development', 1, 10, 'laravel blog development', '<p>The S3 driver configuration information is located in your&nbsp;<code>config/filesystems.php</code>&nbsp;configuration file. This file contains an example configuration array for an S3 driver. You are free to modify this array with your own S3 configuration and credentials. For convenience, these environment variables match the naming convention used by the AWS CLI.<img alt=\"\" src=\"http://127.0.0.1:8000/storage/blog/images/6.1_1708513911.jpg\" style=\"height:664px; width:720px\" /></p>', 'draft', '2024-02-21 05:42:29', '2024-02-21 05:42:29', NULL),
(12, 'Mern stack development', 'mern-stack-development', 1, 8, 'nothing in excerpt', '<p>new mern stack development course</p>\r\n\r\n<p>&nbsp;</p>', 'publish', '2024-02-21 06:51:34', '2024-02-21 06:59:58', NULL),
(13, 'dolore magna aliqua', 'dolore-magna-aliqua', 1, 8, 'consectetur adipiscing elit, sed do eiusmod tempor incidi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam sollicitudin tempor id eu nisl nunc. Aenean euismod elementum nisi quis eleifend. Ut eu sem integer vitae justo eget. Egestas sed tempus urna et pharetra pharetra massa. Aliquet porttitor lacus luctus accumsan tortor posuere. Dolor sed viverra ipsum nunc aliquet bibendum enim facilisis. Lacus suspendisse faucibus interdum posuere lorem. Commodo nulla facilisi nullam vehicula ipsum. In egestas erat imperdiet sed euismod nisi porta lorem. Massa ultricies mi quis hendrerit. Ornare quam viverra orci sagittis eu volutpat odio. Vitae auctor eu augue ut lectus arcu bibendum.</p>\r\n\r\n<p>Odio facilisis mauris sit amet massa vitae. Suscipit tellus mauris a diam maecenas sed. Dui nunc mattis enim ut tellus elementum. Hendrerit gravida rutrum quisque non. Purus ut faucibus pulvinar elementum integer. Scelerisque purus semper eget duis at tellus at. Nec ullamcorper sit amet risus nullam eget felis eget. Quis risus sed vulputate odio. Egestas pretium aenean pharetra magna ac. Commodo elit at imperdiet dui accumsan sit amet. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices. Auctor elit sed vulputate mi sit. Ultrices tincidunt arcu non sodales neque sodales ut etiam sit. Ut porttitor leo a diam sollicitudin tempor. Morbi tincidunt augue interdum velit euismod in pellentesque. Ut tortor pretium viverra suspendisse. Sed tempus urna et pharetra pharetra massa.<img alt=\"\" src=\"http://127.0.0.1:8000/storage/blog/images/pexels-photo-1131774_1708522121.webp\" style=\"height:301px; width:400px\" /></p>', 'draft', '2024-02-21 07:59:05', '2024-02-21 07:59:05', NULL),
(14, 'magnam molestiae sit', 'magnam-molestiae-sit', 1, 7, 'Est dicta quas est exercitationem saepe', '<p>onsectetur in similique magni eum nulla galisum. Sit ducimus nihil rem dolor ipsum et inventore dolore nam nihil fugit! Et pariatur illo sed nostrum aliquam sit aspernatur fugit cum numquam veniam est laborum cupiditate qui corporis nihil.</p>\r\n\r\n<p>Est dicta quas est exercitationem saepe sed animi amet hic sequi omnis ut porro dolor. Et doloremque autem est sequi aspernatur aut harum quas. Ut magnam molestiae sit repellendus temporibus non dicta facilis. Et optio numquam aut numquam illum ab accusantium expedita et error laboriosam vel explicabo totam vel rerum temporibus.</p>\r\n\r\n<p>Ut laudantium quidem et possimus Quis id nobis dolorem et error consequatur. Eum atque eveniet in incidunt voluptas non corporis galisum sed nobis perferendis? Rem voluptatem earum ut omnis rerum quo suscipit obcaecati quo neque excepturi.<img alt=\"\" src=\"http://127.0.0.1:8000/storage/blog/images/pexels-photo-1413412_1708522251.webp\" style=\"height:267px; width:400px\" /></p>', 'publish', '2024-02-21 08:01:48', '2024-02-21 08:01:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'author', 'web', NULL, NULL),
(3, 'editor', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 1),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aalok', 'alokdholu10@gmail.com', NULL, '$2y$12$uOuGvpXur0S7qvFB8Z8HJ.2jCCCFEpB/pxx.6FY2fzADYGpeEdWqu', NULL, '2024-02-20 00:13:47', '2024-02-20 01:14:38'),
(5, 'asdf', 'asdf@gmail.com', NULL, '$2y$12$kDZIUZfmUNNevmtLVX4OCeZ7nku8NKdBSFn3oR877rYoZJ8H8h0ui', NULL, '2024-02-20 01:41:08', '2024-02-20 01:41:08'),
(6, 'vaibhav', 'vaibhav@gmail.com', NULL, '$2y$12$LG5mAiUAaf/TlChKB8dJuelQ73T.d8FBtkHWT0tIvMwKxlPxLkwhC', NULL, '2024-02-20 04:19:04', '2024-02-20 04:19:04');

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
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
