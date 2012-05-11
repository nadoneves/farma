-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 11, 2012 as 03:29 PM
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
-- Estrutura da tabela `entrada_produto`
--

CREATE TABLE IF NOT EXISTS `entrada_produto` (
  `idEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `idFornecedor` int(11) DEFAULT NULL,
  `nf` varchar(100) NOT NULL,
  `dataNf` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `precoUnidade` decimal(8,2) NOT NULL,
  PRIMARY KEY (`idEntrada`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `entrada_produto`
--

INSERT INTO `entrada_produto` (`idEntrada`, `idProduto`, `idFornecedor`, `nf`, `dataNf`, `quantidade`, `precoUnidade`) VALUES
(1, 1, 5, '123ab', '2012-05-01', 10, 10.00),
(2, 23, 1, '123', '2012-05-22', 10, 5.00),
(3, 1, 1, '123', '2012-05-22', 5, 5.00),
(4, 1, 1, '123', '2012-05-08', 10, 5.00),
(5, 23, 2, '1234', '2012-05-11', 10, 10.00),
(6, 1, 2, '1234', '2012-05-11', 10, 5.00),
(7, 1, 1, '123', '2012-05-07', 123, 1.23),
(8, 24, 1, 'abcd', '2012-05-01', 10, 0.50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE IF NOT EXISTS `estoque` (
  `idEstoque` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  PRIMARY KEY (`idEstoque`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`idEstoque`, `idProduto`, `qtd`) VALUES
(1, 1, 142),
(2, 2, 8),
(3, 4, 0),
(8, 21, 0),
(10, 23, 17),
(11, 24, 7);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `hist_entrada_produto`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `tipo`, `marca`, `descricao`, `codBarra`, `dataFab`, `lote`, `dataVal`, `dataCadastro`) VALUES
(1, 'Antibiotico', 'amoxicilina', 'aaaaaaaaaaaa', 123456, '2012-04-11', '123', '2012-04-30', '2012-04-03 10:48:41'),
(2, 'antiinflamatorio', 'cataflan', '454564654', 2147483647, '2012-04-20', '123', '2012-04-29', '2012-04-11 15:06:50'),
(4, 'antibiotico', 'amoxgelco', 'sjasajsakl', 21474836479, '2012-04-02', '123', '2012-04-30', '2012-04-11 15:13:01'),
(21, 'repelente', 'off', 'repelente contra insetos', 21474836478, '2012-04-19', '35445', '2012-04-30', '2012-04-18 10:37:34'),
(23, 'TESTE', 'TESTE', 'TESTE', 555, '2012-05-09', '1234', '2012-05-22', '2012-05-11 11:26:27'),
(24, 'TESTE', 'teste 2', 'sasasa', 23132, '2012-05-07', '1234', '2012-05-09', '2012-05-11 14:51:57');

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
(3, 'Gerente', '000.000.000-00', '(00)0000-0000', 'gerente', '740d9c49b11f3ada7b9112614a54be41', 1, 1),
(2, 'Balcão', '000.000.000-00', '(00)0000-0000', 'balconista', '9f818615cef167fea7fac982f5f2e6ad', 1, 4),
(1, 'Caixa', '000.000.000-00', '(00)0000-0000', 'caixa', 'a3cb966624ac67ed7d8e77c0f39ba36f', 1, 5);

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
  `finalizada` smallint(6) DEFAULT '0',
  PRIMARY KEY (`idVenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=37 ;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idVenda`, `codVenda`, `idProduto`, `qtd`, `total`, `data`, `caminho`, `finalizada`) VALUES
(31, 1, 1, 2, 10.00, '2012-05-11 14:51:28', '../imp/venda/venda_11-05-2012_14-52.txt', 0),
(32, 1, 23, 1, 8.00, '2012-05-11 14:51:38', '../imp/venda/venda_11-05-2012_14-52.txt', 0),
(33, 1, 24, 1, 1.00, '2012-05-11 14:52:29', '../imp/venda/venda_11-05-2012_14-52.txt', 0);
