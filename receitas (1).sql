-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Jan-2018 às 17:52
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receitas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriareceitas`
--

DROP TABLE IF EXISTS `categoriareceitas`;
CREATE TABLE IF NOT EXISTS `categoriareceitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoriareceitas`
--

INSERT INTO `categoriareceitas` (`id`, `nome`) VALUES
(1, 'Sopas'),
(2, 'Carne'),
(3, 'Peixe'),
(4, 'Sobremesa'),
(5, 'Salada'),
(6, 'Entradas'),
(7, 'Marisco'),
(8, 'Arroz'),
(9, 'Massas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes`
--

DROP TABLE IF EXISTS `ingredientes`;
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingredientes_receitas`
--

DROP TABLE IF EXISTS `ingredientes_receitas`;
CREATE TABLE IF NOT EXISTS `ingredientes_receitas` (
  `id_receitas` int(11) NOT NULL,
  `id_ingredientes` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_receitas`,`id_ingredientes`),
  KEY `id_ingredientes` (`id_ingredientes`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `metrica`
--

DROP TABLE IF EXISTS `metrica`;
CREATE TABLE IF NOT EXISTS `metrica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_receita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_receita` (`id_receita`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE IF NOT EXISTS `receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `duracao` float DEFAULT NULL,
  `n_pessoas` int(11) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dificuldade` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id`, `id_user`, `nome`, `desc`, `duracao`, `n_pessoas`, `preco`, `data`, `dificuldade`, `id_categoria`) VALUES
(1, 1, 'Sopa de alho Francês', NULL, NULL, 2, 3.5, '2018-01-05 17:49:32', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitasimagens`
--

DROP TABLE IF EXISTS `receitasimagens`;
CREATE TABLE IF NOT EXISTS `receitasimagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_receita` int(11) NOT NULL,
  `desc` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_receita` (`id_receita`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `receitasimagens`
--

INSERT INTO `receitasimagens` (`id`, `id_receita`, `desc`, `url`) VALUES
(1, 1, NULL, 'sopaAlhoFrances.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `dataNasc` datetime DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `emailConfirmado` tinyint(1) DEFAULT NULL,
  `emailConfirmar` varchar(250) DEFAULT NULL,
  `nickname` varchar(250) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `passRecuperada` int(11) DEFAULT NULL,
  `passRecuperacaoToken` varchar(250) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT '0',
  `img` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `dataNasc`, `email`, `emailConfirmado`, `emailConfirmar`, `nickname`, `pass`, `passRecuperada`, `passRecuperacaoToken`, `estado`, `tipo`, `img`) VALUES
(1, 'João', 'Borges', '1997-12-24 00:00:00', 'jprb14@gmail.com', 1, NULL, NULL, '35fae0e272170b27c1a1147660b57204d4ee9bce330187ff8a979702dd2b60f93273fa3789fb70d5fb603fc90ec362edbd64d6340c6cd3b89cf9835865cc1bb3', NULL, NULL, NULL, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
