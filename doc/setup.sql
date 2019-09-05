CREATE DATABASE IF NOT EXISTS `SIGIE`;

USE `SIGIE`;

CREATE TABLE IF NOT EXISTS `tb_instituicao` (
  `id_instituicao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cnpj` VARCHAR(17) NOT NULL,
  `status` TINYINT NOT NULL COMMENT '1 = Ativo\n0 = Inativo',
  PRIMARY KEY (`id_instituicao`));

CREATE TABLE IF NOT EXISTS `tb_curso` (
  `id_curso` INT NOT NULL AUTO_INCREMENT,
  `id_instituicao` INT NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `duracao` VARCHAR(20) NOT NULL,
  `status` TINYINT NOT NULL,
  PRIMARY KEY (`id_curso`),
  INDEX `idx_fk_id_instituicao` (`id_instituicao` ASC),
  CONSTRAINT `fk_id_instituicao`
    FOREIGN KEY (`id_instituicao`)
    REFERENCES `SIGIE`.`tb_instituicao` (`id_instituicao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `tb_aluno_curso` (
  `id_aluno_curso` INT NOT NULL AUTO_INCREMENT,
  `id_aluno` INT NOT NULL,
  `id_curso` INT NOT NULL,
  `dt_inicio` DATE NOT NULL,
  `dt_termino` DATE NOT NULL,
  `dt_cancelamento` DATE NOT NULL,
  `status` TINYINT NOT NULL COMMENT '0 = Cancelado\n1 = Ativo Cursando\n2 = Concluido\n',
  INDEX `idx_fk_id_curso` (`id_curso` ASC),
  INDEX `idx_fk_id_aluno` (`id_aluno` ASC),
  PRIMARY KEY (`id_aluno_curso`),
  CONSTRAINT `fk_id_aluno`
    FOREIGN KEY (`id_aluno`)
    REFERENCES `SIGIE`.`tb_aluno` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_curso`
    FOREIGN KEY (`id_curso`)
    REFERENCES `SIGIE`.`tb_curso` (`id_curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `tb_aluno` (
  `id_aluno` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `email` VARCHAR(65) NOT NULL,
  `celular` VARCHAR(15) NOT NULL,
  `cep` VARCHAR(9) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  `numero` VARCHAR(8) NOT NULL,
  `status` TINYINT NOT NULL DEFAULT 1 COMMENT '0 = Inativo\n1 = Ativo',
  PRIMARY KEY (`id_aluno`));
