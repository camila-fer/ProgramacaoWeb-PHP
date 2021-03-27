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
-- Banco de dados: `revendedora_automoveis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `automoveis`
--

CREATE TABLE `automoveis` (
  `id_automovel` int(11) NOT NULL,
  `fabricante` varchar(30) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `cor` varchar(15) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `portas` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `preco_venda` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `automoveis`
--

INSERT INTO `automoveis` (`id_automovel`, `fabricante`, `placa`, `cor`, `modelo`, `portas`, `ano`, `preco_venda`) VALUES
(17, 'BMW', 'ABC-1234', ' Vermelho', '767765', 4, 2017, '238950.00'),
(18, 'FIAT', 'FDT-343', 'Amarelo', 'gfdere33', 2, 2018, '53900.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricantes`
--

CREATE TABLE `fabricantes` (
  `fabricante` varchar(30) NOT NULL,
  `num_carros` int(11) DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fabricantes`
--

INSERT INTO `fabricantes` (`fabricante`, `num_carros`, `preco_unitario`) VALUES
('BMW', 10, '238950.00'),
('Chevrolet', 8, '35000.00'),
('FIAT', 5, '53900.00'),
('Honda', 2, '23250.00'),
('Volkswagen', 5, '11500.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `automoveis`
--
ALTER TABLE `automoveis`
  ADD PRIMARY KEY (`id_automovel`),
  ADD KEY `automoveis_ibfk_1` (`fabricante`);

--
-- Índices para tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`fabricante`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `automoveis`
--
ALTER TABLE `automoveis`
  MODIFY `id_automovel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `automoveis`
--
ALTER TABLE `automoveis`
  ADD CONSTRAINT `automoveis_ibfk_1` FOREIGN KEY (`fabricante`) REFERENCES `fabricantes` (`fabricante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
