-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- DESIGNED BY #####MATUR INNOCENT JOSHUA (aka Black Panther)
-- Host: localhost
-- Generation Time: Jun 19, 2021 at 04:10 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `finance`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `accounts`
-- 

CREATE TABLE `accounts` (
  `id` int(3) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `acct_number` varchar(15) NOT NULL,
  `title` varchar(30) NOT NULL,
  `balance` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `acct_number` (`acct_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `accounts`
-- 

INSERT INTO `accounts` (`id`, `name`, `acct_number`, `title`, `balance`) VALUES 
(1, 'NILEST PROCUREMENT', '0052438219', 'For Procurement Unit', '364900'),
(2, 'CLINIC UNIT', '0052406010', 'For Clinic Unit', '220300');

-- --------------------------------------------------------

-- 
-- Table structure for table `event_log`
-- 

CREATE TABLE `event_log` (
  `id` int(6) NOT NULL auto_increment,
  `username` varchar(15) NOT NULL,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `user_type` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `event_log`
-- 

INSERT INTO `event_log` (`id`, `username`, `datetime`, `user_type`) VALUES 
(1, 'innocent', '2021-02-17 11:15:46', 'Admin'),
(2, 'grace', '2021-02-17 11:16:06', 'Accountant'),
(3, 'grace', '2021-02-17 11:29:46', 'Accountant'),
(4, 'innocent', '2021-02-23 13:57:30', 'Admin'),
(5, 'innocent', '2021-02-23 14:53:12', 'Admin'),
(6, 'innocent', '2021-03-09 09:53:31', 'Admin'),
(7, 'innocent', '2021-03-10 06:40:02', 'Admin'),
(8, 'innocent', '2021-03-10 07:12:43', 'Admin'),
(9, 'grace', '2021-03-10 07:17:50', 'Accountant'),
(10, 'admin', '2021-03-10 11:14:09', 'Admin'),
(11, 'grace', '2021-04-27 07:23:00', 'Accountant'),
(12, 'admin', '2021-04-27 07:23:12', 'Admin'),
(13, 'admin', '2021-05-02 12:30:47', 'Admin'),
(14, 'admin', '2021-05-03 02:20:21', 'Admin'),
(15, 'admin', '2021-05-03 03:15:52', 'Admin'),
(16, 'innocent', '2021-06-19 15:53:54', 'Admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(3) NOT NULL auto_increment,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `username`, `password`, `type`, `hash`) VALUES 
(10, 'admin', 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'innocent', 'innocent', 'Admin', 'bcf6884576cbbb363483ba667c008c30'),
(14, 'grace', 'grace', 'Accountant', '15e5c87b18c1289d45bb4a72961b58e8');

-- --------------------------------------------------------

-- 
-- Table structure for table `vouchers`
-- 

CREATE TABLE `vouchers` (
  `id` int(6) NOT NULL auto_increment,
  `pay_date` varchar(15) NOT NULL COMMENT 'Voucher payment date',
  `manual_id` varchar(7) NOT NULL,
  `voucher_type` varchar(25) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` int(9) NOT NULL,
  `posted_by` varchar(15) NOT NULL,
  `acct_paid_to` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `debit` int(9) NOT NULL,
  `credit` int(9) NOT NULL,
  `closing` varchar(15) NOT NULL,
  `doe` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'Date of Entry',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `vouchers`
-- 

INSERT INTO `vouchers` (`id`, `pay_date`, `manual_id`, `voucher_type`, `description`, `amount`, `posted_by`, `acct_paid_to`, `status`, `debit`, `credit`, `closing`, `doe`) VALUES 
(1, '2021-06-16', '76876', 'Bank Cash Payment', 'Purchase of Stationary ', 23000, 'Madibo Elisha', 'NILEST PROCUREMENT', 'debit', 23000, 0, '244900', '2021-06-19 16:04:52'),
(2, '2021-06-08', '13223', 'Cash Payment', 'Anti Malaria Medicine Purchase', 12900, 'Barmani Daniel', 'CLINIC UNIT', 'debit', 12900, 0, '220300', '2021-06-19 16:07:48'),
(3, '2021-06-08', '76873', 'Bank Transfer Payment', 'Cash remaining from construction of toilet', 120000, 'Iddo Sambo', 'NILEST PROCUREMENT', 'credit', 0, 120000, '364900', '2021-06-19 16:09:07');
