-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Maio-2015 às 19:34
-- Versão do servidor: 5.5.38-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `te_coordena`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fases`
--

CREATE TABLE IF NOT EXISTS `fases` (
  `id_fase` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `inicio` date NOT NULL,
  `fim` date NOT NULL,
  `fk_id_projeto` int(11) NOT NULL,
  PRIMARY KEY (`id_fase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `fases`
--

INSERT INTO `fases` (`id_fase`, `nome`, `descricao`, `inicio`, `fim`, `fk_id_projeto`) VALUES
(13, 'fase 1 proj pedro', 'teste testte Ã§sldkf jÃ§aslk d ', '2030-11-01', '2030-11-01', 16),
(14, 'fase 2 do novo porjeto do pedro', 'testes', '0000-00-00', '0000-00-00', 16),
(15, 'fase 3 do novo porjeto do pedro', 'balblablbal laskdfas', '0000-00-00', '0000-00-00', 16),
(16, 'fase 4 proj pedro', 'testes  taslkdfj Ã§lasd Ã§l  ', '0000-00-00', '0000-00-00', 16),
(17, 'fase 5 do novo projeto do pedro', 'teae tawetaw tawetaw', '0000-00-00', '0000-00-00', 16),
(18, 'fase 6 do novo porjeto do pedro', 'Ã§lkj Ã§lkj Ã§kjÃ§', '0000-00-00', '0000-00-00', 0),
(19, 'fase 7 do novo proj pedro', 'lkjh lkj h afsd asdfas', '0000-00-00', '0000-00-00', 16),
(20, 'fase 8 do novo proj do pedro', 'Ã§lsjdÃ§as Ã§ asÃ§dlkfj saÃ§dlkf ', '2030-11-01', '2030-11-01', 16),
(21, 'fase 1 seg proj pedro', 'fase um do segundo projeto do pedro ', '0000-00-00', '0000-00-00', 17),
(22, 'modal teste faset', 'teste modal fase', '2015-05-21', '2015-05-22', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `missoes`
--

CREATE TABLE IF NOT EXISTS `missoes` (
  `id_missao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `fk_id_fase` int(11) NOT NULL,
  PRIMARY KEY (`id_missao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `missoes`
--

INSERT INTO `missoes` (`id_missao`, `nome`, `descricao`, `inicio`, `fim`, `fk_id_fase`) VALUES
(22, 'missao 1 fase 1 pedro - listar missoes', 'teste para listar missoes', NULL, NULL, 13),
(26, 'missao 2 fase 1 pedro', 'asdfsa', NULL, NULL, 13),
(27, 'teste 3', 'aÃ§sdlkjf', NULL, NULL, 13),
(30, 'passa id fase modal', 'testes certo', NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE IF NOT EXISTS `projetos` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `criador` varchar(100) NOT NULL,
  `id_criador` int(11) NOT NULL,
  PRIMARY KEY (`id_projeto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id_projeto`, `nome`, `descricao`, `inicio`, `fim`, `criador`, `id_criador`) VALUES
(16, 'primeiro projeto pedro', 'bÃ§baÃ§ asldfsf', '2015-05-19', '2015-06-30', 'pedro', 4),
(17, 'segundo projeto pedro', 'teste teste teste lala lala la ', '2015-05-11', '2015-05-29', 'pedro', 4),
(18, 'Revisando as datas', 'teste', '2015-05-19', '2015-06-19', 'pedro', 4),
(19, 'Mais datas', 'blabla', '2015-05-03', '2015-05-28', 'pedro', 4),
(20, 'primeiro projeto Artur', 'asdfas', '2015-05-28', '2015-05-29', 'artur', 2),
(21, 'projeto 2 artur', 'descriÃ§Ã£o', '2015-05-23', '2015-05-27', 'artur', 2),
(22, 'proj 3 artur', 'teste', '2015-05-20', '2015-05-29', 'artur', 2),
(23, 'primero proj Ana', 'Ã§lasdkjf sd', '2015-05-28', '2015-05-13', 'ana', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE IF NOT EXISTS `tarefas` (
  `id_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `estado` int(5) NOT NULL DEFAULT '0',
  `inicio` date NOT NULL,
  `fim` date NOT NULL,
  `dono_id_usuario` int(11) NOT NULL,
  `id_missao` int(11) NOT NULL,
  PRIMARY KEY (`id_tarefa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id_tarefa`, `nome`, `descricao`, `estado`, `inicio`, `fim`, `dono_id_usuario`, `id_missao`) VALUES
(1, 'tarefa 1 missao 1', 'blbalbl', 0, '2015-05-12', '2015-05-19', 0, 0),
(2, 'tarefa 1 missao 1', 'blbalblbal', 0, '2015-05-07', '2015-05-20', 0, 0),
(3, 'tarefa 1 missao 1', 'blbalblbal', 0, '2015-05-07', '2015-05-20', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id_time` int(11) NOT NULL AUTO_INCREMENT,
  `id_projeto` int(11) NOT NULL,
  `integranteUm` int(11) NOT NULL,
  `integranteDois` int(11) NOT NULL,
  `integranteTres` int(11) DEFAULT NULL,
  `integranteQuatro` int(1) DEFAULT NULL,
  `id_criador` int(11) NOT NULL,
  PRIMARY KEY (`id_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `time`
--

INSERT INTO `time` (`id_time`, `id_projeto`, `integranteUm`, `integranteDois`, `integranteTres`, `integranteQuatro`, `id_criador`) VALUES
(13, 16, 1, 2, 3, 7, 4),
(14, 20, 2, 3, 7, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `papel` varchar(20) NOT NULL,
  `criado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_usuario`, `username`, `password`, `papel`, `criado`, `modificado`, `nome`, `sexo`) VALUES
(1, 'teste', 'teste', 'professor', '2014-12-19 00:00:00', NULL, 'teste', 'f'),
(2, 'artur', 'artur', 'aluno', NULL, NULL, 'artur', 'm'),
(3, 'tomas', 'tomas', 'aluno', NULL, NULL, 'tomas', 'm'),
(4, 'pedro', 'pedro', 'aluno', NULL, NULL, 'pedro', 'm'),
(5, 'kborges', '1234', 'professor', NULL, NULL, 'Karen', 'f'),
(6, 'silvana', 'silvana', 'aluno', NULL, NULL, 'silvana', 'f'),
(7, 'ana', 'ana', 'aluno', NULL, NULL, 'Ana', 'f'),
(8, 'testeBla', 'testebla', 'aluno', NULL, NULL, 'testebla', 'f'),
(9, 'arturmarks', 'arturmarks', 'aluno', NULL, NULL, 'arturmarks', 'f');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
