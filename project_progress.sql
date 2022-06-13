-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2022 às 04:32
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `project_progress`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `id_project_progress` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `concluded` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `obs` text NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `progress`
--

INSERT INTO `progress` (`id`, `id_project_progress`, `item`, `concluded`, `active`, `obs`, `date_reg`, `date_update`) VALUES
(7, 1, 'cadastrar clientes', 1, 1, 'teste', '2022-06-12 22:26:13', '2022-06-12 22:28:03'),
(8, 1, 'cadastrar funcionarios', 0, 1, '', '2022-06-12 22:27:10', '0000-00-00 00:00:00'),
(9, 1, 'cadastrar produto', 0, 1, '', '2022-06-12 22:27:47', '2022-06-12 23:32:28'),
(10, 2, 'cadastrar clientes', 0, 1, '', '2022-06-12 22:28:19', '0000-00-00 00:00:00'),
(11, 2, 'cadastrar funcionarios', 1, 1, '', '2022-06-12 22:28:23', '2022-06-12 22:28:27');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
