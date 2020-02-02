-- --------------------------------------------------------
-- Host:                         181.129.103.142
-- Versión del servidor:         5.7.29-0ubuntu0.18.04.1 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla admin_mv_pro.accounts
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.accounts_contacts
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.accounts_headquarters
CREATE TABLE IF NOT EXISTS `accounts_headquarters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `account` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_accounts_headquarters_addresses` (`address`),
  KEY `FK_accounts_headquarters_accounts` (`account`),
  CONSTRAINT `FK_accounts_headquarters_accounts` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_accounts_headquarters_addresses` FOREIGN KEY (`address`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.accounts_types
CREATE TABLE IF NOT EXISTS `accounts_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `via_principal` int(11) DEFAULT NULL,
  `via_principal_number` varchar(10) CHARACTER SET utf8 NOT NULL,
  `via_principal_letter` varchar(10) CHARACTER SET utf8 NOT NULL,
  `via_principal_quadrant` varchar(10) CHARACTER SET utf8 NOT NULL,
  `via_secondary_number` varchar(10) CHARACTER SET utf8 NOT NULL,
  `via_secondary_letter` varchar(10) CHARACTER SET utf8 NOT NULL,
  `via_secondary_quadrant` varchar(10) CHARACTER SET utf8 NOT NULL,
  `via_end_number` varchar(10) CHARACTER SET utf8 NOT NULL,
  `via_end_extra` varchar(500) CHARACTER SET utf8 NOT NULL,
  `minsize` varchar(500) CHARACTER SET utf8 NOT NULL,
  `complete` varchar(500) CHARACTER SET utf8 NOT NULL,
  `point` point DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_addresses_geo_types_vias` (`via_principal`),
  KEY `FK_addresses_geo_citys` (`city`),
  KEY `FK_addresses_geo_departments` (`department`),
  CONSTRAINT `FK_addresses_geo_citys` FOREIGN KEY (`city`) REFERENCES `geo_citys` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_addresses_geo_departments` FOREIGN KEY (`department`) REFERENCES `geo_departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_addresses_geo_types_vias` FOREIGN KEY (`via_principal`) REFERENCES `geo_types_vias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.attachments
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
) ENGINE=InnoDB AUTO_INCREMENT=631 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.budgets
CREATE TABLE IF NOT EXISTS `budgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `objective` varchar(500) CHARACTER SET utf8 NOT NULL,
  `total` float NOT NULL DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.budgets_history
CREATE TABLE IF NOT EXISTS `budgets_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `budget` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `operation` varchar(50) CHARACTER SET utf8 NOT NULL,
  `total` float NOT NULL DEFAULT '0',
  `newtotal` float NOT NULL DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_budgets_history_budgets` (`budget`),
  CONSTRAINT `FK_budgets_history_budgets` FOREIGN KEY (`budget`) REFERENCES `budgets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.candidates
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
  `avatar` int(11) DEFAULT '168',
  `notes` varchar(2500) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=661 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.candidates_experience
CREATE TABLE IF NOT EXISTS `candidates_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL,
  `business` varchar(250) CHARACTER SET utf8 NOT NULL,
  `position` varchar(250) CHARACTER SET utf8 NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date DEFAULT NULL,
  `functions` varchar(1000) CHARACTER SET utf8 DEFAULT 'Sin informacion',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_candidates_experience_candidates` (`candidate`),
  CONSTRAINT `FK_candidates_experience_candidates` FOREIGN KEY (`candidate`) REFERENCES `candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2428 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.candidates_files
CREATE TABLE IF NOT EXISTS `candidates_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL,
  `media` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_candidates_files_candidates` (`candidate`),
  KEY `FK_candidates_files_media` (`media`),
  CONSTRAINT `FK_candidates_files_candidates` FOREIGN KEY (`candidate`) REFERENCES `candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_candidates_files_media` FOREIGN KEY (`media`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=669 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.candidates_studies
CREATE TABLE IF NOT EXISTS `candidates_studies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=941 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.contacts
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.contacts_types
CREATE TABLE IF NOT EXISTS `contacts_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.contracts
CREATE TABLE IF NOT EXISTS `contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `account` int(11) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_contracts_accounts` (`account`),
  CONSTRAINT `FK_contracts_accounts` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.economic_activities
CREATE TABLE IF NOT EXISTS `economic_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `group` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `class` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(350) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_economic_activities_economic_activities_sessions` (`session`),
  KEY `FK_economic_activities_economic_activities_divitions` (`division`),
  CONSTRAINT `FK_economic_activities_economic_activities_divitions` FOREIGN KEY (`division`) REFERENCES `economic_activities_divitions` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_economic_activities_economic_activities_sessions` FOREIGN KEY (`session`) REFERENCES `economic_activities_sessions` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=688 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.economic_activities_divitions
CREATE TABLE IF NOT EXISTS `economic_activities_divitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.economic_activities_sessions
CREATE TABLE IF NOT EXISTS `economic_activities_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `title` varchar(350) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emails
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
  `message` mediumtext,
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
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emails_attachments
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
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emails_boxes
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emails_users
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identification_type` int(11) DEFAULT NULL,
  `identification_number` varchar(50) NOT NULL,
  `expedition` date NOT NULL,
  `department` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `names` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `status_marital` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `headquarters` int(11) NOT NULL,
  `salary` float DEFAULT NULL,
  `avatar` int(11) DEFAULT '168',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `email_key` (`email`),
  KEY `FK_users_identifications_types` (`identification_type`),
  KEY `FK_users_geo_departments` (`department`),
  KEY `FK_users_geo_citys` (`city`),
  KEY `FK_employees_pictures` (`avatar`),
  KEY `FK_employees_status_marital` (`status_marital`),
  KEY `FK_employees_employee_status` (`status`),
  KEY `FK_employees_employees_areas` (`area`),
  KEY `FK_employees_addresses` (`address`),
  CONSTRAINT `FK_employees_addresses` FOREIGN KEY (`address`) REFERENCES `addresses` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_employees_employee_status` FOREIGN KEY (`status`) REFERENCES `employees_status` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_employees_employees_areas` FOREIGN KEY (`area`) REFERENCES `employees_areas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_employees_pictures` FOREIGN KEY (`avatar`) REFERENCES `pictures` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_employees_status_marital` FOREIGN KEY (`status_marital`) REFERENCES `status_marital` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`city`) REFERENCES `geo_citys` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`department`) REFERENCES `geo_departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`identification_type`) REFERENCES `identifications_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.employees_areas
CREATE TABLE IF NOT EXISTS `employees_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.employees_inv_stocktaking
CREATE TABLE IF NOT EXISTS `employees_inv_stocktaking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headquarter` int(11) NOT NULL,
  `created` date NOT NULL,
  `assigned` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Columna 1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Inventario';

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.employees_status
CREATE TABLE IF NOT EXISTS `employees_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emvarias_contracts
CREATE TABLE IF NOT EXISTS `emvarias_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72437 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emvarias_lots
CREATE TABLE IF NOT EXISTS `emvarias_lots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `microroute_name` varchar(50) NOT NULL,
  `id_ref` varchar(50) DEFAULT NULL,
  `description` text,
  `address_text` text,
  `area_m2` float DEFAULT '0',
  `zone_client` varchar(50) DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`id`),
  KEY `FK_photographic_routes_lots` (`id`),
  KEY `id_ref` (`id_ref`),
  KEY `microroute_name` (`microroute_name`)
) ENGINE=InnoDB AUTO_INCREMENT=1207 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emvarias_microroutes
CREATE TABLE IF NOT EXISTS `emvarias_microroutes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract` int(11) DEFAULT NULL,
  `zone` int(11) DEFAULT '0',
  `name` int(4) unsigned zerofill NOT NULL DEFAULT '0001',
  `repeat` int(11) NOT NULL DEFAULT '1',
  `lot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_emvarias_routes_emvarias_lots` (`lot`),
  KEY `FK_emvarias_microroutes_emvarias_contracts` (`contract`),
  CONSTRAINT `FK_emvarias_microroutes_emvarias_contracts` FOREIGN KEY (`contract`) REFERENCES `emvarias_contracts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_microroutes_emvarias_lots` FOREIGN KEY (`lot`) REFERENCES `emvarias_lots` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1153 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emvarias_reports_photographic
CREATE TABLE IF NOT EXISTS `emvarias_reports_photographic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `type` varchar(1) NOT NULL DEFAULT 'O',
  `group` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `lat` float NOT NULL DEFAULT '0',
  `lng` float NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `file_name` varchar(150) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `file_size` varchar(50) NOT NULL,
  `file_path_full` text NOT NULL,
  `file_path_short` varchar(250) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `create_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_media_users` (`create_by`),
  KEY `FK_emvarias_reports_photographic_files_users` (`updated_by`),
  KEY `FK_emvarias_reports_photographic_photographic_groups` (`group`),
  KEY `FK_emvarias_reports_photographic_photographic_periods` (`period`),
  KEY `FK_emvarias_reports_photographic_files_emvarias_microroutes` (`schedule`),
  CONSTRAINT `FK_emvarias_reports_photographic_files_emvarias_microroutes` FOREIGN KEY (`schedule`) REFERENCES `emvarias_schedule` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_reports_photographic_files_users` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_reports_photographic_photographic_groups` FOREIGN KEY (`group`) REFERENCES `photographic_groups` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_reports_photographic_photographic_periods` FOREIGN KEY (`period`) REFERENCES `photographic_periods` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `emvarias_reports_photographic_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emvarias_schedule
CREATE TABLE IF NOT EXISTS `emvarias_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `microroute` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `date_executed_schedule` date NOT NULL,
  `date_executed_schedule_end` date DEFAULT NULL,
  `time_executed_schedule` time DEFAULT NULL,
  `date_executed` date DEFAULT NULL,
  `time_executed` time DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `time_approved` time DEFAULT NULL,
  `is_executed` int(1) DEFAULT '0',
  `is_approved` int(1) DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(1) NOT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_emvarias_schedule_emvarias_microroutes` (`microroute`),
  KEY `FK_emvarias_schedule_photographic_periods` (`period`),
  KEY `FK_emvarias_schedule_users` (`created_by`),
  KEY `FK_emvarias_schedule_users_2` (`updated_by`),
  KEY `FK_emvarias_schedule_photographic_groups` (`group`),
  CONSTRAINT `FK_emvarias_schedule_emvarias_microroutes` FOREIGN KEY (`microroute`) REFERENCES `emvarias_microroutes` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_schedule_photographic_groups` FOREIGN KEY (`group`) REFERENCES `photographic_groups` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_schedule_photographic_periods` FOREIGN KEY (`period`) REFERENCES `photographic_periods` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_schedule_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_schedule_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emvarias_schedule_comments
CREATE TABLE IF NOT EXISTS `emvarias_schedule_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_emvarias_schedule_comments_emvarias_schedule` (`schedule`),
  KEY `FK_emvarias_schedule_comments_users` (`created_by`),
  CONSTRAINT `FK_emvarias_schedule_comments_emvarias_schedule` FOREIGN KEY (`schedule`) REFERENCES `emvarias_schedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_schedule_comments_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.emvarias_schedule_log
CREATE TABLE IF NOT EXISTS `emvarias_schedule_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `data_in` json DEFAULT NULL,
  `data_out` json DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_emvarias_schedule_log_emvarias_schedule` (`schedule`),
  KEY `FK_emvarias_schedule_log_users` (`created_by`),
  CONSTRAINT `FK_emvarias_schedule_log_emvarias_schedule` FOREIGN KEY (`schedule`) REFERENCES `emvarias_schedule` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_emvarias_schedule_log_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.events
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
CREATE TABLE IF NOT EXISTS `events_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `color_background` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden
CREATE TABLE IF NOT EXISTS `garden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_comercial` varchar(250) CHARACTER SET utf8 NOT NULL,
  `name_comun` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `name_botanico` varchar(250) CHARACTER SET utf8 DEFAULT NULL COMMENT '(especie de género)',
  `picture` int(11) DEFAULT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `attendance` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Columna 1` (`id`),
  KEY `FK_garden_pictures` (`picture`),
  CONSTRAINT `FK_garden_pictures` FOREIGN KEY (`picture`) REFERENCES `pictures` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_attributes
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
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_comun_names
CREATE TABLE IF NOT EXISTS `garden_comun_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garden` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_garden_comun_names_garden` (`garden`),
  CONSTRAINT `FK_garden_comun_names_garden` FOREIGN KEY (`garden`) REFERENCES `garden` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_filters
CREATE TABLE IF NOT EXISTS `garden_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) CHARACTER SET latin1 NOT NULL,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `description` varchar(500) CHARACTER SET latin1 NOT NULL,
  `type` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'none',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_filters_attributes
CREATE TABLE IF NOT EXISTS `garden_filters_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filter` int(11) NOT NULL,
  `text` varchar(250) CHARACTER SET latin1 NOT NULL,
  `more` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_garden_inputs_options_garden_inputs` (`filter`),
  CONSTRAINT `FK_garden_filters_v_garden_fields` FOREIGN KEY (`filter`) REFERENCES `garden_filters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.garden_gallery
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.geo_citys
CREATE TABLE IF NOT EXISTS `geo_citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `department` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departamento_id` (`department`),
  KEY `id` (`id`),
  CONSTRAINT `FK_geo_citys_geo_departments` FOREIGN KEY (`department`) REFERENCES `geo_departments` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1103 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.geo_departments
CREATE TABLE IF NOT EXISTS `geo_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.geo_types_quadrants
CREATE TABLE IF NOT EXISTS `geo_types_quadrants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `code` varchar(5) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.geo_types_vias
CREATE TABLE IF NOT EXISTS `geo_types_vias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `code` varchar(2) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.group_technicians
CREATE TABLE IF NOT EXISTS `group_technicians` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_group_technicians_users` (`user`),
  CONSTRAINT `FK_group_technicians_users` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.headquarters
CREATE TABLE IF NOT EXISTS `headquarters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `address` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_headquarters_addresses` (`address`),
  CONSTRAINT `FK_headquarters_addresses` FOREIGN KEY (`address`) REFERENCES `addresses` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.identifications_types
CREATE TABLE IF NOT EXISTS `identifications_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_activity
CREATE TABLE IF NOT EXISTS `inv_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device` int(11) NOT NULL,
  `created` date NOT NULL,
  `user_from` int(11) DEFAULT NULL,
  `user_to` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Movimientos';

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_articles
CREATE TABLE IF NOT EXISTS `inv_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_brands
CREATE TABLE IF NOT EXISTS `inv_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL DEFAULT '0',
  `description` int(11) NOT NULL DEFAULT '0',
  `contact` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_budget
CREATE TABLE IF NOT EXISTS `inv_budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` float NOT NULL COMMENT 'importe',
  `validity` date NOT NULL,
  `provider` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `delivery` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_devices
CREATE TABLE IF NOT EXISTS `inv_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(250) CHARACTER SET utf8 NOT NULL,
  `validation` date NOT NULL,
  `isArea` int(1) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_price` float NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `stocktaking` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `headquarters` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_log
CREATE TABLE IF NOT EXISTS `inv_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `activity` varchar(250) CHARACTER SET utf8 NOT NULL,
  `param_in` text CHARACTER SET utf8 NOT NULL,
  `param_out` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_orders
CREATE TABLE IF NOT EXISTS `inv_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` date NOT NULL,
  `validation` date DEFAULT NULL,
  `response_enabled` int(1) DEFAULT '1',
  `response` int(1) DEFAULT '0',
  `financial_response` int(1) DEFAULT NULL,
  `financial_success_date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `expense` int(11) DEFAULT NULL,
  `application_date` date NOT NULL,
  `reception_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_orders_line
CREATE TABLE IF NOT EXISTS `inv_orders_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_providers
CREATE TABLE IF NOT EXISTS `inv_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identification_type` int(11) NOT NULL,
  `identification_number` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `department` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_type_activity
CREATE TABLE IF NOT EXISTS `inv_type_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tipos de movimientos';

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.inv_type_articles
CREATE TABLE IF NOT EXISTS `inv_type_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Columna 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.jobs_contracts
CREATE TABLE IF NOT EXISTS `jobs_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `obs` text,
  `address_info` text,
  `area_m2` float DEFAULT NULL,
  `client_zone` varchar(250) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.jobs_contracts_scheduled
CREATE TABLE IF NOT EXISTS `jobs_contracts_scheduled` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.lots
CREATE TABLE IF NOT EXISTS `lots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `geometry` geometry DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_lots_addresses` (`address`),
  CONSTRAINT `FK_lots_addresses` FOREIGN KEY (`address`) REFERENCES `addresses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.lots_envarias
CREATE TABLE IF NOT EXISTS `lots_envarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lot_ref` varchar(50),
  `description` text,
  `address_text` text,
  `area_m2` float DEFAULT '0',
  `zone_client` varchar(50) DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_photographic_routes_lots` (`lot_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=1146 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.media
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
) ENGINE=InnoDB AUTO_INCREMENT=756 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.media_events
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
) ENGINE=InnoDB AUTO_INCREMENT=756 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.meditions
CREATE TABLE IF NOT EXISTS `meditions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `code` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `order_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.menus_items
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
) ENGINE=InnoDB AUTO_INCREMENT=11229 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.menus_items_copy
CREATE TABLE IF NOT EXISTS `menus_items_copy` (
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
  CONSTRAINT `menus_items_copy_ibfk_1` FOREIGN KEY (`menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11222 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.permissions
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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.permissions_group
CREATE TABLE IF NOT EXISTS `permissions_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.permissions_items
CREATE TABLE IF NOT EXISTS `permissions_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`),
  KEY `id` (`id`),
  KEY `tag KEY` (`tag`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.photographic_files
CREATE TABLE IF NOT EXISTS `photographic_files` (
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
  CONSTRAINT `photographic_files_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.photographic_groups
CREATE TABLE IF NOT EXISTS `photographic_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.photographic_periods
CREATE TABLE IF NOT EXISTS `photographic_periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `start_day` int(11) DEFAULT NULL,
  `start_month` int(11) DEFAULT NULL,
  `end_day` int(11) DEFAULT NULL,
  `end_month` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.photographic_reports
CREATE TABLE IF NOT EXISTS `photographic_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` int(11) NOT NULL,
  `year` int(4) NOT NULL DEFAULT '2019',
  `type` varchar(1) CHARACTER SET utf8 NOT NULL,
  `group` int(11) NOT NULL,
  `geometry` geometry DEFAULT NULL,
  `period` int(11) NOT NULL,
  `media` int(11) NOT NULL,
  `status` int(1) DEFAULT '0',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_photographic_report_reports_photographic_report_routes` (`route`),
  KEY `FK_photographic_report_reports_media` (`media`),
  KEY `FK_photographic_report_reports_photographic_groups` (`group`),
  KEY `FK_photographic_report_reports_photographic_periods` (`period`),
  KEY `FK_photographic_report_reports_users` (`created_by`),
  CONSTRAINT `FK_photographic_report_reports_media` FOREIGN KEY (`media`) REFERENCES `photographic_files` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_photographic_report_reports_photographic_groups` FOREIGN KEY (`group`) REFERENCES `photographic_groups` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_photographic_report_reports_photographic_periods` FOREIGN KEY (`period`) REFERENCES `photographic_periods` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_photographic_report_reports_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.photographic_routes
CREATE TABLE IF NOT EXISTS `photographic_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `lot` int(11) NOT NULL,
  `group` int(11) DEFAULT NULL,
  `description` text,
  `address_text` text,
  `area_m2` float DEFAULT '0',
  `zone_client` float DEFAULT '0',
  `obs` text,
  `actualizado` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_photographic_routes_lots` (`lot`),
  CONSTRAINT `photographic_routes_ibfk_1` FOREIGN KEY (`lot`) REFERENCES `lots` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1146 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.pictures
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
) ENGINE=InnoDB AUTO_INCREMENT=579 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `description` varchar(1000) CHARACTER SET utf8 NOT NULL DEFAULT '',
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests_addresses
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests_contacts
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests_services
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.requests_status
CREATE TABLE IF NOT EXISTS `requests_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `color` varchar(16) CHARACTER SET utf8 NOT NULL,
  `porcentage` varchar(16) CHARACTER SET utf8 NOT NULL,
  `calendar_enabled` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.schedule
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `lot` int(11) NOT NULL,
  `group` int(11) DEFAULT NULL,
  `description` text,
  `address_text` text,
  `area_m2` float DEFAULT '0',
  `zone_client` varchar(250) DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_photographic_routes_lots` (`lot`),
  KEY `FK_schedule_contracts` (`contract`),
  CONSTRAINT `FK_schedule_contracts` FOREIGN KEY (`contract`) REFERENCES `contracts` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`lot`) REFERENCES `lots` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) DEFAULT NULL,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1,
  `medition` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK_services_services_meditions` (`medition`),
  KEY `FK_services_services_categories` (`category`),
  CONSTRAINT `FK_services_services_categories` FOREIGN KEY (`category`) REFERENCES `services_categories` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_services_services_meditions` FOREIGN KEY (`medition`) REFERENCES `meditions` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.services_categories
CREATE TABLE IF NOT EXISTS `services_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.status_marital
CREATE TABLE IF NOT EXISTS `status_marital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.study_levels
CREATE TABLE IF NOT EXISTS `study_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.study_status
CREATE TABLE IF NOT EXISTS `study_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.users
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
  `bulletin` int(1) DEFAULT NULL,
  `marketing` int(1) DEFAULT NULL,
  `analytic` int(1) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla admin_mv_pro.users_events
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
