-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for itqan
DROP DATABASE IF EXISTS `itqan`;
CREATE DATABASE IF NOT EXISTS `itqan` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `itqan`;

-- Dumping structure for table itqan.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `reserved`) VALUES
	(1, 'التعليم الإلكتروني', NULL, '2019-12-29 07:48:18', '2019-12-29 07:48:19', 0),
	(2, 'التعليم المرتكز على المهمة', NULL, '2020-01-20 10:06:33', '2020-01-20 10:06:34', 0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table itqan.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `mission_level_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_category_id_foreign` (`category_id`),
  KEY `courses_mission_level_id_foreign` (`mission_level_id`),
  CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `courses_mission_level_id_foreign` FOREIGN KEY (`mission_level_id`) REFERENCES `mission_levels` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.courses: ~8 rows (approximately)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `name`, `description`, `image`, `category_id`, `mission_level_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'نظام التعليم الإلكتروني مودل', 'دورة كاملة على طريقة استخدام نظام التعليم مودل', '2KFgAky7ms6o0EjG.png', 1, 1, '2019-12-29 07:44:37', '2020-01-16 11:42:55', NULL),
	(3, 'تعليم مبادئ وورد', 'تعليم برنامج الكتابة مايكروسوفت وورد في 35 دقيقة', 'D45LrLYWAvmxyIk.jpeg', 1, 1, '2020-01-05 09:15:01', '2020-01-07 09:23:14', '2020-01-07 09:23:14'),
	(4, 'الاتصال', 'مهارات الاتصال السلكي واللاسلكي وأمن الاتصالات', 'WAj0i64EE0uimi7E.png', 2, 2, '2020-01-20 10:14:01', '2020-01-21 12:00:37', NULL),
	(5, 'الملاحة البرية', 'التدريب على علم الطبوغرافيا والخرائط', 'YLg03CmLkUGd6XGp.png', 2, 2, '2020-01-20 10:14:01', '2020-01-21 12:03:03', NULL),
	(6, 'الوقاية من أسلحة التدمير الشامل', 'معلومات عامة عن أسلحة التدمير الشامل', 'z7GyubIlmeqUdqND.png', 2, 2, '2020-01-20 10:14:01', '2020-01-21 12:05:01', NULL),
	(7, 'الأسلحة الفردية (الصغيرة)', 'مهارات استخدام الأسلحة الفردية والقنابل اليدوية', 'jU57PIKPdOPxjHAb.png', 2, 2, '2020-01-20 10:14:01', '2020-01-21 12:07:18', NULL),
	(8, 'الإسعافات الأولية', 'مهارات الإسعافات الأولية والإنقاذ', 'ludEqVKUY6PBqBrX.png', 2, 2, '2020-01-20 10:14:01', '2020-01-21 12:27:42', NULL),
	(9, 'قوانين وتقاليد الحرب', 'التدريب على مهارة قوانين وتقاليد الحرب', NULL, 2, 2, '2020-01-21 07:59:30', '2020-01-21 07:59:30', NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for table itqan.instructors
CREATE TABLE IF NOT EXISTS `instructors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.instructors: ~5 rows (approximately)
/*!40000 ALTER TABLE `instructors` DISABLE KEYS */;
INSERT INTO `instructors` (`id`, `name`, `user_id`, `info`, `created_at`, `updated_at`, `deleted_at`, `reserved`) VALUES
	(1, 'غير محدد', NULL, '', '2019-12-29 07:47:24', '2019-12-29 07:47:25', NULL, 1),
	(2, 'أ. خالد القحطاني', NULL, NULL, '2020-01-21 11:22:50', '2020-01-21 11:22:51', NULL, 0),
	(3, 'عاصم هزازي', NULL, NULL, '2020-01-21 11:22:47', '2020-01-21 11:22:48', NULL, 0),
	(4, 'العقيد/ محمد بن مسفر العتيبي', 5, NULL, '2020-01-21 11:22:32', '2020-01-21 11:22:33', NULL, 0),
	(5, 'محسن الحربي', 4, NULL, '2020-01-22 12:39:59', '2020-01-22 12:40:00', NULL, 0);
/*!40000 ALTER TABLE `instructors` ENABLE KEYS */;

-- Dumping structure for table itqan.lessons
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) unsigned DEFAULT NULL,
  `lesson_index` smallint(6) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `instructor_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lessons_instructor_id_foreign` (`instructor_id`),
  KEY `lessons_category_id_foreign` (`category_id`),
  KEY `lessons_course_id_foreign` (`course_id`),
  CONSTRAINT `lessons_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `lessons_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.lessons: ~45 rows (approximately)
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` (`id`, `course_id`, `lesson_index`, `title`, `header`, `description`, `image`, `video`, `category_id`, `instructor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 'مدخل إلى نظام Moodle', 'نظام التعليم الإلكتروني Moodle ومدى تأثيره على منظمتك التعليمية', '<p>تقديم:</p>\r\n\r\n<p>&lrm;نظام إدارة التعلم Moodle هو أحد الأنظمة المجانية مفتوحة المصدر التي يمكن التطوير عليها، وتعرف أيضا أنظمة إدارة التعلم ببيئة التعلم الافتراضية حيث تمكن المهتمين بمجال التربية والتعليم بإنشاء المواد التعليمية في شكل مقررات تعليمية يمكن الوصول إليها من قبل الفئة المستهدفة وهم المتعلمون. &lrm;<br />\r\n<br />\r\nفي نهاية هذا الفيديو ستكون قادر على : &lrm;<br />\r\n-- التعرف على ما هوي نظام Moodle<br />\r\n&lrm;-- خصائص ومميزات نظام Moodle</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>من يستفيد من هذه الدورة:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>المدراء و المسؤولين</p>\r\n	</li>\r\n	<li>\r\n	<p>المعلمون و الطلاب</p>\r\n	</li>\r\n	<li>\r\n	<p>المهتمون بالتقنية</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>مدة الفيديو: 25 دقيقة</p>', 'lesson_0.png', 'lesson-1.mp4', 1, 2, '2019-12-29 07:44:38', '2020-01-07 09:09:27', NULL),
	(8, 1, 2, 'إنشاء الفئات والتصنيفات', 'إضافة التصنيفات أو الفئات الرئيسية والفرعية', '<p>المؤسسات التعليمية تحتوي على عدة أقسام علمية بداخلها ، ونظم إدارة التعلم تحترم هذه التصنيفات وتتيح للمستخدمين الموكل إليهم تقسيم المؤسسة إلى عدة أقسام بإضافة التصنيفات أو الفئات.</p>\r\n\r\n<p>في نهاية هذا الفيديو ستكون قادر على :</p>\r\n\r\n<ul>\r\n	<li>إضافة التصنيفات أو الفئات.</li>\r\n	<li>إضافة التصنيفات الفرعية.</li>\r\n	<li>التعرف على أدوات التصنيفات.</li>\r\n</ul>', 'KY6tKPK2grJcpnyv.png', 'fs2XWzvSuLd0aOsO.mp4', 1, 2, '2020-01-05 13:09:38', '2020-01-07 09:05:40', '2020-01-07 09:05:40'),
	(9, 4, 1, 'الفصل الأول', 'تعريف ومفهوم الاتصالات', '<p>تعريف ومفهوم الاتصالات</p>', NULL, NULL, 2, 5, '2020-01-21 08:29:11', '2020-01-21 11:52:44', NULL),
	(12, 4, 2, 'الفصل الثاني', 'الاتصال اللاسلكي', '<p>الاتصال اللاسلكي</p>', NULL, NULL, 2, 5, '2020-01-21 08:41:28', '2020-01-21 08:41:28', NULL),
	(17, 4, 3, 'الفصل الثالث', 'الأجهزة السلكية في قوت الدفاع الجوي', '<p>الأجهزة السلكية&nbsp;في قوت الدفاع الجوي</p>', NULL, NULL, 2, 5, '2020-01-21 09:11:42', '2020-01-21 09:20:30', NULL),
	(18, 4, 4, 'الفصل الرابع', 'الاتصال اللاسلكي', '<p>الاتصال اللاسلكي</p>', NULL, NULL, 2, 5, '2020-01-21 09:18:28', '2020-01-21 09:18:29', NULL),
	(19, 4, 5, 'الفصل الخامس', 'الأجهزة اللاسلكية في قوت الدفاع الجوي', '<p>الأجهزة اللاسلكية في قوت الدفاع الجوي</p>', NULL, NULL, 2, 5, '2020-01-21 09:19:00', '2020-01-21 09:19:00', NULL),
	(20, 4, 6, 'الفصل السادس', 'أمن الاتصالات', '<p>أمن الاتصالات</p>', NULL, NULL, 2, 5, '2020-01-21 09:21:05', '2020-01-21 09:21:05', NULL),
	(21, 4, 7, 'الفصل السابع', 'قواعد وأصول المخابرة', '<p>قواعد وأصول المخابرة</p>', NULL, NULL, 2, 5, '2020-01-21 09:21:38', '2020-01-21 09:21:38', NULL),
	(22, 5, 1, 'الفصل الأول', 'علم الطبوغرافيا', 'علم الطبوغرافيا', NULL, NULL, 2, 1, '2020-01-21 09:33:58', '2020-01-21 09:33:58', NULL),
	(23, 5, 2, 'الفصل الثاني', 'الخارطة', 'الخارطة', NULL, NULL, 2, 1, '2020-01-21 09:34:21', '2020-01-21 09:34:21', NULL),
	(24, 5, 3, 'الفصل الثالث', 'طرق تمثيل الهيائات الطبوغرافية على الخرائط', '<p>طرق تمثيل الهيائات الطبوغرافية على الخرائط</p>', NULL, NULL, 2, 1, '2020-01-21 09:35:11', '2020-01-21 09:35:11', NULL),
	(25, 5, 4, 'الفصل الرابع', 'الاصطلاحات والرموز الطبوغرافية', NULL, NULL, NULL, 2, 1, '2020-01-21 09:35:37', '2020-01-21 09:35:37', NULL),
	(26, 5, 5, 'الفصل الخامس', 'هامش الخارطة', NULL, NULL, NULL, 2, 1, '2020-01-21 09:36:02', '2020-01-21 09:36:02', NULL),
	(27, 5, 6, 'الفصل السادس', 'تعيين إحداثيات الأغراض', NULL, NULL, NULL, 2, 1, '2020-01-21 09:36:36', '2020-01-21 09:36:36', NULL),
	(28, 5, 7, 'الفصل السابع', 'مقياس الرسم', NULL, NULL, NULL, 2, 1, '2020-01-21 09:37:02', '2020-01-21 09:37:02', NULL),
	(29, 5, 8, 'الفصل الثامن', 'قياس المسافات', NULL, NULL, NULL, 2, 1, '2020-01-21 09:39:32', '2020-01-21 09:39:32', NULL),
	(30, 5, 9, 'الفصل التاسع', 'البوصلة', NULL, NULL, NULL, 2, 1, '2020-01-21 09:47:30', '2020-01-21 09:47:31', NULL),
	(31, 5, 10, 'الفصل العاشر', 'توجيه الخارطة ومقارنتها مع الطبيعة', NULL, NULL, NULL, 2, 1, '2020-01-21 09:48:08', '2020-01-21 09:48:08', NULL),
	(32, 6, 1, 'الفصل الأول', 'المقدمة', NULL, NULL, NULL, 2, 1, '2020-01-21 09:49:54', '2020-01-21 09:51:08', NULL),
	(33, 6, 2, 'الفصل الثاني', 'السلاح النووي', NULL, NULL, NULL, 2, 1, '2020-01-21 09:50:55', '2020-01-21 09:50:55', NULL),
	(34, 6, 3, 'الفصل الثالث', 'السلاح الكيماوي', NULL, NULL, NULL, 2, 1, '2020-01-21 11:08:34', '2020-01-21 11:08:34', NULL),
	(35, 6, 4, 'الفصل الرابع', 'السلاح الجرثومي', NULL, NULL, NULL, 2, 1, '2020-01-21 11:09:07', '2020-01-21 11:09:07', NULL),
	(36, 6, 5, 'الفصل الخامس', 'الوقاية الفردية', NULL, NULL, NULL, 2, 1, '2020-01-21 11:09:33', '2020-01-21 11:09:33', NULL),
	(37, 7, 1, 'الفصل الأول', 'البندقية ج36 عيار 5.56 ملم', NULL, NULL, NULL, 2, 1, '2020-01-21 11:10:36', '2020-01-21 11:10:37', NULL),
	(38, 7, 2, 'الفصل الثاني', 'البندقية ج3', NULL, NULL, NULL, 2, 1, '2020-01-21 11:10:58', '2020-01-21 11:10:58', NULL),
	(39, 7, 3, 'الفصل الثالث', 'نصف الرشاش أم بي 5', NULL, NULL, NULL, 2, 1, '2020-01-21 11:11:28', '2020-01-21 11:11:28', NULL),
	(40, 7, 4, 'الفصل الرابع', 'المسدس عيار 9 ملم (براونج)', NULL, NULL, NULL, 2, 1, '2020-01-21 11:12:01', '2020-01-21 11:12:01', NULL),
	(41, 7, 5, 'الفصل الخامس', 'مسدسات جلوك الحركة الآمنة', NULL, NULL, NULL, 2, 1, '2020-01-21 11:12:41', '2020-01-21 11:12:41', NULL),
	(42, 7, 6, 'الفصل السادس', 'الرشاش ام جي 3 عيار 7.62 ملم', NULL, NULL, NULL, 2, 1, '2020-01-21 11:13:42', '2020-01-21 11:13:42', NULL),
	(43, 7, 7, 'الفصل السابع', 'رشاش عيار 50% من البوصة (12.7) ملم', NULL, NULL, NULL, 2, 1, '2020-01-21 11:15:36', '2020-01-21 11:15:36', NULL),
	(44, 7, 8, 'الفصل الثامن', 'القنابل اليدوية', NULL, NULL, NULL, 2, 1, '2020-01-21 11:19:21', '2020-01-21 11:19:21', NULL),
	(45, 7, 9, 'الفصل التاسع', 'إجراءات العمل المستديمة للرماية على الأسلحة الخفيفة', '<p>إجراءات العمل المستديمة للرماية على الأسلحة الخفيفة</p>', NULL, NULL, 2, 1, '2020-01-21 11:23:55', '2020-01-21 11:23:55', NULL),
	(46, 8, 1, 'الفصل الأول', 'مقدمة الإسعافات الأولي', NULL, NULL, NULL, 2, 1, '2020-01-21 11:25:44', '2020-01-21 11:25:44', NULL),
	(47, 8, 2, 'الفصل الثاني', 'الإنعاش القلبي الرئوي', NULL, NULL, NULL, 2, 1, '2020-01-21 11:27:02', '2020-01-21 11:27:02', NULL),
	(48, 8, 3, 'الفصل الثالث', 'الجروح والنزيف', NULL, NULL, NULL, 2, 1, '2020-01-21 11:27:17', '2020-01-21 11:27:17', NULL),
	(49, 8, 4, 'الفصل الرابع', 'الحروق', NULL, NULL, NULL, 2, 1, '2020-01-21 11:27:28', '2020-01-21 11:27:28', NULL),
	(50, 8, 5, 'الفصل الخامس', 'الكسور', NULL, NULL, NULL, 2, 1, '2020-01-21 11:27:44', '2020-01-21 11:27:45', NULL),
	(51, 8, 6, 'الفصل السادس', 'الأزمات القلبية والباطنية', NULL, NULL, NULL, 2, 1, '2020-01-21 11:28:08', '2020-01-21 11:28:08', NULL),
	(52, 8, 7, 'الفصل السابع', 'الصدمة', NULL, NULL, NULL, 2, 1, '2020-01-21 11:28:29', '2020-01-21 11:28:29', NULL),
	(53, 8, 8, 'الفصل الثامن', 'التسمم', NULL, NULL, NULL, 2, 1, '2020-01-21 11:28:43', '2020-01-21 11:28:43', NULL),
	(54, 8, 9, 'الفصل التاسع', 'لسعات الحشرات ولدغات العقارب وعضات الثعابين', NULL, NULL, NULL, 2, 1, '2020-01-21 11:29:12', '2020-01-21 11:29:12', NULL),
	(55, 8, 10, 'الفصل العاشر', 'اصابات أخرى', NULL, NULL, NULL, 2, 1, '2020-01-21 11:29:30', '2020-01-21 11:29:31', NULL),
	(56, 9, 1, 'الفصل الأول', 'القانون الدولي للحرب', NULL, NULL, NULL, 2, 1, '2020-01-21 11:30:00', '2020-01-21 11:30:00', NULL),
	(57, 9, 2, 'الفصل الثاني', 'القانون الدولي الإنساني', NULL, NULL, NULL, 2, 1, '2020-01-21 11:30:14', '2020-01-21 11:30:14', NULL);
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;

-- Dumping structure for table itqan.lesson_files
CREATE TABLE IF NOT EXISTS `lesson_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_index` smallint(6) NOT NULL DEFAULT '0',
  `lesson_id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lesson_files_lesson_id_foreign` (`lesson_id`),
  CONSTRAINT `lesson_files_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.lesson_files: ~3 rows (approximately)
/*!40000 ALTER TABLE `lesson_files` DISABLE KEYS */;
INSERT INTO `lesson_files` (`id`, `file_index`, `lesson_id`, `title`, `file_name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 0, 1, 'مرجع المعلم (باللغة الإنجليزية)', 'teacher-manual.pdf', 'المرجع الرسمي لنظام مودل', '2019-12-29 08:38:32', '2019-12-29 08:38:32', NULL),
	(2, 0, 1, 'جدول دوس البرمجة', 'جدول دوس البرمجة.docx', NULL, '2019-12-29 08:58:10', '2019-12-29 08:58:12', NULL),
	(6, 2, 8, 'التصور المبدئي لمنصة إتقان', 'zJtOUNfAJxzDgd5.pptx', 'إيجاز التصور المبدئي لمنصة إتقان', '2020-01-06 11:18:11', '2020-01-07 09:05:40', '2020-01-07 09:05:40');
/*!40000 ALTER TABLE `lesson_files` ENABLE KEYS */;

-- Dumping structure for table itqan.levels
CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.levels: ~1 rows (approximately)
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` (`id`, `name`, `description`, `created_at`, `updated_at`, `reserved`) VALUES
	(1, 'جميع المستويات', NULL, '2019-12-29 07:47:57', '2019-12-29 07:47:57', 1);
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;

-- Dumping structure for table itqan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.migrations: ~25 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_12_25_200000_create_courses_table', 1),
	(4, '2019_12_25_300000_create_instructors_table', 1),
	(5, '2019_12_25_400000_create_categories_table', 1),
	(6, '2019_12_25_500000_create_levels_table', 1),
	(7, '2019_12_25_600000_create_lessons_table', 1),
	(8, '2019_12_25_700000_create_lesson_files_table', 1),
	(9, '2019_12_29_075623_add_description', 2),
	(10, '2019_12_29_081832_change_description_to_text', 3),
	(11, '2019_12_29_090625_create_questions_table', 4),
	(12, '2019_12_29_101307_create_suggestions_table', 5),
	(13, '2019_12_30_114001_create_mission_levels_table', 6),
	(15, '2019_12_31_094325_add_fields_to_courses', 7),
	(16, '2019_12_31_122729_add_course_id', 8),
	(17, '2020_01_01_090224_create_multimedia_files_table', 9),
	(18, '2020_01_01_104818_create_roles_table', 10),
	(19, '2020_01_02_100845_add_soft_delete', 11),
	(20, '2020_01_06_091227_add_lesson_index', 12),
	(21, '2020_01_06_092123_add_index_feild', 13),
	(22, '2020_01_20_095749_add_mission_level_to_courses', 14),
	(25, '2020_01_21_085301_remove_lesson_level', 15),
	(27, '2020_01_22_110452_add_editable_field_to_some_tables', 16),
	(28, '2020_01_22_121902_add_user_id_to_instructors', 17),
	(30, '2020_01_23_085924_add_notes_to_suggestions', 18);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table itqan.mission_levels
CREATE TABLE IF NOT EXISTS `mission_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mission_levels_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.mission_levels: ~5 rows (approximately)
/*!40000 ALTER TABLE `mission_levels` DISABLE KEYS */;
INSERT INTO `mission_levels` (`id`, `name`, `created_at`, `updated_at`, `reserved`) VALUES
	(1, 'غير مرتبط', '2019-12-30 11:47:41', '2019-12-30 11:47:41', 1),
	(2, 'المحتوى المعرفي للمستوى المهاري الأول', '2019-12-30 11:47:41', '2019-12-30 11:47:41', 0),
	(3, 'المحتوى المعرفي للمستوى المهاري الثاني', '2019-12-30 11:47:42', '2019-12-30 11:47:42', 0),
	(4, 'المحتوى المعرفي للمستوى المهاري الثالث', '2019-12-30 11:47:42', '2019-12-30 11:47:42', 0),
	(5, 'المحتوى المعرفي للمستوى المهاري الرابع', '2020-01-20 09:53:51', '2020-01-20 09:53:52', 0);
/*!40000 ALTER TABLE `mission_levels` ENABLE KEYS */;

-- Dumping structure for table itqan.multimedia_files
CREATE TABLE IF NOT EXISTS `multimedia_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.multimedia_files: ~0 rows (approximately)
/*!40000 ALTER TABLE `multimedia_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `multimedia_files` ENABLE KEYS */;

-- Dumping structure for table itqan.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table itqan.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_index` smallint(6) NOT NULL DEFAULT '0',
  `lesson_id` int(10) unsigned NOT NULL,
  `question` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `A` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `B` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `C` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `D` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `correct` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.questions: ~7 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `question_index`, `lesson_id`, `question`, `A`, `B`, `C`, `D`, `correct`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 'السؤال الأول السؤال الأول السؤال الأول', 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول', 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني', 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث', 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع', 'B', NULL, '2019-12-29 09:16:16', '2019-12-29 09:16:16', NULL),
	(2, 2, 1, 'السؤال الثاني السؤال الثاني السؤال الثاني', 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول', 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني', 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث', 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع', 'B', NULL, '2019-12-29 09:16:17', '2019-12-29 09:16:17', NULL),
	(3, 3, 1, 'السؤال الثالث السؤال الثالث السؤال الثالث', 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول', 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني', 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث', 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع', 'B', NULL, '2019-12-29 09:16:17', '2019-12-29 09:16:17', NULL),
	(4, 4, 1, 'السؤال الرابع السؤال الرابع السؤال الرابع', 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول', 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني', 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث', 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع', 'B', NULL, '2019-12-29 09:16:17', '2019-12-29 09:16:17', NULL),
	(5, 5, 1, 'السؤال الخامس السؤال الخامس السؤال الخامس', 'الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول الاختيار الأول', 'الاختيار الثاني الاختيار الثاني الاختيار الثاني الاختيار الثاني', 'الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث الاختيار الثالث', 'الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع الاختيار الرابع', 'B', NULL, '2019-12-29 09:16:17', '2019-12-29 09:16:17', NULL),
	(7, 1, 8, 'السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال السؤال', 'إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ', 'إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب', 'إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج', 'إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د', 'D', NULL, '2020-01-06 10:00:47', '2020-01-06 10:28:23', '2020-01-06 10:28:23'),
	(8, 1, 8, 'نص السؤالنص السؤالنص السؤالنص السؤالنص السؤالنص السؤالنص السؤالنص السؤالنص السؤال', 'إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ إجابة أ', 'إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب إجابة ب', 'إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج إجابة ج', 'إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د إجابة د', 'B', NULL, '2020-01-07 08:40:20', '2020-01-07 09:03:19', '2020-01-07 09:03:19'),
	(9, 2, 8, 'السؤأل الثاني السؤأل الثاني السؤأل الثاني السؤأل الثاني السؤأل الثاني', 'يابمبيلنبلىبلتخت', 'نمىيبتثقحخيبمكوك', 'نمتةبمنةلحخقثن', 'نمكةطلةمككسبيل', 'A', NULL, '2020-01-07 08:40:44', '2020-01-07 09:03:19', '2020-01-07 09:03:19');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Dumping structure for table itqan.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.roles: ~7 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2020-01-01 10:55:21', '2020-01-01 10:55:21'),
	(2, 'courses', '2020-01-01 10:55:21', '2020-01-01 10:55:21'),
	(3, 'lessons', '2020-01-01 10:55:21', '2020-01-01 10:55:21'),
	(4, 'multimedia', '2020-01-01 10:55:21', '2020-01-01 10:55:21'),
	(5, 'users', '2020-01-01 10:55:21', '2020-01-01 10:55:21'),
	(6, 'tables', '2020-01-08 12:16:50', '2020-01-08 12:16:51'),
	(7, 'my-lessons', '2020-01-21 09:37:27', '2020-01-21 09:37:27');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table itqan.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.role_user: ~7 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
	(2, 2),
	(2, 3),
	(3, 4),
	(1, 1),
	(5, 1),
	(4, 7);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table itqan.suggestions
CREATE TABLE IF NOT EXISTS `suggestions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lesson_id` int(10) unsigned NOT NULL,
  `rank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `military_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suggestion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `shown_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.suggestions: ~5 rows (approximately)
/*!40000 ALTER TABLE `suggestions` DISABLE KEYS */;
INSERT INTO `suggestions` (`id`, `lesson_id`, `rank`, `name`, `military_number`, `department`, `suggestion`, `notes`, `shown_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'رقيب أول', 'عبدالحميد الشهري', '9999', 'التعليم', 'المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح المقترح', NULL, NULL, '2019-12-29 10:42:16', '2020-01-23 11:28:43', '2020-01-23 11:28:43'),
	(2, 1, 'رقيب أول', 'عبدالحميد الشهري', '9999', 'التعليم', 'المقترحالمقترحالمقترحالمقترحالمقترحالمقترحالمقترحالمقترحالمقترحالمقترحالمقترح', NULL, NULL, '2019-12-29 10:46:17', '2020-01-23 11:29:23', '2020-01-23 11:29:23'),
	(3, 1, 'رقيب', 'فهد بن سعيد الغامدي', '530819', 'التعليم', 'أقترح أن يشيلون المعاريض قبل الاستئذان', 'ملاحظات ملاحظات ملاحظات ملاحظات ملاحظات ملاحظات ملاحظات ملاحظات ملاحظات', '2020-01-23', '2019-12-29 11:03:33', '2020-01-26 07:55:23', NULL),
	(4, 1, 'رقيب', 'عاصم هزازي', '7828', 'التعليم', 'أقترح أي شي', 'ملاحظات ملاحظات ملاحظات ملاحظات', NULL, '2019-12-29 11:05:07', '2020-01-26 07:55:39', NULL),
	(5, 37, 'رقيب أول', 'عاصم هزازي', '3931', 'التعليم', 'المقترحالمقترحالمقترحالمقترحالمقترح', 'ملاحظات ملاحظات ملاحظات ملاحظات ملاحظات', NULL, '2020-01-23 08:44:29', '2020-01-26 07:56:21', '2020-01-26 07:56:21');
/*!40000 ALTER TABLE `suggestions` ENABLE KEYS */;

-- Dumping structure for table itqan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Active Directory Group',
  `ad_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Active Directory Name',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table itqan.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `department`, `section`, `ad_group`, `ad_name`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'حسن باعبدالله', 'adx272@rsadf.mil', '$2y$10$zoRS/FHZ6XzcMiq0IvzecO7JUEVgExd.iL2WioNVHbsFtyP8A3NAm', 1, 'التعليم', 'التعليم الإلكتروني', NULL, NULL, 'scihbXe5XF6M8yMoTlfcswfURnUoyEDubHqexbCczjwoI4HkZTu1cvCjDwiL', '2019-12-29 07:44:37', '2020-01-08 08:57:03', NULL),
	(2, 'محسن الحربي', 'adx001@rsadf.mil', '$2y$10$nn1CX//pQDlIk6efQToK3uzeL0uE3Xt6fHBC3ZlTJliX8wyLWj/0a', 0, 'التعليم', 'التعليم الإلكتروني', NULL, NULL, NULL, '2020-01-02 08:02:05', '2020-01-08 11:09:31', '2020-01-08 11:09:31'),
	(3, 'عاصم هزازي', 'ado852@rsadf.mil', '$2y$10$AZx5IqxzlPXvAzf3fO8gyubUbnb4Wc9XlO/.fTITBx8rsPIysKH/i', 0, 'التعليم', 'التعليم الإلكتروني', NULL, NULL, NULL, '2020-01-08 10:39:29', '2020-01-08 11:09:23', '2020-01-08 11:09:23'),
	(4, 'محسن الحربي', 'adx096@rsadf.mil', '$2y$10$YnfXahRarQUmVu5G/2Ni7OMWnNBQPq5V2daZVdtB5VLT8Yg/i5GbG', 0, 'التعليم', 'التعليم الإلكتروني', NULL, NULL, 'ZdJlUE1YjNIJM1dYtOYKfgr8I9ZO59kh63gVaBAdXwwXCLd6mtU1HqPJwdhm', '2020-01-08 11:44:05', '2020-01-22 11:13:47', NULL),
	(5, 'العقيد/ محمد بن مسفر العتيبي', 'ado888@rsadf.mil', '$2y$10$xqP.fW8OP5zzMKFZe7mw5uT1jWyj1/nvqu203vswUxLcVWIXG8srS', 0, 'التعليم', 'التعليم الإلكتروني', NULL, NULL, NULL, '2020-01-22 10:24:46', '2020-01-22 10:24:46', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
