-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2022 at 06:28 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
(3, 3, 'Neethu', '002244668800', '4263982640269298', '01/23', 887, 24050);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `amount`, `username`, `password`, `status`) VALUES
(1, 'Admin', 'admin.petcare@gmail.com', '9496402033', '910.2', 'admin', 'admin', 1);

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
  `del_date` varchar(25) NOT NULL,
  `location` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ass_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`ass_id`, `d_id`, `u_id`, `b_id`, `req_id`, `ass_date`, `del_date`, `location`, `status`) VALUES
(2, 1, 6, 1, 6, '2021-12-07 11:28:21', '2021-12-07 11:28:21', 'kollam - kallambalam<br>Pallimukku<br>Kottiyam<br>Chathanoor<br>Parippally<br>Navaikulam<br>Kallambalam', 2),
(3, 1, 6, 1, 5, '2021-12-07 12:05:05', '2021-12-07 12:05:05', '<br>Kollam - Sreekariyam', 1),
(4, 4, 8, 14, 7, '2021-12-08 06:47:30', '2021-12-08 06:47:30', '<br>paripally<br>Kollam<br>Chathannur<br>klbm', 2),
(5, 1, 8, 1, 9, '2021-12-08 05:58:30', '', '', 0),
(6, 7, 8, 1, 9, '2022-01-20 10:03:09', '', '', 0),
(7, 6, 11, 1, 10, '2022-02-26 04:46:33', '2022-02-26 04:46:33', '<br>Karimpaloor<br>Paripally<br>Navayikulam<br>Kallambalam<br>Kallambalam-Home', 2),
(8, 2, 11, 14, 11, '2022-02-11 04:29:14', '2022-02-11 04:29:14', '<br>Attingal<br>Alamcode<br>kallambalam<br>paripally<br>kottyam<br>kollam<br>Kollam-home', 2),
(9, 2, 11, 14, 12, '2022-02-11 04:29:37', '2022-02-11 04:29:37', '<br>Paripally<br>Kottyam<br>Kollam<br>Kollam<br>Kollam<br>Kallambalam<br>Kallambalam<br>Kollam', 2);

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
  `account` varchar(200) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1-Breeder,2-Vet,3-Trainer,4-Boarding,5-Customer,6-Driver',
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `breeder`
--

INSERT INTO `breeder` (`b_id`, `name`, `gender`, `email`, `contactno`, `address`, `account`, `role`, `username`, `password`, `status`) VALUES
(1, 'Aryan', 'male', 'aryansr@gmail.com', '9633718757', 'Chaithram,\r\nKarimpaloor,\r\nPuthenkulam P.O,\r\nKollam', '25000', 1, 'aryan', 'aryan', 1),
(14, 'Ganga', 'female', 'ganga@gmail.com', '9496402033', 'Kallambalam, Attingal', '3500', 0, 'ganga', 'ganga', 1),
(15, 'Joe', 'male', 'joe@gmail.com', '9966338823', 'Rose Villa,Pattom,Tvm', '', 0, 'joe', 'joe098', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `b_id` int(100) NOT NULL,
  `pdct_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `u_id`, `b_id`, `pdct_id`, `quantity`, `amount`, `status`) VALUES
(4, 1, 0, 3, 2, 560, 0),
(37, 6, 0, 3, 1, 280, 1),
(38, 6, 0, 2, 1, 680, 1),
(39, 6, 0, 1, 1, 390, 1),
(42, 8, 0, 5, 1, 1500, 1),
(46, 8, 0, 5, 1, 1500, 1),
(48, 8, 0, 5, 1, 1500, 1),
(49, 8, 0, 1, 1, 390, 1),
(50, 8, 0, 4, 1, 250, 1),
(52, 0, 1, 1, 1, 390, 1),
(53, 11, 0, 5, 1, 1500, 1),
(54, 0, 0, 2, 1, 680, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `status`) VALUES
(1, 'Accessories', 1),
(2, 'Food', 1),
(3, 'Medicines', 1),
(4, 'Training Accessories', 1);

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
  `place` varchar(200) NOT NULL,
  `charge` varchar(200) NOT NULL,
  `b_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `name`, `gender`, `email`, `contactno`, `address`, `place`, `charge`, `b_id`, `username`, `password`, `status`) VALUES
(1, 'Vichu Prasad', 'male', 'vichu@gmail.com', '9382717878', 'Vipin Villa, Karicode', 'Karicode', '', 1, 'vichu     ', 'vichu', 1),
(2, 'Sujin M S', 'male', 'sujinrmp@gmail.com', '', 'SREENANDANAM VILABHAGOM NEDUNGANDA P O VARKALA', 'Varkala', ' 20', 1, 'sujinms', 'sujinms', 1),
(3, '  Sree', 'male', 'sree@gmail.com', '8798748596', 'Sree Villa,\r\nTVM', 'Trivandrum', '', 1, 'sree', 'sree', 0),
(4, 'SabuMone', 'male', 'Sabu@gmail.com', '7532698541', 'S S villa,Kollam', 'Kollam', '', 14, 'sabus', 'sabu', 1),
(5, 'Sayu', 'male', 'sayu@gmail.com', '8523697412', 'S S villa,Attingal,TVM', 'Attingal', '', 14, 'sayu', 'sayu', 0),
(6, 'arjun', 'male', 'arjun@gmail.com', '9876346412', 'ABC villa,Kollam', 'Kollam', ' 10', 1, 'arjun', 'arjun', 1),
(7, 'vijay', 'male', 'vijay', '9876900012', ' V V Villa,Varkala', 'Varkala', '', 1, 'vijay', 'vijay', 0),
(8, 'saju', 'male', 'saju', '7789065712', 'S S Nilayam,Kayamkulam,Kollam', 'Kayamkulam', '', 1, 'saju', 'saju', 0),
(10, 'vijith', 'male', 'vijith@gmail.com', '7788899900', 'Swargam,Kollam', 'Kollam', '', 1, 'vijith', 'vijith', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feed_id` int(100) NOT NULL AUTO_INCREMENT,
  `u_id` int(100) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  PRIMARY KEY (`feed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `u_id`, `feedback`) VALUES
(1, 11, 'I like all pets ,this system is really amazing');

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
  `msgtodate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mes_id`, `u_id`, `b_id`, `v_id`, `t_id`, `bd_id`, `message`, `reply`, `msgtodate`) VALUES
(5, 6, 0, 2, 0, 0, 'My pet did not taken food', 'Give medicine for worm', '0000-00-00 00:00:00'),
(9, 6, 0, 0, 3, 0, 'How to tain my cat', '1s step is sitting training', '0000-00-00 00:00:00'),
(10, 6, 0, 0, 0, 5, 'WE are outofstation for 1 week.. plz take care of our pets?', 'Of course', '0000-00-00 00:00:00'),
(18, 0, 1, 2, 0, 0, 'Doctor, My cat has an indigestion problem', 'NEED TO VIEW THE PET', '2022-02-04 07:28:59'),
(19, 0, 1, 0, 3, 0, 'How to tain my cat', '1s step is sitting training', '2021-12-07 12:38:39'),
(20, 6, 0, 2, 0, 0, 'Macaw is not ok', 'What happend ? explain the  symptoms', '2022-02-04 07:29:57'),
(21, 6, 0, 0, 3, 0, 'sit command', 'Sitting Training', '2021-12-08 05:23:33'),
(22, 6, 0, 0, 0, 5, 'can you send your location', 'yes', '2021-12-08 05:27:59'),
(23, 0, 14, 2, 0, 0, 'Hi Doctor,Are you Willing to join us', 'yesss,I am ready to Join', '2021-12-08 05:13:41'),
(24, 0, 14, 0, 3, 0, 'vishnu,Are u willing to join us', 'jj', '2021-12-08 06:21:43'),
(25, 8, 0, 2, 0, 0, 'Hi,Doctor can you please suggest the healthy food for my pet', 'normal food with chicken and Pedigree', '2022-02-12 05:07:16'),
(26, 8, 0, 0, 3, 0, 'Do ave time to train my puppy', 'yes', '2021-12-08 05:42:46'),
(27, 8, 0, 0, 0, 5, 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 'hii', '2021-12-08 05:43:22'),
(28, 11, 1, 0, 0, 0, 'heyyyy manu do you like that pet..?', '', '2022-01-22 06:58:56'),
(29, 11, 14, 0, 0, 0, 'hi breeder i like that. is that breeded..?', 'hiiii,2 color', '2022-01-28 09:51:46'),
(30, 11, 0, 0, 0, 0, 'yess. i like that one but can you adjust the price', '', '2022-01-24 06:31:28'),
(31, 11, 14, 0, 0, 0, 'hiii', 'hiiii,2 color', '2022-01-28 09:51:46'),
(32, 11, 14, 0, 0, 0, '', 'hiiii,2 color', '2022-01-28 09:51:46'),
(33, 0, 0, 0, 0, 0, 'hii,is that dobber has pair', '', '2022-01-28 09:07:20'),
(36, 11, 14, 0, 0, 0, 'heyyy ganga,how many colors in that lovebirds', 'hiiii,2 color', '2022-01-28 09:51:46'),
(37, 0, 15, 2, 0, 0, 'Sir, I request a new certificate for the British Shorthair cat', 'ok  I will do that', '2022-02-07 08:08:40'),
(38, 12, 15, 0, 0, 0, 'hii,Joe this one male or female', '', '2022-02-07 08:12:19'),
(39, 8, 15, 0, 0, 0, 'hiii,can you give more pictures', '', '2022-02-11 07:22:01');

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
  `p_video` text NOT NULL,
  `cert_date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `request` int(100) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`p_id`, `pcat_id`, `b_id`, `pet_name`, `price`, `quantity`, `descp`, `p_img`, `p_video`, `cert_date`, `status`, `request`) VALUES
(10, 1, 1, 'Beagle', 18500, '2', '2 puppies available.. 1 male and 1 female', '', '', '0000-00-00', 0, 0),
(12, 2, 1, 'Macaw', 39000, '1', 'hgfhbnbkn', '05.jpg', '', '0000-00-00', 0, 0),
(13, 1, 1, 'Beagle', 25000, '1', 'Orginal Breed', 'begle.jpg', '', '0000-00-00', 1, 0),
(14, 2, 1, 'African Love Birds', 2500, '24', 'Green/Olive Peach Breeding Pairs', 'bird.jpg', '', '0000-00-00', 1, 0),
(15, 1, 14, 'dobber', 1500, '15', 'Healthy Puppies-3 month ', 'dog_sitting.png', 'production ID 4122305.mp4', '0000-00-00', 1, 0),
(16, 2, 14, 'Feral Cat', 1000, '10', 'Feral Cat -Available in Different  Colours', 'adopt_pet_4.jpg', '', '04/02/2022', 1, 2),
(17, 2, 14, 'Love Birds', 1500, '15', 'Different Colour and differentbreed', 'bird.jpg', '', '26/02/2022', 1, 2),
(18, 3, 15, 'British Shorthair', 4500, '5', 'The British Shorthair is the pedigreed version of the traditional British domestic cat, with a distinctively stocky body, dense coat, and broad face.', 'brittish.jpg', '', '07/02/2022', 1, 2),
(19, 2, 15, 'Parrot', 2000, '5', 'there are many beautiful parrot species that also have bright yellow feathers. These birds range in size from small yellow parakeets to their large parrot cousins. Most tend to be quite loving with their caretakers, though some have complex care requirements. Here are eight yellow parrots that can add some sunshine to a home. ', 'parrot.jpg', '', '11/02/2022', 1, 2),
(20, 4, 15, 'Fighter Fish', 150, '50', 'male and females available which include different color', 'fighter.jpg', '', '28/02/2022', 1, 2),
(21, 3, 15, 'Napoleon', 2000, '5', 'Crossbreed between the Persian and Munchkin', '150px-Munchkin_cat_2.jpg', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pet_category`
--

CREATE TABLE IF NOT EXISTS `pet_category` (
  `pcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pcat_name` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`pcat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pet_category`
--

INSERT INTO `pet_category` (`pcat_id`, `pcat_name`, `status`) VALUES
(1, 'Puppy', 1),
(2, 'Birds', 1),
(3, 'Cat', 1),
(4, 'Fish', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pet_purchase`
--

CREATE TABLE IF NOT EXISTS `pet_purchase` (
  `p_id` int(100) NOT NULL AUTO_INCREMENT,
  `req_id` int(100) NOT NULL,
  `b_id` int(100) NOT NULL,
  `u_id` int(100) NOT NULL,
  `amount` varchar(150) NOT NULL,
  `adm_amt` varchar(100) NOT NULL,
  `mode_of` varchar(200) NOT NULL,
  `billing_add` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pet_purchase`
--

INSERT INTO `pet_purchase` (`p_id`, `req_id`, `b_id`, `u_id`, `amount`, `adm_amt`, `mode_of`, `billing_add`, `date`, `status`) VALUES
(1, 12, 0, 11, '3030', '30.3', 'card', 'Manu Dev<br>Madhavam,Attingal<br>Attingal Kerala-695611<br>manu@gmail.com', '29/01/2022', '1'),
(2, 11, 0, 11, '1020', '10.2', 'card', 'Manu Dev<br>sopanam,Varkala<br>varkala,Kerala-969452<br>manu@gmail.com', '31/01/2022', '1'),
(3, 11, 0, 11, '1020', '10.2', 'card', 'Manu Dev<br>sopanam,Varkala<br>varkala,Kerala-969452<br>manu@gmail.com', '31/01/2022', '1'),
(4, 14, 0, 11, '50500', '505', 'card', 'Vishnu<br>V V villa,Kayamkulam,Kollam<br>Kayamkulam,Kerala-632154<br>vishnu@gmail.com', '31/01/2022', '1'),
(5, 10, 0, 11, '25250', '252.5', 'card', 'Meera Tomas<br>Meeralayam<br>TVM,Kerala-695600<br>meera@gmail.com', '31/01/2022', '1'),
(6, 15, 0, 12, '4590', '45.9', 'card', 'Annu Mohan<br>ABC villa,keezhattingal,Attingal<br>Attingal,Kerala-632154<br>annu@gmail.com', '2022-02-12', '1'),
(7, 16, 0, 12, '1020', '10.2', 'card', 'Annu Mohan<br>ABC House,Melattingal,Attingal<br>Attingal,Kerala-695603<br>annu@gmail.com', '2022-02-16', '1'),
(8, 18, 0, 8, '4590', '45.9', 'card', 'Nithi<br>N S bhavan ,Alamcode,Alamcode p o,Tvm<br>Alamcode,Kerala-695603<br>nithi@gmail.com', '2022-03-02', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pdct_id`, `cat_id`, `p_name`, `price`, `quantity`, `descp`, `p_img`, `status`) VALUES
(1, 1, 'Nature Forever Bird Feeder', 390, '5', 'The bird might take few days to few months to visit the bird feeder as it is a natural process and depends upon the presence of birds in your locality, the bird feeder is not a magnet which will attract birds from far and wide hence one need to have patience', '617UwDEQyGL__SX450_.jpg', 1),
(2, 2, 'Cats Best OkoPlus Clumping', 680, '5', 'Super economical: Upto 700 percent liquid intake\r\nBase content may remain 4-6 weeks in the coat  toilet\r\nCosiderable less waste quantity\r\nWaste clumps to be disposed through the normal domestic toilet\r\nSave money and at the same time protects the environment\r\n100 percent natural organic fibre', '81epHCXuI5S__SX466_.jpg', 1),
(3, 3, 'International Aquarium Medicine', 280, '3', 'Use 5 Ml. (One Teaspoonful) To Every 25 Litres Of Water. For Bigger Fishsuch As Carps, Cichlids, Gold Fish, Gourami, Koi, Oscars, Parrot Fish Andin Severe Fungi Infections Use 10 Ml. (Two Teaspoonful) If Necessary. Totreat External Injuries Dab The Affected Areas With Undiluted Anti-Fungus.', '51rbgv3W36L.jpg', 1),
(4, 2, 'Pedigree Biscrok Biscuits', 250, '7', 'Pedigree Biscrok Biscuits Dog Treat (Above 4 months) Lamb Flavour, 900g Pack', '815SwfO8QJL__AC_UL320_.jpg', 1),
(5, 4, 'Belt', 1500, '1', 'Use the belt for your pet during training time ', 'shop_img_3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase`
--

CREATE TABLE IF NOT EXISTS `product_purchase` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` varchar(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `b_id` int(100) NOT NULL,
  `price` int(11) NOT NULL,
  `mode_of` varchar(25) NOT NULL,
  `billing_add` text NOT NULL,
  `profit` varchar(20) NOT NULL,
  `ddate` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `product_purchase`
--

INSERT INTO `product_purchase` (`p_id`, `cart_id`, `u_id`, `b_id`, `price`, `mode_of`, `billing_add`, `profit`, `ddate`, `status`) VALUES
(1, '22,23,25', 6, 0, 1450, 'card', 'Sujin M S<br>SREENANDANAM VILABHAGOM NEDUNGANDA P O VARKALA<br>Trivandrum,Kerala-695307<br>sujinrmp@gmail.com', '', '28/11/2021', 1),
(13, '40', 6, 0, 250, 'card', 'Sujin M S<br>SREENANDANAM VILABHAGOM NEDUNGANDA P O VARKALA<br>Trivandrum,Kerala-695307<br>sujinrmp@gmail.com', '', '07/12/2021', 1),
(14, '42', 8, 0, 1500, 'card', 'Nithi<br>nithi,ABC illa,Tvm<br>Trivandrum,Kerala-695611<br>nithi@gmail.com', '', '08/12/2021', 1),
(15, '44', 8, 0, 250, 'card', 'Nithi<br>nithi,ABC illa,Tvm<br>Trivandrum,Kerala-695611<br>nithi@gmail.com', '', '08/12/2021', 1),
(16, '45', 8, 0, 250, 'card', 'Nithi<br>nithi,ABC illa,Tvm<br>Trivandrum,Kerala-695611<br>nithi@gmail.com', '', '08/12/2021', 1),
(17, '46', 8, 0, 1500, 'card', 'Dhyan<br>dyan,ABC illa,Tvm<br>Trivandrum,Kerala-695611<br>dyan@gmail.com', '', '08/12/2021', 1),
(18, '48,49,50', 8, 0, 2140, 'card', 'Nithi<br>nithi,ABC illa,Tvm<br>Trivandrum,Kerala-695611<br>nithi@gmail.com', '', '08/12/2021', 1),
(19, '52', 0, 1, 390, 'card', 'aryan<br>abc <br>Kollam,Kerala-695889<br>aryan@gmail.com', '', '21/01/2022', 1),
(20, '', 11, 0, 3030, 'card', 'Manu Dev<br>Madhavam,Attingal<br>Attingal,Kerala-695611<br>manu@gmail.com', '', '29/01/2022', 1);

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
  `price` varchar(100) NOT NULL,
  `del_fee` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `address` text NOT NULL,
  `files` text NOT NULL,
  `ddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `assgn_date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `flag` int(100) NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `u_id`, `b_id`, `p_id`, `quantity`, `price`, `del_fee`, `total`, `address`, `files`, `ddate`, `assgn_date`, `status`, `flag`) VALUES
(5, 6, 1, 13, 1, '', 0, 0, 'Sreekariyam', '', '2022-01-31 09:31:47', '', 0, 0),
(6, 6, 1, 14, 2, '', 0, 0, 'Kallambalam', '', '2022-01-11 09:05:19', '', 3, 0),
(7, 8, 14, 15, 1, '', 0, 0, 'Nithi nilayam,Kallamblam,tvm', '', '2022-01-31 09:05:07', '', 3, 0),
(9, 8, 1, 12, 2, '', 0, 0, 'klbm', '', '2022-02-12 06:15:45', '', 0, 0),
(10, 11, 1, 13, 1, '25000', 250, 25250, 'SreeGanga,Kallambalam', '', '2022-02-26 04:46:33', '2022-02-05', 3, 1),
(11, 11, 14, 16, 1, '1000', 20, 1020, 'Sopanam,Kollam', '', '2022-02-10 10:39:53', '2022-01-19', 3, 1),
(12, 11, 14, 17, 2, '1500', 30, 3030, 'Madhavam,Attingal', '', '2022-02-10 08:22:24', '2022-02-06', 3, 1),
(13, 11, 14, 16, 2, '1000', 20, 2020, 'Vandhanam,Erattupetta,Kerala', 'cute-pets-pets.gif', '2022-02-01 10:38:42', '', 1, 0),
(15, 12, 15, 18, 1, '4500', 90, 4590, 'Annu mohan,Kezhattingal,Attingal', 'Pet Care Breeder Dashboard.pdf', '2022-02-07 09:54:05', '2022-02-12', 1, 1),
(16, 12, 14, 16, 1, '1000', 20, 1020, 'ABC House,Melattingal,Attingal \r\npin-695603', 'ferral_cat_cert.pdf', '2022-02-11 06:51:13', '2022-02-16', 1, 1),
(17, 8, 15, 19, 1, '2000', 40, 2040, ' 	Nithya, Pala,Kottayam', '', '2022-02-11 10:04:10', '', 1, 0),
(18, 8, 15, 18, 1, '4500', 90, 4590, 'N S bhavan ,Alamcode,Alamcode p o,Tvm', '', '2022-02-25 09:03:13', '2022-03-02', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `gender`, `email`, `contactno`, `address`, `role`, `username`, `password`, `status`) VALUES
(6, 'Dhyan', 'male', 'dhyan@gmail.com', '9995558585', 'Suresh Bhavan,\r\nVallathungal,\r\nKollam', 5, 'dhyan', 'dhyan', 1),
(8, 'Nithya Das', 'female', 'nithya@gmail.com', '7894561231', 'Nithya, Kottayam', 0, 'nithi', 'nithi', 1),
(10, 'Hijas', 'male', 'hijas@gmail.com', '9876543212', 'Hijas Manzil', 0, 'hijas', 'hijas', 0),
(11, 'Manu', 'male', 'manu@gmail.com', '8523697412', 'M M villa,Kollam', 0, 'manu', 'manu', 1),
(12, 'Annu Mohan', 'female', 'annu@gmail.com', '9513572648', 'ABC House,Melattingal,Attingal', 0, 'annu', 'annu123', 1);

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
  `fees` varchar(200) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vet`
--

INSERT INTO `vet` (`v_id`, `name`, `gender`, `email`, `contactno`, `address`, `role`, `fees`, `username`, `password`, `status`) VALUES
(2, 'Ayaan', 'male', 'ayaansr@gmail.com', '9496402033', 'Chaithanya,\r\nKarimpaloor,\r\nPuthenkulam P.O\r\nKollam', 2, '0', 'ayaan', 'ayaan', 1),
(8, 'Dr. Reshma Biju', 'female', 'drreshmamd@gmail.com', '9595848474', 'Dr. Reshma,\r\nHimadri,\r\nPuthenkulam,\r\nKollam', 0, '40', 'reshma ', 'reshma', 0),
(9, 'Dr.Jaison', 'male', 'drjai@gmail.com', '9876541234', 'kunnumel bunglaw,Konni,Pathanamthitta', 0, '40', 'jai', 'jai', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
