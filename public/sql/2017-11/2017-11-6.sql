-- mohammad mustafa add column role to table users
ALTER TABLE `users` ADD COLUMN `role` INT NULL AFTER `updated_at`;