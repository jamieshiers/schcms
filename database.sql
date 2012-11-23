-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2012 at 09:18 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_name` varchar(255) NOT NULL,
  `alert_desc` text NOT NULL,
  `alert_type` varchar(255) NOT NULL,
  `alert_expires` date NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `alerts`
--


-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `allday` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `editable` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT '0',
  `cal_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` VALUES(39, 'Ski Trip - Sixth Form', 'true', '2012-10-27 02:00:00', '2012-10-28 02:00:00', NULL, NULL, 1345215399, 1350470065, 1, '');
INSERT INTO `calendars` VALUES(46, 'Sixth Form Finance Meeting', 'false', '2012-10-26 17:00:00', '2012-10-26 17:00:00', NULL, NULL, 1345558285, 1349950377, 3, '17:00.00');
INSERT INTO `calendars` VALUES(48, 'Castles Trip', 'true', '2012-11-01 02:00:00', '2012-11-01 02:00:00', NULL, NULL, 1345560882, 1350470068, 1, '');
INSERT INTO `calendars` VALUES(49, 'Year 7 STEM', 'false', '2012-10-25 14:00:00', '2012-10-25 02:00:00', NULL, NULL, 1345561010, 1349950375, 1, '14:00.00');

-- --------------------------------------------------------

--
-- Table structure for table `cals`
--

CREATE TABLE `cals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `text_color` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cals`
--

INSERT INTO `cals` VALUES(1, 'Holidays', 'F0B84D', 'fff', 1, 1);
INSERT INTO `cals` VALUES(2, 'Shows', '73c966', 'fff', 1, 1);
INSERT INTO `cals` VALUES(3, 'Parent Events', '85D4F0', 'fff', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `content_type` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` VALUES(22, 0, NULL, 'Vacancy', NULL, '/vacancy', 1, 1, 1347614151, 1349950759);
INSERT INTO `menus` VALUES(24, 0, NULL, 'Page', NULL, '/calendar', 2, 1, 1347614335, 1349950759);
INSERT INTO `menus` VALUES(26, 0, NULL, 'Normal Page', NULL, '/This_is_the_first_post', 3, 1, 1349536671, 1349950759);
INSERT INTO `menus` VALUES(32, 26, NULL, 'Sixth', NULL, '/sixth', 4, 1, 1349860848, 1349950759);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` VALUES('app', 'default', '001_create_scheduled_tweets');
INSERT INTO `migration` VALUES('app', 'default', '002_create_tweets');
INSERT INTO `migration` VALUES('app', 'default', '003_add_published_to_posts');
INSERT INTO `migration` VALUES('app', 'default', '004_add_category_to_posts');
INSERT INTO `migration` VALUES('app', 'default', '005_add_approval_to_posts');
INSERT INTO `migration` VALUES('app', 'default', '006_create_cals');
INSERT INTO `migration` VALUES('app', 'default', '007_add_cal_id_to_calendars');
INSERT INTO `migration` VALUES('app', 'default', '008_add_time_to_calendars');
INSERT INTO `migration` VALUES('app', 'default', '009_create_modules');
INSERT INTO `migration` VALUES('app', 'default', '010_add_position_to_modules');
INSERT INTO `migration` VALUES('app', 'default', '011_add_order_to_modules');
INSERT INTO `migration` VALUES('app', 'default', '012_add_active_to_modules');
INSERT INTO `migration` VALUES('app', 'default', '013_drop_posts');
INSERT INTO `migration` VALUES('app', 'default', '014_drop_pages');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` VALUES(1, 'Calendar', 1, 'left', 1, 1, 1, 1);
INSERT INTO `modules` VALUES(2, 'Calendar', 1, 'right', 1, 1, 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `page` int(11) DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `files` text,
  `published` int(11) DEFAULT '0',
  `category` text,
  `approved` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` VALUES(1, 'Home', '', '', 'home page', 1, 1, 1, 0, 'home', NULL, 1, NULL, 1);
INSERT INTO `posts` VALUES(5, 'Test Page', 'test page', 'test page', 'test page with new pages structure<br>', 1, 1338458631, 1338458631, 1, 'jamie', NULL, 1, 'parents', 0);
INSERT INTO `posts` VALUES(7, 'This is the first post', '', '', 'This is the next page', 1, 1340956850, 1340956850, NULL, 'This_is_the_first_post', NULL, 1, 'students', 1);
INSERT INTO `posts` VALUES(10, 'title', '', '', 'title', 1, 1342084930, 1342084930, NULL, 'title', NULL, 1, NULL, 0);
INSERT INTO `posts` VALUES(11, 'Test Page', '', '', 'Test', 1, 1347873595, 1347873595, NULL, 'Test_Page', NULL, 1, NULL, 0);
INSERT INTO `posts` VALUES(12, 'raymond', '', '', 'raymond', 1, 1347873635, 1347873635, NULL, 'raymond', NULL, 1, NULL, 0);
INSERT INTO `posts` VALUES(13, 'home', '', '', 'Sixth Form Home Page', 1, 1, 1, 0, 'sixth', NULL, 1, 'sixth', 1);

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_tweets`
--

CREATE TABLE `scheduled_tweets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `send_date` datetime NOT NULL,
  `message` varchar(255) NOT NULL,
  `sent` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scheduled_tweets`
--


-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(12) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `staffs`
--


-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `send_date` date NOT NULL,
  `send_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(255) NOT NULL,
  `sent` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweets`
--


-- --------------------------------------------------------

--
-- Table structure for table `twitters`
--

CREATE TABLE `twitters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_token` varchar(255) NOT NULL,
  `oauth_token_secret` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `screen_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `twitters`
--

INSERT INTO `twitters` VALUES(12, '432528680-1TWBpLdZz5TTYLV3L0O8P0F5w6DI89X1qqSrbG40', 'wiEPGbQ176JUbODQ4F7LFtZm4brKOs03aGJBcFgo0', '432528680', 'testaccount421', 'schoolcms', 'This is a description', 'http://a0.twimg.com/sticky/default_profile_images/default_profile_3_normal.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'admin', 'NtgTF8q6Z9UyyUwQS7Ma5Bvj+uTrK/F66iMji9su1XY=', 100, 'jamie@digitalschool.co.uk', 1352729818, '9c32a18288e2582c986d493ef9002f55604c4194', 'a:0:{}', 1335952031, 0);
INSERT INTO `users` VALUES(3, 'guest', 'NtgTF8q6Z9UyyUwQS7Ma5Bvj+uTrK/F66iMji9su1XY=', 1, 'guest@digitalschool.co.uk', 1342004593, '8b827d482e75a21ae7a52c619c4acd76f892fca7', 'a:0:{}', 1337762360, 0);
INSERT INTO `users` VALUES(4, 'mod', 'NtgTF8q6Z9UyyUwQS7Ma5Bvj+uTrK/F66iMji9su1XY=', 50, 'mod@digitalschool.co.uk', 1349864470, 'b14d3994a3c69e8bc2f93e05c2246d440463db60', 'a:0:{}', 1342003997, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contract_type` varchar(255) NOT NULL,
  `contract_term` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `files` text,
  `token` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` VALUES(2, 'Head of ICT', 'Heart of England School', 'Full Time', 'Full time', '2013-01-06', '2012-09-01', 'Leader of Learning Required ', 1336641092, 1337270257, NULL, '', '');
INSERT INTO `vacancies` VALUES(12, 'Test Job', 'Heart of England School', 'Full Time', 'Permanent', '2012-09-01', '2012-07-30', '<h1>TITLE</h1><h2>subheading</h2><br>Some plain, <b>some bold</b>, <i>some italic<span class=\\"wysiwyg-color-red\\">&nbsp;</span></i><span class=\\"wysiwyg-color-red\\">text</span>.&nbsp;<br><br>This is a alert message<br>This is a success message', 1338976352, 1338976800, 'Array,Array', '', '20000');
INSERT INTO `vacancies` VALUES(14, 'New Job ', 'Heart of England School', 'Permanent', 'Full time', '0000-00-00', '0000-00-00', '&lt;h1&gt;Heading&lt;/h1&gt;&lt;h2&gt;Subheading&lt;/h2&gt;&lt;br&gt;This is some &lt;span class=\\&quot;wysiwyg-color-red\\&quot;&gt;red &lt;/span&gt;text&nbsp;&lt;br&gt;&lt;br&gt;&lt;span class=\\&quot;alert-message\\&quot;&gt;This is an alert&lt;/span&gt;', 1339576063, 1339576063, 'Array', '', '20102');
INSERT INTO `vacancies` VALUES(15, 'New Job', 'Heart of England School', 'Full Time', 'Permanent', '2012-10-24', '2012-10-31', '<h1>Heading</h1><h2>Subheading</h2><br>This is some <span class=\\"wysiwyg-color-red\\">red</span> text <br><br><div class=\\"alert-message success\\">This is an alert this is is an expandable area! LoremLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>', 1339580138, 1351518799, 'Array,Array,Array,Array', '', '12310');
