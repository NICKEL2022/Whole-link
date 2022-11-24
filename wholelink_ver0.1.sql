CREATE DATABASE IF NOT EXISTS `Wholelink` DEFAULT CHARACTER SET utf8 ;
USE `Wholelink` ;

CREATE TABLE IF NOT EXISTS `Wholelink`.`User` (
  `Username` VARCHAR(20) NULL,
  `User_id` INT NOT NULL,
  `Password` VARCHAR(32) NULL,
  `E-mail_Address` VARCHAR(32) NULL,
  `User_Agreement` TINYINT NULL,
  `Phone_Number` INT NULL,
  `Data_Of_Birth` DATE NULL,
  `Register_Time` DATETIME NULL,
  PRIMARY KEY (`User_id`))

CREATE TABLE IF NOT EXISTS `Wholelink`.`Home` (
  `House_id` INT NULL,
  `Address` VARCHAR(45) NULL,
  `House_Name` VARCHAR(45) NULL,
  `Room_Number` INT NOT NULL,
  `User_User_id` INT NOT NULL,
  PRIMARY KEY (`Room_Number`),
  INDEX `fk_Home_User1_idx` (`User_User_id` ASC) ,
  CONSTRAINT `fk_Home_User1`
    FOREIGN KEY (`User_User_id`)
    REFERENCES `Wholelink`.`User` (`User_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



CREATE TABLE IF NOT EXISTS `Wholelink`.`Rooms` (
  `Room_Name` INT NULL,
  `Number_Of_Devices` VARCHAR(45) NULL,
  `Room number` INT NOT NULL,
  `Home_Room_Number` INT NOT NULL,
  INDEX `fk_Rooms_Home1_idx` (`Home_Room_Number` ASC) ,
  PRIMARY KEY (`Room number`),
  CONSTRAINT `fk_Rooms_Home1`
    FOREIGN KEY (`Home_Room_Number`)
    REFERENCES `Wholelink`.`Home` (`Room_Number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)


CREATE TABLE IF NOT EXISTS `Wholelink`.`Devices` (
  `Device_id` INT NOT NULL,
  `Device_Name` VARCHAR(45) NULL,
  `Device_Type` VARCHAR(45) NOT NULL,
  `User_User_id` INT NULL,
  `User_User_id1` INT NOT NULL,
  `Rooms_Room number` INT NOT NULL,
  `Device_Status` TINYINT NULL,
  `Color` VARCHAR(45) NULL,
  `Brightness` FLOAT NULL,
  `Modes` VARCHAR(45) NULL,
  `Schedule` DATETIME NULL,
  PRIMARY KEY (`Device_id`, `Device_Type`),
  INDEX `fk_Devices_User1_idx` (`User_User_id1` ASC) ,
  INDEX `fk_Devices_Rooms1_idx` (`Rooms_Room number` ASC) ,
  CONSTRAINT `fk_Devices_User1`
    FOREIGN KEY (`User_User_id1`)
    REFERENCES `Wholelink`.`User` (`User_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Devices_Rooms1`
    FOREIGN KEY (`Rooms_Room number`)
    REFERENCES `Wholelink`.`Rooms` (`Room number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)


CREATE TABLE IF NOT EXISTS `Wholelink`.`Admin` (
  `Username` VARCHAR(32) NOT NULL,
  `Password` VARCHAR(32) NULL,
  `Admin_id` INT NULL,
  `Level` TINYINT(4) NULL,
  `Create_Time` DATETIME NULL,
  PRIMARY KEY (`Username`))



CREATE TABLE IF NOT EXISTS `Wholelink`.`Commands` (
  `Command_id` INT NOT NULL,
  `Command_Text` VARCHAR(1000) NULL,
  PRIMARY KEY (`Command_id`))

