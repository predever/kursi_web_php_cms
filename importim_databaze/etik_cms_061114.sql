/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.39 : Database - etik_cms
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

USE `etik_cms`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `id_parent` tinyint(4) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_name`,`id_parent`,`active`) values (1,'E Pergjitshme',0,1),(10,'Programim',0,1),(11,'IT',0,1),(12,'Security',0,1),(13,'Network',0,1),(14,'Sisteme Operimi',0,1),(15,'Hardware',0,1),(16,'Data Base',0,1),(20,'WEB',10,1),(21,'Desktop',10,1),(22,'Mobile',10,1),(31,'Help Desk',11,1),(32,'Instalime',11,1),(33,'Riparim',11,1),(40,'HTML/CSS',20,1),(41,'JavaScript',20,1),(42,'PHP',20,1),(43,'ASP.NET',20,1),(44,'JSP',20,1);

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `content` text,
  `logo_url` varchar(500) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL COMMENT 'author',
  `id_poststatus` tinyint(4) DEFAULT NULL,
  `id_posttype` tinyint(4) DEFAULT NULL,
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `post` */

insert  into `post`(`post_id`,`title`,`content`,`logo_url`,`id_user`,`id_poststatus`,`id_posttype`,`date_created`,`date_modified`,`modified_by_user_id`) values (1,'Lorem Ipsum','um has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsu','sample.png',2,2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',2);

/*Table structure for table `post_category` */

DROP TABLE IF EXISTS `post_category`;

CREATE TABLE `post_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `post_category` */

/*Table structure for table `poststatus` */

DROP TABLE IF EXISTS `poststatus`;

CREATE TABLE `poststatus` (
  `poststatus_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`poststatus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `poststatus` */

insert  into `poststatus`(`poststatus_id`,`status_name`,`description`) values (1,'Ne Redaktim',NULL),(2,'Publikuar',NULL),(3,'Anulluar',NULL);

/*Table structure for table `posttags` */

DROP TABLE IF EXISTS `posttags`;

CREATE TABLE `posttags` (
  `posttags_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL,
  PRIMARY KEY (`posttags_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `posttags` */

/*Table structure for table `posttype` */

DROP TABLE IF EXISTS `posttype`;

CREATE TABLE `posttype` (
  `posttype_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`posttype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `posttype` */

insert  into `posttype`(`posttype_id`,`type_name`,`description`) values (1,'Liber',NULL),(2,'Artikull',NULL),(3,'Material',NULL);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role_name`,`description`) values (1,'Admin',NULL),(2,'Writer',NULL);

/*Table structure for table `tag` */

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_label` varchar(100) DEFAULT NULL,
  `tag_code` varchar(100) DEFAULT NULL,
  `use_count` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tag` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `id_role` tinyint(4) NOT NULL DEFAULT '2',
  `img_url` varchar(500) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(800) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`username`,`password`,`firstname`,`lastname`,`id_role`,`img_url`,`email`,`date_created`,`description`,`active`) values (1,'admin','test','Arben','Fusha',1,'user4.png','admin@gmail.com','2014-09-20 19:13:18','ut even though it doesn’t export tools for working with the internals of Gen directly, it does export a function called sample’ that always generates a list of 11 results in the IO monad. We can pair this with concat and the vectorOf',1),(2,'writer','test','Andi','Kodra',2,'user2.jpg','writer@gmail.com','2012-07-04 19:13:18','disa fjale rreth perdoruesit',1),(3,'test1','test1','Test1 Emri','mbiemri test1',1,'user1.jpg','test1@gmail.com','2014-10-30 19:13:18','disa fjale rreth perdoruesit',1),(4,'third_user','third_user','The Third','User',2,'user3.png','third_user@gmail.com','2011-12-30 19:35:09','disa fjale rreth perdoruesit',1),(5,'forth_user','forth_user','Ardit','Hoxha',1,'user3.png','forth_user@yahoo.com','2014-08-10 19:36:19','asfdsf',0),(6,'artani','artani','Artan','Prifti',2,'user2.jpg','artani@gmail.com','2014-11-03 19:30:38','disa fjale rreth perdoruesit',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
