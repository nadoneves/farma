-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Nov 17, 2011 as 02:18 PM
-- Versão do Servidor: 5.1.49
-- Versão do PHP: 5.3.3-1ubuntu9.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `jeova`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bens`
--

CREATE TABLE IF NOT EXISTS `bens` (
  `idBens` int(11) NOT NULL AUTO_INCREMENT,
  `bens` varchar(20) NOT NULL,
  `codBens` int(11) NOT NULL,
  PRIMARY KEY (`idBens`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `bens`
--

INSERT INTO `bens` (`idBens`, `bens`, `codBens`) VALUES
(1, 'CONSUMO', 2010),
(2, 'PERMANENTE', 2020);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_produto`
--

CREATE TABLE IF NOT EXISTS `entrada_produto` (
  `idEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`idEntrada`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `entrada_produto`
--

INSERT INTO `entrada_produto` (`idEntrada`, `idProduto`, `quantidade`) VALUES
(1, 1, 4),
(2, 5, 4),
(3, 6, 78);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hist_entrada_produto`
--

CREATE TABLE IF NOT EXISTS `hist_entrada_produto` (
  `idHist` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idHist`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `hist_entrada_produto`
--

INSERT INTO `hist_entrada_produto` (`idHist`, `idProduto`, `quantidade`, `data`) VALUES
(1, 6, 10, '2011-11-16 11:23:17'),
(2, 6, 20, '2011-11-16 11:25:52'),
(3, 6, 40, '2011-11-16 11:27:16'),
(4, 6, 10, '2011-11-17 10:21:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `natureza`
--

CREATE TABLE IF NOT EXISTS `natureza` (
  `idNatureza` int(11) NOT NULL AUTO_INCREMENT,
  `natureza` varchar(50) NOT NULL,
  `codNatureza` int(11) NOT NULL,
  PRIMARY KEY (`idNatureza`),
  UNIQUE KEY `codNatureza` (`codNatureza`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `natureza`
--

INSERT INTO `natureza` (`idNatureza`, `natureza`, `codNatureza`) VALUES
(1, 'biblia', 1010),
(2, 'camisa', 1011),
(3, 'cd', 1012),
(4, 'dvd', 1013),
(5, 'Eletrônico', 1014);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `idNatureza` int(11) NOT NULL,
  `idBens` int(11) NOT NULL,
  `precoUnidade` decimal(8,2) NOT NULL,
  `precoVenda` decimal(8,2) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `unidade` varchar(10) NOT NULL,
  `codBarra` int(11) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idProduto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `idNatureza`, `idBens`, `precoUnidade`, `precoVenda`, `descricao`, `unidade`, `codBarra`, `dataCadastro`) VALUES
(1, 1, 1, 5.50, 10.00, 'PRODUTO 1', 'UN', 101020101, '2011-10-21 14:43:32'),
(2, 1, 1, 5.50, 20.00, 'PRODUTO 2', 'UN', 101020102, '2011-10-21 14:43:55'),
(3, 1, 1, 5.50, 25.00, 'PRODUTO 3', 'UN', 101020103, '2011-10-21 14:43:57'),
(4, 1, 1, 5.50, 8.00, 'PRODUTO 4 ', 'UN', 101020104, '2011-10-21 14:43:58'),
(5, 1, 1, 5.50, 15.00, 'PRODUTO 5', 'UN', 101020105, '2011-10-21 14:43:58'),
(6, 2, 1, 0.50, 1.00, 'teste', 'UN', 101120106, '2011-11-16 11:16:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE IF NOT EXISTS `venda` (
  `idVenda` int(11) NOT NULL AUTO_INCREMENT,
  `codVenda` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idVenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idVenda`, `codVenda`, `idProduto`, `qtd`, `total`, `data`) VALUES
(1, 1, 1, 1, 10.00, '2011-11-17 13:43:30'),
(2, 1, 5, 2, 30.00, '2011-11-17 13:43:35'),
(3, 1, 6, 2, 2.00, '2011-11-17 13:43:44');
