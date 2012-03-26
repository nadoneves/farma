-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mar 26, 2012 as 02:54 PM
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
  PRIMARY KEY (`idEntrada`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Extraindo dados da tabela `entrada_produto`
--

INSERT INTO `entrada_produto` (`idEntrada`, `idProduto`, `quantidade`) VALUES
(1, 1, 39),
(2, 2, 60),
(3, 3, 54),
(4, 4, 120),
(5, 5, 120),
(6, 6, 2),
(7, 7, 0),
(8, 8, 4),
(9, 9, 2),
(10, 10, 100),
(11, 11, 37),
(12, 12, 17),
(13, 13, 4),
(14, 14, 0),
(15, 15, 6),
(16, 16, 5),
(17, 17, 3),
(18, 18, 2),
(19, 19, 1),
(20, 20, 4),
(21, 21, 0),
(22, 22, 3),
(23, 23, 5),
(24, 24, 3),
(25, 25, 2),
(26, 26, 5),
(27, 27, 3),
(28, 28, 8),
(29, 29, 17),
(30, 30, 12),
(31, 31, 23),
(32, 32, 20),
(33, 33, 6),
(34, 34, 9),
(35, 35, 12),
(36, 36, 9),
(37, 37, 2),
(38, 38, 3),
(39, 39, 3),
(40, 40, 3),
(41, 41, 5),
(42, 42, 5),
(43, 43, 2),
(44, 44, 3),
(45, 45, 1),
(46, 46, 3),
(47, 47, 6),
(48, 48, 0),
(49, 49, 4),
(50, 50, 25),
(51, 51, 12),
(52, 52, 80),
(53, 53, 32),
(54, 54, 100),
(55, 55, 125),
(56, 56, 4),
(57, 57, 5),
(58, 58, 22);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`idfornecedor`, `cnpj`, `nome`, `telefone`, `email`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`) VALUES
(1, '', 'Leonardo', '', '', '', '', 0, '', '', '', 19),
(2, '', 'jeova shalom', '', '', '', '', 0, '', '', '', 19),
(3, '00.000.000/0000-00', 'leomir', '(00) 0000-0000', 'a@a.com', '00000-000', 'sssssssss', 1234, 'abc', 'asasassa', 'sasasasa', 19),
(4, '00.000.000/0000-00', 'FAETEC', '(11) 1111-1111', 'b@b.com', '00000-000', 'saasa', 12121, 'asasa', 'sasa', 'sasas', 17);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

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
(58, 36, 9, '2011-11-26 14:51:14');

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
  `idNatureza` int(11) NOT NULL,
  `idBens` int(11) NOT NULL,
  `precoUnidade` decimal(8,2) NOT NULL,
  `precoVenda` decimal(8,2) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `unidade` varchar(10) NOT NULL,
  `codBarra` int(11) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idProduto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `idNatureza`, `idBens`, `precoUnidade`, `precoVenda`, `descricao`, `unidade`, `codBarra`, `dataCadastro`) VALUES
(1, 1, 1, 0.60, 1.20, 'grande', 'un', 120101, '2011-11-26 13:06:18'),
(2, 1, 1, 0.38, 1.00, 'pequeno', 'un', 120102, '2011-11-26 13:06:38'),
(3, 9, 1, 0.55, 2.00, 'c/ envelope', 'un', 920103, '2011-11-26 13:07:15'),
(4, 9, 1, 0.05, 0.20, 'ct marca pag msg', 'un', 920104, '2011-11-26 13:11:19'),
(5, 9, 1, 0.05, 0.20, 'ct marca pag smili', 'un', 920105, '2011-11-26 13:18:59'),
(6, 8, 1, 2.00, 3.00, 'azul casa', 'un', 820106, '2011-11-26 13:20:28'),
(7, 8, 1, 1.50, 2.50, 'azul-flor', 'un', 820107, '2011-11-26 13:20:50'),
(8, 8, 1, 0.64, 3.00, 'azul - pulpito', 'un', 820108, '2011-11-26 13:21:20'),
(9, 8, 1, 0.64, 2.50, 'flor de/para', 'un', 820109, '2011-11-26 13:22:41'),
(10, 14, 1, 0.28, 0.50, 'biblia', 'un', 13201010, '2011-11-26 13:23:27'),
(11, 2, 1, 0.99, 2.50, 'infantil color-p', 'un', 2201011, '2011-11-26 13:24:33'),
(12, 2, 1, 1.69, 4.50, 'infantil color-g', 'un', 2201012, '2011-11-26 13:25:10'),
(13, 4, 1, 1.29, 3.00, 'porta chave 509', 'un', 4201013, '2011-11-26 13:26:09'),
(14, 4, 1, 4.19, 6.50, 'porta chave', 'un', 4201014, '2011-11-26 13:26:44'),
(15, 14, 1, 0.96, 1.50, 'porcelana', 'un', 13201015, '2011-11-26 13:27:34'),
(16, 6, 1, 0.99, 1.50, 'mini de/para', 'un', 6201016, '2011-11-26 13:28:13'),
(17, 4, 1, 5.50, 9.50, 'parede 30x40', 'un', 4201017, '2011-11-26 13:29:09'),
(18, 5, 1, 2.80, 3.50, 'paliteiro', 'un', 5201018, '2011-11-26 13:29:44'),
(19, 5, 1, 2.80, 3.50, 'saleiro', 'un', 5201019, '2011-11-26 13:30:20'),
(20, 8, 1, 2.30, 3.50, 'pj coracao - p', 'un', 8201020, '2011-11-26 13:31:47'),
(21, 8, 1, 3.00, 5.00, 'pj - g', 'un', 8201021, '2011-11-26 13:32:53'),
(22, 6, 1, 1.94, 3.00, '170 ml', 'un', 6201022, '2011-11-26 13:33:22'),
(23, 4, 1, 2.20, 4.50, 'mesa gesso-coraçao', 'un', 4201023, '2011-11-26 13:34:15'),
(24, 4, 1, 1.65, 3.50, 'mesa-vidro', 'un', 4201024, '2011-11-26 13:35:29'),
(25, 4, 1, 1.85, 3.50, 'mesa -vidro-casa', 'un', 4201025, '2011-11-26 13:36:46'),
(26, 4, 1, 1.60, 3.50, 'mesa-vidro-pulpito', 'un', 4201026, '2011-11-26 13:37:24'),
(27, 7, 1, 9.90, 15.90, 'babylook-pp', 'un', 7201027, '2011-11-26 13:53:42'),
(28, 7, 1, 9.90, 15.90, 'BABYLOOK-p', 'un', 7201028, '2011-11-26 13:54:10'),
(29, 7, 1, 9.90, 15.90, 'BABYLOOK-m', 'un', 7201029, '2011-11-26 13:54:28'),
(30, 7, 1, 9.90, 15.90, 'BABYLOOK-g', 'un', 7201030, '2011-11-26 13:54:45'),
(31, 7, 1, 9.90, 15.90, 'BABYLOOK-gg', 'un', 7201031, '2011-11-26 13:55:00'),
(32, 7, 1, 11.90, 17.90, 'CAMISA-MASC-p', 'un', 7201032, '2011-11-26 13:56:02'),
(33, 7, 1, 11.90, 17.90, 'CAMISA-MASC-m', 'un', 7201033, '2011-11-26 13:56:26'),
(34, 7, 1, 11.90, 17.90, 'camisa-MASC-g', 'un', 7201034, '2011-11-26 13:57:36'),
(35, 7, 1, 11.90, 17.90, 'CAMISA-MASC-gg', 'un', 7201035, '2011-11-26 13:57:49'),
(36, 7, 1, 11.99, 15.90, 'camiseta-tam varios', 'un', 7201036, '2011-11-26 13:59:17'),
(37, 5, 1, 2.55, 3.55, 'urso sentado', 'un', 5201037, '2011-11-26 14:02:27'),
(38, 4, 1, 1.50, 3.50, 'mesa-salmo mini', 'un', 4201038, '2011-11-26 14:02:47'),
(39, 4, 1, 1.85, 3.50, 'mesa-salmo mini-pomba', 'un', 4201039, '2011-11-26 14:03:06'),
(40, 4, 1, 5.99, 6.50, 'parede-placa 23x18', 'un', 4201040, '2011-11-26 14:05:19'),
(41, 2, 1, 1.99, 2.50, 'color giz-p', 'un', 2201041, '2011-11-26 14:08:00'),
(42, 2, 1, 2.99, 4.00, 'COLOR GIZ-g', 'un', 2201042, '2011-11-26 14:08:14'),
(43, 4, 1, 3.75, 5.50, 'mesa- salmo mini r', 'un', 4201043, '2011-11-26 14:10:34'),
(44, 5, 1, 1.70, 3.00, 'pergaminho', 'un', 5201044, '2011-11-26 14:10:56'),
(45, 5, 1, 1.70, 3.00, 'concha', 'un', 5201045, '2011-11-26 14:11:16'),
(46, 9, 1, 1.50, 3.00, 'bloco anotacao', 'un', 9201046, '2011-11-26 14:11:38'),
(47, 8, 1, 3.25, 6.00, 'de promessa-couro', 'un', 8201047, '2011-11-26 14:12:07'),
(48, 1, 1, 1.00, 2.00, 'op JC', 'un', 1201048, '2011-11-26 14:12:29'),
(49, 1, 1, 2.00, 5.00, 'peixinho', 'un', 1201049, '2011-11-26 14:13:11'),
(50, 9, 1, 1.25, 2.00, 'caneta', 'un', 9201050, '2011-11-26 14:13:33'),
(51, 1, 1, 0.70, 3.00, 'placas pretas', 'un', 1201051, '2011-11-26 14:13:51'),
(52, 9, 1, 0.06, 0.50, 'ct card', 'un', 9201052, '2011-11-26 14:14:10'),
(53, 14, 1, 1.10, 2.00, 'esc borracha', 'un', 13201053, '2011-11-26 14:14:33'),
(54, 14, 1, 0.25, 0.70, 'smilinguido', 'un', 13201054, '2011-11-26 14:15:00'),
(55, 9, 1, 0.05, 0.20, 'ct de/para-p', 'un', 9201055, '2011-11-26 14:16:28'),
(56, 1, 1, 1.60, 3.00, 'mini', 'un', 1201056, '2011-11-26 14:18:27'),
(57, 1, 1, 2.40, 3.50, 'brilhante', 'un', 1201057, '2011-11-26 14:19:00'),
(58, 7, 1, 2.50, 8.00, 'gravata', 'un', 7201058, '2011-11-26 14:19:19');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `cpf`, `telefone`, `usuario`, `senha`, `ativo`, `tipo`) VALUES
(5, 'Estoque', '000.000.000-00', '(00)0000-0000', 'estoquista', '1e754b388ad580153b5b6eb54000aeb5', 1, 2),
(4, '', NULL, NULL, 'farmaceutico', 'c8c6b2eb278e770a534ffa5987e48449', 0, 3),
(3, 'Gerente', '000.000.000-00', '(00)0000-0000', 'gerente', '740d9c49b11f3ada7b9112614a54be41', 1, 1),
(2, 'Balcão', '000.000.000-00', '(00)0000-0000', 'balconista', '9f818615cef167fea7fac982f5f2e6ad', 1, 4),
(1, 'Caixa', '000.000.000-00', '(00)0000-0000', 'caixa', 'a3cb966624ac67ed7d8e77c0f39ba36f', 1, 5),
(6, 'Leonardo neves', '112.963.387-03', '(21) 3331-5441', 'leonardo.neves', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
