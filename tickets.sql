-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2019 at 12:52 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_login_info`
--

CREATE TABLE IF NOT EXISTS `agent_login_info` (
  `userID` varchar(255) NOT NULL,
  `emailID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  `type` varchar(250) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_login_info`
--

INSERT INTO `agent_login_info` (`userID`, `emailID`, `password`, `reg_date`, `type`) VALUES
('agent1', 'agent1@gmail.com', '$2kDnAuTN4jy6', '2019-05-31', 'agent'),
('agent2', 'agent2@gmail.com', '$2rJG7KnIVnmY', '2019-05-31', 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` longtext NOT NULL,
  `comment_by` varchar(250) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_time` time NOT NULL,
  `ticket_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `ticket_id` (`ticket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `comment_by`, `comment_date`, `comment_time`, `ticket_id`) VALUES
(145, 'test complete', 'agent1', '2019-08-09', '16:10:35', 114),
(146, 'test', 'agent1', '2019-08-09', '16:11:38', 108),
(151, 'wqwr', 'agent1', '2019-08-13', '21:52:22', 119),
(153, 'qwerty', 'agent1', '2019-08-14', '16:28:00', 117),
(154, 'working properly', 'admin', '2019-08-16', '16:57:52', 119),
(155, 'testing comment section', 'agent1', '2019-10-08', '22:06:13', 121),
(161, 'test', 'agent1', '2019-10-09', '13:42:45', 116);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE IF NOT EXISTS `login_info` (
  `userID` varchar(255) NOT NULL,
  `emailID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  `type` varchar(250) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`userID`, `emailID`, `password`, `reg_date`, `type`) VALUES
('admin', 'admin@gmail.com', '$2gCXDSrN2DHo', '2018-03-06', 'admin'),
('agent1', 'agent1@gmail.com', '$2kDnAuTN4jy6', '2019-05-31', 'agent'),
('agent2', 'agent2@gmail.com', '$2rJG7KnIVnmY', '2019-05-31', 'agent'),
('prashant', 'prashant@gmail.com', '$2ijG3fgDvXJM', '2019-06-14', 'admin'),
('test', 'test@gmail.com', '$2rcByx51ejoM', '2019-06-28', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(250) NOT NULL,
  `project_short_name` varchar(250) NOT NULL,
  `project_start_date` datetime NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_short_name`, `project_start_date`) VALUES
(1, 'TEST3', 'test', '2019-05-30 16:38:14'),
(3, 'test', 'test2', '2019-05-30 17:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(250) NOT NULL,
  `ticket_number` varchar(250) NOT NULL,
  `ticket_type` varchar(50) NOT NULL,
  `ticket_icon` varchar(50) DEFAULT NULL,
  `ticket_title` varchar(250) NOT NULL,
  `ticket_description` longtext NOT NULL,
  `ticket_assigned_to` varchar(250) NOT NULL,
  `ticket_status` varchar(250) NOT NULL,
  `ticket_created_by` varchar(250) NOT NULL,
  `ticket_updated_by` varchar(250) NOT NULL,
  `ticket_created_at` datetime NOT NULL,
  `ticket_updated_at` datetime NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `project_name`, `ticket_number`, `ticket_type`, `ticket_icon`, `ticket_title`, `ticket_description`, `ticket_assigned_to`, `ticket_status`, `ticket_created_by`, `ticket_updated_by`, `ticket_created_at`, `ticket_updated_at`) VALUES
(47, 'TEST3', 'test-47', '', NULL, 'lovely bro', 'singh', 'agent1', 'Completed', 'admin', 'agent1', '2019-06-01 00:00:00', '2019-06-27 13:39:12'),
(52, 'TEST3', 'test-52', 'New-Feature', 'fa fa-plus', 'bro', 'test is this testing 432', 'agent2', 'Hold', 'admin', 'agent2', '2019-06-03 00:00:00', '2019-08-16 16:15:50'),
(53, 'TEST3', 'test-53', 'Task', 'fa fa-check-square', 'testing created by', 'creadted by', 'agent1', 'To-Do', 'agent1', 'agent1', '2019-06-15 15:11:17', '2019-10-07 20:41:52'),
(54, 'TEST3', 'test-54', '', NULL, 'testing Ckeditor', '<p><span style="font-size:20px"><strong>ckeditor</strong></span></p>', 'agent1', 'Hold', 'agent1', 'agent1', '2019-07-01 15:50:20', '2019-07-15 17:37:07'),
(55, 'TEST3', 'test-55', '', NULL, 'testing editor', '<p><b>testing editor</b><br></p><br>', 'agent1', 'In-Progress', 'agent1', '', '2019-07-01 22:16:11', '0000-00-00 00:00:00'),
(56, 'TEST3', 'test-56', '', NULL, 'testing ckeditor 12345', 'testing ckeditor', 'agent1', 'Completed', 'agent1', '', '2019-07-15 17:44:15', '0000-00-00 00:00:00'),
(57, 'TEST3', 'test-57', '', NULL, 'testing 1234', 'testing 12345', 'agent2', 'In-Progress', 'admin', '', '2019-07-15 21:25:14', '0000-00-00 00:00:00'),
(58, 'TEST3', 'test-58', 'Task', 'fa fa-check-square', 'testing ckeditor final', 'testing 123', 'agent2', 'To-Do', 'admin', '', '2019-07-15 22:39:53', '0000-00-00 00:00:00'),
(59, 'test', 'test2-59', '', NULL, 'rest', '<p><b>rest</b><br></p><br>', 'agent1', 'In-Progress', 'agent1', '', '2019-07-26 16:50:30', '0000-00-00 00:00:00'),
(60, 'test', 'test2-60', '', NULL, 'testing54321', '<p>testing54321â€ƒâ€ƒ</p>', 'agent1', 'Hold', 'agent1', '', '2019-08-02 19:10:59', '0000-00-00 00:00:00'),
(68, 'TEST3', 'test-68', '', NULL, 'test123', 'test123', 'agent1', 'To-Do', 'agent2', '', '2019-08-02 20:20:56', '0000-00-00 00:00:00'),
(69, 'TEST3', 'test-69', 'Story', 'fa fa-bookmark', 'test123', 'test123', 'agent2', 'Completed', 'agent1', 'agent2', '2019-08-02 20:23:13', '2019-08-18 14:37:20'),
(71, 'TEST3', 'test-71', 'Story', 'fa fa-bookmark', 'ytrre', 'sagadg', 'agent1', 'To-Do', 'agent1', '', '2019-08-02 22:06:55', '0000-00-00 00:00:00'),
(72, 'test', 'test2-72', 'Task', 'fa fa-check-square', 'yrtesdfsdg', 'asdgsgdasdgsd', 'agent2', 'In-Progress', 'agent1', '', '2019-08-02 22:08:11', '0000-00-00 00:00:00'),
(74, 'test', 'test2-74', 'Task', 'fa fa-check-square', 'test', 'test', 'agent1', 'To-Do', 'agent1', '', '2019-08-03 12:31:50', '0000-00-00 00:00:00'),
(75, 'test', 'test2-75', 'Task', 'fa fa-check-square', 'testing created by', 'test', 'agent1', 'To-Do', 'agent1', '', '2019-08-03 12:32:44', '0000-00-00 00:00:00'),
(77, 'test', 'test2-77', 'Story', 'fa fa-bookmark', 'yrtrt', 'sgsdg', 'agent1', 'Completed', 'agent1', '', '2019-08-03 15:11:24', '2019-08-09 16:17:25'),
(78, 'test', 'test2-78', 'Story', 'fa fa-bookmark', 'hydgs', 'sdgsdgf', 'agent1', 'To-Do', 'agent1', 'agent1', '2019-08-05 19:59:54', '2019-08-12 13:06:26'),
(105, 'TEST3', 'test-105', 'Task', 'fa fa-check-square', 'check editor', 'check editore', 'agent1', 'In-Progress', 'agent1', 'agent1', '2019-08-06 21:21:15', '2019-08-16 13:29:33'),
(106, 'TEST3', 'test-106', 'Task', 'fa fa-check-square', 'editor', 'editor', 'agent1', 'To-Do', 'agent1', '', '2019-08-06 21:22:30', '0000-00-00 00:00:00'),
(108, 'TEST3', 'test-108', 'Task', 'fa fa-check-square', 'sdofkdm', 'dsnsdnlknlk', 'agent1', 'In-Progress', 'agent1', 'agent1', '2019-08-06 21:28:20', '2019-08-14 16:12:42'),
(113, 'TEST3', 'test-113', 'Task', 'fa fa-check-square', 'port', 'port', 'agent1', 'To-Do', 'admin', '', '2019-08-06 21:59:22', '0000-00-00 00:00:00'),
(114, 'TEST3', 'test1234-114', 'Story', 'fa fa-bookmark', 'qwer', 'trewq', 'agent1', 'In-Progress', 'admin', 'agent1', '2019-08-07 14:44:59', '2019-08-14 16:31:03'),
(115, 'TEST3', 'test-115', 'Task', 'fa fa-check-square', 'asdfg', 'asdfg', 'agent1', 'To-Do', 'agent1', '', '2019-08-13 20:55:14', '0000-00-00 00:00:00'),
(116, 'test', 'test2-116', 'Epic', 'fa fa-bolt', 'qwert', 'qwery return query', 'agent1', 'To-Do', 'agent1', 'agent1', '2019-08-13 21:17:59', '2019-10-09 13:43:06'),
(117, 'test', 'test2-117', 'Sub-Task', 'fa fa-tasks', 'sdgsds', 'qwert', 'agent2', 'To-Do', 'agent1', 'agent1', '2019-08-13 21:37:13', '2019-08-14 16:13:06'),
(118, 'TEST3', 'test-118', 'Story', 'fa fa-bookmark', 'qwer', 'vsbf', 'agent1', 'To-Do', 'agent1', 'agent1', '2019-08-13 21:45:46', '2019-08-14 16:09:21'),
(119, 'test', 'test2-119', 'Task', 'fa fa-check-square', 'dfgdgf', 'sdgdfsg', 'agent1', 'In-Progress', 'agent1', 'agent1', '2019-08-13 21:47:53', '2019-08-14 16:22:18'),
(120, 'TEST3', 'test-120', 'Bug', 'fa fa-bug', 'testing agent type', 'testing agent type', 'agent2', 'To-Do', 'agent1', 'agent1', '2019-08-20 21:26:05', '2019-08-20 21:30:00'),
(121, 'TEST3', 'test-121', 'New-Feature', 'fa fa-plus', 'again testing agent type', 'testing agent type 234456 123124', 'agent2', 'To-Do', 'agent1', 'agent1', '2019-08-20 21:29:38', '2019-10-08 22:35:01');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
