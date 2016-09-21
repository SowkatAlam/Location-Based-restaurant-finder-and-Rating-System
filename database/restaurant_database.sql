-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 05:15 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restaurant_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `rating_pk` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_pk`, `user_id`, `res_id`, `rating`) VALUES
(17, 1, 17, 5),
(18, 6, 17, 3),
(19, 3, 17, 5),
(20, 3, 17, 5),
(21, 1, 18, 4),
(22, 1, 19, 5),
(23, 1, 20, 3),
(24, 1, 21, 4),
(25, 1, 23, 4),
(26, 1, 24, 5),
(27, 1, 25, 2),
(28, 2, 17, 4),
(29, 2, 18, 4),
(30, 2, 19, 5),
(31, 2, 20, 3),
(32, 9, 17, 3),
(33, 9, 21, 4),
(34, 9, 20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu`
--

CREATE TABLE IF NOT EXISTS `restaurant_menu` (
  `restaurant_menu_pk` int(11) NOT NULL,
  `restaurant_id` varchar(50) NOT NULL,
  `image_path` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_menu`
--

INSERT INTO `restaurant_menu` (`restaurant_menu_pk`, `restaurant_id`, `image_path`) VALUES
(22, '17', 'img/restaurant/preetom/menu/57accb26d38972016-08-11-20-59-5012745444_954807884604009_8901635256658803572_n.jpg'),
(23, '17', 'img/restaurant/preetom/menu/57accb2d5d76c2016-08-11-20-59-5712801096_954807877937343_5880134484407836632_n.jpg'),
(24, '17', 'img/restaurant/preetom/menu/57accb33a55442016-08-11-21-00-0313872628_1056229244461872_8533623590187374883_n.jpg'),
(25, '17', 'img/restaurant/preetom/menu/57accb3c016202016-08-11-21-00-12a320e03c7e41da5caef47728d588ab26.jpg'),
(26, '17', 'img/restaurant/preetom/menu/57accb41147f32016-08-11-21-00-17Capture.JPG'),
(27, '17', 'img/restaurant/preetom/menu/57accb4be9c892016-08-11-21-00-2713895217_1054632034621593_1521213195307626606_n.jpg'),
(28, '17', 'img/restaurant/preetom/menu/57accb50e30452016-08-11-21-00-3213912627_1061515330599930_9062609861151271263_n.jpg'),
(29, '17', 'img/restaurant/preetom/menu/57accb5b184732016-08-11-21-00-4313934835_1060712914013505_8859285385066930723_n.jpg'),
(30, '18', 'img/restaurant/kfcbanani/menu/57b19696eb5382016-08-15-12-16-55420589_10151591992108728_29456353_n.jpg'),
(31, '18', 'img/restaurant/kfcbanani/menu/57b1969b5443a2016-08-15-12-16-59481025_10151083870308728_1621080623_n.jpg'),
(32, '18', 'img/restaurant/kfcbanani/menu/57b196a081fdb2016-08-15-12-17-04969337_10151732536763728_1269666296_n.jpg'),
(33, '18', 'img/restaurant/kfcbanani/menu/57b196a6dab3f2016-08-15-12-17-1011822430_10153502982288728_6311238749213771102_n.jpg'),
(34, '18', 'img/restaurant/kfcbanani/menu/57b196b414e392016-08-15-12-17-2413343121_10154207524728728_5686749898544461974_n (1).jpg'),
(35, '18', 'img/restaurant/kfcbanani/menu/57b196bea2e1f2016-08-15-12-17-34DeliveryLeaflet2.jpg'),
(36, '18', 'img/restaurant/kfcbanani/menu/57b196c39e8ec2016-08-15-12-17-39kfc.jpg'),
(37, '19', 'img/restaurant/pizzainn/menu/57b337694a62d2016-08-16-17-55-2111836642_1602259943357081_4690728090821749869_n.jpg'),
(38, '19', 'img/restaurant/pizzainn/menu/57b3376fceeb52016-08-16-17-55-271512808_1564701217112954_4444296692379165495_n.jpg'),
(39, '19', 'img/restaurant/pizzainn/menu/57b33773dddfa2016-08-16-17-55-3110440196_1447199712196439_7835220019318534469_n.jpg'),
(40, '19', 'img/restaurant/pizzainn/menu/57b33779a85d02016-08-16-17-55-3718202_1597034967212912_6924232839258350451_n.jpg'),
(41, '19', 'img/restaurant/pizzainn/menu/57b3378a809f92016-08-16-17-55-5411035448_1587785291471213_4037219915446183798_n.jpg'),
(42, '19', 'img/restaurant/pizzainn/menu/57b3378f7b0692016-08-16-17-55-5910924818_1541900126059730_3470198202580419164_n.jpg'),
(43, '19', 'img/restaurant/pizzainn/menu/57b33793cbfff2016-08-16-17-56-0313343121_10154207524728728_5686749898544461974_n.jpg'),
(44, '19', 'img/restaurant/pizzainn/menu/57b337978cd552016-08-16-17-56-07download.jpg'),
(45, '19', 'img/restaurant/pizzainn/menu/57b3379aeb9fb2016-08-16-17-56-10downloadas.jpg'),
(46, '20', 'img/restaurant/pedatingting/menu/57b3387ebcf5f2016-08-16-17-59-58images.jpg'),
(47, '20', 'img/restaurant/pedatingting/menu/57b3388630a472016-08-16-18-00-06offer2.jpg'),
(48, '20', 'img/restaurant/pedatingting/menu/57b3388b01a2f2016-08-16-18-00-11offer1.jpg'),
(49, '21', 'img/restaurant/pizzahut/menu/57b33ad460cea2016-08-16-18-09-56images (1).jpg'),
(50, '21', 'img/restaurant/pizzahut/menu/57b33ad9b77242016-08-16-18-10-01download.jpg'),
(51, '21', 'img/restaurant/pizzahut/menu/57b33add9ef2e2016-08-16-18-10-055841894b0290302365bceece0a51821e.jpg'),
(52, '21', 'img/restaurant/pizzahut/menu/57b33ae1ae25c2016-08-16-18-10-09images.jpg'),
(53, '24', 'img/restaurant/banolotafood/menu/57b3420763ce82016-08-16-18-40-3956ff923e2e24d943892_1098266470192931_8686465864475571466_n.jpg'),
(54, '24', 'img/restaurant/banolotafood/menu/57b3420abceea2016-08-16-18-40-4256ff923e72de312185203_1706099559619591_346479538046988658_o.jpg'),
(55, '24', 'img/restaurant/banolotafood/menu/57b3420e349e02016-08-16-18-40-4656ff923e858ea12186285_1706099346286279_2172196725623061315_o.jpg'),
(56, '24', 'img/restaurant/banolotafood/menu/57b342120512c2016-08-16-18-40-50images.jpg'),
(57, '24', 'img/restaurant/banolotafood/menu/57b342159fba22016-08-16-18-40-5356dc8a7f55d9510547231_732006353520100_5867057174491992913_o.jpg'),
(58, '26', 'img/restaurant/redtomato/menu/57b3434b61dfd2016-08-16-18-46-035703514cf15b411754111_888705674549691_5521171678023909591_n.png'),
(59, '26', 'img/restaurant/redtomato/menu/57b3434eb3b902016-08-16-18-46-06rt5-150x150.jpg'),
(60, '27', 'img/restaurant/darkmusic/menu/57b343d9c67de2016-08-16-18-48-2513346855_1612231045770855_5462699813590959858_n.jpg'),
(61, '27', 'img/restaurant/darkmusic/menu/57b343dd6323c2016-08-16-18-48-29stock-vector-restaurant-cafe-menu-template-design-food-flyer-292160201.jpg'),
(62, '17', 'img/restaurant/preetom/menu/57c4f4640ffdc2016-08-30-04-50-12offer3.png');

-- --------------------------------------------------------

--
-- Table structure for table `res_area`
--

CREATE TABLE IF NOT EXISTS `res_area` (
  `res_area_pk` int(11) NOT NULL,
  `res_user_id` int(11) NOT NULL,
  `area_1` varchar(50) NOT NULL,
  `area_2` varchar(50) NOT NULL,
  `area_3` varchar(50) NOT NULL,
  `area_4` varchar(50) NOT NULL,
  `res_map` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_area`
--

INSERT INTO `res_area` (`res_area_pk`, `res_user_id`, `area_1`, `area_2`, `area_3`, `area_4`, `res_map`) VALUES
(12, 17, 'Banani', '', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.6717625747824!2d90.40031101438925!3d23.79470009300076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c711d13bbec7%3A0xc47f7c3e8e2263f2!2sAmerican+International+University-Bangladesh!5e0!3m2!1sen!2sbd!4v1472525732657" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'),
(13, 18, 'banani', 'Kemal Ataturk Ave', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.698008835341!2d90.40334181498217!3d23.79376588456809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70e61cfd2dd%3A0x93d98de48f5cbdc5!2sK+F+C!5e0!3m2!1sen!2sbd!4v1471267712075" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'),
(14, 19, 'banani', '', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.7740328631817!2d90.40189821450292!3d23.79105969313982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70deb302959%3A0x966f56b1afaaf1c1!2sPizza+Inn!5e0!3m2!1sen!2sbd!4v1471362820564" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'),
(15, 20, 'Gulshan', 'Gulshan-1', 'Gulshan-2', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.018714895091!2d90.41206031450278!3d23.782347893473077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79e5adabb7f%3A0x2cb060c7072a9a96!2sPeda+Ting+Ting!5e0!3m2!1sen!2sbd!4v1471363154149" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'),
(16, 21, 'gulshan', 'banani', 'gulshan-2', 'gulshan-1', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58417.307320032865!2d90.36175818733172!3d23.780104581928803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7123f02776b%3A0xb6689f525389a4b6!2sPizza+Hut+Delivery+Banani!5e0!3m2!1sen!2sbd!4v1471363442315" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'),
(18, 23, 'gulshan', 'gulshan-1', 'badda', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.027018526218!2d90.41367841428706!3d23.782052193484866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79e94cd8e95%3A0x6163942adda9acaf!2sA%26W+Restaurants!5e0!3m2!1sen!2sbd!4v1471365251282" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'),
(19, 24, 'mirpur', 'mirpur 10', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.055517134879!2d90.36353531428779!3d23.816624792161665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c12f53aceb5f%3A0x284c1bede54a25d0!2sBanolata+Food+Palace!5e0!3m2!1sen!2sbd!4v1471365535497" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'),
(20, 25, 'mirpur', '', '', '', ''),
(21, 26, 'dhanmondi', '', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.850582439018!2d90.36671161428646!3d23.752707094606592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf51be350607%3A0x6f7f66628965444!2sRed+Tomato!5e0!3m2!1sen!2sbd!4v1471365917453" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'),
(22, 27, 'Dhanmondi', '', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.0379970689087!2d90.36898751428629!3d23.74602439486186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf4c13736225%3A0xd41619aded0b8b93!2sThe+Dark%2C+Music+Cafe+%26+Restaurant!5e0!3m2!1sen!2sbd!4v1471366068906" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `res_user`
--

CREATE TABLE IF NOT EXISTS `res_user` (
  `res_pk` int(11) NOT NULL,
  `res_id` varchar(50) NOT NULL,
  `res_pass` varchar(50) NOT NULL,
  `res_name` varchar(50) NOT NULL,
  `res_address` varchar(250) NOT NULL,
  `res_email` varchar(50) NOT NULL,
  `res_phone` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_user`
--

INSERT INTO `res_user` (`res_pk`, `res_id`, `res_pass`, `res_name`, `res_address`, `res_email`, `res_phone`) VALUES
(17, 'preetom', 'preetom', 'Preetom', '32, Kamal Ataturk Avenue, Banani, Dhaka, Bangladesh', 'preetom@gmail.com', '+880 1788-650022'),
(18, 'kfcbanani', 'kfcbanani', 'KFC', '40 Kemal Ataturk Ave, Dhaka, Bangladesh', 'kfcbd@gmail.com', '+880 1731-912844'),
(19, 'pizzainn', 'pizzainn', 'Pizza Inn Bangladesh', 'Banani,Dhaka Dhaka 1213', 'pizzainn@gmail.com', '+880 9610-074992'),
(20, 'pedatingting', 'pedatingting', 'Peda Ting Ting', 'House#69, Road#27, Gulshan-1, Dhaka 1212, Bangladesh', 'pedatingting@gmail.com', '+880 1741-102403'),
(21, 'pizzahut', 'pizzahut', 'Pizza Hut ', 'gulashan-1, Dhaka, Bangladesh', 'pizzahut@gmail.com', '+880 1786-064031'),
(23, 'aandw', 'aandw', 'A and W Restaurants Bangladesh', 'House 1, 1st floor, Road 23, Gulshan Dhaka 1212', 'a_and_w@gmail.com', '01844-000102'),
(24, 'banolotafood', 'banolotafood', 'Banolota Food Palace', 'Plot-6, Main Road-3, Section-7, Mirpur', 'banolotafood@gmail.com', '+8801719555555'),
(25, 'dosahouse', 'dosahouse', 'Dosa House Mirpur', '350 Market St, mirpur', 'dosahouse@gmail.com', '+1 201-845-0001'),
(26, 'redtomato', 'redtomato', 'Red Tomato Dhanmondi', 'House # 50,Road # 27 (old) New 16, Dhanmondi, Rd No.16, Dhaka 1207, Bangladesh', 'redtomato@gmail.com', '+880 2-8117220'),
(27, 'darkmusic', 'darkmusic', 'The Dark Music Cafe Dhanmondi', 'ZR Plaza, Level 10, Satmasjid Road, Dhanmondi 19 , ( 9/A OLD), Rd No 10A, Dhaka 1209, Bangladesh', 'darkmusic@gmail.com', '+880 1721-904504');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_pk` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_image` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_pk`, `user_name`, `user_pass`, `user_first_name`, `user_last_name`, `user_address`, `user_email`, `user_phone`, `user_gender`, `user_image`) VALUES
(1, 'sowkat', 'a', 'new', 'new', 'new', 'new@gmail.com', '0544', 'male', ''),
(2, 'sowkata', 'a', 'sowkat', 'alam', 'badda', 'a@gmail.com', '14441', 'male', ''),
(7, 'sowkatalam', 'sowkatalam', 'sowkat', 'alam', 'badda', 'sowkataa@gmail.com', '65416444415', 'male', ''),
(8, 'sowkatalam1', 'sowkatalam1', 'sowkat', 'alam', 'badda', 'sowkatalam11@gmail.com', '45144641644', 'male', ''),
(9, 'rahee', 'rahee', 'Kaynat', 'Rahee', 'Nikunja-2 dhaka', 'rahee.pm@gmail.com', '01740966056', 'male', ''),
(10, 'kaynat', 'kaynat', 'Golam ', 'Sarwar', 'Khilkhet', 'gsk@gmail.com', '01677655586', 'male', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_pk`);

--
-- Indexes for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  ADD PRIMARY KEY (`restaurant_menu_pk`);

--
-- Indexes for table `res_area`
--
ALTER TABLE `res_area`
  ADD PRIMARY KEY (`res_area_pk`);

--
-- Indexes for table `res_user`
--
ALTER TABLE `res_user`
  ADD PRIMARY KEY (`res_pk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  MODIFY `restaurant_menu_pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `res_area`
--
ALTER TABLE `res_area`
  MODIFY `res_area_pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `res_user`
--
ALTER TABLE `res_user`
  MODIFY `res_pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_pk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
