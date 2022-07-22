-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jul-2022 às 01:31
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `project` varchar(100) NOT NULL,
  `obs` text DEFAULT NULL,
  `directory` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `project`
--

INSERT INTO `project` (`id`, `project`, `obs`, `directory`) VALUES
(1, 'Projeto Site1', 'obs site 1', '../laravel-site1'),
(2, 'Projeto Site2', 'site 2', '../laravel-site2');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vproject_progress`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vproject_progress` (
`id` int(11)
,`id_project_progress` int(11)
,`item` varchar(50)
,`concluded` tinyint(1)
,`active` tinyint(1)
,`obs` text
,`date_reg` datetime
,`date_update` datetime
,`id_project` int(10) unsigned
,`project` varchar(100)
,`directory` text
,`obs_project` text
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vproject_progress`
--
DROP TABLE IF EXISTS `vproject_progress`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vproject_progress`  AS SELECT `prg`.`id` AS `id`, `prg`.`id_project_progress` AS `id_project_progress`, `prg`.`item` AS `item`, `prg`.`concluded` AS `concluded`, `prg`.`active` AS `active`, `prg`.`obs` AS `obs`, `prg`.`date_reg` AS `date_reg`, `prg`.`date_update` AS `date_update`, `prj`.`id` AS `id_project`, `prj`.`project` AS `project`, `prj`.`directory` AS `directory`, `prj`.`obs` AS `obs_project` FROM (`progress` `prg` join `project` `prj`) WHERE `prg`.`id_project_progress` = `prj`.`id``id`  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
