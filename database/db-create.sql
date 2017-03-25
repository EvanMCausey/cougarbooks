DROP TABLE IF EXISTS `ad`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `ad_log`;
DROP TABLE IF EXISTS `user_log`;

CREATE TABLE `user`(
	`user_id` INTEGER AUTO_INCREMENT,
	`user_password` CHAR(64) NOT NULL,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	`email_address` VARCHAR(320) NOT NULL,
	`telephone_no` VARCHAR(12),
	`is_admin` TINYINT(1) NOT NULL DEFAULT 0,
	PRIMARY KEY user_PK (`user_id`)
);

CREATE TABLE `ad`(
	`ad_id` INTEGER AUTO_INCREMENT,
	`user_id` INT NOT NULL,
	`book_title` VARCHAR(100) NOT NULL,
	`book_author` VARCHAR(100) NOT NULL,
	`book_edition` VARCHAR(100),
	`book_isbn` VARCHAR(17) NOT NULL,
	`listed_price` decimal(8,2) DEFAULT 0,
	`path_to_picture` VARCHAR(255),
	`ad_description` VARCHAR(200),
	`creation_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`is_closed` BOOLEAN NOT NULL DEFAULT 0,
	PRIMARY KEY ad_PK (`ad_id`),
	FOREIGN KEY user_FK (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);


CREATE TABLE `user_log`(
	`action_id` INTEGER AUTO_INCREMENT,
	`user_id` INTEGER,
	`action` ENUM('signin', 'signout'),
	`action_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY user_log_PK(`action_id`),
	FOREIGN KEY user_log_FK(`user_id`) REFERENCES `user`(`user_id`)
);


CREATE TABLE `ad_log`(
	`action_id` INTEGER AUTO_INCREMENT,
	`ad_id` INTEGER,
	`action` ENUM('added', 'edited', 'closed'),
	`action_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY ad_log_PK(`action_id`),
	FOREIGN KEY ad_log_FK(`ad_id`) REFERENCES `ad`(`ad_id`)
);
