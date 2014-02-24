/*
SQLyog Community v10.3 
MySQL - 5.1.50-community : Database - jd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jd`;

/*Table structure for table `citiessearch` */

DROP TABLE IF EXISTS `citiessearch`;

CREATE TABLE `citiessearch` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `city_state` varchar(100) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `citiessearch` */

insert  into `citiessearch`(`city_id`,`city_name`,`city_state`) values (1,'Chennai','Tamil Nadu'),(2,'Mumbai','Maharashtra'),(3,'Kolkatta','West Bengal'),(4,'New Delhi','Uttar Pradesh'),(5,'Bangalore','Karnataka'),(6,'Hyderabad','Andhra Pradesh');

/*Table structure for table `course_contact` */

DROP TABLE IF EXISTS `course_contact`;

CREATE TABLE `course_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `mobile_num` varchar(10) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `expect_info` text,
  `contact_status` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `course_contact` */

/*Table structure for table `email_send` */

DROP TABLE IF EXISTS `email_send`;

CREATE TABLE `email_send` (
  `send_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `usermobile` varchar(10) DEFAULT NULL,
  `useremail` varchar(150) DEFAULT NULL,
  `usermsg` text,
  `insertedDate` datetime DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`send_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `email_send` */

/*Table structure for table `post_info` */

DROP TABLE IF EXISTS `post_info`;

CREATE TABLE `post_info` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `countryname` varchar(50) DEFAULT NULL,
  `companyname` varchar(200) DEFAULT NULL,
  `stradd` text,
  `location_area` varchar(100) DEFAULT NULL,
  `citytown` varchar(50) DEFAULT NULL,
  `postalcode` varchar(10) DEFAULT NULL,
  `mainphone` varchar(15) DEFAULT NULL,
  `mobilephone` varchar(10) DEFAULT NULL,
  `emailadd` varchar(25) DEFAULT NULL,
  `websitename` text,
  `descrip` text,
  `categ` varchar(100) DEFAULT NULL,
  `servicearea` varchar(10) DEFAULT NULL,
  `hoomonon` varchar(10) DEFAULT NULL,
  `hoomonout` varchar(10) DEFAULT NULL,
  `hoomonoff` varchar(6) DEFAULT NULL,
  `hootueon` varchar(10) DEFAULT NULL,
  `hootueout` varchar(10) DEFAULT NULL,
  `hootueoff` varchar(6) DEFAULT NULL,
  `hoowedon` varchar(10) DEFAULT NULL,
  `hoowedout` varchar(10) DEFAULT NULL,
  `hoowedoff` varchar(6) DEFAULT NULL,
  `hoothuon` varchar(10) DEFAULT NULL,
  `hoothuout` varchar(10) DEFAULT NULL,
  `hoothuoff` varchar(6) DEFAULT NULL,
  `hoofrion` varchar(10) DEFAULT NULL,
  `hoofriout` varchar(10) DEFAULT NULL,
  `hoofrioff` varchar(6) DEFAULT NULL,
  `hoosaton` varchar(10) DEFAULT NULL,
  `hoosatout` varchar(10) DEFAULT NULL,
  `hoosatoff` varchar(6) DEFAULT NULL,
  `hoosunon` varchar(10) DEFAULT NULL,
  `hoosunout` varchar(10) DEFAULT NULL,
  `hoosunoff` varchar(6) DEFAULT NULL,
  `paymentoptions` text,
  `photopath1` text,
  `photopath2` text,
  `photopath3` text,
  `videopath1` text,
  `tags` text,
  `poststatus` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `rate_poor` bigint(20) DEFAULT NULL,
  `rate_good` bigint(20) DEFAULT NULL,
  `rate_average` bigint(20) DEFAULT NULL,
  `rate_verygood` bigint(20) DEFAULT NULL,
  `rate_excellent` bigint(20) DEFAULT NULL,
  `rate_poor_place` bigint(20) DEFAULT NULL,
  `rate_good_place` bigint(20) DEFAULT NULL,
  `rate_average_place` bigint(20) DEFAULT NULL,
  `rate_verygood_place` bigint(20) DEFAULT NULL,
  `rate_excellent_place` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `post_info` */

/*Table structure for table `time_dur` */

DROP TABLE IF EXISTS `time_dur`;

CREATE TABLE `time_dur` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_clock` varchar(20) DEFAULT NULL,
  `time_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `time_dur` */

insert  into `time_dur`(`time_id`,`time_clock`,`time_status`) values (1,'12.00 AM',1),(2,'12.30 AM',1),(3,'1.00 AM',1),(4,'1.30 AM',1),(5,'2.00 AM',1),(6,'2.30 AM',1),(7,'3.00 AM',1),(8,'3.30 AM',1),(9,'4.00 AM',1),(10,'4.30 AM',1),(11,'5.00 AM',1),(12,'5.30 AM',1),(13,'6.00 AM',1),(14,'6.30 AM',1),(15,'7.00 AM',1),(16,'7.30 AM',1),(17,'8.00 AM',1),(18,'8.30 AM',1),(19,'9.00 AM',1),(20,'9.30 AM',1),(21,'10.30 AM',1),(22,'11.00 AM',1),(23,'11.30 AM',1),(24,'12.00 PM',1),(25,'12.30 PM',1),(26,'1.00 PM',1),(27,'1.30 PM',1),(28,'2.00 PM',1),(29,'2.30 PM',1),(30,'3.00 PM',1),(31,'3.30 PM',1),(32,'4.00 PM',1),(33,'4.30 PM',1),(34,'5.00 PM',1),(35,'5.30 PM',1),(36,'6.00 PM',1),(37,'6.30 PM',1),(38,'7.00 PM',1),(39,'7.30 PM',1),(40,'8.00 PM',1),(41,'8.30 PM',1),(42,'9.00 PM',1),(43,'9.30 PM',1),(44,'10.00 PM',1),(45,'10.30 PM',1),(46,'11.00 PM',1),(47,'11.30 PM',1);

/*Table structure for table `user_rating` */

DROP TABLE IF EXISTS `user_rating`;

CREATE TABLE `user_rating` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `rater_post_id` int(11) DEFAULT NULL,
  `rater_name` varchar(100) DEFAULT NULL,
  `rater_mobile` varchar(10) DEFAULT NULL,
  `rater_email` varchar(50) DEFAULT NULL,
  `rater_review` text,
  `rater_point` int(11) DEFAULT NULL,
  `rater_point_place` int(11) DEFAULT NULL,
  `rater_status` int(11) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `user_rating` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
