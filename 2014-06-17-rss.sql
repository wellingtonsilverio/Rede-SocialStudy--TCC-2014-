-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jun-2014 �s 00:54
-- Vers�o do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rss`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `catery`
--

CREATE TABLE IF NOT EXISTS `catery` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_titulo` varchar(160) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `catery`
--

INSERT INTO `catery` (`cat_id`, `cat_titulo`) VALUES
(1, 'ETEC Hortolândia'),
(2, 'Ensino Médio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia`
--

CREATE TABLE IF NOT EXISTS `denuncia` (
  `dnc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dnc_de` int(11) NOT NULL,
  `dnc_oque` int(11) NOT NULL,
  `dnc_v` int(11) NOT NULL,
  `dnc_onde` varchar(255) NOT NULL,
  PRIMARY KEY (`dnc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `denuncia`
--

INSERT INTO `denuncia` (`dnc_id`, `dnc_de`, `dnc_oque`, `dnc_v`, `dnc_onde`) VALUES
(1, 1, 6, 0, 'perg'),
(2, 1, 3, 0, 'perg'),
(3, 1, 7, 0, 'perg'),
(4, 1, 8, 0, 'perg'),
(5, 1, 10, 0, 'perg'),
(6, 1, 8, 0, 'perg'),
(7, 1, 13, 0, 'resp'),
(8, 1, 14, 0, 'resp'),
(9, 1, 15, 0, 'resp'),
(10, 1, 12, 0, 'resp'),
(11, 1, 6, 0, 'perg'),
(12, 1, 14, 0, 'resp7'),
(13, 1, 7, 0, 'perg'),
(14, 5, 11, 0, 'perg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grp_adm`
--

CREATE TABLE IF NOT EXISTS `grp_adm` (
  `gadm_id` int(11) NOT NULL AUTO_INCREMENT,
  `gadm_grp` int(11) NOT NULL,
  `gadm_usr` int(11) NOT NULL,
  PRIMARY KEY (`gadm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `grp_adm`
--

INSERT INTO `grp_adm` (`gadm_id`, `gadm_grp`, `gadm_usr`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grp_usr`
--

CREATE TABLE IF NOT EXISTS `grp_usr` (
  `gu_id` int(11) NOT NULL AUTO_INCREMENT,
  `gu_usr` int(11) NOT NULL,
  `gu_grp` int(11) NOT NULL,
  PRIMARY KEY (`gu_id`),
  KEY `users_grups` (`gu_usr`),
  KEY `grp_grups` (`gu_grp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `grp_usr`
--

INSERT INTO `grp_usr` (`gu_id`, `gu_usr`, `gu_grp`) VALUES
(3, 1, 1),
(5, 1, 2),
(7, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grups`
--

CREATE TABLE IF NOT EXISTS `grups` (
  `grp_id` int(11) NOT NULL AUTO_INCREMENT,
  `grp_titulo` varchar(160) CHARACTER SET latin1 NOT NULL,
  `grp_cat` int(11) NOT NULL,
  `grp_des` text CHARACTER SET latin1 NOT NULL,
  `grp_image` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'padrao.jpg',
  PRIMARY KEY (`grp_id`),
  KEY `grup_cat` (`grp_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `grups`
--

INSERT INTO `grups` (`grp_id`, `grp_titulo`, `grp_cat`, `grp_des`, `grp_image`) VALUES
(1, '3º MI', 1, 'Descrição !!!', '374_10422336_891691610860650_6797860041698538987_n.jpg'),
(2, '2º MI', 1, 'Aqui fica a descri��o do grupo', 'padrao.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `indicacao`
--

CREATE TABLE IF NOT EXISTS `indicacao` (
  `idc_id` int(11) NOT NULL,
  `idc_usr` int(11) NOT NULL,
  `idc_poronde` varchar(160) COLLATE utf8_bin NOT NULL,
  `idc_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `indicacao`
--

INSERT INTO `indicacao` (`idc_id`, `idc_usr`, `idc_poronde`, `idc_status`) VALUES
(123456, 1, 'Cart�o', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `pgt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pgt_usr` int(11) NOT NULL,
  `pgt_perg` text NOT NULL,
  `pgt_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pgt_grp` int(11) NOT NULL,
  PRIMARY KEY (`pgt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `pergunta`
--

INSERT INTO `pergunta` (`pgt_id`, `pgt_usr`, `pgt_perg`, `pgt_date`, `pgt_grp`) VALUES
(1, 1, 'Oi', '2014-04-24 18:27:04', 1),
(2, 1, 'Oi oiudszoiudz', '2014-04-24 18:40:00', 1),
(3, 1, 'Qual e o nome do Matheus', '2014-04-25 01:18:29', 1),
(4, 1, 'O que tem ue fazer de empreendorismo?', '2014-04-25 14:23:47', 1),
(5, 5, 'Eu faltei ontem , o que vai ter que levar', '2014-04-25 14:46:35', 1),
(6, 1, 'Oi Emerson', '2014-04-26 00:56:30', 1),
(7, 1, 'oihysadoisd', '2014-04-30 01:04:28', 1),
(8, 1, 'Oi?', '2014-05-01 01:48:35', 2),
(9, 5, 'Qual a apresentaçao do Wellington ?', '2014-05-01 02:39:14', 1),
(10, 1, 'To fazendo uma pergunta', '2014-06-11 22:41:55', 1),
(11, 5, 'ooi', '2014-06-17 22:14:19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `refesh`
--

CREATE TABLE IF NOT EXISTS `refesh` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `att_tipo` int(1) NOT NULL,
  `att_desc` varchar(255) CHARACTER SET latin1 NOT NULL,
  `att_date` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`att_id`),
  KEY `users_refesh` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Extraindo dados da tabela `refesh`
--

INSERT INTO `refesh` (`att_id`, `user_id`, `att_tipo`, `att_desc`, `att_date`) VALUES
(38, 5, 1, 'esta seguindo Wellington Silverio', '30 de Abril de 2014 as 08:38'),
(39, 5, 1, 'esta seguindo Vítor Gutierrez', '30 de Abril de 2014 as 08:38'),
(40, 5, 2, 'Entrou no grupo: 3º MI', '30 de Abril de 2014 as 08:38'),
(41, 5, 3, 'Perguntou no grupo 3º MI sobre: Qual a apresentaçao do Wellington ?', '30 de Abril de 2014 as 08:39'),
(42, 1, 3, 'Respondeu no grupo 3º MI sobre: O brasil na Guerra', '30 de Abril de 2014 as 08:41'),
(43, 1, 3, 'Perguntou no grupo 3º MI sobre:To fazendo uma pergunta', '11 de Junho de 2014 as 07:41'),
(44, 1, 4, 'Respondeu no grupo 3º MI sobre: respondida', '11 de Junho de 2014 as 07:42'),
(62, 1, 1, 'esta seguindo Isaque Coelho', '12 de Junho de 2014 as 07:52'),
(68, 1, 4, 'Respondeu no grupo 3º MI sobre: então , este é um teste para ver se as letras vão ficar por fora ou encima do denunciar. então , este é um teste para ver se as letras vão ficar por fora ou encima do denunciar. ', '17 de Junho de 2014 as 06:46'),
(69, 1, 4, 'Respondeu no grupo 2º MI sobre: Oi', '17 de Junho de 2014 as 06:57'),
(70, 5, 4, 'Respondeu no grupo 3º MI sobre: oi', '17 de Junho de 2014 as 07:13'),
(71, 5, 3, 'Perguntou no grupo 3º MI sobre:ooi', '17 de Junho de 2014 as 07:14'),
(72, 5, 4, 'Respondeu no grupo 3º MI sobre: pontos?', '17 de Junho de 2014 as 07:15'),
(73, 5, 4, 'Respondeu no grupo 3º MI sobre: hfd', '17 de Junho de 2014 as 07:26'),
(74, 5, 4, 'Respondeu no grupo 3º MI sobre: hfg', '17 de Junho de 2014 as 07:26'),
(75, 5, 4, 'Respondeu no grupo 3º MI sobre: dsad', '17 de Junho de 2014 as 07:27'),
(76, 5, 4, 'Respondeu no grupo 3º MI sobre: dsad', '17 de Junho de 2014 as 07:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `responder`
--

CREATE TABLE IF NOT EXISTS `responder` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_perg` int(11) NOT NULL,
  `res_usr` int(11) NOT NULL,
  `res_resp` varchar(255) NOT NULL,
  `res_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `responder`
--

INSERT INTO `responder` (`res_id`, `res_perg`, `res_usr`, `res_resp`, `res_data`) VALUES
(1, 1, 1, 'oi', '2014-04-24 18:34:00'),
(2, 1, 1, 'oi', '2014-04-24 18:34:06'),
(3, 2, 1, 'Nao', '2014-04-24 18:40:16'),
(4, 2, 1, 'ola \r\n', '2014-04-24 18:46:08'),
(5, 3, 1, 'e matheus', '2014-04-25 01:18:40'),
(6, 4, 5, 'Vai ter que entrega o TCC do ADM', '2014-04-25 14:25:03'),
(7, 1, 5, 'oi', '2014-04-25 14:25:42'),
(8, 3, 5, 'n~~ao e nao \r\n', '2014-04-25 14:32:51'),
(9, 3, 5, '', '2014-04-25 14:32:52'),
(10, 3, 5, 'OI', '2014-04-25 14:45:54'),
(11, 5, 1, 'nada, so vai ter prova do fabricio, MENTIRA!', '2014-04-25 14:46:59'),
(12, 6, 1, 'eae', '2014-04-26 00:56:39'),
(16, 9, 1, 'O brasil na Guerra', '2014-05-01 02:41:15'),
(17, 10, 1, 'respondida', '2014-06-11 22:42:02'),
(18, 10, 1, 'então , este é um teste para ver se as letras vão ficar por fora ou encima do denunciar. então , este é um teste para ver se as letras vão ficar por fora ou encima do denunciar. ', '2014-06-17 21:46:56'),
(19, 8, 1, 'Oi', '2014-06-17 21:57:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcatery`
--

CREATE TABLE IF NOT EXISTS `subcatery` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_titulo` varchar(160) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `subcatery`
--

INSERT INTO `subcatery` (`sub_id`, `sub_titulo`) VALUES
(1, 'Materia'),
(2, 'Escola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_cat`
--

CREATE TABLE IF NOT EXISTS `sub_cat` (
  `scat_id` int(11) NOT NULL AUTO_INCREMENT,
  `scat_sub` int(11) NOT NULL,
  `scat_cat` int(11) NOT NULL,
  PRIMARY KEY (`scat_id`),
  KEY `subc_cat` (`scat_sub`),
  KEY `subc_cater` (`scat_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_nome` varchar(60) CHARACTER SET latin1 NOT NULL,
  `usr_sobrenome` varchar(60) CHARACTER SET latin1 NOT NULL,
  `usr_email` varchar(120) CHARACTER SET latin1 NOT NULL,
  `usr_senha` varchar(60) CHARACTER SET latin1 NOT NULL,
  `usr_data_n` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_escola` varchar(60) CHARACTER SET latin1 NOT NULL,
  `usr_serie` varchar(60) CHARACTER SET latin1 NOT NULL,
  `usr_local` varchar(60) CHARACTER SET latin1 NOT NULL,
  `usr_genero` varchar(11) CHARACTER SET latin1 NOT NULL,
  `usr_level` int(11) NOT NULL DEFAULT '0',
  `usr_image` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'padrao.gif',
  `usr_capa` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'padrao.jpg',
  `usr_ref` int(11) NOT NULL,
  `usr_nivel` int(1) NOT NULL,
  `usr_mdl_perg` int(5) NOT NULL DEFAULT '0',
  `usr_mdl_resp` int(5) NOT NULL DEFAULT '0',
  `usr_mdl_mrespos` int(11) NOT NULL DEFAULT '0',
  `usr_mdl_seg` int(5) NOT NULL DEFAULT '0',
  `usr_mdl_tempo` int(5) NOT NULL DEFAULT '0',
  `usr_mdl_grupativ` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`usr_id`, `usr_nome`, `usr_sobrenome`, `usr_email`, `usr_senha`, `usr_data_n`, `usr_escola`, `usr_serie`, `usr_local`, `usr_genero`, `usr_level`, `usr_image`, `usr_capa`, `usr_ref`, `usr_nivel`, `usr_mdl_perg`, `usr_mdl_resp`, `usr_mdl_mrespos`, `usr_mdl_seg`, `usr_mdl_tempo`, `usr_mdl_grupativ`) VALUES
(1, 'Wellington', 'A. A. Silverio', 'meadd.weell@hotmail.com', '149168ws', '1995-07-26 03:00:00', 'ETEC Hortolândia', '3º Médio com Informática', 'Hortolandia - SP', 'Masculino', 37, 'tb_1403008812.jpg', '92929p.jpg', 0, 9, 5, 6, 1, 0, 654, 636),
(4, 'Vítor', 'Gutierrez', 'vitorgutierrez@live.com', 'senha', '1997-07-30 06:00:00', 'ETEC Hortolandia', '1º MI', 'Novo Cambui', 'Feminino', 1, 'padrao.jpg', 'padrao.jpg', 1, 1, 0, 0, 0, 0, 0, 0),
(5, 'Isaque', 'Coelho', 'isaquecoelho.trabalho@hotmail.com', '1997', '1997-03-19 06:00:00', 'ETEC Hortolandia', '2º Ano', 'Hortolandia - SP', 'Masculino', 7, '681h.png', 'padrao.jpg', 1, 1, 5, 2, 0, 30, 80, 80);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usr_usr`
--

CREATE TABLE IF NOT EXISTS `usr_usr` (
  `flw_id` int(11) NOT NULL AUTO_INCREMENT,
  `flw_de` int(11) NOT NULL,
  `flw_quem` int(11) NOT NULL,
  PRIMARY KEY (`flw_id`),
  KEY `users_usr` (`flw_de`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Extraindo dados da tabela `usr_usr`
--

INSERT INTO `usr_usr` (`flw_id`, `flw_de`, `flw_quem`) VALUES
(40, 5, 1),
(41, 5, 4),
(59, 1, 5),
(65, 4, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `grp_usr`
--
ALTER TABLE `grp_usr`
  ADD CONSTRAINT `grp_grups` FOREIGN KEY (`gu_grp`) REFERENCES `grups` (`grp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_grups` FOREIGN KEY (`gu_usr`) REFERENCES `users` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `grups`
--
ALTER TABLE `grups`
  ADD CONSTRAINT `grup_cat` FOREIGN KEY (`grp_cat`) REFERENCES `catery` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `refesh`
--
ALTER TABLE `refesh`
  ADD CONSTRAINT `users_refesh` FOREIGN KEY (`user_id`) REFERENCES `users` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD CONSTRAINT `subc_cat` FOREIGN KEY (`scat_sub`) REFERENCES `subcatery` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subc_cater` FOREIGN KEY (`scat_cat`) REFERENCES `catery` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usr_usr`
--
ALTER TABLE `usr_usr`
  ADD CONSTRAINT `users_usr` FOREIGN KEY (`flw_de`) REFERENCES `users` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
