-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 11:39 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--
CREATE DATABASE IF NOT EXISTS `projekt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Domagoj', 'Fabek', 'dfabek', '$2y$10$MgS45ZF7PebpkycFxH/cH./JQeeh4jz.C9LHgtxrGqHRtM65x6dO6', 0),
(2, 'da', 'da', 'da', '$2y$10$xvaxJxm6cTBzS.1P2iRD5u0aTFol/hXSQr5/z5W9yUqsVqe1Vv/O.', 1),
(4, 'da', 'da', 'dad', '$2y$10$3/MKKwQbXbmk3vYPrM4Ieu1k2ecCQop35kTWiSQHJzyreEul/ch6q', 0),
(5, 'da', 'da', 'd', '$2y$10$jMy5lwpsf/g33aJGX36hku2F5KTN8bCzeDCtGIm0fOmAUbJJUBs6m', 0),
(6, 'dd', 'dd', 'dd', '$2y$10$8EB7mxmq4sOQZVzA.RnH9.2AznzskfXS2jH7kvV5RKZ59JPHBAhnm', 0),
(7, '', '', '', '$2y$10$01.unuBzoYY3OBV9HrSowOvV.Li1y5EOF8Cv5BFq7KudXO3bHBNCm', 0),
(8, '123', '123', '123', '$2y$10$wmoe209JLccBNjy1dZhws.WVbLfPiRnEp29snTB/ZgR5zBaZ/XNey', 0),
(9, '12345', '12345', '12345', '$2y$10$T5sWYcHtXPN2bkV9bssbBe99.X/3miuA/wkEDky4TpsKJ/Uw33grC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `about` text NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `title`, `about`, `content`, `photo`, `category`, `archive`) VALUES
(18, '2021-06-12 15:48:36', 'Naslov ', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.', 'kante.jfif', 'sport', 0),
(27, '2021-06-12 15:48:40', 'Naslov ', 'Lorem ipsum dolor sit amet\r\n\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.\r\n\r\n\r\n', 'kante.jfif', 'sport', 0),
(28, '2021-06-12 15:48:56', 'Naslov', 'Lorem ipsum dolor sit amet', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.\r\n', 'kante.jfif', 'sport', 0),
(33, '2021-06-12 15:49:01', 'Naslov ', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.\r\n', 'kante.jfif', 'sport', 0),
(35, '2021-06-12 15:49:16', 'Naslov ', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.\r\n', 'kante.jfif', 'sport', 0),
(37, '2021-06-12 15:49:27', 'Naslov', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.\r\n', 'kante.jfif', 'sport', 0),
(38, '2021-06-12 15:49:32', 'Naslov ', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.\r\n', 'kante.jfif', 'sport', 0),
(39, '2021-06-12 15:49:38', 'Naslov', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.\r\n', 'kante.jfif', 'sport', 0),
(46, '2021-06-12 15:48:11', 'Naslov', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.', 'hnk.jfif', 'kultura', 0),
(47, '2021-06-12 15:48:16', 'Naslov', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.', 'hnk.jfif', 'kultura', 0),
(48, '2021-06-12 15:48:17', 'Naslov', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.', 'hnk.jfif', 'kultura', 0),
(49, '2021-06-12 15:48:18', 'Naslov', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.', 'hnk.jfif', 'kultura', 0),
(50, '2021-06-12 15:48:19', 'Naslov', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.', 'hnk.jfif', 'kultura', 0),
(51, '2021-06-12 15:48:20', 'Naslov', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.', 'hnk.jfif', 'kultura', 0),
(52, '2021-06-12 16:00:11', 'Naslov', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel cursus erat. Aliquam accumsan laoreet quam, in dapibus tortor porttitor a. Fusce at eros iaculis, pulvinar leo at, gravida nunc. Aliquam nec dictum turpis. In mattis orci et erat porta, vel aliquet erat mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris scelerisque dui in placerat consequat. Proin eu nisl ac sem vulputate posuere. Donec ipsum ipsum, malesuada a semper placerat, laoreet eget turpis. Donec faucibus aliquet erat, a blandit leo gravida ultricies. Ut id justo at leo auctor posuere. Donec ornare nibh ipsum.', 'hnk.jfif', 'kultura', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
