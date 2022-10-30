-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 02:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicia`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Drugs', 'Drugs'),
(2, 'Medical Equipment', 'Medical Equipment'),
(3, 'Medical Product', 'Medical Product');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5),
(21, 11, 1, 1),
(22, 12, 2, 1),
(23, 12, 23, 1),
(24, 12, 1, 1),
(25, 12, 19, 1),
(26, 12, 3, 1),
(27, 12, 11, 1),
(28, 13, 3, 1),
(29, 14, 24, 2),
(30, 15, 1, 3),
(31, 15, 2, 1),
(32, 15, 4, 1),
(33, 15, 3, 2),
(34, 16, 13, 1),
(35, 17, 2, 3),
(36, 17, 12, 1),
(37, 17, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(1, 3, 'glaves', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'gloves', 49.99, 'glaves.jpg', '2021-10-27', 2),
(2, 3, 'White Gloves\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?\n\n', 'White Gloves', 54.99, 'img_1.jpg', '2021-11-15', 1),
(3, 3, 'First Aid Bag\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?\n\n', 'First Aid Bag', 49.99, 'img_5.jpg', '2018-05-12', 1),
(4, 3, 'Scan Device\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?\n\n', '	\nScan Device', 99.99, 'img_3.jpg\n', '2018-05-10', 3),
(5, 3, 'Thermometer\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?\n\n', 'Thermometer', 39.99, 'img_8.jpg\n', '2021-11-15', 1),
(6, 3, 'Stethoscope\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Stethoscope', 149.99, 'productt.jpg\n', '2021-11-15', 1),
(7, 1, 'Vitamine C\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Vitamine C\n', 59.99, 'img_4.jpg\n', '0000-00-00', 2),
(8, 3, 'Masks', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Masks', 59.99, 'img_7.jpg\n', '0000-00-00', 2),
(9, 3, 'Blood pressure  device\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?\n\n', 'Blood pressure  device\n', 59.99, 'product_3.png\n', '0000-00-00', 2),
(10, 3, 'Medical crutch\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Medical crutch\n', 59.99, 'new3.jpg\n', '2018-05-10', 1),
(11, 3, 'Mask N95\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Mask N95', 49.99, 'mask.png', '2018-05-12', 1),
(12, 3, 'Temperature measuring device\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Temperature measuring device\n', 79.99, 'new2.jpg\n', '2018-05-12', 3),
(13, 1, 'pills', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'pills', 79.99, 'blog_img_2.jpg\n', '2021-10-25', 3),
(14, 1, 'Headache pills\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Headache pills\n', 9.99, 'blog_img_1.jpg\n', '2018-05-10', 13),
(15, 1, 'pills', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'pills', 9.99, 'blog_img_3.jpg\n', '2018-07-09', 1),
(16, 1, 'Vitamine D\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Vitamine D\n', 69.99, '6.jpeg\n', '2018-05-10', 2),
(17, 1, 'Children Tylenol\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Cold & Flu', 49.99, '4.jpeg\n', '2018-05-12', 1),
(18, 1, 'Zincoder', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Zincoder', 79.99, '7.jpeg\n', '2018-05-12', 2),
(19, 1, 'Neutrogena\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', '08.jpeg\n', 99.99, '08.jpeg\n', '2018-05-10', 1),
(20, 1, 'Bepex', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>\r\n', 'bepex', 99.99, '07.jpeg\n', '2021-10-25', 4),
(21, 1, 'Equate', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Cold & Flu\n', 39.99, '3.jpeg\n', '2018-07-09', 9),
(22, 1, 'Hand Sanitizer\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Hand Sanitizer\n', 89.99, 'new1.jpg', '2021-10-25', 2),
(23, 1, 'Bobai', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Sun Screen\n', 69.99, '1.jpeg\n', '2021-10-25', 2),
(24, 3, 'First Aid Bag', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'First Aid Bag', 49.99, 'demo1.jpg', '2021-10-25', 2),
(25, 2, 'Heart Rate Monitor', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Heart Rate Monitor', 15999.99, 'heart.jpg', '2021-10-25', 2),
(26, 2, 'Clear Glass Boottle', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Clear Glass Boottle', 59.99, 'clear.jpg', '2021-10-25', 2),
(27, 2, 'Silver Scissors Beside White Paper', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Silver Scissors Beside White Paper', 59.99, 'Silver Scissors Beside White Paper.jpg', '2021-10-25', 2),
(28, 2, 'Comfortable procedure chair ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Comfortable procedure chair ', 49999.99, 'comfortable.jpeg', '2021-10-25', 2),
(29, 2, 'monitor', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Medical Equipment ', 14999.99, 'monitor.jpeg', '2021-10-25', 2),
(30, 2, 'Black and White Dentist Chair ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', ' Dentist Chair ', 49999.99, 'Black and White Dentist Chair .jpeg', '2021-10-25', 2),
(48, 2, 'Light Microscope ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima magni maiores dignissimos totam corporis necessitatibus asperiores tempore nulla? Natus, eos?</p>', 'Light Microscope ', 14999.99, 'Light Microscope.jpeg', '2021-10-25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(11, 42, 'PAYID-MHLOO3Y6LM610730E8339408', '2022-01-06'),
(12, 47, 'PAYID-MHPOS7Q0J064103L0901910C', '2022-01-12'),
(13, 47, 'PAYID-MHWSN6Q383482220L4683112', '2022-01-23'),
(14, 47, 'PAYID-MHWSP6Y14J466118X439560F', '2022-01-23'),
(15, 47, 'PAYID-MHXMVYY9HB946687V496283C', '2022-01-24'),
(16, 53, 'PAYID-MH6EZTQ0NX45638J9887824B', '2022-02-03'),
(17, 54, 'PAYID-MH6UFQQ7YN05137TH769712T', '2022-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `Code` varchar(250) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `Code`, `type`, `firstname`, `lastname`, `Phone`, `Gender`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(56, 'moatazsaied@gmail.com', '698d51a19d8a121ce581499d7b701668', '', 1, 'moataz', 'saied', '01014410480', 'Male', '', '', 'male2.png', 1, 'cPqdoO39wIex', '', '2022-02-05'),
(57, 'kareemmoataz@gmail.com', '698d51a19d8a121ce581499d7b701668', '', 0, 'kareem', 'moataz', '010199822001', 'Male', '', '', '', 1, 'YqPCvUawyhe3', '', '2022-02-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
