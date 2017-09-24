-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2017 at 05:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crystal_sparkle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `phone_number`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Global Admin', 'global_admin', '0123456789', 'global_admin@gmail.com', '$2y$10$HVkN/kUXYa0smbD7doiLX.aipZVijH90ndmxclNNAm6Q7Qczi7r9O', NULL, '2017-09-24 08:31:44', '2017-09-24 08:31:44'),
(2, 'Admin', 'admin', '0123456788', 'admin@gmail.com', '$2y$10$0Du71pbueomS6ggeDnhzEO6pp4psMBBlmzjxfuADvMGQhHpf2WDES', NULL, '2017-09-24 08:31:44', '2017-09-24 08:31:44'),
(3, 'Owner', 'owner', '0123456787', 'owner@gmail.com', '$2y$10$MHsD6YDA1IGp9ed8r2yxr.0.Ib4VmefyBIR3i6yGmuQJjCMJ4Q9Ou', NULL, '2017-09-24 08:31:44', '2017-09-24 08:31:44'),
(4, 'Manager', 'manager', '0123456786', 'manager@gmail.com', '$2y$10$UWxG53ZHkZdVBVtZ2KqzU.lx6OsCIAf4lpHWIVPaVoZquM1BDYyQy', NULL, '2017-09-24 08:31:44', '2017-09-24 08:31:44'),
(5, 'Reception', 'reception', '0123456785', 'reception@gmail.com', '$2y$10$pidfyinnukh2PJeWfUz4xu/i/4IHbqZPaLL0AdtJWEOL7nroQ90Hy', NULL, '2017-09-24 08:31:44', '2017-09-24 08:31:44'),
(6, 'Therapist', 'therapist', '0123456784', 'therapist@gmail.com', '$2y$10$HD6U6Fjg8lWqmXOo7CBj2.cz51CIkfFG8BuxEd3i9XZiXdWjJ6txu', NULL, '2017-09-24 08:31:44', '2017-09-24 08:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `therapist_id` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `time_start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Tentative','Completed','No-show') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`key`, `value`) VALUES
('survey_form', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `NRIC` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_visit` datetime DEFAULT NULL,
  `remarks` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PIN` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SHOP` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `descriptions`
--

INSERT INTO `descriptions` (`id`, `description`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae dui a odio maximus ultricies. Cras rhoncus diam eget porta gravida. Vivamus est lectus, facilisis quis dictum vitae, elementum id risus. Phasellus a ligula vitae odio vehicula sagittis ut ac odio. Aliquam nec lorem orci. Nulla mauris lectus, sagittis sed ante eu, varius porta lorem. Suspendisse tincidunt ex sit amet pulvinar tristique. Nam eget nisl in sem dapibus hendrerit. Aenean ac enim a risus pretium mollis. Curabitur vitae nisi sit amet lacus viverra aliquet vel eu magna. Nam sollicitudin, felis quis laoreet efficitur, metus quam faucibus lorem, eu pretium arcu diam ac massa. Sed laoreet bibendum purus, vitae efficitur justo rutrum ac. Quisque eu varius dolor.', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

CREATE TABLE `durations` (
  `id` int(10) UNSIGNED NOT NULL,
  `minutes` int(11) NOT NULL,
  `display` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`id`, `minutes`, `display`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 60, '60 mins', NULL, NULL, NULL, NULL),
(2, 10, '10 mins', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `massage_service_items`
--

CREATE TABLE `massage_service_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_eng` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_cn` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `full_price` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PPP_Type1_Price` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PPP_Type2_Price` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PPP_Type3_Price` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PPP_Type4_Price` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PPP_Type5_Price` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `auto_approval` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ITM_Type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=Massage,2=Addons,3=Goods.',
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(705, '2014_10_12_000000_create_users_table', 1),
(706, '2014_10_12_100000_create_password_resets_table', 1),
(707, '2017_08_31_080609_create_admins_table', 1),
(708, '2017_09_01_091400_entrust_setup_tables', 1),
(709, '2017_09_05_094203_create_shops_table', 1),
(710, '2017_09_05_095718_create_rooms_table', 1),
(711, '2017_09_05_100728_create_massage_service_items_table', 1),
(712, '2017_09_05_102933_create_promotions_table', 1),
(713, '2017_09_05_105554_create_package_types_table', 1),
(714, '2017_09_06_021522_create_customers_table', 1),
(715, '2017_09_06_022354_create_staffs_table', 1),
(716, '2017_09_06_025012_create_package_sales_table', 1),
(717, '2017_09_18_084800_create_nationalities_table', 1),
(718, '2017_09_19_070127_create_configurations_table', 1),
(719, '2017_09_19_094105_create_durations_table', 1),
(720, '2017_09_19_101735_create_descriptions_table', 1),
(721, '2017_09_24_131427_create_bookings_table', 1),
(722, '2017_09_24_135845_create_resigns_table', 1),
(723, '2017_09_24_142808_create_shop_opening_hours_table', 1),
(724, '2017_09_24_152108_create_on_going_promotions', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `short`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', NULL, NULL, '2017-09-24 08:31:49', '2017-09-24 08:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `on_going_promotions`
--

CREATE TABLE `on_going_promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_expenditure` int(11) DEFAULT NULL,
  `time_period` int(11) DEFAULT NULL,
  `free_service` int(11) DEFAULT NULL,
  `discounted` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_sales`
--

CREATE TABLE `package_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `sale_attributed` int(11) DEFAULT NULL,
  `sale_entered` int(11) DEFAULT NULL,
  `cash` double(8,2) DEFAULT NULL,
  `nets` double(8,2) DEFAULT NULL,
  `credit_card` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_types`
--

CREATE TABLE `package_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1:Service quantity, 2:monetary value',
  `price` double(8,2) DEFAULT NULL,
  `bonus_value` double(8,2) DEFAULT NULL,
  `time_period` int(11) DEFAULT NULL,
  `commission` double(8,2) DEFAULT NULL,
  `package_range` int(11) DEFAULT NULL COMMENT '1:Global, 2:Instance',
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_types`
--

INSERT INTO `package_types` (`id`, `name`, `type`, `price`, `bonus_value`, `time_period`, `commission`, `package_range`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'Chine full body', 1, 5.00, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'view-role', 'View Role', 'View Role Page', '2017-09-24 08:31:45', '2017-09-24 08:31:45'),
(2, 'create-role', 'Create Role', 'Create Role', '2017-09-24 08:31:45', '2017-09-24 08:31:45'),
(3, 'edit-role', 'Edit Role', 'Edit Role', '2017-09-24 08:31:45', '2017-09-24 08:31:45'),
(4, 'delete-role', 'Delete Role', 'Delete Role', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(5, 'view-shop', 'View Shop', 'View Shop Page', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(6, 'create-shop', 'Create Shop', 'Create Shop', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(7, 'edit-shop', 'Edit Shop', 'Edit Shop', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(8, 'delete-shop', 'Delete Shop', 'Delete Shop', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(9, 'view-staff', 'View Staff', 'View Staff Page', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(10, 'create-staff', 'Create Staff', 'Create Staff', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(11, 'edit-staff', 'Edit Staff', 'Edit Staff', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(12, 'delete-staff', 'Delete Staff', 'Delete Staff', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(13, 'view-payroll', 'View Payroll', 'View Payroll Page', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(14, 'create-payroll', 'Create Payroll', 'Create Payroll', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(15, 'edit-payroll', 'Edit Payroll', 'Edit Payroll', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(16, 'delete-payroll', 'Delete Payroll', 'Delete Payroll', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(17, 'view-customer', 'View Customer', 'View Customer Page', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(18, 'create-customer', 'Create Customer', 'Create Customer', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(19, 'edit-customer', 'Edit Customer', 'Edit Customer', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(20, 'delete-customer', 'Delete Customer', 'Delete Customer', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(21, 'view-schedule-shift', 'View Schedule Shift', 'View Schedule Shift Page', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(22, 'create-schedule-shift', 'Create Schedule Shift', 'Create Schedule Shift', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(23, 'edit-schedule-shift', 'Edit Schedule Shift', 'Edit Schedule Shift', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(24, 'delete-schedule-shift', 'Delete Schedule Shift', 'Delete Schedule Shift', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(25, 'view-packages', 'View Packages', 'View Packages Page', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(26, 'create-packages', 'Create Packages', 'Create Packages', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(27, 'edit-packages', 'Edit Packages', 'Edit Packages', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(28, 'delete-packages', 'Delete Packages', 'Delete Packages', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(29, 'view-payment', 'View Payment', 'View Payment Page', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(30, 'create-payment', 'Create Payment', 'Create Payment', '2017-09-24 08:31:46', '2017-09-24 08:31:46'),
(31, 'edit-payment', 'Edit Payment', 'Edit Payment', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(32, 'delete-payment', 'Delete Payment', 'Delete Payment', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(33, 'view-invoice', 'View Invoice', 'View Invoice Page', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(34, 'create-invoice', 'Create Invoice', 'Create Invoice', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(35, 'edit-invoice', 'Edit Invoice', 'Edit Invoice', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(36, 'delete-invoice', 'Delete Invoice', 'Delete Invoice', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(37, 'view-salary', 'View Salary', 'View Salary Page', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(38, 'create-salary', 'Create Salary', 'Create Salary', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(39, 'edit-salary', 'Edit Salary', 'Edit Salary', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(40, 'delete-salary', 'Delete Salary', 'Delete Salary', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(41, 'view-promotion', 'View Promotion', 'View Promotion Page', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(42, 'create-promotion', 'Create Promotion', 'Create Promotion', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(43, 'edit-promotion', 'Edit Promotion', 'Edit Promotion', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(44, 'delete-promotion', 'Delete Promotion', 'Delete Promotion', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(45, 'view-configuration', 'View Configuration', 'View Configuration Page', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(46, 'create-configuration', 'Create Configuration', 'Create Configuration', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(47, 'edit-configuration', 'Edit Configuration', 'Edit Configuration', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(48, 'delete-configuration', 'Delete Configuration', 'Delete Configuration', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(49, 'view-massage', 'View Massage', 'View Massage Page', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(50, 'create-massage', 'Create Massage', 'Create Massage', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(51, 'edit-massage', 'Edit Massage', 'Edit Massage', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(52, 'delete-massage', 'Delete Massage', 'Delete Massage', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(53, 'view-message', 'View Message', 'View Message Page', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(54, 'create-message', 'Create Message', 'Create Message', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(55, 'edit-message', 'Edit Message', 'Edit Message', '2017-09-24 08:31:47', '2017-09-24 08:31:47'),
(56, 'delete-message', 'Delete Message', 'Delete Message', '2017-09-24 08:31:47', '2017-09-24 08:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `rate` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL COMMENT '1=Discount rate,2=Discount flat rate',
  `item_type` int(11) DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resigns`
--

CREATE TABLE `resigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `STAFF_AccID` int(11) DEFAULT NULL,
  `action_date` datetime DEFAULT NULL,
  `submit_date` datetime DEFAULT NULL,
  `permit_cancel_date` datetime DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_StaffID` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1=Resign,2=Fire',
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'global_admin', 'Global Administrator', 'Full controller', '2017-09-24 08:31:45', '2017-09-24 08:31:45'),
(2, 'admin', 'Administrator', NULL, '2017-09-24 08:31:45', '2017-09-24 08:31:45'),
(3, 'owner', 'Owner', NULL, '2017-09-24 08:31:45', '2017-09-24 08:31:45'),
(4, 'manager', 'Manager', NULL, '2017-09-24 08:31:45', '2017-09-24 08:31:45'),
(5, 'reception', 'Reception', NULL, '2017-09-24 08:31:45', '2017-09-24 08:31:45'),
(6, 'therapist', 'Therapist', NULL, '2017-09-24 08:31:45', '2017-09-24 08:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `UEN` int(11) DEFAULT NULL,
  `company_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ME_Lic` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ME_Exp` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CASE_Exp` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LIC_OwnerID` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LIC_Owner_Name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LIC_Owner_Mobile` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_room` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=massage,2=nails,3=hair',
  `address_line1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `general_managerID` int(11) DEFAULT NULL,
  `payment_default` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1= before service, 2 = after service',
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `UEN`, `company_name`, `business_name`, `ME_Lic`, `ME_Exp`, `CASE_Exp`, `LIC_OwnerID`, `LIC_Owner_Name`, `LIC_Owner_Mobile`, `total_room`, `start_date`, `end_date`, `type`, `address_line1`, `address_line2`, `general_managerID`, `payment_default`, `logo`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Shop 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fa-clock-o', NULL, NULL, NULL, NULL),
(2, NULL, NULL, 'Shop 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fa-cart-arrow-down', NULL, NULL, NULL, NULL),
(3, NULL, NULL, 'Shop 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fa-globe', NULL, NULL, NULL, NULL),
(4, NULL, NULL, 'Shop 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fa-user-secret', NULL, NULL, NULL, NULL),
(5, NULL, NULL, 'Shop 5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fa-calendar-minus-o', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_opening_hours`
--

CREATE TABLE `shop_opening_hours` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `day_from` time DEFAULT NULL,
  `day_to` time DEFAULT NULL,
  `night_from` time DEFAULT NULL,
  `night_to` time DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `UEN` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NICK` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 = manager, 2=therapist, 3=reception, 4 = service, 5=cleaner, 6=sale',
  `passport_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_expiry` datetime DEFAULT NULL,
  `permit_type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permit_expiry` datetime DEFAULT NULL,
  `SPF_approval_date` datetime DEFAULT NULL,
  `SPF_approval_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_basic` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_C1Type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_C1Value` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_C2Type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_C2Threshold` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_C2Value` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_visit` datetime DEFAULT NULL,
  `remarks` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PIN` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `create_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone_number`, `email`, `password`, `id_number`, `birthday`, `gender`, `address`, `postcode`, `nationality_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Customer', 'customer', '0123456789', 'customer@gmail.com', '$2y$10$Bxy3PuurcQSg6YH0oLXkOur3XzOta/pT3eIwnhnKNGADOhsytHIra', '123123123', '2017-09-24', 'male', NULL, '10000', 1, NULL, '2017-09-24 08:31:44', '2017-09-24 08:31:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `durations`
--
ALTER TABLE `durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `massage_service_items`
--
ALTER TABLE `massage_service_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_going_promotions`
--
ALTER TABLE `on_going_promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_sales`
--
ALTER TABLE `package_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_types`
--
ALTER TABLE `package_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resigns`
--
ALTER TABLE `resigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_opening_hours`
--
ALTER TABLE `shop_opening_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `durations`
--
ALTER TABLE `durations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `massage_service_items`
--
ALTER TABLE `massage_service_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=725;
--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `on_going_promotions`
--
ALTER TABLE `on_going_promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `package_sales`
--
ALTER TABLE `package_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `package_types`
--
ALTER TABLE `package_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resigns`
--
ALTER TABLE `resigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shop_opening_hours`
--
ALTER TABLE `shop_opening_hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
