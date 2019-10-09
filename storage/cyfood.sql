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
-- 最後更新： 
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
(34, '烏龍茶 Oolong Tea', NULL, 60, '飲料類 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 1),
(35, '麻辣牛三寶麵 Hot and Spicy Assorted Beef Noodles', '牛肉, 牛筋及牛肚。 Beef, beef tendon, and beef tripe.', 308, '人氣精選 Popular Items', '/storage/uploads/meals/2/ktFXkX5VRvNUuethipASGSCUwZb5f4JW2nOTmmd4.jpeg', NULL, NULL, 2),
(36, '紅燒半筋半肉麵 Braised Half Beef Tendon and Half Meat Noodles', NULL, 240, '人氣精選 Popular Items', '/storage/uploads/meals/2/pxQ5dIVow20TaKkOs9KqLm2Z6NSI2LVcgQJwt3o0.jpeg', NULL, NULL, 2),
(37, '清燉牛肉麵 Stewed Beef Noodles', NULL, 220, '人氣精選 Popular Items', '/storage/uploads/meals/2/S9OlenI3LYsqrzWxfOMeiqROoteqqHXZ9bpmxrFk.jpeg', NULL, NULL, 2),
(38, '紅燒牛肉塊湯餃 Braised Cubed Beef Soup Dumpling', NULL, 250, '人氣精選 Popular Items', '/storage/uploads/meals/2/37vhTxLCGIMcO15VwnbdicdP8T3iRa0ybqxythDj.jpeg', NULL, NULL, 2),
(39, '麻辣牛肉乾拌麵 Hot and Spicy Beef Tossed Noodles', NULL, 240, '人氣精選 Popular Items', '/storage/uploads/meals/2/JehnW8yncXKeczI6ScOgH58REMvovxrEs05Rts9i.jpeg', NULL, NULL, 2),
(40, '紅燒牛三寶麵 Braised Assorted Beef Noodles', '牛肉, 牛筋及牛肚。 Beef, beef tendon, and beef tripe.', 285, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(41, '清燉牛三寶麵 Stewed Assorted Beef Noodles', '牛肉, 牛筋及牛肚。 Beef, beef tendon, and beef tripe.', 285, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(42, '麻辣牛筋麵 Hot and Spicy Beef Tendon Noodles', NULL, 308, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(43, '紅燒牛筋麵 Braised Beef Tendon Noodles', NULL, 285, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(44, '清燉牛筋麵 Stewed Beef Tendon Noodles', NULL, 285, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(45, '麻辣牛肚麵 Hot and Spicy Beef Tripe Noodles', NULL, 285, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(46, '紅燒牛肚麵 Braised Beef Tripe Noodles', NULL, 265, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(47, '清燉牛肚麵 Stewed Beef Tripe Noodles', NULL, 265, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(48, '麻辣半筋半肉麵 Hot and Spicy Half Beef Tendon and Half Meat Noodles', NULL, 265, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(49, '清燉半筋半肉麵 Stewed Half Beef Tendon and Half Meat Noodles', NULL, 240, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(50, '麻辣牛肉麵 Hot and Spicy Beef Noodles', NULL, 240, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(51, '紅燒牛肉麵 Braised Beef Noodles', NULL, 220, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(52, '麻辣牛肉塊湯餃 Hot and Spicy Cubed Beef Soup Dumpling', NULL, 275, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(53, '清燉牛肉塊湯餃 Stewed Cubed Beef Soup Dumpling', NULL, 250, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(54, '麻辣牛肉湯餃 Hot and Spicy Beef Soup Dumpling', NULL, 155, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(55, '紅燒牛肉湯餃 Braised Beef Soup Dumpling', NULL, 130, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(56, '清燉牛肉湯餃 Stewed Beef Soup Dumpling', NULL, 130, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(57, '麻辣牛肉湯麵 Hot and Spicy Beef Noodles without Beef', NULL, 130, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(58, '紅燒牛肉湯麵 Braised Beef Noodles without Beef', NULL, 110, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(59, '清燉牛肉湯麵 Stewed Beef Noodles without Beef', NULL, 110, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(60, '麻辣原汁乾拌麵 Hot and Spicy Original Tossed Noodles', NULL, 130, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(61, '牛肉乾拌麵 Beef Tossed Noodles', NULL, 220, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(62, '原汁乾拌麵 Original Tossed Noodles', NULL, 110, '牛肉麵系列 Beef Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(63, '豬腳麵 Pork Feet Noodles', NULL, 165, '湯麵 Soup Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(64, '排骨麵 Pork Ribs Noodles', NULL, 90, '湯麵 Soup Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(65, '榨菜肉絲麵 Pork Strips Noodles with Pickled Mustard', NULL, 65, '湯麵 Soup Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(66, '麻醬麵 Sesame Sauce Noodles', NULL, 65, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(67, '麻婆麵 Chili Minced Pork Noodles', NULL, 65, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(68, '酸辣麵 Sour and Spicy Noodles', NULL, 65, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(69, '乾拌麵 Tossed Noodles', NULL, 45, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(70, '紅油炒手 Spicy Wonton', NULL, 65, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(71, '高麗菜水餃 Cabbage Dumpling', '10粒。 10 pieces.', 65, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(72, '韭菜水餃 Chive Dumpling', '10粒。 10 pieces.', 65, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(73, '麻辣牛三寶湯 Hot and Spicy Assorted Beef Soup', '牛肉, 牛筋及牛肚。 Beef, beef tendon, and beef tripe.', 295, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(74, '紅燒牛三寶湯 Braised Assorted Beef Soup', '牛肉, 牛筋及牛肚。 Beef, beef tendon, and beef tripe.', 275, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(75, '清燉牛三寶湯 Stewed Assorted Beef Soup', '牛肉, 牛筋及牛肚。 Beef, beef tendon, and beef tripe.', 275, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(76, '麻辣牛筋湯 Hot and Spicy Beef Tendon Soup', NULL, 295, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(77, '紅燒牛筋湯 Braised Beef Tendon Soup', NULL, 275, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(78, '清燉牛筋湯 Braised Beef Tendon Soup', NULL, 275, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(79, '麻辣半筋半肉湯 Hot and Spicy Half Beef Tendon and Half Meat Soup', NULL, 275, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(80, '紅燒半筋半肉湯 Braised Half Beef Tendon and Half Meat Soup', NULL, 230, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(81, '清燉半筋半肉湯 Stewed Half Beef Tendon and Half Meat Soup', NULL, 230, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(82, '麻辣牛肉湯 Hot and Spicy Beef Soup', NULL, 230, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(83, '紅燒牛肉湯 Braised Beef Soup', NULL, 210, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(84, '清燉牛肉湯 Stewed Beef Soup', NULL, 210, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(85, '青菜豆腐湯 Vegetable and Tofu Soup', NULL, 40, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(86, '蛋花湯 Egg Drop Soup', NULL, 40, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(87, '豆腐蛋花湯 Egg Drop Soup with Tofu', NULL, 45, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(88, '榨菜肉絲湯 Pork Strips Soup with Pickled Mustard', NULL, 40, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(89, '豬腳 Pork Feet', NULL, 130, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(90, '滷大腸 Braised Intestine', NULL, 65, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(91, '排骨 Pork Ribs', NULL, 55, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(92, '皮蛋豆腐 Century Egg with Tofu', NULL, 45, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(93, '燙青菜 Blanched Vegetables', NULL, 45, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(94, '小黃瓜 Baby Cucumber', NULL, 45, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(95, '干絲 Shredded Tofu Curd', NULL, 45, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(96, '花生 Peanut', NULL, 45, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(97, '泡菜 Kimchi', NULL, 45, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(98, '涼拌豆腐 Tofu Salad', NULL, 35, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(99, '豆干海帶 Tofu Curd with Kelp', NULL, 35, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(100, '豆干滷蛋 Tofu Curd with Braised Egg', NULL, 35, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(101, '滷蛋 Braised Egg', NULL, 15, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 2),
(102, '腓力牛排 Beef Tenderloin', '附一份麵, 一個蛋, 一碗濃湯及隨機一杯飲料。 Served with 1 noodles, 1 egg, 1 chowder, and 1 orange juice.', 280, '人氣精選 Popular Items', '/storage/uploads/meals/3/ynNak1TwKXVckPJbhT5v531NKCeWJiby7o7s2JCw.jpeg', NULL, NULL, 3),
(103, '雙併排餐 Two-in-One Combo', '附一份麵, 一個蛋和隨機飲料一杯．濃湯一碗', 250, '人氣精選 Popular Items', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(104, '香煎大魷魚', '附一份麵, 一個蛋及一杯隨機飲料。', 149, '人氣精選 Popular Items', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(105, '沙朗牛排', '附一份麵, 一個蛋及一杯隨機飲料。', 149, '人氣精選 Popular Items', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(106, '超人氣雞腿排', '附一份麵, 一個蛋及一杯隨機飲料。', 149, '人氣精選 Popular Items', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(107, '丁骨牛排 T-bone', '附一份麵, 一個蛋及一碗濃湯.一杯隨機飲料 Served with the noodles, an egg and soup.', 300, '排餐系列 Meal', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(108, '牛小排 Beef ribs', '附一份麵, 一個蛋及小杯濃湯一碗．一杯隨機飲料。', 260, '排餐系列 Meal', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(109, '鐵板麵 Hot Plate Noodles', '附一份麵, 一個蛋及一杯隨機飲料。', 80, '排餐系列 Meal', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(110, '香煎鮮嫩豬排', '附一份麵, 一個蛋及一杯隨機飲料。', 149, '排餐系列 Meal', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(111, '美味多利魚排', '附一份麵, 一個蛋及一杯隨機飲料。', 149, '排餐系列 Meal', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(112, '小杯玉米濃湯 Corn Chowder', NULL, 20, '美味單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(113, '大杯玉米濃湯 Corn Chowder', NULL, 30, '美味單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(114, '一袋玉米濃湯 Corn Chowder', NULL, 35, '美味單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(115, '大杯紅茶 Black Tea', NULL, 20, '美味單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(116, '一份餐包（兩顆）', NULL, 20, '美味單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 3),
(117, '麻辣牛肉鍋 Hot and Spicy Beef Hot Pot', NULL, 200, '人氣精選 Popular Items', '/storage/uploads/meals/4/yBig2D8U1SkQgHr4WLXn0JBkZLWRnFjS2duY3XZe.jpeg', NULL, NULL, 4),
(118, '起司牛奶豬肉鍋 Cheese Milk Pork Hot Pot', NULL, 200, '人氣精選 Popular Items', '/storage/uploads/meals/4/lM7h938yzkD1OwWgWkzvoqzCylbwiDHsAMdYNBwj.jpeg', NULL, NULL, 4),
(119, '泰式酸辣鮮蝦鍋 Thai Sour and Spicy Shrimp Hot Pot', NULL, 200, '人氣精選 Popular Items', '/storage/uploads/meals/4/voyTIROBI6nrmKxJibHbKDZLc7UG4wV9Lh8f7brM.jpeg', NULL, NULL, 4),
(120, '泡菜豬肉鍋 Kimchi Pork Hot Pot', NULL, 190, '人氣精選 Popular Items', '/storage/uploads/meals/4/Xy6JfDCAhW4yyxuu6pqvTjXQbtIAKTKjNeELWXFC.jpeg', NULL, NULL, 4),
(121, '原味牛肉鍋Original Beef Hot Pot', NULL, 190, '人氣精選 Popular Items', '/storage/uploads/meals/4/QUuORKCezvmSYWEi8pJgzEz7l1MqeDZ4vTyF4laN.jpeg', NULL, NULL, 4),
(122, '原味豬肉鍋 Original Pork Hot Pot', NULL, 180, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(123, '原味雞肉鍋 Original Chicken Hot Pot', NULL, 180, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(124, '泰式酸辣牛肉鍋 Thai Sour and Spicy Beef Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(125, '泰式酸辣豬肉鍋 Thai Sour and Spicy Pork Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(126, '泡菜牛肉鍋 Kimchi Beef Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(127, '泡菜雞肉鍋 Kimchi Chicken Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(128, '麻辣豬肉鍋 Hot and Spicy Pork Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(129, '麻辣雞肉鍋 Hot and Spicy Chicken Hot Pot', NULL, 180, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(130, '起司牛奶牛肉鍋 Cheese Milk Beef Hot Pot', NULL, 210, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(131, '起司牛奶雞肉鍋 Cheese Milk Chicken Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(132, '咖哩起司豬肉鍋 Curry Cheese Pork Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(133, '咖哩起司牛肉鍋 Curry Cheese Beef Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(134, '咖哩起司雞肉鍋 Curry Cheese Chicken Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(135, '蒙古豬肉鍋 Mongolian Pork Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(136, '蒙古牛肉鍋 Mongolian Beef Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(137, '蒙古雞肉鍋 Mongolian Chicken Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(138, '海鮮鮮蝦鍋 Seafood and Shrimp Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(139, '海鮮鯛魚鍋 Seafood and Sea Bream Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(140, '海鮮蛤蜊鍋 Seafood and Clam Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(141, '南瓜牛肉鍋 Pumpkin and Beef Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(142, '南瓜豬肉鍋 Pumpkin and Pork Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(143, '南瓜雞肉鍋 Pumpkin and Chicken Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(144, '香菜牛肉鍋 Coriander and Beef Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(145, '香菜豬肉鍋 Coriander and Pork Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(146, '香菜雞肉鍋 Coriander and Chicken Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(147, '辣味蕃茄牛肉鍋 Spicy Tomato Beef Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(148, '辣味番茄豬肉鍋 Spicy Tomato Pork Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(149, '辣味蕃茄雞肉鍋 Spicy Tomato Chicken Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(150, '辣味蕃茄鮮蝦鍋 Spicy Tomato Shrimp Hot Pot', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(151, '麻油雞鍋 Sesame Oil Chicken Hot Pot', NULL, 208, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(152, '鳳梨苦瓜雞鍋 Bitter Gourd and Chicken with Pineapple Hot Pot', NULL, 208, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(153, '蔬菜素食鍋 Vegetable Vegetarian Hot Pot', NULL, 180, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(154, '南瓜素食鍋 Pumpkin Vegetarian Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(155, '番茄素食鍋 Tomato Vegetarian Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(156, '蒙古素食鍋 Mongolian Vegetarian Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(157, '辣味番茄素食鍋 Spicy Tomato Vegetarian Hot Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(158, '番茄牛肉鍋 Tomato Pot with Beef', NULL, 200, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(159, '番茄豬肉鍋 Tomato Pot with Pork', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(160, '番茄雞肉鍋 Tomato Pot with Chicken', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(161, '燒酒雞 Soju Chicken', NULL, 208, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(162, '麻辣素食鍋 Hot and Spicy Vegetarian Pot', NULL, 190, '火鍋 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(163, '韓國泡菜 Korean Kimchi', NULL, 45, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(164, '滷大腸 Braised Intestin', NULL, 45, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(165, '滷鴨血 Braised Duck Blood Jelly', NULL, 40, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(166, '薯條 French Fries', NULL, 45, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(167, '黃金脆薯 Golden Crispy Fries', NULL, 45, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(168, '洋蔥圈 Onion Ring', NULL, 45, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(169, '雞塊 Chicken Nugget', NULL, 50, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(170, '雞米花 Chicken Popcorn', NULL, 50, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(171, '唐揚雞腿塊 Cubed Chicken Drumstick Kaarage', NULL, 60, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(172, '起司條 Cheese Stick', NULL, 60, '熟食點心 Snack', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(173, '古早味紅茶 Traditional Black Tea', NULL, 25, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(174, '阿薩姆紅茶 Assam Black Tea', NULL, 25, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(175, '百香紅茶 Passion Fruit Black Tea', NULL, 35, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(176, '話梅紅茶 Plum Black Tea', NULL, 35, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(177, '檸檬紅茶 Lemon Black Tea', NULL, 35, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(178, '蜂蜜紅茶 Honey Black Tea', NULL, 35, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(179, '薄荷紅茶 Mint Black Tea', NULL, 35, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(180, '石榴紅茶 Pomegranate Black Tea', NULL, 35, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(181, '珍珠紅茶 Tapioca Black Tea', NULL, 35, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(182, '養樂多紅茶 Yakult Black Tea', NULL, 45, '紅茶類 Black Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(183, '茉香綠茶 Jasmine Green Tea', NULL, 35, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(184, '茉香奶茶 Jasmine Milk Tea', NULL, 35, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(185, '茉香厚奶茶 Jasmine Double Mile Tea', NULL, 55, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(186, '百香綠茶 Passion Fruit Green Tea', NULL, 35, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(187, '話梅綠茶 Plum Green Tea', NULL, 35, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(188, '檸檬綠茶 Lemon Green Tea', NULL, 35, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(189, '蜂蜜綠茶 Honey Green Tea', NULL, 35, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(190, '薄荷綠茶 Mint Green Tea', NULL, 35, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(191, '石榴綠茶 Pomegranate Green Tea', NULL, 35, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(192, '茉香珍珠 Jasmine Tea with Tapioca', NULL, 45, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(193, '養樂多綠茶 Yakult Green Tea', NULL, 45, '綠茶類 Green Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(194, '古早味奶茶 Traditional Milk Tea', NULL, 35, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(195, '古早味厚奶茶 Traditional Double Milk Tea', NULL, 55, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(196, '奶茶 Milk Tea', NULL, 35, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(197, '厚奶茶 Double Milk Tea', NULL, 55, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(198, '招牌奶茶 Signature Milk Tea', NULL, 35, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(199, '招牌厚奶茶 Signature Double Milk Tea', NULL, 55, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(200, '珍珠奶茶 Tapioca Milk Tea', NULL, 45, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(201, '珍珠厚奶茶 Tapioca Double Milk Tea', NULL, 65, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(202, '茉香珍奶 Jasmine Milk Tea', NULL, 45, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(203, '茉香厚珍奶 Jasmine Double Milk Tea', NULL, 65, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(204, '椰果奶茶 Milk Tea with Coconut Jelly', NULL, 45, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(205, '椰果厚奶茶 Double Milk Tea with Coconut Jelly', NULL, 65, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(206, '胚芽奶茶 Milk Tea with Germ', NULL, 45, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(207, '胚芽厚奶茶 Double Milk Tea with Germ', NULL, 65, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(208, '薄荷奶茶 Milk Tea with Mint', NULL, 45, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(209, '布丁奶茶 Milk Tea with Egg Pudding', NULL, 50, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(210, '布丁厚奶茶 Double Milk Tea with Egg Pudding', NULL, 70, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(211, '話梅椰果 Plum Juice with Coconut Jelly', NULL, 45, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(212, '阿華田 Ovaltine', NULL, 45, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(213, '蜜茶 Honey Tea', NULL, 45, '奶茶類 Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(214, '文山青茶 Wensan Light Oolong', NULL, 35, '特選茶類 Selected Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(215, '奶香青茶 Light Oolong with Milk', NULL, 40, '特選茶類 Selected Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(216, '厚奶香青茶 Light Oolong with Double Milk', NULL, 55, '特選茶類 Selected Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(217, '話梅青茶 Plum Light Oolong', NULL, 40, '特選茶類 Selected Tea', '/storage/uploads/meals/default.png', NULL, NULL, 4),
(218, '四人同樂餐 Sharing Meal for Four', '含2份燒酒薑母鴨, 4份陳香麵線及大和風拼盤。餐點為生食。 Served with 2 ginger duck hot pot with soju, 4 vermicelli, and large platter. Food was raw.', 1100, '人氣精選 Popular Items', '/storage/uploads/meals/5/e47SY1PZapg4ZWvSlCHWspYe0NI6UBPC3aKrKzsr.jpeg', NULL, NULL, 5),
(219, '雙人分享餐 Sharing Meal for Two', '含1份燒酒薑母鴨, 2份陳香麵線及小和風拼盤。餐點為生食。 Served with 1 ginger duck hot pot with soju, 2 vermicelli, and small platter. Food was raw.', 599, '人氣精選 Popular Items', '/storage/uploads/meals/5/e7FcHQmsmpe5hNcaoEKea3fbgDBNO9I1mxyVkEe4.jpeg', NULL, NULL, 5),
(220, '燒酒薑母鴨鍋 Ginger Duck Hot Pot with Soju', '一份可供兩人享用。含紅番鴨, 老薑, 米酒, 藥材及麻油。餐點為生食。 1 portion can be served for 2 person. Served with muscovy duck, ginger, wine, herbal, and sesame oil. Food was raw.', 399, '人氣精選 Popular Items', '/storage/uploads/meals/5/a2FXroU8zEFfQ3IDW2ofmSJ52VwhADI0IYUizOvW.jpeg', NULL, NULL, 5),
(221, '薑母羊肉鍋 Lamb Hot Pot with Ginger', '一份可供兩人享用。含帶骨帶皮山羊肉, 老薑, 米酒, 藥材及麻油。餐點為生食。 1 portion can be served for 2 person. Served with bone-in goat meat, ginger, wine, herbal, and sesame oil. Food was raw.', 499, '人氣精選 Popular Items', '/storage/uploads/meals/5/hkVNnFvVitNGMPPfaMQnj7AOqc6gYkc4JYXvXxfB.jpeg', NULL, NULL, 5),
(222, '陳香麵線 Vermicelli', '含麵線及紅蔥頭Served with vermicelli and fried shallot.', 45, '人氣精選 Popular Items', '/storage/uploads/meals/5/LQFONUmMSSGnISMB4vxX9xc7YzHLty8XAi7c1VQ0.jpeg', NULL, NULL, 5),
(223, '烏蔘雞鍋 Black Bone Chicken Hot Pot with Ginseng', '一份可供兩人享用。含東北吉林蔘, 麥門冬, 玉竹, 枸杞, 桂枝及紅棗。 1 portion can be served for 2 person. Served with Northeast China Jilin ginseng, dwarf lilyturf, fragrant solomonseal, chinese wolfberry, cinnamon, and jujube.', 450, '主鍋美味 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(224, '松露雞鍋 Truffle Chicken Hot Pot', '一份可供兩人享用。含烏骨雞, 松露及牛肝菌。 1 portion can be served for 2 person. Served with black bone chicken, truffle, and porcini.', 499, '主鍋美味 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(225, '西漢山羊肉鍋 Goat Hot Pot', '一份可供兩人享用。含帶骨帶皮山羊肉, 乾薑及細辛。 1 portion can be served for 2 person. Served with bone-in goat meat, dried ginger, and wild ginger.', 499, '主鍋美味 Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(226, '雞胇 Chicken Testicles', '餐點為生食。 Food was raw.', 320, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(227, '羊肉片 Sliced Lamb', '餐點為生食。 Food was raw.', 220, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(228, '水血 Duck Blood Jelly', '餐點為生食。 Food was raw.', 60, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(229, '鴨腸 Duck Intestine', '餐點為生食。 Food was raw.', 70, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(230, '鴨下水 Duck Organ', '餐點為生食。 Food was raw.', 70, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(231, '凍豆腐 Frozen Tofu', '餐點為生食。 Food was raw.', 50, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(232, '米血糕 Pig Blood Rice Cake', '餐點為生食。 Food was raw.', 50, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(233, '金針菇 Enoki Mushroom', '餐點為生食。 Food was raw.', 60, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(234, '香菇 Taiwan Mushroom', '餐點為生食。 Food was raw.', 70, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(235, '秀珍菇 Oyster Mushroom', NULL, 70, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(236, '杏鮑菇 King Oyster Mushroom', '餐點為生食。 Food was raw.', 70, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(237, '高麗菜 Cabbage', '餐點為生食。 Food was raw.', 60, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(238, 'A菜 Lettuce', '餐點為生食。 Food was raw.', 70, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(239, '花椰菜 Broccoli', '餐點為生食。 Food was raw.', 70, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(240, '玉米 Corn', '餐點為生食。 Food was raw.', 60, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(241, '玉米筍 Baby Corn', '餐點為生食。 Food was raw.', 70, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(242, '豆皮 Bean Curd Sheet', NULL, 50, '副料 Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(243, '綜合丸 Mixed Ball', '含5粒鴨肉丸, 4粒鴨肉小菲力, 4粒燕餃及3粒起司角燒。餐點為生食。 Served with 5 duck meatball, 4 duck tenderloin, 4 pork dumpling, and 3 cheese ball. Food was raw.', 170, '主食及獨家鍋料 Main Dish and Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(244, '鮮蝦 Shrimp', '餐點為生食。 Food was raw.', 220, '主食及獨家鍋料 Main Dish and Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(245, '鴨肉小菲力 Duck Tenderloin', '鴨肉外層包裹魚漿。餐點為生食。 Fish paste with duck. Food was raw.', 70, '主食及獨家鍋料 Main Dish and Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(246, '鴨肉小丸子Duck Meatball', '餐點為生食。 Food was raw.', 70, '主食及獨家鍋料 Main Dish and Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(247, '帝王筒 Cuttlefish Starch and Cod Fish Starch', '花枝及鱈魚漿。餐點為生食。 Cuttlefish strach, and cod fish starch. Food was raw.', 80, '主食及獨家鍋料 Main Dish and Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(248, '鴨肉水晶餃 Duck Crystal Dumplings', '餐點為生食。 Food was raw.', 70, '主食及獨家鍋料 Main Dish and Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(249, '燕餃 Pork Dumpling', '餐點為生食。 Food was raw.', 70, '主食及獨家鍋料 Main Dish and Hot Pot Ingredient', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(250, '餐點烹煮', '將餐點烹煮完畢，不含餐具', 50, '烹煮服務', '/storage/uploads/meals/default.png', NULL, NULL, 5),
(251, '白鍋牛肉套餐 Healthy Soup Pot with Beef Combo', '600克養生白味鍋。內含2份100克五花牛肉, 1塊關廟麵, 2小塊油條, 2包芝麻醬, 90克高麗菜, 50克大陸妹, 20克木耳, 30克袖珍菇, 20克金針菇, 1朵香菇, 1個季節性蔬菜, 15克大腸頭, 1個蛋餃, 2個燕餃, 1個魚餃, 2顆鴨肉丸, 2顆豬肉川丸子, 1塊綿芋頭及1塊米血。如不需鍋具則可多選一份肉及肉丸。', 799, '人氣精選 Popular Items', '/storage/uploads/meals/6/xHpw9pven21eleXyGH0OKkE0KgIDGtBhwK3GA33g.jpeg', NULL, NULL, 6),
(252, '白鍋豬肉套餐 Healthy Soup with Beef Combo', '600克養生白味鍋。內含2份110克五花豬肉, 1塊關廟麵, 2小塊油條, 2包芝麻醬, 90克高麗菜, 50克大陸妹, 20克木耳, 30克袖珍菇, 20克金針菇, 1朵香菇, 1個季節性蔬菜, 15克大腸頭, 1個蛋餃, 2個燕餃, 1個魚餃, 2顆鴨肉丸, 2顆豬肉川丸子, 1塊綿芋頭及1塊米血。如不需鍋具則可多選一份肉及肉丸。', 799, '人氣精選 Popular Items', '/storage/uploads/meals/6/yC0ovVLL3IuOQvihre3RClG25aVWObRZ6cUsnGFP.jpeg', NULL, NULL, 6),
(253, '紅鍋牛肉套餐 Hot and Spicy Soup Pot with Beef Combo', '150克絕選麻辣燙, 需搭配 450毫升的水。內含2份100克五花牛肉, 1塊關廟麵, 2小塊油條, 2包芝麻醬, 90克高麗菜, 50克大陸妹, 20克木耳, 30克袖珍菇, 20克金針菇, 1朵香菇, 1個季節性蔬菜, 15克大腸頭, 1個蛋餃, 2個燕餃, 1個魚餃, 2顆鴨肉丸, 2顆豬肉川丸子, 1塊綿芋頭及1塊米血。如不需鍋具則可多選一份肉及肉丸。', 799, '人氣精選 Popular Items', '/storage/uploads/meals/6/0gIHfGgi1ulRWnwz7VpYM31Phyuatpqpdmeap1lE.jpeg', NULL, NULL, 6),
(254, '紅鍋豬肉套餐 Hot and Spicy Pot with Pork Combo', '150克絕選麻辣燙, 需搭配 450毫升的水。內含2份110克五花豬肉, 1塊關廟麵, 2小塊油條, 2包芝麻醬, 90克高麗菜, 50克大陸妹, 20克木耳, 30克袖珍菇, 20克金針菇, 1朵香菇, 1個季節性蔬菜, 15克大腸頭, 1個蛋餃, 2個燕餃, 1個魚餃, 2顆鴨肉丸, 2顆豬肉川丸子, 1塊綿芋頭及1塊米血。如不需鍋具則可多選一份肉及肉丸。', 799, '人氣精選 Popular Items', '/storage/uploads/meals/6/D66morp4e5X74Z0Ecf0QuGzYyBuiy1QE1GSTBuam.jpeg', NULL, NULL, 6),
(255, '白鍋綜合肉套餐 Healthy Soup Pot with Assorted Meat Combo', '600克養生白味鍋。內含1份五花牛肉100克, 1份五花豬肉110克, 1塊關廟麵, 2小塊油條, 2包芝麻醬, 90克高麗菜, 50克大陸妹, 20克木耳, 30克袖珍菇, 20克金針菇, 1朵香菇, 1個季節性蔬菜, 15克大腸頭, 1個蛋餃, 2個燕餃, 1個魚餃, 2顆鴨肉丸, 2顆豬肉川丸子, 1塊綿芋頭及1塊米血。如不需鍋具則可多選一份肉及肉丸。', 799, '鍋品 Pot', '/storage/uploads/meals/default.png', NULL, NULL, 6),
(256, '紅鍋綜合肉套餐 Hot and Spicy Soup Pot with Assorted Meat Combo', '150克絕選麻辣燙, 需搭配 450毫升的水。內含1份五花牛肉100克, 1份五花豬肉110克, 1塊關廟麵, 2小塊油條, 2包芝麻醬, 90克高麗菜, 50克大陸妹, 20克木耳, 30克袖珍菇, 20克金針菇, 1朵香菇, 1個季節性蔬菜, 15克大腸頭, 1個蛋餃, 2個燕餃, 1個魚餃, 2顆鴨肉丸, 2顆豬肉川丸子, 1塊綿芋頭及1塊米血。如不需鍋具則可多選一份肉及肉丸。', 799, '鍋品 Pot', '/storage/uploads/meals/default.png', NULL, NULL, 6),
(257, '雞蛋豆腐 Egg Tofu', NULL, 40, '人氣精選 Popular Items', '/storage/uploads/meals/7/LYeJKWOqo7p6N1K2Soz0ilqP5hIABqDZg6QSiapN.jpeg', NULL, NULL, 7),
(258, '脆皮大雞排 Crispy Large Chicken Chop', NULL, 65, '人氣精選 Popular Items', '/storage/uploads/meals/7/7ylVLy0JoxYgeGHSAwsWNqVolTJVwXrvjdc5FK65.jpeg', NULL, NULL, 7),
(259, '香酥大雞排 Deep-Fried Large Chicken Chop', NULL, 65, '人氣精選 Popular Items', '/storage/uploads/meals/7/sTxIi8OY57Ql7wHI7H7h7j8CPR5B0eDHqGzn6RLa.jpeg', NULL, NULL, 7),
(260, '馬鈴薯條 Potato Fries', NULL, 60, '人氣精選 Popular Items', '/storage/uploads/meals/7/shXBkVdEOdKnVuzbq6yE3rTbnFYhXTYcK4VDkPxm.jpeg', NULL, NULL, 7),
(261, '鹹酥雞 Taiwanese Deep-Fried Chicken', NULL, 60, '人氣精選 Popular Items', '/storage/uploads/meals/7/9VFTvr3HhIomxdzpXMVMtiqlghQvhk5BxCPxxL65.jpeg', NULL, NULL, 7),
(262, '炸魷魚 Deep-Fried Squid', NULL, 60, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(263, '香酥雞皮 Deep-Fried Chicken Skin', NULL, 60, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(264, '地瓜薯條 Sweet Potato Fries', NULL, 60, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(265, '杏鮑菇 King Oyster Mushroom', NULL, 60, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(266, '甜不辣 Tempura', NULL, 60, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(267, '麥克雞塊 Chicken Nugget', NULL, 60, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(268, '洋蔥圈 Onion Ring', NULL, 60, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(269, '檸檬雞柳條 Lemon Chicken Breast Finger', NULL, 45, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(270, '百頁豆腐 Shutter Bean Curd', NULL, 40, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(271, '七里香 Chicken Buttock', NULL, 35, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(272, '皮蛋 Century Egg', NULL, 30, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(273, '小熱狗 Hot Dog', NULL, 30, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(274, '花枝丸 Cuttlefish Ball', NULL, 30, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(275, '銀絲卷 Silver Thread Roll', NULL, 30, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(276, '魚板 Fish Patty', NULL, 25, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(277, '薯餅 Hash Brown', NULL, 25, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(278, '芋籤 Taro Cake', NULL, 25, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(279, '米腸 Glutinous Rice Sausage', NULL, 25, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(280, '米血 Pig Blood Jelly', NULL, 20, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(281, '豆干 Tofu Curd', NULL, 20, '炸食類 Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(282, '四季豆 Green Bean', NULL, 40, '蔬菜類 Vegetable Item', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(283, '小黃瓜 Cucumber', NULL, 40, '蔬菜類 Vegetable Item', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(284, '玉米筍 Baby Corn', NULL, 40, '蔬菜類 Vegetable Item', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(285, '青椒 Green Pepper', NULL, 30, '蔬菜類 Vegetable Item', '/storage/uploads/meals/default.png', NULL, NULL, 7),
(286, '海鮮烏龍麵 Seafood Udon', NULL, 140, '人氣精選 Popular Items', '/storage/uploads/meals/8/Xdr2pKAN56V816S6Li3g2W1syHNDdKLdwL8ravE8.jpeg', NULL, NULL, 8),
(287, '海鮮粥 Seafood Congee', NULL, 140, '人氣精選 Popular Items', '/storage/uploads/meals/8/074nxsl27dW8OlhbGbBnF6RwIPdciTQbpM9lK4R3.jpeg', NULL, NULL, 8),
(288, '鍋燒意麵 Crispy Fried Noodles', NULL, 100, '人氣精選 Popular Items', '/storage/uploads/meals/8/idMKkdVYQcaI0wO5HAhRAOWWhU0AJv87SdoVICcs.jpeg', NULL, NULL, 8),
(289, '魚肚粥 Fish Belly Conge', NULL, 170, '人氣精選 Popular Items', '/storage/uploads/meals/8/YQFNtOjnnTULbMi7s4XkZ2Wwu5lWVV2niXbWlxYo.jpeg', NULL, NULL, 8),
(290, '兩隻龍蝦粥 Two Pieces of Lobster Congee', NULL, 270, '人氣精選 Popular Items', '/storage/uploads/meals/8/1rs72jkYloaNgvEJ8kBDqeGf8vSsyDIXqP4z33E1.jpeg', NULL, NULL, 8),
(291, '鍋燒烏龍麵 Udon Pot', NULL, 100, '鍋燒系列 Pot', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(292, '鍋燒黃油麵 Oily Noodles Pot', NULL, 100, '鍋燒系列 Pot', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(293, '一隻龍蝦粥 One Piece of Lobster Congee', NULL, 220, '主食 Main Course', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(294, '海鮮黃油麵 Seafood Oily Noodles', NULL, 140, '主食 Main Course', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(295, '海鮮意麵 Seafood Egg Noodles', NULL, 140, '主食 Main Course', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(296, '川燙小卷 Blanched Squid', NULL, 120, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(297, '涼拌魷魚 Cold Squid', NULL, 60, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(298, '涼拌干貝唇 Cold Scallop', NULL, 60, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(299, '煙燻豬頭皮 Smoked Pork Scalp', NULL, 40, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(300, '韓式泡菜 Korean Kimchi', NULL, 40, '小菜 Side Dish', '/storage/uploads/meals/default.png', NULL, NULL, 8),
(301, '中原味鍋底 Medium Original Hot Pot', NULL, 150, '人氣精選 Popular Items', '/storage/uploads/meals/9/4To6f6c2iIwDr2yFOpklva5wyh1K19yAeckj5GmB.jpeg', NULL, NULL, 9),
(302, '牛肉湯 Beef Soup', NULL, 130, '人氣精選 Popular Items', '/storage/uploads/meals/9/viWVuvgjDciP28iSvk07l8y6O26U0rupclbzBTSe.jpeg', NULL, NULL, 9),
(303, '蔥爆牛肉 Stir-Fried Beef with Scallion', NULL, 180, '人氣精選 Popular Items', '/storage/uploads/meals/9/WRH6LaZRkG9E81KsIuUCgZBEtZMghDpiAKcbjtNg.jpeg', NULL, NULL, 9),
(304, '芥藍牛肉 Stir-Fried Beef with Chinese Kale', NULL, 180, '人氣精選 Popular Items', '/storage/uploads/meals/9/sZuutjMiq584itlHB3TWizNybpAhhTwRY5KqXIwq.jpeg', NULL, NULL, 9),
(305, '生鮮牛肉片 Raw Beef Slices', NULL, 380, '人氣精選 Popular Items', '/storage/uploads/meals/9/T4cHGMIC8TGtDyD8yoMcvNetW5zf2vlBeoCBWPBN.jpeg', NULL, NULL, 9),
(306, '原味鍋底 Original Hot Pot', NULL, 100, '牛老總涮涮鍋 Signature Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(307, '藥膳鍋底 Herbal Hot Pot', NULL, 180, '牛老總涮涮鍋 Signature Hot Pot', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(308, '牛肉燴飯 Beef Stewed Rice', NULL, 130, '飯及麵 Rice and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(309, '牛肉冬粉 Beef Bean Thread Noodles', NULL, 130, '飯及麵 Rice and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(310, '牛肉麵線 Beef Vermicelli', NULL, 130, '飯及麵 Rice and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(311, '牛腩乾麵線 Beef Sirloin Dried Vermicelli', NULL, 130, '飯及麵 Rice and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(312, '拌麵線 Tossed Vermicell', NULL, 50, '飯及麵 Rice and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(313, '白飯 Rice', NULL, 15, '飯及麵 Rice and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(314, '牛肉炒飯', NULL, 130, '飯及麵 Rice and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(315, '牛肉炒麵', NULL, 130, '飯及麵 Rice and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(316, '牛腩湯 Beef Sirloin Soup', NULL, 130, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(317, '牛雜湯 Bovine Offal Soup', NULL, 130, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(318, '牛心湯 Beef Heart Soup', NULL, 130, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(319, '牛肝湯 Beef Liver Soup', NULL, 130, '湯 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(320, '炒牛雜 Stir-Fried Bovine Offal', NULL, 180, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(321, '炒牛肚 Stir-Fried Beef Tripe', NULL, 180, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(322, '炒牛筋 Stir-Fried Beef Tendon', NULL, 180, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(323, '炒青菜 Stir-Fried Vegetable', NULL, 100, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(324, '苦瓜牛肉 Stir-Fried Beef with Bitter Gourd', NULL, 180, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(325, '薑絲牛肉 Stir-Fried Beef with Shredded Ginger', NULL, 180, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(326, '洋蔥牛肉 Stir-Fried Beef with Onion', NULL, 180, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(327, '泡菜牛肉 Stir-Fried Beef with Kimchi', NULL, 180, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(328, '青椒牛肉 Stir-Fried Beef with Green Pepper', NULL, 180, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(329, '牛肉炒蛋 Beef Stir-Fried Egg', NULL, 180, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(330, '骰子牛肉 Diced Beef', NULL, 700, '熱炒 Stir-Fried', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(331, '麻油腰子 Sesame Oil Pork Kidney', NULL, 200, '麻油及冷盤 Sesame Oil and Cold Dish', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(332, '麻油牛心 Sesame Oil Beef Heart', NULL, 200, '麻油及冷盤 Sesame Oil and Cold Dish', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(333, '麻油牛肝 Sesame Oil Beef Liver', NULL, 200, '麻油及冷盤 Sesame Oil and Cold Dish', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(334, '涼拌牛舌 Beef Tongue Salad', NULL, 180, '麻油及冷盤 Sesame Oil and Cold Dish', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(335, '涼拌牛肚 Beef Tripe Salad', NULL, 180, '麻油及冷盤 Sesame Oil and Cold Dish', '/storage/uploads/meals/default.png', NULL, NULL, 9),
(336, '巴沙魚 Basa Fish', '附2樣時蔬, 1份白飯, 飲料及湯品。  Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 180, '人氣精選 Popular Items', '/storage/uploads/meals/10/PT7AFWETU6A54jE1FrQu0C3Xxxjhxb1GD9BQBVgQ.jpeg', NULL, NULL, 10),
(337, '蒜香雞排 Chicken Chop with Garlic', '附2樣時蔬, 1份白飯, 飲料及湯品。  Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 220, '人氣精選 Popular Items', '/storage/uploads/meals/10/Vt2EcwZFO2MGP91My90jceY6SsWMqLizB2xUJ9Ax.jpeg', NULL, NULL, 10),
(338, '蜜汁雞排 Honey Chicken Chop', '附2樣時蔬, 1份白飯, 飲料及湯品。  Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 220, '人氣精選 Popular Items', '/storage/uploads/meals/10/LvWLcMlRTUF8f9K5ldj3ylJVIYnBTxyLdyKA9gSR.jpeg', NULL, NULL, 10),
(339, '起司蛋 Cheese Egg', NULL, 50, '人氣精選 Popular Items', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(340, '鱈魚 Cod Fish', '附2樣時蔬, 1份白飯, 飲料及湯品。  Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 180, '人氣精選 Popular Items', '/storage/uploads/meals/10/kiGwHw0eTXAJ8pE3No4XEtyExupAeh3Xcn9PHJKI.jpeg', NULL, NULL, 10),
(341, '牛肉 Beef', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 170, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(342, '豬肉 Pork', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 160, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(343, '羊肉 Lamb', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 170, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(344, '雞肉 Chicken', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 170, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(345, '松阪豬肉 Pork Jowl', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 220, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(346, '原味菲力 Original Tenderloin', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 250, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(347, '原味牛小排 Original Short Rib', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 250, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(348, '鐵板牛柳 Hot Plate Beef Tenderloin', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 220, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(349, '蟳肉 Crab', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 180, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(350, '花枝 Cuttlefish', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 180, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(351, '蝦仁 Shrimp', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 180, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(352, '鮮蚵 Oyster', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 170, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(353, '蛤蜊 Clams', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 170, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(354, '鯖魚 Mackerel', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 180, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(355, '鯛魚 Sea Bream', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 180, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(356, '鮭魚 Salmon', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 180, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(357, '香煎鮮蝦 Pan-Fried Shrimp', '附6隻蝦, 2樣時蔬, 1份白飯, 飲料及湯品。Served with 6 pieces of shrimp, 2 type of seasonal vegetables, 1 portion of rice, beverages, and soup.', 220, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(358, '杏鮑菇 King Oyster Mushroom', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 130, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(359, '金針菇 Enoki Mushroom', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 130, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(360, '香姑 Mushroom', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 130, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(361, '鐵板豆腐 Hot Plate Tofu', '附2樣時蔬, 1份白飯, 飲料及湯品。Served with 2 seasonal vegetables, 1 portion rice, beverages, and soup.', 130, '主食 Main Dish', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(362, '白飯 Rice', NULL, 15, '單點 A-La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(363, '蔥蛋 Scallion Egg', NULL, 30, '單點 A-La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(364, '九層塔蛋 Basil Egg', NULL, 30, '單點 A-La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(365, '全熟荷包蛋 Over Egg', NULL, 15, '單點 A-La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 10),
(366, '半熟荷包蛋 Over Medium Egg', NULL, 15, '單點 A-La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 10);
INSERT INTO `meals` (`MealID`, `MealName`, `MealDesc`, `MealPrice`, `MealType`, `MealImage`, `MealDetails`, `MealQuantity`, `ShopID`) VALUES
(367, '凱薩沙拉 Caesar Salad', '蘿蔓, 美生菜, 番茄, 小黃瓜, 紅火焰生菜, 麵包丁, 培根丁, 起司粉及秘製特調凱薩醬。Romaine lettuce, Iceberg lettuce, tomato, cucumber, red tango lettuce, diced bread, diced bacon, cheese powder, and special caesar sauce.', 180, '人氣精選 Popular Items', '/storage/uploads/meals/11/68QiLVmfoW5dxOtGQnnuGSHZq9nn6bK4QmsPRBjU.jpeg', NULL, NULL, 11),
(368, '壽喜牛肉丼飯 Sukiyaki Beef Don', '越光米飯, 壽喜和牛, 日式小菜品及海帶絲。Japanese rice, sukiyaki wagyu beef, Japanese side dish, and shredded kelp.', 220, '人氣精選 Popular Items', '/storage/uploads/meals/11/Xs0pMp0OMNvz67b1O04q5Vzvhuv2kC0q2HgrvIF2.jpeg', NULL, NULL, 11),
(369, '水果優格沙拉 Fruit Salad with Yogurt', '蘿蔓, 美生菜, 蘋果, 奇異果, 柳丁, 小番茄, 葡萄, 火龍果, 紅火焰生菜及果乾。Romaine lettuce, Iceberg lettuce, apple, kiwifruit, orange, small tomato, red tango lettuce, and dried fruit.', 180, '人氣精選 Popular Items', '/storage/uploads/meals/11/5rCRjiyjpvdEDvI1ulDGghdrOcWViCJqcuZvLWRe.jpeg', NULL, NULL, 11),
(370, '燻鴨胡麻沙拉 Smoked Duck Salad with Sesame Sauce', '蘿蔓, 美生菜, 小黃瓜, 芝麻葉, 綜合堅果, 燻鴨肉片及和風芝麻醬。Romaine lettuce, Iceberg lettuce, cucumber, arugula, sliced smoked duck, and Japanese sesame sauce.', 180, '人氣精選 Popular Items', '/storage/uploads/meals/11/xe5vJtPyFmEMXS6udJue7s9ztSjDI5Yiy6XprhPv.jpeg', NULL, NULL, 11),
(371, '名間鄉黃金烏龍冷泡茶 Mingjian Cold Brew Golden Oolong Tea', NULL, 80, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 11),
(372, '冷和風冷烏龍麵 Japanese Cold UdonCold Udon', NULL, 100, '人氣精選 Popular Items', '/storage/uploads/meals/12/SucoN94nD9QPOhlgEW1VMqKNy3zGR1bVKmBybMlZ.jpeg', NULL, NULL, 12),
(373, '廣島炸牡蠣 Deep-Fried Hiroshimayaki Oyster', '5顆。', 190, '人氣精選 Popular Items', '/storage/uploads/meals/12/M6dRs1JFf94YVemNI7mvIALjEzH1nGHgXIYXjw3o.jpeg', NULL, NULL, 12),
(374, '起司雞肉串 Chicken Skewer with Cheese', '圖為單點。', 60, '人氣精選 Popular Items', '/storage/uploads/meals/12/Zyzkx9FUl1RWWufEunvVduo1x6kdtxJcQiNmJkMw.jpeg', NULL, NULL, 12),
(375, '明太子馬鈴薯 Potato with Cod Roe', NULL, 180, '人氣精選 Popular Items', '/storage/uploads/meals/12/ogjWkG5egTq7zOA2mLTV4A7dvySmC0EBbXO6xc2I.jpeg', NULL, NULL, 12),
(376, '茭白筍 Water Bamboo', NULL, 90, '人氣精選 Popular Items', '/storage/uploads/meals/12/kewhsCsqlnfHXLS1PWq32DBpm6Cq1dLmsbUYrw0I.jpeg', NULL, NULL, 12),
(377, '明太子飯糰 Cod Roe Onigiri', NULL, 65, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(378, '鮭魚飯糰 Salmon Onigiri', NULL, 50, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(379, '干貝飯糰 Scallop Onigiri', '干貝絲。', 60, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(380, '白飯 Rice', NULL, 30, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(381, '涼拌洋蔥 Cold Onions', NULL, 60, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(382, '胡麻豆腐 Tofu with Sesame Sauce', '亞麻豆腐。', 90, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(383, '甜在心麻吉 Mochi', NULL, 130, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(384, '蛤蠣烏龍麵 Udon with Clams', NULL, 200, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(385, '牛肉手捲 Beef Hand Roll', '2捲。', 90, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(386, '干貝手捲 Scallop Hand Roll', '2捲。', 90, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(387, '牛肉炒飯 Stir-Fried Rice with Beef', NULL, 150, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(388, '味噌湯 Miso Soup', NULL, 50, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(389, '鮮美蛤蠣湯 Clams Soup', NULL, 120, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(390, '炒高麗菜 Stir-Fried Cabbage', NULL, 120, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(391, '容燒炒烏龍麵 Signature Stir-Fried Udon', NULL, 160, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(392, '明太子奶油烏龍麵 Udon with Cod Roe and Cream Sauce', NULL, 170, '飽食湯品及食事 Soup and A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(393, '和風炸雞 Japanese Deep-Fried Chicken', NULL, 150, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(394, '容燒絲瓜 Signature Sponge Gourd', NULL, 100, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(395, '薯條 French Fries', NULL, 90, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(396, '容燒魚柳條 Signature Fish Fillet Stick', '多利魚。', 150, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(397, '起士條 Cheese Stick', '5個。', 110, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(398, '日式炸蝦 Japanese Deep-Fried Shrimps', '3支。', 180, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(399, '日式炸豆腐 Japanese Deep-Fried Tofu', NULL, 90, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(400, '容燒地瓜 Signature Sweet Potato', NULL, 100, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(401, '雞軟骨 Chicken Cartilage', NULL, 100, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(402, '現切新鮮洋蔥圈 Onion Rings', '現切。', 100, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(403, '起司可樂餅 Croquette with Cheese', NULL, 110, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(404, '蜂蜜芥末豬排燒 Grilled Pork Chop with Honey Mustard Sauce', NULL, 200, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(405, '紫蘇炸蝦 Deep-Fried Shrimp with Perilla', '三支。', 170, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(406, '澎湖花枝蝦排 Shrimp Chop with Penghu Cuttlefish', NULL, 200, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(407, '炸干貝 Deep-Fried Scallop', '3顆生食級。', 165, '炸物 Deep-Fried Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(408, '燒鳥串 Yakitori', NULL, 55, '雞肉及鷄肉 Chicken', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(409, '照燒雞肉串 Teriyaki Chicken Skewer', NULL, 55, '雞肉及鷄肉 Chicken', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(410, '明太子雞腿肉串 Chicken Drumstick Skewer with Cod Roe', NULL, 70, '雞肉及鷄肉 Chicken', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(411, '炭烤雞腿排串 Grilled Chicken Thigh Skewer', NULL, 130, '雞肉及鷄肉 Chicken', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(412, '明太子雞翅 Chicken Wings with Cod Roe', NULL, 140, '雞肉及鷄肉 Chicken', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(413, '櫻桃鴨肉串 Cherry Duck Skewer', '2串。', 90, '雞肉及鷄肉 Chicken', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(414, '山葵章魚 Wasabi Octopus', NULL, 130, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(415, '鯖魚 Mackerel', NULL, 160, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(416, '花魚一夜干 Dried Carp Fish', '一夜干。', 240, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(417, '大草蝦 Tiger Shrimp', '2支。', 180, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(418, '招牌龍蝦 Signature Lobster', NULL, 880, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(419, '青甘下巴 Salt-Grilled Amberjack Fish Chin', '鹽燒。', 280, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(420, '絲瓜蛤蠣 Stir-Fried Chinese Squash with Clam', NULL, 150, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(421, '奶油蛤蠣 Clams with Cream Sauce', NULL, 160, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(422, '酒蒸蛤蠣 Steamed Clam in Wine', '酒蒸。', 180, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(423, '培根干貝串 Bacon and Scallop Skewer', '2顆生食級。', 140, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(424, '鮮甜QQ軟絲 Sweet Squid', NULL, 380, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(425, '炙燒鮭魚串 Broiled Salmon Skewer', '2串。串燒。', 140, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(426, '北極冰海甜蝦 North Pole Amaebi', '北極海。', 200, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(427, '隱藏版烤鮭魚頭 Special Salt-Grilled Salmon Kabuto', '鮭魚頭。燒。', 320, '海鮮 Seafood', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(428, '可爾必思氣泡 Calpis Sparkling Drink', '冷飲。', 90, '無酒精沙瓦 Non Alcohol Sparkling Drink', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(429, '水蜜桃可爾必思氣泡 Peach Calpis Sparkling Drink', '冷飲。', 90, '無酒精沙瓦 Non Alcohol Sparkling Drink', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(430, '蜜桃覆盆子氣泡 Peach and Raspberry Sparkling Drink', '冷飲。', 90, '無酒精沙瓦 Non Alcohol Sparkling Drink', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(431, '草莓綜合氣泡 Assorted Strawberry Sparkling Drink', '冷飲。', 90, '無酒精沙瓦 Non Alcohol Sparkling Drink', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(432, '水蜜桃氣泡 Peach Sparkling Drink', '冷飲。', 90, '無酒精沙瓦 Non Alcohol Sparkling Drink', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(433, '原味氣泡水 Original Sparkling Drink', '冷飲。', 60, '無酒精沙瓦 Non Alcohol Sparkling Drink', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(434, '可樂 Coke', '冷飲。', 50, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(435, '雪碧 Sprite', '冷飲。', 50, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(436, '麥茶 Wheat Tea', '麥茶。', 45, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(437, '可爾必思 Calpis', '杯。冷飲。', 50, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(438, '礦泉水 Mineral Water', '冷飲。', 20, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(439, '烏龍茶 Oolong Tea', NULL, 45, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(440, '柳橙汁 Orange Juice', '冷飲。', 45, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(441, '蘋果汁 Apple Juice', '冷飲。', 45, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(442, '無糖綠茶 Sugar Free Green Tea', '無糖。', 50, '飲品 Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(443, '青椒 Green Pepper', NULL, 40, '蔬菜及野菜 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(444, '百頁豆腐 Shutter Bean Curd', NULL, 40, '蔬菜及野菜 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(445, '超甜玉米筍 Sweet Baby Corn', '4支。', 80, '蔬菜及野菜 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(446, '四季豆 Green Bean', NULL, 40, '蔬菜及野菜 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(447, '照燒貢丸 Teriyaki Meatball', '寫真燒。', 40, '蔬菜及野菜 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(448, '照燒花枝丸 Teriyaki Cuttlefish Ball', NULL, 40, '蔬菜及野菜 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(449, '牛肋條串 Short Rib Strips Skewer', '2串。', 90, '牛肉烤物 Grilled Beef Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(450, 'Choice無骨牛小排串 Choice Boneless Short Rib Skewer', '2串。', 140, '牛肉烤物 Grilled Beef Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(451, '青蔥牛肉串 Beef Skewer with Scallion', NULL, 45, '牛肉烤物 Grilled Beef Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(452, '牛肉剝皮辣椒串 Beef Skewer with Peeled Chili', '唐辛子牛肉串。', 45, '牛肉烤物 Grilled Beef Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(453, '容燒秘製牛排 Signature Special Steak', '容燒特製。', 180, '牛肉烤物 Grilled Beef Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(454, '牛筋 Beef Tendon', '限量。牛肉腱。', 50, '牛肉烤物 Grilled Beef Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(455, '帶骨牛小排 Bone-In Short Rib', NULL, 180, '牛肉烤物 Grilled Beef Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(456, '和風生牛肉 Japanese Raw Beef', '和風牛。', 230, '牛肉烤物 Grilled Beef Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(457, '頂級霜降牛排 Premium Marbled Beef Steak', NULL, 320, '牛肉烤物 Grilled Beef Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(458, '松阪豬 Pork Jowl', NULL, 150, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(459, '醬烤肥腸 Grilled Pork Intestine with Sauce', NULL, 45, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(460, '豬肉剝皮辣椒 Pork with Peeled Chili', '唐辛子豚肉。', 45, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(461, '豬肉海老 Pork with Shrimp', '肉卷。', 55, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(462, '豬肉蕃茄串 Pork and Tomato Skewer', '豚串。', 45, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(463, '青蔥豬肉串 Pork Skewer with Scallion', '豚串。', 45, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(464, '培根麻吉串 Bacon and Mochi Skewer', '串。', 50, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(465, '培根金針菇串 Bacon and Enoki Mushroom Skewer', '卷。', 45, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(466, '花豬絲瓜串 Pork Belly and Sponge Gourd Skewer', '豚肉卷。', 45, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(467, '澎湖花枝墨魚香腸 Penghu Cuttlefish with Squid Sausage', NULL, 180, '豬肉及豚肉 Pork', '/storage/uploads/meals/default.png', NULL, NULL, 12),
(468, '香煎松阪豬丼飯 Pan-Fried Pork Jowl Don', NULL, 260, '人氣精選 Popular Items', '/storage/uploads/meals/13/UhJh32EwtOb17j6JXkYvQycaiF4loyfzR4YIknto.jpeg', NULL, NULL, 13),
(469, '炙燒明太子干貝奶油烏龍麵 Broiled Cod Roe and Scallop Udon with Cream Sauce', NULL, 240, '人氣精選 Popular Items', '/storage/uploads/meals/13/NGAyagE7CBnDJ3LJxnFLX0WJHzCXFTA4chpLEpdw.jpeg', NULL, NULL, 13),
(470, '唐揚雞極上丼飯 Chicken Karaage Don', NULL, 240, '人氣精選 Popular Items', '/storage/uploads/meals/13/OXhXi3qKIeKw9xXBpZJucfmca4jQFnGYXgfgen1a.jpeg', NULL, NULL, 13),
(471, '月見蔥鹽雪花牛丼 Beef Don', NULL, 260, '人氣精選 Popular Items', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(472, '香酥酸辣手羽先 (10隻) Sour and Spicy Chicken Wing', NULL, 180, '人氣精選 Popular Items', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(473, '月見蔥鹽雪花牛丼 Beef Don', NULL, 260, '丼飯及麵 Don and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(474, '熟成雞腿親子丼飯 Sous Vide Chicken Drumstick Oyakodon', NULL, 240, '丼飯及麵 Don and Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(475, '香煎松阪豬丼飯 Pan-Fried Pork Jowl Don', NULL, 260, '丼飯及麵 Don and Noodles', '/storage/uploads/meals/13/hP1zM3ZYmsGOQmEc7uhmdXXtG9osNYMCw7EuQKV3.jpeg', NULL, NULL, 13),
(476, '唐揚雞極上丼飯 Chicken Karaage Don', NULL, 240, '丼飯及麵 Don and Noodles', '/storage/uploads/meals/13/KgriDtUYbbEMgke7t29xlp9lliq23IwtwveUZru9.jpeg', NULL, NULL, 13),
(477, '炙燒明太子干貝奶油烏龍麵 Broiled Cod Roe and Scallop Udon with Cream Sauce', NULL, 240, '烏龍麵 Udon noodles', '/storage/uploads/meals/13/caRsZ7qNk7lS4W5CcVKqBaWujt5bkmJfnbVQhzf7.jpeg', NULL, NULL, 13),
(478, '嗆辣海鮮炒烏龍麵 Seafood udon noodles', NULL, 200, '烏龍麵 Udon noodles', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(479, '嗆辣雪花牛炒烏龍麵 Spicy Stir-Fried Udon with Marbled Beef', NULL, 200, '烏龍麵 Udon noodles', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(480, '濃牛奶味噌嫩雞炒烏龍麵 Creamy chicken udon noodles', NULL, 200, '烏龍麵 Udon noodles', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(481, '香煎胡麻松阪豬 Pan-Fried Sesame Pork Jowl', NULL, 150, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(482, '明太子玉子燒 Cod Roe Tamagoyaki', NULL, 120, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(483, '和風柚子雞皮仙貝 Chicken Skin and Senbei with Japanese Yuzukosho Dressing', NULL, 110, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(484, '椒鹽香酥雞皮仙貝 Deep-Fried Skin and Senbei with Pepper Salt', NULL, 110, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(485, '金磚蛋豆腐 Deep-Fried Egg Tofu', NULL, 110, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(486, '小麥所綜合滷味拼盤 Braised Combo', '百頁豆腐, 豆乾, 海帶, 小貢丸, 小辣', 120, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(487, '香酥酸辣手羽先 (10隻) Sour and Spicy Chicken Wing', NULL, 180, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(488, '香酥醬燒手羽先 (10隻) Teriyaki Chicken Wing', NULL, 180, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(489, '黃金海老炸蝦（4入）Fried Shrimps', NULL, 240, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(490, '特濃咖哩可樂餅（3入）Curry croquette', NULL, 140, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(491, '卡滋酥脆雞腿球 Fried chicken ball', NULL, 160, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(492, '壞心菇菇流沙包（3入）Sesame custard bun', NULL, 120, '小菜及炸物 Side Dish and Deep-Fried Food', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(493, '蒜香飽滿蛤蜊湯 Clam Soup with Garlic', NULL, 180, '湯品 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 13),
(494, '牛五花組合 Beef Flake Combo', '8串，必含牛肉糯米1串，其餘牛肉串隨即搭配。Eight skewed, one beef glutinous rice skewed and the others will be randomly matched.', 550, '單點 A La Crate', '/storage/uploads/meals/14/jFGd27t6xZTOC1tHbgIznQ9016toRVZQMvqaFWJK.jpeg', NULL, NULL, 14),
(495, '豬五花組合 Pork Belly Combo', '9串，必含豬肉麻糬或豬肉糯米腸1串，其餘豬肉串隨即搭配。Nine skewed, one pork mochi or pork glutinous skewed and the others will be randomly matched.', 550, '單點 A La Crate', '/storage/uploads/meals/14/t3CezMzntZJKqSTsJhPYTfpAVoX0xSwyXi3SiSi2.jpeg', NULL, NULL, 14),
(496, '海陸組合 The Surf and Turf Combo', '8串，必含草蝦仁1串與雞翅1串，其餘隨即搭配。內含牛肉、豬肉、海鮮、雞肉串。Eight skewed, one tiger shrimp skewed and one chicken wing skewed and the others will be randomly matched.', 550, '單點 A La Crate', '/storage/uploads/meals/14/GuaftneSxBSvfs8uOCNVGDcV03klrJzIErBJbcF5.jpeg', NULL, NULL, 14),
(497, '綜合組合 Mixed Combo', '14串，必含牛肉糯米1串與豬肉麻糬1串，其餘隨即搭配。內含牛肉、豬肉、海鮮、雞肉與蔬菜串。Fourteen skewed, one beef glutinous rice skewed and one pork mochi skewed and the others will be randomly matched. Including seafood, chicken, and vegetable skewed.', 900, '單點 A La Crate', '/storage/uploads/meals/14/2rEhzNOOOXjSzFMhSJfCFbtfJrbD8gMBMdu4QGiB.jpeg', NULL, NULL, 14),
(498, '單人分享 Single Share', '5串，必含豬肉糯米腸1串，其餘隨即搭配。內含牛肉、海鮮、雞肉與蔬菜串。 Five skewed, one pork glutinous rice sausage skewed and the others will be randomly matched. Including beef, seafood, chicken, vegetable skewed.', 350, '單點 A La Crate', '/storage/uploads/meals/14/VtmhSCdNJx013mWHstHuioFbkQpueXi14H7Fhcxe.jpeg', NULL, NULL, 14),
(499, '四季豆 Green Bean', NULL, 40, '人氣精選 Popular Items', '/storage/uploads/meals/15/AR3V8dkFWoUuELoXlWtMaJVj7fx3dNSyH0rIC4VB.jpeg', NULL, NULL, 15),
(500, '甜不辣 Tempura', NULL, 30, '人氣精選 Popular Items', '/storage/uploads/meals/15/vofmo2hmj2ggvWGvusQenv4zqaZj9FzI89TTVjFI.jpeg', NULL, NULL, 15),
(501, '芋頭千 Taro Cake', NULL, 30, '人氣精選 Popular Items', '/storage/uploads/meals/15/B1Ge0IiIpinzd9PYVZDqRuhLbTMsi7RqGxb8VymF.jpeg', NULL, NULL, 15),
(502, '魷魚 Squid', NULL, 60, '人氣精選 Popular Items', '/storage/uploads/meals/15/3gEqxBHjru1WbeWu2peTOtBlFEv9Xwrk01c7KSZH.jpeg', NULL, NULL, 15),
(503, '無骨鹹酥雞 Boneless Taiwanese Deep-Fried Chicken', NULL, 60, '人氣精選 Popular Items', '/storage/uploads/meals/15/Im04PtHfkUyDrbNfjS5RlVvtgooGlqcUwQ3wMIcR.jpeg', NULL, NULL, 15),
(504, '脆皮雞排 Crispy Chicken Chop', NULL, 70, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(505, '鹹酥雞軟骨 Taiwanese Deep-Fried Chicken Cartilage', NULL, 55, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(506, '柳葉魚 Shishamo', NULL, 40, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(507, '花枝丸 Cuttlefish Ball', NULL, 35, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(508, '黃金魚丸 Golden Fish Ball', NULL, 35, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(509, '雞胗 Chicken Gizzard', NULL, 35, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(510, '雞心 Chicken Heart', NULL, 35, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(511, '雞屁股 Chicken Buttock', NULL, 35, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(512, '雞皮 Chicken Skin', NULL, 35, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(513, '雞翅 Chicken Wing', NULL, 30, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(514, '魚板 Fish Patty', NULL, 20, '海陸區 The Surf and Turf', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(515, '洋蔥圈 Onion Ring', NULL, 40, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(516, '薯條 French Fries', NULL, 40, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(517, '鑫鑫腸 Mini Sausage', NULL, 35, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(518, '雞蛋豆腐 Egg Tofu', NULL, 30, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(519, '黃金薯簽粿 Golden Sweet Potato Cake', NULL, 30, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(520, '百頁豆腐 Shutter Bean Curd', NULL, 30, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(521, '小湯圓 Sticky Rice Ball', NULL, 30, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(522, '糯米腸 Glutinous Rice Sausage', NULL, 30, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(523, '蘿蔔糕 Turnip Cake', NULL, 30, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(524, '芋粿巧 Steamed Taro Cake', NULL, 30, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(525, '麥克雞塊 Chicken Nugget', NULL, 25, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(526, '銀絲卷 Silver Thread Roll', NULL, 20, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(527, '豬血糕 Pig Blood Rice Cake', NULL, 20, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(528, '豆皮 Bean Curd Sheet', NULL, 20, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(529, '豆干 Tofu Curd', NULL, 20, '點心區 Snacks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(530, '地瓜 Sweet Potato', NULL, 40, '田園區 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(531, '青椒 Green Pepper', NULL, 40, '田園區 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(532, '玉米 Corn', NULL, 40, '田園區 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(533, '玉米荀 Baby Corn', NULL, 40, '田園區 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(534, '杏鮑菇 King Oyster Mushroom', NULL, 40, '田園區 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(535, '香菇 Taiwan Mushroom', NULL, 40, '田園區 Vegetables', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(536, '可樂 Coke', '冷飲。330毫升。', 25, '飲料 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(537, '雪碧 Sprite', '冷飲。330毫升。', 25, '飲料 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(538, '原萃綠茶 Original Green Tea', '冷飲。', 30, '飲料 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(539, '2人甜蜜餐 Sharing Meal for 2', '含鹹酥雞, 魷魚, 甜不辣及四季豆。', 179, '分享餐 Sharing Meal', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(540, '4人歡樂餐 Sharing Meal for 4', '含鹹酥雞, 魷魚, 甜不辣及四季豆。', 329, '分享餐 Sharing Meal', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(541, '6人快樂餐Sharing Meal for 6', '含雞排, 鹹酥雞, 魷魚, 甜不辣, 百頁豆腐, 蘿蔔糕, 小湯圓, 豆干, 豬血糕, 地瓜及四季豆。', 409, '分享餐 Sharing Meal', '/storage/uploads/meals/default.png', NULL, NULL, 15),
(542, '台灣味麻油雞燉飯 Taiwanese Chicken Risotto with Sesame Oil', NULL, 350, '人氣精選 Popular Items', '/storage/uploads/meals/16/VQKEJlVcbRqbRVVk2Kx4LDLbivuEdRWR0XY5gPN0.jpeg', NULL, NULL, 16),
(543, '嫩煎干貝鮮蝦燉飯 Sauteed Scallop and Shrimp Risotto', NULL, 400, '人氣精選 Popular Items', '/storage/uploads/meals/16/BMfR5nCd0hsbXVF4aYthplgKh8yk7f9ntmWbx7Cf.jpeg', NULL, NULL, 16),
(544, '水牛城辣雞翅 Buffalo Spicy Chicken Wings', NULL, 300, '人氣精選 Popular Items', '/storage/uploads/meals/16/gv9vTX0rbeibehJCgzJKWdM22umBCQRgJwQLVr6x.jpeg', NULL, NULL, 16),
(545, '蒜蝦奶油蘑菇蝦 Shrimp and Mushroom with Garlic and Cream Sauce', NULL, 270, '人氣精選 Popular Items', '/storage/uploads/meals/16/5MzhsfGr0kBDfv7LZEoHz9JHRaezlHJveL0SGmvy.jpeg', NULL, NULL, 16),
(546, '薩拉米臘腸蘑菇溫沙拉 Salami Sausage and Mushroom Warm Salad', NULL, 260, '人氣精選 Popular Items', '/storage/uploads/meals/16/hyD6YEV4tUYc366L6ZZVQf15JTgJ244sIRaU94dU.jpeg', NULL, NULL, 16),
(547, 'Techno醬烤豬肋排 Signature Grilled Spare Ribs with Sauce', NULL, 570, '主食 Main Course', '/storage/uploads/meals/default.png', NULL, NULL, 16),
(548, 'Techno脆皮豬腳佐芥末醬 Signature Crispy Pork Feet with Mustard Sauce', NULL, 570, '主食 Main Course', '/storage/uploads/meals/default.png', NULL, NULL, 16),
(549, '香草嫩雞蘿勒燉飯 Vanilla Tender Chicken', NULL, 350, '燉飯 Risotto', '/storage/uploads/meals/default.png', NULL, NULL, 16),
(550, '烙烤蔬菜鮮蝦沙拉 Grilled Shrimp and Vegetables Salad', NULL, 300, '沙拉 Salad', '/storage/uploads/meals/default.png', NULL, NULL, 16),
(551, '牙買加辣燉雞 Jamaica Stewed Spicy Chicken', NULL, 270, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 16),
(552, '老墨起司烤餅 Mexican Cheese Quesadilla', NULL, 380, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 16),
(553, '珍珠紅茶拿鐵 Black Tea Latte with Tapioca', '中。 Medium.', 50, '人氣精選 Popular Items', '/storage/uploads/meals/17/B2O0nzaZyEpZOu2DMkKMm0Qm6pyGO8k9nvMZO0JZ.jpeg', NULL, NULL, 17),
(554, '大甲芋頭鮮奶 Dajia Taro Fresh Milk', '中。 Medium. 甜度固定', 60, '人氣精選 Popular Items', '/storage/uploads/meals/17/XYnyugVXhzVlibGvKb2TFilyQ9y1pH4dz1VlDT0P.jpeg', NULL, NULL, 17),
(555, '出雲抹茶鮮奶 Izumo Matcha Fresh Milk', '中。 Medium.', 65, '人氣精選 Popular Items', '/storage/uploads/meals/17/cmhZ8LKh1cSPgymXblXgtwUrKVSoBHOqVTD0cRSC.jpeg', NULL, NULL, 17),
(556, '冰萃柳丁 Iced Orange Green Tea', '大。冰沙。 Large. Slush. 沒有辦法再加配料', 50, '人氣精選 Popular Items', '/storage/uploads/meals/17/zLJ32aZqtPgwSwaVySdxn9TItS9feng6tRTHthsQ.jpeg', NULL, NULL, 17),
(557, '大正紅茶拿鐵 Traditional Black Tea Latte', '中。 Medium.', 40, '牧場鮮奶茶 Fresh Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(558, '布丁紅茶拿鐵 Egg Pudding Black Tea Latte', '中。 Medium.', 50, '牧場鮮奶茶 Fresh Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(559, '仙草凍紅茶拿鐵 Herb Jelly Black Tea Latte', '中。 Medium.', 50, '牧場鮮奶茶 Fresh Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(560, '紅豆紅茶拿鐵 Red Bean Black Tea Latte', '中。 Medium.', 50, '牧場鮮奶茶 Fresh Milk Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(561, '茉香綠茶 Jasmine Green Tea', '大。 Large.', 25, '愛茶的牛 Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(562, '大正紅茶 Traditional Black Tea', '大。 Large.', 25, '愛茶的牛 Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(563, '英倫伯爵紅茶 England Earl Grey Black Tea', '大。 Large.', 30, '愛茶的牛 Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(564, '初露青茶 Light Oolong', '大。 Large.', 30, '愛茶的牛 Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(565, '高峰烏龍綠 Mountain Oolong Green Tea', '大。 Large.', 25, '愛茶的牛 Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(566, '決明大麥 Barley Tea with Cassia', '大。 Large.', 25, '愛茶的牛 Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(567, '青採翠玉 Qing Xin Oolong Tea', '罐裝冷泡茶。 是無糖冷泡茶 沒有辦法加冰和調甜度', 35, '愛茶的牛 Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(568, '鹿谷黃金烏龍 Lugu Golden Oolong', '罐裝冷泡茶。 是無糖冷泡茶 沒有辦法加冰和調甜度', 60, '六時韻 Cold Brewed Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(569, '小山迎露 Qing Xin Oolong', '罐裝冷泡茶。 無糖冷泡茶 沒有辦法加冰或是配料', 65, '六時韻 Cold Brewed Tea', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(570, '珍珠鮮奶 Tapioca Fresh Milk', '中。 Medium.', 60, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(571, '手炒黑糖鮮奶 Handmade Brown Sugar Fresh Milk', '中。 Medium.', 60, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(572, '法芙娜純可可鮮奶Varlhona 100% Cocoa Milk', '中。 Medium.', 60, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(573, '冬瓜鮮奶 White Gourd Fresh Milk', '中。 Medium.', 55, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(574, '桂圓鮮奶 Longan Fresh Milk', '中。季節限定。 Medium. Seasonal limited drinks.', 60, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(575, '布丁鮮奶 Egg Pudding Fresh Milk', '中。冷飲。無糖。 Medium. Cold drinks. Sugar-free.', 60, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(576, '仙草凍鮮奶 Herb Jelly Fresh Milk', '中。冷飲。無糖。 Medium. Cold drinks. Sugar-free.', 55, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(577, '紅豆鮮奶 Red Bean Fresh Milk', '中。冷飲。無糖。 Medium. Cold drinks. Sugar-free.', 55, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(578, '芝麻鮮奶 Sesame Fresh Milk', '中。 Medium.', 60, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(579, '紅豆芝麻鮮奶 Sesame Fresh Milk with Red Bean', '中。冷飲。 Medium. Iced drinks.', 65, '綠光牧場鮮奶 Green Light Fresh Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(580, '大正紅茶鮮豆奶 Fresh Soybean Milk with Traditional Black Tea', '中。 Medium.', 40, '台灣鮮豆奶 Fresh Soybean Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(581, '珍珠紅茶鮮豆奶 Tapioca Fresh Soybean Milk with Black Tea', '中。 Medium.', 50, '台灣鮮豆奶 Fresh Soybean Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(582, '出雲抹茶鮮豆奶 Izumo Matcha Fresh Soybean Milk', '中。 Medium.', 60, '台灣鮮豆奶 Fresh Soybean Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(583, '冬瓜鮮豆奶 White Gourd Fresh Soybean Milk', '中。固定甜度。 Medium. Fixed sweetness level.', 50, '台灣鮮豆奶 Fresh Soybean Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(584, '布丁鮮豆奶 Egg Pudding Fresh Soybean Milk', '中。固定甜度。 Medium. Fixed sweetness level.', 60, '台灣鮮豆奶 Fresh Soybean Milk', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(585, '原鄉冬瓜茶 White Gourd Drink', '大。甜度固定。', 25, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(586, '冬瓜青茶 White Gourd Light Oolong', '大。 Large.', 40, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(587, '蜂農花蜜茶 Honey Tea', '大。冷飲。無糖。 Large. Iced drinks. Sugar free.', 45, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(588, '冰糖洛神梅 Roselle Plum Tea with Crystal Sugar', '大。甜度固定。 Large. Fixed sweetness level.', 40, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(589, '養樂多綠 Yakult Green Tea', '大。冷飲。 Large. Iced drinks.', 50, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(590, '甘蔗青茶 Sugar Cane Light Oolong', '大。 Large.', 50, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(591, '香柚綠茶 Grapefruit Green Tea', '大。冷飲。 Large. Iced drinks.', 50, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(592, '青檸香茶 Lime Tea', '大。冷飲。不可無糖。 Large. Iced drinks. Unable to make sugar free. 用檸檬皮加綠茶的手搖茶有檸檬的香沒有檸檬的酸', 50, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(593, '冬瓜檸檬 Lemon White Gourd Drinks', '大。甜度固定。', 40, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(594, '金桔檸檬 Kumquat Lemon Drinks', '大。 Large.', 45, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(595, '冰萃檸檬 Iced Lemon Tea', '大。冰沙。不可無糖。 Large. Slush. Unable to make sugar free.', 50, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(596, '柳丁綠茶 Orange Green Tea', '大。 Large. 柳丁原本甜度有', 50, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(597, '桂圓紅棗茶 Jujube Tea with Longan', '大。季節限定。 Large. Seasonal limited drinks.', 55, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(598, '阿文鮮梅綠 Jasmine Green Tea with Greengage', '大。季節限定。 Large. Seasonal limited drinks.', 55, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(599, '鳳梨青茶 Light Oolong with Pineapple', '冷飲。大杯。', 60, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(600, '鳳梨綠茶 Green Tea with Pineapple', '冷飲。大杯。', 60, '手作特調 Specials Beverage', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(601, '塑料袋 Plastic Bag', '一個袋子最多裝六杯。 1 plastic bag maximum for 6 cups.', 1, '塑料袋 Plastic Bag', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(602, '鳳梨優格飲 Pineapple Yogurt Smoothie', '中杯。固定微冰。', 80, '季節限定 Seasonal Limited', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(603, '洛神鳳梨優格飲 Roselle and Pineapple Yogurt Smoothie', '中杯。固定微冰。', 75, '季節限定 Seasonal Limited', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(604, '宜蘭金棗優格飲 Kumquat Yogurt Smoothie', '中杯。固定微冰。', 80, '季節限定 Seasonal Limited', '/storage/uploads/meals/default.png', NULL, NULL, 17),
(605, '慢燉手拆豬潛艇堡 Sous Vide Pork Shoulder Subs', '含17厘米潛艇堡及500毫升飲料乙杯。18小時低烹肩胛豬, 蘋果BBQ醬及九層塔。 Served with 17cm Subs and a 500cc drinks. 18 hours low-cooked pork shoulder, apple BBQ sauce, and basil.', 139, '人氣精選 Popular Items', '/storage/uploads/meals/18/vVeXtZw56oy8hXLpTJcoHeYEFZuvUVBW8ajjGYxK.jpeg', NULL, NULL, 18),
(606, '梅花秘醬潛艇堡 BBQ Pork Boston Butt Subs', '含17厘米潛艇堡及500毫升飲料乙杯。50%筋肉梅花豬, 酷皮秘醬及蔥花。 Served with 17cm Subs and a 500cc drinks. 50% pork blade shoulder with tendon meat, signature special sauce, and scallion.', 139, '人氣精選 Popular Items', '/storage/uploads/meals/18/cJAmagfLRk1s18hbTs2lGjiWdEGRb89k2oMGeKcs.jpeg', NULL, NULL, 18),
(607, '轟脆嫩雞潛艇堡 Deep-Fried Chicken Thigh with Chili Garlic Subs', '含17厘米潛艇堡及500毫升飲料乙杯。脆炸雞腿排, 脆雞皮, 爽脆椒麻醬及香菜。 Served with 17cm Subs and a 500cc drinks. Crispy chicken thigh, crispy chicken skin, crispy pepper sauce, and coriander.', 149, '人氣精選 Popular Items', '/storage/uploads/meals/18/3H6C8C44jET31EPNjtEddgPrZnC84d6n2vzoL6Kn.jpeg', NULL, NULL, 18),
(608, '酷皮燒肉潛艇堡 Crispy Cool Pork Belly Subs', '含17厘米潛艇堡及500毫升飲料乙杯。酷皮燒肉, 檸檬, 小黃瓜, 蔥花及香菜。每日限量。 Served with 17cm Subs and a 500cc drinks. Crispy roasted pork, lemon, cucumber, scallion, and coriander. Daily limited.', 139, '人氣精選 Popular Items', '/storage/uploads/meals/18/LZx6OeC913lJMWSBldkgSNtMxLLJqD2pas8GRp1W.jpeg', NULL, NULL, 18),
(609, '金針豆包蔬食潛艇堡 Orange Daylily Mushroom and Dried Bean Curd Subs', '含17厘米潛艇堡及500毫升飲料乙杯。太麻里金針花, 中興嶺香菇, 豆包及香菜。 Served with 17cm Subs and a 500cc drinks. Orange daylily, Taiwan Mushroom, bean curd sheet roll, and coriander. 全素 Vegan', 149, '人氣精選 Popular Items', '/storage/uploads/meals/18/Zb7NpLq14hDxDUxxx3IApPZFSSFXGa9Zk0wlvsWk.jpeg', NULL, NULL, 18),
(610, '金牌脆魚潛艇堡 Beer Battered Ocean Fish Subs', '含17厘米潛艇堡及500毫升飲料乙杯。酷皮脆魚, 金牌啤酒麵糊, 酸瓜塔塔醬及酷皮泡菜。Served with 17cm Subs and a 500cc drinks. Signature crispy fish, gold medal beer batter, pickled tartar sauce, and signature kimchi.', 159, '超值全餐 Super Value Meal', '/storage/uploads/meals/default.png', NULL, NULL, 18),
(611, '櫻桃鴨拉麵 Cherry Duck Ramen', '湯量’內用’與‘外送’相同 如需湯多,可另外加點豚骨湯', 190, '人氣精選 Popular Items', '/storage/uploads/meals/19/jvU9DOHpDpmlMYxShVxoykX2tvRQbcl7MN1o0uui.jpeg', NULL, NULL, 19),
(612, '牛肋拉麵 Short Rib Ramen', '湯量’內用’與‘外送’相同 如需湯多,可另外加點豚骨湯', 210, '人氣精選 Popular Items', '/storage/uploads/meals/19/W56h5M5Jp2R8pPdWlKjELIMnQRitZvviDsbdPSR1.jpeg', NULL, NULL, 19),
(613, '頑者乾拌麵 Signature Tossed Noddles', NULL, 80, '人氣精選 Popular Items', '/storage/uploads/meals/19/s6DeaMtvqSf1KNS4Y4GYHkigCEKm1VCYselluFEJ.jpeg', NULL, NULL, 19),
(614, '頑者拉麵 Signature Pork Ramen', '湯量’內用’與‘外送’相同 如需湯多,可另外加點豚骨湯', 120, '人氣精選 Popular Items', '/storage/uploads/meals/19/HJ0IxCvP1sQU4IbePu0FgiTpEwntPoyximtso4b3.jpeg', NULL, NULL, 19),
(615, '黑豚雙肋拉麵 Pork Ribs Ramen', '湯量’內用’與‘外送’相同 如需湯多,可另外加點豚骨湯', 250, '人氣精選 Popular Items', '/storage/uploads/meals/19/4S7oGattRTKAktpXakwEkLBuWfm2tUvVVrhEZBxC.jpeg', NULL, NULL, 19),
(616, '黑豚單肋拉麵Pork Ribs Ramen', '湯量’內用’與‘外送’相同 如需湯多,可另外加點豚骨湯', 180, '人氣精選 Popular Items', '/storage/uploads/meals/default.png', NULL, NULL, 19),
(617, '蛤蠣拉麵Clams Ramen', '湯量’內用’與‘外送’相同 如需湯多,可另外加點豚骨湯', 180, '人氣精選 Popular Items', '/storage/uploads/meals/default.png', NULL, NULL, 19),
(618, '泡菜 Kimchi', NULL, 40, '頑者一品 Signature Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 19),
(619, '半熟玉子 Coddled Egg', NULL, 30, '頑者一品 Signature Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 19),
(620, '小魚辣蘿蔔 Spicy Daikon with Anchovies', NULL, 50, '頑者一品 Signature Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 19),
(621, '秘製黃瓜 Special Cucumber', NULL, 50, '頑者一品 Signature Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 19),
(622, '金邊牛肉粒炒飯 Signature Stir-Fried Rice with Cubed Beef', NULL, 120, '人氣精選 Popular Items', '/storage/uploads/meals/20/l2Eer5epohXOCZfZWSN4PdWglAyNYTaIBgM2IlRT.jpeg', NULL, NULL, 20),
(623, '生牛肉河粉湯 Flat Rice Noodles with Raw Beef', NULL, 105, '人氣精選 Popular Items', '/storage/uploads/meals/20/EyoMyHo1v6HKyrZy5H4kfL6N7lmZ59Q2qD5DBQqq.jpeg', NULL, NULL, 20),
(624, '椒麻雞 Spicy Chicken', NULL, 200, '人氣精選 Popular Items', '/storage/uploads/meals/20/CjBpA9yQ65tpMZACsdWVYEJrBrvcpyd9g4jaFDzp.jpeg', NULL, NULL, 20),
(625, '月亮蝦餅 Deep-Fried Shrimp Pancake', NULL, 220, '人氣精選 Popular Items', '/storage/uploads/meals/20/2TBATn7WxoLW3IR4SinwUpHjF0EhTnh1kx1EhNq5.jpeg', NULL, NULL, 20),
(626, '乾炒牛肉河粉 Dry-Fried Flat Rice Noodles with Beef', NULL, 105, '人氣精選 Popular Items', '/storage/uploads/meals/20/f0Jeo9haHcmng9cNtghxNXBWbyyzQVBPYzweOu4w.jpeg', NULL, NULL, 20),
(627, '涼拌青木瓜絲 Cold Shredded Green Papaya', NULL, 110, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(628, '招牌辣味雞胗 Signature Spicy Chicken Gizzard', NULL, 110, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(629, '和風洋蔥 Japanese Onion', NULL, 75, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(630, '魚蛋沙拉 Roe Salad', NULL, 150, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(631, '涼拌海鮮 Cold Seafood', NULL, 200, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(632, '越南炸春捲 Vietnam Deep-Fried Spring Roll', NULL, 110, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(633, '清炒雙鮮 Stir-Fried Assorted Seafood', NULL, 180, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(634, '金沙蝦球 Deep-Fried Shrimp with Salty Yolk', NULL, 220, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(635, '金沙中卷 Squid with Salty Yolk', NULL, 240, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(636, '蝦醬空心菜 Water Spinach with Shrimp Paste', NULL, 100, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(637, '炒高麗菜 Stir-Fried Cabbage', NULL, 100, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(638, '越式炒牛肉粒 Vietnamese Stir-Fried Cubed Beef', NULL, 180, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(639, '蔥爆牛肉 Stir-Fried Beef with Scallion', NULL, 160, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(640, '沙茶牛肉 Beef with Shacha Sauce', NULL, 160, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(641, '白飯 Rice', NULL, 15, '特色單點類 Special A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(642, '酸辣牛肉河粉湯 Sour and Spicy Soup Flat Rice Noodles with Beef', NULL, 105, '河粉類 Flat Rice Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(643, '滷牛肉河粉湯 Soup Flat Rice Noodles with Braised Beef', NULL, 105, '河粉類 Flat Rice Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(644, '越南海鮮河粉湯 Soup Pho with Seafood', '湯。', 105, '河粉類 Flat Rice Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(645, '乾炒海鮮河粉 Dry-Fried Flat Rice Noodles with Seafood', NULL, 105, '河粉類 Flat Rice Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(646, '乾炒羊肉河粉 Dry-Fried Flat Rice Noodles with Lamb', NULL, 105, '河粉類 Flat Rice Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(647, '乾炒豬肉河粉 Dry-Fried Flat Rice Noodles with Pork', NULL, 105, '河粉類 Flat Rice Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(648, '涼拌排骨米線 Cold Thick Rice Noodles with Pork Ribs', NULL, 105, '河粉類 Flat Rice Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(649, '櫻花蝦炒飯 Stir-Fried Rice with Sakura Shrimp', NULL, 90, '炒飯類 Stir-Fried Rice', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(650, '蝦仁炒飯 Stir-Fried Rice with Shrimp', NULL, 90, '炒飯類 Stir-Fried Rice', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(651, '鳳梨炒飯 Stir-Fried Rice with Pineapple', NULL, 90, '炒飯類 Stir-Fried Rice', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(652, '羊肉炒飯 Stir-Fried Rice with Lamb', NULL, 90, '炒飯類 Stir-Fried Rice', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(653, '豬肉炒飯 Stir-Fried Rice with Pork', NULL, 80, '炒飯類 Stir-Fried Rice', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(654, '牛肉燴飯 Beef Stewed Rice', NULL, 95, '燴飯類 Stewed Rice', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(655, '羊肉燴飯 Lamb Stewed Rice', NULL, 95, '燴飯類 Stewed Rice', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(656, '豬肉燴飯 Pork Stewed Rice', NULL, 85, '燴飯類 Stewed Rice', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(657, '炸排骨飯 Deep-Fried Pork Ribs Rice', '國定假日不供應。', 95, '快餐類 Special Meal', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(658, '泰式打拋豬飯 Thai Stir-Fried Basil Pork Rice', '國定假日不供應。', 95, '快餐類 Special Meal', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(659, '油雞飯 Soy Sauce Chicken Rice', '國定假日不供應。', 95, '快餐類 Special Meal', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(660, '紅燒牛肉飯 Braised Beef Rice', '國定假日不供應。', 105, '快餐類 Special Meal', '/storage/uploads/meals/default.png', NULL, NULL, 20),
(661, '韓式辣味鍋貼套餐 Korean Spicy Pan-Fried Dumpling Combo', '一份10顆。 One portion 10 pieces. 小辣 Mild', 85, '人氣精選 Popular Items', '/storage/uploads/meals/21/SxwKCSJDykp44uxgKVbu7w65Q528uNj36hVQTCLU.jpeg', NULL, NULL, 21),
(662, '紹辣乾麵 Spicy Dried Noodles', NULL, 49, '人氣精選 Popular Items', '/storage/uploads/meals/21/8VEnsVeLVBQqGx3Fe51Tbfp3ia88YCk9DfMto3SD.jpeg', NULL, NULL, 21),
(663, '珍珠抄手 Pork Wonton', '小顆。8粒。 Small. 8 pieces.', 50, '人氣精選 Popular Items', '/storage/uploads/meals/21/i4UCQvmzcAovn2umPMW4ANyBx4KKul6mxsGNLyiJ.jpeg', NULL, NULL, 21),
(664, '菜肉大餛飩湯麵 Vegetable and Pork Wonton Soup Noodles', NULL, 65, '人氣精選 Popular Items', '/storage/uploads/meals/21/oWJJHeWEK2Plc9sM6oIUaFZJC7PYBJ48FyOnalrn.jpeg', NULL, NULL, 21),
(665, '蕈菇湯 Straw Mushroom Soup', NULL, 30, '人氣精選 Popular Items', '/storage/uploads/meals/21/0JY8sfhDjWSDalnTQvdlhLyPa1jBbNO6jkgFcKKc.jpeg', NULL, NULL, 21),
(666, '招牌鍋貼 Signature Pan-Fried Dumpling', '5粒。 5 pieces.', 25, '鍋貼 Pan-Fried Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(667, '韭菜鍋貼 Pan-Fried Chive Dumpling', '5粒。 5 pieces.', 25, '鍋貼 Pan-Fried Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(668, '韓式辣味鍋貼 Korean Spicy Pan-Fried Dumpling', '5粒。 5 pieces.', 25, '鍋貼 Pan-Fried Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(669, '咖哩鍋貼 Pan-Fried Curry Dumpling', '5粒。 5 pieces.', 25, '鍋貼 Pan-Fried Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(670, '田園蔬菜鍋貼 Pan-Fried Vegetable Dumpling', '5粒。 5 pieces.', 25, '鍋貼 Pan-Fried Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(671, '玉米鍋貼 Pan-Fried Corn Dumpling', '5粒。 5 pieces.', 25, '鍋貼 Pan-Fried Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(672, '招牌水餃 Signature Dumpling', '5粒。 5 pieces.', 25, '水餃 Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(673, '韭菜水餃 Chive Dumpling', '5粒。 5 pieces.', 25, '水餃 Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(674, '韓式辣味水餃 Korean Spicy Dumpling', '5粒。 5 pieces.', 25, '水餃 Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(675, '咖哩水餃 Curry Dumpling', '5粒。 5 pieces.', 25, '水餃 Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(676, '田園蔬菜水餃 Vegetables Dumpling', '5粒。 5 pieces.', 25, '水餃 Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(677, '玉米水餃 Corn Dumpling', '5粒。 5 pieces.', 25, '水餃 Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(678, '鮮蝦水餃 Shrimp Dumpling', '5粒。 5 pieces.', 40, '水餃 Dumplings', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(679, '酸辣湯餃 Sour and Spicy Dumplings in Soup', '8顆。 8 pieces. 小辣 Mild', 70, '湯餃 Dumplings in Soup', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(680, '玉米湯餃 Corn Dumpling in Soup', '8顆。 8 pieces.', 70, '湯餃 Dumplings in Soup', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(681, '鮮蝦湯餃 Shrimp Dumpling in Soup', '8顆。 8 pieces.', 94, '湯餃 Dumplings in Soup', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(682, '古早味乾麵 Traditional Dried Noodles', NULL, 35, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(683, '特調乾麵 Special Dried Noodles', '微辣 Less Spicy', 35, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(684, '麻醬乾麵 Sesame Sauce Dried Noodles', NULL, 40, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(685, '醡醬乾麵 Soybean Paste Dried Noodles', NULL, 45, '乾麵 Dried Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(686, '古早味湯麵 Traditional Soup Noodles', NULL, 35, '湯麵 Soup Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(687, '酸辣湯麵 Sour and Spicy Soup Noodles', NULL, 55, '湯麵 Soup Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(688, '珍珠餛飩湯麵 Pork Wonton Soup Noodles', NULL, 55, '湯麵 Soup Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(689, '紹辣珍珠餛飩湯麵 Spicy Pork Wonton Soup Noodles', NULL, 69, '湯麵 Soup Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(690, '紹辣菜肉大餛飩湯麵 Spicy Vegetable and Pork Wonton Soup Noodles', NULL, 79, '湯麵 Soup Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(691, '玉米濃湯 Corn Chowder', NULL, 30, '湯品 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(692, '旗魚花枝丸湯 Marlin and Cuttlefish Ball Soup', NULL, 30, '湯品 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(693, '酸辣湯 Sour and Spicy Soup', NULL, 30, '湯品 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(694, '蘿蔔排骨湯 Pork Ribs Soup with Radish', NULL, 35, '湯品 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(695, '珍珠餛飩湯 Pork Wonton Soup', NULL, 40, '湯品 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(696, '菜肉大餛飩湯 Vegetable and Pork Wonton Soup', NULL, 50, '湯品 Soup', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(697, '無糖豆漿 Sugar-Free Soybean Milk', NULL, 17, '飲品 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(698, '黑豆漿 Black Soybean Milk', NULL, 17, '飲品 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(699, '白豆漿 White Soybean Milk', NULL, 17, '飲品 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(700, '真傳紅茶 Signature Black Tea', NULL, 20, '飲品 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(701, '寒天真傳紅茶 Black Tea with Agar', NULL, 45, '飲品 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(702, '寒天薏仁豆漿 Soybean Milk with Pearl Barley and Agar', NULL, 45, '飲品 Drinks', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(703, '菜肉大抄手 Vegetable and Pork Wonton', '大顆。6粒。 Large. 6 pieces.', 65, '抄手 Wonton', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(704, '滷蛋 Braised Egg', NULL, 10, '小菜 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(705, '黃金豆腐 Golden Tofu', NULL, 30, '小菜 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(706, '燙青菜 Blanched Vegetables', NULL, 30, '小菜 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(707, '燉蘿蔔 Stewed Radish', NULL, 30, '小菜 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(708, '黃金泡菜 Golden Kimchi', NULL, 30, '小菜 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(709, '韓式泡菜 Korean Kimchi', NULL, 30, '小菜 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(710, '台式泡菜 Taiwanese Kimchi', NULL, 30, '小菜 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(711, '薄鹽毛豆 Salted Edamame', NULL, 30, '小菜 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(712, '招牌鍋貼套餐 Signature Pan-Fried Dumpling Combo', '一份10顆。 One portion 10 pieces.', 80, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(713, '招牌水餃套餐 Signature Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(714, '韭菜鍋貼套餐 Pan-Fried Chive Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(715, '咖哩鍋貼套餐 Pan-Fried Curry Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(716, '田園蔬菜鍋貼套餐 Pan-Fried Vegetable Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(717, '玉米鍋貼套餐 Pan-Fried Corn Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(718, '韭菜水餃套餐 Chive Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(719, '韓式辣味水餃套餐 Korean Spicy Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21);
INSERT INTO `meals` (`MealID`, `MealName`, `MealDesc`, `MealPrice`, `MealType`, `MealImage`, `MealDetails`, `MealQuantity`, `ShopID`) VALUES
(720, '咖哩水餃套餐 Curry Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(721, '田園蔬菜水餃套餐 Vegetables Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(722, '玉米水餃套餐 Corn Dumpling Combo', '一份10顆。 One portion 10 pieces.', 85, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(723, '鮮蝦水餃套餐 Shrimp Dumpling Combo', '一份10顆。 One portion 10 pieces.', 115, '升級套餐 Upgrade Combo', '/storage/uploads/meals/default.png', NULL, NULL, 21),
(724, '毛豆 Edamame', NULL, 48, '人氣精選 Popular Items', '/storage/uploads/meals/22/L6us2uyT4ZMfJ7rE8WRac37HWSN8cQIpcYMhGOTb.jpeg', NULL, NULL, 22),
(725, '鴨掌 Duck Feet', NULL, 48, '人氣精選 Popular Items', '/storage/uploads/meals/22/rRBUl5dgwJRKEj0DSmtK1l6RCjDsYzi2ylHNpZNy.jpeg', NULL, NULL, 22),
(726, '鴨翅 Duck Wing', NULL, 48, '人氣精選 Popular Items', '/storage/uploads/meals/22/QIZ0Hlj07QP3cOEtdRehnLqdt8OHyRrbDiwIoaOY.jpeg', NULL, NULL, 22),
(727, '一鴨二吃 Two of Eating Roasted Duck', NULL, 350, '人氣精選 Popular Items', '/storage/uploads/meals/22/gPAix4nyLfDv1WfO77YQ57DfAiBEe4QDerxxH7xE.jpeg', NULL, NULL, 22),
(728, '鴨舌 Duck Tongue', NULL, 120, '滷味 Braised Food', '/storage/uploads/meals/default.png', NULL, NULL, 22),
(729, '鳳爪 Chicken Feet', NULL, 48, '滷味 Braised Food', '/storage/uploads/meals/default.png', NULL, NULL, 22),
(730, '雞胗 Chicken Gizzard', NULL, 48, '滷味 Braised Food', '/storage/uploads/meals/default.png', NULL, NULL, 22),
(731, '暹邏甜辣醬佐豬腰內肉便當 Pork Tenderloin with Sweet and Spicy Sauce Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg, and one sweet potato. 小辣 Mild', 110, '人氣精選 Popular Items', '/storage/uploads/meals/23/Gqz6yCapNqFevRLDeLKTa8MHD1PGIxW0tYvzeH2G.jpeg', NULL, NULL, 23),
(732, '加州田園農場醬佐雞胸便當 Chicken Breast with Ranch Sauce Bento', '附一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side dish, half hard boiled egg, and one sweet potato.', 110, '人氣精選 Popular Items', '/storage/uploads/meals/23/3MSz0DtiUaDE86udSlmDQ8SCvAkzGSWoC53L95D8.jpeg', NULL, NULL, 23),
(733, '低鹽清滷雞腿便當 Light Salted Braised Chicken Drumstick Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg, and one sweet potato.', 120, '人氣精選 Popular Items', '/storage/uploads/meals/23/l2LHGpbluiuvGSewWFABUMiemCiMgh2lxpJh6ROr.jpeg', NULL, NULL, 23),
(734, '玫瑰鹽烤骰子牛肉便當 Grilled Diced Beef with Rose Salt Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg and one sweet potato.', 190, '人氣精選 Popular Items', '/storage/uploads/meals/23/YXkBkWPpZ9kSlSr3wFYzlizLmq41FJTq63xdwJdC.jpeg', NULL, NULL, 23),
(735, '挪威烤鯖魚便當 Grilled Norway Mackerel Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg, and one sweet potato.', 130, '人氣精選 Popular Items', '/storage/uploads/meals/23/BYh1sA4OKSd03N6pd3ULDlt9HAVRKJpECo7bjQJH.jpeg', NULL, NULL, 23),
(736, '蔬菜五穀米便當 Five Grain Rice with Vegetable Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg, and one sweet potato.', 80, '便當套餐 Rice Set', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(737, '海鹽牛五花肉片便當 Sliced Beef Flake with Sea Salt Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg, and one sweet potato.', 130, '便當套餐 Rice Set', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(738, '雙倍雞胸便當 Double Chicken Breast Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg, and one sweet potato.', 160, '便當套餐 Rice Set', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(739, '雞胸及豬腰內便當 Chicken Breast and Pork Tenderloin Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg, and one sweet potato.', 160, '便當套餐 Rice Set', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(740, '豬腰內及牛五花便當 Pork Tenderloin with Beef Flake Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg, and one sweet potato.', 190, '便當套餐 Rice Set', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(741, '雞胸及牛五花便當 Beef Flake with Chicken Breast Bento', '含一份藜麥飯, 二份水煮蔬菜, 一份小菜, 半顆水煮蛋及一份地瓜。 Serve with one quinoa rice, two boiled vegetables, one side, half hard boiled egg, and one sweet potato.', 190, '便當套餐 Rice Set', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(742, '整顆水煮蛋 Whole Hard Boiled Egg', NULL, 15, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(743, '藜麥飯 Quinoa Rice', NULL, 15, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(744, '醬料 Sauce', NULL, 15, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(745, '蔬菜 Vegetables', NULL, 25, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(746, '雞胸 Chicken Breast', NULL, 55, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(747, '豬腰內肉 Pork Tenderloin', NULL, 55, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(748, '滷雞腿 Braised Chicken Drumstick', NULL, 65, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(749, '海鹽牛五花肉 Sea Salt Beef Flake', NULL, 80, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(750, '挪威烤鯖魚 Grilled Norway Mackerel', NULL, 80, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(751, '玫瑰鹽烤骰子牛肉 Grilled Diced Beef with Rose Salt', NULL, 135, '單點 A La Carte', '/storage/uploads/meals/default.png', NULL, NULL, 23),
(752, '炒麵 Stir-Fried Noodles', '古法無添加麵條。', 40, '人氣精選 Popular Items', '/storage/uploads/meals/24/ZnaudQwuZlOm2IZBEj5IwX6IRFR5HeYlaOpTlRCo.jpeg', NULL, NULL, 24),
(753, '雞肉飯 Chicken Rice', NULL, 45, '人氣精選 Popular Items', '/storage/uploads/meals/24/XFzr8RSkkVa4F6y4V7Qj72divueER6TgcHTMsYxK.jpeg', NULL, NULL, 24),
(754, '滷豆腐 Braised Tofu', NULL, 20, '人氣精選 Popular Items', '/storage/uploads/meals/24/JD52sNmyeIdDCtDXevTFuATWCkJpjBwyfHzqf8Mh.jpeg', NULL, NULL, 24),
(755, '肉焿湯 Pork Starch with Thicken Soup', NULL, 50, '人氣精選 Popular Items', '/storage/uploads/meals/24/DfsRgsgMe4ocxG5qZISt6ENJgy2xI2u8f27H4bbL.jpeg', NULL, NULL, 24),
(756, '紅麴滷肉飯 Braised Pork Rice with Anka', '一級壽司米。', 45, '人氣精選 Popular Items', '/storage/uploads/meals/24/0Y5OTg3cQJzSHPCrB7VUOpFnhOQJLKoipA7dHaHi.jpeg', NULL, NULL, 24),
(757, '滷鴨蛋 Braised Duck Egg', NULL, 20, '小菜類 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(758, '燙時蔬 Blanched Seasonal Vegetable', NULL, 40, '小菜類 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(759, '冷盤小菜 Cold Side Dishes', '每日隨機。 Randomly pickled and daily dish.', 40, '小菜類 Side Dishes', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(760, '雞滷飯 Braised Chicken and Pork Rice', '雞肉及滷肉飯。', 45, '飯類 Rice', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(761, '阿嬤的爌肉飯 Soy-Stewed Pork Rice', '限量。根據阿嬤食譜研製。', 85, '飯類 Rice', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(762, '肉焿飯 Pork Starch Rice', '使用一級壽司米。', 75, '焿品類 Thicken Soup', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(763, '肉焿麵 Pork Starch Noodles', '古法無添加麵條。', 75, '焿品類 Thicken Soup', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(764, '肉焿米粉 Pork Starch Rice Noodles', '細條口感佳。', 75, '焿品類 Thicken Soup', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(765, '清焿飯 Plain Thicken with Rice', '不含肉焿。', 50, '焿品類 Thicken Soup', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(766, '清焿麵 Plain Thicken Noodles', '不含肉焿。', 50, '焿品類 Thicken Soup', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(767, '清焿米粉 Plain Thicken Rice Noodles', '不含肉焿。', 50, '焿品類 Thicken Soup', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(768, '炒米粉 Stir-Fried Rice Noodles', '細條口感佳。', 40, '麵及米粉類 Noodles And Rice Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(769, '綜合米粉及麵 Mixed Rice Noodles and Noodles', '多重口感。', 40, '麵及米粉類 Noodles And Rice Noodles', '/storage/uploads/meals/default.png', NULL, NULL, 24),
(770, '又見檸檬塔 High Mountain Pouchong Tea with Lemon Juice and Mousse', '玉露青茶+青檸原汁+奶蓋慕思。(糖度冰量固定) (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 90, '人氣精選 Popular Items', '/storage/uploads/meals/25/vl3VgmMjvasSxymj6PO0gibEs0Scpu5tiAeTgHpb.jpeg', NULL, NULL, 25),
(771, '國王珍珠奶茶 Bubble Milk Tea', '鳳眉红茶+皇家厚奶+國王珍珠。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 95, '人氣精選 Popular Items', '/storage/uploads/meals/25/sCL22t3oM54GTL7N0sUleL5TralQvX8iVDrQ0n45.jpeg', NULL, NULL, 25),
(772, '熔岩黑糖波霸鮮奶 Fresh Milk with Brown Sugar Bubble', '香醇鮮奶+古法黑糖+國王珍珠。(糖度冰量固定) (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 95, '人氣精選 Popular Items', '/storage/uploads/meals/25/11gEz7qV76pQHTrXOkkffDDuTOXIORcV9t8MguSy.jpeg', NULL, NULL, 25),
(773, '凍頂烏龍鮮奶茶 Dong Ding Oolong Tea Latte', '凍頂烏龍+香醇鮮奶。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 80, '人氣精選 Popular Items', '/storage/uploads/meals/25/gGcpVC4UT6mHBx44vVYu9bAwg4cG7vhwkr4FI91Z.jpeg', NULL, NULL, 25),
(774, '青檸芬朵西 Lemon Condensed Milk', '青檸原汁+特濃牛乳。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 80, '人氣精選 Popular Items', '/storage/uploads/meals/25/Lu6mTQlJdtTmViujBPZWu4kdEAZ9AreUaXN5xYA2.jpeg', NULL, NULL, 25),
(775, '決明烏龍奶蓋 Cassia Black Tea with Mousse', '决明子紅烏龍+奶蓋慕思。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 80, '人氣精選 Popular Items', '/storage/uploads/meals/25/E4nwHuRHXb1av8fvYgVYVYTIIFeNnZEOMNzBkC8i.jpeg', NULL, NULL, 25),
(776, '水仙桂花蜜 Honey Osmanthus Oolong Tea', '水仙桂花及百花香蜜。 Osmanthus and passion fruit honey.', 80, '人氣精選 Popular Items', '/storage/uploads/meals/25/4mBCm4t5TvKob2FBxpQAdveKxEzTbE6U0oRggb7W.jpeg', NULL, NULL, 25),
(777, '松針綠茶 Green Tea', '帶有茉莉花的清香，尾韻回甘，清爽甘甜。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 65, '客製化鮮萃研磨茶 Fresh Tea', '/storage/uploads/meals/default.png', NULL, NULL, 25),
(778, '水仙桂花 Osmanthus Oolong Tea', '帶有桂花香氣，口感清爽，搭配百花香蜜是很多客人喜愛的搭配 。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 65, '客製化鮮萃研磨茶 Fresh Tea', '/storage/uploads/meals/default.png', NULL, NULL, 25),
(779, '玉露青茶 High Mountain Pouchong Tea', '茶葉自帶有獨特奶香味，為純天然茶種，濃郁甘醇。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 65, '客製化鮮萃研磨茶 Fresh Tea', '/storage/uploads/meals/default.png', NULL, NULL, 25),
(780, '鳳眉紅茶 Black Tea', '屬於重烘焙茶種，口感醇厚，甘甜持久。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 65, '客製化鮮萃研磨茶 Fresh Tea', '/storage/uploads/meals/default.png', NULL, NULL, 25),
(781, '凍頂烏龍 Dong Ding Oolong Tea', '喝起來有炭焙香氣，屬於重烘焙的口感。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 65, '客製化鮮萃研磨茶 Fresh Tea', '/storage/uploads/meals/default.png', NULL, NULL, 25),
(782, '決明子紅烏龍 Cassia Black Tea', '茶香味較濃郁，帶有咖啡的香氣 ，是吃茶三千特殊飲品。 (提醒您，此平台訂單恕無法累積吃茶三千會員點數。)', 65, '客製化鮮萃研磨茶 Fresh Tea', '/storage/uploads/meals/default.png', NULL, NULL, 25);

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
-- 最後更新： 
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

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`OrdersID`, `OrdersNum`, `OrdersDetails`, `OrdersCreate`, `OrdersUpdate`, `OrdersStatus`, `MemberID`, `ShopID`) VALUES
(1, 'CY20191004001', '{\"restaurant\":\"CY\",\"memberName\":\"Jennifer\",\"meal\":[{\"mealQuantity\":\"1\",\"mealName\":\"冰淇淋紅茶\",\"mealUnitPrice\":\"70\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"2\",\"mealName\":\"珍珠奶茶\",\"mealUnitPrice\":\"70\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-04 00:00:00', '2019-10-04 00:00:00', 3, 1, 1),
(2, 'CY20191004002', '{\"restaurant\":\"CY5\",\"memberName\":\"Panda\",\"meal\":[{\"mealQuantity\":\"4\",\"mealName\":\"紅茶\",\"mealUnitPrice\":\"10\",\r\n    \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"2\",\"mealName\":\"奶茶\",\"mealUnitPrice\":\"70\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-05 00:00:00', '2019-10-05 00:00:00', 3, 1, 1),
(3, 'CY20191004003', '{\"restaurant\":\"CY\",\"memberName\":\"Bear\",\"meal\":[{\"mealQuantity\":\"2\",\"mealName\":\"可不可紅茶超級大杯\",\"mealUnitPrice\":\"66\",\r\n    \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"50\",\"mealName\":\"超級滷肉飯\",\"mealUnitPrice\":\"100\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n    {\"mealQuantity\":\"1\",\"mealName\":\"青菜\",\"mealUnitPrice\":\"30\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-05 00:00:00', '2019-10-05 00:00:00', 3, 1, 1),
(4, 'CY20191004004', '{\"restaurant\":\"CY5\",\"memberName\":\"Lebron\",\"meal\":[{\"mealQuantity\":\"2\",\"mealName\":\"可不可紅茶超級大杯\",\"mealUnitPrice\":\"66\",\r\n    \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"50\",\"mealName\":\"超級滷肉飯加滷蛋\",\"mealUnitPrice\":\"100\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n    {\"mealQuantity\":\"1\",\"mealName\":\"青菜不要高麗菜\",\"mealUnitPrice\":\"199\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-05 00:00:00', '2019-10-05 00:00:00', 3, 1, 1),
(5, 'CY20191004005', '{\"restaurant\":\"CY\",\"memberName\":\"Chris\",\"meal\":[{\"mealQuantity\":\"2\",\"mealName\":\"可不可紅茶超級大杯中杯小杯\",\"mealUnitPrice\":\"66\",\r\n    \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"50\",\"mealName\":\"超級滷肉飯加滷蛋\",\"mealUnitPrice\":\"100\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n    {\"mealQuantity\":\"1\",\"mealName\":\"青菜不要高麗菜\",\"mealUnitPrice\":\"199\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-05 00:00:00', '2019-10-05 00:00:00', 1, 1, 1),
(6, 'CY20191004006', '{\"restaurant\":\"CY3\",\"memberName\":\"Chris\",\"meal\":[{\"mealQuantity\":\"2\",\"mealName\":\"可不可紅茶超級大杯中杯小杯\",\"mealUnitPrice\":\"66\",\r\n    \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"50\",\"mealName\":\"超級滷肉飯加滷蛋\",\"mealUnitPrice\":\"100\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n    {\"mealQuantity\":\"50\",\"mealName\":\"超級滷肉飯加滷蛋\",\"mealUnitPrice\":\"100\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"1\",\"mealName\":\"青菜不要高麗菜\",\"mealUnitPrice\":\"199\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-05 00:00:00', '2019-10-05 00:00:00', 1, 1, 1),
(7, 'CY20191004007', '{\"restaurant\":\"CY3\",\"memberName\":\"克里斯伊凡\",\"meal\":[{\"mealQuantity\":\"2\",\"mealName\":\"可不可紅茶超級大杯中杯小杯\",\"mealUnitPrice\":\"66\",\r\n    \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"50\",\"mealName\":\"超級滷肉飯加滷蛋\",\"mealUnitPrice\":\"100\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n    {\"mealQuantity\":\"50\",\"mealName\":\"超級滷肉飯加滷蛋\",\"mealUnitPrice\":\"100\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"1\",\"mealName\":\"青菜不要高麗菜\",\"mealUnitPrice\":\"199\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-05 00:00:00', '2019-10-05 00:00:00', 1, 1, 1),
(8, 'CY20191004009', '{\"restaurant\":\"CY\",\"memberName\":\"克里斯伊凡\",\"meal\":[{\"mealQuantity\":\"2\",\"mealName\":\"可不可紅茶超級大杯中杯小杯\",\"mealUnitPrice\":\"66\",\r\n    \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"50\",\"mealName\":\"超級滷肉飯加滷蛋\",\"mealUnitPrice\":\"100\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n    {\"mealQuantity\":\"50\",\"mealName\":\"超級滷肉飯加滷蛋\",\"mealUnitPrice\":\"100\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"1\",\"mealName\":\"青菜不要高麗菜\",\"mealUnitPrice\":\"199\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-05 00:00:00', '2019-10-05 00:00:00', 1, 1, 1),
(9, 'CY20191004010', '{\"restaurant\":\"CY2\",\"memberName\":\"霸王花\",\"meal\":[{\"mealQuantity\":\"1\",\"mealName\":\"白開水\",\"mealUnitPrice\":\"10\",\r\n    \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"1\",\"mealName\":\"衛生紙\",\"mealUnitPrice\":\"20\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-05 00:00:00', '2019-10-05 00:00:00', 1, 1, 1),
(10, 'CY20191004011', '{\"restaurant\":\"CY2\",\"memberName\":\"蚊香蝌蚪\",\"meal\":[{\"mealQuantity\":\"1\",\"mealName\":\"蚊香\",\"mealUnitPrice\":\"10\",\r\n    \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] },\r\n   {\"mealQuantity\":\"1\",\"mealName\":\"青蛙\",\"mealUnitPrice\":\"20\",\r\n   \"mealDetail\":[{\"type\":0,\"mealNum\":\"meal0\",\"detail\": \"\",\"price\":\"\",\"check\":false}] } ]}', '2019-10-05 00:00:00', '2019-10-05 00:00:00', 1, 1, 1);

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
-- 最後更新： 
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
(1, '呂記正宗岡山羊肉', '中式美食', 15, '/storage/uploads/shops/HRmflDzadXmaoLvTx0tmiOb1Dhp7L9rcywd6NPjz.jpeg', '台中市西區公益路184號, Taichung', 'xxx1@email.com', '09xx-xxx-xxx', '$2y$10$.l5DoOVzHFpf/36sQAAdxOMlgBh9Eg0XKQ5gkl.ynZDMhy/mK1YpS'),
(2, '精誠牛肉麵 精誠店', '中式美食', 15, '/storage/uploads/shops/GmLVGbr2i1fJF3Yukcf6ADR3ThBLvMhfKiqfPGQU.jpeg', '34, Jingcheng Road, Taichung City 407', 'xxx2@email.com', '09xx-xxx-xxx', '$2y$10$UZL9x5paCUccj7HEGpqnU.HTlTwWuCKwe0NM9CMrI7PN00f2GRHmu'),
(3, '福牛牛排 美村店', '台灣美食', 25, '/storage/uploads/shops/iNxaehpVy4BM9SSfXQFEOFw6CwAM3IJVhtGW4xAx.jpeg', '403台灣台中市西區美村路一段416號, 台中市 403 ', 'xxx3@email.com', '09xx-xxx-xxx', '$2y$10$uWkcO0Dlv3Vnp.lUI/G2TuueQ/Vzk.uyR5bbfhBXdI08Yx0ts/G2G'),
(4, '惹鍋 文心店', '台灣美食', 30, '/storage/uploads/shops/SPn7yh1d8ZsOSxdwM1XNC8b1oBUoXla58qdXqjVd.jpeg', '130, Section 1, Wenxin Road, Taichung City 408', 'xxx4@email.com', '09xx-xxx-xxx', '$2y$10$kbEMCJ3yYb2XOJ75/PUVDOoRigKQP53xia1wnJ1Mm3/gRn3HyOU6u'),
(5, '帝王薑母鴨 忠明南店', '台灣美食', 15, '/storage/uploads/shops/RXHMpry7sGOqv08AHM6okjrGDPIaOJ7lKebH66j2.jpeg', '194, Wuquan 1st Street, Taichung City 403 ', 'xxx5@email.com', '09xx-xxx-xxx', '$2y$10$YVMt8jFTvZw.mtlIhsTcSejMytQ5fFLD6L6kd3z6BbUCegJQCWgBi'),
(6, '老四川 公益店', '台灣美食', 25, '/storage/uploads/shops/jpYQ0171bn7UAHzMUzZ3Ei4PtPeMt7Nldf1XnHQv.jpeg', '403台灣台中市西區公益路343號, 台中市 403', 'xxx6@email.com', '09xx-xxx-xxx', '$2y$10$E0TzCPmO4I10kj9KsqF85ewHj3fkZL6aAfeHgllLB4bwCtUS3K91m'),
(7, '雞優股鹹酥雞', '台灣美食', 35, '/storage/uploads/shops/9tjTiqgPHT6p1YKc6mPOTHANJYaxfWG4KQ6oJ3oe.jpeg', 'No. 123, Section 3, Dongxing Road, Nantun District, Taichung City, Taiwan 408,', 'xxx7@email.com', '09xx-xxx-xxx', '$2y$10$XU6hU9H7w/QacnNXhAsc8eYUS1wng0x1cUKDbMMyWv7UsPVrUqKcq'),
(8, '元井海鮮粥', '台灣美食', 15, '/storage/uploads/shops/62NgERFwWyj6R32U4h4N0479d6u5PS1CgafAxFuG.jpeg', '台中市西區健行路1011號, Taichung, ', 'xxx8@email.com', '09xx-xxx-xxx', '$2y$10$gDDROS/8ODP3QYPC2Y.1Muw16vWYbY7L1dbkD2Xlzwk6aXmMo0FT6'),
(9, '牛老總涮牛肉 五權店', '台灣美食', 20, '/storage/uploads/shops/mH3NV8aYbrPlkvn7rDtVZRKSDdomT1IadhSB5Ncs.jpeg', '1-130, Wuquan Road, Taichung City 403', 'xxx9@email.com', '09xx-xxx-xxx', '$2y$10$zAbcnwbF5Qz31FkUUTBYA./z5yWoVceHWChKjAn/MftUg9d9D7Bwu'),
(10, '豪品鐵板燒 逢甲店', '台灣美食', 20, '/storage/uploads/shops/YmGlVSDwbDeTEBQHT3uFQDEIwFu1W5DbVcpFrg3P.jpeg', 'No. 564-1, Fuxing Road, Xitun District, Taichung City, Taiwan 407,', 'xxx10@email.com', '09xx-xxx-xxx', '$2y$10$4Z7z2fBzGOk0MD8cpgLyPeGCz/IJlOvf/HpPc1xRwi53hV51EplLK'),
(11, '一頭牛日式燒肉 公益店', '日式美食', 10, '/storage/uploads/shops/adfjzKyFRcN9IspBVoQHit7KPXFsOPX7r6mAIfm7.jpeg', '台中市南屯區公益路二段162號, Taichung, ', 'xxx11@email.com', '09xx-xxx-xxx', '$2y$10$jpGtiNrdSZ.vaAwKndAM3OwftYjxCg4db9LJWoI3AYC6XWAO.IYTi'),
(12, '容燒居酒屋', '日式美食', 25, '/storage/uploads/shops/NrsT0VhzrbVR8VQEpyyekcbjQk1PF1XdOqhYtwfK.jpeg', '台中市南屯區文心路一段530號, Taichung, 408 •', 'xxx12@email.com', '09xx-xxx-xxx', '$2y$10$XpDB2ejp8MYcaaV94Q7lBuB5lZEkCiU44IK4qlaB7BkuT/Ab654PS'),
(13, '小麥所', '日式美食', 20, '/storage/uploads/shops/FEPKm0jhH4cv2NLABEtAsBZwMhszexzcgXOXcstw.jpeg', '31, Boguan East Street, Taichung City 404', 'xxx13@email.com', '09xx-xxx-xxx', '$2y$10$LobuOv7G0zCYztyBUXZp5umDU7tMO0wrmH1rCs.ZSLEPBd8XS7P/G'),
(14, '激旨燒鳥 美村店', '日式美食', 20, '/storage/uploads/shops/KilHmYgQZUbWyWgIlqJti3j5A5Qb5BHLGOB4psf6.jpeg', '86, Section 1, Meicun Road, Taichung City 403 •', 'xxx14@email.com', '09xx-xxx-xxx', '$2y$10$EIH5wvz4eWsjnAsdyvHbQuatV4GPFRJh7ev1YyyuONIjC/QZsx1Bq'),
(15, '蒜翻天鹹酥雞 大墩店', '台灣美食', 25, '/storage/uploads/shops/DguI991f8nV5jwA3jTlttfsEoc2CxLpatB6k5fgE.jpeg', 'No. 392, Dajin Street, Nantun District, Taichung City, Taiwan 408,', 'xxx15@email.com', '09xx-xxx-xxx', '$2y$10$7NrVj9tTVdeqrIU/fkIrwOmrO9g2d0JqoLzHveIgvoAp/t/HczOM6'),
(16, '鐵克諾餐酒館 Techno W Bistro', '美式美食', 20, '/storage/uploads/shops/PggUamyvcGEy7IQGhpABpuQm7LRsuaorIHApOrX2.jpeg', '台中市西區忠明南路329號, Taichung, 403', 'xxx16@email.com', '09xx-xxx-xxx', '$2y$10$KbIbq3n6LFk.hn85I14Pmu2KuSOHEctcMjK6bxgX35cijeeahYH5u'),
(17, '迷客夏 向心南店', '飲品', 20, '/storage/uploads/shops/yNRxiZuqtMUgkekyyvWvBqqvf0mv6DY87iFJk2IZ.jpeg', '台中市南屯區向心南路937號, Taichung,', 'xxx17@email.com', '09xx-xxx-xxx', '$2y$10$MoeLVTiAHIGglSk7JoBv3.x8e7HtoG9fJxzEgB76kNzjNEmH9pLr2'),
(18, '酷皮脆燒肉潛艇堡 Crispy cool', '美式美食', 30, '/storage/uploads/shops/FcQnTPqpARFcb4kuKJ5G8lQXz3oW9qxGU6Wx3ukf.jpeg', '台中市北區三民路三段62號, Taichung', 'xxx18@email.com', '09xx-xxx-xxx', '$2y$10$osd8yhMgSrmTVAmzLjhXluKtNU2BnU6r3Q57Rf91cQhcKP1k8J8gm'),
(19, '頑者炙燒拉麵', '日式料理', 15, '/storage/uploads/shops/dswiGMgCivp6Jm1CaXyhewugz2gdQIOw6NBQ3tmA.jpeg', '台中市南屯區大墩十一街711號, Taichung,', 'xxx19@email.com', '09xx-xxx-xxx', '$2y$10$EehEc94iUjez22KCSe0OO.wzLfbgQeHgZ.33t9FR2fQCbE.3E6mBS'),
(20, '金邊現炒', '中式料理', 35, '/storage/uploads/shops/IIX2DpGLsg2iOcR9u0BCJDMZGdH3eVvEshiUIqIR.jpeg', 'No. 66, Section 3, Liming Road, Xitun District, Taichung City, Taiwan 407', 'xxx20@email.com', '09xx-xxx-xxx', '$2y$10$1h4D8sqE/OkY6abdKop7xu5vqiO6laKnEpMGRNq5LCM8iBjOB1hC2'),
(21, '八方雲集 向上店', '中式料理', 35, '/storage/uploads/shops/BSN3OH1PCKU7J9Bge1UIwMiEVqzSksuRH67RceoW.jpeg', '台中市西區向上路一段394號, Taichung', 'xxx21@email.com', '09xx-xxx-xxx', '$2y$10$E/sfRToOA/abTzPrKTpDM.3cxWB5CglCFkMLlpmv3gsPQ6qwytBom'),
(22, '九合烤鴨 西屯總店', '中式料理', 40, '/storage/uploads/shops/TSVKf9C2BKivfII6VnVYRPTTIa53f4chl7sGYzGl.jpeg', '西屯路一段413, Taichung City 404', 'xxx22@email.com', '09xx-xxx-xxx', '$2y$10$8DDP578zZjUtS91Bclve1.l1um27Rqjo762aySqxdIHqIjjb9lmbi'),
(23, 'FITEAT 藜麥便當', '中式料理', 25, '/storage/uploads/shops/4pImKuwAc9dlhJKqrX108gxUTbdBcTU2mTfxDJmc.jpeg', '台中市西屯區西屯路二段249-10號, Taichung', 'xxx23@email.com', '09xx-xxx-xxx', '$2y$10$T7h9jHBu/34SlVTFIZdXaetEKsGXBTUXZQlL.MWxAPySA7DHHrIHC'),
(24, '大胖肉羹 中國醫店', '中式料理', 30, '/storage/uploads/shops/DuliDGLerrwttM4TtiipURQbgLRbCdRLs4hXULl3.jpeg', '台中市北區梅亭街253號, Taichung, 404 ', 'xxx24@email.com', '09xx-xxx-xxx', '$2y$10$3wJ0ClgJa1tHHNawO6DOY.3sgvsrnAXzpr9FoD2BzcyapmQbovXnO'),
(25, '吃茶三千 大英概念店', '珍珠奶茶', 15, '/storage/uploads/shops/OoxZDqha0VVeAbgBoTDG3j6cJKb2cnx3o8tyIvYt.jpeg', '台中市南屯區大英街607號, Taichung', 'xxx25@email.com', '09xx-xxx-xxx', '$2y$10$NDHO4arZB/zd3B4RUTgQK.S..xZQ5/JwmwGVuJMWv3jbYl33Ix/LO');

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
  MODIFY `MealID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=783;

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
  MODIFY `OrdersID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shops`
--
ALTER TABLE `shops`
  MODIFY `ShopID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
