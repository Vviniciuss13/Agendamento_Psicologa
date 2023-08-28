-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Nov-2022 às 13:26
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd clinica`
--
CREATE DATABASE IF NOT EXISTS `bd clinica` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `bd clinica`;

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `ano`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `ano`;
CREATE TABLE IF NOT EXISTS `ano` (
`SUM(valor_consulta)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `dia`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `dia`;
CREATE TABLE IF NOT EXISTS `dia` (
`SUM(valor_consulta)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `mes`
-- (Veja abaixo para a view atual)
--
DROP VIEW IF EXISTS `mes`;
CREATE TABLE IF NOT EXISTS `mes` (
`SUM(valor_consulta)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
CREATE TABLE IF NOT EXISTS `tbl_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `cpf_cliente` varchar(14) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `ddd_cliente` varchar(2) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `telefone_cliente` varchar(10) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email_cliente` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `historico_cliente` varchar(1000) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `id_endereco` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `cpf_cliente` (`cpf_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id_cliente`, `nome_cliente`, `cpf_cliente`, `ddd_cliente`, `telefone_cliente`, `email_cliente`, `data_nasc`, `historico_cliente`, `id_endereco`) VALUES
(13, 'José', '321.545.231-02', '15', '32133-2421', 'jose@gmail.com', '2022-10-05', '', 22),
(6, 'Marcus', '321.123.333-77', '15', '12543-0987', 'Marcus@gmail.com', '2005-10-20', '', 15),
(7, 'Ana Clara', '321.223.333-77', '15', '97543-0987', 'clara@gmail.com', '2005-07-07', '', 16),
(8, 'Duda', '321.223.353-77', '15', '97543-6787', 'duda@gmail.com', '2005-07-01', '', 17),
(9, 'Ana Julia', '123.543.646-23', '15', '23214-2321', 'anaju@gmail.com', '2009-06-11', '', 18),
(10, 'Raquel', '321.325.523-04', '15', '23234-2325', 'raquel@gmail.com', '1994-07-08', '', 19),
(12, 'Kleber', '123.321.425-92', '15', '12345-2314', 'kleber@gmail.com', '2006-07-13', '', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_consulta`
--

DROP TABLE IF EXISTS `tbl_consulta`;
CREATE TABLE IF NOT EXISTS `tbl_consulta` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_consulta` date NOT NULL,
  `hora_consulta` time NOT NULL,
  `tempo_consulta` int(11) NOT NULL,
  `valor_consulta` int(11) NOT NULL,
  `descricao_consulta` varchar(1000) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `pago` bit(1) NOT NULL,
  PRIMARY KEY (`id_consulta`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `tbl_consulta`
--

INSERT INTO `tbl_consulta` (`id_consulta`, `id_usuario`, `id_cliente`, `data_consulta`, `hora_consulta`, `tempo_consulta`, `valor_consulta`, `descricao_consulta`, `pago`) VALUES
(7, 1, 2, '2022-10-23', '13:00:00', 2, 100, '', b'0'),
(8, 1, 9, '2022-10-23', '14:00:00', 5, 300, '', b'1'),
(4, 1, 5, '2022-10-23', '17:00:00', 1, 50, '', b'0'),
(14, 1, 6, '2022-10-24', '18:00:00', 2, 100, '', b'1'),
(13, 1, 7, '2022-10-24', '18:00:00', 2, 100, '', b'0'),
(15, 1, 5, '2022-10-26', '16:00:00', 2, 50, '', b'0'),
(16, 1, 5, '2022-10-27', '19:30:00', 4, 400, '', b'0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_endereco`
--

DROP TABLE IF EXISTS `tbl_endereco`;
CREATE TABLE IF NOT EXISTS `tbl_endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep_endereco` varchar(8) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `estado_endereco` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `numero_endereco` int(11) NOT NULL,
  `cidade_endereco` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `bairro_endereco` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `rua_endereco` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `tbl_endereco`
--

INSERT INTO `tbl_endereco` (`id_endereco`, `cep_endereco`, `estado_endereco`, `numero_endereco`, `cidade_endereco`, `bairro_endereco`, `rua_endereco`) VALUES
(17, '04849529', 'SP', 21, 'São Paulo', 'Cantinho do Céu', 'José'),
(16, '04849529', 'SP', 653, 'São Paulo', 'Cantinho do Céu', 'Tania'),
(15, '04849529', 'SP', 77, 'São Paulo', 'Cantinho do Céu', 'Papa'),
(18, '04843425', 'SP', 52, 'São Paulo', 'Parque São José', 'Campos'),
(19, '18279260', 'SP', 20, 'Tatuí', 'Vila Bandeirantes', 'João felicio magaldi'),
(21, '18270008', 'SP', 20, 'Tatuí', 'Centro', 'Rua Domingos Souza Rodrigues'),
(22, '13528004', 'SP', 22, 'Águas de São Pedro', 'Centro', 'Praça da Matriz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_notas`
--

DROP TABLE IF EXISTS `tbl_notas`;
CREATE TABLE IF NOT EXISTS `tbl_notas` (
  `id_notas` int(11) NOT NULL AUTO_INCREMENT,
  `nota` varchar(5000) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_notas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `senha_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Estrutura para vista `ano`
--
DROP TABLE IF EXISTS `ano`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ano`  AS  select sum(`tbl_consulta`.`valor_consulta`) AS `SUM(valor_consulta)` from `tbl_consulta` where ((year(`tbl_consulta`.`data_consulta`) = year(curdate())) and (`tbl_consulta`.`pago` = 1)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `dia`
--
DROP TABLE IF EXISTS `dia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dia`  AS  select sum(`tbl_consulta`.`valor_consulta`) AS `SUM(valor_consulta)` from `tbl_consulta` where ((year(`tbl_consulta`.`data_consulta`) = dayofmonth(curdate())) and (`tbl_consulta`.`pago` = 1)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `mes`
--
DROP TABLE IF EXISTS `mes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mes`  AS  select sum(`tbl_consulta`.`valor_consulta`) AS `SUM(valor_consulta)` from `tbl_consulta` where ((year(`tbl_consulta`.`data_consulta`) = month(curdate())) and (`tbl_consulta`.`pago` = 1)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
