-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2023 lúc 10:03 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `servey-backend`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `correct`, `created_at`, `updated_at`) VALUES
(5, 2, 'Đáp án 21', 0, '2023-03-20 01:24:16', '2023-03-22 18:29:23'),
(6, 2, 'Đáp án 1', 0, '2023-03-20 01:24:22', '2023-03-20 01:24:22'),
(7, 2, 'Đáp án 3', 0, '2023-03-20 01:24:26', '2023-03-20 01:24:26'),
(8, 2, 'Đáp án 4', 0, '2023-03-20 01:24:29', '2023-03-20 01:24:29'),
(9, 7, 'dsfsd', 0, '2023-03-22 18:19:48', '2023-03-22 18:19:48'),
(10, 7, 'asdas', 0, '2023-03-22 18:19:57', '2023-03-22 18:19:57'),
(11, 7, 'asdsa', 0, '2023-03-22 18:20:00', '2023-03-22 18:20:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exams`
--

INSERT INTO `exams` (`id`, `exam`, `created_at`, `updated_at`) VALUES
(1, 'Câu hỏi về x', '2023-03-20 01:18:47', '2023-03-29 00:52:25'),
(2, 'Câu hỏi về html', '2023-03-20 01:18:54', '2023-03-20 01:18:54'),
(3, 'Câu hỏi về css', '2023-03-20 01:18:56', '2023-03-20 01:18:56'),
(4, 'Câu hỏi về cd', '2023-03-20 01:19:01', '2023-03-20 20:58:52'),
(11, 'Câu hỏi về figma', '2023-03-22 02:19:52', '2023-03-22 02:19:52'),
(12, 'Câu hỏi về data', '2023-03-22 02:58:38', '2023-03-22 02:58:38'),
(13, 'Câu hỏi về js', '2023-03-28 18:45:43', '2023-03-28 18:45:43'),
(14, 'Câu hỏi về html', '2023-03-28 18:45:55', '2023-03-28 18:45:55'),
(15, 'Câu hỏi về html', '2023-03-28 19:18:31', '2023-03-28 19:18:31'),
(17, 'Câu hỏi về html', '2023-03-29 00:20:29', '2023-03-29 00:20:29'),
(18, 'Câu hỏi về html', '2023-03-29 00:20:38', '2023-03-29 00:20:38'),
(19, 'Câu hỏi về html', '2023-03-29 00:20:41', '2023-03-29 00:20:41'),
(20, 'Câu hỏi về htmla', '2023-03-29 00:20:48', '2023-03-29 00:20:48'),
(21, 'Câu hỏi về htmla', '2023-03-29 00:23:30', '2023-03-29 00:23:30'),
(22, 'asdas', '2023-03-29 00:52:00', '2023-03-29 00:52:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2023_03_18_084558_create_exams_table', 1),
(26, '2023_03_18_084701_create_questions_table', 1),
(27, '2023_03_18_084759_create_answers_table', 1),
(33, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(34, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(35, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(36, '2016_06_01_000004_create_oauth_clients_table', 2),
(37, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('055adadfcc49fbd71b11c1767f10938e0ce7bc2ec6251a0ee25b8a0f9236582ea7c922bc5b589d66', 2, 3, 'MyApp', '[]', 0, '2023-03-28 19:14:11', '2023-03-28 19:14:11', '2024-03-29 02:14:11'),
('15c4074fc76e17b5cc22b9bfca79f0148b39ebc6301c0123b35439c2353d33d19db5c9eaeb26fb8e', 2, 3, 'MyApp', '[]', 0, '2023-03-29 00:40:04', '2023-03-29 00:40:04', '2024-03-29 07:40:04'),
('20e80a33e8fc61e5491ef3be2a46859eb44493eb31ed3a5c125af442aadb43c50bfd65381efeb2f2', 4, 3, 'MyApp', '[]', 0, '2023-03-29 01:02:07', '2023-03-29 01:02:07', '2024-03-29 08:02:07'),
('2250ba0ece40110b5740fec1df5f619736c16434daba3fbe3235cd6fd875f7072d9742cd2b388f48', 2, 3, 'MyApp', '[]', 0, '2023-03-28 19:14:58', '2023-03-28 19:14:58', '2024-03-29 02:14:58'),
('281204e27fad5e0dc53038004aa825d0054b5c1eb60b673948022f07785e0cd6a7862507e80bcaf0', 2, 3, 'MyApp', '[]', 0, '2023-03-29 00:42:17', '2023-03-29 00:42:17', '2024-03-29 07:42:17'),
('30d596fe2d54e228cf998ea936d57814fd1b343a92f431ca2fc59e04265051da3da9082efa2c2b05', 2, 3, 'MyApp', '[]', 0, '2023-03-29 00:48:20', '2023-03-29 00:48:20', '2024-03-29 07:48:20'),
('37be172dcf0d2a08a4c37af608e2153510378e53d8e1f31891b7276b0abd9b3c2807c7373a375cd5', 2, 3, 'MyApp', '[]', 0, '2023-03-29 01:00:24', '2023-03-29 01:00:24', '2024-03-29 08:00:24'),
('5aa67e3f8115d57774f999d7908630946b8677187847cb4d70dbffb107661a707b5fc7686da1d774', 2, 3, 'MyApp', '[]', 0, '2023-03-28 19:13:43', '2023-03-28 19:13:43', '2024-03-29 02:13:43'),
('604fd61db1374cd1ee7bd8f3609ce51dfcb7c69c81ac882fa55afe71d1c8637a3edfb1ce83b03be7', 2, 3, 'MyApp', '[]', 0, '2023-03-29 00:39:11', '2023-03-29 00:39:11', '2024-03-29 07:39:11'),
('8e0db45e0378eadcf63482815fbb8a891096202d58aa56a1c8e1a7f6d729453346a4168c3471be9b', 2, 3, 'MyApp', '[]', 0, '2023-03-28 18:50:16', '2023-03-28 18:50:16', '2024-03-29 01:50:16'),
('d46d096638c8f4ef1694d0063aad33712a42b303406637c4380462443d9f903e0075a7adfab50f4c', 2, 3, 'MyApp', '[]', 0, '2023-03-28 18:42:54', '2023-03-28 18:42:54', '2024-03-29 01:42:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '434OQ8sl0nLejAikar6Km7CDcbM2YGc7KD9MIQja', NULL, 'http://localhost', 1, 0, 0, '2023-03-28 18:06:36', '2023-03-28 18:06:36'),
(2, NULL, 'Laravel Password Grant Client', 'i7oUZrvie0tfSCO8Cz3HEa0uEyE3p3sQ2DRvdW67', 'users', 'http://localhost', 0, 1, 0, '2023-03-28 18:06:36', '2023-03-28 18:06:36'),
(3, NULL, 'Laravel Personal Access Client', 'L8IQJF3dAZdMJb5pvJATroMKmWvM505oLXcvGpq6', NULL, 'http://localhost', 1, 0, 0, '2023-03-28 18:06:48', '2023-03-28 18:06:48'),
(4, NULL, 'Laravel Password Grant Client', 'lmV21BQ1KW3gK7mlWm5oKQCxLkLcsJUOMTlglEEl', 'users', 'http://localhost', 0, 1, 0, '2023-03-28 18:06:48', '2023-03-28 18:06:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-28 18:06:36', '2023-03-28 18:06:36'),
(2, 3, '2023-03-28 18:06:48', '2023-03-28 18:06:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `question`, `created_at`, `updated_at`) VALUES
(2, 1, 'Câu 12', '2023-03-20 01:19:30', '2023-03-22 18:29:32'),
(3, 1, 'Câu 2', '2023-03-20 01:19:34', '2023-03-20 01:19:34'),
(4, 1, 'Câu 3', '2023-03-20 01:19:37', '2023-03-20 01:19:37'),
(5, 1, 'Câu 4', '2023-03-20 01:19:40', '2023-03-20 01:19:40'),
(6, 2, 'Câu 4', '2023-03-20 01:19:43', '2023-03-20 01:19:43'),
(7, 2, 'Câu 3', '2023-03-20 01:19:46', '2023-03-20 01:19:46'),
(8, 2, 'Câu 2', '2023-03-20 01:19:49', '2023-03-20 01:19:49'),
(9, 2, 'Câu 1', '2023-03-20 01:19:52', '2023-03-20 01:19:52'),
(13, 12, 'Câu 1', '2023-03-22 02:58:45', '2023-03-22 02:58:45'),
(14, 12, 'Câu 2', '2023-03-22 02:58:49', '2023-03-22 02:58:49'),
(15, 12, 'Câu 3', '2023-03-22 02:59:10', '2023-03-22 02:59:10'),
(16, 12, 'Câu 4', '2023-03-22 02:59:17', '2023-03-22 02:59:17'),
(17, 1, 'Câu 5', '2023-03-22 02:59:36', '2023-03-22 02:59:36'),
(18, 11, 'Câu 9', '2023-03-22 02:59:51', '2023-03-22 02:59:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'duc doan', 'duc@gamil.com', NULL, '$2y$10$gVRiSb/IzhXiEvHHWaJ0j.Ht21C1PU6sCshSSJN/7h1ug28k3/m7K', NULL, '2023-03-28 18:42:54', '2023-03-28 23:34:36'),
(4, 'duc doan', 'duc@gmail.com', NULL, '$2y$10$85lD9PXcXMn9uZ751remXuMsT0qbdTVmTMEfUmlK0qxkuQ0d0r8kq', NULL, '2023-03-28 19:17:55', '2023-03-28 19:17:55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Chỉ mục cho bảng `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_exam_id_foreign` (`exam_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
