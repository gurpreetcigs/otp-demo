-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2018 at 06:37 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `images`
--

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `otp_response_id` varchar(100) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `expired` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `phone`, `otp`, `otp_response_id`, `verified`, `created_at`, `updated_at`, `expired`) VALUES
(1, '9896079169', '55045', 'otp_not_found_and_placeholder_not_found_in_message', 0, '2018-11-09 07:22:47', '2018-11-09 12:52:47', 0),
(2, '9896079169', '946147', '386b696c3170373738363630', 0, '2018-11-09 07:23:17', '2018-11-09 12:53:17', 0),
(3, '9896079169', '852944', '386b696d6c6f313737313838', 0, '2018-11-09 07:42:15', '2018-11-09 13:12:15', 0),
(4, '9896079169', '194839', '386b696d7259393034393438', 0, '2018-11-09 07:48:51', '2018-11-09 13:18:51', 0),
(5, '9896079169', '509538', '386b696d7446343332303134', 0, '2018-11-09 07:50:32', '2018-11-09 13:20:32', 0),
(6, '9896079169', '601821', '386b696d7576303231363236', 0, '2018-11-09 07:51:22', '2018-11-09 13:21:22', 0),
(7, '7988213766', '569477', '386b696d4241353432333230', 0, '2018-11-09 07:58:27', '2018-11-09 13:28:27', 0),
(8, '9896079169', '222788', '386b696e5a51393735363231', 0, '2018-11-09 09:22:43', '2018-11-09 14:52:43', 0),
(9, '9896079169', '5901', '386b696e3731343638373233', 0, '2018-11-09 09:29:53', '2018-11-09 14:59:53', 0),
(10, '9896079169', '735679', '386b696f6378313737373931', 0, '2018-11-09 09:33:24', '2018-11-09 15:03:24', 0),
(11, '9896079169', '961908', '386b696f6434393730343731', 0, '2018-11-09 09:34:56', '2018-11-09 15:04:56', 0),
(12, '9896079169', '530969', '386b696f654a353634373335', 0, '2018-11-09 09:35:36', '2018-11-09 15:05:36', 0),
(13, '9896079169', '742593', '386b696f787a313635323634', 0, '2018-11-09 09:54:26', '2018-11-09 15:24:26', 0),
(14, '', '609003', 'Some Parameter are missing : mobiles/group_id', 0, '2018-11-09 10:06:44', '2018-11-09 15:36:44', 0),
(15, '9896079169', '9318', '386b696f4a36383939313033', 0, '2018-11-09 10:06:58', '2018-11-09 15:36:58', 0),
(16, '9896079169', '4272', '386b69717579303539383432', 0, '2018-11-09 11:51:25', '2018-11-09 17:21:25', 0),
(17, '9896079169', '7915', '386b69714256333137373231', 0, '2018-11-09 11:58:48', '2018-11-09 17:28:48', 0),
(18, '9896079169', '3696', '386b69714e74303135313630', 0, '2018-11-09 12:10:20', '2018-11-09 17:40:20', 0),
(19, '9896079169', '7534', '386b69715149303139303533', 0, '2018-11-09 12:13:35', '2018-11-09 17:43:35', 0),
(20, '9896079169', '8044', '386b6971524a353136343832', 0, '2018-11-09 12:14:36', '2018-11-09 17:44:36', 0),
(21, '9896079169', '0500', '386b69726a36383830383435', 0, '2018-11-09 12:40:58', '2018-11-09 18:10:58', 0),
(22, '9896079169', '1348', '386b69726e70363834363035', 0, '2018-11-09 12:44:16', '2018-11-09 18:14:16', 0),
(23, '9896079169', '7676', '386b6972716b373036303835', 0, '2018-11-09 12:47:11', '2018-11-09 18:17:11', 0),
(24, '', '2605', 'Some Parameter are missing : mobiles/group_id', 0, '2018-11-09 12:52:49', '2018-11-09 18:22:49', 0),
(25, '9896079169', '1930', '386b69727637333039393236', 0, '2018-11-09 12:52:59', '2018-11-09 18:22:59', 0),
(26, '9896079169', '1084', '386b69724333383033363738', 0, '2018-11-09 12:59:55', '2018-11-09 18:29:55', 0),
(27, '9896079169', '2848', '386b69724459303135343433', 0, '2018-11-09 13:00:51', '2018-11-09 18:30:51', 0),
(28, '9896079169', '2798', '386b6972466a333838393434', 0, '2018-11-09 13:02:10', '2018-11-09 18:32:10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
