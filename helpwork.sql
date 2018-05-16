-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `it`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `helpwork`
-- 

CREATE TABLE `helpwork` (
  `id` int(11) NOT NULL auto_increment,
  `date` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nameop` varchar(20) NOT NULL,
  `work` varchar(20) NOT NULL,
  `edit` varchar(20) NOT NULL,
  `wait` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- dump ตาราง `helpwork`
-- 

INSERT INTO `helpwork` VALUES (2, '14 ก.ย. 2560 09:36', 'ทดสอบระบบการเงิน', 'CAS-02', 'สตาร์ไม่ติด เครื่องฟ', 'เก่าจัด', 'ทดสอบระบบ', 'สำเร็จ', '');
INSERT INTO `helpwork` VALUES (1, '16 ก.ย. 2560 19:38', 'ทดสอบระบบการเงิน', 'CAS-02', 'เสียยยยยย', '', '', 'แจ้งซ่อม', '');
INSERT INTO `helpwork` VALUES (3, '14 ก.ย. 2560 08:35', 'ทดสอบระบบการเงิน', 'CAS-03', 'กกก', '', 'ผู้ใช้งานทั่วไป', 'สำเร็จ', '');
INSERT INTO `helpwork` VALUES (4, '14 ก.ย. 2560 09:36	', 'ทดสอบระบบการเงิน', 'CAS-03', 'กกกก', '', 'ทดสอบระบบ', 'ส่งซ่อม/เคลม', '');
INSERT INTO `helpwork` VALUES (5, '14 ก.ย. 2560 09:36	', 'ทดสอบระบบการเงิน', 'CAS-03', 'กกกก', '', '', 'แจ้งซ่อม', '');
INSERT INTO `helpwork` VALUES (6, '13 ก.ย. 2560 18:58', 'ทดสอบระบบการเงิน', 'CAS-04', 'ake test', '', '', 'แจ้งซ่อม', '');
INSERT INTO `helpwork` VALUES (7, '13 ก.ย. 2560 16:06', 'ทดสอบระบบการเงิน', 'CAS-06**', 'ใช้งาน Internet ไม่ไ', '', 'ผู้ดูแลระบบ', 'ดำเนินการ', '');
