-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 29, 2022 at 03:43 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `id_maker` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `price` float NOT NULL,
  `rating` int(5) NOT NULL,
  `img_src` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `id_maker`, `id_product`, `id_category`, `price`, `rating`, `img_src`) VALUES
(1, 3, 1, 3, 32000, 5, 'https://content.rozetka.com.ua/goods/images/big/163386254.jpg'),
(2, 6, 11, 1, 16100, 5, 'https://content.rozetka.com.ua/goods/images/big/119237603.jpg'),
(3, 4, 2, 3, 21399, 4, 'https://content1.rozetka.com.ua/goods/images/big/270525898.jpg'),
(4, 6, 3, 3, 49200, 5, 'https://content.rozetka.com.ua/goods/images/big/175329062.jpg'),
(5, 5, 4, 3, 32999, 5, 'https://content2.rozetka.com.ua/goods/images/big/232111828.jpg'),
(6, 5, 5, 3, 25309, 4, 'https://content1.rozetka.com.ua/goods/images/big/261223017.jpg'),
(7, 5, 6, 1, 12399, 5, 'https://content2.rozetka.com.ua/goods/images/big/242275294.jpg'),
(8, 5, 7, 1, 16332, 4, 'https://content1.rozetka.com.ua/goods/images/big/20131116.jpg'),
(9, 1, 10, 1, 29388, 5, 'https://content.rozetka.com.ua/goods/images/big/194433446.jpg'),
(11, 6, 12, 2, 21400, 5, 'https://content2.rozetka.com.ua/goods/images/big/37399329.jpg'),
(12, 1, 13, 2, 24399, 5, 'https://content2.rozetka.com.ua/goods/images/big/225755043.jpg'),
(13, 6, 14, 2, 34200, 5, 'https://content1.rozetka.com.ua/goods/images/big/221208453.jpg'),
(14, 1, 15, 2, 31002, 4, 'https://content1.rozetka.com.ua/goods/images/big/175376690.jpg'),
(15, 1, 16, 2, 32199, 5, 'https://content2.rozetka.com.ua/goods/images/big/263856168.jpg'),
(16, 6, 17, 2, 29310, 5, 'https://content2.rozetka.com.ua/goods/images/big/30872894.jpg'),
(29, 6, 18, 3, 264544, 5, 'https://content1.rozetka.com.ua/goods/images/big/271166202.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Планшети'),
(2, 'Смартфони'),
(3, 'Ноутбуки');

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE `maker` (
  `id` int(11) NOT NULL,
  `maker_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maker`
--

INSERT INTO `maker` (`id`, `maker_name`) VALUES
(1, 'Samsung'),
(2, 'AMD'),
(3, 'Acer'),
(4, 'ASUS'),
(5, 'Lenovo'),
(6, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `ram` int(3) NOT NULL,
  `screen_type` varchar(50) NOT NULL,
  `cpu` varchar(50) NOT NULL,
  `storage` int(5) NOT NULL,
  `graphic` varchar(50) NOT NULL,
  `camera` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `ram`, `screen_type`, `cpu`, `storage`, `graphic`, `camera`) VALUES
(1, 'Acer Aspire 7 A715-42G-R0VS', 16, '15.6\"(1920x1080) Full HD', 'AMD Ryzen 5 5500U (2.1 - 4.0 ГГц)', 1000, 'NVIDIA GeForce GTX 1650', 5),
(2, 'ASUS ExpertBook B1 B1500CEAE-BQ1663', 8, '15.6\" (1920x1080) Full HD', 'Intel Core i3-1115G4', 512, 'NVIDIA GeForce GTX 1050 TI', 6),
(3, 'Apple MacBook Air 13\" M1 2020', 8, '13.3\" (2560x1600) WQXGA', 'Apple M1', 256, 'Apple M1 Graphics', 12),
(4, 'Lenovo IdeaPad 3 14ITL6', 8, '15.6\" (1920x1080) Full HD', 'Intel Pentium Gold 7505 (2.0 - 3.5 ГГц)', 1500, 'Intel UHD Graphics', 6),
(5, 'Lenovo V14 G2 ALC', 32, '14\" (1920x1080) Full HD', 'AMD Ryzen 5 5500U (2.1 - 4.0 ГГц)', 2000, 'Intel UHD Graphics', 5),
(6, 'Lenovo Tab P11 Wi-Fi 64GB', 4, 'IPS (2000x1200)', 'Snapdragon M2', 64, 'Lenovo HD Graphics', 8),
(7, 'Lenovo Tab M8 HD 2/32 LTE', 2, 'IPS (1280x800)', 'Mediatek 1200U', 32, 'Media UHD', 5),
(10, 'Samsung Galaxy Tab S7 FE LTE 64 GB', 4, 'IPS (2560x1600)', 'Snapdragon M15', 64, 'Media UHD Graphics', 10),
(11, 'Apple iPad mini 5 Wi-Fi 64 Gb', 6, 'Retina (2048x1536)', 'Apple M1', 64, 'Apple M1 Graphics', 12),
(12, 'Apple iPhone 11 128GB White Slim Box', 4, 'IPS (1792 x 828)', 'Apple M1 Mobile', 128, 'Apple M1 Graphics', 12),
(13, 'Samsung Galaxy M52 5G 6/128GB', 6, '2400 x 1080 Super AMOLED Plus', 'Qualcomm Snapdragon 720G', 128, 'Qualcomm Adreno 618', 12),
(14, 'Apple iPhone 13 128GB', 4, 'OLED (2532x1170)', 'Apple Ax', 128, 'Apple Graphics', 13),
(15, 'Samsung Galaxy A32 4/128GB ', 4, 'Super AMOLED (2400 x 1080)', 'Qualcomm Snapdragon 120A', 128, 'Qualcomm Adreno 564', 24),
(16, 'Samsung Galaxy M33 5G 6/128GB', 6, ' TFT (2408x1080)', 'Snapdragon M15', 128, 'Media UHD Graphics 123', 13),
(17, 'Apple iPhone 12 128GB', 6, 'OLED (2532x1170)', 'Apple Ax', 128, 'Apple M1 Graphics', 12),
(18, 'Apple MacBook Pro 14\" M1 Max 8TB 2021', 64, '14.2\" (3024x1964) Liquid Retina XDR', 'Apple M1 Max', 8000, 'Apple M1 Max Graphics', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` int(30) NOT NULL,
  `role` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `tel`, `address`, `password`, `role`) VALUES
(1, 'Григорій Сковорода', 'grig@gmail.com', '+380682388246', 'Проспект Науки, 23', 1111, 'user'),
(2, 'Юрій Бойко', 'yuras@i.ua', '+380982314532', 'Вул. Коновальця, 12А', 1111, 'user'),
(3, 'Роман Мельничук', 'roma@gmail.com', '+380983245325', 'Вул. Л. Українки, 43Б', 1111, 'admin'),
(4, 'Roman Melnychuk', 'roman4iek03@gmail.com', '52352352', NULL, 1111, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `id_product`, `id_user`) VALUES
(1, 1, 1),
(2, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `id_product` varchar(11) NOT NULL,
  `order_sum` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `id_product`, `order_sum`, `id_user`) VALUES
(3, '12', '24399', 3),
(4, '12,13', '58599', 3),
(5, '13', '34200', 3),
(6, '7', '12399', 3),
(7, '7', '12399', 3),
(8, '2,7', '28499', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_maker` (`id_maker`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maker`
--
ALTER TABLE `maker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `catalog_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `catalog_ibfk_4` FOREIGN KEY (`id_maker`) REFERENCES `maker` (`id`);

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
