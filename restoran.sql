-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3325
-- Generation Time: Mar 13, 2021 at 03:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `NamaProducts` varchar(1000) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `NamaUser` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductsId` int(11) NOT NULL,
  `Gambar` varchar(1000) NOT NULL,
  `Nama` varchar(1000) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Deskripsi` varchar(1000) NOT NULL,
  `Kategori` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductsId`, `Gambar`, `Nama`, `Harga`, `Deskripsi`, `Kategori`) VALUES
(1, 'https://drive.google.com/uc?export=view&id=1odp2vIAv0RdTcEChEvXKoy57wFMR35Xg', 'Kepiting Saus Padang', 115000, 'Hidangan seafood Indonesia yang terdiri dari kepiting yang disajikan dengan saus padang yang pedas khas daerah padang meliputi lada cabai, bawang merah, bawang putih, jahe, kunyit, kemiri, jagung dan daun bawang.', 'Seafood'),
(2, 'https://drive.google.com/uc?export=view&id=1tM7vL_hK4fp2p5lRb0aS2ty7vujyKCpS', 'Udang Mayonaise', 55000, 'Hidangan seafood yang terdiri dari udang yang digoreng dengan tepung lalu dilumuri dengan saus mayonaise sehingga cita rasa gurih dan renyah yang akan terasa di lidah.', 'Seafood'),
(3, 'https://drive.google.com/uc?export=view&id=1Sbb33BBInJgIzWYfj_z77tDqm_sbpa2L', 'Cireng', 15000, 'Makanan cemilan yang dibuat dengan menggunakan tepung kanji atau tapioka yang digoreng dan diberikan bumbu sebagai pendampingnya.', 'Appetizer'),
(4, 'https://drive.google.com/uc?export=view&id=17r1mFiBMI1IMMbyzbFVOXTuqpIM6ikwy', 'Serabi', 20000, 'Jajanan pasar tradisional dengan cita rasa Indonesia yang disajikan dengan menggunakan mayonnaise, keju, coklat dan berbagai macam topping lainnya.', 'Appetizer'),
(5, 'https://drive.google.com/uc?export=view&id=1sN1eVaxksZ_kNBJ5iE29UtH87IGDGngG', 'Kangkung Belacan', 25000, 'Kangkung yang ditumis dengan bumbu belacan atau terasi sehingga rasa yang dihasilkan akan gurih dan enak.', 'Vegetables'),
(6, 'https://drive.google.com/uc?export=view&id=1uLO0J7u5bEKSTNc2h5HGNQ5V_N74SweR', 'Buncis Saus Tiram', 26000, 'Hidangan buncis yang disajikan dengan menggunakan bumbu saus tiram yang membuat rasanya gurih dan juga enak.', 'Vegetables'),
(7, 'https://drive.google.com/uc?export=view&id=1yrCkew7YNv2YOtrBojGAz8jPsXmhebHu', 'Mango Sticky Rice', 20000, 'Makanan pencuci mulut yang menggunakan bahan yang meliputi ketan putih, mangga, dan santan. Ketiga rasa yang dipadukan akan terasa lezat dan dapat membuat ketagihan setelah mencobanya.', 'Desert'),
(8, 'https://drive.google.com/uc?export=view&id=1fC5N5MKMuWC4GkERIk8XYeAajhg44KIY', 'Waffle', 23000, 'Makanan pencuci mulut yang disajikan dengan topping coklat, stroberi, madu, sirupm es krim, dan masih banyak lagi.', 'Desert'),
(9, 'https://drive.google.com/uc?export=view&id=1D0BIOAHTZYz2UDfxC-vngxQUXjSlAxj_', 'Blue Ocean', 13000, 'Minuman segar perpaduan antara sirup mangga dan juga soda biru dengan selasih sebagai pendukungnya. Minuman ini akan memberikan kesegaran dalam mulut bagai yang meminumnya.', 'Drinks'),
(10, 'https://drive.google.com/uc?export=view&id=1xo7_-jVi4UzAYc7ohyNEVFUkOncPXfYM', 'Caramel Macchiato', 16000, 'Minuman kopi yang terbuat dari espresso yang dicampur dengan sirup vanilla yang creamy dan ditambahkan dengan topping susu dan sirup caramel. Bisa disajikan dalam keadaan panas ataupun dingin.', 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(1000) NOT NULL,
  `LastName` varchar(1000) DEFAULT NULL,
  `Email` varchar(1000) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Date` date NOT NULL,
  `Gender` varchar(1000) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`UserID`, `FirstName`, `LastName`, `Email`, `Password`, `Date`, `Gender`, `role_id`) VALUES
(1, 'Andi', 'Budi', 'andi@gmail.com', '202cb962ac59075b964b07152d234b70', '2001-05-01', 'Male', 1),
(2, 'Kaleb', 'Juliu', 'kaleb@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2001-01-01', 'Male', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductsId`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
