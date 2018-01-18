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


    