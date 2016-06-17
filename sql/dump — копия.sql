-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.26 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных logoped
CREATE DATABASE IF NOT EXISTS `logoped_pmpk` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `logoped_pmpk`;


-- Дамп структуры для таблица logoped.children
CREATE TABLE IF NOT EXISTS `children` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `date_PMPC` date NOT NULL,
  `protocol_number` int(11) NOT NULL,
  `group_number` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.children: ~11 rows (приблизительно)
DELETE FROM `children`;
/*!40000 ALTER TABLE `children` DISABLE KEYS */;
INSERT INTO `children` (`id`, `full_name`, `date`, `address`, `date_PMPC`, `protocol_number`, `group_number`, `photo`) VALUES
	(1, 'Колесников Александр Николаевич', '2010-01-01', 'ул. Лекса Лютора', '1995-10-12', 0, 3, NULL),
	(3, 'Овсянников Евгений Сигизмундович', '2010-01-01', 'ул. имени Генри Кавелла', '1995-10-12', 2, 3, NULL),
	(4, 'Трутнев Алексей Магомедович', '2016-05-06', 'ул. Лукова 99', '2000-01-01', 23232, 4, NULL),
	(5, 'Иванов Иван Иванович', '2010-02-02', 'ул. Котова 32', '2000-01-01', 23, 4, NULL),
	(6, 'Протасов Олег Олегович', '2016-05-13', 'ул. Орлова 32', '2016-05-11', 121, 1, 'zLt7r0wfR2o.jpg'),
	(7, 'Прокопенко Иван Савельевич', '2016-05-11', 'ул. Генерала Куркчи', '2016-05-09', 568565, 3, 'AEOCNAOXkog.jpg'),
	(12, 'ребенок уже с фото', '2016-05-30', 'фыв', '2016-05-30', 1231, 2, 'g3--scruDCk.jpg'),
	(14, 'Гусева Екатерина Константиновна', '2016-06-15', 'ул. Петрозаводская', '2016-06-17', 322121, 2, '315424521.jpg'),
	(15, 'Безруков Сергей Витальевич', '2016-06-01', 'ул. Ходченкова 12', '2016-06-06', 54, 2, '55deba7c0ab29_1392766028_sergey-bezrukov1.jpg'),
	(16, 'Ургант Иван Андреевич', '2016-06-07', 'ул. Трубакова 8а', '2016-06-15', 11087, 2, 'ivan_urgant1.jpg'),
	(17, 'Галустян Михаил Сергеевич', '2016-06-08', 'ул. Разбитых 23', '2016-06-07', 442, 1, 'foo.jpg');
/*!40000 ALTER TABLE `children` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.children_groups
CREATE TABLE IF NOT EXISTS `children_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.children_groups: ~4 rows (приблизительно)
DELETE FROM `children_groups`;
/*!40000 ALTER TABLE `children_groups` DISABLE KEYS */;
INSERT INTO `children_groups` (`id`, `name`) VALUES
	(1, 'ЗНР'),
	(2, 'ФНР'),
	(3, 'ФФР'),
	(4, 'ННР');
/*!40000 ALTER TABLE `children_groups` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.classes_schedule
CREATE TABLE IF NOT EXISTS `classes_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned DEFAULT NULL,
  `group_number` int(11) unsigned DEFAULT NULL,
  `day` int(11) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_classes_schedule_children` (`children_id`),
  KEY `FK_classes_schedule_groups` (`group_number`),
  CONSTRAINT `FK_classes_schedule_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_classes_schedule_groups` FOREIGN KEY (`group_number`) REFERENCES `children_groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.classes_schedule: ~3 rows (приблизительно)
DELETE FROM `classes_schedule`;
/*!40000 ALTER TABLE `classes_schedule` DISABLE KEYS */;
INSERT INTO `classes_schedule` (`id`, `children_id`, `group_number`, `day`, `time`) VALUES
	(6, 4, NULL, 1, '13:02:00'),
	(7, NULL, 2, 2, '14:00:00'),
	(10, NULL, 1, 1, '12:00:00');
/*!40000 ALTER TABLE `classes_schedule` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.groups: ~3 rows (приблизительно)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(5, 'teacher', 'Учитель-логопед'),
	(6, 'headmaster', 'Заведующая ПМПК');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.individual_card
CREATE TABLE IF NOT EXISTS `individual_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `motility` varchar(50) DEFAULT NULL,
  `pronunciation` varchar(50) DEFAULT NULL,
  `syllable_word_structure` varchar(50) DEFAULT NULL,
  `color_perception` varchar(50) DEFAULT NULL,
  `spatial_perception` varchar(50) DEFAULT NULL,
  `eyes_count_operations` tinyint(1) unsigned NOT NULL,
  `items_compare` varchar(50) DEFAULT NULL,
  `is_beginning` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_individual_card_children` (`children_id`),
  CONSTRAINT `FK_individual_card_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.individual_card: ~11 rows (приблизительно)
DELETE FROM `individual_card`;
/*!40000 ALTER TABLE `individual_card` DISABLE KEYS */;
INSERT INTO `individual_card` (`id`, `children_id`, `motility`, `pronunciation`, `syllable_word_structure`, `color_perception`, `spatial_perception`, `eyes_count_operations`, `items_compare`, `is_beginning`) VALUES
	(1, 5, 'Отличная', 'fsdfsd', 'sdfsdf', 'Отлично', 'xample', 1, 'Jnkbxyj', 1),
	(2, 5, NULL, 'sdfsdf', NULL, NULL, NULL, 0, NULL, 0),
	(3, 1, '', 'asdasda', '', '', '', 0, '', 1),
	(4, 7, 'fghfdgh', 'asdasda', 'ghfh', 'Нормальное восприятие', '', 0, '', 1),
	(5, 1, '', 'sfsdfsd', 'sdfsdf', '', '', 0, '', 0),
	(6, 7, '', 'sdsf', 'sdfsdf', '', '', 1, '', 0),
	(7, 15, '', '', '', '', '', 1, '', 0),
	(8, 15, '', '', '', '', '', 1, '', 1),
	(9, 17, '', 'asd', 'asd', '', '', 1, '', 1),
	(10, 17, '', 'asd', 'asd', '', '', 1, '', 0),
	(11, 14, '', '', '', '', '', 0, '', 0),
	(12, 14, '', 'asda', 'asda', '', '', 0, '', 1),
	(13, 3, '', '', '', '', '', 0, '', 1);
/*!40000 ALTER TABLE `individual_card` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.individual_plan
CREATE TABLE IF NOT EXISTS `individual_plan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `whistling` varchar(50) DEFAULT NULL,
  `hissing` varchar(50) DEFAULT NULL,
  `sonor` varchar(50) DEFAULT NULL,
  `affricate` varchar(50) DEFAULT NULL,
  `other_sounds` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_individual_plan_children` (`children_id`),
  CONSTRAINT `FK_individual_plan_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.individual_plan: ~5 rows (приблизительно)
DELETE FROM `individual_plan`;
/*!40000 ALTER TABLE `individual_plan` DISABLE KEYS */;
INSERT INTO `individual_plan` (`id`, `children_id`, `whistling`, `hissing`, `sonor`, `affricate`, `other_sounds`) VALUES
	(3, 3, 'hkjhkj', 'k', 'jh', 'kjh', 'kj'),
	(4, 5, 'с, з, ц', 'щ, ш', 'о, л', 'в, ы', 'ы, й'),
	(5, 1, 'с, з, ц', 'щ, ш', 'о, л', 'в, ы', 'ы, й'),
	(6, 4, 'с, з, ц', 'щ, ш', 'о, л', 'в, ы', 'ы, й'),
	(7, 6, 'с, з, ц', 'щ, ш', 'о, л', 'в, ы', 'ы, й'),
	(8, 7, 'с, з', 'ш, щ', 'а, з', 'ф, ч', 'ф');
/*!40000 ALTER TABLE `individual_plan` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.plan_sounds_rel
CREATE TABLE IF NOT EXISTS `plan_sounds_rel` (
  `individual_plan_id` int(10) unsigned DEFAULT NULL,
  `sound_id` int(10) unsigned DEFAULT NULL,
  `is_done` tinyint(1) unsigned DEFAULT NULL,
  KEY `FK_plan_sounds_rel_individual_plan` (`individual_plan_id`),
  KEY `FK_plan_sounds_rel_sounds` (`sound_id`),
  CONSTRAINT `FK_plan_sounds_rel_individual_plan` FOREIGN KEY (`individual_plan_id`) REFERENCES `individual_plan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_plan_sounds_rel_sounds` FOREIGN KEY (`sound_id`) REFERENCES `sounds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.plan_sounds_rel: ~108 rows (приблизительно)
DELETE FROM `plan_sounds_rel`;
/*!40000 ALTER TABLE `plan_sounds_rel` DISABLE KEYS */;
INSERT INTO `plan_sounds_rel` (`individual_plan_id`, `sound_id`, `is_done`) VALUES
	(3, 4, 0),
	(3, 6, 0),
	(3, 7, 0),
	(3, 17, 0),
	(3, 18, 0),
	(3, 19, 0),
	(3, 20, 0),
	(3, 21, 0),
	(3, 22, 0),
	(3, 23, 0),
	(3, 24, 0),
	(3, 25, 0),
	(3, 26, 0),
	(3, 27, 0),
	(3, 28, 0),
	(3, 29, 0),
	(3, 30, 0),
	(3, 31, 0),
	(4, 4, 0),
	(4, 6, 0),
	(4, 7, 0),
	(4, 17, 0),
	(4, 18, 0),
	(4, 19, 0),
	(4, 20, 0),
	(4, 21, 0),
	(4, 22, 0),
	(4, 23, 0),
	(4, 24, 0),
	(4, 25, 0),
	(4, 26, 0),
	(4, 27, 0),
	(4, 28, 0),
	(4, 29, 0),
	(4, 30, 0),
	(4, 31, 0),
	(5, 4, 1),
	(5, 6, 0),
	(5, 7, 0),
	(5, 17, 0),
	(5, 18, 0),
	(5, 19, 0),
	(5, 20, 1),
	(5, 21, 1),
	(5, 22, 1),
	(5, 23, 0),
	(5, 24, 0),
	(5, 25, 0),
	(5, 26, 1),
	(5, 27, 1),
	(5, 28, 1),
	(5, 29, 0),
	(5, 30, 0),
	(5, 31, 0),
	(6, 4, 0),
	(6, 6, 0),
	(6, 7, 0),
	(6, 17, 0),
	(6, 18, 0),
	(6, 19, 0),
	(6, 20, 0),
	(6, 21, 1),
	(6, 22, 1),
	(6, 23, 1),
	(6, 24, 0),
	(6, 25, 0),
	(6, 26, 0),
	(6, 27, 1),
	(6, 28, 1),
	(6, 29, 0),
	(6, 30, 0),
	(6, 31, 0),
	(7, 4, 0),
	(7, 6, 1),
	(7, 7, 0),
	(7, 17, 0),
	(7, 18, 0),
	(7, 19, 0),
	(7, 20, 0),
	(7, 21, 1),
	(7, 22, 0),
	(7, 23, 0),
	(7, 24, 0),
	(7, 25, 0),
	(7, 26, 0),
	(7, 27, 0),
	(7, 28, 0),
	(7, 29, 0),
	(7, 30, 0),
	(7, 31, 0),
	(8, 4, 0),
	(8, 6, 1),
	(8, 7, 0),
	(8, 17, 0),
	(8, 18, 0),
	(8, 19, 1),
	(8, 20, 0),
	(8, 21, 1),
	(8, 22, 1),
	(8, 23, 1),
	(8, 24, 1),
	(8, 25, 0),
	(8, 26, 0),
	(8, 27, 1),
	(8, 28, 0),
	(8, 29, 0),
	(8, 30, 1),
	(8, 31, 1);
/*!40000 ALTER TABLE `plan_sounds_rel` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.progress_marks
CREATE TABLE IF NOT EXISTS `progress_marks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.progress_marks: ~3 rows (приблизительно)
DELETE FROM `progress_marks`;
/*!40000 ALTER TABLE `progress_marks` DISABLE KEYS */;
INSERT INTO `progress_marks` (`id`, `description`, `symbol`) VALUES
	(1, 'Это типа ну сойдет ладгн', '(_)'),
	(2, 'lesxusdasd', ':_:'),
	(3, 'huq', '_:_');
/*!40000 ALTER TABLE `progress_marks` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.result_analysis
CREATE TABLE IF NOT EXISTS `result_analysis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_result_analysis_children` (`children_id`),
  CONSTRAINT `FK_result_analysis_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.result_analysis: ~8 rows (приблизительно)
DELETE FROM `result_analysis`;
/*!40000 ALTER TABLE `result_analysis` DISABLE KEYS */;
INSERT INTO `result_analysis` (`id`, `children_id`, `date`, `description`) VALUES
	(3, 1, '2016-05-02', 'Проработано все что только можно проработать. Инфа сотка'),
	(6, 1, '2016-05-04', 'Проработан звук такой-то такой-то, тра-та-тра Проработан звук такой-то такой-то, тра-та-тра\r\nПроработан звук такой-то такой-то, тра-та-тра masdasd asd\r\nПроработан звук такой-то такой-то, тра-та-тра'),
	(7, 6, '2016-05-12', 'Фывфывфыв'),
	(8, 4, '2016-05-02', 'dsrsdrsdr'),
	(9, 6, '2016-06-06', 'Все пучком'),
	(10, 14, '2016-06-06', 'Проработан звук И'),
	(11, 12, '2016-06-06', 'asdkjaldjsad'),
	(12, 16, '2016-06-06', 'asdasd');
/*!40000 ALTER TABLE `result_analysis` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.screen_sounds_rel
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

-- Дамп данных таблицы logoped.screen_sounds_rel: ~84 rows (приблизительно)
DELETE FROM `screen_sounds_rel`;
/*!40000 ALTER TABLE `screen_sounds_rel` DISABLE KEYS */;
INSERT INTO `screen_sounds_rel` (`speech_screen_id`, `sound_id`, `progress_mark_id`) VALUES
	(9, 1, 1),
	(9, 2, 1),
	(9, 3, 1),
	(9, 5, 1),
	(9, 8, 1),
	(9, 9, 1),
	(9, 10, 1),
	(9, 11, 1),
	(9, 12, 1),
	(9, 14, 2),
	(9, 15, 1),
	(9, 16, 1),
	(10, 1, 1),
	(10, 2, 1),
	(10, 3, 1),
	(10, 5, 1),
	(10, 8, 1),
	(10, 9, 1),
	(10, 10, 1),
	(10, 11, 1),
	(10, 12, 1),
	(10, 14, 1),
	(10, 15, 1),
	(10, 16, 1),
	(11, 1, 1),
	(11, 2, 1),
	(11, 3, 1),
	(11, 5, 1),
	(11, 8, 1),
	(11, 9, 1),
	(11, 10, 1),
	(11, 11, 1),
	(11, 12, 1),
	(11, 14, 1),
	(11, 15, 1),
	(11, 16, 1),
	(12, 1, 1),
	(12, 2, 2),
	(12, 3, 1),
	(12, 5, 2),
	(12, 8, 1),
	(12, 9, 2),
	(12, 10, 1),
	(12, 11, 1),
	(12, 12, 2),
	(12, 14, 1),
	(12, 15, 2),
	(12, 16, 2),
	(13, 1, 1),
	(13, 2, 1),
	(13, 3, 1),
	(13, 5, 2),
	(13, 8, 2),
	(13, 9, 1),
	(13, 10, 1),
	(13, 11, 1),
	(13, 12, 2),
	(13, 14, 1),
	(13, 15, 1),
	(13, 16, 2),
	(14, 1, 3),
	(14, 2, 1),
	(14, 3, 2),
	(14, 5, 1),
	(14, 8, 2),
	(14, 9, 3),
	(14, 10, 1),
	(14, 11, 1),
	(14, 12, 2),
	(14, 14, 1),
	(14, 15, 1),
	(14, 16, 1),
	(15, 1, 2),
	(15, 2, 2),
	(15, 3, 1),
	(15, 5, 1),
	(15, 8, 1),
	(15, 9, 1),
	(15, 10, 1),
	(15, 11, 1),
	(15, 12, 1),
	(15, 14, 1),
	(15, 15, 1),
	(15, 16, 1);
/*!40000 ALTER TABLE `screen_sounds_rel` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.sounds
CREATE TABLE IF NOT EXISTS `sounds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `transcription` varchar(10) NOT NULL,
  `is_screen` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.sounds: ~30 rows (приблизительно)
DELETE FROM `sounds`;
/*!40000 ALTER TABLE `sounds` DISABLE KEYS */;
INSERT INTO `sounds` (`id`, `name`, `transcription`, `is_screen`) VALUES
	(1, 'С', 'S', 1),
	(2, 'З', 'Z', 1),
	(3, 'Ц', 'C', 1),
	(4, 'С-Сь', 'S-S\'', 0),
	(5, 'Ч', 'Ch', 1),
	(6, 'Ч-Чь', 'Ch-Ch\'', 0),
	(7, 'З-Зь', 'Z-Z\'', 0),
	(8, 'Ш', 'Sh', 1),
	(9, 'Ж', 'Zh', 1),
	(10, 'Щ', 'Sch', 1),
	(11, 'Р', 'R', 1),
	(12, 'Л', 'L', 1),
	(14, 'К', 'K', 1),
	(15, 'Г', 'G', 1),
	(16, 'Х', 'H', 1),
	(17, 'Сь', 'S\'', 0),
	(18, 'Зь', 'Z\'', 0),
	(19, 'Рь', 'R\'', 0),
	(20, 'C-З', 'S-Z', 0),
	(21, 'С-Ц', 'S-C', 0),
	(22, 'С-Ш', 'S-Sh', 0),
	(23, 'Ж-З', 'Zh-Z', 0),
	(24, 'Ж-Ш', 'Zh-Sh', 0),
	(25, 'Ч-Ть', 'Ch-T\'', 0),
	(26, 'Ль-Л', 'L-L\'', 0),
	(27, 'Ч-Щ', 'Ch-Sh\'', 0),
	(28, 'Щ-Сь', 'Sh\'-S\'', 0),
	(29, 'Щ-Ть', 'Sh\'-T\'', 0),
	(30, 'Р-Л', 'R-L', 0),
	(31, 'Рь-Й', 'R\'-Y', 0);
/*!40000 ALTER TABLE `sounds` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.speech_card
CREATE TABLE IF NOT EXISTS `speech_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `peu_number` int(10) unsigned NOT NULL,
  `enrollment_date` date DEFAULT NULL,
  `parent_complaints` varchar(50) DEFAULT NULL,
  `native_language` varchar(50) DEFAULT NULL,
  `motility_state` varchar(50) DEFAULT NULL,
  `hearing` varchar(50) DEFAULT NULL,
  `general_development` varchar(50) DEFAULT NULL,
  `attention` varchar(50) DEFAULT NULL,
  `efficiency` varchar(50) DEFAULT NULL,
  `memory` varchar(50) DEFAULT NULL,
  `voice` varchar(50) DEFAULT NULL,
  `timbre` varchar(50) DEFAULT NULL,
  `breath` varchar(50) DEFAULT NULL,
  `diction` varchar(50) DEFAULT NULL,
  `vocal_cords` varchar(50) DEFAULT NULL,
  `teeth` varchar(50) DEFAULT NULL,
  `lips` varchar(50) DEFAULT NULL,
  `tongue` varchar(50) DEFAULT NULL,
  `movement` varchar(50) DEFAULT NULL,
  `bite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_speech_card_children` (`children_id`),
  CONSTRAINT `FK_speech_card_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.speech_card: ~5 rows (приблизительно)
DELETE FROM `speech_card`;
/*!40000 ALTER TABLE `speech_card` DISABLE KEYS */;
INSERT INTO `speech_card` (`id`, `children_id`, `peu_number`, `enrollment_date`, `parent_complaints`, `native_language`, `motility_state`, `hearing`, `general_development`, `attention`, `efficiency`, `memory`, `voice`, `timbre`, `breath`, `diction`, `vocal_cords`, `teeth`, `lips`, `tongue`, `movement`, `bite`) VALUES
	(2, 1, 3, '0000-00-00', 'нет', 'русскийё', 'отличный ', 'отчл', 'ываы', 'аыфва', '', '', '', '', '', '', '', '', '', '', '', ''),
	(3, 3, 2, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(4, 4, 21, '2016-05-12', 'нет', '', 'отличный ', 'отчл', 'ываы', '', '', '', '', '', '', '', '', '', '', 'zxc', '', ''),
	(5, 7, 12, '2016-06-14', 'нет', 'русский', 'нормальное', 'отличный', 'хорошее', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(6, 15, 23, '2016-06-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(7, 14, 21, '2016-06-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `speech_card` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.speech_screen
CREATE TABLE IF NOT EXISTS `speech_screen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `children_id` int(10) unsigned NOT NULL,
  `ff_perception` varchar(50) NOT NULL,
  `study_year` tinyint(3) unsigned NOT NULL,
  `diagnosis` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_speech_screen_children` (`children_id`),
  CONSTRAINT `FK_speech_screen_children` FOREIGN KEY (`children_id`) REFERENCES `children` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.speech_screen: ~7 rows (приблизительно)
DELETE FROM `speech_screen`;
/*!40000 ALTER TABLE `speech_screen` DISABLE KEYS */;
INSERT INTO `speech_screen` (`id`, `children_id`, `ff_perception`, `study_year`, `diagnosis`) VALUES
	(9, 1, 'Отличное', 2, 'ФФР'),
	(10, 5, 'Отличное', 23, 'ФФР'),
	(11, 6, 'Отличное', 2, 'ЛЛЫ'),
	(12, 3, 'Отличное', 2, 'Example'),
	(13, 4, 'Отличное', 2, 'Все хорошо'),
	(14, 7, 'Хорошее', 2, 'ФНР'),
	(15, 15, 'отличное', 1, 'ППР');
/*!40000 ALTER TABLE `speech_screen` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.users: ~3 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
	(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', NULL, NULL, NULL, NULL, 1268889823, 1465940285, 1, 'Admin', 'istrator', 'ADMIN', '0'),
	(2, '127.0.0.1', 'teacher123', '$2y$08$12r9ZW6EqgqIiP1L5m8VqegMw40YCKcfNkaHlGy3S0WMP2TOn8U.q', NULL, 'kharaman.v@gmail.com', NULL, NULL, NULL, 'nU1GADZsKA5jwcP0W6UBd.', 1463059967, 1465993181, 1, 'Евгения', 'Васильевна', 'ЛП №166', '0'),
	(3, '127.0.0.1', 'pmpk', '$2y$08$SZHvfHFQNSctwFuEkeUcD.4pXZeJNu9vjxW878Srz8mZ4EZIJu.de', NULL, 'asd@ad.asd', NULL, NULL, NULL, NULL, 1463669489, NULL, 1, 'Заведующая', 'ПМПК', 'ЛП №166', '0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.users_groups: ~3 rows (приблизительно)
DELETE FROM `users_groups`;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(5, 1, 1),
	(6, 2, 5),
	(9, 3, 6);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;


-- Дамп структуры для таблица logoped.work_schedule
CREATE TABLE IF NOT EXISTS `work_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы logoped.work_schedule: ~2 rows (приблизительно)
DELETE FROM `work_schedule`;
/*!40000 ALTER TABLE `work_schedule` DISABLE KEYS */;
INSERT INTO `work_schedule` (`id`, `day`, `start_time`, `end_time`) VALUES
	(1, '1', '08:00:00', '12:00:00'),
	(8, '2', '08:00:00', '14:00:00');
/*!40000 ALTER TABLE `work_schedule` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
