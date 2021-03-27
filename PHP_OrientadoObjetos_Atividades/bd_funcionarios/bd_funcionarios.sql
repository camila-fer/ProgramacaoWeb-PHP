-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Dez-2020 às 18:36
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_funcionarios`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `tempo_servico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`matricula`, `nome`, `salario`, `tempo_servico`) VALUES
(323, 'Maria', '500.00', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
