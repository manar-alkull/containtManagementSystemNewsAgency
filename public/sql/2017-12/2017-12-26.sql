

CREATE TABLE `ai-project`.`template` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


ALTER TABLE `categories` ADD `template_id` INT(11) NOT NULL AFTER `updated_at`;



ALTER TABLE `customs_languages` DROP FOREIGN KEY `customs_languages_ibfk_2`; ALTER TABLE `customs_languages` ADD CONSTRAINT `customs_languages_ibfk_2` FOREIGN KEY (`custom_field_id`) REFERENCES `custom_fields`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `categories` ADD FOREIGN KEY (`template_id`) REFERENCES `template`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO `template` (`id`, `name`) VALUES (NULL, 'first');
INSERT INTO `template` (`id`, `name`) VALUES (NULL, 'second');

