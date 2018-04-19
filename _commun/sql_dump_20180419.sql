/*
SQLyog Community v12.5.1 (64 bit)
MySQL - 5.7.21-0ubuntu0.16.04.1 : Database - bsp_repo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bsp_repo` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bsp_repo`;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(150) NOT NULL,
  `content` longtext,
  `enabled` smallint(6) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `articles` */

insert  into `articles`(`id`,`slug`,`content`,`enabled`) values 
(1,'adresse','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Coordonnées\"\r\n        }\r\n    ],\r\n    \"name\": \"Business & Strategy Partners\",\r\n    \"adresse\": {\r\n        \"rue\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"12, rue Louis Courtois de Viçose\"\r\n            }\r\n        ],\r\n        \"batiment\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Les Arches - Bâtiment 3\"\r\n            }\r\n        ],\r\n        \"cp\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"31100\"\r\n            }\r\n        ],\r\n        \"ville\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Toulouse\"\r\n            }\r\n        ]\r\n    },\r\n    \"telephone\": {\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Mobile\"\r\n            }\r\n        ],\r\n        \"value\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"06.13.06.87.34\"\r\n            }\r\n        ]\r\n    },\r\n    \"fixe\": {\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Bureau\"\r\n            }\r\n        ],\r\n        \"value\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"09.54.92.72.97\"\r\n            }\r\n        ]\r\n    },\r\n   \"mail\": {\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Mail\"\r\n            }\r\n        ],\r\n        \"legende\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Contact\"\r\n            }\r\n        ],\r\n        \"value\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"contact@business-strategy-partners.com\"\r\n            }\r\n        ]\r\n    },\r\n    \r\n    \"facebook\": {\r\n	\"icon\": \"facebook.png\",\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Suivez B&SP sur Facebook\"\r\n            }\r\n        ],\r\n	\"link\": \"https://www.facebook.com/BSPartnersToulouse/?fref=ts\"\r\n    }\r\n}',1),
(2,'about','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"<span>Business</span> & Strategy Partners\"\r\n        }\r\n    ],\r\n    \"subtitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"La solution globale pour la transformation digitale de votre entreprise.\"\r\n        }\r\n    ],\r\n    \"accroche\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Business Strategy Partners est une start-up Toulousaine hébergée en pépinière d\'entreprises, spécialisée dans la création, le développement et la commercialisation d\'applications mobiles et web multi-plateformes.<br />Portée par une spécialiste du commerce, accompagnée par un ensemble de profils complémentaires techniques, community manager, Business & Strategy Partners est une société qui allie souplesse, exigence et agilité dans la mise en oeuvre de toutes les dimensions de vos projets de développements digitaux.\"\r\n        }\r\n    ],\r\n    \"button\":{\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Contactez-nous\"\r\n            }\r\n        ],\r\n        \"link\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"/Contact\"\r\n            }\r\n        ]\r\n    },\r\n    \"cssClass\": \"about\",\r\n    \"icon\": \"globe\"\r\n}',1),
(3,'appli','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"De <span>A</span> comme Appli à <span>Z</span> comme Zoning\"\r\n        }\r\n    ],\r\n    \"subtitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Une équipe d\'experts au service de votre stratégie digitale\"\r\n        }\r\n    ],\r\n    \"accroche\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"De <span>A</span> comme Appli jusqu\'à <span>Z</span> comme Zoning, B&SP vous accompagne dans votre projet de transformation digitale.\"\r\n        }\r\n    ],\r\n    \"button\":{\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Contactez-nous\"\r\n            }\r\n        ],\r\n        \"link\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"/Contact\"\r\n            }\r\n        ]\r\n    },\r\n    \"cssClass\": \"appli\",\r\n    \"icon\": \"star\"\r\n}',1),
(4,'agilite','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Agilité, souplesse, scalabilité\"\r\n        }\r\n    ],\r\n    \"subtitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Une approche agile, souple et complète\"\r\n        }\r\n    ],\r\n    \"accroche\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Accélerer le \\\"time to market\\\", concevoir les projets de manière agile et avoir une approche Produit plutôt qu\'une approche Projet est une réponse pratique et pragmatique aux écueils inhérents aux projets digitaux.\"\r\n        }\r\n    ],\r\n    \"button\":{\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Contactez-nous\"\r\n            }\r\n        ],\r\n        \"link\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"/Contact\"\r\n            }\r\n        ]\r\n    },\r\n    \"cssClass\": \"agilite\",\r\n    \"icon\": \"hand-right\"\r\n}',1),
(5,'contact','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Valérie Aubert\"\r\n        }\r\n    ],\r\n    \"subtitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"CEO - Directrice Opérationnelle et Commerciale\"\r\n        }\r\n    ],\r\n    \"email\":{\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Direction\"\r\n            }\r\n        ],\r\n        \"link\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"valerie.aubert@business-strategy-partners.com\"\r\n            }\r\n        ]\r\n    },\r\n    \"linkedin\":{\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"LinkedIn\"\r\n            }\r\n        ],\r\n        \r\n        \"link\": \"https://linkedin.com/in/valérie-aubert-4a33b4105\",\r\n        \"icon\": \"In-White-21px-R.png\"\r\n\r\n    },\r\n    \"viadeo\":{\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Viadeo\"\r\n            }\r\n        ],\r\n        \r\n        \"link\": \"http://www.viadeo.com/p/0021pkzu8xd0fzpi\",\r\n        \"icon\": \"viadeo-original.png\"\r\n\r\n    },\r\n    \"image\": \"ceo.png\"\r\n}',1);

/*Table structure for table `articletocategories` */

DROP TABLE IF EXISTS `articletocategories`;

CREATE TABLE `articletocategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT '1',
  `articles_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `articletocategories` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(75) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `route` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `enabled` smallint(6) DEFAULT '1',
  `parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`id`,`slug`,`created_at`,`updated_at`,`route`,`content`,`enabled`,`parent`) values 
(1,'accueil','2017-07-28 16:17:28','0000-00-00 00:00:00','bsp','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Stratégie Commerciale Digitale et Mobile\"\r\n        }\r\n    ],\r\n    \"subtitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Le partenaire de votre stratégie commerciale numérique, 2.0\"\r\n        }\r\n    ],\r\n    \"pagetitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Le partenaire de votre stratégie commerciale digitale\"\r\n        }\r\n    ],\r\n    \"image\": \"bsp.png\",\r\n    \"sitemap\": true\r\n}',0,0),
(2,'dev-crea','2017-07-31 14:28:49','0000-00-00 00:00:00','devcrea','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"<em>Développement</em>, création de <em>solutions internet</em>\"\r\n        }\r\n    ],\r\n    \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Solutions IT\"\r\n        }\r\n    ],\r\n    \"pagetitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Création et développement de solutions internet\"\r\n        }\r\n    ],\r\n    \"abstract\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"<h2>Des solutions mobiles pour tous</h2><p>Blah blah blah</p>\"\r\n        }\r\n    ],\r\n    \"image\": \"mockup_soappli.jpg\",\r\n    \"sitemap\": true\r\n}',1,0),
(3,'accompagnement','2017-07-28 15:07:51','0000-00-00 00:00:00','accompagnement','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Accompagnement, Conseil en Stratégie Commerciale Digitale\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Conseil\"\r\n        }\r\n    ],\r\n    \"abstract\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"<h2>Une offre de consulting adaptée</h2><p>Blah blah blah</p>\"\r\n        }\r\n    ],\r\n    \"image\": \"slider-img1.jpg\",\r\n    \"sitemap\": true\r\n}',1,0),
(4,'formation','2017-07-31 16:13:32','0000-00-00 00:00:00','formation','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Offre de formations\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Formations sur mesure\"\r\n        }\r\n    ],\r\n    \"abstract\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"<h2>Formations sur mesure</h2><p>Blah blah blah</p>\"\r\n        }\r\n    ],\r\n    \"image\": \"convivialite.jpg\",\r\n    \"sitemap\": true\r\n}',1,0),
(7,'mobile','2017-12-16 13:37:49','0000-00-00 00:00:00','solutions/mobiles','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Applications mobiles\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Solutions mobiles\"\r\n        }\r\n    ],\r\n    \"image\": \"mobile.png\",\r\n    \"sitemap\": true\r\n}',1,2),
(8,'webapp','2017-03-22 18:52:19','0000-00-00 00:00:00','webapp','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Applications Web\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Solutions Web\"\r\n        }\r\n    ],\r\n    \"image\": \"web.png\",\r\n    \"sitemap\": true\r\n}',1,2),
(9,'social-selling','2017-03-22 18:52:37','0000-00-00 00:00:00','social','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Social Selling\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Social Selling\"\r\n        }\r\n    ],\r\n    \"image\": \"social.png\",\r\n    \"sitemap\": true\r\n}',1,2),
(10,'consulting','2017-03-22 18:52:58','0000-00-00 00:00:00','consulting','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Consulting\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Consulting, Audit\"\r\n        }\r\n    ],\r\n    \"image\": \"consulting.png\",\r\n    \"sitemap\": true\r\n}',1,3),
(11,'gestion-projet','2017-03-22 18:53:18','0000-00-00 00:00:00','gprojet','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Gestion de projet\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Info gérance\"\r\n        }\r\n    ],\r\n    \"image\": \"projet.png\",\r\n    \"sitemap\": true\r\n}',1,3),
(12,'audit','2017-03-22 18:53:33','0000-00-00 00:00:00','audit','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Audit\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Audit\"\r\n        }\r\n    ],\r\n    \"image\": \"audit.png\",\r\n    \"sitemap\": true\r\n}',1,3),
(13,'eco-numerique','2017-03-22 18:53:49','0000-00-00 00:00:00','econum','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Economie Numérique\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Economie Numérique\"\r\n        }\r\n    ],\r\n    \"image\": \"numerique.png\",\r\n    \"sitemap\": true\r\n}',1,4),
(14,'technologies','2017-03-22 18:54:05','0000-00-00 00:00:00','techno','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Technologies\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Technologies\"\r\n        }\r\n    ],\r\n    \"image\": \"technologie.png\",\r\n    \"sitemap\": true\r\n}',1,4),
(15,'logiciels','2017-03-22 18:54:24','0000-00-00 00:00:00','logiciel','{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Logiciels\"\r\n        }\r\n    ],\r\n   \"menutitle\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n	    \"content\": \"Logiciels\"\r\n        }\r\n    ],\r\n    \"image\": \"logiciel.png\",\r\n    \"sitemap\": true\r\n}',1,4);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `region` varchar(75) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`slug`,`region`,`content`) values 
(1,'main','_main_menu','{\r\n    \"title\":[\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Principal\"\r\n        }\r\n    ]\r\n}');

/*Table structure for table `menutocategories` */

DROP TABLE IF EXISTS `menutocategories`;

CREATE TABLE `menutocategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` smallint(6) DEFAULT '1',
  `categories_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `menutocategories` */

insert  into `menutocategories`(`id`,`order`,`categories_id`,`menu_id`) values 
(1,1,1,1),
(2,1,2,1),
(3,1,3,1),
(4,1,4,1);

/*Table structure for table `site` */

DROP TABLE IF EXISTS `site`;

CREATE TABLE `site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext COMMENT 'Structure JSON pour le stockage des informations',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `site` */

insert  into `site`(`id`,`content`) values 
(1,'{\r\n    \"title\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Stratégie Digitale et Mobile\"\r\n        }\r\n    ],\r\n    \"slogan\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"<em>Partenaire</em> de votre <em>stratégie digitale</em>\"\r\n        }\r\n    ],\r\n    \"accroche\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Et si Internet vous aidait à trouver des <em>Prospects</em>, en faire des <em>Clients</em> et développer votre <em>business</em>\"\r\n        }\r\n    ],\r\n    \"description\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": \"Business Strategy Partners vous accompagne dans la transformation digitale de votre entreprise et fait de vos outils numériques une force commerciale.\"\r\n        }\r\n    ],\r\n    \"keywords\": [\r\n        {\r\n            \"language\": \"fr-FR\",\r\n            \"content\": [\"stratégie commerciale\",\"économie numérique\",\"outils numériques\",\"transformation digitale\",\"accompagnement, audit et consulting\"]\r\n        }\r\n    ],\r\n   \"telephone\": {\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Tél.\"\r\n            }\r\n        ],\r\n        \"value\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"(+33)6 13 06 87 34\"\r\n            }\r\n        ]\r\n    },\r\n    \"logo\": \"logo.png\",\r\n    \"badge\": \"identite.png\",\r\n    \"icons\": [\r\n        {\r\n            \"platform\": \"std\",\r\n            \"content\": \"favicon.ico\"\r\n        },\r\n        {\r\n            \"platform\": \"apple\",\r\n            \"content\": \"apple_touch_icon\"\r\n        }\r\n    ],\r\n   \"mail\": {\r\n        \"label\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Mail\"\r\n            }\r\n        ],\r\n        \"legende\": [\r\n            {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"Contact\"\r\n            }\r\n        ],\r\n        \"value\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"contact@business-strategy-partners.com\"\r\n            }\r\n        ],\r\n        \"subject\": [\r\n           {\r\n                \"language\": \"fr-FR\",\r\n                \"content\": \"BSP - Demande de contact\"\r\n            }\r\n        ]\r\n    },\r\n    \"open\": true\r\n}');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
