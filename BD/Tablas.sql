/* ---------------------------------------------------- */
/*  Generated by Enterprise Architect Version 13.5 		*/
/*  Created On : 13-may.-2020 08:47:14 p. m. 				*/
/*  DBMS       : MySql 						*/
/* ---------------------------------------------------- */
DROP DATABASE IF EXISTS `pibd`
;

CREATE DATABASE `pibd`
;
USE `pibd`
;

USE `pibd`
;

SET FOREIGN_KEY_CHECKS=0 
;

/* Drop Tables */

DROP TABLE IF EXISTS `Albumes` CASCADE
;

DROP TABLE IF EXISTS `Estilos` CASCADE
;

DROP TABLE IF EXISTS `Fotos` CASCADE
;

DROP TABLE IF EXISTS `Paises` CASCADE
;

DROP TABLE IF EXISTS `Solicitudes` CASCADE
;

DROP TABLE IF EXISTS `Usuarios` CASCADE
;

/* Create Tables */

CREATE TABLE `Albumes`
(
	`IdAlbum` INT NOT NULL AUTO_INCREMENT,
	`Titulo` TEXT NULL,
	`Descripcion` TEXT NULL,
	`Usuario` INT NULL,
	CONSTRAINT `PK_Albumes` PRIMARY KEY (`IdAlbum` ASC)
)

;

CREATE TABLE `Estilos`
(
	`IdEstilo` INT NOT NULL AUTO_INCREMENT,
	`Nombre` TEXT NULL,
	`Descripcion` TEXT NULL,
	CONSTRAINT `PK_Estilos` PRIMARY KEY (`IdEstilo` ASC)
)

;

CREATE TABLE `Fotos`
(
	`IdFoto` INT NOT NULL AUTO_INCREMENT,
	`Titulo` TEXT NULL,
	`Descripcion` TEXT NULL,
	`Fecha` DATE NULL,
	`Pais` INT NULL,
	`Album` INT NULL,
	`Alternativo` TEXT NULL,
	`FRegistro` DATE NULL,
	`Foto` TEXT NULL,
	`IdUsuario` INT NULL,
	`Estilo` INT NULL,
	CONSTRAINT `PK_Fotos` PRIMARY KEY (`IdFoto` ASC)
)

;

CREATE TABLE `Paises`
(
	`IdPais` INT NOT NULL AUTO_INCREMENT,
	`NomPais` TEXT NULL,
	CONSTRAINT `PK_Paises` PRIMARY KEY (`IdPais` ASC)
)

;

CREATE TABLE `Solicitudes`
(
	`IdSolicitud` INT NOT NULL AUTO_INCREMENT,
	`Album` INT NULL,
	`Nombre` VARCHAR(200) NULL,
	`Titulo` VARCHAR(200) NULL,
	`Descripcion` TEXT NULL,
	`Email` VARCHAR(200) NULL,
	`Direccion` TEXT NULL,
	`Color` TEXT NULL,
	`Copias` INT NULL,
	`Resolucion` INT NULL,
	`Fecha` DATE NULL,
	`FRegistro` DATE NULL,
	`Coste` DOUBLE(10,2) NULL,
	CONSTRAINT `PK_Solicitudes` PRIMARY KEY (`IdSolicitud` ASC)
)

;

CREATE TABLE `Usuarios`
(
	`IdUsuario` INT NOT NULL AUTO_INCREMENT,
	`NomUsuario` VARCHAR(15) NULL,
	`Clave` VARCHAR(15) NULL,
	`Email` TEXT NULL,
	`Sexo` SMALLINT NULL,
	`FNaciemiento` DATE NULL,
	`Ciudad` TEXT NULL,
	`Pais` INT NOT NULL,
	`FRegistro` DATE NULL,
	CONSTRAINT `PK_Usuario` PRIMARY KEY (`IdUsuario` ASC)
)

;

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE `Albumes` 
 ADD INDEX `IXFK_Albumes_Usuarios` (`Usuario` ASC)
;

ALTER TABLE `Fotos` 
 ADD INDEX `IXFK_Fotos_Albumes` (`Album` ASC)
;

ALTER TABLE `Fotos` 
 ADD INDEX `IXFK_Fotos_Estilos` (`Estilo` ASC)
;

ALTER TABLE `Fotos` 
 ADD INDEX `IXFK_Fotos_Paises` (`Pais` ASC)
;

ALTER TABLE `Fotos` 
 ADD INDEX `IXFK_Fotos_Usuarios` (`IdUsuario` ASC)
;

ALTER TABLE `Solicitudes` 
 ADD INDEX `IXFK_Solicitudes_Albumes` (`Album` ASC)
;

ALTER TABLE `Usuarios` 
 ADD INDEX `IXFK_Usuarios_Paises` (`Pais` ASC)
;

/* Create Foreign Key Constraints */

ALTER TABLE `Fotos` 
 ADD CONSTRAINT `FK_Fotos_Estilos`
	FOREIGN KEY (`Estilo`) REFERENCES `Estilos` (`IdEstilo`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `Fotos` 
 ADD CONSTRAINT `FK_Fotos_Usuarios`
	FOREIGN KEY (`IdUsuario`) REFERENCES `Usuarios` (`IdUsuario`) ON DELETE No Action ON UPDATE No Action
;

SET FOREIGN_KEY_CHECKS=1 
;
