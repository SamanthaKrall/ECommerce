-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ecommerce` ;

-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET latin1 ;
USE `ecommerce` ;

-- -----------------------------------------------------
-- Table `ecommerce`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`cart` (
  `cart_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  PRIMARY KEY (`cart_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ecommerce`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`product` (
  `product_id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_name` TEXT NOT NULL,
  `product_description` TEXT NOT NULL,
  `product_picture` TEXT NOT NULL,
  `product_price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`product_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `ecommerce`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(25) NOT NULL,
  `user_password` VARCHAR(25) NOT NULL,
  `user_role` INT(11) NOT NULL DEFAULT '3',
  `first_name` VARCHAR(25) NOT NULL,
  `last_name` VARCHAR(25) NOT NULL,
  `email` VARCHAR(25) NOT NULL,
  `phone_number` INT(11) NOT NULL,
  `address` VARCHAR(50) NOT NULL,
  `city` VARCHAR(25) NOT NULL,
  `state` VARCHAR(25) NOT NULL,
  `zip_code` INT(10) NOT NULL,
  `country` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 108
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
