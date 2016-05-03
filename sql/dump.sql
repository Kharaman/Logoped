-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.48 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных Logoped
DROP DATABASE IF EXISTS `Logoped`;
CREATE DATABASE IF NOT EXISTS `logoped` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Logoped`;


-- Дамп структуры для таблица Logoped.children
DROP TABLE IF EXISTS `children`;
CREATE TABLE IF NOT EXISTS `children` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `date_PMPC` date NOT NULL,
  `protocol_number` int(11) NOT NULL,
  `group_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.children: ~2 rows (приблизительно)
DELETE FROM `children`;
/*!40000 ALTER TABLE `children` DISABLE KEYS */;
INSERT INTO `children` (`id`, `full_name`, `date`, `address`, `date_PMPC`, `protocol_number`, `group_number`) VALUES
	(1, 'Хараман Владимир Сергеевич', '2010-01-01', 'awdawdawd', '1995-10-12', 123123123, 3),
	(3, 'Даниленко Андрей ', '2010-01-01', 'олололо', '1995-10-12', 2, 3);
/*!40000 ALTER TABLE `children` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.classes_schedule
DROP TABLE IF EXISTS `classes_schedule`;
CREATE TABLE IF NOT EXISTS `classes_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `group_number` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_classes_schedule_children` (`children_id`),
  CONSTRAINT `FK_classes_schedule_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.classes_schedule: ~0 rows (приблизительно)
DELETE FROM `classes_schedule`;
/*!40000 ALTER TABLE `classes_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `classes_schedule` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.individual_card
DROP TABLE IF EXISTS `individual_card`;
CREATE TABLE IF NOT EXISTS `individual_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `pronunciation` varchar(50) NOT NULL,
  `syllable_word_structure` varchar(50) NOT NULL,
  `motility` varchar(50) NOT NULL,
  `color_perception` varchar(50) NOT NULL,
  `spatial_perception` varchar(50) NOT NULL,
  `eyes_count_operations` tinyint(1) unsigned NOT NULL,
  `items_compare` varchar(50) NOT NULL,
  `is_beginning` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_individual_card_children` (`children_id`),
  CONSTRAINT `FK_individual_card_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.individual_card: ~0 rows (приблизительно)
DELETE FROM `individual_card`;
/*!40000 ALTER TABLE `individual_card` DISABLE KEYS */;
/*!40000 ALTER TABLE `individual_card` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.individual_plan
DROP TABLE IF EXISTS `individual_plan`;
CREATE TABLE IF NOT EXISTS `individual_plan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `whistling` varchar(50) NOT NULL,
  `hissing` varchar(50) NOT NULL,
  `sonor` varchar(50) NOT NULL,
  `affricate` varchar(50) NOT NULL,
  `other_sounds` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_individual_plan_children` (`children_id`),
  CONSTRAINT `FK_individual_plan_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.individual_plan: ~0 rows (приблизительно)
DELETE FROM `individual_plan`;
/*!40000 ALTER TABLE `individual_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `individual_plan` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.plan_sounds_rel
DROP TABLE IF EXISTS `plan_sounds_rel`;
CREATE TABLE IF NOT EXISTS `plan_sounds_rel` (
  `individual_plan_id` int(10) unsigned DEFAULT NULL,
  `sound_id` int(10) unsigned DEFAULT NULL,
  `is_done` tinyint(1) unsigned DEFAULT NULL,
  KEY `FK_plan_sounds_rel_individual_plan` (`individual_plan_id`),
  KEY `FK_plan_sounds_rel_sounds` (`sound_id`),
  CONSTRAINT `FK_plan_sounds_rel_individual_plan` FOREIGN KEY (`individual_plan_id`) REFERENCES `individual_plan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_plan_sounds_rel_sounds` FOREIGN KEY (`sound_id`) REFERENCES `sounds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.plan_sounds_rel: ~0 rows (приблизительно)
DELETE FROM `plan_sounds_rel`;
/*!40000 ALTER TABLE `plan_sounds_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_sounds_rel` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.progress_marks
DROP TABLE IF EXISTS `progress_marks`;
CREATE TABLE IF NOT EXISTS `progress_marks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.progress_marks: ~0 rows (приблизительно)
DELETE FROM `progress_marks`;
/*!40000 ALTER TABLE `progress_marks` DISABLE KEYS */;
/*!40000 ALTER TABLE `progress_marks` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.result_analysis
DROP TABLE IF EXISTS `result_analysis`;
CREATE TABLE IF NOT EXISTS `result_analysis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_result_analysis_children` (`children_id`),
  CONSTRAINT `FK_result_analysis_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.result_analysis: ~0 rows (приблизительно)
DELETE FROM `result_analysis`;
/*!40000 ALTER TABLE `result_analysis` DISABLE KEYS */;
/*!40000 ALTER TABLE `result_analysis` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.screen_sounds_rel
DROP TABLE IF EXISTS `screen_sounds_rel`;
CREATE TABLE IF NOT EXISTS `screen_sounds_rel` (
  `speech_screen_id` int(10) unsigned DEFAULT NULL,
  `sound_id` int(10) unsigned DEFAULT NULL,
  `progress_mark_id` int(10) unsigned DEFAULT NULL,
  KEY `FK_screen_sounds_rel_speech_screen` (`speech_screen_id`),
  KEY `FK_screen_sounds_rel_sounds` (`sound_id`),
  KEY `FK_screen_sounds_rel_progress_marks` (`progress_mark_id`),
  CONSTRAINT `FK_screen_sounds_rel_progress_marks` FOREIGN KEY (`progress_mark_id`) REFERENCES `progress_marks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_screen_sounds_rel_sounds` FOREIGN KEY (`sound_id`) REFERENCES `sounds` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_screen_sounds_rel_speech_screen` FOREIGN KEY (`speech_screen_id`) REFERENCES `speech_screen` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.screen_sounds_rel: ~0 rows (приблизительно)
DELETE FROM `screen_sounds_rel`;
/*!40000 ALTER TABLE `screen_sounds_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `screen_sounds_rel` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.sounds
DROP TABLE IF EXISTS `sounds`;
CREATE TABLE IF NOT EXISTS `sounds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sound_type_id` int(10) unsigned NOT NULL,
  `name` varchar(10) NOT NULL,
  `transcription` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sounds_sounds_type` (`sound_type_id`),
  CONSTRAINT `FK_sounds_sounds_type` FOREIGN KEY (`sound_type_id`) REFERENCES `sounds_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.sounds: ~0 rows (приблизительно)
DELETE FROM `sounds`;
/*!40000 ALTER TABLE `sounds` DISABLE KEYS */;
/*!40000 ALTER TABLE `sounds` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.sounds_type
DROP TABLE IF EXISTS `sounds_type`;
CREATE TABLE IF NOT EXISTS `sounds_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.sounds_type: ~0 rows (приблизительно)
DELETE FROM `sounds_type`;
/*!40000 ALTER TABLE `sounds_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `sounds_type` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.speech_card
DROP TABLE IF EXISTS `speech_card`;
CREATE TABLE IF NOT EXISTS `speech_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `PEU_number` int(10) unsigned NOT NULL,
  `enrollment_date` date NOT NULL,
  `parent_complaints` varchar(50) NOT NULL,
  `native_language` varchar(50) NOT NULL,
  `motility_state` varchar(50) NOT NULL,
  `hearing` varchar(50) NOT NULL,
  `general_development` varchar(50) NOT NULL,
  `attention` varchar(50) NOT NULL,
  `efficiency` varchar(50) NOT NULL,
  `memory` varchar(50) NOT NULL,
  `voice` varchar(50) NOT NULL,
  `timbre` varchar(50) NOT NULL,
  `breath` varchar(50) NOT NULL,
  `diction` varchar(50) NOT NULL,
  `vocal_cords` varchar(50) NOT NULL,
  `teeth` varchar(50) NOT NULL,
  `lips` varchar(50) NOT NULL,
  `tongue` varchar(50) NOT NULL,
  `movement` varchar(50) NOT NULL,
  `bite` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_speech_card_children` (`children_id`),
  CONSTRAINT `FK_speech_card_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.speech_card: ~0 rows (приблизительно)
DELETE FROM `speech_card`;
/*!40000 ALTER TABLE `speech_card` DISABLE KEYS */;
/*!40000 ALTER TABLE `speech_card` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.speech_screen
DROP TABLE IF EXISTS `speech_screen`;
CREATE TABLE IF NOT EXISTS `speech_screen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `ff_perception` varchar(50) NOT NULL,
  `study_year` tinyint(3) unsigned NOT NULL,
  `diagnosis` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_speech_screen_children` (`children_id`),
  CONSTRAINT `FK_speech_screen_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.speech_screen: ~0 rows (приблизительно)
DELETE FROM `speech_screen`;
/*!40000 ALTER TABLE `speech_screen` DISABLE KEYS */;
/*!40000 ALTER TABLE `speech_screen` ENABLE KEYS */;


-- Дамп структуры для таблица Logoped.work_schedule
DROP TABLE IF EXISTS `work_schedule`;
CREATE TABLE IF NOT EXISTS `work_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы Logoped.work_schedule: ~0 rows (приблизительно)
DELETE FROM `work_schedule`;
/*!40000 ALTER TABLE `work_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `work_schedule` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
