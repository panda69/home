RENAME TABLE `home`.`cercles` TO `home`.`casinos` ;
RENAME TABLE `home`.`pays` TO `home`.`countries` ;
ALTER TABLE `casinos` CHANGE `pays_id` `country_id` INT( 10 ) UNSIGNED NOT NULL;
RENAME TABLE `home`.`seances` TO `home`.`sessions`;
ALTER TABLE `sessions` CHANGE `cercle_id` `casino_id` INT( 10 ) UNSIGNED NOT NULL;
