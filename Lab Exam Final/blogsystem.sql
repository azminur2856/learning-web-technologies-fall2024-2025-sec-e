-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 02:53 PM
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
-- Database: `blogsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogposts`
--

CREATE TABLE `blogposts` (
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`post_id`, `author_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 6, 'PHP Introduction', 'The term PHP is an acronym for – Hypertext Preprocessor. PHP is a server-side scripting language designed specifically for web development. It is an open-source which means it is free to download and use. It is very simple to learn and use. The file extension of PHP is “.php”.\r\n\r\nWhat is PHP?\r\nPHP is a server-side scripting language created primarily for web development but it is also used as a general-purpose programming language. Unlike client-side languages like JavaScript, which are executed on the user’s browser, PHP scripts run on the server. The results are then sent to the client’s web browser as plain HTML.\r\n\r\nHistory of PHP\r\nPHP was introduced by Rasmus Lerdorf in 1994, the first version and participated in the later versions. It is an interpreted language and it does not require a compiler. The language quickly evolved and was given the name “PHP,” which initially named was “Personal Home Page.”\r\n\r\nPHP 3 (1998): The first version considered suitable for widespread use.\r\nPHP 4 (2000): Improved performance and the introduction of the Zend Engine.\r\nPHP 5 (2004): Added object-oriented programming features.\r\nPHP 7 (2015): Significant performance improvements and reduced memory usage.\r\nPHP 8 (2020): Introduction of Just-In-Time (JIT) compilation, further enhancing performance.\r\nCharacteristics of PHP\r\nPHP code is executed in the server.\r\nIt can be integrated with many databases such as Oracle, Microsoft SQL Server, MySQL, PostgreSQL, Sybase, and Informix.\r\nIt is powerful to hold a content management system like WordPress and can be used to control user access.\r\nIt supports main protocols like HTTP Basic, HTTP Digest, IMAP, FTP, and others.\r\nWebsites like www.facebook.com and www.yahoo.com are also built on PHP.\r\nOne of the main reasons behind this is that PHP can be easily embedded in HTML files and HTML codes can also be written in a PHP file.\r\nThe thing that differentiates PHP from the client-side language like HTML is, that PHP codes are executed on the server whereas HTML codes are directly rendered on the browser. PHP codes are first executed on the server and then the result is returned to the browser.\r\nThe only information that the client or browser knows is the result returned after executing the PHP script on the server and not the actual PHP codes present in the PHP file. Also, PHP files can support other client-side scripting languages like CSS and JavaScript.\r\nHow PHP Works?\r\nPHP scripts are executed on the server. Here’s a typical flow of how PHP works:\r\n\r\nA user requests a PHP page via their web browser.\r\nThe server processes the PHP code. The PHP interpreter parses the script, executes the code, and generates HTML output.\r\nThe server sends the generated HTML back to the client’s browser, which renders the web page.\r\nThis server-side processing allows for dynamic content generation and ensures that sensitive code is not exposed to the client.', '2025-01-13 14:31:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','author') NOT NULL DEFAULT 'author'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `username`, `password`, `role`) VALUES
(1, 'AZMINUR RAHMAN', '01706329009', 'azminur', '$2y$10$IuRVcfqbhU2GnFBihrDFR.KeFD9pSo6xuQFjEKIDvGLVr3hLiq.8K', 'admin'),
(3, 'SAIKOT', '01743892332', 'saikot', '$2y$10$F5ebKn29JvsSXydQsTdwROIq5L.rEbeTUKJWKjwmVH1vdgoNR2SBG', 'author'),
(6, 'AZMINUR RAHMAN', '01706329009', 'azminur1', '$2y$10$lX.zXdm5TwWNUb35NM2A2eK3TGKkOyNK6dMUv7m1vo/W.V5b6k.p.', 'author');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogposts`
--
ALTER TABLE `blogposts`
  ADD CONSTRAINT `blogposts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
