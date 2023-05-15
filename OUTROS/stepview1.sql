-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 15-Maio-2023 às 14:41
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
-- Banco de dados: `stepview1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administracao`
--

CREATE TABLE `administracao` (
  `fk_Funcionario_cpf` varchar(11) NOT NULL,
  `area` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `comentario` varchar(200) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `nascimento`, `telefone`, `email`, `sexo`, `comentario`, `estado`) VALUES
('06188144183', 'gabriel', '2003-09-18', '66996854445', 'gab@gmail.com', 'M', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cpf`, `nome`, `senha`) VALUES
('06188144183', 'gabriel', '123'),
('09371746963', 'NICOLAS RODRIGUES BLASKOVSKI', 'pato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `odontologista`
--

CREATE TABLE `odontologista` (
  `fk_Funcionario_cpf` varchar(11) NOT NULL,
  `crm` int(11) DEFAULT NULL,
  `especialidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'novo', '1', '1222-02-12', '06188144183'),
(6, 'dente', '3', '2020-12-12', '06188144183'),
(7, 'novo', '4', '2023-09-12', '06188144183');

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
  `fk_Funcionario_cpf` varchar(11) NOT NULL,
  `idSecretaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administracao`
--
ALTER TABLE `administracao`
  ADD PRIMARY KEY (`fk_Funcionario_cpf`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `odontologista`
--
ALTER TABLE `odontologista`
  ADD PRIMARY KEY (`fk_Funcionario_cpf`);

--
-- Índices para tabela `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`idProcesso`),
  ADD KEY `FK_Processo_2` (`fk_Cliente_cpf`);

--
-- Índices para tabela `realiza`
--
ALTER TABLE `realiza`
  ADD PRIMARY KEY (`fk_Funcionario_cpf`,`fk_Processo_idProcesso`),
  ADD KEY `FK_Realiza_2` (`fk_Processo_idProcesso`);

--
-- Índices para tabela `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`fk_Funcionario_cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `processo`
--
ALTER TABLE `processo`
  MODIFY `idProcesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administracao`
--
ALTER TABLE `administracao`
  ADD CONSTRAINT `FK_Administracao_2` FOREIGN KEY (`fk_Funcionario_cpf`) REFERENCES `funcionario` (`cpf`);

--
-- Limitadores para a tabela `odontologista`
--
ALTER TABLE `odontologista`
  ADD CONSTRAINT `FK_Odontologista_1` FOREIGN KEY (`fk_Funcionario_cpf`) REFERENCES `funcionario` (`cpf`);

--
-- Limitadores para a tabela `processo`
--
ALTER TABLE `processo`
  ADD CONSTRAINT `FK_Processo_2` FOREIGN KEY (`fk_Cliente_cpf`) REFERENCES `cliente` (`cpf`);

--
-- Limitadores para a tabela `realiza`
--
ALTER TABLE `realiza`
  ADD CONSTRAINT `FK_Realiza_1` FOREIGN KEY (`fk_Funcionario_cpf`) REFERENCES `funcionario` (`cpf`),
  ADD CONSTRAINT `FK_Realiza_2` FOREIGN KEY (`fk_Processo_idProcesso`) REFERENCES `processo` (`idProcesso`);

--
-- Limitadores para a tabela `secretaria`
--
ALTER TABLE `secretaria`
  ADD CONSTRAINT `FK_Secretaria_2` FOREIGN KEY (`fk_Funcionario_cpf`) REFERENCES `funcionario` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
