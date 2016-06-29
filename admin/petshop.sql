--
-- Banco de Dados: `petshop`
--

DROP DATABASE IF EXISTS petshop;
CREATE DATABASE  `petshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;

-- DROP USER `sispetshop`@`localhost`;
CREATE USER `sispetshop`@`localhost` identified by "123456";
GRANT ALL PRIVILEGES ON petshop.* TO `sispetshop`@`localhost`;
FLUSH PRIVILEGES;

USE `petshop` ;

-- -----------------------------------------------------
-- Table `petshop`.`clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `petshop`.`clientes` ;

CREATE  TABLE IF NOT EXISTS `petshop`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL DEFAULT NULL ,
  `login` VARCHAR(20) NULL DEFAULT NULL ,
  `senha` VARCHAR(10) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


-- -----------------------------------------------------
-- Table `petshop`.`produtos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `petshop`.`produtos` ;

CREATE  TABLE IF NOT EXISTS `petshop`.`produtos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL DEFAULT NULL ,
  `preco` DECIMAL(10,2) NULL DEFAULT NULL ,
  `imagem` VARCHAR(60) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


-- -----------------------------------------------------
-- Table `petshop`.`compras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `petshop`.`compras` ;

CREATE  TABLE IF NOT EXISTS `petshop`.`compras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `cliente_id` INT(11) NOT NULL ,
  `produto_id` INT(11) NOT NULL ,
  `quantidade` INT(11) NULL DEFAULT NULL ,
  `preco` DECIMAL(10,2) NULL DEFAULT 0 ,
  `data` VARCHAR(10) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `cliente_id`, `produto_id`) ,
  INDEX `cliente` (`cliente_id` ASC) ,
  INDEX `produto` (`produto_id` ASC) ,
  CONSTRAINT `cliente`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `petshop`.`clientes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `produto`
    FOREIGN KEY (`produto_id` )
    REFERENCES `petshop`.`produtos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


-- -----------------------------------------------------
-- Table `petshop`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `petshop`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `petshop`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `login` VARCHAR(20) NULL ,
  `senha` VARCHAR(10) NULL ,
  `tipo` SMALLINT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
