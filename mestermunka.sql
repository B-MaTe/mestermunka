-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 01:14 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mestermunka`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userID` text NOT NULL,
  `productID` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `sku` varchar(64) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(16) CHARACTER SET utf8 NOT NULL,
  `color` varchar(64) CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userID`, `productID`, `name`, `sku`, `price`, `size`, `color`, `quantity`) VALUES
(174, '2021052760affc4a64e19', 3, 'Vintage Inspired Classic', 'vintage-inspired-classic', 150000, 'XS', 'BLACK', 3),
(175, '2021052760affc4a64e19', 8, 'Pieces Metallic Printed', 'pieces-metallic-printed', 37500, 'XXS', 'WHITE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter`) VALUES
(6);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userID` text NOT NULL,
  `surname` varchar(64) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(64) CHARACTER SET utf8 NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `email` tinytext CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `postcode` varchar(32) CHARACTER SET utf8 NOT NULL,
  `country` varchar(32) CHARACTER SET utf8 NOT NULL,
  `county` varchar(64) CHARACTER SET utf8 NOT NULL,
  `city` varchar(64) CHARACTER SET utf8 NOT NULL,
  `streetHouseNumber` varchar(64) CHARACTER SET utf8 NOT NULL,
  `optional` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userID`, `surname`, `firstname`, `username`, `email`, `password`, `postcode`, `country`, `county`, `city`, `streetHouseNumber`, `optional`) VALUES
(3, '2021052660aeb5ae7066d', 'Kovacs', 'Ferenc', 'ferenc', 'aks@gmail.com', '$2y$10$5WNQiTd2Vny4tfJpuBHegOvKxY2GtKCUwvedqHi9IZ2LYYRuq5W3W', '6800', 'Hungary', 'Pest', 'Hódmezővásárhely', 'Zrínyi utca', ''),
(4, '2021052760af976c07be9', 'Molnar', 'Csilla', 'csilka', 'csilka@gmail.com', '$2y$10$BbFg3kNem86Dk9PQ4kV25OwkkNL1DaYwWfrUGamqTYaik4HZiPnWG', '5946', 'Hungary', 'Bekes', 'Bekessamson', 'karcsu bela 10', ''),
(5, '2021052760affc4a64e19', 'Balázs', 'Máté', 'bmate', 'mate1@gmail.com', '$2y$10$dZ3vl2j440raIhvPF4JhbudfI609mO8mc9w8gcd5HdyFmTS3OwRUO', '6800', 'Hungary', 'Csongrad-Csanad', 'Hódmezővásárhely', 'Zrínyi utca', ' 63.');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `order` tinyint(4) NOT NULL,
  `module` varchar(64) CHARACTER SET utf8 NOT NULL,
  `title` varchar(64) NOT NULL,
  `url` text CHARACTER SET utf8 NOT NULL,
  `location` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `order`, `module`, `title`, `url`, `location`) VALUES
(1, 1, 'main', 'Főoldal', '', 'main,rightside'),
(2, 2, 'shop', 'Áruház', 'aruhaz', 'main'),
(3, 15, '', 'Facebook', 'https://www.facebook.com/', 'footer1,rightside'),
(4, 3, 'contact', 'Kapcsolat', 'kapcsolat', 'main,rightside,footer1'),
(5, 4, 'aboutUs', 'Rólunk', 'rolunk', 'main,rightside,footer1'),
(7, 6, 'singleItem', 'Termék', 'item/', ''),
(8, 5, 'cart', 'Kosár', 'kosar', 'main,rightside'),
(10, 6, 'login', 'Bejelentkezés', 'bejelentkezes', 'main'),
(11, 6, 'register', 'Regisztrálás', 'regisztralas', ''),
(12, 9, 'logout', 'Kijelentkezés', 'logout', 'main,rightside'),
(13, 0, 'checkout', 'Kicsekkolás', 'kicsekkolas', ''),
(14, 7, 'profile', 'Profil', 'profil', 'main,rightside');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `sku` text CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(64) CHARACTER SET utf8 NOT NULL,
  `color` varchar(64) CHARACTER SET utf8 NOT NULL,
  `size` varchar(16) CHARACTER SET utf8 NOT NULL,
  `discount` int(11) NOT NULL,
  `discountTime` date NOT NULL,
  `description` text NOT NULL,
  `product_status` bit(1) NOT NULL,
  `pictures` text CHARACTER SET utf8 NOT NULL,
  `sold` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `rating` bigint(20) NOT NULL,
  `countOfRatings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `sku`, `price`, `category`, `color`, `size`, `discount`, `discountTime`, `description`, `product_status`, `pictures`, `sold`, `stock`, `rating`, `countOfRatings`) VALUES
(1, 'Esprit Ruffle Shirt', 'esprit-ruffle-shirt', 25000, 'women', 'white,blue,black', 'm,s,l,xxl', 17000, '2021-02-12', 'Sed molestie mi diam, id dapibus tellus dictum non. Phasellus ut rutrum elit, et sodales tellus. Phasellus aliquet erat libero, at condimentum turpis molestie eu. Mauris ut dapibus purus, quis aliquam purus. Ut a lorem at risus varius fermentum. Morbi mollis purus a elit pulvinar, sit amet lacinia orci consectetur. Pellentesque ullamcorper luctus justo, feugiat aliquet odio placerat ut. Curabitur quis finibus nibh. Suspendisse potenti.', b'1', '1', 5, 7, 7, 2),
(2, 'Herschel supply', 'herschel-supply', 50000, 'women', 'white,red', 's,m,l', 0, '0000-00-00', 'Maecenas ultrices tellus orci, id viverra sapien egestas maximus. Pellentesque auctor non elit a pharetra. Praesent in facilisis purus, sit amet feugiat ex. Suspendisse bibendum leo sit amet dui auctor, vitae vulputate magna mollis. Integer sed auctor felis, vitae semper eros. Cras et justo ut erat sagittis interdum. Nulla sed interdum leo. Quisque eget accumsan massa, sed elementum massa. Integer mollis enim nulla, et faucibus justo lacinia non.', b'1', '1', 8, 25, 9, 5),
(3, 'Only Check Trouser', 'only-check-trouser', 50000, 'man', 'blue,yellow,orange', 'l,xxl', 0, '0000-00-00', 'Nagyon szep kek ing', b'1', '1', 125, 243, 9, 4),
(4, 'Vintage Inspired Classic', 'vintage-inspired-classic', 150000, 'watches', 'black,grey', 'xs,s,m,l,xl,xxl', 120000, '2021-01-30', 'Suspendisse erat mi, eleifend eget accumsan at, efficitur quis velit. Sed mollis dui dolor, eget euismod nulla imperdiet et. Donec vulputate urna eget dignissim accumsan. Nunc porttitor neque id dignissim cursus. In hac habitasse platea dictumst. Phasellus at placerat erat. Nulla tempor tortor lacus, et molestie mi luctus ut. Mauris id odio in massa rutrum tempus quis non purus. Mauris accumsan convallis tortor non dictum. Fusce varius nulla at est finibus, sit amet sollicitudin lorem dapibus. Phasellus ut tempor dui, eget vehicula velit. Morbi nulla diam, sagittis congue metus a, accumsan ultrices orci.', b'1', '2', 15, -2, 14, 6),
(5, 'Classic Trench Coat', 'classic-trench-coat', 75000, 'women', 'green,black,yellow', 'm,l,xl,xxl', 65000, '2021-05-14', 'Subidubidu, gyonyoru, csak kva draga', b'1', '1', 16, 14, 9, 2),
(6, 'Front Pocket Jumper', 'front-pocket-jumper', 14000, 'women', 'grey,black,blue', 'xxs,l', 0, '0000-00-00', 'Kerlek vedd meg, csorok vagyunk', b'1', '1', 4, 21, 10, 2),
(7, 'Shirt in Stretch Cotton', 'shirt-in-stretch-cotton', 40000, 'women', 'grey,yellow,black', 'm,l', 37000, '2021-02-22', 'sanyika elment a boltba, aztan hazajott', b'1', '1', 2, 10, 10, 6),
(8, 'Pieces Metallic Printed', 'pieces-metallic-printed', 42000, 'women', 'white,black', 'xxs,xl', 37500, '2021-08-13', 'Nagyon occo, vegyed mogfele, vagy kes csuszik borda koze', b'1', '1', 9, 87, 13, 9),
(9, 'Converse All Star Hi Plimsolls', 'converse-all-star-hi-plimsolls', 17500, 'shoes', 'black,white', 'xs,m,xxl', 0, '0000-00-00', 'Konzerz, vegyed, egyed', b'1', '1', 121, 25, 10, 5),
(12, 'Apple óra', 'apple-ora', 215000, 'watches', 'black,white,yellow', 'xs,m,xxl', 175000, '2021-09-23', 'A híres nevezetes Apple óra megjelent boltunkban! Az új intel processzor villámgyors sebességet biztosít. A 4200-miliamperes akkumlátor többnapos használatot engedélyez a vevő számára.', b'1', '4', 1, 99, 6, 2),
(14, 'Nike Sneeaker', 'nike-sneeaker', 370000, 'shoes', 'red,black,yellow', '39,40,42.5,46,47', 0, '0000-00-00', '', b'1', '4', 15, 0, 0, 0),
(15, 'Nike AirMax', 'nike-airmax', 42000, 'shoes', 'black,pink,white,yellow,red,brown', '37,38,39,40,41,4', 29500, '2021-06-06', '', b'1', '5', 0, 250, 0, 0),
(16, 'FC Barcelona 2020-2021 Stadium idegenbeli mez', 'fc-barcelona-2020-2021-stadium-idegenbeli-mez', 80500, 'man', 'black', 's,m,l,xl', 0, '0000-00-00', 'Képviseld a csapatodat az FC Barcelona Stadium idegenbeli mezben. Kiválóan szellőző anyagból készült, amely elvezeti az izzadságot a bőrödről, így hűs viseletet biztosít a pályán vagy a csapatodnak szurkolva a lelátón. Ez a termék 100%-ban újrahasznosított poliészter felhasználásával készült.', b'1', '10', 0, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `userID` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `userID`, `description`, `rating`, `itemID`) VALUES
(16, 'mate', '2021052060a667676d01f', 'Velemenyem szerint megeri megvenni, igaz, hogy nagyon draga de kemenyen dzsilo leszel vele.', 5, 3),
(17, 'ferenc', '2021052660aeb5ae7066d', 'Elso nap leejtettem a foldre, es az allitolagos kristaly teljesen megsemmisult...', 1, 3),
(18, 'mate', '2021052060a667676d01f', 'asd', 5, 2),
(23, 'csilka', '2021052760af976c07be9', 'szar', 4, 3),
(24, 'mate', '2021052060a667676d01f', 'a', 3, 8),
(25, 'mate', '2021052060a667676d01f', 'tokjo', 4, 3),
(26, 'bmate', '2021052760affc4a64e19', 'Nagyon meno lettem vele, mivel Apple.', 5, 12),
(27, 'ferenc', '2021052660aeb5ae7066d', 'Nagyon draga, mellesleg lassu is.', 1, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
