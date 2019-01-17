-- diaa 10/11 */
CREATE TABLE `ai-project`.`languages` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
--
CREATE TABLE `ai-project`.`menus_languages` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `menus_id` INT(11) NOT NULL , `language_id` INT(11) NOT NULL , `name` VARCHAR(55) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
--
CREATE TABLE `ai-project`.`categories_languages` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `categorie_id` INT(11) NOT NULL , `language_id` INT(11) NOT NULL , `name` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
--
CREATE TABLE `ai-project`.`items_languages` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `item_id` INT(11) NOT NULL , `language_id` INT(11) NOT NULL , `name` VARCHAR(255) NOT NULL , `title` VARCHAR(255) NOT NULL , `content` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
--
ALTER TABLE `items_languages` ADD FOREIGN KEY (`item_id`) REFERENCES `items`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
ALTER TABLE `items_languages` ADD FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
ALTER TABLE `items_languages` CHANGE `item_id` `item_id` INT(10) UNSIGNED NOT NULL;
--
ALTER TABLE `items_languages` ADD FOREIGN KEY (`item_id`) REFERENCES `items`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
ALTER TABLE `menus_languages` ADD FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
ALTER TABLE `menus_languages` ADD FOREIGN KEY (`menus_id`) REFERENCES `menus`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
ALTER TABLE `categories_languages` ADD FOREIGN KEY (`language_id`) REFERENCES `languages`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
ALTER TABLE `categories_languages` CHANGE `categorie_id` `categorie_id` INT(10) UNSIGNED NOT NULL;
--
ALTER TABLE `categories_languages` ADD FOREIGN KEY (`categorie_id`) REFERENCES `categories`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
CREATE TABLE `ai-project`.`dictionarys` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `lang1` VARCHAR(255) NOT NULL , `lang2` VARCHAR(255) NOT NULL , `lang3` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
--
INSERT INTO `languages` (`id`, `name`) VALUES ('1', 'English'), ('2', 'Arabic');
--