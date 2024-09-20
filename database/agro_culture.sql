-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2023 at 02:20 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agro_culture`
--

-- --------------------------------------------------------

--
-- Table structure for table `rt_admin`
--

CREATE TABLE `rt_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_admin`
--

INSERT INTO `rt_admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rt_answer`
--

CREATE TABLE `rt_answer` (
  `id` int(40) NOT NULL,
  `postedby` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `rdate` varchar(40) NOT NULL,
  `catid` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_answer`
--

INSERT INTO `rt_answer` (`id`, `postedby`, `category`, `question`, `answer`, `uname`, `rdate`, `catid`) VALUES
(1, 'siva', 'tomato', 'What to do to make the tomato plant more', 'This tomato plant should be well watered', 'siva', '11-05-2023', '1'),
(2, 'siva', 'tomato', 'What to do to make the tomato plant more', 'super nice friuts', 'siva', '11-05-2023', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rt_cart`
--

CREATE TABLE `rt_cart` (
  `id` int(11) NOT NULL auto_increment,
  `uname` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `rdate` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `uqut` varchar(40) NOT NULL,
  `amount` int(11) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `retailer` varchar(20) NOT NULL,
  `deli_mode` varchar(40) NOT NULL,
  `shipping_address` varchar(40) NOT NULL,
  `d_status` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rt_cart`
--

INSERT INTO `rt_cart` (`id`, `uname`, `pid`, `status`, `rdate`, `price`, `category`, `quantity`, `uqut`, `amount`, `pname`, `retailer`, `deli_mode`, `shipping_address`, `d_status`) VALUES
(1, 'kumar', 2, 1, '09-05-2023', 60, 'Rice', 480, '1', 60, 'rice', 'siva', '', '', '1'),
(2, 'kumar', 3, 1, '10-05-2023', 790, 'fruits', 500, '1', 790, 'fruit', 'jebin', '', '', ''),
(3, 'kumar', 1, 1, '10-05-2023', 1300, 'Rice', 9, '1', 1300, 'Ponni Rice', 'raj', '', '', ''),
(4, 'kumar', 1, 1, '12-05-2023', 1300, 'Rice', 8, '2', 2600, 'Ponni Rice', 'raj', '', '', ''),
(5, 'kumar', 2, 0, '13-05-2023', 60, 'Rice', 479, '1', 60, 'rice', 'siva', 'Home Delivery', '2,21 uraiyour,trichy.', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rt_category`
--

CREATE TABLE `rt_category` (
  `id` int(11) NOT NULL,
  `retailer` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_category`
--

INSERT INTO `rt_category` (`id`, `retailer`, `category`) VALUES
(1, 'raj', 'Rice'),
(2, 'siva', 'rice'),
(4, 'jebin', 'fruits');

-- --------------------------------------------------------

--
-- Table structure for table `rt_customer`
--

CREATE TABLE `rt_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `otp` varchar(20) NOT NULL,
  PRIMARY KEY  (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_customer`
--

INSERT INTO `rt_customer` (`id`, `name`, `address`, `city`, `mobile`, `email`, `uname`, `pass`, `create_date`, `otp`) VALUES
(1, 'Kumar', '45, SD Road', 'ewge', 6381082863, 'jebinp08@gmail.com', 'kumar', '123456', '13-03-2023', '8761');

-- --------------------------------------------------------

--
-- Table structure for table `rt_forum`
--

CREATE TABLE `rt_forum` (
  `id` varchar(40) NOT NULL,
  `category` varchar(500) NOT NULL,
  `subcategory` varchar(500) NOT NULL,
  `question` varchar(40) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `rdate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_forum`
--

INSERT INTO `rt_forum` (`id`, `category`, `subcategory`, `question`, `uname`, `rdate`) VALUES
('1', 'tomato', 'Cherry Tomatoes ', 'What to do to make the tomato plant more', 'siva', '11-05-2023'),
('2', 'fruits', 'mango', 'What is the mango fruit?', 'siva', '11-05-2023');

-- --------------------------------------------------------

--
-- Table structure for table `rt_product`
--

CREATE TABLE `rt_product` (
  `id` int(11) NOT NULL,
  `retailer` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `product` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `details` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `required_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_product`
--

INSERT INTO `rt_product` (`id`, `retailer`, `category`, `product`, `price`, `quantity`, `photo`, `details`, `status`, `required_qty`) VALUES
(1, 'raj', 'Rice', 'Ponni Rice', 1300, 6, 'P1rice.jpg', '1 pack', 0, 0),
(2, 'siva', 'Rice', 'rice', 60, 478, 'P2rice.jpg', 'ponni rice', 0, 0),
(3, 'jebin', 'fruits', 'fruit', 790, 499, 'P3bg-product-1.png', 'good product', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rt_purchase`
--

CREATE TABLE `rt_purchase` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `rdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_purchase`
--


-- --------------------------------------------------------

--
-- Table structure for table `rt_retailer`
--

CREATE TABLE `rt_retailer` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `proof` varchar(50) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_retailer`
--

INSERT INTO `rt_retailer` (`id`, `name`, `address`, `city`, `mobile`, `email`, `proof`, `uname`, `pass`, `create_date`, `status`) VALUES
(3, 'jebin', 'trichy', 'trichy', 6575678576, 'hospital@gmail.com', 'P3blog-3.jpg', 'jebin', '1234', '09-05-2023', 1),
(1, 'Raj', '45, GD Nagar', 'Thanjavur', 8956214752, 'raj@gmail.com', '', 'raj', '123456', '13-03-2023', 1),
(2, 'Siva', '25,FF', 'Trichy', 8794562523, 'siva@gmail.com', 'P2a1.jpg', 'siva', '1234', '30-04-2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rt_review`
--

CREATE TABLE `rt_review` (
  `id` varchar(40) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `pid` varchar(40) NOT NULL,
  `review` varchar(100) NOT NULL,
  `code` varchar(40) NOT NULL,
  `rdate` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt_review`
--

INSERT INTO `rt_review` (`id`, `uname`, `pid`, `review`, `code`, `rdate`, `status`) VALUES
('1', 'kumar', '2', 'good', '28432', '09-05-2023', '1'),
('2', 'kumar', '2', 'good', '83547', '09-05-2023', '1'),
('3', 'kumar', '2', 'super product', '27144', '12-05-2023', '1');
