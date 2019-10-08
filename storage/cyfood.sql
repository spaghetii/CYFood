-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cyfood`
--
CREATE DATABASE IF NOT EXISTS `cyfood` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `cyfood`;

-- --------------------------------------------------------

--
-- 資料表結構 `coupons`
--
-- 建立時間： 
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `CouponID` bigint(20) UNSIGNED NOT NULL,
  `CouponCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CouponType` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CouponDiscount` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CouponStart` date NOT NULL,
  `CouponDeadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的關聯 `coupons`:
--

--
-- 傾印資料表的資料 `coupons`
--

INSERT INTO `coupons` (`CouponID`, `CouponCode`, `CouponType`, `CouponDiscount`, `CouponStart`, `CouponDeadline`) VALUES
(2, 'fdsfdsfdkiu', 'freeship', 'fdsfdsfd', '2019-10-01', '2019-10-30'),
(3, 'fds', 'freeship', 'sdfsgd', '2019-10-01', '2019-10-30');

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--
-- 建立時間： 
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的關聯 `failed_jobs`:
--

-- --------------------------------------------------------

--
-- 資料表結構 `meals`
--
-- 建立時間： 
--

DROP TABLE IF EXISTS `meals`;
CREATE TABLE `meals` (
  `MealID` bigint(20) UNSIGNED NOT NULL,
  `MealName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MealDesc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MealPrice` int(11) NOT NULL,
  `MealType` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MealImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/storage/uploads/meals/default.png',
  `MealDetails` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MealQuantity` int(10) UNSIGNED DEFAULT NULL,
  `ShopID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的關聯 `meals`:
--   `ShopID`
--       `shops` -> `ShopID`
--

--
-- 傾印資料表的資料 `meals`
--

INSERT INTO `meals` (`MealID`, `MealName`, `MealDesc`, `MealPrice`, `MealType`, `MealImage`, `MealDetails`, `MealQuantity`, `ShopID`) VALUES
(1, '白切羊肉 Boiled Lamb', NULL, 200, '人氣精選 Popular Items', '/storage/uploads/meals/1/IBOyZB0EOh22sOBz3qNDy0BK2jFpBOrjTEFEfeTQ.jpeg', NULL, NULL, 1),
(2, '炒羊睪丸 Stir-Fried Lamb Testicles', NULL, 300, '人氣精選 Popular Items', '/storage/uploads/meals/1/qx7aJT9KOw6HmfvLW38JDnSfomSTRjPw3ViNdHbx.jpeg', NULL, NULL, 1),
(3, '當歸羊肉火鍋 Angelica Lamb Hot Pot', NULL, 400, '人氣精選 Popular Items', '/storage/uploads/meals/1/2D7MPNkOIB902BEZzfaeN9AYmejLVhMp2ZENi9Pt.jpeg', NULL, NULL, 1),
(4, '清湯羊肉火鍋 Lamb Broth Soup Hot Pot', NULL, 400, '人氣精選 Popular Items', '/storage/uploads/meals/1/CtnV3flsyGXkYI9PmaOFnQCCQOriXKJfTybS96w4.jpeg', NULL, NULL, 1),
(5, '全酒羊肉火鍋 Rice Wine Lamb Hot Pot', NULL, 400, '人氣精選 Popular Items', '/storage/uploads/meals/1/8zQb2AonCjeGoDD8fyZtuRUPqg316ixokbk6bcWL.jpeg', NULL, NULL, 1),
(6, 'A 套餐 Combo A', '含拌油麵線, 沙茶羊肉及湯品。 Include tossed vermicelli with oil, lamb with shacha sauce, and soup.', 210, '超值商業套餐 Valuable Combo', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(7, 'B 套餐 Combo B', '內含沙茶羊肉, 小菜, 湯品及白飯。 Include lamb with shacha sauce, side dishes, soup, and rice.', 310, '超值商業套餐 Valuable Combo', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(8, 'C 套餐 Combo C', '內含主食, 湯品及炒高麗菜。 Include main course, soup, and stir-fried cabbage.', 200, '超值商業套餐 Valuable Combo', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(9, '炒青菜 Stir-Fried Vegetable', '可以選高麗菜、大陸妹、空心菜（冬天是波菜）。', 50, '炒類 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(10, '拌油麵線 Tossed Oil Rice Vermicelli', NULL, 50, '炒類 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(11, '炒沙茶羊肉 Stir-Fried Lamb with Shacha Sauce', NULL, 100, '炒類 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(12, '炒羊肉米粉 Stir-Fried Lamb Rice Noodles', NULL, 100, '炒類 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(13, '炒羊肉飯 Stir-Fried Rice with Lamb', NULL, 100, '炒類 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(14, '炒羊肉燴飯 Stewed Rice with Stir-Fried Lamb', NULL, 100, '炒類 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(15, '當歸羊肉湯 Angelica Lamb Soup', NULL, 100, '湯類 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(16, '清湯羊肉湯 Lamb Broth Soup', NULL, 100, '湯類 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(17, '全酒羊肉湯 Rice Wine Lamb Soup', NULL, 170, '湯類 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(18, '半酒羊肉湯 Half Rice Wine Lamb Soup', NULL, 170, '湯類 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(19, '羊肚湯 Lamb Belly Soup', NULL, 170, '湯類 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(20, '羊雜湯 Lamb Offal Soup', NULL, 100, '湯類 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(21, '涮羊肉火鍋 Blanched Lamb Hot Pot', NULL, 350, '火鍋類 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(22, '半酒羊肉火鍋 Half Rice Wine Lamb Hot Pot', NULL, 400, '火鍋類 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(23, '羊腳筋火鍋 Lamb Feet Tendon Hot Pot', NULL, 400, '火鍋類 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(24, '鴛鴦鍋 Mixed Hot Pot', NULL, 700, '火鍋類 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(25, '素食養生火鍋 Vegetarian Healthy Hot Pot', NULL, 400, '火鍋類 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(26, '清湯豬肉火鍋 Broth Soup Pork Hot Pot', NULL, 400, '火鍋類 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(27, '涼拌牛蒡絲 Shredded Burdock Salad', NULL, 80, '冷盤類 Cold Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(28, '涼拌羊肚 Lamb Belly Salad', NULL, 150, '冷盤類 Cold Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(29, '柳橙汁 Orange Juice', NULL, 60, '飲料類 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(30, '芭樂汁 Guava Juice', NULL, 60, '飲料類 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(31, '烏梅汁 Plum Juice', NULL, 60, '飲料類 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(32, '蘆薈汁 Aloe Vera Juice', NULL, 60, '飲料類 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(33, '半天水 Coconut Juice', NULL, 60, '飲料類 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(34, '烏龍茶 Oolong Tea', NULL, 60, '飲料類 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--
-- 建立時間： 
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `MemberID` bigint(20) UNSIGNED NOT NULL,
  `MemberName` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MemberEmail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MemberPhone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MemberPassword` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MemberImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MemberPermission` tinyint(1) NOT NULL DEFAULT 0,
  `MemberCredit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的關聯 `members`:
--

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`MemberID`, `MemberName`, `MemberEmail`, `MemberPhone`, `MemberPassword`, `MemberImage`, `MemberPermission`, `MemberCredit`, `token`) VALUES
(1, 'RF', 'e32990@gmail.com', '645645756767', '$2y$10$U7bn640OigvgN7evjNifhO.29G1x8InxGapIKWpth3/p2ryhIRpDK', NULL, 0, NULL, 'eyJpdiI6InRveU5cL1FXVFRzaVJ2RjlGQmZ1M3JnPT0iLCJ2YWx1ZSI6Ik9NXC9pR0orYmZJYkJ1OXhYWXcwT0pnPT0iLCJtYWMiOiIzM2ZlOGZkMTE2OWIzZWY2MjRjYWZhODdiMzFmZjE5YmIwNDFkMDllOWNhNDJhNzM2YzgxMGVhMzdlYTNiMTFhIn0='),
(2, 'mumi', 'rinfeng3370@gmail.com', '4943759476', '$2y$10$SajHiKBeMYNv0pdarFyX7O.002H8OUfFCUPMSLbuCj8Ix3zfhd6nu', NULL, 0, NULL, NULL),
(3, 'mumi', 'XXX@aaa.com', '4943759476', '$2y$10$7.n8sCkHPya2GIuuZZreOerquAMlTdKyUuYcF1l/uwSMzVy3UeRVG', NULL, 0, NULL, NULL),
(4, '展', 'eric211924@gmail.com', '0910672167', '$2y$10$K5TpBQn8h3KIjbA78FWeweYuWueb2tCmtkJYrx9v8Th1R06aSKuHi', NULL, 0, NULL, 'eyJpdiI6ImZGZVFHSlNoeXREandDVkFKWkdYOFE9PSIsInZhbHVlIjoicERrZUEyZjdmMjROWEZPZzY0cW5vQT09IiwibWFjIjoiNzA4MzI2YzM0NGFlZGVjMzg4ZDkzYzIzZWJlMWNhNmRhMWU0ZjI5NGZiY2EzN2NmNjQ1NTgyOTdjZWVmYzJiYSJ9');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--
-- 建立時間： 
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的關聯 `migrations`:
--

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_09_26_031315_create_shops_table', 1),
(11, '2019_09_26_031411_create_meals_table', 1),
(12, '2019_09_26_031434_create_members_table', 1),
(13, '2019_09_26_031549_create_coupons_table', 1),
(14, '2019_09_26_053201_create_orders_table', 2),
(15, '2019_10_07_082400_create_jobs_table', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--
-- 建立時間： 
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `OrdersID` bigint(20) UNSIGNED NOT NULL,
  `OrdersNum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OrdersDetails` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `OrdersCreate` datetime NOT NULL,
  `OrdersUpdate` datetime DEFAULT NULL,
  `OrdersStatus` tinyint(4) NOT NULL DEFAULT 0,
  `MemberID` bigint(20) UNSIGNED NOT NULL,
  `ShopID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的關聯 `orders`:
--   `MemberID`
--       `members` -> `MemberID`
--   `MemberID`
--       `members` -> `MemberID`
--   `ShopID`
--       `shops` -> `ShopID`
--

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--
-- 建立時間： 
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的關聯 `password_resets`:
--

-- --------------------------------------------------------

--
-- 資料表結構 `shops`
--
-- 建立時間： 
--

DROP TABLE IF EXISTS `shops`;
CREATE TABLE `shops` (
  `ShopID` bigint(20) UNSIGNED NOT NULL,
  `ShopName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShopType` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShipTime` int(11) NOT NULL,
  `ShopImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShopAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShopEmail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ShopPhone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ShopPassword` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的關聯 `shops`:
--

--
-- 傾印資料表的資料 `shops`
--

INSERT INTO `shops` (`ShopID`, `ShopName`, `ShopType`, `ShipTime`, `ShopImage`, `ShopAddress`, `ShopEmail`, `ShopPhone`, `ShopPassword`) VALUES
(1, '呂記正宗岡山羊肉', '中式美食', 15, '/storage/uploads/shops/HRmflDzadXmaoLvTx0tmiOb1Dhp7L9rcywd6NPjz.jpeg', '台中市西區公益路184號, Taichung', 'xxx@email.com', '09xx-xxx-xxx', '$2y$10$.l5DoOVzHFpf/36sQAAdxOMlgBh9Eg0XKQ5gkl.ynZDMhy/mK1YpS'),
(2, '精誠牛肉麵 精誠店', '中式美食', 15, '/storage/uploads/shops/GmLVGbr2i1fJF3Yukcf6ADR3ThBLvMhfKiqfPGQU.jpeg', '34, Jingcheng Road, Taichung City 407', 'xxx1@email.com', '09xx-xxx-xxx', '$2y$10$UZL9x5paCUccj7HEGpqnU.HTlTwWuCKwe0NM9CMrI7PN00f2GRHmu'),
(3, '福牛牛排 美村店', '台灣美食', 25, '/storage/uploads/shops/iNxaehpVy4BM9SSfXQFEOFw6CwAM3IJVhtGW4xAx.jpeg', '403台灣台中市西區美村路一段416號, 台中市 403 ', 'xxx2@email.com', '09xx-xxx-xxx', '$2y$10$uWkcO0Dlv3Vnp.lUI/G2TuueQ/Vzk.uyR5bbfhBXdI08Yx0ts/G2G'),
(4, '惹鍋 文心店', '台灣美食', 30, '/storage/uploads/shops/SPn7yh1d8ZsOSxdwM1XNC8b1oBUoXla58qdXqjVd.jpeg', '130, Section 1, Wenxin Road, Taichung City 408', 'xxx3@email.com', '09xx-xxx-xxx', '$2y$10$kbEMCJ3yYb2XOJ75/PUVDOoRigKQP53xia1wnJ1Mm3/gRn3HyOU6u'),
(5, '帝王薑母鴨 忠明南店', '台灣美食', 15, '/storage/uploads/shops/RXHMpry7sGOqv08AHM6okjrGDPIaOJ7lKebH66j2.jpeg', '194, Wuquan 1st Street, Taichung City 403 ', 'xxx4@email.com', '09xx-xxx-xxx', '$2y$10$YVMt8jFTvZw.mtlIhsTcSejMytQ5fFLD6L6kd3z6BbUCegJQCWgBi'),
(6, '老四川 公益店', '台灣美食', 25, '/storage/uploads/shops/jpYQ0171bn7UAHzMUzZ3Ei4PtPeMt7Nldf1XnHQv.jpeg', '403台灣台中市西區公益路343號, 台中市 403', 'xxx5@email.com', '09xx-xxx-xxx', '$2y$10$E0TzCPmO4I10kj9KsqF85ewHj3fkZL6aAfeHgllLB4bwCtUS3K91m'),
(7, '雞優股鹹酥雞', '台灣美食', 35, '/storage/uploads/shops/9tjTiqgPHT6p1YKc6mPOTHANJYaxfWG4KQ6oJ3oe.jpeg', 'No. 123, Section 3, Dongxing Road, Nantun District, Taichung City, Taiwan 408,', 'xxx6@email.com', '09xx-xxx-xxx', '$2y$10$XU6hU9H7w/QacnNXhAsc8eYUS1wng0x1cUKDbMMyWv7UsPVrUqKcq'),
(8, '元井海鮮粥', '台灣美食', 15, '/storage/uploads/shops/62NgERFwWyj6R32U4h4N0479d6u5PS1CgafAxFuG.jpeg', '台中市西區健行路1011號, Taichung, ', 'xxx7@email.com', '09xx-xxx-xxx', '$2y$10$gDDROS/8ODP3QYPC2Y.1Muw16vWYbY7L1dbkD2Xlzwk6aXmMo0FT6'),
(9, '牛老總涮牛肉 五權店', '台灣美食', 20, '/storage/uploads/shops/mH3NV8aYbrPlkvn7rDtVZRKSDdomT1IadhSB5Ncs.jpeg', '1-130, Wuquan Road, Taichung City 403', 'xxx8@email.com', '09xx-xxx-xxx', '$2y$10$zAbcnwbF5Qz31FkUUTBYA./z5yWoVceHWChKjAn/MftUg9d9D7Bwu'),
(10, '豪品鐵板燒 逢甲店', '台灣美食', 20, '/storage/uploads/shops/YmGlVSDwbDeTEBQHT3uFQDEIwFu1W5DbVcpFrg3P.jpeg', 'No. 564-1, Fuxing Road, Xitun District, Taichung City, Taiwan 407,', 'xxx9@email.com', '09xx-xxx-xxx', '$2y$10$4Z7z2fBzGOk0MD8cpgLyPeGCz/IJlOvf/HpPc1xRwi53hV51EplLK'),
(11, '一頭牛日式燒肉 公益店', '日式美食', 10, '/storage/uploads/shops/adfjzKyFRcN9IspBVoQHit7KPXFsOPX7r6mAIfm7.jpeg', '台中市南屯區公益路二段162號, Taichung, ', 'xxx10@email.com', '09xx-xxx-xxx', '$2y$10$jpGtiNrdSZ.vaAwKndAM3OwftYjxCg4db9LJWoI3AYC6XWAO.IYTi'),
(12, '容燒居酒屋', '日式美食', 25, '/storage/uploads/shops/NrsT0VhzrbVR8VQEpyyekcbjQk1PF1XdOqhYtwfK.jpeg', '台中市南屯區文心路一段530號, Taichung, 408 •', 'xxx11@email.com', '09xx-xxx-xxx', '$2y$10$XpDB2ejp8MYcaaV94Q7lBuB5lZEkCiU44IK4qlaB7BkuT/Ab654PS'),
(13, '小麥所', '日式美食', 20, '/storage/uploads/shops/FEPKm0jhH4cv2NLABEtAsBZwMhszexzcgXOXcstw.jpeg', '31, Boguan East Street, Taichung City 404', 'xxx12@email.com', '09xx-xxx-xxx', '$2y$10$LobuOv7G0zCYztyBUXZp5umDU7tMO0wrmH1rCs.ZSLEPBd8XS7P/G'),
(14, '激旨燒鳥 美村店', '日式美食', 20, '/storage/uploads/shops/KilHmYgQZUbWyWgIlqJti3j5A5Qb5BHLGOB4psf6.jpeg', '86, Section 1, Meicun Road, Taichung City 403 •', 'xxx13@email.com', '09xx-xxx-xxx', '$2y$10$EIH5wvz4eWsjnAsdyvHbQuatV4GPFRJh7ev1YyyuONIjC/QZsx1Bq'),
(15, '蒜翻天鹹酥雞 大墩店', '台灣美食', 25, '/storage/uploads/shops/DguI991f8nV5jwA3jTlttfsEoc2CxLpatB6k5fgE.jpeg', 'No. 392, Dajin Street, Nantun District, Taichung City, Taiwan 408,', 'xxx14@email.com', '09xx-xxx-xxx', '$2y$10$7NrVj9tTVdeqrIU/fkIrwOmrO9g2d0JqoLzHveIgvoAp/t/HczOM6'),
(16, '鐵克諾餐酒館 Techno W Bistro', '美式美食', 20, '/storage/uploads/shops/PggUamyvcGEy7IQGhpABpuQm7LRsuaorIHApOrX2.jpeg', '台中市西區忠明南路329號, Taichung, 403', 'xxx15@email.com', '09xx-xxx-xxx', '$2y$10$KbIbq3n6LFk.hn85I14Pmu2KuSOHEctcMjK6bxgX35cijeeahYH5u'),
(17, '迷客夏 向心南店', '飲品', 20, '/storage/uploads/shops/yNRxiZuqtMUgkekyyvWvBqqvf0mv6DY87iFJk2IZ.jpeg', '台中市南屯區向心南路937號, Taichung,', 'xxx16@email.com', '09xx-xxx-xxx', '$2y$10$MoeLVTiAHIGglSk7JoBv3.x8e7HtoG9fJxzEgB76kNzjNEmH9pLr2'),
(18, '酷皮脆燒肉潛艇堡 Crispy cool', '美式美食', 30, '/storage/uploads/shops/FcQnTPqpARFcb4kuKJ5G8lQXz3oW9qxGU6Wx3ukf.jpeg', '台中市北區三民路三段62號, Taichung', 'xxx17@email.com', '09xx-xxx-xxx', '$2y$10$osd8yhMgSrmTVAmzLjhXluKtNU2BnU6r3Q57Rf91cQhcKP1k8J8gm');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--
-- 建立時間： 
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的關聯 `users`:
--

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`CouponID`),
  ADD UNIQUE KEY `coupons_couponcode_unique` (`CouponCode`);

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`MealID`),
  ADD KEY `meals_shopid_foreign` (`ShopID`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`),
  ADD UNIQUE KEY `members_memberemail_unique` (`MemberEmail`) USING BTREE;

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrdersID`),
  ADD KEY `MemberID` (`MemberID`),
  ADD KEY `ShopID` (`ShopID`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`ShopID`),
  ADD UNIQUE KEY `shops_shopname_unique` (`ShopName`),
  ADD UNIQUE KEY `shops_shopaddress_unique` (`ShopAddress`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupons`
--
ALTER TABLE `coupons`
  MODIFY `CouponID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `meals`
--
ALTER TABLE `meals`
  MODIFY `MealID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `MemberID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `OrdersID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shops`
--
ALTER TABLE `shops`
  MODIFY `ShopID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_shopid_foreign` FOREIGN KEY (`ShopID`) REFERENCES `shops` (`ShopID`);

--
-- 資料表的限制式 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `members` (`MemberID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`MemberID`) REFERENCES `members` (`MemberID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`ShopID`) REFERENCES `shops` (`ShopID`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
