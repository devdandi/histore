INSERT INTO `business_settings` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES (NULL, 'google_recaptcha', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
ALTER TABLE `users` ADD `new_email_verificiation_code` TEXT NULL DEFAULT NULL AFTER `email_verified_at`;
ALTER TABLE `products` ADD `min_qty` INT NOT NULL DEFAULT '1' AFTER `unit`;
