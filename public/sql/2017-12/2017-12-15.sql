-- manar add custom field tables
CREATE TABLE `custom_fields` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `name` varchar(50) NOT NULL,
 `type` varchar(4) NOT NULL,
 `category_id` int(10) unsigned DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `coustomField_category_fk` (`category_id`),
 CONSTRAINT `coustomField_category_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;


CREATE TABLE `fieldvalues` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `value` varchar(50) NOT NULL,
 `field_id` int(10) unsigned NOT NULL,
 `item_id` int(10) unsigned NOT NULL,
 PRIMARY KEY (`id`),
 KEY `fieldValue_field2_fk` (`field_id`),
 KEY `fieldValue_item2_fk` (`item_id`),
 CONSTRAINT `fieldValue2_field_fk` FOREIGN KEY (`field_id`) REFERENCES `custom_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
 CONSTRAINT `fieldValue2_item_fk` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- diaa add meta data tables

CREATE TABLE `ai-project`.`items_metas` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `item_id` INT(10) UNSIGNED NOT NULL , `language_id` INT(11) NOT NULL , `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `content` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_by` INT(11) NOT NULL , `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_by` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;



ALTER TABLE `items_metas` ADD FOREIGN KEY (`item_id`) REFERENCES `items`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `items_metas` ADD FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;