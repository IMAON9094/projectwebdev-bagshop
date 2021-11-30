-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 02:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `userpassaddmin`
--

CREATE TABLE `userpassaddmin` (
  `Username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userpassaddmin`
--

INSERT INTO `userpassaddmin` (`Username`, `password`) VALUES
('Schat00', 'garbell02'),
('somsee', '12345'),
('ssom_ch', 'garbell01'),
('usk_chkl', '0667321587');

-- --------------------------------------------------------

--
-- Table structure for table `userpasscus`
--

CREATE TABLE `userpasscus` (
  `Username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userpasscus`
--

INSERT INTO `userpasscus` (`Username`, `password`) VALUES
('aon', '1234'),
('aon123', '12345'),
('Bae0329', '19900329'),
('dsza555', 'doc888888'),
('gowentgone', '987654321'),
('hsnk123', 'hsnk0000'),
('lnwthor', 'Number1'),
('onnie', '123456789'),
('peerapolhan', 'password'),
('Skzn1g4', 'password'),
('somsee', '12345'),
('spiderbestboy', 'ptrlovestk'),
('test', '12345'),
('test12', '123456'),
('testrrr', '12345'),
('tony007', 'Iloveu3000'),
('winter_n', '01012001');

-- --------------------------------------------------------

--
-- Table structure for table `คำสั่งซื้อ`
--

CREATE TABLE `คำสั่งซื้อ` (
  `รหัสลูกค้า` int(3) UNSIGNED ZEROFILL NOT NULL,
  `รหัสสินค้า` char(4) NOT NULL,
  `วันที่สั่งสินค้า` date NOT NULL,
  `เวลาที่สั่งสินค้า` time NOT NULL,
  `รหัสสถานะ` char(5) NOT NULL,
  `จำนวนสินค้า` int(10) UNSIGNED NOT NULL,
  `slip_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `คำสั่งซื้อ`
--

INSERT INTO `คำสั่งซื้อ` (`รหัสลูกค้า`, `รหัสสินค้า`, `วันที่สั่งสินค้า`, `เวลาที่สั่งสินค้า`, `รหัสสถานะ`, `จำนวนสินค้า`, `slip_img`) VALUES
(001, 'P002', '2021-08-28', '12:00:00', 'ST002', 2, 'c1.jpg'),
(001, 'P002', '2021-08-31', '10:00:04', 'ST004', 1, 'c2.jpg'),
(001, 'P005', '2021-10-22', '00:17:48', 'ST003', 5, 'c3.jpg'),
(001, 'P008', '2021-11-13', '13:17:06', 'ST004', 1, 'final4.JPG'),
(001, 'P009', '2021-11-13', '00:46:51', 'ST004', 1, 'final5.JPG'),
(001, 'P011', '2021-11-13', '00:46:51', 'ST004', 2, 'final5.JPG'),
(004, 'P007', '2021-08-31', '12:30:10', 'ST004', 9, 'c4.jpg'),
(006, 'P008', '2021-08-29', '18:45:15', 'ST001', 1, 'c5.jpg'),
(007, 'P006', '2021-08-31', '12:00:23', 'ST004', 2, 'c6.jpg'),
(008, 'P001', '2021-08-27', '10:00:11', 'ST002', 5, 'c7.jpg'),
(009, 'P003', '2021-08-16', '16:35:45', 'ST003', 8, 'c8.jpg'),
(011, 'P003', '2021-08-29', '20:20:14', 'ST001', 1, 'c9.jpg'),
(012, 'P010', '2021-08-30', '21:21:10', 'ST001', 3, 'c10.jpg'),
(012, 'P012', '2021-08-18', '14:50:33', 'ST003', 7, 'c11.jpg'),
(025, 'P001', '2021-11-19', '07:49:58', 'ST003', 4, 'json.JPG'),
(025, 'P006', '2021-11-19', '13:48:12', 'ST004', 1, 'json.JPG'),
(026, 'P001', '2021-11-20', '09:08:05', 'ST004', 3, 'json.JPG'),
(026, 'P006', '2021-11-20', '03:09:11', 'ST003', 1, 'json.JPG'),
(027, 'P002', '2021-11-20', '04:52:12', 'ST003', 4, 'json.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `ลูกค้า`
--

CREATE TABLE `ลูกค้า` (
  `รหัสลูกค้า` int(3) UNSIGNED ZEROFILL NOT NULL,
  `ชื่อ-นามสกุล` varchar(255) NOT NULL,
  `ที่อยู่` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ลูกค้า`
--

INSERT INTO `ลูกค้า` (`รหัสลูกค้า`, `ชื่อ-นามสกุล`, `ที่อยู่`, `Username`) VALUES
(001, 'นิชกานต์ กาบแก้ว', '148 อ.บางกรวย ต.บางกรวย นนทบุรี 11130', 'aon'),
(002, 'กรกนก ขอประสิทธิ์', '6666/1 วัดเทพศิรินทร์ ป้อมปราบศัตรูพ่าย กทม 10100', 'gowentgone'),
(003, 'พีรพล หาญวัฒนชัย', '99 บางซื่อ บางซื่อ กทม 10800', 'peerapolhan'),
(004, 'ฮิบาริ เคียวยะ', '55 บางซื่อ วงสว่าง กทม 10800', 'hsnk123'),
(005, 'คิม วินเทอร์', '112 ดุสิต ดุสิต กทม 10300', 'winter_n'),
(006, 'เบ ไอรีน', '217 บางซื่อ บางซื่อ กทม 10800', 'Bae0329'),
(007, 'ฮัน จีซอง', '131 บางพลัด บางพลัด กทม 10300', 'Skzn1g4'),
(008, 'ปีเตอร์ ปาร์คเกอร์', '217/1 บางซื่อ บางซื่อ กทม 10800', 'spiderbestboy'),
(009, 'โทนี่ สตาร์ค', '999 ช่องนนทรี  ยานนาวา 10120', 'tony007'),
(010, 'ด็อกเตอร์ สเตรนจ์', '217/2 บางซื่อ บางซื่อ กทม 10800', 'dsza555'),
(011, 'คริส อีแวนส์', '33212 บางมด ทุ่งครุ  กทม 10140', 'lnwthor'),
(012, 'ซาวาดะ สึนะโยชิ', '219 บางซื่อ บางซื่อ กทม 10800', 'somsee'),
(024, 'นิชชี่ สวย', '12/3 นนทบุรี', 'test'),
(025, 'นิชชี่ สวย', '12/3 นนทบุรี', 'test12'),
(026, 'นิชชี่ สวย', '12/3 นนทบุรี', 'testrrr'),
(027, 'นิชชี่ สวย', '12/3 นนทบุรี', 'aon123');

-- --------------------------------------------------------

--
-- Table structure for table `สถานะสินค้า`
--

CREATE TABLE `สถานะสินค้า` (
  `รหัสสถานะ` char(5) NOT NULL,
  `สถานะของสินค้า` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `สถานะสินค้า`
--

INSERT INTO `สถานะสินค้า` (`รหัสสถานะ`, `สถานะของสินค้า`) VALUES
('ST001', 'เตรียมสินค้า'),
('ST002', 'จัดส่ง'),
('ST003', 'ถึงมือผู้รับ'),
('ST004', 'ตรวจสอบการชำระเงิน');

-- --------------------------------------------------------

--
-- Table structure for table `สินค้า`
--

CREATE TABLE `สินค้า` (
  `รหัสสินค้า` char(4) NOT NULL,
  `ชื่อสินค้า` varchar(150) NOT NULL,
  `ราคา` decimal(9,2) NOT NULL,
  `สีสินค้า` varchar(150) NOT NULL,
  `ลายสินค้า` varchar(150) NOT NULL,
  `ขนาดสินค้า` varchar(150) NOT NULL,
  `จำนวนสินค้าคงเหลือ` int(10) UNSIGNED NOT NULL,
  `รหัสแอดมิน` char(4) NOT NULL,
  `img_pd` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `สินค้า`
--

INSERT INTO `สินค้า` (`รหัสสินค้า`, `ชื่อสินค้า`, `ราคา`, `สีสินค้า`, `ลายสินค้า`, `ขนาดสินค้า`, `จำนวนสินค้าคงเหลือ`, `รหัสแอดมิน`, `img_pd`) VALUES
('P001', 'Blue Eyes 123', '690.00', 'สีฟ้า', 'ลายตา', '14*16', 5, 'A001', 'P001.jpg'),
('P002', 'Daisy White', '590.00', 'สีขาว', 'ลายดอกไม้', '14*16', 5, 'A001', 'P002.jpg'),
('P003', 'Macaroon', '690.00', 'สีเหลือง', 'ลายเส้น', '14*16', 5, 'A004', 'P003.jpg'),
('P004', 'Hana', '590.00', 'สีขาว', 'ลายดอกไม้', '14*16', 5, 'A001', 'P004.jpg'),
('P005', 'Blue Blossom', '590.00', 'สีฟ้า', 'ลายดอกไม้', '14*16', 5, 'A003', 'P005.jpg'),
('P006', 'Pink Blossom', '590.00', 'สีชมพู', 'ลายดอกไม้', '14*16', 5, 'A002', 'P006.jpg'),
('P007', 'Tiger', '690.00', 'สีแดง', 'ลายเสือ', '14*16', 5, 'A001', 'P007.jpg'),
('P008', 'Crane Bird', '690.00', 'สีฟ้า', 'ลายนกกระเรียน', '14*16', 5, 'A004', 'P008.jpg'),
('P009', 'Cotton Candy', '690.00', 'สีชมพู', 'ลายเส้น', '14*16', 5, 'A003', 'P009.jpg'),
('P010', 'Cardinal', '590.00', 'สีขาว', 'ลายนก', '14*16', 5, 'A001', 'P010.jpg'),
('P011', 'S-Tiger', '390.00', 'สีแดง', 'ลายเสือ', '9*11', 5, 'A001', 'P011.jpg'),
('P012', 'S- Hana', '350.00', 'สีขาว', 'ลายดอกไม้', '9*11', 5, 'A002', 'P012.jpg'),
('P013', 'test1', '999.00', 'red', 'dot', '14*14', 5, 'A001', 'P013.jpg'),
('P014', 'test1', '999.00', 'red', 'dot', '14*14', 5, 'A001', 'P013.jpg'),
('P015', 'test1', '999.00', 'red', 'dot', '14*14', 5, 'A001', 'P013.jpg'),
('P016', 'test1', '999.00', 'red', 'dot', '14*14', 5, 'A001', 'P013.jpg'),
('P017', 'test1', '999.00', 'red', 'dot', '14*14', 5, 'A001', 'P013.jpg'),
('P018', 'test1', '999.00', 'red', 'dot', '14*14', 5, 'A001', 'P013.jpg'),
('P019', 'test1', '999.00', 'red', 'dot', '14*14', 5, 'A001', 'P013.jpg'),
('P020', 'test1', '999.00', 'red', 'dot', '14*14', 5, 'A001', 'P013.jpg'),
('P021', 'test1', '999.00', 'red', 'dot', '14*14', 5, 'A001', 'P013.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `เบอร์ลูกค้า`
--

CREATE TABLE `เบอร์ลูกค้า` (
  `รหัสลูกค้า` int(3) UNSIGNED ZEROFILL NOT NULL,
  `เบอร์โทรศัพท์` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `เบอร์ลูกค้า`
--

INSERT INTO `เบอร์ลูกค้า` (`รหัสลูกค้า`, `เบอร์โทรศัพท์`) VALUES
(001, '0897774411'),
(001, '0950956492'),
(002, '0659845578'),
(003, '0625958714'),
(004, '0946764581'),
(005, '0812547878'),
(006, '0654981578'),
(007, '0859991478'),
(008, '0633212589'),
(009, '0865652232'),
(010, '0678857891'),
(011, '0865651159'),
(012, '0842236547'),
(024, '0940956455'),
(025, '0940956455'),
(026, '0940956455'),
(027, '0940956455');

-- --------------------------------------------------------

--
-- Table structure for table `เบอร์แอดมิน`
--

CREATE TABLE `เบอร์แอดมิน` (
  `รหัสแอดมิน` char(4) NOT NULL,
  `เบอร์โทรศัพท์` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `เบอร์แอดมิน`
--

INSERT INTO `เบอร์แอดมิน` (`รหัสแอดมิน`, `เบอร์โทรศัพท์`) VALUES
('A001', '0933341332'),
('A001', '0987751223'),
('A002', '0612231100'),
('A003', '0836669598'),
('A004', '0945544421');

-- --------------------------------------------------------

--
-- Table structure for table `แอดมิน`
--

CREATE TABLE `แอดมิน` (
  `รหัสแอดมิน` char(4) NOT NULL,
  `ชื่อ-นามสกุล` varchar(255) NOT NULL,
  `ที่อยู่` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `แอดมิน`
--

INSERT INTO `แอดมิน` (`รหัสแอดมิน`, `ชื่อ-นามสกุล`, `ที่อยู่`, `Username`) VALUES
('A001', 'อุษณกร ชินก้องหล้า', '4/100 พญาไท พญาไท กทม 10000', 'usk_chkl'),
('A002', 'สมชาย ชินก้องหล้า', '4/100 พญาไท พญาไท กทม 10000', 'ssom_ch'),
('A003', 'สมชาติ ชินก้องหล้า', '4/100 พญาไท พญาไท กทม 10000', 'Schat00'),
('A004', 'สมศรี ชินก้องหล้า', '4/100 พญาไท พญาไท กทม 10000', 'somsee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userpassaddmin`
--
ALTER TABLE `userpassaddmin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `userpasscus`
--
ALTER TABLE `userpasscus`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `คำสั่งซื้อ`
--
ALTER TABLE `คำสั่งซื้อ`
  ADD PRIMARY KEY (`รหัสลูกค้า`,`รหัสสินค้า`,`วันที่สั่งสินค้า`,`เวลาที่สั่งสินค้า`,`รหัสสถานะ`),
  ADD KEY `รหัสสินค้า` (`รหัสสินค้า`),
  ADD KEY `รหัสสถานะ` (`รหัสสถานะ`);

--
-- Indexes for table `ลูกค้า`
--
ALTER TABLE `ลูกค้า`
  ADD PRIMARY KEY (`รหัสลูกค้า`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `สถานะสินค้า`
--
ALTER TABLE `สถานะสินค้า`
  ADD PRIMARY KEY (`รหัสสถานะ`);

--
-- Indexes for table `สินค้า`
--
ALTER TABLE `สินค้า`
  ADD PRIMARY KEY (`รหัสสินค้า`),
  ADD KEY `รหัสแอดมิน` (`รหัสแอดมิน`);

--
-- Indexes for table `เบอร์ลูกค้า`
--
ALTER TABLE `เบอร์ลูกค้า`
  ADD PRIMARY KEY (`รหัสลูกค้า`,`เบอร์โทรศัพท์`);

--
-- Indexes for table `เบอร์แอดมิน`
--
ALTER TABLE `เบอร์แอดมิน`
  ADD PRIMARY KEY (`รหัสแอดมิน`,`เบอร์โทรศัพท์`);

--
-- Indexes for table `แอดมิน`
--
ALTER TABLE `แอดมิน`
  ADD PRIMARY KEY (`รหัสแอดมิน`),
  ADD KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ลูกค้า`
--
ALTER TABLE `ลูกค้า`
  MODIFY `รหัสลูกค้า` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `คำสั่งซื้อ`
--
ALTER TABLE `คำสั่งซื้อ`
  ADD CONSTRAINT `คำสั่งซื้อ_ibfk_1` FOREIGN KEY (`รหัสลูกค้า`) REFERENCES `ลูกค้า` (`รหัสลูกค้า`) ON UPDATE CASCADE,
  ADD CONSTRAINT `คำสั่งซื้อ_ibfk_2` FOREIGN KEY (`รหัสสินค้า`) REFERENCES `สินค้า` (`รหัสสินค้า`) ON UPDATE CASCADE,
  ADD CONSTRAINT `คำสั่งซื้อ_ibfk_3` FOREIGN KEY (`รหัสสถานะ`) REFERENCES `สถานะสินค้า` (`รหัสสถานะ`) ON UPDATE CASCADE;

--
-- Constraints for table `ลูกค้า`
--
ALTER TABLE `ลูกค้า`
  ADD CONSTRAINT `ลูกค้า_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `userpasscus` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `สินค้า`
--
ALTER TABLE `สินค้า`
  ADD CONSTRAINT `สินค้า_ibfk_1` FOREIGN KEY (`รหัสแอดมิน`) REFERENCES `แอดมิน` (`รหัสแอดมิน`) ON UPDATE CASCADE;

--
-- Constraints for table `เบอร์ลูกค้า`
--
ALTER TABLE `เบอร์ลูกค้า`
  ADD CONSTRAINT `เบอร์ลูกค้า_ibfk_1` FOREIGN KEY (`รหัสลูกค้า`) REFERENCES `ลูกค้า` (`รหัสลูกค้า`) ON UPDATE CASCADE;

--
-- Constraints for table `เบอร์แอดมิน`
--
ALTER TABLE `เบอร์แอดมิน`
  ADD CONSTRAINT `เบอร์แอดมิน_ibfk_1` FOREIGN KEY (`รหัสแอดมิน`) REFERENCES `แอดมิน` (`รหัสแอดมิน`) ON UPDATE CASCADE;

--
-- Constraints for table `แอดมิน`
--
ALTER TABLE `แอดมิน`
  ADD CONSTRAINT `แอดมิน_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `userpassaddmin` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
