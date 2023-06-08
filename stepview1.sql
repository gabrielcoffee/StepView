-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jun-2023 às 21:18
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `cpf` varchar(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`cpf`, `nome`, `senha`) VALUES
('12312312312', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `nascimento`, `telefone`, `email`, `sexo`, `estado`) VALUES
('06188144183', 'gabriel', '2003-09-18', '66996854445', 'gab@gmail.com', 'M', 1),
('12312312312', 'nicolas', '2000-09-18', '41999999999', 'nic@gmail.com', 'M', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `odontologista`
--

CREATE TABLE `odontologista` (
  `cpf` varchar(11) NOT NULL,
  `crm` int(11) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `nome` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `odontologista`
--

INSERT INTO `odontologista` (`cpf`, `crm`, `senha`, `nome`) VALUES
('06188144183', 12345, 'Bielf1234-', 'gab');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE `processo` (
  `idProcesso` int(11) NOT NULL,
  `tipoProcesso` varchar(50) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `data_marcada` date DEFAULT NULL,
  `fk_Cliente_cpf` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `processo`
--

INSERT INTO `processo` (`idProcesso`, `tipoProcesso`, `descricao`, `data_marcada`, `fk_Cliente_cpf`) VALUES
(1, 'remoção dente', 'remove os dentes tortos', '2023-09-18', '06188144183'),
(2, 'cárie', 'remove cárie', '2023-02-10', '06188144183'),
(3, 'aplicação', 'nova aplicação', '2009-07-27', '12312312312'),
(4, 'novo', 'vnooasdffdas', '2023-06-15', '06188144183');

-- --------------------------------------------------------

--
-- Estrutura da tabela `realiza`
--

CREATE TABLE `realiza` (
  `fk_Funcionario_cpf` varchar(11) NOT NULL,
  `fk_Processo_idProcesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretaria`
--

CREATE TABLE `secretaria` (
  `cpf` varchar(11) NOT NULL,
  `idSecretaria` int(11) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `nome` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `secretaria`
--

INSERT INTO `secretaria` (`cpf`, `idSecretaria`, `senha`, `nome`) VALUES
('09371746963', 25, 'nicolas', 'Nicolas');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`idProcesso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `processo`
--
ALTER TABLE `processo`
  MODIFY `idProcesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
