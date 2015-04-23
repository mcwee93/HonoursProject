-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2015 at 10:01 PM
-- Server version: 5.5.27-log
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `honours`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(150) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role`, `user_name`, `user_password`) VALUES
(1, 'systems-manager', 'gymadmin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetail`
--

CREATE TABLE IF NOT EXISTS `bookingdetail` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_price` varchar(200) NOT NULL,
  `no_of_bookings` varchar(200) NOT NULL,
  `amount` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `lrg_description` varchar(800) NOT NULL,
  `staffMember` varchar(150) NOT NULL,
  `availability` datetime NOT NULL,
  `price` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `description`, `lrg_description`, `staffMember`, `availability`, `price`) VALUES
(1, 'Select', '', '', 'N/A', '0000-00-00 00:00:00', 0),
(2, 'Football', '5 aside football pitches available to book Monday to Sunday 3pm to 9pm', '5 aside football pitches available to book Monday to Sunday 3pm to 9pm5 aside football pitches available to book Monday to Sunday 3pm to 9pm5 aside football pitches available to book Monday to Sunday 3pm to 9pm5 aside football pitches available to book Monday to Sunday 3pm to 9pm', 'N/A', '0000-00-00 00:00:00', 38),
(3, 'Badminton', 'full size badminton courts available for 2-4 players at a time hour slots from 9am till 6pm', 'full size badminton courts available for 2-4 players at a time hour slots from 9am till 6pmfull size badminton courts available for 2-4 players at a time hour slots from 9am till 6pmfull size badminton courts available for 2-4 players at a time hour slots from 9am till 6pmfull size badminton courts available for 2-4 players at a time hour slots from 9am till 6pm', 'N/A', '0000-00-00 00:00:00', 26),
(4, 'Swimming', 'The Leisure Center has an Olympic size swimming pool that is available Monday to Saturday', 'The Leisure Center has an Olympic size swimming po...The Leisure Center has an Olympic size swimming po...The Leisure Center has an Olympic size swimming po...The Leisure Center has an Olympic size swimming po...', 'N/A', '0000-00-00 00:00:00', 4),
(5, 'Zoomba', 'The Zoomba class is a popular dance/fitness class ran here at the Leisure Center. Available Tuesdays and Fridays 8 till 9.', 'The Leisure Center has an Olympic size swimming po...The Leisure Center has an Olympic size swimming po...The Leisure Center has an Olympic size swimming po...The Leisure Center has an Olympic size swimming po...', 'Jane Goodwin', '0000-00-00 00:00:00', 10),
(6, 'Meta fit', 'Meta fit is a core exercise programme run over a twelve week period, designed to help you shred weight and tone muscle. Perfect for experienced gym goers', 'Meta fit is a core exercise programme run over a t...Meta fit is a core exercise programme run over a t...Meta fit is a core exercise programme run over a t...Meta fit is a core exercise programme run over a t...', 'Ronald Dillon', '0000-00-00 00:00:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `role` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `role`, `email`, `image`) VALUES
(1, 'Frank Daily', 'Gym Manager', 'FrankD@madeupgym.co.uk', 'images/staff3.jpg'),
(2, 'Lisa Marshall', 'Deputy Gym Manager', 'LisaM@madeupgym.co.uk', 'images/staff5.jpg'),
(3, 'Ian Thompson ', 'Gym Team Leader', 'IanT@madeupgym.co.uk', 'images/staff1.jpg'),
(4, 'Lewis Scott', 'Personal Trainor', 'LewisS@madeupgym.co.uk', 'images/staff4.jpg'),
(5, 'Linda Hope', 'Personal Trainor', 'LindaH@madeupgym.co.uk', 'images/staff2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(150) NOT NULL,
  `value` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
