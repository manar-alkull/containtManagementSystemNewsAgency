-- mohammad mustafa add new value to enum
ALTER TABLE `ai-project`.`menus`
CHANGE COLUMN `type` `type` ENUM('list of categories', 'navbar', 'footer', 'aside', 'category', 'item per page', 'form per page') NOT NULL ;
