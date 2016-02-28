-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 28/02/2016 às 21:46
-- Versão do servidor: 10.1.9-MariaDB
-- Versão do PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `IFSPFOOT`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Login`
--

CREATE TABLE `Login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(10) COLLATE utf32_bin NOT NULL,
  `senha` varchar(32) COLLATE utf32_bin NOT NULL,
  `administrador` tinyint(1) NOT NULL,
  `nome` varchar(30) COLLATE utf32_bin NOT NULL,
  `sobrenome` varchar(40) COLLATE utf32_bin NOT NULL,
  `email` varchar(40) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin COMMENT='Login de Autenticação a aplicação';

--
-- Fazendo dump de dados para tabela `Login`
--

INSERT INTO `Login` (`id`, `usuario`, `senha`, `administrador`, `nome`, `sobrenome`, `email`) VALUES
(1, 'a', 'a', 1, 'a', 'a', 'a'),
(2, 'b', 'b', 0, 'a', 'a', 'b');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Time`
--

CREATE TABLE `Time` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf32_bin NOT NULL,
  `mascote` varchar(20) COLLATE utf32_bin DEFAULT NULL,
  `cor` varchar(20) COLLATE utf32_bin DEFAULT NULL,
  `dono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin COMMENT='Time';

--
-- Fazendo dump de dados para tabela `Time`
--

INSERT INTO `Time` (`id`, `nome`, `mascote`, `cor`, `dono`) VALUES
(1, 'a', 'a', 'a', NULL)
;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `Time`
--
ALTER TABLE `Time`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD UNIQUE KEY `mascote` (`mascote`),
  ADD KEY `fk_dono` (`dono`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Login`
--
ALTER TABLE `Login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `Time`
--
ALTER TABLE `Time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Time`
--
ALTER TABLE `Time`
  ADD CONSTRAINT `fk_dono` FOREIGN KEY (`dono`) REFERENCES `Login` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
