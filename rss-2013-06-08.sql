-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `rss`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `catery`
--

CREATE TABLE IF NOT EXISTS `catery` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_titulo` varchar(160) NOT NULL,
  `cat_sub` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `catery`
--

INSERT INTO `catery` (`cat_id`, `cat_titulo`, `cat_sub`) VALUES
(1, 'ETEC Hortolândia', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grp_usr`
--

CREATE TABLE IF NOT EXISTS `grp_usr` (
  `gu_id` int(11) NOT NULL AUTO_INCREMENT,
  `gu_usr` int(11) NOT NULL,
  `gu_grp` int(11) NOT NULL,
  PRIMARY KEY (`gu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `grp_usr`
--

INSERT INTO `grp_usr` (`gu_id`, `gu_usr`, `gu_grp`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grups`
--

CREATE TABLE IF NOT EXISTS `grups` (
  `grp_id` int(11) NOT NULL AUTO_INCREMENT,
  `grp_titulo` varchar(160) NOT NULL,
  `grp_cat` int(11) NOT NULL,
  PRIMARY KEY (`grp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `grups`
--

INSERT INTO `grups` (`grp_id`, `grp_titulo`, `grp_cat`) VALUES
(1, '2º MI', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `refesh`
--

CREATE TABLE IF NOT EXISTS `refesh` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `att_tipo` int(1) NOT NULL,
  `att_desc` varchar(255) NOT NULL,
  `att_date` varchar(255) NOT NULL,
  PRIMARY KEY (`att_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `refesh`
--

INSERT INTO `refesh` (`att_id`, `user_id`, `att_tipo`, `att_desc`, `att_date`) VALUES
(1, 1, 1, 'Wellington Silverio esta seguindo Isaque Coelho.', '13 de abril de 2012 às 18:43'),
(2, 1, 9, 'Eu aqui criando essa rede social , as 21:33 kkk amanha tem simulado da fuvest e eu aqui :)', '13 de abril de 2012 às 21:34'),
(5, 1, 1, 'Adicionou o BONASSA', '16 de maio de 2013 às 12:08'),
(17, 4, 9, 'bla bla bla...', '01 de HOJE de 2012 às 18:43'),
(18, 1, 1, 'esta seguindo Isaque Coelho', '1 de Junho de 2013 as 12:22'),
(19, 4, 1, 'esta seguindo Wellington Silverio', '1 de Junho de 2013 as 12:56'),
(25, 1, 1, 'esta seguindo VÃ­tor Gutierrez', '6 de Junho de 2013 as 12:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcatery`
--

CREATE TABLE IF NOT EXISTS `subcatery` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_titulo` varchar(160) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `subcatery`
--

INSERT INTO `subcatery` (`sub_id`, `sub_titulo`) VALUES
(1, 'Materia'),
(2, 'Escola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_nome` varchar(60) NOT NULL,
  `usr_sobrenome` varchar(60) NOT NULL,
  `usr_email` varchar(120) NOT NULL,
  `usr_senha` varchar(60) NOT NULL,
  `usr_data_n` date NOT NULL,
  `usr_escola` varchar(60) NOT NULL,
  `usr_serie` varchar(60) NOT NULL,
  `usr_local` varchar(60) NOT NULL,
  `usr_genero` varchar(11) NOT NULL,
  `usr_level` int(11) NOT NULL,
  `usr_image` varchar(255) NOT NULL DEFAULT 'padrao.gif',
  `usr_capa` varchar(255) NOT NULL DEFAULT 'padrao.jpg',
  `usr_ref` int(11) NOT NULL,
  `usr_nivel` int(1) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`usr_id`, `usr_nome`, `usr_sobrenome`, `usr_email`, `usr_senha`, `usr_data_n`, `usr_escola`, `usr_serie`, `usr_local`, `usr_genero`, `usr_level`, `usr_image`, `usr_capa`, `usr_ref`, `usr_nivel`) VALUES
(1, 'Wellington', 'Silverio', 'meadd.weell@hotmail.com', '149168ws', '1995-07-26', 'ETEC Hortolandia', '3Âº Ano', 'Hortolandia - SP', 'Masculino', 20, '809532746_372255616186627_677911984_n.jpg', '92929p.jpg', 0, 9),
(4, 'VÃ­tor', 'Gutierrez', 'vitorgutierrez@live.com', 'senha', '1997-07-30', 'ETEC Hortolandia', '1Âº MI', 'Novo Cambui', 'Feminino', 1, '477CPU.jpg', 'padrao.jpg', 1, 1),
(5, 'Isaque', 'Coelho', 'isaquecoelho.trabalho@hotmail.com', '1997', '1997-03-19', 'ETEC Hortolandia', '2Âº Ano', 'Hortolandia - SP', 'Masculino', 1, '681h.png', 'padrao.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usr_usr`
--

CREATE TABLE IF NOT EXISTS `usr_usr` (
  `flw_id` int(11) NOT NULL AUTO_INCREMENT,
  `flw_de` int(11) NOT NULL,
  `flw_quem` int(11) NOT NULL,
  PRIMARY KEY (`flw_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `usr_usr`
--

INSERT INTO `usr_usr` (`flw_id`, `flw_de`, `flw_quem`) VALUES
(8, 4, 3),
(25, 1, 5),
(26, 4, 1),
(32, 1, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
