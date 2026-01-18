-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2025 at 02:30 PM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apisells_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `biocopy_sub`
--

CREATE TABLE `biocopy_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `bio_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birth_log`
--

CREATE TABLE `birth_log` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `birthRegistrationNumber` varchar(500) DEFAULT NULL,
  `officeAddressFirst` varchar(500) DEFAULT NULL,
  `officeAddressSecond` varchar(500) DEFAULT NULL,
  `gender` varchar(500) DEFAULT NULL,
  `dateOfRegistration` varchar(500) DEFAULT NULL,
  `dateOfIssuance` varchar(500) DEFAULT NULL,
  `barCode` varchar(500) DEFAULT NULL,
  `qrLink` varchar(500) DEFAULT NULL,
  `dateOfBirth` varchar(500) DEFAULT NULL,
  `dateOfBirthText` varchar(500) DEFAULT NULL,
  `nameBangla` varchar(500) DEFAULT NULL,
  `nameEnglish` varchar(500) DEFAULT NULL,
  `fatherNameBangla` varchar(500) DEFAULT NULL,
  `fatherNameEnglish` varchar(500) DEFAULT NULL,
  `fatherNationalityBangla` varchar(500) DEFAULT NULL,
  `fatherNationalityEnglish` varchar(500) DEFAULT NULL,
  `motherNameBangla` varchar(500) DEFAULT NULL,
  `motherNameEnglish` varchar(500) DEFAULT NULL,
  `motherNationalityBangla` varchar(500) DEFAULT NULL,
  `motherNationalityEnglish` varchar(500) DEFAULT NULL,
  `birthplaceBangla` varchar(500) DEFAULT NULL,
  `birthplaceEnglish` varchar(500) DEFAULT NULL,
  `permanentAddressBangla` varchar(500) DEFAULT NULL,
  `permanentAddressEnglish` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bkshstatement_sub`
--

CREATE TABLE `bkshstatement_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bksh_sub`
--

CREATE TABLE `bksh_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `bksh_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bksh_sub`
--

INSERT INTO `bksh_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `bksh_text`, `delivery_text`) VALUES
(1, 'Bhhhh', NULL, NULL, NULL, NULL, NULL, 'Bikash Information ORDER', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 08:35:06', '2025-02-17 08:35:06', '20250217', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `bmet_sub`
--

CREATE TABLE `bmet_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `bmet_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmet_sub`
--

INSERT INTO `bmet_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `bmet_text`, `delivery_text`) VALUES
(1, 'Bbbbbbb', NULL, NULL, NULL, NULL, NULL, 'BMET APPROVAL ORDER', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 08:35:44', '2025-02-17 08:35:44', '20250217', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `brs_sub`
--

CREATE TABLE `brs_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `brs_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brs_sub`
--

INSERT INTO `brs_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `brs_text`, `delivery_text`) VALUES
(1, 'Vghhh', NULL, NULL, NULL, NULL, NULL, 'Birth Certuficate Data ORDER', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 08:36:02', '2025-02-17 08:36:02', '20250217', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `calllist2_sub`
--

CREATE TABLE `calllist2_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calllist2_sub`
--

INSERT INTO `calllist2_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, '015888', NULL, NULL, NULL, NULL, NULL, '(6M) Call LIst', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-16 21:55:21', '2025-02-16 21:55:21', '20250216', NULL, ''),
(2, '58888', NULL, NULL, NULL, NULL, NULL, '(6M) Call LIst', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:29:10', '2025-02-17 00:29:10', '20250217', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `calllist_sub`
--

CREATE TABLE `calllist_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calllist_sub`
--

INSERT INTO `calllist_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, '55555', NULL, NULL, NULL, NULL, NULL, '(3M) Call LIst', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:30:04', '2025-02-17 00:30:04', '20250217', NULL, ''),
(2, '01641415677', NULL, NULL, NULL, NULL, NULL, '(3M) Call LIst', NULL, NULL, 'কল লিস্ট ', 'mdsujon524@gmail.com', 2, '77fa758e7a00ec3b7456e89d8b64643b.pdf', '2025-02-25 11:40:12', '2025-02-27 16:12:50', '20250225', '20250227', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cardcopy_sub`
--

CREATE TABLE `cardcopy_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `name` varchar(1500) NOT NULL,
  `nameEn` varchar(1500) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dateOfBirth` varchar(100) NOT NULL,
  `father` varchar(1500) NOT NULL,
  `mother` varchar(1500) NOT NULL,
  `spouse` varchar(1500) NOT NULL,
  `nationalId` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `photo` longtext NOT NULL,
  `permanentAddress` longtext NOT NULL,
  `presentAddress` longtext NOT NULL,
  `permanentDistrict` varchar(1000) NOT NULL,
  `permanentUpazila` varchar(1000) NOT NULL,
  `presentDistrict` varchar(1000) NOT NULL,
  `presentUpazila` varchar(1000) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `cost` longtext DEFAULT NULL,
  `minr` longtext DEFAULT NULL,
  `msg` longtext DEFAULT NULL,
  `reg` longtext DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `ssorder` varchar(10) DEFAULT NULL,
  `serverAndSign` int(11) NOT NULL,
  `serverUnOffCost` int(11) NOT NULL,
  `birthCardCost` int(11) NOT NULL,
  `nid2numbers` int(11) NOT NULL,
  `biomatric` int(11) NOT NULL,
  `tin` int(11) NOT NULL,
  `cc_sign2server_price` int(11) NOT NULL,
  `cc_card_make_price` int(11) NOT NULL,
  `cc_server_unofficial_price` int(11) NOT NULL,
  `cc_sign_price` int(11) NOT NULL,
  `cc_server_price` int(11) NOT NULL,
  `cc_card_price` int(11) NOT NULL,
  `cc_sign_control` int(11) NOT NULL,
  `cc_server_control` int(11) NOT NULL,
  `cc_card_control` int(11) NOT NULL,
  `cc_bio_control` int(11) NOT NULL,
  `cc_bio_price` int(11) NOT NULL,
  `cc_tin_control` varchar(255) NOT NULL,
  `cc_tin_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `control`
--

INSERT INTO `control` (`id`, `cost`, `minr`, `msg`, `reg`, `date`, `ssorder`, `serverAndSign`, `serverUnOffCost`, `birthCardCost`, `nid2numbers`, `biomatric`, `tin`, `cc_sign2server_price`, `cc_card_make_price`, `cc_server_unofficial_price`, `cc_sign_price`, `cc_server_price`, `cc_card_price`, `cc_sign_control`, `cc_server_control`, `cc_card_control`, `cc_bio_control`, `cc_bio_price`, `cc_tin_control`, `cc_tin_price`) VALUES
(1, '5', '150', 'hey', '0', '2022-12-09 10:22:03', '0', 130, 10, 6, 20, 10, 50, 10, 5, 10, 65, 50, 75, 1, 1, 1, 1, 150, '1', '50');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_control`
--

CREATE TABLE `file_control` (
  `id` int(11) NOT NULL,
  `cost` longtext DEFAULT NULL,
  `minr` longtext DEFAULT NULL,
  `msg` longtext DEFAULT NULL,
  `reg` longtext DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `ssorder` varchar(10) DEFAULT NULL,
  `cc_calllist_price` int(11) NOT NULL,
  `cc_calllist2_price` int(11) NOT NULL,
  `cc_passportvarify_price` int(11) NOT NULL,
  `cc_passportdeliveryslip_price` int(11) NOT NULL,
  `cc_calllist_control` int(11) NOT NULL,
  `cc_calllist2_control` int(11) NOT NULL,
  `cc_passportvarify_control` int(11) NOT NULL,
  `cc_passportdeliveryslip_control` int(11) NOT NULL,
  `cc_PassportSB_control` int(11) NOT NULL,
  `cc_PassportSB_price` int(11) NOT NULL,
  `cc_Passportscan_control` int(11) NOT NULL,
  `cc_Passportscan_price` int(11) NOT NULL,
  `cc_nogodstatement_control` int(11) NOT NULL,
  `cc_nogodstatement_price` int(11) NOT NULL,
  `cc_nameaddress_control` int(11) NOT NULL,
  `cc_nameaddress_price` int(11) NOT NULL,
  `cc_bkshstatement_control` int(11) NOT NULL,
  `cc_bkshstatement_price` int(11) NOT NULL,
  `cc_roketstatement_control` int(11) NOT NULL,
  `cc_roketstatement_price` int(11) NOT NULL,
  `cc_useridpass_control` varchar(255) NOT NULL,
  `cc_useridpass_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_control`
--

INSERT INTO `file_control` (`id`, `cost`, `minr`, `msg`, `reg`, `date`, `ssorder`, `cc_calllist_price`, `cc_calllist2_price`, `cc_passportvarify_price`, `cc_passportdeliveryslip_price`, `cc_calllist_control`, `cc_calllist2_control`, `cc_passportvarify_control`, `cc_passportdeliveryslip_control`, `cc_PassportSB_control`, `cc_PassportSB_price`, `cc_Passportscan_control`, `cc_Passportscan_price`, `cc_nogodstatement_control`, `cc_nogodstatement_price`, `cc_nameaddress_control`, `cc_nameaddress_price`, `cc_bkshstatement_control`, `cc_bkshstatement_price`, `cc_roketstatement_control`, `cc_roketstatement_price`, `cc_useridpass_control`, `cc_useridpass_price`) VALUES
(1, '5', '150', 'hey', '0', '2022-12-09 10:22:03', '0', 1200, 2000, 200, 950, 1, 1, 1, 1, 1, 850, 1, 50, 1, 1600, 1, 550, 1, 3200, 1, 550, '1', '100');

-- --------------------------------------------------------

--
-- Table structure for table `imei_sub`
--

CREATE TABLE `imei_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `imei_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imei_sub`
--

INSERT INTO `imei_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `imei_text`, `delivery_text`) VALUES
(2, 'Imei 1 354650139590453  Imei 2 355740249590458', NULL, NULL, NULL, NULL, NULL, 'IMEI Track ORDER', NULL, NULL, '', 'imambd711@gmail.com', 2, NULL, '2025-02-27 18:05:16', '2025-03-01 12:47:04', '20250228', NULL, 'IMEI 355740249590458 No Data Available within 90 Days - Banglalink IMEI 354650139590453 No Data Available within 90 Days -   IMEI: 355740249590458 355740249590450, 8801311854941, 20241229 [GP] Sorry No records found for IMEI: 354650139590453 [GP]  IMEI: 354650139590453, MSISDN: 8801613578897, DateTime: 29-DEC-2024 11:37:57. [Robi] IMEI: 355740249590458, MSISDN: Not found in last 365 days. [Robi]', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Location_sub`
--

CREATE TABLE `Location_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `text_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `nameBangla` varchar(255) NOT NULL,
  `nameEnglish` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `motherName` varchar(255) NOT NULL,
  `birthPlace` varchar(255) NOT NULL,
  `dateOfBirth` varchar(255) NOT NULL,
  `bloodGroup` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `maritalStatus` varchar(255) NOT NULL,
  `spouseName` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `userImg` longblob NOT NULL,
  `signatureImg` longblob NOT NULL,
  `cardUser` varchar(255) NOT NULL,
  `insertTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `nameBangla`, `nameEnglish`, `nid`, `pin`, `fatherName`, `motherName`, `birthPlace`, `dateOfBirth`, `bloodGroup`, `gender`, `maritalStatus`, `spouseName`, `religion`, `address`, `userImg`, `signatureImg`, `cardUser`, `insertTime`) VALUES
(1, 'মোঃ ফিরোজ আলী', 'Md Firoz Ali', '', '', '', '', '', '', '', '', '', '', '', '', 0x696d6167652f34323935303833396563333134323736666633383437373438366434303536352e706e67, 0x696d6167652f34323935303833396563333134323736666633383437373438366434303536352e706e67, 'mdshahinislam494@gmail.com', '2025-02-16 10:05:14 PM'),
(2, 'মোঃ ফিরোজ আলী', 'Md Firoz Ali', '', '', '', '', '', '', '', '', '', '', '', '', 0x696d6167652f34323935303833396563333134323736666633383437373438366434303536352e706e67, 0x696d6167652f34323935303833396563333134323736666633383437373438366434303536352e706e67, 'mdshahinislam494@gmail.com', '2025-02-16 10:09:53 PM'),
(3, 'মামুন সরদার', 'Mamun Sarder', '1925949875', '19800113463182984', 'সরদার মুজিবর রহমান', 'জাহেদা বেগম', 'বাগেরহাট', '07 Jun 1980', '', '', '', '', '', 'গ্রাম/রাস্তা: নলধা, ডাকঘর: নলধা - ৯৩৭০, ফকিরহাট, বাগেরহাট', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f313932353934393837352e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f313932353934393837352e706e67, 'mamun.kbf@gmail.com', '2025-02-17 10:54:32 AM'),
(4, 'সেলিম হোসাইন', 'SELIM HOSSAIN', '3305894945', '19981917512000131', 'রোস্তম আলী', 'শাহিনা বেগম', 'কুমিল্লা', '12 Apr 1998', '', '', 'Unknown', 'N/A', 'Islam', 'বাসা/হোল্ডিং: , গ্রাম/রাস্তা: বড়কান্দা, ডাকঘর: শিবনগর, -  , , কুমিল্লা', 0x696d6167652f32653364643738623730623166626362306436303939613366323230376336312e706e67, 0x696d6167652f32653364643738623730623166626362306436303939613366323230376336312e706e67, 'mdselimmeg@gmail.com', '2025-02-17 12:20:10 PM'),
(5, 'আবদুল করিম', 'Abdul Karim', '8242027715', '19882219415505602', 'বাদশা মিয়া', 'গোলতাজ বেগম', 'কক্সবাজার', '07 Mar 1988', '', '', 'Unknown', 'N/A', 'Islam', 'বাসা/হোল্ডিং: মরিচ্যা পালং , গ্রাম/রাস্তা: মরিচ্যা পালং, ডাকঘর: মরিচ্যা পালং, - ৪৭৫০ , উখিয়া, কক্সবাজার', 0x68747470733a2f2f7072706f7274616c2e6e6964772e676f762e62642f66696c652d64662f302f662f322f64653232653762642d336535382d346135352d623937342d3833633534656537363638362f50686f746f2d64653232653762642d336535382d346135352d623937342d3833633534656537363638362e6a70673f582d416d7a2d416c676f726974686d3d415753342d484d41432d53484132353626582d416d7a2d43726564656e7469616c3d66696c656f626a253246323032353032313725324675732d656173742d312532467333253246617773345f7265717565737426582d416d7a2d446174653d3230323530323137543037313033395a26582d416d7a2d457870697265733d31323026582d416d7a2d5369676e6564486561646572733d686f737426582d416d7a2d5369676e61747572653d39343838383261666238363765633233646630363366356663343731366432626230306537643932306337363034656261643763303461363637633435653261, 0x696d6167652f31383734643132396234373038346366326232326162303066623837343361662e706e67, 'tirasel2007@gmail.com', '2025-02-17 01:13:01 PM'),
(6, 'জালাল উদ্দিন শেখ', 'Jalal Uddin Sheikh', '7349464870', '19705016371752450', 'সামছুদ্দিন শেখ', 'মোছাঃ আয়শা খাতুন', 'কুষ্টিয়া', '13-May-1970', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ বুজরুক মির্জাপুর, মৌজা/মহল্লা।, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ খোকসা, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ কুষ্টিয়া, অঞ্চলঃ, বিভাগঃ খুলনা।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f38363163643766343334386639623066353634383461323532633432656261322e706e67, 'skaja336@gmail.com', '2025-02-17 07:22:05 PM'),
(7, 'মোঃ সদর উদ্দিন', 'Md. Sodar Uddin', '1024710400', '', 'সামছুল উদ্দিন', 'আয়শা খাতুন', 'কুষ্টিয়া', '13-Mar-1959', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তা। বুজরুক মির্জাপুর, মৌজা/মহল্লায়, ইউনিয়ন/ওয়ার্ডঃ পোস্ট অফিসঃ খোকসা, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ কুষ্টিয়া, অঞ্চলঃ, বিভাগঃ খুলনা।', 0x696d6167652f38333535343065383837653163653039623362323836343837386631383333332e706e67, 0x696d6167652f38363163643766343334386639623066353634383461323532633432656261322e706e67, 'skaja336@gmail.com', '2025-02-17 07:33:20 PM'),
(8, 'বাবুল', 'BABUL', '4814576000045', '19744814576000045', 'মৃত সামসু উদ্দিন', 'মৃত মোছাঃ মল্লিকা বেগম', 'কিশোরগঞ্জ', '10 May 1974', '', '', '', '', '', 'বাসা/হোল্ডিং: -, গ্রাম/রাস্তা: আদমপুর, আদমপুর, ডাকঘর: বেতাল - ২৩৩০, কটিয়াদী, কিশোরগঞ্জ', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f363930353830363938372e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f363930353830363938372e706e67, 'jahirulislamsohan21@gmail.com', '2025-02-18 10:33:50 AM'),
(9, 'শ্রী সুজন চন্দ্র বিশ্বাস', 'SUJAN CHANDRA BISHWAS', '19974810634000228', '19974810634000228', 'কন্ঠু চন্দ্র বিশ্বাস', 'নমিতা দেবী বিশ্বাস', 'কিশোরগঞ্জ', '03 Feb 1997', '', '', '', '', '', 'বাসা/হোল্ডিং: -, গ্রাম/রাস্তা: সারের দিঘি, ডাকঘর: দিলালপুর - ২৩৩৬, বাজিতপুর, কিশোরগঞ্জ', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f363030343733323130302e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f363030343733323130302e706e67, 'jahirulislamsohan21@gmail.com', '2025-02-18 12:08:55 PM'),
(10, 'মোঃ রাকিব হোসেইন', 'MD. RAKIB HOSSEN', '1506414026', '19961590602001122', 'মোঃ তহিদুল ইসলাম', 'জ্যোৎস্না বেগম', 'বরিশাল', '20 Jun 1996', 'O-', '', '', '', '', 'বাসা/হোল্ডিং: এফ / এল -৮, গ্রাম/রাস্তা: পূর্ব নাসিরাবাদ, ডাকঘর: বায়েজিদ বোস্তামী - ৮২৭০, বায়জিদ বোস্তামী, চট্টগ্রাম সিটি কর্পোরেশন, চট্টগ্রাম', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f313530363431343032362e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f313530363431343032362e706e67, 'zzz@gmail.com', '2025-02-18 12:42:02 PM'),
(11, 'নাছির উদ্দিন', 'NASIR UDDIN', '5129211297', '19922216670000289', 'মোহাম্মদ কালু', 'নাছিমা খাতুন', 'কক্সবাজার', '01 Feb 1992', 'A+', '', '', '', '', 'বাসা/হোল্ডিং: ১২৩, গ্রাম/রাস্তা: বড় ধলিরছড়া, ধলিরছড়া, ডাকঘর: ধলিরছড়া - ৪৭০০, রামু, কক্সবাজার', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f353132393231313239372e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f353132393231313239372e706e67, 'tirasel2007@gmail.com', '2025-02-18 01:18:37 PM'),
(12, 'মোসাঃ সায়েরা আকতার বানু', 'Mst. Sayera Akhter Banu', '8249699177', '19778524906077736', 'মোঃ গিয়াস উদ্দিন', 'সাজেনুর বেগম', 'চাঁপাইনবাবগঞ্জ', '15 Sep 1976', 'A+', '', '', '', '', 'বাসা/হোল্ডিং: ৬৯/০১, গ্রাম/রাস্তা: বড়বনগ্রাম চকপাড়া, ডাকঘর: সপুরা - ৬২০৩, শাহ্ ‌  মখদুম, রাজশাহী সিটি কর্পোরেশন, রাজশাহী', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f383234393639393137372e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f383234393639393137372e706e67, 'abhrbd@gmail.com', '2025-02-18 01:28:27 PM'),
(13, 'আয়েশা বেগম', 'AYESHA BEGUM', '8729029648', '19992216657000750', 'মীর আহমদ', 'রাশেদা বেগম', 'কক্সবাজার', '06 Mar 1999', 'O+', '', '', '', '', 'বাসা/হোল্ডিং: ৭৭১, গ্রাম/রাস্তা: ধোয়া পালং পূর্ব পাড়া, ডাকঘর: রামু - ৪৭৩০, রামু, কক্সবাজার', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f383732393032393634382e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f383732393032393634382e706e67, 'tirasel2007@gmail.com', '2025-02-19 10:17:17 AM'),
(14, 'মোছাঃ লিপা আক্তার', 'MST. LEPA AKTHER', '4814916000228', '19914814916000228', 'মতিউর রহমান', 'রহিমা খাতুন', 'কিশোরগঞ্জ', '17 Dec 1991', '', '', '', '', '', 'বাসা/হোল্ডিং: -, গ্রাম/রাস্তা: কামালিয়ারচর, ডাকঘর: বিন্নাটি - ২৩০০, কিশোরগঞ্জ সদর, কিশোরগঞ্জ', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f373331333630393732342e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f373331333630393732342e706e67, 'jahirulislamsohan21@gmail.com', '2025-02-19 10:28:39 AM'),
(15, 'মোছাঃ সাবিনা ইয়াসমিন', 'MST. SABINA YASMIN', '4824504171035', '19824824504171035', 'মোঃ নুরুল ইসলাম', 'মোছাঃ বিউটি আক্তার', 'কিশোরগঞ্জ', '04 Oct 1982', '', '', '', '', '', 'গ্রাম/রাস্তা: চড়িয়াকোনা, চড়িয়াকোনা, ডাকঘর: কটিয়াদী - ২৩৩০, কটিয়াদী, কটিয়াদি পৌরসভা, কিশোরগঞ্জ', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f393536393531373035362e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f393536393531373035362e706e67, 'jahirulislamsohan21@gmail.com', '2025-02-19 10:45:15 AM'),
(16, 'মোঃ আঃ জলীল', 'Md Abdul Jalel', '4644257737', '19792692985042751', 'ফজলুল হক', 'আমেনা বেগম', 'নারায়ণগঞ্জ', '02 Jan 1979', '', '', '', '', '', 'বাসা/হোল্ডিং: ৬/৩, গ্রাম/রাস্তা: অসার রোড়, ধলপুর, ডাকঘর: ফরিদা বাদ - ১২০৪, যাত্রাবাড়ী, ঢাকা দক্ষিণ সিটি কর্পোরেশন, ঢাকা', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f343634343235373733372e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f343634343235373733372e706e67, 'mdselimmeg@gmail.com', '2025-02-19 07:02:54 PM'),
(17, 'মোঃ আঃ জলীল', 'Md Abdul Jalel', '2692985042751', '19792692985042751', 'ফজলুল হক', 'আমেনা বেগম', 'নারায়ণগঞ্জ', '02 Jan 1979', '', '', '', '', '', 'বাসা/হোল্ডিং: ৬/৩, গ্রাম/রাস্তা: অসার রোড়, ধলপুর, ডাকঘর: ফরিদা বাদ - ১২০৪, যাত্রাবাড়ী, ঢাকা দক্ষিণ সিটি কর্পোরেশন, ঢাকা', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f343634343235373733372e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f343634343235373733372e706e67, 'mdselimmeg@gmail.com', '2025-02-19 07:04:05 PM'),
(18, 'মোঃ স্বপন', 'Md Sawpon', '6434968506', '19866725812299570', 'মোঃ শাজাহান', 'হাছিনা বেগম', 'বরগুনা', '01 Jan 1986', 'A+', '', '', '', '', 'গ্রাম/রাস্তা: উত্তর রায়ভোগ, ডাকঘর: ডালভাঙ্গা - ৮৭০০, বরগুনা সদর, বরগুনা', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f363433343936383530362e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f363433343936383530362e706e67, 'zzz@gmail.com', '2025-02-20 03:38:42 PM'),
(19, 'মোঃ রফিকুল ইসলাম', 'Md. Rafiqul Islam', '3252881754', '19588718611647262', 'আহমদ আলী মোড়ল', 'জবেদা খাতুন', 'সাতক্ষীরা', '18 Nov 1958', '', '', '', '', '', 'গ্রাম/রাস্তা: পশ্চিম বিড়ালক্ষ্মী, পশ্চিম বিড়ালক্ষ্মী, ডাকঘর: নওয়াবেঁকী - ৯৪৫২, শ্যামনগর, সাতক্ষীরা', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f333235323838313735342e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f333235323838313735342e706e67, 'zzz@gmail.com', '2025-02-20 08:59:46 PM'),
(20, 'মোছাঃ রোশেনা বেগম', 'MST. RUSHENA BEGUM', '5095074778', '19853617765687881', 'মোঃ সাজন মিয়া', 'মোছাঃ সায়রা বেগম', 'হবিগঞ্জ', '02 Jan 1985', '', '', '', '', '', 'গ্রাম/রাস্তা: গুমগুমিয়া, গুমগুমিয়া, ডাকঘর: সৈয়দগঞ্জ - ৩৩৭০, নবীগঞ্জ, হবিগঞ্জ', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f353039353037343737382e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f353039353037343737382e706e67, 'zzz@gmail.com', '2025-02-21 06:30:16 PM'),
(21, 'কাসমীরা আহমেদ', 'Kasmira Ahmed', '7352479245', '19971594309000427', 'মোঃ মামুনুর রশিদ', 'শিরু আকতার', 'চট্টগ্রাম', '07 Feb 1997', '', '', '', '', '', 'বাসা/হোল্ডিং: -, গ্রাম/রাস্তা: বিশ্ব ব্যাংক কলোনী আবাসিক এলাকা, বিশ্ব ব্যাংক কলোনী, ডাকঘর: ফিরোজশাহ - ৪২০৭, খুলশী, চট্টগ্রাম সিটি কর্পোরেশন, চট্টগ্রাম', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f373335323437393234352e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f373335323437393234352e706e67, 'mj4078743@gmail.com', '2025-02-22 10:53:22 AM'),
(22, 'মোঃ শাখাওয়াত', 'MD. SHAKHAOAT', '8704494312', '', '', '', '', '1992-03-05', '', '', '', '', '', '', 0x696d6167652f35303964643033643037326431636336363336316235306636366262303866302e706e67, 0x696d6167652f35303964643033643037326431636336363336316235306636366262303866302e706e67, 'mdshahinislam494@gmail.com', '2025-02-22 12:19:54 PM'),
(23, 'মোঃ শাখাওয়াত', 'MD. SHAKHAOAT', '8704494312', '', 'শহীদ শেখ', 'আফিয়া বেগম', 'মুন্সীগঞ্জ', '05-Mar-1992', 'AB+', '', '', '', '', 'বাসা/হোল্ডিং: শেখ বাড়ি, গ্রাম/রাস্তা: ফুলকুচি, মৌজা/মহল্লা: , ইউনিয়ন ওয়ার্ড: খিদিরপাড়া, ডাকঘর: শিলিমপুর - ১৫৪৩, উপজেলা: লৌহজং, জেলা: মুন্সীগঞ্জ, বিভাগ: ঢাকা', 0x696d6167652f35303964643033643037326431636336363336316235306636366262303866302e706e67, 0x696d6167652f38376561303139643732333837613733353039386466666334616364346238622e706e67, 'mdshahinislam494@gmail.com', '2025-02-22 12:33:12 PM'),
(24, 'মোঃ শাখাওয়াত', 'MD. SHAKHAOAT', '8704494312', '', 'শহীদ শেখ', 'আফিয়া বেগম', 'মুন্সীগঞ্জ', '05-Mar-1992', 'AB+', '', '', '', '', 'বাসা/হোল্ডিং: শেখ বাড়ি, গ্রাম/রাস্তা: ফুলকুচি, মৌজা/মহল্লা: , ইউনিয়ন ওয়ার্ড: খিদিরপাড়া, ডাকঘর: শিলিমপুর - ১৫৪৩, উপজেলা: লৌহজং, জেলা: মুন্সীগঞ্জ, বিভাগ: ঢাকা', 0x696d6167652f35303964643033643037326431636336363336316235306636366262303866302e706e67, 0x696d6167652f38376561303139643732333837613733353039386466666334616364346238622e706e67, 'mdshahinislam494@gmail.com', '2025-02-22 12:33:54 PM'),
(25, 'মোহাম্মদ অলি উদ্দিন তুহিন', 'Mohammad Oliuddin Tuhin', '9137617032', '', 'মোহাম্মদ ইব্রাহীম সেলিম', 'লুৎফুন নাহার', 'নোয়াখালী', '18 Dec 1985', 'AB-', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30633335353363623635303162646534656161396132623431653630326563662e706e67, 'skaja336@gmail.com', '2025-02-22 12:40:23 PM'),
(26, 'মোঃ সাহাব উদ্দিন', 'Md Sahab Uddin', '5987679361', '', 'নাদরের জমা', 'অজিবা খাতুন', 'নোয়াখালী', '15 Apr 1972', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।', 0x696d6167652f32663565643765383434373263633837613837336434623034633731343439312e706e67, 0x696d6167652f66666238366263333937643935303838626237393461653132373763366665302e706e67, 'skaja336@gmail.com', '2025-02-22 01:01:00 PM'),
(27, 'মোজাম্মেল হক', 'Mozammel Hoque', '3737646541', '', 'ওবায়দল হক', 'মৈজমা খাতুন', 'নোয়াখালী', '15 Oct 1976', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।', 0x696d6167652f64653532343061316236656664316136323264363163613136383765366564622e706e67, 0x696d6167652f66666238366263333937643935303838626237393461653132373763366665302e706e67, 'skaja336@gmail.com', '2025-02-22 01:13:42 PM'),
(28, 'মোঃ এনায়েত উল্যাহ', 'Md Enayet Ullah', '7787639009', '', 'মোঃ এনায়েত উল্যাহ', 'আনোয়ারা বেগম', 'নোয়াখালী', '10 Sep 1989', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।', 0x696d6167652f63646234663832613833323566343362303334373539346238633134656239652e706e67, 0x696d6167652f66666238366263333937643935303838626237393461653132373763366665302e706e67, 'skaja336@gmail.com', '2025-02-22 01:25:24 PM'),
(29, 'মজিবল হক', 'Mozibal Hoque', '5537642273', '', 'মোঃ ওবায়দুল হক', 'মৈজমা খাতুন', 'নোয়াখালী', '20 Jul 1978', 'AB-', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।', 0x696d6167652f32663565643765383434373263633837613837336434623034633731343439312e706e67, 0x696d6167652f66666238366263333937643935303838626237393461653132373763366665302e706e67, 'skaja336@gmail.com', '2025-02-22 01:32:57 PM'),
(30, 'মোছাঃ আরমিন জাহান ইতি', 'MST. ARMIN JAHAN ETI', '6924780098', '20069313894000140', 'মোঃ ইদ্রিস আলী', 'মোসাঃ মর্জিনা বেগম', 'টাঙ্গাইল', '18 Dec 2006', 'B+', '', '', '', '', 'বাসা/হোল্ডিং: -, গ্রাম/রাস্তা: উত্তর পাথালিয়া, ডাকঘর: ঝাওয়াইল - ১৯৯১, গোপালপুর, টাঙ্গাইল', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f363932343738303039382e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f363932343738303039382e706e67, 'zzz@gmail.com', '2025-02-22 02:37:36 PM'),
(31, 'রেশমী আক্তার', 'Rasmi Akter', '19901915425000050', '', 'আবুল হাসেম', 'ফাতেমা বেগম', 'কুমিল্লা', '01 Feb 1990', '', '', 'Unknown', 'N/A', '', 'বাসা/হোল্ডিং: , গ্রাম/রাস্তা: দড়িকান্দি, ডাকঘর: জয়পুর, -  , , কুমিল্লা', 0x696d6167652f65326162633534613031366431376564353066313862323137636265356564392e706e67, 0x696d6167652f33333931623032626464616133366361616566343730633638346237643438372e706e67, 'mazizulhaque392@gmail.com', '2025-02-22 04:04:40 PM'),
(32, 'মোঃ নুর আলম', 'MD NUR ALAM', '8687650799', '', 'নুর হোসেন', 'আমেনা বেগম', 'নোয়াখালী', '02 Jan 1989', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।\r\n', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-22 05:26:29 PM'),
(33, 'আব্দুস সোবাহান', 'Abdus Subhan ', '2837624648', '', 'আব্দুর রশিদ', 'মোহছেনা খাতুন', 'নোয়াখালী', '03 Jan 1982', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।\r\n', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-22 05:32:33 PM'),
(34, 'নিজাম উদ্দিন ', 'NIZAM UDDIN', '7787490957', '', 'আলী আজ্জম', 'হাজরা খাতুন ', 'নোয়াখালী', '10 Jan 1972', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।\r\n', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-22 05:37:18 PM'),
(35, 'জয়নাল আবেদীন ', 'JOYNAL ABEDIN', '9137510559', '', 'ইছমাইল ', 'রবিকা খাতুন ', 'নোয়াখালী', '08 Feb 1982', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।\r\n', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-22 05:44:24 PM'),
(36, 'অনুপ কুমার দাশ', 'Anup Kumar Dash', '4610136881', '19853811363334562', 'অরুন চন্দ্র দাশ', 'সুচিত্রা রানী দাশ', 'জয়পুরহাট', '11 Jul 1985', '', '', '', '', '', 'বাসা/হোল্ডিং: ১৬২, গ্রাম/রাস্তা: বানাপাড়া, চকরঘুনাথ, ডাকঘর: আক্কেলপুর - ৫৯৪০, আক্কেলপুর, জয়পুরহাট', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f343631303133363838312e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f343631303133363838312e706e67, 'ar6818862@gmail.com', '2025-02-22 07:36:19 PM'),
(37, 'অনুপ কুমার দাশ', 'Anup Kumar Dash', '4610136881', '19853811363334562', 'অরুন চন্দ্র দাশ', 'সুচিত্রা রানী দাশ', 'জয়পুরহাট', '11 Jul 1985', '', '', '', '', '', 'বাসা/হোল্ডিং: ১৬২, গ্রাম/রাস্তা: বানাপাড়া, চকরঘুনাথ, ডাকঘর: আক্কেলপুর - ৫৯৪০, আক্কেলপুর, জয়পুরহাট', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f343631303133363838312e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f343631303133363838312e706e67, 'ar6818862@gmail.com', '2025-02-22 07:57:49 PM'),
(38, 'রেশমী আক্তার', 'Rasmi Akter', '19901915425000050', '', ' মোঃ হাসেম আলী ', 'ফাতেমা বেগম', 'কুমিল্লা', '01 Feb 1990', '', '', 'Unknown', 'N/A', '', 'বাসা/হোল্ডিং: মোল্লা বাড়ি, গ্রাম/রাস্তা:মুন্সিকান্দি,আছাদপুর  ডাকঘর:ঘনিয়ারচর-৩৫৪১,হোমনা,কুমিল্লা', 0x696d6167652f65326162633534613031366431376564353066313862323137636265356564392e706e67, 0x696d6167652f33333931623032626464616133366361616566343730633638346237643438372e706e67, 'mazizulhaque392@gmail.com', '2025-02-22 08:22:31 PM'),
(39, 'মোঃ জাহাঙ্গীর আলম', 'Md Jahangir Alam', '1450722234', '19811592823590689', 'মোঃ শাহ আলম', 'নুর জাহান বেগম', 'চট্টগ্রাম', '20 Feb 1981', '', '', '', '', '', 'বাসা/হোল্ডিং: মোবারক আলী সওঃ বাড়ি, গ্রাম/রাস্তা: দেওয়ান হাট , দিঘীর পাড়, ডাকঘর: পাঠানটুলী - ৪১০০, ডবলমুরিং, চট্টগ্রাম সিটি কর্পোরেশন, চট্টগ্রাম', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f313435303732323233342e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f313435303732323233342e706e67, 'mj4078743@gmail.com', '2025-02-23 01:37:32 PM'),
(40, 'মুবিনা খাতুন', 'Mobina Khatun', '6423266052', '19632216657712566', 'বদিউদ্দিন', 'ফরিজা খাতুন', 'কক্সবাজার', '01 Jan 1963', '', '', '', '', '', 'বাসা/হোল্ডিং: মৌলভি পাড়া, দারিয়ার দীঘি, ডাকঘর: রাবেতা - ৪৭০০, রামু, কক্সবাজার', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f363432333236363035322e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f363432333236363035322e706e67, 'tirasel2007@gmail.com', '2025-02-23 05:58:30 PM'),
(41, 'মোঃ মোশারফ হোসাইন', 'Md. Mosarraf Hossain', '4192826347', '19882616267359335', 'আব্দুস সালাম খান', 'আছিয়া খাতুন', 'ঢাকা', '09 Jun 1988', '', '', '', '', '', 'গ্রাম/রাস্তা: মেলেং পশ্চিম খালপাড়, মেলেং, ডাকঘর: মেলেং - ১৩২০, নবাবগঞ্জ, ঢাকা', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f343139323832363334372e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f343139323832363334372e706e67, 'mj4078743@gmail.com', '2025-02-24 11:25:45 AM'),
(42, 'ফারহানা আক্তার সুমি', 'FARHANA AKTER SUMI', '1518853583', '19983015123000501', 'আবুল কাশেম', 'ফারভীন আক্তার', 'ফেনী', '21 Aug 1998', '', '', '', '', '', 'বাসা/হোল্ডিং: সামছুল হুদার বাড়ী, গ্রাম/রাস্তা: দূর্গাপুর, দূর্গাপুর, ডাকঘর: দূর্গাপুর - ৩৯৪২, পরশুরাম, ফেনী', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f313531383835333538332e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f313531383835333538332e706e67, 'mj4078743@gmail.com', '2025-02-24 11:27:10 AM'),
(43, 'অহিদ', 'OHED', '4810651000042', '19884810651000042', 'চান্দু', 'মনোয়ারা খাতুন', 'কিশোরগঞ্জ', '10 Jan 1988', '', '', '', '', '', 'বাসা/হোল্ডিং: -, গ্রাম/রাস্তা: উলুকান্দি, ডাকঘর: হালিমপুর - ২৩৩৭, বাজিতপুর, কিশোরগঞ্জ', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f353130333835353830342e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f353130333835353830342e706e67, 'jahirulislamsohan21@gmail.com', '2025-02-25 10:15:35 AM'),
(44, 'অহিদ', 'OHED', '4810651000042', '19884810651000042', 'চান্দু', 'মনোয়ারা খাতুন', 'কিশোরগঞ্জ', '10 Jan 1988', '', '', '', '', '', 'বাসা/হোল্ডিং: -, গ্রাম/রাস্তা: উলুকান্দি, ডাকঘর: হালিমপুর - ২৩৩৭, বাজিতপুর, কিশোরগঞ্জ', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f353130333835353830342e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f353130333835353830342e706e67, 'jahirulislamsohan21@gmail.com', '2025-02-25 10:17:13 AM'),
(45, 'রেজেকা বেগম', 'Rejeka Begum', '2828641825', '19800111431059649', 'রেজাউল শেখ', 'ফজিলা বেগম', 'বাগেরহাট', '02 Jul 1980', '', '', '', '', '', 'বাসা/হোল্ডিং: -, গ্রাম/রাস্তা: জয়পুর, ডাকঘর: নলধা - ৯৩৭০, ফকিরহাট, বাগেরহাট', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f323832383634313832352e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f323832383634313832352e706e67, 'mamun.kbf@gmail.com', '2025-02-25 01:24:32 PM'),
(46, 'মোঃ আবু হানিফ', 'Md Abu Hanif', '8192215245518', '19738192215245518', 'মোঃ আব্দুল হান্নান', 'আনিসুল নেসা', 'রাজশাহী', '03 Jan 1973', 'B-', '', '', '', '', 'বাসা/হোল্ডিং: ৪৯৫, কাদিরগঞ্জ দিড়খরবনা, ডাকঘর: জি , পি , ও - ৬০০০, বোয়ালিয়া, রাজশাহী সিটি কর্পোরেশন, রাজশাহী', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f313933363532323134312e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f313933363532323134312e706e67, 'abhrbd@gmail.com', '2025-02-25 01:28:59 PM'),
(47, 'মোঃ আবু হানিফ', 'Md Abu Hanif', '1936522141', '19738192215245518', 'মোঃ আব্দুল হান্নান', 'আনিসুল নেসা', 'রাজশাহী', '03 Jan 1973', 'B-', '', '', '', '', 'বাসা/হোল্ডিং: ৪৯৫, কাদিরগঞ্জ দিড়খরবনা, ডাকঘর: জি , পি , ও - ৬০০০, বোয়ালিয়া, রাজশাহী সিটি কর্পোরেশন, রাজশাহী', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f313933363532323134312e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f313933363532323134312e706e67, 'abhrbd@gmail.com', '2025-02-25 01:33:44 PM'),
(48, 'শেফালী আক্তার', 'SHEFALY AKTER', '8729474976', '19967524708000053', 'মোঃ আবদুল কাদের', 'ছালেহা খাতুন', 'নোয়াখালী', '12 Aug 1996', 'B+', '', '', '', '', 'বাসা/হোল্ডিং: বেগম মঞ্জিল, গ্রাম/রাস্তা: দক্ষিণ আলীপুর, দক্ষিণ আলীপুর, ডাকঘর: কবিরহাট - ৩৮০৭, কবিরহাট, কবিরহাট পৌরসভা, নোয়াখালী', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f383732393437343937362e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f383732393437343937362e706e67, 'mj4078743@gmail.com', '2025-02-25 02:45:08 PM'),
(49, 'ছফা আকতার মিনা', 'Sofa Akter Mina', '5957260234', '19892219431854123', 'আনোয়ার হোছাইন', 'লুৎফুন্নাহার', 'কক্সবাজার', '05 Jun 1989', '', '', 'Unknown', 'N/A', '', 'বাসা/হোল্ডিং: ১৭৫, গ্রাম/রাস্তা: মধ্যম হলদিয়া, ডাকঘর: মরিচ্যা পালং-৪৭৫০, উখিয়া, কক্সবাজার', 0x68747470733a2f2f617377617265732e78797a2f7365727665722d636f70792f696d616765732f353935373236303233345f313938392d30362d30352e706e67, 0x696d6167652f34343436636465643561393838386338623262656465336263616339316330632e706e67, 'tirasel2007@gmail.com', '2025-02-25 03:42:30 PM'),
(50, 'জননী বুনার্জী', 'JANONI BUNARJY', '9589891952', '20035813529000250', 'কুঞ্জ বুনার্জী', 'ভজন্তী বুনার্জী', 'মৌলভীবাজার', '31 Oct 2003', '', '', '', '', '', 'বাসা/হোল্ডিং: -, গ্রাম/রাস্তা: রত্না টি , ই ,, ডাকঘর: জুড়ী - ৩২৫১, জুড়ী, মৌলভীবাজার', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f393538393839313935322e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f393538393839313935322e706e67, 'zzz@gmail.com', '2025-02-27 05:19:15 PM'),
(51, 'সুরমা আক্তার', 'SURMA AKTER', '6479385244', '20041317923000211', 'মোঃ নুরুল ইসলাম', 'শাহিদা খাতুন', 'চাঁদপুর', '25 Oct 2004', 'B+', '', '', '', '', 'বাসা/হোল্ডিং: প্রধান বাড়ী, গ্রাম/রাস্তা: পূর্ব রায়েরদিয়া, পূর্ব রায়েরদিয়া, ডাকঘর: গজরা বাজার - ৩৬৪০, মতলব উত্তর, চাঁদপুর', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f363437393338353234342e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f363437393338353234342e706e67, 'bfgf19243@gmail.com', '2025-02-28 07:50:45 PM'),
(52, 'মোঃ মোস্তফা ', 'MD MOSTOFA', '7518577397779', '', 'নুরুল ইসলাম', 'মনোয়ারা বেগম', 'নোয়াখালী ', '01 Jan 1947', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:04:39 PM'),
(53, 'মোঃ আবুল হেসেন', 'MD ABUL HOSSAIN', '7518577397741', '', 'মোঃ শেখ ফকির', 'ছকিনা খাতুন', 'নোয়াখালী ', '18 Apr 1988', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:06:55 PM'),
(54, 'মোঃ আব্বাছ উদ্দিন', 'MD ABBAS UDDIN', '7518577397748', '', 'মোঃ ইদ্রিছ আলম', 'সরীফা খাতুন', 'নোয়াখালী ', '13 May 1975', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:09:14 PM'),
(55, 'মোঃ ছোলেমান ', 'MD SOLEMAN', '7518577397782', '', 'জেবল হক', 'মাজেদা বেগম', 'নোয়াখালী ', '28 Nov 1967', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:10:45 PM'),
(56, 'নুরুন নাহার', 'NURUN NAHAR', '5553950923', '19958420701000026', 'মিজানুর রহমান', 'সামছুন নাহার', 'রাঙ্গামাটি', '28 Jan 1995', '', '', '', '', '', 'বাসা/হোল্ডিং: মৃধা বাড়ী, গ্রাম/রাস্তা: শাহাবাজকান্দি, শাহাবাজকান্দি, ডাকঘর: এনায়েতনগর - ৩৬৪০, মতলব উত্তর, চাঁদপুর', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f353535333935303932332e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f353535333935303932332e706e67, 'bfgf19243@gmail.com', '2025-02-28 09:12:14 PM'),
(57, 'মোঃ কেপায়েত উল্যাহ', 'MD KEFAYET ULLAH', '7518577397774', '', 'মোঃ মুরশিদের রহমান', 'আমেনা খাতুন', 'নোয়াখালী ', '21 Aug 1970', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:12:43 PM'),
(58, 'নুরুন নাহার', 'NURUN NAHAR', '5553950923', '19958420701000026', 'মিজানুর রহমান', 'সামছুন নাহার', 'রাঙ্গামাটি', '28 Jan 1995', '', '', '', '', '', 'বাসা/হোল্ডিং: মৃধা বাড়ী, গ্রাম/রাস্তা: শাহাবাজকান্দি, শাহাবাজকান্দি, ডাকঘর: এনায়েতনগর - ৩৬৪০, মতলব উত্তর, চাঁদপুর', 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5069632f353535333935303932332e706e67, 0x68747470733a2f2f74616b61306e61692e636f6d2f50726f66696c655f5369676e2f353535333935303932332e706e67, 'bfgf19243@gmail.com', '2025-02-28 09:13:17 PM'),
(59, 'মোঃ ইসমাইল ', 'MD ISMAIL', '7518577397743', '', 'তাজল হক', 'রাকিয়া খাতুন', 'নোয়াখালী ', '12 Jun 1957', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:14:45 PM'),
(60, 'মোঃ অলি উদ্দিন', 'MD OLI UDDIN', '7518577397755', '', 'মোঃ মোস্তফা ', 'ছায়েরা খাতুন', 'নোয়াখালী ', '05 Jun 1971', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:16:24 PM'),
(61, 'মোমোঃ জসিম উদ্দিন ', 'MD JASHIM UDDIN', '7518577397770', '', 'মোঃ আব্দুল মান্নান ', 'নুরজাহান বেগম', 'নোয়াখালী ', '05 May 1977', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:18:22 PM'),
(62, 'মোঃ ফিরোজ উদ্দিন ', 'MD FiROJ UDDIN', '7518577397776', '', 'মোঃ মোস্তফা ', 'খাইরুন নেছা', 'নোয়াখালী ', '01 Sep 1985', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:20:14 PM'),
(63, 'আয়েশা খাতুন', 'AYESHA KHATUN', '7518577391035', '', 'ফজলুল হক', 'নুরের নেছা', 'নোয়াখালী ', '11 May 1982', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f34333663613635343332323839306533333135393363323363646638326130372e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:22:53 PM'),
(64, 'আয়েশা খাতুন', 'মোঃ বাদশা মিয়া ', '7518577397784', '', 'আব্দুল হক', 'লতিফা খাতুন', 'নোয়াখালী ', '02 Jan 1935', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:25:43 PM'),
(65, 'মোঃ আলা উদ্দিন', 'MD ALA UDDIN', '7518577397793', '', 'ফজলুল হক', 'আমেনা বেগম', 'নোয়াখালী ', '05 Mar 1983', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:27:40 PM'),
(66, 'নুর আলম', 'NUR ALAM', '7518577397764', '', 'নুর হোসেন', 'মোছছেনা খাতুন', 'নোয়াখালী ', '09 Mar 1982', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:29:42 PM'),
(67, 'সোলতান আহাম্মদ ', 'SOLTAN AHAMMAD', '751857739720', '', 'সৈয়দ আহাম্মদ ', 'ফাতেমা খাতুন', 'নোয়াখালী ', '11 Feb 1962', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:32:22 PM'),
(68, 'মোঃ ইছমাইল ', 'MD ISMAIL', '7518577397714', '', 'মোঃ মোস্তফা ', 'জহুরা খাতুন', 'নোয়াখালী ', '01 Jul 1978', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:34:19 PM'),
(69, 'মোঃ শহীদ আলম', 'MD SHOHID ALAM', '75185773977731', '', 'আব্দুল হাসিম ', 'বিবি কোয়েশা খাতুন', 'নোয়াখালী ', '10 Mar 1952', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:35:54 PM'),
(70, 'মোঃ বেলাল উদ্দিন', 'MD BELAL UDDIN', '75185773977725', '', 'আব্দুস সোবাহান', 'অজিবা খাতুন', 'নোয়াখালী ', '05 Apr 1970', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:37:12 PM'),
(71, 'মোঃ শরিফ উদ্দিন ', 'MD SARIF UDDIN', '7518577397737', '', 'আব্দুল মুনাফ ', 'সাফিয়া খাতুন', 'নোয়াখালী ', '02 Feb 1081', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:39:06 PM'),
(72, 'মোজাক্কের হোসেন', 'MD MOZAKKER HOSSAIN', '7518577396971', '', 'মোঃ মানিক ', 'খতিজা খাতুন', 'নোয়াখালী ', '13 Feb 1986', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:41:45 PM'),
(73, 'মোঃ শাহ আলম ', 'MD SHAH ALAM', '7518577396965', '', 'ছৈয়দ আহাম্মদ ', 'মজমা খাতুন', 'নোয়াখালী ', '13 May 1978', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ , গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ , ইউনিয়ন/ওয়ার্ডঃ , পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ , উপজেলাঃ , জেলাঃ নোয়াখালী, অঞ্চলঃ , বিভাগঃ চট্টগ্রাম।', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-02-28 09:51:28 PM'),
(74, 'মোঃ রবিউল আলম ', 'MD. ROBIUL ALAM', '1042154712', '', 'নুরুল ইসলাম', 'মজমা খাতুন', 'জামালপুর', '01 Jan 1992', 'A+', '', '', '', '', 'ঠিকানা: বাসা/হোল্ডিং: আদ্রা, গ্রাম/রাস্তা: আদ্রা,\r\nডাকঘর: ছাতারিয়া - ২০৫০,\r\nসরিষাবাড়ী, জামালপুর', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-03-01 09:42:32 AM'),
(75, 'মোঃ কবির হোসেন', 'MD. KOBIR HOSSEN', '5352659850', '', 'সালাম মিয়া', 'ফাতেমা খাতুন', 'জামালপুর', '20 Jan 1990', 'A+', '', '', '', '', 'ঠিকানা: বাসা/হোল্ডিং: আদ্রা, গ্রাম/রাস্তা: আদ্রা,\r\nডাকঘর: ছাতারিয়া - ২০৫০,\r\nসরিষাবাড়ী, জামালপুর', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-03-01 09:44:58 AM'),
(76, 'মোঃ সবুজ মিয়া', 'MD. SOBUJ MIA', '1236558965', '', 'আবু বক্কর ', 'ছাইমা বেগম', 'জামালপুর', '28 Jan 1995', 'A+', '', '', '', '', 'ঠিকানা: বাসা/হোল্ডিং: আদ্রা, গ্রাম/রাস্তা: আদ্রা,\r\nডাকঘর: ছাতারিয়া - ২০৫০,\r\nসরিষাবাড়ী, জামালপুর', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-03-01 09:47:13 AM'),
(77, 'মোঃ তানভীর আহমেদ শাকিল', 'MD. TANVIR AHMED SHAKIL', '5698562590', '', 'কালাম চৌধুরী ', 'সাথী বেগম', 'জামালপুর', '01 Jan 1999', 'A+', '', '', '', '', 'ঠিকানা: বাসা/হোল্ডিং: আদ্রা, গ্রাম/রাস্তা: আদ্রা,\r\nডাকঘর: ছাতারিয়া - ২০৫০,\r\nসরিষাবাড়ী, জামালপুর', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-03-01 09:50:54 AM'),
(78, 'মোঃ রবিন সরকার', 'MD. ROBIN SORKAR', '2598563550', '', 'নাজমুল শেখ', 'সানোয়ারা বেগম', 'জামালপুর', '01 Feb 2003', 'A+', '', '', '', '', 'ঠিকানা: বাসা/হোল্ডিং: আদ্রা, গ্রাম/রাস্তা: আদ্রা,\r\nডাকঘর: ছাতারিয়া - ২০৫০,\r\nসরিষাবাড়ী, জামালপুর', 0x696d6167652f30383339373461366133306338633665313931353566383261396239386637652e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-03-01 09:52:37 AM'),
(79, 'মোঃ মানিক মিয়া', 'MD MANIK MIA', '1287629827', '', 'আলী আজ্জম', 'রবিকা খাতুন ', 'নোয়াখালী', '03 jan 1992', 'B+', '', '', '', '', 'বাসা/হোল্ডিংঃ, গ্রাম/রাস্তাঃ চর আক্রাম উদ্দিন, মৌজা/মহল্লাঃ, ইউনিয়ন/ওয়ার্ডঃ, পোস্ট অফিসঃ চর লক্ষী, পোস্ট কোডঃ, উপজেলাঃ, জেলাঃ নোয়াখালী, অঞ্চলঃ, বিভাগঃ চট্টগ্রাম।\r\n', 0x696d6167652f39623230636431353038353432346162383365633436306261613364306137312e706e67, 0x696d6167652f30653464666266663162313433393230623334373330356437393135343731612e706e67, 'skaja336@gmail.com', '2025-03-01 11:19:50 PM'),
(80, 'নাদিয়া সুলতানা চৌধুরাণী', 'NADIA SULTANA CHOWDHURANY', '4225231424', '20021515324000452', 'আক্তার হোসেন চৌধুরী', 'মোছাঃ রোকসানা আক্তার', 'চট্টগ্রাম', '28 Jan 2002', 'O+', 'female', '', 'N/A', 'Islam', 'বাসা/হোল্ডিং: শাহ আলম চৌধুরী বাড়ী, গ্রাম/রাস্তা: দূর্গাপুর, , ডাকঘর: ভরদ্বাজহাট - ৪৩২৩, মিরশরাই, চট্টগ্রাম', 0x68747470733a2f2f6170692e626573742d782e73746f72652f5369676e2f696d616765732f343232353233313432342d757365722e6a7067, 0x68747470733a2f2f6170692e626573742d782e73746f72652f5369676e2f696d616765732f343232353233313432342d7369676e2e6a7067, 'bd@gmail', '2025-03-04 05:27:25 PM'),
(81, 'আমির হামজা', 'AMIR HAMJA', '5108040972', '19992699501000657', 'আব্বাস খান', 'রাহিমুন নেসা', 'জয়পুরহাট', '25 May 1999', 'B+', 'male', '', 'N/A', '', 'বাসা/হোল্ডিং: ৭১, গ্রাম/রাস্তা: ১১, সেক্টর-১৩, , ডাকঘর: উত্তরা - ১২৩০, উত্তরা পশ্চিম, ঢাকা', 0x68747470733a2f2f6170692e626573742d782e73746f72652f5369676e2f696d616765732f353130383034303937322d757365722e6a7067, 0x68747470733a2f2f6170692e626573742d782e73746f72652f5369676e2f696d616765732f353130383034303937322d7369676e2e6a7067, 'bd@gmail', '2025-03-04 05:27:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `mrp_sub`
--

CREATE TABLE `mrp_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mrp_sub`
--

INSERT INTO `mrp_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, 'Vvvvv', NULL, NULL, NULL, NULL, NULL, 'MRP PASSPORT SB COPY', NULL, NULL, 'MRP Passport Number-vvv\\r\\n                                            \\r\\nDate Of Birth-', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:30:42', '2025-02-17 00:30:42', '20250217', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `nameaddress_sub`
--

CREATE TABLE `nameaddress_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` text DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nameaddress_sub`
--

INSERT INTO `nameaddress_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, '018555', NULL, NULL, NULL, NULL, NULL, 'NAME ADDRESS TO NID', NULL, NULL, 'নিজ নাম-ননসমডজডহডমম\r\nপিতার নাম-  মসমমসমডমডম\r\nমাতার নাম-  মসমসমডমসম\r\nস্বামী/স্ত্রী নাম-  মসমসমসম\r\nজন্ম সনদ যদি থাকে-  মসৃসৃৃসসৃৃ\r\nবিভাগ- মসমডমডমসম\r\nজেলা- মসমডমডমড\r\nউপজেলা- মসমসমডমীম\r\nইউনিয়ন/পৌরসভা/সিটি করপোরেশন- মসমডমডমীম\r\nওয়ার্ড নং-ডাকঘর- মসমসমসমীম\r\nগ্রাম- মসমসমসমসম\r\nপিতার এনআইডি নং যদি থাকে- \r\nমাতার এনআইডি নং যদি থাকে- \r\nসাথে ভোটার হওয়া একজনের এনআইডি-', 'zzz@gmail.com', 2, 'b3b6a19dce0aa03cf01b278b0ca7a9c9.pdf', '2025-02-16 22:51:20', '2025-02-16 22:53:53', '20250216', '20250216', NULL),
(2, '5555', NULL, NULL, NULL, NULL, NULL, 'NAME ADDRESS TO NID', NULL, NULL, 'নিজ নাম- bbbb\r\nপিতার নাম-  ffcc\r\nমাতার নাম-  \r\nস্বামী/স্ত্রী নাম-  vvvbbbcvv\r\nজন্ম সনদ যদি থাকে-  \r\nবিভাগ- vvvv\r\nজেলা- cvgvv\r\nউপজেলা- vvvv\r\nইউনিয়ন/পৌরসভা/সিটি করপোরেশন- \r\nওয়ার্ড নং-ডাকঘর- vvvvv\r\nগ্রাম- \r\nপিতার এনআইডি নং যদি থাকে- \r\nমাতার এনআইডি নং যদি থাকে- \r\nসাথে ভোটার হওয়া একজনের এনআইডি-', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:29:51', '2025-02-17 00:29:51', '20250217', NULL, ''),
(3, '01781707079', NULL, NULL, NULL, NULL, NULL, 'NAME ADDRESS TO NID', NULL, NULL, 'নিজ নাম-idu\r\nপিতার নাম-  i\r\nমাতার নাম-  j\r\nস্বামী/স্ত্রী নাম-  \r\nজন্ম সনদ যদি থাকেj-  \r\nবিভাগ- \r\nজেলা- \r\nউপজেলা- \r\nইউনিয়ন/পৌরসভা/সিটি করপোরেশন- \r\nওয়ার্ড নং-ডাকঘর- \r\nগ্রাম- \r\nপিতার এনআইডি নং যদি থাকে- \r\nমাতার এনআইডি নং যদি থাকে- \r\nসাথে ভোটার হওয়া একজনের এনআইডি-', 'jouelrana12@gmail.com', 3, NULL, '2025-03-05 19:16:19', '2025-03-05 19:16:19', '20250305', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `nidtoall_sub`
--

CREATE TABLE `nidtoall_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `nidtoall_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nidtoall_sub`
--

INSERT INTO `nidtoall_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `nidtoall_text`, `delivery_text`) VALUES
(1, '888555', NULL, NULL, NULL, NULL, NULL, 'NID TO ALL NUMBER ORDER', NULL, NULL, '', 'zzz@gmail.com', 1, NULL, '2025-02-17 00:37:03', '2025-02-17 00:37:03', '20250217', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nid_sub`
--

CREATE TABLE `nid_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nid_sub`
--

INSERT INTO `nid_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, '01822192046', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'zzz@gmail.com', 2, '7eff4ae51f827de9bfda6ac8694f1848.pdf', '2025-02-16 21:45:35', '2025-02-16 21:50:54', '20250216', '20250216', NULL),
(2, '0188555', NULL, NULL, NULL, NULL, NULL, 'VOTER_NO', NULL, NULL, 'Fygfc', 'mdshahinislam494@gmail.com', 2, '2e7ae4d46632ade3d043f1859b637af9.pdf', '2025-02-16 21:51:58', '2025-03-05 19:23:37', '20250216', '20250305', ''),
(3, '6689556', NULL, NULL, NULL, NULL, NULL, 'VOTER_NO', NULL, NULL, 'Cfrjhr', 'mdshahinislam494@gmail.com', 3, NULL, '2025-02-16 21:53:41', '2025-02-16 21:53:41', '20250216', NULL, ''),
(4, '88888', NULL, NULL, NULL, NULL, NULL, 'VOTER_NO', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:28:13', '2025-02-17 00:28:13', '20250217', NULL, ''),
(5, '858555', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, '', 'zzz@gmail.com', 2, 'ba9d1268d42493be04dc9b04c43982db.pdf', '2025-02-17 22:16:45', '2025-02-17 22:18:16', '20250217', '20250217', NULL),
(6, '19980610207033313', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, '', 'bagdhaudc@gmail.com', 3, NULL, '2025-02-18 10:26:24', '2025-02-18 10:26:24', '20250218', NULL, 'Not Found '),
(7, '20050916521111852', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, 'nid pdf', 'imambd711@gmaill.com', 3, NULL, '2025-02-18 10:39:00', '2025-02-18 10:39:00', '20250218', NULL, 'Not Found '),
(8, '7357297345', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '7357297345\\r\\n28-01-1996', 'jtafsirul@gmail.com', 2, 'a9b1c001082bdfe300dc806e2000b485.pdf', '2025-02-18 14:59:17', '2025-02-18 15:02:20', '20250218', '20250218', NULL),
(9, '144159108', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, '', 'jtafsirul@gmail.com', 2, '9f892324ccb8c12030b1589b98dc7d14.pdf', '2025-02-18 15:35:24', '2025-02-18 15:40:52', '20250218', '20250218', NULL),
(10, '117868509', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, '', 'imambd711@gmaill.com', 3, NULL, '2025-02-18 18:36:15', '2025-02-18 18:36:15', '20250218', NULL, 'Not Found '),
(11, '0695111186906', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'Nid Pdf', 'zakirhussain834128@gmail.com', 2, '6cf51d0cafca5c0dd09a3a56296ae04d.pdf', '2025-02-19 10:19:32', '2025-02-19 10:24:43', '20250219', '20250219', NULL),
(12, '6437677310', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, '2410b9b46429e52686293c0f288eba34.pdf', '2025-02-19 10:57:15', '2025-02-19 11:07:38', '20250219', '20250219', NULL),
(13, '8237711505', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, '409185fb3c219bc049b16e27cf7dac6c.pdf', '2025-02-19 10:57:37', '2025-02-19 11:08:06', '20250219', '20250219', NULL),
(14, '5988393897', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, '69a9cd9fd9dc6e082c863598dea18ac8.pdf', '2025-02-19 10:58:06', '2025-02-19 11:08:19', '20250219', '20250219', NULL),
(15, '147084715', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, '', 'imambd711@gmail.com', 2, '29aaa346492771ed615b593b659fd8d4.pdf', '2025-02-19 12:08:46', '2025-02-19 12:16:16', '20250219', '20250219', NULL),
(16, '147948909', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, 'জান্নাত\\r\\n', 'rakibabir2018@gmail.com', 2, 'c885bccda0246551f89413aacdb19c75.pdf', '2025-02-19 13:01:31', '2025-02-19 13:09:49', '20250219', '20250219', NULL),
(17, '4188352753', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, '27041373285755822a370e4df990909e.pdf', '2025-02-19 13:15:45', '2025-02-19 13:20:58', '20250219', '20250219', NULL),
(18, '9596623588', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, '983e25fe21b59a0bce48d02fd9ba7511.pdf', '2025-02-19 19:16:44', '2025-02-19 19:17:11', '20250219', '20250219', NULL),
(19, '20069313894001290', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, 'মোছাঃ আরমিন জাহান ইতি', 'rakibabir2018@gmail.com', 3, NULL, '2025-02-22 08:23:53', '2025-02-22 08:23:53', '20250222', NULL, 'আবার অর্ডার করেন '),
(20, '20069313894001290', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, 'মোছাঃ আরমিন জাহান ইতি', 'rakibabir2018@gmail.com', 2, 'fbb026d6acc5b7635b9d3fa4f20d5022.pdf', '2025-02-22 08:34:47', '2025-02-22 15:03:01', '20250222', '20250222', NULL),
(21, '1970151871717696', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'imambd711@gmail.com', 3, NULL, '2025-02-22 16:01:39', '2025-02-22 16:01:39', '20250222', NULL, 'OFF'),
(22, '1450617418', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'Nid pdf', 'sajid262009@gmail.com', 2, '12b7ef730fb628fba7d26943a2d7e5f0.pdf', '2025-02-23 08:41:32', '2025-02-23 14:45:09', '20250223', '20250223', NULL),
(23, '150719316', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, '', 'imambd711@gmail.com', 3, NULL, '2025-02-23 12:19:11', '2025-02-23 12:19:11', '20250223', NULL, 'Not Found '),
(24, '19570915447130080', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, '', 'imambd711@gmail.com', 3, NULL, '2025-02-23 14:29:13', '2025-02-23 14:29:13', '20250223', NULL, 'নিবন্ধন দিয়ে অফ এই মুহুর্তে '),
(25, '19570915447130080', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, '', 'imambd711@gmail.com', 3, NULL, '2025-02-24 05:10:50', '2025-02-24 05:10:50', '20250224', NULL, 'Not Found '),
(26, '118469722', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, 'আশ্রাফুল মিজান', 'rakibabir2018@gmail.com', 3, NULL, '2025-02-24 10:06:10', '2025-02-24 10:06:10', '20250224', NULL, 'Not Found '),
(27, '20057837681034364', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, '', 'imambd711@gmail.com', 3, NULL, '2025-02-24 10:46:49', '2025-02-24 10:46:49', '20250224', NULL, 'নট ফাউন্ড '),
(28, '55045210', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, 'DOB: 01-11-2003\\r\\nNAME: NURANI KHATUN', 'mamun.kbf@gmail.com', 2, '983639e14ff69606fcbde8bb669b1f09.pdf', '2025-02-25 04:28:28', '2025-02-25 10:31:46', '20250225', '20250225', NULL),
(29, '1529447243', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, '0e23c6b702dcd11b0624c8854b79582a.pdf', '2025-02-25 06:08:09', '2025-02-25 12:15:10', '20250225', '20250225', NULL),
(30, '148223375', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, '', 'mohsinproz1@gmail.com', 2, '66da5d0066cc4d1841c1d6c2eda4316d.pdf', '2025-02-25 09:20:05', '2025-02-25 15:25:02', '20250225', '20250225', NULL),
(31, '19672617239000008', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, 'f8198da5976de5294084f013e95a4858.pdf', '2025-02-26 06:27:38', '2025-02-26 12:31:30', '20250226', '20250226', NULL),
(32, '2375178312', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, 'd504bb1c74c0272224a02553a66536cd.pdf', '2025-02-26 07:57:48', '2025-02-26 14:03:47', '20250226', '20250226', NULL),
(33, '2385831090', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, '397fecf0be1abae4aadc088e3e7fafb1.pdf', '2025-02-26 10:25:10', '2025-02-26 16:28:30', '20250226', '20250226', NULL),
(34, '3313694138300', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'Card dwn', 'ashikfk44@gmail.com', 2, '342fb2809cac91f59d8e1ae4771b27f7.pdf', '2025-02-27 14:39:30', '2025-02-27 20:43:52', '20250227', '20250227', NULL),
(35, '19798817816263882', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'Card den', 'ashikfk44@gmail.com', 2, 'e45c9e9e832aa1cdfcab5e3df7ad1863.pdf', '2025-02-27 14:59:25', '2025-02-27 21:03:34', '20250227', '20250227', NULL),
(36, '156762472', NULL, NULL, NULL, NULL, NULL, 'VOTER_NO', NULL, NULL, 'Card den', 'ashikfk44@gmail.com', 3, NULL, '2025-02-28 11:35:28', '2025-02-28 11:35:28', '20250228', NULL, 'Not Found '),
(37, '8729505605', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'NID PDF', 'zakirhussain834128@gmail.com', 2, '580a00650718da187c4d816ec8b0d35b.pdf', '2025-02-28 21:16:39', '2025-02-28 21:22:19', '20250228', '20250228', NULL),
(38, '6029182893', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, '4a2b3bf2d0e3e18fcffe4639ffec87cb.pdf', '2025-03-01 11:37:16', '2025-03-01 11:51:56', '20250301', '20250301', NULL),
(39, '4817623272936', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'মো: হেমাইদুল চৌধুরী  ১৫/০৩/১৯৮৫', 'jahirulislamsohan21@gmail.com', 2, '2248f0d73f9166f9b5dc52027f4a7e53.pdf', '2025-03-02 10:18:57', '2025-03-02 10:23:56', '20250302', '20250302', NULL),
(40, '3318361247', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'mdmoshiurrahman876@gmail.com', 2, '5757662e49d4c681985e7efa7fa1d4a7.pdf', '2025-03-02 11:28:29', '2025-03-02 11:32:52', '20250302', '20250302', NULL),
(41, '256458981', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, 'Test ', 'jouelrana12@gmail.com', 3, NULL, '2025-03-05 14:45:10', '2025-03-05 14:45:10', '20250305', NULL, ''),
(42, '123456', NULL, NULL, NULL, NULL, NULL, 'VOTER_NO', NULL, NULL, 'Test', 'jouelrana12@gmail.com', 3, NULL, '2025-03-05 19:12:33', '2025-03-05 19:12:33', '20250305', NULL, ''),
(43, '018111111111', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, 'Test', 'jouelrana12@gmail.com', 3, NULL, '2025-03-05 19:15:33', '2025-03-05 19:15:33', '20250305', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `nogodstatement_sub`
--

CREATE TABLE `nogodstatement_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nogodstatement_sub`
--

INSERT INTO `nogodstatement_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, '08555', NULL, NULL, NULL, NULL, NULL, 'Nogod Statement', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:33:11', '2025-02-17 00:33:11', '20250217', NULL, ''),
(2, '85588855', NULL, NULL, NULL, NULL, NULL, 'Nogod Statement', NULL, NULL, 'Ggg', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:33:27', '2025-02-17 00:33:27', '20250217', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `Nogod_sub`
--

CREATE TABLE `Nogod_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `Nogod_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Nogod_sub`
--

INSERT INTO `Nogod_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `Nogod_text`, `delivery_text`) VALUES
(1, 'Bhbhh', NULL, NULL, NULL, NULL, NULL, 'Nogod information ORDER', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 08:34:47', '2025-02-17 08:34:47', '20250217', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `time`) VALUES
(1, 'নোটিশ:- জিরো একাউন্ট যেকোন সময় ডিলেট করা হতে পারে। দ্রুত রিচার্জ করুন,,,আইডি কার্ড ও সাইন কপি সকাল ১০,টা থেকে রাত ৯ঃ৫০ মিনিট পর্যন্ত চালু থাকবে ', '2024-09-10 12:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notiuser` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notiuser`, `notireciver`, `notitype`, `time`) VALUES
(1, 'zzz@gmail.com', 'Admin', 'Create Account', '2025-02-16 15:41:31'),
(2, 'mdshahinislam494@gmail.com', 'Admin', 'Create Account', '2025-02-16 15:51:17'),
(3, 'gmalauddin02@gmail.com', 'Admin', 'Create Account', '2025-02-16 17:34:05'),
(4, 'foyezuddinmitu786@gmail.com', 'Admin', 'Create Account', '2025-02-17 03:21:12'),
(5, 'abhrbd@gmail.com', 'Admin', 'Create Account', '2025-02-17 04:08:55'),
(6, 'mamun.kbf@gmail.com', 'Admin', 'Create Account', '2025-02-17 04:24:05'),
(7, 'imambd711@gmaill.com', 'Admin', 'Create Account', '2025-02-17 04:39:52'),
(8, 'mdroni081081@gmail.com', 'Admin', 'Create Account', '2025-02-17 04:41:43'),
(9, 'sojibt@icloud.com', 'Admin', 'Create Account', '2025-02-17 05:06:24'),
(10, 'sheikhriaj8314@gmail.com', 'Admin', 'Create Account', '2025-02-17 05:07:29'),
(11, 'ar6818862@gmail.com', 'Admin', 'Create Account', '2025-02-17 05:25:15'),
(12, 'bdmamunkhan9@gmail.com', 'Admin', 'Create Account', '2025-02-17 05:32:02'),
(13, 'mdselimmeg@gmail.com', 'Admin', 'Create Account', '2025-02-17 05:56:59'),
(14, 'jmahmud385@gmail.com', 'Admin', 'Create Account', '2025-02-17 06:32:58'),
(15, 'zakirhussain834128@gmail.com', 'Admin', 'Create Account', '2025-02-17 06:38:10'),
(16, 'tirasel2007@gmail.com', 'Admin', 'Create Account', '2025-02-17 06:49:08'),
(17, 'sohanjr1@gmail.com', 'Admin', 'Create Account', '2025-02-17 06:49:52'),
(18, 'iqracomputer700@gmail.com', 'Admin', 'Create Account', '2025-02-17 06:59:02'),
(19, 'sheikhriaj8315@gmail.com', 'Admin', 'Create Account', '2025-02-17 07:02:36'),
(20, 'rakibabir2018@gmail.com', 'Admin', 'Create Account', '2025-02-17 07:57:42'),
(21, 'sajid262009@gmail.com', 'Admin', 'Create Account', '2025-02-17 08:28:08'),
(22, 'shantoshikdar3344@gmail.com', 'Admin', 'Create Account', '2025-02-17 09:31:22'),
(23, 'jahirulislamsohan21@gmail.com', 'Admin', 'Create Account', '2025-02-17 10:45:12'),
(24, 'gmalauddin02@gmail.com', 'Admin', 'Create Account', '2025-02-17 12:11:26'),
(25, 'rokonmiji@gmail.com', 'Admin', 'Create Account', '2025-02-17 12:23:37'),
(26, 'skaja336@gmail.com', 'Admin', 'Create Account', '2025-02-17 12:49:27'),
(27, 'sohelbarua970@gmail.com', 'Admin', 'Create Account', '2025-02-17 12:56:31'),
(28, 'bagdhaudc@gmail.com', 'Admin', 'Create Account', '2025-02-17 13:12:06'),
(29, 'mohsinproz1@gmail.com', 'Admin', 'Create Account', '2025-02-17 14:02:35'),
(30, 'Akramvizoy1@gmail.com', 'Admin', 'Create Account', '2025-02-17 14:19:42'),
(31, 'mdshahinislam49422@gmail.com', 'Admin', 'Create Account', '2025-02-17 14:34:08'),
(32, 'smartbdu@gmail.com', 'Admin', 'Create Account', '2025-02-17 14:43:41'),
(33, 'rashidacybertelecom@gmail.com', 'Admin', 'Create Account', '2025-02-17 15:18:00'),
(34, 'imambd711@gmail.com', 'Admin', 'Create Account', '2025-02-17 15:44:23'),
(35, 'mdmoshiurrahman876@gmail.com', 'Admin', 'Create Account', '2025-02-17 16:10:35'),
(36, 'jtafsirul@gmail.com', 'Admin', 'Create Account', '2025-02-18 08:46:18'),
(37, 'diponkarraj2024@gmail.com', 'Admin', 'Create Account', '2025-02-18 10:07:27'),
(38, 'shhridoy.net@gmail.com', 'Admin', 'Create Account', '2025-02-18 12:21:49'),
(39, 'mdakashpaglu@gmail.com', 'Admin', 'Create Account', '2025-02-19 04:09:47'),
(40, 'mezbahul45@gmail.com', 'Admin', 'Create Account', '2025-02-19 08:08:45'),
(41, 'maatourism50@gmail.com', 'Admin', 'Create Account', '2025-02-19 10:56:25'),
(42, 'jibonmoron4816@gmail.com', 'Admin', 'Create Account', '2025-02-19 17:01:19'),
(43, 'jaberjaber3198@gmail.com', 'Admin', 'Create Account', '2025-02-20 06:14:01'),
(44, 'ashikfk44@gmail.com', 'Admin', 'Create Account', '2025-02-20 07:14:46'),
(45, 'mj4078743@gmail.com', 'Admin', 'Create Account', '2025-02-20 09:41:09'),
(46, 'fab80675@gmail.com', 'Admin', 'Create Account', '2025-02-20 10:09:06'),
(47, 'imran.io360@gmail.com', 'Admin', 'Create Account', '2025-02-20 10:58:41'),
(48, 'mdjony0999@gmail.com', 'Admin', 'Create Account', '2025-02-20 11:27:42'),
(49, 'tanhaenterprise9@gmail.com', 'Admin', 'Create Account', '2025-02-20 16:04:56'),
(50, 'emonkabir722@gmail.com', 'Admin', 'Create Account', '2025-02-20 16:31:07'),
(51, 'asdfghjkl@gamil.com', 'Admin', 'Create Account', '2025-02-20 17:13:21'),
(52, 'chittagong@gmail.com', 'Admin', 'Create Account', '2025-02-21 03:27:31'),
(53, 'passbd21@gmail.com', 'Admin', 'Create Account', '2025-02-21 07:21:43'),
(54, 'bdnagoriksheba@gmail.com', 'Admin', 'Create Account', '2025-02-21 08:17:33'),
(55, 'mdhimelrabby777@gmail.com', 'Admin', 'Create Account', '2025-02-21 12:29:52'),
(56, 'bfgf19243@gmail.com', 'Admin', 'Create Account', '2025-02-22 02:37:12'),
(57, 'mazizulhaque392@gmail.com', 'Admin', 'Create Account', '2025-02-22 04:22:01'),
(58, 'rajahmed.usa@gmail.com', 'Admin', 'Create Account', '2025-02-22 10:46:50'),
(59, 'tawhidhasan1520@gmail', 'Admin', 'Create Account', '2025-02-22 16:11:14'),
(60, 'sumidas9485@gmail.com', 'Admin', 'Create Account', '2025-02-22 19:52:14'),
(61, 'masumonline184@gmail.com', 'Admin', 'Create Account', '2025-02-23 08:27:03'),
(62, 'mdalamgirhossain660@gmail.com', 'Admin', 'Create Account', '2025-02-23 08:55:59'),
(63, 'mdsujon524@gmail.com', 'Admin', 'Create Account', '2025-02-23 09:19:18'),
(64, 'ahad22329@gmail.com', 'Admin', 'Create Account', '2025-02-23 12:00:11'),
(65, 'abdulrahimrocky010@gmail.com', 'Admin', 'Create Account', '2025-02-23 12:22:19'),
(66, 'csaddam304@gmail.com', 'Admin', 'Create Account', '2025-02-23 12:43:42'),
(67, 'sssiyam2646@gmail.com', 'Admin', 'Create Account', '2025-02-23 12:59:13'),
(68, 'opentelecom2011@gmail.com', 'Admin', 'Create Account', '2025-02-23 13:22:45'),
(69, 'robiul.islam415484@gmail.com', 'Admin', 'Create Account', '2025-02-23 13:40:45'),
(70, 'akkoyadhikary26@gmail.com', 'Admin', 'Create Account', '2025-02-23 13:46:26'),
(71, 'sabbir.h.frd@gmail.com', 'Admin', 'Create Account', '2025-02-23 14:25:48'),
(72, 'mdjamiult@gmail.com', 'Admin', 'Create Account', '2025-02-24 05:26:47'),
(73, 's.mcomputerjh@gmail.com', 'Admin', 'Create Account', '2025-02-24 18:14:20'),
(74, 'mutaherh282@gmail.com', 'Admin', 'Create Account', '2025-02-25 05:29:04'),
(75, 'www.rabiulhossain1@gmail.com', 'Admin', 'Create Account', '2025-02-25 12:25:34'),
(76, 'nayem019019@gmail.com', 'Admin', 'Create Account', '2025-02-25 12:41:52'),
(77, 'takbirrahman@yahoo.com', 'Admin', 'Create Account', '2025-02-26 05:51:10'),
(78, 'mdsirajbd80@gmail.com', 'Admin', 'Create Account', '2025-02-26 08:47:28'),
(79, 'smlimonhossain525@gmail.com', 'Admin', 'Create Account', '2025-02-26 09:49:33'),
(80, 'saifulmukta1990@gmail.com', 'Admin', 'Create Account', '2025-02-26 10:04:21'),
(81, 'scc.ainul@gmail.com', 'Admin', 'Create Account', '2025-02-27 10:28:23'),
(82, 'jebukaisar@gmail.com', 'Admin', 'Create Account', '2025-02-27 13:11:00'),
(83, 'www.kaisarahmed@gmail.com', 'Admin', 'Create Account', '2025-02-27 13:33:31'),
(84, 'kaisarahmed71188@gmail.com', 'Admin', 'Create Account', '2025-02-27 14:08:09'),
(85, 'Ahmedruman58@gmail.com', 'Admin', 'Create Account', '2025-02-27 14:35:09'),
(86, 'online134567@gmail.com', 'Admin', 'Create Account', '2025-02-28 09:22:21'),
(87, 'ashik@12.com', 'Admin', 'Create Account', '2025-03-01 06:57:38'),
(88, 'globalcare71@gmail.com', 'Admin', 'Create Account', '2025-03-01 12:48:31'),
(89, 'jasim12@gmail.com', 'Admin', 'Create Account', '2025-03-02 08:00:58'),
(90, 'raisulislamrana720@gmail.com', 'Admin', 'Create Account', '2025-03-02 08:25:58'),
(91, 'jiniyasislam@gmail.com', 'Admin', 'Create Account', '2025-03-02 08:56:28'),
(92, 'amarnet3000@gmail.com', 'Admin', 'Create Account', '2025-03-02 10:22:42'),
(93, 'ma1684269@gmail.com', 'Admin', 'Create Account', '2025-03-02 21:09:26'),
(94, 'mdshahinislam4922@gmail.com', 'Admin', 'Create Account', '2025-03-04 06:42:51'),
(95, 'jouelrana12@gmail.com', 'Admin', 'Create Account', '2025-03-04 09:26:02'),
(96, 'numbertwogo@gmail.com', 'Admin', 'Create Account', '2025-03-04 10:21:30'),
(97, 'Admin@login', 'Admin', 'Create Account', '2025-03-04 10:36:33'),
(98, 'bd@gmail', 'Admin', 'Create Account', '2025-03-04 11:22:22'),
(99, 'ridwykhan81@gmail.com', 'Admin', 'Create Account', '2025-03-05 07:10:33'),
(100, 'valobasarobujprodip@gmail.com', 'Admin', 'Create Account', '2025-03-05 08:05:28'),
(101, 'maababardoya786@gmail.com', 'Admin', 'Create Account', '2025-03-05 15:44:33'),
(102, 'alamin638595@gmail.com', 'Admin', 'Create Account', '2025-03-05 15:45:36'),
(103, 'rushnaakter154@gmail.com', 'Admin', 'Create Account', '2025-03-05 15:47:22'),
(104, 'mdabiduhaque08@gmail.com', 'Admin', 'Create Account', '2025-03-05 15:53:31'),
(105, 'shantopaul35029@gmail.com', 'Admin', 'Create Account', '2025-03-05 15:55:38'),
(106, 'wazedariful@gmail.com', 'Admin', 'Create Account', '2025-03-05 16:38:55'),
(107, 'priyasharma04112001@gmail.com', 'Admin', 'Create Account', '2025-03-05 16:45:23'),
(108, 'ih.emon1425@gmail.com', 'Admin', 'Create Account', '2025-03-05 17:06:57'),
(109, 'mdjahirulislam2988@gmail.com', 'Admin', 'Create Account', '2025-03-05 17:25:40'),
(110, 'Rajvai@gmail.com', 'Admin', 'Create Account', '2025-03-05 17:34:28'),
(111, 'Sheponahammed6@gmail.com', 'Admin', 'Create Account', '2025-03-05 17:39:02'),
(112, 'tuberhabib6964@gmail.com', 'Admin', 'Create Account', '2025-03-05 22:06:39'),
(113, 'ranatusar0707@gmail.com', 'Admin', 'Create Account', '2025-03-05 22:58:09'),
(114, 'kazihabibhabib931@gmail.com', 'Admin', 'Create Account', '2025-03-06 00:30:19'),
(115, 'subirsajjal@gmail.com', 'Admin', 'Create Account', '2025-03-06 00:35:39'),
(116, 'rakib4812@gmail.com', 'Admin', 'Create Account', '2025-03-06 02:13:53'),
(117, 'mahirdaw@gmail.com', 'Admin', 'Create Account', '2025-03-06 04:33:02'),
(118, 'blackfiretools@gmail.com', 'Admin', 'Create Account', '2025-03-10 07:35:44'),
(119, 'trtreret64@gmail.com', 'Admin', 'Create Account', '2025-03-10 07:57:14'),
(120, 'op@gmail.com', 'Admin', 'Create Account', '2025-03-10 07:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `passportinfo_sub`
--

CREATE TABLE `passportinfo_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passportinfo_sub`
--

INSERT INTO `passportinfo_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, 'Vvvvv', NULL, NULL, NULL, NULL, NULL, 'E- Passport Varify Order', NULL, NULL, 'E- Passport Number-vvv\r\n\r\nDate Of Birth-vvvv', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:30:24', '2025-02-17 00:30:24', '20250217', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `passportsb_sub`
--

CREATE TABLE `passportsb_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passportsb_sub`
--

INSERT INTO `passportsb_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, 'Ffff', NULL, NULL, NULL, NULL, NULL, 'Passport SB COPY', NULL, NULL, 'E- Passport Number-gggg\\r\\n                                            \\r\\nDate Of Birth-', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:32:06', '2025-02-17 00:32:06', '20250217', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paymentID` varchar(255) NOT NULL,
  `trxID` varchar(255) NOT NULL,
  `paymentExecuteTime` varchar(255) NOT NULL,
  `customerMsisdn` decimal(11,0) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `paymentID`, `trxID`, `paymentExecuteTime`, `customerMsisdn`, `amount`, `email`) VALUES
(1, 'TR0011Gd5UeS81739766836184', 'CBH9VALJ6R', '2025-02-17T10:34:39:713 GMT+0600', 1971687687, 100.00, 'mamun.kbf@gmail.com'),
(2, 'TR0011rfIiAkV1739797377852', 'CBH1VSS4T1', '2025-02-17T19:03:57:423 GMT+0600', 1920662023, 100.00, 'gmalauddin02@gmail.com'),
(3, 'TR00111FWK1Ek1739801299924', 'CBH8VVVBSG', '2025-02-17T20:08:44:906 GMT+0600', 1918998323, 100.00, 'mohsinproz1@gmail.com'),
(4, 'TR0011bLVWxln1739850591982', 'CBI9W7D25P', '2025-02-18T09:50:16:731 GMT+0600', 1760645728, 100.00, 'jahirulislamsohan21@gmail.com'),
(5, 'TR0011PbefgtH1739852710570', 'CBI8W8IKR8', '2025-02-18T10:25:49:301 GMT+0600', 1728819203, 100.00, 'bagdhaudc@gmail.com'),
(6, 'TR0011GvyUmJv1739853429386', 'CBI0W8XTIA', '2025-02-18T10:37:44:568 GMT+0600', 1614664888, 100.00, 'imambd711@gmaill.com'),
(7, 'TR0011fuQ0YCD1739862759013', 'CBI1WF2ND1', '2025-02-18T13:13:44:481 GMT+0600', 1517060569, 200.00, 'abhrbd@gmail.com'),
(8, 'TR001135uTMJ71739868961738', 'CBI1WIB4RJ', '2025-02-18T14:58:10:499 GMT+0600', 1620501681, 100.00, 'jtafsirul@gmail.com'),
(9, 'TR0011O8uBZA31739871278619', 'CBI7WJCTWD', '2025-02-18T15:35:08:876 GMT+0600', 1620501681, 100.00, 'jtafsirul@gmail.com'),
(10, 'TR0011AcX3vwF1739887288386', 'CBI8WU2OKA', '2025-02-18T20:01:58:087 GMT+0600', 1614664888, 100.00, 'imambd711@gmaill.com'),
(11, 'TR00113zuGBFT1739938621680', 'CBJ804GSMS', '2025-02-19T10:17:47:547 GMT+0600', 1317834128, 100.00, 'zakirhussain834128@gmail.com'),
(12, 'TR00115cgmjY41739940954727', 'CBJ305WMOF', '2025-02-19T10:56:27:225 GMT+0600', 1923925977, 300.00, 'mdmoshiurrahman876@gmail.com'),
(13, 'TR0011dhD69ae1739944054546', 'CBJ1081395', '2025-02-19T11:48:14:181 GMT+0600', 1601664887, 100.00, 'imambd711@gmail.com'),
(14, 'TR00118cRXB6p1739945265889', 'CBJ108U3RN', '2025-02-19T12:08:25:136 GMT+0600', 1601664887, 100.00, 'imambd711@gmail.com'),
(15, 'TR0011Gq5rEzt1739945976772', 'CBJ509CR1V', '2025-02-19T12:20:36:426 GMT+0600', 1677001767, 100.00, 'bdmamunkhan9@gmail.com'),
(16, 'TR0011hsyZVMc1739948399125', 'CBJ60AYMB4', '2025-02-19T13:01:15:233 GMT+0600', 1799241414, 100.00, 'rakibabir2018@gmail.com'),
(17, 'TR0011kzzyMJg1739949289439', 'CBJ60BI1PG', '2025-02-19T13:15:21:199 GMT+0600', 1923925977, 100.00, 'mdmoshiurrahman876@gmail.com'),
(18, 'TR0011go5pFVo1739960934100', 'CBJ40HFETE', '2025-02-19T16:29:30:204 GMT+0600', 1608553409, 100.00, 'jahirulislamsohan21@gmail.com'),
(19, 'TR0011VCE045O1740021594029', 'CBK010YBEU', '2025-02-20T09:23:07:344 GMT+0600', 1317834128, 150.00, 'zakirhussain834128@gmail.com'),
(20, 'TR0011nBfdalI1740035758331', 'CBK3196W3H', '2025-02-20T13:16:30:808 GMT+0600', 1739899996, 1000.00, 'ashikfk44@gmail.com'),
(21, 'TR0011HrwRPZq1740059212130', 'CBK91N1I4H', '2025-02-20T19:47:45:566 GMT+0600', 1776265601, 100.00, 'skaja336@gmail.com'),
(22, 'TR0011MVNw1dt1740178295309', 'CBM62OWCBK', '2025-02-22T04:52:17:762 GMT+0600', 1763257986, 100.00, 'zzz@gmail.com'),
(23, 'TR0011ZO2VOsi1740192446310', 'CBM92Q680H', '2025-02-22T08:47:52:568 GMT+0600', 1648316277, 200.00, 'bfgf19243@gmail.com'),
(24, 'TR0011TogGkjv1740199929029', 'CBM92TA639', '2025-02-22T10:52:46:784 GMT+0600', 1874690931, 100.00, 'mj4078743@gmail.com'),
(25, 'TR0011rbG39U51740206626589', 'CBM12X4LVF', '2025-02-22T12:44:14:015 GMT+0600', 1817967463, 100.00, 'mazizulhaque392@gmail.com'),
(26, 'TR00116Q2ctYa1740212557067', 'CBM42ZXPUO', '2025-02-22T14:23:10:208 GMT+0600', 1799241414, 100.00, 'rakibabir2018@gmail.com'),
(27, 'TR0011vGzyhTb1740331224968', 'CBN84F74X0', '2025-02-23T23:21:09:308 GMT+0600', 1920662023, 112.46, 'gmalauddin02@gmail.com'),
(28, 'TR0011LrOYOLT1740374871798', 'CBO34OG23J', '2025-02-24T11:28:25:203 GMT+0600', 1849572811, 150.00, 'mdsujon524@gmail.com'),
(29, 'TR0011lSyKoEK1740376441780', 'CBO04PHMMU', '2025-02-24T11:54:34:186 GMT+0600', 1849572811, 400.00, 'mdsujon524@gmail.com'),
(30, 'TR0011JhkO3hh1740387617694', 'CBO74W0VEB', '2025-02-24T15:00:53:728 GMT+0600', 1849572811, 100.00, 'mdsujon524@gmail.com'),
(31, 'TR0011fs3oHCa1740457647721', 'CBP95KF03B', '2025-02-25T10:27:50:883 GMT+0600', 1971687687, 100.00, 'mamun.kbf@gmail.com'),
(32, 'TR0011PYsXHBx1740463620500', 'CBP35OAI01', '2025-02-25T12:07:34:884 GMT+0600', 1923925977, 100.00, 'mdmoshiurrahman876@gmail.com'),
(33, 'TR0011K6hYty51740483035815', 'CBP35YNZ9H', '2025-02-25T17:31:10:156 GMT+0600', 1849572811, 1400.00, 'mdsujon524@gmail.com'),
(34, 'TR0011QEEWHJQ1740543684556', 'CBQ96IRHY7', '2025-02-26T10:23:14:240 GMT+0600', 1646946165, 100.00, 'ar6818862@gmail.com'),
(35, 'TR0011YFLEYHC1740551099467', 'CBQ06NMIK6', '2025-02-26T12:25:48:559 GMT+0600', 1923925977, 100.00, 'mdmoshiurrahman876@gmail.com'),
(36, 'TR0011cte3ohl1740556596882', 'CBQ16QQZSZ', '2025-02-26T13:57:23:150 GMT+0600', 1923925977, 100.00, 'mdmoshiurrahman876@gmail.com'),
(37, 'TR0011y5UTBGI1740559697207', 'CBQ46S8MCI', '2025-02-26T14:48:46:008 GMT+0600', 1716827501, 100.00, 'mdsirajbd80@gmail.com'),
(38, 'TR0011uuv738u1740564358604', 'CBQ56UGAEJ', '2025-02-26T16:06:36:352 GMT+0600', 1712203836, 100.00, 'saifulmukta1990@gmail.com'),
(39, 'TR0011k8Qc0U81740565324651', 'CBQ06UYC94', '2025-02-26T16:23:03:075 GMT+0600', 1923925977, 100.00, 'mdmoshiurrahman876@gmail.com'),
(40, 'TR0011pKA81Xl1740671486467', 'CBR287DYL4', '2025-02-27T21:51:52:560 GMT+0600', 1608553409, 100.00, 'jahirulislamsohan21@gmail.com'),
(41, 'TR0011NJOdigC1740679439179', 'CBS18AMN8P', '2025-02-28T00:04:39:620 GMT+0600', 1601664887, 900.00, 'imambd711@gmail.com'),
(42, 'TR0011yGtJvHw1740723804474', 'CBS58JZHNN', '2025-02-28T12:23:58:332 GMT+0600', 1601664887, 100.00, 'imambd711@gmail.com'),
(43, 'TR0011Rbn3nx21740735091522', 'CBS58O4HW5', '2025-02-28T15:31:59:899 GMT+0600', 1834616370, 100.00, 'jebukaisar@gmail.com'),
(44, 'TR0011j3LvmpQ1740751597619', 'CBS48YZIYK', '2025-02-28T20:07:02:979 GMT+0600', 1648316277, 100.00, 'bfgf19243@gmail.com'),
(45, 'TR0011mIbSEaS1740753942855', 'CBS990OV41', '2025-02-28T20:46:31:617 GMT+0600', 1776265601, 100.00, 'skaja336@gmail.com'),
(46, 'TR0011Ud20oWW1740755626957', 'CBS491WYGW', '2025-02-28T21:15:48:137 GMT+0600', 1317834128, 100.00, 'zakirhussain834128@gmail.com'),
(47, 'TR0011sqZeaVc1740757110953', 'CBS892SRHA', '2025-02-28T21:39:11:792 GMT+0600', 1718113215, 150.00, 'foyezuddinmitu786@gmail.com'),
(48, 'TR0011OuTu0z01740806294334', 'CC119DL22T', '2025-03-01T11:18:38:921 GMT+0600', 1608553409, 100.00, 'jahirulislamsohan21@gmail.com'),
(49, 'TR0011TURGqYp1740815594604', 'CC159IYDG5', '2025-03-01T13:53:40:395 GMT+0600', 1624651213, 100.00, 'masumonline184@gmail.com'),
(50, 'TR0011lwqM50b1740816888964', 'CC159JKX7H', '2025-03-01T14:15:37:436 GMT+0600', 1710050674, 200.00, 'emonkabir722@gmail.com'),
(51, 'TR0011l2T9SXX1740874964514', 'CC24A50CNY', '2025-03-02T06:23:19:243 GMT+0600', 1648316277, 200.00, 'bfgf19243@gmail.com'),
(52, 'TR0011iZsib181740893169937', 'CC22AAK6F6', '2025-03-02T11:26:51:975 GMT+0600', 1923925977, 100.00, 'mdmoshiurrahman876@gmail.com'),
(53, 'TR0011WkBdEcF1740904931947', 'CC29AHGN99', '2025-03-02T14:42:43:094 GMT+0600', 1624651213, 100.00, 'masumonline184@gmail.com'),
(54, 'TR0011YNXfFJX1740905275277', 'CC29AHO3TL', '2025-03-02T14:48:57:850 GMT+0600', 1718113215, 305.00, 'foyezuddinmitu786@gmail.com'),
(55, 'TR0011A94xbZX1741162959689', 'CC57D1LB01', '2025-03-05T14:23:29:343 GMT+0600', 1614498809, 10.00, 'jouelrana12@gmail.com'),
(56, 'TR0011w7KCI911741182690979', 'CC54DDJ6PS', '2025-03-05T19:53:34:398 GMT+0600', 1874230727, 500.00, 'valobasarobujprodip@gmail.com'),
(57, 'TR00114SzLQUk1741215642990', 'CC68DMM4XO', '2025-03-06T05:01:11:284 GMT+0600', 1748140713, 200.00, 'ranatusar0707@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `roketstatement_sub`
--

CREATE TABLE `roketstatement_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roketstatement_sub`
--

INSERT INTO `roketstatement_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, '0085888', NULL, NULL, NULL, NULL, NULL, 'Roket Statement', NULL, NULL, '', 'zzz@gmail.com', 1, NULL, '2025-02-17 00:35:44', '2025-02-17 00:35:44', '20250217', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roket_sub`
--

CREATE TABLE `roket_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `roket_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roket_sub`
--

INSERT INTO `roket_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `roket_text`, `delivery_text`) VALUES
(1, 'Vvbbh', NULL, NULL, NULL, NULL, NULL, 'Roket Information ORDER', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 08:35:30', '2025-02-17 08:35:30', '20250217', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `servercopy_sub`
--

CREATE TABLE `servercopy_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `server_copy`
--

CREATE TABLE `server_copy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nid_num` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `order_time` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user` varchar(255) NOT NULL,
  `total_download` int(11) NOT NULL DEFAULT 0,
  `url` text DEFAULT NULL,
  `delivery_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nid_num` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `order_time` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user` varchar(255) NOT NULL,
  `total_download` int(11) NOT NULL DEFAULT 0,
  `url` text DEFAULT NULL,
  `delivery_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signcopy_sub`
--

CREATE TABLE `signcopy_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signcopy_sub`
--

INSERT INTO `signcopy_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, '55555', NULL, NULL, NULL, NULL, NULL, 'VOTER_NO', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:27:57', '2025-02-17 00:27:57', '20250217', NULL, ''),
(2, '19800113463182984', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'সার্ভিস নাম লিখুন (বাধ্যতামূলক) সাইন কপি \\r\\nনাম: মামুন সরদার\\r\\nজন্ম তারিখ: 07-06-1980', 'mamun.kbf@gmail.com', 2, '8ffb89475e4e7927e2ed090494a2e568.pdf', '2025-02-17 10:40:47', '2025-02-17 10:45:41', '20250217', '20250217', NULL),
(3, '3305894945', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'sin copy', 'mdselimmeg@gmail.com', 2, 'f3b5a6478e044867cc8ced5148182437.pdf', '2025-02-17 12:34:01', '2025-02-17 12:38:59', '20250217', '20250217', NULL),
(4, '6905806987', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'বাবুল ১০/০৫/১৯৭৪', 'jahirulislamsohan21@gmail.com', 2, '91a0e5e7012930cf86ea36eab25ee50a.pdf', '2025-02-18 09:52:43', '2025-02-18 10:30:31', '20250218', '20250218', NULL),
(5, '8249699177', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'sayera haque', 'abhrbd@gmail.com', 2, 'a2a5652ff975b470c1b6f032dd377a1b.pdf', '2025-02-18 13:14:57', '2025-02-18 13:24:27', '20250218', '20250218', NULL),
(6, '5093373354', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'imambd711@gmail.com', 2, '20fe6a484a52d7621c3798c5fbc8bbbc.pdf', '2025-02-19 11:56:12', '2025-02-19 11:59:47', '20250219', '20250219', NULL),
(7, '19792692985042751', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'sin copy \\r\\n', 'mdselimmeg@gmail.com', 2, '20017e13d1de458def97bdb4b70e46ec.pdf', '2025-02-19 17:59:22', '2025-02-19 18:06:54', '20250219', '20250219', NULL),
(8, '20061917512104145', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, 'sing', 'mdselimmeg@gmail.com', 2, 'a02e748e125f6d01c4ddfb247846980e.pdf', '2025-02-22 03:35:29', '2025-02-22 09:38:44', '20250222', '20250222', NULL),
(9, '1317990346369', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'সাইন কপি', 'bfgf19243@gmail.com', 2, 'b9860c8294e8ebce669d3e1bfbe02494.pdf', '2025-02-22 07:16:35', '2025-02-22 13:23:21', '20250222', '20250222', NULL),
(10, '0111431059649', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'DOB: 02-JUL-1980', 'mamun.kbf@gmail.com', 3, NULL, '2025-02-25 07:07:13', '2025-02-25 07:07:13', '20250225', NULL, 'আবার অর্ডার করেন '),
(11, '19800111431059649', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'DOB: 1980-07-02', 'mamun.kbf@gmail.com', 2, 'e32bc9d52bc986262b6855073c16951f.pdf', '2025-02-25 07:10:27', '2025-02-25 13:14:50', '20250225', '20250225', NULL),
(12, '19738192215245518', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'MD ABU HANIF', 'abhrbd@gmail.com', 2, '3e9857483be5778b3f3dc6fd3b977477.pdf', '2025-02-25 07:19:55', '2025-02-25 13:32:24', '20250225', '20250225', NULL),
(13, '19761317990348117', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'Sing copy', 'bfgf19243@gmail.com', 2, 'a3943b6a2d8dd94d7d40d280385c0499.pdf', '2025-02-26 05:33:34', '2025-02-26 11:43:59', '20250226', '20250226', NULL),
(14, '158124538', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, 'sing copy', 'bfgf19243@gmail.com', 3, NULL, '2025-02-28 09:12:26', '2025-02-28 09:12:26', '20250228', NULL, 'OFF'),
(15, '6479385244', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'SURMA AKTER', 'bfgf19243@gmail.com', 2, '0030064dafeb5b69e99b8f34392500c9.pdf', '2025-02-28 19:30:19', '2025-02-28 19:35:02', '20250228', '20250228', NULL),
(16, '158115681', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, 'মো: জাহিদ খাঁন ', 'masumonline184@gmail.com', 3, NULL, '2025-03-01 13:54:15', '2025-03-01 13:54:15', '20250301', NULL, 'not found '),
(17, '150070600', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, 'আবদুল কাদের রাসেল', 'masumonline184@gmail.com', 2, '84625dae83079b27dec033f36d18c625.pdf', '2025-03-01 15:25:47', '2025-03-01 15:28:30', '20250301', '20250301', NULL),
(18, '117871945', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, 'মোঃ রিমন হোসেন', 'masumonline184@gmail.com', 3, NULL, '2025-03-01 15:49:39', '2025-03-01 15:49:39', '20250301', NULL, 'নট ফাউন্ড '),
(19, '8652161640', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'Sing copy', 'bfgf19243@gmail.com', 2, '3bcf1ff667aa6e4f7764f7423053edbf.pdf', '2025-03-01 21:49:25', '2025-03-01 21:55:50', '20250301', '20250301', NULL),
(20, '3261915155', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'sing copy', 'bfgf19243@gmail.com', 2, 'e4b1e47221f635e214de60882e158b52.pdf', '2025-03-02 08:26:08', '2025-03-02 09:36:32', '20250302', '20250302', NULL),
(21, '20061317915106484', NULL, NULL, NULL, NULL, NULL, 'BIRTH_NO', NULL, NULL, 'Ahammed Rabbi Miyazi', 'bfgf19243@gmail.com', 3, NULL, '2025-03-02 12:31:10', '2025-03-02 12:31:10', '20250302', NULL, 'নট ফাউন্ড '),
(22, '19841510428849032', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'Mohammad Salauddin', 'masumonline184@gmail.com', 2, '746f0820b504abefdbdde47efb884fb5.pdf', '2025-03-02 13:11:50', '2025-03-02 13:16:40', '20250302', '20250302', NULL),
(23, '2826086619', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'মোছা: সাকিরুন নেছা', 'masumonline184@gmail.com', 2, '3fb4d131722c032eb694da67e1ecd126.pdf', '2025-03-02 14:43:28', '2025-03-02 14:45:53', '20250302', '20250302', NULL),
(24, '153901916', NULL, NULL, NULL, NULL, NULL, 'FORM_NO', NULL, NULL, 'মোছা: মারুফা খাতুন', 'masumonline184@gmail.com', 3, NULL, '2025-03-02 16:17:09', '2025-03-02 16:17:09', '20250302', NULL, 'Not Found '),
(25, '4679299398', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'Imamul', 'masumonline184@gmail.com', 2, '880cfdfcc18a46e85e1a790838df4be8.pdf', '2025-03-02 20:10:24', '2025-03-02 21:29:36', '20250302', '20250302', NULL),
(26, '123456789', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'test', 'jouelrana12@gmail.com', 3, NULL, '2025-03-05 14:51:19', '2025-03-05 14:51:19', '20250305', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `sign_control`
--

CREATE TABLE `sign_control` (
  `id` int(11) NOT NULL,
  `admin_user` varchar(150) NOT NULL,
  `admin_password` varchar(300) NOT NULL,
  `cost` int(11) NOT NULL,
  `sign_status` int(11) NOT NULL,
  `notice` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_control`
--

INSERT INTO `sign_control` (`id`, `admin_user`, `admin_password`, `cost`, `sign_status`, `notice`) VALUES
(1, 'fastseba', '6b13a09a73dc2f2968601cf4cb7daa21', 10, 1, ''),
(2, 'admin', 'd3c5d1f67c61e9b32f45b420d2adc63f', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `telegram_settings`
--

CREATE TABLE `telegram_settings` (
  `id` int(11) NOT NULL,
  `bot_token` varchar(255) NOT NULL,
  `admin_chat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `telegram_settings`
--

INSERT INTO `telegram_settings` (`id`, `bot_token`, `admin_chat_id`) VALUES
(1, 'bot-token', 'chat-id');

-- --------------------------------------------------------

--
-- Table structure for table `text_control`
--

CREATE TABLE `text_control` (
  `id` int(11) NOT NULL,
  `cost` longtext DEFAULT NULL,
  `minr` longtext DEFAULT NULL,
  `msg` longtext DEFAULT NULL,
  `reg` longtext DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `ssorder` varchar(10) DEFAULT NULL,
  `cc_location_price` int(11) NOT NULL,
  `cc_NidToAll_price` int(11) NOT NULL,
  `cc_ImeiToActive_price` int(11) NOT NULL,
  `cc_location_control` int(11) NOT NULL,
  `cc_NidToAll_control` int(11) NOT NULL,
  `cc_IMEIToActive_control` int(11) NOT NULL,
  `cc_Nogod_control` int(11) NOT NULL,
  `cc_Nogod_price` int(11) NOT NULL,
  `cc_Roket_control` int(11) NOT NULL,
  `cc_Roket_price` int(11) NOT NULL,
  `cc_Bmet_control` int(11) NOT NULL,
  `cc_Bmet_price` int(11) NOT NULL,
  `cc_BRS_control` int(11) NOT NULL,
  `cc_BRS_price` int(11) NOT NULL,
  `cc_Bksh_control` varchar(255) NOT NULL,
  `cc_Bksh_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `text_control`
--

INSERT INTO `text_control` (`id`, `cost`, `minr`, `msg`, `reg`, `date`, `ssorder`, `cc_location_price`, `cc_NidToAll_price`, `cc_ImeiToActive_price`, `cc_location_control`, `cc_NidToAll_control`, `cc_IMEIToActive_control`, `cc_Nogod_control`, `cc_Nogod_price`, `cc_Roket_control`, `cc_Roket_price`, `cc_Bmet_control`, `cc_Bmet_price`, `cc_BRS_control`, `cc_BRS_price`, `cc_Bksh_control`, `cc_Bksh_price`) VALUES
(1, '5', '150', 'hey', '0', '2022-12-09 10:22:03', '0', 450, 550, 900, 1, 1, 1, 1, 200, 1, 1150, 1, 120, 1, 1700, '1', '1250');

-- --------------------------------------------------------

--
-- Table structure for table `text_sub`
--

CREATE TABLE `text_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `text_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `text_sub`
--

INSERT INTO `text_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `text_text`, `delivery_text`) VALUES
(1, '00', NULL, NULL, NULL, NULL, NULL, 'Location ORDER', NULL, NULL, '', 'arifmodz@gmail.com', 2, NULL, '2025-01-30 00:55:50', '2025-01-30 00:56:38', '20250130', NULL, 'NA', NULL),
(2, '01822192046', NULL, NULL, NULL, NULL, NULL, 'Location ORDER', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-16 21:44:32', '2025-02-16 21:50:29', '20250216', NULL, 'refresh koren', 'বহহহ'),
(3, '5555', NULL, NULL, NULL, NULL, NULL, 'Location ORDER', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:36:44', '2025-02-17 00:36:44', '20250217', NULL, NULL, ''),
(4, '01641415677', NULL, NULL, NULL, NULL, NULL, 'Location ORDER', NULL, NULL, '', 'mdsujon524@gmail.com', 2, NULL, '2025-02-24 05:55:19', '2025-02-24 13:10:22', '20250224', NULL, 'MSISDN: 8801641415677, B Party:880376241857175385, Last Call Location: Bari  Fazol Showdagorer Vill  East Elahabad, P O  Muzzafarabad, P S  Chandanaish, Dist  Chittagong, DateTime:15-FEB-2025 18:20:01, Cell ID: 470020125117682, IMEI: 352882220201860, IMSI: 470074206469441. [Robi] https://maps.app.goo.gl/WhYMppZ4bjyKgZZP7', NULL),
(5, '01781787070', NULL, NULL, NULL, NULL, NULL, 'Location ORDER', NULL, NULL, '', 'jouelrana12@gmail.com', 3, NULL, '2025-03-05 19:17:04', '2025-03-05 19:17:04', '20250305', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tin_sub`
--

CREATE TABLE `tin_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `call_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tin_sub`
--

INSERT INTO `tin_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `call_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `comments`) VALUES
(1, '855555', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 00:27:40', '2025-02-17 00:27:40', '20250217', NULL, ''),
(2, '1924217159', NULL, NULL, NULL, NULL, NULL, 'NID_NO', NULL, NULL, 'Tin Certificate কপি ', 'mohsinproz1@gmail.com', 2, '64b1d6c6b4b0576e14e8da36e4d14ae4.pdf', '2025-02-25 07:38:30', '2025-02-25 13:42:27', '20250225', '20250225', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userid_sub`
--

CREATE TABLE `userid_sub` (
  `id` int(11) NOT NULL,
  `nfvb` varchar(300) NOT NULL,
  `nid_num` varchar(150) DEFAULT NULL,
  `form_num` varchar(150) DEFAULT NULL,
  `voter_num` varchar(150) DEFAULT NULL,
  `brn` varchar(150) DEFAULT NULL,
  `Phone_number` varchar(150) DEFAULT NULL,
  `sub_type` varchar(150) DEFAULT NULL,
  `Father_nid` varchar(150) DEFAULT NULL,
  `Mother_nid` varchar(150) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Sub_by` varchar(100) DEFAULT '0',
  `status` int(11) DEFAULT 1,
  `sign_copy` varchar(500) DEFAULT NULL,
  `sub_at` datetime DEFAULT current_timestamp(),
  `fileup_at` datetime DEFAULT current_timestamp(),
  `date_flt` varchar(25) DEFAULT NULL,
  `delivery_flt` varchar(25) DEFAULT NULL,
  `userid_text` varchar(1000) DEFAULT NULL,
  `delivery_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userid_sub`
--

INSERT INTO `userid_sub` (`id`, `nfvb`, `nid_num`, `form_num`, `voter_num`, `brn`, `Phone_number`, `sub_type`, `Father_nid`, `Mother_nid`, `Name`, `Sub_by`, `status`, `sign_copy`, `sub_at`, `fileup_at`, `date_flt`, `delivery_flt`, `userid_text`, `delivery_text`) VALUES
(1, 'Vgygg', NULL, NULL, NULL, NULL, NULL, 'NID UserID Pass ORDER', NULL, NULL, '', 'zzz@gmail.com', 3, NULL, '2025-02-17 08:36:12', '2025-02-17 08:36:12', '20250217', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `mobile`, `balance`, `image`, `status`) VALUES
(120, 'blackfiretools', 'blackfiretools@gmail.com', 'f505c3122b948bcb68e4f228fa53cf81', 'male', '01605578459', 99250, 'image.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biocopy_sub`
--
ALTER TABLE `biocopy_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_log`
--
ALTER TABLE `birth_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bkshstatement_sub`
--
ALTER TABLE `bkshstatement_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bksh_sub`
--
ALTER TABLE `bksh_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bmet_sub`
--
ALTER TABLE `bmet_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brs_sub`
--
ALTER TABLE `brs_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calllist2_sub`
--
ALTER TABLE `calllist2_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calllist_sub`
--
ALTER TABLE `calllist_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardcopy_sub`
--
ALTER TABLE `cardcopy_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_control`
--
ALTER TABLE `file_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imei_sub`
--
ALTER TABLE `imei_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Location_sub`
--
ALTER TABLE `Location_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mrp_sub`
--
ALTER TABLE `mrp_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nameaddress_sub`
--
ALTER TABLE `nameaddress_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nidtoall_sub`
--
ALTER TABLE `nidtoall_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nid_sub`
--
ALTER TABLE `nid_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nogodstatement_sub`
--
ALTER TABLE `nogodstatement_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Nogod_sub`
--
ALTER TABLE `Nogod_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passportinfo_sub`
--
ALTER TABLE `passportinfo_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passportsb_sub`
--
ALTER TABLE `passportsb_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roketstatement_sub`
--
ALTER TABLE `roketstatement_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roket_sub`
--
ALTER TABLE `roket_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servercopy_sub`
--
ALTER TABLE `servercopy_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server_copy`
--
ALTER TABLE `server_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signcopy_sub`
--
ALTER TABLE `signcopy_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_control`
--
ALTER TABLE `sign_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telegram_settings`
--
ALTER TABLE `telegram_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_control`
--
ALTER TABLE `text_control`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `text_sub`
--
ALTER TABLE `text_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tin_sub`
--
ALTER TABLE `tin_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userid_sub`
--
ALTER TABLE `userid_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `biocopy_sub`
--
ALTER TABLE `biocopy_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `birth_log`
--
ALTER TABLE `birth_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bkshstatement_sub`
--
ALTER TABLE `bkshstatement_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bksh_sub`
--
ALTER TABLE `bksh_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bmet_sub`
--
ALTER TABLE `bmet_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brs_sub`
--
ALTER TABLE `brs_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calllist2_sub`
--
ALTER TABLE `calllist2_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calllist_sub`
--
ALTER TABLE `calllist_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cardcopy_sub`
--
ALTER TABLE `cardcopy_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imei_sub`
--
ALTER TABLE `imei_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Location_sub`
--
ALTER TABLE `Location_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `mrp_sub`
--
ALTER TABLE `mrp_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nameaddress_sub`
--
ALTER TABLE `nameaddress_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nidtoall_sub`
--
ALTER TABLE `nidtoall_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nid_sub`
--
ALTER TABLE `nid_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `nogodstatement_sub`
--
ALTER TABLE `nogodstatement_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Nogod_sub`
--
ALTER TABLE `Nogod_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `passportinfo_sub`
--
ALTER TABLE `passportinfo_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passportsb_sub`
--
ALTER TABLE `passportsb_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `roketstatement_sub`
--
ALTER TABLE `roketstatement_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roket_sub`
--
ALTER TABLE `roket_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servercopy_sub`
--
ALTER TABLE `servercopy_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `server_copy`
--
ALTER TABLE `server_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signcopy_sub`
--
ALTER TABLE `signcopy_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sign_control`
--
ALTER TABLE `sign_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `telegram_settings`
--
ALTER TABLE `telegram_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `text_sub`
--
ALTER TABLE `text_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tin_sub`
--
ALTER TABLE `tin_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userid_sub`
--
ALTER TABLE `userid_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
