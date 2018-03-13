-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 05:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrcdg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `acc_id` varchar(255) NOT NULL,
  `acc_user` varchar(255) NOT NULL,
  `acc_password` varchar(255) NOT NULL,
  `acc_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`acc_id`, `acc_user`, `acc_password`, `acc_status`) VALUES
('ACC-10000', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblbillofqnty`
--

CREATE TABLE `tblbillofqnty` (
  `boqID` int(11) NOT NULL,
  `boqItemNo` varchar(255) NOT NULL,
  `boqDesc` varchar(255) NOT NULL,
  `boqUnit` varchar(255) NOT NULL,
  `boqQnty` float NOT NULL,
  `boqUnitCost` float NOT NULL,
  `boqTotalCost` float NOT NULL,
  `projectCode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbillofqnty`
--

INSERT INTO `tblbillofqnty` (`boqID`, `boqItemNo`, `boqDesc`, `boqUnit`, `boqQnty`, `boqUnitCost`, `boqTotalCost`, `projectCode`) VALUES
(1, 'A.1.1(3)', 'Construction of Field Office for the Engineer', 'L.S.', 1, 82579.8, 82579.8, 'P-001'),
(2, 'B.4(10)', 'Misc Survey and Staking for School Building (include prep of as staked plan)', 'L.S.', 1, 44668.3, 44668.3, 'P-001'),
(3, 'B.5', 'Project Billboard', 'EACH', 2, 3783.78, 7567.56, 'P-001'),
(4, 'B.7', 'Construction Safety &amp; Health (include safety perimeter fence)', 'MOS.', 6.4, 25721.7, 164619, 'P-001'),
(5, 'B.9', 'Mobilization and Demobilization', 'L.S.', 1, 63000, 63000, 'P-001'),
(6, '801(1)', 'Removal of Structures and Obstruction', 'L.S.', 1, 583538, 583538, 'P-001'),
(7, '807(9)', 'Reconstruction of CHB Fence', 'SQ.M.', 43.13, 1228.5, 52985.2, 'P-001'),
(8, '803(1)', 'Structure Excavation', 'CU.M.', 1924.46, 240.27, 462390, 'P-001'),
(9, '103(5)', 'Shoring, Cribbing and other related works', 'L.S.', 1, 312059, 312059, 'P-001'),
(10, '804(1)a', 'Embankment (Backfilling of excavated materials)', 'CU.M.', 1559.06, 194.88, 303830, 'P-001'),
(11, 'TMP-001', 'Gravel Fill (Gravel Bedding @ CF, WF, TG, SOF)', 'CU.M.', 53.25, 1260.87, 67141.3, 'P-001'),
(12, 'TMP-002', 'Embankment', 'CU.M.', 451.19, 723.09, 326251, 'P-001'),
(13, 'TMP-003', 'Termite Control Work (Soil Poisoning)', 'SQ.M.', 754, 134.52, 101428, 'P-001'),
(14, 'TMP-004', 'Unreadable Description 1', 'KG.', 161576, 58.83, 9505510, 'P-001'),
(15, 'TMP-005', 'Unreadable Description 2', 'CU.M.', 919.35, 7856.87, 7223210, 'P-001'),
(16, 'TMP-006', 'Unreadable Description 3', 'KG.', 16997.8, 72.9, 1239140, 'P-001'),
(17, 'HFAER', 'pantutuy', 'ER', 235.67, 1, 235.67, 'P-002'),
(50, 'asd', 'asd', 'sad', 2, 3, 6, 'P-001'),
(51, 'a23', 'sdfsdf', '3', 4, 24, 96, 'a12'),
(52, 'asdf', '4df', '3', 5, 23, 115, 'a12'),
(53, 'adfsdfsdfsdf', 'dff', '4', 3, 5, 15, 'a12'),
(54, '1', '1', '1', 1, 1, 1, '1'),
(55, '1', '1', '1', 1, 1, 1, '1'),
(56, '1', '1', '1', 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblchangelogs`
--

CREATE TABLE `tblchangelogs` (
  `cl_id` int(11) NOT NULL,
  `cl_type` varchar(255) NOT NULL,
  `cl_action` varchar(255) NOT NULL,
  `cl_datetime` datetime NOT NULL,
  `cl_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblindividual`
--

CREATE TABLE `tblindividual` (
  `individual_ID` varchar(255) NOT NULL,
  `boqID` int(11) NOT NULL,
  `subconID` varchar(255) DEFAULT NULL,
  `subconTYPE` varchar(255) DEFAULT NULL,
  `individual_QNTY` double NOT NULL,
  `individual_PARTICULARS` varchar(255) NOT NULL,
  `individual_UNITCOST` double NOT NULL,
  `individual_AMOUNT` double NOT NULL,
  `individual_SUPPLIER` varchar(255) NOT NULL,
  `w_ID` varchar(255) NOT NULL,
  `individual_STATUS` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblindividual`
--

INSERT INTO `tblindividual` (`individual_ID`, `boqID`, `subconID`, `subconTYPE`, `individual_QNTY`, `individual_PARTICULARS`, `individual_UNITCOST`, `individual_AMOUNT`, `individual_SUPPLIER`, `w_ID`, `individual_STATUS`) VALUES
('Ind-10001', 2, 'SC-10004', 'Labor', 2, 'Hollow Blocks', 4, 8, 'dsaf', 'W-10002', 1),
('Ind-10002', 2, '', '', 3, 'asd', 4, 12, 'df', 'W-10006', 1),
('Ind-10003', 2, 'SC-10000', 'Labor', 3, 'fasd', 4, 12, 'afd', 'W-10007', 1),
('Ind-10004', 4, '', '', 323, 'adsf', 44, 14212, 'sdf', 'W-10008', 1),
('Ind-10005', 2, '', '', 5, 'Materials', 5500, 27500, 'garp', 'W-10010', 1),
('Ind-10006', 4, '', '', 10, 'Equips', 20.5, 205, 'ace', 'W-10010', 1),
('Ind-10007', 17, '', '', 34, 'accccccc', 23, 782, 'addddd', 'W-10011', 1),
('Ind-10008', 17, 'SC-10002', 'Materials', 23, 'Ga', 2, 46, 'as', 'W-10012', 1),
('Ind-10009', 4, '', '', 23, 'asd', 3, 69, 'fsd', 'W-10026', 1),
('Ind-10010', 2, 'SC-10001', 'Labor', 2, 'asd', 3, 6, 'asd', 'W-10027', 1),
('Ind-10011', 17, 'SC-10003', 'Materials', 2, 'asd', 3231, 6462, 'asd', 'W-10028', 1),
('Ind-10012', 3, '', '', 4, 'sgdf', 3, 12, 'fsdgfdsg', 'W-10029', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproject`
--

CREATE TABLE `tblproject` (
  `projectID` int(11) NOT NULL,
  `projectCode` varchar(255) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `projectCost` float NOT NULL,
  `MaterialCost` double NOT NULL DEFAULT '0',
  `EquipmentCost` double NOT NULL DEFAULT '0',
  `LaborCost` double NOT NULL DEFAULT '0',
  `projectEngr` varchar(255) NOT NULL,
  `projectStatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproject`
--

INSERT INTO `tblproject` (`projectID`, `projectCode`, `projectName`, `projectCost`, `MaterialCost`, `EquipmentCost`, `LaborCost`, `projectEngr`, `projectStatus`) VALUES
(1, 'P-001', 'Construction of Ayala National Highschool', 5005, 23, 251003, 354, 'Engr Rovelyn Jr.', 1),
(2, 'P-002', 'Test', 2345, 0, 0, 0, 'adfasdf', 1),
(3, 'a12', 'New project', 5000000, 0, 0, 0, 'domz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcon`
--

CREATE TABLE `tblsubcon` (
  `subconID` varchar(255) NOT NULL,
  `projectCode` varchar(255) NOT NULL,
  `subconEngr` varchar(255) NOT NULL,
  `subconWork` varchar(255) NOT NULL,
  `subconConAmnt` double NOT NULL DEFAULT '0',
  `subconMatAmnt` double NOT NULL DEFAULT '0',
  `subconStatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcon`
--

INSERT INTO `tblsubcon` (`subconID`, `projectCode`, `subconEngr`, `subconWork`, `subconConAmnt`, `subconMatAmnt`, `subconStatus`) VALUES
('SC-10000', 'P-001', 'dfgfdg', 'hello', 4, 5, 1),
('SC-10001', 'P-001', 'asdf', 'this', 342, 234, 1),
('SC-10002', 'P-002', 'Patutuy', 'Nusabe yo', 2345, 0, 1),
('SC-10003', 'P-002', 'Patutuyz', 'Civil', 0, 3400, 1),
('SC-10004', 'P-001', 'asd', 'asdasd', 20, 20, 1),
('SC-10005', 'P-001', 'Tutuy', 'civil', 2323, 400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblwithdrawal`
--

CREATE TABLE `tblwithdrawal` (
  `w_ID` varchar(255) NOT NULL,
  `w_TYPE` int(11) NOT NULL,
  `projectCode` varchar(11) NOT NULL,
  `w_IndTYPE` varchar(255) NOT NULL,
  `w_totalAMNT` double NOT NULL,
  `w_Date` date NOT NULL,
  `w_Name` varchar(255) NOT NULL,
  `w_Description` text,
  `w_STATUS` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwithdrawal`
--

INSERT INTO `tblwithdrawal` (`w_ID`, `w_TYPE`, `projectCode`, `w_IndTYPE`, `w_totalAMNT`, `w_Date`, `w_Name`, `w_Description`, `w_STATUS`) VALUES
('W-10000', 1, 'P-001', '2', 0, '2017-07-21', '', NULL, 1),
('W-10001', 1, 'P-001', '3', 0, '2017-07-01', '', NULL, 1),
('W-10002', 1, 'P-001', '4', 8, '2017-05-31', 'Dominic Rey E. AcuÃ±a', NULL, 1),
('W-10003', 1, 'P-001', '2', 128, '2017-06-30', 'adsf', NULL, 1),
('W-10004', 1, 'P-001', '2', 6, '2017-07-06', 'sdaf', NULL, 1),
('W-10005', 1, 'P-001', '1', 5, '2017-06-27', 'asdf', NULL, 1),
('W-10006', 1, 'P-001', '2', 12, '2017-06-28', 'asdasd', NULL, 1),
('W-10007', 1, 'P-001', '4', 12, '2017-07-06', 'sdf', 'ffjhgjhgjghjhj', 1),
('W-10008', 1, 'P-001', '2', 14212, '2017-07-14', 'asdf', NULL, 1),
('W-10009', 2, 'P-001', '6', 1599, '2017-07-13', '3453e45', 'fdsgsfdgfdgsdfg', 1),
('W-10010', 1, 'P-001', '3', 27705, '2017-07-20', 'jan', NULL, 1),
('W-10011', 1, 'P-002', '2', 782, '2017-07-31', 'sa', NULL, 1),
('W-10012', 1, 'P-002', '4', 46, '2017-07-31', 'Jonathan', NULL, 1),
('W-10013', 1, 'P-001', '2', 8, '2017-08-01', 'asd', NULL, 1),
('W-10025', 1, 'P-001', '1', 6, '2017-07-30', 'sad', NULL, 1),
('W-10026', 1, 'P-001', '3', 69, '2017-07-31', 'asd', NULL, 1),
('W-10027', 1, 'P-001', '4', 6, '2017-07-31', 'asd', 'sdfgfdhfghfgh', 1),
('W-10028', 1, 'P-002', '4', 6462, '2017-07-25', 'asd', 'vcxzvzxcvzcxv', 1),
('W-10029', 1, 'P-001', '3', 12, '2017-11-09', 'gfdg', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tblbillofqnty`
--
ALTER TABLE `tblbillofqnty`
  ADD PRIMARY KEY (`boqID`);

--
-- Indexes for table `tblchangelogs`
--
ALTER TABLE `tblchangelogs`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `tblindividual`
--
ALTER TABLE `tblindividual`
  ADD PRIMARY KEY (`individual_ID`);

--
-- Indexes for table `tblproject`
--
ALTER TABLE `tblproject`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `tblsubcon`
--
ALTER TABLE `tblsubcon`
  ADD PRIMARY KEY (`subconID`);

--
-- Indexes for table `tblwithdrawal`
--
ALTER TABLE `tblwithdrawal`
  ADD PRIMARY KEY (`w_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbillofqnty`
--
ALTER TABLE `tblbillofqnty`
  MODIFY `boqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tblchangelogs`
--
ALTER TABLE `tblchangelogs`
  MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblproject`
--
ALTER TABLE `tblproject`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
