ALTER TABLE `stream` ADD `parent_stream` INT( 11 ) NOT NULL ;

--
-- Table structure for table `fees_structure`
--

CREATE TABLE IF NOT EXISTS `fees_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `caste_id` int(5) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(56) NOT NULL,
  `description` text,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `course_has_fees`
--

CREATE TABLE IF NOT EXISTS `course_has_fees` (
  `course_id` int(11) NOT NULL,
  `fees_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`fees_id`),
  KEY `fk_course_has_fees_course_id` (`course_id`),
  KEY `fk_course_has_fees_fees_id` (`fees_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_has_fees`
--
ALTER TABLE `course_has_fees`
  ADD CONSTRAINT `fk_course_has_fees_fees_id` FOREIGN KEY (`fees_id`) REFERENCES `fees_structure` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_course_has_fees_course_id	` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


ALTER TABLE `fees_structure` ADD `branch_id` INT( 11 ) NOT NULL AFTER `caste_id` ,
ADD `college_id` INT( 11 ) NOT NULL AFTER `branch_id` ;

    

 ALTER TABLE `fees_structure` ADD CONSTRAINT `fk_college_id` FOREIGN KEY ( `college_id` ) REFERENCES `vk`.`college` (
`id`
) ON DELETE CASCADE ON UPDATE NO ACTION ;

 ALTER TABLE `fees_structure` ADD CONSTRAINT `fk_branch_id` FOREIGN KEY ( `branch_id` ) REFERENCES `vk`.`branch` (
`id`
) ON DELETE CASCADE ON UPDATE NO ACTION ;


--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `gallery_attachment`
--

CREATE TABLE IF NOT EXISTS `gallery_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_coupons_attachment_coupons` (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery_attachment`
--
ALTER TABLE `gallery_attachment`
  ADD CONSTRAINT `fk_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `gallery` ADD `created_at` DATETIME NOT NULL ,
ADD `updated_at` DATETIME NOT NULL ;

--
-- Table structure for table `college_has_gallery`
--

CREATE TABLE IF NOT EXISTS `college_has_gallery` (
  `college_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  PRIMARY KEY (`college_id`,`gallery_id`),
  KEY `fk_college_id` (`college_id`),
  KEY `fk_gallery_id` (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `college_has_gallery`
--
ALTER TABLE `college_has_gallery`
  ADD CONSTRAINT `college_has_gallery_ibfk_2` FOREIGN KEY (`college_id`) REFERENCES `college` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `college_has_gallery_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


ALTER TABLE `college_attachment` DROP FOREIGN KEY `college_attachment_ibfk_1` ;

ALTER TABLE `college_attachment` ADD CONSTRAINT `college_attachment_ibfk_1` FOREIGN KEY ( `college_id` ) REFERENCES `vk`.`college` (
`id`
) ON DELETE CASCADE ON UPDATE NO ACTION ;

/*************Updated on 3/2/2018*******************/

ALTER TABLE `college` ADD `stream_id` INT(11) NOT NULL AFTER `college_type`;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vk`
--

-- --------------------------------------------------------

--
-- Table structure for table `college_has_branch`
--

CREATE TABLE `college_has_branch` (
  `college_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_has_branch`
--
ALTER TABLE `college_has_branch`
  ADD KEY `college_id_fk` (`college_id`,`branch_id`),
  ADD KEY `branch_id_fk` (`branch_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `college_has_branch`
--
ALTER TABLE `college_has_branch`
  ADD CONSTRAINT `branch_id_fk` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `college_id_fk` FOREIGN KEY (`college_id`) REFERENCES `college` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


ALTER TABLE `college_has_branch` ADD `intake` INT(11) NOT NULL AFTER `branch_id`;

ALTER TABLE `college_has_branch` ADD `id` INT(11) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

/******************16/02/2018***********************/

ALTER TABLE `stream` ADD `parent_stream` INT(11) NOT NULL AFTER `description`;

CREATE TABLE `slider` (
  `id` bigint(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_base_url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `image_path`, `image_base_url`, `created_at`, `updated_at`) VALUES
(1, 'Slider', '1/UoGxLmTNMMEVFd8H8lPsIaeM2StBZa2k.jpg', '/storage/source', '2018-02-16 10:41:24', '2018-02-16 10:41:24'),
(2, 'Slider2', '1/TlXI7_157xrjDt_WyGOZlmMC_fr1E2gy.jpeg', '/storage/source', '2018-02-16 10:44:58', '2018-02-16 10:44:58'),
(3, 'Slider3', '1/v0LeeXwTc0eMKaAmf4C1wOyjr3T8X3QU.jpeg', '/storage/source', '2018-02-16 10:45:11', '2018-02-16 10:45:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2018 at 05:00 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.27-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(5) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_base_url` varchar(255) NOT NULL,
  `position` int(5) NOT NULL,
  `is_mobile` int(5) NOT NULL,
  `order_no` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `advertisement` ADD `updated_at` DATETIME NOT NULL AFTER `created_at`;