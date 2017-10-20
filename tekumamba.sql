-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Okt 2017 pada 15.11
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tekumamba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`no` int(11) NOT NULL,
  `Uktp` varchar(40) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Upassword` varchar(255) NOT NULL,
  `Uname` varchar(30) NOT NULL,
  `Uemail` varchar(50) NOT NULL,
  `Uphone` varchar(20) NOT NULL,
  `Uaddress` varchar(255) NOT NULL,
  `Ufoto` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`no`, `Uktp`, `Username`, `Upassword`, `Uname`, `Uemail`, `Uphone`, `Uaddress`, `Ufoto`) VALUES
(2, '64677777', 'sarahchair', 'd41d8cd98f00b204e9800998ecf8427e', 'sarah', 'sarahchairinam@gmail.com', '081232416172', 'dsdsd', './images/Capture3.PNG'),
(9, '52151001', 'nasywa', 'd41d8cd98f00b204e9800998ecf8427e', 'nasywa tok', 'nasywatok@tok.com', '1212121', 'jalan tok', './images/WIN_20170714_14_08_04_Pro.jpg'),
(10, '1', 'testing', 'ae2b1fca515949e5d54fb22b8ed95575', 'testing', 'testing@testing.com', '555555', '', ''),
(45, '2222', 'coba', 'd41d8cd98f00b204e9800998ecf8427e', 'coba', 'coba@coba.com', '12121212', 'a', ''),
(46, '5555', 'd', '8277e0910d750195b448797616e091ad', 'd', 'd@srgfvdf.tfge', '45445', '', ''),
(47, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
