-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 31, 2023 lúc 05:16 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `restaurant`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `account` varchar(20) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `account`, `password`) VALUES
(1, 'qtv', '$2y$10$bqd1D1ci6QXRVj6jvnZDPOouRHgCLNz7LusRJY3Yf.Kz/Y8UQxjf2'),
(2, 'quan', '$2y$10$zAUTj99KNCL6gYI2k/K6rOqSvJYdKkPNz48GUYq4v12vBuILuvekC'),
(3, 'quan1', '$2y$10$wXMTAWYJQ8SgWBrJxAp5o.RWMZkNnVcT4Ya/UMURONI4Eq.SbH8tq'),
(4, 'quan2', '$2y$10$3Lkm0/aZdcAzQOnSvSrcpOtH7PfkN2T15lT6/9KkjqTnpBRKQmdri'),
(5, 'qqq', '$2y$10$NOrgwCJ21hGVR44ioVu8ou6G9ZGV2aOD8uc5254jEYVhCJG8D5XRi'),
(6, 'qq', '$2y$10$3CxoMUUg4NLHGeNKJZWJPOzJkA21PbnqtbKsr15ztnLJ.ViV1quk6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Starters');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_img` text DEFAULT NULL,
  `food_name` varchar(50) DEFAULT NULL,
  `food_price` double DEFAULT NULL CHECK (`food_price` > 0),
  `food_description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`food_id`, `food_img`, `food_name`, `food_price`, `food_description`, `category_id`) VALUES
(2, 'breakfast3.png', 'cơm xịn xò', 5.32, 'rất rất xịn xò ooooo', 3),
(4, 'breakfast1.png', 'Egg Frittata Muffins', 24, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 1),
(5, 'breakfast2.png', 'Breakfast Bars', 29, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 1),
(6, 'breakfast3.png', 'Breakfast Sandwiches', 19, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 1),
(7, 'lunch1.png', 'Crispy Chicken Breasts', 54, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 2),
(8, 'lunch2.png', 'Schezwan Noodles', 49, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 2),
(9, 'lunch3.png', 'New Lubina Marinada', 59, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 2),
(10, 'dinner1.png', 'Crispy Chicken Breasts', 54, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 3),
(11, 'dinner2.png', 'Schezwan Noodles', 49, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 3),
(12, 'dinner3.png', 'New Lubina Marinada', 59, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 3),
(13, 'starters1.png', 'Crispy Chicken Breasts', 54, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 4),
(14, 'starters2.png', 'Schezwan Noodles', 49, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 4),
(15, 'starters3.png', 'New Lubina Marinada', 59, 'Fresh toasted sourdough bread with olive oil and pomegranate.', 4),
(17, 'starters1.png', 'Cơm sườn thịt thơm', 5.99, 'Thịt thơm giòn tan', 3),
(22, 'rectangle-5.png', 'Cháo mẹ nấu', 4.23, 'Cháo nhiều thịt thơm ngon', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `guest_name` varchar(50) DEFAULT NULL,
  `guest_phone` varchar(15) DEFAULT NULL,
  `guest_email` varchar(100) DEFAULT NULL,
  `guest_address` text DEFAULT NULL,
  `guest_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `guest_pay` varchar(50) DEFAULT NULL,
  `guest_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `guest`
--

INSERT INTO `guest` (`guest_id`, `guest_name`, `guest_phone`, `guest_email`, `guest_address`, `guest_date`, `guest_pay`, `guest_total`) VALUES
(9, 'Minh Quân', '88888888888', 'nqwe@gmail.com', 'Hà Nội', '2023-12-18 02:28:37', 'Thanh toán khi nhận hàng', 564),
(10, 'Duy Long', '21213113', 'aaaaaaaaaa@gmail.com', 'HCM', '2023-12-18 02:57:44', 'Chuyển khoản', 377.22),
(14, '1', '1', '1@gmail.com', '1', '2023-12-18 03:21:25', 'Thanh toán khi nhận hàng', 3.22),
(15, 'Minh Quân', '4', '1@gmail.com', 'Hà Nội', '2023-12-18 16:48:13', 'Chuyển khoản', 171),
(16, 'Minh Quân', '8', '1@gmail.com', 'Hà Nội', '2023-12-18 17:00:11', 'Chuyển khoản', 90),
(17, '2', '1', 'aaaaaaaaaa@gmail.com', '1', '2023-12-18 17:06:38', 'Thanh toán khi nhận hàng', 210),
(18, '1', '23', 'nqwe@gmail.com', 'Hà Nội', '2023-12-18 17:40:40', 'Thanh toán khi nhận hàng', 43),
(19, '12', '34', 'aaaaaaaaaa@gmail.com', 'Hà Nội', '2023-12-18 17:41:48', 'Thanh toán khi nhận hàng', 156),
(20, '12', '2', '3@ccccccc', '44', '2023-12-18 17:44:13', 'Thanh toán khi nhận hàng', 48),
(21, 'ád', '213123', 'da@d', '11221', '2023-12-18 17:59:36', 'Thanh toán khi nhận hàng', 110),
(22, 'Minh Quân', '122', 'nqwe@gmail.com', 'Hà Nội', '2023-12-23 06:49:45', 'Chuyển khoản', 922),
(23, '', '', NULL, '', '2023-12-23 07:00:15', NULL, NULL),
(24, 'mmmmm', '99999', '1@gmail.com', 'mmmmm', '2023-12-23 14:32:52', 'Thanh toán khi nhận hàng', 51),
(25, '1', '1', '111', '1', '2023-12-23 16:23:24', 'Thanh toán khi nhận hàng', 171),
(26, '222', '2', '3', '4', '2023-12-23 16:30:15', 'Thanh toán khi nhận hàng', 13),
(27, '1', '1', '1', '1', '2023-12-23 16:31:47', 'Chuyển khoản', 23),
(28, '1', '1', '1', '1', '2023-12-23 16:33:55', 'Thanh toán khi nhận hàng', 48),
(30, '1', '111111111111111', '1@', '1', '2023-12-23 16:38:54', 'Thanh toán khi nhận hàng', 13),
(31, '1', '111111111111111', 'da@d', '111', '2023-12-23 16:40:08', 'Chuyển khoản', 13),
(32, '1', '1111111111111', '1@gmail.com', 'mmmmm', '2023-12-23 16:41:45', 'Chuyển khoản', 230),
(33, '12', '999999999999999', '1@gmail.com', '44', '2023-12-23 16:45:01', 'Thanh toán khi nhận hàng', 67.96),
(35, 'Minh Quân', '111111111111111', '1@gmail.com', 'HCM', '2023-12-29 04:14:50', 'Chuyển khoản', 306.58),
(36, '', '', NULL, '', '2023-12-29 04:18:07', NULL, NULL),
(37, 'Minh Quân', '23214123433333', '3@', '53', '2023-12-29 08:56:33', 'Thanh toán khi nhận hàng', 183.66),
(38, '', '', NULL, '', '2023-12-29 09:05:33', NULL, NULL),
(39, '1', '111111111111111', '1@', '1', '2023-12-29 12:48:35', 'Chuyển khoản', 25),
(40, '', '', NULL, '', '2023-12-31 10:20:06', NULL, NULL),
(41, '', '', NULL, '', '2023-12-31 14:32:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderfood`
--

CREATE TABLE `orderfood` (
  `orderFood_id` int(11) NOT NULL,
  `orderFood_quantity` int(11) DEFAULT NULL CHECK (`orderFood_quantity` > 0),
  `food_id` int(11) DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderfood`
--

INSERT INTO `orderfood` (`orderFood_id`, `orderFood_quantity`, `food_id`, `guest_id`) VALUES
(45, 4, 4, 36),
(54, 3, 2, 41),
(55, 7, 9, 41),
(56, 2, 14, 41);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Chỉ mục cho bảng `orderfood`
--
ALTER TABLE `orderfood`
  ADD PRIMARY KEY (`orderFood_id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `guest_id` (`guest_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `orderfood`
--
ALTER TABLE `orderfood`
  MODIFY `orderFood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Các ràng buộc cho bảng `orderfood`
--
ALTER TABLE `orderfood`
  ADD CONSTRAINT `orderfood_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`),
  ADD CONSTRAINT `orderfood_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
