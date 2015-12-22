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
	`Timestamp` timestamp DEFAULT NOW(),

	PRIMARY KEY (`UserID`)
	 );


