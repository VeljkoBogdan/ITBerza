-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 12:24 PM
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
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `category`) VALUES
(1, 'menadžment (srednji)'),
(2, 'trgovina, prodaja'),
(3, 'ekonomija (opšte)'),
(4, 'IT'),
(5, 'pravo'),
(6, 'mašinstvo'),
(7, 'dizajn'),
(8, 'obrazovanje, briga o deci'),
(9, 'zdravstvo'),
(10, 'građevina, geodezija'),
(11, 'mediji (novinarstvo, štampa)'),
(12, 'ostalo'),
(13, 'jezici, književnost'),
(14, 'rudarstvo, metalurgija'),
(15, 'psihologija'),
(16, 'grafičarstvo, izdavaštvo'),
(17, 'menadžment (viši)'),
(18, 'biologija'),
(19, 'osiguranje, lizing'),
(20, 'hemija'),
(21, 'arhitektura'),
(22, 'telekomunikacije'),
(23, 'elektrotehnika'),
(24, 'farmacija'),
(25, 'veterina'),
(26, 'sociologija/socijalni rad'),
(27, 'ljudski resursi (HR)'),
(28, 'fizika, matematika'),
(29, 'zaštita životne sredine, ekologija'),
(30, 'umetnost'),
(31, 'prehrambena tehnologija'),
(32, 'turizam'),
(33, 'ugostiteljstvo'),
(34, 'tekstilna industrija'),
(35, 'administracija'),
(36, 'računovodstvo, knjigovodstvo'),
(37, 'marketing, promocija'),
(38, 'PR'),
(39, 'briga o lepoti'),
(40, 'sport, rekreacija'),
(41, 'obezbeđenje'),
(42, 'zaštita na radu'),
(43, 'poljoprivreda'),
(44, 'šumarstvo'),
(45, 'saobraćaj'),
(46, 'logistika'),
(47, 'bankarstvo'),
(48, 'finansije'),
(49, 'transport'),
(50, 'magacin'),
(51, 'zabava'),
(52, 'pozivni centri'),
(53, 'stomatologija'),
(54, 'kontrola kvaliteta'),
(55, 'priprema hrane'),
(56, 'higijena'),
(57, 'održavanje'),
(58, 'proizvodnja i montaža');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id_city` int(11) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id_city`, `city`) VALUES
(83, 'Choose a city'),
(84, 'Zrenjanin'),
(85, 'Novi Sad'),
(86, 'Sremska Mitrovica'),
(87, 'Pančevo'),
(88, 'Vršac'),
(89, 'Sombor'),
(90, 'Kikinda'),
(91, 'Ruma'),
(92, 'Apatin'),
(93, 'Bačka Topola'),
(94, 'Kula'),
(95, 'Senta'),
(96, 'Crvenka'),
(97, 'Ada'),
(98, 'Bečej'),
(99, 'Srbobran'),
(100, 'Vrbas'),
(101, 'Odžaci'),
(102, 'Temerin'),
(103, 'Žabalj'),
(104, 'Bačka Palanka'),
(105, 'Futog'),
(106, 'Beočin'),
(107, 'Sremski Karlovci'),
(108, 'Šid'),
(109, 'Inđija'),
(110, 'Kovin'),
(111, 'Stara Pazova'),
(112, 'Kanjiža'),
(113, 'Horgoš'),
(114, 'Bela Crkva'),
(115, 'Beograd'),
(116, 'Smederevo'),
(117, 'Požarevac'),
(118, 'Kragujevac'),
(119, 'Kraljevo'),
(120, 'Kruševac'),
(121, 'Čačak'),
(122, 'Obrenovac'),
(123, 'Mladenovac'),
(124, 'Smederevska Palanka'),
(125, 'Velika Plana'),
(126, 'Lazarevac'),
(127, 'Aranđelovac'),
(128, 'Ljig'),
(129, 'Gornji Milanovac'),
(130, 'Arilje'),
(131, 'Jagodina'),
(132, 'Ćuprija'),
(133, 'Paraćin'),
(134, 'Despotovac'),
(135, 'Ivanjica'),
(136, 'Vrnjačka Banja'),
(137, 'Trstenik'),
(138, 'Aleksinac'),
(139, 'Sokobanja'),
(140, 'Aleksandrovac'),
(141, 'Donji Milanovac'),
(142, 'Kladovo'),
(143, 'Negotin'),
(144, 'Bor'),
(145, 'Zaječar'),
(146, 'Knjaževac'),
(147, 'Žagubica'),
(148, 'Majdanpek'),
(149, 'Despotovo'),
(150, 'Šabac'),
(151, 'Valjevo'),
(152, 'Užice'),
(153, 'Novi Pazar'),
(154, 'Loznica'),
(155, 'Krupanj'),
(156, 'Požega'),
(157, 'Bajina Bašta'),
(158, 'Priboj'),
(159, 'Prijepolje'),
(160, 'Niš'),
(161, 'Leskovac'),
(162, 'Vranje'),
(163, 'Prokuplje'),
(164, 'Pirot'),
(165, 'Babušnica'),
(166, 'Dimitrovgrad'),
(167, 'Medveđa'),
(168, 'Surdulica'),
(169, 'Kosovska Mitrovica'),
(170, 'Peć'),
(171, 'Priština'),
(172, 'Prizren'),
(173, 'Uroševac'),
(174, 'Ivangrad'),
(175, 'Danilovgrad'),
(176, 'Subotica'),
(177, 'Veternik'),
(178, 'Čelarevo'),
(179, 'Titel'),
(180, 'Vrdnik'),
(181, 'Boljevac'),
(182, 'Bač'),
(183, 'Stari Banovci'),
(184, 'Novi Bečej'),
(185, 'Niška Banja'),
(186, 'Kopaonik'),
(187, 'Vreoci'),
(188, 'Novi Kneževac'),
(189, 'Čoka'),
(190, 'Kać'),
(191, 'Čurug'),
(192, 'Čajetina'),
(193, 'Novo Miloševo'),
(194, 'Inostranstvo'),
(195, 'Banja Koviljača'),
(196, 'Kosovska Kamenica'),
(197, 'Nova Pazova'),
(198, 'Banja Vrujci'),
(199, 'Sremska Kamenica'),
(200, 'Zlatibor'),
(201, 'Lovćenac'),
(202, 'Topola'),
(203, 'Kovačica'),
(204, 'Šimanovci'),
(205, 'Lapovo'),
(206, 'Preševo'),
(207, 'Svilajnac'),
(208, 'Mali Iđoš'),
(209, 'Bujanovac'),
(210, 'Gajdobra'),
(211, 'Ub'),
(212, 'Batajnica'),
(213, 'Gnjilane'),
(214, 'Veliko Gradište'),
(215, 'Lebane'),
(216, 'Kuršumlija'),
(217, 'Mali Zvornik'),
(218, 'Surčin'),
(219, 'Pećinci'),
(220, 'Batočina'),
(221, 'Sjenica'),
(222, 'Novi Banovci'),
(223, 'Ljubovija'),
(224, 'Vladičin Han'),
(225, 'Petrovac na Mlavi'),
(226, 'Feketić'),
(227, 'Kosjerić'),
(228, 'Popovac'),
(229, 'Lajkovac'),
(230, 'Raška'),
(231, 'Nova Varoš'),
(232, 'Palić'),
(233, 'Sopot'),
(234, 'Barič'),
(235, 'Bački Petrovac'),
(236, 'Leštane'),
(237, 'Alibunar'),
(238, 'Bela Palanka'),
(239, 'Blace'),
(240, 'Bogatić'),
(241, 'Bojnik'),
(242, 'Bosilegrad'),
(243, 'Brus'),
(244, 'Ćićevac'),
(245, 'Crna Trava'),
(246, 'Dečani'),
(247, 'Doljevac'),
(248, 'Ðakovica'),
(249, 'Gadžin Han'),
(250, 'Glogovac'),
(251, 'Golubac'),
(252, 'Gora'),
(253, 'Irig'),
(254, 'Istok'),
(255, 'Kačanik'),
(256, 'Klina'),
(257, 'Knić'),
(258, 'Kosovo Polje'),
(259, 'Kučevo'),
(260, 'Leposavić'),
(261, 'Lipljan'),
(262, 'Lučani'),
(263, 'Malo Crniće'),
(264, 'Merošina'),
(265, 'Mionica'),
(266, 'Nova Crnja'),
(267, 'Novo Brdo'),
(268, 'Obilić'),
(269, 'Opovo'),
(270, 'Orahovac'),
(271, 'Osečina'),
(272, 'Plandište'),
(273, 'Podujevo'),
(274, 'Rača'),
(275, 'Ražanj'),
(276, 'Rekovac'),
(277, 'Sečanj'),
(278, 'Srbica'),
(279, 'Suva Reka'),
(280, 'Svrljig'),
(281, 'Štimlje'),
(282, 'Štrpce'),
(283, 'Trgovište'),
(284, 'Tutin'),
(285, 'Varvarin'),
(286, 'Vitina'),
(287, 'Vladimirci'),
(288, 'Vlasotince'),
(289, 'Vučitrn'),
(290, 'Zubin Potok'),
(291, 'Zvečan'),
(292, 'Žabari'),
(293, 'Žitište'),
(294, 'Žitorađa'),
(295, 'Koceljeva'),
(296, 'Busije'),
(297, 'Putinci'),
(298, 'Zemun Polje');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id_company` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_banned` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_type`
--

CREATE TABLE `employment_type` (
  `id_employment_type` int(11) NOT NULL,
  `employment_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment_type`
--

INSERT INTO `employment_type` (`id_employment_type`, `employment_type`) VALUES
(1, 'Choose a type'),
(2, 'Contract'),
(3, 'Internship'),
(4, 'Part-time job');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `id_company` int(11) DEFAULT 1,
  `contact_person` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_telephone` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `poster_company_name` varchar(255) NOT NULL,
  `tax_id_number` int(63) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `remote` tinyint(1) NOT NULL DEFAULT 0,
  `qualifications` varchar(255) NOT NULL,
  `employment_type` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `signup_email` varchar(255) NOT NULL,
  `signup_telephone` varchar(255) NOT NULL,
  `duration` int(63) NOT NULL,
  `period_from` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id_job`, `id_company`, `contact_person`, `contact_email`, `contact_telephone`, `company_name`, `poster_company_name`, `tax_id_number`, `position_name`, `category`, `city`, `remote`, `qualifications`, `employment_type`, `text`, `signup_email`, `signup_telephone`, `duration`, `period_from`, `period_to`, `is_enabled`) VALUES
(1, 0, 'Veljko Bogdan', 'action@dr.com', '065-421-7454', 'Web', 'Web', 10000002, 'Web', '1', '90', 1, '1', '1', 'document.getElementById(\'contact_person_error\').innerHTML=\"Error\"; document.getElementById(\'contact_person_error\').innerHTML=\"Error\"; document.getElementById(\'contact_person_error\').innerHTML=\"Error\"; document.getElementById(\'contact_person_error\').innerHTML=\"Error\";', 'action@dr.com', '065-421-7454', 30, NULL, NULL, 0),
(2, 0, 'Veljko Bogdan', 'action@dr.com', '0654217454', 'TechTalentHub', 'TechTalentHub', 10000003, 'Market administrator position', '2', '85', 1, '4', '4', 'This is text', 'action@dr.com', '0654217454', 30, '2023-06-04', '2023-08-31', 1),
(3, 0, 'John Smith', 'john@example.com', '1234567890', 'ABC Corporation', 'ABC Corporation', 12345678, 'Software Developer', '8', '200', 0, '2', '3', 'Join our development team and work on exciting projects.', 'jobs@abc.com', '2345678901', 30, '2023-07-01', '2023-07-31', 0),
(4, 0, 'Emily Johnson', 'emily@example.com', '2345678901', 'XYZ Solutions', 'XYZ Solutions', 87654321, 'Marketing Specialist', '12', '150', 1, '4', '2', 'Join our marketing team and create impactful campaigns.', 'careers@xyz.com', '3456789012', 15, '2023-08-01', '2023-08-15', 0),
(5, 0, 'Michael Brown', 'michael@example.com', '3456789012', '123 Industries', '123 Industries', 76543210, 'Sales Representative', '9', '220', 0, '3', '1', 'Join our sales team and drive revenue growth.', 'careers@123.com', '4567890123', 30, '2023-09-01', '2023-09-30', 0),
(6, 0, 'Emma Davis', 'emma@example.com', '4567890123', 'ABC Corporation', 'ABC Corporation', 65432109, 'Customer Service Representative', '4', '130', 1, '2', '2', 'Join our customer service team and provide excellent support.', 'jobs@abc.com', '5678901234', 15, '2023-10-01', '2023-10-15', 0),
(7, 0, 'Noah Wilson', 'noah@example.com', '5678901234', 'XYZ Solutions', 'XYZ Solutions', 54321098, 'Financial Analyst', '23', '170', 0, '5', '3', 'Join our finance team and analyze financial data.', 'careers@xyz.com', '6789012345', 30, '2023-11-01', '2023-11-30', 0),
(8, 0, 'Olivia Taylor', 'olivia@example.com', '6789012345', '123 Industries', '123 Industries', 43210987, 'Human Resources Assistant', '16', '140', 1, '3', '1', 'Join our HR team and support our human resources initiatives.', 'careers@123.com', '7890123456', 15, '2023-12-01', '2023-12-15', 0),
(9, 0, 'William Clark', 'william@example.com', '7890123456', 'ABC Corporation', 'ABC Corporation', 32109876, 'IT Technician', '7', '180', 0, '4', '2', 'Join our IT team and provide technical support to our staff.', 'jobs@abc.com', '8901234567', 30, '2024-01-01', '2024-01-31', 0),
(10, 0, 'Sophia Turner', 'sophia@example.com', '8901234567', 'XYZ Solutions', 'XYZ Solutions', 21098765, 'Project Manager', '21', '160', 1, '6', '3', 'Join our project management team and oversee successful project delivery.', 'careers@xyz.com', '9012345678', 15, '2024-02-01', '2024-02-15', 0),
(11, 0, 'Liam Harris', 'liam@example.com', '9012345678', '123 Industries', '123 Industries', 10987654, 'Data Scientist', '10', '240', 0, '7', '1', 'Join our data science team and analyze complex datasets.', 'jobs@123.com', '0123456789', 30, '2024-03-01', '2024-03-31', 0),
(12, 0, 'Isabella Martinez', 'isabella@example.com', '0123456789', 'ABC Corporation', 'ABC Corporation', 98765432, 'Web Developer', '15', '110', 1, '5', '2', 'Join our web development team and build stunning websites.', 'careers@abc.com', '1234567890', 15, '2024-04-01', '2024-04-15', 0),
(13, 0, 'Mason Jones', 'mason@example.com', '1234567890', 'XYZ Solutions', 'XYZ Solutions', 87654321, 'UX/UI Designer', '20', '200', 0, '4', '3', 'Join our design team and create user-friendly interfaces.', 'careers@xyz.com', '2345678901', 30, '2024-05-01', '2024-05-31', 0),
(14, 0, 'Sophia Clark', 'sophia@example.com', '2345678901', '123 Industries', '123 Industries', 76543210, 'Content Writer', '13', '240', 1, '5', '2', 'Join our content team and write engaging articles.', 'careers@123.com', '3456789012', 15, '2024-06-01', '2024-06-15', 0),
(15, 0, 'James Taylor', 'james@example.com', '3456789012', 'ABC Corporation', 'ABC Corporation', 65432109, 'Marketing Manager', '9', '200', 0, '4', '3', 'Join our marketing team and oversee marketing campaigns.', 'jobs@abc.com', '4567890123', 30, '2024-07-01', '2024-07-31', 0),
(16, 0, 'Olivia Wilson', 'olivia@example.com', '4567890123', 'XYZ Solutions', 'XYZ Solutions', 54321098, 'Business Analyst', '19', '130', 1, '5', '3', 'Join our business team and analyze market trends.', 'careers@xyz.com', '5678901234', 15, '2024-08-01', '2024-08-15', 0),
(17, 0, 'Sophia Turner', 'sophia@example.com', '5678901234', '123 Industries', '123 Industries', 43210987, 'Operations Manager', '17', '170', 0, '6', '2', 'Join our operations team and optimize our processes.', 'careers@123.com', '6789012345', 30, '2024-09-01', '2024-09-30', 0),
(18, 0, 'Logan Thompson', 'logan@example.com', '6789012345', 'ABC Corporation', 'ABC Corporation', 32109876, 'Quality Assurance Specialist', '6', '190', 1, '3', '1', 'Join our QA team and ensure the quality of our products.', 'jobs@abc.com', '7890123456', 15, '2024-10-01', '2024-10-15', 0),
(19, 0, 'Ava Davis', 'ava@example.com', '7890123456', 'XYZ Solutions', 'XYZ Solutions', 21098765, 'Social Media Manager', '14', '150', 0, '4', '3', 'Join our marketing team and manage our social media presence.', 'careers@xyz.com', '9012345678', 30, '2024-11-01', '2024-11-30', 0),
(20, 0, 'Ethan Wilson', 'ethan@example.com', '9012345678', '123 Industries', '123 Industries', 10987654, 'Research Analyst', '22', '120', 1, '5', '2', 'Join our research team and contribute to innovative projects.', 'careers@123.com', '0123456789', 15, '2024-12-01', '2024-12-15', 0),
(21, 0, 'Mia Clark', 'mia@example.com', '0123456789', 'ABC Corporation', 'ABC Corporation', 98765432, 'Operations Analyst', '11', '220', 0, '4', '1', 'Join our operations team and analyze our business processes.', 'jobs@abc.com', '1234567890', 30, '2025-01-01', '2025-01-31', 1),
(22, 0, 'Liam Harris', 'liam@example.com', '1234567890', 'XYZ Solutions', 'XYZ Solutions', 87654321, 'Graphic Designer', '18', '100', 1, '5', '3', 'Join our design team and bring creativity to our projects.', 'careers@xyz.com', '2345678901', 15, '2025-02-01', '2025-02-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `sender_id`, `receiver_id`, `message`, `timestamp`) VALUES
(1, 14, 0, 'Hello', '2023-06-27'),
(2, 14, 0, 'How are you?', '2023-06-27'),
(3, 14, 0, 'vtsveljkobogdan@gmail.com: Hey!', '2023-06-27'),
(4, 14, 0, '<small>vtsveljkobogdan@gmail.com</small>: Heya!', '2023-06-27'),
(5, 14, 0, '<small>vtsveljkobogdan@gmail.com</small>: ', '2023-06-27'),
(6, 14, 0, '<small>vtsveljkobogdan@gmail.com</small>: hehe', '2023-06-27'),
(7, 14, 0, '<small>vtsveljkobogdan@gmail.com</small>: ', '2023-06-27'),
(8, 14, 0, '<small>vtsveljkobogdan@gmail.com</small>: ', '2023-06-27'),
(9, 14, 0, '<small>vtsveljkobogdan@gmail.com</small>: ', '2023-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id_qualification` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id_qualification`, `qualification`) VALUES
(1, 'Choose the qualification for the given job'),
(2, 'Primary School'),
(3, 'High School'),
(4, 'College / Higher School'),
(5, 'University'),
(6, 'Magistracy'),
(7, 'Doctorate / PhD');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(63) NOT NULL,
  `biography` text DEFAULT NULL,
  `is_company` tinyint(1) DEFAULT 0,
  `company_name` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_banned` tinyint(1) NOT NULL DEFAULT 0,
  `verification_id` varchar(255) NOT NULL,
  `verification_status` int(3) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `telephone`, `biography`, `is_company`, `company_name`, `website`, `address`, `description`, `is_banned`, `verification_id`, `verification_status`, `is_admin`) VALUES
(13, 'Veljko', 'Bogdan', 'action@dr.com', '$2y$10$xNasmgwclF3nNpC/Q5Ce2.bC4vQLhLa8UOt9v7LD62.tTDShNtSv6', '065-421-7454', 'null', 0, '', '', '', NULL, 0, '41f1cb135a4d47f52f82d6764883db73', 1, 0),
(14, 'Bogdan', 'Bogdan', 'vtsveljkobogdan@gmail.com', '$2y$10$XJ8EBzNDzyuYhRkuIBE0fO4AgxPEdjMPHqAIBt65gqcOutHoZ8moG', '0654217454', 'I am admin!', 0, 'Web', 'Web', 'Web', 'Web', 0, '6e6eebf3430ac0c867ed113cb1c1f3e8', 1, 1),
(15, 'Veljko', 'Bogdan', 'johny.t@comic.com', 'Giornogiovanna355!', '0654217454', 'null', 1, 'Web', 'Web', 'Osmi Mart 9', 'Web', 0, 'eaed62c737d1ed70371439a1141bcfec', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id_company`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employment_type`
--
ALTER TABLE `employment_type`
  ADD PRIMARY KEY (`id_employment_type`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id_qualification`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_type`
--
ALTER TABLE `employment_type`
  MODIFY `id_employment_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id_qualification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
