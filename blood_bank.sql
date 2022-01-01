-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 10:14 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `ID` int(3) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`ID`, `Username`, `Password`, `Description`) VALUES
(1, 'admin', 'admin', 'Administrator of project'),
(2, 'ved', 'v', 'ved');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_master`
--

CREATE TABLE `blood_bank_master` (
  `ID` int(6) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Country` varchar(25) NOT NULL,
  `Phone` varchar(35) NOT NULL,
  `Website` varchar(50) NOT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_bank_master`
--

INSERT INTO `blood_bank_master` (`ID`, `Email`, `Password`, `Name`, `Address`, `City`, `State`, `Country`, `Phone`, `Website`, `RegisterDate`, `Status`) VALUES
(1, 'mukesh.p@olwaysoftware.info', '123', 'Ved BB', 'Paldi', 'Ahmedabad', 'Gujarat', 'India', '98790890631', 'http://www.vedtechnology.com', '2019-04-09 09:15:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blood_storage_master`
--

CREATE TABLE `blood_storage_master` (
  `ID` int(6) NOT NULL,
  `BloodBankID` int(6) NOT NULL,
  `BloodGroup` varchar(20) NOT NULL,
  `Unit` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_storage_master`
--

INSERT INTO `blood_storage_master` (`ID`, `BloodBankID`, `BloodGroup`, `Unit`) VALUES
(2, 1, 'O+', 100),
(3, 1, 'O-', 100);

-- --------------------------------------------------------

--
-- Table structure for table `contact_master`
--

CREATE TABLE `contact_master` (
  `ID` int(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_master`
--

INSERT INTO `contact_master` (`ID`, `Name`, `Email`, `Message`) VALUES
(6, 'Anita Bankar', 'apbankar@ymail.com', 'I like your service! Please provide more features like mobile app etc.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_master`
--

CREATE TABLE `doctor_master` (
  `ID` int(5) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Country` varchar(25) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Degree` varchar(25) NOT NULL,
  `SpecialistFor` varchar(100) NOT NULL,
  `Experience` varchar(10) NOT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_master`
--

INSERT INTO `doctor_master` (`ID`, `Email`, `Password`, `Name`, `Address`, `City`, `State`, `Country`, `Phone`, `Degree`, `SpecialistFor`, `Experience`, `RegisterDate`, `Status`) VALUES
(1, 'mukesh.p@olwaysoftware1.info', '123', 'Dr. Mukesh Parmar', 'Saraspur-380018', 'Ahmedabad', 'Gujarat', 'India', '9879089063', 'M.S.', 'Suregery', '10 Yrs', '2019-07-30 08:15:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donor_master`
--

CREATE TABLE `donor_master` (
  `ID` int(5) NOT NULL,
  `BloodBankID` int(5) NOT NULL DEFAULT '0',
  `Name` varchar(30) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Country` varchar(25) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Weight` int(3) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `UpdateCode` varchar(50) NOT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_master`
--

INSERT INTO `donor_master` (`ID`, `BloodBankID`, `Name`, `Address`, `City`, `State`, `Country`, `Phone`, `Email`, `Age`, `Weight`, `BloodGroup`, `UpdateCode`, `RegisterDate`, `Status`) VALUES
(5, 1, 'Kaushik Parmar', 'Bapunagar', 'Ahmedabad', 'Gujarat', 'India', '9825087007', 'kaushik15482@gmail.com', 35, 70, 'A+', '123456789', '2017-03-06 05:00:12', 1),
(8, 1, 'Kaushal Patel', 'Nikol', 'Ahmedabad', 'Gujarat', 'India', '98799566333', 'kaushalpatel@gmail.com', 33, 60, 'B+', '4879-06032017-134867', '2017-03-06 05:57:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `health_article_master`
--

CREATE TABLE `health_article_master` (
  `ID` int(6) NOT NULL,
  `DoctorID` int(4) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `ArticleDetails` text NOT NULL,
  `ArticleDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_article_master`
--

INSERT INTO `health_article_master` (`ID`, `DoctorID`, `Title`, `ArticleDetails`, `ArticleDate`) VALUES
(1, 1, 'Test Health Article1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-30 08:22:12'),
(2, 1, 'Test Health Article2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-07-30 08:22:52'),
(6, 3, 'Test Article', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2019-08-03 09:11:10'),
(8, 3, 'Test Article1', '<p><strong>Test Article</strong></p>\r\n', '2019-08-06 09:44:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blood_bank_master`
--
ALTER TABLE `blood_bank_master`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blood_storage_master`
--
ALTER TABLE `blood_storage_master`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BloodBankID` (`BloodBankID`);

--
-- Indexes for table `contact_master`
--
ALTER TABLE `contact_master`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctor_master`
--
ALTER TABLE `doctor_master`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `donor_master`
--
ALTER TABLE `donor_master`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `health_article_master`
--
ALTER TABLE `health_article_master`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blood_bank_master`
--
ALTER TABLE `blood_bank_master`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blood_storage_master`
--
ALTER TABLE `blood_storage_master`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact_master`
--
ALTER TABLE `contact_master`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doctor_master`
--
ALTER TABLE `doctor_master`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `donor_master`
--
ALTER TABLE `donor_master`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `health_article_master`
--
ALTER TABLE `health_article_master`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
