/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.21-MariaDB : Database - pusb8564_dataku
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pusb8564_dataku` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pusb8564_dataku`;

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `SUBJECT` varchar(250) DEFAULT NULL,
  `MESSAGES` text DEFAULT NULL,
  `STATUS` enum('READ','UNREAD') DEFAULT 'UNREAD',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `contact` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(50) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `ALAMAT` text DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `NO_HP` varchar(16) DEFAULT NULL,
  `IS_AGEN` enum('YES','NO') DEFAULT 'NO',
  `KODE_REFERAL` varchar(10) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `USERNAME_UQ` (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

/*Table structure for table `log_transaksi` */

DROP TABLE IF EXISTS `log_transaksi`;

CREATE TABLE `log_transaksi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIPE` enum('REQUEST','RESPONSE') DEFAULT 'REQUEST',
  `ID_REFFERENCE` varchar(10) DEFAULT NULL,
  `ID_TRANSAKSI` varchar(11) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `STATUS` enum('0','1') DEFAULT '0',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT 'SYSTEM',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `log_transaksi` */

insert  into `log_transaksi`(`ID`,`TIPE`,`ID_REFFERENCE`,`ID_TRANSAKSI`,`DESCRIPTION`,`STATUS`,`CREATED_DATE`,`CREATED_BY`) values (1,'REQUEST','068B533ECD','89559','{\"ref_id\":\"068B533ECD\",\"status\":0,\"price\":5990,\"message\":\"PROCESS\",\"balance\":99414840,\"tr_id\":89559,\"rc\":\"39\",\"code\":\"hindosat5000\",\"hp\":\"08576456238982\"}','0','2021-10-10 06:33:08','SYSTEM'),(2,'REQUEST','BF71734503','89560','{\"ref_id\":\"BF71734503\",\"status\":0,\"price\":10800,\"message\":\"PROCESS\",\"balance\":99404040,\"tr_id\":89560,\"rc\":\"39\",\"code\":\"haxis10000\",\"hp\":\"0831823294561\"}','0','2021-10-10 06:33:21','SYSTEM'),(3,'REQUEST','1F49E2F2B6','89561','{\"ref_id\":\"1F49E2F2B6\",\"status\":0,\"price\":15000,\"message\":\"PROCESS\",\"balance\":99389040,\"tr_id\":89561,\"rc\":\"39\",\"code\":\"haxis15000\",\"hp\":\"0831823294562\"}','0','2021-10-10 06:33:41','SYSTEM'),(4,'REQUEST','5391A99ED6','89562','{\"ref_id\":\"5391A99ED6\",\"status\":0,\"price\":26000,\"message\":\"PROCESS\",\"balance\":99363040,\"tr_id\":89562,\"rc\":\"39\",\"code\":\"haxis25000\",\"hp\":\"0831823294563\"}','0','2021-10-10 06:33:55','SYSTEM'),(5,'REQUEST','DFB64A5F4B','89563','{\"ref_id\":\"DFB64A5F4B\",\"status\":0,\"price\":51000,\"message\":\"PROCESS\",\"balance\":99312040,\"tr_id\":89563,\"rc\":\"39\",\"code\":\"haxis50000\",\"hp\":\"0831823294564\"}','0','2021-10-10 06:34:10','SYSTEM'),(6,'REQUEST','3CD6F696CC','89564','{\"ref_id\":\"3CD6F696CC\",\"status\":0,\"price\":100000,\"message\":\"PROCESS\",\"balance\":99212040,\"tr_id\":89564,\"rc\":\"39\",\"code\":\"haxis100000\",\"hp\":\"0831823294565\"}','0','2021-10-10 06:34:23','SYSTEM'),(7,'RESPONSE','3CD6F696CC','89564','{\"data\":{\"ref_id\":\"3CD6F696CC\",\"status\":\"1\",\"price\":\"100000\",\"message\":\"SUCCESS\",\"balance\":\"99212040\",\"tr_id\":\"89564\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"dc50dc09efd3d15bab28e332717d8103\",\"code\":\"haxis100000\",\"hp\":\"0831823294565\"}}','0','2021-10-10 06:34:42','SYSTEM'),(8,'RESPONSE','DFB64A5F4B','89563','{\"data\":{\"ref_id\":\"DFB64A5F4B\",\"status\":\"2\",\"price\":\"51000\",\"message\":\"CUSTOMER NUMBER BLOCKED\",\"balance\":\"99212040\",\"tr_id\":\"89563\",\"rc\":\"13\",\"sign\":\"08fcb7c2213eafe7049d6ce295307fdb\",\"code\":\"haxis50000\",\"hp\":\"0831823294564\"}}','0','2021-10-10 06:34:47','SYSTEM'),(9,'RESPONSE','5391A99ED6','89562','{\"data\":{\"ref_id\":\"5391A99ED6\",\"status\":\"2\",\"price\":\"26000\",\"message\":\"UNDEFINED ERROR\",\"balance\":\"99212040\",\"tr_id\":\"89562\",\"rc\":\"05\",\"sign\":\"21b0ee9387284d2b6483a37b7ead5beb\",\"code\":\"haxis25000\",\"hp\":\"0831823294563\"}}','0','2021-10-10 06:34:53','SYSTEM'),(10,'RESPONSE','1F49E2F2B6','89561','{\"data\":{\"ref_id\":\"1F49E2F2B6\",\"status\":\"2\",\"price\":\"15000\",\"message\":\"INCORRECT DESTINATION NUMBER\",\"balance\":\"99212040\",\"tr_id\":\"89561\",\"rc\":\"14\",\"sign\":\"ebc6753785c45846f32c07acb0d722a2\",\"code\":\"haxis15000\",\"hp\":\"0831823294562\"}}','0','2021-10-10 06:35:02','SYSTEM'),(11,'RESPONSE','BF71734503','89560','{\"data\":{\"ref_id\":\"BF71734503\",\"status\":\"1\",\"price\":\"10800\",\"message\":\"SUCCESS\",\"balance\":\"99212040\",\"tr_id\":\"89560\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"ab0af4cab11902790474dd19545eae10\",\"code\":\"haxis10000\",\"hp\":\"0831823294561\"}}','0','2021-10-10 06:35:08','SYSTEM'),(12,'RESPONSE','068B533ECD','89559','{\"data\":{\"ref_id\":\"068B533ECD\",\"status\":\"1\",\"price\":\"5990\",\"message\":\"SUCCESS\",\"balance\":\"99212040\",\"tr_id\":\"89559\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"0117e83e93374a9b9647c98441fbfbf6\",\"code\":\"hindosat5000\",\"hp\":\"08576456238982\"}}','0','2021-10-10 06:35:11','SYSTEM'),(13,'REQUEST','819D5467CC','89570','{\"ref_id\":\"819D5467CC\",\"status\":0,\"price\":10800,\"message\":\"PROCESS\",\"balance\":99201240,\"tr_id\":89570,\"rc\":\"39\",\"code\":\"haxis10000\",\"hp\":\"08311111111111\"}','0','2021-10-10 12:35:35','SYSTEM'),(14,'RESPONSE','819D5467CC','89570','{\"data\":{\"ref_id\":\"819D5467CC\",\"status\":\"1\",\"price\":\"10800\",\"message\":\"SUCCESS\",\"balance\":\"99201240\",\"tr_id\":\"89570\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"f44ef2a9d4b846f5d8d0770f6e6ee0a4\",\"code\":\"haxis10000\",\"hp\":\"08311111111111\"}}','0','2021-10-10 12:37:20','SYSTEM'),(15,'RESPONSE','AE2729CF17','90029','{\"data\":{\"ref_id\":\"AE2729CF17\",\"status\":\"1\",\"price\":\"3575\",\"message\":\"SUCCESS\",\"balance\":\"99191675\",\"tr_id\":\"90029\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"a25d4c382e93ae778d5dc054c688f98f\",\"code\":\"isatdataY1D\",\"hp\":\"08576734567\"}}','0','2021-10-20 22:16:38','SYSTEM'),(16,'RESPONSE','9170BE2806','90028','{\"data\":{\"ref_id\":\"9170BE2806\",\"status\":\"1\",\"price\":\"5990\",\"message\":\"SUCCESS\",\"balance\":\"99191675\",\"tr_id\":\"90028\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"f8702b82fa30e22cefb4014309e2c321\",\"code\":\"hindosat5000\",\"hp\":\"085746337643\"}}','0','2021-10-21 07:31:34','SYSTEM'),(17,'REQUEST','D6D8FDB7E1','90052','{\"ref_id\":\"D6D8FDB7E1\",\"status\":0,\"price\":10950,\"message\":\"PROCESS\",\"balance\":99180725,\"tr_id\":90052,\"rc\":\"39\",\"code\":\"hindosat10000\",\"hp\":\"0857376378634\"}','0','2021-10-21 18:27:21','SYSTEM'),(18,'RESPONSE','D6D8FDB7E1','90052','{\"data\":{\"ref_id\":\"D6D8FDB7E1\",\"status\":\"1\",\"price\":\"10950\",\"message\":\"SUCCESS\",\"balance\":\"99180725\",\"tr_id\":\"90052\",\"rc\":\"00\",\"sn\":\"123456789\",\"sign\":\"18e4896e99b55dd2d586291ba57e454a\",\"code\":\"hindosat10000\",\"hp\":\"0857376378634\"}}','0','2021-10-21 18:28:20','SYSTEM'),(19,'REQUEST','C5B9AFF635','90053','{\"ref_id\":\"C5B9AFF635\",\"status\":0,\"price\":12500,\"message\":\"PROCESS\",\"balance\":99168225,\"tr_id\":90053,\"rc\":\"39\",\"code\":\"hindosat12000\",\"hp\":\"085767456746\"}','0','2021-10-21 18:30:35','SYSTEM'),(20,'RESPONSE','C5B9AFF635','90053','{\"data\":{\"ref_id\":\"C5B9AFF635\",\"status\":\"2\",\"price\":\"12500\",\"message\":\"CUSTOMER NUMBER BLOCKED\",\"balance\":\"99168225\",\"tr_id\":\"90053\",\"rc\":\"13\",\"sign\":\"47d5350eff412c7d35ce6547e1981058\",\"code\":\"hindosat12000\",\"hp\":\"085767456746\"}}','0','2021-10-21 18:30:51','SYSTEM');

/*Table structure for table `ms_agen` */

DROP TABLE IF EXISTS `ms_agen`;

CREATE TABLE `ms_agen` (
  `ID` int(11) DEFAULT NULL,
  `KODE_REFERAL` varchar(10) DEFAULT NULL,
  `POIN` int(11) DEFAULT 0,
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_agen` */

/*Table structure for table `ms_banner` */

DROP TABLE IF EXISTS `ms_banner`;

CREATE TABLE `ms_banner` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_NEWS` int(11) DEFAULT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `FILE_URL` varchar(250) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_banner` */

/*Table structure for table `ms_kategori` */

DROP TABLE IF EXISTS `ms_kategori`;

CREATE TABLE `ms_kategori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(250) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_kategori` */

insert  into `ms_kategori`(`ID`,`NAME`,`DESCRIPTION`,`STATUS`,`CREATED_DATE`,`CREATED_BY`,`UPDATED_DATE`,`UPDATED_BY`,`DELETED_DATE`,`DELETED_BY`) values (1,'PRABAYAR','','ACTIVE','2021-09-19 04:46:42','IRFANDI','2021-09-19 10:33:30','IRFANDI',NULL,NULL),(2,'PASCABAYAR','','ACTIVE','2021-09-19 04:46:59','IRFANDI',NULL,NULL,NULL,NULL),(3,'E-MONEY','','ACTIVE','2021-09-19 04:47:20','IRFANDI',NULL,NULL,NULL,NULL),(4,'VOUCHER GAME','','ACTIVE','2021-09-19 04:48:10','IRFANDI','2021-09-19 10:33:17','IRFANDI',NULL,NULL);

/*Table structure for table `ms_news` */

DROP TABLE IF EXISTS `ms_news`;

CREATE TABLE `ms_news` (
  `ID` int(11) DEFAULT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_news` */

/*Table structure for table `ms_produk_pulsa` */

DROP TABLE IF EXISTS `ms_produk_pulsa`;

CREATE TABLE `ms_produk_pulsa` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE` enum('PULSA','PAKET NELPON','PAKET SMS','DATA','PLN PRABAYAR') DEFAULT NULL,
  `ID_PROVIDER` int(11) DEFAULT NULL,
  `CODE` varchar(50) DEFAULT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `HARGA_MODAL` decimal(15,0) DEFAULT 0,
  `HARGA_JUAL` decimal(15,0) DEFAULT 0,
  `MASA_AKTIF` int(11) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `PRODUK_CODE` (`CODE`),
  KEY `UQ_SUB_KATEGORI_PRODUK` (`ID_PROVIDER`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_produk_pulsa` */

insert  into `ms_produk_pulsa`(`ID`,`TYPE`,`ID_PROVIDER`,`CODE`,`NAME`,`DESCRIPTION`,`HARGA_MODAL`,`HARGA_JUAL`,`MASA_AKTIF`,`STATUS`,`CREATED_DATE`,`CREATED_BY`,`UPDATED_DATE`,`UPDATED_BY`,`DELETED_DATE`,`DELETED_BY`) values (1,'PULSA',3,'haxis5000','5,000','Pulsa reguler 5,000. Masa aktif 7 Hari',5900,6500,7,'ACTIVE','2021-10-03 07:05:46','IRFANDI','2021-10-08 02:35:33','SYSTEM',NULL,NULL),(2,'PULSA',3,'haxis10000','10,000','Pulsa Reguler 10,000. Masa aktif 14 Hari',10800,11500,15,'ACTIVE','2021-10-03 07:05:46','IRFANDI','2021-10-09 21:42:01','SYSTEM',NULL,NULL),(3,'PULSA',3,'haxis15000','15,000','Pulsa reguler 15,000. Masa aktif 20 Hari',15000,15500,0,'ACTIVE','2021-10-03 07:05:46','IRFANDI','2021-10-09 00:27:51','SYSTEM',NULL,NULL),(4,'PULSA',3,'haxis25000','25,000','Pulsa reguler 25,000. Masa aktif 35 Hari',26000,25500,30,'ACTIVE','2021-10-03 07:05:46','IRFANDI','2021-10-10 06:33:55','SYSTEM',NULL,NULL),(5,'PULSA',3,'haxis30000','30,000','Pulsa reguler 30,000. Masa aktif 45 Hari',29900,31500,NULL,'INACTIVE','2021-10-03 07:05:46','IRFANDI','2021-10-10 06:34:07','SYSTEM',NULL,NULL),(6,'PULSA',3,'haxis50000','50,000','Pulsa reguler 50,000. Masa aktif 75 Hari',51000,52000,60,'ACTIVE','2021-10-03 07:12:11','IRFANDI','2021-10-08 12:39:24','SYSTEM',NULL,NULL),(7,'PULSA',3,'haxis100000','100,000','Pulsa reguler 100,000. Masa aktif 150 Hari',100000,102000,90,'ACTIVE','2021-10-03 07:12:11','IRFANDI','2021-10-10 06:34:22','SYSTEM',NULL,NULL),(8,'PULSA',3,'haxis200000','200,000','Pulsa reguler 200,000. Masa aktif 300 Hari',199080,200000,NULL,'ACTIVE','2021-10-03 07:23:43','IRFANDI',NULL,NULL,NULL,NULL),(9,'PULSA',3,'haxis300000','300,000','Pulsa reguler 300,000. Masa aktif 360 Hari',299000,300000,NULL,'ACTIVE','2021-10-03 07:23:43','IRFANDI',NULL,NULL,NULL,NULL),(10,'PULSA',3,'haxis500000','500,000','Pulsa reguler 500,000. Masa aktif 360 Hari',498000,500000,NULL,'ACTIVE','2021-10-03 07:23:43','IRFANDI',NULL,NULL,NULL,NULL),(11,'PULSA',3,'haxis1000000','1,000,000','Pulsa reguler 1jt. Masa aktif 360 Hari',995000,1000000,NULL,'ACTIVE','2021-10-03 07:23:43','IRFANDI',NULL,NULL,NULL,NULL),(12,'PULSA',1,'hindosat5000','5,000','-',5990,7000,7,'INACTIVE','2021-10-03 08:19:52','IRFANDI','2021-10-20 15:24:39','SYSTEM',NULL,NULL),(13,'PULSA',1,'hindosat10000','10,000','Pulsa reguler 10,000. Masa aktif 15 Hari',10950,12000,15,'INACTIVE','2021-10-03 08:19:53','IRFANDI','2021-10-20 15:24:23','SYSTEM',NULL,NULL),(14,'PULSA',1,'hindosat12000','12,000','Pulsa reguler 12,000. Masa aktif 15 Hari',12500,13500,15,'INACTIVE','2021-10-03 10:10:10','IRFANDI','2021-10-20 15:24:04','SYSTEM',NULL,NULL),(15,'PULSA',1,'hindosat15000','15,000','Pulsa reguler 15,000. Masa aktif 20 Hari',15590,16500,0,'INACTIVE','2021-10-03 10:10:10','IRFANDI','2021-10-21 18:27:12','SYSTEM',NULL,NULL),(16,'PULSA',1,'hindosat20000','20,000','Pulsa reguler 20,000. Masa aktif 30 Hari',20200,21500,30,'ACTIVE','2021-10-03 10:10:10','IRFANDI','2021-10-07 09:48:49','SYSTEM',NULL,NULL),(17,'PULSA',1,'hindosat25000','25,000','Pulsa reguler 25,000. Masa aktif 30 Hari',25000,26000,NULL,'INACTIVE','2021-10-03 10:10:10','IRFANDI','2021-10-20 15:25:29','SYSTEM',NULL,NULL),(18,'PULSA',1,'hindosat30000','30,000','Pulsa reguler 30,000. Masa aktif 30 Hari',30710,31500,NULL,'ACTIVE','2021-10-03 10:10:10','IRFANDI',NULL,NULL,NULL,NULL),(19,'PULSA',1,'hindosat50000','50,000','Pulsa reguler 50,000. Masa aktif 45 Hari',48800,50500,45,'ACTIVE','2021-10-03 10:10:10','IRFANDI','2021-10-08 21:53:14','SYSTEM',NULL,NULL),(20,'PULSA',1,'hindosat60000','60,000','Pulsa reguler 60,000. Masa aktif 60 Hari',58800,60500,0,'ACTIVE','2021-10-03 10:10:10','IRFANDI','2021-10-08 16:47:18','SYSTEM',NULL,NULL),(21,'PULSA',1,'hindosat80000','80,000','Pulsa reguler 80,000. Masa aktif 60 Hari',78410,79500,NULL,'ACTIVE','2021-10-03 10:10:10','IRFANDI',NULL,NULL,NULL,NULL),(22,'PULSA',1,'hindosat100000','100,000','Pulsa reguler 100,000. Masa aktif 60 Hari',98510,100000,NULL,'ACTIVE','2021-10-03 10:10:10','IRFANDI',NULL,NULL,NULL,NULL),(23,'PULSA',1,'hindosat150000','150,000','Pulsa reguler 150,000. Masa aktif 90 Hari',143750,150000,NULL,'ACTIVE','2021-10-03 10:10:10','IRFANDI',NULL,NULL,NULL,NULL),(24,'PULSA',1,'hindosat200000','200,000','Pulsa reguler 200,000. Masa aktif 90 Hari',186470,200000,NULL,'ACTIVE','2021-10-03 10:10:10','IRFANDI',NULL,NULL,NULL,NULL),(25,'PULSA',1,'hindosat500000','500,000','Pulsa reguler 500,000. Masa aktif 120 Hari',463000,500000,60,'ACTIVE','2021-10-03 10:10:10','IRFANDI','2021-10-08 13:31:52','SYSTEM',NULL,NULL),(26,'PAKET SMS',1,'hindosat5000SMS','300 SMS sesama Indosat + 100 SMS operator lain','300 SMS sesama Isat + 100 SMS operator lain',6540,7500,NULL,'ACTIVE','2021-10-03 10:23:10','IRFANDI',NULL,NULL,NULL,NULL),(27,'PAKET SMS',1,'hindosat10000SMS','600 SMS sesama Isat + 200 SMS operator lain','600 SMS sesama Isat + 200 SMS operator lain',12070,13500,NULL,'INACTIVE','2021-10-03 10:23:10','IRFANDI','2021-10-20 22:16:00','SYSTEM',NULL,NULL),(28,'PAKET SMS',1,'hindosat25000SMS','2000 SMS sesama Isat + 500 SMS operator lain','2000 SMS sesama Isat + 500 SMS operator lain',28150,30000,NULL,'ACTIVE','2021-10-03 10:23:10','IRFANDI',NULL,NULL,NULL,NULL),(29,'PULSA',1,'hindosat40000','40,000','-',40000,41500,NULL,'ACTIVE','2021-10-06 11:57:13','IRFANDI',NULL,NULL,NULL,NULL),(30,'PULSA',1,'hindosat90000','90,000','-',90000,91500,NULL,'INACTIVE','2021-10-06 11:57:13','IRFANDI','2021-10-08 11:28:00','SYSTEM',NULL,NULL),(31,'PULSA',1,'hindosat125000','125,000','-',125000,126500,NULL,'ACTIVE','2021-10-06 11:57:13','IRFANDI',NULL,NULL,NULL,NULL),(32,'PULSA',1,'hindosat175000','175,000','-',175000,176500,NULL,'INACTIVE','2021-10-06 11:57:13','IRFANDI','2021-10-20 15:24:56','SYSTEM',NULL,NULL),(33,'PULSA',1,'hindosat250000','250,000','Pulsa reguler 250,000. Masa aktif 120 Hari',233210,250000,NULL,'ACTIVE','2021-10-06 11:57:13','IRFANDI',NULL,NULL,NULL,NULL),(34,'PAKET NELPON',1,'hindosat10000TEL','Paket Nelpon Sepuasnya Rp 10.000','Paket Nelpon Obrol Sepuasnya ke Sesama / 30 Hari (Unlimited Nelp ke sesama & Spesial Tarif Nelp ke operator lain Rp 10/detik. Masa aktif 30 hari)',10360,11500,NULL,'INACTIVE','2021-10-06 12:01:46','IRFANDI','2021-10-20 21:49:22','SYSTEM',NULL,NULL),(35,'PAKET NELPON',1,'hindosat25000TEL','Paket Nelpon Sepuasnya Rp 25.000','Paket Nelpon Obrol Sepuasnya ke Sesama + 60 menit ke Semua / 30 Hari (Unlimited Nelp ke sesama & 60 Menit Nelp ke operator lain. Masa aktif 30 hari)',24880,26500,NULL,'INACTIVE','2021-10-06 12:01:46','IRFANDI','2021-10-20 21:45:57','SYSTEM',NULL,NULL),(36,'PAKET NELPON',1,'hindosat50000TEL','Paket Nelpon Sepuasnya Rp 50.000','Paket Nelpon Obrol Sepuasnya ke Sesama + 250 menit ke Semua / 30 Hari (Unlimited Nelp ke sesama & 250 Menit Nelp ke operator lain. Masa aktif 30 hari)',49710,52000,NULL,'ACTIVE','2021-10-06 12:01:46','IRFANDI',NULL,NULL,NULL,NULL),(37,'PAKET NELPON',1,'hindosat56000TEL','Paket Nelpon Obrol Sepuasnya ke Sesama + 60 menit ke Semua / 30 Hari','-',57900,60000,NULL,'INACTIVE','2021-10-06 12:01:46','IRFANDI','2021-10-20 21:45:41','SYSTEM',NULL,NULL),(38,'DATA',1,'isatdata100mb','100MB','KUOTA 100MB 30 hari',3520,3720,0,'ACTIVE','2021-10-20 22:09:05','IRFANDI',NULL,NULL,NULL,NULL),(39,'DATA',1,'isatdataY1D','Paket Yellow Internet 1GB 1 Hari','Kuota Utama 1GB, masa aktif 1Hari.',3575,3800,1,'ACTIVE','2021-10-20 22:09:05','IRFANDI','2021-10-20 22:16:19','SYSTEM',NULL,NULL),(40,'DATA',1,'isatdataY3D','Paket Yellow Internet 1GB 3 Hari','Kuota Utama 1GB, masa aktif 3Hari.',5160,5360,0,'ACTIVE','2021-10-20 22:09:05','IRFANDI',NULL,NULL,NULL,NULL),(41,'DATA',1,'isatdata200mb','200MB','KUOTA 200MB 30 hari',5530,5730,0,'ACTIVE','2021-10-20 22:09:05','IRFANDI',NULL,NULL,NULL,NULL),(42,'DATA',1,'isatdata300mb','300MB','KUOTA 300MB 30 hari',6240,6440,0,'ACTIVE','2021-10-20 22:09:05','IRFANDI',NULL,NULL,NULL,NULL);

/*Table structure for table `ms_promo` */

DROP TABLE IF EXISTS `ms_promo`;

CREATE TABLE `ms_promo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KODE_PROMO` varchar(10) DEFAULT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(250) DEFAULT NULL,
  `TIPE` enum('PERCEN','NOMINAL') DEFAULT NULL,
  `DISC` decimal(18,2) DEFAULT 0.00,
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_promo` */

/*Table structure for table `ms_provider` */

DROP TABLE IF EXISTS `ms_provider`;

CREATE TABLE `ms_provider` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_provider` */

insert  into `ms_provider`(`ID`,`NAME`,`DESCRIPTION`,`IMAGE`,`STATUS`,`CREATED_DATE`,`CREATED_BY`,`UPDATED_DATE`,`UPDATED_BY`,`DELETED_DATE`,`DELETED_BY`) values (1,'INDOSAT','0814,0815,0816,0855,0856,0857,0858','indosat.svg','ACTIVE','2021-10-01 11:11:48',NULL,NULL,NULL,NULL,NULL),(2,'XL','0817,0818,0819,0859,0878,0877','xl.png','ACTIVE','2021-10-01 11:12:21',NULL,NULL,NULL,NULL,NULL),(3,'AXIS','0838,0837,0831,0832','axis.png','ACTIVE','2021-10-01 11:12:54',NULL,NULL,NULL,NULL,NULL),(4,'TELKOMSEL','0811,0812,0813,0852,0853,0821,0823,0822,0851','telkomsel.png','ACTIVE','2021-10-01 11:12:57',NULL,NULL,NULL,NULL,NULL),(5,'SMARTFREN','0881,0882,0883,0884, 0885,0886,0887,0888','smartfren.png','ACTIVE','2021-10-01 11:13:30',NULL,NULL,NULL,NULL,NULL),(6,'THREE','0896,0897,0898,0899,0895','three.png','ACTIVE','2021-10-01 11:13:32',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `ms_sub_kategori` */

DROP TABLE IF EXISTS `ms_sub_kategori`;

CREATE TABLE `ms_sub_kategori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `NAME` varchar(250) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `TITLE_LABEL` enum('ICON','IMAGE') DEFAULT NULL,
  `LABEL` varchar(100) DEFAULT NULL,
  `URL` varchar(250) DEFAULT NULL,
  `STATUS` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `UQ_KATEGORI` (`ID_KATEGORI`),
  CONSTRAINT `UQ_KATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `ms_kategori` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_sub_kategori` */

insert  into `ms_sub_kategori`(`ID`,`ID_KATEGORI`,`NAME`,`DESCRIPTION`,`TITLE_LABEL`,`LABEL`,`URL`,`STATUS`,`CREATED_DATE`,`CREATED_BY`,`UPDATED_DATE`,`UPDATED_BY`,`DELETED_DATE`,`DELETED_BY`) values (1,1,'Pulsa Reguler','','ICON','fa fa-mobile-alt','pulsa-reguler','ACTIVE','2021-09-20 09:14:01',NULL,'2021-09-30 05:37:10','IRFANDI',NULL,NULL),(2,2,'PLN Pascabayar',NULL,'IMAGE','image/payment/pln.jpg','pln-pascabayar','ACTIVE','2021-09-20 09:14:58',NULL,NULL,NULL,NULL,NULL),(3,2,'BPJS',NULL,'IMAGE','image/payment/bpjs.png','bpjs','ACTIVE',NULL,NULL,NULL,NULL,NULL,NULL),(4,1,'Pulsa Transfer','','ICON','fa fa-exchange-alt','pulsa-transfer','INACTIVE','2021-09-26 05:22:06','IRFANDI','2021-10-20 15:06:28','IRFANDI',NULL,NULL),(5,1,'Paket Data','','ICON','fa fa-wifi','paket-data','ACTIVE','2021-09-26 05:22:42','IRFANDI','2021-09-30 04:45:08','IRFANDI',NULL,NULL),(6,1,'Telepon & SMS','','ICON','fa fa-sms','telepon-sms','ACTIVE','2021-09-26 05:23:04','IRFANDI',NULL,NULL,NULL,NULL),(7,1,'Token PLN','','ICON','fa fa-bolt','pln-prabayar','ACTIVE','2021-09-26 05:23:31','IRFANDI',NULL,NULL,NULL,NULL),(8,1,'Voucher Internet','','ICON','fa fa-server','voucher-internet','INACTIVE','2021-09-26 05:23:47','IRFANDI','2021-10-20 15:06:43','IRFANDI',NULL,NULL),(9,2,'PDAM','','IMAGE','image/payment/pdam.png','pdam','ACTIVE','2021-09-26 16:45:16','IRFANDI',NULL,NULL,NULL,NULL),(10,2,'HALO TELKOMSEL','','IMAGE','image/payment/telkomsel.png','halo-telkomsel','ACTIVE','2021-09-26 16:45:34','IRFANDI',NULL,NULL,NULL,NULL),(11,3,'OVO','','IMAGE','image/payment/ovo.png','ovo','ACTIVE','2021-09-26 16:46:12','IRFANDI',NULL,NULL,NULL,NULL),(12,3,'GOPAY','','IMAGE','image/payment/gopay.png','gopay','ACTIVE','2021-09-26 16:46:27','IRFANDI',NULL,NULL,NULL,NULL),(13,3,'DANA','','IMAGE','image/payment/dana.png','dana','ACTIVE','2021-09-26 16:46:47','IRFANDI',NULL,NULL,NULL,NULL),(14,3,'LINK AJA','','IMAGE','image/payment/linkaja.png','linkaja','ACTIVE','2021-09-26 16:47:01','IRFANDI',NULL,NULL,NULL,NULL),(15,3,'SHOPEEPAY','','IMAGE','image/payment/shopeepay.jpg','shopeepay','ACTIVE','2021-09-26 16:47:18','IRFANDI',NULL,NULL,NULL,NULL),(16,4,'MOBILE LEGENDS','','IMAGE','image/payment/mobilelegends.png','mobile-legends','ACTIVE','2021-09-26 16:47:48','IRFANDI',NULL,NULL,NULL,NULL),(17,4,'PUBG','','IMAGE','image/payment/pubg.png','pubg','ACTIVE','2021-09-26 16:48:01','IRFANDI',NULL,NULL,NULL,NULL),(18,4,'FREE FIRE','','IMAGE','image/payment/freefire.jpg','free-fire','ACTIVE','2021-09-26 16:48:18','IRFANDI',NULL,NULL,NULL,NULL),(19,4,'CALL OF DUTY','','IMAGE','image/payment/cod.jpg','call-of-duty','ACTIVE','2021-09-26 16:48:35','IRFANDI',NULL,NULL,NULL,NULL),(20,4,'VALORANT','','IMAGE','image/payment/valorant.png','valorant','ACTIVE','2021-09-26 16:48:48','IRFANDI',NULL,NULL,NULL,NULL),(21,4,'ARENA OF VALOR','','IMAGE','image/payment/aov.jpg','arena-of-valor','ACTIVE','2021-09-26 16:49:04','IRFANDI',NULL,NULL,NULL,NULL),(22,4,'HIGGS DOMINO','','IMAGE','image/payment/domino.png','higgs-domino','ACTIVE','2021-09-26 16:49:23','IRFANDI',NULL,NULL,NULL,NULL),(23,4,'SAUSAGE MAN','','IMAGE','image/payment/sausageman.png','sausage-man','ACTIVE','2021-09-26 16:49:39','IRFANDI',NULL,NULL,NULL,NULL),(24,4,'GENSHIN IMPACT','','IMAGE','image/payment/gensin.png','genshin-impact','ACTIVE','2021-09-26 16:49:55','IRFANDI',NULL,NULL,NULL,NULL),(25,4,'DRAGON RAJA','','IMAGE','image/payment/dragonraja.jpg','dragon-raja','ACTIVE','2021-09-26 16:50:09','IRFANDI',NULL,NULL,NULL,NULL),(26,4,'RAGNAROK M','','IMAGE','image/payment/ragnarok.png','ragnarok-m','ACTIVE','2021-09-26 16:50:27','IRFANDI',NULL,NULL,NULL,NULL);

/*Table structure for table `ms_users` */

DROP TABLE IF EXISTS `ms_users`;

CREATE TABLE `ms_users` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(250) NOT NULL,
  `NAME` varchar(250) NOT NULL,
  `NOHP` varchar(25) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `STATUS` enum('0','1','2','3') DEFAULT '1' COMMENT '0=NON AKTIF, 1=AKTIF, 2=DELETE, 3=BLOKIR SALAH PASSWORD',
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  `DELETED_DATE` datetime DEFAULT NULL,
  `DELETED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ms_users` */

insert  into `ms_users`(`USERNAME`,`PASSWORD`,`NAME`,`NOHP`,`EMAIL`,`STATUS`,`CREATED_DATE`,`CREATED_BY`,`UPDATED_DATE`,`UPDATED_BY`,`DELETED_DATE`,`DELETED_BY`) values ('IRFANDI','9b3d3dff45770bf3ccc155732e576d73','IRFANDI RICON','0895320294566','irfandi.ricon@gmail.com','1','2021-09-18 05:46:12','irfandi','2021-09-18 05:46:47','irfandi',NULL,NULL),('VIRA','9b3d3dff45770bf3ccc155732e576d73','VIRA ARVIANTI','098239084923','vira@gmail.com','2','2021-09-18 05:47:53','irfandi',NULL,NULL,'2021-09-19 08:32:15','IRFANDI');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_REFFERENCE` varchar(10) DEFAULT NULL,
  `ID_TRANSAKSI` varchar(11) DEFAULT NULL,
  `KODE_PRODUK` varchar(50) DEFAULT NULL,
  `NO_PELANGGAN` varchar(100) NOT NULL,
  `JUMLAH_BAYAR` decimal(18,2) DEFAULT 0.00,
  `STATUS_TRANSAKSI` varchar(1) DEFAULT '0',
  `PESAN` varchar(250) NOT NULL,
  `SN` varchar(100) NOT NULL,
  `BALANCE` decimal(18,2) NOT NULL DEFAULT 0.00,
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY` varchar(50) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

insert  into `transaksi`(`ID`,`ID_REFFERENCE`,`ID_TRANSAKSI`,`KODE_PRODUK`,`NO_PELANGGAN`,`JUMLAH_BAYAR`,`STATUS_TRANSAKSI`,`PESAN`,`SN`,`BALANCE`,`CREATED_DATE`,`CREATED_BY`,`UPDATED_DATE`,`UPDATED_BY`) values (1,'068B533ECD','89559','hindosat5000','08576456238982',5990.00,'1','SUCCESS','123456789',99212040.00,'2021-10-10 06:33:08','SYSTEM','2021-10-10 06:35:11','SYSTEM'),(2,'BF71734503','89560','haxis10000','0831823294561',10800.00,'1','SUCCESS','123456789',99212040.00,'2021-10-10 06:33:21','SYSTEM','2021-10-10 06:35:08','SYSTEM'),(3,'1F49E2F2B6','89561','haxis15000','0831823294562',15000.00,'2','INCORRECT DESTINATION NUMBER','',99212040.00,'2021-10-10 06:33:41','SYSTEM','2021-10-10 06:35:02','SYSTEM'),(4,'5391A99ED6','89562','haxis25000','0831823294563',26000.00,'2','UNDEFINED ERROR','',99212040.00,'2021-10-10 06:33:55','SYSTEM','2021-10-10 06:34:53','SYSTEM'),(5,'DFB64A5F4B','89563','haxis50000','0831823294564',51000.00,'2','CUSTOMER NUMBER BLOCKED','',99212040.00,'2021-10-10 06:34:10','SYSTEM','2021-10-10 06:34:47','SYSTEM'),(6,'3CD6F696CC','89564','haxis100000','0831823294565',100000.00,'1','SUCCESS','123456789',99212040.00,'2021-10-10 06:34:23','SYSTEM','2021-10-10 06:34:42','SYSTEM'),(7,'819D5467CC','89570','haxis10000','08311111111111',10800.00,'1','SUCCESS','123456789',99201240.00,'2021-10-10 12:35:35','SYSTEM','2021-10-10 12:37:20','SYSTEM'),(8,'9170BE2806','90028','hindosat5000','085746337643',5990.00,'1','SUCCESS','',0.00,'2021-10-20 20:06:13','SYSTEM',NULL,NULL),(9,'AE2729CF17','90029','isatdataY1D','08576734567',3575.00,'1','SUCCESS','',0.00,'2021-10-20 22:16:20','SYSTEM',NULL,NULL),(10,'D6D8FDB7E1','90052','hindosat10000','0857376378634',10950.00,'1','SUCCESS','',0.00,'2021-10-21 18:27:21','SYSTEM',NULL,NULL),(11,'C5B9AFF635','90053','hindosat12000','085767456746',12500.00,'2','CUSTOMER NUMBER BLOCKED','',0.00,'2021-10-21 18:30:35','SYSTEM',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
