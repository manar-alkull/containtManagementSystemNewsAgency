ALTER TABLE `items_languages` ADD `description` TEXT NOT NULL AFTER `content`;

ALTER TABLE `items_languages` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `items_languages` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE `menus_languages` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `menus_languages` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE `categories_languages` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `categories_languages` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE `dictionarys` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `dictionarys` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE `languages` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `languages` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE `categories` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `categories` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE `items` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `items` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE `menus` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `menus` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE `users` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `users` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;



ALTER TABLE `dictionarys` ADD `English` VARCHAR(255) NOT NULL AFTER `updated_by`;

ALTER TABLE `dictionarys` ADD `العربية` VARCHAR(255) NOT NULL AFTER `English`;


