-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/06/2023 às 18:57
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `stepview1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `nascimento`, `telefone`, `email`, `sexo`, `comentario`, `estado`) VALUES
('06188144183', 'gabriel', '2003-09-18', '66996854445', 'gab@gmail.com', 'F', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`cpf`, `nome`, `senha`) VALUES
('06188144183', 'gabriel', '123'),
('09371746963', 'NICOLAS RODRIGUES BLASKOVSKI', 'pato');

-- --------------------------------------------------------

--
-- Estrutura para tabela `odontologista`
--

CREATE TABLE `odontologista` (
  `fk_Funcionario_cpf` varchar(11) NOT NULL,
  `crm` int(11) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `nome` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `odontologista`
--

INSERT INTO `odontologista` (`fk_Funcionario_cpf`, `crm`, `senha`, `nome`) VALUES
('09371746963', 242, 'nicolas', 'Nicolas'),
('12345678900', 2453, 'nVmKn', 'Nicolas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `processo`
--

CREATE TABLE `processo` (
  `idProcesso` int(11) NOT NULL,
  `tipoProcesso` varchar(50) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `data_marcada` date DEFAULT NULL,
  `fk_Cliente_cpf` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `processo`
--

INSERT INTO `processo` (`idProcesso`, `tipoProcesso`, `descricao`, `data_marcada`, `fk_Cliente_cpf`) VALUES
(4, 'novo', '1', '1222-02-12', '06188144183'),
(6, 'dente', '3', '2020-12-12', '06188144183'),
(7, 'novo', '4', '2023-09-12', '06188144183');

-- --------------------------------------------------------

--
-- Estrutura para tabela `realiza`
--

CREATE TABLE `realiza` (
  `fk_Funcionario_cpf` varchar(11) NOT NULL,
  `fk_Processo_idProcesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `secretaria`
--

CREATE TABLE `secretaria` (
  `fk_Funcionario_cpf` varchar(11) NOT NULL,
  `idSecretaria` int(11) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `nome` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `secretaria`
--

INSERT INTO `secretaria` (`fk_Funcionario_cpf`, `idSecretaria`, `senha`, `nome`) VALUES
('09371746963', 25, 'nicolas', 'Nicolas'),
('06188144183', 39, 'qwer', 'juana');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
