/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.21-MariaDB : Database - ranking
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`ranking` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ranking`;

/*Table structure for table `acesso` */

DROP TABLE IF EXISTS `acesso`;

CREATE TABLE `acesso` (
  `id_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_acesso`),
  KEY `id_menu` (`id_menu`),
  KEY `FK_acesso` (`id_perfil`),
  CONSTRAINT `FK_acesso` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  CONSTRAINT `id_menu_fk` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `acesso` */

insert  into `acesso`(`id_acesso`,`id_menu`,`id_perfil`) values (1,1,1),(2,1,2);

/*Table structure for table `denuncia` */

DROP TABLE IF EXISTS `denuncia`;

CREATE TABLE `denuncia` (
  `id_denuncia` int(11) NOT NULL AUTO_INCREMENT,
  `id_veiculo` int(11) NOT NULL,
  `id_infracao` int(11) NOT NULL,
  `datad` date DEFAULT NULL,
  PRIMARY KEY (`id_denuncia`),
  KEY `id_veiculo` (`id_veiculo`),
  KEY `id_infracao` (`id_infracao`),
  CONSTRAINT `denuncia_ibfk_1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`),
  CONSTRAINT `denuncia_ibfk_2` FOREIGN KEY (`id_infracao`) REFERENCES `infracao` (`id_infracao`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `denuncia` */

insert  into `denuncia`(`id_denuncia`,`id_veiculo`,`id_infracao`,`datad`) values (1,1,1,'2017-06-12'),(2,2,3,'2017-06-12'),(3,2,20,'2017-06-12'),(7,3,2,'2017-06-12');

/*Table structure for table `infracao` */

DROP TABLE IF EXISTS `infracao`;

CREATE TABLE `infracao` (
  `id_infracao` int(11) NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(100) NOT NULL,
  `pontos` int(11) NOT NULL,
  PRIMARY KEY (`id_infracao`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `infracao` */

insert  into `infracao`(`id_infracao`,`descritivo`,`pontos`) values (1,'Excesso de velocidade',7),(2,'Direção perigosa',10),(3,'Ultrapassagem perigosa',10),(20,'Acidente',15);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(80) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`descritivo`,`link`) values (1,'Administrador','www.#.com.br'),(2,'Usuário','www.#.com.br');

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(80) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `perfil` */

insert  into `perfil`(`id_perfil`,`descritivo`) values (1,'Administrador'),(2,'Usuário');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `status_user` tinyint(1) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(12) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_usuario` (`id_perfil`),
  CONSTRAINT `FK_usuario` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`id_perfil`,`status_user`,`nome`,`email`,`senha`) values (1,1,1,'Neto','neto@teste','2222'),(2,2,1,'Pedro','pedro@teste','1212'),(3,2,1,'Paulo','paulo@teste','1010'),(5,2,1,'João','joao@teste','3333');

/*Table structure for table `veiculo` */

DROP TABLE IF EXISTS `veiculo`;

CREATE TABLE `veiculo` (
  `id_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `status_veic` tinyint(1) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `placa` char(8) NOT NULL,
  PRIMARY KEY (`id_veiculo`),
  KEY `FK_veiculo` (`id_usuario`),
  CONSTRAINT `FK_veiculo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `veiculo` */

insert  into `veiculo`(`id_veiculo`,`id_usuario`,`status_veic`,`marca`,`placa`) values (1,2,1,'Iveco','NCK-1507'),(2,3,1,'Mercedes','JVD-8942'),(3,5,1,'Volvo','SRU-3356');

/*Table structure for table `vw_denuncias` */

DROP TABLE IF EXISTS `vw_denuncias`;

/*!50001 DROP VIEW IF EXISTS `vw_denuncias` */;
/*!50001 DROP TABLE IF EXISTS `vw_denuncias` */;

/*!50001 CREATE TABLE `vw_denuncias` (
  `nome` varchar(100) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `datad` date DEFAULT NULL,
  `descritivo` varchar(100) NOT NULL,
  `pontos` decimal(32,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_ranking` */

DROP TABLE IF EXISTS `vw_ranking`;

/*!50001 DROP VIEW IF EXISTS `vw_ranking` */;
/*!50001 DROP TABLE IF EXISTS `vw_ranking` */;

/*!50001 CREATE TABLE `vw_ranking` (
  `nome` varchar(100) NOT NULL,
  `infracoes` bigint(21) NOT NULL DEFAULT '0',
  `pontuacao` decimal(32,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view vw_denuncias */

/*!50001 DROP TABLE IF EXISTS `vw_denuncias` */;
/*!50001 DROP VIEW IF EXISTS `vw_denuncias` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_denuncias` AS select `u`.`nome` AS `nome`,`v`.`marca` AS `marca`,`d`.`datad` AS `datad`,`i`.`descritivo` AS `descritivo`,sum(`i`.`pontos`) AS `pontos` from (((`denuncia` `d` join `veiculo` `v` on((`d`.`id_veiculo` = `v`.`id_veiculo`))) join `usuario` `u` on((`u`.`id_usuario` = `v`.`id_usuario`))) join `infracao` `i` on((`i`.`id_infracao` = `d`.`id_infracao`))) group by `d`.`id_denuncia` */;

/*View structure for view vw_ranking */

/*!50001 DROP TABLE IF EXISTS `vw_ranking` */;
/*!50001 DROP VIEW IF EXISTS `vw_ranking` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ranking` AS select `u`.`nome` AS `nome`,count(`i`.`pontos`) AS `infracoes`,sum(`i`.`pontos`) AS `pontuacao` from (((`denuncia` `d` join `veiculo` `v` on((`d`.`id_veiculo` = `v`.`id_veiculo`))) join `usuario` `u` on((`u`.`id_usuario` = `v`.`id_usuario`))) join `infracao` `i` on((`i`.`id_infracao` = `d`.`id_infracao`))) group by `u`.`id_usuario` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
