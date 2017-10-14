-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Okt 2017 pada 23.56
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

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
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Uktp`, `Uname`, `Uemail`, `Username`, `Upassword`, `Uphone`, `Uaddress`, `Ufoto`) VALUES
(52151151, 'sarah chairina melinda', 'sarahchairinam@gmail.com', 'sarahchair', 'CD3A77622EF59E64711DFD05F1A263A6', '08121212121', 'sadasdada', ''),
(2147483647, 'admin', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '88756466809', 'asdadasdada', ''),
(0, 'sarah chairina melinda', 'sarahchairinam@gmail.com', 'sarahchair', '12a411335935d95909195dca72ecfbc3', '08123257362', '', './images/'),
(0, 'cici', 'cici@cici.com', 'cici', '702e4946e6db9b7a74b921fe85e83f32', '081232461929', '', './images/Screenshot (11).png'),
(0, 'cicici', 'cicici@cicici.com', 'cicici', 'ad1c64252b7ccf005981651925c17177', '023754234', '', './images/Screenshot_(9).png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
