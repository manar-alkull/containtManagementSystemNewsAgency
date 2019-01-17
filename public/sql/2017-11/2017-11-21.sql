ALTER TABLE `ai-project`.`menus` ADD INDEX `parent_index` (`parent_id`);
ALTER TABLE `menus` ADD CONSTRAINT `fk_parent-menues` FOREIGN KEY (`parent_id`) REFERENCES `ai-project`.`menus`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ai-project`.`menus` ADD INDEX `cat_index` (`cat_id`);


ALTER TABLE `categories` CHANGE `id` `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE categories` ADD INDEX `parent_index` (`parent_id`);

ALTER TABLE `menus` ADD CONSTRAINT `fk_cat_menus_tables` FOREIGN KEY (`cat_id`) REFERENCES `ai-project`.`categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `categories` CHANGE `parent_id` `parent_id` INT(11) UNSIGNED NULL DEFAULT NULL;

ALTER TABLE `categories` ADD CONSTRAINT `fk_parent-cat` FOREIGN KEY (`parent_id`) REFERENCES `ai-project`.`categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ai-project`.`items` ADD INDEX `cat_item_index` (`cat_id`);

ALTER TABLE `items` CHANGE `cat_id` `cat_id` INT(11) UNSIGNED NOT NULL;

ALTER TABLE `items` ADD CONSTRAINT `fk_cat_items` FOREIGN KEY (`cat_id`) REFERENCES `ai-project`.`categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `categories` DROP FOREIGN KEY `fk_parent-cat`; ALTER TABLE `categories` ADD CONSTRAINT `fk_parent-cat` FOREIGN KEY (`parent_id`) REFERENCES `ai-project`.`categories`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

ALTER TABLE `categories` DROP FOREIGN KEY `fk_parent-cat`; ALTER TABLE `categories` ADD CONSTRAINT `fk_parent-cat` FOREIGN KEY (`parent_id`) REFERENCES `ai-project`.`categories`(`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `menus` CHANGE `type` `type` ENUM('list of categories','navbar','footer','aside','category','item per page') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;


