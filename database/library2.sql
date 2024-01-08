/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - library2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`library2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `library2`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

insert  into `admin`(`username`,`password`) values 
('admin','admin');

/*Table structure for table `ebook` */

DROP TABLE IF EXISTS `ebook`;

CREATE TABLE `ebook` (
  `ebookID` int(11) NOT NULL AUTO_INCREMENT,
  `catID` int(11) NOT NULL,
  `ebookname` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `imageurl` varchar(1000) NOT NULL,
  `dateposted` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`ebookID`),
  KEY `catID` (`catID`),
  CONSTRAINT `ebook_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `ebook_cat` (`catID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ebook` */

insert  into `ebook`(`ebookID`,`catID`,`ebookname`,`url`,`imageurl`,`dateposted`,`description`) values 
(36,39,'Modern Literacy Criticism and Theory','https://drive.google.com/file/d/1iaYIl55LCgEVgZLZ6O80voFmqRs6aZwZ/view','https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1348568855i/3350146.jpg','2023-07-04 21:36:03','Modern Literary Criticism and Theory is an academic discipline that examines and analyzes literature from a theoretical and critical perspective. '),
(37,39,'Language Across the Curriculum & CLIL in English as an Additional Language (EAL) Contexts','https://drive.google.com/file/d/1cCBEuRCvSWgZJ-MQuxd1aBDw8M3-QOEN/view','https://im1.book.com.tw/image/getImage?i=https://www.books.com.tw/img/F01/392/43/F013924380.jpg&v=5dc33f7ck&w=250&h=250','2023-07-04 21:39:54','Language Across the Curriculum (LAC) and Content and Language Integrated Learning (CLIL) are educational approaches that focus on integrating language learning and content learning in English as an Additional Language (EAL) contexts.'),
(38,40,'5G Mobile Communications: Concepts and Technologies','https://drive.google.com/file/d/1hZAGbF2uOHReuoREovj5SJrG-FGhF2gp/view','https://www.qualcomm.com/content/dam/qcomm-martech/dm-assets/images/components/two-column-hdi/side/what-is-5g-side-image.png?$QC_Responsive$&fmt=png-alpha','2023-07-04 21:46:07','5G, short for fifth-generation, is the latest generation of wireless network technology. It is designed to provide significantly faster data speeds, lower latency, and greater capacity compared to its predecessors, such as 4G LTE. '),
(39,40,'Excel Formulas and Functions','https://drive.google.com/file/d/17YiPBbQVbcQl_YMKJ832HrMJW8J_JdCG/view','https://excelmasterconsultant.com/wp-content/uploads/2021/09/Kindle-Cover-1-668x1024.jpg','2023-07-04 22:38:49','Excel formulas and functions are powerful tools that allow users to perform calculations, analyze data, and automate tasks within Microsoft Excel spreadsheets. They enable users to manipulate and transform data, make calculations based on specific criteria, and generate dynamic results.'),
(40,41,'Beginning Data Science in R: Data Analysis, Visualization, and Modelling for the Data Scientist','https://drive.google.com/file/d/1yfTQnphqTjpj3vAFfmQxQ3ylp4_dnfOR/view','https://m.media-amazon.com/images/I/61OKpwA2wlL._AC_UF1000,1000_QL80_.jpg','2023-07-04 22:45:39','The book focuses on key aspects of data science, including data analysis, data visualization, and statistical modeling, providing practical examples and step-by-step instructions for implementing data science techniques.'),
(42,41,'Business Math For Dummies','https://drive.google.com/file/d/1Q_UAJ3lxp4AHScSJfDkms1MSuv1-OP9e/view','https://lyryx.com/wp-content/uploads/2018/01/Business-Math-01.jpg','2023-07-04 22:49:52','is a beginner\'s guidebook that provides an accessible introduction to essential mathematical concepts and skills used in the world of business. Written in a user-friendly and approachable manner, the book aims to help readers understand and apply mathematical principles to solve common business problems and make informed decisions.'),
(43,43,'Practical Zoology Vertebrate','https://drive.google.com/file/d/1dDg4X1p5FRnWdvbCaRUCB2hPnjG31OFg/view','https://imgv2-2-f.scribdassets.com/img/document/428830341/149x198/6e1310befa/1678037581?v=1','2023-07-04 22:51:49','is a comprehensive guidebook that focuses on the study and practical aspects of vertebrate animals. It provides an in-depth exploration of the major groups of vertebrates, including fishes, amphibians, reptiles, birds, and mammals, with a hands-on approach to learning about their anatomy, physiology, behavior, and classification.'),
(44,43,'The Complete Yachtmaster','https://drive.google.com/file/d/1U_XdSanblXYnLqKzVCXpy8fC15xTmEd0/view','https://cdn.shopify.com/s/files/1/0090/5072/products/the-complete-yachtmaster-10th-edition-37075443384565.jpg?v=1658484843','2023-07-04 22:55:38','is a comprehensive guidebook that serves as a complete reference for individuals interested in becoming competent sailors or achieving the prestigious Yachtmaster certification. Written by experienced sailors and instructors, the book covers all aspects of sailing, navigation, seamanship, and boat handling required for both recreational cruising and professional yachtmaster qualifications.'),
(45,42,'Aquaculture Microbiology and Biotechnology','https://drive.google.com/file/d/1g0zXvwxaUZQ4SrS10dFrHMYTXuAQ8-Uw/view','https://images.routledge.com/common/jackets/crclarge/978113811/9781138115224.jpg','2023-07-04 22:57:57','is a field of study that focuses on the application of microbiology and biotechnology principles in the context of aquaculture, which involves the farming and cultivation of aquatic organisms such as fish, crustaceans, mollusks, and algae.'),
(47,42,'Environmental Monitoring and Characterization','https://drive.google.com/file/d/1kHVgIegg2f7zKvLw6EW1CbJKz5pp108C/view','https://ars.els-cdn.com/content/image/3-s2.0-B9780120644773X50000-cov200h.gif','2023-07-04 23:01:00','is a scientific process that involves the systematic collection, analysis, and interpretation of data to assess and understand the condition and quality of the environment. It aims to gather information about various environmental parameters, such as air quality, water quality, soil composition, biodiversity, and ecological health, to monitor changes over time, identify potential environmental issues, and inform decision-making processes.'),
(48,40,'w','w','libraryact/defoult.png','2023-07-06 14:37:13','w'),
(49,40,'w','w','libraryact/defoult.png','2023-07-06 14:37:41','w'),
(50,40,'w','w','libraryact/defoult.png','2023-07-06 14:37:41','w'),
(51,39,'mikol','mikol','libraryact/defoult.png','2023-07-06 14:53:05','mikol');

/*Table structure for table `ebook_cat` */

DROP TABLE IF EXISTS `ebook_cat`;

CREATE TABLE `ebook_cat` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ebook_cat` */

insert  into `ebook_cat`(`catID`,`catname`,`description`,`imageurl`) values 
(39,'English Language and Literature','English Language and Literature is a field of study that encompasses the study of the English language, its structure, and its use in various forms of communication, as well as the analysis and interpretation of literary works written in English.','https://rachelbustin.com/wp-content/uploads/2021/11/The-Importance-of-English-Literature-in-Education.jpg'),
(40,'Information Technologyss','Information Technology (IT) is a field that deals with the use, development, and management of computer systems, software, networks, and electronic information. It encompasses a wide range of technologies, practices, and applications that enable the storage, retrieval, transmission, and processing of data.','https://storage.googleapis.com/bukas-website-v3-prd/website_v3/images/Article_Image_College_Courses_x_Computer_and_I.width-800.png'),
(41,'Mathematics','Mathematics is an area of knowledge that includes the topics of numbers, formulas and related structures, shapes and the spaces in which they are contained, and quantities and their changes.','https://images.theconversation.com/files/139426/original/image-20160927-14593-1rf92dt.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop'),
(42,'Forestry','Forestry is the science and craft of creating, managing, planting, using, conserving and repairing forests and woodlands for associated resources for human and environmental benefits.','https://d1g9yur4m4naub.cloudfront.net/images/Article_Images/ImageForArticle_928_16649821477809450.jpg'),
(43,'Fisheries','It aims to develop skills in aquaculture, capture fisheries, post-harvest fisheries, aquatic ecology and management, and other fisheries-related fields.','https://cache.careers360.mobi/media/presets/860X430/article_images/2021/11/30/fisheries-courses-after-12th.webp');

/*Table structure for table `journal` */

DROP TABLE IF EXISTS `journal`;

CREATE TABLE `journal` (
  `journalID` int(11) NOT NULL AUTO_INCREMENT,
  `journalname` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `url` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `dateposted` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`journalID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `journal` */

insert  into `journal`(`journalID`,`journalname`,`description`,`url`,`imageurl`,`dateposted`) values 
(26,'Inter Journal of Modern Education and Computer Science','The International Journal of Modern Education and Computer Science (IJMECS) is a scholarly journal that focuses on the latest research and advancements in the fields of modern education and computer science. It provides a platform for academics, researchers, and professionals to exchange knowledge, ideas, and innovations in these interdisciplinary areas.','https://www.ccsenet.org/journal/index.php/elt','https://th.bing.com/th/id/OIP.ocRMF4phtqnvtUTj4yQ2VwHaKe?pid=ImgDet&rs=1','2023-07-06 10:12:15'),
(27,'Electronic Journals for Science and Computer Science','Electronic journals for science and computer science are online publications that focus on disseminating research and knowledge in the fields of science and computer science. These journals provide a platform for researchers, academics, and professionals to share their findings, theories, and advancements with a global audience.','https://www.mecs-press.org/ijmecs/','https://th.bing.com/th/id/R.08da0821d8ab913c52efdebb9c602a96?rik=RokLtgpbaTPXog&riu=http%3a%2f%2fjournals.agh.edu.pl%2fpublic%2fjournals%2f4%2fcomputer.jpg&ehk=bRBjTxsOZWmasb5ji6mItkM7nCQDO8wHIQvK5QQida8%3d&risl=&pid=ImgRaw&r=0','2023-07-06 10:13:29'),
(28,'International Education Studies','International Education Studies is an academic journal that focuses on research and scholarly articles related to various aspects of education with an international perspective. The journal aims to promote cross-cultural understanding, educational exchange, and the exploration of educational practices and policies from a global context.','https://www.ccsenet.org/journal/index.php/ies','https://th.bing.com/th/id/OIP.a3zzh6pyymKyPv91nzr_JgHaE8?pid=ImgDet&rs=1','2023-07-06 10:15:30'),
(29,'Journal of Physical Education and Sports','The Journal of Physical Education and Sports is a scholarly journal that focuses on research and advancements in the field of physical education, sports science, and related disciplines. The journal provides a platform for researchers, educators, coaches, and practitioners to share their findings, theories, and practical experiences related to physical education, sports training, sports medicine, and exercise science.','http://efsupit.ro/','https://th.bing.com/th/id/OIP.Kk3QtJujjKdNStT4aR0ymwHaKe?w=196&h=277&c=7&r=0&o=5&dpr=1.5&pid=1.7','2023-07-06 10:16:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
