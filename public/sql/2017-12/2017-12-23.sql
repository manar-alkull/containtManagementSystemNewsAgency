CREATE TABLE `ai-project`.`categories_metas` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `cat_id` INT(11) UNSIGNED NOT NULL , `language_id` INT(11) NOT NULL , `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `content` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `keywords` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_by` INT(11) NOT NULL , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_by` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


ALTER TABLE `categories_metas` ADD FOREIGN KEY (`cat_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
 ALTER TABLE `categories_metas` ADD FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;