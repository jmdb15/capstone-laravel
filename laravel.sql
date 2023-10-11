-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 07:03 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `activity` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `users_id`, `activity`, `created_at`) VALUES
(1, '2020123456', 'Logged in', '2023-10-05'),
(2, '2020123456', 'Commented on someone\'s question', '2023-10-05'),
(3, '2020123456', 'Commented on someone\'s question', '2023-10-05'),
(4, '2020101010', 'Logged in', '2023-10-05'),
(5, '2020123456', 'Commented on someone\'s question', '2023-10-05'),
(6, '2020101010', 'Commented on someone\'s question', '2023-10-05'),
(7, '2020101010', 'Logged in', '2023-10-07'),
(8, '2020124124', 'Logged in', '2023-10-07'),
(9, '2020142412', 'Logged in', '2023-10-07'),
(10, '2020123456', 'Logged in', '2023-10-07'),
(11, '2020123456', 'Reacted on someone\'s comment', '2023-10-07'),
(12, '2020101010', 'Logged in', '2023-10-08'),
(13, '2020123456', 'Logged in', '2023-10-08'),
(14, '2020101010', 'Logged in', '2023-10-09'),
(15, '2020123456', 'Logged in', '2023-10-09'),
(16, '2020123456', 'Reacted on someone\'s comment', '2023-10-09'),
(17, '2020123456', 'Commented on someone\'s question', '2023-10-09'),
(18, '2020123456', 'Commented on someone\'s question', '2023-10-09'),
(19, '2020123456', 'Commented on someone\'s question', '2023-10-10'),
(20, '2020123456', 'Commented on someone\'s question', '2023-10-10'),
(21, '2020123456', 'Commented on someone\'s question', '2023-10-10'),
(22, '2020123456', 'Commented on someone\'s question', '2023-10-10'),
(23, '2020123456', 'Logged in', '2023-10-10'),
(24, '2020101010', 'Logged in', '2023-10-10'),
(25, '2020124124', 'Logged in', '2023-10-10'),
(26, '2020123456', 'Commented on someone\'s question', '2023-10-10'),
(27, '2020124124', 'Reacted on someone\'s comment', '2023-10-10'),
(28, '2020142412', 'Logged in', '2023-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `queries_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `users_id`, `comment`, `comment_date`, `queries_id`) VALUES
(1, '2020202020', 'Eto sundan mo', '2023-09-24 09:21:58', '1'),
(2, '2020101010', 'Eto pwede din', '2023-09-24 09:30:40', '1'),
(3, '2020101010', 'Pwede, nagtatanogn kana nga e', '2023-09-24 09:57:14', '2'),
(4, '2020123456', 'Ano tanong mo?', '2023-09-27 05:11:53', '2'),
(5, '2020202020', 'Ano ba kailangan mong sundan?', '2023-09-27 05:14:55', '2'),
(6, '2020101010', 'Ganto, kumpletuhin mo ng tamang information yung nasa portal profile then punta ka sa parang bahay malapit sa valencia hall, katok ka hingin mo id mo.', '2023-09-27 13:35:27', '3'),
(7, '2020101010', 'oo naman yes', '2023-09-27 15:01:32', '2'),
(8, '2020124124', 'comment ka ng comment sa sarili mo bat di mo kaya sagutin yung tanong sayo', '2023-09-27 15:05:08', '2'),
(9, '2020101010', 'hello po', '2023-09-28 09:40:16', '1'),
(10, '2020101010', 'Hi lalabas to mamaya', '2023-09-28 16:35:30', '1'),
(12, '2020123456', 'hehe', '2023-10-05 13:25:13', '3'),
(13, '2020123456', 'hihi', '2023-10-05 13:30:36', '3'),
(14, '2020101010', 'hoho', '2023-10-05 13:30:38', '3'),
(15, '2020123456', 'try lang ulit', '2023-10-09 01:49:53', '3'),
(16, '2020123456', 'gagana ba', '2023-10-09 01:50:13', '4'),
(17, '2020123456', 'haha', '2023-10-09 18:10:06', '4'),
(18, '2020123456', 'eto ulit', '2023-10-09 18:10:32', '4'),
(19, '2020123456', 'hahaha', '2023-10-09 18:11:31', '4'),
(20, '2020123456', 'input', '2023-10-09 18:11:37', '4'),
(21, '2020123456', 'try mo nalang maghanap sa udemy baka meron', '2023-10-10 07:52:12', '5'),
(23, '2020142412', 'Pwede rin naman yata kahit sa youtube lang, baka kasi ang piliin mo yung may bayad pa e.', '2023-10-10 08:03:40', '5'),
(24, '2020142412', 'Try mo rin magenroll sa school haha', '2023-10-10 08:14:54', '5');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'test', 'sample2', '2023-10-20 22:00:00', '2023-10-22 00:30:00', '2023-10-01 22:48:01', '2023-10-01 23:34:20'),
(2, 'h', 'sample2', '2023-10-01 22:00:00', '2023-10-04 00:00:00', '2023-10-01 22:52:56', '2023-10-02 03:36:37'),
(4, 'Midterm Week', 'sample2', '2023-10-08 00:56:00', '2023-10-11 12:00:00', '2023-10-02 01:03:02', '2023-10-02 06:02:23'),
(5, 'test', 'sample2', '2023-10-17 01:20:00', '2023-10-17 13:20:00', '2023-10-02 03:25:08', '2023-10-02 06:00:43'),
(6, 'Midterm Week', 'haha', '2023-10-01 12:00:00', '2023-10-03 17:00:00', '2023-10-02 03:36:27', '2023-10-02 03:36:27'),
(11, 'Midterm Week', 'Enjoy students.', '2023-10-09 00:56:00', '2023-10-12 12:00:00', '2023-10-02 04:52:05', '2023-10-02 04:52:05'),
(12, 'Kailangan kasi re', 'O tamo gagana', '2023-10-17 13:20:00', '2023-10-17 18:20:00', '2023-10-02 06:02:07', '2023-10-02 06:02:07');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_09_22_135121_comments_table', 1),
(3, '2023_09_22_142311_queries_table', 1),
(4, '2023_09_22_142526_users_table', 1),
(5, '2023_09_22_143154_votes_table', 1),
(6, '2023_09_25_234914_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `queries_id` bigint(20) DEFAULT NULL,
  `posts_id` bigint(11) DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `users_id`, `content`, `queries_id`, `posts_id`, `is_read`, `created_at`, `updated_at`) VALUES
(2, '2020123456', 'Gabby Charlie Mendoza answered your question', 3, NULL, 1, '2023-10-05 21:30:36', '2023-10-10 05:15:03'),
(3, '2020123456', 'Jemuel Banag answered your question', 3, NULL, 1, '2023-10-05 21:30:38', '2023-10-10 05:14:55'),
(4, '2020101010', 'There is a new post: Malapit na po ang deadline ng system', NULL, 18, 0, '2023-10-10 14:33:30', NULL),
(5, '2020123456', 'There is a new post: Malapit na po ang deadline ng system', NULL, 18, 0, '2023-10-10 14:33:30', NULL),
(6, '2020124124', 'There is a new post: Malapit na po ang deadline ng system', NULL, 18, 1, '2023-10-10 14:33:30', '2023-10-10 08:57:24'),
(7, '2020142412', 'There is a new post: Malapit na po ang deadline ng system', NULL, 18, 0, '2023-10-10 14:33:30', NULL),
(8, '2020202020', 'There is a new post: Malapit na po ang deadline ng system', NULL, 18, 0, '2023-10-10 14:33:30', NULL),
(9, '2020101010', 'Dharyll posted a question: Where i can learn english po ba? Is there meron free course or teacher na mag-teach sa akin mag english? thanks 😘😘', 5, NULL, 0, '2023-10-10 14:40:45', NULL),
(10, '2020123456', 'Dharyll posted a question: Where i can learn english po ba? Is there meron free course or teacher na mag-teach sa akin mag english? thanks 😘😘', 5, NULL, 0, '2023-10-10 14:40:45', NULL),
(11, '2020142412', 'Dharyll posted a question: Where i can learn english po ba? Is there meron free course or teacher na mag-teach sa akin mag english? thanks 😘😘', 5, NULL, 0, '2023-10-10 14:40:45', NULL),
(12, '2020202020', 'Dharyll posted a question: Where i can learn english po ba? Is there meron free course or teacher na mag-teach sa akin mag english? thanks 😘😘', 5, NULL, 0, '2023-10-10 14:40:45', NULL),
(13, '2020123456', 'Dharyll liked your comment: try mo nalang maghanap sa udemy baka meron', 5, NULL, 0, '2023-10-10 15:52:44', NULL),
(14, '2020124124', 'Daniel James commented on your \"Where i can learn english po ba? Is there meron free course or teacher na mag-teach sa akin mag english? thanks 😘😘\"', 5, NULL, 1, '2023-10-10 16:03:40', '2023-10-10 08:52:20'),
(15, '2020124124', 'Daniel James commented on your \"Where i can learn english po ba? Is there meron free course or teacher na mag-teach sa akin mag english? thanks 😘😘\"', 5, NULL, 1, '2023-10-10 16:14:54', '2023-10-10 08:52:15');

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
  `id` int(10) UNSIGNED NOT NULL,
  `links` text DEFAULT NULL,
  `caption` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `links`, `caption`, `is_deleted`, `created_at`, `updated_at`) VALUES
(11, 'phpAAB4_1695741510.jpg|phpAAB5_1695741511.jpg', 'gitara', 0, '2023-09-14 12:09:18', '2023-10-08'),
(12, 'php92E0_1695812835.jpg', 'agsasdgasd', 0, '2023-09-19 12:09:18', '2023-10-08'),
(13, 'php546B_1695892737.jpg|php546C_1695892737.jpg|php546D_1695892737.jpg|php546E_1695892737.jpg|php546F_1695892737.jpg', 'graduands', 0, '2023-10-07 12:09:18', '2023-10-09'),
(14, NULL, 'Hello po announcement po ito', 0, '2023-09-11 12:09:18', '2023-10-09'),
(15, NULL, 'hghahaha', 0, '2023-09-28 12:06:22', '2023-10-09'),
(16, NULL, 'haha may itry lang', 0, '2023-10-10 06:18:14', '2023-10-10'),
(17, NULL, 'again try ulit', 0, '2023-10-10 06:21:24', '2023-10-10'),
(18, NULL, 'Malapit na po ang deadline ng system', 0, '2023-10-08 06:33:30', '2023-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `query` text NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `query_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `users_id`, `query`, `is_deleted`, `query_date`, `created_at`, `updated_at`) VALUES
(1, '2020101010', 'Pano mag enroll?', 1, '2023-10-09 08:37:20', '2023-10-09 14:11:24', '2023-10-09'),
(2, '2020101010', 'Pwede magtanong?', 0, '2023-10-09 08:37:20', '2023-09-24 09:14:59', '2023-10-09'),
(3, '2020123456', 'Pano kumuha ng id? para po kasi sa scholar pambili ng monitor', 0, '2023-10-09 08:37:20', '2023-09-27 05:20:59', '2023-10-09'),
(4, '2020123456', 'May tanong ako ulit', 0, '2023-10-09 08:37:20', '2023-10-08 16:23:48', '2023-10-09'),
(5, '2020124124', 'Where i can learn english po ba? Is there meron free course or teacher na mag-teach sa akin mag english? thanks 😘😘', 0, '2023-10-10 14:40:45', '2023-10-10 06:40:45', '2023-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'student',
  `is_disabled` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `password`, `type`, `is_disabled`, `created_at`, `updated_at`) VALUES
('2020101010', 'php70D7_1695710093.jpg', 'Jemuel Banag', 'jmd@bulsu.edu.ph', '$2y$10$MMKVqst558BPPjS/9wQmbO3okn0y9En9vRVDACSOhcvCb4OSN8wqq', 'admin', 0, '2023-09-24 01:11:54', '2023-10-01 06:06:55'),
('2020123456', 'php8CBD_1695710100.jpg', 'Gabby Charlie Mendoza', 'gab@bulsu.edu.ph', '$2y$10$aaNtXK86.0uulZqU1fKuy.oA2vOWL97nO9lLP7113olz8ezoWT8yK', 'student', 0, '2023-09-24 19:36:17', '2023-09-25 22:35:00'),
('2020124124', 'phpF0F7_1696930540.jpg', 'Dharyll', 'dada@bulsu.edu.ph', '$2y$10$WyiCY9cKMzJdeHcMBLcVBOMqiWO2lAZO2atmq8TfdcQFOKrr7l5Ui', 'student', 0, '2023-09-24 19:35:51', '2023-10-10 01:35:41'),
('2020142412', 'php5AC1_1696662589.jpg', 'Daniel James', 'james@bulsu.edu.ph', '$2y$10$06MTzZGZoLHu3p6dRxOUmO8jJ0Qc0REIU9qkqCQ52mTP565l/3hHG', 'student', 0, '2023-09-25 07:33:23', '2023-10-06 23:09:50'),
('2020202020', 'phpB952_1695799962.jpg', 'Claire', 'claire@bulsu.edu.ph', '$2y$10$NUQCcLYbpGabeSQ9yVUTSuaI7mHh6T4c/MY/MCXyNYs8Q99uAaMiC', 'student', 0, '2023-09-24 01:15:32', '2023-09-26 23:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `users_id` varchar(255) NOT NULL,
  `queries_id` bigint(20) NOT NULL,
  `comments_id` bigint(20) NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`users_id`, `queries_id`, `comments_id`, `checked`) VALUES
('2020101010', 1, 1, 1),
('2020101010', 1, 2, 0),
('2020101010', 1, 3, 1),
('2020101010', 1, 4, 1),
('2020101010', 2, 5, 1),
('2020101010', 3, 6, 1),
('2020123456', 1, 1, 1),
('2020123456', 1, 2, 1),
('2020123456', 1, 9, 1),
('2020123456', 3, 6, 1),
('2020124124', 5, 21, 1),
('2020142412', 1, 2, 0),
('2020142412', 2, 5, 1),
('2020202020', 1, 1, 1),
('2020202020', 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`users_id`,`queries_id`,`comments_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
