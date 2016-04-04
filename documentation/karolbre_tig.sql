-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2016 at 03:57 PM
-- Server version: 5.6.28-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `karolbre_tig`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventions`
--

CREATE TABLE IF NOT EXISTS `inventions` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `userid` int(3) NOT NULL,
  `inv_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inventions`
--

INSERT INTO `inventions` (`id`, `userid`, `inv_name`, `description`, `image`) VALUES
(1, 1, 'Alternating Current', 'This is a really cool idea! Thank you Tesla! This is a really cool idea! Thank you Tesla! This is a really cool idea! Thank you Tesla! This is a really cool idea! Thank you Tesla!', ''),
(2, 2, 'asdf', 'asdf', ''),
(3, 4, '&lt;script&gt;alert(&#039;hello&#039;);&lt;/script&gt;', '&lt;script&gt;alert(&#039;hello&#039;);&lt;/script&gt;', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dayphone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `evephone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `state` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `zip` int(5) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dayphone`, `evephone`, `address`, `city`, `state`, `zip`, `password`) VALUES
(1, 'Karol Brennan', 'codemasterkarol@gmail.com', '2147483647', '2147483647', '16655 W Salentine Dr', 'New Berlin', 'WI', 53151, '$2y$10$9zWEl2nhDspSNkyWGqLeEOiGtlZcR1uAedxuY7Bxz/oKTPvAJnvDy'),
(2, 'Gock Cobbler', 'me@aaronsaray.com', '2147483647', '2147483647', '1600 Pennsylvania Ave', 'Washington', 'DC', 90078, '$2y$10$di12CdcslG4/LZ34NX3oTO5uwldpeN8MSfQC0GAy2WaU0el6zVROu'),
(3, 'Nikola Tesla', 'genius@edisonsucks.com', '5555555555', '4144444444', '800 Main Street', 'Pewaukee', 'WI', 53132, '$2y$10$1c5HwqtHNppfd9KM4vQWL.o9Hdxkg3TTvDUnAN4BCsFGIY5hhgcv6'),
(4, '&lt;script&gt;alert(&#039;hello&#039;);&lt;/script&gt;', 'guy@smiley.com', '4444444444', '4444444444', '&lt;script&gt;alert(&#039;hello&#039;);&lt;/script&gt;', '&lt;script&gt;alert(&#039;hello&#039;);&lt;/script&gt;', 'WI', 12345, '$2y$10$7rFpYaH9GZbw4ge952vPkuaTE62j9wHtAGuV9iq3gsBbJZxGMnkue');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
