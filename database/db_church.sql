-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 02:24 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_church`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request`
--

CREATE TABLE `appointment_request` (
  `id` int(30) NOT NULL,
  `sched_type_id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `schedule` datetime NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `topic_id` int(30) DEFAULT NULL,
  `content` text NOT NULL,
  `keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `banner_path` text NOT NULL,
  `upload_dir_code` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = unpublished ,1= published',
  `blog_url` text NOT NULL,
  `author_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `topic_id`, `content`, `keywords`, `meta_description`, `banner_path`, `upload_dir_code`, `status`, `blog_url`, `author_id`, `date_created`, `date_updated`) VALUES
(1, 'Church gatherings', 1, '&lt;p&gt;&lt;span style=\\&quot;font-family: &amp;quot;Comic Sans MS&amp;quot;; font-size: 24px;\\&quot;&gt;destafajfawpoiwptw&lt;/span&gt;&lt;br&gt;&lt;br&gt;&lt;/p&gt;', 'weqweqweqwe', 'qqweqe', 'uploads/blog_uploads/banners/1_banner.jpg', 'T2dEZOxCAg', 1, 'pages/church_gatherings.php', 1, '2022-10-02 12:12:27', '2022-10-02 12:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `daily_verses`
--

CREATE TABLE `daily_verses` (
  `id` int(30) NOT NULL,
  `verse` text NOT NULL,
  `verse_from` text NOT NULL,
  `image_path` text NOT NULL,
  `display_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_verses`
--

INSERT INTO `daily_verses` (`id`, `verse`, `verse_from`, `image_path`, `display_date`, `date_created`, `date_updated`) VALUES
(1, 'test verse', 'book test', 'uploads/verse_bg/1.jpg', '2022-10-01', '2022-10-02 11:58:55', '2022-10-02 11:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `schedule` date NOT NULL,
  `img_path` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('francismanlangit131@gmail.com', '768e78024aa8fdb9b8fe87be86f64745e27e79bcbb', '2022-10-04 23:27:25'),
('francismanlangit13@gmail.com', '768e78024aa8fdb9b8fe87be86f64745f368b8cd98', '2022-10-05 01:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_type`
--

CREATE TABLE `schedule_type` (
  `id` int(11) NOT NULL,
  `sched_type` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Jimenez Grace Gospel Church of Christ'),
(6, 'short_name', 'Jimenez Grace Gospel Church'),
(11, 'logo', 'uploads/system/1664820180_logo.jpg'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/system/1664598180_278203933_151561730681645_1842296455289299538_n.jpg'),
(15, 'welcome_content', '<p style=""><b>Our Vision-Mission Statement</b><br></p><p style="text-align: justify; ">Things to Come Mission, Inc. endeavors to follow the global ministry concerns of the Apostle Paul as he follows Christ. It envisions to establish a Grace Church in every municipality and city in the Philippines and commits itself to win the lost, edify the saints, plant reproducing Grace churches, and produce committed believers in the teachings of Grace whose lives are Christ-like in character.<br><br></p><p><b>Mission</b></p><p style="text-align: justify; "><span style="font-size: 1rem;">The mission and commission of the Church, which is His Body is to proclaim the message of reconciliation (II Corinthians 5:14-21) and to preach Jesus Christ according to the revelation of the mystery (Romans 16:25; Ephesians 3:8,9) with all boldness. In this, we should follow the Apostle Paul (I Corinthians 4:16; 11:1; Philippians 3:17; 4:9; I Timothy 1:11-16). That distinctive message which the Apostle of the Gentiles (Romans 11:13; 15:16) calls "my gospel" (Romans 2:16; 16:25) is also called "the gospel of the grace of God" (Acts 20:24). We, like Paul, must preach the entire Word of God in the light of this gospel (II Timothy 4:2; Gal. 1:8,9) and strive to reach those in the regions beyond where Christ is not yet named (Romans 15:20; II Corinthians 10:16).</span><br></p>'),
(16, 'home_quote', 'I have set the LORD always before me. Because he is at my right hand, I will not be shaken'),
(17, 'contact', '0978945612 / 456-7899-789'),
(18, 'email', 'info@churchname.com'),
(19, 'address', 'Purok 1, Corrales, Jimenez, Misamis Occidental, 7204'),
(20, 'system_version', '1.1'),
(21, 'facebook', 'www.facebook.com'),
(22, 'instagram', 'www.instagram.com'),
(23, 'twitter', 'www.twitter.com'),
(24, 'youtube', 'www.youtube.com'),
(25, 'gmail', 'example@example.com'),
(26, 'number', '09123456789'),
(27, 'president', ''),
(28, 'vice_president', ''),
(29, 'tresurer', ''),
(30, 'secretary', ''),
(31, 'auditor', ''),
(32, 'committee', ''),
(33, 'yp_president', ''),
(34, 'yp_vice_president', ''),
(35, 'yp_secretary', ''),
(36, 'yp_tresurer', ''),
(37, 'yp_auditor', ''),
(38, 'yp_committee', ''),
(39, 'FBmsgAPI', '00001231111'),
(41, 'Paymaya', 'uploads/1664244060_Use Case Diagram - Farmer.drawio.png'),
(44, 'GCash', 'uploads/1664244180_gcash.jpg'),
(45, 'Shopee_Pay', 'uploads/1664244180_1631753220_church-bg-3.jpg'),
(46, 'TelegmsgAPI', '1083541483'),
(47, 'enable_fb', '1'),
(48, 'enable_teleg', '1'),
(49, 'home_verse', 'test verse');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Interlink Youthnight', '&lt;p&gt;Every friday 6pm - 8:30pm&lt;/p&gt;', 1, '2022-10-02 12:01:12', '2022-10-02 12:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `file_path` text NOT NULL,
  `dir_code` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `file_path`, `dir_code`, `date_created`) VALUES
(1, 1, 'uploads/blog_uploads/T2dEZOxCAg/1664683934_307956416_1326590024414161_7191887381186200178_n.jpg', 'T2dEZOxCAg', '2022-10-02 12:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `extname` varchar(250) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `civil_status` tinyint(1) NOT NULL DEFAULT '0',
  `phone` text NOT NULL,
  `birthday` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `avatar` text,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `extname`, `gender`, `civil_status`, `phone`, `birthday`, `username`, `email`, `password`, `address`, `avatar`, `last_login`, `type`, `status`, `remarks`, `date_added`, `date_updated`) VALUES
(1, 'Super', 'A', 'Admin', '', 1, 1, '09123456789', '2000-11-13', 'admin', 'admin@admin.com', 'ffff1efadf57c5d7a8fc1e72ad8d5069', 'Admin address', 'uploads/users/1664381220_1631778840_avatar_.png', NULL, 1, 1, '', '2022-09-29 00:07:51', NULL),
(2, 'Francis Carlo', 'A', 'Manlangit', '', 1, 1, '09457664949', '2000-11-13', 'franzcarl13', 'francismanlangit13@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Gata, Jimenez', 'uploads/users/1664810100_307956416_1326590024414161_7191887381186200178_n.jpg', NULL, 4, 1, '', '2022-10-03 23:14:16', '2022-10-04 01:42:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_request`
--
ALTER TABLE `appointment_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `topic_id_2` (`topic_id`);

--
-- Indexes for table `daily_verses`
--
ALTER TABLE `daily_verses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_type`
--
ALTER TABLE `schedule_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_request`
--
ALTER TABLE `appointment_request`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `daily_verses`
--
ALTER TABLE `daily_verses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule_type`
--
ALTER TABLE `schedule_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
