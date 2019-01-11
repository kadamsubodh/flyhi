-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2019 at 02:54 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.6.39-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flyhi_travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminUser`
--

CREATE TABLE IF NOT EXISTS `adminUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `enc_password` varchar(255) NOT NULL,
  `active_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 for not active and 1 for active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminUser`
--

INSERT INTO `adminUser` (`id`, `user_name`, `password`, `enc_password`, `active_status`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contactCV`
--

CREATE TABLE IF NOT EXISTS `contactCV` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contactNo` bigint(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `jobid` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contactCV`
--

INSERT INTO `contactCV` (`id`, `name`, `email`, `contactNo`, `address`, `cv`, `jobid`, `created_date`, `status`) VALUES
(1, 'Pranali Darole', 'pranali.darole@wwindia.com', 9321550962, 'Testing', 'Merchant Integration Questionnaires.doc', 1, '2014-05-06', '1');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `currencyID` int(11) NOT NULL AUTO_INCREMENT,
  `currencyName` varchar(255) NOT NULL,
  PRIMARY KEY (`currencyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currencyID`, `currencyName`) VALUES
(1, 'INR'),
(2, 'USD'),
(3, 'SGD');

-- --------------------------------------------------------

--
-- Table structure for table `hdfc_pg_detail`
--

CREATE TABLE IF NOT EXISTS `hdfc_pg_detail` (
  `Merchantid` int(11) NOT NULL,
  `MerchantName` varchar(255) NOT NULL,
  `Trackid` int(11) NOT NULL,
  `Terminalid` int(11) NOT NULL,
  `TerminalAliasName` varchar(255) NOT NULL,
  `Tranportalid` int(11) NOT NULL,
  `Tranportal_password` varchar(255) NOT NULL,
  `CurrencyCodeNumeric` int(11) NOT NULL,
  `CurrencyCodeAlphabetic` varchar(255) NOT NULL,
  `CurrencyCodeExponential` int(11) NOT NULL,
  `Langid` varchar(255) NOT NULL,
  `Action` int(11) NOT NULL,
  `PaymentGateway` varchar(255) NOT NULL,
  `ResponseUrl` varchar(255) NOT NULL,
  `StatusTRANUrl` varchar(255) NOT NULL,
  `SecureUrl` varchar(255) NOT NULL,
  `MerchantConsoleURL` varchar(255) NOT NULL,
  `InstitutionLoginId` varchar(255) NOT NULL,
  `UserId` varchar(255) NOT NULL,
  `ConsolePassword` varchar(255) NOT NULL,
  PRIMARY KEY (`Merchantid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hdfc_pg_detail`
--

INSERT INTO `hdfc_pg_detail` (`Merchantid`, `MerchantName`, `Trackid`, `Terminalid`, `TerminalAliasName`, `Tranportalid`, `Tranportal_password`, `CurrencyCodeNumeric`, `CurrencyCodeAlphabetic`, `CurrencyCodeExponential`, `Langid`, `Action`, `PaymentGateway`, `ResponseUrl`, `StatusTRANUrl`, `SecureUrl`, `MerchantConsoleURL`, `InstitutionLoginId`, `UserId`, `ConsolePassword`) VALUES
(13025, 'Fly Hi Travels', 9000525, 9000525, '9000525', 9000525, 'password1', 356, 'INR', 2, 'USA', 1, 'fss', 'http://www.flyhi.in/getResponse.php', 'http://www.flyhi.in/finalStatus.php', 'https://securepgtest.fssnet.co.in/pgway/servlet/PaymentInitHTTPServlet', 'https://securepgtest.fssnet.co.in/pgway/gateway/Merchant/index.jsp', 'hdfc', 'FLY', 'flyhi!@#123');

-- --------------------------------------------------------

--
-- Table structure for table `jobOpportunities`
--

CREATE TABLE IF NOT EXISTS `jobOpportunities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `experience` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `createdOn` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 for not active and 1 for active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobOpportunities`
--

INSERT INTO `jobOpportunities` (`id`, `title`, `experience`, `description`, `createdOn`, `status`) VALUES
(1, 'PHP Developer(WordPress/Magento/Drupal/Joomla/vtiger/SugarCRM)', '1 to 5 years.', '<ul>\n	<li>\n		Bachelors Degrees in Computer science, IT, software engineering, web development, programming or other subjects</li>\n	<li>\n		Certification in PHP web development, graphics and software programming</li>\n	<li>\n		More specific Diploma, degree or certificate in web development, multimedia design, web design and web content management.</li>\n	<li>\n		A website developer with experience in PHP Development.</li>\n	<li>\n		Customization of themes, installing plugins, modules, and components based on requirements.</li>\n	<li>\n		Scripting dynamic pages using PHP,AJAX</li>\n	<li>\n		Hands on experience of AJAX and OS commerce and tools like Open Cart/ Magneto / Joomla / Drupal / Word press / Zend / Codeigniter / jquery / CakePHP / SugarCRM, vtiger etc. will be added advantage.</li>\n</ul>', '2014-05-06', '1');

-- --------------------------------------------------------

--
-- Table structure for table `newsevents`
--

CREATE TABLE IF NOT EXISTS `newsevents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `createdOn` date NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 for not active and 1 for active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `newsevents`
--

INSERT INTO `newsevents` (`id`, `title`, `createdOn`, `description`, `status`) VALUES
(1, 'JUST ONE CLICK – Going digital - First to introduce a disruptive truly global <br> </br> marine travel booking and travel management E-commerce platform\r\n<br>\r\n<br>\r\n</br>', '2017-06-23', '<p>\r\n	\r\n<br>\r\n\r\n<a href="http://shipmanagementinternational.com/new-innovative-marine-travel-platform-is-launched/" >\r\n\r\n"Ship Management International"\r\n\r\n<br>\r\n</a>\r\n\r\n<a href="http://www.seatrade-maritime.com/news/asia/elektrans-fly-hi-launches-new-online-crew-travel-service.html" >\r\n\r\n"Seatrade Maritime News"\r\n\r\n</a>\r\n\r\n<br>\r\n\r\n<a href="http://www.hellenicshippingnews.com/just-one-click-going-digital-first-to-introduce-a-disruptive-truly-global-marine-travel-booking-and-travel-management-e-commerce-platform/" >\r\n"Hellenic Shipping News"\r\n\r\n<br>\r\n\r\n<a href="http://marinoworld.com.ph/2017/06/27/just-one-click/" >\r\n\r\n"Marinoworld"\r\n\r\n<br>\r\n<a href="http://splash247.com/fly-hi-marine-travel-digital-age/" >\r\n"Splash 24/7"\r\n\r\n<br>\r\n\r\n<a href="http://www.tankeroperator.com/news/e-commerce-travel-solution-for-the-marine-industry/8755.aspx" >\r\n\r\n"Tanker Operator"\r\n\r\n<br>\r\n\r\n<a href="http://www.cnss.com.cn/html/2017/updates_0620/275650.html" >\r\n\r\n"China Shipping Service"\r\n</a>\r\n</p>', '1'),
(2, 'U.K.: Update: Strong winds hit Scotland; disruption to air, ferry, rail, road services <br> <br> expected', '2017-10-03', '<p>\r\nU.K.: Update: Strong winds hit Scotland; disruption to air, ferry, rail, road services expected\r\n<br> \r\nWinds gusting at up to 70mph have caused traffic disruption across Scotland. The Dornoch bridge and the Tay Road Bridge are closed to high sided vehicles and high wind warnings are in place on the Skye, Clackmannanshire and Erskine bridges. The Forth Road Bridge is closed to cyclists and pedestrians.\r\n<br>\r\nA number of ferries have also been canceled, including CalMac services from Oban to Castlebay, Coll and Tiree. Northlink Ferries has also warned of some disruption and a number of cancellations to Pentland Firth sailings.\r\n<br>\r\n\r\nStrong winds were expected across all areas of the country, with gusts of 50-60mph likely to develop quite widely.\r\n\r\n<br>\r\n</p>', '1'),
(4, 'South Africa: Workers of South African Airways threaten to strike this weekend; <br> talks continue', '2017-10-05', '<p>\r\nSouth African Airways (SAA) said late on Tuesday afternoon that it has been served with a notice of intention to start industrial action by a labor union.\r\n<br>\r\nThe industrial action is a consequence of a wage increase disagreement.\r\n<br>\r\n</br>\r\nSAA''s maintenance subsidiary, SAA Technical (SAAT), received a notice of the intention to embark on industrial action at the weekend from one labor union following the tabling of a wage increase proposal by SAAT.\r\n<br>\r\n</br>\r\nParties have held several other meetings since the notice was served and are expected to meet again on Wednesday morning, according to SAA.\r\n <br>\r\n</br>\r\n\r\nSAA said that once it received the notification, it began to review and update its contingency measures to ensure business continuity and to minimize the impact of strike action on its operations.\r\n <br>\r\nThe airline will issue a follow-up communication on Wednesday morning after the meeting with the unions advising whether the strike is in fact taking place or the extent to which the strike has affected its operations if at all.\r\n<br>\r\n</br>\r\n</p>\r\n', '1'),
(6, 'Just One Click - First to introduce a truly global <br>\r\nmarine travel E-commerce booking platform', '2017-04-26', '<a href="https://mandrillapp.com/track/click/30656644/online.flippingbook.com?p=eyJzIjoicm8zcEVuVGNEdkU5ZVlITVdMOUU3N08xOFpjIiwidiI6MSwicCI6IntcInVcIjozMDY1NjY0NCxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL29ubGluZS5mbGlwcGluZ2Jvb2suY29tXFxcL3ZpZXdcXFwvNzc4NjVcXFwvXCIsXCJpZFwiOlwiMzFjYjgwZWQyYTY2NDU0MWE4NjQ1MDg2OWM3ODk1NmFcIixcInVybF9pZHNcIjpbXCJjNzJiMzllYTUyMjQxZWQzN2RlYzc1YTg0Y2UzMjY1YmU0NjliNmMxXCJdfS\r\nJ9">\r\nJUST ONE CLICK BROCHURE\r\n</a>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `production_hdfc_pg_detail`
--

CREATE TABLE IF NOT EXISTS `production_hdfc_pg_detail` (
  `Merchantid` int(11) NOT NULL,
  `MerchantName` varchar(225) NOT NULL,
  `Terminalid` int(11) NOT NULL,
  `TerminalAliasName` varchar(255) NOT NULL,
  `Trackid` int(11) NOT NULL,
  `Tranportalid` int(11) NOT NULL,
  `Tranportal_password` varchar(225) NOT NULL,
  `Langid` varchar(225) NOT NULL,
  `Action` varchar(255) NOT NULL,
  `ResponseUrl` varchar(255) NOT NULL,
  `StatusTRANUrl` varchar(255) NOT NULL,
  `CurrencyCodeNumeric` int(11) NOT NULL,
  `CurrencyCodeAlphabetic` varchar(255) NOT NULL,
  `CurrencyCodeExponential` varchar(11) NOT NULL,
  `currencyId` int(11) NOT NULL,
  `PaymentGateway` varchar(255) NOT NULL,
  `SecureUrl` varchar(255) NOT NULL,
  `MerchantConsoleURL` varchar(255) NOT NULL,
  `InstitutionLoginId` varchar(255) NOT NULL,
  `UserId` varchar(255) NOT NULL,
  `ConsolePassword` varchar(255) NOT NULL,
  PRIMARY KEY (`Merchantid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_hdfc_pg_detail`
--

INSERT INTO `production_hdfc_pg_detail` (`Merchantid`, `MerchantName`, `Terminalid`, `TerminalAliasName`, `Trackid`, `Tranportalid`, `Tranportal_password`, `Langid`, `Action`, `ResponseUrl`, `StatusTRANUrl`, `CurrencyCodeNumeric`, `CurrencyCodeAlphabetic`, `CurrencyCodeExponential`, `currencyId`, `PaymentGateway`, `SecureUrl`, `MerchantConsoleURL`, `InstitutionLoginId`, `UserId`, `ConsolePassword`) VALUES
(14582, 'Fly Hi Travels', 79020447, '79020447', 79020447, 79020447, '79020447', '0', '1', 'http://www.flyhi.in/getResponse.php', 'http://www.flyhi.in/finalStatus.php', 840, 'USD', '2', 2, 'fss', 'https://securepg.fssnet.co.in/pgway/servlet/PaymentInitHTTPServlet', 'https://securepg.fssnet.co.in/pgway/gateway/Merchant/index.jsp', 'hdfcpgway', 'DANIEL', ''),
(14583, 'Fly Hi Travels', 79080027, '79080027', 79080027, 79080027, '79080027', '0', '1', 'http://www.flyhi.in/getResponse.php', 'http://www.flyhi.in/finalStatus.php', 702, 'SGD', '2', 3, 'fss', 'https://securepg.fssnet.co.in/pgway/servlet/PaymentInitHTTPServlet', 'https://securepg.fssnet.co.in/pgway/gateway/Merchant/index.jsp', 'hdfcpgway', 'DANIEL', ''),
(14585, 'Fly Hi Travels', 70008588, '70008588', 70008588, 70008588, '70008588', '0', '1', 'http://www.flyhi.in/getResponse.php', 'http://www.flyhi.in/finalStatus.php', 356, 'INR', '2', 1, 'fss', 'https://securepg.fssnet.co.in/pgway/servlet/PaymentInitHTTPServlet', 'https://securepg.fssnet.co.in/pgway/gateway/Merchant/index.jsp', 'hdfcpgway', 'DANIEL', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `contact` bigint(12) NOT NULL,
  `description` text NOT NULL,
  `paymentId` varchar(255) NOT NULL,
  `paymentUrl` varchar(255) NOT NULL,
  `trackId` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `auth` varchar(225) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `tranId` varchar(50) NOT NULL,
  `status` varchar(225) NOT NULL,
  `tranDate` datetime NOT NULL,
  `result` varchar(225) NOT NULL,
  `errorNo` varchar(225) NOT NULL,
  `message` varchar(255) NOT NULL,
  `currency` varchar(225) NOT NULL,
  `Mode` varchar(50) NOT NULL,
  `PaymentMethod` varchar(225) NOT NULL,
  `RequestID` varchar(225) NOT NULL,
  `SecureHash` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `email`, `address`, `contact`, `description`, `paymentId`, `paymentUrl`, `trackId`, `amount`, `total_amount`, `auth`, `ref`, `tranId`, `status`, `tranDate`, `result`, `errorNo`, `message`, `currency`, `Mode`, `PaymentMethod`, `RequestID`, `SecureHash`) VALUES
(1, 'Pranali Ashok Darole', 'chetantest5@gmail.com', 'Testing', 932155096, '', '8203166491241360', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '413612392939', '7371453491241360', 'NOT CAPTURED', '2014-05-16 07:19:44', '', '', '', '', '', '', '', ''),
(2, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '5018787501241360', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '500.00', '0.00', '', '413687564693', '3617962511241360', 'NOT CAPTURED', '2014-05-16 07:21:10', 'CAPTURED', '', '', '', '', '', '', ''),
(3, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '2319935131341360', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '100.00', '0.00', '', '413626253320', '5989481141341360', 'CAPTURED', '2014-05-16 07:44:09', 'CAPTURED', '', '', '', '', '', '', ''),
(4, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '8105409591441360', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '500.00', '0.00', '', '413683836620', '3671207591441360', 'CAPTURED', '2014-05-16 09:29:57', 'CAPTURED', '', '', '', '', '', '', ''),
(5, 'Jinal Patel', 'jinal.patel@wwindia.com', 'Dadar West Mumbai', 9167358977, '', '7660096241541360', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-16 09:54:53', '', '', '', '', '', '', '', ''),
(6, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '1164450450941390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-19 04:15:03', 'NOT CAPTURED', '', '', '', '', '', '', ''),
(7, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '7585853221041390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '500.00', '0.00', '', '413999354355', '3384748241041390', 'CAPTURED', '2014-05-19 04:54:05', 'CAPTURED', '', '', '', '', '', '', ''),
(8, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '978954321041390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-19 05:02:27', 'NOT CAPTURED', '', '', '', '', '', '', ''),
(9, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '4666886011241390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', 'CANCELED', '2014-05-19 06:31:51', 'NOT CAPTURED', '', '', '', '', '', '', ''),
(10, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no.', 9321550962, '', '6545674361241390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '100.00', '0.00', '', '', '7168677371241390', 'CAPTURED', '2014-05-19 07:07:42', 'CAPTURED', '', '', '', '', '', '', ''),
(11, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '2286205391241390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '10.00', '0.00', '', '', '', 'CANCELED', '2014-05-19 07:09:34', 'NOT CAPTURED', '', '', '', '', '', '', ''),
(12, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '7514555401241390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '50.00', '0.00', '', '413936354898', '2825060401241390', 'CAPTURED', '2014-05-19 07:10:50', 'CAPTURED', '', '', '', '', '', '', ''),
(13, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '553549241341390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '50.00', '0.00', '', '413929471502', '8897396241341390', 'CAPTURED', '2014-05-19 07:54:58', 'CAPTURED', '', '', '', '', '', '', ''),
(14, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '686035251341390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '10.00', '0.00', '', '', '', 'CANCELED', '2014-05-19 07:55:35', 'NOT CAPTURED', '', '', '', '', '', '', ''),
(15, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '4684733471441390', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '10.00', '0.00', '', '413944568804', '7999380471441390', 'CAPTURED', '2014-05-19 09:17:35', 'CAPTURED', '', '', '', '', '', '', ''),
(16, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '4857074460941400', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '10.00', '0.00', '', '414079317308', '896461470941400', 'CAPTURED', '2014-05-20 04:17:29', 'CAPTURED', '', '', '', '', '', '', ''),
(17, 'Jinal patel', 'jinal.patel@wwindia.com', 'Dadar West Mumbai', 9167358977, '', '1320070411441400', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '10.00', '0.00', '', '414061327947', '6079701451441400', 'NOT CAPTURED', '2014-05-20 09:15:43', 'CAPTURED', '', '', '', '', '', '', ''),
(18, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '5167079461641400', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '10.00', '0.00', '', '', '', 'CANCELED', '2014-05-20 11:16:39', 'NOT CAPTURED', '', '', '', '', '', '', ''),
(19, 'pranita kale', 'pranita.kale@wwindia.com', 'asdas dasdasd', 2222222222, '', '9807946031041410', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '1223.00', '0.00', '', '414110378958', '9803127041041410', 'CAPTURED', '2014-05-21 04:34:32', 'CAPTURED', '', '', '', '', '', '', ''),
(20, 'kjsd ksd', 'snd@jc.com', 'kcsd', 146196471041, '', '5228409011141410', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-21 05:31:42', '', '', '', '', '', '', '', ''),
(21, 'kjsd ksd', 'snd@jc.com', 'kcsd', 146196471041, '', '8034943031141410', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '100.00', '0.00', '', '414146395841', '4478295061141410', 'CAPTURED', '2014-05-21 05:36:08', 'CAPTURED', '', '', '', '', '', '', ''),
(22, 'ksdjf ksd', 'dh@ad.com', 'sfv SF zdnc', 3612412642, '', '6631218081141410', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '1000.00', '0.00', '', '', '', '', '2014-05-21 05:42:02', 'NOT CAPTURED', '', '', '', '', '', '', ''),
(23, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '1683940011341410', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '10.00', '0.00', '999999', '414191796608', '1675463021341410', 'CAPTURED', '2014-05-21 07:32:47', 'CAPTURED', '', '', '', '', '', '', ''),
(24, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, '', '1225178331341410', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '5.00', '0.00', '999999', '414196928134', '1018993331341410', 'CAPTURED', '2014-05-21 08:03:37', 'CAPTURED', '', '', '', '', '', '', ''),
(25, 'Jinal Patel', 'jinal.patel@wwindia.com', 'Dadar West', 9167358977, '', '2503939011641410', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-21 10:31:13', '', '', '', '', '', '', '', ''),
(26, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no.', 9321550962, 'Demo Donation', '9851964591641410', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '100.00', '0.00', '999999', '414170061187', '4801969591641410', 'CAPTURED', '2014-05-21 11:29:34', 'CAPTURED', '', '', '', '', '', '', ''),
(27, 'Jinal Patel', 'jinal.patel@wwindia.com', 'Dadar West', 9167358977, 'Against invoice no 0012345', '1220029271941410', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-21 13:57:54', '', '', '', '', '', '', '', ''),
(28, 'cialis online cheap cialis online cheap', 'yaebbakc@ajrbhmil.com', 'cialis online cheap yaebbakc@ajrbhmil.com USA', 67627982791, 'comment5, <a href="http://gardencare.uk.com">viagra online</a>, [url="http://gardencare.uk.com"]viagra online[/url], http://gardencare.uk.com viagra online,  %-O, ', '', '', 9000525, '0.00', '0.00', '', '', '', 'ERROR', '2014-05-22 00:49:00', 'NOT CAPTURED', '', '', '', '', '', '', ''),
(29, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Donation', '5357273491541420', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '10.00', '0.00', '999999', '414273498433', '9872943501541420', 'CAPTURED', '2014-05-22 10:20:27', 'CAPTURED', '', '', '', '', '', '', ''),
(30, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Donation', '4457133021541480', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '1000.00', '0.00', '999999', '414891670373', '9619979031541480', 'CAPTURED', '2014-05-28 09:33:05', 'CAPTURED', '', '', 'INR', '', '', '', ''),
(31, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Donation', '445693111541480', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '100.00', '0.00', '999999', '414868231618', '5709259121541480', 'CAPTURED', '2014-05-28 09:42:03', 'CAPTURED', '', '', 'USD', '', '', '', ''),
(32, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Donation', '3328715141541480', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-28 09:44:51', '', '', '', 'INR', '', '', '', ''),
(33, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Donation', '4154586171541480', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-28 09:47:25', '', '', '', 'INR', '', '', '', ''),
(34, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Donation', '9429651191541480', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-28 09:48:57', '', '', '', 'USD', '', '', '', ''),
(35, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Donation', '4055950211541480', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '0.00', '0.00', '', '', '', '', '2014-05-28 09:51:22', '', '', '', 'INR', '', '', '', ''),
(36, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Donation', '1799598251541480', 'https://securepgtest.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 9000525, '100.00', '0.00', '999999', '414847761754', '11991251541480', 'CAPTURED', '2014-05-28 09:55:28', 'CAPTURED', '', '', 'INR', '', '', '', ''),
(37, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Testing Payment.', '828996271241560', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '100.00', '0.00', '', '', '', 'CANCELED', '2014-06-05 06:58:18', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(38, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Testing Payment', '3824415491341560', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 79020447, '100.00', '0.00', '', '', '', 'CANCELED', '2014-06-05 08:19:59', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(39, 'Pranali Darole', 'chetantest5@gmail.com', 'Unique,Industrial 124 room no. testing', 9321550962, 'Testing Payment', '9796746501341560', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 79080027, '100.00', '0.00', '', '', '', 'CANCELED', '2014-06-05 08:21:07', 'NOT CAPTURED', '', '', 'SGD', '', '', '', ''),
(40, 'Abhishek Bhargava', 'abhishek_bhargava87@yahoo.co.in', 'B-208, Maryland, Plot A7, Scetor-23', 912227713130, 'gdfgdfg', '2471069292341560', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2014-06-05 17:59:49', '', '', '', 'INR', '', '', '', ''),
(41, 'Abhishek Bhargava', 'abhishekbhargava87@gmail.com', 'B-208, Maryland, Sector-23, Nerul', 9969555178, 'air ticket', '4146788311441580', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2014-06-07 09:01:51', '', '', '', 'INR', '', '', '', ''),
(42, 'inltqhhssrh inltqhhssrh', 'pfqeoy@ylngde.com', 'inltqhhssrh pfqeoy@ylngde.com USA', 95932484072, 'mGO7aY  <a href="http://ojooywiagodc.com/">ojooywiagodc</a>, [url=http://wxvateigrcqz.com/]wxvateigrcqz[/url], [link=http://xqpbpuxunnpc.com/]xqpbpuxunnpc[/link], http://zlohqeeyipxb.com/', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2014-07-31 05:19:07', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(43, 'dth dhf', 'hsg@hh.com', 'gsg g g', 1234567890, 'g', '1807977561742300', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2014-08-18 12:26:26', '', '', '', 'INR', '', '', '', ''),
(44, 'kevekxzl kevekxzl', 'hajcck@qvmdma.com', 'kevekxzl hajcck@qvmdma.com USA', 90256303694, 'WmkTll  <a href="http://djdjfymsypsw.com/">djdjfymsypsw</a>, [url=http://xamprqihmvxs.com/]xamprqihmvxs[/url], [link=http://exygaedavmlo.com/]exygaedavmlo[/link], http://zippdigiqrjx.com/', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2015-02-12 21:56:55', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(45, 'pwixiwphxlw pwixiwphxlw', 'nlrhhk@mxvebm.com', 'pwixiwphxlw nlrhhk@mxvebm.com USA', 60113713092, 'Yj51Hb  <a href="http://eqaqxiqclixp.com/">eqaqxiqclixp</a>, [url=http://jxwawnwlokws.com/]jxwawnwlokws[/url], [link=http://juhftfzhgdhc.com/]juhftfzhgdhc[/link], http://umhaomdztucn.com/', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2015-02-13 18:32:34', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(46, 'gtwyorl gtwyorl', 'duwihi@lgnjuh.com', 'gtwyorl duwihi@lgnjuh.com USA', 23980603904, 'Ny74pg  <a href="http://syueoirkyomj.com/">syueoirkyomj</a>, [url=http://gsiczetssfuq.com/]gsiczetssfuq[/url], [link=http://mnyvgxxmjnot.com/]mnyvgxxmjnot[/link], http://wzagxwxxleic.com/', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2015-02-28 04:09:01', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(47, 'vpystapfz vpystapfz', 'kgejxp@qorwdm.com', 'vpystapfz kgejxp@qorwdm.com USA', 20364671142, '46kWqJ  <a href="http://qavzfwustszn.com/">qavzfwustszn</a>, [url=http://ngzcjgbvuiyt.com/]ngzcjgbvuiyt[/url], [link=http://fivyejtsmfsh.com/]fivyejtsmfsh[/link], http://unkrqwpzcvot.com/', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2015-02-28 23:01:13', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(48, 'edgkrirgpr edgkrirgpr', 'rqijrw@nzejgu.com', 'edgkrirgpr rqijrw@nzejgu.com USA', 83729238865, '6sMo5F  <a href="http://hnbpbqoyfayk.com/">hnbpbqoyfayk</a>, [url=http://iozmwlbfbhje.com/]iozmwlbfbhje[/url], [link=http://qbwleoblsjff.com/]qbwleoblsjff[/link], http://jsnjlsjwxzlm.com/', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2015-03-18 07:47:00', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(49, 'pjagpjpko pjagpjpko', 'zryaog@vgsgvk.com', 'pjagpjpko zryaog@vgsgvk.com USA', 28826298132, 'Zdbpf1  <a href="http://xqynbgrhzfoh.com/">xqynbgrhzfoh</a>, [url=http://yvbmkqpjlfhs.com/]yvbmkqpjlfhs[/url], [link=http://rynitsobqgrl.com/]rynitsobqgrl[/link], http://gklnsgwgofwq.com/', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2015-03-19 02:43:59', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(50, 'whaxmcyail whaxmcyail', 'grvxtg@yexycl.com', 'whaxmcyail grvxtg@yexycl.com USA', 51460297536, 'iXMLyI  <a href="http://mjcwithvymkn.com/">mjcwithvymkn</a>, [url=http://roesfckxbbfq.com/]roesfckxbbfq[/url], [link=http://hjtjzllepuoi.com/]hjtjzllepuoi[/link], http://cbihrcnghciz.com/', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2015-04-02 10:06:49', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(51, 'martin GQHCywdVQMFXLcrkcDO', 'julian3d5s@hotmail.com', 'dfrNbMicMOB wZzEaRJuQG USA', 26561434973, 'xXDS21 http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2015-04-26 23:19:27', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(52, 'gordon UlusBwRKRduSZN', 'klark2d4@gmail.com', 'ukKXsfaexbqu JiecdaBuYKl USA', 77555791186, 'RUQRTX http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2015-05-04 10:48:39', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(53, 'Santosh Bhosale', 'bhosale.844@gmail.com', 'Room No-010 Wing-C Rajkupa Rachana Park Chakki Naka Kalyan (E) Maharashtra', 9987826564, '0000', '2501303291651260', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2015-05-06 10:59:40', '', '', '', 'INR', '', '', '', ''),
(54, 'Ghhhfff Gg', 'Sfdjj@gmail.com', 'Gg', 999999999, 'Hshysvshxwhas', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2015-07-14 10:43:51', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(55, 'fadf ada', 'aadfad@adf.dh', 'dfgdfg gb', 526362356235, '235ergewetgwetgwe', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2015-08-04 10:54:50', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(56, 'fadf ada', 'aadfad@adf.dh', 'dfgdfg gb', 526362356235, '235ergewetgwetgwe', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2015-08-04 10:55:10', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(57, 'fsdf sdfsdf', 'asdf@gmail.com', 'sdfasdf', 999999999, '5000', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2015-08-13 03:52:18', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(58, 'ff fsf', 'fsd@famil.in', 'fas', 9585411025, 's5f66', '2744420472252390', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2015-08-27 17:18:12', '', '', '', 'INR', '', '', '', ''),
(59, 'JYOTI BADIANI', 'jbadiani@fly-hi.in', 'shalimar morya park', 9167774798, 'test', '1770853501652790', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2015-10-06 11:20:44', '', '', '', 'INR', '', '', '', ''),
(60, 'bha au', 'baurangabadkar@gmail.com', 'xyz zss', 9892317894, 'rs', '6093053061252800', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2015-10-07 06:36:10', '', '', '', 'INR', '', '', '', ''),
(61, 'JYOTI BADIANI', 'jbadiani@fly-hi.in', 'shalimar', 9167774798, 'invoice', '7751856181552800', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2015-10-07 09:48:33', '', '', '', 'INR', '', '', '', ''),
(62, 'JYOTI B', 'jbadiani@fly-hi.in', 'shalimar', 9167774798, 'invoice', '7250675261552810', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2015-10-08 09:56:05', '', '', '', 'INR', '', '', '', ''),
(63, 'sf sf', 'travelsingh@yahoo.com', 'bjh', 9769548131, 'aCSc', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2015-10-08 12:15:09', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(64, 'sf sfxf', 'travelsingh@yahoo.com', 'bjh', 9769548131, 'aCSc', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2015-10-08 12:15:34', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(65, 'Varsha Aurangabadkar', 'spednekar@fly-hi.in', '310, shalimar morya park Off new link road Opp infinity mall', 9870726550, 'Test payment as per Jyoti mail dtd 09th oct ', '441101341552820', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '100.00', '0.00', '049153', '528270084769', '441101341552820', 'CAPTURED', '2015-10-09 10:08:50', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(66, 'Mark EbiUJDLCrSAaGKZMof', 'mark357177@hotmail.com', 'nmvTepiAPTjzQwuzg XHpCMuWbOPefagiRc USA', 65737841385, 'JkMY7f http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-01-31 20:53:41', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(67, 'Mark aAidnqqMKOBmfbBrwz', 'mark357177@hotmail.com', 'QOGJGJpXGt OtWafOnM USA', 97284348005, 'Yqjgm0 http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-02-01 10:04:16', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(68, 'Mark nsmpkecoIH', 'mark357177@hotmail.com', 'qOOoXAHiYoRnxgNLAzU kKrHFzguCYzLE USA', 70204661400, 'tFiS4h http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-02-01 15:12:50', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(69, 'Mark HeHmqzicgVIZ', 'mark357177@hotmail.com', 'QHJSNBFZW XlYdCteTCxxigs USA', 51843330922, 'mfNvG2 http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-02-02 23:39:03', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(70, 'Mark hGumEgIZHXnYHxD', 'mark357177@hotmail.com', 'knpluHNgTaMXAnJ jVbIXQtox USA', 42932480345, 'Zwk7oo http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-02-04 05:43:51', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(71, 'Mark EvAkrpVKzk', 'mark357177@hotmail.com', 'DcQAYUCIS AUroAWzMELQMDlG USA', 14224633046, 'pbrVth http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-02-07 23:42:36', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(72, 'Mark TtXmBawrzaaTeOCd', 'mark357177@hotmail.com', 'KQQCcFBNJuVv BzZyMmSnGlUKHXE USA', 74613517206, 'zTiFPc http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-02-09 06:02:08', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(73, 'Mark ujnrbJJuvrZEtK', 'mark357177@hotmail.com', 'JCpWIOuJhFsRiw yDPYUITJjlYqFZLGXUx USA', 16715743772, 'EIwqK7 http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-02-09 10:37:16', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(74, 'Mark azMstTUcjbrgdvZfMk', 'mark357177@hotmail.com', 'dxhtnDbaoUa qjMJQtPBXYbx USA', 64345170114, 'PHL1o0 http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-02-11 08:42:51', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(75, 'edypst edypst', 'ldknlx@digmbc.com', 'edypst ldknlx@digmbc.com USA', 29599450239, 'gGboEu  <a href="http://vidbjwkcimxc.com/">vidbjwkcimxc</a>, [url=http://lngxthhdxzfs.com/]lngxthhdxzfs[/url], [link=http://itltymfqwwkn.com/]itltymfqwwkn[/link], http://cssfudujbzim.com/', '', '', 70008588, '0.00', '0.00', '', '', '', 'ERROR', '2016-04-19 04:56:28', 'NOT CAPTURED', '', '', 'INR', '', '', '', ''),
(76, 'JYOTI  BADIANI', 'jbadiani@fly-hi.in', '310 shalimar', 9167774798, 'test', '6860694451461170', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2016-04-26 09:15:47', '', '', '', 'INR', '', '', '', ''),
(77, 'asd dsa', 'das@asadasa.co.in', '123 - aa', 993737373, 'qweqweq', '7538690421361190', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2016-04-28 08:12:22', '', '', '', 'INR', '', '', '', ''),
(78, 'Mark bKgYhEIKYmGzhNQAs', 'mark3qf527@hotmail.com', 'hRTYSvzfHP CnRlrRpsGuRGsGIr USA', 56319106003, 'eTW38q http://www.y7YwKx7Pm6OnyJvolbcwrWdoEnRF29pb.com', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2016-05-11 16:01:18', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(79, 'jdksjf djskf', 'kk@ss.com', 'dfk JFDDKG DFGKJ', 95460596, 'DFJDHF', '4344185551361670', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2016-06-15 03:25:16', '', '', '', 'INR', '', '', '', ''),
(80, 'jdksjf djskf', 'kk@ss.com', 'dfk JFDDKG DFGKJ', 95460596, 'DFJDHF', '2904114561361670', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2016-06-15 03:26:35', '', '', '', 'INR', '', '', '', ''),
(81, 'ketan sangani', 'ketansangani12@gmail.com', 'dsjsjf dssjf jfdkg', 9546549, 'JFDJKGDFJKGJ', '', '', 79020447, '0.00', '0.00', '', '', '', 'ERROR', '2016-06-15 04:28:48', 'NOT CAPTURED', '', '', 'USD', '', '', '', ''),
(82, 'Test Test', 'test@test.com', 'test', 900000000, 'Test', '3151305161761720', 'https://securepg.fssnet.co.in:443/pgway/gateway/payment/payment.jsp', 70008588, '0.00', '0.00', '', '', '', '', '2016-06-20 06:46:01', '', '', '', 'INR', '', '', '', ''),
(83, 'Ketan Sangani', 'kk@ss.com', 'gdfgdfgdfghfhfg', 834908, 'dsfdsfda', '55780701', '', 0, '100.00', '0.00', '', '1466581419', '151645697', '', '2016-06-22 13:14:43', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(84, 'Ketan Sangani', 'ketansangani12@gmail.com', 'gdfgdfgdfghfhfg', 605468, 'jdfkgkjdf', '55783257', '', 0, '400.00', '0.00', '', '1466583942', '151652493', '', '2016-06-22 13:56:40', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(85, 'aJH SAD', 'ketansangani12@gmail.com', 'eroweiori', 3499309, 'ksjfkjsd', '55785463', '', 0, '4000.00', '0.00', '', '1466586106', '151658481', '', '2016-06-22 14:33:11', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(86, 'Ketan Sangani', 'kk@ss.com', 'gdfgdfgdfghfhfg', 5460954, 'dksjfkjsdjk', '55785724', '', 0, '2000.00', '0.00', '', '1466586204', '151659215', '', '2016-06-22 14:37:08', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(87, 'Pranali Darole', 'pranalidarole@yahoo.com', 'sadfsdf', 9321550961, 'dsfdsfsd', '56201413', '', 0, '100.00', '0.00', '', '1467369679', '152923579', '', '2016-07-01 16:32:43', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(88, 'Pranali Darole', 'pranalidarole@yahoo.com', 'sdasd', 9321550961, 'fdasdfasf', '56205951', '', 0, '1.00', '0.00', '', '1467375747', '152937049', '', '2016-07-01 17:53:40', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(89, 'km dsk', 'dsfsdf@ss.com', 'df,gndf', 9348584, 'jkdfhgjfhdg', '56314293', '', 0, '550.00', '0.00', '', '1467616728', '153275657', '', '2016-07-04 12:50:36', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(90, 'Ketan Sangani', 'kk@ss.com', 'gdfgdfgdfghfhfg', 54654654, 'sadasdj', '56315351', '', 0, '650.00', '0.00', '', '1467617737', '153279337', '', '2016-07-04 13:07:34', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(91, 'Ketan Sangani', 'kk@ss.com', 'gdfgdfgdfghfhfg', 54654654, 'sadasdj', '56315351', '', 0, '650.00', '0.00', '', '1467617737', '153279337', '', '2016-07-04 13:07:34', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(92, 'Ketan Sangani', 'kk@ss.com', 'gdfgdfgdfghfhfg', 54654654, 'dfgdf', '56315498', '', 0, '300.00', '0.00', '', '1467617900', '153279736', '', '2016-07-04 13:09:37', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(93, 'Sanka Sarka', 'sankalpa.sarkar@blahblah.com', 'blah', 7506430560, 'sasa', '56499918', '', 0, '100.00', '0.00', '', '1467956138', '153858975', '', '2016-07-08 11:10:41', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(94, 'Pranali Darole', 'pranalidarole@gmail.com', 'Rose Villa', 9321550962, 'Test', '56501666', '', 0, '1.00', '0.00', '', '1467957814', '153867571', '', '2016-07-08 11:37:00', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(95, 'Pranali Darole', 'pranali.darole@wwindia.com', 'Rose Villa', 9321550962, 'Test Transaction', '56503570', '', 0, '1.00', '0.00', '', '1467959533', '153873366', '', '2016-07-08 12:05:09', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(96, 'Pranali Darole', 'pranali.darole@wwindia.com', 'Rose Villa', 9321550962, 'Test Transaction', '56503868', '', 0, '1.00', '0.00', '', '1467959727', '153874328', '', '2016-07-08 12:09:47', 'SUCCESS', '', '', 'INR', '', '', '', ''),
(97, 'Pranali Darole', 'pranali.darole@wwindia.com', 'Rose Villa', 9321550962, 'Test Payment', '56508728', '', 0, '1.00', '0.00', '', '1467964498', '153889081', '', '2016-07-08 13:26:07', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18508920', '29F385B1979BCDD7107B17E4B17567A51156E334664BA90FB099283DCBB5595DAD93A5817889C8CC4F97F4383F59A09AA9FFDFCDBF22829AFED2A9D6FA756DC4'),
(98, 'Pranali Darole', 'pranali.darole@wwindia.com', 'Rose Villa', 9321550962, 'Test Payment', '56508909', '', 0, '1.00', '0.00', '', '1467964586', '153889672', '', '2016-07-08 13:29:32', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18509077', '4AFD82FBBA9718711E84DFE92A571A6AFD20C12B43E691C38EBE5D3E2B6F5A460CA6D8D387F1BE95A5631E8F3A5A69D60E3486B37ED85633CF2966EC67140545'),
(99, 'test sharma', 'test@gmail.com', 'amity conclave', 12365478951, 'Test Transaction', '56515501', '', 0, '1.00', '0.00', '', '1467971535', '153909589', '', '2016-07-08 15:24:23', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18514784', '28C530DEFB543C950C4D1B7D709309750B47D2D2130BBFFE197AF2224FCB759961135F8A38336A899BB74B65D2CCEED8EB22937B2BA8014A39C4C226AD2B76A3'),
(100, 'Test Test', 'test@test.com', 'Test', 91000000, 'Test', '56526627', '', 0, '10.00', '0.00', '', '1467982778', '153947814', '', '2016-07-08 18:32:12', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18524338', 'C5EFA5506DDDFF55C0186C55094FAEABFC13A5DA1128347F64F1062CFD995112C9AC75A6F39EC0FFA6910BE6674FCE9CBDD37F738B1BA73C6A32FF9ED55F4AF4'),
(101, 'Nayan Mestry', 'nayan@gmail.com', 'mahape', 9561134484, 'online', '56543813', '', 0, '9000.00', '0.00', '', '1468036910', '154000292', '', '2016-07-09 09:35:36', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18539232', '86C24CE6B5DE7A3CE44EE1ECD011757ECD174BBDB668682F04884ED6864EB9B55C4C43EA8E1B767EA139C50CED5800E942A9643D0F5BE29BCBAE0C2A17951B0D'),
(102, 'Nayan Lkj', 'abc@gmail.com', 'home, home', 9561134484, 'juhytg', '56543895', '', 0, '90000.00', '0.00', '', '1468037198', '154000534', '', '2016-07-09 09:37:57', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18539305', '35C45E66F11C3C902EEE82B1D737D9117BE96935708C76ABA81FA1F418C01DFF3B4630AF7D76ECED16F39634E57CB35EDF7D235C3FC575F9CD7202D1DC39DD66'),
(103, 'Nayan Lkj', 'nayan.gadvi@paladion.net', 'home, home', 9561134484, 'hbuyg', '56544139', '', 0, '90000.00', '0.00', '', '1468037632', '154001214', '', '2016-07-09 09:44:47', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18539518', '8043070847886D413CC7F8B59DBB8F7C4E8196B883BE93728E6E1754E3FDBBA62A4A5779B8A9E9A3ED44CDA3CDFD2307D0B853B8EEB3AF5CD72BD0CEBFC8938F'),
(104, 'Pranali Darole', 'pranali.darole@wwindia.com', 'Rose Villa', 9351550658, 'Test Payment', '56638949', '', 0, '100.00', '0.00', '', '1468225284', '154295023', '', '2016-07-11 13:54:28', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18621027', 'EED75F88AB8656E74C3ABB62A207658B92C10350E9FA04FB1B22C0ED014889651DB363FDCC3694665523D68A687A099869A8741CD23EF35256159CE195645252'),
(105, 'Pranali Darole', 'pranali.darole@wwindia.com', 'Rose Villa', 9351550658, 'Test', '56643028', '', 0, '100.00', '0.00', '', '1468229867', '154307550', '', '2016-07-11 15:08:53', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18624578', '81FD531338D9D4542F24CB9541FB17D01F33DFF3ADAC48272B88D166A7324221429C1FC88265A7956BAA241801D7A6D3CB2B6D42C67A3A9F6AAE4AB72B80DDC6'),
(106, 'Nayan Gadbad', 'abc@gmail.com', 'home', 9561134484, 'jnnjkjk', '56648752', '', 0, '90.00', '0.00', '', '1468236166', '154324197', '', '2016-07-11 16:55:22', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18629632', '78C1EE5E8AB401A404C65C66E5405984133AAE7A7AA5A30EDAB7EAF35C7902ABC60049ED2278F923A2260D6861B4068FE983D58F00ACF6C8A017465B96763E8B'),
(107, 'Nayan jhgfx', 'nayan.gadvi@paladion.net', 'home, home', 9009090909, 'khgjhh', '56648966', '', 0, '90.00', '0.00', '', '1468236418', '154324803', '', '2016-07-11 16:59:24', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18629821', 'F57CE611A4D2D41A1565FB551139EA78A066B551879D453CC39E2ECB73F317635506D6644CB2C7C8D4BBCC7BC5D8CE6FE17419536CD6FD33D59EDF472A1180EF'),
(108, 'Nayan Lkj', 'abc@gmail.com', 'home, home', 9561134484, 'cash', '56743170', '', 0, '9000.00', '0.00', '', '1468414242', '154624703', '', '2016-07-13 18:23:29', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18717367', 'B0E29B4D72C8A7F6D65757FC97DF01A73CCD29BA275FB80210DAE98BA0E1F5930E51289C83DA6B4A1C863A1F19D8258F3FDB8CDC9B8B232006B534CFFCAE4A19'),
(109, 'Nayan Lkj', 'abc@gmail.com', 'home, home', 9561134484, 'cash', '56743170', '', 0, '9000.00', '0.00', '', '1468414242', '154624703', '', '2016-07-13 18:23:29', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18717367', 'B0E29B4D72C8A7F6D65757FC97DF01A73CCD29BA275FB80210DAE98BA0E1F5930E51289C83DA6B4A1C863A1F19D8258F3FDB8CDC9B8B232006B534CFFCAE4A19'),
(110, 'Nayan Lkj', 'abc@gmail.com', 'home, home', 9561134484, 'bkjghjm', '56743300', '', 0, '90000.00', '0.00', '', '1468414506', '154625046', '', '2016-07-13 18:25:56', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18717470', '39E5F765ECAB410FAB9FA9616B194A786B6461C52790C0E22FFCD8A6CAF095105915EE0BAD2A43ED12BF941B2FFF26460D8044B45A01DD356C3A9EF0DB99011F'),
(111, 'Nayan Lkj', 'nayan.gadvi@paladion.net', 'kgg', 9009090909, 'hgyjgyj', '56769141', '', 0, '9000.00', '0.00', '', '1468476848', '154705354', '', '2016-07-14 11:45:31', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18740126', '8178311277A48EA522FA66EF8FB1D5AB6D065B9B3CFB27507A3CF5190ACEC8A82767BD3D1D804CD5F22A0A309BCB02D55DADDF19C4288176E3C4BEDD3C3ADA97'),
(112, 'Nayan Lkj', 'nayan.gadvi@paladion.net', 'kgg', 9009090909, 'hgyjgyj', '56769141', '', 0, '9000.00', '0.00', '', '1468476848', '154705354', '', '2016-07-14 11:45:31', 'SUCCESS', '', '', 'INR', 'LIVE', '1354', '18740126', '8178311277A48EA522FA66EF8FB1D5AB6D065B9B3CFB27507A3CF5190ACEC8A82767BD3D1D804CD5F22A0A309BCB02D55DADDF19C4288176E3C4BEDD3C3ADA97'),
(113, 'Pranali Darole', 'pranali@karanm.com', '10 A 2 New Sion CHS,\r\nOpp SIES College,', 2224077799, 'Test', '57161028', '', 0, '1.00', '0.00', '', '1469096692', '155937286', '', '2016-07-21 16:03:19', 'SUCCESS', '', '', 'INR', 'LIVE', '1353', '19081163', '1066A69DDEF574F5EB3BFDED63F2E9CBDB57A790C3A698490974B7DA07488058FA94DAF8EF703087A91E84B74C3131524E0E5BCD480B00FD9EBC84F59369C671'),
(114, 'VARSHA Aurangabadkar', 'spednekar@fly-hi.in', '310, Shalimar Morya Park, Off New Link Road, Andheri (W), Mumbai 400053', 9870726550, 'TEST MAIL', '57168425', '', 0, '100.00', '0.00', '', '1469105250', '155958328', '', '2016-07-21 18:19:02', 'SUCCESS', '', '', 'INR', 'LIVE', '1350', '19087770', '1E47AB78BACA2C12B81A42999BC7FC0275C0A0C8E7EA1BDA12887338F5E1FEA15FD33B5CB9F755224AF54D625D30EC7508050942D769A5A6DDFBD98980AED95B'),
(115, 'Vikas Pathania ', 'Voldy82@gmail.com', 'Lower Sunhet , Dehra gopipur, Kangra , Himachal pardesh.', 9920796488, 'Thome management invoice 3 HVDBT &       3 HVDRU.', '60373919', '', 0, '17828.00', '0.00', '', '1474893102', '165745294', '', '2016-09-26 18:08:31', 'SUCCESS', '', '', 'INR', 'LIVE', '1352', '21806555', '17A17BCEC11A2C64DF5560FA87F103514AF4E215EF28D0FC7FABFB738028DE57202BED3B8AD7FEEC4F52A54E0233339F6BE3ECA61CB493EE71B91296CA58CFF7'),
(116, 'FLY HI TRAVELS', 'accounts@fly-hi.in', 'ART GUILD HOUSE, LG A-5, PHOENIX MARKET CITY\r\nL.B.S. MARG, KURLA (W)', 9870726550, 'TEST', '107515220', '', 0, '1.00', '0.00', '', '1531892383', '318003653', '', '2018-07-18 11:12:35', 'SUCCESS', '', '', 'INR', 'LIVE', '1351', '71646172', '647585A03043FAA8DFF87B768B85AADB41D16AC4C966AA233E19EDBFABEC93FBE0A748E5900FF197EE07B516FFE3C2584A04431DB2B06AB32D147CF14C625D6E'),
(117, 'Benjamin Swami', 'radicalben@gmail.com', 'B-903, Pramukh Heights, Veera Desai Road Ext,\r\nAndheri West', 9820948803, 'Payment for ticket', '111761271', '', 0, '64280.00', '0.00', '', '1537173138', '331523069', '', '2018-09-17 14:06:54', 'SUCCESS', '', '', 'INR', 'LIVE', '1350', '76296547', 'E0BC191C40CCA3D57014C43353C76016F39D3CCEEFE8F9583F7F41E1F1D8D2FBE9293F53C9D3AD36104AD0269CBE97CF3BE36A2377ADEE9D5DCC74390AA08F68'),
(118, 'Dinesh  Shetty', 'Shetty.dinesh@ymail.com', 'Chander Mukhi, 6th Floor, Nariman Point Mumbai 400 021', 7722007443, 'USA visa', '112303263', '', 0, '28400.00', '0.00', '', '1537536145', '333263950', '', '2018-09-21 18:57:24', 'SUCCESS', '', '', 'INR', 'LIVE', '1350', '76568371', '370C310A0E71C53CEA7ADDD8E7EA00E7077B016CA6DA260E09CD8865E3584E26F1856B1667132244D450224ED5C500CB389ACBC3B455270EC6213EBAC27026E7'),
(119, 'SORINGLA NINGSHEN', 'soringlaningshen@gmail.com', 'HAMLEIKHONG PO ', 8730933691, 'PAYMENT FOR FLIGHT BOOKING', '115263174', '', 0, '58041.00', '0.00', '', '1541508453', '342988631', '', '2018-11-06 18:37:54', 'SUCCESS', '', '', 'INR', 'LIVE', '1352', '79980204', 'C941ABB5BE86F8CA367B3E9A6A8E1B041C0A83E8A27A4320C3B5BACDAE3151C5D266A19EA0967175CC83D6EF1633DB7C12B7FBDD902931EEC6ABE8664E9558D2'),
(120, 'PANKAJ ANAND', 'panand1@rediffmail.com', 't64 new rohtak road ', 9810313385, 'VZNOMO', '116054778', '', 0, '22000.00', '0.00', '', '1542617740', '345676790', '', '2018-11-19 14:29:17', 'SUCCESS', '', '', 'INR', 'LIVE', '1353', '80909345', '18DE5A6F938AC5F866CDB99CCAD41D5545A4EECAB838D3F1B247D21F37B07E1FE8E7E13E1CAB70916A200370D6C9E7445D4BDAF30EAE8AFD0CD3A828741B81EB'),
(121, 'PANKAJ ANAND', 'panand1@rediffmail.com', 't64 new rohtak road ', 9810313385, 'VZNOMO', '116054778', '', 0, '22000.00', '0.00', '', '1542617740', '345676790', '', '2018-11-19 14:29:17', 'SUCCESS', '', '', 'INR', 'LIVE', '1353', '80909345', '18DE5A6F938AC5F866CDB99CCAD41D5545A4EECAB838D3F1B247D21F37B07E1FE8E7E13E1CAB70916A200370D6C9E7445D4BDAF30EAE8AFD0CD3A828741B81EB'),
(122, 'PANKAJ ANAND', 'panand1@rediffmail.com', 't64 new rohtak road ', 9810313385, 'VZNOMO', '116054778', '', 0, '22000.00', '0.00', '', '1542617740', '345676790', '', '2018-11-19 14:29:17', 'SUCCESS', '', '', 'INR', 'LIVE', '1353', '80909345', '18DE5A6F938AC5F866CDB99CCAD41D5545A4EECAB838D3F1B247D21F37B07E1FE8E7E13E1CAB70916A200370D6C9E7445D4BDAF30EAE8AFD0CD3A828741B81EB'),
(123, 'PANKAJ ANAND', 'panand1@rediffmail.com', 't64 new rohtak road ', 9810313385, 'VZNOMO', '116054778', '', 0, '22000.00', '0.00', '', '1542617740', '345676790', '', '2018-11-19 14:29:17', 'SUCCESS', '', '', 'INR', 'LIVE', '1353', '80909345', '18DE5A6F938AC5F866CDB99CCAD41D5545A4EECAB838D3F1B247D21F37B07E1FE8E7E13E1CAB70916A200370D6C9E7445D4BDAF30EAE8AFD0CD3A828741B81EB');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
