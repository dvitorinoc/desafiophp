-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Mar-2021 às 14:05
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `desafiophp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `devedor`
--

CREATE TABLE `devedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `tipo_juridico` enum('pf','pj') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dividas`
--

CREATE TABLE `dividas` (
  `id` int(11) NOT NULL,
  `devedor_id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `valor` double NOT NULL,
  `vencimento` date NOT NULL,
  `updated` datetime NOT NULL,
  `paga` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `devedor_id` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `complemento` varchar(80) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `devedor`
--
ALTER TABLE `devedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dividas`
--
ALTER TABLE `dividas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devedor_id` (`devedor_id`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devedor_id` (`devedor_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `devedor`
--
ALTER TABLE `devedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `dividas`
--
ALTER TABLE `dividas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dividas`
--
ALTER TABLE `dividas`
  ADD CONSTRAINT `dividas_ibfk_1` FOREIGN KEY (`devedor_id`) REFERENCES `devedor` (`id`);

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_ibfk_1` FOREIGN KEY (`devedor_id`) REFERENCES `devedor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
