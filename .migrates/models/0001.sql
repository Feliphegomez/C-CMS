-- --------------------------------------------------------
-- Host:                         181.129.103.142
-- Versión del servidor:         5.7.28-0ubuntu0.18.04.4 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla admin_mv_pro.accounts
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `economic_activity` int(11) DEFAULT NULL,
  `identification_type` int(11) NOT NULL,
  `identification_number` varchar(50) NOT NULL,
  `names` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `create` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `email_key` (`email`),
  KEY `FK_users_identifications_types` (`identification_type`),
  KEY `FK_accounts_accounts_types` (`type`),
  KEY `FK_accounts_users` (`create_by`),
  KEY `FK_accounts_users_2` (`update_by`),
  KEY `FK_accounts_addresses` (`address`),
  KEY `FK_accounts_economic_activities` (`economic_activity`),
  CONSTRAINT `FK_accounts_accounts_types` FOREIGN KEY (`type`) REFERENCES `accounts_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_accounts_addresses` FOREIGN KEY (`address`) REFERENCES `addresses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_accounts_economic_activities` FOREIGN KEY (`economic_activity`) REFERENCES `economic_activities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_accounts_users` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_accounts_users_2` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`identification_type`) REFERENCES `identifications_types` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.accounts_contacts
DROP TABLE IF EXISTS `accounts_contacts`;
CREATE TABLE IF NOT EXISTS `accounts_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_accounts_contacts_accounts` (`account`),
  KEY `FK_accounts_contacts_contacts` (`contact`),
  KEY `FK_accounts_contacts_contacts_types` (`type`),
  CONSTRAINT `FK_accounts_contacts_accounts` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_accounts_contacts_contacts` FOREIGN KEY (`contact`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_accounts_contacts_contacts_types` FOREIGN KEY (`type`) REFERENCES `contacts_types` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.accounts_headquarters
DROP TABLE IF EXISTS `accounts_headquarters`;
CREATE TABLE IF NOT EXISTS `accounts_headquarters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `account` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_accounts_headquarters_addresses` (`address`),
  KEY `FK_accounts_headquarters_accounts` (`account`),
  CONSTRAINT `FK_accounts_headquarters_accounts` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_accounts_headquarters_addresses` FOREIGN KEY (`address`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.accounts_types
DROP TABLE IF EXISTS `accounts_types`;
CREATE TABLE IF NOT EXISTS `accounts_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.addresses
DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `via_principal` int(11) DEFAULT NULL,
  `via_principal_number` varchar(10) NOT NULL,
  `via_principal_letter` varchar(10) NOT NULL,
  `via_principal_quadrant` varchar(10) NOT NULL,
  `via_secondary_number` varchar(10) NOT NULL,
  `via_secondary_letter` varchar(10) NOT NULL,
  `via_secondary_quadrant` varchar(10) NOT NULL,
  `via_end_number` varchar(10) NOT NULL,
  `via_end_extra` varchar(500) NOT NULL,
  `minsize` varchar(500) NOT NULL,
  `complete` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_addresses_geo_types_vias` (`via_principal`),
  KEY `FK_addresses_geo_citys` (`city`),
  KEY `FK_addresses_geo_departments` (`department`),
  CONSTRAINT `FK_addresses_geo_citys` FOREIGN KEY (`city`) REFERENCES `geo_citys` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_addresses_geo_departments` FOREIGN KEY (`department`) REFERENCES `geo_departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_addresses_geo_types_vias` FOREIGN KEY (`via_principal`) REFERENCES `geo_types_vias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.attachments
DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `targetPath` varchar(250) NOT NULL,
  `targetFile` varchar(250) NOT NULL,
  `path_short` varchar(250) NOT NULL,
  `filesize` int(11) DEFAULT NULL,
  `filetype` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.budgets
DROP TABLE IF EXISTS `budgets`;
CREATE TABLE IF NOT EXISTS `budgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `objective` varchar(500) NOT NULL,
  `total` float NOT NULL DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.budgets_history
DROP TABLE IF EXISTS `budgets_history`;
CREATE TABLE IF NOT EXISTS `budgets_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `budget` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `operation` varchar(50) NOT NULL,
  `total` float NOT NULL DEFAULT '0',
  `newtotal` float NOT NULL DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_budgets_history_budgets` (`budget`),
  CONSTRAINT `FK_budgets_history_budgets` FOREIGN KEY (`budget`) REFERENCES `budgets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.candidates
DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identification_type` int(11) DEFAULT NULL,
  `identification_number` varchar(50) NOT NULL,
  `names` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `avatar` int(11) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `create` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `email_key` (`email`),
  KEY `FK_users_identifications_types` (`identification_type`),
  KEY `FK_users_geo_departments` (`department`),
  KEY `FK_users_geo_citys` (`city`),
  KEY `FK_candidates_pictures` (`avatar`),
  KEY `FK_candidates_status_marital` (`marital_status`),
  CONSTRAINT `FK_candidates_pictures` FOREIGN KEY (`avatar`) REFERENCES `pictures` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_candidates_status_marital` FOREIGN KEY (`marital_status`) REFERENCES `status_marital` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`city`) REFERENCES `geo_citys` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `candidates_ibfk_2` FOREIGN KEY (`department`) REFERENCES `geo_departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `candidates_ibfk_3` FOREIGN KEY (`identification_type`) REFERENCES `identifications_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.candidates_experience
DROP TABLE IF EXISTS `candidates_experience`;
CREATE TABLE IF NOT EXISTS `candidates_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL,
  `business` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date DEFAULT NULL,
  `functions` varchar(1000) DEFAULT 'Sin informacion',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_candidates_experience_candidates` (`candidate`),
  CONSTRAINT `FK_candidates_experience_candidates` FOREIGN KEY (`candidate`) REFERENCES `candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.candidates_studies
DROP TABLE IF EXISTS `candidates_studies`;
CREATE TABLE IF NOT EXISTS `candidates_studies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_candidates_studies_candidates` (`candidate`),
  KEY `FK_candidates_studies_study_levels` (`level`),
  KEY `FK_candidates_studies_study_status` (`status`),
  CONSTRAINT `FK_candidates_studies_candidates` FOREIGN KEY (`candidate`) REFERENCES `candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_candidates_studies_study_levels` FOREIGN KEY (`level`) REFERENCES `study_levels` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_candidates_studies_study_status` FOREIGN KEY (`status`) REFERENCES `study_status` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identification_type` int(11) DEFAULT NULL,
  `identification_number` varchar(50) NOT NULL,
  `names` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `create` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `email_key` (`email`),
  KEY `FK_users_identifications_types` (`identification_type`),
  KEY `FK_users_geo_departments` (`department`),
  KEY `FK_users_geo_citys` (`city`),
  CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`city`) REFERENCES `geo_citys` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`department`) REFERENCES `geo_departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `contacts_ibfk_3` FOREIGN KEY (`identification_type`) REFERENCES `identifications_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.contacts_types
DROP TABLE IF EXISTS `contacts_types`;
CREATE TABLE IF NOT EXISTS `contacts_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.economic_activities
DROP TABLE IF EXISTS `economic_activities`;
CREATE TABLE IF NOT EXISTS `economic_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `group` varchar(50) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `name` varchar(350) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_economic_activities_economic_activities_sessions` (`session`),
  KEY `FK_economic_activities_economic_activities_divitions` (`division`),
  CONSTRAINT `FK_economic_activities_economic_activities_divitions` FOREIGN KEY (`division`) REFERENCES `economic_activities_divitions` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_economic_activities_economic_activities_sessions` FOREIGN KEY (`session`) REFERENCES `economic_activities_sessions` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=688 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.economic_activities_divitions
DROP TABLE IF EXISTS `economic_activities_divitions`;
CREATE TABLE IF NOT EXISTS `economic_activities_divitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.economic_activities_sessions
DROP TABLE IF EXISTS `economic_activities_sessions`;
CREATE TABLE IF NOT EXISTS `economic_activities_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `title` varchar(350) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emails
DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `box` int(11) DEFAULT NULL,
  `message_id` mediumtext,
  `uid` int(11) DEFAULT NULL,
  `status` mediumtext,
  `subject` mediumtext,
  `from` mediumtext,
  `from_email` mediumtext,
  `to` mediumtext,
  `date` mediumtext,
  `message` longtext,
  `size` mediumtext,
  `msgno` int(11) DEFAULT NULL,
  `recent` int(1) DEFAULT '0',
  `flagged` int(1) DEFAULT '0',
  `answered` int(1) DEFAULT '0',
  `deleted` int(1) DEFAULT '0',
  `seen` int(1) DEFAULT '0',
  `draft` int(1) DEFAULT '1',
  `send` int(1) DEFAULT '0',
  `attachments` mediumtext,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emails_attachments
DROP TABLE IF EXISTS `emails_attachments`;
CREATE TABLE IF NOT EXISTS `emails_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` int(11) NOT NULL,
  `attachment` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_emails_attachments_emails` (`email`),
  KEY `FK_emails_attachments_attachments` (`attachment`),
  CONSTRAINT `FK_emails_attachments_attachments` FOREIGN KEY (`attachment`) REFERENCES `attachments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_emails_attachments_emails` FOREIGN KEY (`email`) REFERENCES `emails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emails_boxes
DROP TABLE IF EXISTS `emails_boxes`;
CREATE TABLE IF NOT EXISTS `emails_boxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(150) NOT NULL,
  `host` varchar(150) NOT NULL,
  `port` varchar(150) NOT NULL,
  `user` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `args_add` varchar(150) NOT NULL,
  `last_sync` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `actived` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emails_users
DROP TABLE IF EXISTS `emails_users`;
CREATE TABLE IF NOT EXISTS `emails_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `send_enabled` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_users_mails_users` (`user`),
  KEY `FK_users_mails_mails` (`email`),
  CONSTRAINT `FK_users_mails_mails` FOREIGN KEY (`email`) REFERENCES `emails_boxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_users_mails_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.events
DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `allDay` int(1) DEFAULT '0',
  `resource` varchar(15) DEFAULT 'R1',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `type` int(11) DEFAULT NULL,
  `request` int(11) DEFAULT NULL,
  `notes` text,
  `complete` int(1) DEFAULT '0',
  `completed` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_update_by` int(11) DEFAULT NULL,
  `last_updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addresses` varchar(500) DEFAULT 'Sin direcciones',
  `points_ref` varchar(500) DEFAULT '-',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_calendar_requests` (`request`),
  KEY `FK_events_types_events` (`type`),
  KEY `FK_events_users` (`create_by`),
  KEY `FK_events_users_2` (`last_update_by`),
  CONSTRAINT `FK_calendar_requests` FOREIGN KEY (`request`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_events_events_types` FOREIGN KEY (`type`) REFERENCES `events_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_events_users` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_events_users_2` FOREIGN KEY (`last_update_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.events_activity
DROP TABLE IF EXISTS `events_activity`;
CREATE TABLE IF NOT EXISTS `events_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `info` json NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_events_activity_events` (`event`),
  KEY `FK_events_activity_users` (`user`),
  CONSTRAINT `FK_events_activity_events` FOREIGN KEY (`event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_events_activity_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.events_tools
DROP TABLE IF EXISTS `events_tools`;
CREATE TABLE IF NOT EXISTS `events_tools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_events_tools_events` (`event`),
  KEY `FK_events_tools_users` (`create_by`),
  KEY `FK_events_tools_users_2` (`update_by`),
  CONSTRAINT `FK_events_tools_events` FOREIGN KEY (`event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_events_tools_users` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_events_tools_users_2` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.events_types
DROP TABLE IF EXISTS `events_types`;
CREATE TABLE IF NOT EXISTS `events_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `color_background` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden
DROP TABLE IF EXISTS `garden`;
CREATE TABLE IF NOT EXISTS `garden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_comercial` varchar(250) NOT NULL,
  `name_comun` varchar(250) DEFAULT NULL,
  `name_botanico` varchar(250) DEFAULT NULL COMMENT '(especie de género)',
  `picture` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `attendance` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Columna 1` (`id`),
  KEY `FK_garden_pictures` (`picture`),
  CONSTRAINT `FK_garden_pictures` FOREIGN KEY (`picture`) REFERENCES `pictures` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_attributes
DROP TABLE IF EXISTS `garden_attributes`;
CREATE TABLE IF NOT EXISTS `garden_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garden` int(11) NOT NULL,
  `filter` int(11) NOT NULL,
  `attribute` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_garden_inputs_options_garden_inputs` (`filter`),
  KEY `FK_garden_attributes_garden` (`garden`),
  KEY `FK_garden_attributes_garden_filters_attributes` (`attribute`),
  CONSTRAINT `FK_garden_attributes_garden` FOREIGN KEY (`garden`) REFERENCES `garden` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_garden_attributes_garden_filters_attributes` FOREIGN KEY (`attribute`) REFERENCES `garden_filters_attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_garden_inputs_options_garden_inputs` FOREIGN KEY (`filter`) REFERENCES `garden_filters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_comun_names
DROP TABLE IF EXISTS `garden_comun_names`;
CREATE TABLE IF NOT EXISTS `garden_comun_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garden` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_garden_comun_names_garden` (`garden`),
  CONSTRAINT `FK_garden_comun_names_garden` FOREIGN KEY (`garden`) REFERENCES `garden` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_filters
DROP TABLE IF EXISTS `garden_filters`;
CREATE TABLE IF NOT EXISTS `garden_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'none',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_filters_attributes
DROP TABLE IF EXISTS `garden_filters_attributes`;
CREATE TABLE IF NOT EXISTS `garden_filters_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filter` int(11) NOT NULL,
  `text` varchar(250) NOT NULL,
  `more` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_garden_inputs_options_garden_inputs` (`filter`),
  CONSTRAINT `FK_garden_filters_v_garden_fields` FOREIGN KEY (`filter`) REFERENCES `garden_filters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_gallery
DROP TABLE IF EXISTS `garden_gallery`;
CREATE TABLE IF NOT EXISTS `garden_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garden` int(11) NOT NULL,
  `picture` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_garden_gallery_garden` (`garden`),
  KEY `FK_garden_gallery_pictures` (`picture`),
  CONSTRAINT `FK_garden_gallery_garden` FOREIGN KEY (`garden`) REFERENCES `garden` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_garden_gallery_pictures` FOREIGN KEY (`picture`) REFERENCES `pictures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.geo_citys
DROP TABLE IF EXISTS `geo_citys`;
CREATE TABLE IF NOT EXISTS `geo_citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `department` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departamento_id` (`department`),
  KEY `id` (`id`),
  CONSTRAINT `FK_geo_citys_geo_departments` FOREIGN KEY (`department`) REFERENCES `geo_departments` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1101 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.geo_departments
DROP TABLE IF EXISTS `geo_departments`;
CREATE TABLE IF NOT EXISTS `geo_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.geo_types_quadrants
DROP TABLE IF EXISTS `geo_types_quadrants`;
CREATE TABLE IF NOT EXISTS `geo_types_quadrants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.geo_types_vias
DROP TABLE IF EXISTS `geo_types_vias`;
CREATE TABLE IF NOT EXISTS `geo_types_vias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.identifications_types
DROP TABLE IF EXISTS `identifications_types`;
CREATE TABLE IF NOT EXISTS `identifications_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.media
DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `path_full` text NOT NULL,
  `path_short` varchar(250) NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_media_users` (`create_by`),
  CONSTRAINT `FK_media_users` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.media_events
DROP TABLE IF EXISTS `media_events`;
CREATE TABLE IF NOT EXISTS `media_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_media_users_media` (`media`),
  KEY `FK_media_users_users` (`event`),
  CONSTRAINT `FK_media_events_events` FOREIGN KEY (`event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_media_events_media` FOREIGN KEY (`media`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.media_users
DROP TABLE IF EXISTS `media_users`;
CREATE TABLE IF NOT EXISTS `media_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_media_users_media` (`media`),
  KEY `FK_media_users_users` (`user`),
  CONSTRAINT `FK_media_users_media` FOREIGN KEY (`media`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_media_users_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.meditions
DROP TABLE IF EXISTS `meditions`;
CREATE TABLE IF NOT EXISTS `meditions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `order_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.menus_items
DROP TABLE IF EXISTS `menus_items`;
CREATE TABLE IF NOT EXISTS `menus_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` int(11) NOT NULL,
  `title` varchar(150) DEFAULT '',
  `parent` int(11) DEFAULT '0',
  `tag_id` varchar(150) DEFAULT NULL,
  `tag_class` json DEFAULT NULL,
  `tag_href` varchar(250) DEFAULT NULL,
  `tag_href_parms` json DEFAULT NULL,
  `tag_params` json DEFAULT NULL,
  `icon` varchar(50) DEFAULT '',
  `public` int(1) DEFAULT '0',
  `alls` int(1) DEFAULT '0',
  `guest` int(1) DEFAULT '0',
  `permission` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_nodes_items_menus` (`menu`),
  KEY `permission` (`permission`),
  KEY `tag_href` (`tag_href`),
  CONSTRAINT `menus_items_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11009 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_permissions_permissions_group` (`group`),
  KEY `FK_permissions_permissions` (`permission`),
  CONSTRAINT `FK_permissions_permissions` FOREIGN KEY (`permission`) REFERENCES `permissions_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_permissions_permissions_group` FOREIGN KEY (`group`) REFERENCES `permissions_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.permissions_group
DROP TABLE IF EXISTS `permissions_group`;
CREATE TABLE IF NOT EXISTS `permissions_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.permissions_items
DROP TABLE IF EXISTS `permissions_items`;
CREATE TABLE IF NOT EXISTS `permissions_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`),
  KEY `id` (`id`),
  KEY `tag KEY` (`tag`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.pictures
DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `size` int(32) NOT NULL,
  `data` mediumblob NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests
DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `description` varchar(1000) NOT NULL DEFAULT '',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_requests_accounts` (`account`),
  KEY `FK_requests_users` (`create_by`),
  KEY `FK_requests_users_2` (`update_by`),
  KEY `FK_requests_accounts_contacts` (`contact`),
  KEY `FK_requests_requests_status` (`status`),
  CONSTRAINT `FK_requests_accounts` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_requests_accounts_contacts` FOREIGN KEY (`contact`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_requests_requests_status` FOREIGN KEY (`status`) REFERENCES `requests_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_requests_users` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_requests_users_2` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests_addresses
DROP TABLE IF EXISTS `requests_addresses`;
CREATE TABLE IF NOT EXISTS `requests_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_requests_addresses_requests` (`request`),
  KEY `FK_requests_addresses_addresses` (`address`),
  CONSTRAINT `FK_requests_addresses_addresses` FOREIGN KEY (`address`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_requests_addresses_requests` FOREIGN KEY (`request`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests_contacts
DROP TABLE IF EXISTS `requests_contacts`;
CREATE TABLE IF NOT EXISTS `requests_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) NOT NULL DEFAULT '0',
  `contact` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_requests_contacts_requests` (`request`),
  KEY `FK_requests_contacts_contacts` (`contact`),
  CONSTRAINT `FK_requests_contacts_contacts` FOREIGN KEY (`contact`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_requests_contacts_requests` FOREIGN KEY (`request`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests_services
DROP TABLE IF EXISTS `requests_services`;
CREATE TABLE IF NOT EXISTS `requests_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_requests_services_requests` (`request`),
  KEY `FK_requests_services_services` (`service`),
  CONSTRAINT `FK_requests_services_requests` FOREIGN KEY (`request`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_requests_services_services` FOREIGN KEY (`service`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests_status
DROP TABLE IF EXISTS `requests_status`;
CREATE TABLE IF NOT EXISTS `requests_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `description` varchar(500) NOT NULL,
  `color` varchar(16) NOT NULL,
  `porcentage` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.services
DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `medition` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_services_services_meditions` (`medition`),
  KEY `FK_services_services_categories` (`category`),
  CONSTRAINT `FK_services_services_categories` FOREIGN KEY (`category`) REFERENCES `services_categories` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_services_services_meditions` FOREIGN KEY (`medition`) REFERENCES `meditions` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.services_categories
DROP TABLE IF EXISTS `services_categories`;
CREATE TABLE IF NOT EXISTS `services_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.status_marital
DROP TABLE IF EXISTS `status_marital`;
CREATE TABLE IF NOT EXISTS `status_marital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.study_levels
DROP TABLE IF EXISTS `study_levels`;
CREATE TABLE IF NOT EXISTS `study_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.study_status
DROP TABLE IF EXISTS `study_status`;
CREATE TABLE IF NOT EXISTS `study_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` longtext NOT NULL,
  `identification_type` int(11) DEFAULT NULL,
  `identification_number` varchar(50) DEFAULT NULL,
  `names` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `avatar` int(11) DEFAULT '1',
  `permissions` int(11) DEFAULT NULL,
  `registered` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_connection` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `id` (`id`),
  KEY `FK_username` (`username`),
  KEY `email_key` (`email`),
  KEY `FK_users_pictures` (`avatar`),
  KEY `FK_users_identifications_types` (`identification_type`),
  KEY `FK_users_geo_departments` (`department`),
  KEY `FK_users_geo_citys` (`city`),
  KEY `FK_users_permissions_group` (`permissions`),
  CONSTRAINT `FK_users_geo_citys` FOREIGN KEY (`city`) REFERENCES `geo_citys` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_users_geo_departments` FOREIGN KEY (`department`) REFERENCES `geo_departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_users_identifications_types` FOREIGN KEY (`identification_type`) REFERENCES `identifications_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_users_permissions_group` FOREIGN KEY (`permissions`) REFERENCES `permissions_group` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_users_pictures` FOREIGN KEY (`avatar`) REFERENCES `pictures` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.users_events
DROP TABLE IF EXISTS `users_events`;
CREATE TABLE IF NOT EXISTS `users_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_users_events_users` (`user`),
  KEY `FK_users_events_events` (`event`),
  CONSTRAINT `FK_users_events_events` FOREIGN KEY (`event`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_users_events_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
