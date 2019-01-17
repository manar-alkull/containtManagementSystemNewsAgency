-- mohammad mustafa make image_title and image_alt accept null
ALTER TABLE `items_languages` CHANGE `image_title` `image_title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `image_alt` `image_alt` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

--------------diaa add custom languages
CREATE TABLE `ai-project`.`customs_languages` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `custom_field_id` INT(10) NOT NULL , `language_id` INT(11) NOT NULL , `name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

 ALTER TABLE `customs_languages` ADD FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `customs_languages` CHANGE `custom_field_id` `custom_field_id` INT(10) UNSIGNED NOT NULL;
ALTER TABLE `customs_languages` ADD FOREIGN KEY (`custom_id`) REFERENCES `custom_fields`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `ai-project`.`fieldvalues_languages` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `fieldvalue_id` INT(10) NOT NULL , `language_id` INT(11) NOT NULL , `value` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `fieldvalues_languages` CHANGE `fieldvalue_id` `fieldvalue_id` INT(10) UNSIGNED NOT NULL;
ALTER TABLE `fieldvalues_languages` ADD FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `fieldvalues_languages` ADD FOREIGN KEY (`fieldvalue_id`) REFERENCES `fieldvalues`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;




-- diaa make meta-data accept null
ALTER TABLE `items_metas` CHANGE `title` `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `content` `content` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `keywords` `keywords` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL;


ALTER TABLE `categories_metas` CHANGE `title` `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `content` `content` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `keywords` `keywords` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL;



