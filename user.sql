-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Okt 2017 pada 18.20
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`no`, `Uktp`, `Username`, `Upassword`, `Uname`, `Uemail`, `Uphone`, `Uaddress`, `Ufoto`) VALUES
(2, '64677777', 'sarahchair', '12a411335935d95909195dca72ecfbc3', 'sarah', 'sarahchairinam@gmail.com', '081232416172', '', ''),
(3, '5215100015', 'sarah', '9e9d7a08e048e9d604b79460b54969c3', 'Sarah Chairina Melinda', 'sarahchairinam@gmail.com', '081232461929', '', ''),
(4, '55555', 'ya', 'd74600e380dbf727f67113fd71669d88', 'ya', 'ya@ya.com', '90739284', '', ''),
(5, '3', 's', '03c7c0ace395d80182db07ae2c30f034', 's', 's@s.com', '433', '', '');

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
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
