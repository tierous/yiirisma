-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 31 Jan 2016 pada 20.04
-- Versi Server: 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `address_book`
--

CREATE TABLE IF NOT EXISTS `address_book` (
  `address_book_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `entry_name` varchar(64) NOT NULL,
  `entry_address` text NOT NULL,
  `entry_province_id` int(11) NOT NULL,
  `entry_city_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `address_book`
--

INSERT INTO `address_book` (`address_book_id`, `customer_id`, `entry_name`, `entry_address`, `entry_province_id`, `entry_city_id`) VALUES
(1, 1, 'leonan', 'jalan sudirman 571', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `rule` varchar(25) NOT NULL,
  `last_login_time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `username`, `password`, `rule`, `last_login_time`) VALUES
(1, 'eco@co.com', 'eco', 'e434dd9c7f573fb03924e0c4d3d44d45', 'admin', '2016-01-30 18:18:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cart_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(64) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `date_added`, `date_modified`) VALUES
(1, 'Kemeja Pria', '2015-12-06 21:58:09', NULL),
(2, 'Celana Pria', '2015-12-06 21:58:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(64) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `province_id`) VALUES
(1, 'Bandung', 1),
(2, 'Cirebon', 1),
(3, 'Purwokerto', 2),
(4, 'Tegal', 2),
(5, 'Surabaya', 3),
(6, 'Solo', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`comment_id`, `product_id`, `customer_id`, `comment_text`, `date_added`, `date_modified`) VALUES
(1, 1, 1, 'test', NULL, NULL),
(2, 2, 1, 'test2', NULL, NULL),
(9, 1, 1, 'test3', NULL, NULL),
(10, 1, 1, 'test4', NULL, NULL),
(15, 1, 1, 'test5', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `confirm_payment`
--

CREATE TABLE IF NOT EXISTS `confirm_payment` (
  `confirm_payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_code` varchar(17) NOT NULL,
  `text_detail` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `confirm_payment`
--

INSERT INTO `confirm_payment` (`confirm_payment_id`, `order_id`, `order_code`, `text_detail`) VALUES
(1, 0, '1444334', 'test#test#BCA 0989-455-344 a.n Kuuga#12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_discount` float NOT NULL,
  `coupon_status` tinyint(1) DEFAULT NULL,
  `coupon_date_expire` datetime DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `coupon_used` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_code`, `coupon_discount`, `coupon_status`, `coupon_date_expire`, `date_added`, `date_modified`, `coupon_used`) VALUES
(1, 'A123', 0.5, 0, '2015-12-20 00:00:00', NULL, '2015-12-19 22:24:11', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(64) NOT NULL,
  `customer_dob` datetime NOT NULL,
  `customer_gender` tinyint(1) DEFAULT NULL,
  `customer_telephone` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_dob`, `customer_gender`, `customer_telephone`, `customer_email`, `customer_password`) VALUES
(1, 'Leonan', '1993-12-07 00:00:00', 1, '0812345678', 'leonan@leonan.net', '0e7fe324a54dcd9fdf16abdb7b56d548');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deal`
--

CREATE TABLE IF NOT EXISTS `deal` (
  `deal_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `deal_price` int(11) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `date_expire` datetime DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `deal`
--

INSERT INTO `deal` (`deal_id`, `product_id`, `deal_price`, `date_added`, `date_modified`, `date_expire`, `status`) VALUES
(2, 1, 250000, '2015-12-17 15:58:45', NULL, '2015-12-17 00:00:00', 1),
(3, 1, 65000, '2015-12-17 17:01:21', '2015-12-17 22:34:26', '2015-12-18 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(64) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `manufacturer_name`, `date_added`, `date_modified`) VALUES
(1, 'Zara', '2015-12-06 22:07:40', NULL),
(2, 'Channel', '2015-12-06 22:07:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(17) NOT NULL,
  `order_date` date NOT NULL,
  `address_book_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bank_transfer` varchar(50) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`order_id`, `order_code`, `order_date`, `address_book_id`, `customer_id`, `bank_transfer`, `payment_status`) VALUES
(1, '1534320', '2015-12-09', 1, 1, 'MANDIRI 9999-9877-009 a.n Kuuga', 0),
(2, '1033520', '2015-12-25', 1, 1, 'MANDIRI 9999-9877-009 a.n Kuuga', 0),
(3, '1345024', '2015-12-27', 1, 1, 'MANDIRI 9999-9877-009 a.n Kuuga', 0),
(4, '1525454', '2015-12-27', 1, 1, 'BRI 77090-8898-989 a.n Kuuga', 0),
(5, '1444334', '2016-01-21', 1, 1, 'BCA 0989-455-344 a.n Kuuga', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `id` int(11) NOT NULL,
  `order_code` varchar(13) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `order_code`, `order_id`, `product_id`, `quantity`, `subtotal`) VALUES
(1, '1534320', 1, 2, 3, 1500000),
(2, '1033520', 2, 1, 1, 750000),
(3, '1033520', 2, 2, 1, 500000),
(4, '1345024', 3, 1, 3, 2250000),
(5, '1345024', 3, 2, 1, 500000),
(6, '1525454', 4, 2, 1, 500000),
(7, '1444334', 5, 2, 1, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `product_model` varchar(12) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text,
  `product_image` varchar(255) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `manufacturer_id`, `product_name`, `product_model`, `product_price`, `product_description`, `product_image`, `date_added`, `date_modified`) VALUES
(1, 1, 1, 'Premium Black', 'Black8069', 750000, 'Premium black series from Zara for those who are looking for elegancy', 'Kemeja_Pria_Import_Premium_Zara_8069_Black_281213201219_ll.jpg', '2015-12-09 20:47:34', NULL),
(2, 2, 1, 'Chinos pant', 'chn-zara7089', 500000, 'Chinos Pant with many color choice for those who want to express themself in elegant way', '31445563980696959999151.jpg', '2015-12-09 20:49:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_attribute`
--

CREATE TABLE IF NOT EXISTS `product_attribute` (
  `product_attribute_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_option_id` int(11) NOT NULL,
  `option_value_id` int(11) NOT NULL,
  `option_value_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_attribute`
--

INSERT INTO `product_attribute` (`product_attribute_id`, `product_id`, `product_option_id`, `option_value_id`, `option_value_price`) VALUES
(1, 1, 1, 1, 50000),
(2, 2, 2, 4, -25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_option`
--

CREATE TABLE IF NOT EXISTS `product_option` (
  `product_option_id` int(11) NOT NULL,
  `product_option_name` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_option`
--

INSERT INTO `product_option` (`product_option_id`, `product_option_name`) VALUES
(1, 'Color'),
(2, 'Size');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_option_value`
--

CREATE TABLE IF NOT EXISTS `product_option_value` (
  `product_option_value_id` int(11) NOT NULL,
  `product_option_value_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_option_value`
--

INSERT INTO `product_option_value` (`product_option_value_id`, `product_option_value_name`) VALUES
(1, 'Blue'),
(2, 'Red'),
(3, 'Small'),
(4, 'Medium');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_option_value_to_product_option`
--

CREATE TABLE IF NOT EXISTS `product_option_value_to_product_option` (
  `product_option_value_to_product_option_id` int(11) NOT NULL,
  `product_option_id` int(11) NOT NULL,
  `product_option_value_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_option_value_to_product_option`
--

INSERT INTO `product_option_value_to_product_option` (`product_option_value_to_product_option_id`, `product_option_id`, `product_option_value_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Jawa Barat'),
(2, 'Jawa Tengah'),
(3, 'Jawa Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `support_ticket`
--

CREATE TABLE IF NOT EXISTS `support_ticket` (
  `support_ticket_id` int(11) NOT NULL,
  `support_ticket_code` varchar(17) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `issue` varchar(64) DEFAULT NULL,
  `question` text NOT NULL,
  `answer` text,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `support_ticket`
--

INSERT INTO `support_ticket` (`support_ticket_id`, `support_ticket_code`, `customer_id`, `issue`, `question`, `answer`, `date_added`, `date_modified`) VALUES
(1, '1529280', 1, 'acccount & security', 'test4', 'tsetttt', NULL, '2015-12-15 19:23:18'),
(2, '333502', 1, 'test2', 'test2', '', '2015-12-12 19:16:49', '2015-12-15 19:18:17'),
(3, '000330', 1, 'test3', 'test3', '', '2015-12-12 19:19:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`address_book_id`),
  ADD KEY `fk_address_book_customer1_idx` (`customer_id`),
  ADD KEY `fk_address_book_province1_idx` (`entry_province_id`),
  ADD KEY `fk_address_book_city1_idx` (`entry_city_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_cart_product1_idx` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `fk_city_province1_idx` (`province_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_review_product1_idx` (`product_id`),
  ADD KEY `fk_review_customer1_idx` (`customer_id`);

--
-- Indexes for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  ADD PRIMARY KEY (`confirm_payment_id`),
  ADD KEY `fk_confirm_payment_orders1_idx` (`order_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`deal_id`),
  ADD KEY `fk_deal_product1_idx` (`product_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_address_book1_idx` (`address_book_id`),
  ADD KEY `fk_order_customer1_idx` (`customer_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderdetail_product1_idx` (`product_id`),
  ADD KEY `fk_orderdetail_order1_idx` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_category_idx` (`category_id`),
  ADD KEY `fk_product_manufacturer1_idx` (`manufacturer_id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`product_attribute_id`),
  ADD KEY `fk_product_attribute_product_option1_idx` (`product_option_id`),
  ADD KEY `fk_product_attribute_product1_idx` (`product_id`);

--
-- Indexes for table `product_option`
--
ALTER TABLE `product_option`
  ADD PRIMARY KEY (`product_option_id`);

--
-- Indexes for table `product_option_value`
--
ALTER TABLE `product_option_value`
  ADD PRIMARY KEY (`product_option_value_id`);

--
-- Indexes for table `product_option_value_to_product_option`
--
ALTER TABLE `product_option_value_to_product_option`
  ADD PRIMARY KEY (`product_option_value_to_product_option_id`),
  ADD KEY `fk_product_option_value_to_product_option_product_option1_idx` (`product_option_id`),
  ADD KEY `fk_product_option_value_to_product_option_product_option_va_idx` (`product_option_value_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD PRIMARY KEY (`support_ticket_id`),
  ADD KEY `fk_support_ticket_customer1_idx` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_book`
--
ALTER TABLE `address_book`
  MODIFY `address_book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `confirm_payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `product_attribute_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_option`
--
ALTER TABLE `product_option`
  MODIFY `product_option_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_option_value`
--
ALTER TABLE `product_option_value`
  MODIFY `product_option_value_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_option_value_to_product_option`
--
ALTER TABLE `product_option_value_to_product_option`
  MODIFY `product_option_value_to_product_option_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `support_ticket`
--
ALTER TABLE `support_ticket`
  MODIFY `support_ticket_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `address_book`
--
ALTER TABLE `address_book`
  ADD CONSTRAINT `fk_address_book_city1` FOREIGN KEY (`entry_city_id`) REFERENCES `city` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_address_book_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_address_book_province1` FOREIGN KEY (`entry_province_id`) REFERENCES `province` (`province_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `deal`
--
ALTER TABLE `deal`
  ADD CONSTRAINT `fk_deal_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_address_book1` FOREIGN KEY (`address_book_id`) REFERENCES `address_book` (`address_book_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `fk_orderdetail_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orderdetail_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_manufacturer1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `fk_product_attribute_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_attribute_product_option1` FOREIGN KEY (`product_option_id`) REFERENCES `product_option` (`product_option_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `product_option_value_to_product_option`
--
ALTER TABLE `product_option_value_to_product_option`
  ADD CONSTRAINT `fk_product_option_value_to_product_option_product_option1` FOREIGN KEY (`product_option_id`) REFERENCES `product_option` (`product_option_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_option_value_to_product_option_product_option_value1` FOREIGN KEY (`product_option_value_id`) REFERENCES `product_option_value` (`product_option_value_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD CONSTRAINT `fk_support_ticket_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
