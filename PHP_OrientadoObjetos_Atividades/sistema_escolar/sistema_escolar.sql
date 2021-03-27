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
-- Banco de dados: `sistema_escolar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `matricula` int(11) NOT NULL,
  `unidade_curricular` varchar(50) NOT NULL,
  `primeira_avaliacao` double(2,1) NOT NULL,
  `segunda_avaliacao` double(2,1) NOT NULL,
  `media` double(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`matricula`, `unidade_curricular`, `primeira_avaliacao`, `segunda_avaliacao`, `media`) VALUES
(323, 'Lógica de Programação', 7.5, 7.5, 7.5),
(2222, 'Estatística', 5.5, 7.0, 6.2),
(7464, 'Estatística', 9.0, 8.5, 8.8),
(35775, 'Lógica de Programação', 9.0, 9.5, 9.2),
(64564, 'Engenharia de Software', 7.3, 7.5, 7.4),
(756445, 'Lógica de Programação', 6.0, 5.7, 5.8);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
