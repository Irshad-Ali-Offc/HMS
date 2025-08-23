-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 07:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
-- Table structure for table `admin_patient`
--

CREATE TABLE `admin_patient` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `cnic` varchar(80) NOT NULL,
  `admit_date` date NOT NULL,
  `discharge_date` date NOT NULL,
  `ward` varchar(80) NOT NULL,
  `bed` varchar(80) NOT NULL,
  `doctor_name` varchar(80) NOT NULL,
  `notes` text NOT NULL,
  `status` varchar(80) NOT NULL,
  `discharge_status` varchar(80) NOT NULL,
  `discharge_summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_patient`
--

INSERT INTO `admin_patient` (`id`, `name`, `cnic`, `admit_date`, `discharge_date`, `ward`, `bed`, `doctor_name`, `notes`, `status`, `discharge_status`, `discharge_summary`) VALUES
(1, 'Muhammad Waseem', '31202-3171958-6', '2025-06-23', '2025-06-24', 'general', '14', 'Dr Junaid Shafiq', 'Patient admitted', 'discharge', 'recovered', 'Patient recovered'),
(2, 'Usama Tariq', '45105-2178121-7', '2025-07-20', '0000-00-00', 'general', '14', 'Dr Junaid Shafiq', 'Patient admitted!', 'admit', '', '');

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
(12, 9, 3, 'Muhammad Zeeshan', '2025-02-26', '2025-02-26', '00:35:00', 2000, 'pay_Q03wOOs7hpLOcg', 'Complete', 'Accept'),
(13, 11, 3, 'Muhammad Zeeshan', '2025-02-27', '2025-02-28', '00:19:00', 2000, 'pay_Q0lWovjv6D8tqL', 'Complete', 'Pending'),
(14, 11, 3, 'Muhammad Zeeshan', '2025-02-27', '2025-03-01', '10:32:00', 2000, 'pay_Q0lgvqt60A21W2', 'Complete', 'Accept'),
(15, 11, 12, 'Usama Tariq', '2025-02-27', '2025-02-27', '00:42:00', 2000, 'pay_Q0mroJsi2Ncluk', 'Complete', 'Accept'),
(16, 2, 3, 'Muhammad Zeeshan ali khanhj', '2025-04-25', '2025-05-03', '17:32:00', 2000, 'pay_QNH2PGrtZSr2DH', 'Complete', 'Accept'),
(17, 2, 3, 'Muhammad Zeeshan ali khanhj', '2025-04-26', '2025-05-03', '17:39:00', 2000, 'pay_QNiyNEG9KZModb', 'Complete', 'Accept'),
(18, 2, 3, 'Muhammad Zeeshan ali khanhj', '2025-04-27', '2025-05-03', '10:04:00', 0, '', 'Complete', 'Reject'),
(19, 7, 3, 'Muhammad Zeeshan ali khanhj', '2025-04-27', '2025-05-03', '11:05:00', 0, '', 'Complete', 'Pending'),
(20, 10, 3, 'Muhammad Zeeshan ali khan', '2025-04-29', '2025-05-03', '03:36:00', 2500, '', 'Pending', 'Pending'),
(21, 6, 3, 'Muhammad Zeeshan ali khan', '2025-05-03', '2025-06-27', '02:12:00', 2500, 'pay_QQJoH2lfM88ncT', 'Complete', 'Accept'),
(22, 6, 15, 'ali', '2025-05-03', '2025-05-03', '11:12:00', 2500, 'pay_QQJuU6uN21tUU9', 'Complete', 'Accept'),
(23, 2, 3, 'Muhammad Zeeshan ali khan', '2025-05-03', '2025-05-04', '13:15:00', 2000, '', 'Pending', 'Pending'),
(24, 6, 2, 'Sidra Batool', '2025-06-23', '2025-06-25', '10:00:00', 2500, '', 'Complete', 'Pending'),
(25, 11, 3, 'Muhammad Zeeshan ali khan', '2025-07-19', '2025-07-23', '14:00:00', 2000, '', 'Pending', 'Pending'),
(26, 10, 3, 'Muhammad Zeeshan ali khan', '2025-07-19', '2025-07-31', '10:00:00', 2500, '', 'Pending', 'Pending'),
(27, 9, 3, 'Muhammad Zeeshan ali khan', '2025-07-19', '2025-07-31', '08:00:00', 2000, 'T20250719211808', 'Complete', 'Pending'),
(28, 11, 3, 'Muhammad Zeeshan ali khan', '2025-07-19', '2025-08-09', '18:00:00', 2000, 'T20250719212129', 'Complete', 'Pending'),
(29, 6, 7, 'Sidra Batool', '2025-07-19', '2025-07-20', '11:00:00', 2500, 'T20250719214223', 'Complete', 'Pending'),
(30, 2, 7, 'Sidra Batool', '2025-07-19', '2025-07-28', '13:00:00', 2000, 'T20250719215108', 'Complete', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `contact` varchar(80) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `instructions` text NOT NULL,
  `discount_type` varchar(80) NOT NULL,
  `discount_value` int(11) NOT NULL,
  `pay_method` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `total_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `name`, `age`, `contact`, `doctor_name`, `instructions`, `discount_type`, `discount_value`, `pay_method`, `date`, `total_bill`) VALUES
(1, 'Sidra Batool', 23, '03087328789', 'Dr. Junaid Shafiq', 'Some instructions...', 'percentage', 5, 'cash', '2025-07-20', 279);

-- --------------------------------------------------------

--
-- Table structure for table `billing_detail`
--

CREATE TABLE `billing_detail` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `medication_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_detail`
--

INSERT INTO `billing_detail` (`id`, `bill_id`, `medication_id`, `item_name`, `price`, `qty`) VALUES
(1, 1, 1, 'Paracetamol 500mg', 80, 2),
(2, 1, 2, 'Amoxicillin 250mg/5ml Suspension', 120, 1);

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
(2, 6, 2, 'Dentist, Obstetrician', 'MBBS, MCPS, MRCOG (UK), FRCOG (UK)', '20 Years', 'Senior Consultant', 2500, 'Female', '03049834989', 'Suite No. 3 Cantt Board Plaza Adjacent To The Mall Of Lahore Tufail Road, Lahore', 'expressive-young-woman-posing-studio.jpg', '<h3><strong>Experience</strong></h3><p>Dr. Sadia Sarwar has over 23 years of experience in her field.</p><p>&nbsp;</p><h3><strong>Professional memberships</strong></h3><ul><li>Pakistan Medical Comission (PMC)</li><li>&nbsp;</li></ul><h3><strong>About Dr. Sadia Sarwar</strong></h3><p>Dr. Sadia Sarwar is an Dentist practicing in Lahore. She graduated from King Edward Medical University in 1995. Later she earned her postgraduate degrees i.e MCPS and MRCOG (England). Dr. Sadia has work experience both in Pakistan and abroad. She is currently working as Assistant Professor in CMC Lahore. You can book an appointment through Oladoc!</p>'),
(4, 8, 3, 'Cosmetic Dentistry, Joint Replacement', 'MBBS, FCPS, MCPS, MD, MS', '8 years', 'Consultant', 2000, 'Male', '+923001234567', '123 Main Boulevard, Lahore, Punjab, Pakistan', 'PIC.jpg', '<p>Dr.Mehtab is a renowned orthopedic surgeon with over 8 years of experience in joint replacement surgeries. He has worked at leading hospitals in Lahore.</p>'),
(5, 9, 3, 'Joint Replacement Specialist', 'MBBS, FCPS (Ortho)', '10 years', 'Senior Consultant', 2000, 'Female', '03219876543', '456 Ortho Care, DHA Phase 5, Karachi', 'beautiful-young-female-doctor-looking-camera-office.jpg', '<p>Ayesha Khan is a highly skilled orthopedic surgeon specializing in joint replacement surgeries. With over 10 years of experience, she has successfully performed numerous complex procedures</p>'),
(6, 10, 1, 'Cosmetologist, Acne Specialist', 'MBBS, MCPS (Dermatology)', '8 Years', 'Consultant', 2500, 'Female', '03001234567', '123 Skin Care Center, Gulberg, Lahore', 'expressive-young-woman-posing-studio.jpg', '<p>Dr. Malaika is a skilled dermatologist specializing in cosmetic treatments and acne management. With over 8 years of experience, he is dedicated to providing effective and personalized care to his patients</p>'),
(7, 11, 2, 'Cosmetic & Restorative Dentist', 'BDS, MDS (Prosthodontics)', '8 Years', 'Senior Dentist', 2000, 'Male', '+92 300 6789012', 'F-7, Islamabad, Pakistan', 'young-handsome-physician-medical-robe-with-stethoscope.jpg', '<p>Dr. Usama Tariq is an expert in braces, Invisalign, and jaw alignment treatments, helping patients achieve a perfect smile with advanced orthodontic care.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `dosage` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `form` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `lot_number` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  `threshold` varchar(100) NOT NULL,
  `instructions` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `name`, `price`, `dosage`, `category`, `form`, `quantity`, `supplier`, `lot_number`, `expiry_date`, `threshold`, `instructions`, `notes`) VALUES
(1, 'Paracetamol 500mg', 80, '500mg (Take 1 tablet every 6 hours if needed for pain or fever)', 'antibiotic', 'tablet', 93, 'MedPak Pharmaceuticals', 'PARA-B23103', '2026-06-18', '15', 'Store below 25C, protect from light and moisture', 'Do not exceed 4g per day; suitable for adults and children over 12 years'),
(2, 'Amoxicillin 250mg/5ml Suspension', 120, '5ml every 8 hours for 5-7 days (or as directed)', 'antibiotic', 'other', 54, 'HealWell Pharma', 'AMOX-S20254', '2025-10-04', '20', 'Store in refrigerator after reconstitution; discard after 7 days\r\n\r\n', 'Shake well before use; not for patients with penicillin allergy');

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
(1, 3, '2006-02-10', 'Male', '12345-6789876-5', 'House No 3# Johar Town', '03245676235', 'zeeshan1790@gmail.com'),
(2, 7, '2002-02-08', 'Female', '8130254563458', 'House no. 108, Block A1, Gulberg III', '03087328789', 'sidra341@gmail.com'),
(3, 12, '2000-12-12', 'Male', '45105-2178121-7', 'lahore', '+923122121131', 'usamatariq@gmail.com'),
(4, 12, '2000-12-12', 'Male', '4510521781217', 'lahore', '+923122121131', 'usamatariq@gmail.com'),
(5, 15, '2025-04-27', 'Male', '45677-7766667-4', 'gujranwala', '03319979262', 'azeem_rashid@yahoo.com'),
(6, 21, '2025-06-28', 'male', '48230-8823983-0', 'sdf', '03097628377', 'sdf@gmail.com');

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
(1, 4, 3, 2, 'BP 110/70\r\nPulse 88/ Min\r\nWeight 79', 'CBC', 'Meat', 'Aspirin 500 mg (Twice a day)\nParacetamol 250 mg (Once a day)', '2025-02-15'),
(2, 17, 3, 2, '', '', '', 'risik 10mg\r\nbiosilp 10mg\r\nfolic acid 10mg\r\n', '2025-04-30'),
(3, 21, 3, 6, '', '', '', 'panadol', '2025-05-04');

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
(1, 'Irshad Ali', 'Admin', '12345', 'admin'),
(2, 'Dr. Munazza Zahoor', 'drmunaza809', '12345', 'doctor'),
(3, 'Muhammad Zeeshan ali khan', 'patient', '12345', 'patient'),
(6, 'Dr. Sadia Sarwar', 'sadia', '123456', 'doctor'),
(7, 'Sidra Batool', 'sidra123', '12345', 'patient'),
(8, 'Dr. Mehtab Ali', 'mehtab', '12345', 'doctor'),
(9, 'Dr.Ayesha Khan', 'ayesha123', '12345', 'doctor'),
(10, 'Dr. Malaika', 'shoaib123', '12345', 'doctor'),
(11, 'Dr. Hamza Rafiq', 'hamza', '12345', 'doctor'),
(12, 'Usama Tariq', 'usama', '12345', 'patient'),
(14, 'Usama Tariq', 'tariq', '12345', 'patient'),
(15, 'ali', 'ali', '12345', 'patient'),
(16, 'ali ahmed', 'ahmed', '12345', 'patient'),
(17, 'Ibtihaj', '1234', '1234', 'patient'),
(18, 'Haseeb Ahmad', 'haseeb2342', '123456', 'pharmacist'),
(21, 'tet', 'sdf', 'sdf', 'patient'),
(22, 'Samiullah', 'samiullah324', '12345', 'receptionist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_patient`
--
ALTER TABLE `admin_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_detail`
--
ALTER TABLE `billing_detail`
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
-- Indexes for table `medication`
--
ALTER TABLE `medication`
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
-- AUTO_INCREMENT for table `admin_patient`
--
ALTER TABLE `admin_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_detail`
--
ALTER TABLE `billing_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
