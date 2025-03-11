-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 06:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(80) NOT NULL,
  `added_on` date NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `fee` int(11) NOT NULL,
  `payment_id` varchar(80) NOT NULL,
  `pay_status` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctor_id`, `patient_id`, `patient_name`, `added_on`, `date`, `time`, `fee`, `payment_id`, `pay_status`, `status`) VALUES
(2, 6, 3, 'Muhammad Zeeshan', '2025-02-07', '2025-02-12', '12:00:00', 2500, 'pay_PsniV56T9zeizF', 'Complete', 'Accept'),
(4, 2, 3, 'Muhammad Zeeshan', '2025-02-08', '2025-02-08', '16:00:00', 2000, 'pay_PtBeTZyWdqSv8x', 'Complete', 'Accept'),
(5, 2, 7, 'Sidra Batool', '2025-02-08', '2025-02-08', '16:30:00', 2000, 'pay_PtC4HGQgS6SoZu', 'Complete', 'Accept'),
(6, 6, 3, 'Muhammad Zeeshan', '2025-02-09', '2025-02-09', '09:00:00', 2500, 'pay_PtUlwMYUQEVM8n', 'Complete', 'Cancel'),
(7, 1, 3, 'Muhammad Zeeshan', '2025-02-09', '2025-02-20', '16:00:00', 0, '', 'Complete', 'Pending'),
(8, 1, 7, 'Sidra Batool', '2025-02-09', '2025-03-06', '13:36:00', 0, '', 'Complete', 'Pending'),
(9, 2, 7, 'Sidra Batool', '2025-02-12', '2025-02-12', '03:57:00', 2000, '', 'Pending', 'Pending'),
(10, 2, 3, 'Muhammad Zeeshan', '2025-02-13', '2025-02-13', '02:57:00', 2000, '', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(80) NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_name`, `image`) VALUES
(1, 'Gynecologist', 'gynecologist.png'),
(2, 'Dentist', 'dentist.png'),
(3, 'Orthopedic Surgeon', 'orthopedic-surgeon.png'),
(5, 'Dermatologist', 'skin-specialist.png');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `specialization` varchar(80) NOT NULL,
  `qualification` varchar(80) NOT NULL,
  `experience` varchar(80) NOT NULL,
  `designation` varchar(80) NOT NULL,
  `fee` int(11) NOT NULL,
  `gender` varchar(80) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `image` varchar(80) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `user_id`, `dep_id`, `specialization`, `qualification`, `experience`, `designation`, `fee`, `gender`, `contact`, `address`, `image`, `about`) VALUES
(1, 2, 1, 'Dermatologist, Cosmetologist', 'M.B.B.S, M.C.P.S (Derma)', '8 Years', 'Senior Consultant', 2000, 'Female', '03049834989', 'House No #14 Street 4 Area Ali Town Lahore', 'female doctor.png', '<h3><strong>About Dr. Munazza Zahoor</strong></h3><p>Dr. Munazza Zahoor is a Dermatologist with 8 years of experience currently available at Online Video Consultation, Multan. You can book an in-person appointment or an online video consultation with Dr. Munazza Zahoor through oladoc.com or by calling at 0618048444.</p><p>&nbsp;</p><h4><strong>Experience</strong></h4><p>Dr. Munazza Zahoor has over 8 years of experience in her field.</p><p>&nbsp;</p><h4><strong>Qualifications</strong></h4><p>Dr. Munazza Zahoor has the following qualifications:</p><p>M.B.B.S</p><p>M.C.P.S (Derma)</p><p>&nbsp;</p><h4><strong>Services Offered</strong></h4><p>Following are some of the services offered by Dr. Munazza Zahoor:</p><ul><li>Acne Treatment</li><li>Alopecia</li><li>Antihistamine Treatment</li><li>Boil</li><li>Chemical Peel</li><li>&nbsp;</li></ul><h4><strong>Conditions Treated</strong></h4><p>Following are some of the conditions treated by Dr. Munazza Zahoor:</p><ul><li>Abscess</li><li>Acne</li><li>Acne Scars</li><li>Atopic Dermatitis (Eczema)</li><li>Eczema</li></ul>'),
(2, 6, 1, 'Gynecologist, Obstetrician', 'MBBS, MCPS, MRCOG (UK), FRCOG (UK)', '20 Years', 'Senior Consultant', 2500, 'Female', '03049834989', 'Suite No. 3 Cantt Board Plaza Adjacent To The Mall Of Lahore Tufail Road, Lahore', 'doctor sadia.png', '<h3><strong>Experience</strong></h3><p>Dr. Sadia Sarwar has over 23 years of experience in her field.</p><p>&nbsp;</p><h3><strong>Professional memberships</strong></h3><ul><li>Pakistan Medical Comission (PMC)</li><li>&nbsp;</li></ul><h3><strong>About Dr. Sadia Sarwar</strong></h3><p>Dr. Sadia Sarwar is an Obstetrician &amp; gynaecologist practicing in Lahore. She graduated from King Edward Medical University in 1995. Later she earned her postgraduate degrees i.e MCPS and MRCOG (England). Dr. Sadia has work experience both in Pakistan and abroad. She is currently working as Assistant Professor in CMC Lahore. You can book an appointment through Oladoc!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(80) NOT NULL,
  `cnic` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `user_id`, `dob`, `gender`, `cnic`, `address`, `contact`, `email`) VALUES
(1, 3, '2006-01-10', 'Male', '81302-3487239-7', 'House No 3# Johar Town', '0300989890', 'zeeshan1790@gmail.com'),
(2, 7, '2002-02-08', 'Female', '8130254563458', 'House no. 108, Block A1, Gulberg III', '03087328789', 'sidra341@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `vitals` text NOT NULL,
  `lab_investigation` text NOT NULL,
  `notes` text NOT NULL,
  `prescription` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `appointment_id`, `patient_id`, `doctor_id`, `vitals`, `lab_investigation`, `notes`, `prescription`, `date`) VALUES
(1, 4, 3, 2, 'BP 110/70\r\nPulse 88/ Min\r\nWeight 79', 'CBC', 'Meat', 'Aspirin 500 mg (Twice a day)\nParacetamol 250 mg (Once a day)', '2025-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `role` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Irshad Ali', 'irshad123', '12345', 'admin'),
(2, 'Dr. Munazza Zahoor', 'drmunaza809', '12345', 'doctor'),
(3, 'Muhammad Zeeshan', 'patient', '12345', 'patient'),
(6, 'Dr. Sadia Sarwar', 'drsadia718', '12345', 'doctor'),
(7, 'Sidra Batool', 'sidra123', '12345', 'patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
