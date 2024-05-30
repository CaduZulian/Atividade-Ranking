create database fai_ranking;

use fai_ranking;

CREATE USER 'admin_ranking_fai'@'localhost' IDENTIFIED BY '1a2b3c4d@2024';

GRANT ALL PRIVILEGES ON fai_ranking.* TO 'admin_ranking_fai'@'localhost';

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/05/2024 às 21:10
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fai_ranking`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `ra` int(11) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id`, `name`, `ra`, `password`) VALUES
(1, 'Carlos', 1, 'teste123'),
(2, 'Pedro', 62, '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `maxValue` int(11) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atividades`
--

INSERT INTO `atividades` (`id`, `name`, `maxValue`, `createdAt`, `description`) VALUES
(1, 'Atividade pagina php', 10, '2024-05-30 14:34:39', 'Fazer uma pagina PHP'),
(2, 'atividade extra', 10, '2024-05-30 15:30:05', 'atividade extra');

-- --------------------------------------------------------

--
-- Estrutura para tabela `entrega_atividade`
--

CREATE TABLE `entrega_atividade` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idAtividade` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `comments` varchar(80) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `entrega_atividade`
--

INSERT INTO `entrega_atividade` (`id`, `idAluno`, `idAtividade`, `grade`, `comments`, `createdAt`) VALUES
(1, 1, 1, 10, 'atividade bem feita', '2024-05-30 15:28:59'),
(2, 1, 2, 8, 'mais ou menos bom', '2024-05-30 15:38:05'),
(3, 2, 1, 10, 'bom', '2024-05-30 16:03:45');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ra` (`ra`);

--
-- Índices de tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `entrega_atividade`
--
ALTER TABLE `entrega_atividade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAluno` (`idAluno`),
  ADD KEY `idAtividade` (`idAtividade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `entrega_atividade`
--
ALTER TABLE `entrega_atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `entrega_atividade`
--
ALTER TABLE `entrega_atividade`
  ADD CONSTRAINT `entrega_atividade_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `entrega_atividade_ibfk_2` FOREIGN KEY (`idAtividade`) REFERENCES `atividades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
