-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 09-Maio-2023 às 15:46
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `stepview`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `procedimentoFeito` int(11) DEFAULT NULL,
  `nomeCliente` varchar(50) DEFAULT NULL,
  `emailCliente` varchar(50) DEFAULT NULL,
  `telCliente` int(11) DEFAULT NULL,
  `idadeCliente` date DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  `sexoCliente` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `procedimentoFeito`, `nomeCliente`, `emailCliente`, `telCliente`, `idadeCliente`, `dataCadastro`, `sexoCliente`) VALUES
(67, NULL, 'Ana da Silva ', 'www', NULL, NULL, '0000-00-00', 'não sei'),
(1111, NULL, 'Ana da Silva', 'ana@gmail.com', NULL, NULL, '0000-00-00', 'feminino'),
(1234, NULL, 'joao', 'joao@gmail.com', NULL, NULL, '0000-00-00', 'masculino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `emailFuncionario` varchar(60) NOT NULL,
  `senhaFuncionario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `emailFuncionario`, `senhaFuncionario`) VALUES
(0, '', '123'),
(123, '', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `idProcedimento` int(11) NOT NULL,
  `tipoProcedimento` varchar(50) DEFAULT NULL,
  `dataProcedimento` date DEFAULT NULL,
  `valor` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `realizam`
--

CREATE TABLE `realizam` (
  `fk_Funcionario_idFuncionario` int(11) NOT NULL,
  `fk_Procedimento_idProcedimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requerem`
--

CREATE TABLE `requerem` (
  `fk_Cliente_idCliente` int(11) NOT NULL,
  `fk_Procedimento_idProcedimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Índices para tabela `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`idProcedimento`);

--
-- Índices para tabela `realizam`
--
ALTER TABLE `realizam`
  ADD PRIMARY KEY (`fk_Funcionario_idFuncionario`,`fk_Procedimento_idProcedimento`);

--
-- Índices para tabela `requerem`
--
ALTER TABLE `requerem`
  ADD PRIMARY KEY (`fk_Cliente_idCliente`,`fk_Procedimento_idProcedimento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
