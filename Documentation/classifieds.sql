-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2014 at 05:28 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `classifieds`
--
CREATE DATABASE IF NOT EXISTS `classifieds` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `classifieds`;

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

DROP TABLE IF EXISTS `advert`;
CREATE TABLE IF NOT EXISTS `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(70) NOT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `category_id` (`category_id`),
  KEY `subcategory_id` (`subcategory_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`id`, `customer_id`, `category_id`, `subcategory_id`, `type_id`, `post_date`, `title`, `body`, `price`, `status`) VALUES
(1, 1, 1, 1, 1, '2014-10-25 03:17:20', '\r\nOLEVIA 26" HD LCD Television', 'Syntax Corporation presents to you a premium 26 " LCD TV, the Olevia LT26HVX. Along with its smooth charcoal black design it delivers an outstanding rich cinema-like experience. Its 1366 x 768 native resolution, 1200:1 Contrast Ratio, 8ms Response time and Syntax''s new iDEA technology will certainly deliver HD content like no other. iDEA features the dynamic brightness and contrast control in which the iDEA engine maintains brightness and contrast levels to deliver the best quality picture at all times. With Pure Edge Enhancement, pictures are more defined showing details lost because of signal and frame conversions. Last but not least is its advanced CTI system that refines color transitions to deliver smooth images during intense motion scenes. In addition, the LT26HVE features audio enhancements such as lip sync and preset equalizers for rock, speech, movie, normal sound effects and reverb effects to simulate sound environments in different rooms.\r\n\r\n\r\n', 39.52, 1),
(2, 1, 1, 1, 1, '2014-10-25 03:17:20', 'Bush 37" HD LCD Television', 'With a large 37in screen this Bush TV can become a real feature of your room, for all the family to enjoy. HD Ready provides superior clarity and sharp detail making images come alive.\r\n\r\n\r\n', 183.79, 1),
(3, 1, 1, 2, 3, '2014-10-25 03:46:01', 'Canon EOS 60D 18.0 MP Digital SLR Camera', 'With the new EOS 60D DSLR, Canon gives the photo enthusiast a powerful tool fostering creativity, with better image quality, more advanced features and automatic and in-camera technologies for ease-of-use. It features an improved APS-C sized 18.0-megapixel CMOS sensor for tremendous images, a new DIGIC 4 Image Processor for finer detail and excellent color reproduction, and improved ISO capabilities from 100-6400 (expandable to 12800) for uncompromised shooting even in the dimmest situations. The new Multi-control Dial enables users to conveniently operate menus and enter settings with a simple touch.\r\n\r\nThe EOS 60D also features an EOS first: A Vari-angle 3.0-inch Clear View LCD (1,040,000 dots) monitor for easy low- or high-angle viewing. An improved viewfinder, a number of new in-camera creative options and filters, plus HDMI output for viewing images on an HDTV all make the EOS 60D invaluable for the evolving photographer. With continuously curved surfaces, user-friendliness and exuding solidity and refinement, the EOS 60D is true digital inspiration!', 624.58, 1),
(4, 1, 1, 2, 4, '2014-10-25 03:46:01', 'FUJIFILM X-E2 16.3 MP', 'EXCELLENT CONDITION.\r\nVERY FEW SIGNS OF WEAR.\r\nLCD SCREEN AND SENSOR APPEAR FLAWLESS.\r\nINCLUDES BOX, BATTERY, CHARGER, STRAP, MANUALS, AND CD. ', 474.36, 1),
(5, 1, 1, 3, 5, '2014-10-25 03:46:01', 'Dell optiplex 960 Desktop | 3.0GHz Core 2 Duo', 'his item has cosmetic scratches/scuffs on its case, as shown in the attached photographs.\r\n\r\n \r\n\r\nThis computer has been tested to successfully power on and boot to the BIOS screen\r\n\r\n \r\n\r\nThis computer does not come with an operating system, nor does it include a COA.\r\n\r\n \r\n\r\nThis purchase can be made with complete confidence because we offer a 14 day, money back guarantee.', 41.9, 1),
(6, 2, 2, 4, 7, '2014-10-25 03:46:01', 'THE-SHINING-TWO-DISC-SPECIAL-EDITION', 'THE DVD IS IN VERY GOOD PRE-TESTED CONDITION', 12.78, 2),
(7, 2, 2, 5, 9, '2014-10-25 03:46:01', 'Elvis Presley - From Elvis in Memphis (2009) RCA LEGACY 2 CD MINT', 'The two CD''s, booklet and fold out cover are mint.', 10.14, 3),
(8, 3, 2, 6, 11, '2014-10-25 03:46:01', 'Fifa 15 PC DVD GAME', 'No scratches and fully working. ', 40.12, 1),
(9, 3, 2, 6, 12, '2014-10-25 03:46:01', 'Destiny PS4 Playstation 4 COMPLETE', 'No scratches and fully working. ', 38.03, 1),
(10, 4, 3, 8, 16, '2014-10-25 03:46:01', 'Game of Thrones 4-Book Bundle, a Song of Ice and Fire Series', 'GAME OF THRONES.... A SONG OF ICE AND FIRE 4 BOOK SERIES.\r\n\r\nTHE FIRST BOOK, Game of Thrones, is the only book that was read, therefore, shows signs of wear from reading.  No tears in book or pages. \r\n\r\n\r\nThe rest of the series has not been read.  There are no signs of wear at all on these.', 50.25, 1),
(11, 4, 3, 7, 14, '2014-10-25 03:46:01', 'New Complete Lord of The Rings Trilogy & The Hobbit Set TOLKIEN on 13', '     Packaged in a beautifully designed slip-case gift box, The set gathers for the first time both The Hobbit and The Lord of the Rings in audio format. These are the original American dramatizations as broadcast on public radio. The packaging features original art from John Howe, renowned Tolkien illustrator and conceptual artist for the Peter Jackson film trilogy.', 30, 1),
(12, 5, 4, 10, 20, '2014-10-25 03:46:01', '1936 Ford Other 5 WINDOW', 'Year:	1936	VIN:	2458816\r\nMake:	FORD	Model/Trim:	COUPE 5 WINDOW\r\nCondition:	Pre-Owned	Body:	Coupe\r\nExterior:	Blue	Engine:	FLATHEAD V8 WITH DUAL CARBS\r\nInterior:	Tan Other	Transmission:	MANUAL\r\nMileage:	3,194	Drivetrain:	Rear Wheel Drive', 37708, 1),
(13, 5, 4, 11, 21, '2014-10-25 03:46:01', '2011 Harley-Davidson Touring', '2011 Harley Davidson Street Glide\r\nColor:  Sedona Orange  \r\n13K Miles\r\nCustom Renegade Wheels\r\n18 inch rear wheel, 21 inch front wheel\r\nPainted Inner Fairing\r\nRhinehart Slip-On Pipes\r\nVance & Hines X-Pipe\r\n255 cams / race tuner / air breather\r\nLED Saddle Bag Lights\r\nOnly 2K Miles on Avon tires\r\n94 HP / 112 ft lbs of torque', 12728.8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Electronics & Computers'),
(2, 'Movies, Music & Games'),
(3, 'Books'),
(4, 'Automotive');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `name` varchar(70) NOT NULL,
  `location` varchar(35) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(12) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `location`, `email`, `phone`, `id`) VALUES
('Michael Bolt', 'London', 'michaelbolt@gmail.com', 129999999, 1),
('John Tagst', 'Canada', 'johntagst@gmail.com', 551234567, 2),
('Mary Jane', 'New York', 'maryjane@hotmail.com', 229876543, 3),
('Margaret Tate', 'California', 'mtate@gmail.com', 331111111, 4),
('Yu Suzuki', 'Tokyo', 'yu_suzuki@gmail.com', 127777777, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category_id`) VALUES
(1, 'TVs', 1),
(2, 'Cameras', 1),
(3, 'Computers', 1),
(4, 'DVDs', 2),
(5, 'CDs', 2),
(6, 'Video Games', 2),
(7, 'Audiobooks', 3),
(8, 'Books', 3),
(9, 'Magazines', 3),
(10, 'Cars', 4),
(11, 'Motorcycles', 4),
(12, 'Automotive Parts', 4);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategory_id` (`subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `subcategory_id`) VALUES
(1, 'LCD TVs', 1),
(2, 'OLED TVs', 1),
(3, 'Digital SLRs', 2),
(4, 'Compact System Cameras', 2),
(5, 'Desktops', 3),
(6, 'Laptops', 3),
(7, 'Horror Movies', 4),
(8, 'Action Movies', 4),
(9, 'Rock Music', 5),
(10, 'Classic Music', 5),
(11, 'PC', 6),
(12, 'PS4', 6),
(13, 'Thriller', 7),
(14, 'Fantasy', 7),
(15, 'Humour', 8),
(16, 'Fantasy', 8),
(17, 'Children''s', 9),
(18, 'Outdoors & Nature', 9),
(19, 'Toyota', 10),
(20, 'Ford', 10),
(21, 'Harley-Davidson', 11),
(22, 'Honda', 11),
(23, 'Tires', 12),
(24, 'Stereos', 12);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advert`
--
ALTER TABLE `advert`
  ADD CONSTRAINT `advert_category_id_foreignkey` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `advert_customer_id_foreignkey` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `advert_subcategory_id_foreignkey` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `advert_type_id_foreignkey` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_category_id_foreignkey` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_subcategory_foreignkey` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
