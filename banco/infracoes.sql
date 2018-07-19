/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.21-MariaDB : Database - infracoes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`infracoes` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `infracoes`;

/*Table structure for table `acesso` */

DROP TABLE IF EXISTS `acesso`;

CREATE TABLE `acesso` (
  `id_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_acesso`),
  KEY `id_menu` (`id_menu`),
  KEY `id_perfil` (`id_perfil`),
  CONSTRAINT `acesso_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  CONSTRAINT `acesso_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `acesso` */

insert  into `acesso`(`id_acesso`,`id_menu`,`id_perfil`) values (1,1,1),(2,1,2),(3,2,1),(4,3,1),(5,4,1),(6,5,1),(7,5,2);

/*Table structure for table `denuncia` */

DROP TABLE IF EXISTS `denuncia`;

CREATE TABLE `denuncia` (
  `id_denuncia` int(11) NOT NULL AUTO_INCREMENT,
  `id_veiculo` int(11) NOT NULL,
  `id_infracao` int(11) NOT NULL,
  `datad` date NOT NULL,
  PRIMARY KEY (`id_denuncia`),
  KEY `id_veiculo` (`id_veiculo`),
  KEY `id_infracao` (`id_infracao`),
  CONSTRAINT `denuncia_ibfk_1` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`),
  CONSTRAINT `denuncia_ibfk_2` FOREIGN KEY (`id_infracao`) REFERENCES `infracao` (`id_infracao`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `denuncia` */

insert  into `denuncia`(`id_denuncia`,`id_veiculo`,`id_infracao`,`datad`) values (1,1,3,'2017-06-14'),(2,2,4,'2017-06-14'),(3,2,1,'2017-02-14'),(8,1,1,'2017-06-14'),(14,3,3,'2017-06-14'),(15,1,2,'2017-06-14'),(17,5,2,'2017-06-14'),(18,2,4,'2017-06-18'),(19,2,2,'2017-05-22'),(20,19,1,'2017-06-18'),(22,5,2,'2017-06-24'),(23,5,1,'2017-06-25'),(24,1,1,'2017-07-01'),(25,1,2,'2017-07-01');

/*Table structure for table `infracao` */

DROP TABLE IF EXISTS `infracao`;

CREATE TABLE `infracao` (
  `id_infracao` int(11) NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(100) NOT NULL,
  `pontos` int(11) NOT NULL,
  PRIMARY KEY (`id_infracao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `infracao` */

insert  into `infracao`(`id_infracao`,`descritivo`,`pontos`) values (1,'Envolvimento em acidente',15),(2,'Direção perigosa',10),(3,'Excesso de velocidade',5),(4,'Ultrapasagem perigosa',7);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(80) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`link`,`nome`) values (1,'index.php','Home'),(2,'lista.usuario.php','Usuário'),(3,'lista.veiculo.php','Veículo'),(4,'lista.denuncia.php','Denúncias'),(5,'Ranking.php','Ranking');

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descritivo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `perfil` */

insert  into `perfil`(`id_perfil`,`descritivo`) values (1,'Administrador'),(2,'Usuario');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `status_user` tinyint(1) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(15) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_perfil` (`id_perfil`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`id_perfil`,`status_user`,`nome`,`email`,`senha`) values (1,1,1,'Neto','netomatiazi@hotmail.com','1212'),(2,2,1,'Fulano','fulano@teste.com','2121'),(3,2,1,'Beltrano','beltrano@teste.com','1122'),(4,2,1,'Ciclano','ciclano@teste.com','2211'),(7,2,2,'Nicolau','nicolas@teste.com','1313'),(11,1,1,'mary julie gomes','maryjulie30@hotmail.com','8900'),(12,2,1,'JosÃ© NinguÃ©m','ze@teste.com','3131');

/*Table structure for table `veiculo` */

DROP TABLE IF EXISTS `veiculo`;

CREATE TABLE `veiculo` (
  `id_veiculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `status_veic` tinyint(1) NOT NULL,
  `marca` varchar(80) NOT NULL,
  `placa` char(10) NOT NULL,
  PRIMARY KEY (`id_veiculo`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `veiculo` */

insert  into `veiculo`(`id_veiculo`,`id_usuario`,`status_veic`,`marca`,`placa`) values (1,2,1,'Iveco','STF-0171'),(2,3,1,'Mercedes','URV-0000'),(3,4,1,'Volvo','NET-2002'),(5,4,1,'Caio','RMH-1010'),(17,3,1,'Ford','XXX-1010'),(19,3,1,'volvo','ccz-2029'),(22,12,2,'FIAT','WWW-1212');

/*Table structure for table `vw_denuncias` */

DROP TABLE IF EXISTS `vw_denuncias`;

/*!50001 DROP VIEW IF EXISTS `vw_denuncias` */;
/*!50001 DROP TABLE IF EXISTS `vw_denuncias` */;

/*!50001 CREATE TABLE `vw_denuncias` (
  `nome` varchar(80) NOT NULL,
  `marca` varchar(80) NOT NULL,
  `datad` date NOT NULL,
  `descritivo` varchar(100) NOT NULL,
  `pontos` decimal(32,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_ranking` */

DROP TABLE IF EXISTS `vw_ranking`;

/*!50001 DROP VIEW IF EXISTS `vw_ranking` */;
/*!50001 DROP TABLE IF EXISTS `vw_ranking` */;

/*!50001 CREATE TABLE `vw_ranking` (
  `nome` varchar(80) NOT NULL,
  `infracoes` bigint(21) NOT NULL DEFAULT '0',
  `pontuacao` decimal(32,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `vw_veiculo` */

DROP TABLE IF EXISTS `vw_veiculo`;

/*!50001 DROP VIEW IF EXISTS `vw_veiculo` */;
/*!50001 DROP TABLE IF EXISTS `vw_veiculo` */;

/*!50001 CREATE TABLE `vw_veiculo` (
  `status_veic` tinyint(1) NOT NULL,
  `marca` varchar(80) NOT NULL,
  `placa` char(10) NOT NULL,
  `nome` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view vw_denuncias */

/*!50001 DROP TABLE IF EXISTS `vw_denuncias` */;
/*!50001 DROP VIEW IF EXISTS `vw_denuncias` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_denuncias` AS select `u`.`nome` AS `nome`,`v`.`marca` AS `marca`,`d`.`datad` AS `datad`,`i`.`descritivo` AS `descritivo`,sum(`i`.`pontos`) AS `pontos` from (((`denuncia` `d` join `veiculo` `v` on((`d`.`id_veiculo` = `v`.`id_veiculo`))) join `usuario` `u` on((`u`.`id_usuario` = `v`.`id_usuario`))) join `infracao` `i` on((`i`.`id_infracao` = `d`.`id_infracao`))) group by `d`.`id_denuncia` */;

/*View structure for view vw_ranking */

/*!50001 DROP TABLE IF EXISTS `vw_ranking` */;
/*!50001 DROP VIEW IF EXISTS `vw_ranking` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ranking` AS select `u`.`nome` AS `nome`,count(`i`.`pontos`) AS `infracoes`,sum(`i`.`pontos`) AS `pontuacao` from (((`denuncia` `d` join `veiculo` `v` on((`d`.`id_veiculo` = `v`.`id_veiculo`))) join `usuario` `u` on((`u`.`id_usuario` = `v`.`id_usuario`))) join `infracao` `i` on((`i`.`id_infracao` = `d`.`id_infracao`))) group by `u`.`id_usuario` order by sum(`i`.`pontos`) desc */;

/*View structure for view vw_veiculo */

/*!50001 DROP TABLE IF EXISTS `vw_veiculo` */;
/*!50001 DROP VIEW IF EXISTS `vw_veiculo` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_veiculo` AS select `veiculo`.`status_veic` AS `status_veic`,`veiculo`.`marca` AS `marca`,`veiculo`.`placa` AS `placa`,`usuario`.`nome` AS `nome` from (`veiculo` join `usuario` on((`veiculo`.`id_usuario` = `usuario`.`id_usuario`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
