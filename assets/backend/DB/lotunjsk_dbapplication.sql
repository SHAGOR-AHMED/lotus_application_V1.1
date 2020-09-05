-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2019 at 11:49 PM
-- Server version: 10.1.37-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lotunjsk_dbapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_sms`
--

CREATE TABLE `group_sms` (
  `id` int(11) NOT NULL,
  `receipent_type` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_sms`
--

INSERT INTO `group_sms` (`id`, `receipent_type`, `mobile`, `message`, `created_by`, `created_datetime`) VALUES
(1, 1, '881829159616', 'qwedqsasadasdas', 8, '2014-07-24 04:32:19'),
(4, 1, '881829159616', 'QASDASDCASDSAD', 8, '2014-07-24 04:33:55'),
(30, 1, '8801766535513', 'hi', 13, '2018-05-16 16:41:01'),
(31, 1, '8801814944730', 'hi', 13, '2018-05-16 16:41:01'),
(33, 2, '8801766535513', 'cgbdfgbv ', 13, '2018-05-16 18:00:39'),
(34, 2, '8801814944730', 'cgbdfgbv ', 13, '2018-05-16 18:00:39'),
(35, 1, '01814944730', 'b n bnvbnvn vbnh vgb', 13, '2018-12-04 18:09:26'),
(36, 1, '01865336889', 'b n bnvbnvn vbnh vgb', 13, '2018-12-04 18:09:26'),
(37, 1, '01515676354', 'b n bnvbnvn vbnh vgb', 13, '2018-12-04 18:09:26'),
(38, 1, '01947000015', 'b n bnvbnvn vbnh vgb', 13, '2018-12-04 18:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `sms_configuration`
--

CREATE TABLE `sms_configuration` (
  `id` int(11) NOT NULL,
  `sms_gateway` varchar(255) NOT NULL,
  `sms_user_name` varchar(255) NOT NULL,
  `sms_password` varchar(255) NOT NULL,
  `sms_port` varchar(255) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_configuration`
--

INSERT INTO `sms_configuration` (`id`, `sms_gateway`, `sms_user_name`, `sms_password`, `sms_port`, `updated_by`, `updated_datetime`) VALUES
(1, 'http://bmp.issl.com.bd/api/curl/', 'Ahmed Shagor', '', '8080', 8, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `specific_sms`
--

CREATE TABLE `specific_sms` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specific_sms`
--

INSERT INTO `specific_sms` (`id`, `reg_no`, `mobile_no`, `message`, `created_by`, `created_datetime`) VALUES
(1, '875005', '881829159616', 'lkfjlasd flkasdjfla sdfksdalkfj sldk;afjkldsfj ldsfkjasdlf lsad', 8, '2014-07-20 10:58:59'),
(3, '875005', '881829159616', 'asdfdsafdasf', 8, '2014-07-20 11:19:23'),
(4, '875005', '881829159616', ';lksdfjlksdajflkjasdklf', 8, '2014-07-20 11:23:45'),
(5, '875005', '881829159616', 'sisf daslfjlsdaf lkdsf', 8, '2014-07-20 11:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collection_expense`
--

CREATE TABLE `tbl_collection_expense` (
  `ce_id` int(3) NOT NULL,
  `date` varchar(15) NOT NULL,
  `amount` float NOT NULL,
  `purpose` text NOT NULL,
  `expense_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_collection_expense`
--

INSERT INTO `tbl_collection_expense` (`ce_id`, `date`, `amount`, `purpose`, `expense_by`) VALUES
(1, '01/01/2019', 3700, 'Handover to sir', 'Nawreen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_examination`
--

CREATE TABLE `tbl_examination` (
  `exam_id` int(3) NOT NULL,
  `date` varchar(10) NOT NULL,
  `member_id` int(3) NOT NULL,
  `reg_no` varchar(10) NOT NULL,
  `total_amount` float NOT NULL,
  `exam_fees` float NOT NULL,
  `purpose` text NOT NULL,
  `created_datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `expense_id` int(3) NOT NULL,
  `date` varchar(15) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `expense_by` varchar(15) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`expense_id`, `date`, `total_amount`, `purpose`, `expense_by`, `created_date`) VALUES
(1, '01/01/2019', 50, 'Photocopy', 'Nawreen', '2019-01-01 13:19:49'),
(2, '01/01/2019', 100, 'Office Decoration', 'Nawreen', '2019-01-01 13:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(3) NOT NULL,
  `feedback_purpose` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `feedback_by` varchar(32) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_purpose`, `message`, `feedback_by`, `created_date`) VALUES
(2, 'hostel off', 'hostel off deya hobe kobe?', 'Hostel Member', '2018-05-21 07:08:39'),
(3, 'nice system', 'apnader hostel system ta onk valo.', 'Guardian', '2018-05-21 09:17:56'),
(5, 'msg from guardian', 'hi i am guardian of solaman', 'Guardian', '2018-05-27 10:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_learner_fees`
--

CREATE TABLE `tbl_learner_fees` (
  `learner_id` int(3) NOT NULL,
  `member_id` varchar(55) NOT NULL,
  `reg_no` int(10) NOT NULL,
  `payment_date` varchar(15) NOT NULL,
  `total_amount` float NOT NULL,
  `total_paid` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `mem_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `reg_no` float NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `gardian_contact` varchar(20) NOT NULL,
  `g_address` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`mem_id`, `first_name`, `last_name`, `mobile`, `reg_no`, `address`, `father_name`, `mother_name`, `gardian_contact`, `g_address`, `photo`, `created_datetime`) VALUES
(4, 'Mehedi ', 'Hasan', '01742453467', 438, 'Wari', 'Mofijur Rahman', 'Golapi Begum', '1742453467', 'Fulbari, Kayemkola-7420,Jhikorgacha, Jessore.', './assets/backend/uploads/', '2019-01-01 08:02:35'),
(5, 'Atikur ', 'Rahman', '1811697492', 437, 'Gazipur, Muktar Tek Elaka, Chitbari.', 'Abdur Rahman', 'Khodeza Parvin', '1811697493', 'Dhala, Dhala, Trishal, Mymensing.', './assets/backend/uploads/', '2019-01-01 08:04:36'),
(6, 'Mazharul ', 'Islam', '1872969153', 440, 'House- Kha 21/A, Nikunja 2,, Khilkhet, Dhaka 1229.', 'Abdul Karim', 'Nil', '1872969151', 'Village- Bashali, PO- Khamargaon,P.S- Nardail,Dist- Mymensing . ', './assets/backend/uploads/', '2019-01-01 08:08:19'),
(7, 'Md. Abu Taher', 'Faysal', '1672744484', 441, '1/1, Din nath Sen Road, Gendariya.', 'Md Abdur rashid', 'Roksana Begum ', '1672744484', '7/A, SK Das Road, Gendariya. ', './assets/backend/uploads/', '2019-01-01 08:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_fees`
--

CREATE TABLE `tbl_member_fees` (
  `fees_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `payment_date` varchar(15) NOT NULL,
  `total_fees` float NOT NULL,
  `total_paid` float NOT NULL,
  `status` tinytext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member_fees`
--

INSERT INTO `tbl_member_fees` (`fees_id`, `member_id`, `payment_date`, `total_fees`, `total_paid`, `status`, `created_date`) VALUES
(1, 5, '01/01/2019', 500, 500, '1', '2019-01-02 04:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_subscription`
--

CREATE TABLE `tbl_member_subscription` (
  `subscription_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `reg_no` float NOT NULL,
  `payment_date` varchar(15) NOT NULL,
  `month` int(3) NOT NULL,
  `total_paid` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notices`
--

CREATE TABLE `tbl_notices` (
  `notice_id` int(3) NOT NULL,
  `purpose_notice` varchar(100) NOT NULL,
  `notices` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notices`
--

INSERT INTO `tbl_notices` (`notice_id`, `purpose_notice`, `notices`, `status`, `created_date`) VALUES
(1, 'Notice for pay your payment', 'Dear all members please pay your payment.\r\nThanks', 1, '2018-06-03 09:00:45'),
(2, 'কালকে সবার মিল বন্ধ থাকবে|', 'দুঃখিত কালকে মিল বন্ধ থাকবে সবার। দুঃখিত কালকে মিল বন্ধ থাকবে সবার।\r\nThanks', 0, '2018-11-29 08:35:30'),
(5, 'hello', 'test', 1, '2018-11-29 08:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `training_id` int(3) NOT NULL,
  `date` varchar(15) NOT NULL,
  `member_id` int(3) NOT NULL,
  `reg_no` int(10) NOT NULL,
  `remarks` text NOT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_training`
--

INSERT INTO `tbl_training` (`training_id`, `date`, `member_id`, `reg_no`, `remarks`, `created_datetime`) VALUES
(1, '01/01/2019', 4, 438, 'Fees Due (Ref Nur E Alam Sir)', '2019-01-01 13:14:31'),
(2, '01/01/2019', 6, 440, 'Paid', '2019-01-01 13:14:49'),
(3, '01/01/2019', 7, 441, 'Paid', '2019-01-01 13:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training_fees`
--

CREATE TABLE `tbl_training_fees` (
  `trainingfees_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `reg_no` varchar(15) NOT NULL,
  `payment_date` varchar(15) NOT NULL,
  `total_amount` float NOT NULL,
  `total_paid` float NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_training_fees`
--

INSERT INTO `tbl_training_fees` (`trainingfees_id`, `member_id`, `reg_no`, `payment_date`, `total_amount`, `total_paid`, `created_date`) VALUES
(1, 4, '438', '01/01/2019', 2000, 500, '2019-01-01 13:16:18'),
(2, 6, '440', '01/01/2019', 2000, 1500, '2019-01-01 13:18:13'),
(3, 7, '441', '01/01/2019', 2000, 1200, '2019-01-01 13:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor`
--

CREATE TABLE `tbl_visitor` (
  `visitor_id` int(3) NOT NULL,
  `date` varchar(10) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `bike_ride` tinytext NOT NULL,
  `license` tinytext NOT NULL,
  `training` tinytext NOT NULL,
  `next_meeting_date` varchar(10) NOT NULL,
  `remarks` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_visitor`
--

INSERT INTO `tbl_visitor` (`visitor_id`, `date`, `name`, `address`, `mobile`, `bike_ride`, `license`, `training`, `next_meeting_date`, `remarks`, `created_date`) VALUES
(1, '01/01/2019', 'Titu', 'Mohammadpur\r\n', '1767195363', '1', '2', '2', '01/04/2019', 'he has bike, just want to use fleet\r\n', '2019-01-01 12:38:59'),
(2, '01/01/2019', 'Rasel Chowdhury', 'Mirpur 1\r\n', '1878296226', '1', '2', '2', '01/03/2019', 'Positive', '2019-01-01 12:41:10'),
(3, '01/01/2019', 'Md. Atikur Rahman', 'Mymensing\r\n', '1811697493', '1', '2', '2', '01/03/2019', 'Admitted', '2019-01-01 12:42:31'),
(4, '01/01/2019', 'Shamim Patwary', 'Tongi\r\n', '1684876068', '1', '2', '2', '01/04/2019', 'He will let us know', '2019-01-01 12:43:58'),
(5, '01/01/2019', 'Shamim', 'Tejgaon\r\n', '1718646574', '1', '1', '2', '01/03/2019', 'Wthin 3 dec', '2019-01-01 12:45:18'),
(6, '01/01/2019', 'Faysal', 'Gendariya\r\n', '1672744484', '2', '2', '1', '01/03/2019', 'Admitted as trainee', '2019-01-01 12:47:31'),
(7, '01/01/2019', 'Mazharul Islam', 'Khilkhet', '1872969150', '2', '2', '1', '01/03/2019', 'Admitted', '2019-01-01 12:51:05'),
(8, '01/01/2019', 'Mehedi Hasan', 'Wari', '1742453466', '2', '2', '1', '01/03/2019', 'Admitted', '2019-01-01 12:51:55'),
(9, '01/01/2019', 'Rifatul Islam', 'Sayedabad\r\n', '1682264821', '2', '2', '1', '01/02/2019', 'Positive', '2019-01-01 12:53:11'),
(10, '01/01/2019', 'Niloy Sarkar', 'Mohakhali\r\n', '1856057902', '1', '2', '2', '01/03/2019', 'No NID, Will tell if passport has validity date. ', '2019-01-01 12:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `contact`, `address`, `photo`, `created_datetime`) VALUES
(13, 'Shagor', 'Badsha', 'lotus', 'da5b0794941929115aad190a23cf12b7', 'uturntech000015@gmail.com', '01947000015', 'Purana Paltan Dhaka.', './assets/backend/uploads/me1.jpg', '2015-02-25 12:49:54'),
(14, 'Tanziba', 'Nawreen', 'Nawreen', '36b52cc67d61e862f9fa2209f3c65baf', 'info.lotusbd.org@gmail.com', '01968800524', '49/1-A, Purana Paltan lane, VIP Road.', './assets/backend/uploads/nawreen.jpg', '2019-01-01 05:17:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_sms`
--
ALTER TABLE `group_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_configuration`
--
ALTER TABLE `sms_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specific_sms`
--
ALTER TABLE `specific_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_collection_expense`
--
ALTER TABLE `tbl_collection_expense`
  ADD PRIMARY KEY (`ce_id`);

--
-- Indexes for table `tbl_examination`
--
ALTER TABLE `tbl_examination`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_learner_fees`
--
ALTER TABLE `tbl_learner_fees`
  ADD PRIMARY KEY (`learner_id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_member_fees`
--
ALTER TABLE `tbl_member_fees`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `tbl_member_subscription`
--
ALTER TABLE `tbl_member_subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `tbl_notices`
--
ALTER TABLE `tbl_notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `tbl_training_fees`
--
ALTER TABLE `tbl_training_fees`
  ADD PRIMARY KEY (`trainingfees_id`);

--
-- Indexes for table `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  ADD PRIMARY KEY (`visitor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_sms`
--
ALTER TABLE `group_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sms_configuration`
--
ALTER TABLE `sms_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specific_sms`
--
ALTER TABLE `specific_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_collection_expense`
--
ALTER TABLE `tbl_collection_expense`
  MODIFY `ce_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_examination`
--
ALTER TABLE `tbl_examination`
  MODIFY `exam_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `expense_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_learner_fees`
--
ALTER TABLE `tbl_learner_fees`
  MODIFY `learner_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_member_fees`
--
ALTER TABLE `tbl_member_fees`
  MODIFY `fees_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_member_subscription`
--
ALTER TABLE `tbl_member_subscription`
  MODIFY `subscription_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notices`
--
ALTER TABLE `tbl_notices`
  MODIFY `notice_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `training_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_training_fees`
--
ALTER TABLE `tbl_training_fees`
  MODIFY `trainingfees_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  MODIFY `visitor_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
