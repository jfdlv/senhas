SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `LenguajeS2` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci ;
USE `LenguajeS2` ;

-- -----------------------------------------------------
-- Table `LenguajeS2`.`Etiquetas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`Etiquetas` (
  `id` INT NULL AUTO_INCREMENT ,
  `palabra` VARCHAR(50) NOT NULL ,
  `etiqueta` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`senhas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`senhas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Imagen` VARCHAR(150) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`et_se`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`et_se` (
  `ids` INT NOT NULL ,
  `ide` INT NOT NULL ,
  PRIMARY KEY (`ids`, `ide`) ,
  INDEX `ide_idx` (`ide` ASC) ,
  INDEX `ids_idx` (`ids` ASC) ,
  CONSTRAINT `ids`
    FOREIGN KEY (`ids` )
    REFERENCES `LenguajeS2`.`senhas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ide`
    FOREIGN KEY (`ide` )
    REFERENCES `LenguajeS2`.`Etiquetas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`veri`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`veri` (
  `idv` INT NOT NULL AUTO_INCREMENT ,
  `infinitivo` VARCHAR(50) NULL ,
  PRIMARY KEY (`idv`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`presente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`presente` (
  `palabra` VARCHAR(50) NOT NULL ,
  `idv1` INT NULL ,
  PRIMARY KEY (`palabra`) ,
  INDEX `idv1_idx` (`idv1` ASC) ,
  CONSTRAINT `idv1`
    FOREIGN KEY (`idv1` )
    REFERENCES `LenguajeS2`.`veri` (`idv` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`pasado1`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`pasado1` (
  `palabra` VARCHAR(50) NOT NULL ,
  `idv2` INT NULL ,
  PRIMARY KEY (`palabra`) ,
  INDEX `idv_idx` (`idv2` ASC) ,
  CONSTRAINT `idv2`
    FOREIGN KEY (`idv2` )
    REFERENCES `LenguajeS2`.`veri` (`idv` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`pasado2`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`pasado2` (
  `palabra` VARCHAR(50) NOT NULL ,
  `idv3` INT NULL ,
  PRIMARY KEY (`palabra`) ,
  INDEX `idv_idx` (`idv3` ASC) ,
  CONSTRAINT `idv3`
    FOREIGN KEY (`idv3` )
    REFERENCES `LenguajeS2`.`veri` (`idv` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`futuro`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`futuro` (
  `palabra` VARCHAR(50) NOT NULL ,
  `idv4` INT NULL ,
  PRIMARY KEY (`palabra`) ,
  INDEX `idv_idx` (`idv4` ASC) ,
  CONSTRAINT `idv4`
    FOREIGN KEY (`idv4` )
    REFERENCES `LenguajeS2`.`veri` (`idv` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`et_v`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`et_v` (
  `ids0` INT NOT NULL ,
  `idv0` INT NOT NULL ,
  PRIMARY KEY (`ids0`, `idv0`) ,
  INDEX `ids_idx` (`ids0` ASC) ,
  INDEX `idv_idx` (`idv0` ASC) ,
  CONSTRAINT `ids0`
    FOREIGN KEY (`ids0` )
    REFERENCES `LenguajeS2`.`senhas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idv0`
    FOREIGN KEY (`idv0` )
    REFERENCES `LenguajeS2`.`veri` (`idv` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`usuario` (
  `usuario` VARCHAR(150) NOT NULL ,
  `password` VARCHAR(255) NULL ,
  `nombre` VARCHAR(150) NULL ,
  `apellido` VARCHAR(150) NULL ,
  PRIMARY KEY (`usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`test`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`test` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(150) NULL ,
  `nivel` INT NULL ,
  `desc` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`pregunta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`pregunta` (
  `id` INT NOT NULL ,
  `desc` VARCHAR(250) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`respuesta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`respuesta` (
  `id` INT NOT NULL ,
  `idp` INT NULL ,
  `ids` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `idp1_idx` (`idp` ASC) ,
  INDEX `ids1_idx` (`ids` ASC) ,
  CONSTRAINT `idp1`
    FOREIGN KEY (`idp` )
    REFERENCES `LenguajeS2`.`pregunta` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ids1`
    FOREIGN KEY (`ids` )
    REFERENCES `LenguajeS2`.`senhas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`t_p`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`t_p` (
  `idt` INT NOT NULL ,
  `idp` INT NOT NULL ,
  PRIMARY KEY (`idt`, `idp`) ,
  INDEX `idt1_idx` (`idt` ASC) ,
  INDEX `idp1_idx` (`idp` ASC) ,
  CONSTRAINT `idt2`
    FOREIGN KEY (`idt` )
    REFERENCES `LenguajeS2`.`test` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idp3`
    FOREIGN KEY (`idp` )
    REFERENCES `LenguajeS2`.`pregunta` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LenguajeS2`.`calificaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LenguajeS2`.`calificaciones` (
  `id` INT NOT NULL ,
  `usuario` VARCHAR(150) NULL ,
  `idt` INT NULL ,
  `calif` FLOAT NULL ,
  `fecha` DATE NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `usuario1_idx` (`usuario` ASC) ,
  INDEX `idt_idx` (`idt` ASC) ,
  CONSTRAINT `usuario1`
    FOREIGN KEY (`usuario` )
    REFERENCES `LenguajeS2`.`usuario` (`usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idt`
    FOREIGN KEY (`idt` )
    REFERENCES `LenguajeS2`.`test` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `LenguajeS2` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
