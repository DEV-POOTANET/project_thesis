-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 11:03 AM
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
-- Database: `assingment`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(100) NOT NULL,
  `dep_fac_id` int(11) NOT NULL,
  `dep_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `dep_name`, `dep_fac_id`, `dep_status`) VALUES
(1, 'วิศวกรรมไฟฟ้า', 1, 1),
(2, 'วิศวกรรมเครื่องกล', 1, 1),
(3, 'วิศวกรรมโยธา', 1, 1),
(4, 'วิศวกรรมคอมพิวเตอร์', 1, 1),
(5, 'วิศวกรรมสิ่งแวดล้อม', 1, 1),
(6, 'วิศวกรรมแมคคาทรอนิกส์', 1, 1),
(7, 'วิศวกรรมเครือข่ายและความมั่นคงปลอดภัยทางไซเบอร์', 1, 1),
(8, 'เทคโนโลยีสารสนเทศและนวัตกรรมโมบายซอฟต์แวร์', 1, 1),
(9, 'การบัญชี', 2, 1),
(10, 'การตลาด', 2, 1),
(11, 'การเงิน', 2, 1),
(12, 'การจัดการ', 2, 1),
(13, 'สัตวแพทย์ศาสตร์ทั่วไป', 3, 1),
(14, 'พยาธิวิทยา', 3, 1),
(15, 'เวชศาสตร์ป้องกัน', 3, 1),
(16, 'สรีรวิทยา', 3, 1),
(17, 'ส่งเสริมวิจัย', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(100) NOT NULL,
  `fac_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`fac_id`, `fac_name`, `fac_status`) VALUES
(1, 'วิศวกรรมศาสตร์และเทคโนโลยี', 1),
(2, 'บริหารธุรกิจ', 1),
(3, 'สัตวแพทยศาสตร์', 1),
(4, 'สำนักส่งเสริมวิจัยและนวัตกรรม', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL,
  `mem_sid` varchar(10) NOT NULL,
  `mem_cid` varchar(13) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `mem_dep_id` int(11) NOT NULL,
  `mem_username` varchar(20) NOT NULL,
  `mem_password` varchar(255) NOT NULL,
  `mem_status` int(11) NOT NULL DEFAULT 1,
  `mem_level` int(11) NOT NULL DEFAULT 1,
  `mem_img` varchar(255) NOT NULL DEFAULT 'mem.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_sid`, `mem_cid`, `mem_name`, `mem_dep_id`, `mem_username`, `mem_password`, `mem_status`, `mem_level`, `mem_img`) VALUES
(1, '0000000000', '1234567891235', 'admin admin', 17, 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 0, 'mem.png'),
(2, '6105000001', '1234567890123', 'ภูธเนศ รำเภย', 8, '6105000001', '08d7de6cbf6c3fa0a26e094e5115bcd1a0e3d2c3', 1, 1, 'mem.png'),
(3, '6105000002', '2234567890123', 'สมศักดิ์ วิศวกร', 1, '6105000002', '017083deba3c72986f91a2a333f1272855ce57a2', 1, 1, 'mem.png'),
(4, '6105000003', '3234567890123', 'สมหวัง วิศวกร', 1, '6105000003', 'd1bff3d7d6802f779606e45fee03c3979e557772', 1, 1, 'mem.png'),
(5, '6105000004', '4234567890123', 'สมบูรณ์ วิศวกร', 1, '6105000004', '8ffe8d1dab36441b49ea06e7ff038a5c01a785b5', 1, 1, 'mem.png'),
(6, '6105000005', '5234567890123', 'สมศรี วิศวกร', 1, '6105000005', '66e2865b2a001e5e1029ab03207ac2c28f1c696f', 1, 1, 'mem.png'),
(7, '6205000001', '6234567890123', 'เกรียงไกร การบัญชี', 9, '6205000001', '48a0da044c17b8142d8f682edd4fbbbb364ec9a1', 1, 1, 'mem.png'),
(8, '6205000002', '7234567890123', 'เกรียงศักดิ์ การบัญชี', 9, '6205000002', '0a8d55d41ff323e283ad1f8cf2ba0346179ff12d', 1, 1, 'mem.png'),
(9, '6205000003', '8234567890123', 'เกรียงไกร การบัญชี', 9, '6205000003', '4266f586f6c7361abcda4f9b952486e4c0120fec', 1, 1, 'mem.png'),
(10, '6205000004', '9234567890123', 'เกรียงศักดิ์ การบัญชี', 9, '6205000004', '6e79e0271a1c81dfd0a2ab0a20af206b4a8ff8bf', 1, 1, 'mem.png'),
(11, '6205000005', '1034567890123', 'ก้องเกียรติ การบัญชี', 9, '6205000005', '4a7e31d7507001ebd450f0234a475a293979a49a', 1, 1, 'mem.png'),
(12, '6305000001', '1134567890123', 'สุชาติ สัตวแพทย์', 13, '6305000001', '38b0253ea58b4859028d05ee1615a2d9dcd7c93d', 1, 1, 'mem.png'),
(13, '6305000002', '1234567890124', 'สุวิทย์ สัตวแพทย์', 13, '6305000002', '99b21b25a0c626ba0bf1c3cbe41fcfd59d28847e', 1, 1, 'mem.png'),
(14, '6305000003', '1334567890123', 'สุชาติ สัตวแพทย์', 13, '6305000003', '498219b6fc1f39436ffbe7bdd675516fb48be4eb', 1, 1, 'mem.png'),
(15, '6305000004', '1434567890123', 'สุวิทย์ สัตวแพทย์', 13, '6305000004', 'aefa68c77a8fb486238afc66d8e7a1d29e38eff7', 1, 1, 'mem.png'),
(16, '6305000005', '1534567890123', 'สุชาติ สัตวแพทย์', 13, '6305000005', '7b178b06d0e5ac01543010ed56e7aeb7b9a6b83b', 1, 1, 'mem.png');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `thesis_id` int(11) NOT NULL,
  `thesis_topic` varchar(100) NOT NULL,
  `thesis_description` text NOT NULL,
  `thesis_date` date NOT NULL,
  `thesis_keyword` varchar(100) NOT NULL,
  `thesis_file` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `thesis_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`thesis_id`, `thesis_topic`, `thesis_description`, `thesis_date`, `thesis_keyword`, `thesis_file`, `mem_id`, `thesis_status`) VALUES
(1, 'การพัฒนาระบบการจัดการสมาชิก', 'การพัฒนาระบบการจัดการสมาชิกสำหรับองค์กร', '2024-08-14', 'การจัดการสมาชิก, ระบบฐานข้อมูล', '98936_Software Development School Center by Slidesgo.pdf', 1, 0),
(2, 'การออกแบบเว็บไซต์ร้านค้าออนไลน์', 'เว็บไซต์สำหรับขายสินค้าผ่านอินเทอร์เน็ต', '2024-08-14', 'ร้านค้าออนไลน์, การออกแบบเว็บไซต์', '3773_6624210001.pdf', 3, 1),
(3, 'การวิเคราะห์ข้อมูลลูกค้า', 'การวิเคราะห์ข้อมูลลูกค้าเพื่อตัดสินใจทางธุรกิจ', '2024-08-14', 'การวิเคราะห์ข้อมูล, ลูกค้า', '3773_6624210001.pdf', 4, 1),
(4, 'ระบบแนะนำสินค้า', 'ระบบแนะนำสินค้าตามความสนใจของผู้ใช้', '2024-08-14', 'ระบบแนะนำ, การเรียนรู้ของเครื่อง', '3773_6624210001.pdf', 5, 1),
(5, 'แอปพลิเคชันการจัดการงาน', 'แอปพลิเคชันสำหรับจัดการงานและเวลา', '2024-08-14', 'การจัดการงาน, แอปพลิเคชัน', '3773_6624210001.pdf', 6, 1),
(6, 'การวิเคราะห์งบการเงินของบริษัทเอกชน', 'การวิเคราะห์และการตัดสินใจทางการเงินจากงบการเงินของบริษัทเอกชน', '2024-08-14', 'งบการเงิน, การวิเคราะห์ทางการเงิน', '3773_6624210001.pdf', 7, 1),
(7, 'การจัดการภาษีสำหรับธุรกิจขนาดเล็ก', 'วิธีการจัดการภาษีสำหรับธุรกิจขนาดเล็กให้ถูกต้องและมีประสิทธิภาพ', '2024-08-14', 'การจัดการภาษี, ธุรกิจขนาดเล็ก', '3773_6624210001.pdf', 8, 1),
(8, 'การประเมินมูลค่าทรัพย์สิน', 'วิธีการประเมินมูลค่าทรัพย์สินในตลาดอสังหาริมทรัพย์', '2024-08-14', 'การประเมินมูลค่า, อสังหาริมทรัพย์', '3773_6624210001.pdf', 9, 1),
(9, 'การวางแผนการเงินส่วนบุคคล', 'เทคนิคการวางแผนการเงินเพื่อความมั่นคงในอนาคต', '2024-08-14', 'การวางแผนการเงิน, การเงินส่วนบุคคล', '3773_6624210001.pdf', 10, 1),
(10, 'การวิเคราะห์ต้นทุนและผลตอบแทนของโครงการ', 'การวิเคราะห์ต้นทุนและผลตอบแทนในการลงทุนในโครงการต่าง ๆ', '2024-08-14', 'การวิเคราะห์ต้นทุน, การลงทุน', '3773_6624210001.pdf', 11, 1),
(11, 'การรักษาโรคทางผิวหนังในสุนัข', 'การวินิจฉัยและรักษาโรคทางผิวหนังในสุนัข', '2024-08-14', 'โรคผิวหนัง, สุนัข', '3773_6624210001.pdf', 12, 1),
(12, 'การผ่าตัดกระดูกสันหลังในแมว', 'เทคนิคการผ่าตัดกระดูกสันหลังในแมว', '2024-08-14', 'การผ่าตัด, แมว', '3773_6624210001.pdf', 13, 1),
(13, 'การวิเคราะห์พฤติกรรมสัตว์เลี้ยง', 'การวิเคราะห์และทำความเข้าใจพฤติกรรมของสัตว์เลี้ยงในบ้าน', '2024-08-14', 'พฤติกรรมสัตว์เลี้ยง, การวิเคราะห์', '3773_6624210001.pdf', 14, 1),
(14, 'การจัดการโภชนาการในสัตว์เลี้ยง', 'การจัดการโภชนาการและสุขภาพของสัตว์เลี้ยง', '2024-08-14', 'โภชนาการสัตว์, สัตว์เลี้ยง', '3773_6624210001.pdf', 15, 1),
(15, 'การพัฒนาวัคซีนสำหรับสัตว์เลี้ยง', 'การพัฒนาและประเมินประสิทธิภาพวัคซีนในสัตว์เลี้ยง', '2024-08-14', 'วัคซีนสัตว์เลี้ยง, การพัฒนา', '3773_6624210001.pdf', 16, 1),
(16, 'การพัฒนาเครื่องควบคุมไฟฟ้าอัตโนมัติ', 'การพัฒนาระบบควบคุมไฟฟ้าอัตโนมัติในอุตสาหกรรม', '2024-08-14', 'การควบคุมไฟฟ้า, อัตโนมัติ', '3773_6624210001.pdf', 2, 1),
(17, 'การวิเคราะห์การใช้พลังงานในโรงงาน', 'การวิเคราะห์และลดการใช้พลังงานไฟฟ้าในโรงงานอุตสาหกรรม', '2024-08-14', 'พลังงานไฟฟ้า, โรงงานอุตสาหกรรม', '3773_6624210001.pdf', 3, 1),
(18, 'การสร้างระบบพลังงานแสงอาทิตย์', 'การออกแบบและสร้างระบบพลังงานแสงอาทิตย์สำหรับบ้านพักอาศัย', '2024-08-14', 'พลังงานแสงอาทิตย์, ระบบพลังงาน', '3773_6624210001.pdf', 4, 1),
(19, 'ระบบตรวจจับข้อผิดพลาดในสายการผลิต', 'การพัฒนาระบบตรวจจับข้อผิดพลาดในสายการผลิตด้วยการวิเคราะห์ภาพ', '2024-08-14', 'การตรวจจับข้อผิดพลาด, สายการผลิต', '3773_6624210001.pdf', 5, 1),
(20, 'การออกแบบหม้อแปลงไฟฟ้าขนาดเล็ก', 'การออกแบบและพัฒนาหม้อแปลงไฟฟ้าสำหรับชุมชน', '2024-08-14', 'หม้อแปลงไฟฟ้า, ชุมชน', '3773_6624210001.pdf', 6, 1),
(21, 'การพัฒนาแอปพลิเคชันจัดการงานบนมือถือ', 'การออกแบบและพัฒนาแอปพลิเคชันสำหรับจัดการงานบนสมาร์ทโฟน', '2024-08-14', 'แอปพลิเคชันมือถือ, การจัดการงาน', '3773_6624210001.pdf', 2, 1),
(22, 'การวิเคราะห์ข้อมูลผู้ใช้แอปพลิเคชัน', 'การวิเคราะห์ข้อมูลและพฤติกรรมการใช้แอปพลิเคชันของผู้ใช้', '2024-08-14', 'การวิเคราะห์ข้อมูล, พฤติกรรมผู้ใช้', '3773_6624210001.pdf', 2, 1),
(23, 'การออกแบบเกมบนแพลตฟอร์มมือถือ', 'การออกแบบและพัฒนาเกมบนสมาร์ทโฟนโดยใช้ Unity', '2024-08-14', 'การพัฒนาเกม, Unity', '3773_6624210001.pdf', 2, 1),
(24, 'ระบบจองตั๋วออนไลน์ผ่านมือถือ', 'การพัฒนาระบบจองตั๋วสำหรับกิจกรรมและการเดินทางผ่านแอปพลิเคชันมือถือ', '2024-08-14', 'ระบบจองตั๋ว, แอปพลิเคชันมือถือ', '3773_6624210001.pdf', 2, 1),
(25, 'การใช้งาน AI ในการพัฒนาแอปพลิเคชันมือถือ', 'การนำ AI มาใช้ในแอปพลิเคชันมือถือเพื่อเพิ่มประสิทธิภาพและการใช้งาน', '2024-08-14', 'AI, แอปพลิเคชันมือถือ', '3773_6624210001.pdf', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `fac_dep` (`dep_fac_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`thesis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `thesis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fac_dep` FOREIGN KEY (`dep_fac_id`) REFERENCES `faculties` (`fac_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
