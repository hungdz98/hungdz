-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 04, 2019 lúc 08:49 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Nike', 'abc', 1, NULL, '2019-07-03 15:03:35', '2019-07-04 05:55:13'),
(3, 0, 'Adidas', 'abc', 1, NULL, '2019-07-03 18:23:24', '2019-07-03 19:09:07'),
(4, 0, 'Puma', 'Puma được biết đến như một trong những thương hiệu giày hàng đầu thế giới luôn đổi mới và cập nhật xu hướng. Hãng nhanh chóng bắt tay với boy band hàng đầu làn sóng K-pop', 1, NULL, '2019-07-03 18:52:23', '2019-07-04 05:55:27'),
(5, 0, 'Converse', 'Converse 1970s là dòng giày được yêu thích nhất.\r\nKiểu dáng retro vintage huyền thoại.\r\nChất vải canvas dày dặn, form giày cứng cáp.', 1, NULL, '2019-07-03 19:12:01', '2019-07-04 05:55:02'),
(9, 5, 'Converse Classic', 'Converse Classic', 1, NULL, '2019-07-04 05:57:45', '2019-07-04 05:57:45'),
(10, 5, 'Converse 1970s', 'Converse 1970s', 1, NULL, '2019-07-04 05:58:11', '2019-07-04 06:00:28'),
(11, 3, 'Adidas Alphabounce', 'Đệm giữa dày và có độ nhạy cao. Xây dựng để cho sự thoải mái và linh hoạt cả ngày. Phần trên thoáng khí được thiết kế ôm chân để bất kỳ chuyển động đều được gia cố hoàn toàn.', 1, NULL, '2019-07-04 05:58:36', '2019-07-04 05:58:36'),
(12, 3, 'Adidas Yeezy', 'Adidas Yeezy', 1, NULL, '2019-07-04 05:59:06', '2019-07-04 05:59:06'),
(13, 3, 'Adidas Prophere', 'Adidas Prophere chính là cái tên đang được nhắc đến nhiều nhất trên các cộng đồng người chơi giày. Bộ đế và midsole được thiết kế vô cùng đặc biệt chắc chắn sẽ không thể tìm thấy ở bất kì phiên bản nào khác.\r\n\r\nChọn và mua ngay những mẫu giày Adidas Prophere nam nữ đang có mặt tại SaigonSneaker. Một trong những mẫu giày được thiết kế dành cho tương lai. Phong cách hiện đại, trẻ trung, sống động và vô cùng cá tính. Mang đậm sự kết hợp giữa thời trang đường phố streetwear và thời trang thể thao. Đệm midsole ấn tượng và không thể lẫn lộn, Ngoài ra, Prophere vẫn giữ những nguyên bản từ Adidas Original với các chi tiết góc cạnh mạnh mẽ. Chất liệu da lộn tổng hợp sang trọng và logo 3 sọc 3-Stripes nổi bật từ Adidas.', 1, NULL, '2019-07-04 05:59:41', '2019-07-04 06:00:55'),
(14, 3, 'Balenciaga', 'Balenciaga', 1, NULL, '2019-07-04 06:01:34', '2019-07-04 06:01:34'),
(15, 1, 'Nike Air', 'Nike Air', 1, NULL, '2019-07-04 06:02:24', '2019-07-04 06:02:24'),
(16, 1, 'Nike Jordan', 'Nike Jordan', 1, NULL, '2019-07-04 06:03:02', '2019-07-04 06:03:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `products_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '7143521562167334.PNG', '2019-07-03 15:22:14', '2019-07-03 15:22:14'),
(2, 1, '5989681562167334.PNG', '2019-07-03 15:22:15', '2019-07-03 15:22:15'),
(3, 1, '1083951562167335.PNG', '2019-07-03 15:22:15', '2019-07-03 15:22:15'),
(4, 2, '2387891562170134.PNG', '2019-07-03 16:08:54', '2019-07-03 16:08:54'),
(5, 2, '3644631562170134.PNG', '2019-07-03 16:08:55', '2019-07-03 16:08:55'),
(6, 2, '9211721562170135.PNG', '2019-07-03 16:08:55', '2019-07-03 16:08:55'),
(7, 3, '6578001562170509.PNG', '2019-07-03 16:15:10', '2019-07-03 16:15:10'),
(8, 3, '6334271562170510.PNG', '2019-07-03 16:15:10', '2019-07-03 16:15:10'),
(9, 3, '7354191562170510.PNG', '2019-07-03 16:15:11', '2019-07-03 16:15:11'),
(10, 4, '8449631562170829.PNG', '2019-07-03 16:20:29', '2019-07-03 16:20:29'),
(11, 4, '6765771562170829.PNG', '2019-07-03 16:20:30', '2019-07-03 16:20:30'),
(12, 4, '3132431562170830.PNG', '2019-07-03 16:20:31', '2019-07-03 16:20:31'),
(13, 5, '8902221562171143.PNG', '2019-07-03 16:25:43', '2019-07-03 16:25:43'),
(14, 5, '7499511562171143.PNG', '2019-07-03 16:25:44', '2019-07-03 16:25:44'),
(15, 5, '284241562171144.PNG', '2019-07-03 16:25:44', '2019-07-03 16:25:44'),
(16, 6, '7937631562171739.PNG', '2019-07-03 16:35:40', '2019-07-03 16:35:40'),
(17, 6, '8300021562171740.PNG', '2019-07-03 16:35:40', '2019-07-03 16:35:40'),
(18, 6, '996521562171740.PNG', '2019-07-03 16:35:41', '2019-07-03 16:35:41'),
(19, 7, '5275771562174445.PNG', '2019-07-03 17:20:45', '2019-07-03 17:20:45'),
(20, 7, '3032981562174445.PNG', '2019-07-03 17:20:46', '2019-07-03 17:20:46'),
(21, 7, '6290531562174446.PNG', '2019-07-03 17:20:46', '2019-07-03 17:20:46'),
(22, 8, '6759821562174861.PNG', '2019-07-03 17:27:42', '2019-07-03 17:27:42'),
(23, 8, '3374811562174862.PNG', '2019-07-03 17:27:42', '2019-07-03 17:27:42'),
(24, 8, '3864051562174862.PNG', '2019-07-03 17:27:43', '2019-07-03 17:27:43'),
(25, 9, '6863901562175283.PNG', '2019-07-03 17:34:43', '2019-07-03 17:34:43'),
(26, 9, '4883801562175283.PNG', '2019-07-03 17:34:44', '2019-07-03 17:34:44'),
(27, 9, '4694561562175284.PNG', '2019-07-03 17:34:44', '2019-07-03 17:34:44'),
(28, 10, '3771421562175645.PNG', '2019-07-03 17:40:46', '2019-07-03 17:40:46'),
(29, 10, '3652401562175646.PNG', '2019-07-03 17:40:46', '2019-07-03 17:40:46'),
(30, 10, '7235791562175646.PNG', '2019-07-03 17:40:46', '2019-07-03 17:40:46'),
(31, 11, '6525801562178557.PNG', '2019-07-03 18:29:18', '2019-07-03 18:29:18'),
(32, 11, '950731562178558.PNG', '2019-07-03 18:29:18', '2019-07-03 18:29:18'),
(33, 11, '1516991562178558.PNG', '2019-07-03 18:29:19', '2019-07-03 18:29:19'),
(34, 12, '4252881562178825.jpg', '2019-07-03 18:33:45', '2019-07-03 18:33:45'),
(35, 12, '6094041562178825.jpg', '2019-07-03 18:33:46', '2019-07-03 18:33:46'),
(36, 12, '5754441562178826.jpg', '2019-07-03 18:33:46', '2019-07-03 18:33:46'),
(37, 13, '8879641562178995.jpg', '2019-07-03 18:36:35', '2019-07-03 18:36:35'),
(38, 13, '7629921562178995.jpg', '2019-07-03 18:36:35', '2019-07-03 18:36:35'),
(39, 13, '7058521562178995.jpg', '2019-07-03 18:36:36', '2019-07-03 18:36:36'),
(40, 14, '417661562179362.jpg', '2019-07-03 18:42:42', '2019-07-03 18:42:42'),
(41, 14, '3312681562179363.jpg', '2019-07-03 18:42:43', '2019-07-03 18:42:43'),
(42, 14, '5882741562179363.jpg', '2019-07-03 18:42:44', '2019-07-03 18:42:44'),
(43, 14, '3142541562179364.jpg', '2019-07-03 18:42:44', '2019-07-03 18:42:44'),
(44, 15, '7625041562179508.jpg', '2019-07-03 18:45:08', '2019-07-03 18:45:08'),
(45, 15, '9453311562179509.jpg', '2019-07-03 18:45:09', '2019-07-03 18:45:09'),
(46, 15, '865231562179509.jpg', '2019-07-03 18:45:09', '2019-07-03 18:45:09'),
(47, 15, '9157541562179509.jpg', '2019-07-03 18:45:10', '2019-07-03 18:45:10'),
(48, 16, '6839781562179652.jpg', '2019-07-03 18:47:33', '2019-07-03 18:47:33'),
(49, 16, '8908141562179665.jpg', '2019-07-03 18:47:45', '2019-07-03 18:47:45'),
(50, 16, '1599971562179665.jpg', '2019-07-03 18:47:46', '2019-07-03 18:47:46'),
(51, 17, '9828371562179826.jpg', '2019-07-03 18:50:27', '2019-07-03 18:50:27'),
(52, 17, '3912861562179827.jpg', '2019-07-03 18:50:27', '2019-07-03 18:50:27'),
(53, 17, '7226121562179827.jpg', '2019-07-03 18:50:27', '2019-07-03 18:50:27'),
(54, 18, '6325601562180153.jpg', '2019-07-03 18:55:54', '2019-07-03 18:55:54'),
(55, 18, '9135181562180154.jpg', '2019-07-03 18:55:54', '2019-07-03 18:55:54'),
(56, 18, '3860961562180154.jpg', '2019-07-03 18:55:54', '2019-07-03 18:55:54'),
(57, 18, '7781441562180155.jpg', '2019-07-03 18:55:55', '2019-07-03 18:55:55'),
(58, 19, '9534131562180341.jpg', '2019-07-03 18:59:02', '2019-07-03 18:59:02'),
(59, 19, '1131871562180342.jpg', '2019-07-03 18:59:02', '2019-07-03 18:59:02'),
(60, 19, '3194091562180342.jpg', '2019-07-03 18:59:03', '2019-07-03 18:59:03'),
(61, 20, '5913441562181239.jpg', '2019-07-03 19:14:00', '2019-07-03 19:14:00'),
(62, 20, '9289061562181240.jpg', '2019-07-03 19:14:00', '2019-07-03 19:14:00'),
(63, 20, '381971562181240.jpg', '2019-07-03 19:14:01', '2019-07-03 19:14:01'),
(64, 21, '5751991562181367.jpg', '2019-07-03 19:16:07', '2019-07-03 19:16:07'),
(65, 21, '8526991562181367.jpg', '2019-07-03 19:16:07', '2019-07-03 19:16:07'),
(66, 21, '5922451562181368.jpg', '2019-07-03 19:16:08', '2019-07-03 19:16:08'),
(67, 21, '6158871562181368.jpg', '2019-07-03 19:16:08', '2019-07-03 19:16:08'),
(68, 22, '3709731562182498.jpg', '2019-07-03 19:34:58', '2019-07-03 19:34:58'),
(69, 22, '2665681562182659.jpg', '2019-07-03 19:37:40', '2019-07-03 19:37:40'),
(70, 22, '3785461562182660.jpg', '2019-07-03 19:37:40', '2019-07-03 19:37:40'),
(71, 23, '2048981562221163.jpg', '2019-07-04 06:19:24', '2019-07-04 06:19:24'),
(72, 23, '7476321562221164.jpg', '2019-07-04 06:19:24', '2019-07-04 06:19:24'),
(73, 23, '5572941562221164.jpg', '2019-07-04 06:19:24', '2019-07-04 06:19:24'),
(74, 24, '1550031562221390.jpg', '2019-07-04 06:23:11', '2019-07-04 06:23:11'),
(75, 24, '4993321562221391.jpg', '2019-07-04 06:23:11', '2019-07-04 06:23:11'),
(76, 24, '3789831562221391.jpg', '2019-07-04 06:23:11', '2019-07-04 06:23:11'),
(77, 25, '5202791562221749.PNG', '2019-07-04 06:29:09', '2019-07-04 06:29:09'),
(78, 25, '6093501562221749.PNG', '2019-07-04 06:29:10', '2019-07-04 06:29:10'),
(79, 25, '6070551562221750.PNG', '2019-07-04 06:29:10', '2019-07-04 06:29:10'),
(80, 26, '3574381562222048.PNG', '2019-07-04 06:34:08', '2019-07-04 06:34:08'),
(81, 26, '7731401562222048.PNG', '2019-07-04 06:34:09', '2019-07-04 06:34:09'),
(82, 26, '1241431562222049.PNG', '2019-07-04 06:34:09', '2019-07-04 06:34:09'),
(83, 27, '6778741562222574.jpg', '2019-07-04 06:42:54', '2019-07-04 06:42:54'),
(84, 27, '3239231562222574.jpg', '2019-07-04 06:42:55', '2019-07-04 06:42:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_17_142239_category', 1),
(4, '2019_06_17_142314_product', 1),
(5, '2019_06_18_103918_product_att', 1),
(6, '2019_06_18_125456_images', 1),
(7, '2019_06_30_201744_create_orders_table', 1),
(8, '2019_06_30_204235_create_orders_products_table', 1),
(9, '2019_07_03_033304_create_table_slider', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free',
  `grand_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `mobile`, `payment_method`, `shipping_charges`, `grand_total`, `order_status`, `created_at`, `updated_at`) VALUES
(2, 1, 'tronghungbo@gmail.com', 'hungdz', 'Hà Nội', '0362188088', 'COD', 'free', '29081520', 'New', '2019-07-03 15:57:46', '2019-07-03 15:57:46'),
(3, 1, 'tronghungbo@gmail.com', 'hungdz', 'Bắc Từ Niêm Hà Nội', '0362188088', 'COD', 'free', '5869000', 'New', '2019-07-04 05:45:15', '2019-07-04 05:45:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `product_name`, `product_color`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 2, '1-36', 'Nike Air Zoom Pegasus 36 Oil Grey', 'Oil Grey', '38', '2908152', 10, '2019-07-03 15:57:47', '2019-07-03 15:57:47'),
(2, 3, '2-39', 'Nike Air VaporMax Flyknit 3 Metallic Sliver', 'Metallic Sliver', '39', '5869000', 1, '2019-07-04 05:45:15', '2019-07-04 05:45:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productatt`
--

CREATE TABLE `productatt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productatt`
--

INSERT INTO `productatt` (`id`, `products_id`, `sku`, `size`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, '1-36', '36', 10, '2019-07-03 15:22:39', '2019-07-03 15:22:39'),
(2, 1, '1-37', '37', 10, '2019-07-03 15:22:46', '2019-07-03 15:22:46'),
(3, 1, '1-38', '38', 10, '2019-07-03 15:22:52', '2019-07-03 15:22:52'),
(4, 1, '1-39', '39', 10, '2019-07-03 15:22:57', '2019-07-03 15:22:57'),
(5, 1, '1-40', '40', 10, '2019-07-03 15:23:03', '2019-07-03 15:23:03'),
(6, 1, '1-41', '41', 10, '2019-07-03 15:23:09', '2019-07-03 15:23:09'),
(7, 2, '2-39', '39', 10, '2019-07-03 16:09:27', '2019-07-03 16:09:27'),
(8, 2, '2-40', '40', 10, '2019-07-03 16:09:34', '2019-07-03 16:09:34'),
(9, 2, '2-41', '41', 10, '2019-07-03 16:09:40', '2019-07-03 16:09:40'),
(10, 2, '2-42', '42', 10, '2019-07-03 16:09:46', '2019-07-03 16:09:46'),
(11, 3, '3-39', '39', 10, '2019-07-03 16:14:49', '2019-07-03 16:14:49'),
(12, 22, '22-40', '40', 10, '2019-07-03 19:37:55', '2019-07-03 19:37:55'),
(13, 22, '22-39', '39', 10, '2019-07-03 19:38:00', '2019-07-03 19:38:00'),
(14, 21, '21-40', '40', 10, '2019-07-03 19:38:14', '2019-07-03 19:38:14'),
(15, 21, '21-39', '39', 10, '2019-07-03 19:38:19', '2019-07-03 19:38:19'),
(16, 20, '20-40', '40', 10, '2019-07-03 19:38:33', '2019-07-03 19:38:33'),
(17, 20, '20-39', '39', 10, '2019-07-03 19:38:38', '2019-07-03 19:38:38'),
(18, 19, '19-39', '39', 10, '2019-07-04 05:50:36', '2019-07-04 05:50:36'),
(19, 19, '19-40', '40', 10, '2019-07-04 05:50:41', '2019-07-04 05:50:41'),
(20, 19, '19-41', '41', 10, '2019-07-04 05:50:45', '2019-07-04 05:50:45'),
(21, 18, '18-40', '40', 10, '2019-07-04 05:50:59', '2019-07-04 05:50:59'),
(22, 18, '18-39', '39', 10, '2019-07-04 05:51:04', '2019-07-04 05:51:04'),
(23, 18, '18-38', '38', 10, '2019-07-04 05:51:10', '2019-07-04 05:51:10'),
(24, 17, '17-40', '40', 10, '2019-07-04 05:51:23', '2019-07-04 05:51:23'),
(25, 17, '17-41', '41', 10, '2019-07-04 05:51:28', '2019-07-04 05:51:28'),
(26, 16, '16-37', '37', 10, '2019-07-04 05:51:45', '2019-07-04 05:51:45'),
(27, 16, '16-39', '39', 10, '2019-07-04 05:51:49', '2019-07-04 05:51:49'),
(28, 15, '15-42', '42', 10, '2019-07-04 05:52:07', '2019-07-04 05:52:07'),
(29, 15, '15-41', '41', 10, '2019-07-04 05:52:12', '2019-07-04 05:52:12'),
(30, 14, '14-44', '44', 10, '2019-07-04 05:52:27', '2019-07-04 05:52:27'),
(31, 14, '14-41', '41', 10, '2019-07-04 05:52:31', '2019-07-04 05:52:31'),
(32, 14, '14-40', '40', 10, '2019-07-04 05:52:36', '2019-07-04 05:52:36'),
(33, 23, '23-40', '40', 10, '2019-07-04 06:19:38', '2019-07-04 06:19:38'),
(34, 23, '23-41', '41', 10, '2019-07-04 06:19:42', '2019-07-04 06:19:42'),
(35, 23, '23-39', '39', 10, '2019-07-04 06:19:48', '2019-07-04 06:19:48'),
(36, 23, '23-38', '38', 10, '2019-07-04 06:19:53', '2019-07-04 06:19:53'),
(37, 24, '24-39', '39', 5, '2019-07-04 06:23:32', '2019-07-04 06:23:32'),
(38, 24, '24-40', '40', 5, '2019-07-04 06:23:36', '2019-07-04 06:23:36'),
(39, 24, '24-41', '41', 5, '2019-07-04 06:23:40', '2019-07-04 06:23:40'),
(40, 25, '25-39', '39', 1, '2019-07-04 06:29:25', '2019-07-04 06:29:25'),
(41, 25, '25-40', '40', 10, '2019-07-04 06:29:29', '2019-07-04 06:29:29'),
(42, 25, '25-41', '41', 10, '2019-07-04 06:29:32', '2019-07-04 06:29:32'),
(43, 26, '26-40', '40', 10, '2019-07-04 06:34:20', '2019-07-04 06:34:20'),
(44, 26, '26-41', '41', 10, '2019-07-04 06:34:24', '2019-07-04 06:34:24'),
(45, 26, '26-42', '42', 10, '2019-07-04 06:34:44', '2019-07-04 06:34:44'),
(46, 27, '27-40', '40', 10, '2019-07-04 06:43:10', '2019-07-04 06:43:10'),
(47, 27, '27-41', '41', 10, '2019-07-04 06:43:15', '2019-07-04 06:43:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `categories_id`, `name`, `color`, `description`, `price`, `image`, `sale`, `status`, `created_at`, `updated_at`) VALUES
(1, 15, 'Nike Air Zoom Pegasus 36 Oil Grey', 'Oil Grey', 'Nike Air Zoom Pegasus 36 mang tính biểu tượng trở lại với nhiều lỗ đục và lưới được thiết kế ở phía trên, mục tiêu chiến lược dễ thở trên các khu vực nhiệt độ cao. Một cổ áo gót và lưỡi mỏng hơn làm giảm số lượng lớn mà không ảnh hưởng đến sự thoải mái, trong khi cáp Flywire tiếp xúc mang lại cho bạn sự vừa vặn ở tốc độ cao hơn.', '3635190', '1562167306-nike-air-zoom-pegasus-36-oil-grey.PNG', '50', 1, '2019-07-03 15:21:46', '2019-07-04 06:09:03'),
(2, 15, 'Nike Air VaporMax Flyknit 3 Metallic Sliver', 'Metallic Sliver', 'Nike Air VaporMax Flyknit 3 nổi bật với các đường kẻ, hai tông màu thoáng khí, cấu trúc Flyknit co giãn cho phong cách độc đáo, sẵn sàng trên đường phố. Công nghệ VaporMax Air mang tính cách mạng giúp duy trì mùa xuân trong bước chân của bạn với đệm từ gót chân đến gót chân.', '5869000', '1562170073-nike-air-vapormax-flyknit-3.PNG', '0', 1, '2019-07-03 16:07:54', '2019-07-04 06:08:46'),
(3, 15, 'Nike Air Max Alpha Savage', 'Blue Force/White/Black/Dynamic Yellow', 'Nike Air Max Alpha Savage gọi phong cách Air Max, ổn định và thoải mái trong một thiết kế hiện đại. Webbing tích hợp với dây buộc cho ngăn giữa bàn chân, trong khi đệm Max Air mang lại sự thoải mái đáp ứng trong quá trình tập luyện cường độ cao nhất của bạn.', '3239000', '1562170475-nike-air-max-alpha-savage.PNG', '15', 1, '2019-07-03 16:14:35', '2019-07-04 06:07:34'),
(4, 1, 'Basketball Shoe PG 3', 'University Red/White/Black/University Red', 'Cú bắn mặt trăng của Paul George đưa anh ta từ Palmdale trở thành ngôi sao bóng rổ, và giờ anh ta đang tiến lên một tầm cao mới với những đám mây dưới chân. Được xây dựng trên đế ngoài lấy cảm hứng từ các miệng hố mặt trăng, PG 3 kết hợp lực kéo giật gân với đệm Zoom Air phản ứng giúp bạn di chuyển liền mạch giữa tấn công và phòng thủ.', '3239000', '1562170810-basketball-shoe-pg-3.PNG', '0', 1, '2019-07-03 16:20:10', '2019-07-03 16:20:10'),
(5, 1, 'NikeCourt Royale AC SE', 'Black/Black', 'Giành chiến thắng trong cả phong cách và sự thoải mái, NikeCourt Royale AC SE rất dễ dàng để có được khi kết hợp với toàn bộ tủ quần áo thời tiết ấm áp của bạn. Một dây đeo gore ẩn giữ cho vải phía trên trông sạch sẽ và cổ điển trong khi dễ dàng bật và tắt nó.', '1909000', '1562171088-nikecourt-royale-ac-se.PNG', '0', 1, '2019-07-03 16:24:49', '2019-07-03 16:24:49'),
(6, 15, 'Nike Air Force 1 \'07 LV8 4', 'White/White/White', 'Nike Air Force 1 \'07 LV8 4 kết hợp các tính năng hiệu suất lấy cảm hứng từ hoops của phiên bản gốc 1982, đồng thời thêm các chi tiết tham chiếu thẩm mỹ của những năm 2000. Các bản hit ánh kim xuyên suốt và một tab phía sau sáng bóng cho mượn sự rung cảm của Y2K cho biểu tượng streetwear này.', '2353000', '1562171720-nike-air-force-1-07-lv8-4.PNG', '0', 1, '2019-07-03 16:35:20', '2019-07-04 06:08:35'),
(7, 1, 'Nike Epic React Flyknit 2', 'Black/Sapphire/Lime Blast/Black', 'Nike Epic React Flyknit 2 có một bước tiến so với người tiền nhiệm với hiệu năng mượt mà, nhẹ và vẻ ngoài táo bạo. Một đường viền trên Flyknit được cập nhật đến chân của bạn với thiết kế tối giản, hỗ trợ. Dưới chân, công nghệ Nike React bền bỉ thách thức tỷ lệ cược bằng cách vừa mềm mại vừa nhạy bén, cho sự thoải mái kéo dài miễn là bạn có thể chạy.', '3538000', '1562174430-nike-epic-react-flyknit-2.PNG', '10', 1, '2019-07-03 17:20:30', '2019-07-03 17:20:30'),
(8, 1, 'Nike React Element 55 SE', 'White/Pure Platinum', 'Nike React Element 55 SE là sự pha trộn cân bằng giữa thiết kế cổ điển và sự đổi mới hướng tới tương lai. Nike React foam mang đến một chuyến đi cực kỳ trơn tru, trong khi vỏ cao su ở đế ngoài được phóng đại mang đến vẻ ngoài tiên tiến, phản ứng lại.', '3829000', '1562174775-nike-react-element-55-se.PNG', '10', 1, '2019-07-03 17:26:16', '2019-07-03 17:26:16'),
(9, 15, 'Nike Air Tailwind 79', 'Parachute Beige', 'Ra mắt lần đầu tiên vào năm 1978 cho cuộc thi Marathon Marathon, Nike Air Tailwind là một cuộc cách mạng trong việc đệm. Giờ đây, một biểu tượng đua xe trở lại với Nike Air Tailwind 79, với các vật liệu và màu sắc gần như nguyên bản, cộng với đơn vị Nike Air đã khiến nó trở thành người chiến thắng.', '2629000', '1562175250-nike-air-tailwind-79.PNG', '10', 1, '2019-07-03 17:34:10', '2019-07-04 06:07:53'),
(10, 1, 'Nike Phantom Venom Pro FG', 'White/Racer Blue', 'Nike Phantom Venom Pro FG được thiết kế cho các cú đánh mạnh mẽ, chính xác để giành chiến thắng trong các trò chơi. Ridges trên mu bàn chân giúp tạo ra xoáy để kiểm soát sự bay của quả bóng. Cáp Flywire và tấm HyperReactive linh hoạt cung cấp sự ổn định và lực kéo cần thiết để giải phóng bất cứ lúc nào.', '4389000', '1562175619-nike-phantom-venom-pro-fg.PNG', '15', 1, '2019-07-03 17:40:19', '2019-07-03 17:40:19'),
(11, 3, 'ULTRABOOST 19 SHOES BLACK', 'CORE BLACK', 'Ultraboost phát minh lại. Những đôi giày chạy này khởi động lại các công nghệ hiệu suất chính để cung cấp cho bạn một bước chạy tự tin và tràn đầy năng lượng. Phần đan phía trên có độ vừa vặn cho làn da thứ hai và được chế tạo với công nghệ dệt chuyển động để kéo dài và hỗ trợ thích ứng. Đệm mật độ kép cung cấp hỗ trợ trung gian và một chuyến đi tràn đầy năng lượng.', '4196718', '1562178531-ultraboost-19-shoes-black.PNG', '20', 1, '2019-07-03 18:28:52', '2019-07-03 18:28:52'),
(12, 13, 'Adidas Prophere Sneakers Unisex Xám/Grey', 'Xám/Grey', 'Adidas Prophere chính là cái tên đang được nhắc đến nhiều nhất trên các cộng đồng người chơi giày. Bộ đế và midsole được thiết kế vô cùng đặc biệt chắc chắn sẽ không thể tìm thấy ở bất kì phiên bản nào khác.Một trong những mẫu giày được thiết kế dành cho tương lai. Phong cách hiện đại, trẻ trung, sống động và vô cùng cá tính. Mang đậm sự kết hợp giữa thời trang đường phố streetwear và thời trang thể thao.\r\nĐệm midsole ấn tượng và không thể lẫn lộn, Ngoài ra, Prophere vẫn giữ những nguyên bản từ Adidas Original với các chi tiết góc cạnh mạnh mẽ. Các chi tiết chất liệu da lộn tổng hợp sang trọng và logo 3 sọc 3-Stripes nổi bật từ Adidas.', '952000', '1562178797-adidas-prophere-sneakers-unisex-xamgrey.jpg', '20', 1, '2019-07-03 18:33:17', '2019-07-04 06:10:12'),
(13, 11, 'Sneakers Adidas Alphabounce Beyond Nam Nữ All White/Trắng', 'White/Trắng', 'Adidas Alphabounce Beyond là mẫu giày chạy trung tính được thiết kế nâng cấp hỗ trợ cho việc tập luyện và hoạt động hằng ngày. Upper với thiết kế lưới nguyên khối hỗ trợ tuyệt vời cho các chuyển động đa chiều. Đệm midsole \"phản ứng nhanh\" ở phần mu trước và gót chân tạo nên sự chắc chắn cho các bài tập sức mạnh. Ngoài ra, Alphabounce cũng được xem là mẫu giày thời trang năng động với phong cách thiết kế hiện đại.', '1032000', '1562178976-sneakers-adidas-alphabounce-beyond-nam-nu-all-whitetrang.jpg', '10', 1, '2019-07-03 18:36:16', '2019-07-04 06:07:03'),
(14, 14, 'Balenciaga Triple s Sneakers Trainers Rubber Unisex in Black/ Đen', 'Black/ Đen', 'Balenciaga là thương hiệu thời trang lâu đời nổi tiếng, cao cấp nhất nhì thế giới được thành lập từ năm 1919.Balenciaga Triple S, ngày từ khi ra mắt sản phẩm này đã trở thành mẫu giày được săn đón nhiều nhất trên thế giới, đây là mẫu giày cũng được nhiều người nghệ sĩ thế giới lựa chọn. Tại Việt Nam, giày balenciaga triple s được rất nhiều nghệ sĩ nổi tiếng.Một đôi giày ra đời đã phá vỡ những tiêu chuẩn về thời trang hiện nay. Đôi giày balenciaga triple s Với thiết kế mang đậm phong cách của những thập niên 80 đôi giày này đã làm cho giới trẻ có những trải nghiệm mới.', '1000000', '1562179337-balenciaga-triple-s-sneakers-trainers-rubber-unisex-in-black-den.jpg', '0', 1, '2019-07-03 18:42:18', '2019-07-04 06:06:37'),
(15, 12, 'Adidas Yeezy 700 Sneakers Unisex', 'Xám', 'abc', '1436500', '1562179486-adidas-yeezy-700-sneakers-unisex.jpg', '0', 1, '2019-07-03 18:44:47', '2019-07-04 06:06:48'),
(16, 1, 'Sneakers New Balance 996 Da Lộn Rubber Unisex Xám/Grey', 'Xám/Grey', 'Dễ dàng nhận thấy ngôn ngữ thiết kế của NB luôn xuyên suốt với nhau, vẫn “mô tuýp” ấy, vẫn những chất liệu ấy, chỉ nhấn nhá một chút sự khác biệt trên mỗi đôi giày nhưng không vì thế mà làm cho nó trở nên nhàm chán, tất đều có những nét quyến rũ, hấp dẫn của riêng mình', '952000', '1562179632-sneakers-new-balance-996-da-lon-rubber-unisex-xamgrey.jpg', '0', 1, '2019-07-03 18:47:12', '2019-07-04 06:07:16'),
(17, 3, 'Adidas EQT trainers sneaker unisex nam nữ black/white', 'black/white', 'Nếu phiên bản EQT nguyên thủy của những năm 90s lấy cảm hứng từ bảng màu xanh lá và phá cách với họa tiết táo bạo trên trang phục thể thao, thì diện mạo EQT của ngày hôm nay mang đậm hơi hướng đương đại với các hình khối cắt ghép cứng cáp và phóng khoáng. Làm sống lại huyền thoại của adidas từ quá khứ.Adidas EQT không dành cho những người thích sự bão hòa, chịu sự chi phối của xu hướng và số đông. Chính sự tối giản trong thiết kế, màu sắc độc đáo - người mang adidas EQT sẽ tự tạo ra phong cách cho riêng mình, trụ vững, nổi bật trong dòng chảy luôn có xu hướng quay vòng và đào thải của thời trang.', '1096500', '1562179805-adidas-eqt-trainers-sneaker-unisex-nam-nu-blackwhite.jpg', '10', 1, '2019-07-03 18:50:05', '2019-07-03 18:50:05'),
(18, 4, 'Sneakers Puma BTS Court Star Trainer Da Trơn Rubber Nữ Pink - Hồng', 'Pink/Hồng', 'Mẫu giày liên tục hết hàng trên các trang đặt online do sức hút và độ ảnh hưởng giới trẻ toàn cầu của nhóm nhạc này.Với hình ảnh bàn tay cầm một nhành hoa trên phần tem lưỡi gà nổi bật. Chất da mềm mại cùng các chi tiết lót giày đặc biệt. Puma x BTS Court Star là mẫu giày đáp ứng thị hiếu và mọi nhu cầu hằng ngày mà bạn cần phải sở hữu.', '973000', '1562180122-sneakers-puma-bts-court-star-trainer-da-tron-rubber-nu-pink-hong.jpg', '0', 1, '2019-07-03 18:55:23', '2019-07-03 18:55:23'),
(19, 4, 'Sneakers Puma BTS Court Star Trainer Unisex Nam Nữ in Black / Đen', 'Black / Đen', 'Puma được biết đến như một trong những thương hiệu giày hàng đầu thế giới luôn đổi mới và cập nhật xu hướng. Hãng nhanh chóng bắt tay với boy band hàng đầu làn sóng K-pop, các chàng trai tài năng BTS ra mắt mẫu giày Puma x BTS Court Star, tạo nên một cơn sốt. Mẫu giày liên tục hết hàng trên các trang đặt online do sức hút và độ ảnh hưởng giới trẻ toàn cầu của nhóm nhạc này.Với hình ảnh bàn tay cầm một nhành hoa trên phần tem lưỡi gà nổi bật. Chất da mềm mại cùng các chi tiết lót giày đặc biệt. Puma x BTS Court Star là mẫu giày đáp ứng thị hiếu và mọi nhu cầu hằng ngày mà bạn cần phải sở hữu.', '1181500', '1562180319-sneakers-puma-bts-court-star-trainer-unisex-nam-nu-in-black-den.jpg', '0', 1, '2019-07-03 18:58:39', '2019-07-03 18:58:39'),
(20, 10, 'Sneaker Converse 1970s Classic Rubber Nam Nữ In Black - Đen', 'black', 'Phiên bản cổ thấp màu đen cá tính của Chuck 1970s được giới trẻ nhiệt tình ưu ái bởi sự hiện đại, tiện dụng. Thay đổi ở đế giày với màu trắng ngà và cao hơn so với các phiên bản khác. Phần thân giày có màu sắc đồng bộ với đế giày và có độ thanh mảnh hơn. Chất vải Canvas dày, nhẹ, bền chắc giúp người dùng có được sự thoải mái. Đường chỉ trắng chạy dọc thân giày được chăm chút tỉ mỉ hơn rất nhiều.', '1090000', '1562181217-sneaker-converse-1970s-classic-rubber-nam-nu-in-black-den.jpg', '20', 1, '2019-07-03 19:13:38', '2019-07-04 06:06:09'),
(21, 9, 'Converse Classic Rubber Unisex Sneakers Cổ Cao/High Top Full White/Trắng', 'White/Trắng', 'Với thiết kế đơn giản, trẻ trung và năng động đã giúp Converse dần trở thành một item thời trang đáng có trong bộ sưu tập giày của tất cả mọi người nói chung và của các đầu giày nói riêng, nhất là trong list thời trang của mọi cô gái đều chắc chắn có 1 đôi giày Converse.Hướng đến tiêu thời trang, Classic trở thành biểu tượng phù hợp với mọi độ tuổi, mọi tầng lớp, không bao giờ lỗi thời.', '792.000', '1562181348-converse-classic-rubber-unisex-sneakers-co-caohigh-top-full-whitetrang.jpg', '5', 1, '2019-07-03 19:15:48', '2019-07-04 06:05:59'),
(22, 1, 'Alexander MCQUEEN Unisex Rubber Da Trơn Trắng Gót Đen', 'white', 'abc', '1000000', '1562182476-alexander-mcqueen-unisex-rubber-da-tron-trang-got-den.jpg', '0', 1, '2019-07-03 19:34:36', '2019-07-03 20:30:57'),
(23, 16, 'Nike Air Jordan 1 x \"Off-white\" Sneaker unisex nam nữ white/trắng', 'white/trắng', 'Phát hành vào ngày 3/3/2018, mẫu Air Jordan 1 Retro High OFF-WHITE của Virgil Abloh đang được kỳ vọng là phiên bản sneakers xuất sắc nhất năm nay. Với số lượng phát hành nhỏ giọt ở châu Âu, Air Jordan 1 Retro High OFF-WHITE càng khiến người yêu giày ở Bắc Mỹ và châu Á thèm muốn. Kết quả, mẫu giày này đứng đầu bảng xếp hạng vì giá bán lại cực cao trên StockX: 1771 USD (khoảng 40 triệu đồng).\r\nGiày Off White X Nike Air Jordan là một sản phẩm kết hợp xu hướng Off White đang thống trị xu thế đường phố vẫn với tinh thần Giày Nike Air Jordan kèm với một số chi tiết nổi bật đặc trưng cùa Off White.Chính những điều đó đã mang đến nét mới lạ cho Air Jordan.', '1790000', '1562221087-nike-air-jordan-1-x-off-white-sneaker-unisex-nam-nu-whitetrang.jpg', '0', 1, '2019-07-04 06:18:08', '2019-07-04 06:18:08'),
(24, 13, 'Adidas Prophere Core Black (Đen/Trắng)', 'Đen/Trắng', 'Thông tin sản phẩm:\r\nThương hiệu: Adidas\r\nDòng giày: Adidas Prophere\r\nMàu sắc: Core Black (Đen)\r\nChất liệu: Chất liệu tổng hợp.\r\nSize: Có size cho cả nam và nữ từ 36 đến 43.\r\nChức năng: Lifestyle hoặc tập luyện thể thao.', '1190000', '1562221335-adidas-prophere-core-black-dentrang.jpg', '20', 1, '2019-07-04 06:22:16', '2019-07-04 06:22:16'),
(25, 11, 'ALPHABOUNCE RC SHOES', 'black', 'Được làm cho tất cả các cách họ chơi, những đôi giày này cung cấp hỗ trợ và thoải mái cho những người nhỏ bé năng động. Chúng có một lưới liền mạch phía trên với các khu vực kéo dài và hỗ trợ cho chuyển động đa chiều. Đệm linh hoạt mang lại cho đôi giày một cảm giác mùa xuân dưới chân.', '4500000', '1562221713-alphabounce-rc-shoes.PNG', '5', 1, '2019-07-04 06:28:34', '2019-07-04 06:28:34'),
(26, 11, 'ALPHABOUNCE INSTINCT CLIMA SHOES', 'TRUE PINK', 'Lấy cảm hứng từ giày bóng đá và được chế tạo để chạy và luyện tập chéo, những đôi giày chạy trung tính này có phần đế giống như vớ với phần mũi lưới mở để giúp bạn mát mẻ trong thời tiết nóng. Các khu vực chiến lược của tăng cường hỗ trợ phong trào đa chiều. Đệm linh hoạt cho phép di chuyển 360 độ.', '20000000', '1562222021-alphabounce-instinct-clima-shoes.PNG', '10', 1, '2019-07-04 06:33:41', '2019-07-04 06:33:41'),
(27, 12, 'YEEZY BOOST 350 V2 \"STATIC\"', 'STATIC', 'YEEZY BOOST 350 V2 \"STATIC\"', '10000000', '1562222548-yeezy-boost-350-v2-static.jpg', '20', 1, '2019-07-04 06:42:28', '2019-07-04 06:42:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1562192035jpg', '2019-07-03 22:13:55', '2019-07-03 22:13:55'),
(2, '1562192042jpg', '2019-07-03 22:14:02', '2019-07-03 22:14:02'),
(3, '1562192047jpg', '2019-07-03 22:14:07', '2019-07-03 22:14:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `mobile`, `email_verified_at`, `admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hungdz', 'tronghungbo@gmail.com', 'Hà Nội', '0362188088', NULL, 1, '$2y$10$2rNFZmxjbetr082yAarKH.35J9MdnL8NRHIjwBtXKrji1P83a/UHi', NULL, '2019-07-03 14:46:22', '2019-07-03 14:46:22'),
(2, 'abc', 'abc@gmail.com', 'TP HCM', '012345678', NULL, NULL, '$2y$10$ELSWhKQlMkc2nsoYKITYaegZikPwEKWkW9MkVU4eFlB6LghWlUiPS', NULL, '2019-07-04 05:48:31', '2019-07-04 05:48:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`name`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `productatt`
--
ALTER TABLE `productatt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `productatt`
--
ALTER TABLE `productatt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
