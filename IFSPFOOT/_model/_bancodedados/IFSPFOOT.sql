-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 05/03/2016 às 00:34
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
-- Estrutura para tabela `Campeonato`
--

CREATE TABLE `Campeonato` (
  `id` int(11) NOT NULL,
  `idRodada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Jogador`
--

CREATE TABLE `Jogador` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf32_bin NOT NULL,
  `sobrenome` varchar(40) COLLATE utf32_bin NOT NULL,
  `idade` int(11) NOT NULL,
  `forca` int(11) NOT NULL,
  `idTime` int(11) NOT NULL,
  `estamina` int(11) NOT NULL,
  `nivel` varchar(20) COLLATE utf32_bin NOT NULL,
  `gol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Jogo`
--

CREATE TABLE `Jogo` (
  `id` int(11) NOT NULL,
  `timeCasa` int(11) NOT NULL,
  `golCasa` int(11) DEFAULT NULL,
  `timeVisitante` int(11) NOT NULL,
  `golVisitante` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `periodo` varchar(10) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Fazendo dump de dados para tabela `Jogo`
--

INSERT INTO `Jogo` (`id`, `timeCasa`, `golCasa`, `timeVisitante`, `golVisitante`, `data`, `periodo`) VALUES
(1, 1, NULL, 2, NULL, '2015-01-01', 'tarde'),
(2, 1, NULL, 3, NULL, '2015-01-01', 'tarde'),
(3, 1, NULL, 4, NULL, '2015-01-01', 'tarde'),
(4, 2, NULL, 3, NULL, '2015-01-01', 'tarde'),
(5, 2, NULL, 4, NULL, '2015-01-01', 'tarde'),
(6, 3, NULL, 4, NULL, '2015-01-01', 'tarde');

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
  `mascote` varchar(20) COLLATE utf32_bin NOT NULL,
  `cor` varchar(20) COLLATE utf32_bin NOT NULL,
  `dono` int(11) DEFAULT NULL,
  `dinheiro` float NOT NULL,
  `torcida` varchar(20) COLLATE utf32_bin NOT NULL,
  `nomeEstadio` varchar(20) COLLATE utf32_bin NOT NULL,
  `capacidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin COMMENT='Time';

--
-- Fazendo dump de dados para tabela `Time`
--

INSERT INTO `Time` (`id`, `nome`, `mascote`, `cor`, `dono`, `dinheiro`, `torcida`, `nomeEstadio`, `capacidade`) VALUES
(1, 'dsa', 'dsa', 'yellow', 1, 10, '10', 'dsada', 10),
(2, 'Time2', 'mascote2', 'cor2', NULL, 10, '10', 'time2', 10),
(3, 'Time3', 'mascote3', 'cor3', NULL, 10, '10', 'time3', 10),
(4, 'Time4', 'mascote4', 'cor4', NULL, 10, '10', 'time4', 10);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Campeonato`
--
ALTER TABLE `Campeonato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Jogador`
--
ALTER TABLE `Jogador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idTime` (`idTime`);

--
-- Índices de tabela `Jogo`
--
ALTER TABLE `Jogo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_timeVisitante` (`timeVisitante`),
  ADD KEY `fk_timeCasa` (`timeCasa`);

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
-- AUTO_INCREMENT de tabela `Jogador`
--
ALTER TABLE `Jogador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de tabela `Jogo`
--
ALTER TABLE `Jogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `Login`
--
ALTER TABLE `Login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `Time`
--
ALTER TABLE `Time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Jogador`
--
ALTER TABLE `Jogador`
  ADD CONSTRAINT `fk_idTime` FOREIGN KEY (`idTime`) REFERENCES `Time` (`id`);

--
-- Restrições para tabelas `Jogo`
--
ALTER TABLE `Jogo`
  ADD CONSTRAINT `fk_timeCasa` FOREIGN KEY (`timeCasa`) REFERENCES `Time` (`id`),
  ADD CONSTRAINT `fk_timeVisitante` FOREIGN KEY (`timeVisitante`) REFERENCES `Time` (`id`);

--
-- Restrições para tabelas `Time`
--
ALTER TABLE `Time`
  ADD CONSTRAINT `fk_dono` FOREIGN KEY (`dono`) REFERENCES `Login` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
