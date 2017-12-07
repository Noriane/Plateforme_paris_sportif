CREATE DATABASE IF NOT EXISTS `space_jam`;
USE `space_jam`;

CREATE TABLE IF NOT EXISTS `User`;
CREATE TABLE `User` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`groupe` INT NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Team`;
CREATE TABLE `Team` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`team_name` varchar NOT NULL UNIQUE,
	`nb_players` INT NOT NULL,
	`nb_matches` INT NOT NULL,
	`coach_name` varchar,
	`nationality` varchar NOT NULL,
	`team_logo` varchar,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Match`;
CREATE TABLE `Match` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`team_1` INT NOT NULL AUTO_INCREMENT,
	`team_2` INT NOT NULL AUTO_INCREMENT,
	`winner` INT NOT NULL,
	`looser` INT NOT NULL,
	`score_win` INT NOT NULL,
	`score_loose` INT NOT NULL,
	`match_date` DATETIME NOT NULL,
	`playground` INT NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Player`;
CREATE TABLE `Player` (
	`Id` INT NOT NULL AUTO_INCREMENT,
	`player_name` varchar(255) NOT NULL,
	`birthdate` DATETIME NOT NULL,
	`height` FLOAT NOT NULL,
	`weight` FLOAT NOT NULL,
	`team_id` INT NOT NULL,
	`weight` FLOAT NOT NULL,
	`player_picture` varchar(255),
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`Id`)
);

CREATE TABLE IF NOT EXISTS `Playground`;
CREATE TABLE `Playground` (
	`Id` INT NOT NULL AUTO_INCREMENT,
	`playground_name` varchar(255) NOT NULL,
	`country` INT NOT NULL,
	`playground_picture` varchar(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	`nb_supporter_max` INT NOT NULL DEFAULT '40000',
	PRIMARY KEY (`Id`)
);

CREATE TABLE IF NOT EXISTS `Country`;
CREATE TABLE `Country` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`country_name` varchar(255) NOT NULL,
	`flag` varchar(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Stats_player`;
CREATE TABLE `Stats_player` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_player` INT NOT NULL,
	`id_match` INT NOT NULL,
	`nb_match` INT NOT NULL,
	`nb_points` INT NOT NULL,
	`nb_faults` INT NOT NULL,
	`nb_rebounds` INT NOT NULL,
	`nb_assists` INT NOT NULL,
	`ban` INT NOT NULL DEFAULT '0',
	`game_time` FLOAT NOT NULL,
	`no_game_time` FLOAT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Stats_team`;
CREATE TABLE `Stats_team` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_team` INT NOT NULL,
	`nb_win` INT NOT NULL,
	`nb_loose` INT NOT NULL,
	`nb_played_match` INT NOT NULL,
	`nb_team_played` INT NOT NULL,
	`nb_points` INT NOT NULL,
	`nb_rebounds` INT NOT NULL,
	`nb_faults` INT NOT NULL,
	`nb_assists` INT NOT NULL,
	`nb_played_time` INT NOT NULL,
	`weight` FLOAT NOT NULL,
	`age_average` FLOAT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Stats_match`;
CREATE TABLE `Stats_match` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_matches` INT NOT NULL,
	`nb_points` INT NOT NULL,
	`nb_rebounds` INT NOT NULL,
	`nb_assists` INT NOT NULL,
	`nb_faults` INT NOT NULL,
	`nb_supporter` INT NOT NULL,
	`match_duration` INT(2880) NOT NULL,
	`playground` varchar NOT NULL,
	`country` varchar NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Stats_playground`;
CREATE TABLE `Stats_playground` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_playground` INT NOT NULL,
	`nb_matches` INT,
	`nb_team` INT,
	`nb_points` INT,
	`nb_assists` INT,
	`nb_rebounds` INT,
	`nb_faults` INT,
	PRIMARY KEY (`id`)
);

ALTER TABLE `Team` ADD CONSTRAINT `Team_fk0` FOREIGN KEY (`nationality`) REFERENCES `Country`(`id`);

ALTER TABLE `Match` ADD CONSTRAINT `Match_fk0` FOREIGN KEY (`team_1`) REFERENCES `Team`(`id`);

ALTER TABLE `Match` ADD CONSTRAINT `Match_fk1` FOREIGN KEY (`team_2`) REFERENCES `Team`(`id`);

ALTER TABLE `Match` ADD CONSTRAINT `Match_fk2` FOREIGN KEY (`winner`) REFERENCES `Team`(`id`);

ALTER TABLE `Match` ADD CONSTRAINT `Match_fk3` FOREIGN KEY (`looser`) REFERENCES `Team`(`id`);

ALTER TABLE `Match` ADD CONSTRAINT `Match_fk4` FOREIGN KEY (`playground`) REFERENCES `Playground`(`Id`);

ALTER TABLE `Player` ADD CONSTRAINT `Player_fk0` FOREIGN KEY (`team_id`) REFERENCES `Team`(`id`);

ALTER TABLE `Playground` ADD CONSTRAINT `Playground_fk0` FOREIGN KEY (`country`) REFERENCES `Country`(`id`);

ALTER TABLE `Stats_player` ADD CONSTRAINT `Stats_player_fk0` FOREIGN KEY (`id_player`) REFERENCES `Player`(`Id`);

ALTER TABLE `Stats_player` ADD CONSTRAINT `Stats_player_fk1` FOREIGN KEY (`id_match`) REFERENCES `Match`(`id`);

ALTER TABLE `Stats_team` ADD CONSTRAINT `Stats_team_fk0` FOREIGN KEY (`id_team`) REFERENCES `Team`(`id`);

ALTER TABLE `Stats_match` ADD CONSTRAINT `Stats_match_fk0` FOREIGN KEY (`id_matches`) REFERENCES `Match`(`id`);

ALTER TABLE `Stats_match` ADD CONSTRAINT `Stats_match_fk1` FOREIGN KEY (`playground`) REFERENCES `Playground`(`playground_name`);

ALTER TABLE `Stats_match` ADD CONSTRAINT `Stats_match_fk2` FOREIGN KEY (`country`) REFERENCES `Playground`(`country`);

ALTER TABLE `Stats_playground` ADD CONSTRAINT `Stats_playground_fk0` FOREIGN KEY (`id_playground`) REFERENCES `Playground`(`Id`);

