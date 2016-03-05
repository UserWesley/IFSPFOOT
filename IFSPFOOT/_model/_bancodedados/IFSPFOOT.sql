-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 05/03/2016 às 16:16
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
  `nome` varchar(20) COLLATE utf32_bin NOT NULL,
  `temporada` int(11) NOT NULL,
  `vencedor` varchar(20) COLLATE utf32_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Fazendo dump de dados para tabela `Campeonato`
--

INSERT INTO `Campeonato` (`id`, `nome`, `temporada`, `vencedor`) VALUES
(1, 'LIGA IFSP', 2016, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Jogador`
--

CREATE TABLE `Jogador` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf32_bin NOT NULL,
  `sobrenome` varchar(40) COLLATE utf32_bin NOT NULL,
  `posicao` varchar(20) COLLATE utf32_bin NOT NULL,
  `nacionalidade` varchar(20) COLLATE utf32_bin NOT NULL,
  `habilidade` varchar(20) COLLATE utf32_bin NOT NULL,
  `idade` int(11) NOT NULL,
  `forca` int(11) NOT NULL,
  `idTime` int(11) NOT NULL,
  `estamina` int(11) NOT NULL,
  `nivel` varchar(20) COLLATE utf32_bin NOT NULL,
  `gol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Fazendo dump de dados para tabela `Jogador`
--

INSERT INTO `Jogador` (`id`, `nome`, `sobrenome`, `posicao`, `nacionalidade`, `habilidade`, `idade`, `forca`, `idTime`, `estamina`, `nivel`, `gol`) VALUES
(1, 'JogadorTime1', 'JogadorTime1', 'Atacante', 'brasileiro', 'habilidade', 10, 10, 1, 10, 'Equilibrado', 0),
(2, 'JogadorTime1', 'JogadorTime1', 'Atacante', 'brasileiro', 'habilidade', 10, 10, 1, 10, 'Equilibrado', 0),
(3, 'JogadorTime1', 'JogadorTime1', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 1, 100, 'Equilibrado', 0),
(4, 'JogadorTime1', 'JogadorTime1', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 1, 100, 'Equilibrado', 0),
(5, 'JogadorTime1', 'JogadorTime1', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 1, 100, 'Equilibrado', 0),
(6, 'JogadorTime2', 'JogadorTime2', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 2, 100, 'Equilibrado', 0),
(7, 'JogadorTime2', 'JogadorTime2', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 2, 100, 'Equilibrado', 0),
(8, 'JogadorTime2', 'JogadorTime2', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 2, 100, 'Equilibrado', 0),
(9, 'JogadorTime2', 'JogadorTime2', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 2, 100, 'Equilibrado', 0),
(10, 'JogadorTime2', 'JogadorTime2', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 2, 100, 'Equilibrado', 0),
(11, 'JogadorTime3', 'JogadorTime3', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 3, 100, 'Equilibrado', 0),
(12, 'JogadorTime3', 'JogadorTime3', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 3, 100, 'Equilibrado', 0),
(13, 'JogadorTime3', 'JogadorTime3', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 3, 100, 'Equilibrado', 0),
(14, 'JogadorTime3', 'JogadorTime3', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 3, 100, 'Equilibrado', 0),
(15, 'JogadorTime3', 'JogadorTime3', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 3, 100, 'Equilibrado', 0),
(16, 'JogadorTime4', 'JogadorTime4', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 4, 100, 'Equilibrado', 0),
(17, 'JogadorTime4', 'JogadorTime4', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 4, 100, 'Equilibrado', 0),
(18, 'JogadorTime4', 'JogadorTime4', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 4, 100, 'Equilibrado', 0),
(19, 'JogadorTime4', 'JogadorTime4', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 4, 100, 'Equilibrado', 0),
(20, 'JogadorTime4', 'JogadorTime4', 'Atacante', 'brasileiro', 'habilidade', 30, 50, 4, 100, 'Equilibrado', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Jogo`
--

CREATE TABLE `Jogo` (
  `id` int(11) NOT NULL,
  `timeCasa` varchar(20) COLLATE utf32_bin NOT NULL,
  `golCasa` int(11) DEFAULT NULL,
  `golVisitante` int(11) DEFAULT NULL,
  `timeVisitante` varchar(20) COLLATE utf32_bin NOT NULL,
  `rodada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Fazendo dump de dados para tabela `Jogo`
--

INSERT INTO `Jogo` (`id`, `timeCasa`, `golCasa`, `golVisitante`, `timeVisitante`, `rodada`) VALUES
(1, 'dsa', NULL, NULL, 'Time2', 1),
(2, 'dsa', NULL, NULL, 'Time3', 2),
(3, 'dsa', NULL, NULL, 'Time4', 3),
(4, 'Time2', NULL, NULL, 'Time3', 3),
(5, 'Time2', NULL, NULL, 'Time4', 2),
(6, 'Time3', NULL, NULL, 'Time4', 1);

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
-- Estrutura para tabela `Rodada`
--

CREATE TABLE `Rodada` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(10) COLLATE utf32_bin NOT NULL,
  `periodo` varchar(10) COLLATE utf32_bin NOT NULL,
  `clima` varchar(20) COLLATE utf32_bin NOT NULL,
  `campeonato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Fazendo dump de dados para tabela `Rodada`
--

INSERT INTO `Rodada` (`id`, `numero`, `data`, `hora`, `periodo`, `clima`, `campeonato`) VALUES
(1, 1, '2016-03-10', '16:00', 'Tarde', 'Nublado', 1),
(2, 2, '2016-04-10', '20:00', 'Noite', 'Chuva', 1),
(3, 3, '2016-05-10', '09:00', 'ManhÃ£', 'Sol', 1);

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
  `capacidade` int(11) NOT NULL,
  `vitoria` int(11) NOT NULL,
  `derrota` int(11) NOT NULL,
  `empate` int(11) NOT NULL,
  `pontos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin COMMENT='Time';

--
-- Fazendo dump de dados para tabela `Time`
--

INSERT INTO `Time` (`id`, `nome`, `mascote`, `cor`, `dono`, `dinheiro`, `torcida`, `nomeEstadio`, `capacidade`, `vitoria`, `derrota`, `empate`, `pontos`) VALUES
(1, 'dsa', 'da', 'yellow', 1, 10, '10', 'da', 10, 0, 0, 0, 0),
(2, 'Time2', 'mascote2', 'cor2', NULL, 10, '10', 'time2', 10, 0, 0, 0, 0),
(3, 'Time3', 'mascote3', 'cor3', NULL, 10, '10', 'time3', 10, 0, 0, 0, 0),
(4, 'Time4', 'mascote4', 'cor4', NULL, 10, '10', 'time4', 10, 0, 0, 0, 0);

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
  ADD KEY `fk_idRodada` (`rodada`),
  ADD KEY `fk_timeVisitante` (`timeVisitante`),
  ADD KEY `fk_timeCasa1` (`timeCasa`);

--
-- Índices de tabela `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `Rodada`
--
ALTER TABLE `Rodada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idCampeonato` (`campeonato`);

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
-- AUTO_INCREMENT de tabela `Campeonato`
--
ALTER TABLE `Campeonato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT de tabela `Rodada`
--
ALTER TABLE `Rodada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `Time`
--
ALTER TABLE `Time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `fk_idRodada` FOREIGN KEY (`rodada`) REFERENCES `Rodada` (`id`),
  ADD CONSTRAINT `fk_timeCasa` FOREIGN KEY (`timeCasa`) REFERENCES `Time` (`nome`),
  ADD CONSTRAINT `fk_timeCasa1` FOREIGN KEY (`timeCasa`) REFERENCES `Time` (`nome`),
  ADD CONSTRAINT `fk_timeVisitante` FOREIGN KEY (`timeVisitante`) REFERENCES `Time` (`nome`);

--
-- Restrições para tabelas `Rodada`
--
ALTER TABLE `Rodada`
  ADD CONSTRAINT `fk_idCampeonato` FOREIGN KEY (`campeonato`) REFERENCES `Campeonato` (`id`);

--
-- Restrições para tabelas `Time`
--
ALTER TABLE `Time`
  ADD CONSTRAINT `fk_dono` FOREIGN KEY (`dono`) REFERENCES `Login` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
