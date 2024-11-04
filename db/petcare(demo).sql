-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2021 at 01:41 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `petcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `acct_no` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `holder_name` varchar(45) NOT NULL,
  `account_no` varchar(12) NOT NULL,
  `cardno` varchar(25) NOT NULL,
  `expiry` varchar(25) NOT NULL,
  `mpin` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`acct_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acct_no`, `u_id`, `holder_name`, `account_no`, `cardno`, `expiry`, `mpin`, `amount`) VALUES
(3, 3, 'Neethu', '002244668800', '4263982640269298', '01/23', 887, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `username`, `password`, `status`) VALUES
(1, 'Admin', 'admin.garbagecollection@gmail.com', '9496402033', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE IF NOT EXISTS `assign` (
  `ass_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `ass_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ass_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`ass_id`, `d_id`, `u_id`, `b_id`, `req_id`, `ass_date`, `status`) VALUES
(1, 1, 6, 1, 2, '2021-11-20 10:56:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boarding`
--

CREATE TABLE IF NOT EXISTS `boarding` (
  `bd_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `role` int(11) NOT NULL COMMENT '1-Breeder,2-Vet,3-Trainer,4-Boarding,5-Customer,6-Driver',
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`bd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `boarding`
--

INSERT INTO `boarding` (`bd_id`, `name`, `gender`, `email`, `contactno`, `address`, `role`, `username`, `password`, `status`) VALUES
(5, 'Kichu', 'male', 'kichu@gmail.com', '9995558787', 'Sreenandanam,\r\nErode,TVM', 4, 'kichu', 'kichu', 1),
(8, 'Syam Sagar', 'male', 'syam@gmail.com', '7788999654', 'Syam, Sarovar,TVM', 0, 'syam', 'syam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `breeder`
--

CREATE TABLE IF NOT EXISTS `breeder` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `role` int(11) NOT NULL COMMENT '1-Breeder,2-Vet,3-Trainer,4-Boarding,5-Customer,6-Driver',
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `breeder`
--

INSERT INTO `breeder` (`b_id`, `name`, `gender`, `email`, `contactno`, `address`, `role`, `username`, `password`, `status`) VALUES
(1, 'Aryan', 'male', 'aryansr@gmail.com', '9633718757', 'Chaithram,\r\nKarimpaloor,\r\nPuthenkulam P.O,\r\nKollam', 1, 'aryan', 'aryan', 1),
(14, 'Ganga', 'female', 'ganga@gmail.com', '9496402033', 'Kallambalam, Attingal', 0, 'ganga', 'ganga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `pdct_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `u_id`, `pdct_id`, `quantity`, `amount`, `status`) VALUES
(4, 1, 3, 2, 560, 0),
(22, 6, 1, 1, 390, 1),
(23, 6, 3, 2, 560, 1),
(25, 6, 4, 2, 500, 1),
(26, 6, 4, 1, 250, 1),
(27, 6, 4, 1, 250, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `status`) VALUES
(1, 'Accessories', 1),
(2, 'Food', 1),
(3, 'Medicines', 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `b_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `name`, `gender`, `email`, `contactno`, `address`, `b_id`, `username`, `password`, `status`) VALUES
(1, 'Vichu', 'male', 'vichu@gmail.com', '9382717878', 'Vipin Villa, Karicode', 1, 'vichu', 'vichu', 1),
(2, 'Sujin M S', 'male', 'sujinrmp@gmail.com', '', 'SREENANDANAM VILABHAGOM NEDUNGANDA P O VARKALA', 1, 'sujinms', 'sujinms', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mes_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `bd_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `reply` text NOT NULL,
  PRIMARY KEY (`mes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mes_id`, `u_id`, `b_id`, `v_id`, `t_id`, `bd_id`, `message`, `reply`) VALUES
(5, 6, 0, 2, 0, 0, 'My pet did not taken food', 'Give medicine for worm'),
(9, 6, 0, 0, 3, 0, 'How to tain my cat', '1s step is sitting training'),
(10, 6, 0, 0, 0, 5, 'WE are outofstation for 1 week.. plz take care of our pets?', 'Of course'),
(12, 0, 1, 2, 0, 0, 'My puppy is injured', 'use spray '),
(15, 0, 1, 0, 3, 0, 'dgfhgh', 'dsf hagdh saygfusg syugfusf sgfusf');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE IF NOT EXISTS `pet` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `pcat_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `pet_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `descp` text NOT NULL,
  `p_img` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`p_id`, `pcat_id`, `b_id`, `pet_name`, `price`, `quantity`, `descp`, `p_img`, `status`) VALUES
(10, 1, 1, 'Beagle', 18500, '2', '2 puppies available.. 1 male and 1 female', '', 1),
(12, 2, 1, 'Macaw', 39000, '1', 'hgfhbnbkn', '05.jpg', 0),
(13, 1, 1, 'Beagle', 25000, '1', 'Orginal Breed', 'begle.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pet_category`
--

CREATE TABLE IF NOT EXISTS `pet_category` (
  `pcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pcat_name` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`pcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pet_category`
--

INSERT INTO `pet_category` (`pcat_id`, `pcat_name`, `status`) VALUES
(1, 'Puppy', 1),
(2, 'Birds', 1),
(3, 'Cat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pdct_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `descp` text NOT NULL,
  `p_img` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`pdct_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pdct_id`, `cat_id`, `p_name`, `price`, `quantity`, `descp`, `p_img`, `status`) VALUES
(1, 1, 'Nature Forever Bird Feeder', 390, '5', 'The bird might take few days to few months to visit the bird feeder as it is a natural process and depends upon the presence of birds in your locality, the bird feeder is not a magnet which will attract birds from far and wide hence one need to have patience', '617UwDEQyGL__SX450_.jpg', 1),
(2, 2, 'Cats Best OkoPlus Clumping', 680, '5', 'Super economical: Upto 700 percent liquid intake\r\nBase content may remain 4-6 weeks in the coat  toilet\r\nCosiderable less waste quantity\r\nWaste clumps to be disposed through the normal domestic toilet\r\nSave money and at the same time protects the environment\r\n100 percent natural organic fibre', '81epHCXuI5S__SX466_.jpg', 1),
(3, 3, 'International Aquarium Medicine', 280, '3', 'Use 5 Ml. (One Teaspoonful) To Every 25 Litres Of Water. For Bigger Fishsuch As Carps, Cichlids, Gold Fish, Gourami, Koi, Oscars, Parrot Fish Andin Severe Fungi Infections Use 10 Ml. (Two Teaspoonful) If Necessary. Totreat External Injuries Dab The Affected Areas With Undiluted Anti-Fungus.', '51rbgv3W36L.jpg', 1),
(4, 2, 'Pedigree Biscrok Biscuits', 250, '7', 'Pedigree Biscrok Biscuits Dog Treat (Above 4 months) Lamb Flavour, 900g Pack', '815SwfO8QJL__AC_UL320_.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase`
--

CREATE TABLE IF NOT EXISTS `product_purchase` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` varchar(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `mode_of` varchar(25) NOT NULL,
  `billing_add` text NOT NULL,
  `profit` varchar(20) NOT NULL,
  `ddate` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_purchase`
--

INSERT INTO `product_purchase` (`p_id`, `cart_id`, `u_id`, `price`, `mode_of`, `billing_add`, `profit`, `ddate`, `status`) VALUES
(1, '22,23,25', 6, 1450, 'card', 'Sujin M S<br>SREENANDANAM VILABHAGOM NEDUNGANDA P O VARKALA<br>Trivandrum,Kerala-695307<br>sujinrmp@gmail.com', '', '28/11/2021', 1),
(3, '27', 6, 250, 'card', 'Sujin M S<br>SREENANDANAM VILABHAGOM NEDUNGANDA P O VARKALA<br>Trivandrum,Kerala-695307<br>sujinrmp@gmail.com', '', '28/11/2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` text NOT NULL,
  `message` text NOT NULL,
  `ddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `u_id`, `b_id`, `p_id`, `quantity`, `address`, `message`, `ddate`, `reply`, `status`) VALUES
(2, 6, 1, 10, 1, 'Near SBI,\r\nParavoor,\r\nKollam', '', '2021-11-20 10:49:05', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE IF NOT EXISTS `trainer` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `role` int(11) NOT NULL COMMENT '1-Breeder,2-Vet,3-Trainer,4-Boarding,5-Customer,6-Driver',
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`t_id`, `name`, `gender`, `email`, `contactno`, `address`, `role`, `username`, `password`, `status`) VALUES
(3, 'Vishnu', 'male', 'vishnu@gmail.com', '9898959596', 'Vyshnav,\r\nVarkala', 3, 'vishnu', 'vishnu', 1),
(8, 'Sreekuttan', 'male', 'sreemon@gmail.com', '9898747485', 'Sreekuttan,\r\nSourav Vihar,\r\nVarkala', 0, 'sree', 'sree', 0);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE IF NOT EXISTS `training` (
  `trn_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `training` text NOT NULL,
  PRIMARY KEY (`trn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`trn_id`, `u_id`, `training`) VALUES
(1, 3, 'Positive-reinforcement\r\nClicker training\r\nRelationship-based training');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `role` int(11) NOT NULL COMMENT '1-Breeder,2-Vet,3-Trainer,4-Boarding,5-Customer,6-Driver',
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `gender`, `email`, `contactno`, `address`, `role`, `username`, `password`, `status`) VALUES
(6, 'Dhyan', 'male', 'dhyan@gmail.com', '9995558585', 'Suresh Bhavan,\r\nVallathungal,\r\nKollam', 5, 'dhyan', 'dhyan', 1),
(8, 'Nithya Das', 'female', 'nithya@gmail.com', '7894561231', 'Nithya, Kottayam', 0, 'nithi', 'nithi', 1),
(10, 'Hijas', 'male', 'hijas@gmail.com', '9876543212', 'Hijas Manzil', 0, 'hijas', 'hijas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vet`
--

CREATE TABLE IF NOT EXISTS `vet` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `role` int(11) NOT NULL COMMENT '1-Breeder,2-Vet,3-Trainer,4-Boarding,5-Customer,6-Driver',
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `vet`
--

INSERT INTO `vet` (`v_id`, `name`, `gender`, `email`, `contactno`, `address`, `role`, `username`, `password`, `status`) VALUES
(2, 'Ayaan', 'male', 'ayaansr@gmail.com', '9496402033', 'Chaithanya,\r\nKarimpaloor,\r\nPuthenkulam P.O\r\nKollam', 2, 'ayaan', 'ayaan', 1),
(8, 'Dr. Reshma Binu', 'female', 'drreshma@gmail.com', '9595848474', 'Dr. Reshma,\r\nHimadri,\r\nPuthenkulam,\r\nKollam', 0, 'reshma', 'reshma', 0);
