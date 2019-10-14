-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2019 at 09:42 PM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.22-1+ubuntu19.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL COMMENT 'id of role',
  `role` varchar(21) NOT NULL COMMENT 'name of role'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Unique identifier of the user',
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'First name',
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Last name',
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Identfier used to login (can be an email address)',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Email address',
  `password` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Password encrypted with BCRYPT or a similar method',
  `role` int(11) DEFAULT NULL COMMENT 'Role of the employee (binary mask). See table roles.',
  `country` int(11) DEFAULT NULL COMMENT 'Country code (for later use)',
  `Department` int(11) DEFAULT '0' COMMENT 'Entity where the employee has a position',
  `position` int(11) DEFAULT NULL COMMENT 'Position of the employee',
  `datehired` date DEFAULT NULL COMMENT 'Date hired / Started',
  `identifier` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Internal/company identifier',
  `language` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en' COMMENT 'Language ISO code',
  `ldap_path` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'LDAP Path for complex authentication schemes',
  `active` tinyint(1) DEFAULT '1' COMMENT 'Is user active',
  `random_hash` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Obfuscate public URLs',
  `user_properties` text COLLATE utf8mb4_unicode_ci COMMENT 'Entity ID (eg. user id) to which the parameter is applied',
  `picture` blob COMMENT 'Profile picture of user for tabular calendar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='List of employees / users having access to Jorani';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `login`, `email`, `password`, `role`, `country`, `Department`, `position`, `datehired`, `identifier`, `language`, `ldap_path`, `active`, `random_hash`, `user_properties`, `picture`) VALUES
(1, 'Benjamin', 'BALET', 'bbalet', 'benjamin.balet@gmail.com', 'bbalet', 8, NULL, 0, 1, '2013-10-28', 'PNC0025', 'en', NULL, 1, NULL, NULL, NULL),
(2, 'shiv', 'sharma', 'shiv', 'shivcharanmt@gmail.com', 'shiv', NULL, NULL, 0, NULL, NULL, '', 'en', NULL, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization` (`Department`),
  ADD KEY `position` (`position`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of role';
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier of the user', AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
