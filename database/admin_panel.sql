-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 06:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 for Active 0 for Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kid\'s Fashions', 'kids-fashions', '1', '2022-09-06 06:51:14', '2022-09-07 05:55:04', NULL),
(2, 'Men\'s Fashion', 'mens-fashion', '1', '2022-09-06 06:51:29', '2022-09-07 05:55:41', NULL),
(3, 'Women\'s Fashion', 'womens-fashion', '1', '2022-09-06 06:51:34', '2022-10-30 22:50:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_form`
--

CREATE TABLE `contact_us_form` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_form`
--

INSERT INTO `contact_us_form` (`id`, `name`, `email`, `subject`, `message`, `token`, `created_at`, `updated_at`) VALUES
(1, 'prem', 'prem@gmail.com', 'test', 'testing', 'Hv9p3lyzINj1P3tFqYP3nfOwU8nMMCoXJnUstWYyyJUrRCbFMwS1pR6M0syKH4mR', '2022-09-08 01:36:54', NULL),
(2, 'prem', 'prem@gmail.com', 'test', 'testing', 'ynKmzVp5UJVccpXWz28hRPq6O7PUkiVsUevxNmwdDq6ERpK4hKmT6WTWV5RG3a8b', '2022-09-08 01:37:31', NULL),
(3, 'prem', 'prem@gmail.com', 'test', 'testing', 'ctbkoq2TxqH7wiZDvB1wWc87ncnzjpfADHqIdkX2aDJNIffxjti1bReIUtXc9CKv', '2022-09-08 01:39:17', NULL),
(4, 'prem', 'prem@gmail.com', 'test', 'testing', 'iJwani7rp8VXuZcmWvCvGTpopJWLK4QUVZMedpal7usELIcV1lUqaiKfjr0pAOkn', '2022-09-08 01:41:34', NULL),
(5, 'Karan Singh', 'karan@gmail.com', 'testing', 'test', 'oM8uCiYvFsujobMKM7DF3Hs73JTg1tEX4RyEb6LmibZG0tYvkmtwyHLTMHTTkBY4', '2022-09-08 01:46:51', NULL),
(6, 'Karan Singh', 'karan@gmail.com', 'testing', 'test', 'gT64Hs5Hj6bioyykUN2u6Df17z7cU5O12L84ya7554zDR9uoz16U3rFNYrlcRyt2', '2022-09-08 01:49:01', NULL),
(7, 'Karan Singh', 'karan@gmail.com', 'testing', 'test', 'CjWLVFVe5VXBIf11vLv4tSBH0wsPCvr5FlqL5KcQPP8ZVkBMTCege6Dl7Ve8xqgi', '2022-09-08 01:52:58', NULL),
(8, 'Karan Singh', 'karan@gmail.com', 'this is regarding test', 'test purpose', 'uN3wbxD3Q2mN827BzyWoXc3vccovjc679AqVrAQ4KmRGJlM4sNSesac7scvq0G2M', '2022-09-08 03:17:56', NULL),
(9, 'Karan Singh', 'karan@gmail.com', 'this is regarding test', 'test purpose', 'WisuFld1IziiEC5rS326i1hsixJialqsuHcxtZYazcGYGhvYCyqJXSaBUH4hprC6', '2022-09-08 03:25:24', NULL),
(10, 'Karan Singh', 'karan@gmail.com', 'this is regarding test', 'test purpose', 'mIf3IotLBsDnXIBvxWBCmy4alzf5wz0nZjUEn18TotpN9sxgJCk2wHTWoazwzkuU', '2022-09-08 03:26:30', NULL),
(11, 'Karan Singh', 'karan@gmail.com', 'this is regarding test', 'test purpose', 'daIH62Aa4c0IjahC3DFjd5KqGLJp323KVVy05BbhDp0ZJjlTZxWrbHnpEED6C6cn', '2022-09-08 03:27:55', NULL),
(12, 'Karan Singh', 'karan@gmail.com', 'this is regarding test', 'test purpose', 'YsmAauiBXfmueo5MMV4nrv8Ar39AIBU2Q9BIXng74UjoSB3uFi9iDmnHzLzz8b5E', '2022-09-08 03:28:03', NULL),
(13, 'Karan Singh', 'karan@gmail.com', 'this is regarding test', 'test purpose', 'YxrelH9dqSp40YGdMyGZvNweM3aVPY8HddMI52Hfk2cFe3gtSqBUbp1rRM9s7w1A', '2022-09-08 03:29:37', NULL),
(14, 'Mohan Singh', 'mohan@gmail.com', 'have issue in purchase', 'i have purchased some item and order but my payment shows in pending', 'uQz4EUNarFEOsQuCScW1n3O5w1Hs7C68WDGeXGB8xI91cLgnAABK56450hAOhHVY', '2022-09-08 03:38:29', NULL),
(15, 'Mohan Singh', 'mohan@gmail.com', 'have issue in purchase', 'i have purchased some item and order but my payment shows in pending', 'hTIRly756UedPiAw4aNiVdSFtTki1zouU130epQqO5V7hAIYZGwyy9x1cVtM07YU', '2022-09-08 03:39:03', NULL),
(16, 'Mohan Singh', 'mohan@gmail.com', 'have issue in purchase', 'i have purchased some item and order but my payment shows in pending', 'HRZoyjMfUS8TOjhDKSCo9Zstzknpwv89kNDTtzXa9FAHY7IV05wMUoPpLN1cqGb8', '2022-09-08 03:39:37', NULL),
(17, 'Mohan Singh', 'mohan@gmail.com', 'have issue in purchase', 'i have purchased some item and order but my payment shows in pending', 'wsnGmDAB3QDtv1pjww0v0WyFV8nlAnoO4PLOkxkWSQgInMdf2J7eGdGDvByZzKK1', '2022-09-08 03:39:49', NULL),
(18, 'Surya Pratap Singh', 'surya@gmail.com', 'have issue in purchase', 'payment issue', 'nFBZdnHuwpPnnq0z3YujqsA2bKpD3XwaIKoRIX6wWbTS1Zi5lX2pwH4BiWpEcwhQ', '2022-09-08 03:45:56', NULL),
(19, 'Surya Pratap Singh', 'surya@gmail.com', 'have issue in purchase', 'payment issue', 'NvT1aui3e0XV2zfHwJ2GidzUyLxE9dlmVoOuHiAORK5aOarAOnqlNvtwJaYD9mxF', '2022-09-08 03:46:54', NULL),
(20, 'Vijay Singh', 'vijay@gmail.com', 'have issue in purchase', 'have issue in purchase id number 41', 'penl8syMjMyvAKxEsf98l0crPoTyiYyXkfSPy76nCL7kZjs2rATV9a9T1P4j24CS', '2022-09-08 03:50:53', NULL),
(21, 'Vijay Singh', 'vijay@gmail.com', 'have issue in purchase', 'have issue in purchase id number 41', 'Asurp4tqectYIUkP58PIgRq7YymMVUSSYV4ps1dNPgHA2yRbj4bJwrlOI4WgbYVF', '2022-09-08 03:51:04', NULL),
(22, 'Vijay Singh', 'vijay@gmail.com', 'have issue in purchase', 'have issue in purchase id number 41', 'KlQdLAmJ6ETY2hUvFESAXpx1vNic90MQhGTq3i0nTFY465k8phfsoHSXwARFwSY3', '2022-09-08 03:51:12', NULL),
(23, 'Vijay Singh', 'vijay@gmail.com', 'have issue in purchase', 'have issue in purchase id number 41', 'R5cq85xEMgyppe1evVBAcuZWLOKv9OQwHHFsiowiLPqoNXvHzWjuwYk4fy590h1V', '2022-09-08 03:52:04', NULL),
(24, 'prem', 'prem@gmail.com', 'test', 'testimng', 'l9A4dB5Cs1Q142HP5TIThnDDDRzLFEkEY5yLDVu4ulHlTecwQ3kBULV7QhByAhxu', '2022-09-08 03:53:38', NULL),
(25, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', 'daffsafafa', 'QZKdFJFMdWjPUEBl1ehCrfiJNfLaoJFEMm5LdD8293FBZBSMvIb61lxulSLYFFTS', '2022-09-08 03:55:08', NULL),
(26, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', 'test', '0GXGDXIpZvWvnpjv5X7Hk6c1vaTNkZhM02m1Bsl0Gmx1iv8xmoqMil41rGAAUYfu', '2022-09-08 04:27:40', NULL),
(27, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', 'test', 'F8bci6Iqf8l3pxEIWCMbiTYk2UAk5HFKwznQ0jO101KY85EfgtShO0E6V4Z2V5KE', '2022-09-08 04:28:14', NULL),
(28, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', 'test', '06exH7dW7oFKxFxXDzExTDlrPU68XFDvRbUg7Iqrcn8jXBsKmRupVr04Rgbf2Ln1', '2022-09-08 04:28:48', NULL),
(29, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', 'test', 'S6wWJslcWzaeXGJ52DN0nhae1z5V5e2Sx8GCWcnMae6Aiu6zPf1EkODJCDwRYqnh', '2022-09-08 04:29:06', NULL),
(30, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', 'test', 'gC5oQ3PM0rF0y2QWegsexjKsKo8XALmFAxtT9chzz9ZtD3UP3tE4o5lekfH9yJSC', '2022-09-08 04:37:49', NULL),
(31, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', 'test', '0zmxs6kpwinD6QoKDezoOdRX0rr9GlOb9b80ukz892FIDG73QqYhWJATAwmHVv8a', '2022-09-08 04:38:04', NULL),
(32, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', 'test', 'W5sBGRNik974VqHNsQj8VJnzd3jUGKwDSwBwUgfEyEs0DquKb298uOEDDxpcLArI', '2022-09-08 04:38:20', NULL),
(33, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', 'test', 'I0MljWOHT6h7ZlQvVlGOM8Ab44cAXaS1NB1PIA9d15hj7hLG49BeSwJZ49bdBaJ8', '2022-09-08 04:38:46', NULL),
(34, 'Manish Kumawat', 'manish@gmail.com', 'have issue in add to cart', 'i have added one product in cart and it can not goes to cart', 'GpFC9B1BPqI6K990wwkd77oKstAdLxceVSnG5HxHjqv2EUNVoFo2A4IrYjaL7EWz', '2022-09-08 04:42:35', NULL),
(35, 'Manish Kumawat', 'manish@gmail.com', 'have issue in add to cart', 'i have added one product in cart and it can not goes to cart', '39cZs5jqlkGymVFDPpXtd6rjdY6OlPA8Me5QbkDtzNGlUCreymbDWDyj8yIOlPR4', '2022-09-08 04:42:57', NULL),
(36, 'Manish Kumawat', 'manish@gmail.com', 'have issue in add to cart', 'i have added one product in cart and it can not goes to cart', 'n0JjPwo6zNoC5ypUMlk0yCd3pvziJhJmtYcoclVxKJ1bB2xGaOh8z65dhBG97AGE', '2022-09-08 04:43:37', NULL),
(37, 'Manish Kumawat', 'manish@gmail.com', 'have issue in add to cart', 'i have added one product in cart and it can not goes to cart', 'U2kfue4bNWiY11imgmvHy7cctekW0DgeZ8Tm0XQ68FI0jUf9QD98rArwZO0R7CYS', '2022-09-08 04:44:01', NULL),
(38, 'Manish Kumawat', 'manish@gmail.com', 'have issue in add to cart', 'i have added one product in cart and it can not goes to cart', 'fytVeZWqDOedIPiUs1D5z2OuGPCkk2h89Sy4EXSedDetq2QotaylB64Y5WZNg36w', '2022-09-08 04:44:25', NULL),
(39, 'Mahendra Verma', 'mahendra@gmail.com', 'This is regarding Payment Failed', 'I was ordering a product but unfortunately it was failed so can you please solw my problem.', 'mXWgAq9LTBYxYmd32rov06MoGYHN00KZM8H3vdEYddNX95zwHk8jcmQkeZMpJ4zs', '2022-09-08 04:51:11', NULL),
(40, 'Sonu Sud', 'sonu@gmail.com', 'This is regarding Payment Failed', 'My issue is not listed here', 'PJpjzeNSiSVLcRMlJvgwrI19IJlk4yc36JtJYEMjDsBSudRyPZbVqybxdepeXBk5', '2022-09-08 04:55:57', NULL),
(41, 'Ganpat Yadav', 'ganpat@gmail.com', 'This is About Product Not Available', 'I have Select one product a few days back then i came to purchase the product then i see it can not show me', '1IN0t6HXktEnPLyhhxSYcSrIYWqPIKjB1Rg4ZEp6GO4Kr5QCfoaPCYnHWrg3U8ix', '2022-09-08 04:58:48', NULL),
(42, 'Mohan Singh', 'manish@gmail.com', 'This is regarding Payment Failed', 'I have Select one product a few days back then i came to purchase the product then i see it can not show me', 'g5XLGdBGaSiQHLcmeIKGrFtiwr3JIHeHFMDfdgXQDaofoTalQDQw0kLmc9ZD753o', '2022-09-08 05:00:13', NULL),
(43, 'Karan Singh', 'manish@gmail.com', 'have issue in purchase', 'I have Select one product a few days back then i came to purchase the product then i see it can not show me', 'Ey07HFQouMhxuFZ66XjWnC6AUqgU4OR3EjPDPDmYRZeOMFvXlaFkWT2P4qzEKXSZ', '2022-09-08 05:01:30', NULL),
(44, 'Vijay Singh', 'vijay@gmail.com', 'this is regarding test', 'I have Select one product a few days back then i came to purchase the product then i see it can not show me', 'R2JatKfiu9OP4g3ADYM9LfdoUMh48o5S5FFudgppUtZh9cvTmqKCIEGFm7pb8x2f', '2022-09-08 05:06:37', NULL),
(45, 'Mohan Singh', 'prem@gmail.com', 'This is regarding Payment Failed', 'I have Select one product a few days back then i came to purchase the product then i see it can not show me', '5ujHzAvIlN2zK1tHAMhj5XlgqTL9GnHtM6ak6w2KeUn6ZF2Fo2ZOirXJiVOJyB1e', '2022-09-08 05:12:18', NULL),
(46, 'Karan Singh', 'prem@gmail.com', 'This is regarding Payment Failed', 'I have Select one product a few days back then i came to purchase the product then i see it can not show me', 'vH2ryiYXFQbBa64h9b2M4T2P7CYdlCqv0yqM4GnrmzXllEFMevrzL14RpgvdEBn9', '2022-09-08 05:14:07', NULL),
(47, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', '<br><br>', 'NQt06DjUsLPJMHriGLgMrDwZBYg63Ol4DMiHV88danDl15H4AKFJMbQBDOqiFVD6', '2022-09-08 05:16:17', NULL),
(48, 'Vijay Singh', 'vijay@gmail.com', 'This is regarding Payment Failed', 'I have Select one product a few days back then i came to purchase the product then i see it can not show me', 'Q1z4OEPqAghQ0w0c4P1wovr5Zlza29UzSoaiwQTIKTQQevelqT3HkvZ14dq7MbpX', '2022-09-08 05:18:53', NULL),
(49, 'Karan Singh', 'karan@gmail.com', 'have issue in purchase', ': I have Select one product a few days back then i came to purchase the product then i see it can not show me', 'oVtcSCcribEhvms7XdtgvFwv1EaQXm95iVbbrqxR2fPTvtvErRJbcmWa0byB5W8e', '2022-09-08 05:27:12', NULL),
(50, 'Vinod yadav', 'vinod@gmail.com', 'already have issue', 'in cart', 'xl2Yb2BZYUvzl6eGSPJT0dlA6oWZS8p2T0RbTkRN44CsZAdAqK2DX1YEY12Zl3iY', '2022-09-08 06:44:06', NULL),
(51, 'prem prakash', 'premprakash@gmail.com', 'urgent work', 'thank you', 'rBO8y7meRianR6qMsOPRbGEvxrv7Yx5xJi8CZvBAjd4Lofv0atTOezgRu5bDUya0', '2022-09-27 00:33:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_08_24_042313_create_product_table', 1),
(16, '2022_08_24_063223_create_users_tests_table', 2),
(17, '2022_08_29_063648_create_category_table', 3),
(18, '2022_08_30_063033_create_sub_category_table', 4),
(19, '2022_09_06_083712_create_web_banners_table', 5),
(20, '2022_09_07_085013_add_deleted_at_to_categories_table', 6),
(21, '2022_09_07_101837_add_deleted_at_to_sub_categories_table', 7),
(22, '2022_09_07_103030_add_deleted_at_to_products_table', 8),
(23, '2022_09_07_111327_add_deleted_at_to_users_table', 9),
(24, '2022_09_07_111751_add_deleted_at_to_web_banners_table', 10),
(25, '2022_09_08_063159_create_contact_us_form_table', 11),
(26, '2022_09_09_071434_create_carts_table', 12),
(27, '2022_09_20_121059_create_payments_table', 13),
(28, '2022_09_24_092053_create_payment_details_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `order_id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `details`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 3, '1000', 'PAYID-MMYWNBI19W62609KX435481H', '8UAZWCWX9APTJ', 'sb-s25yj20728047@business.example.com', 4605.00, 'USD', '{\"id\":\"PAYID-MMYWNBI19W62609KX435481H\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"6TB6086695095590H\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-s25yj20728047@business.example.com\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"payer_id\":\"8UAZWCWX9APTJ\",\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Flat no. 507 Wing A Raheja Residency\",\"line2\":\"Film City Road\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"postal_code\":\"400097\",\"country_code\":\"IN\"},\"country_code\":\"IN\",\"business_name\":\"Test Store\"}},\"transactions\":[{\"amount\":{\"total\":\"4605.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"4605.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"7XCX9ALM3RMRW\",\"email\":\"sb-z9t3k20909565@business.example.com\"},\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"item_list\":{\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Flat no. 507 Wing A Raheja Residency\",\"line2\":\"Film City Road\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"postal_code\":\"400097\",\"country_code\":\"IN\"}},\"related_resources\":[{\"sale\":{\"id\":\"4AV97833JA415554T\",\"state\":\"completed\",\"amount\":{\"total\":\"4605.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"4605.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"230.28\",\"currency\":\"USD\"},\"receivable_amount\":{\"value\":\"4605.00\",\"currency\":\"USD\"},\"exchange_rate\":\"0.013682570414681\",\"parent_payment\":\"PAYID-MMYWNBI19W62609KX435481H\",\"create_time\":\"2022-09-26T08:45:02Z\",\"update_time\":\"2022-09-26T08:45:02Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/4AV97833JA415554T\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/4AV97833JA415554T\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MMYWNBI19W62609KX435481H\",\"rel\":\"parent_payment\",\"method\":\"GET\"}],\"soft_descriptor\":\"PAYPAL *TEST STORE\"}}]}],\"failed_transactions\":[],\"create_time\":\"2022-09-26T08:44:53Z\",\"update_time\":\"2022-09-26T08:45:02Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MMYWNBI19W62609KX435481H\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'approved', '2022-09-26 03:15:03', '2022-09-26 03:15:03'),
(2, 3, '1001', 'PAYID-MMYWREI9DW38117LV283660Y', '8UAZWCWX9APTJ', 'sb-s25yj20728047@business.example.com', 4605.00, 'USD', '{\"id\":\"PAYID-MMYWREI9DW38117LV283660Y\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"0VX74347H2871332K\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-s25yj20728047@business.example.com\",\"first_name\":\"John\",\"last_name\":\"Doe\",\"payer_id\":\"8UAZWCWX9APTJ\",\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Flat no. 507 Wing A Raheja Residency\",\"line2\":\"Film City Road\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"postal_code\":\"400097\",\"country_code\":\"IN\"},\"country_code\":\"IN\",\"business_name\":\"Test Store\"}},\"transactions\":[{\"amount\":{\"total\":\"4605.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"4605.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"7XCX9ALM3RMRW\",\"email\":\"sb-z9t3k20909565@business.example.com\"},\"soft_descriptor\":\"PAYPAL *TEST STORE\",\"item_list\":{\"shipping_address\":{\"recipient_name\":\"John Doe\",\"line1\":\"Flat no. 507 Wing A Raheja Residency\",\"line2\":\"Film City Road\",\"city\":\"Mumbai\",\"state\":\"Maharashtra\",\"postal_code\":\"400097\",\"country_code\":\"IN\"}},\"related_resources\":[{\"sale\":{\"id\":\"7GK90245143468446\",\"state\":\"completed\",\"amount\":{\"total\":\"4605.00\",\"currency\":\"USD\",\"details\":{\"subtotal\":\"4605.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"230.28\",\"currency\":\"USD\"},\"receivable_amount\":{\"value\":\"4605.00\",\"currency\":\"USD\"},\"exchange_rate\":\"0.013682570414681\",\"parent_payment\":\"PAYID-MMYWREI9DW38117LV283660Y\",\"create_time\":\"2022-09-26T08:53:46Z\",\"update_time\":\"2022-09-26T08:53:46Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/7GK90245143468446\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/7GK90245143468446\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MMYWREI9DW38117LV283660Y\",\"rel\":\"parent_payment\",\"method\":\"GET\"}],\"soft_descriptor\":\"PAYPAL *TEST STORE\"}}]}],\"failed_transactions\":[],\"create_time\":\"2022-09-26T08:53:37Z\",\"update_time\":\"2022-09-26T08:53:46Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MMYWREI9DW38117LV283660Y\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'approved', '2022-09-26 03:23:46', '2022-09-26 03:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Success','Pending','Cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `order_id`, `user_id`, `product_id`, `payer_id`, `product_name`, `product_price`, `product_image`, `product_size`, `product_color`, `product_quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, '1000', 3, '7', '8UAZWCWX9APTJ', 'Kids Tshirt', '999', '1662787374.webp', 'L', 'BLUE', '3', 'Pending', '2022-09-26 03:15:03', '2022-09-26 03:15:03'),
(2, '1001', 3, '3', '8UAZWCWX9APTJ', 'Cottan T-Shirts', '799', '1662467628.jpg', 'XS', 'BLACK', '2', 'Pending', '2022-09-26 03:15:03', '2022-09-26 03:15:03'),
(3, '1002', 3, '7', '8UAZWCWX9APTJ', 'Kids Tshirt', '999', '1662787374.webp', 'L', 'BLUE', '3', 'Pending', '2022-09-26 03:23:46', '2022-09-26 03:23:46'),
(4, '1003', 3, '3', '8UAZWCWX9APTJ', 'Cottan T-Shirts', '799', '1662467628.jpg', 'XS', 'BLACK', '2', 'Pending', '2022-09-26 03:23:46', '2022-09-26 03:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_gallary_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 for Active 0 for inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `title`, `product_size`, `product_color`, `description`, `long_description`, `regular_price`, `sale_price`, `image`, `product_gallary_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 3, 'Leather jacket', 'XS,S,M,L,XL', 'BLACK,WHITE,RED,BLUE,GREEN', 'This is a Leather jacket', 'This product made by Leather', '499', '299', '20220906add-value.jpg', '01.png,02.png,03.png,04.png,262.png,1654577995-e74f8f7884e5748cc1b1ea1833770539.jpg', '1', '2022-09-06 06:56:18', '2022-11-01 12:49:15', NULL),
(2, 1, 2, 'Cottan T-Shirtsssss', 'XS,S,M,L,XL', 'BLACK,WHITE,RED,BLUE,GREEN', 'this is a cottan tshirts', 'this is made by cottan', '799', '199', '1662467749992.png', '1662467749agrement-img.jpg,1662467749Annual_Report_banner_img.JPG,1662467749annually.jpg,1662467749Artificial Intelligence_banner_img.JPG,1662467749artificial-img.jpg', '1', '2022-09-06 06:59:04', '2022-11-01 12:49:21', NULL),
(3, 1, 2, 'Cottan T-Shirts', 'XS,S,M,L,XL', 'BLACK,WHITE,RED,BLUE,GREEN', 'this is a cottan tshirt', 'this is made by cottan', '899', '499', '1662467628.jpg', '166261108103.png,1662611081About_banner_img.JPG,1662611081Artificial Intelligence_banner_img.JPG,1662611081artificial-img.jpg,1662611081business-strategy.webp', '1', '2022-09-06 07:03:48', '2022-11-01 14:02:29', NULL),
(6, 3, 7, 'Leather jackets For Women', 'XS,S,M,L,XL', 'BLACK,WHITE,RED,BLUE,GREEN', 'Leather Jacket', 'This has been long Lastic', '1499', '499', '1662530317.png', '1662554209Career-Opportunities.jpg,1662554209cement-2.jpg,1662554209cocoa_page_banner.JPG,1662554209cocoa_page_img_2.JPG,1662554209cocoa_page_img_3.JPG', '1', '2022-09-07 00:28:37', '2022-11-01 12:49:30', NULL),
(7, 1, 2, 'Kids Tshirt', 'S,M,L,XL', 'RED,BLACK,BLUE,GREEN', 'This is for kids tshirt', 'it is made by cottan', '1599', '99', '1662787374.webp', '16627874951662787431download.jfif,16627874951662787431twins-combo-kids-tshirt.jpg,166278749516627873997feade26-2ce0-438d-ae35-b66c99cebc6e.jpg,166278749516627874317b63bff6-f038-4d77-90a5-05ed82376382.jpg,1662787495166278743161+DRCco1fL._SL1000_.jpg', '1', '2022-09-09 23:52:54', '2022-11-01 14:01:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 for Active and 0 for Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `sub_category_slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Jackets', 'jackets', '1', '2022-09-06 06:52:06', '2022-09-06 06:52:06', NULL),
(2, 1, 'T-Shirts', 't-shirts', '1', '2022-09-06 06:52:13', '2022-09-07 05:42:09', NULL),
(3, 2, 'Jackets', 'jackets', '1', '2022-09-06 06:52:17', '2022-09-07 05:42:05', NULL),
(4, 2, 'T-Shirts', 't-shirts', '1', '2022-09-06 06:52:23', '2022-09-07 05:42:00', NULL),
(5, 2, 'Party Wear', 'party-wear', '1', '2022-09-06 06:52:30', '2022-09-07 05:41:45', NULL),
(6, 3, 'Jeans', 'jeans', '1', '2022-09-06 06:52:37', '2022-09-07 05:41:29', NULL),
(7, 3, 'Jackets', 'jackets', '1', '2022-09-06 06:52:43', '2022-09-07 05:54:16', NULL),
(8, 3, 'Party Wear', 'party-wear', '1', '2022-09-06 06:52:49', '2022-09-07 06:03:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 for Active user, 0 for inactive user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `provider_id`, `avatar`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'manoj sharma', 'manoj@gmail.com', NULL, '1665641866.png', '$2y$10$YU6pFnwuEQp6Ldnahr1VWuGFB6Hm17u3wEjA68WJq0vbc7fKw1B6K', '1', 'ZUb02sNSy396GBTG8GzD5ZTz0uN6tldPSOQ1jQvhFieSj13Jb8bMk6Me69M1', '2022-08-25 22:59:02', '2022-10-13 00:47:46', NULL),
(7, 'Prem Jangid', 'premjangidnbt@gmail.com', '105355705660263', 'https://graph.facebook.com/v3.3/105355705660263/picture?type=normal', NULL, '1', NULL, '2022-09-13 01:58:48', '2022-09-13 01:58:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_tests`
--

CREATE TABLE `users_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for admin 1 for user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_tests`
--

INSERT INTO `users_tests` (`id`, `role`, `name`, `email`, `number`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 'Prem  prakash Jangid', 'premprakash.nbt@outlook.com', '9876543210', '$2y$10$Sj4ckl7iir2KPy/dzwYXGuWwbDcMLvKyB4SO6UXHzYLa619UsKAz6', '1662376551.jpg', NULL, '2022-09-05 05:45:51'),
(2, 0, 'Sunil', 'sunil@gmail.com', '7894561230', '$2y$10$Sj4ckl7iir2KPy/dzwYXGuWwbDcMLvKyB4SO6UXHzYLa619UsKAz6', '1662550567.jpg', '2022-08-26 06:34:45', '2022-09-07 06:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `web_banners`
--

CREATE TABLE `web_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 means Active, 0 Means Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_banners`
--

INSERT INTO `web_banners` (`id`, `banner_title`, `banner_description`, `banner_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Fashionable Dress', '10% OFF YOUR FIRST ORDER', '1662456416carousel-1.jpg', '1', '2022-09-06 03:56:56', '2022-09-09 05:45:13', NULL),
(4, 'Latest Product', '50% OFF YOUR FIRST', '1662524724.JPG', '1', '2022-09-06 04:01:22', '2022-09-07 05:52:48', NULL),
(5, 'banner image', 'banner desc', 'banner.jpg', '1', '2022-09-06 04:02:01', '2022-09-06 05:35:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_subscribed`
--

CREATE TABLE `web_subscribed` (
  `id` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_subscribed`
--

INSERT INTO `web_subscribed` (`id`, `email_id`, `created_at`, `updated_at`) VALUES
(1, 'prem@gmail.com', '2022-09-09 23:06:53', '2022-09-09 23:06:53'),
(2, 'premprakash@gmail.com', '2022-09-09 23:09:09', '2022-09-09 23:09:09'),
(3, 'ss@dd', '2022-09-09 23:19:18', '2022-09-09 23:19:18'),
(4, 'karan@gmail.com', '2022-09-09 23:19:59', '2022-09-09 23:19:59'),
(5, 'premprakashjangid@gmail.com', '2022-10-15 07:10:35', '2022-10-15 07:10:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_form`
--
ALTER TABLE `contact_us_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_email_unique` (`description`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_tests`
--
ALTER TABLE `users_tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_tests_email_unique` (`email`);

--
-- Indexes for table `web_banners`
--
ALTER TABLE `web_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_subscribed`
--
ALTER TABLE `web_subscribed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us_form`
--
ALTER TABLE `contact_us_form`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_tests`
--
ALTER TABLE `users_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `web_banners`
--
ALTER TABLE `web_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `web_subscribed`
--
ALTER TABLE `web_subscribed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
