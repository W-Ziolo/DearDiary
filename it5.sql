-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 04:02 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it5`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `todo_user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `checked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `todo_user_id`, `title`, `date_time`, `checked`) VALUES
(44, 31, 'wash windows', '2022-12-13 18:41:07', 0),
(55, 30, 'sasas', '2022-12-14 21:48:06', 0),
(56, 30, 'sasa', '2022-12-15 08:06:59', 0),
(57, 30, 'saasa', '2022-12-15 08:08:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trackers1`
--

CREATE TABLE `trackers1` (
  `user_id` int(11) NOT NULL,
  `Sleep` int(11) NOT NULL,
  `Water` float NOT NULL,
  `Mood` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `trackers1`
--

INSERT INTO `trackers1` (`user_id`, `Sleep`, `Water`, `Mood`) VALUES
(28, 0, 0, 0),
(30, 5, 2, 3),
(31, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `Login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Surname` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Login`, `Password`, `Name`, `Surname`) VALUES
(5, 'dorkens', '$2y$10$T4OU.n7zmnI1Jii6pRDnZuXbs4WjypanEONUg/wzdWyhCSrGnSPo6', 'Dorota', 'Bielewicz'),
(6, 'dagga242', '$2y$10$9d3X.O4naOoQP398jyyCPuQA2EI8hNDQ2tomIlOxHgaD6ifBxuAZm', 'Dagmara', 'Ziółkowska'),
(27, 'natka', '$2y$10$9DomEkiC0s/BT8SNr43WM.wKabZ5L1CjU71ySbbVl/CEWcFkx5i.a', 'Natalia', 'Ziółkowska'),
(28, 'Lucy', '$2y$10$co7xgqImWVC3XZ7cZGkEz.8vKmv9iuxD/ld904OgN6g3jx3SidmnS', 'Lucyna', 'Ziółkowska'),
(30, 'wiks', '$2y$10$miadfDqWlNmWLfrFEX5l.eeVUiV9HwSrhe6zRH27t9vhxlzc/pxki', 'Wiktoria', 'Ziółkowska'),
(31, 'mariola', '$2y$10$sPCFOaRO/eBkAkEEH9ucV.wAqj61mjcBoQqRzJiv7XU6ecdfMHKCm', 'mariola', 'sddadas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trackers1`
--
ALTER TABLE `trackers1`
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
