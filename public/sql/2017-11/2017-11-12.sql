
-- diaa --

ALTER TABLE `menus_languages` ADD `created_at` DATETIME NOT NULL AFTER `name`, ADD `created_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `updated_at`;

ALTER TABLE `items_languages` ADD `created_at` DATETIME NOT NULL AFTER `name`, ADD `created_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `updated_at`;

ALTER TABLE `categories_languages` ADD `created_at` DATETIME NOT NULL AFTER `name`, ADD `created_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `updated_at`;

ALTER TABLE `languages` ADD `created_at` DATETIME NOT NULL AFTER `name`, ADD `created_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `updated_at`;

ALTER TABLE `dictionarys` ADD `created_at` DATETIME NOT NULL AFTER `id`, ADD `created_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `updated_at`;

-- mohammad mustafa make column cat_id in table menus accept null value
ALTER TABLE `items` ADD COLUMN `description` TEXT NULL DEFAULT NULL AFTER `updated_at`;

--diaa--

ALTER TABLE `categories_languages` CHANGE `created_at` `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `menus_languages` CHANGE `created_at` `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `items_languages` CHANGE `created_at` `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `languages` CHANGE `created_at` `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `dictionarys` CHANGE `created_at` `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `updated_at` `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;


