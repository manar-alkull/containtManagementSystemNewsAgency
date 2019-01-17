-- mohammad mustafa add tables roles and permission and role_permission

-- mohammad mustafa add table roles
CREATE TABLE `ai-project`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`));

-- mohammad mustafa add table permissions
CREATE TABLE `ai-project`.`permissions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`));

-- mohammad mustafa add table role_permission
  CREATE TABLE `ai-project`.`role_permission` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role_id` INT NOT NULL,
  `permission_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `role_fk_idx` (`role_id` ASC),
  INDEX `permission_fk_idx` (`permission_id` ASC),
  CONSTRAINT `role_fk`
    FOREIGN KEY (`role_id`)
    REFERENCES `ai-project`.`roles` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `permission_fk`
    FOREIGN KEY (`permission_id`)
    REFERENCES `ai-project`.`permissions` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);

-- insert 3 roles to table roles
INSERT INTO `ai-project`.`roles` (`name`) VALUES ('Admin');
INSERT INTO `ai-project`.`roles` (`name`) VALUES ('Data Entry');
INSERT INTO `ai-project`.`roles` (`name`) VALUES ('User');

-- make role column in user table

ALTER TABLE `ai-project`.`users`
ADD INDEX `role_fk_idx_2` (`role` ASC);
ALTER TABLE `ai-project`.`users`
ADD CONSTRAINT `user_role_fk`
  FOREIGN KEY (`role`)
  REFERENCES `ai-project`.`roles` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;


-- insert actions to table permissions

INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('TemplateController@index');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('TemplateController@showCategory');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('TemplateController@showItemPerPage');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('TemplateController@showCategoryList');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('MenuController@index');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('CategoryController@index');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('PermissionController@index');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('UserController@index');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('MenuController@add');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('MenuController@update');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('MenuController@save');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('MenuController@delete');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('CategoryController@add');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('CategoryController@update');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('CategoryController@save');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('CategoryController@delete');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('ItemController@index');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('ItemController@add');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('ItemController@update');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('ItemController@show');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('ItemController@delete');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('LanguageController@index');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('LanguageController@add');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('LanguageController@update');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('LanguageController@save');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('LanguageController@delete');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('LanguageController@changeLanguageSession');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('DictionaryController@index');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('DictionaryController@update');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('DictionaryController@save');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('UserController@changeRole');
INSERT INTO `ai-project`.`permissions` (`name`) VALUES ('AuthController@showLoginForm');
