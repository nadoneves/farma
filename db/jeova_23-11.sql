-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Nov 23, 2011 as 03:57 PM
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `entrada_produto`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `hist_entrada_produto`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `igreja`
--

CREATE TABLE IF NOT EXISTS `igreja` (
  `idIgreja` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` tinyint(2) NOT NULL,
  PRIMARY KEY (`idIgreja`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `igreja`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `natureza`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `produto`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE IF NOT EXISTS `uf` (
  `idUF` tinyint(2) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(2) NOT NULL,
  PRIMARY KEY (`idUF`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`idUF`, `sigla`) VALUES
(1, 'AC'),
(2, 'AL'),
(3, 'AP'),
(4, 'AM'),
(5, 'BA'),
(6, 'CE'),
(7, 'DF'),
(8, 'ES'),
(9, 'GO'),
(10, 'MA'),
(11, 'MT'),
(12, 'MS'),
(13, 'MG'),
(14, 'PA'),
(15, 'PB'),
(16, 'PR'),
(17, 'PE'),
(18, 'PI'),
(19, 'RJ'),
(20, 'RN'),
(21, 'RS'),
(22, 'RO'),
(23, 'RR'),
(24, 'SC'),
(25, 'SP'),
(26, 'SE'),
(27, 'TO');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `venda`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_igreja`
--

CREATE TABLE IF NOT EXISTS `venda_igreja` (
  `idVendaIgreja` int(11) NOT NULL AUTO_INCREMENT,
  `idIgreja` int(11) DEFAULT NULL,
  `codVenda` int(11) NOT NULL,
  PRIMARY KEY (`idVendaIgreja`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `venda_igreja`
--

