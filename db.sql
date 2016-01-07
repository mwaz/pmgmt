DROP DATABASE IF EXISTS `police`;

CREATE DATABASE `police`;

USE `police`;

DROP TABLE IF EXISTS `user`;

CREATE TABLE `users` (
  `UserID`        INT(10)      NOT NULL AUTO_INCREMENT,
  `fname`         VARCHAR(40)  NOT NULL,
  `lname`         VARCHAR(40)  NOT NULL,
  `email`         VARCHAR(40)  NOT NULL UNIQUE,
  `idnumber`      INT(10)      NOT NULL UNIQUE, 
  `username`      VARCHAR(20)  NOT NULL UNIQUE,
  `password`      VARCHAR(100) NOT NULL,
  `rank`          INT(1)       NOT NULL,
  `profile_image` VARCHAR(200),
  `pf_no`         VARCHAR(60)  NOT NULL,
  `gender`        VARCHAR(20)  NOT NULL,
  `age`           INT(100)     NOT NULL,
  `phone_no`      VARCHAR(30)  NOT NULL,
  `timestamp`     TIMESTAMP             DEFAULT NOW(),

  PRIMARY KEY (`userID`)
);


CREATE TABLE `criminals` (
  `sus_id`       INT(4)       NOT NULL AUTO_INCREMENT,
  `sus_name`     VARCHAR(255) NOT NULL,
  `arrest_point` VARCHAR(100) NOT NULL,
  `arrest_time`  DATETIME     NOT NULL,
  `bail`         INT(11)      NOT NULL,
  PRIMARY KEY (`sus_id`)
);

CREATE TABLE `cases` (
  `case_id`   INT(4)       NOT NULL AUTO_INCREMENT,
  `case_name` VARCHAR(255) NOT NULL,
  `location`  VARCHAR(255) NOT NULL,
  `case_desc` VARCHAR(255)  NOT NULL,
  `opened`    DATETIME     NOT NULL,
  `closed`    DATETIME     NOT NULL,
  `sus_id`    INT(4)       NOT NULL,
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
  `claim_details` VARCHAR(300),
  `userid`        VARCHAR(255)       NOT NULL,
  `c_email`        VARCHAR(255) NOT NULL,
  PRIMARY KEY (`claim_id`)
);
