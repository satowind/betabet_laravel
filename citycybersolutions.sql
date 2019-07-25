-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2018 at 09:36 AM
-- Server version: 5.7.23-0ubuntu0.18.04.1
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
-- Database: `citycybersolutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `staff_id` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `staff_unit` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `staff_unit_id` varchar(50) DEFAULT NULL,
  `user_id` int(225) DEFAULT NULL,
  `flag` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `phone`, `staff_id`, `email`, `name`, `staff_unit`, `branch`, `staff_unit_id`, `user_id`, `flag`) VALUES
(1, '08000000000', '00001', 'info@citycybersolutions.com', 'GOD EYE', 'Gods Eye', '24', '5', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_branch`
--

CREATE TABLE `assigned_branch` (
  `id` bigint(11) NOT NULL,
  `staff_id` varchar(11) DEFAULT NULL,
  `roles_id` varchar(11) DEFAULT NULL,
  `branch_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `account_number` varchar(30) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `user_id` int(225) NOT NULL,
  `account_type` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` varchar(25) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `account_number`, `bank_name`, `account_name`, `user_id`, `account_type`, `created_at`, `flag`, `status`) VALUES
(1, '1000000000', 'Zenith Bank', 'ogugua tochukwu', 11, 'savings', '2018-05-30 10:21:10', '0', '1'),
(2, '1000000000', 'Zenith Bank', 'ogugua tochukwu', 11, 'savings', '2018-08-19 16:49:49', '1', '1'),
(3, '1111111111', 'Access Bank', 'tochukwu alphonsus', 11, 'Current Account', '2018-05-28 16:09:30', '1', '1'),
(4, '1212121212', 'Finbank', 'Stanley Tochukwu', 11, 'Current Account', '2018-08-19 16:49:58', '1', '1'),
(5, '1111122222', 'FCMB', 'Stanley Tochukwu', 11, 'Current Account', '2018-05-31 21:36:02', '1', '1'),
(6, '9999999999', 'Union Bank', 'Stanley Tochukwu', 11, 'Savings Account', '2018-08-19 17:00:15', '1', '1'),
(7, '100001000', 'UBA', 'Series sato', 12, 'Current Account', '2018-08-19 17:00:33', '1', '1'),
(8, '1299348845', 'Zenith Bank', 'Series sato', 12, 'Current Account', '2018-08-19 17:00:36', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `hierachy` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `under` varchar(255) DEFAULT NULL,
  `bet9ja_id` varchar(255) DEFAULT NULL,
  `bet9ja_code` varchar(255) DEFAULT NULL,
  `rank` varchar(8) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `address`, `phone`, `email`, `name`, `city`, `state`, `lga`, `hierachy`, `country`, `under`, `bet9ja_id`, `bet9ja_code`, `rank`, `flag`) VALUES
(1, '111', '111', '111', 'Assign Branch', '11', '11', '11', 'none', '11', '11', NULL, NULL, NULL, 1),
(2, 'online', '', '', 'virtual branch', '', '', '', 'virtual branch', '', NULL, NULL, NULL, NULL, 1),
(9, 'jjjjjjjjjj', '08022233344', 'evensatowind@yahoo.com', 'Regional office', 'aba', 'Abia State', 'Osisioma', 'regional office', 'Nigerian', '24', NULL, NULL, NULL, 1),
(10, 'jjjjjjjjjjjj', '08022233344', 'evensatowind@yahoo.com', 'regional 2', 'adam', 'Adamawa State', 'Numan', 'regional office', 'Nigerian', '24', NULL, NULL, NULL, 1),
(11, 'wwwwwwwwwwww', '08022233344', 'evensatowind@yahoo.com', 'Area office', 'bayo', 'Borno State', 'Bayo', 'area office', 'Nigerian', '9', NULL, NULL, NULL, 1),
(13, 'qqqqqqqqqqqqq', '08022233344', 'evensatowind@yahoo.com', 'Area 2', 'maid', 'Borno State', 'Maiduguri', 'area office', 'Nigerian', '10', NULL, NULL, NULL, 1),
(15, 'gggggggggggg', '08022233344', 'evensatowind@yahoo.com', 'Hub 1', 'cali', 'Akwa Ibom State', 'Itu', 'hub 1 office', 'Nigerian', '11', NULL, NULL, NULL, 1),
(16, 'ggggggggggggggg', '08022233344', 'evensatowind@yahoo.com', 'hub 1--2', 'guma', 'Benue State', 'Guma', 'hub 1 office', 'Nigerian', '13', NULL, NULL, NULL, 1),
(18, 'fffffffffffff', '08022233344', 'evensatowind@yahoo.com', 'Hub 2', 'jos North', 'Plateau State', 'Jos North', 'hub 2 office', 'Nigerian', '9', NULL, NULL, NULL, 1),
(19, 'vvvvvvvvvvvv', '08022233344', 'admin@wealthfoodnetwork.org', 'Hub 2 --2', 'zumi', 'Zamfara State', 'Zurmi', 'hub 2 office', 'Nigerian', '10', NULL, NULL, NULL, 1),
(21, 'ffffffffff', '08022233344', 'info@stmarys.com', 'branch 1', 'awka', 'Anambra State', 'Awka North', 'branch office', 'Nigerian', '11', '236153860124409', 'beta1', NULL, 1),
(22, 'fffffffffffff', '08022233344', 'admin@wealthfoodnetwork.org', 'branch 2', 'owan west', 'Edo State', 'Owan West', 'branch office', 'Nigerian', '13', '2361', 'beta2', NULL, 1),
(23, 'bbbbbbbbbbbb', '08022233344', 'test@gmail.com', 'branch 3', 'ogbaru', 'Anambra State', 'Ogbaru', 'branch office', 'Nigerian', '15', '1136588956369134', 'beta3', NULL, 1),
(24, 'dddddddddddddd', '000000000', 'eeeeeeeeeeeee', 'head office', 'aba', 'Abia State', 'Arochukwu', 'head office', 'Nigerian', NULL, NULL, NULL, '1', 1),
(25, 'bbbbbbbbbbbb', '08022233344', 'test@gmail.com', 'branch 4', 'ogbaru', 'Anambra State', 'Ogbaru', 'branch office', 'Nigerian', '18', '1136588956369134', 'beta3', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) NOT NULL,
  `post_id` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `header` varchar(255) DEFAULT NULL,
  `sub_header` varchar(255) DEFAULT NULL,
  `ho_phone` varchar(255) DEFAULT NULL,
  `ho_email` varchar(255) DEFAULT NULL,
  `ho_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `header`, `sub_header`, `ho_phone`, `ho_email`, `ho_address`, `phone`, `email`, `address`, `map`) VALUES
(1, 'CALL OR MESSAGE US', 'You can Write, call, or visit any of our branches 8am to 6pm Daily and we will be happy to hear from you', '+234-906-207-1761', 'info@betabet.com', 'No 32 Summit Road, Between Flames Fast Food And Chrisvan Filling Sation, Asaba Delta State', '+234-906-207-1761', 'info@betabet.com', 'No 32 Summit Road, Between Flames Fast Food  Asaba Delta State', '6.205,6.8987');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'sato wind', '08038385263', 'evensatowind@yahoo.com', 'How can we help you i am here');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` bigint(20) NOT NULL,
  `ipadress` varchar(255) NOT NULL,
  `day` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `ipadress`, `day`, `date`) VALUES
(1, '::1', '2018-05-10 10:48:30', '2018-05-10'),
(2, '127.0.0.1', '2018-05-10 12:39:40', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `email_2` varchar(50) DEFAULT NULL,
  `email_pin` varchar(50) DEFAULT NULL,
  `email_status` varchar(25) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `phone_2` varchar(25) DEFAULT NULL,
  `phone_pin` varchar(25) DEFAULT NULL,
  `phone_status` varchar(25) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `lga` varchar(30) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `bet9ja_id` varchar(40) DEFAULT NULL,
  `bet9ja_code` varchar(40) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `dob` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` varchar(25) DEFAULT NULL,
  `phone_email_status` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `surname`, `firstname`, `email`, `email_2`, `email_pin`, `email_status`, `phone`, `phone_2`, `phone_pin`, `phone_status`, `gender`, `address`, `street`, `state`, `lga`, `branch`, `bet9ja_id`, `bet9ja_code`, `user_id`, `dob`, `created_at`, `flag`, `phone_email_status`) VALUES
(1, 'Series', 'sato', 'Evensatowind@gmail.com', 'Evensatowind@yahoo.com', NULL, NULL, '08038385263', '08038385263', '0', NULL, 'male', '46 Marina', NULL, 'Lagos State', 'Amuwo-Odofin', '21', 'bet1234', '1234', 12, '2018-06-01', '2018-08-18 22:12:42', '1', '1'),
(2, 'Ogugua', 'Tochukwu', 'evensatowind@gmail.com', NULL, NULL, NULL, '08038385263', '0', '0', NULL, 'male', '46 marina', NULL, 'Akwa Ibom State', 'Mbo', '2', '1111111111', NULL, 11, '2018-05-03', '2018-06-25 10:41:07', '1', NULL),
(3, 'Tochukwu', 'Ogugua', 'mdo@citycybersolutions.com', NULL, NULL, NULL, '08000000111', '0', '0', NULL, 'male', '47 marina', NULL, 'FCT', 'Bwari', '22', '1149856831742119a', NULL, 13, '2018-08-15', '2018-08-20 11:12:09', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `reply` text NOT NULL,
  `flag` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `reply`, `flag`) VALUES
(2, 'how are u doing today', 'i am fine thank you', '1'),
(3, 'how can we help you', 'fine thank you', '1'),
(4, 'are you in School', 'yes oh', '1'),
(7, 'How was School Today?', 'Fine School has been wonderful since 200 AD so why ask? so stop asking', '1');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` bigint(20) NOT NULL,
  `header` varchar(255) NOT NULL,
  `body` text,
  `sender` varchar(255) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `flag` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `header`, `body`, `sender`, `branch`, `flag`, `status`, `time`) VALUES
(1, 'Hi love where are u', 'I am here loveth', '1', '24', '1', '1', '2018-07-10 12:26:51'),
(2, 'hapy new month', 'we are grateful for all the lord have done and all you have done too thanks', '1', '24', '1', '1', '2018-07-10 13:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_users`
--

CREATE TABLE `inbox_users` (
  `id` bigint(20) NOT NULL,
  `note_id` varchar(20) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `flag` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox_users`
--

INSERT INTO `inbox_users` (`id`, `note_id`, `user_id`, `status`, `flag`) VALUES
(11, '1', '11', '2', '1'),
(12, '1', '12', '2', '1'),
(13, '1', '13', '1', '1'),
(14, '2', '11', '2', '1'),
(15, '2', '12', '1', '1'),
(16, '2', '13', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'evensatowind@yahoo.com'),
(2, 'info@christembassy.com'),
(3, 'satoseries@yahoo.com'),
(4, 's*****@outlook.com'),
(5, 's****@outlook.com'),
(6, 'Enter your email');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) NOT NULL,
  `option_name` varchar(255) DEFAULT NULL,
  `option_value` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_name`, `option_value`, `status`) VALUES
(1, 'Phone', '08038385263', '1'),
(2, 'phone', '08038385263', '1'),
(3, 'minimum withdrawal ', '100000000000', '1'),
(4, 'minimum funding', '100', '1'),
(5, 'maximum funding', '20000000000', '1'),
(6, 'maximum funding', '1000000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `options2`
--

CREATE TABLE `options2` (
  `id` bigint(20) NOT NULL,
  `option_name` varchar(255) DEFAULT NULL,
  `option_value` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options2`
--

INSERT INTO `options2` (`id`, `option_name`, `option_value`, `status`) VALUES
(1, 'phone_verification', 'Yes', '1'),
(2, 'email_verification', 'No', '1');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_id` varchar(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_category` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tag` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `flag` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_id`, `title`, `content`, `post_category`, `images`, `time`, `tag`, `status`, `flag`) VALUES
(10, 'post_64', 'fine', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'gaming,gaming,abstraction,nature', '1527970305.jpg', '2018-06-02 20:11:45', 'weekend,friday,happy,awesome,chill,healthy', '1', '1'),
(12, 'post_70', 'Bilic\'s future being discussed by West Ham board and owners', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'gaming,gaming,abstraction,nature', '1527970321.jpg', '2018-06-02 20:12:01', 'sports,football', '1', '1'),
(13, 'post_71', 'i live in lagos', 'dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'gaming,gaming', '1527970342.png', '2018-06-02 20:12:22', 'sports,football,cool bet', '1', '1'),
(15, 'post_64', 'fine', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'abstraction,abstraction,nature,summer,adventure', '1527970202.jpeg', '2018-06-02 20:10:02', 'weekend,friday,happy,awesome,chill,healthy', '1', '1'),
(16, 'post_70', 'Slaven Bilic\'s future being discussed by West Ham board and owners', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sports,sports,gaming,abstraction,nature', '1527970256.jpeg', '2018-06-02 20:10:56', 'sports,football', '1', '1'),
(17, 'post_64', 'fine', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'gaming,gaming,abstraction,nature,summer', '1527970379.jpeg', '2018-06-02 20:12:59', 'weekend,friday,happy,awesome,chill,healthy', '1', '1'),
(18, 'post_71', 'Slaven Bilic\'s future being discussed by West Ham board and owners', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'gaming,gaming,abstraction', '1527970358.jpeg', '2018-06-02 20:12:38', 'sports,football', '1', '1'),
(19, NULL, 'Bilic\'s future being discussed by West Ham board and owners', 'dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'gaming,gaming,abstraction,movie,music', '1527970228.jpg', '2018-06-02 20:22:46', 'ssssssss,ssssssssssss,sssssssssssss', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sequences`
--

CREATE TABLE `sequences` (
  `name` varchar(70) NOT NULL,
  `next` int(11) NOT NULL,
  `inc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sequences`
--

INSERT INTO `sequences` (`name`, `next`, `inc`) VALUES
('user', 1, 1),
('post', 73, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `flicker` varchar(255) DEFAULT NULL,
  `pintrest` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `how_to` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `facebook`, `twitter`, `google`, `flicker`, `pintrest`, `youtube`, `instagram`, `how_to`) VALUES
(1, 'https://www.github.com/satowind', 'https://www.github.com/satowind', 'https://www.github.com/satowind', 'https://www.github.com/satowind', 'https://www.github.com/satowind', 'https://www.github.com/satowind', 'https://www.github.com/satowind', 'Fund your Bet9ja Account and withdrawal just got easier. you can now fund and Withdraw from your account with Betabet in an easy and fast way from the comfort of your home. Just register and enjoy what millions are enjoying.');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` bigint(20) NOT NULL,
  `issue_title` varchar(255) DEFAULT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `flag` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `issue_title`, `user_id`, `status`, `flag`, `date`) VALUES
(1, '7', '11', '1', '1', '2018-07-27 14:56:16'),
(2, '6', '11', '0', '1', '2018-07-27 00:43:59'),
(3, '6', '11', '1', '1', '2018-07-27 16:07:08'),
(4, '7', '12', '1', '1', '2018-08-18 22:16:22'),
(5, '7', '12', '1', '1', '2018-08-18 22:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_chat`
--

CREATE TABLE `tickets_chat` (
  `id` bigint(20) NOT NULL,
  `chats` text,
  `flag` varchar(20) DEFAULT NULL,
  `ticket_id` varchar(20) DEFAULT NULL,
  `customers_id` varchar(20) DEFAULT NULL,
  `admin_id` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets_chat`
--

INSERT INTO `tickets_chat` (`id`, `chats`, `flag`, `ticket_id`, `customers_id`, `admin_id`, `date`) VALUES
(1, '    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1', '11', '1', '2018-07-27 02:34:15'),
(2, '    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '2', '11', NULL, '2018-07-27 02:34:20'),
(3, '    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '2', '11', NULL, '2018-07-27 02:34:24'),
(4, 'how are u man how are u man how are u man how are u man how are u man how are u manhow are u man how are u man how are u man how are u man how are u man how are u man', NULL, '1', '', NULL, '2018-07-26 16:20:55'),
(5, '    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1', '11', NULL, '2018-07-27 02:34:28'),
(6, '    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1', '11', NULL, '2018-07-27 02:34:35'),
(7, 'gggggggggggggggggggggggggg    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1', '11', NULL, '2018-07-27 02:34:38'),
(8, 'ffffffffffffffffff    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1', '11', NULL, '2018-07-27 02:34:41'),
(9, 'ffffffffffffffffff    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1', '11', NULL, '2018-07-27 02:34:45'),
(10, 'meeeeeeeeee    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1', '11', NULL, '2018-07-27 02:34:48'),
(11, 'hhhhhhhhhhhhhhhhhhhh    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1', NULL, '1', '2018-07-27 02:34:52'),
(12, 'hhhhhhhhhhhhhhhhhhhhhhh', NULL, '1', NULL, '1', '2018-07-27 02:32:02'),
(13, 'me    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '1', NULL, '1', '2018-07-27 02:34:55'),
(14, 'ffffffffffffffffffff', NULL, '3', '11', NULL, '2018-07-27 16:07:08'),
(15, 'Celebrate Life Man?', NULL, '4', '12', NULL, '2018-08-18 22:16:22'),
(16, 'Biology is fun dude', NULL, '5', '12', NULL, '2018-08-18 22:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `flag` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`id`, `title`, `flag`) VALUES
(6, 'I want to make payment but is not going help', NULL),
(7, 'How can i fund my account outside betabet app', NULL),
(8, 'ticket category?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` varchar(100) DEFAULT NULL,
  `report` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `date`, `amount`, `report`, `user_id`, `bank_id`, `status`) VALUES
(1, '1111', '2018-05-21 14:43:20', '5000', '1', 1, 12, 1),
(2, '1112', '2018-05-31 11:25:43', '1234', '2', 11, 4, 1),
(3, '1111', '2018-05-21 15:18:38', '5000', '1', 8, 12, 0),
(4, '1112', '2018-05-31 11:25:49', '1234', '2', 11, 4, 2),
(5, 'WT1527682819', '2018-05-31 11:27:38', '500', '2', 11, 3, 1),
(6, 'WT1527682875', '2018-05-30 14:22:10', '200', '2', 11, 3, 1),
(7, 'WT1527683017', '2018-05-30 14:22:17', '200', '2', 11, 3, 3),
(8, 'WT1527685897', '2018-05-30 14:22:14', '200', '2', 11, 3, 2),
(9, 'WT1527685950', '2018-05-30 14:22:12', '200', '2', 11, 3, 1),
(10, 'WT1527687116', '2018-05-30 14:22:21', '200', '1', 11, 3, 1),
(11, 'WT1527687180', '2018-05-31 11:44:00', '200', '1', 11, 4, 2),
(12, 'WT1527688801', '2018-05-31 11:44:04', '50000', '1', 11, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) NOT NULL,
  `staff_unit` varchar(210) NOT NULL,
  `funding` varchar(11) DEFAULT NULL,
  `company_structure` varchar(11) DEFAULT NULL,
  `chat_update` varchar(11) DEFAULT NULL,
  `withdrawal` varchar(11) DEFAULT NULL,
  `customers` varchar(11) DEFAULT NULL,
  `approve_reg` varchar(11) DEFAULT NULL,
  `manage_admin` varchar(11) DEFAULT NULL,
  `contact_us` varchar(11) DEFAULT NULL,
  `blogs` varchar(11) DEFAULT NULL,
  `social_icons` varchar(11) DEFAULT NULL,
  `faq` varchar(11) DEFAULT NULL,
  `how_to` varchar(11) DEFAULT NULL,
  `contact_us_page` varchar(11) DEFAULT NULL,
  `create_unit` int(11) NOT NULL,
  `flag` int(11) DEFAULT NULL,
  `approved_account_number` varchar(25) DEFAULT NULL,
  `basic_settings` varchar(25) DEFAULT NULL,
  `activate_know_your_customer` varchar(25) DEFAULT NULL,
  `inbox` varchar(25) DEFAULT NULL,
  `tickets` varchar(25) DEFAULT NULL,
  `set_tickets` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `staff_unit`, `funding`, `company_structure`, `chat_update`, `withdrawal`, `customers`, `approve_reg`, `manage_admin`, `contact_us`, `blogs`, `social_icons`, `faq`, `how_to`, `contact_us_page`, `create_unit`, `flag`, `approved_account_number`, `basic_settings`, `activate_know_your_customer`, `inbox`, `tickets`, `set_tickets`) VALUES
(4, 'Tailor', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Gods Eye', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 1, '1', '1', '1', '1', '1', '1'),
(6, 'Assign Unit', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, 1, '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` varchar(11) NOT NULL,
  `flag` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `username`, `password`, `remember_token`, `status`, `flag`) VALUES
(1, '1', 'admin', '$2y$10$ZxET/oaiWORycXlbCkjYw.G4evToKdV5P7xR9KLkbpiMpUuYPcAwi', 'dCDvBHFVVtkHzgPxyphmXxcQVVW348ZHWP2kVuWbA9VPFiV6jn0fMhpYdp6b', '2', '1'),
(11, '2', 'satowindz', '$2y$10$fhMAVAB4f.vSaVOvHfEAoO/QffN5sr//IQwTiEukia4p3kRaKILL6', '691tT0r0BGjl7FvCelcw7MaaINolSNN7agwS88t36Cd1itkctYR2qvov77bB', '1', '2'),
(12, '2', 'satoseries', '$2y$10$6/OKr/5.2GOkEcWOaSW0geOzuHe6lIpSEWXhARkIgDtUSqsVIMIi6', 'AS6lW31mA3uhkJ5rd0qg2RcHVVl2W9JCVb9y0WP0NVxfcT1yHOwaU9tuC2o4', '1', '2'),
(13, '2', 'satowindzz', '$2y$10$aL7EQ9OAOiDbqV1dbbBvpevu.CFA44udLbc7LjWMPU8DiFgIlozVW', NULL, '1', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `staff_unit_id` (`staff_unit_id`);

--
-- Indexes for table `assigned_branch`
--
ALTER TABLE `assigned_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_users`
--
ALTER TABLE `inbox_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options2`
--
ALTER TABLE `options2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_chat`
--
ALTER TABLE `tickets_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_id` (`bank_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_unit` (`staff_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assigned_branch`
--
ALTER TABLE `assigned_branch`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inbox_users`
--
ALTER TABLE `inbox_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `options2`
--
ALTER TABLE `options2`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets_chat`
--
ALTER TABLE `tickets_chat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
