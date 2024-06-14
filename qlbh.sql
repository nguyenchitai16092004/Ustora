-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 03:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbh`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_name`, `password`, `name`, `role`, `email`, `img`) VALUES
(1, 'taikhoan1', '123', 'TK', 0, 'TK@gmail.com.vn', 'images.jpg'),
(2, 'John', '456', 'John', 0, 'John@gmail.com.vn', 'images.jpg'),
(3, 'admin', '123', NULL, 1, NULL, 'istockphoto-1192884194-170667a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(5) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_quantity` int(11) DEFAULT NULL,
  `brand_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_quantity`, `brand_status`) VALUES
(1, 'Nokia', 20, 0),
(2, 'Iphone', 10, 1),
(3, 'Samsung', 50, 1),
(10, 'Nokia', 1000, 1),
(11, 'Xiaomi', 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `prd_id` int(5) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_comment_admin`
--

CREATE TABLE `email_comment_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(765) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prd_id` int(5) NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `image` char(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `brand_id` int(5) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `MSP` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prd_id`, `prd_name`, `image`, `price`, `quantity`, `description`, `brand_id`, `status`, `MSP`) VALUES
(74, 'Iphone X', 'iphone_x.jpg', '5000000', 5, 'Sản phẩm đẹp', 2, 0, 'IPPD09'),
(75, 'Nokia 1080', 'nokia_105.jpg', '200000', 50, 'Sản phẩm chất lượng', 1, 0, 'NKWQDXW6'),
(77, 'iPhone 15 Pro', 'iphone_15_pro.jpg', '260000000', 5, 'iPhone 15 Pro đã chính thức trở thành một trong số các thành viên của các dòng iPhone kể từ năm 2023. Dòng sản phẩm này đã mang đến rất nhiều điểm mới so với tiền nhiệm, đặc biệt là nằm ở phiên bản màu Titan tự nhiên của bản Pro và Pro Max.', 2, 0, ''),
(78, 'iPhone 15 Pro', 'iphone_15_pro.jpg', '300000000', 5, 'iPhone 15 Pro đã chính thức trở thành một trong số các thành viên của các dòng iPhone kể từ năm 2023. Dòng sản phẩm này đã mang đến rất nhiều điểm mới so với tiền nhiệm, đặc biệt là nằm ở phiên bản màu Titan tự nhiên của bản Pro và Pro Max.', 2, 0, 'IPH5MBDQ'),
(80, 'Samsung Galaxy Fold3| Flip3 5G', 'samsunggalaxyzfold3-20210920214713.jpg', '8000000', 50, 'Sản phẩm chất lượng', 3, 0, 'SS39SA80'),
(81, 'Samsung S23 Utra', 'samsung-galaxy-s23-600x600.jpg', '8900000', 150, 'Samsung Galaxy S23 5G 128GB chắc hẳn không còn là cái tên quá xa lạ đối với các tín đồ công nghệ hiện nay, được xem là một trong những gương mặt chủ chốt đến từ nhà Samsung với cấu hình mạnh mẽ bậc nhất, camera trứ danh hàng đầu cùng lối hoàn thiện vô cùng sang trọng và hiện đại.', 3, 0, 'SSYUAY5Q'),
(82, 'Iphone X', 'iphone_x.jpg', '80', 20, 'Sản phẩm đẹp', 2, 0, ''),
(83, 'Iphone 11 Pro', 'iphone_11_pro.jpg', '870000000', 5, 'Sản phẩm đẹp', 2, 0, 'IPK0JH12'),
(84, 'Iphone 14', 'iphone_14.jpg', '1000000', 5, 'Sản phẩm chất lượng', 2, 0, 'IPA8GQBC'),
(85, 'iPhone 11 Pro 256GB (Likenew)', 'iphone_11_pro.jpg', '200000000', 2, ' iPhone 11 Pro 256GB (Likenew)   Bộ sản phẩm bao gồm  Thân máy, Cây lấy sim, Túi giấy cao cấp Di Động Việt Bảo hành  Độc quyền tại Di Động Việt: Xài đã không thích thì trả trong 7 ngày và Bảo hành Hư lỗi - Đổi mới trong vòng 33 ngày. Bảo hành pin trọn đời, không giới hạn số lần. Bảo hành 6 tháng.  iPhone 11 Pro 256GB Cũ là sản phẩm được thu lại từ khách bán lại (thu cũ), có nguồn gốc rõ ràng. Máy có thể đã qua bảo hành hãng hoặc sửa chữa thay thế linh kiện để đảm bảo sự ổn định cho khách khi dùn', 2, 0, 'IP8HD6Q4'),
(86, 'Iphone X', 'iphone_x.jpg', '800', 23, 'Sản phẩm chất lượng', 2, 0, ''),
(87, 'Iphone X', 'iphone_x.jpg', '900', 23, 'Sản phẩm chất lượng', 2, 0, ''),
(88, 'Iphone X 64 GB', 'iphone_x.jpg', '70', 23, 'Sản phẩm chất lượng', 2, 0, ''),
(89, 'Iphone SE', 'iphone_se.jpg', '0', 20, 'Sản phẩm chất lượng', 2, 0, 'IPA34WHS'),
(90, 'Iphone SE', '', '1000000', 20, 'Sản phẩm chất lượng', 2, 0, 'IP079X8D'),
(91, 'Iphone SE', 'iphone_se.jpg', '20000', 20, 'Sản phẩm chất lượng', 2, 0, 'IPF6HROB'),
(92, 'Iphone SE', 'iphone_se.jpg', '20', 20, 'Sản phẩm chất lượng', 2, 0, ''),
(93, 'Iphone SE', 'iphone_se.jpg', '20', 20, 'Sản phẩm chất lượng', 2, 0, ''),
(94, 'Iphone SE', 'iphone_se.jpg', '20', 20, 'Sản phẩm chất lượng', 2, 0, ''),
(95, 'Iphone X', 'iphone_x.jpg', '20', 20, 'Sản phẩm chất lượng', 2, 0, ''),
(96, 'Iphone X', 'iphone_x.jpg', '20', 20, 'Sản phẩm chất lượng', 2, 0, 'IPTZ1TCF'),
(97, 'Iphone X', 'iphone_x.jpg', '8', 20, 'Sản phẩm chất lượng', 2, 0, 'IPKH06TQ'),
(98, 'Iphone X', 'iphone_x.jpg', '20.000', 20, 'Sản phẩm chất lượng', 2, 0, ''),
(99, 'Iphone X', 'iphone_x.jpg', '8.000.005', 20, 'Sản phẩm chất lượng', 2, 1, 'IPJFMAZ3'),
(100, 'Iphone X', '', '2.000.000', 20, 'Sản phẩm chất lượng', 2, 0, 'IP1UH03G'),
(101, 'iPhone 11 Pro 256GB (Likenew)', 'iphone_11_pro.jpg', '800.000.000', 20, ' iPhone 11 Pro 256GB (Likenew)   Bộ sản phẩm bao gồm  Thân máy, Cây lấy sim, Túi giấy cao cấp Di Động Việt Bảo hành  Độc quyền tại Di Động Việt: Xài đã không thích thì trả trong 7 ngày và Bảo hành Hư lỗi - Đổi mới trong vòng 33 ngày. Bảo hành pin trọn đời, không giới hạn số lần. Bảo hành 6 tháng.  iPhone 11 Pro 256GB Cũ là sản phẩm được thu lại từ khách bán lại (thu cũ), có nguồn gốc rõ ràng. Máy có thể đã qua bảo hành hãng hoặc sửa chữa thay thế linh kiện để đảm bảo sự ổn định cho khách khi dùn', 2, 0, 'IPZDY640'),
(102, 'Iphone X', 'iphone_x.jpg', '40.000.00', 50, 'Sản phẩm chất lượng', 2, 1, 'IPYVHLR4'),
(103, 'Iphone SE', 'iphone_se.jpg', '8.000.000', 20, 'Sản phẩm chất lượng', 2, 0, 'IPEM8SYC'),
(104, 'Iphone SE', 'iphone_se.jpg', '10.000.000', 20, 'Sản phẩm chất lượng', 2, 0, 'IPNMT0YW'),
(105, 'iPhone 11 Pro 256GB (Likenew)', 'iphone_11_pro.jpg', '8.000.000', 8, ' iPhone 11 Pro 256GB (Likenew)   Bộ sản phẩm bao gồm  Thân máy, Cây lấy sim, Túi giấy cao cấp Di Động Việt Bảo hành  Độc quyền tại Di Động Việt: Xài đã không thích thì trả trong 7 ngày và Bảo hành Hư lỗi - Đổi mới trong vòng 33 ngày. Bảo hành pin trọn đời, không giới hạn số lần. Bảo hành 6 tháng.  iPhone 11 Pro 256GB Cũ là sản phẩm được thu lại từ khách bán lại (thu cũ), có nguồn gốc rõ ràng. Máy có thể đã qua bảo hành hãng hoặc sửa chữa thay thế linh kiện để đảm bảo sự ổn định cho khách khi dùn', 2, 0, 'IPWQN3J5'),
(106, 'iPhone 11 Pro 256GB (Likenew)', 'iphone_11_pro.jpg', '8.000.000', 8, ' iPhone 11 Pro 256GB (Likenew)   Bộ sản phẩm bao gồm  Thân máy, Cây lấy sim, Túi giấy cao cấp Di Động Việt Bảo hành  Độc quyền tại Di Động Việt: Xài đã không thích thì trả trong 7 ngày và Bảo hành Hư lỗi - Đổi mới trong vòng 33 ngày. Bảo hành pin trọn đời, không giới hạn số lần. Bảo hành 6 tháng.  iPhone 11 Pro 256GB Cũ là sản phẩm được thu lại từ khách bán lại (thu cũ), có nguồn gốc rõ ràng. Máy có thể đã qua bảo hành hãng hoặc sửa chữa thay thế linh kiện để đảm bảo sự ổn định cho khách khi dùn', 2, 0, 'IP5W4LHN'),
(107, 'Iphone 14', 'iphone_14.jpg', '15.000.000', 20, 'Sản phẩm đẹp', 2, 0, 'IPP596G3'),
(108, 'Iphone X', 'iphone_x.jpg', '8.000.000', 15, 'Sản phẩm chất lượng', 2, 1, 'IP9PL5QS'),
(109, 'Iphone 11 Pro', 'iphone_11_pro.jpg', '15.000.000', 50, 'Sản phẩm chất lượng', 2, 0, 'IP6QFG7I'),
(110, 'SamSung', 'samsung-galaxy-s23-600x600.jpg', '8.000.000', 5, 'Sản phẩm chất lượng', 3, 0, 'SS0JTP3A'),
(111, 'Iphone X', 'iphone_x.jpg', '15.000.000', 20, 'Sản phẩm chất lượng', 2, 1, 'IPISGH9W'),
(112, 'Iphone X', 'iphone_x.jpg', '8.000.000', 8, 'Sản phẩm đẹp', 2, 1, 'IPX2AGE1'),
(113, 'Iphone 15', 'iphone_15_pro.jpg', '20.000.000', 20, 'Sản phẩm chất lượng', 2, 0, 'IP36C6ML');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prd_id` (`prd_id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `email_comment_admin`
--
ALTER TABLE `email_comment_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_comment_admin`
--
ALTER TABLE `email_comment_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`prd_id`) REFERENCES `products` (`prd_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `account` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
