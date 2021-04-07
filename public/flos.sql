-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 09:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flos`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_uloge` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `Ime`, `prezime`, `email`, `password`, `id_uloge`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'Admin@gmail.com', '3668db850df42c47551e5a7c0d4e5cd7', 2, '2021-04-04 15:51:47', '2021-04-04 17:51:47'),
(2, 'Janko', 'Soskic', 'jankulinjo@gmail.com', '3668db850df42c47551e5a7c0d4e5cd7', 1, '2021-04-05 19:49:36', '2021-04-05 21:49:36'),
(9, 'Pera', 'Peric', 'proba2@gmail.com', '3668db850df42c47551e5a7c0d4e5cd7', 1, '2021-04-06 10:43:46', '2021-04-06 12:43:46');

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
(2, '2021_04_04_130338_korisnici', 1),
(3, '2021_04_04_130350_objave', 1),
(4, '2021_04_04_130359_uloge', 1),
(5, '2021_04_04_130413_prihvacene_objave', 1),
(6, '2021_04_04_131145_stanje_objave', 1);

-- --------------------------------------------------------

--
-- Table structure for table `objave`
--

CREATE TABLE `objave` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_korisnik` bigint(20) UNSIGNED NOT NULL,
  `naslov` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `putanjaSlike` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pregledana` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objave`
--

INSERT INTO `objave` (`id`, `id_korisnik`, `naslov`, `text`, `putanjaSlike`, `pregledana`, `created_at`, `updated_at`) VALUES
(14, 9, 'Pariz je bas lep', 'Ajfelova kula je bas kul', '91617728845.jpg', 1, '2021-04-06 15:07:25', '2021-04-06 15:07:58'),
(16, 2, 'O planatama', 'Neki dugacak text Neki dugacak text Neki dugacak text Neki dugacak text', '21617729552.jpg', 1, '2021-04-06 15:19:12', '2021-04-06 15:19:23'),
(18, 9, 'Iscekujem ponovo letovanje', 'Da li ce ove godine moci da se letuje.....?', '91617730210.jpg', 1, '2021-04-06 15:30:10', '2021-04-06 15:33:47'),
(19, 2, 'Debeli tigric', 'Pogledajte kako debeo tigar', '21617737006.jpg', 0, '2021-04-06 17:23:26', '2021-04-06 17:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `stanje`
--

CREATE TABLE `stanje` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stanje`
--

INSERT INTO `stanje` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(1, 'Prihvacen', '2021-04-04 15:51:43', '2021-04-04 15:51:43'),
(2, 'Odbijen', '2021-04-04 15:51:43', '2021-04-04 15:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(1, 'Korisnik', '2021-04-04 15:49:21', '2021-04-04 15:49:21'),
(2, 'Admin', '2021-04-04 15:49:21', '2021-04-04 15:49:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objave`
--
ALTER TABLE `objave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stanje`
--
ALTER TABLE `stanje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `objave`
--
ALTER TABLE `objave`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `stanje`
--
ALTER TABLE `stanje`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
