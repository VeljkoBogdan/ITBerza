-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2023 at 08:46 PM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bogdan`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `category`) VALUES
(1, 'Management'),
(2, 'Sales'),
(3, 'Economics'),
(4, 'IT'),
(5, 'Law'),
(6, 'Mechanical Engineering'),
(7, 'Design'),
(8, 'Education, Childcare'),
(9, 'Healthcare'),
(10, 'Construction, Surveying'),
(11, 'Media, Journalism'),
(12, 'Other'),
(13, 'Languages, Literature'),
(14, 'Mining, Metallurgy'),
(15, 'Psychology'),
(16, 'Graphic Design, Publishing'),
(17, 'Higher Management'),
(18, 'Biology'),
(19, 'Insurance, Leasing'),
(20, 'Chemistry'),
(21, 'Architecture'),
(22, 'Telecommunications'),
(23, 'Electrical Engineering'),
(24, 'Pharmacy'),
(25, 'Veterinary'),
(26, 'Sociology, Social Work'),
(27, 'Human Resources (HR)'),
(28, 'Physics, Mathematics'),
(29, 'Environmental Protection, Ecology'),
(30, 'Art'),
(31, 'Food Technology'),
(32, 'Tourism'),
(33, 'Hospitality'),
(34, 'Textile Industry'),
(35, 'Administration'),
(36, 'Accounting'),
(37, 'Marketing, Promotion'),
(38, 'Public Relations (PR)'),
(39, 'Beauty'),
(40, 'Sports, Recreation'),
(41, 'Security'),
(42, 'Occupational Health and Safety'),
(43, 'Agriculture'),
(44, 'Forestry'),
(45, 'Transportation'),
(46, 'Logistics'),
(47, 'Banking'),
(48, 'Finance'),
(49, 'Transport'),
(50, 'Warehouse'),
(51, 'Entertainment'),
(52, 'Call Centers'),
(53, 'Dentistry'),
(54, 'Quality Control'),
(55, 'Food Preparation'),
(56, 'Hygiene'),
(57, 'Maintenance'),
(58, 'Production and Assembly'),
(59, 'Software Development'),
(60, 'Web Development'),
(61, 'Database Administration');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id_city` int NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id_city`, `city`) VALUES
(1, 'Choose a city'),
(2, 'Zrenjanin'),
(3, 'Novi Sad'),
(4, 'Sremska Mitrovica'),
(5, 'Pančevo'),
(6, 'Vršac'),
(7, 'Sombor'),
(8, 'Kikinda'),
(9, 'Ruma'),
(10, 'Apatin'),
(11, 'Bačka Topola'),
(12, 'Kula'),
(13, 'Senta'),
(14, 'Crvenka'),
(15, 'Ada'),
(16, 'Bečej'),
(17, 'Srbobran'),
(18, 'Vrbas'),
(19, 'Odžaci'),
(20, 'Temerin'),
(21, 'Žabalj'),
(22, 'Bačka Palanka'),
(23, 'Futog'),
(24, 'Beočin'),
(25, 'Sremski Karlovci'),
(26, 'Šid'),
(27, 'Inđija'),
(28, 'Kovin'),
(29, 'Stara Pazova'),
(30, 'Kanjiža'),
(31, 'Horgoš'),
(32, 'Bela Crkva'),
(33, 'Beograd'),
(34, 'Smederevo'),
(35, 'Požarevac'),
(36, 'Kragujevac'),
(37, 'Kraljevo'),
(38, 'Kruševac'),
(39, 'Čačak'),
(40, 'Obrenovac'),
(41, 'Mladenovac'),
(42, 'Smederevska Palanka'),
(43, 'Velika Plana'),
(44, 'Lazarevac'),
(45, 'Aranđelovac'),
(46, 'Ljig'),
(47, 'Gornji Milanovac'),
(48, 'Arilje'),
(49, 'Jagodina'),
(50, 'Ćuprija'),
(51, 'Paraćin'),
(52, 'Despotovac'),
(53, 'Ivanjica'),
(54, 'Vrnjačka Banja'),
(55, 'Trstenik'),
(56, 'Aleksinac'),
(57, 'Sokobanja'),
(58, 'Aleksandrovac'),
(59, 'Donji Milanovac'),
(60, 'Kladovo'),
(61, 'Negotin'),
(62, 'Bor'),
(63, 'Zaječar'),
(64, 'Knjaževac'),
(65, 'Žagubica'),
(66, 'Majdanpek'),
(67, 'Despotovo'),
(68, 'Šabac'),
(69, 'Valjevo'),
(70, 'Užice'),
(71, 'Novi Pazar'),
(72, 'Loznica'),
(73, 'Krupanj'),
(74, 'Požega'),
(75, 'Bajina Bašta'),
(76, 'Priboj'),
(77, 'Prijepolje'),
(78, 'Niš'),
(79, 'Leskovac'),
(80, 'Vranje'),
(81, 'Prokuplje'),
(82, 'Pirot'),
(83, 'Babušnica'),
(84, 'Dimitrovgrad'),
(85, 'Medveđa'),
(86, 'Surdulica'),
(87, 'Kosovska Mitrovica'),
(88, 'Peć'),
(89, 'Priština'),
(90, 'Prizren'),
(91, 'Uroševac'),
(92, 'Ivangrad'),
(93, 'Danilovgrad'),
(94, 'Subotica'),
(95, 'Veternik'),
(96, 'Čelarevo'),
(97, 'Titel'),
(98, 'Vrdnik'),
(99, 'Boljevac'),
(100, 'Bač'),
(101, 'Stari Banovci'),
(102, 'Novi Bečej'),
(103, 'Niška Banja'),
(104, 'Kopaonik'),
(105, 'Vreoci'),
(106, 'Novi Kneževac'),
(107, 'Čoka'),
(108, 'Kać'),
(109, 'Čurug'),
(110, 'Čajetina'),
(111, 'Novo Miloševo'),
(112, 'Inostranstvo'),
(113, 'Banja Koviljača'),
(114, 'Kosovska Kamenica'),
(115, 'Nova Pazova'),
(116, 'Banja Vrujci'),
(117, 'Sremska Kamenica'),
(118, 'Zlatibor'),
(119, 'Lovćenac'),
(120, 'Topola'),
(121, 'Kovačica'),
(122, 'Šimanovci'),
(123, 'Lapovo'),
(124, 'Preševo'),
(125, 'Svilajnac'),
(126, 'Mali Iđoš'),
(127, 'Bujanovac'),
(128, 'Gajdobra'),
(129, 'Ub'),
(130, 'Batajnica'),
(131, 'Gnjilane'),
(132, 'Veliko Gradište'),
(133, 'Lebane'),
(134, 'Kuršumlija'),
(135, 'Mali Zvornik'),
(136, 'Surčin'),
(137, 'Pećinci'),
(138, 'Batočina'),
(139, 'Sjenica'),
(140, 'Novi Banovci'),
(141, 'Ljubovija'),
(142, 'Vladičin Han'),
(143, 'Petrovac na Mlavi'),
(144, 'Feketić'),
(145, 'Kosjerić'),
(146, 'Popovac'),
(147, 'Lajkovac'),
(148, 'Raška'),
(149, 'Nova Varoš'),
(150, 'Palić'),
(151, 'Sopot'),
(152, 'Barič'),
(153, 'Bački Petrovac'),
(154, 'Leštane'),
(155, 'Alibunar'),
(156, 'Bela Palanka'),
(157, 'Blace'),
(158, 'Bogatić'),
(159, 'Bojnik'),
(160, 'Bosilegrad'),
(161, 'Brus'),
(162, 'Ćićevac'),
(163, 'Crna Trava'),
(164, 'Dečani'),
(165, 'Doljevac'),
(166, 'Ðakovica'),
(167, 'Gadžin Han'),
(168, 'Glogovac'),
(169, 'Golubac'),
(170, 'Gora'),
(171, 'Irig'),
(172, 'Istok'),
(173, 'Kačanik'),
(174, 'Klina'),
(175, 'Knić'),
(176, 'Kosovo Polje'),
(177, 'Kučevo'),
(178, 'Leposavić'),
(179, 'Lipljan'),
(180, 'Lučani'),
(181, 'Malo Crniće'),
(182, 'Merošina'),
(183, 'Mionica'),
(184, 'Nova Crnja'),
(185, 'Novo Brdo'),
(186, 'Obilić'),
(187, 'Opovo'),
(188, 'Orahovac'),
(189, 'Osečina'),
(190, 'Plandište'),
(191, 'Podujevo'),
(192, 'Rača'),
(193, 'Ražanj'),
(194, 'Rekovac'),
(195, 'Sečanj'),
(196, 'Srbica'),
(197, 'Suva Reka'),
(198, 'Svrljig'),
(199, 'Štimlje'),
(200, 'Štrpce'),
(201, 'Trgovište'),
(202, 'Tutin'),
(203, 'Varvarin'),
(204, 'Vitina'),
(205, 'Vladimirci'),
(206, 'Vlasotince'),
(207, 'Vučitrn'),
(208, 'Zubin Potok'),
(209, 'Zvečan'),
(210, 'Žabari'),
(211, 'Žitište'),
(212, 'Žitorađa'),
(213, 'Koceljeva'),
(214, 'Busije'),
(215, 'Putinci'),
(216, 'Zemun Polje');

-- --------------------------------------------------------

--
-- Table structure for table `employment_type`
--

CREATE TABLE `employment_type` (
  `id_employment_type` int NOT NULL,
  `employment_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
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
  `id_job` int NOT NULL,
  `id_company` int DEFAULT '1',
  `contact_person` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_telephone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `poster_company_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tax_id_number` int NOT NULL,
  `position_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category` int NOT NULL,
  `city` int NOT NULL,
  `remote` tinyint(1) NOT NULL DEFAULT '0',
  `qualifications` int NOT NULL,
  `employment_type` int NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `signup_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `signup_telephone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `duration` int NOT NULL,
  `period_from` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id_job`, `id_company`, `contact_person`, `contact_email`, `contact_telephone`, `company_name`, `poster_company_name`, `tax_id_number`, `position_name`, `category`, `city`, `remote`, `qualifications`, `employment_type`, `text`, `signup_email`, `signup_telephone`, `duration`, `period_from`, `period_to`, `is_enabled`) VALUES
(1, 26, 'John Smith', 'john@example.com', '555-111-1111', 'Catchy Corp', 'ABC Company', 12345678, 'Software Engineer', 10, 127, 0, 3, 2, 'We are seeking a skilled Software Engineer to join our dynamic team. If you are passionate about coding and have experience in web development, this role is for you!', 'info@catchycorp.com', '555-222-2222', 30, '2022-06-01', '2022-12-31', 0),
(2, 27, 'Jane Johnson', 'jane@example.com', '555-333-3333', 'Tech Wizards', 'XYZ Corporation', 98765432, 'Data Scientist', 20, 25, 1, 5, 3, 'Tech Wizards is looking for a talented Data Scientist to analyze large datasets and generate valuable insights. Join our team and make an impact in the field of data analytics!', 'jobs@techwizards.com', '555-444-4444', 15, '2022-07-01', '2022-07-31', 0),
(3, 28, 'Mark Williams', 'mark@example.com', '555-555-5555', 'Digital Solutions', '123 Industries', 54321678, 'UI/UX Designer', 30, 168, 1, 4, 2, 'Digital Solutions is hiring a creative UI/UX Designer to enhance user experiences and create intuitive designs. If you have a passion for design and a keen eye for detail, apply now!', 'careers@digitalsolutions.com', '555-666-6666', 30, '2022-08-01', '2023-01-31', 0),
(4, 29, 'Emily Brown', 'emily@example.com', '555-777-7777', 'Innovative Tech', 'Acme Corporation', 87654321, 'Full Stack Developer', 40, 122, 0, 6, 3, 'Join the Innovative Tech team as a Full Stack Developer and contribute to cutting-edge projects. We are looking for a versatile developer with experience in both frontend and backend technologies.', 'jobs@innovativetech.com', '555-888-8888', 30, '2022-09-01', '2022-12-31', 0),
(5, 30, 'Michael Jones', 'michael@example.com', '555-999-9999', 'Code Masters', 'XYZ Enterprises', 23456789, 'Cybersecurity Analyst', 50, 104, 1, 7, 4, 'Code Masters is seeking a skilled Cybersecurity Analyst to protect our systems and networks from potential threats. If you have a deep understanding of cybersecurity principles, we want to hear from you!', 'careers@codemasters.com', '555-000-0000', 15, '2022-10-01', '2023-03-31', 0),
(6, 26, 'John Smith', 'john@example.com', '555-111-1111', 'Catchy Corp', 'ABC Company', 12345678, 'Software Developer', 15, 155, 0, 4, 3, 'Join Catchy Corp as a Software Developer and contribute to the development of innovative software solutions. We are looking for a motivated individual with strong programming skills.', 'info@catchycorp.com', '555-222-2222', 30, '2022-11-01', '2023-04-30', 0),
(7, 27, 'Jane Johnson', 'jane@example.com', '555-333-3333', 'Tech Wizards', 'XYZ Corporation', 98765432, 'Machine Learning Engineer', 25, 33, 1, 7, 4, 'Tech Wizards is hiring a Machine Learning Engineer to develop and deploy machine learning models. If you have a passion for artificial intelligence and data science, apply now!', 'jobs@techwizards.com', '555-444-4444', 15, '2022-12-01', '2022-12-31', 0),
(8, 28, 'Mark Williams', 'mark@example.com', '555-555-5555', 'Digital Solutions', '123 Industries', 54321678, 'Frontend Developer', 35, 125, 0, 5, 2, 'Digital Solutions is seeking a talented Frontend Developer to create visually appealing and user-friendly web interfaces. Join our team and showcase your frontend skills!', 'careers@digitalsolutions.com', '555-666-6666', 30, '2023-01-01', '2023-06-30', 1),
(9, 29, 'Emily Brown', 'emily@example.com', '555-777-7777', 'Innovative Tech', 'Acme Corporation', 87654321, 'Database Administrator', 45, 99, 1, 6, 2, 'Innovative Tech is looking for a skilled Database Administrator to manage our databases and ensure their optimal performance. If you have a strong understanding of database systems, apply now!', 'jobs@innovativetech.com', '555-888-8888', 30, '2023-02-01', '2023-07-31', 0),
(10, 30, 'Michael Jones', 'michael@example.com', '555-999-9999', 'Code Masters', 'XYZ Enterprises', 23456789, 'Software Tester', 55, 116, 0, 3, 4, 'Code Masters is hiring a Software Tester to ensure the quality and reliability of our software products. If you have a keen eye for detail and a passion for quality assurance, join our team!', 'careers@codemasters.com', '555-000-0000', 30, '2023-03-01', '2023-09-30', 0),
(11, 26, 'John Smith', 'john@example.com', '555-111-1111', 'Catchy Corp', 'ABC Company', 12345678, 'IT Project Manager', 60, 68, 1, 6, 3, 'Catchy Corp is seeking an experienced IT Project Manager to oversee our projects and ensure their successful delivery. If you have excellent leadership and communication skills, apply now!', 'info@catchycorp.com', '555-222-2222', 30, '2023-04-01', '2023-10-31', 0),
(12, 27, 'Jane Johnson', 'jane@example.com', '555-333-3333', 'Tech Wizards', 'XYZ Corporation', 98765432, 'Backend Developer', 15, 203, 0, 2, 4, 'Tech Wizards is looking for a skilled Backend Developer to build scalable and efficient server-side applications. Join our team and contribute to the development of cutting-edge technology!', 'jobs@techwizards.com', '555-444-4444', 15, '2023-05-01', '2023-05-31', 0),
(13, 28, 'Mark Williams', 'mark@example.com', '555-555-5555', 'Digital Solutions', '123 Industries', 54321678, 'Network Administrator', 25, 169, 1, 3, 2, 'Digital Solutions is hiring a Network Administrator to ensure the smooth operation of our network infrastructure. If you have expertise in network administration, we want to hear from you!', 'careers@digitalsolutions.com', '555-666-6666', 30, '2023-06-01', '2023-11-30', 0),
(14, 29, 'Emily Brown', 'emily@example.com', '555-777-7777', 'Innovative Tech', 'Acme Corporation', 87654321, 'Data Analyst', 30, 21, 1, 4, 3, 'Innovative Tech is seeking a Data Analyst to analyze complex datasets and provide valuable insights. Join our team and help drive data-based decision making!', 'jobs@innovativetech.com', '555-888-8888', 15, '2023-07-01', '2023-07-31', 0),
(15, 30, 'Michael Jones', 'michael@example.com', '555-999-9999', 'Code Masters', 'XYZ Enterprises', 23456789, 'Cloud Architect', 40, 25, 0, 7, 2, 'Code Masters is hiring a Cloud Architect to design and implement scalable cloud solutions. If you have expertise in cloud technologies, join our team and shape the future of cloud computing!', 'careers@codemasters.com', '555-000-0000', 30, '2023-08-01', '2024-01-31', 0),
(16, 26, 'John Smith', 'john@example.com', '555-111-1111', 'Catchy Corp', 'ABC Company', 12345678, 'IT Support Specialist', 50, 58, 1, 5, 4, 'Join Catchy Corp as an IT Support Specialist and provide technical assistance to our users. If you have excellent problem-solving skills and a passion for customer service, apply now!', 'info@catchycorp.com', '555-222-2222', 30, '2023-09-01', '2024-02-29', 0),
(17, 27, 'Jane Johnson', 'jane@example.com', '555-333-3333', 'Tech Wizards', 'XYZ Corporation', 98765432, 'Software Architect', 60, 214, 0, 6, 4, 'Tech Wizards is seeking a talented Software Architect to design and oversee the development of our software applications. Join our team and shape the architecture of our cutting-edge products!', 'jobs@techwizards.com', '555-444-4444', 15, '2023-10-01', '2023-10-31', 0),
(18, 28, 'Mark Williams', 'mark@example.com', '555-555-5555', 'Digital Solutions', '123 Industries', 54321678, 'DevOps Engineer', 20, 40, 1, 3, 2, 'Digital Solutions is looking for a DevOps Engineer to streamline our software development processes and improve collaboration. If you have expertise in DevOps methodologies, join our team!', 'careers@digitalsolutions.com', '555-666-6666', 30, '2023-11-01', '2024-04-30', 0),
(19, 29, 'Emily Brown', 'emily@example.com', '555-777-7777', 'Innovative Tech', 'Acme Corporation', 87654321, 'UI/UX Developer', 25, 198, 0, 4, 2, 'Innovative Tech is hiring a UI/UX Developer to create visually appealing and user-friendly interfaces. If you have a passion for design and frontend development, join our team!', 'jobs@innovativetech.com', '555-888-8888', 30, '2023-12-01', '2024-05-31', 0),
(20, 30, 'Michael Jones', 'michael@example.com', '555-999-9999', 'Code Masters', 'XYZ Enterprises', 23456789, 'IT Consultant', 35, 12, 1, 6, 3, 'Code Masters is seeking an IT Consultant to provide expert advice and guidance on technology strategies. If you have a strong technical background and excellent communication skills, apply now!', 'careers@codemasters.com', '555-000-0000', 15, '2024-01-01', '2024-01-31', 0),
(21, 31, 'Veljko Bogdan', 'action@dr.com', '0654217454', 'TEST', 'TEST', 10000002, 'TEST', 1, 15, 1, 3, 3, 'TEST', 'action@dr.com', '0654217454', 30, '2023-06-05', '2023-06-28', 1),
(22, 41, 'Veljko Bogdan', 'action@dr.com', '0654217454', 'TEST', 'TEST', 10000003, 'TEST2', 4, 45, 1, 4, 2, 'TEST', 'action@dr.com', '0654217454', 30, '2023-06-19', '2023-06-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` date NOT NULL DEFAULT (curdate())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_message`, `sender_id`, `receiver_id`, `message`, `timestamp`) VALUES
(1, 31, 28, '<small>vtsveljkobogdan@gmail.com</small>: Hello', '2023-06-27'),
(2, 40, 27, '<small>qulodoctor@gmail.com</small>: sss', '2023-06-27'),
(3, 40, 0, '<small>qulodoctor@gmail.com</small>: a br na ne', '2023-06-27'),
(4, 31, 0, '<small>vtsveljkobogdan@gmail.com</small>: test', '2023-06-27'),
(5, 40, 0, '<small>qulodoctor@gmail.com</small>: a br a br', '2023-06-27'),
(6, 0, 40, '<small>test@gmail.com</small>: Eto', '2023-06-27'),
(7, 40, 0, '<small>qulodoctor@gmail.com</small>: when', '2023-06-27'),
(8, 40, 0, '<small>qulodoctor@gmail.com</small>: when the', '2023-06-27'),
(9, 40, 0, '<small>qulodoctor@gmail.com</small>: you at the', '2023-06-27'),
(10, 40, 0, '<small>qulodoctor@gmail.com</small>: wannaplay league now?', '2023-06-27'),
(11, 0, 40, '<small>test@gmail.com</small>: Nah', '2023-06-27'),
(12, 0, 40, '<small>test@gmail.com</small>: Moram uraditi ovu dokumentaciju', '2023-06-27'),
(13, 40, 0, '<small>qulodoctor@gmail.com</small>: wanna play league in 5 gours', '2023-06-27'),
(14, 0, 40, '<small>test@gmail.com</small>: I malo promeniti css', '2023-06-27'),
(15, 40, 0, '<small>qulodoctor@gmail.com</small>: ?internal bleedning', '2023-06-27'),
(16, 0, 40, '<small>test@gmail.com</small>: I nekako skontati kako da poruke izadju zaoprave', '2023-06-27'),
(17, 0, 40, '<small>test@gmail.com</small>: je', '2023-06-27'),
(18, 0, 40, '<small>test@gmail.com</small>: a vid sad ovo', '2023-06-27'),
(19, 40, 0, '<small>qulodoctor@gmail.com</small>: vidim', '2023-06-27'),
(20, 40, 0, '<small>test@gmail.com</small>: sta mi pises', '2023-06-27'),
(21, 40, 0, '<small>qulodoctor@gmail.com</small>: wtf', '2023-06-27'),
(22, 40, 0, '<small>test@gmail.com</small>: ja sa svog kompa pisem tvoje', '2023-06-27'),
(23, 40, 0, '<small>qulodoctor@gmail.com</small>: wtf', '2023-06-27'),
(24, 40, 0, '<small>qulodoctor@gmail.com</small>: sta', '2023-06-27'),
(25, 40, 0, '<small>qulodoctor@gmail.com</small>: sta', '2023-06-27'),
(26, 40, 0, '<small>qulodoctor@gmail.com</small>: se dogadja', '2023-06-27'),
(27, 40, 0, '<small>qulodoctor@gmail.com</small>: de', '2023-06-27'),
(28, 0, 40, '<small>test@gmail.com</small>: i sad se sve polomilo', '2023-06-27'),
(29, 31, 28, '<small>vtsveljkobogdan@gmail.com</small>: Hello', '2023-06-27'),
(30, 40, 0, '<small>qulodoctor@gmail.com</small>: a bar', '2023-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id_qualification` int NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
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
  `id_user` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(63) COLLATE utf8mb4_general_ci NOT NULL,
  `biography` text COLLATE utf8mb4_general_ci,
  `is_company` tinyint(1) DEFAULT '0',
  `company_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `verification_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `verification_status` int NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `telephone`, `biography`, `is_company`, `company_name`, `website`, `address`, `description`, `is_banned`, `verification_id`, `verification_status`, `is_admin`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', '$2y$10$u4jEftXYXW3aJXjEEqunZ.bqWzLz7xHdplwL9fZv9dpaxY3fR4v1e', '123456789', 'Biography of John Doe', 0, NULL, NULL, NULL, NULL, 0, 'fd3a9bcf8e917b0a', 1, 0),
(2, 'Jane', 'Smith', 'jane.smith@example.com', '$2y$10$ZMJkgGs/ywXq8jnyzmFzaOw7BSvvg6Z5KpY6Ud2eDhwExYBGiENZC', '987654321', 'Biography of Jane Smith', 0, NULL, NULL, NULL, NULL, 0, '62f4b310a129e8d2', 1, 0),
(3, 'Michael', 'Johnson', 'michael.johnson@example.com', '$2y$10$mJMBMmyXmtcW8ET1GdSJFe7eT5WXEhoHhnlJX00JGzIzPUycF4VtC', '555555555', 'Biography of Michael Johnson', 0, NULL, NULL, NULL, NULL, 0, '3b6d6f39e2a8c591', 1, 0),
(4, 'Emily', 'Brown', 'emily.brown@example.com', '$2y$10$U11KcZ5XoD5w/LdfBxL7z.MgZL5Gv7B98TCMXKwsjddwJk.gNHE0S', '111111111', 'Biography of Emily Brown', 0, NULL, NULL, NULL, NULL, 0, 'a5e2d4c1b98f7e63', 1, 0),
(5, 'David', 'Taylor', 'david.taylor@example.com', '$2y$10$tFXjsjCg7cqBuYAg9CFB9u8QWDrIRF7ZSkFAmFZ4ZCEhW08C0DDGm', '999999999', 'Biography of David Taylor', 0, NULL, NULL, NULL, NULL, 0, '8ed962f40cb7d9aa', 1, 0),
(6, 'Olivia', 'Davis', 'olivia.davis@example.com', '$2y$10$E2Wh3Y2ZQ2ZqEzdZOPxjdeO.W8Tefjwr.9Dz3E6TXPNekT6YloPFa', '222222222', 'Biography of Olivia Davis', 0, NULL, NULL, NULL, NULL, 0, '7a32d09b56fca41e', 1, 0),
(7, 'Daniel', 'Wilson', 'daniel.wilson@example.com', '$2y$10$ly0u5MyWZENs1LaUOotdJ.t2IlyA49iJXsbhq5w0ouOpk6WdXdyKq', '888888888', 'Biography of Daniel Wilson', 0, NULL, NULL, NULL, NULL, 0, 'dc24b5494f7c6639', 1, 0),
(8, 'Sophia', 'Anderson', 'sophia.anderson@example.com', '$2y$10$r7.HAIsHdsMVoz.G8t29Kue9JbzIQXzX.ZrDPedDvUg7ry.7m5iR6', '333333333', 'Biography of Sophia Anderson', 0, NULL, NULL, NULL, NULL, 0, 'f0650a1b7e47dcdb', 1, 0),
(9, 'Matthew', 'Thomas', 'matthew.thomas@example.com', '$2y$10$CEknQHDuRys.7jdb3L9u6.6gUzZ08v7hDrDnq3Wbmc.P6Dj2q/Y7G', '777777777', 'Biography of Matthew Thomas', 0, NULL, NULL, NULL, NULL, 0, '6e62d5e3cbe7c69c', 1, 0),
(10, 'Ava', 'Martinez', 'ava.martinez@example.com', '$2y$10$gCyRtFR8i8OlIfahcRar9uH3tEgF9EpBtY0nCUXMawHKCxgucRCd.', '444444444', 'Biography of Ava Martinez', 0, NULL, NULL, NULL, NULL, 0, '45a1cc571e7d94c5', 1, 0),
(11, 'Jacob', 'Hernandez', 'jacob.hernandez@example.com', '$2y$10$HBJMlJeXaMe./wJn2POqu.TnYv5fsLhP9iG8.ZMLM6TV4W.A0D2Se', '666666666', 'Biography of Jacob Hernandez', 0, NULL, NULL, NULL, NULL, 0, 'dd047c8f08ea9b3e', 1, 0),
(12, 'Mia', 'Lopez', 'mia.lopez@example.com', '$2y$10$8mDEar.PD/BGo55Y0LZdIu9hgpWQv/LjY7FXt4aO26OxZQ7A9vHP2', '555555555', 'Biography of Mia Lopez', 0, NULL, NULL, NULL, NULL, 0, '9e96da4c9b3d6ab1', 1, 0),
(13, 'William', 'Gonzalez', 'william.gonzalez@example.com', '$2y$10$5exNpSMqE3nFqoA5pVr6mevQeGwJ.9WsgDTRc7tnUm.LBn3j0c3aC', '444444444', 'Biography of William Gonzalez', 0, NULL, NULL, NULL, NULL, 0, '4d3e7c8587f520ef', 1, 0),
(14, 'Charlotte', 'Rodriguez', 'charlotte.rodriguez@example.com', '$2y$10$6Bt0F9aStMVVgDRpW1GRQe5nqN7fzN/Bqvh94HnI8X1zP5BpG5Jc6', '333333333', 'Biography of Charlotte Rodriguez', 0, NULL, NULL, NULL, NULL, 0, '53d73310255dcd99', 1, 0),
(15, 'James', 'Lee', 'james.lee@example.com', '$2y$10$OJyLAXfG5NrHJvBJohbK/.7kCxZIxd1OTX6sM5SmL4m0zkoV5mbGW', '222222222', 'Biography of James Lee', 0, NULL, NULL, NULL, NULL, 0, '12f9b2ef0aecd37e', 1, 0),
(16, 'Amelia', 'Walker', 'amelia.walker@example.com', '$2y$10$.8cfONRg6Me.bU3Fj8Ml4e4dH8JIpPCoZq4NkaeYRnoVqA7DQ/Sl2', '111111111', 'Biography of Amelia Walker', 0, NULL, NULL, NULL, NULL, 0, '802b46a97d2a53b7', 1, 0),
(17, 'Benjamin', 'Hall', 'benjamin.hall@example.com', '$2y$10$aN6vG1kqjZI3aHgCZa/0UObOOPGzxMeA8Y5HhSarQr9bNGUCyqG1K', '999999999', 'Biography of Benjamin Hall', 0, NULL, NULL, NULL, NULL, 0, '68ef08a0c5a4c1a0', 1, 0),
(18, 'Evelyn', 'Young', 'evelyn.young@example.com', '$2y$10$3rkkqsAy3Jlmz0TfeDvsf.yd9sXg5i3RUBoM.7g.u8z3sKJ4iF7Ui', '888888888', 'Biography of Evelyn Young', 0, NULL, NULL, NULL, NULL, 0, '8f5ce4dc17a9a1d5', 1, 0),
(19, 'Alexander', 'Lopez', 'alexander.lopez@example.com', '$2y$10$FsRRuGQuTdEiCzXGyZf84epALpQjBqhz74jHZBr6rWgxiTzN9P1qK', '777777777', 'Biography of Alexander Lopez', 0, NULL, NULL, NULL, NULL, 0, 'de69e876a271a301', 1, 0),
(20, 'Sofia', 'Hernandez', 'sofia.hernandez@example.com', '$2y$10$snPqff8gCh2i/jXMyVPUxej9NIFvdEx9j.aRhTtDxqNfo.Zif9fjm', '666666666', 'Biography of Sofia Hernandez', 0, NULL, NULL, NULL, NULL, 0, '3dade58d70f2cb01', 1, 0),
(21, 'Joseph', 'Garcia', 'joseph.garcia@example.com', '$2y$10$C3qMFqC.jFBM7yAQbsx8O.pGfgddNlZ5eXWZab/wlpOEY4dF2rErW', '555555555', 'Biography of Joseph Garcia', 0, NULL, NULL, NULL, NULL, 0, '994034c1dd65d37c', 1, 0),
(22, 'Victoria', 'Martinez', 'victoria.martinez@example.com', '$2y$10$tFTgIKx2xdsHg32e7fCVheFECcsnu/rMoXMSOOQIb0.Sq6sHSo3XW', '444444444', 'Biography of Victoria Martinez', 0, NULL, NULL, NULL, NULL, 0, 'f8b6debf127dd6d7', 1, 0),
(23, 'Henry', 'Hernandez', 'henry.hernandez@example.com', '$2y$10$X0HEIqFWK4Hfy8tx6.UVhOZeqy4N7dc0s.2d7ZM8zP8oUwtv2jCTu', '333333333', 'Biography of Henry Hernandez', 0, NULL, NULL, NULL, NULL, 0, '274fa56497d43d2d', 1, 0),
(24, 'Lily', 'Clark', 'lily.clark@example.com', '$2y$10$CQYD41BzkUzryCmubnLUSubAr6uCyqKl.vJ79QIKmfZAFppI9yYie', '222222222', 'Biography of Lily Clark', 0, NULL, NULL, NULL, NULL, 0, 'cb5739a129f2071b', 1, 0),
(25, 'Christopher', 'Baker', 'christopher.baker@example.com', '$2y$10$X3CnD1KT4JKtak5/e9TjWOHyMr2b1MyQ6DMjZC.tUp5c6sjHJLgxi', '111111111', 'Biography of Christopher Baker', 0, NULL, NULL, NULL, NULL, 0, 'a6e4b97d94e80373', 1, 0),
(26, 'Company1', 'Smith', 'company1@example.com', '$2y$10$i1Hwphwn4M7ekD4JF7rbl.MJQ/TmvW2Jk9JQXIZ2p3FJf3Q0szFJ6', '555555555', NULL, 1, 'ABC Company', 'www.abccompany.com', '123 Main Street', 'ABC Company specializes in software development.', 0, 'f17dc20297e3dd65', 1, 0),
(27, 'Company2', 'Johnson', 'company2@example.com', '$2y$10$JdTN4omH/0NpyG7D2pFQY.m8gVG6jxENFX2U43h5LjFyOmYhTjX.m', '444444444', NULL, 1, 'XYZ Corporation', 'www.xyzcorp.com', '456 Elm Street', 'XYZ Corporation is a leading provider of IT solutions.', 0, 'e9d18c0abcc41fc6', 1, 0),
(28, 'Company3', 'Williams', 'company3@example.com', '$2y$10$bpQ4g5/Fa2nzKF3oVTBhWO/XSKN5ZALHGsCS3eAV2AMRjtKN9r3Jy', '333333333', NULL, 1, '123 Industries', 'www.123industries.com', '789 Oak Street', '123 Industries offers manufacturing and engineering services.', 0, '192d84b14271e986', 1, 0),
(29, 'Company4', 'Brown', 'company4@example.com', '$2y$10$bx.YvfcOmyBvsgYeBLNlM.KJHziqPvlJ29zZ6FS4LZu/KS0A4YOqO', '222222222', NULL, 1, 'Acme Corporation', 'www.acmecorp.com', '321 Pine Street', 'Acme Corporation is a global leader in product development.', 0, '3dfb781f9a78efef', 1, 0),
(30, 'Company5', 'Jones', 'company5@example.com', '$2y$10$Pd7Z.t9kBJm9L2Y8w8.KGeI1USG1Bc3yNo9xx2VPG7Et3ePCjM8bq', '111111111', NULL, 1, 'XYZ Enterprises', 'www.xyzent.com', '987 Cedar Street', 'XYZ Enterprises provides consulting and business solutions.', 0, 'c3e1be772eb6ad6c', 1, 0),
(31, 'Veljko', 'Bogdan', 'vtsveljkobogdan@gmail.com', '$2y$10$7MhMkmtnNRa9dwAeegu1DeLnph93wrn8Tl3aJaJvsH6q0TLPcOStu', '0654217454', 'This is my biography', 0, '', '', '', '', 0, '485f043ca88e50cd883ade4b3072d327', 1, 1),
(32, 'Veljko', 'Bogdan', 'koko5@gmail.com', '$2y$10$jvznPHHMIfNG7J5ldAn3l.73L4kWtDFMQDWNwp1owmosswXeMhyte', '0654217454', 'null', 0, '', '', '', '', 0, '4264e6de8f1c6b309efcb87ac83af1eb', 0, 0),
(33, 'Veljko', 'Bogdan', 'koko7@gmail.com', '$2y$10$UMAggLsmE8o9nH30x/pwa.MpCDaty8zDTuialwtPD.ks/23LzcsDG', '0654217454', 'null', 0, '', '', '', '', 0, 'ed437ce18e1260302c501ef964daf270', 0, 0),
(34, 'Veljko', 'Bogdan', 'koko8@gmail.com', '$2y$10$hib8C4DHZukMaaWo.7AjtOASaBDe2kmLxBgfYk4gla1kxbz9F9nhm', '0654217454', 'null', 0, '', '', '', '', 0, '30fceda54b91e8ff5da459130875c9f1', 0, 0),
(35, 'Veljko', 'Bogdan', 'koko9@gmail.com', '$2y$10$qm45XfALELvQ5nlANDZCL.vZ8KkOngDTwPcMz4reOfIrhHg1QDzYa', '0654217454', 'null', 0, '', '', '', '', 0, '1c78c0a59ceec207c33754b29355eb17', 0, 0),
(36, 'Veljko', 'Bogdan', 'koko10@gmail.com', '$2y$10$Q0N.YQJPqhF9EVhKgK6PluBfOMUzqF/9PEhaGCAg8mT6JCgUwd7hC', '0654217454', 'null', 0, '', '', '', '', 0, '292558a56301113cd2df3849ff391cca', 0, 0),
(37, 'Veljko', 'Bogdan', '26121034@gmail.com', '$2y$10$KoMS/cb/vXWCRMm1aFttVOFtj5N7ob.H94NGqlsmRunvjMYn5FXFC', '0654217454', 'null', 0, '', '', '', '', 0, '954207330cb194fa5d3c9f075a19bb45', 0, 0),
(38, 'Veljko', 'Bogdan', 'vtsveljkobogdan@email.com', '$2y$10$ZOyehQvUobEBm.g9MKHOdOEqIo7JWnWaPyEeXUC0xbh72GOYY8vUC', '0654217454', 'null', 0, '', '', '', '', 0, '8095c133b2829167fe03b6b2963d20d7', 1, 0),
(39, 'Veljko', 'Bogdan', 'action@email.com', '$2y$10$fWHwoZbwZ4tAkbYiC7H5V.jQYxOZrEExWinUEFFOta9z/RZ4oTRd2', '0654217454', 'null', 0, '', '', '', '', 0, '4ac7d5c581773d9850ff919bf3e97f76', 1, 0),
(40, 'Vedrarn', 'Mercerp', 'qulodoctor@gmail.com', '$2y$10$bC3j0QH.z6rJKPzq2UalQ.GzP9SgSJZiQyH1puesfnPQp2NyxDUlO', '+38766239478', 'null', 0, '', '', '', '', 0, '519e8cbdd63ec1a73a8530b765f83d0c', 1, 0),
(41, 'Veljko', 'Bogdan', 'test@gmail.com', '$2y$10$Zm0YtjygsoTLxQLN8dyPtOSTpAkkh5aEz9MlpW6lcXE1rMTNezbIu', '0654217454', 'null', 1, 'TEST', 'TEST', 'TEST', 'TEST', 0, 'b3c0fc965e021e83b9d1c792a6d2faa4', 1, 0);

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
-- Indexes for table `employment_type`
--
ALTER TABLE `employment_type`
  ADD PRIMARY KEY (`id_employment_type`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `category` (`category`),
  ADD KEY `city` (`city`),
  ADD KEY `employment_type` (`employment_type`),
  ADD KEY `qualifications` (`qualifications`);

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
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id_city` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `employment_type`
--
ALTER TABLE `employment_type`
  MODIFY `id_employment_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id_qualification` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`city`) REFERENCES `cities` (`id_city`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`employment_type`) REFERENCES `employment_type` (`id_employment_type`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `jobs_ibfk_5` FOREIGN KEY (`qualifications`) REFERENCES `qualifications` (`id_qualification`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
