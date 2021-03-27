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
-- Banco de dados: `empresa_projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `orcamento` decimal(10,2) NOT NULL,
  `data_inicio` date NOT NULL,
  `horas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `orcamento`, `data_inicio`, `horas`) VALUES
(1234, '200.00', '2019-06-12', 120),
(2323, '100.00', '2020-12-01', 24);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
