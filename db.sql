DROP DATABASE IF EXISTS `police`;

CREATE DATABASE `police`;

USE `police`;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `UserID`        INT(10)      NOT NULL AUTO_INCREMENT,
  `fname`         VARCHAR(40)  NOT NULL,
  `lname`         VARCHAR(40)  NOT NULL,
  `email`         VARCHAR(40)  NOT NULL UNIQUE,
  `idnumber`      INT(10)      NOT NULL UNIQUE,
  `username`      VARCHAR(20)  NOT NULL UNIQUE,
  `password`      VARCHAR(100) NOT NULL,
  `rank`          INT(1)       NOT NULL,
  `profile_image` VARCHAR(200) NOT NULL,
  `pf_no`         VARCHAR(60)  NOT NULL,
  `gender`        VARCHAR(20)  NOT NULL,
  `age`           INT(100)     NOT NULL,
  `phone_no`      VARCHAR(30)  NOT NULL,
  `timestamp`     TIMESTAMP             DEFAULT NOW(),

  PRIMARY KEY (`userID`)
);


CREATE TABLE `suspects` (
  `sus_id`       INT(4)       NOT NULL AUTO_INCREMENT,
  `sus_level`     VARCHAR(255) NOT NULL,
  `sus_fname`     VARCHAR(255) NOT NULL,
  `sus_lname`     VARCHAR(255) NOT NULL,
  `sus_phone`     VARCHAR(255) NOT NULL,
  `sus_case_no`   VARCHAR(255) NOT NULL,
  `sus_category`  VARCHAR(255) NOT NULL,
  `sus_dob`        DATETIME     NOT NULL,
  `sus_id_number` VARCHAR(255) NOT NULL,
  `sus_gender`    VARCHAR(255) NOT NULL,
  `arrest_point`  VARCHAR(100) NOT NULL,
  `crime_desc`    VARCHAR (255) NOT NULL, 
  `arrest_time`   DATETIME     NOT NULL,
  `bail`          VARCHAR(255)     NOT NULL,
  `amount`         INT(11)      NOT NULL,
  PRIMARY KEY (`sus_id`)
);

CREATE TABLE `cases` (
  `case_id`   INT(4)       NOT NULL AUTO_INCREMENT,
  `case_name` VARCHAR(255) NOT NULL,
  `location`  VARCHAR(255) NOT NULL,
  `case_desc` VARCHAR(255) NOT NULL,
  `opened`    TIMESTAMP              DEFAULT NOW(),
  `closed`    DATETIME     NOT NULL,
  `sus_id`    INT(4)       NOT NULL,
  `UserID`    INT(10)      NOT NULL,
  `fname`     VARCHAR(255) NOT NULL,
  `lname`     VARCHAR(255) NOT NULL,  
  PRIMARY KEY (`case_id`)

);

CREATE TABLE `cells` (
  `cell_id`       INT(4)       NOT NULL AUTO_INCREMENT,
  `cell_name`     VARCHAR(255) NOT NULL,
  `cell_capacity` INT(100)     NOT NULL,
  `sus_id`        INT(4)       NOT NULL,
  PRIMARY KEY (`cell_id`)

);
CREATE TABLE `claims` (
  `claim_id`      INT(4)       NOT NULL AUTO_INCREMENT,
  `claim_name`    VARCHAR(255) NOT NULL,
  `claim_desc` VARCHAR(300) NOT NULL,
   `claim_location` VARCHAR(300) NOT NULL,
  `userID`        VARCHAR(255) NOT NULL,
  `claim_email`    VARCHAR(255) NOT NULL,
  `claim_report_date` TIMESTAMP  DEFAULT NOW(),
  
  PRIMARY KEY (`claim_id`)
);
