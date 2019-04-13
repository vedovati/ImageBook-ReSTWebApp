-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 03:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `path`, `id_user`, `description`, `likes`, `time`) VALUES
(1, 'img/20190406051613pm_aomine.png', 1, 'Aomeine is my best character ;)', 3, '2019-04-06 15:16:13'),
(2, 'img/20190406052034pm_thumb-1920-780345.jpg', 3, 'Let\'s cook!!!!!', 1, '2019-04-06 15:20:34'),
(13, 'img/20190406062017pm_onepunch.jpg', 3, 'fdsahfguascl', 0, '2019-04-06 16:20:17'),
(14, 'img/20190406062025pm_ophzOHU.png', 3, 'dfsads', 1, '2019-04-06 16:20:25'),
(15, 'img/20190406062030pm_yukihira souma 01.jpg', 3, 'fdsafgdsa', 0, '2019-04-06 16:20:30'),
(16, 'img/20190406062035pm_thumb-1920-714659.png', 3, 'asfdsdg', 0, '2019-04-06 16:20:35'),
(17, 'img/20190406062044pm_kagami_taiga__kuroko_no_basket__by_klikster-d7p8iud.png', 3, 'qwerwqtrgfd', 0, '2019-04-06 16:20:44'),
(18, 'img/20190406062102pm_thumb-1920-816809.png', 3, 'trovcz', 2, '2019-04-06 16:21:02'),
(19, 'img/20190406062132pm_thumb-1920-912198.png', 3, 'ijnncvxz', 2, '2019-04-06 16:21:32'),
(20, 'img/20190406062144pm_wTwduLq.png', 3, 'czfdsanxzf', 0, '2019-04-06 16:21:44'),
(21, 'img/20190406062156pm_thumb-1920-745091.png', 3, 'hfdsudfiosnlagghdghsgfs', 3, '2019-04-06 16:21:56'),
(22, 'img/20190407113549am_AUQCmTq.png', 1, 'fdhja afhodgsa fjkds ofqr gouhaspgaff', 3, '2019-04-07 09:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'gigi', 'finizio'),
(3, 'prova', '1234'),
(4, 'matteo', 'vedovati');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
