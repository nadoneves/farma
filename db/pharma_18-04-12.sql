-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Abr 18, 2012 as 03:52 PM
-- Versão do Servidor: 5.1.49
-- Versão do PHP: 5.3.3-1ubuntu9.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `pharma`
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
-- Estrutura da tabela `doacao`
--

CREATE TABLE IF NOT EXISTS `doacao` (
  `idDoacao` int(11) NOT NULL AUTO_INCREMENT,
  `idIgreja` int(11) DEFAULT NULL,
  `codDoacao` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `caminho` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idDoacao`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `doacao`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_produto`
--

CREATE TABLE IF NOT EXISTS `entrada_produto` (
  `idEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `precoUnidade` decimal(8,2) DEFAULT NULL,
  `precoVenda` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`idEntrada`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `entrada_produto`
--

INSERT INTO `entrada_produto` (`idEntrada`, `idProduto`, `quantidade`, `precoUnidade`, `precoVenda`) VALUES
(1, 1, 10, NULL, 5.00),
(2, 2, 10, NULL, 5.00),
(3, 4, 10, 0.00, 5.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE IF NOT EXISTS `estoque` (
  `idEstoque` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  PRIMARY KEY (`idEstoque`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`idEstoque`, `idProduto`, `qtd`) VALUES
(1, 1, 9),
(2, 2, 8),
(3, 4, 0),
(8, 21, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `idfornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(18) NOT NULL,
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
  PRIMARY KEY (`idfornecedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idfornecedor`, `cnpj`, `nome`, `telefone`, `email`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`) VALUES
(1, '', 'Leonardo', '', '', '', '', 0, '', '', '', 19),
(2, '', 'jeova shalom', '', '', '', '', 0, '', '', '', 19),
(3, '00.000.000/0000-00', 'leomir', '(00) 0000-0000', 'a@a.com', '00000-000', 'sssssssss', 1234, 'abc', 'asasassa', 'sasasasa', 19),
(4, '00.000.000/0000-00', 'FAETEC Labs Ltda.', '(11) 1111-1111', 'a@b.com', '00000-000', 'saasa', 12121, 'asasa', 'sasa', 'sasas', 17),
(5, '64.738.452/0001-58', 'FAETEc 123', '(21) 0000-0000', 'a@a.com', '21501-514', 'rua clarimundo de melo', 123, '', 'quintino', 'rio de janeiro', 19);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Extraindo dados da tabela `hist_entrada_produto`
--

INSERT INTO `hist_entrada_produto` (`idHist`, `idProduto`, `quantidade`, `data`) VALUES
(1, 1, 42, '2011-11-26 13:12:50'),
(2, 3, 54, '2011-11-26 14:33:09'),
(3, 2, 60, '2011-11-26 14:33:20'),
(4, 4, 120, '2011-11-26 14:33:40'),
(5, 5, 120, '2011-11-26 14:33:51'),
(6, 6, 3, '2011-11-26 14:34:02'),
(7, 7, 1, '2011-11-26 14:34:17'),
(8, 8, 4, '2011-11-26 14:34:29'),
(9, 9, 3, '2011-11-26 14:34:58'),
(10, 10, 100, '2011-11-26 14:37:52'),
(11, 11, 37, '2011-11-26 14:38:06'),
(12, 12, 17, '2011-11-26 14:38:21'),
(13, 13, 4, '2011-11-26 14:38:43'),
(14, 14, 2, '2011-11-26 14:38:51'),
(15, 15, 6, '2011-11-26 14:39:18'),
(16, 16, 5, '2011-11-26 14:39:33'),
(17, 17, 3, '2011-11-26 14:40:05'),
(18, 18, 2, '2011-11-26 14:40:13'),
(19, 19, 1, '2011-11-26 14:40:25'),
(20, 20, 4, '2011-11-26 14:40:34'),
(21, 21, 2, '2011-11-26 14:40:43'),
(22, 22, 3, '2011-11-26 14:40:53'),
(23, 23, 5, '2011-11-26 14:41:05'),
(24, 24, 3, '2011-11-26 14:43:17'),
(25, 25, 2, '2011-11-26 14:43:30'),
(26, 26, 5, '2011-11-26 14:43:42'),
(27, 37, 2, '2011-11-26 14:43:52'),
(28, 38, 3, '2011-11-26 14:44:10'),
(29, 39, 3, '2011-11-26 14:44:20'),
(30, 40, 3, '2011-11-26 14:44:32'),
(31, 41, 5, '2011-11-26 14:44:46'),
(32, 42, 5, '2011-11-26 14:44:55'),
(33, 43, 2, '2011-11-26 14:46:01'),
(34, 44, 3, '2011-11-26 14:46:08'),
(35, 45, 1, '2011-11-26 14:46:19'),
(36, 46, 3, '2011-11-26 14:46:34'),
(37, 47, 6, '2011-11-26 14:46:45'),
(38, 48, 7, '2011-11-26 14:46:55'),
(39, 49, 4, '2011-11-26 14:47:04'),
(40, 50, 25, '2011-11-26 14:47:11'),
(41, 51, 12, '2011-11-26 14:47:31'),
(42, 52, 80, '2011-11-26 14:47:42'),
(43, 53, 32, '2011-11-26 14:47:49'),
(44, 54, 100, '2011-11-26 14:48:40'),
(45, 55, 125, '2011-11-26 14:48:54'),
(46, 56, 5, '2011-11-26 14:49:13'),
(47, 57, 5, '2011-11-26 14:49:22'),
(48, 58, 22, '2011-11-26 14:49:33'),
(49, 27, 3, '2011-11-26 14:49:47'),
(50, 28, 8, '2011-11-26 14:49:56'),
(51, 29, 17, '2011-11-26 14:50:04'),
(52, 30, 12, '2011-11-26 14:50:10'),
(53, 31, 23, '2011-11-26 14:50:16'),
(54, 32, 20, '2011-11-26 14:50:27'),
(55, 33, 6, '2011-11-26 14:50:36'),
(56, 34, 9, '2011-11-26 14:50:44'),
(57, 35, 12, '2011-11-26 14:51:04'),
(58, 36, 9, '2011-11-26 14:51:14'),
(59, 1, 0, '2012-04-03 10:45:38');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `natureza`
--

INSERT INTO `natureza` (`idNatureza`, `natureza`, `codNatureza`) VALUES
(1, 'adesivos', 1),
(2, 'livros', 2),
(3, 'biblias', 3),
(4, 'quadros', 4),
(5, 'loucas', 5),
(6, 'canecas', 6),
(7, 'vestuario', 7),
(8, 'caixas', 8),
(9, 'papelaria', 9),
(10, 'cds', 10),
(11, 'dvds', 11),
(12, 'eletronicos', 12),
(14, 'imas', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `codBarra` bigint(20) NOT NULL,
  `dataFab` date NOT NULL,
  `lote` varchar(100) NOT NULL,
  `dataVal` date NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idProduto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `tipo`, `marca`, `descricao`, `codBarra`, `dataFab`, `lote`, `dataVal`, `dataCadastro`) VALUES
(1, 'Antibiotico', 'amoxicilina', 'aaaaaaaaaaaa', 123456, '2012-04-11', '', '2012-04-30', '2012-04-03 10:48:41'),
(2, 'antiinflamatorio', 'cataflan', '454564654', 2147483647, '2012-04-20', '', '2012-04-29', '2012-04-11 15:06:50'),
(4, 'antibiotico', 'amoxgelco', 'sjasajsakl', 21474836479, '2012-04-02', '', '2012-04-30', '2012-04-11 15:13:01'),
(21, 'repelente', 'off', 'repelente contra insetos', 21474836478, '2012-04-19', '35445', '2012-04-30', '2012-04-18 10:37:34');

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
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `cpf`, `telefone`, `usuario`, `senha`, `ativo`, `tipo`) VALUES
(5, 'Estoque', '000.000.000-00', '(00)0000-0000', 'estoquista', '1e754b388ad580153b5b6eb54000aeb5', 1, 2),
(4, '', NULL, NULL, 'farmaceutico', 'c8c6b2eb278e770a534ffa5987e48449', 0, 3),
(3, 'Gerente', '000.000.000-00', '(00)0000-0000', 'gerente', '740d9c49b11f3ada7b9112614a54be41', 1, 1),
(2, 'Balcão', '000.000.000-00', '(00)0000-0000', 'balconista', '9f818615cef167fea7fac982f5f2e6ad', 1, 4),
(1, 'Caixa', '000.000.000-00', '(00)0000-0000', 'caixa', 'a3cb966624ac67ed7d8e77c0f39ba36f', 1, 5),
(6, 'Leonardo neves de souza', '112.963.387-03', '(21) 3331-5441', 'leonardo.neves', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(7, 'jessica', '112.963.387-03', '(21) 3331-5444', 'jessica', 'aae039d6aa239cfc121357a825210fa3', 1, 4);

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
  `caminho` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idVenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idVenda`, `codVenda`, `idProduto`, `qtd`, `total`, `data`, `caminho`) VALUES
(19, 1, 2, 2, 10.00, '2012-04-18 11:10:31', '../imp/venda/venda_18-04-2012_11-10.txt'),
(17, 1, 1, 1, 5.00, '2012-04-18 11:09:01', '../imp/venda/venda_18-04-2012_11-10.txt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_igreja`
--

CREATE TABLE IF NOT EXISTS `venda_igreja` (
  `idVendaIgreja` int(11) NOT NULL AUTO_INCREMENT,
  `idIgreja` int(11) DEFAULT NULL,
  `codVenda` int(11) NOT NULL,
  PRIMARY KEY (`idVendaIgreja`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `venda_igreja`
--

INSERT INTO `venda_igreja` (`idVendaIgreja`, `idIgreja`, `codVenda`) VALUES
(1, 2, 2),
(2, 2, 3),
(3, 2, 4),
(4, 0, 5),
(5, 0, 6),
(6, 0, 1),
(7, 0, 2);
