-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2015 at 09:39 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aai`
--
CREATE DATABASE IF NOT EXISTS `aai` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `aai`;

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblanswer`
--

DROP TABLE IF EXISTS `vnvic_tblanswer`;
CREATE TABLE IF NOT EXISTS `vnvic_tblanswer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_id` int(11) NOT NULL,
  `answer_content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblarticle`
--

DROP TABLE IF EXISTS `vnvic_tblarticle`;
CREATE TABLE IF NOT EXISTS `vnvic_tblarticle` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_metatitle` text COLLATE utf8_unicode_ci NOT NULL,
  `article_h1` text COLLATE utf8_unicode_ci NOT NULL,
  `article_description` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `article_title` text COLLATE utf8_unicode_ci NOT NULL,
  `article_header` text COLLATE utf8_unicode_ci NOT NULL,
  `article_image` text COLLATE utf8_unicode_ci NOT NULL,
  `article_content` text COLLATE utf8_unicode_ci NOT NULL,
  `article_allowcomment` tinyint(1) NOT NULL DEFAULT '0',
  `article_fileattach` text COLLATE utf8_unicode_ci NOT NULL,
  `article_tags` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `article_home` tinyint(4) NOT NULL DEFAULT '0',
  `article_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `article_author` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `article_view` int(11) NOT NULL DEFAULT '0',
  `article_visible` tinyint(1) NOT NULL DEFAULT '1',
  `article_datetime` int(11) NOT NULL,
  `article_hot` tinyint(1) NOT NULL DEFAULT '0',
  `article_queu` int(11) NOT NULL,
  `article_urltarget` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `article_rate` tinyint(4) NOT NULL DEFAULT '0',
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `article_comment_privilege` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vnvic_tblarticle`
--

INSERT INTO `vnvic_tblarticle` (`article_id`, `article_metatitle`, `article_h1`, `article_description`, `menu_id`, `article_title`, `article_header`, `article_image`, `article_content`, `article_allowcomment`, `article_fileattach`, `article_tags`, `article_home`, `article_keyword`, `article_author`, `article_view`, `article_visible`, `article_datetime`, `article_hot`, `article_queu`, `article_urltarget`, `article_rate`, `user_name`, `article_comment_privilege`, `lang`) VALUES
(1, 'Thông báo mới về thời gian tiếp nhận hồ sơ Chương trình Đầu tư Quebec', 'Thông báo mới về thời gian tiếp nhận hồ sơ Chương trình Đầu tư Quebec', '', 4, 'Thông báo mới về thời gian tiếp nhận hồ sơ Chương trình Đầu tư Quebec', 'Thông báo mới về thời gian tiếp nhận hồ sơ Chương trình Đầu tư QuebecThông báo mới về thời gian tiếp nhận hồ sơ Chương trình Đầu tư Quebec', 'upload/images/block/left-img-1.png', '', 0, '', '', 0, '', '', 0, 1, 1429063494, 0, 1, '_self', 0, 'administrator', '', 'vi'),
(2, 'New Brunswick thông báo về chiến lược tăng trưởng dân số và kế hoạch di trú trong những năm tới', 'New Brunswick thông báo về chiến lược tăng trưởng dân số và kế hoạch di trú trong những năm tới', '', 4, 'New Brunswick thông báo về chiến lược tăng trưởng dân số và kế hoạch di trú trong những năm tới', '', '', '<div style="border: 0px; margin: 0px; padding: 0px; font-size: 12.00119972229px; color: rgb(32, 32, 32); font-family: Tahoma, Helvetica, Arial, sans-serif; line-height: 16.8016796112061px; text-align: justify;">\r\n	<span style="border: 0px; margin: 0px; padding: 0px; font-size: 14px; font-family: arial;">[<strong style="border: 0px; margin: 0px; padding: 0px;">New Brunswick</strong>] Ch&iacute;nh phủ Tỉnh bang vừa c&ocirc;ng bố Chiến lược tăng trưởng d&acirc;n số mới v&agrave; Kế hoạch di tr&uacute; đối với cộng đồng Ph&aacute;p ngữ đầu ti&ecirc;n từ trước đến nay.<br />\r\n	<br />\r\n	Chiến lược thể hiện biểu đồ gia tăng d&acirc;n số ở New Brunswick l&ecirc;n đến 5,000 người trong v&ograve;ng 3 năm tới th&ocirc;ng qua hồi hương, thu h&uacute;t, duy tr&igrave; v&agrave; nhập cư.<br />\r\n	<br />\r\n	Bộ trưởng Bộ Gi&aacute;o dục sau trung học, Đ&agrave;o tạo v&agrave; Lao động, &ocirc;ng Jody Carr, cho biết: &ldquo;Ch&iacute;nh phủ của ch&uacute;ng t&ocirc;i cam kết ph&aacute;t triển v&agrave; thực thi chiến dịch tăng trưởng kinh tế bằng c&aacute;ch gia tăng d&acirc;n số. Ch&uacute;ng t&ocirc;i tập trung v&agrave;o người d&acirc;n, kỹ năng v&agrave; c&ocirc;ng việc. C&aacute;c chiến lược n&agrave;y sẽ gi&uacute;p x&acirc;y dựng một New Brunswick gi&agrave;u mạnh, đa dạng v&agrave; thịnh vượng hơn cho tất cả những ai xem đ&acirc;y l&agrave; nh&agrave;&rdquo;.<br />\r\n	<br />\r\n	Cả chiến lược v&agrave; kế hoạch h&agrave;nh động đều được xem như l&agrave; những nh&acirc;n tố chủ chốt trong Chiến lược ph&aacute;t triển tay nghề v&agrave; lực lượng lao động của tỉnh bang, bổ trợ cho c&aacute;c chiến lược v&agrave; h&agrave;nh động Ch&iacute;nh phủ đ&atilde; &aacute;p dụng.<br />\r\n	<br />\r\n	Kế hoạch di tr&uacute; đối với cộng đồng Ph&aacute;p ngữ hướng đến việc thu h&uacute;t 33% người d&acirc;n nhập cư n&oacute;i tiếng Ph&aacute;p th&ocirc;ng qua Chương tr&igrave;nh Hỗ trợ Định cư Tỉnh bang năm 2020, phản &aacute;nh r&otilde; hơn ng&ocirc;n ngữ được sử dụng ở tỉnh bang.<br />\r\n	<br />\r\n	Bộ trưởng B&ocirc; T&agrave;i nguy&ecirc;n Thi&ecirc;n nhi&ecirc;n ki&ecirc;m Bộ trưởng cộng đồng Ph&aacute;p ngữ, &ocirc;ng Paul Robichaud, chia sẻ: &ldquo;Với tư c&aacute;ch l&agrave; Ch&iacute;nh phủ, ch&uacute;ng t&ocirc;i tập trung đưa d&acirc;n m&igrave;nh về nước v&agrave; ph&aacute;t triển d&acirc;n số. Ch&uacute;ng t&ocirc;i đang nỗ lực gi&uacute;p c&aacute;c doanh nghiệp tăng trưởng v&agrave; dự &aacute;n kinh doanh ph&aacute;t đạt để c&oacute; thể chi&ecirc;u mộ những c&ocirc;ng d&acirc;n l&agrave;nh nghề quay về l&agrave;m việc tại New Brunswick. Ch&uacute;ng t&ocirc;i cam kết đảm bảo mức tăng trưởng th&ocirc;ng qua di tr&uacute; phản &aacute;nh t&iacute;nh chất của hai c&ocirc;ng đồng ng&ocirc;n ngữ ch&iacute;nh thức ở đất nước ch&uacute;ng t&ocirc;i.&rdquo;<br />\r\n	<br />\r\n	Chiến lược tăng trưởng d&acirc;n số v&agrave; Kế hoạch di tr&uacute; đối với cộng đồng Ph&aacute;p ngữ bao gồm 6 điểm chiến lược:&nbsp;<br />\r\n	<br />\r\n	&bull; Thu h&uacute;t v&agrave; x&uacute;c tiến;<br />\r\n	&bull; Ổn định doanh nghiệp, an cư v&agrave; duy tr&igrave;;<br />\r\n	&bull; Cộng đồng đa dạng v&agrave; to&agrave;n diện;<br />\r\n	&bull; T&iacute;ch hợp chương tr&igrave;nh; v&agrave;&nbsp;<br />\r\n	&bull; Việc di tr&uacute; đối với cộng đồng Ph&aacute;p ngữ<br />\r\n	<br />\r\n	C&aacute;c văn bản tổng kết cho thấy những phản hồi, &yacute; kiến, th&ocirc;ng tin từ c&aacute;c b&ecirc;n hữu quan v&agrave; cộng đồng th&ocirc;ng qua qu&aacute; tr&igrave;nh tham vấn rộng khắp.&nbsp;<br />\r\n	<br />\r\n	Chiến lược v&agrave; kế hoạch h&agrave;nh động sẽ được thực thi trong khoảng thời gian 3 năm kể từ thời điểm n&agrave;y. Bộ Gi&aacute;o dục sau trung học, Đ&agrave;o tạo v&agrave; Lao động (Post-Secondary Education, Training and Labour - PETL) sẽ giới thiệu một loại thị thực tạm thời (Provisional Visa - PV) th&iacute; điểm (d&agrave;nh cho doanh nh&acirc;n định cư) theo Chương tr&igrave;nh Hỗ trợ Định cư Tỉnh bang. Loại thị thực n&agrave;y sẽ tập trung v&agrave;o việc:<br />\r\n	<br />\r\n	&bull; Thu h&uacute;t những doanh nh&acirc;n hỗ trợ tốt nhất cho ưu thế kinh tế Canada<br />\r\n	&bull; Th&uacute;c đẩy sự tham gia v&agrave;o c&aacute;c lĩnh vực chủ chốt<br />\r\n	<br />\r\n	Năm 1: PETL sẽ l&agrave;m việc với Ch&iacute;nh phủ Li&ecirc;n bang để triển khai v&agrave; cho ra mắt loại thị thực tạm thời th&iacute; điểm 3 năm v&agrave; t&iacute;ch cực th&uacute;c đẩy loại n&agrave;y trong tất cả c&aacute;c sự kiện tuyển dụng quốc tế trong v&ograve;ng 3 năm tới.<br />\r\n	<br />\r\n	Năm 2: PETL sẽ thu h&uacute;t 15 ứng vi&ecirc;n cho loại thị thực tạm thời trong năm 2 v&agrave; năm 3 của dự &aacute;n th&iacute; điểm.<br />\r\n	<br />\r\n	Năm 3: PETL sẽ ph&aacute;t triển hệ thống đ&aacute;nh gi&aacute; để đo lường th&agrave;nh c&ocirc;ng của dự &aacute;n thị thực tạm thời th&iacute; điểm như một c&ocirc;ng cụ nhằm thu h&uacute;t v&agrave; giữ ch&acirc;n c&aacute;c doanh nh&acirc;n nhập cư ở New Brunswick v&agrave; xem x&eacute;t t&iacute;nh khả thi đối với việc mở rộng chương tr&igrave;nh.</span><br />\r\n	&nbsp;</div>\r\n<div style="border: 0px; margin: 0px; padding: 0px; font-size: 12.00119972229px; color: rgb(32, 32, 32); font-family: Tahoma, Helvetica, Arial, sans-serif; line-height: 16.8016796112061px; text-align: right;">\r\n	<span style="border: 0px; margin: 0px; padding: 0px; font-size: 14px; font-family: ''times new roman'';"><em style="border: 0px; margin: 0px; padding: 0px;">Nguồn: NB-PN</em></span></div>\r\n', 0, '', '', 0, '', '', 0, 1, 1429063467, 0, 2, '_self', 0, 'administrator', '', 'vi'),
(3, 'Quy định mới về người phụ thuộc sẽ có những thay đổi bắt đầu từ ngày 01/08/2014', 'Quy định mới về người phụ thuộc sẽ có những thay đổi bắt đầu từ ngày 01/08/2014', '', 4, 'Quy định mới về người phụ thuộc sẽ có những thay đổi bắt đầu từ ngày 01/08/2014', '', '', '<p>\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">[</span><strong style="border: 0px; margin: 0px; padding: 0px; font-size: 14px; color: rgb(32, 32, 32); font-family: arial; line-height: 19.6000003814697px; text-align: justify;">Canada</strong><span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">] Quy định mới về c&aacute;c người con phụ thuộc của Đương đơn sẽ c&oacute; những thay đổi bắt đầu hiệu lực từ ng&agrave;y 1 th&aacute;ng 8 năm 2014 trong khu&ocirc;n khổ c&aacute;c chương tr&igrave;nh di tr&uacute; của Bộ Quốc tịch v&agrave; Di tr&uacute; Canada - CIC.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Độ tuổi được xem l&agrave; con c&aacute;i phụ thuộc giảm từ dưới 22 tuổi xuống c&ograve;n dưới 19 tuổi.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Ngoại lệ đối với sinh vi&ecirc;n theo học c&aacute;c chương tr&igrave;nh đ&agrave;o tạo to&agrave;n thời gian cũng bị gỡ bỏ. C&aacute;c con của đương đơn từ 19 tuổi trở l&ecirc;n, c&ograve;n phụ thuộc v&agrave;o t&agrave;i ch&iacute;nh của cha mẹ v&agrave; đang theo học c&aacute;c chương tr&igrave;nh đ&agrave;o tạo to&agrave;n thời gian sẽ kh&ocirc;ng c&ograve;n đủ điều kiện để được xem l&agrave; con c&aacute;i phụ thuộc.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Trong mọi trường hợp, bất kể độ tuổi, một người con được xem l&agrave; phụ thuộc nếu phải lệ thuộc v&agrave;o t&agrave;i ch&iacute;nh của cha mẹ do bệnh l&yacute; t&acirc;m thần hoặc thể chất.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Việc giảm độ tuổi quy định đối với con c&aacute;i phụ thuộc xuống dưới 19 tuổi trong Quy chế Di Tr&uacute; v&agrave; Bảo vệ người Tị nạn (Immigration and Refugee Protection Regulations - IRPR) gi&uacute;p Quy chế ph&ugrave; hợp với kh&aacute;i niệm &quot;th&agrave;nh ni&ecirc;n&quot; của Tỉnh bang, hiện ở khoảng 18 v&agrave; 19 tuổi theo quy định ở khắp c&aacute;c Tỉnh bang v&agrave; v&ugrave;ng l&atilde;nh thổ.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Thanh thiếu ni&ecirc;n c&oacute; thể nộp hồ sơ di tr&uacute; Canada theo c&aacute;c diện d&agrave;nh ri&ecirc;ng cho họ, chẳng hạn như sinh vi&ecirc;n nước ngo&agrave;i hoặc c&aacute;c chương tr&igrave;nh kinh tế.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Tất cả c&aacute;c hồ sơ xin thường tr&uacute; nh&acirc;n nộp trước ng&agrave;y 01 th&aacute;ng 8 năm 2014 đang tồn đọng tại CIC sẽ tiếp tục được hưởng lợi từ quy định trước khi c&oacute; những thay đổi về con c&aacute;i phụ thuộc.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">C&aacute;c biện ph&aacute;p chuyển tiếp cho ph&eacute;p c&aacute;c đương đơn thuộc c&aacute;c chương tr&igrave;nh thường tr&uacute; nh&acirc;n bao gồm nhiều giai đoạn đang trong qu&aacute; tr&igrave;nh di tr&uacute; nhưng chưa nộp đơn xin thường tr&uacute; nh&acirc;n v&agrave;o thời điểm c&aacute;c quy định n&agrave;y c&oacute; hiệu lực v&agrave;o ng&agrave;y 1 th&aacute;ng t&aacute;m năm 2014 c&oacute; thể ho&agrave;n th&agrave;nh hồ sơ của họ dựa tr&ecirc;n c&aacute;c quy định trước đ&oacute; về con c&aacute;i phụ thuộc.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">C&aacute;c biện ph&aacute;p chuyển tiếp sẽ được &aacute;p dụng cho c&aacute;c nh&oacute;m nhất định, bao gồm:</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull;&nbsp;&nbsp; &nbsp;Ứng vi&ecirc;n trong Chương tr&igrave;nh Hỗ trợ Định cư Tỉnh bang;&nbsp;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull;&nbsp;&nbsp; &nbsp;Ứng vi&ecirc;n đ&atilde; nộp hồ sơ một trong c&aacute;c chương tr&igrave;nh kinh tế của Quebec;&nbsp;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull;&nbsp;&nbsp; &nbsp;Nh&acirc;n vi&ecirc;n chăm s&oacute;c sức khoẻ nội tr&uacute;;&nbsp;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull;&nbsp;&nbsp; &nbsp;Người tị nạn ở nước ngo&agrave;i v&agrave; c&aacute;c b&ecirc;n tranh chấp tị nạn;&nbsp;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull;&nbsp;&nbsp; &nbsp;C&aacute;c trường hợp thuộc c&aacute;c chương tr&igrave;nh nh&acirc;n đạo của Quebec;&nbsp;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull;&nbsp;&nbsp; &nbsp;&Ocirc;ng b&agrave;, cha mẹ c&oacute; hồ sơ bảo l&atilde;nh đ&atilde; được tiếp nhận trước ng&agrave;y 5 th&aacute;ng 11 năm 2011; v&agrave;&nbsp;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull;&nbsp;&nbsp;&nbsp; Người tị nạn do c&aacute; nh&acirc;n bảo l&atilde;nh c&oacute; hồ sơ đ&atilde; được tiếp nhận trước ng&agrave;y 18 th&aacute;ng 10 năm 2012.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Ngo&agrave;i ra, t&iacute;nh đến ng&agrave;y 01 th&aacute;ng 8 năm 2014, để đảm bảo cho con c&aacute;i của c&aacute;c đương đơn đ&atilde; đ&aacute;p ứng c&aacute;c quy định về con c&aacute;i phụ thuộc trong giai đoạn đầu ti&ecirc;n của chương tr&igrave;nh thường tr&uacute; nh&acirc;n bao gồm nhiều giai đoạn vẫn đủ điều kiện trong suốt một qu&aacute; tr&igrave;nh x&eacute;t duyệt k&eacute;o d&agrave;i nhiều năm, độ tuổi của con c&aacute;i của c&aacute;c đương đơn sẽ được &quot;chốt&quot; ở giai đoạn ch&iacute;nh thức đầu ti&ecirc;n trong qu&aacute; tr&igrave;nh di tr&uacute;. V&iacute; dụ, tuổi của một người con c&oacute; cha mẹ nộp hồ sơ theo Chương tr&igrave;nh Hỗ trợ Đề cử Tỉnh bang sẽ được &quot;chốt&quot; v&agrave;o ng&agrave;y nộp hồ sơ cho Tỉnh bang.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<em style="border: 0px; margin: 0px; padding: 0px; font-size: 14px; color: rgb(32, 32, 32); font-family: arial; line-height: 19.6000003814697px; text-align: justify;"><span style="border: 0px; margin: 0px; padding: 0px; font-family: ''times new roman'';">Nguồn: CIC</span></em></p>\r\n', 0, '', '', 0, '', '', 0, 1, 1429063478, 0, 3, '_self', 0, 'administrator', '', 'vi'),
(4, 'Chương trình Định cư Tỉnh bang Quebec', 'Chương trình Định cư Tỉnh bang Quebec', '', 18, 'Chương trình Định cư Tỉnh bang Quebec', '', 'upload/images/block/left-img-1.png', '<p>\r\n	Bộ Di tr&uacute; Quebec vừa ban h&agrave;nh quy định mới li&ecirc;n quan đến thủ tục tiếp nhận v&agrave; x&eacute;t duyệt hồ sơ xin Giấy chứng nhận được lựa chọn của Quebec (Certificat de s&eacute;lection du Qu&eacute;bec) đối với c&aacute;c Diện Đầu tư (Investor), Diện Kinh doanh (Entrepreneur), Diện Tự doanh (Self-employer) v&agrave; Diện Skilled workers. Những quy định mới được đưa v&agrave;o &aacute;p dụng kể từ ng&agrave;y 1 th&aacute;ng 4 năm 2014.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Quy định về số lượng tiếp nhận tối đa hồ sơ xin cấp Giấy chứng nhận được chọn lựa Quebec sẽ được hạn chế nhằm giải quyết lượng lớn hồ sơ tồn đọng cũng như r&uacute;t ngắn thời gian thụ l&yacute; hồ sơ.</p>\r\n<p>\r\n	<img alt="" src="http://aai.dev/template/templates/aai/img/quebec-img.jpg" title="" /></p>\r\n', 0, '', '', 1, '', '', 0, 1, 1429063496, 0, 4, '_self', 0, 'administrator', '', 'vi'),
(5, 'New Brunswick thông báo về chiến lược tăng trưởng dân số và kế hoạch di trú trong những năm tới', 'New Brunswick thông báo về chiến lược tăng trưởng dân số và kế hoạch di trú trong những năm tới', '', 24, 'New Brunswick thông báo về chiến lược tăng trưởng dân số và kế hoạch di trú trong những năm tới', '', '', '<p>\r\n	<strong style="border: 0px; margin: 0px; padding: 0px; font-size: 14px; color: rgb(32, 32, 32); font-family: arial; line-height: 19.6000003814697px; text-align: justify;">New Brunswick</strong><span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">] Ch&iacute;nh phủ Tỉnh bang vừa c&ocirc;ng bố Chiến lược tăng trưởng d&acirc;n số mới v&agrave; Kế hoạch di tr&uacute; đối với cộng đồng Ph&aacute;p ngữ đầu ti&ecirc;n từ trước đến nay.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Chiến lược thể hiện biểu đồ gia tăng d&acirc;n số ở New Brunswick l&ecirc;n đến 5,000 người trong v&ograve;ng 3 năm tới th&ocirc;ng qua hồi hương, thu h&uacute;t, duy tr&igrave; v&agrave; nhập cư.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Bộ trưởng Bộ Gi&aacute;o dục sau trung học, Đ&agrave;o tạo v&agrave; Lao động, &ocirc;ng Jody Carr, cho biết: &ldquo;Ch&iacute;nh phủ của ch&uacute;ng t&ocirc;i cam kết ph&aacute;t triển v&agrave; thực thi chiến dịch tăng trưởng kinh tế bằng c&aacute;ch gia tăng d&acirc;n số. Ch&uacute;ng t&ocirc;i tập trung v&agrave;o người d&acirc;n, kỹ năng v&agrave; c&ocirc;ng việc. C&aacute;c chiến lược n&agrave;y sẽ gi&uacute;p x&acirc;y dựng một New Brunswick gi&agrave;u mạnh, đa dạng v&agrave; thịnh vượng hơn cho tất cả những ai xem đ&acirc;y l&agrave; nh&agrave;&rdquo;.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Cả chiến lược v&agrave; kế hoạch h&agrave;nh động đều được xem như l&agrave; những nh&acirc;n tố chủ chốt trong Chiến lược ph&aacute;t triển tay nghề v&agrave; lực lượng lao động của tỉnh bang, bổ trợ cho c&aacute;c chiến lược v&agrave; h&agrave;nh động Ch&iacute;nh phủ đ&atilde; &aacute;p dụng.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Kế hoạch di tr&uacute; đối với cộng đồng Ph&aacute;p ngữ hướng đến việc thu h&uacute;t 33% người d&acirc;n nhập cư n&oacute;i tiếng Ph&aacute;p th&ocirc;ng qua Chương tr&igrave;nh Hỗ trợ Định cư Tỉnh bang năm 2020, phản &aacute;nh r&otilde; hơn ng&ocirc;n ngữ được sử dụng ở tỉnh bang.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Bộ trưởng B&ocirc; T&agrave;i nguy&ecirc;n Thi&ecirc;n nhi&ecirc;n ki&ecirc;m Bộ trưởng cộng đồng Ph&aacute;p ngữ, &ocirc;ng Paul Robichaud, chia sẻ: &ldquo;Với tư c&aacute;ch l&agrave; Ch&iacute;nh phủ, ch&uacute;ng t&ocirc;i tập trung đưa d&acirc;n m&igrave;nh về nước v&agrave; ph&aacute;t triển d&acirc;n số. Ch&uacute;ng t&ocirc;i đang nỗ lực gi&uacute;p c&aacute;c doanh nghiệp tăng trưởng v&agrave; dự &aacute;n kinh doanh ph&aacute;t đạt để c&oacute; thể chi&ecirc;u mộ những c&ocirc;ng d&acirc;n l&agrave;nh nghề quay về l&agrave;m việc tại New Brunswick. Ch&uacute;ng t&ocirc;i cam kết đảm bảo mức tăng trưởng th&ocirc;ng qua di tr&uacute; phản &aacute;nh t&iacute;nh chất của hai c&ocirc;ng đồng ng&ocirc;n ngữ ch&iacute;nh thức ở đất nước ch&uacute;ng t&ocirc;i.&rdquo;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Chiến lược tăng trưởng d&acirc;n số v&agrave; Kế hoạch di tr&uacute; đối với cộng đồng Ph&aacute;p ngữ bao gồm 6 điểm chiến lược:&nbsp;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull; Thu h&uacute;t v&agrave; x&uacute;c tiến;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull; Ổn định doanh nghiệp, an cư v&agrave; duy tr&igrave;;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull; Cộng đồng đa dạng v&agrave; to&agrave;n diện;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull; T&iacute;ch hợp chương tr&igrave;nh; v&agrave;&nbsp;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull; Việc di tr&uacute; đối với cộng đồng Ph&aacute;p ngữ</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">C&aacute;c văn bản tổng kết cho thấy những phản hồi, &yacute; kiến, th&ocirc;ng tin từ c&aacute;c b&ecirc;n hữu quan v&agrave; cộng đồng th&ocirc;ng qua qu&aacute; tr&igrave;nh tham vấn rộng khắp.&nbsp;</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Chiến lược v&agrave; kế hoạch h&agrave;nh động sẽ được thực thi trong khoảng thời gian 3 năm kể từ thời điểm n&agrave;y. Bộ Gi&aacute;o dục sau trung học, Đ&agrave;o tạo v&agrave; Lao động (Post-Secondary Education, Training and Labour - PETL) sẽ giới thiệu một loại thị thực tạm thời (Provisional Visa - PV) th&iacute; điểm (d&agrave;nh cho doanh nh&acirc;n định cư) theo Chương tr&igrave;nh Hỗ trợ Định cư Tỉnh bang. Loại thị thực n&agrave;y sẽ tập trung v&agrave;o việc:</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull; Thu h&uacute;t những doanh nh&acirc;n hỗ trợ tốt nhất cho ưu thế kinh tế Canada</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">&bull; Th&uacute;c đẩy sự tham gia v&agrave;o c&aacute;c lĩnh vực chủ chốt</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Năm 1: PETL sẽ l&agrave;m việc với Ch&iacute;nh phủ Li&ecirc;n bang để triển khai v&agrave; cho ra mắt loại thị thực tạm thời th&iacute; điểm 3 năm v&agrave; t&iacute;ch cực th&uacute;c đẩy loại n&agrave;y trong tất cả c&aacute;c sự kiện tuyển dụng quốc tế trong v&ograve;ng 3 năm tới.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Năm 2: PETL sẽ thu h&uacute;t 15 ứng vi&ecirc;n cho loại thị thực tạm thời trong năm 2 v&agrave; năm 3 của dự &aacute;n th&iacute; điểm.</span><br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<br style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;" />\r\n	<span style="color: rgb(32, 32, 32); font-family: arial; font-size: 14px; line-height: 19.6000003814697px; text-align: justify;">Năm 3: PETL sẽ ph&aacute;t triển hệ thống đ&aacute;nh gi&aacute; để đo lường th&agrave;nh c&ocirc;ng của dự &aacute;n thị thực tạm thời th&iacute; điểm như một c&ocirc;ng cụ nhằm thu h&uacute;t v&agrave; giữ ch&acirc;n c&aacute;c doanh nh&acirc;n nhập cư ở New Brunswick v&agrave; xem x&eacute;t t&iacute;nh khả thi đối với việc mở rộng chương tr&igrave;nh.</span></p>\r\n', 0, '', '', 0, '', '', 0, 1, 1405566281, 0, 5, '_self', 0, 'administrator', '', 'vi');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblarticlecomment`
--

DROP TABLE IF EXISTS `vnvic_tblarticlecomment`;
CREATE TABLE IF NOT EXISTS `vnvic_tblarticlecomment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `comment_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cus_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comment_content` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` int(11) NOT NULL,
  `comment_visible` tinyint(4) NOT NULL DEFAULT '0',
  `comment_read` tinyint(4) NOT NULL DEFAULT '0',
  `ip_address` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `vnvic_tblarticlecomment`
--

INSERT INTO `vnvic_tblarticlecomment` (`comment_id`, `article_id`, `comment_title`, `cus_name`, `cus_email`, `comment_content`, `comment_date`, `comment_visible`, `comment_read`, `ip_address`) VALUES
(1, 92, 'Bình luận bài viết', 'Lê Sỹ Hùng', 'soledad2410@gmail.com', 'ádasdasdasd', 1314561374, 1, 1, '10.93.58.51'),
(3, 92, 'Bình luận bài viết', 'Lê Sỹ Hùng', 'soledad2410@gmail.com', 'ádasdasdasd', 1314561374, 1, 1, '10.93.58.51'),
(4, 92, 'Bình luận bài viết', 'Lê Sỹ Hùng', 'soledad2410@gmail.com', 'ádasdasdasd', 1314561374, 1, 1, '10.93.58.51'),
(5, 92, 'Bình luận bài viết', 'Lê Sỹ Hùng', 'soledad2410@gmail.com', 'ádasdasdasd', 1314561374, 1, 1, '10.93.58.51'),
(6, 92, 'Bình luận bài viết', 'Lê Sỹ Hùng', 'soledad2410@gmail.com', 'ádasdasdasd', 1314561374, 1, 1, '10.93.58.51');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblconfig`
--

DROP TABLE IF EXISTS `vnvic_tblconfig`;
CREATE TABLE IF NOT EXISTS `vnvic_tblconfig` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `config_module` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `config_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `config_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `config_prototype` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `config_active` tinyint(4) NOT NULL DEFAULT '1',
  `default_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=126 ;

--
-- Dumping data for table `vnvic_tblconfig`
--

INSERT INTO `vnvic_tblconfig` (`config_id`, `config_name`, `config_module`, `config_type`, `config_title`, `config_prototype`, `config_active`, `default_value`) VALUES
(99, 'article_page', 'news', 'textbox', 'Số bản tin tối đa trên một trang tin', '', 1, ''),
(100, 'other_article', 'news', 'textbox', 'Số bản tin liên quan tối đa', '', 1, ''),
(103, 'product_page', 'product', 'number', 'Số lượng dự án trên 1 trang danh mục', '', 1, ''),
(106, 'list_product_style', 'product', 'radio', 'Kiểu hiển thị sản phẩm', 'Mặc định:default|Dạng lưới:grid|Dạng danh sách:grid', 0, ''),
(107, 'other_product', 'product', 'number', 'Số lượng dự án cùng loại hiển thị', '', 1, ''),
(1, 'web_title', 'home', 'textbox', 'Tiêu đề trang chủ', '', 1, ''),
(2, 'web_keyword', 'home', 'textarea', 'Thẻ meta keyword trang chủ', '', 1, ''),
(3, 'web_active', 'home', 'checkbox', 'Website hoạt động', 'hoạt động:1', 1, ''),
(5, 'web_notice', 'home', 'ckeditor', 'Thông báo website khi ngừng hoạt động', '', 1, ''),
(7, 'web_description', 'home', 'textarea', 'Thẻ meta description trang chủ', '', 1, ''),
(8, 'web_banner', 'home', 'ckeditor', 'Banner website', '', 1, ''),
(9, 'web_logo', 'home', 'filefield', 'logo website', '', 1, ''),
(12, 'contact_mail', 'email', 'textbox', 'Email liên hệ website', '', 1, ''),
(13, 'smtp_server', 'email', 'textbox', 'Địa chỉ server mail smtp dùng gửi email', '', 1, ''),
(14, 'smtp_acc', 'email', 'textbox', 'Tài khoản smtp server dùng gửi email', '', 1, ''),
(15, 'smtp_pwd', 'email', 'password', 'Mật khẩu tài khoản smtp dùng gửi email', '', 1, ''),
(16, 'send_mail', 'email', 'radio', 'Phương thức gửi email', 'Mặc định server:default_server|Sử dụng tài khoản smtp:smtp', 0, ''),
(17, 'web_h1', 'home', 'textbox', 'Thẻ h1 trang chủ', '', 1, ''),
(18, 'web_footer', 'home', 'ckeditor', 'Thông tin liên hệ website footer', '', 1, ''),
(112, 'order_info', 'order', 'ckeditor', 'Thông tin gửi đơn hàng', '', 1, ''),
(113, 'contact_info', 'contact', 'ckeditor', 'Thông tin liên hệ website', '', 1, ''),
(114, 'web_tip', 'home', 'textbox', 'Website tip', '', 1, ''),
(116, 'smtp_port', 'email', 'textbox', 'Mail server post', '', 1, ''),
(117, 'smtp_protocol', 'email', 'textbox', 'Mail server protocol', '', 1, ''),
(118, 'email_reply', 'email', 'textbox', 'Địa chỉ email nhận email trả lời', '', 1, ''),
(119, 'reply_name', 'email', 'textbox', 'Tên người nhận email phản hồi', '', 1, ''),
(120, 'email_send', 'email', 'textbox', 'Địa chỉ email gửi email', '', 1, ''),
(121, 'send_name', 'email', 'textbox', 'Tên người gửi email', '', 1, ''),
(122, 'web_tags', 'home', 'textarea', 'Tag website(cách nhau bởi dấu ",")', '', 1, ''),
(123, 'news_autotag', 'news', 'radio', 'Tự động đặt tag trong bài viết', 'Không:0|Tự động:1', 0, ''),
(124, 'system_active', '', '', '', '', 1, '1'),
(125, 'contact_email', 'contact', 'textbox', 'Địa chỉ email gửi liên hệ', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblconfigvalue`
--

DROP TABLE IF EXISTS `vnvic_tblconfigvalue`;
CREATE TABLE IF NOT EXISTS `vnvic_tblconfigvalue` (
  `config_id` int(11) NOT NULL,
  `lang_shortname` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `config_value` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`config_id`,`lang_shortname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vnvic_tblconfigvalue`
--

INSERT INTO `vnvic_tblconfigvalue` (`config_id`, `lang_shortname`, `config_value`) VALUES
(99, 'vi', '2'),
(100, 'vi', '10'),
(112, 'vi', '<p>\n	<strong><span style="font-weight: bold;">Radar</span>: 4 hệ thống rađa mạng đa năng, c&oacute; thể tương đương với loại được lắp đặt tr&ecirc;n c&aacute;c t&agrave;u khu trục Type 052C lớp Luyang-II</strong></p>\n<p>\n	<strong><span style="font-weight: bold;">Xuất xứ</span>: Varyag l&agrave; một t&agrave;u s&acirc;n bay đa chức năng lớp Kuznetsov từng thuộc Li&ecirc;n X&ocirc;. N&oacute; được khởi c&ocirc;ng đ&oacute;ng ng&agrave;y 6/12/1985 v&agrave; được hạ thủy ng&agrave;y 4/12/1988.</strong></p>\n<p>\n	<strong>C&ocirc;ng ty du lịch Chong Lot, được tin l&agrave; b&igrave;nh phong cho Qu&acirc;n đội Giải ph&oacute;ng Nh&acirc;n d&acirc;n Trung Quốc (PLAN), đ&atilde; mua Varyag với gi&aacute; 20 triệu trong một cuộc đấu gi&aacute; năm 1998. Chong Lot khi đ&oacute; tuy&ecirc;n bố rằng sẽ cải tạo con t&agrave;u th&agrave;nh một trung t&acirc;m giải tr&iacute; v&agrave; s&ograve;ng bạc nổi ở Macau. Tr&ecirc;n thực tế, Varyag đ&atilde; được t&acirc;n trang để trở th&agrave;nh t&agrave;u s&acirc;n bay t&agrave;u ti&ecirc;n của Trung Quốc.</strong></p>\n'),
(103, 'vi', '4'),
(112, 'en', ''),
(106, 'vi', 'default'),
(107, 'vi', '4'),
(1, 'vi', 'AAI'),
(2, 'vi', 'AAI'),
(3, 'vi', '1'),
(5, 'vi', ''),
(7, 'vi', ''),
(8, 'vi', ''),
(9, 'vi', 'upload/images/logo/logo-top.png'),
(12, 'vi', ''),
(13, 'vi', 'smtp.gmail.com'),
(14, 'vi', ''),
(15, 'vi', 'lythithuong'),
(16, 'vi', 'default_server'),
(17, 'vi', ''),
(18, 'vi', '<p class="strong">\n	C&ocirc;ng ty Cổ phần Đầu tư T&agrave;i ch&iacute;nh Quốc tế v&agrave; Ph&aacute;t triển Doanh nghiệp IDJ</p>\n<p>\n	Địa chỉ: Tầng 16 T&ograve;a nh&agrave; văn ph&ograve;ng Charmvit Tower, 117 Trần Duy Hưng, Phường Trung H&ograve;a, Quận Cầu Giấy, H&agrave; Nội</p>\n<p>\n	ĐT: 04.3555.8999 | Fax: 04.3555.8990 | MST: 0102 186 593 | Website: <a href="www.idjf.vn" title="">www.idjf.vn</a></p>\n'),
(113, 'en', ''),
(113, 'vi', '<div>\n	AAI CANADA</div>\n<div>\n	&nbsp;</div>\n<div>\n	Địa chỉ: 96 MacEwan Park Rise NW, Calgary AB T3K 4A1, Canada</div>\n<div>\n	Hotline Quebec: +1 (514) 894 0181</div>\n<div>\n	Hotline Vietnam: +0199 8888 199</div>\n<div>\n	Website: www.aaicanada.com</div>\n<div>\n	&nbsp;</div>\n<div>\n	&nbsp;</div>\n<div>\n	&nbsp;</div>\n'),
(125, 'en', ''),
(125, 'vi', 'smtpwebmaisl@gmail.com'),
(116, 'en', ''),
(114, 'en', ''),
(114, 'vi', 'Chào mừng đến thăm website'),
(116, 'vi', '465'),
(117, 'en', ''),
(117, 'vi', 'ssmtp'),
(118, 'en', ''),
(118, 'vi', ''),
(119, 'en', ''),
(119, 'vi', 'admin'),
(120, 'en', ''),
(120, 'vi', ''),
(121, 'en', ''),
(121, 'vi', ''),
(122, 'en', ''),
(122, 'vi', ''),
(123, 'en', '0'),
(123, 'vi', '0'),
(1, 'en', 'Wood Pallet in Vietnam'),
(2, 'en', ''),
(3, 'en', '1'),
(5, 'en', '<p>\n	Website tạm ngừng hoạt động</p>\n'),
(7, 'en', 'wood pallet,plastic pallet'),
(8, 'en', '<div id="logo">\n	<img atl="Logo Hascon" height="63" src="upload/images/logo/logo-hascon.png" width="194" /></div>\n<h2 class="slogan">\n	WOOD PALLET IN VIETNAM</h2>\n'),
(9, 'en', ''),
(17, 'en', 'Wood Pallet in Vietnam'),
(18, 'en', '<div id="foo-nav">\n	<ul>\n		<li>\n			<a href="#" title="Home">Home</a></li>\n		<li>\n			<a href="#" title="About Us">About Us</a></li>\n		<li>\n			<a href="#" title="Products">Products</a></li>\n		<li>\n			<a href="#" title="News">News</a></li>\n		<li>\n			<a href="#" title="Contact Us">Contact Us</a></li>\n	</ul>\n</div>\n<div class="line-foo">\n	<h2>\n		&copy;2012 C&ocirc;ng ty cổ phần Hascon.</h2>\n	<h3>\n		All rights reserved. Contact: email - info@hascon.vn</h3>\n</div>\n<div class="line-foo">\n	<h3>\n		Địa chỉ: 142 L&ecirc; Duẩn, Đống Đa, H&agrave; Nội | Điện thoại: 04 6285 7828 | Fax: 04 3640 5786</h3>\n</div>'),
(99, 'en', '10'),
(100, 'en', '4');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblcontact`
--

DROP TABLE IF EXISTS `vnvic_tblcontact`;
CREATE TABLE IF NOT EXISTS `vnvic_tblcontact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_address` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_content` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_datetime` int(11) NOT NULL,
  `contact_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `file_attach` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact_read` tinyint(4) NOT NULL DEFAULT '0',
  `ip_address` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `contact_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=133 ;

--
-- Dumping data for table `vnvic_tblcontact`
--

INSERT INTO `vnvic_tblcontact` (`contact_id`, `contact_user`, `contact_email`, `contact_address`, `contact_content`, `contact_datetime`, `contact_phone`, `file_attach`, `contact_read`, `ip_address`, `department_id`, `contact_title`) VALUES
(130, 'Lê Hùng', 'soledad2410@gmail.com', 'thọ xuân - thanh hóa', 'liên hệ test liên hệ test lorem ipsum dolo sit amet', 1423561391, '0984504580', '', 0, '127.0.0.1', 0, 'test liên hệ'),
(131, 'Lê hùng', 'soledad2410@gmail.com', 'thọ xuân thanh hóa', 'lorem ipsum dolo sit amet', 1423561584, '0984504580', '', 0, '127.0.0.1', 0, 'test liên hệ tiếp'),
(132, 'Lê Hùng', 'soledad2410@gmail.com', 'thanh hóa', 'test gửi liên hệ\r\n', 1427689962, '0984504580', '', 0, '127.0.0.1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblcounter`
--

DROP TABLE IF EXISTS `vnvic_tblcounter`;
CREATE TABLE IF NOT EXISTS `vnvic_tblcounter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `ip` varchar(17) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `session_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `counter_name` (`time`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=330 ;

--
-- Dumping data for table `vnvic_tblcounter`
--

INSERT INTO `vnvic_tblcounter` (`id`, `time`, `ip`, `session_id`) VALUES
(1, 1427162126, '127.0.0.1', '5j261ne8mpnf7227ugflpe9qv1'),
(2, 1427162269, '127.0.0.1', '5j261ne8mpnf7227ugflpe9qv1'),
(3, 1427162395, '127.0.0.1', '5j261ne8mpnf7227ugflpe9qv1'),
(4, 1427163653, '127.0.0.1', '5j261ne8mpnf7227ugflpe9qv1'),
(5, 1427166662, '127.0.0.1', '73656u4cu6vn6nd602qg3tbsk4'),
(6, 1427181126, '127.0.0.1', 'o7bci9il3coc2sl649a2e9eq16'),
(7, 1427182723, '127.0.0.1', 'dbkrch2c6t55fqkipq5ihqv5p4'),
(8, 1427333144, '127.0.0.1', 'gdshgo8l4o9iqo2bni5lgdgjb4'),
(9, 1427334245, '127.0.0.1', 'gdshgo8l4o9iqo2bni5lgdgjb4'),
(10, 1427385899, '127.0.0.1', '6jrqqo929pv0r3q1n15rvtkpc6'),
(11, 1427438228, '127.0.0.1', 'gqftpc9lkk74vg4uvff61gjlk1'),
(12, 1427448355, '127.0.0.1', 'gqftpc9lkk74vg4uvff61gjlk1'),
(13, 1427449002, '127.0.0.1', 'gqftpc9lkk74vg4uvff61gjlk1'),
(14, 1427449360, '127.0.0.1', 'snhpbrrj7puqge1l8leqcgp265'),
(15, 1427451314, '127.0.0.1', 'gqftpc9lkk74vg4uvff61gjlk1'),
(16, 1427453367, '127.0.0.1', 'gqftpc9lkk74vg4uvff61gjlk1'),
(17, 1427454000, '127.0.0.1', 'gqftpc9lkk74vg4uvff61gjlk1'),
(18, 1427454618, '127.0.0.1', 'gqftpc9lkk74vg4uvff61gjlk1'),
(19, 1427454732, '127.0.0.1', '2931c4gp6nqa221tqqmlss3jp1'),
(20, 1427512908, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(21, 1427513694, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(22, 1427514305, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(23, 1427514916, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(24, 1427516199, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(25, 1427516812, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(26, 1427517468, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(27, 1427518080, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(28, 1427519153, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(29, 1427519766, '127.0.0.1', '5npppujmaa7s447h5g0ng4c667'),
(30, 1427679252, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(31, 1427680362, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(32, 1427681898, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(33, 1427682640, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(34, 1427683289, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(35, 1427683968, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(36, 1427684574, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(37, 1427685213, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(38, 1427686643, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(39, 1427687329, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(40, 1427688392, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(41, 1427689460, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(42, 1427690110, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(43, 1427698388, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(44, 1427699013, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(45, 1427699876, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(46, 1427700582, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(47, 1427701184, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(48, 1427701794, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(49, 1427702624, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(50, 1427703230, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(51, 1427703916, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(52, 1427704990, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(53, 1427706396, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(54, 1427707037, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(55, 1427707722, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(56, 1427708402, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(57, 1427709252, '127.0.0.1', 'r3g5gv3lc45r3of2n3ov8iaec7'),
(58, 1427765864, '127.0.0.1', 'eu47fien06fp0sqp7p6tf75313'),
(59, 1427770931, '127.0.0.1', 'eu47fien06fp0sqp7p6tf75313'),
(60, 1427772336, '127.0.0.1', 'eu47fien06fp0sqp7p6tf75313'),
(61, 1427773383, '127.0.0.1', 'eu47fien06fp0sqp7p6tf75313'),
(62, 1427783413, '127.0.0.1', 'n2ega1daiuk68eubmqcn0oab93'),
(63, 1427784668, '127.0.0.1', 'o6l7jc3hbbhooq09denpus2sd1'),
(64, 1427787532, '127.0.0.1', 'n2ega1daiuk68eubmqcn0oab93'),
(65, 1427788609, '127.0.0.1', 'n2ega1daiuk68eubmqcn0oab93'),
(66, 1427795248, '127.0.0.1', 'n2ega1daiuk68eubmqcn0oab93'),
(67, 1427854699, '127.0.0.1', '06is24keqn8mt6j54p6sgccui6'),
(68, 1427855412, '127.0.0.1', '06is24keqn8mt6j54p6sgccui6'),
(69, 1427858926, '127.0.0.1', '06is24keqn8mt6j54p6sgccui6'),
(70, 1427961130, '127.0.0.1', 'beq6pspbt0iagvtjomji0l7cs3'),
(71, 1427962299, '127.0.0.1', '7lnn197cqjphm6sj1qsvfkkba3'),
(72, 1427963193, '127.0.0.1', 'v1700ce5pjs919m0r6n9da3do2'),
(73, 1428024112, '127.0.0.1', '2n8vjiv5qqnu7h3r5mt2rqi1n5'),
(74, 1428024986, '127.0.0.1', '2n8vjiv5qqnu7h3r5mt2rqi1n5'),
(75, 1428042154, '127.0.0.1', '2n8vjiv5qqnu7h3r5mt2rqi1n5'),
(76, 1428046382, '127.0.0.1', '2n8vjiv5qqnu7h3r5mt2rqi1n5'),
(77, 1428048014, '127.0.0.1', '2n8vjiv5qqnu7h3r5mt2rqi1n5'),
(78, 1428051443, '127.0.0.1', '2n8vjiv5qqnu7h3r5mt2rqi1n5'),
(79, 1428112105, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(80, 1428113922, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(81, 1428115091, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(82, 1428116623, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(83, 1428118192, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(84, 1428119386, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(85, 1428120205, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(86, 1428121470, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(87, 1428122361, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(88, 1428122964, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(89, 1428123808, '127.0.0.1', 'hurgnesa90a5pjftnriu3p0nj1'),
(90, 1428124368, '14.160.90.38', 'vqs28hl3nqq1570u14b72n57p5'),
(91, 1428124479, '123.30.175.154', 'l7ccirnosutoa6vmqnr8m9m3c7'),
(92, 1428124483, '123.30.175.154', 'n55bbtbrn4a6intibuco5ukud4'),
(93, 1428124491, '123.30.175.150', 'edt1tce825sqehsqe590gfbgn0'),
(94, 1428125462, '66.249.71.244', 'eslhnr3e83rteoguo3701bnll2'),
(95, 1428129807, '66.249.71.244', '6i5kovltnjesgqn4ikd6b0ps01'),
(96, 1428134710, '66.249.71.227', '81ncqn5q0e5v77hvlom2m8eis1'),
(97, 1428141699, '66.249.71.6', '2r8n12f1ck7vquu5c7boj2alq0'),
(98, 1428144066, '66.249.71.227', '4osslpt8d3a5da4rn4ng5tbc65'),
(99, 1428144118, '66.249.71.6', '64iogv0rqjonhefbdum2of7vq7'),
(100, 1428147434, '208.107.46.20', 'hdu03ap9mbnl7er29ci8ht0jm0'),
(101, 1428147518, '208.107.46.20', '704ero7s14t2ehegskslslosh1'),
(102, 1428147525, '208.107.46.20', 'flvtslobjqmo0lqdq0geb05uj4'),
(103, 1428147531, '208.107.41.62', 'itj5jegafg0mm9kspukn4potm1'),
(104, 1428147537, '208.107.41.62', 'tjranfh49i4n7fdh2dnq2vfrs2'),
(105, 1428147543, '208.107.46.20', 'sjhdlb4i4sns2a2u8oqdbgqbe2'),
(106, 1428147548, '208.107.46.20', 'f7193cdg5f6u740oo8ks76dvd4'),
(107, 1428147559, '208.107.46.20', 'l4kvmcqpss5r2jcur73qbf0nv6'),
(108, 1428147564, '208.107.46.20', 'or842tfl9hbku8hgn871tegah1'),
(109, 1428147574, '208.107.46.20', 'vcho1ncmgh1e9u0h2002ouq700'),
(110, 1428147580, '208.107.46.20', 'h6qk588lncud7o7teeere9k0s5'),
(111, 1428147589, '208.107.46.20', 'oqk3tegch83i5qktjndijjqe74'),
(112, 1428147598, '208.107.41.62', 'rtgt12e1at904k3riaveuojd16'),
(113, 1428147604, '208.107.46.20', 'enr0u9garvke6q4an18drlvp57'),
(114, 1428147610, '208.107.46.20', 'spi7rf61jbql0ptkq4v8d40o25'),
(115, 1428147615, '208.107.41.62', '66smgfl1s3fah10521bcj24s07'),
(116, 1428147621, '208.107.41.62', 'f4sd9lcjmb0scsdse9u3toq973'),
(117, 1428147627, '208.107.41.62', '6ogvccu69hp7rdj3nbk2agbp07'),
(118, 1428147633, '208.107.41.62', 'vifrgu0aqcf1pl1aavid41ru66'),
(119, 1428147748, '208.107.46.20', 'lprj3dkrqrc8ek0m121ts6t027'),
(120, 1428147754, '208.107.46.20', 'q2v0r4lgef6aoorm6ng1nk5971'),
(121, 1428147760, '208.107.46.20', 'dacvb7ersc0f4j08kagkd7jtg1'),
(122, 1428147771, '208.107.41.62', 'l7k6oogiu8tjqs97aegqccc9q6'),
(123, 1428147777, '208.107.46.20', 'amipaqtm2gj7vp9qr46njfkjd5'),
(124, 1428147783, '208.107.46.20', 'unfh5cbiirnvs8meralp4pgep7'),
(125, 1428147789, '208.107.46.20', 'drrn9f947q673mfpnua4e99cf5'),
(126, 1428147795, '208.107.41.62', 'ie8m5jmvfiso8grq76rhgaq1t5'),
(127, 1428147801, '208.107.46.20', 'oq1hkgddh8s60cujm338j3hjf7'),
(128, 1428147807, '208.107.46.20', '27iadra244lo7lriufoesgovn0'),
(129, 1428147845, '208.107.46.20', 'aps3uajnandhu2b5dmnrrvifj4'),
(130, 1428147851, '208.107.46.20', '866dfcs3r69urj6lrucc87cv70'),
(131, 1428147857, '208.107.46.20', '0oif57c3l6j36sv7s89iprn3f0'),
(132, 1428147878, '208.107.46.20', '8gklejunn9lt4qkfvuqnjhja83'),
(133, 1428147883, '208.107.41.62', 'r186vf5do6qsu32te1vqdfsf36'),
(134, 1428147902, '208.107.41.62', 't6tpcp1nhph6c99g8lhst61je1'),
(135, 1428147908, '208.107.46.20', 'uhda965m84p7gogidvmrqfv9k2'),
(136, 1428148691, '148.251.124.174', 'oqbqlcl8m9s27i94glms2jrgr1'),
(137, 1428148705, '148.251.124.174', 'l893hhq9blvuo7hv3kefak06l1'),
(138, 1428148717, '148.251.124.174', 'ql904i3s7f05akdf95qt76v2u4'),
(139, 1428148731, '148.251.124.174', 'kvr9i4s18ejo6v5k0jje9uko80'),
(140, 1428148737, '148.251.124.174', '8b4lka4vmps3evp1qrsn3omu17'),
(141, 1428148743, '148.251.124.174', '2lhhrda07p5fs54d7mi6nlib83'),
(142, 1428148749, '148.251.124.174', '4ct78u0kss728fdcbic21s8ab7'),
(143, 1428148754, '148.251.124.174', 'nd427tagl6q4ugi0uaa50vktd2'),
(144, 1428148761, '148.251.124.174', '071sv7bsj96sap5461prkc4785'),
(145, 1428148777, '148.251.124.174', 'r461tjkbeu4hn1d5ao31sd1u07'),
(146, 1428148783, '148.251.124.174', 'm63hqsuqf2oe8p5t9jjtjfrv31'),
(147, 1428148790, '148.251.124.174', 'o0e520pqdgvaqca8aq98955442'),
(148, 1428148797, '148.251.124.174', '2b4187dhfq70iih95c289t6tu5'),
(149, 1428148811, '148.251.124.174', 'nor2k08emnopbsumtka3o2rhq4'),
(150, 1428148822, '148.251.124.174', 'oum7ktu9gee3vjq6p8uelilks1'),
(151, 1428148828, '148.251.124.174', 'kkd193to8da9sm4d2c60u631r6'),
(152, 1428148837, '148.251.124.174', 'jt8gi934jktpm97fcg6kuf7tn7'),
(153, 1428148843, '148.251.124.174', '0rrts80uujmtaggl08ijvu2vg3'),
(154, 1428148858, '148.251.124.174', 'm2t570a7a0ltkk8fs26kpovif0'),
(155, 1428148871, '148.251.124.174', '9uf7jgem34m5486r1211j2iq81'),
(156, 1428148889, '148.251.124.174', 'o2cmukb3cscd8dc9h84gsakcr3'),
(157, 1428148908, '148.251.124.174', '70n057s3re88rnoc3fva1lupc5'),
(158, 1428148923, '148.251.124.174', 'ge2i81his854m4316kobrv97l4'),
(159, 1428148939, '148.251.124.174', 'g3vsfhtlrje6ma3g7p7dkr3ag0'),
(160, 1428148975, '148.251.124.174', '653ufra8qlvvb2oj99s4kp3rd5'),
(161, 1428148985, '148.251.124.174', 'e9ckm39ka0a292at7sar0saqb4'),
(162, 1428148996, '148.251.124.174', '1fhc75j49kopc9p77cmtmcr0r5'),
(163, 1428149008, '148.251.124.174', '4mpsm2j7ms7sn4huo4ae0tmbf7'),
(164, 1428149015, '148.251.124.174', '0duui1ln52lhta47s514dksq63'),
(165, 1428149026, '148.251.124.174', 'lj04baf72sgjskjnvg6f72bqv1'),
(166, 1428149034, '148.251.124.174', 'jkdd5qbjl2jcskv0r9od8ksfg2'),
(167, 1428149042, '148.251.124.174', 'vu4aoumdo04eq5j45l06jm3mr4'),
(168, 1428149049, '148.251.124.174', 'ficifr8hirgrtcnajr6d410f82'),
(169, 1428149108, '148.251.124.174', 'aouffc4don6oitia4l5pg97br6'),
(170, 1428149155, '148.251.124.174', 'fnl89e4v7djs1rjmdt1bkghu82'),
(171, 1428149195, '148.251.124.174', 'i56okika5usk3jc97ser0av3u6'),
(172, 1428150802, '66.249.71.227', 'l0un5lq2fvgk0mugk9umpi0f15'),
(173, 1428151056, '66.249.71.6', 'sj4c5ilb6g3lh8su40s5gbl5c7'),
(174, 1428154487, '5.255.253.155', '7ohadqjnojgdjvp73j58fmjoe6'),
(175, 1428154496, '5.255.253.202', 't3qidndvanivneh3kievg2kuh0'),
(176, 1428155720, '66.249.71.244', 'b0c42qhnek65b9kc1fp4f1fcp5'),
(177, 1428156745, '66.249.71.6', 'c9oipcu4lbcf463otq91ki0j17'),
(178, 1428158534, '66.249.71.6', 'pfo8tie2b1c5hgr1ujknljufm1'),
(179, 1428160839, '66.249.71.227', 'p62bqvv7nqgnogotnifmjuovm4'),
(180, 1428171337, '210.211.107.136', 'rmk1bhkslefiqdka6elts8qd92'),
(181, 1428174195, '206.253.226.23', '6okg0vad72esgjo5rhld1uvgn5'),
(182, 1428183531, '210.211.107.136', 'j7hk0ug98dioigcv8jdm56qqv0'),
(183, 1428186949, '180.76.5.191', 'c1j3kfphhmj5uqv1v5n6n2m4i2'),
(184, 1428190684, '66.249.71.6', 'gffbgs1vlii3fjqsqbutvj48g1'),
(185, 1428197447, '66.249.71.244', 'ls5hfbslhp9qj0dfptb8hr4v61'),
(186, 1428204819, '123.30.175.153', 'rhpo5a6os3h9n8uu6oeqiko0o7'),
(187, 1428204833, '123.30.175.153', '67214v12ke7hhb78hqibrjoov7'),
(188, 1428204837, '123.30.175.156', 'auc355bfdq185lodikelhnoul7'),
(189, 1428205782, '210.211.107.136', 'np581e1u9huqr1us6auejefoj6'),
(190, 1428219871, '180.76.6.148', 'a28kuql86ejem3qcq0vl10udh1'),
(191, 1428229607, '148.251.124.174', '2pj8amcion3p55ltt4ov9kiva6'),
(192, 1428229648, '148.251.124.174', 'ht0sb2gv4kjr8idguhvgb5dmt7'),
(193, 1428229920, '216.189.147.30', 'aojb0h01abg3ru8g8k35slmf25'),
(194, 1428229929, '216.189.147.30', 'itp8e82693kd4unus2gt8v4v46'),
(195, 1428229943, '216.189.147.30', 'gpetgjhhjm8i24rg21ek13lor0'),
(196, 1428229950, '216.189.147.30', 'fce1574cb8fqaouc8rlmu5ulr0'),
(197, 1428229958, '216.189.147.30', 'n75r9t6mimc5gvlj1m0gudui15'),
(198, 1428229977, '216.189.147.30', 'uo0rkjmajb7ar3l4p1r3f2gq47'),
(199, 1428229989, '216.189.147.30', '7k735foclhjka0lpum7insme36'),
(200, 1428230002, '216.189.147.30', 'abo7vephigcnonpv4k1q0qcel4'),
(201, 1428230008, '216.189.147.30', 'e07q6sn7559frhnmurhou7pol7'),
(202, 1428230018, '216.189.147.30', 'lgs5ldhg9h5lgq3rgv10t8f0o5'),
(203, 1428234503, '180.76.6.136', 'pvaqrlmv8rl6jqv3ubekjv8735'),
(204, 1428243395, '66.249.71.244', '8fbvi6gp4739nic7p7j670ntu2'),
(205, 1428243595, '66.249.71.6', 'gn9mvggqtiha4e05mhkrtal8d7'),
(206, 1428243796, '66.249.79.126', '9mrj179g9uk2glhm3u5dbdava7'),
(207, 1428244176, '66.249.71.244', 's8cchsi7eeuf8c0g9jkujq92j3'),
(208, 1428244355, '66.249.71.244', 'utet8l4ph91omrrb0dgkfuuh13'),
(209, 1428244532, '66.249.71.244', 'euuvahcjo8r84qdhgdompqpr13'),
(210, 1428244713, '66.249.71.244', 'e9cfq4kbk07sgegdkeqm3uhm46'),
(211, 1428244895, '66.249.71.6', 'bgiml4dbsv5moss0gur4hsl9s0'),
(212, 1428249393, '66.249.71.6', 'a54h5ihr7q9g62akm5e45egft5'),
(213, 1428249579, '66.249.71.6', '8puns4s70e7vug7lv63ef74im2'),
(214, 1428249766, '66.249.71.244', 'rr6kjs2mm1gor220ac6dverqi4'),
(215, 1428249950, '66.249.71.244', 'q9s02oqejk2e9rukcuu98osvg6'),
(216, 1428250141, '66.249.71.244', '8fhnp58boot67dau4vf6ptmo64'),
(217, 1428250330, '66.249.71.227', '2ksi0ml9icjclj7bcl7jkbd5s7'),
(218, 1428250519, '66.249.71.244', 'r9mhceh516uv26i9ak1cnmfbg1'),
(219, 1428250707, '66.249.71.6', 'i6iudpg1b7oseo7urhiphhnp55'),
(220, 1428250886, '66.249.71.6', 'pf1nfis5qr3fhls1rvlp1dfoa4'),
(221, 1428251047, '66.249.71.244', '5m2apj6jl012lu7esqk3temd62'),
(222, 1428251208, '66.249.71.6', 'o7bks3ju0nh03f22g92jh8cqc6'),
(223, 1428251375, '66.249.71.227', '4rs1vi59tbrka5q6tj2ojg6g94'),
(224, 1428251540, '66.249.71.227', 'l0kocpas1rv7391ldorjsgpv22'),
(225, 1428251705, '66.249.71.244', '3kunvllsb5aj7831efdpmnkjn2'),
(226, 1428251878, '66.249.71.244', 'jds3l006a3j2vbrq3uvsgb39t5'),
(227, 1428252049, '66.249.71.244', '33ihloii69vjrsr7kavnmknl83'),
(228, 1428252410, '66.249.71.6', '3sppdhl1p2150vnauginsujbs2'),
(229, 1428253174, '66.249.71.6', '8kdd3a12tgapced4jn45kd6316'),
(230, 1428253367, '66.249.71.6', '1u67r3vglq0fposopne3ik42o5'),
(231, 1428253560, '66.249.71.6', 'ej49mq84huu8ducmihu92g0up0'),
(232, 1428253759, '66.249.71.6', 'bd1f81p4p5u1650sfr0m0lt6g4'),
(233, 1428253958, '66.249.71.6', 'ehk1o738frugfm6upd4ilffl72'),
(234, 1428254156, '66.249.71.244', 'hsmafaqocalpknta6u94ddbnm4'),
(235, 1428254355, '66.249.71.244', 'e2gu7vptfmr6ssueje967b8kj6'),
(236, 1428254528, '66.249.71.6', '1usg0db6ret3orvom3qhbpkub1'),
(237, 1428254661, '66.249.71.6', '8lcbn6s1lt73ada6t8fm9kp1m1'),
(238, 1428254821, '66.249.71.227', '9sbavm9q8ne92th1i0iijhp150'),
(239, 1428254990, '66.249.79.110', 'amr8da0nnj0ge59u58iegvhui7'),
(240, 1428256048, '66.249.71.244', 'r71nh253cn5gm74agvrghnc3s6'),
(241, 1428256228, '66.249.71.244', 'pcvadt92ikb61878d9ku4a72l5'),
(242, 1428256412, '66.249.71.227', 'ma6ai7277atakuma772rmlf6l7'),
(243, 1428256595, '66.249.71.227', 'r4qfcuurq07ml4k6jdh77tf4m4'),
(244, 1428256783, '66.249.71.227', 'sk9spk1atkk264tfm9fbfr8rq7'),
(245, 1428256969, '66.249.71.244', 'ul449vtmmchhdsi2tenlerb310'),
(246, 1428257349, '66.249.71.6', '330i6ids2s5bmll7gd92inmes2'),
(247, 1428257540, '66.249.71.227', 'r9ep0nubn9l89sjc2dgfsfarj5'),
(248, 1428257731, '66.249.71.244', 'bjm0s9kj6c2jefrn0tlf0nj2n3'),
(249, 1428257922, '66.249.71.6', 'bm1ptqnha5lnese20b7k0ejjc6'),
(250, 1428258304, '66.249.79.110', 'eeqfembija8oc0rblim1c2cnd6'),
(251, 1428258655, '66.249.79.118', '74fmllhajfqkgkolus2c94nkm4'),
(252, 1428260407, '66.249.71.244', 'va3o92vlpf3rr8jdoo0tsns3h5'),
(253, 1428260607, '66.249.71.244', '7pd369nvr1oe5nuq7ie01r4fo1'),
(254, 1428261007, '66.249.71.6', '3pc4hanl8e9fild00sea35dln2'),
(255, 1428261207, '66.249.71.227', 'ont7vqv8834q6d2q0bm76m4va6'),
(256, 1428261407, '66.249.71.227', 'vrgr3ing0mep9pvkn4ibi19ot3'),
(257, 1428261589, '66.249.71.227', 'o0rnomh5fr3fhdmogbjfsnca55'),
(258, 1428261773, '66.249.71.244', 'sslunpll7vstme9s1ln991jgv3'),
(259, 1428261935, '66.249.71.244', '4jd75d5bq4f71dqlu3b3sidch2'),
(260, 1428262114, '66.249.71.244', 'ioas21hrts215fk504sdgqkbc5'),
(261, 1428262293, '66.249.71.227', 'du1tvjnb5b62df8iodi3bbn510'),
(262, 1428262478, '66.249.71.6', 'nkhsm7jn9gb7gip24mi00b60l0'),
(263, 1428262665, '66.249.71.227', 'q2a0m0eg1aj9e3bp6bhj8m7dm5'),
(264, 1428263641, '66.249.71.6', 's8c6l59g5e827k59epnqm0nub2'),
(265, 1428264039, '66.249.71.244', 'ldfta89pbgrriett88164lh5p0'),
(266, 1428264242, '66.249.71.6', '8gs7pjjhosu5tmkgcm91vdqiq2'),
(267, 1428264648, '66.249.79.126', 'sphp67tccma32ubsd289nf7pr4'),
(268, 1428265363, '180.76.6.53', 'vk916qh48fqpkktc5enh1dg4g1'),
(269, 1428267613, '66.249.79.118', 'ip9u16n9cvsu17cbjg81l3qch7'),
(270, 1428270750, '66.249.71.227', '3vgnoodqbfncjoulq94jf2mb37'),
(271, 1428277105, '66.249.71.244', 'rntddk6q9nphqlnnm9jsrfqae2'),
(272, 1428277526, '66.249.71.244', '7jva6gmftk124j5f2htgu5bdt5'),
(273, 1428280889, '66.249.71.244', 'jl1vjhl0b2hguk06lrc36f50c1'),
(274, 1428283363, '66.249.71.227', 'qb1u69do3lfoo64i2brmr1kg13'),
(275, 1428285722, '123.30.175.150', 'olitm3u4v6isooakgkrff0nnt3'),
(276, 1428285725, '123.30.175.150', '7jee3qm4rvoc81v01t59qrr2g0'),
(277, 1428285736, '123.30.175.153', 'hadan9knsp8avc0la15pjckqt1'),
(278, 1428287216, '66.249.71.6', 'phq6u9qkcrcms6col23viej7a5'),
(279, 1428289702, '142.4.213.178', 'ev2drri4t7mu4q1hapqkkfm510'),
(280, 1428289714, '142.4.213.178', '3utin65s81kj51b44hm5ki1s10'),
(281, 1428291455, '157.55.39.244', 'srn8uq7dnkpf5jtdntq6ncgni7'),
(282, 1428297362, '203.190.163.6', 'jov06hk51dm52uodltp35jgor5'),
(283, 1428297366, '203.190.163.6', '8nig4jebi81r693h59pcmsoup7'),
(284, 1428300646, '113.23.36.145', '08bqaiba5iaktajuldlhtro1l0'),
(285, 1428309738, '2.92.154.250', 'k3i94ateivh69chdisqvhqqrl1'),
(286, 1428313668, '192.99.107.234', 'qnsf9cfplomsmb22c0ku5egoq6'),
(287, 1428316178, '38.111.147.83', '03ijh7o1ai42v0sv74spaa6ch1'),
(288, 1428326199, '176.9.113.45', 'icpn6jdiadbhhb4qbp7utrk054'),
(289, 1428334378, '64.246.165.180', 'kb9jipvt07p8amnem7hp3lvab3'),
(290, 1428335328, '64.246.165.160', '9qk43cgc9t7he31c5qgvs5v444'),
(291, 1428336346, '64.246.165.170', '4edc0aulbq6fci2hcn97hvqap7'),
(292, 1428367227, '123.30.175.151', 'pkbkgcoth21kh4me431jss7k73'),
(293, 1428367230, '123.30.175.151', 'kqlb0uc0v77kcr1p6jb6n8rt34'),
(294, 1428367240, '123.30.175.153', 'fnrk2prip6gf0mq9u9jraopjf5'),
(295, 1428367607, '66.249.71.227', '5224cdl5vbmesh6vg7cmmgofd3'),
(296, 1428368482, '180.76.6.150', 'jetblbhijhlvke0dmvicf8c4v7'),
(297, 1428369381, '180.76.6.36', 'rn0mi393he5ua5em60k7j83543'),
(298, 1428371838, '14.160.90.38', 'r4eor4h0q9470snec1vj8qrb56'),
(299, 1428371862, '14.160.90.38', 'ogb1e52j9regc1ufrm0rshukj0'),
(300, 1428371865, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(301, 1428371868, '14.160.90.38', 'ca9mpkhb7dpkkg8qntbdt8u4j4'),
(302, 1428372611, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(303, 1428373647, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(304, 1428374338, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(305, 1428374952, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(306, 1428375922, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(307, 1428376535, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(308, 1428377285, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(309, 1428377886, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(310, 1428378571, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(311, 1428379175, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(312, 1428379912, '14.160.90.38', 'top167hjr06k055hf69vt62c73'),
(313, 1428380630, '127.0.0.1', '9m1b8flbj0fd0d6qdm8do0ns76'),
(314, 1428388205, '127.0.0.1', '9m1b8flbj0fd0d6qdm8do0ns76'),
(315, 1428391572, '127.0.0.1', '9m1b8flbj0fd0d6qdm8do0ns76'),
(316, 1428392384, '127.0.0.1', '9m1b8flbj0fd0d6qdm8do0ns76'),
(317, 1428393930, '127.0.0.1', '9m1b8flbj0fd0d6qdm8do0ns76'),
(318, 1428395835, '127.0.0.1', '9m1b8flbj0fd0d6qdm8do0ns76'),
(319, 1428396456, '127.0.0.1', '9m1b8flbj0fd0d6qdm8do0ns76'),
(320, 1428400823, '127.0.0.1', '9m1b8flbj0fd0d6qdm8do0ns76'),
(321, 1428995989, '127.0.0.1', 'be55i3ut18n50occglg0619hh6'),
(322, 1429061889, '127.0.0.1', '6536tk3qb5cd0bm3qbnmb20vp5'),
(323, 1429064576, '127.0.0.1', 'f9eadjbckm6ag0lsvl78tnk2q1'),
(324, 1429088473, '127.0.0.1', 'alfvquis3fitvs7nd8dbq6qa52'),
(325, 1429151785, '127.0.0.1', 'mj8r0av3e9tqvku24tj81o4uu5'),
(326, 1429155621, '127.0.0.1', 'mj8r0av3e9tqvku24tj81o4uu5'),
(327, 1429166544, '127.0.0.1', 'alfvquis3fitvs7nd8dbq6qa52'),
(328, 1429169930, '127.0.0.1', 'alfvquis3fitvs7nd8dbq6qa52'),
(329, 1429252923, '127.0.0.1', 'dant64fpuko7jj7al2koj47i44');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblcustomer`
--

DROP TABLE IF EXISTS `vnvic_tblcustomer`;
CREATE TABLE IF NOT EXISTS `vnvic_tblcustomer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vnvic_tblcustomer`
--

INSERT INTO `vnvic_tblcustomer` (`id`, `username`, `fullname`, `email`, `created_date`, `address`, `phone`) VALUES
(6, NULL, NULL, 'smtpwebmails@gmail.com', 1427454625, NULL, NULL),
(5, NULL, NULL, 'soledad2410@gmail.com', 1427454574, NULL, NULL),
(4, 'hungls2410', 'Lê Sỹ Hùng', 'hungls2410@gmail.com', 1427452093, 'Thanh hóa', '098.450.4580');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tbldepartment`
--

DROP TABLE IF EXISTS `vnvic_tbldepartment`;
CREATE TABLE IF NOT EXISTS `vnvic_tbldepartment` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `vnvic_tbldepartment`
--

INSERT INTO `vnvic_tbldepartment` (`department_id`, `department_name`, `department_email`) VALUES
(4, 'Phòng bán hàng', ''),
(3, 'Phòng dự án', ''),
(5, 'Phòng thiết kế', ''),
(6, 'Phòng khiếu nại', '');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tbldomain`
--

DROP TABLE IF EXISTS `vnvic_tbldomain`;
CREATE TABLE IF NOT EXISTS `vnvic_tbldomain` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `domain_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_create` int(11) NOT NULL,
  `domain_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`domain_id`),
  UNIQUE KEY `domain_name` (`domain_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vnvic_tbldomain`
--

INSERT INTO `vnvic_tbldomain` (`domain_id`, `domain_name`, `domain_key`, `customer_name`, `customer_email`, `customer_address`, `date_create`, `domain_active`) VALUES
(1, 'dhdfsnew.com', '2a829d2317039c5cdd89dfc79e4781ac', 'sỹ hùng', 'soledad2410@gmail.com', 'Thọ xuân,Thanh hóa', 1315081271, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblgallery`
--

DROP TABLE IF EXISTS `vnvic_tblgallery`;
CREATE TABLE IF NOT EXISTS `vnvic_tblgallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_time` int(11) NOT NULL,
  `gallery_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `gallery_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gallery_desc` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `vnvic_tblgallery`
--

INSERT INTO `vnvic_tblgallery` (`gallery_id`, `gallery_time`, `gallery_name`, `gallery_title`, `menu_id`, `gallery_image`, `gallery_desc`) VALUES
(20, 1342893469, 'album220720120049', 'album2', 181, NULL, NULL),
(19, 1342893162, 'album220720120042', 'album1', 181, NULL, NULL),
(21, 1423480638, 'album090220151218', 'ẢNH ĐÌNH CHÙA', 12, 'upload/images/block/left-nav.jpg', ''),
(22, 1423558139, 'album100220150959', 'ẢNH LỄ HỘI', 12, 'upload/images/block/left-nav.jpg', ''),
(23, 1423558148, 'album100220150908', 'ẢNH TƯ GIA', 12, 'upload/images/block/filternews-img.jpg', ''),
(24, 1423558157, 'album100220150917', 'ẢNH BÀI VIẾT', 12, 'upload/images/tin-tuc/art01.jpg', ''),
(25, 1428381598, 'album070420150658', 'Album ảnh 1', 12, 'upload/images/video/bk.PNG', 'TEST'),
(26, 0, '', 'Album ảnh 2', 12, 'upload/images/slideshow/slide-img.jpg', 'test'),
(27, 0, '', 'Video collections', 12, 'upload/images/block/filternews-img.jpg', 'Video tổng hợp');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblgroup`
--

DROP TABLE IF EXISTS `vnvic_tblgroup`;
CREATE TABLE IF NOT EXISTS `vnvic_tblgroup` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `group_description` text COLLATE utf8_unicode_ci NOT NULL,
  `group_block` tinyint(1) NOT NULL DEFAULT '0',
  `group_level` int(11) NOT NULL,
  `group_privilege` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `vnvic_tblgroup`
--

INSERT INTO `vnvic_tblgroup` (`group_id`, `group_name`, `group_description`, `group_block`, `group_level`, `group_privilege`) VALUES
(2, 'admin', 'Nhóm quản trị website', 0, 2, ''),
(3, 'user', 'Nhóm thành viên quản trị', 0, 3, ''),
(1, 'super_admin', 'Nhóm quản trị hệ thống', 0, 1, ''),
(4, 'member', 'Nhóm thành viên đăng ký website', 0, 4, ''),
(19, 'post_product', 'Nhóm thành viên đăng sản phẩm', 0, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblgroupprivilege`
--

DROP TABLE IF EXISTS `vnvic_tblgroupprivilege`;
CREATE TABLE IF NOT EXISTS `vnvic_tblgroupprivilege` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `privilege_permission` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`privilege_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `vnvic_tblgroupprivilege`
--

INSERT INTO `vnvic_tblgroupprivilege` (`privilege_id`, `privilege_name`, `group_id`, `privilege_permission`) VALUES
(27, 'article|delete_article', 3, 1),
(26, 'article|add_article', 3, 1),
(23, 'admin|index', 19, 1),
(18, 'article|add_article', 19, 1),
(28, 'admin|index', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblkeyword`
--

DROP TABLE IF EXISTS `vnvic_tblkeyword`;
CREATE TABLE IF NOT EXISTS `vnvic_tblkeyword` (
  `keyword_id` int(30) NOT NULL AUTO_INCREMENT,
  `keyword_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `keyword_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `keyword_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=216 ;

--
-- Dumping data for table `vnvic_tblkeyword`
--

INSERT INTO `vnvic_tblkeyword` (`keyword_id`, `keyword_name`, `keyword_type`, `keyword_title`) VALUES
(170, 'EMAIL_FIELD_TITLE', 'textField', 'Tiêu đề trường email liên hệ'),
(171, 'CUS_NAME_FIELD_TITLE', 'textField', 'Tiêu đề trường Tên khách hàng liên hệ'),
(172, 'CUS_ADDR_FIELD_TITLE', 'textField', 'Tiêu đề trường địa chỉ khách hàng liên hệ'),
(173, 'CAPTCHA_FIELD_TITLE', 'textField', 'Tiêu đề trường mã xác nhận'),
(174, 'HOME_PAGE_TITLE', 'textField', 'Tiêu đề trang chủ'),
(175, 'SEND_FORM_CONTACT', 'textField', 'Tiêu đề button gửi liên hệ'),
(176, 'RESET_FORM', 'textField', 'Tiêu đề trường reset form'),
(177, 'CUS_PHONE_FIELD_TITLE', 'textField', 'Tiêu đề trường điện thoại khách hàng'),
(178, 'READ_DETAILS_TITLE', 'textField', 'Tiêu đề xem chi tiết'),
(179, 'MORE_PRODUCT_LABEL', 'textField', 'Tiêu đề xem thêm sản phẩm'),
(180, 'OLD_NEWS_TITLE', 'textField', 'Tiêu đề bài viết cũ hơn'),
(181, 'NEW_NEWS_TITLE', 'textField', 'Tiêu đề bài viết mới hơn'),
(182, 'OTHER_NEWS_TITLE', 'textField', 'Tiêu đề tin tức khác'),
(183, 'CONTACT_CONTENT', 'textField', 'Tiêu đề nội dung liên hệ'),
(184, 'SEARCH_PAGE_TITLE', 'textField', 'Tiêu đề trang tìm kiếm'),
(185, 'INPUT_SEARCH_KEYWORD', 'textField', 'Tiêu đề Nhập từ khóa tìm kiếm...'),
(186, 'SEARCH_RESULT', 'textField', 'Tiêu đề Kết quả tìm kiếm'),
(187, 'ONLINE_SUPPORT', 'textField', 'Tiêu đề trường Hỗ trợ trực tuyến'),
(188, 'ADULT_QUANTITY', 'textField', 'Tiêu đề trường Số người lớn'),
(189, 'CHILDREN_QUANTITY', 'textField', 'Tiêu đề trường Số trẻ Em'),
(190, 'START_DATE', 'textField', 'Tiêu đề trường Ngày đến'),
(191, 'NIGHTS_QUANTITY', 'textField', 'Tiêu đề trường Số Đêm ở'),
(192, 'GOLD_PRICE', 'textField', 'Tiêu đề trường Giá vàng'),
(193, 'FOREIGN_CURRENCY', 'textField', 'Tiêu đề trường Ngoại tệ'),
(194, 'WEATHER', 'textField', 'Tiêu đề trường Thời tiết'),
(195, 'HOTLINE_SUPPORT', 'textField', 'Tiêu đề trường đường dây nóng'),
(196, 'MODEL_PRODUCT', 'textField', 'Tiêu đề trường mẫu sản phẩm'),
(197, 'CUS_GUEST', 'textField', 'Tiêu đề trường Quý khách'),
(198, 'CUS_INFO_GUEST', 'textField', 'Tiêu đề thông tin dành cho khách hàng'),
(199, 'PRODUCT_INFORMATION', 'textField', 'Tiêu đề trường Thông tin sản phẩm'),
(200, 'OTHER_PRODUCTS', 'textField', 'Tiêu đề trường Sản phẩm khác'),
(201, 'STATUS', 'textField', 'Tiêu đề trường tình trạng'),
(202, 'SHIPPING_PRICE', 'textField', 'Tiêu đề trường Phí vận chuyển'),
(203, 'PRODUCT_INFORMATION_SUMMARY', 'textField', 'Tiêu đề trường Tóm tắt thông tin sản phẩm'),
(204, 'PRODUCT_CURRENT_PROMOTION', 'textField', 'Tiêu đề trường Khuyến mãi đang có'),
(205, 'HOT_NEWS_TITLE', 'textField', 'Tiêu đề trường Sự kiện nổi bật'),
(206, 'SELL_PRICE', 'textField', 'Tiêu đề trường Giá bán'),
(207, 'ONLINE_COUNTER', 'textField', 'Tiêu đề trường Số người Online'),
(208, 'VISIT_COUNTER', 'textField', 'Tiêu đề trường Số người truy cập'),
(209, 'HOT_PRODUCTS', 'textField', 'Tiêu đề trường Sản phẩm nổi bật'),
(211, 'CONNECT_WITH_US', 'textField', 'Tiêu đề trường Kết nối với chúng tôi'),
(212, 'LAND_FOR_SALE', 'textField', 'Bất động sản cần bán'),
(213, 'LAND_FOR_RENT', 'textField', 'Bất động sản cho thuê'),
(214, 'FOR_SALE', 'textField', 'Bán'),
(215, 'FOR_RENT', 'textField', 'Cho thuê');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tbllang`
--

DROP TABLE IF EXISTS `vnvic_tbllang`;
CREATE TABLE IF NOT EXISTS `vnvic_tbllang` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_shortname` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lang_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lang_image` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_active` tinyint(1) NOT NULL DEFAULT '0',
  `lang_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lang_id`),
  UNIQUE KEY `lang_shortname` (`lang_shortname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `vnvic_tbllang`
--

INSERT INTO `vnvic_tbllang` (`lang_id`, `lang_shortname`, `lang_name`, `lang_image`, `lang_active`, `lang_default`) VALUES
(16, 'vi', 'Vietnamese', 'upload/images/lang/vi-flag.png', 1, 1),
(17, 'en', 'English', 'upload/images/lang/en-flag.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tbllangkeyword`
--

DROP TABLE IF EXISTS `vnvic_tbllangkeyword`;
CREATE TABLE IF NOT EXISTS `vnvic_tbllangkeyword` (
  `keyword_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `keyword_value` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`keyword_id`,`lang_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vnvic_tbllangkeyword`
--

INSERT INTO `vnvic_tbllangkeyword` (`keyword_id`, `lang_id`, `keyword_value`) VALUES
(170, 16, 'Địa chỉ email'),
(171, 16, 'Họ và tên'),
(172, 16, 'Địa chỉ liên hệ'),
(173, 16, 'Mã xác nhận'),
(174, 16, 'Trang chủ'),
(170, 17, 'Email address'),
(171, 17, 'Full name'),
(172, 17, 'Address'),
(173, 17, 'Confirm code'),
(174, 17, 'Home'),
(175, 17, 'Send contact'),
(176, 17, 'Reset'),
(177, 17, 'Phone number'),
(175, 16, 'Gửi'),
(176, 16, 'Nhập lại'),
(177, 16, 'Điện thoại'),
(178, 17, 'Read more'),
(179, 17, 'More product'),
(180, 17, 'Older news'),
(181, 17, 'New news'),
(178, 16, 'Xem thêm'),
(179, 16, 'Sản phẩm khác'),
(180, 16, 'Bài viết cũ hơn'),
(181, 16, 'Bài viết mới hơn'),
(182, 16, 'Tin tức khác'),
(182, 17, 'More news'),
(183, 16, 'Nội dung'),
(184, 16, 'Trang kết quả tìm kiếm'),
(185, 16, 'Nhập từ khóa tìm kiếm'),
(185, 17, 'Enter search keyword'),
(186, 16, 'Kết quả tìm kiếm'),
(186, 17, 'Search result'),
(187, 16, 'Hỗ trợ trực tuyến'),
(187, 17, 'Online Support'),
(188, 16, 'Số Người lớn'),
(188, 17, 'Adult Quantity'),
(189, 16, 'Số Trẻ em'),
(189, 17, 'Children Quantity'),
(190, 16, 'Ngày đến'),
(190, 17, 'Start date'),
(191, 16, 'Đêm ở'),
(191, 17, 'Nights'),
(192, 16, 'Giá Vàng'),
(192, 17, 'Gold Price'),
(193, 16, 'Ngoại Tệ'),
(193, 17, 'Foreign Currency'),
(194, 16, 'Thời tiết'),
(194, 17, 'Weather'),
(183, 17, 'Contact content'),
(184, 17, 'Search page'),
(195, 17, 'Call: (+84)0982 222 989'),
(195, 16, 'Hotline: 0913 543 469'),
(196, 17, 'Model'),
(196, 16, 'Mẫu'),
(197, 17, 'Guest of Honour'),
(198, 17, 'Please contact to Us by: info@sangonguyenkim.com mobile:  (+84) 0982 222 989'),
(197, 16, 'Quý khách'),
(198, 16, 'Vui lòng liên hệ với chúng tôi qua email - info@sangonguyenkim.com mobile: 0982 222 989'),
(199, 16, 'Thông tin sản phẩm'),
(199, 17, 'Product Information'),
(200, 17, 'Other Products'),
(200, 16, 'Sản phẩm khác'),
(201, 16, 'Tình trạng'),
(202, 16, 'Phí vận chuyển'),
(203, 16, 'Tóm tắt thông tin sản phẩm'),
(201, 17, 'Status'),
(202, 17, 'Shipping price'),
(203, 17, 'Product information summary'),
(204, 16, 'Khuyến mãi đang có'),
(204, 17, 'Current Promotion'),
(205, 16, 'Tin tức nổi bật'),
(205, 17, 'Hot News'),
(206, 17, 'Sell price'),
(206, 16, 'Giá bán'),
(207, 16, 'Số người Online:'),
(208, 16, 'Số người Truy cập:'),
(207, 17, 'Online:'),
(208, 17, 'Visit Total:'),
(209, 16, 'Sản phẩm nổi bật'),
(209, 17, 'Hot Products'),
(211, 16, 'Kết nối với chúng tôi'),
(211, 17, 'Connect width Us'),
(212, 16, 'Bất động sản cần bán'),
(213, 16, 'Bất động sản cho thuê'),
(212, 17, 'Land for sale'),
(213, 17, 'Land for rent'),
(214, 17, 'Sale'),
(215, 17, 'For rent'),
(214, 16, 'Bán'),
(215, 16, 'Cho thuê');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tbllayout`
--

DROP TABLE IF EXISTS `vnvic_tbllayout`;
CREATE TABLE IF NOT EXISTS `vnvic_tbllayout` (
  `layout_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `layout_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `layout_visible` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`layout_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vnvic_tbllayout`
--

INSERT INTO `vnvic_tbllayout` (`layout_name`, `layout_title`, `layout_visible`) VALUES
('mobile', 'Giao diện IDJ Land mobile', 1),
('idjland', 'Giao diện idjland', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblmedia`
--

DROP TABLE IF EXISTS `vnvic_tblmedia`;
CREATE TABLE IF NOT EXISTS `vnvic_tblmedia` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `media_title` varchar(100) NOT NULL,
  `media_url` varchar(100) NOT NULL,
  `media_href` varchar(200) NOT NULL,
  `media_width` int(11) NOT NULL,
  `media_height` int(11) NOT NULL,
  `media_publish` int(11) NOT NULL,
  `media_expire` int(11) NOT NULL,
  `media_description` text,
  `media_queu` int(11) NOT NULL,
  `media_visible` tinyint(4) NOT NULL DEFAULT '1',
  `plugin_id` int(11) NOT NULL,
  `media_name` varchar(100) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `vnvic_tblmedia`
--

INSERT INTO `vnvic_tblmedia` (`media_id`, `media_title`, `media_url`, `media_href`, `media_width`, `media_height`, `media_publish`, `media_expire`, `media_description`, `media_queu`, `media_visible`, `plugin_id`, `media_name`, `gallery_id`) VALUES
(67, 'Chương trình đầu tư Quebec', 'upload/images/slideshow/slide-img1.png', '', 0, 0, 0, 1577833200, 'British Columbia liên tục thu hút các dân định cư trong cũng như ngoài nước: hàng năm khoảng 40,000 người định cư...', 38, 1, 29, '', NULL),
(66, 'Đầu tư định cư EB-5', 'upload/images/slideshow/slide-img.jpg', '', 0, 0, 0, 1577833200, 'Chương trình Đầu tư Định cư Mỹ (The U.S Immigration Investor Program) EB-5 là một trong những chương trình hữu...', 37, 1, 29, '', NULL),
(65, 'Chương trình British Columbia', 'upload/images/slideshow/slide-img1.png', '', 0, 0, 0, 1577833200, 'MICC chính thức xác nhận thông tin chương trình Đầu Tư Quebec (QIIP) sẽ được mở cửa và bắt đầu nhận hồ sơ...', 36, 1, 29, '', NULL),
(57, 'Dự án riviera point', 'upload/images/slideshow/slide-img.png', '', 0, 0, 0, 1577833200, 'Vươn mình kiêu hãnh giữa Quận 7, Riviera Point được bao bọc bởi một không gian thanh bình bên dòng sông Cả Cấm. Tại đây, bạn dễ dàng cảm nhận cuộc sống phong phú giữa cộng đồng dân cư hiện đại với những cửa hiệu, nhà hàng và hàng loạt các tiện ích đa dạng nhằm mang đến cho cư dân một cuộc sống ven sông ngập tràn hứng khởi.', 35, 1, 22, 'slide mobile 01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblmenu`
--

DROP TABLE IF EXISTS `vnvic_tblmenu`;
CREATE TABLE IF NOT EXISTS `vnvic_tblmenu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `menu_title` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_details` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `menu_level` int(11) NOT NULL,
  `module_id` int(20) NOT NULL,
  `menu_image` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_visible` tinyint(1) NOT NULL DEFAULT '1',
  `menu_home` tinyint(1) NOT NULL DEFAULT '0',
  `menu_queu` int(11) NOT NULL,
  `menu_metatitle` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_h1` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_description` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_url` text COLLATE utf8_unicode_ci NOT NULL,
  `template_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `menu_config` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `menu_tags` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `menu_privilege` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_filter` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu_string` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `layout_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `menu_content` text COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `vnvic_tblmenu`
--

INSERT INTO `vnvic_tblmenu` (`menu_id`, `lang_id`, `parent_id`, `menu_title`, `menu_details`, `menu_level`, `module_id`, `menu_image`, `menu_visible`, `menu_home`, `menu_queu`, `menu_metatitle`, `menu_h1`, `menu_keyword`, `menu_description`, `menu_url`, `template_id`, `menu_config`, `menu_tags`, `menu_privilege`, `menu_filter`, `menu_string`, `layout_name`, `menu_content`, `sub_title`) VALUES
(1, 16, 0, 'Định cư Mỹ', '', 1, 27, '', 1, 0, 1, 'Định cư Mỹ', 'Định cư Mỹ', '', '', '', '', '', '', '0', '', 'dinh-cu-my', '', '', 'Định cư Mỹ'),
(2, 16, 0, 'Định cư CANADA', '', 1, 27, '', 1, 0, 2, 'Định cư CANADA', 'Định cư CANADA', '', '', '', '', '', '', '0', '', 'dinh-cu-canada', '', '', 'Định cư CANADA'),
(3, 16, 0, 'Tư vấn', '', 1, 27, '', 1, 0, 4, 'Tư vấn', 'Tư vấn', '', '', '', '', '', '', '', '', 'tu-van', '', '', 'Tư vấn'),
(6, 16, 1, 'Chương trình định cư đầu tư MỸ									', '', 2, 27, '', 1, 0, 1, 'Chương trình định cư đầu tư MỸ									', 'Chương trình định cư đầu tư MỸ									', '', '', '', '', '', '', '0', '', 'chuong-trinh-dinh-cu-dau-tu-my', '', '', 'Chương trình định cư đầu tư MỸ									'),
(4, 16, 0, 'Tin tức', '', 1, 27, '', 1, 1, 3, 'Tin tức', 'Tin tức', '', '', '', '', '', '', '', '', 'tin-tuc', '', '', 'Tin tức'),
(5, 16, 0, 'Liên hệ', '', 1, 34, '', 1, 0, 6, 'Liên hệ', 'Liên hệ', '', '', '', '', '', '', '0', '', 'lien-he', '', '', 'Liên hệ'),
(7, 16, 1, 'Bất động sản', '', 2, 26, '', 1, 0, 2, 'Bất động sản', 'Bất động sản', '', '', '/bat-dong-san-my.html', '', '', '', '', '', 'bat-dong-san-mys', '', '', 'Bất động sản'),
(8, 16, 1, 'Kinh doanh tại Mỹ', '', 2, 27, '', 1, 0, 3, 'Kinh doanh tại Mỹ', 'Kinh doanh tại Mỹ', '', '', '', '', '', '', '0', '', 'kinh-doanh-tai-my', '', '', 'Kinh doanh tại Mỹ'),
(9, 16, 1, 'Cuộc sống và con người', '', 2, 27, '', 1, 0, 4, 'Cuộc sống và con người', 'Cuộc sống và con người', '', '', '', '', '', '', '0', '', 'cuoc-song-va-con-nguoi-my', '', '', 'Cuộc sống và con người'),
(10, 16, 1, 'Những điều bạn cần biết', '', 2, 27, '', 1, 0, 5, 'Những điều bạn cần biết', 'Những điều bạn cần biết', '', '', '', '', '', '', '0', '', 'nhung-dieu-ban-can-biet-my', '', '', 'Những điều bạn cần biết'),
(11, 16, 1, 'Tin tức di trú', '', 2, 27, '', 1, 0, 6, 'Tin tức di trú', 'Tin tức di trú', '', '', '', '', '', '', '0', '', 'tin-tuc-di-tru-my', '', '', 'Tin tức di trú'),
(12, 16, 1, 'Album ảnh', '', 2, 41, '', 1, 0, 7, 'Album ảnh', 'Album ảnh', '', '', '', '', '', '', '0', '', 'album-anh-my', '', '', 'Album ảnh'),
(14, 16, 2, 'Bất động sản', '', 2, 26, '', 1, 0, 7, 'Bất động sản', 'Bất động sản', '', '', '/bat-dong-san-canada.html', '', '', '', '', '', 'bat-dong-san-canadas', '', '', 'Bất động sản'),
(16, 16, 2, 'Cuộc sống và con người', '', 2, 27, '', 1, 0, 9, 'Cuộc sống và con người', 'Cuộc sống và con người', '', '', '', '', '', '', '0', '', 'cuoc-song-va-con-nguoi-canada', '', '', 'Cuộc sống và con người'),
(17, 16, 2, 'Những điều bạn cần biết', '', 2, 27, '', 1, 0, 10, 'Những điều bạn cần biết', 'Những điều bạn cần biết', '', '', '', '', '', '', '0', '', 'nhung-dieu-ban-can-biet-canada', '', '', 'Những điều bạn cần biết'),
(18, 16, 2, 'Tin tức di trú', '', 2, 27, '', 1, 0, 11, 'Tin tức di trú', 'Tin tức di trú', '', '', '', '', '', '', '0', '', 'tin-tuc-di-tru-canada', '', '', 'Tin tức di trú'),
(19, 16, 2, 'Album ảnh', '', 2, 27, '', 1, 0, 12, 'Album ảnh', 'Album ảnh', '', '', '', '', '', '', '0', '', 'album-anh-canada', '', '', 'Album ảnh'),
(20, 16, 3, 'Dịch vụ xin VISA đi Mỹ', '', 2, 27, '', 1, 0, 1, 'Dịch vụ xin VISA đi Mỹ', 'Dịch vụ xin VISA đi Mỹ', '', '', '', '', '', '', '0', '', 'dich-vu-xin-visa-di-my', '', '', 'Dịch vụ xin VISA đi Mỹ'),
(21, 16, 3, 'Các tình huống', '', 2, 27, '', 1, 0, 2, 'Các tình huống', 'Các tình huống', '', '', '', '', '', '', '0', '', 'cac-tinh-huong', '', '', 'Các tình huống'),
(22, 16, 3, 'Thông tin chung', '', 2, 27, '', 1, 0, 3, 'Thông tin chung', 'Thông tin chung', '', '', '', '', '', '', '0', '', 'thong-tin-chung', '', '', 'Thông tin chung'),
(23, 16, 4, 'Tin tức từ Mỹ', '', 2, 27, '', 1, 0, 1, 'Tin tức từ Mỹ', 'Tin tức từ Mỹ', '', '', '', '', '', '', '0', '', 'tin-tuc-tu-my', '', '', 'Tin tức từ Mỹ'),
(24, 16, 4, 'Tin tức từ CANADA', '', 2, 27, '', 1, 0, 2, 'Tin tức từ CANADA', 'Tin tức từ CANADA', '', '', '', '', '', '', '0', '', 'tin-tuc-tu-canada', '', '', 'Tin tức từ CANADA'),
(25, 16, 0, 'Dịch vụ', '', 1, 27, '', 1, 0, 5, 'Dịch vụ', 'Dịch vụ', '', '', '', '', '', '', '0', '', 'dich-vu', '', '', 'Dịch vụ'),
(26, 16, 2, 'Chương trình tỉnh bang', '', 2, 27, '', 1, 0, 1, 'Chương trình tỉnh bang', 'Chương trình tỉnh bang', '', '', '', '', '', '', '0', '', 'chuong-trinh-tinh-bang', '', '', 'Chương trình tỉnh bang'),
(27, 16, 2, 'Chương trình Quebec', '', 2, 27, '', 1, 0, 2, 'Chương trình Quebec', 'Chương trình Quebec', '', '', '', '', '', '', '0', '', 'chuong-trinh-quebec', '', '', 'Chương trình Quebec'),
(28, 16, 2, 'Chương trình Liên bang', '', 2, 27, '', 1, 0, 3, 'Chương trình Liên bang', 'Chương trình Liên bang', '', '', '', '', '', '', '0', '', 'chuong-trinh-lien-bang', '', '', 'Chương trình Liên bang'),
(29, 16, 2, 'Diện Skilled Worker', '', 2, 27, '', 1, 0, 5, 'Diện Skilled Worker', 'Diện Skilled Worker', '', '', '', '', '', '', '0', '', 'dien-skilled-worker', '', '', 'Diện Skilled Worker'),
(30, 16, 2, 'Diện kinh nghiệm Canada', '', 2, 27, '', 1, 0, 4, 'Diện kinh nghiệm Canada', 'Diện kinh nghiệm Canada', '', '', '', '', '', '', '0', '', 'dien-kinh-nghiem-canada', '', '', 'Diện kinh nghiệm Canada'),
(31, 16, 26, 'British Columbia PNP', '', 3, 27, '', 1, 0, 1, 'British Columbia PNP', 'British Columbia PNP', '', '', '', '', '', '', '0', '', 'british-columbia-pnp', '', '', 'British Columbia PNP'),
(32, 16, 26, 'Manitoba PNP', '', 3, 27, '', 1, 0, 2, 'Manitoba PNP', 'Manitoba PNP', '', '', '', '', '', '', '0', '', 'manitoba-pnp', '', '', 'Manitoba PNP'),
(33, 16, 26, 'Saskatchewan PNP', '', 3, 27, '', 1, 0, 3, 'Saskatchewan PNP', 'Saskatchewan PNP', '', '', '', '', '', '', '0', '', 'saskatchewan-pnp', '', '', 'Saskatchewan PNP'),
(34, 16, 26, 'Prince Edward Island PNP', '', 3, 27, '', 1, 0, 4, 'Prince Edward Island PNP', 'Prince Edward Island PNP', '', '', '', '', '', '', '0', '', 'prince-edward-island-pnp', '', '', 'Prince Edward Island PNP'),
(35, 16, 26, 'New Brunswick PNP', '', 3, 27, '', 1, 0, 5, 'New Brunswick PNP', 'New Brunswick PNP', '', '', '', '', '', '', '0', '', 'new-brunswick-pnp', '', '', 'New Brunswick PNP'),
(36, 16, 26, 'Nova Scotia PNP', '', 3, 27, '', 1, 0, 6, 'Nova Scotia PNP', 'Nova Scotia PNP', '', '', '', '', '', '', '0', '', 'nova-scotia-pnp', '', '', 'Nova Scotia PNP'),
(37, 16, 27, 'Diện đầu tư', '', 3, 27, '', 1, 0, 1, 'Diện đầu tư', 'Diện đầu tư', '', '', '', 'custom_page', '', '', '', '', 'dien-dau-tu-quebec', '', '<div>\r\n	DIỆN ĐẦU TƯ - INVESTOR</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	ĐIỀU KIỆN Y&Ecirc;U CẦU</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	1. Chứng minh t&agrave;i sản r&ograve;ng tối thiểu 1.600.000 CAD.</div>\r\n<div>\r\n	2. C&oacute; 2 năm trong kinh nghiệm quản l&yacute; trong 5 năm gần nhất hay l&agrave; chủ doanh nghiệp.</div>\r\n<div>\r\n	3. K&yacute; một bản thoản thuận đầu tư 800.000 CAD c&ugrave;ng với một trung gian t&agrave;i ch&iacute;nh (c&ocirc;ng ty m&ocirc;i giới hoặc c&ocirc;ng ty ủy th&aacute;c).</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	VIỆC Đ&Aacute;NH GI&Aacute; HỒ SƠ DỰA TR&Ecirc;N C&Aacute;C TI&Ecirc;U CH&Iacute;</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	- T&agrave;i sản v&agrave; qu&aacute; tr&igrave;nh h&igrave;nh th&agrave;nh nguồn t&agrave;i sản.</div>\r\n<div>\r\n	- Kinh nghiệm quản l&iacute; v&agrave; kinh doanh.</div>\r\n<div>\r\n	- &Yacute; định định cư tại Quebec</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	TH&Ocirc;NG TIN HỮU &Iacute;CH KH&Aacute;C</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	- Bản thỏa thuận đầu tư l&agrave; một trong những giấy tờ trong hồ sơ xin xin Giấy chứng nhận được lựa chọn của Quebec (Certificat de s&eacute;lection du Qu&eacute;bec)</div>\r\n<div>\r\n	- Khoản đầu tư 800.000 CAD trong 5 năm được đảm bảo bởi Ch&iacute;nh phủ Quebe.</div>\r\n<div>\r\n	- C&ocirc;ng ty m&ocirc;i giới hoặc C&ocirc;ng ty ủy th&aacute;c sẽ chứng minh t&iacute;nh khả thi về t&agrave;i ch&iacute;nh của việc đầu tư.</div>\r\n<div>\r\n	- Doanh thu c&oacute; được từ khoản đầu tư của Đương đơn sẽ được sử dụng v&agrave;o 2 chương tr&igrave;nh hỗ trợ kinh doanh của Quebec l&agrave; Business Assistance Immigrant Investor Program v&agrave; Programme d&rsquo;aide &agrave; l&rsquo;int&eacute;gration des immigrants et des minorit&eacute;s visibles en employ.</div>\r\n<div>\r\n	- Sau 5 năm, C&ocirc;ng ty m&ocirc;i giới hoặc c&ocirc;ng ty ủy th&aacute;c sẽ ho&agrave;n lại Đương đơn số tiền 800.000 CAD kh&ocirc;ng l&atilde;i suất trong v&ograve;ng 30 ng&agrave;y.</div>\r\n', 'Chương trình Hỗ trợ Nhập cư Tỉnh bang Quebec'),
(38, 16, 27, 'Diện kinh doanh', '', 3, 27, '', 1, 0, 2, 'Diện kinh doanh', 'Diện kinh doanh', '', '', '', '', '', '', '0', '', 'dien-kinh-doanh', '', '', 'Diện kinh doanh'),
(39, 16, 27, 'Diện tự doanh', '', 3, 27, '', 1, 0, 3, 'Diện tự doanh', 'Diện tự doanh', '', '', '', '', '', '', '0', '', 'dien-tu-doanh', '', '', 'Diện tự doanh'),
(40, 16, 0, 'Bất động sản', '', 1, 26, '', 1, 0, 7, 'Bất động sản', 'Bất động sản', '', '', '', '', '', '', '0', '', 'bat-dong-san-canada', '', '', 'Bất động sản'),
(41, 16, 0, 'Bất động sản', '', 1, 26, '', 1, 0, 8, 'Bất động sản', 'Bất động sản', '', '', '', '', '', '', '0', '', 'bat-dong-san-my', '', '', 'Bất động sản');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblmenuadmin`
--

DROP TABLE IF EXISTS `vnvic_tblmenuadmin`;
CREATE TABLE IF NOT EXISTS `vnvic_tblmenuadmin` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `menu_level` int(11) NOT NULL,
  `menu_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `menu_image` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_title` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_url` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_visible` tinyint(4) NOT NULL DEFAULT '0',
  `menu_description` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_queu` int(11) NOT NULL,
  `menu_block` int(11) NOT NULL,
  `privilege_access` tinyint(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=85 ;

--
-- Dumping data for table `vnvic_tblmenuadmin`
--

INSERT INTO `vnvic_tblmenuadmin` (`menu_id`, `parent_id`, `menu_level`, `menu_name`, `menu_image`, `menu_title`, `menu_url`, `menu_visible`, `menu_description`, `menu_queu`, `menu_block`, `privilege_access`) VALUES
(44, 38, 2, '', '', 'Quản trị bài viết', 'article.html', 1, '', 2, 0, 3),
(38, 0, 1, '', 'upload/files/system/icon-48-article.png', 'Quản trị nội dung', 'admin/admin.html', 1, '', 1, 0, 3),
(40, 0, 1, '', 'upload/files/system/preferences-contact-list%5B1%5D.png', 'Liên hệ', 'contacts.html', 1, '', 5, 0, 3),
(41, 0, 1, '', 'upload/files/system/admin.png', 'Quản trị admin', 'user.html', 1, '', 6, 0, 3),
(42, 0, 1, '', 'upload/files/system/cog.png', 'Hệ thống', 'config.html', 1, '', 8, 0, 3),
(63, 52, 3, '', '', 'Quản trị đơn hàng', 'order.html', 0, '', 1, 0, 3),
(64, 52, 3, '', '', 'Loại và thuộc tính sản phẩm', 'product/properties.html', 0, '', 3, 0, 3),
(68, 0, 1, '', 'upload/files/system/userconfig%5B1%5D.png', 'Quản trị thành viên', 'member.html', 0, '', 1, 0, 3),
(66, 44, 3, '', '', 'Bình luận bài viết', 'article/comment.html', 0, '', 1, 0, 3),
(48, 0, 1, '', 'upload/files/system/icon-48-article-add.png', 'Viết bài', 'article/add_article.html', 1, '', 1, 1, 3),
(58, 42, 2, '', '', 'Giao diện website', 'config/template.html', 1, '', 3, 0, 3),
(50, 0, 1, '', 'upload/files/system/icon-48-menumgr.png', 'Thêm danh mục', 'menu.html#form', 1, '', 1, 1, 3),
(51, 0, 1, '', 'upload/files/system/contact.png', 'Liên hệ', 'contacts.html', 1, '', 1, 1, 3),
(52, 38, 2, '', '', 'Quản trị dự án', 'product.html', 1, '', 3, 0, 3),
(53, 38, 2, '', '', 'Quản trị danh mục', 'menu.html', 1, '', 4, 0, 3),
(54, 38, 2, '', '', 'Quản trị khối nội dung', 'plugin.html', 1, '', 5, 0, 3),
(55, 42, 2, '', '', 'Quản trị domain', 'system/domain.html', 0, '', 1, 0, 3),
(67, 52, 3, '', '', 'Bình luận sản phẩm', 'product/comment.html', 0, '', 2, 0, 3),
(69, 44, 3, '', '', 'Thêm mới bài viết', 'article/add_article.html', 1, '', 2, 0, 3),
(71, 0, 1, '', 'upload/files/system/shop%5B1%5D.png', 'Gian hàng', 'shop.html', 0, '', 1, 0, 3),
(72, 71, 2, '', '', 'Giao diện gian hàng', 'shop/template.html', 1, '', 1, 0, 3),
(73, 71, 2, '', '', 'Gói gian hàng', 'shop/packet.html', 1, '', 2, 0, 3),
(74, 71, 2, '', '', 'Cấu hình gian hàng', 'shop/config.html', 1, '', 3, 0, 3),
(75, 71, 2, '', '', 'Thống kê gian hàng', 'shop/statics.html', 1, '', 4, 0, 3),
(76, 42, 2, '', '', 'Ngôn ngữ website', 'config/language.html', 1, '', 2, 0, 3),
(77, 38, 2, '', '', 'Quản trị album ảnh', 'galleries.html', 1, '', 6, 0, 3),
(78, 41, 2, '', '', 'Nhóm thành viên hệ thống', 'admin/group.html', 1, '', 1, 0, 3),
(79, 38, 2, '', '', 'Địa điểm ', 'address.html', 1, '', 7, 0, 3),
(80, 52, 3, '', '', 'Thêm mới dự án', 'product/add_product', 1, '', 4, 0, 3),
(81, 52, 3, '', '', 'Chương trình khuyến mãi', 'promotions.html', 0, '', 5, 0, 3),
(82, 40, 2, '', '', 'Phòng ban', 'contact/department', 1, '', 1, 0, 3),
(83, 38, 2, '', '', 'Quản trị thành viên đăng ký', 'customer.html', 1, '', 8, 0, 3),
(84, 0, 1, '', 'upload/files/system/icon-48-article-add.png', 'Thêm dự án', 'product/add.html', 1, '', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblmessage`
--

DROP TABLE IF EXISTS `vnvic_tblmessage`;
CREATE TABLE IF NOT EXISTS `vnvic_tblmessage` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message_content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `message_read` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblmodule`
--

DROP TABLE IF EXISTS `vnvic_tblmodule`;
CREATE TABLE IF NOT EXISTS `vnvic_tblmodule` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_menu` tinyint(4) NOT NULL DEFAULT '0',
  `module_description` text COLLATE utf8_unicode_ci NOT NULL,
  `module_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `module_active` tinyint(4) NOT NULL DEFAULT '1',
  `module_config` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `vnvic_tblmodule`
--

INSERT INTO `vnvic_tblmodule` (`module_id`, `module_menu`, `module_description`, `module_name`, `module_active`, `module_config`, `parent_id`) VALUES
(1, 0, 'Module tin tức', 'news', 1, '', 0),
(3, 0, 'Module sản phẩm', 'product', 1, 'Chipset|Ram', 0),
(26, 1, 'Trang danh mục sản phẩm', 'product_cate', 1, 'Chip,Ram', 3),
(27, 1, 'Trang danh mục tin tức', 'news_cate', 1, '', 1),
(28, 0, 'Trang chi tiết sản phẩm', 'product_details', 1, '', 3),
(29, 0, 'Trang chi tiết tin tức', 'news_details', 1, '', 1),
(33, 0, 'Module liên hệ', 'contact', 1, '', 0),
(34, 1, 'Trang liên hệ', 'contact_index', 1, '', 33),
(35, 0, 'Trang giỏ hàng', 'shopping', 0, '', 0),
(36, 0, 'Trang giỏ hàng', 'shopping_index', 0, '', 35),
(37, 0, 'Module tìm kiếm', 'search', 1, '', 0),
(38, 0, 'Trang kết quả tìm kiếm', 'search_index', 0, '', 37),
(39, 0, 'Module trang thư viện ảnh', 'gallery', 1, '', 0),
(40, 0, 'Trang chi tiết album ảnh', 'gallery_albumdetails', 1, '', 39),
(41, 1, 'Trang danh mục album ảnh', 'gallery_cate', 1, '', 39),
(45, 0, 'Module tin khuyến mãi sản phẩm', 'promotions', 0, '', 0),
(46, 0, 'Trang chủ tin khuyến mãi sản phẩm', 'promotions_index', 0, '', 45),
(47, 0, 'Trang chi tiết tin khuyến mãi', 'promotions_details', 0, '', 45),
(49, 0, 'Module trang chủ', 'home', 1, '', 0),
(51, 0, 'Trang sitemap website', 'home_sitemap', 0, '', 49),
(52, 0, 'Search project result page', 'search_product', 1, '', 37),
(53, 0, 'Trang chi tiết video', 'gallery_mediadetails', 1, '', 39);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblorder`
--

DROP TABLE IF EXISTS `vnvic_tblorder`;
CREATE TABLE IF NOT EXISTS `vnvic_tblorder` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` int(11) NOT NULL,
  `order_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `order_status` tinyint(4) NOT NULL DEFAULT '0',
  `order_info` text COLLATE utf8_unicode_ci NOT NULL,
  `cus_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `order_read` tinyint(4) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL,
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vnvic_tblorder`
--

INSERT INTO `vnvic_tblorder` (`order_id`, `cus_name`, `order_date`, `order_address`, `order_status`, `order_info`, `cus_email`, `cus_phone`, `order_read`, `last_update`, `user_name`) VALUES
(3, 'Lê Sỹ Hùng', 1312999418, 'Thọ xuân-Thanh Hóa', 2, 'đặt hàng qua mạng', 'soledad2410@gmail.com', '0984504580', 1, 1332749423, 'administrator'),
(4, 'Lê Sỹ Hùng', 1313006429, 'Thọ Lộc-Thọ xuân', 2, 'đặt hàng online qua mạng dảm bảo', 'soledad2410@gmail.com', '0984504580', 1, 1332749423, 'administrator'),
(6, 'Lê Sỹ Hùng', 1316079993, 'Thọ Xuân-Thanh Hóa', 2, 'ádadadadsasd\nadsasdads', 'soledad2410@gmail.com', '0984504580', 0, 1332749423, 'administrator'),
(7, 'Lê sỹ hùng', 1316597649, 'Thọ xuân-Thanh Hóa', 2, 'dâdasdasdasdasdasdjavascript:void(0)', 'soledad2410@gmail.com', '0984504580', 0, 1332749423, 'administrator'),
(8, '', 1317706225, '', 2, '', '', '', 0, 1332749423, 'administrator'),
(9, 'Lê sỹ hùng', 1332748649, 'thọ xuân- thanh hóa', 2, 'ádasdasdadasd', 'soledad2410@gmail.com', '098450450', 1, 1332749423, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblorderdetails`
--

DROP TABLE IF EXISTS `vnvic_tblorderdetails`;
CREATE TABLE IF NOT EXISTS `vnvic_tblorderdetails` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_quanlity` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vnvic_tblorderdetails`
--

INSERT INTO `vnvic_tblorderdetails` (`order_id`, `product_id`, `product_name`, `order_quanlity`, `order_price`) VALUES
(3, 12600, 'lenovo g460 i370', 2, 12600000),
(3, 12300, 'Dell vostro', 1, 12300000),
(3, 113, 'Dell vostro', 1, 12600000),
(4, 108, 'Dell vostro2', 1, 12688000),
(6, 141, 'Tivi', 1, 220000),
(6, 132, 'Điện tử', 1, 215000),
(6, 140, 'Tivi', 1, 220000),
(6, 139, 'Karaoke', 1, 215000),
(7, 134, 'Amply', 3, 215000),
(7, 129, 'Điện tử', 4, 215000),
(8, 149, 'Notebook Acer', 1, 12999000),
(8, 141, 'Tivi', 2, 220000),
(8, 136, 'LCD', 3, 215000),
(8, 147, 'Notebook Acer', 1, 12999000),
(9, 166, 'Sản phẩm 1', 2, 9000000);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblplugin`
--

DROP TABLE IF EXISTS `vnvic_tblplugin`;
CREATE TABLE IF NOT EXISTS `vnvic_tblplugin` (
  `plugin_id` int(11) NOT NULL AUTO_INCREMENT,
  `plugintype_id` int(11) NOT NULL,
  `plugin_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `plugin_title` text COLLATE utf8_unicode_ci NOT NULL,
  `config` text COLLATE utf8_unicode_ci,
  `position_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `plugin_queu` int(11) NOT NULL,
  `menu_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `plugin_visible` tinyint(1) NOT NULL DEFAULT '0',
  `plugin_home` tinyint(1) NOT NULL DEFAULT '1',
  `plugintemplate_id` text COLLATE utf8_unicode_ci NOT NULL,
  `configvalue` text COLLATE utf8_unicode_ci,
  `plugin_submenu` text COLLATE utf8_unicode_ci NOT NULL,
  `page_ids` text COLLATE utf8_unicode_ci NOT NULL,
  `layout_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `embed_code` text COLLATE utf8_unicode_ci NOT NULL,
  `block_article` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Plugin content article',
  `block_product` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Plugin content product',
  `plugin_privilege` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `plugin_filter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `template` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`plugin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `vnvic_tblplugin`
--

INSERT INTO `vnvic_tblplugin` (`plugin_id`, `plugintype_id`, `plugin_name`, `lang_id`, `plugin_title`, `config`, `position_name`, `plugin_queu`, `menu_ids`, `plugin_visible`, `plugin_home`, `plugintemplate_id`, `configvalue`, `plugin_submenu`, `page_ids`, `layout_name`, `embed_code`, `block_article`, `block_product`, `plugin_privilege`, `plugin_filter`, `template`, `image`) VALUES
(3, 1, '', '16', 'Danh mục content', '', 'top_content', 3, '', 1, 1, 'content_menu', '', '6|7|8|9|', '', 'default', '', '', '', '', '', 'idjland', NULL),
(5, 1, '', '16', 'Danh mục sản phẩm', '', 'left_content', 5, '', 1, 1, 'left_nav', '', '10|', '', 'default', '', '', '', '', '', 'idjland', NULL),
(29, 25, '', '16', 'Slideshow trang chủ', '', 'slideshow', 23, '0', 1, 1, 'slideshow', '', '', '', 'default', '', '', '', '', '', 'aai', ''),
(27, 1, '', '16', 'Danh mục chính', '', 'main_nav', 21, '0|1|2|3|6|4|8|9|10|11|13|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|7|14|5|12', 1, 1, 'menu_main', '', '1|2|4|3|25|5|', '27|29|26|28|34|52|40|41|53', 'default', '', '', '', '', '', 'aai', ''),
(28, 15, '', '16', 'Đặt lịch tư vấn - Tiếng Việt', '', 'slideshow', 22, '0', 1, 1, 'schedule_box_vi', '', '', '', 'default', '', '', '', '', '', 'aai', NULL),
(21, 1, '', '16', 'Danh mục chính mobile', '', 'top_nav_mobile', 16, '0|24|18|19|21|22|23|1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|17|20', 1, 1, 'nav_top_mobile', '', '18|1|5|6|17|19|20|25|', '27|29|26|28|34|36|52|40|41|46|47|51', 'default', '', '', '', '', '', 'mobile', NULL),
(22, 25, '', '16', 'Slideshow mobile', '', 'slideshow_mobile', 17, '0', 1, 1, 'slideshow_mobile', '', '', '', 'default', '', '', '', '', '', 'mobile', NULL),
(37, 33, '', '16', 'Bất động sản', 'limit|type', 'left_content', 30, '0', 1, 1, 'product_left', '5|latest', 'all', '', 'default', '', '', '', '', '', 'aai', 'upload/images/block/left-img-3.png'),
(25, 11, '', '16', 'Hỗ trợ trực tuyến', '', 'bottom_content_mobile', 19, '0|24|18|19|21|22|23|1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|17|20', 1, 1, 'support_mobile', '', '', '27|29|26|28|34|36|52|40|41|46|47|51', 'default', '', '', '', '', '', 'mobile', NULL),
(26, 15, '', '16', 'Đăng ký nhận bản tin', '', 'bottom_content_mobile', 20, '0', 1, 1, 'register_mail_mobile', '', '', '', 'default', '', '', '', '', '', 'mobile', NULL),
(30, 27, '', '16', 'thông tin chung về xin visa', '', 'left_content', 25, '0|2|26|27|28|29|30|31|32|33|34|35|36|37|38|39', 1, 1, 'news_left', '', '', '', 'default', '', '', '', '', '', 'aai', 'upload/images/block/left-img-1.png'),
(31, 25, '', '16', 'Cuộc sống và con người', '', 'left_content', 26, '0', 1, 1, 'link_left', '', '', '29|26', 'default', '', '', '', '', '', 'aai', 'upload/images/block/left-img-2.png'),
(34, 1, '', '16', 'ĐỊNH CƯ CANADA', '', 'left_content', 24, '1|2|26|27|28|29|30|31|32|33|34|35|36|37|38|39', 1, 1, 'nav_left', '', '2|', '27', 'default', '', '', '', '', '', 'aai', 'upload/images/block/left-nav.jpg'),
(33, 15, '', '16', 'Tin tức', '', 'left_content', 28, '4', 1, 1, 'filter_news', '', '', '27', 'default', '', '', '', '', '', 'aai', 'upload/images/block/filternews-img.jpg'),
(38, 32, '', '16', 'Tin tức di trú', 'limit|type', 'bottom_content', 31, '2|13|14|15|16|17|18|19|26|31|32|33|34|35|36|27|37|38|39|28|29|30', 1, 1, 'news_content', '3|latest', '18', '', 'default', '', '', '', '', '', 'aai', '');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblplugintype`
--

DROP TABLE IF EXISTS `vnvic_tblplugintype`;
CREATE TABLE IF NOT EXISTS `vnvic_tblplugintype` (
  `plugintype_id` int(11) NOT NULL AUTO_INCREMENT,
  `plugintype_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `plugintype_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pluginconfig_name` text COLLATE utf8_unicode_ci NOT NULL,
  `pluginconfig_title` text COLLATE utf8_unicode_ci NOT NULL,
  `plugintype_visible` tinyint(4) NOT NULL DEFAULT '1',
  `plugintype_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `field_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `field_value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`plugintype_id`),
  UNIQUE KEY `plugintype_name` (`plugintype_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `vnvic_tblplugintype`
--

INSERT INTO `vnvic_tblplugintype` (`plugintype_id`, `plugintype_name`, `plugintype_title`, `pluginconfig_name`, `pluginconfig_title`, `plugintype_visible`, `plugintype_description`, `field_type`, `field_value`) VALUES
(11, 'support', 'hỗ trợ trực tuyến', '0', '0', 1, 'Khối hiển thị hỗ trợ  trực tuyến của website', NULL, NULL),
(1, 'menu', 'Khối danh mục', '0', '0', 1, '-Khối danh mục,hiển thị các  danh mục nằm trong khối\n-Cấp hiển thị danh mục tùy thuộc vào template của danh mục', NULL, NULL),
(27, 'block_news', 'Khối tin tức tự chọn', '0', '0', 1, 'Khối nội dung chứa tin tức tự chọn từ danh sách', NULL, NULL),
(15, 'ultilities', 'Khối tiện ích', '0', '0', 1, 'Khối tiện ích ,chức năng hiển thị tùy theo template hiển thị', NULL, NULL),
(33, 'product', 'Khối sản phẩm', 'limit|type', 'Số lượng hiển thị|Loại sản phẩm hiển thị', 1, 'Khối nội dung sản phẩm', 'textbox|radio', '6|Mới nhất:latest,Sản phẩm hot:hot,Sản phẩm mua nhiều:bestsale,Sản phẩm xem nhiều:mostviewed,Sản phẩm trang chủ:home'),
(26, 'block_product', 'Khối sản phẩm tự chọn', '0', '0', 1, 'Khối nội dung chứa sản phẩm tự chọn từ danh sách', NULL, NULL),
(21, 'product_filter', 'Bộ lọc sản phẩm', 'filter_by_price', 'khoảng giá (min1-max1,min2-max2,.. )', 1, '', NULL, NULL),
(23, 'html', 'Khối mã nhúng html', '', '', 1, '', NULL, NULL),
(25, 'media', 'Khối nội dung media', '0', '0', 1, '-Khối nội dung media\n-Chứa các nội dung bao gồm\n +Link liên kết\n +Quảng cáo\n +Slideshow\n +Clip,music,video...etc', NULL, NULL),
(32, 'news', 'Khối tin tức', 'limit|type', 'Số lượng hiển thị|Tin tức hiển thị', 1, 'Khối hiển thị tin tức', 'textbox|radio', '6|Tin mới nhất:latest,Tin hot:hot,Tin xem nhiều nhất:mostviewed,tin trang chủ:home\n');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblprivilege`
--

DROP TABLE IF EXISTS `vnvic_tblprivilege`;
CREATE TABLE IF NOT EXISTS `vnvic_tblprivilege` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `groups_accept` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`privilege_id`),
  UNIQUE KEY `privilege_name` (`privilege_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblproduct`
--

DROP TABLE IF EXISTS `vnvic_tblproduct`;
CREATE TABLE IF NOT EXISTS `vnvic_tblproduct` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_nhasx` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_nhasxlogo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `product_warranty` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` bigint(11) NOT NULL,
  `product_saleoff` int(11) NOT NULL,
  `product_summary` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8_unicode_ci NOT NULL,
  `product_quanlity` int(11) NOT NULL,
  `product_home` tinyint(4) NOT NULL DEFAULT '0',
  `product_visible` tinyint(4) NOT NULL DEFAULT '1',
  `product_hot` tinyint(4) NOT NULL DEFAULT '0',
  `product_bestsell` tinyint(4) NOT NULL DEFAULT '0',
  `product_new` tinyint(4) NOT NULL DEFAULT '0',
  `product_status` tinyint(4) NOT NULL DEFAULT '1',
  `product_tags` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_queu` int(11) NOT NULL,
  `product_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_color_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_other_image` text COLLATE utf8_unicode_ci NOT NULL,
  `product_h1` text COLLATE utf8_unicode_ci NOT NULL,
  `product_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `product_metadesc` text COLLATE utf8_unicode_ci NOT NULL,
  `product_date` int(11) NOT NULL,
  `product_rate` tinyint(4) NOT NULL DEFAULT '0',
  `product_comment` tinyint(4) NOT NULL DEFAULT '0',
  `product_metatitle` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_comment_privilege` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `promotion_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `promotion_details` text COLLATE utf8_unicode_ci NOT NULL,
  `product_size` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_attachment` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_vat` int(11) DEFAULT NULL,
  `product_shipping` int(11) DEFAULT NULL,
  `product_worker` int(11) DEFAULT NULL,
  `product_thick` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` double(10,6) DEFAULT NULL,
  `lng` double(10,6) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `product_address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direction` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investor` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `vnvic_tblproduct`
--

INSERT INTO `vnvic_tblproduct` (`product_id`, `product_code`, `product_nhasx`, `product_nhasxlogo`, `product_name`, `menu_id`, `producttype_id`, `product_warranty`, `product_price`, `product_saleoff`, `product_summary`, `product_details`, `product_quanlity`, `product_home`, `product_visible`, `product_hot`, `product_bestsell`, `product_new`, `product_status`, `product_tags`, `product_queu`, `product_image`, `product_color_image`, `product_other_image`, `product_h1`, `product_keyword`, `product_metadesc`, `product_date`, `product_rate`, `product_comment`, `product_metatitle`, `product_comment_privilege`, `promotion_title`, `promotion_details`, `product_size`, `product_attachment`, `product_vat`, `product_shipping`, `product_worker`, `product_thick`, `lat`, `lng`, `location_id`, `product_address`, `direction`, `investor`, `city_id`) VALUES
(1, 'CTCC01', 'sale', '', 'Phú Gia Residence', 40, 13, '5', 20000000, 0, 'Dự án mới mở', '<p>\r\n	Dự &aacute;n mới</p>\r\n', 0, 2, 1, 0, 0, 0, 1, '', 1, 'upload/images/duan/pro-img.jpg', '', '', '', 'bbb', 'ccc', 1427065200, 0, 0, 'aaa', '', '', '', '100', '', 10, 0, 0, '', 0.000000, 0.000000, 21, 'Số 3 Nguyễn Huy Tưởng. quận Thanh Xuân, Hà nội', 'south', 'Công ty cổ phần đầu tư phát triển Hợp Phú', 17),
(2, 'CTCC02', 'sale', '', 'Phú Gia Residence', 41, 13, '5', 750000, 0, 'Dự án mới mở', '<p>\r\n	Dự &aacute;n mới</p>\r\n', 0, 2, 1, 0, 0, 0, 1, '', 2, 'upload/images/duan/pro-img.jpg', '', '', '', 'bbb', 'ccc', 1427065200, 0, 0, 'aaa', '', '', '', '100', '', 10, 0, 0, '', 0.000000, 0.000000, 21, 'Số 3 Nguyễn Huy Tưởng. quận Thanh Xuân, Hà nội', 'south', 'Công ty cổ phần đầu tư phát triển Hợp Phú', 17),
(3, 'CTCC03', 'sale', '', 'Phú Gia Residence', 40, 13, '5', 750000, 0, 'Dự án mới mở', '<p>\r\n	Dự &aacute;n mới</p>\r\n', 0, 1, 1, 0, 0, 0, 1, '', 2, 'upload/images/duan/pro-img.jpg', '', '', '', 'bbb', 'ccc', 1427065200, 0, 0, 'aaa', '', '', '', '100', '', 10, 0, 0, '', 0.000000, 0.000000, 21, 'Số 3 Nguyễn Huy Tưởng. quận Thanh Xuân, Hà nội', 'south', 'Công ty cổ phần đầu tư phát triển Hợp Phú', 17),
(4, 'CTCC04', 'sale', '', 'Phú Gia Residence', 40, 13, '5', 20000000, 0, 'Dự án mới mở', '<p>\r\n	Dự &aacute;n mới</p>\r\n', 0, 2, 1, 0, 0, 0, 1, '', 1, 'upload/images/duan/pro-img.jpg', '', '', '', 'bbb', 'ccc', 1427065200, 0, 0, 'aaa', '', '', '', '100', '', 10, 0, 0, '', 0.000000, 0.000000, 21, 'Số 3 Nguyễn Huy Tưởng. quận Thanh Xuân, Hà nội', 'south', 'Công ty cổ phần đầu tư phát triển Hợp Phú', 17),
(5, 'CTCC05', 'rent', '', 'Phú Gia Residence', 40, 13, '5', 20000000, 0, 'Dự án mới mở', '<p>\r\n	Dự &aacute;n mới</p>\r\n', 0, 2, 1, 0, 0, 0, 1, '', 1, 'upload/images/duan/pro-img.jpg', '', '', '', 'bbb', 'ccc', 1427065200, 0, 0, 'aaa', '', '', '', '100', '', 10, 0, 0, '', 0.000000, 0.000000, 21, 'Số 3 Nguyễn Huy Tưởng. quận Thanh Xuân, Hà nội', 'south', 'Công ty cổ phần đầu tư phát triển Hợp Phú', 17),
(6, 'CTCC06', 'rent', '', 'Phú Gia Residence', 40, 13, '5', 20000000, 0, 'Dự án mới mở', '<p>\r\n	Dự &aacute;n mới</p>\r\n', 0, 2, 1, 0, 0, 0, 1, '', 1, 'upload/images/duan/pro-img.jpg', '', '', '', 'bbb', 'ccc', 1427065200, 0, 0, 'aaa', '', '', '', '100', '', 10, 0, 0, '', 0.000000, 0.000000, 21, 'Số 3 Nguyễn Huy Tưởng. quận Thanh Xuân, Hà nội', 'south', 'Công ty cổ phần đầu tư phát triển Hợp Phú', 17),
(7, 'CTCC07', 'rent', '', 'Phú Gia Residence', 40, 13, '5', 20000000, 0, 'Dự án mới mở', '<p>\r\n	Dự &aacute;n mới</p>\r\n', 0, 1, 1, 0, 0, 0, 1, '', 1, 'upload/images/duan/pro-img.jpg', '', '', '', 'bbb', 'ccc', 1427065200, 0, 0, 'aaa', '', '', '', '100', '', 10, 0, 0, '', 0.000000, 0.000000, 21, 'Số 3 Nguyễn Huy Tưởng. quận Thanh Xuân, Hà nội', 'south', 'Công ty cổ phần đầu tư phát triển Hợp Phú', 17),
(8, 'HAPULICO01', 'rent', '', 'CHO THUÊ VĂN PHÒNG HAPULICO', 40, 13, '5', 750000, 0, '', '<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<br class="Apple-interchange-newline" />\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;"><img alt="" src="http://datxanhmienbac.vn/images/posts/30-05-2013/33732648_h%20VP.JPG" style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; max-width: 675px; background: none 0px 0px repeat scroll transparent;" /></span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">VỊ TR&Iacute;:</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">Nằm ở vị tr&iacute; cực kỳ đắc địa, với 3 mặt phố Nguyễn Huy Tưởng, Vũ Trọng Phụng v&agrave; Ngụy Như Kon Tum, dự &aacute;n Trung t&acirc;m thương mại, văn ph&ograve;ng, nh&agrave; ở cao cấp Hapulico Complex được đ&aacute;nh gi&aacute; l&agrave; &ldquo;điểm nhấn&rdquo; cho thị trường văn ph&ograve;ng cho thu&ecirc; tại H&agrave; Nội</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<img alt="" src="http://datxanhmienbac.vn/images/posts/16-07-2013/80910131_201110084510_anh_3.jpg" style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; max-width: 675px; width: 600px; height: 418px; background: none 0px 0px repeat scroll transparent;" /></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">C&ocirc;ng tr&igrave;nh Hapulico Complex l&agrave; tổ hợp c&aacute;c c&ocirc;ng tr&igrave;nh thương mại, văn ph&ograve;ng, nh&agrave; ở cao cấp, được x&acirc;y dựng&nbsp; tr&ecirc;n tổng diện t&iacute;ch đất l&agrave; 43.333,2m2, được thiết kế gồm c&aacute;c khu ch&iacute;nh:</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khu hỗn hợp gồm 2 th&aacute;p cao 24 tầng;</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khu A c&oacute; 2 khối 21 tầng</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khu B1 gồm 2 khối 17 tầng</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khu B2 gồm 2 khối 17 tầng</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khu nh&agrave; thấp tầng gồm 28 nh&agrave; vườn v&agrave; nh&agrave; trẻ.</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">Với c&ocirc;ng tr&igrave;nh n&agrave;y, c&aacute;c nh&agrave; thiết kế đ&atilde; rất tinh tế tạo ra một tổng thể kiến tr&uacute;c sinh động, đẹp, đ&aacute;p ứng được y&ecirc;u cầu của phong c&aacute;ch hiện đại, đơn giản c&oacute; t&iacute;nh thẩm mỹ cao.</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	&nbsp;</p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">C&ocirc;ng tr&igrave;nh cao từ 17 - 24 tầng, sắp xếp theo thứ tự từ thấp đến cao. Mỗi khối nh&agrave; đều c&oacute; 2-3 tầng hầm, c&aacute;c tầng từ 2-5 l&agrave; đế c&ocirc;ng tr&igrave;nh bố tr&iacute; khu thương mại, dịch vụ, c&oacute; 1 tầng kỹ thuật, c&aacute;c tầng tr&ecirc;n bố tr&iacute; căn hộ ở hoặc văn ph&ograve;ng. C&aacute;c t&ograve;a nh&agrave; trong khu đều đa chức năng, c&aacute;c tầng dưới l&agrave; khu thương mại, dịch vụ c&ocirc;ng cộng, tr&ecirc;n l&agrave; văn ph&ograve;ng l&agrave;m việc v&agrave; căn hộ đ&aacute;p ứng nhu cầu sử dụng đa dạng của khu tổ hợp, đồng thời c&oacute; một bố cục li&ecirc;n kết chặt chẽ v&agrave; ph&ugrave; hợp tổng thể chung của to&agrave;n khu.</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">C&aacute;ch tổ chức mặt bằng&nbsp; của c&ocirc;ng tr&igrave;nh cũng được nghi&ecirc;n cứu rất c&ocirc;ng phu v&agrave; tối ưu. C&aacute;c khu thương mại v&agrave; dịch vụ được tiếp cận dễ d&agrave;ng thuận lợi ngay từ mặt đường ch&iacute;nh (đường Nguyễn Huy Tưởng hoặc Vũ Trọng Phụng). Việc t&aacute;ch ri&ecirc;ng sảnh chung cư, sảnh văn ph&ograve;ng, sảnh thương mại g&acirc;y tốn k&eacute;m cho chủ đầu tư nhưng mang lại sự tiện nghi cho người sử dụng ở cả nơi ở, nơi l&agrave;m việc v&agrave; kh&ocirc;ng gian mua sắm.</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">Khối văn ph&ograve;ng&nbsp;(19 tầng của t&ograve;a nh&agrave; 24T) với khoảng hơn 31.000m2&nbsp;được thiết kế chuẩn hạng B, tổ chức giao th&ocirc;ng theo trục đứng bao gồm 6 thang m&aacute;y Mitsibishi c&oacute; tải trọng 1200 kg (16 người), tốc độ 3,5-4 m/gi&acirc;y; 2 thang bộ v&agrave; 1 thang tời h&agrave;ng đủ để phục vụ giao th&ocirc;ng thuận lợi cho khối văn ph&ograve;ng. Kh&ocirc;ng chỉ được hưởng lợi tiện &iacute;ch từ khối b&aacute;n lẻ, c&aacute;c trung t&acirc;m mua sắm, c&aacute;c tầng tr&ecirc;n c&ugrave;ng của khối văn ph&ograve;ng cũng được bố tr&iacute; ph&ograve;ng ăn, quầy bar phục vụ cho những người l&agrave;m việc trong khu vực n&agrave;y.</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	&nbsp;</p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">DANH MỤC VẬT LIỆU V&Agrave; THIẾT BỊ HO&Agrave;N THIỆN</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">B&Ecirc;N TRONG V&Agrave; B&Ecirc;N NGO&Agrave;I KHU VĂN PH&Ograve;NG</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">TO&Agrave; NH&Agrave;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Hỗn hợp 24 tầng (Khu văn ph&ograve;ng)</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	<span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; background: none 0px 0px repeat scroll transparent;"><span style="border: 0px none; outline: none 0px; font-size: 12px; vertical-align: baseline; margin: 0px; padding: 0px; word-wrap: break-word; font-family: arial, helvetica, sans-serif; background: none 0px 0px repeat scroll transparent;">DỰ &Aacute;N &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: KHU TRUNG T&Acirc;M THƯƠNG MẠI, VĂN PH&Ograve;NG V&Agrave; NH&Agrave; Ở CAO CẤP HAPULICO.</span></span></p>\r\n<p style="border: 0px none; outline: none 0px; font-size: 12.00119972229px; vertical-align: baseline; margin: 0px 0px 0.3em; padding: 0px; word-wrap: break-word; color: rgb(102, 102, 102); font-family: Tahoma, Geneva, sans-serif; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21.6021595001221px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background: none 0px 0px repeat scroll rgb(255, 255, 255);">\r\n	&nbsp;</p>\r\n', 0, 0, 1, 0, 0, 0, 1, '', 3, 'upload/images/duan/hapulico.jpg', '', '', '', '', '', 1427666400, 0, 0, '', '', '', '', '', NULL, 10, NULL, NULL, NULL, NULL, NULL, 20, '', '', 'HAPULICO', 17);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblproductattachment`
--

DROP TABLE IF EXISTS `vnvic_tblproductattachment`;
CREATE TABLE IF NOT EXISTS `vnvic_tblproductattachment` (
  `prodattachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `prodattachment_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `prodattachment_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `prodattachment_price` int(11) NOT NULL,
  `prodattachment_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`prodattachment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `vnvic_tblproductattachment`
--

INSERT INTO `vnvic_tblproductattachment` (`prodattachment_id`, `product_id`, `prodattachment_name`, `prodattachment_image`, `prodattachment_price`, `prodattachment_description`) VALUES
(1, 162, '0', 'upload/images/quangcao/g460.jpg', 0, ''),
(2, 164, '0', 'upload/images/quangcao/g460.jpg', 0, ''),
(3, 165, '0', 'upload/images/quangcao/g4602.jpg', 0, ''),
(4, 165, '0', 'upload/images/quangcao/ipad.jpg', 0, ''),
(5, 166, 'Chân bàn', 'upload/images/slideshow/partner-4.png', 1000000, 'chân bàn'),
(6, 166, 'Tai Nghe', 'upload/images/slideshow/partner-5.png', 200000, 'Tai Nghe bluetooth'),
(7, 167, 'Chân', 'upload/images/gallery/album_1/Desktopography_002.jpg', 200000, 'sssss'),
(8, 167, 'Bàn', 'upload/images/gallery/album_1/Desktopography_004.jpg', 60000, 'ddddđ');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblproductcolors`
--

DROP TABLE IF EXISTS `vnvic_tblproductcolors`;
CREATE TABLE IF NOT EXISTS `vnvic_tblproductcolors` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_hexa` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1535 ;

--
-- Dumping data for table `vnvic_tblproductcolors`
--

INSERT INTO `vnvic_tblproductcolors` (`color_id`, `color_hexa`, `product_id`, `product_images`) VALUES
(5, 'ff00ff', 166, 'upload/images/slideshow/img-1.png|'),
(4, '00ff00', 165, ''),
(6, '51518f', 166, 'upload/images/slideshow/slide.jpg|upload/images/slideshow/partner-5.png|upload/images/slideshow/partner-3.png|'),
(7, '00ff00', 166, 'upload/images/slideshow/adv-1.png|upload/images/slideshow/partner-4.png|'),
(8, '00ff00', 166, ''),
(9, '2d2da8', 166, ''),
(10, '00ff00', 166, ''),
(11, 'd500ff', 167, 'upload/images/gallery/album070220120944/Desktopography_001.jpg|upload/images/gallery/album070220120944/Desktopography_002.jpg|upload/images/gallery/album070220120944/Desktopography_004.jpg|'),
(12, 'c4ff00', 167, 'upload/images/gallery/album070220120944/Desktopography_001.jpg|upload/images/gallery/album070220120944/Desktopography_003.jpg|upload/images/gallery/album_1/Desktopography_002.jpg|'),
(13, '00ff00', 167, 'upload/images/gallery/album_1/Desktopography_006.jpg|upload/images/gallery/album_1/Desktopography_007.jpg|'),
(14, '00ff00', 167, ''),
(15, '00ff00', 167, ''),
(16, '00ff00', 167, ''),
(17, '00ff00', 168, ''),
(18, '00ff00', 168, ''),
(19, '2bff00', 168, ''),
(20, '00ff00', 168, ''),
(21, '00ff00', 168, ''),
(22, '00ff00', 168, ''),
(23, '00ff00', 169, ''),
(24, '00ff00', 169, ''),
(25, '00ff00', 169, ''),
(26, '00ff00', 169, ''),
(27, '00ff00', 169, ''),
(28, '00ff00', 169, ''),
(29, '00ff00', 170, ''),
(30, '00ff00', 170, ''),
(31, '00ff00', 170, ''),
(32, '00ff00', 170, ''),
(33, '00ff00', 170, ''),
(34, '00ff00', 170, ''),
(35, '00ff00', 171, ''),
(36, '00ff00', 171, ''),
(37, '00ff00', 171, ''),
(38, '00ff00', 171, ''),
(39, '00ff00', 171, ''),
(40, '00ff00', 171, ''),
(41, '00ff00', 172, ''),
(42, '00ff00', 172, ''),
(43, '00ff00', 172, ''),
(44, '00ff00', 172, ''),
(45, '00ff00', 172, ''),
(46, '00ff00', 172, ''),
(47, '00ff00', 173, ''),
(48, '00ff00', 173, ''),
(49, '00ff00', 173, ''),
(50, '00ff00', 173, ''),
(51, '00ff00', 173, ''),
(52, '00ff00', 173, ''),
(53, '00ff00', 174, ''),
(54, '00ff00', 174, ''),
(55, '00ff00', 174, ''),
(56, '00ff00', 174, ''),
(57, '00ff00', 174, ''),
(58, '00ff00', 174, ''),
(59, '00ff00', 175, 'upload/images/product/dong-phuc-mau-01.jpg|upload/images/product/g460.jpg|'),
(60, '00ff00', 175, ''),
(61, '00ff00', 175, ''),
(62, '00ff00', 175, ''),
(63, '00ff00', 175, ''),
(64, '00ff00', 175, ''),
(65, '00ff00', 178, ''),
(66, '00ff00', 178, ''),
(67, '00ff00', 178, ''),
(68, '00ff00', 178, ''),
(69, '00ff00', 178, ''),
(70, '00ff00', 178, ''),
(71, '00ff00', 179, ''),
(72, '00ff00', 179, ''),
(73, '00ff00', 179, ''),
(74, '00ff00', 179, ''),
(75, '00ff00', 179, ''),
(76, '00ff00', 179, ''),
(77, '00ff00', 180, ''),
(78, '00ff00', 180, ''),
(79, '00ff00', 180, ''),
(80, '00ff00', 180, ''),
(81, '00ff00', 180, ''),
(82, '00ff00', 180, ''),
(83, '00ff00', 181, ''),
(84, '00ff00', 181, ''),
(85, '00ff00', 181, ''),
(86, '00ff00', 181, ''),
(87, '00ff00', 181, ''),
(88, '00ff00', 181, ''),
(89, '00ff00', 182, ''),
(90, '00ff00', 182, ''),
(91, '00ff00', 182, ''),
(92, '00ff00', 182, ''),
(93, '00ff00', 182, ''),
(94, '00ff00', 182, ''),
(95, '00ff00', 183, ''),
(96, '00ff00', 183, ''),
(97, '00ff00', 183, ''),
(98, '00ff00', 183, ''),
(99, '00ff00', 183, ''),
(100, '00ff00', 183, ''),
(101, '00ff00', 184, ''),
(102, '00ff00', 184, ''),
(103, '00ff00', 184, ''),
(104, '00ff00', 184, ''),
(105, '00ff00', 184, ''),
(106, '00ff00', 184, ''),
(107, '00ff00', 185, ''),
(108, '00ff00', 185, ''),
(109, '00ff00', 185, ''),
(110, '00ff00', 185, ''),
(111, '00ff00', 185, ''),
(112, '00ff00', 185, ''),
(113, '00ff00', 186, ''),
(114, '00ff00', 186, ''),
(115, '00ff00', 186, ''),
(116, '00ff00', 186, ''),
(117, '00ff00', 186, ''),
(118, '00ff00', 186, ''),
(119, '00ff00', 187, ''),
(120, '00ff00', 187, ''),
(121, '00ff00', 187, ''),
(122, '00ff00', 187, ''),
(123, '00ff00', 187, ''),
(124, '00ff00', 187, ''),
(125, '00ff00', 188, ''),
(126, '00ff00', 188, ''),
(127, '00ff00', 188, ''),
(128, '00ff00', 188, ''),
(129, '00ff00', 188, ''),
(130, '00ff00', 188, ''),
(131, '00ff00', 189, ''),
(132, '00ff00', 189, ''),
(133, '00ff00', 189, ''),
(134, '00ff00', 189, ''),
(135, '00ff00', 189, ''),
(136, '00ff00', 189, ''),
(137, '00ff00', 190, ''),
(138, '00ff00', 190, ''),
(139, '00ff00', 190, ''),
(140, '00ff00', 190, ''),
(141, '00ff00', 190, ''),
(142, '00ff00', 190, ''),
(143, '00ff00', 191, ''),
(144, '00ff00', 191, ''),
(145, '00ff00', 191, ''),
(146, '00ff00', 191, ''),
(147, '00ff00', 191, ''),
(148, '00ff00', 191, ''),
(149, '00ff00', 192, ''),
(150, '00ff00', 192, ''),
(151, '00ff00', 192, ''),
(152, '00ff00', 192, ''),
(153, '00ff00', 192, ''),
(154, '00ff00', 192, ''),
(155, '00ff00', 193, ''),
(156, '00ff00', 193, ''),
(157, '00ff00', 193, ''),
(158, '00ff00', 193, ''),
(159, '00ff00', 193, ''),
(160, '00ff00', 193, ''),
(161, '00ff00', 194, ''),
(162, '00ff00', 194, ''),
(163, '00ff00', 194, ''),
(164, '00ff00', 194, ''),
(165, '00ff00', 194, ''),
(166, '00ff00', 194, ''),
(167, '00ff00', 195, ''),
(168, '00ff00', 195, ''),
(169, '00ff00', 195, ''),
(170, '00ff00', 195, ''),
(171, '00ff00', 195, ''),
(172, '00ff00', 195, ''),
(173, '00ff00', 196, ''),
(174, '00ff00', 196, ''),
(175, '00ff00', 196, ''),
(176, '00ff00', 196, ''),
(177, '00ff00', 196, ''),
(178, '00ff00', 196, ''),
(179, '00ff00', 197, ''),
(180, '00ff00', 197, ''),
(181, '00ff00', 197, ''),
(182, '00ff00', 197, ''),
(183, '00ff00', 197, ''),
(184, '00ff00', 197, ''),
(185, '00ff00', 198, ''),
(186, '00ff00', 198, ''),
(187, '00ff00', 198, ''),
(188, '00ff00', 198, ''),
(189, '00ff00', 198, ''),
(190, '00ff00', 198, ''),
(191, '00ff00', 199, ''),
(192, '00ff00', 199, ''),
(193, '00ff00', 199, ''),
(194, '00ff00', 199, ''),
(195, '00ff00', 199, ''),
(196, '00ff00', 199, ''),
(197, '00ff00', 200, ''),
(198, '00ff00', 200, ''),
(199, '00ff00', 200, ''),
(200, '00ff00', 200, ''),
(201, '00ff00', 200, ''),
(202, '00ff00', 200, ''),
(203, '00ff00', 201, ''),
(204, '00ff00', 201, ''),
(205, '00ff00', 201, ''),
(206, '00ff00', 201, ''),
(207, '00ff00', 201, ''),
(208, '00ff00', 201, ''),
(209, '00ff00', 202, ''),
(210, '00ff00', 202, ''),
(211, '00ff00', 202, ''),
(212, '00ff00', 202, ''),
(213, '00ff00', 202, ''),
(214, '00ff00', 202, ''),
(215, '00ff00', 203, ''),
(216, '00ff00', 203, ''),
(217, '00ff00', 203, ''),
(218, '00ff00', 203, ''),
(219, '00ff00', 203, ''),
(220, '00ff00', 203, ''),
(221, '00ff00', 204, ''),
(222, '00ff00', 204, ''),
(223, '00ff00', 204, ''),
(224, '00ff00', 204, ''),
(225, '00ff00', 204, ''),
(226, '00ff00', 204, ''),
(227, '00ff00', 205, ''),
(228, '00ff00', 205, ''),
(229, '00ff00', 205, ''),
(230, '00ff00', 205, ''),
(231, '00ff00', 205, ''),
(232, '00ff00', 205, ''),
(233, '00ff00', 206, ''),
(234, '00ff00', 206, ''),
(235, '00ff00', 206, ''),
(236, '00ff00', 206, ''),
(237, '00ff00', 206, ''),
(238, '00ff00', 206, ''),
(239, '00ff00', 357, ''),
(240, '00ff00', 357, ''),
(241, '00ff00', 357, ''),
(242, '00ff00', 357, ''),
(243, '00ff00', 357, ''),
(244, '00ff00', 357, ''),
(245, '00ff00', 358, ''),
(246, '00ff00', 358, ''),
(247, '00ff00', 358, ''),
(248, '00ff00', 358, ''),
(249, '00ff00', 358, ''),
(250, '00ff00', 358, ''),
(251, '00ff00', 359, ''),
(252, '00ff00', 359, ''),
(253, '00ff00', 359, ''),
(254, '00ff00', 359, ''),
(255, '00ff00', 359, ''),
(256, '00ff00', 359, ''),
(257, '00ff00', 360, ''),
(258, '00ff00', 360, ''),
(259, '00ff00', 360, ''),
(260, '00ff00', 360, ''),
(261, '00ff00', 360, ''),
(262, '00ff00', 360, ''),
(263, '00ff00', 361, ''),
(264, '00ff00', 361, ''),
(265, '00ff00', 361, ''),
(266, '00ff00', 361, ''),
(267, '00ff00', 361, ''),
(268, '00ff00', 361, ''),
(269, '00ff00', 362, ''),
(270, '00ff00', 362, ''),
(271, '00ff00', 362, ''),
(272, '00ff00', 362, ''),
(273, '00ff00', 362, ''),
(274, '00ff00', 362, ''),
(275, '00ff00', 363, ''),
(276, '00ff00', 363, ''),
(277, '00ff00', 363, ''),
(278, '00ff00', 363, ''),
(279, '00ff00', 363, ''),
(280, '00ff00', 363, ''),
(281, '00ff00', 364, ''),
(282, '00ff00', 364, ''),
(283, '00ff00', 364, ''),
(284, '00ff00', 364, ''),
(285, '00ff00', 364, ''),
(286, '00ff00', 364, ''),
(287, '00ff00', 365, ''),
(288, '00ff00', 365, ''),
(289, '00ff00', 365, ''),
(290, '00ff00', 365, ''),
(291, '00ff00', 365, ''),
(292, '00ff00', 365, ''),
(293, '00ff00', 366, ''),
(294, '00ff00', 366, ''),
(295, '00ff00', 366, ''),
(296, '00ff00', 366, ''),
(297, '00ff00', 366, ''),
(298, '00ff00', 366, ''),
(299, '00ff00', 367, ''),
(300, '00ff00', 367, ''),
(301, '00ff00', 367, ''),
(302, '00ff00', 367, ''),
(303, '00ff00', 367, ''),
(304, '00ff00', 367, ''),
(305, '00ff00', 368, ''),
(306, '00ff00', 368, ''),
(307, '00ff00', 368, ''),
(308, '00ff00', 368, ''),
(309, '00ff00', 368, ''),
(310, '00ff00', 368, ''),
(311, '00ff00', 369, ''),
(312, '00ff00', 369, ''),
(313, '00ff00', 369, ''),
(314, '00ff00', 369, ''),
(315, '00ff00', 369, ''),
(316, '00ff00', 369, ''),
(317, '00ff00', 370, ''),
(318, '00ff00', 370, ''),
(319, '00ff00', 370, ''),
(320, '00ff00', 370, ''),
(321, '00ff00', 370, ''),
(322, '00ff00', 370, ''),
(323, '00ff00', 371, ''),
(324, '00ff00', 371, ''),
(325, '00ff00', 371, ''),
(326, '00ff00', 371, ''),
(327, '00ff00', 371, ''),
(328, '00ff00', 371, ''),
(329, '00ff00', 372, ''),
(330, '00ff00', 372, ''),
(331, '00ff00', 372, ''),
(332, '00ff00', 372, ''),
(333, '00ff00', 372, ''),
(334, '00ff00', 372, ''),
(335, '00ff00', 373, ''),
(336, '00ff00', 373, ''),
(337, '00ff00', 373, ''),
(338, '00ff00', 373, ''),
(339, '00ff00', 373, ''),
(340, '00ff00', 373, ''),
(341, '00ff00', 374, ''),
(342, '00ff00', 374, ''),
(343, '00ff00', 374, ''),
(344, '00ff00', 374, ''),
(345, '00ff00', 374, ''),
(346, '00ff00', 374, ''),
(347, '00ff00', 375, ''),
(348, '00ff00', 375, ''),
(349, '00ff00', 375, ''),
(350, '00ff00', 375, ''),
(351, '00ff00', 375, ''),
(352, '00ff00', 375, ''),
(353, '00ff00', 376, ''),
(354, '00ff00', 376, ''),
(355, '00ff00', 376, ''),
(356, '00ff00', 376, ''),
(357, '00ff00', 376, ''),
(358, '00ff00', 376, ''),
(359, '00ff00', 377, ''),
(360, '00ff00', 377, ''),
(361, '00ff00', 377, ''),
(362, '00ff00', 377, ''),
(363, '00ff00', 377, ''),
(364, '00ff00', 377, ''),
(365, '00ff00', 378, ''),
(366, '00ff00', 378, ''),
(367, '00ff00', 378, ''),
(368, '00ff00', 378, ''),
(369, '00ff00', 378, ''),
(370, '00ff00', 378, ''),
(371, '00ff00', 379, ''),
(372, '00ff00', 379, ''),
(373, '00ff00', 379, ''),
(374, '00ff00', 379, ''),
(375, '00ff00', 379, ''),
(376, '00ff00', 379, ''),
(377, '00ff00', 380, ''),
(378, '00ff00', 380, ''),
(379, '00ff00', 380, ''),
(380, '00ff00', 380, ''),
(381, '00ff00', 380, ''),
(382, '00ff00', 380, ''),
(383, '00ff00', 381, ''),
(384, '00ff00', 381, ''),
(385, '00ff00', 381, ''),
(386, '00ff00', 381, ''),
(387, '00ff00', 381, ''),
(388, '00ff00', 381, ''),
(389, '00ff00', 382, ''),
(390, '00ff00', 382, ''),
(391, '00ff00', 382, ''),
(392, '00ff00', 382, ''),
(393, '00ff00', 382, ''),
(394, '00ff00', 382, ''),
(395, '00ff00', 383, ''),
(396, '00ff00', 383, ''),
(397, '00ff00', 383, ''),
(398, '00ff00', 383, ''),
(399, '00ff00', 383, ''),
(400, '00ff00', 383, ''),
(401, '00ff00', 384, ''),
(402, '00ff00', 384, ''),
(403, '00ff00', 384, ''),
(404, '00ff00', 384, ''),
(405, '00ff00', 384, ''),
(406, '00ff00', 384, ''),
(407, '00ff00', 385, ''),
(408, '00ff00', 385, ''),
(409, '00ff00', 385, ''),
(410, '00ff00', 385, ''),
(411, '00ff00', 385, ''),
(412, '00ff00', 385, ''),
(413, '00ff00', 386, ''),
(414, '00ff00', 386, ''),
(415, '00ff00', 386, ''),
(416, '00ff00', 386, ''),
(417, '00ff00', 386, ''),
(418, '00ff00', 386, ''),
(419, '00ff00', 387, ''),
(420, '00ff00', 387, ''),
(421, '00ff00', 387, ''),
(422, '00ff00', 387, ''),
(423, '00ff00', 387, ''),
(424, '00ff00', 387, ''),
(425, '00ff00', 388, ''),
(426, '00ff00', 388, ''),
(427, '00ff00', 388, ''),
(428, '00ff00', 388, ''),
(429, '00ff00', 388, ''),
(430, '00ff00', 388, ''),
(431, '00ff00', 389, ''),
(432, '00ff00', 389, ''),
(433, '00ff00', 389, ''),
(434, '00ff00', 389, ''),
(435, '00ff00', 389, ''),
(436, '00ff00', 389, ''),
(437, '00ff00', 390, ''),
(438, '00ff00', 390, ''),
(439, '00ff00', 390, ''),
(440, '00ff00', 390, ''),
(441, '00ff00', 390, ''),
(442, '00ff00', 390, ''),
(443, '00ff00', 391, ''),
(444, '00ff00', 391, ''),
(445, '00ff00', 391, ''),
(446, '00ff00', 391, ''),
(447, '00ff00', 391, ''),
(448, '00ff00', 391, ''),
(449, '00ff00', 392, ''),
(450, '00ff00', 392, ''),
(451, '00ff00', 392, ''),
(452, '00ff00', 392, ''),
(453, '00ff00', 392, ''),
(454, '00ff00', 392, ''),
(455, '00ff00', 393, ''),
(456, '00ff00', 393, ''),
(457, '00ff00', 393, ''),
(458, '00ff00', 393, ''),
(459, '00ff00', 393, ''),
(460, '00ff00', 393, ''),
(461, '00ff00', 394, ''),
(462, '00ff00', 394, ''),
(463, '00ff00', 394, ''),
(464, '00ff00', 394, ''),
(465, '00ff00', 394, ''),
(466, '00ff00', 394, ''),
(467, '00ff00', 395, ''),
(468, '00ff00', 395, ''),
(469, '00ff00', 395, ''),
(470, '00ff00', 395, ''),
(471, '00ff00', 395, ''),
(472, '00ff00', 395, ''),
(473, '00ff00', 396, ''),
(474, '00ff00', 396, ''),
(475, '00ff00', 396, ''),
(476, '00ff00', 396, ''),
(477, '00ff00', 396, ''),
(478, '00ff00', 396, ''),
(479, '00ff00', 397, ''),
(480, '00ff00', 397, ''),
(481, '00ff00', 397, ''),
(482, '00ff00', 397, ''),
(483, '00ff00', 397, ''),
(484, '00ff00', 397, ''),
(485, '00ff00', 398, ''),
(486, '00ff00', 398, ''),
(487, '00ff00', 398, ''),
(488, '00ff00', 398, ''),
(489, '00ff00', 398, ''),
(490, '00ff00', 398, ''),
(491, '00ff00', 399, ''),
(492, '00ff00', 399, ''),
(493, '00ff00', 399, ''),
(494, '00ff00', 399, ''),
(495, '00ff00', 399, ''),
(496, '00ff00', 399, ''),
(497, '00ff00', 400, ''),
(498, '00ff00', 400, ''),
(499, '00ff00', 400, ''),
(500, '00ff00', 400, ''),
(501, '00ff00', 400, ''),
(502, '00ff00', 400, ''),
(503, '00ff00', 401, ''),
(504, '00ff00', 401, ''),
(505, '00ff00', 401, ''),
(506, '00ff00', 401, ''),
(507, '00ff00', 401, ''),
(508, '00ff00', 401, ''),
(509, '00ff00', 402, ''),
(510, '00ff00', 402, ''),
(511, '00ff00', 402, ''),
(512, '00ff00', 402, ''),
(513, '00ff00', 402, ''),
(514, '00ff00', 402, ''),
(515, '00ff00', 403, ''),
(516, '00ff00', 403, ''),
(517, '00ff00', 403, ''),
(518, '00ff00', 403, ''),
(519, '00ff00', 403, ''),
(520, '00ff00', 403, ''),
(521, '00ff00', 404, ''),
(522, '00ff00', 404, ''),
(523, '00ff00', 404, ''),
(524, '00ff00', 404, ''),
(525, '00ff00', 404, ''),
(526, '00ff00', 404, ''),
(527, '00ff00', 405, ''),
(528, '00ff00', 405, ''),
(529, '00ff00', 405, ''),
(530, '00ff00', 405, ''),
(531, '00ff00', 405, ''),
(532, '00ff00', 405, ''),
(533, '00ff00', 406, ''),
(534, '00ff00', 406, ''),
(535, '00ff00', 406, ''),
(536, '00ff00', 406, ''),
(537, '00ff00', 406, ''),
(538, '00ff00', 406, ''),
(539, '00ff00', 407, ''),
(540, '00ff00', 407, ''),
(541, '00ff00', 407, ''),
(542, '00ff00', 407, ''),
(543, '00ff00', 407, ''),
(544, '00ff00', 407, ''),
(545, '00ff00', 408, ''),
(546, '00ff00', 408, ''),
(547, '00ff00', 408, ''),
(548, '00ff00', 408, ''),
(549, '00ff00', 408, ''),
(550, '00ff00', 408, ''),
(551, '00ff00', 409, ''),
(552, '00ff00', 409, ''),
(553, '00ff00', 409, ''),
(554, '00ff00', 409, ''),
(555, '00ff00', 409, ''),
(556, '00ff00', 409, ''),
(557, '00ff00', 410, ''),
(558, '00ff00', 410, ''),
(559, '00ff00', 410, ''),
(560, '00ff00', 410, ''),
(561, '00ff00', 410, ''),
(562, '00ff00', 410, ''),
(563, '00ff00', 411, ''),
(564, '00ff00', 411, ''),
(565, '00ff00', 411, ''),
(566, '00ff00', 411, ''),
(567, '00ff00', 411, ''),
(568, '00ff00', 411, ''),
(569, '00ff00', 412, ''),
(570, '00ff00', 412, ''),
(571, '00ff00', 412, ''),
(572, '00ff00', 412, ''),
(573, '00ff00', 412, ''),
(574, '00ff00', 412, ''),
(575, '00ff00', 413, ''),
(576, '00ff00', 413, ''),
(577, '00ff00', 413, ''),
(578, '00ff00', 413, ''),
(579, '00ff00', 413, ''),
(580, '00ff00', 413, ''),
(581, '00ff00', 414, ''),
(582, '00ff00', 414, ''),
(583, '00ff00', 414, ''),
(584, '00ff00', 414, ''),
(585, '00ff00', 414, ''),
(586, '00ff00', 414, ''),
(587, '00ff00', 415, ''),
(588, '00ff00', 415, ''),
(589, '00ff00', 415, ''),
(590, '00ff00', 415, ''),
(591, '00ff00', 415, ''),
(592, '00ff00', 415, ''),
(593, '00ff00', 416, ''),
(594, '00ff00', 416, ''),
(595, '00ff00', 416, ''),
(596, '00ff00', 416, ''),
(597, '00ff00', 416, ''),
(598, '00ff00', 416, ''),
(599, '00ff00', 417, ''),
(600, '00ff00', 417, ''),
(601, '00ff00', 417, ''),
(602, '00ff00', 417, ''),
(603, '00ff00', 417, ''),
(604, '00ff00', 417, ''),
(605, '00ff00', 418, ''),
(606, '00ff00', 418, ''),
(607, '00ff00', 418, ''),
(608, '00ff00', 418, ''),
(609, '00ff00', 418, ''),
(610, '00ff00', 418, ''),
(611, '00ff00', 419, ''),
(612, '00ff00', 419, ''),
(613, '00ff00', 419, ''),
(614, '00ff00', 419, ''),
(615, '00ff00', 419, ''),
(616, '00ff00', 419, ''),
(617, '00ff00', 420, ''),
(618, '00ff00', 420, ''),
(619, '00ff00', 420, ''),
(620, '00ff00', 420, ''),
(621, '00ff00', 420, ''),
(622, '00ff00', 420, ''),
(623, '00ff00', 421, ''),
(624, '00ff00', 421, ''),
(625, '00ff00', 421, ''),
(626, '00ff00', 421, ''),
(627, '00ff00', 421, ''),
(628, '00ff00', 421, ''),
(629, '00ff00', 422, ''),
(630, '00ff00', 422, ''),
(631, '00ff00', 422, ''),
(632, '00ff00', 422, ''),
(633, '00ff00', 422, ''),
(634, '00ff00', 422, ''),
(635, '00ff00', 423, ''),
(636, '00ff00', 423, ''),
(637, '00ff00', 423, ''),
(638, '00ff00', 423, ''),
(639, '00ff00', 423, ''),
(640, '00ff00', 423, ''),
(641, '00ff00', 424, ''),
(642, '00ff00', 424, ''),
(643, '00ff00', 424, ''),
(644, '00ff00', 424, ''),
(645, '00ff00', 424, ''),
(646, '00ff00', 424, ''),
(647, '00ff00', 425, ''),
(648, '00ff00', 425, ''),
(649, '00ff00', 425, ''),
(650, '00ff00', 425, ''),
(651, '00ff00', 425, ''),
(652, '00ff00', 425, ''),
(653, '00ff00', 426, ''),
(654, '00ff00', 426, ''),
(655, '00ff00', 426, ''),
(656, '00ff00', 426, ''),
(657, '00ff00', 426, ''),
(658, '00ff00', 426, ''),
(659, '00ff00', 427, ''),
(660, '00ff00', 427, ''),
(661, '00ff00', 427, ''),
(662, '00ff00', 427, ''),
(663, '00ff00', 427, ''),
(664, '00ff00', 427, ''),
(665, '00ff00', 428, ''),
(666, '00ff00', 428, ''),
(667, '00ff00', 428, ''),
(668, '00ff00', 428, ''),
(669, '00ff00', 428, ''),
(670, '00ff00', 428, ''),
(671, '00ff00', 429, ''),
(672, '00ff00', 429, ''),
(673, '00ff00', 429, ''),
(674, '00ff00', 429, ''),
(675, '00ff00', 429, ''),
(676, '00ff00', 429, ''),
(677, '00ff00', 430, ''),
(678, '00ff00', 430, ''),
(679, '00ff00', 430, ''),
(680, '00ff00', 430, ''),
(681, '00ff00', 430, ''),
(682, '00ff00', 430, ''),
(683, '00ff00', 431, ''),
(684, '00ff00', 431, ''),
(685, '00ff00', 431, ''),
(686, '00ff00', 431, ''),
(687, '00ff00', 431, ''),
(688, '00ff00', 431, ''),
(689, '00ff00', 432, ''),
(690, '00ff00', 432, ''),
(691, '00ff00', 432, ''),
(692, '00ff00', 432, ''),
(693, '00ff00', 432, ''),
(694, '00ff00', 432, ''),
(695, '00ff00', 433, ''),
(696, '00ff00', 433, ''),
(697, '00ff00', 433, ''),
(698, '00ff00', 433, ''),
(699, '00ff00', 433, ''),
(700, '00ff00', 433, ''),
(701, '00ff00', 434, ''),
(702, '00ff00', 434, ''),
(703, '00ff00', 434, ''),
(704, '00ff00', 434, ''),
(705, '00ff00', 434, ''),
(706, '00ff00', 434, ''),
(707, '00ff00', 435, ''),
(708, '00ff00', 435, ''),
(709, '00ff00', 435, ''),
(710, '00ff00', 435, ''),
(711, '00ff00', 435, ''),
(712, '00ff00', 435, ''),
(713, '00ff00', 436, ''),
(714, '00ff00', 436, ''),
(715, '00ff00', 436, ''),
(716, '00ff00', 436, ''),
(717, '00ff00', 436, ''),
(718, '00ff00', 436, ''),
(719, '00ff00', 437, ''),
(720, '00ff00', 437, ''),
(721, '00ff00', 437, ''),
(722, '00ff00', 437, ''),
(723, '00ff00', 437, ''),
(724, '00ff00', 437, ''),
(725, '00ff00', 438, ''),
(726, '00ff00', 438, ''),
(727, '00ff00', 438, ''),
(728, '00ff00', 438, ''),
(729, '00ff00', 438, ''),
(730, '00ff00', 438, ''),
(731, '00ff00', 439, ''),
(732, '00ff00', 439, ''),
(733, '00ff00', 439, ''),
(734, '00ff00', 439, ''),
(735, '00ff00', 439, ''),
(736, '00ff00', 439, ''),
(737, '00ff00', 440, ''),
(738, '00ff00', 440, ''),
(739, '00ff00', 440, ''),
(740, '00ff00', 440, ''),
(741, '00ff00', 440, ''),
(742, '00ff00', 440, ''),
(743, '00ff00', 441, ''),
(744, '00ff00', 441, ''),
(745, '00ff00', 441, ''),
(746, '00ff00', 441, ''),
(747, '00ff00', 441, ''),
(748, '00ff00', 441, ''),
(749, '00ff00', 442, ''),
(750, '00ff00', 442, ''),
(751, '00ff00', 442, ''),
(752, '00ff00', 442, ''),
(753, '00ff00', 442, ''),
(754, '00ff00', 442, ''),
(755, '00ff00', 443, ''),
(756, '00ff00', 443, ''),
(757, '00ff00', 443, ''),
(758, '00ff00', 443, ''),
(759, '00ff00', 443, ''),
(760, '00ff00', 443, ''),
(761, '00ff00', 444, ''),
(762, '00ff00', 444, ''),
(763, '00ff00', 444, ''),
(764, '00ff00', 444, ''),
(765, '00ff00', 444, ''),
(766, '00ff00', 444, ''),
(767, '00ff00', 445, ''),
(768, '00ff00', 445, ''),
(769, '00ff00', 445, ''),
(770, '00ff00', 445, ''),
(771, '00ff00', 445, ''),
(772, '00ff00', 445, ''),
(773, '00ff00', 446, ''),
(774, '00ff00', 446, ''),
(775, '00ff00', 446, ''),
(776, '00ff00', 446, ''),
(777, '00ff00', 446, ''),
(778, '00ff00', 446, ''),
(779, '00ff00', 447, ''),
(780, '00ff00', 447, ''),
(781, '00ff00', 447, ''),
(782, '00ff00', 447, ''),
(783, '00ff00', 447, ''),
(784, '00ff00', 447, ''),
(785, '00ff00', 448, ''),
(786, '00ff00', 448, ''),
(787, '00ff00', 448, ''),
(788, '00ff00', 448, ''),
(789, '00ff00', 448, ''),
(790, '00ff00', 448, ''),
(791, '00ff00', 449, ''),
(792, '00ff00', 449, ''),
(793, '00ff00', 449, ''),
(794, '00ff00', 449, ''),
(795, '00ff00', 449, ''),
(796, '00ff00', 449, ''),
(797, '00ff00', 450, ''),
(798, '00ff00', 450, ''),
(799, '00ff00', 450, ''),
(800, '00ff00', 450, ''),
(801, '00ff00', 450, ''),
(802, '00ff00', 450, ''),
(803, '00ff00', 451, ''),
(804, '00ff00', 451, ''),
(805, '00ff00', 451, ''),
(806, '00ff00', 451, ''),
(807, '00ff00', 451, ''),
(808, '00ff00', 451, ''),
(809, '00ff00', 452, ''),
(810, '00ff00', 452, ''),
(811, '00ff00', 452, ''),
(812, '00ff00', 452, ''),
(813, '00ff00', 452, ''),
(814, '00ff00', 452, ''),
(815, '00ff00', 453, ''),
(816, '00ff00', 453, ''),
(817, '00ff00', 453, ''),
(818, '00ff00', 453, ''),
(819, '00ff00', 453, ''),
(820, '00ff00', 453, ''),
(821, '00ff00', 454, ''),
(822, '00ff00', 454, ''),
(823, '00ff00', 454, ''),
(824, '00ff00', 454, ''),
(825, '00ff00', 454, ''),
(826, '00ff00', 454, ''),
(827, '00ff00', 455, ''),
(828, '00ff00', 455, ''),
(829, '00ff00', 455, ''),
(830, '00ff00', 455, ''),
(831, '00ff00', 455, ''),
(832, '00ff00', 455, ''),
(833, '00ff00', 456, ''),
(834, '00ff00', 456, ''),
(835, '00ff00', 456, ''),
(836, '00ff00', 456, ''),
(837, '00ff00', 456, ''),
(838, '00ff00', 456, ''),
(839, '00ff00', 457, ''),
(840, '00ff00', 457, ''),
(841, '00ff00', 457, ''),
(842, '00ff00', 457, ''),
(843, '00ff00', 457, ''),
(844, '00ff00', 457, ''),
(845, '00ff00', 458, ''),
(846, '00ff00', 458, ''),
(847, '00ff00', 458, ''),
(848, '00ff00', 458, ''),
(849, '00ff00', 458, ''),
(850, '00ff00', 458, ''),
(851, '00ff00', 459, ''),
(852, '00ff00', 459, ''),
(853, '00ff00', 459, ''),
(854, '00ff00', 459, ''),
(855, '00ff00', 459, ''),
(856, '00ff00', 459, ''),
(857, '00ff00', 460, ''),
(858, '00ff00', 460, ''),
(859, '00ff00', 460, ''),
(860, '00ff00', 460, ''),
(861, '00ff00', 460, ''),
(862, '00ff00', 460, ''),
(863, '00ff00', 461, ''),
(864, '00ff00', 461, ''),
(865, '00ff00', 461, ''),
(866, '00ff00', 461, ''),
(867, '00ff00', 461, ''),
(868, '00ff00', 461, ''),
(869, '00ff00', 462, ''),
(870, '00ff00', 462, ''),
(871, '00ff00', 462, ''),
(872, '00ff00', 462, ''),
(873, '00ff00', 462, ''),
(874, '00ff00', 462, ''),
(875, '00ff00', 463, ''),
(876, '00ff00', 463, ''),
(877, '00ff00', 463, ''),
(878, '00ff00', 463, ''),
(879, '00ff00', 463, ''),
(880, '00ff00', 463, ''),
(881, '00ff00', 464, ''),
(882, '00ff00', 464, ''),
(883, '00ff00', 464, ''),
(884, '00ff00', 464, ''),
(885, '00ff00', 464, ''),
(886, '00ff00', 464, ''),
(887, '00ff00', 465, ''),
(888, '00ff00', 465, ''),
(889, '00ff00', 465, ''),
(890, '00ff00', 465, ''),
(891, '00ff00', 465, ''),
(892, '00ff00', 465, ''),
(893, '00ff00', 466, ''),
(894, '00ff00', 466, ''),
(895, '00ff00', 466, ''),
(896, '00ff00', 466, ''),
(897, '00ff00', 466, ''),
(898, '00ff00', 466, ''),
(899, '00ff00', 467, ''),
(900, '00ff00', 467, ''),
(901, '00ff00', 467, ''),
(902, '00ff00', 467, ''),
(903, '00ff00', 467, ''),
(904, '00ff00', 467, ''),
(905, '00ff00', 468, ''),
(906, '00ff00', 468, ''),
(907, '00ff00', 468, ''),
(908, '00ff00', 468, ''),
(909, '00ff00', 468, ''),
(910, '00ff00', 468, ''),
(911, '00ff00', 469, ''),
(912, '00ff00', 469, ''),
(913, '00ff00', 469, ''),
(914, '00ff00', 469, ''),
(915, '00ff00', 469, ''),
(916, '00ff00', 469, ''),
(917, '00ff00', 470, ''),
(918, '00ff00', 470, ''),
(919, '00ff00', 470, ''),
(920, '00ff00', 470, ''),
(921, '00ff00', 470, ''),
(922, '00ff00', 470, ''),
(923, '00ff00', 471, ''),
(924, '00ff00', 471, ''),
(925, '00ff00', 471, ''),
(926, '00ff00', 471, ''),
(927, '00ff00', 471, ''),
(928, '00ff00', 471, ''),
(929, '00ff00', 472, ''),
(930, '00ff00', 472, ''),
(931, '00ff00', 472, ''),
(932, '00ff00', 472, ''),
(933, '00ff00', 472, ''),
(934, '00ff00', 472, ''),
(935, '00ff00', 473, ''),
(936, '00ff00', 473, ''),
(937, '00ff00', 473, ''),
(938, '00ff00', 473, ''),
(939, '00ff00', 473, ''),
(940, '00ff00', 473, ''),
(941, '00ff00', 474, ''),
(942, '00ff00', 474, ''),
(943, '00ff00', 474, ''),
(944, '00ff00', 474, ''),
(945, '00ff00', 474, ''),
(946, '00ff00', 474, ''),
(947, '00ff00', 475, ''),
(948, '00ff00', 475, ''),
(949, '00ff00', 475, ''),
(950, '00ff00', 475, ''),
(951, '00ff00', 475, ''),
(952, '00ff00', 475, ''),
(953, '00ff00', 476, ''),
(954, '00ff00', 476, ''),
(955, '00ff00', 476, ''),
(956, '00ff00', 476, ''),
(957, '00ff00', 476, ''),
(958, '00ff00', 476, ''),
(959, '00ff00', 477, ''),
(960, '00ff00', 477, ''),
(961, '00ff00', 477, ''),
(962, '00ff00', 477, ''),
(963, '00ff00', 477, ''),
(964, '00ff00', 477, ''),
(965, '00ff00', 478, ''),
(966, '00ff00', 478, ''),
(967, '00ff00', 478, ''),
(968, '00ff00', 478, ''),
(969, '00ff00', 478, ''),
(970, '00ff00', 478, ''),
(971, '00ff00', 479, ''),
(972, '00ff00', 479, ''),
(973, '00ff00', 479, ''),
(974, '00ff00', 479, ''),
(975, '00ff00', 479, ''),
(976, '00ff00', 479, ''),
(977, '00ff00', 480, ''),
(978, '00ff00', 480, ''),
(979, '00ff00', 480, ''),
(980, '00ff00', 480, ''),
(981, '00ff00', 480, ''),
(982, '00ff00', 480, ''),
(983, '00ff00', 481, ''),
(984, '00ff00', 481, ''),
(985, '00ff00', 481, ''),
(986, '00ff00', 481, ''),
(987, '00ff00', 481, ''),
(988, '00ff00', 481, ''),
(989, '00ff00', 482, ''),
(990, '00ff00', 482, ''),
(991, '00ff00', 482, ''),
(992, '00ff00', 482, ''),
(993, '00ff00', 482, ''),
(994, '00ff00', 482, ''),
(995, '00ff00', 483, ''),
(996, '00ff00', 483, ''),
(997, '00ff00', 483, ''),
(998, '00ff00', 483, ''),
(999, '00ff00', 483, ''),
(1000, '00ff00', 483, ''),
(1001, '00ff00', 484, ''),
(1002, '00ff00', 484, ''),
(1003, '00ff00', 484, ''),
(1004, '00ff00', 484, ''),
(1005, '00ff00', 484, ''),
(1006, '00ff00', 484, ''),
(1007, '00ff00', 485, ''),
(1008, '00ff00', 485, ''),
(1009, '00ff00', 485, ''),
(1010, '00ff00', 485, ''),
(1011, '00ff00', 485, ''),
(1012, '00ff00', 485, ''),
(1013, '00ff00', 486, ''),
(1014, '00ff00', 486, ''),
(1015, '00ff00', 486, ''),
(1016, '00ff00', 486, ''),
(1017, '00ff00', 486, ''),
(1018, '00ff00', 486, ''),
(1019, '00ff00', 487, ''),
(1020, '00ff00', 487, ''),
(1021, '00ff00', 487, ''),
(1022, '00ff00', 487, ''),
(1023, '00ff00', 487, ''),
(1024, '00ff00', 487, ''),
(1025, '00ff00', 488, ''),
(1026, '00ff00', 488, ''),
(1027, '00ff00', 488, ''),
(1028, '00ff00', 488, ''),
(1029, '00ff00', 488, ''),
(1030, '00ff00', 488, ''),
(1031, '00ff00', 489, ''),
(1032, '00ff00', 489, ''),
(1033, '00ff00', 489, ''),
(1034, '00ff00', 489, ''),
(1035, '00ff00', 489, ''),
(1036, '00ff00', 489, ''),
(1037, '00ff00', 490, ''),
(1038, '00ff00', 490, ''),
(1039, '00ff00', 490, ''),
(1040, '00ff00', 490, ''),
(1041, '00ff00', 490, ''),
(1042, '00ff00', 490, ''),
(1043, '00ff00', 491, ''),
(1044, '00ff00', 491, ''),
(1045, '00ff00', 491, ''),
(1046, '00ff00', 491, ''),
(1047, '00ff00', 491, ''),
(1048, '00ff00', 491, ''),
(1049, '00ff00', 492, ''),
(1050, '00ff00', 492, ''),
(1051, '00ff00', 492, ''),
(1052, '00ff00', 492, ''),
(1053, '00ff00', 492, ''),
(1054, '00ff00', 492, ''),
(1055, '00ff00', 493, ''),
(1056, '00ff00', 493, ''),
(1057, '00ff00', 493, ''),
(1058, '00ff00', 493, ''),
(1059, '00ff00', 493, ''),
(1060, '00ff00', 493, ''),
(1061, '00ff00', 494, ''),
(1062, '00ff00', 494, ''),
(1063, '00ff00', 494, ''),
(1064, '00ff00', 494, ''),
(1065, '00ff00', 494, ''),
(1066, '00ff00', 494, ''),
(1067, '00ff00', 495, ''),
(1068, '00ff00', 495, ''),
(1069, '00ff00', 495, ''),
(1070, '00ff00', 495, ''),
(1071, '00ff00', 495, ''),
(1072, '00ff00', 495, ''),
(1073, '00ff00', 496, ''),
(1074, '00ff00', 496, ''),
(1075, '00ff00', 496, ''),
(1076, '00ff00', 496, ''),
(1077, '00ff00', 496, ''),
(1078, '00ff00', 496, ''),
(1079, '00ff00', 497, ''),
(1080, '00ff00', 497, ''),
(1081, '00ff00', 497, ''),
(1082, '00ff00', 497, ''),
(1083, '00ff00', 497, ''),
(1084, '00ff00', 497, ''),
(1085, '00ff00', 498, ''),
(1086, '00ff00', 498, ''),
(1087, '00ff00', 498, ''),
(1088, '00ff00', 498, ''),
(1089, '00ff00', 498, ''),
(1090, '00ff00', 498, ''),
(1091, '00ff00', 499, ''),
(1092, '00ff00', 499, ''),
(1093, '00ff00', 499, ''),
(1094, '00ff00', 499, ''),
(1095, '00ff00', 499, ''),
(1096, '00ff00', 499, ''),
(1097, '00ff00', 500, ''),
(1098, '00ff00', 500, ''),
(1099, '00ff00', 500, ''),
(1100, '00ff00', 500, ''),
(1101, '00ff00', 500, ''),
(1102, '00ff00', 500, ''),
(1103, '00ff00', 501, ''),
(1104, '00ff00', 501, ''),
(1105, '00ff00', 501, ''),
(1106, '00ff00', 501, ''),
(1107, '00ff00', 501, ''),
(1108, '00ff00', 501, ''),
(1109, '00ff00', 502, ''),
(1110, '00ff00', 502, ''),
(1111, '00ff00', 502, ''),
(1112, '00ff00', 502, ''),
(1113, '00ff00', 502, ''),
(1114, '00ff00', 502, ''),
(1115, '00ff00', 503, ''),
(1116, '00ff00', 503, ''),
(1117, '00ff00', 503, ''),
(1118, '00ff00', 503, ''),
(1119, '00ff00', 503, ''),
(1120, '00ff00', 503, ''),
(1121, '00ff00', 504, ''),
(1122, '00ff00', 504, ''),
(1123, '00ff00', 504, ''),
(1124, '00ff00', 504, ''),
(1125, '00ff00', 504, ''),
(1126, '00ff00', 504, ''),
(1127, '00ff00', 505, ''),
(1128, '00ff00', 505, ''),
(1129, '00ff00', 505, ''),
(1130, '00ff00', 505, ''),
(1131, '00ff00', 505, ''),
(1132, '00ff00', 505, ''),
(1133, '00ff00', 506, ''),
(1134, '00ff00', 506, ''),
(1135, '00ff00', 506, ''),
(1136, '00ff00', 506, ''),
(1137, '00ff00', 506, ''),
(1138, '00ff00', 506, ''),
(1139, '00ff00', 507, ''),
(1140, '00ff00', 507, ''),
(1141, '00ff00', 507, ''),
(1142, '00ff00', 507, ''),
(1143, '00ff00', 507, ''),
(1144, '00ff00', 507, ''),
(1145, '00ff00', 508, ''),
(1146, '00ff00', 508, ''),
(1147, '00ff00', 508, ''),
(1148, '00ff00', 508, ''),
(1149, '00ff00', 508, ''),
(1150, '00ff00', 508, ''),
(1151, '00ff00', 509, ''),
(1152, '00ff00', 509, ''),
(1153, '00ff00', 509, ''),
(1154, '00ff00', 509, ''),
(1155, '00ff00', 509, ''),
(1156, '00ff00', 509, ''),
(1157, '00ff00', 510, ''),
(1158, '00ff00', 510, ''),
(1159, '00ff00', 510, ''),
(1160, '00ff00', 510, ''),
(1161, '00ff00', 510, ''),
(1162, '00ff00', 510, ''),
(1163, '00ff00', 511, ''),
(1164, '00ff00', 511, ''),
(1165, '00ff00', 511, ''),
(1166, '00ff00', 511, ''),
(1167, '00ff00', 511, ''),
(1168, '00ff00', 511, ''),
(1169, '00ff00', 512, ''),
(1170, '00ff00', 512, ''),
(1171, '00ff00', 512, ''),
(1172, '00ff00', 512, ''),
(1173, '00ff00', 512, ''),
(1174, '00ff00', 512, ''),
(1175, '00ff00', 513, ''),
(1176, '00ff00', 513, ''),
(1177, '00ff00', 513, ''),
(1178, '00ff00', 513, ''),
(1179, '00ff00', 513, ''),
(1180, '00ff00', 513, ''),
(1181, '00ff00', 514, ''),
(1182, '00ff00', 514, ''),
(1183, '00ff00', 514, ''),
(1184, '00ff00', 514, ''),
(1185, '00ff00', 514, ''),
(1186, '00ff00', 514, ''),
(1187, '00ff00', 515, ''),
(1188, '00ff00', 515, ''),
(1189, '00ff00', 515, ''),
(1190, '00ff00', 515, ''),
(1191, '00ff00', 515, ''),
(1192, '00ff00', 515, ''),
(1193, '00ff00', 516, ''),
(1194, '00ff00', 516, ''),
(1195, '00ff00', 516, ''),
(1196, '00ff00', 516, ''),
(1197, '00ff00', 516, ''),
(1198, '00ff00', 516, ''),
(1199, '00ff00', 517, ''),
(1200, '00ff00', 517, ''),
(1201, '00ff00', 517, ''),
(1202, '00ff00', 517, ''),
(1203, '00ff00', 517, ''),
(1204, '00ff00', 517, ''),
(1205, '00ff00', 518, ''),
(1206, '00ff00', 518, ''),
(1207, '00ff00', 518, ''),
(1208, '00ff00', 518, ''),
(1209, '00ff00', 518, ''),
(1210, '00ff00', 518, ''),
(1211, '00ff00', 519, ''),
(1212, '00ff00', 519, ''),
(1213, '00ff00', 519, ''),
(1214, '00ff00', 519, ''),
(1215, '00ff00', 519, ''),
(1216, '00ff00', 519, ''),
(1217, '00ff00', 520, ''),
(1218, '00ff00', 520, ''),
(1219, '00ff00', 520, ''),
(1220, '00ff00', 520, ''),
(1221, '00ff00', 520, ''),
(1222, '00ff00', 520, ''),
(1223, '00ff00', 521, ''),
(1224, '00ff00', 521, ''),
(1225, '00ff00', 521, ''),
(1226, '00ff00', 521, ''),
(1227, '00ff00', 521, ''),
(1228, '00ff00', 521, ''),
(1229, '00ff00', 522, ''),
(1230, '00ff00', 522, ''),
(1231, '00ff00', 522, ''),
(1232, '00ff00', 522, ''),
(1233, '00ff00', 522, ''),
(1234, '00ff00', 522, ''),
(1235, '00ff00', 523, ''),
(1236, '00ff00', 523, ''),
(1237, '00ff00', 523, ''),
(1238, '00ff00', 523, ''),
(1239, '00ff00', 523, ''),
(1240, '00ff00', 523, ''),
(1241, '00ff00', 524, ''),
(1242, '00ff00', 524, ''),
(1243, '00ff00', 524, ''),
(1244, '00ff00', 524, ''),
(1245, '00ff00', 524, ''),
(1246, '00ff00', 524, ''),
(1247, '00ff00', 525, ''),
(1248, '00ff00', 525, ''),
(1249, '00ff00', 525, ''),
(1250, '00ff00', 525, ''),
(1251, '00ff00', 525, ''),
(1252, '00ff00', 525, ''),
(1253, '00ff00', 526, ''),
(1254, '00ff00', 526, ''),
(1255, '00ff00', 526, ''),
(1256, '00ff00', 526, ''),
(1257, '00ff00', 526, ''),
(1258, '00ff00', 526, ''),
(1259, '00ff00', 527, ''),
(1260, '00ff00', 527, ''),
(1261, '00ff00', 527, ''),
(1262, '00ff00', 527, ''),
(1263, '00ff00', 527, ''),
(1264, '00ff00', 527, ''),
(1265, '00ff00', 528, ''),
(1266, '00ff00', 528, ''),
(1267, '00ff00', 528, ''),
(1268, '00ff00', 528, ''),
(1269, '00ff00', 528, ''),
(1270, '00ff00', 528, ''),
(1271, '00ff00', 529, ''),
(1272, '00ff00', 529, ''),
(1273, '00ff00', 529, ''),
(1274, '00ff00', 529, ''),
(1275, '00ff00', 529, ''),
(1276, '00ff00', 529, ''),
(1277, '00ff00', 530, ''),
(1278, '00ff00', 530, ''),
(1279, '00ff00', 530, ''),
(1280, '00ff00', 530, ''),
(1281, '00ff00', 530, ''),
(1282, '00ff00', 530, ''),
(1283, '00ff00', 531, ''),
(1284, '00ff00', 531, ''),
(1285, '00ff00', 531, ''),
(1286, '00ff00', 531, ''),
(1287, '00ff00', 531, ''),
(1288, '00ff00', 531, ''),
(1289, '00ff00', 532, ''),
(1290, '00ff00', 532, ''),
(1291, '00ff00', 532, ''),
(1292, '00ff00', 532, ''),
(1293, '00ff00', 532, ''),
(1294, '00ff00', 532, ''),
(1295, '00ff00', 533, ''),
(1296, '00ff00', 533, ''),
(1297, '00ff00', 533, ''),
(1298, '00ff00', 533, ''),
(1299, '00ff00', 533, ''),
(1300, '00ff00', 533, ''),
(1301, '00ff00', 534, ''),
(1302, '00ff00', 534, ''),
(1303, '00ff00', 534, ''),
(1304, '00ff00', 534, ''),
(1305, '00ff00', 534, ''),
(1306, '00ff00', 534, ''),
(1307, '00ff00', 535, ''),
(1308, '00ff00', 535, ''),
(1309, '00ff00', 535, ''),
(1310, '00ff00', 535, ''),
(1311, '00ff00', 535, ''),
(1312, '00ff00', 535, ''),
(1313, '00ff00', 536, ''),
(1314, '00ff00', 536, ''),
(1315, '00ff00', 536, ''),
(1316, '00ff00', 536, ''),
(1317, '00ff00', 536, ''),
(1318, '00ff00', 536, ''),
(1319, '00ff00', 537, ''),
(1320, '00ff00', 537, ''),
(1321, '00ff00', 537, ''),
(1322, '00ff00', 537, ''),
(1323, '00ff00', 537, ''),
(1324, '00ff00', 537, ''),
(1325, '00ff00', 538, ''),
(1326, '00ff00', 538, ''),
(1327, '00ff00', 538, ''),
(1328, '00ff00', 538, ''),
(1329, '00ff00', 538, ''),
(1330, '00ff00', 538, ''),
(1331, '00ff00', 539, ''),
(1332, '00ff00', 539, ''),
(1333, '00ff00', 539, ''),
(1334, '00ff00', 539, ''),
(1335, '00ff00', 539, ''),
(1336, '00ff00', 539, ''),
(1337, '00ff00', 540, ''),
(1338, '00ff00', 540, ''),
(1339, '00ff00', 540, ''),
(1340, '00ff00', 540, ''),
(1341, '00ff00', 540, ''),
(1342, '00ff00', 540, ''),
(1343, '00ff00', 541, ''),
(1344, '00ff00', 541, ''),
(1345, '00ff00', 541, ''),
(1346, '00ff00', 541, ''),
(1347, '00ff00', 541, ''),
(1348, '00ff00', 541, ''),
(1349, '00ff00', 542, ''),
(1350, '00ff00', 542, ''),
(1351, '00ff00', 542, ''),
(1352, '00ff00', 542, ''),
(1353, '00ff00', 542, ''),
(1354, '00ff00', 542, ''),
(1355, '00ff00', 543, ''),
(1356, '00ff00', 543, ''),
(1357, '00ff00', 543, ''),
(1358, '00ff00', 543, ''),
(1359, '00ff00', 543, ''),
(1360, '00ff00', 543, ''),
(1361, '00ff00', 544, ''),
(1362, '00ff00', 544, ''),
(1363, '00ff00', 544, ''),
(1364, '00ff00', 544, ''),
(1365, '00ff00', 544, ''),
(1366, '00ff00', 544, ''),
(1367, '00ff00', 545, ''),
(1368, '00ff00', 545, ''),
(1369, '00ff00', 545, ''),
(1370, '00ff00', 545, ''),
(1371, '00ff00', 545, ''),
(1372, '00ff00', 545, ''),
(1373, '00ff00', 546, ''),
(1374, '00ff00', 546, ''),
(1375, '00ff00', 546, ''),
(1376, '00ff00', 546, ''),
(1377, '00ff00', 546, ''),
(1378, '00ff00', 546, ''),
(1379, '00ff00', 547, ''),
(1380, '00ff00', 547, ''),
(1381, '00ff00', 547, ''),
(1382, '00ff00', 547, ''),
(1383, '00ff00', 547, ''),
(1384, '00ff00', 547, ''),
(1385, '00ff00', 548, ''),
(1386, '00ff00', 548, ''),
(1387, '00ff00', 548, ''),
(1388, '00ff00', 548, ''),
(1389, '00ff00', 548, ''),
(1390, '00ff00', 548, ''),
(1391, '00ff00', 549, ''),
(1392, '00ff00', 549, ''),
(1393, '00ff00', 549, ''),
(1394, '00ff00', 549, ''),
(1395, '00ff00', 549, ''),
(1396, '00ff00', 549, ''),
(1397, '00ff00', 550, ''),
(1398, '00ff00', 550, ''),
(1399, '00ff00', 550, ''),
(1400, '00ff00', 550, ''),
(1401, '00ff00', 550, ''),
(1402, '00ff00', 550, ''),
(1403, '00ff00', 551, ''),
(1404, '00ff00', 551, ''),
(1405, '00ff00', 551, ''),
(1406, '00ff00', 551, ''),
(1407, '00ff00', 551, ''),
(1408, '00ff00', 551, ''),
(1409, '00ff00', 552, ''),
(1410, '00ff00', 552, ''),
(1411, '00ff00', 552, ''),
(1412, '00ff00', 552, ''),
(1413, '00ff00', 552, ''),
(1414, '00ff00', 552, ''),
(1415, '00ff00', 553, ''),
(1416, '00ff00', 553, ''),
(1417, '00ff00', 553, ''),
(1418, '00ff00', 553, ''),
(1419, '00ff00', 553, ''),
(1420, '00ff00', 553, ''),
(1421, '00ff00', 554, ''),
(1422, '00ff00', 554, ''),
(1423, '00ff00', 554, ''),
(1424, '00ff00', 554, ''),
(1425, '00ff00', 554, ''),
(1426, '00ff00', 554, ''),
(1427, '00ff00', 555, ''),
(1428, '00ff00', 555, ''),
(1429, '00ff00', 555, ''),
(1430, '00ff00', 555, ''),
(1431, '00ff00', 555, ''),
(1432, '00ff00', 555, ''),
(1433, '00ff00', 556, ''),
(1434, '00ff00', 556, ''),
(1435, '00ff00', 556, ''),
(1436, '00ff00', 556, ''),
(1437, '00ff00', 556, ''),
(1438, '00ff00', 556, ''),
(1439, '00ff00', 557, ''),
(1440, '00ff00', 557, ''),
(1441, '00ff00', 557, ''),
(1442, '00ff00', 557, ''),
(1443, '00ff00', 557, ''),
(1444, '00ff00', 557, ''),
(1445, '00ff00', 558, ''),
(1446, '00ff00', 558, ''),
(1447, '00ff00', 558, ''),
(1448, '00ff00', 558, ''),
(1449, '00ff00', 558, ''),
(1450, '00ff00', 558, ''),
(1451, '00ff00', 559, ''),
(1452, '00ff00', 559, ''),
(1453, '00ff00', 559, ''),
(1454, '00ff00', 559, ''),
(1455, '00ff00', 559, ''),
(1456, '00ff00', 559, ''),
(1457, '00ff00', 560, ''),
(1458, '00ff00', 560, ''),
(1459, '00ff00', 560, ''),
(1460, '00ff00', 560, ''),
(1461, '00ff00', 560, ''),
(1462, '00ff00', 560, ''),
(1463, '00ff00', 561, ''),
(1464, '00ff00', 561, ''),
(1465, '00ff00', 561, ''),
(1466, '00ff00', 561, ''),
(1467, '00ff00', 561, ''),
(1468, '00ff00', 561, ''),
(1469, '00ff00', 562, ''),
(1470, '00ff00', 562, ''),
(1471, '00ff00', 562, ''),
(1472, '00ff00', 562, ''),
(1473, '00ff00', 562, ''),
(1474, '00ff00', 562, ''),
(1475, '00ff00', 563, ''),
(1476, '00ff00', 563, ''),
(1477, '00ff00', 563, ''),
(1478, '00ff00', 563, ''),
(1479, '00ff00', 563, ''),
(1480, '00ff00', 563, ''),
(1481, '00ff00', 564, ''),
(1482, '00ff00', 564, ''),
(1483, '00ff00', 564, ''),
(1484, '00ff00', 564, ''),
(1485, '00ff00', 564, ''),
(1486, '00ff00', 564, ''),
(1487, '00ff00', 565, ''),
(1488, '00ff00', 565, ''),
(1489, '00ff00', 565, ''),
(1490, '00ff00', 565, ''),
(1491, '00ff00', 565, ''),
(1492, '00ff00', 565, ''),
(1493, '00ff00', 566, ''),
(1494, '00ff00', 566, ''),
(1495, '00ff00', 566, ''),
(1496, '00ff00', 566, ''),
(1497, '00ff00', 566, ''),
(1498, '00ff00', 566, ''),
(1499, '00ff00', 567, ''),
(1500, '00ff00', 567, ''),
(1501, '00ff00', 567, ''),
(1502, '00ff00', 567, ''),
(1503, '00ff00', 567, ''),
(1504, '00ff00', 567, ''),
(1505, '00ff00', 568, ''),
(1506, '00ff00', 568, ''),
(1507, '00ff00', 568, ''),
(1508, '00ff00', 568, ''),
(1509, '00ff00', 568, ''),
(1510, '00ff00', 568, ''),
(1511, '00ff00', 569, ''),
(1512, '00ff00', 569, ''),
(1513, '00ff00', 569, ''),
(1514, '00ff00', 569, ''),
(1515, '00ff00', 569, ''),
(1516, '00ff00', 569, ''),
(1517, '00ff00', 570, ''),
(1518, '00ff00', 570, ''),
(1519, '00ff00', 570, ''),
(1520, '00ff00', 570, ''),
(1521, '00ff00', 570, ''),
(1522, '00ff00', 570, ''),
(1523, '0', 1, '0'),
(1524, '0', 1, '0'),
(1525, '0', 1, '0'),
(1526, '0', 1, '0'),
(1527, '0', 1, '0'),
(1528, '0', 1, '0'),
(1529, '0', 2, '0'),
(1530, '0', 2, '0'),
(1531, '0', 2, '0'),
(1532, '0', 2, '0'),
(1533, '0', 2, '0'),
(1534, '0', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblproductcomment`
--

DROP TABLE IF EXISTS `vnvic_tblproductcomment`;
CREATE TABLE IF NOT EXISTS `vnvic_tblproductcomment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_read` tinyint(4) NOT NULL DEFAULT '0',
  `cus_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cus_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comment_content` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` int(11) NOT NULL,
  `comment_visible` tinyint(4) NOT NULL DEFAULT '0',
  `ip_address` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `vnvic_tblproductcomment`
--

INSERT INTO `vnvic_tblproductcomment` (`comment_id`, `comment_title`, `product_id`, `comment_read`, `cus_name`, `cus_email`, `comment_content`, `comment_date`, `comment_visible`, `ip_address`) VALUES
(7, 'Test', 166, 1, 'Lê Hùng', 'soledad2410@gmail.com', 'Lê Hùng', 0, 0, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblproductproperties`
--

DROP TABLE IF EXISTS `vnvic_tblproductproperties`;
CREATE TABLE IF NOT EXISTS `vnvic_tblproductproperties` (
  `property_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `property_value` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`property_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vnvic_tblproductproperties`
--

INSERT INTO `vnvic_tblproductproperties` (`property_id`, `product_id`, `property_value`) VALUES
(64, 185, ''),
(64, 184, ''),
(70, 359, ''),
(70, 360, ''),
(70, 361, ''),
(70, 362, ''),
(70, 363, ''),
(70, 364, ''),
(70, 365, ''),
(70, 366, ''),
(70, 367, ''),
(70, 368, ''),
(70, 369, ''),
(70, 370, ''),
(70, 371, ''),
(70, 372, ''),
(70, 373, ''),
(70, 374, ''),
(65, 390, ''),
(70, 375, ''),
(70, 376, ''),
(65, 389, ''),
(70, 377, ''),
(65, 388, ''),
(70, 378, ''),
(64, 387, ''),
(70, 379, ''),
(65, 391, ''),
(65, 392, ''),
(65, 393, ''),
(64, 394, ''),
(65, 404, ''),
(65, 405, ''),
(65, 406, ''),
(64, 407, ''),
(65, 408, ''),
(64, 409, ''),
(65, 410, ''),
(65, 411, ''),
(65, 412, ''),
(65, 413, ''),
(65, 414, ''),
(65, 415, ''),
(65, 416, ''),
(65, 417, ''),
(65, 418, ''),
(65, 419, ''),
(65, 420, ''),
(65, 421, ''),
(74, 422, ''),
(74, 423, ''),
(74, 424, ''),
(74, 425, ''),
(74, 426, ''),
(74, 427, ''),
(74, 428, ''),
(74, 429, ''),
(74, 430, ''),
(74, 431, ''),
(74, 432, ''),
(74, 433, ''),
(74, 434, ''),
(74, 435, ''),
(74, 436, ''),
(74, 437, ''),
(74, 438, ''),
(74, 439, ''),
(74, 440, ''),
(74, 441, ''),
(74, 442, ''),
(74, 443, ''),
(74, 444, ''),
(77, 447, ''),
(65, 455, ''),
(74, 456, ''),
(77, 457, ''),
(65, 458, ''),
(65, 459, ''),
(65, 461, ''),
(65, 462, ''),
(74, 463, ''),
(74, 464, ''),
(74, 465, ''),
(74, 466, ''),
(74, 467, ''),
(74, 469, ''),
(74, 470, ''),
(74, 471, ''),
(74, 472, ''),
(74, 473, ''),
(74, 474, ''),
(74, 475, ''),
(74, 477, ''),
(64, 568, ''),
(64, 567, ''),
(74, 487, ''),
(74, 488, ''),
(74, 489, ''),
(74, 490, ''),
(74, 491, ''),
(74, 492, ''),
(74, 493, ''),
(74, 494, ''),
(74, 495, ''),
(74, 496, ''),
(74, 497, ''),
(74, 498, ''),
(74, 499, ''),
(65, 500, ''),
(74, 501, ''),
(74, 502, ''),
(74, 503, ''),
(74, 504, ''),
(74, 505, ''),
(74, 506, ''),
(74, 507, ''),
(74, 508, ''),
(76, 509, ''),
(64, 566, ''),
(64, 564, ''),
(65, 563, ''),
(64, 565, ''),
(65, 515, ''),
(74, 518, ''),
(64, 468, ''),
(65, 522, ''),
(74, 529, ''),
(74, 530, ''),
(64, 531, ''),
(74, 532, ''),
(74, 533, ''),
(74, 534, ''),
(74, 535, ''),
(65, 536, ''),
(64, 537, ''),
(64, 538, ''),
(64, 539, ''),
(64, 541, ''),
(64, 542, ''),
(64, 543, ''),
(64, 544, ''),
(64, 545, ''),
(64, 546, ''),
(64, 547, ''),
(64, 548, ''),
(70, 549, ''),
(64, 550, ''),
(64, 551, ''),
(64, 552, ''),
(64, 553, ''),
(64, 554, ''),
(64, 555, ''),
(64, 556, ''),
(64, 557, ''),
(64, 558, ''),
(64, 559, ''),
(64, 560, ''),
(64, 561, ''),
(64, 562, ''),
(64, 569, ''),
(64, 570, '');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblproducttype`
--

DROP TABLE IF EXISTS `vnvic_tblproducttype`;
CREATE TABLE IF NOT EXISTS `vnvic_tblproducttype` (
  `producttype_id` int(11) NOT NULL AUTO_INCREMENT,
  `producttype_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `producttype_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`producttype_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `vnvic_tblproducttype`
--

INSERT INTO `vnvic_tblproducttype` (`producttype_id`, `producttype_name`, `producttype_description`) VALUES
(1, 'Mặc định', 'Sản phẩm mặc định'),
(13, 'chung cư', ''),
(16, 'Trung tâm thương mại', ''),
(17, 'Tổ hợp văn phòng', '');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblproductypeproperties`
--

DROP TABLE IF EXISTS `vnvic_tblproductypeproperties`;
CREATE TABLE IF NOT EXISTS `vnvic_tblproductypeproperties` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `property_parent_id` int(50) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `property_unit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `property_level` int(11) NOT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- Dumping data for table `vnvic_tblproductypeproperties`
--

INSERT INTO `vnvic_tblproductypeproperties` (`property_id`, `property_name`, `property_parent_id`, `producttype_id`, `property_unit`, `property_level`) VALUES
(70, 'Axit', 58, 4, '', 2),
(29, 'Loại', 0, 3, '', 1),
(58, 'Loại chất', 0, 4, '', 1),
(75, 'Bazo', 58, 4, '', 2),
(64, 'Nước sạch', 29, 3, '', 2),
(65, 'Dây chuyền', 29, 3, '', 2),
(76, 'Muối', 58, 4, '', 2),
(77, 'Hóa chất tổng hợp', 58, 4, '', 2),
(74, 'Vật liệu', 29, 3, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblpromotions`
--

DROP TABLE IF EXISTS `vnvic_tblpromotions`;
CREATE TABLE IF NOT EXISTS `vnvic_tblpromotions` (
  `promot_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `promot_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `promot_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `promot_header` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `promot_content` text COLLATE utf8_unicode_ci NOT NULL,
  `promot_time` int(11) NOT NULL,
  PRIMARY KEY (`promot_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vnvic_tblpromotions`
--

INSERT INTO `vnvic_tblpromotions` (`promot_id`, `product_id`, `promot_title`, `promot_image`, `promot_header`, `promot_content`, `promot_time`) VALUES
(2, 175, 'Khuyến mãi 01/05', 'upload/images/product/adv_78.gif', 'Trận derby thành Manchester thu hút hàng trăm triệu CĐV trên toàn thế giới theo dõi, sức hút của nó là không thể phủ nhận nhưng những diễn biến của trận đấu đã phần nào khiến người xem phải thất vọng ', '<p>\r\n	Trận derby th&agrave;nh Manchester thu h&uacute;t h&agrave;ng trăm triệu CĐV tr&ecirc;n to&agrave;n thế giới theo d&otilde;i, sức h&uacute;t của n&oacute; l&agrave; kh&ocirc;ng thể phủ nhận nhưng những diễn biến của trận đấu đ&atilde; phần n&agrave;o khiến người xem phải thất vọng khi n&oacute; kh&ocirc;ng diễn ra hấp dẫn, kịch t&iacute;nh v&agrave; quyết liệt như người ta tưởng, với thế trận qu&aacute; &aacute;p đảo của đội chủ nh&agrave; Man City. Sự toan t&iacute;nh, cầu to&agrave;n của Quỷ đỏ MU (chỉ cần h&ograve;a l&agrave; rộng cửa v&ocirc; địch) cũng g&oacute;p phần khiến cho trận derby kh&ocirc;ng đ&aacute;p ứng được sự kỳ vọng của NHM.</p>\r\n<p>\r\n	X&eacute;t về tầm v&oacute;c, độ ho&agrave;nh tr&aacute;ng, v&agrave; t&ecirc;n tuổi, trận <strong>Newcastle gặp Man City</strong> kh&oacute; c&oacute; thể so đọ với trận derby Manchester. Nhưng x&eacute;t tr&ecirc;n g&oacute;c độ kh&aacute;t khao thi đấu, động lực quyết t&acirc;m, phong độ của hai đội b&oacute;ng cũng như sự quan t&acirc;m của dư luận th&igrave; cuộc đụng độ tại St Jame&rsquo;s Park cuối tuần n&agrave;y kh&ocirc;ng hề k&eacute;m cạnh, thậm ch&iacute; c&ograve;n được đ&aacute;nh gi&aacute; l&agrave; nhỉnh hơn. N&oacute;i l&agrave; nhỉnh hơn bởi lẽ, cuộc chiến giữa Newcastle v&agrave; Man City ảnh hưởng trực tiếp đến cục diện của hai cuộc đua: tới ng&ocirc;i v&ocirc; địch v&agrave; lọt v&agrave;o top 4 (c&ograve;n trận derby th&igrave; chỉ c&oacute; 1). Hơn thế nữa, với cả &ldquo;Ch&iacute;ch ch&ograve;e&rdquo; v&agrave; Man xanh, họ chỉ c&oacute; một con đường buộc phải thắng ở trận đấu n&agrave;y, kh&ocirc;ng được ph&eacute;p thua v&agrave; nếu h&ograve;a cũng sẽ l&agrave; một thảm họa. Newcastle cần 3 điểm để tiếp tục đấu tranh với Tottenham v&agrave; Arsenal. Nếu mất điểm họ sẽ bị tụt lại ph&iacute;a sau bởi v&ograve;ng n&agrave;y hai đại diện th&agrave;nh London chỉ phải gặp những đối thủ yếu hơn.</p>\r\n<p style="text-align: center;">\r\n	<img alt="Newcastle - Man City: Hơn cả derby thành Man?, Bóng đá, newcastle vs man city, newcastle gap man city, newcastle, man city, san st james park, demba ba, papiss cisse, bong da anh, ngoai hang anh, bong da, lich thi dau bong da, ket qua bong da, bao bong da, bong da 24h" class="news-image" src="http://img-hn.24hstatic.com:8008/upload/2-2012/images/2012-05-04/1336105712-mancity-2.jpg" /></p>\r\n<p style="text-align: center; font-style: italic; color: rgb(0, 0, 255);">\r\n	Man City sẽ gặp thử th&aacute;ch thực sự trước Newcastle</p>\r\n<p>\r\n	Với Man City cũng vậy, nếu sảy ch&acirc;n, MU nhiều khả năng sẽ vượt qua họ bởi Quỷ đỏ chỉ phải đ&oacute;n tiếp Swansea tr&ecirc;n s&acirc;n nh&agrave;, v&agrave; những c&ocirc;ng lao từ trận derby sẽ đổ s&ocirc;ng đổ bể. Hai đội đều buộc phải gi&agrave;nh chiến thắng thế n&ecirc;n NHM c&oacute; thể tr&ocirc;ng chờ v&agrave;o một thế trận cởi mở, đ&ocirc;i c&ocirc;ng hấp dẫn, kh&aacute;c hẳn với trận derby th&agrave;nh Man khi chỉ c&oacute; một đội tấn c&ocirc;ng v&agrave; một đội chủ trương ph&ograve;ng ngự để kiếm 1 điểm. Đ&acirc;y l&agrave; một trận đấu được c&aacute;c chuy&ecirc;n gia nhận định l&agrave; mang t&iacute;nh chất &ldquo;một mất một c&ograve;n&rdquo;, đội thắng sẽ c&oacute; tất cả, mở ra thi&ecirc;n đường, c&ograve;n đội thua sẽ phải trả gi&aacute; bằng cả một m&ugrave;a giải. Kh&ocirc;ng phải ngẫu nhi&ecirc;n m&agrave; HLV Mancini của City đ&atilde; thẳng thắn thừa nhận trận đấu với Newcastle c&oacute; &yacute; nghĩa quan trọng v&agrave; kh&oacute; khăn hơn so với đối đầu với MU.</p>\r\n<p>\r\n	Newcastle đang nằm trong số những đội b&oacute;ng c&oacute; phong độ tốt nhất giải ngoại hạng với 7 chiến thắng sau 8 trận gần đ&acirc;y nhất. Tr&ecirc;n s&acirc;n nh&agrave; m&ugrave;a n&agrave;y, Newcastle tỏ ra l&agrave; đội b&oacute;ng rất kh&oacute; bị đ&aacute;nh bại. MU v&agrave; Liverpool đ&atilde; gục ng&atilde; tại đ&acirc;y. Arsenal v&agrave; Tottenham cũng chỉ kiếm được trận h&ograve;a. &ldquo;Ch&iacute;ch ch&ograve;e&rdquo; đ&atilde; bất bại tại đ&acirc;y kể từ sau thất bại trước West Brom hồi th&aacute;ng 12 năm ngo&aacute;i. H&agrave;ng thủ của đội chủ s&acirc;n St Jame&rsquo;s Park thi đấu cực kỳ ấn tượng tại đ&acirc;y với tỷ lệ thủng lưới chỉ đạt 0,83 b&agrave;n/trận v&agrave; họ đ&atilde; giữ sạch lưới hơn nửa số trận được thi đấu tr&ecirc;n s&acirc;n nh&agrave;. Đ&oacute; sẽ l&agrave; một thử th&aacute;ch thực sự cho h&agrave;ng tấn c&ocirc;ng cực mạnh của Man City.</p>\r\n<p style="text-align: center;">\r\n	<img alt="Newcastle - Man City: Hơn cả derby thành Man?, Bóng đá, newcastle vs man city, newcastle gap man city, newcastle, man city, san st james park, demba ba, papiss cisse, bong da anh, ngoai hang anh, bong da, lich thi dau bong da, ket qua bong da, bao bong da, bong da 24h" class="news-image" src="http://img-hn.24hstatic.com:8008/upload/2-2012/images/2012-05-04/1336105712-new-1.jpg" /></p>\r\n<p style="text-align: center; font-style: italic; color: rgb(0, 0, 255);">\r\n	Newcastle đang bay cao tr&ecirc;n đ&ocirc;i ch&acirc;n Papiss Cisse</p>\r\n<p>\r\n	Nếu như Man xanh c&oacute; bộ ba thần th&aacute;nh Aguero, Silva, Tevez g&acirc;y sợ h&atilde;i cho mọi h&agrave;ng ph&ograve;ng ngự th&igrave; b&ecirc;n ph&iacute;a Newcastle cũng c&oacute; một bộ ba kh&aacute;c đủ sức l&agrave;m đối trọng đ&oacute; l&agrave; Demba Ba &ndash; Cisse v&agrave; Ben Arfa. Bộ đ&ocirc;i tiền đạo da m&agrave;u Ba v&agrave; Cisse đang l&agrave; cặp song s&aacute;t đ&aacute;ng sợ tại giải ngoại hạng. Bộ đ&ocirc;i n&agrave;y đ&atilde; ghi tổng cộng 29 b&agrave;n chỉ sau nửa m&ugrave;a giải được thi đấu c&ugrave;ng nhau. Trong đ&oacute; ấn tượng nhất ch&iacute;nh l&agrave; ch&acirc;n s&uacute;t người Senegal Papiss Cisse với 13 b&agrave;n/12 trận, 11 trong số đ&oacute; được anh ghi sau 8 trận gần đ&acirc;y nhất. Hai tuyệt phẩm Cisse ghi được v&agrave;o lưới Chelsea ch&iacute;nh l&agrave; lời tuy&ecirc;n chiến đanh th&eacute;p nhất m&agrave; c&aacute; nh&acirc;n tiền đạo n&agrave;y cũng như của Newcastle đưa ra cho Man City trước trận đấu mang t&iacute;nh sống c&ograve;n sắp tới.</p>\r\n<p>\r\n	N&oacute;i như vậy để thấy, Newcastle ho&agrave;n to&agrave;n c&oacute; thể trở th&agrave;nh một đối thủ xứng tầm để l&agrave;m đối trọng với Man City. Kẻ t&aacute;m lạng người nửa c&acirc;n, một cuộc đọ sức rất đ&aacute;ng để chờ đợi. H&atilde;y qu&ecirc;n Etihad, qu&ecirc;n derby th&agrave;nh Manchester đi, bởi s&acirc;n St Jame&rsquo;s Park cuối tuần n&agrave;y mới l&agrave; &ldquo;c&aacute;i rốn của vũ trụ&rdquo;, nơi nu&ocirc;i dưỡng giấc mơ vượt vũ m&ocirc;n vĩ đại của cả <u>Newcastle, lẫn Man City</u>, v&agrave; nu&ocirc;i dưỡng cả niềm hy vọng về một điều thần kỳ của kẻ thứ 3 ngo&agrave;i cuộc: MU.</p>\r\n', 1336125953),
(3, 173, 'Khuyến mãi 08/03', 'upload/images/product/dong-phuc-mau-01.jpg', 'Trận derby thành Manchester thu hút hàng trăm triệu CĐV trên toàn thế giới theo dõi, sức hút của nó là không thể phủ nhận nhưng những diễn biến của trận đấu đã phần nào khiến người xem phải thất vọng ', '<p>\r\n	Trận derby th&agrave;nh Manchester thu h&uacute;t h&agrave;ng trăm triệu CĐV tr&ecirc;n to&agrave;n thế giới theo d&otilde;i, sức h&uacute;t của n&oacute; l&agrave; kh&ocirc;ng thể phủ nhận nhưng những diễn biến của trận đấu đ&atilde; phần n&agrave;o khiến người xem phải thất vọng khi n&oacute; kh&ocirc;ng diễn ra hấp dẫn, kịch t&iacute;nh v&agrave; quyết liệt như người ta tưởng, với thế trận qu&aacute; &aacute;p đảo của đội chủ nh&agrave; Man City. Sự toan t&iacute;nh, cầu to&agrave;n của Quỷ đỏ MU (chỉ cần h&ograve;a l&agrave; rộng cửa v&ocirc; địch) cũng g&oacute;p phần khiến cho trận derby kh&ocirc;ng đ&aacute;p ứng được sự kỳ vọng của NHM.Trận derby th&agrave;nh Manchester thu h&uacute;t h&agrave;ng trăm triệu CĐV tr&ecirc;n to&agrave;n thế giới theo d&otilde;i, sức h&uacute;t của n&oacute; l&agrave; kh&ocirc;ng thể phủ nhận nhưng những diễn biến của trận đấu đ&atilde; phần n&agrave;o khiến người xem phải thất vọng khi n&oacute; kh&ocirc;ng diễn ra hấp dẫn, kịch t&iacute;nh v&agrave; quyết liệt như người ta tưởng, với thế trận qu&aacute; &aacute;p đảo của đội chủ nh&agrave; Man City. Sự toan t&iacute;nh, cầu to&agrave;n của Quỷ đỏ MU (chỉ cần h&ograve;a l&agrave; rộng cửa v&ocirc; địch) cũng g&oacute;p phần khiến cho trận derby kh&ocirc;ng đ&aacute;p ứng được sự kỳ vọng của NHM.</p>\r\n', 1336125981);

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblregion`
--

DROP TABLE IF EXISTS `vnvic_tblregion`;
CREATE TABLE IF NOT EXISTS `vnvic_tblregion` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `region_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `region_level` tinyint(4) NOT NULL COMMENT 'Level 0:country,level 1:region,level 2:city,',
  `region_description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `region_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `region_lat` float NOT NULL,
  `region_lng` float NOT NULL,
  `region_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `vnvic_tblregion`
--

INSERT INTO `vnvic_tblregion` (`region_id`, `parent_id`, `region_name`, `region_level`, `region_description`, `region_address`, `region_lat`, `region_lng`, `region_type`) VALUES
(17, 9, 'Hà Nội', 0, 'Thành Phố Hà Nội', '', 0, 0, 'city'),
(18, 9, 'Hà Nam', 0, 'Thành Phố Hà Nam', '', 0, 0, 'city'),
(19, 9, 'Thanh Hóa', 0, 'Tỉnh Thanh Hóa', '', 0, 0, 'city'),
(9, 0, 'Toàn quốc', 0, '', '', 0, 0, ''),
(20, 17, 'Quận Bắc Từ Liêm', 0, '', '', 0, 0, 'district'),
(21, 17, 'Quận Nam Từ Liêm', 0, '', '', 0, 0, 'district'),
(22, 17, 'Quận Hai Bà Trưng', 0, '', '', 0, 0, 'country'),
(23, 17, 'Quận Hoàng Mai', 0, '', '', 0, 0, 'country'),
(24, 17, 'Quận Cầu Giấy', 0, '', '', 0, 0, 'district');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblshopvip`
--

DROP TABLE IF EXISTS `vnvic_tblshopvip`;
CREATE TABLE IF NOT EXISTS `vnvic_tblshopvip` (
  `vip_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `vip_type` int(11) NOT NULL,
  `vip_expire` int(11) NOT NULL,
  PRIMARY KEY (`vip_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tblsupport`
--

DROP TABLE IF EXISTS `vnvic_tblsupport`;
CREATE TABLE IF NOT EXISTS `vnvic_tblsupport` (
  `support_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `support_id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_id` int(11) NOT NULL,
  `support_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `support_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `support_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `support_visible` tinyint(4) NOT NULL DEFAULT '1',
  `support_phone` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `support_queu` int(11) NOT NULL,
  `extend_phone` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`support_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vnvic_tblsupport`
--

INSERT INTO `vnvic_tblsupport` (`support_email`, `support_id`, `plugin_id`, `support_name`, `support_type`, `support_title`, `support_visible`, `support_phone`, `support_queu`, `extend_phone`, `yahoo`, `skype`) VALUES
('', 4, 25, '', '', 'Hỗ trợ kỹ thuật', 1, '098.450.4580', 4, '', '', 'hungls2410'),
('', 5, 25, '', '', 'Hỗ trợ quản trị', 1, '098.450.4580', 5, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tbltemplate`
--

DROP TABLE IF EXISTS `vnvic_tbltemplate`;
CREATE TABLE IF NOT EXISTS `vnvic_tbltemplate` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `template_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `template_default` tinyint(4) NOT NULL DEFAULT '0',
  `layout_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`template_id`),
  UNIQUE KEY `template_name` (`template_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `vnvic_tbltemplate`
--

INSERT INTO `vnvic_tbltemplate` (`template_id`, `template_name`, `template_title`, `template_default`, `layout_name`) VALUES
(27, 'aai', 'Giao diện website AAI', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `vnvic_tbluser`
--

DROP TABLE IF EXISTS `vnvic_tbluser`;
CREATE TABLE IF NOT EXISTS `vnvic_tbluser` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_pwd` text COLLATE utf8_unicode_ci NOT NULL,
  `user_fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_block` tinyint(1) NOT NULL DEFAULT '0',
  `user_online` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL,
  `user_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` int(11) NOT NULL,
  `active_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_gender` tinyint(4) NOT NULL DEFAULT '1',
  `user_homephone` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_company` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_cellphone` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_birthdate` int(11) NOT NULL,
  `user_intro` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `user_avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vnvic_tbluser`
--

INSERT INTO `vnvic_tbluser` (`user_id`, `user_name`, `user_pwd`, `user_fullname`, `user_address`, `user_email`, `group_id`, `user_description`, `user_block`, `user_online`, `last_login`, `user_ip`, `date_created`, `active_code`, `user_gender`, `user_homephone`, `user_company`, `user_cellphone`, `user_birthdate`, `user_intro`, `user_avatar`) VALUES
(1, 'administrator', 'c9f946e44efa46a036f8bcd6a4cfc57a', 'Đức Việt', 'Thanh Hóa', 'vietddbk@gmail.com', 1, '', 0, 0, 1429250643, '127.0.0.1', 1308100003, '', 1, '', '', '', -25200, '0', ''),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '198 Trần Cung - Cổ Nhuế - Hà Nội', 'soledad2410@gmail.com', 2, '', 0, 0, 1428372265, '14.160.90.38', 0, '319744e5d0bd29ec9e5d9dd695917a77', 1, '0984504580', 'Vietclever', '0984504580', 593568000, '198 Trần Cung - Cổ Nhuế - Hà Nội', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
