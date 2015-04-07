-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2014 at 04:16 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Developer''s id',
  `category_id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '''0'' - disabled , ''1''- enabled',
  `logo` varchar(255) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `ndownloads` int(11) NOT NULL,
  `disabled_comments` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `category_id` (`category_id`),
  KEY `platform_id` (`platform_id`),
  KEY `device_id` (`device_id`),
  KEY `developer_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `user_id`, `category_id`, `description`, `status`, `logo`, `platform_id`, `device_id`, `ndownloads`, `disabled_comments`) VALUES
(4, 'Talking Tom', 2, 2, 'Talk to Tom: Speak and he repeats what you say in his own hilarious voice.\r\nPlay with Tom: Stroke him, poke him, challenge him and earn gold coins in a mini-game.\r\nFun new actions: Involving exploding bags, pillow smashes and lots of farts! \r\n', '1', 'talking_tom.png', 2, 1, 10000, 'None'),
(5, 'KBC Official', 2, 2, 'From the Makers of the India''s #1 Hit TV show, Multi Screen Media, presents The Official ‘Kaun Banega Crorepati’ App! Welcome to the NEW KBC – on your Phone & Tablet!Now download and get a chance to register for the show Kaun Banega Crorepati. ', '1', 'kbc.jpg', 2, 1, 50000, 'None'),
(6, 'Finger Print Lock', 3, 2, 'Touch the sensor area of the fingerprint scanner on screen with your fingers and raise the lock of your mobile phone. Your friends will be amazed, as the app rejects their fingerprints like a real fingerprint reader.This is not a security application or lockscreen!', '1', 'finger_print.png', 2, 1, 100000, 'None'),
(7, 'App Lock', 2, 2, 'The Best app lock in Play Store\r\nApp Lock can lock Whats AppSMS, games Contacts, Gmail, Facebook, Gallery, Market, Settings, Calls and any app you choose, protecting your privacy.\r\nProtects(Locks) installed Apps using password(PIN or Words), pattern....', '1', 'applock.png', 2, 1, 2186234, 'None'),
(8, 'Change Voice call', 2, 2, 'Change your caller id and voice to prank your friends.Take your number anywhere you like, if your travelling abroad take your local number with you!\r\ninstructions: select voice BEFORE making the call.\r\nYou may also use the credits with SoundBoard Prankcaller!!', '1', 'change_voice.png', 2, 1, 84696, 'None'),
(29, 'Solitaire', 7, 5, 'Gotta love a classic.\r\n\r\nBringing back the days of when you played Solitaire on PC. Iversoft Solutions presents Solitaire Classic, making it easy to play Solitaire on your phone and tablet. Despite its portability, Solitaire Classic still brings all the fun and challenge that you would hope to find in a Solitaire game. Just like the original, Solitaire is a game that rewards patience, strategy, and skill. Take your time and you will be a Solitaire master before long.\r\n\r\nNo wallet required, enjoy Iversoft’s Solitaire Classic for as long as you like. Now get playing!', '1', 'solitaire.png', 2, 1, 54378, 'None'),
(46, 'Piano Tiles', 7, 5, 'Piano tiles have 23kinds modes,Aday to meet your gaming needs.The game is a very simple and extremely playable Casual game,black or colored tiles can click on the screen forward.don''t tap the white tiles,there is a danger of a red lump oh.New mode:\r\n\r\nSurprise mode\r\nThe bonus, surprises you!', '1', 'piano_tiles.png', 2, 1, 5678, 'Not approved by reviewer'),
(50, 'Chain Reaction', 7, 5, 'A strategy game for 2 to 8 players.\r\n\r\nThe objective of Chain Reaction is to take control of the board by eliminating your opponents'' orbs.\r\n\r\nPlayers take it in turns to place their orbs in a cell. Once a cell has reached critical mass the orbs explode into the surrounding cells adding an extra orb and claiming the cell for the player. A player may only place their orbs in a blank cell or a cell that contains orbs of their own colour. As soon as a player looses all their orbs they are out of the game.', '1', 'chain.png', 1, 1, 34567, 'Not approved by reviewer'),
(68, 'Nutty Roller Coaster', 7, 5, '★ Have you ever wanted to be a rollercoaster conductor? Now you can! ★\r\n★ #1 featured game in Google Play! Over 2 million downloads and over 10 million game sessions!★\r\n\r\nDrive wild rollercoaster rides using a unique, swipe-based control system. Let the tightly tuned physics engine create the most thrilling rides of your life!\r\n\r\nPerfect your skills in over 30 tricky rides, from classic wooden coasters to steel speed demons!\r\n\r\nUse rockets, Jump jets and magnets, earn hearts and coins, run huge loops, massive jumps and stomach-turning, upside-down tracks!', '1', 'nutty.png', 2, 1, 876, 'Not approved by reviewer'),
(69, 'Think', 7, 5, 'A minimalistic, beautifully designed visual puzzle game designed for the Pure Android experience.\r\n\r\nWith over 360 puzzles spread over 30 chapters, this game is sure to pull you in.\r\nBest played with friends and family together. You will rediscover the delight and joy in solving puzzles together - huddled around a small screen for hours together with mesmerizing music.', '1', 'think.png', 2, 1, 345678, 'Not approved by reviewer'),
(71, 'Make My Trip', 7, 12, 'Plan and enjoy a perfect trip with India’s number one online travel company - MakeMyTrip. Join over 2.5 million happy travelers who are already using MakeMyTrip to book cheap flights, get unbelievable discounts on hotel bookings and go on memorable holiday trips. \r\nFlight Bookings\r\nHotel Bookings', '1', 'makemytrip.png', 2, 1, 98765, 'Not approved by reviewer'),
(72, 'Bus & volvo booking- redbus', 7, 12, 'Use redBus.in android app to book bus & Volvo tickets in the easiest & fastest way. The app allows you to search and book bus tickets for over 67,000 routes and also choose from over 1,800 operators. Choose from seater, sleeper, semi-sleeper, A/C, non A/C buses. You can now transact on the redBus.in app using netbanking, credit cards, debit cards, Cash on delivery & phone booking options. ', '1', 'redbus.png', 2, 1, 9876, 'Not approved by reviewer'),
(108, 'The Times of India News', 4, 13, 'The Times of India, India’s largest media house, brings you the best news experience on the go. Download the TOI app on your Android device and stay updated on news from across the world, anywhere, anytime.\r\n\r\nThe TOI app offers everything that an avid news reader is looking for – breaking news, latest headlines, trending news stories and in-depth coverage of sports, entertainment, business and technology including the Mangalyaan mission and Asian Games 2014. From India news to world news, political news to cricket news, technology news to Bollywood news and movie reviews of Bollywood, Hollywood and regional films – get the most relevant coverage of celebrity news. Also available is the vivid photogallery of famous Bollywood celebrities, industrialist, politicians, sports person and events / parties that are the talk of town. Also catch the live coverage of all the breaking news on Times Now Live TV & Times Now Live Audio.\r\n\r\n', '1', 'toi.png', 1, 1, 567890, 'etrd'),
(109, 'Yoga', 2, 10, 'The world''s favorite and the most advanced mobile yoga studio to date! Enjoyed by over 7,000,000 fans worldwide.\r\n\r\nYoga.com Studio is beautiful, simple and delightful to use. 289 poses and breathing exercises, all shown in stunning HD video, make it the largest database of yoga poses. Search for poses by skill level, your fitness goal or by type.\r\n\r\n37 Programs Pre-Installed\r\n- Individually designed for better health and wellbeing\r\n- Suitable for all levels, beginners, intermediate and advanced\r\n- 4 soothing breathing exercises to aid relaxation and meditations', '1', 'yoga.png', 1, 1, 987654, '');

-- --------------------------------------------------------

--
-- Table structure for table `application_downloads`
--

CREATE TABLE IF NOT EXISTS `application_downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `version_id` int(11) NOT NULL,
  `download_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `version_id` (`version_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `application_status_ref`
--

CREATE TABLE IF NOT EXISTS `application_status_ref` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(128) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `application_status_ref`
--

INSERT INTO `application_status_ref` (`id`, `status`, `description`) VALUES
(1, 'Uploaded', 'Developer upload app.'),
(2, 'Analyst Pending', 'Analyst approval pending.'),
(3, 'Analyst approved', 'Analyst approved app.'),
(4, 'Analyst rejected', 'Analyst rejected app based on checklists.'),
(5, 'Admin pending', 'admin approval pending.'),
(6, 'Approved', 'App finally approved and can be displayed to user.'),
(7, 'Rejected', 'App rejected by admin.');

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE IF NOT EXISTS `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', '', 'N;\r\n'),
('developer', '10', NULL, 'N;'),
('developer', '11', NULL, 'N;'),
('developer', '12', NULL, 'N;'),
('developer', '15', NULL, 'N;'),
('developer', '2', '', 'N;'),
('developer', '6', NULL, 'N;'),
('developer', '7', NULL, 'N;'),
('qa analyst', '14', NULL, 'N;'),
('qa analyst', '16', NULL, 'N;'),
('qa analyst', '8', NULL, 'N;'),
('user', '13', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE IF NOT EXISTS `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Activate', 1, '', '', 'N;'),
('activateAnalyst', 0, '', '', 'N;'),
('activateDeveloper', 0, '', '', ''),
('activateUser', 0, '', '', ''),
('admin', 2, '', '', 'N;'),
('Create', 1, '', '', 'N;'),
('createAnalyst', 0, '', '', ''),
('createApp', 1, '', '', 'N;'),
('createDeveloper', 0, '', '', 'N;'),
('createUser', 0, '', '', 'N;'),
('Delete', 1, '', '', 'N;'),
('deleteAnalyst', 0, '', '', ''),
('deleteDeveloper', 0, '', '', ''),
('deleteUser', 0, '', '', 'N;'),
('developer', 2, '', '', 'N;'),
('Edit', 1, '', '', 'N;'),
('editAnalyst', 0, '', '', ''),
('editDeveloper', 0, '', '', 'N;'),
('editUser', 0, '', '', ''),
('manageApps', 1, '', '', 'N;\r\n'),
('qa analyst', 2, '', '', 'N;'),
('reviewApp', 1, NULL, NULL, NULL),
('updateOwnPassword', 1, '', 'return Yii:app()->user->id==$params["post"]->authID;', 'N;\r\n'),
('user', 2, '', '', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE IF NOT EXISTS `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AuthItemChild`
--

INSERT INTO `AuthItemChild` (`parent`, `child`) VALUES
('admin', 'Activate'),
('Activate', 'activateAnalyst'),
('Activate', 'activateDeveloper'),
('Activate', 'activateUser'),
('admin', 'Create'),
('Create', 'createAnalyst'),
('developer', 'createApp'),
('Create', 'createDeveloper'),
('Create', 'createUser'),
('admin', 'Delete'),
('Delete', 'deleteAnalyst'),
('Delete', 'deleteDeveloper'),
('Delete', 'deleteUser'),
('admin', 'Edit'),
('Edit', 'editAnalyst'),
('Edit', 'editDeveloper'),
('Edit', 'editUser'),
('developer', 'manageApps'),
('qa analyst', 'reviewApp');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `description` mediumtext NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `status`, `description`, `create_date`, `modified_date`) VALUES
(2, 'Entertainment', NULL, '0', 'Entertainment', '2014-10-01 22:31:16', '0000-00-00 00:00:00'),
(5, 'Games', NULL, '1', 'Games and apps', '2014-10-03 00:00:00', '0000-00-00 00:00:00'),
(10, 'Sports and Fitness', NULL, '1', 'Sports and fitness', '2014-10-03 00:00:00', '0000-00-00 00:00:00'),
(12, 'Travel Apps', NULL, '1', 'Tavelling is fun', '2014-10-03 00:00:00', '2014-10-15 00:00:00'),
(13, 'News App', NULL, '1', 'news ', '2014-10-03 00:00:00', '2014-10-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category_reviewer_mapping`
--

CREATE TABLE IF NOT EXISTS `category_reviewer_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `checklists`
--

CREATE TABLE IF NOT EXISTS `checklists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `checklists`
--

INSERT INTO `checklists` (`id`, `title`, `description`, `status`, `create_date`, `modified_date`) VALUES
(2, 'hk', 'djwk', '1', '2014-10-10 00:10:15', '2014-10-10 01:40:41'),
(3, 'sdjl', 'nsl', '0', '2014-10-10 00:15:01', '2014-10-10 00:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_category_map`
--

CREATE TABLE IF NOT EXISTS `checklist_category_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `cheecklist_id` (`checklist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` mediumtext NOT NULL,
  `date_reviewed` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '''0'' - disabled , ''1''- enabled',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `application_id` (`application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `application_id`, `user_id`, `comment`, `date_reviewed`, `status`) VALUES
(1, 4, 11, 'amzaing app!', '2014-10-16 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `type`) VALUES
(1, 'mobile'),
(2, 'tablet');

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE IF NOT EXISTS `media_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `type` enum('image','video') NOT NULL,
  `filename` varchar(128) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `application_id`, `type`, `filename`, `status`, `create_date`) VALUES
(6, 29, 'image', 'solitaire.pg', '1', '2014-10-03 00:00:00'),
(7, 46, 'image', 'media_piano.jpg', '1', '2014-10-03 00:00:00'),
(8, 50, 'image', 'media_chain.jpg', '1', '2014-10-03 00:00:00'),
(9, 68, 'image', 'media_nutty.png', '1', '2014-10-03 00:00:00'),
(10, 69, 'image', 'media_think.jpg', '1', '2014-10-03 00:00:00'),
(11, 71, 'image', 'media_makemytrip.png', '1', '2014-10-03 00:00:00'),
(12, 72, 'image', 'media_redbus.png', '1', '2014-10-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE IF NOT EXISTS `platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`id`, `name`) VALUES
(2, 'android'),
(1, 'iOS');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` enum('0','1','2','3','4','5') NOT NULL,
  `date_rated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  `description` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`) VALUES
(1, 'admin', 'Admin of website.'),
(2, 'developer', 'Developer develops applications.'),
(3, 'qa analyst', 'QA analyst reviews developer code.'),
(4, 'user', 'User downloads app.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `activation_key` varchar(128) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `reset_password_key` varchar(128) DEFAULT NULL,
  `reset_password_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `phone_number`, `role_id`, `create_date`, `modified_date`, `activation_key`, `status`, `reset_password_key`, `reset_password_date`) VALUES
(1, 'admin@admin.com', 'password', 'Shikha', 'Jain', '9876543210', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '', '2014-10-13 22:18:29'),
(2, 'vatikaharlalka@gmail.com', 'h', 'Vatika ', 'Harlalka', '9876512345', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '', '0000-00-00 00:00:00'),
(3, 'abc@gmail.com', 'password', 'Arushi', 'Vashist', '1234567890', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '', '0000-00-00 00:00:00'),
(4, 'akanksha@gmail.com', 'hellokity', 'Akanksha', 'Akanksha', '1234554321', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '', '0000-00-00 00:00:00'),
(5, 'abc@abc.com', 'password', 'His', 'Story', '0987644813', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '1', '', '0000-00-00 00:00:00'),
(6, 'shikha@jain.com', 'password', 'Sh', 'Jai', '0986431628', 2, '2014-10-01 20:47:50', '0000-00-00 00:00:00', '1', '1', '', '0000-00-00 00:00:00'),
(7, 'dev@dev.com', 'password', 'Devloper', 'Account', '0987656789', 2, '2014-10-07 22:58:29', '2014-10-14 14:33:40', '1', '1', '', '2014-10-14 14:35:10'),
(8, 'admin', 'password', 'Dev', 'Story', '0987656789', 3, '2014-10-09 23:35:15', '0000-00-00 00:00:00', '0', '1', NULL, NULL),
(10, 'ab1c@abc.com', 'qwerty', 'Dev', 'dnsl', '0987656789', 2, '2014-10-09 23:40:01', '0000-00-00 00:00:00', '0', '1', NULL, NULL),
(11, 'script', 'qwerty', 'His', 'dnsl', '0987656789', 2, '2014-10-09 23:41:30', '0000-00-00 00:00:00', '0', '1', NULL, NULL),
(12, 'demo', 'qwerty', 'Dev', 'dnsl', '0987656789', 2, '2014-10-09 23:42:05', '0000-00-00 00:00:00', '0', '1', NULL, NULL),
(13, 'hfj', 'dbjk', 'dfjk', 'dfjk', 'snfl', 4, '2014-10-09 23:48:38', '0000-00-00 00:00:00', '0', '1', NULL, NULL),
(14, 'admin2', 'password', 'shi', 'fdkj', '987543223', 3, '2014-10-10 02:31:47', '2014-10-10 02:31:47', '0', '0', NULL, '2014-10-10 02:31:47'),
(15, 'dev@dev', 'password', 'Dev', 'account', '987654321', 2, '2014-10-10 03:18:41', '2014-10-14 14:29:28', '0', '1', NULL, '2014-10-10 03:18:41'),
(16, 'rev@rev.com', 'password', 'Rev', 'Well', '987356282', 3, '2014-10-13 01:21:32', '2014-10-13 01:21:32', '0', '1', NULL, '2014-10-13 01:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE IF NOT EXISTS `versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `version` varchar(128) NOT NULL,
  `create_date` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_id` (`application_id`),
  KEY `reviewer_id` (`reviewer_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`id`, `application_id`, `file_name`, `version`, `create_date`, `status_id`, `reviewer_id`, `activity`, `comment`) VALUES
(55, 29, 'app_store.txt', '2.0', '2014-10-10 16:49:19', 6, 1, 'werth', 'sdfghj'),
(56, 69, 'app_store.txt', '1.0', '2014-10-10 16:51:18', 6, 1, '', ''),
(58, 71, 'app_store.txt', '2.0', '2014-10-10 16:56:47', 6, 1, '', ''),
(73, 4, 'j.txt', '2.0', '2014-10-08 00:00:00', 6, 4, 'dsbk', 'vdgkmljhgvhjkl'),
(74, 5, 'hello.txt', '1.0', '2014-10-03 00:00:00', 6, 4, 'hello', 'hello'),
(75, 5, 'hello2.txt', '3.0', '2014-10-03 00:00:00', 3, 4, 'dsklc', 'jksd'),
(76, 6, 'hello.txt', '1.0', '2014-10-03 00:00:00', 6, 4, 'ewfjkl', 'ekjwf'),
(77, 7, 'hello.txt', '1.0', '2014-10-03 00:00:00', 6, 4, 'dsjkcnk', 'jkddfwe'),
(79, 8, 'hello.txt', '1.0', '2014-10-03 00:00:00', 6, 4, 'dnfcoia', 'njdnfvewiubf'),
(82, 46, 'hello.txt', '1.0', '2014-10-03 00:00:00', 6, 2, '', ''),
(83, 71, 'hello.txt', '1.0', '2014-10-03 00:00:00', 6, 2, '', ''),
(84, 72, 'hello.txt', '1.0', '2014-10-03 00:00:00', 6, 1, '', ''),
(85, 109, 'hello.txt', '1.0', '2014-10-03 00:00:00', 6, 1, '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_downloads`
--
ALTER TABLE `application_downloads`
  ADD CONSTRAINT `application_downloads_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_downloads_ibfk_3` FOREIGN KEY (`version_id`) REFERENCES `versions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_downloads_ibfk_4` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_reviewer_mapping`
--
ALTER TABLE `category_reviewer_mapping`
  ADD CONSTRAINT `category_reviewer_mapping_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_reviewer_mapping_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checklist_category_map`
--
ALTER TABLE `checklist_category_map`
  ADD CONSTRAINT `checklist_category_map_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checklist_category_map_ibfk_2` FOREIGN KEY (`checklist_id`) REFERENCES `checklists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media_files`
--
ALTER TABLE `media_files`
  ADD CONSTRAINT `media_files_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `versions`
--
ALTER TABLE `versions`
  ADD CONSTRAINT `versions_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `versions_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `versions_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `application_status_ref` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
