-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 19, 2018 lúc 07:37 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cakedemo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `subtotal` decimal(11,0) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `new` float(10,0) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `new`, `unit_price`, `promotion_price`, `image`, `unit`, `created_at`, `updated_at`) VALUES
(2, 'Bánh Crepe Chocolate', 6, 'bánh choclate thơm ngon ', NULL, 180000, 16000, '/img/uploads/crepe-chocolate.jpg', 'hộp', '2016-10-26 00:00:00', '2016-10-24 22:11:00'),
(3, 'Bánh Crepe Sầu riêng - Chuối', 5, 'Bánh crepe sầu riêng béo ngậy', 1, 150000, 1200, '/img/uploads/ crepedau.jpg', 'hộp', '2018-03-14 00:00:00', '2016-10-24 22:11:00'),
(4, 'Bánh Crepe Đào', 5, '', 1, 160000, 0, '/img/uploads/crepe-dao.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'Bánh Crepe Dâu', 5, 'ngon', 1, 160000, 0, '/img/uploads/ crepedau.jpg', 'hộp', '2018-03-07 17:00:00', '2016-10-24 22:11:00'),
(6, 'Bánh Crepe Pháp', 5, '', 1, 200000, 180000, '/img/uploads/crepe-phap.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'Bánh Crepe Táo', 5, '', 1, 160000, 0, '/img/uploads/crepe-tao.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'Bánh Crepe Trà xanh', 5, '', 1, 160000, 150000, '/img/uploads/crepe-traxanh.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'Bánh Crepe Sầu riêng và Dứa', 5, '', 1, 160000, 150000, '/img/uploads/saurieng-dua.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(11, 'Bánh Gato Trái cây Việt Quất', 3, '', 1, 250000, 0, '/img/uploads/544bc48782741.png', 'cái', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(12, 'Bánh sinh nhật rau câu trái cây', 3, '', 1, 200000, 180000, '/img/uploads/210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'cái', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'Bánh kem Chocolate Dâu', 3, '', 1, 300000, 280000, '/img/uploads/banh kem sinh nhat.jpg', 'cái', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'Bánh kem Dâu III', 3, '', 1, 300000, 280000, '/img/uploads/Banh-kem (6).jpg', 'cái', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'Bánh kem Dâu I', 3, 'ngon bổ rẻ', 1, 350000, 320, '/img/uploads/banhkem-dau.jpg', 'cái', '2018-03-08 00:00:00', '2016-10-27 02:24:00'),
(16, 'Bánh trái cây II', 3, '', 1, 150000, 120000, '/img/uploads/banhtraicay.jpg', 'hộp', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'Apple Cake', 3, '', 1, 250000, 240000, '/img/uploads/Fruit-Cake_7979.jpg', 'cai', '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'Bánh ngọt nhân cream táo', 2, '', 1, 180000, 0, '/img/uploads/20131108144733.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Bánh Chocolate Trái cây', 2, 'chocolate', 1, 150003, 0, '/img/uploads/chocolate-fruit636098975917921990.jpg', 'hộp', '2018-03-08 00:00:00', '2016-10-19 03:20:00'),
(20, 'Bánh Chocolate Trái cây II', 2, '', 1, 150000, 0, '/img/uploads/Fruit-Cake_7981.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Peach Cake', 2, '', 1, 160000, 150000, '/img/uploads/Peach-Cake_3294.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Bánh bông lan trứng muối I', 1, '', 1, 160000, 150000, '/img/uploads/banhbonglantrung.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'Bánh bông lan trứng muối II', 1, '', 0, 180000, 0, '/img/uploads/banhbonglantrungmuoi.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'Bánh French', 1, '', 1, 180000, 0, '/img/uploads/banh-man-thu-vi-nhat-1.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Bánh mì Australia', 1, '', 0, 80000, 70000, '/img/uploads/dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Bánh mặn thập cẩm', 1, '', 0, 50000, 0, '/img/uploads/Fruit-Cake.png', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Bánh Muffins trứng', 1, '', 1, 100000, 80000, '/img/uploads/maxresdefault.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Bánh Scone Peach Cake', 1, '', 1, 120000, 0, '/img/uploads/Peach-Cake_3300.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Bánh mì Loaf I', 1, '', 0, 100000, 100000, '/img/uploads/sli12.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Bánh kem Chocolate Dâu I', 4, '', 0, 380000, 350000, '/img/uploads/sli12.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Bánh kem Trái cây I', 4, '', 0, 380000, 350000, '/img/uploads/Fruit-Cake.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'Bánh kem Trái cây II', 4, '', 0, 380000, 350000, '/img/uploads/banhtraicay.jpg', 'cái', '2016-10-13 00:00:00', '2016-10-19 03:20:00'),
(33, 'Bánh kem Doraemon', 4, '', 0, 280000, 250000, '/img/uploads/p1392962167_banh74.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Bánh kem Caramen Pudding', 4, '', 0, 280000, 280000, '/img/uploads/Caramen-pudding636099031482099583.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Bánh kem Chocolate Fruit', 4, '', 0, 320000, 300000, '/img/uploads/chocolate-fruit636098975917921990.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Bánh kem Coffee Chocolate GH6', 4, '', 0, 320000, 300000, '/img/uploads/COFFE-CHOCOLATE636098977566220885.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Bánh kem Mango Mouse', 4, '', 0, 320000, 300000, '/img/uploads/mango-mousse-cake.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Bánh kem Matcha Mouse', 4, '', 0, 350000, 330000, '/img/uploads/MATCHA-MOUSSE.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Bánh kem Flower Fruit', 4, '', 0, 350000, 330000, '/img/uploads/flower-fruits636102461981788938.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Bánh kem Strawberry Delight', 4, '', 1, 350000, 330000, '/img/uploads/strawberry-delight636102445035635173.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Bánh kem Raspberry Delight', 4, '', 0, 350000, 330000, '/img/uploads/raspberry.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Beefy Pizza', 6, 'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella', 0, 150000, 130000, '/img/uploads/40819_food_pizza.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Hawaii Pizza', 6, 'Sốt cà chua, ham , dứa, pho mai mozzarella', 0, 120000, 120000, '/img/uploads/hawaiian paradise_large-900x900.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Smoke Chicken Pizza', 6, 'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.', 0, 120000, 120000, '/img/uploads/chicken black pepper_large-900x900.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Sausage Pizza', 6, 'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.', 0, 120000, 120000, '/img/uploads/pizza-miami.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Ocean Pizza', 6, 'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.', 0, 120000, 120000, '/img/uploads/seafood curry_large-900x900.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'All Meaty Pizza', 6, 'Ham, bacon, chorizo, pho mai mozzarella.', 0, 140000, 150000, '/img/uploads/all1).jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Tuna Pizza', 6, 'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella', 0, 140000, 150000, '/img/uploads/54eaf93713081_-_07-germany-tuna.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Bánh su kem nhân dừa', 7, '', 0, 120000, 100000, '/img/uploads/maxresdefault.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Bánh su kem sữa tươi', 7, '', 0, 120000, 100000, '/img/uploads/sukem.jpg', 'cái', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Bánh su kem sữa tươi chiên giòn', 7, '', 0, 150000, 160000, '/img/uploads/1434429117-banh-su-kem-chien-20.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Bánh su kem dâu sữa tươi', 7, '', 0, 150000, 0, '/img/uploads/sukemdau.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Bánh su kem bơ sữa tươi', 7, '', 0, 150000, 0, '/img/uploads/He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Bánh su kem nhân trái cây sữa tươi', 7, '', 0, 150000, 140000, '/img/uploads/foody-banh-su-que-635930347896369908.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Bánh su kem cà phê', 7, '', 0, 150000, 130000, '/img/uploads/banh-su-kem-ca-phe-1.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Bánh su kem phô mai', 7, '', 0, 150000, 0, '/img/uploads/50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Bánh su kem sữa tươi chocolate', 7, '', 0, 150000, 0, '/img/uploads/combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'hộp', '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Bánh Macaron Pháp', 2, 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.', 0, 200000, 180000, '/img/uploads/Macaron9.jpg', '', '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Bánh Tiramisu - Italia', 2, 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 0, 200000, 0, '/img/uploads/234.jpg', '', '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Bánh Táo - Mỹ', 2, 'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', 0, 200000, 190000, '/img/uploads/1234.jpg', '', '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Bánh Cupcake - Anh Quốc', 6, 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.', 0, 150000, 120000, '/img/uploads/cupcake.jpg', 'cái', NULL, NULL),
(62, 'Bánh Sachertorte', 6, 'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo. Sachertorte có vị ngọt nhẹ, gồm nhiều lớp bánh được làm từ ruột bánh mì và bánh sữa chocholate, xen lẫn giữa các lớp bánh là mứt mơ. Món bánh chocholate này nổi tiếng tới mức thành phố Vienna của Áo đã ấn định&nbsp;tổ chức một ngày Sachertorte quốc gia, vào 5/12 hằng năm', 0, 250000, 220000, '/img/uploads/111.jpg', 'cái', NULL, NULL),
(63, 'Bánh Crepe Sầu riêng', 5, 'bánh Crepe Sầu r Riêng nhà làm', 1, 150000, 120000, '/img/uploads/1430967449-pancake-sau-rieng-6.jpg', 'hộp', '2016-10-26 03:00:16', '2016-10-24 22:11:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(14) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `created` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `birthdate`, `created`, `updated_at`, `permission`) VALUES
(1, 'truong', 'admin1', '$2y$10$oihGmLxyv.Uh5wdsCYSlOuzIFTgQxI73aekRQqshKq2yzVkUOh6M2', 'a@gmail.com', '0978172195', '1995-02-17', '2017-12-12 09:16:11', '2017-12-12 09:16:11', 1),
(2, 'Trần Huyền Trang', 'Trangtrui', '$2y$10$Ach7aZRLC1w0ZhaZjkwyj.EIAk0UFHGmiEjCE/4SP0RSVikzIGTrm', 'truong170295@gmail.cod', '1234567893', '2007-12-25', '2017-12-25 09:55:41', '2017-12-25 09:55:41', 1),
(3, 'trangtrang', 'tranvantruong', '$2y$10$9jBhbvrL0jteMx1.C4xDYOxZced9Ahi6sFvqz2OkhCm1DElstn/uy', 'truong170295@gmail.com', '0978172195', '2007-12-26', '2017-12-26 08:48:22', '2017-12-26 08:48:22', 0),
(4, 'tran truong van', 'admin_truong', '$2y$10$zxshf9dd8XdZ7k9D.9SR9u43vk77F.GKRiuB03UmDMFYgtQdrh6M.', 'tr@gf.com', '01234567899', '0000-00-00', '2018-01-09 09:42:05', NULL, 0),
(5, 'trang huyen', 'huyen tran', '$2y$10$uy7nNpDVf8Oo/4bsvWkapOS1Xj.7gfnee44jKL6i6einjE5/tT1QK', 'ef@gmail.com', '0123', '2018-01-16', '2018-01-16 09:24:35', NULL, 1),
(6, 'fádfàd', 'dsfádf', '$2y$10$vwAQZpw/P9jX8qMldsb4vu0EWSfDmDbNPfhtmCyEJMs32X7S8w96q', 'aaaa@gmail.com', '0123456789', '2018-01-16', '2018-01-16 10:40:58', NULL, 1),
(7, 'tranvantruong', 'tranvantruong123', '$2y$10$xNAztQbxxSZXOpfX02BqX.vssm3DQGg3BBwINtKhFgVG5K2hLVZRq', 'tranvantruong.jvb@gmail.com', '0978172195', '2018-03-06', '2018-03-06 08:09:50', NULL, 1),
(8, 'tran van truong ', 'tranvantruong', '$2y$10$5aj3gaicYoYOuUAzG3C95.zbTjNkVfnJunipNmoXKekB3oMfS5Mci', 'abccbaabc@gmail.com', '0978172195', '2018-03-06', '2018-03-06 08:19:54', NULL, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_customer_2` (`id_customer`),
  ADD KEY `bills_ibfk_1` (`id_customer`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
