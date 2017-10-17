-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 02:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tekumamba`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Uktp` int(225) NOT NULL,
  `Uname` varchar(35) NOT NULL,
  `Uemail` varchar(155) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Upassword` varchar(109) NOT NULL,
  `Uphone` varchar(14) NOT NULL,
  `Uaddress` varchar(30) NOT NULL,
  `Ufoto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Uktp`, `Uname`, `Uemail`, `Username`, `Upassword`, `Uphone`, `Uaddress`, `Ufoto`) VALUES
(2147483647, 'admin', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '88756466809', 'asdadasdada', ''),
(0, 'cicici', 'cicici@cicici.com', 'cicici', 'ad1c64252b7ccf005981651925c17177', '023754234', '', './images/20019_anime_scenery.jpg'),
(0, 'testing', 'testing@testing.com', 'testing', 'ae2b1fca515949e5d54fb22b8ed95575', '123', '', './images/plex prices.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
