-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema crudpourliens
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema crudpourliens
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `crudpourliens` DEFAULT CHARACTER SET utf8 ;
USE `crudpourliens` ;

-- -----------------------------------------------------
-- Table `crudpourliens`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crudpourliens`.`user` (
  `iduser` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` VARCHAR(45) NOT NULL,
  `thepwd` VARCHAR(45) NOT NULL,
  `therealname` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `thelogin_UNIQUE` ON `crudpourliens`.`user` (`thelogin` ASC);


-- -----------------------------------------------------
-- Table `crudpourliens`.`liens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crudpourliens`.`liens` (
  `idliens` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` VARCHAR(100) NOT NULL,
  `thetext` VARCHAR(800) NOT NULL,
  `theurl` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idliens`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crudpourliens`.`contacts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crudpourliens`.`contacts` (
  `idcontacts` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thename` VARCHAR(100) NOT NULL,
  `themail` VARCHAR(150) NOT NULL,
  `themessage` TEXT NOT NULL,
  `thedate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcontacts`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crudpourliens`.`photos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crudpourliens`.`photos` (
  `idphotos` INT UNSIGNED NOT NULL,
  `thetitle` VARCHAR(150) NULL,
  `thedesc` VARCHAR(500) NULL,
  `theurl` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idphotos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Data for table `crudpourliens`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `crudpourliens`;
INSERT INTO `crudpourliens`.`user` (`iduser`, `thelogin`, `thepwd`, `therealname`) VALUES (DEFAULT, 'formateur', 'CF2M', 'Michaël Pitz');

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
