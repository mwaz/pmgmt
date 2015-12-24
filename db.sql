DROP DATABASE IF EXISTS `police`;

CREATE DATABASE `police`;
USE `police`;

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User`(
	`UserID` int (10) NOT NULL AUTO_INCREMENT,
	`Fname` varchar (200) NOT NULL,
	 `Lname` varchar (200) NOT NULL,
	 `Email` varchar (200) NOT NULL ,
	 `idNumber` INT (10) NOT NULL UNIQUE,
	  `Username` varchar (200) NOT NULL UNIQUE,
	 `Password` varchar (200) NOT NULL,
	`rank`  INT(1) NOT NULL,
  `profile_image` varchar (200),
	`Timestamp` timestamp DEFAULT NOW(),

	PRIMARY KEY (`UserID`)
	 );


CREATE TABLE `Criminals`(
  `sus_id` INT(4) NOT NULL AUTO_INCREMENT,
  `sus_name` VARCHAR(255) NOT NULL,
  `arrest_point` VARCHAR(100) NOT NULL,
  `arrest_time` datetime NOT NULL,
  `bail` INT(11) NOT NULL,
  PRIMARY KEY(`sus_id`)
);

CREATE TABLE `Cases`(
  `case_id` INT(4) NOT NULL AUTO_INCREMENT,
  `case_name` VARCHAR(255) NOT NULL,
  `opened` datetime NOT NULL,
  `closed` datetime NOT NULL,
  `sus_id` INT(4) NOT NULL,
  PRIMARY KEY(`case_id`)

);
CREATE TABLE `Cells`(
  `cell_id` INT(4) NOT NULL AUTO_INCREMENT,
  `cell_name` VARCHAR(255) NOT NULL,
  `cell_capacity` INT (100) NOT NULL,
  `sus_id` INT(4) NOT NULL,
  PRIMARY KEY(`cell_id`)

);
