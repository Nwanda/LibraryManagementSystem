-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 12:27 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_books`
--

CREATE TABLE `add_books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `book_img` varchar(500) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `pages` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `publish_date` date NOT NULL,
  `purchase_date` int(11) NOT NULL,
  `book_price` int(11) NOT NULL,
  `book_qty` int(11) NOT NULL,
  `librarian_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_books`
--

INSERT INTO `add_books` (`book_id`, `title`, `book_img`, `ISBN`, `pages`, `author_name`, `publisher_name`, `publish_date`, `purchase_date`, `book_price`, `book_qty`, `librarian_name`) VALUES
(3, 'Geography', '../assets/books_img/4c0346ecd464eb5f85dccb9ec6ae496cimage-6.jpg', '123456', 21, 'shakeps', 'paul', '0000-00-00', 1200, 30, 13, ' '),
(6, 'Crazy Little Things', '../assets/books_img/d9598427ad7b1edd4d4ad64f96b8644bcrazy little things.jpg', '123456789', 500, 'Bell Harbor', 'Bell Harbor', '0000-00-00', 50, 3, 3, ' test'),
(7, 'Love Me Sweet', '../assets/books_img/edf5300aceed2080aabedcf65d87c3c4love me sweet.jpg', '4563212', 150, 'A Bell Harbor', 'A Bell Harbor', '0000-00-00', 10, 20, 20, ' test'),
(8, 'Turning Point', '../assets/books_img/1ee621e5fa7a4f19295c944ea886b5e8Turning Point.jpg', '95626522', 52, 'Danielle Steel', 'Danielle Steelâ€™', '0000-00-00', 26, 45, 24, ' test');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `issue_id` int(11) NOT NULL,
  `user_number` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `issue_date` varchar(50) NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`issue_id`, `user_number`, `FirstName`, `LastName`, `Username`, `Telephone`, `Email`, `book_name`, `issue_date`, `return_date`) VALUES
(9, '2010', 'agnese', 'Nvanda', 'agy', '545645', 'agy@gmail.com', 'php', '07-02-2019', '0000-00-00'),
(10, '123', 'Louisq', 'NWanda', 'mixco', '77095960', 'louismix@gmail.com', 'php', '12-02-2019', '0000-00-00'),
(15, '2010', 'agnese', 'Nvanda', 'agy', '545645', 'agy@gmail.com', 'Geography', '12-02-2019', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `librarian_registration`
--

CREATE TABLE `librarian_registration` (
  `Lib_id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Gender` enum('male','female','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian_registration`
--

INSERT INTO `librarian_registration` (`Lib_id`, `FirstName`, `LastName`, `Username`, `Password`, `DateOfBirth`, `Email`, `Telephone`, `Address`, `Gender`) VALUES
(1, 'Louis', 'NWanda', 'test', 'test', '2019-01-15', 'louismix@gmail.com', '3574587825', 'Tal hriereb', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `lib_messages`
--

CREATE TABLE `lib_messages` (
  `msg_id` int(5) NOT NULL,
  `src_username` varchar(50) NOT NULL,
  `dest_username` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `msg` text NOT NULL,
  `read_1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_messages`
--

INSERT INTO `lib_messages` (`msg_id`, `src_username`, `dest_username`, `subject`, `msg`, `read_1`) VALUES
(1, 'test', '', 'n', 'fgfb', 'y'),
(2, 'test', '', 'ghdf', 'fgdfg', 'y'),
(3, 'test', 'sdf', 'dsfa', 'sfdasdf', 'n'),
(4, 'test', 'agy', 'hi there', 'please submit your book', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `User_id` int(5) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telephone` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Gender` enum('Male','Female','','') NOT NULL,
  `Status` varchar(3) NOT NULL,
  `user_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`User_id`, `FirstName`, `LastName`, `Username`, `Password`, `DateOfBirth`, `Email`, `Telephone`, `Address`, `Gender`, `Status`, `user_number`) VALUES
(4, 'Abilene', 'Nvanda', 'abi2010', 'trinity', '0000-00-00', 'abi@gmail.com', '123456', 'San Gwan 10', 'Female', 'yes', '100-301018'),
(7, 'Louisq', 'NWanda', 'mixco', 'trinity', '0000-00-00', 'louismix@gmail.com', '77095960', 'msida', 'Male', 'yes', '123'),
(9, 'agnese', 'Nvanda', 'agy', 'trinity', '0000-00-00', 'agy@gmail.com', '545645', 'valleta', 'Female', 'yes', '2010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_books`
--
ALTER TABLE `add_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  ADD PRIMARY KEY (`Lib_id`);

--
-- Indexes for table `lib_messages`
--
ALTER TABLE `lib_messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_books`
--
ALTER TABLE `add_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  MODIFY `Lib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lib_messages`
--
ALTER TABLE `lib_messages`
  MODIFY `msg_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `User_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
