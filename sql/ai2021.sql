-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/03/2021 às 02:03
-- Versão do servidor: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- Versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ai2021`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome_funcionario` varchar(150) NOT NULL,
  `cartao_funcionario` varchar(10) NOT NULL,
  `unidade_funcionario` varchar(2) NOT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome_funcionario`, `cartao_funcionario`, `unidade_funcionario`, `data_cadastro`) VALUES
(1, 'Jonas Baptista Franco', '38593', '10', '2021-03-19'),
(2, 'Ḱemily Fernanda Esteves Boer Franco', '38594', '10', '2021-03-20'),
(3, 'Pedro Boer Franco', '38595', '19', '2021-03-20'),
(4, 'Pedro Boer Franco - Teste', '111111', '13', '2021-03-20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `palestras`
--

CREATE TABLE `palestras` (
  `id` int(11) NOT NULL,
  `titulo_palestra` varchar(150) NOT NULL,
  `nome_palestra` varchar(150) NOT NULL,
  `duracao_palestra` int(6) NOT NULL,
  `data_liberacao` date NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_alteracao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `palestras`
--

INSERT INTO `palestras` (`id`, `titulo_palestra`, `nome_palestra`, `duracao_palestra`, `data_liberacao`, `data_cadastro`, `data_alteracao`) VALUES
(3, 'Teste Update 1', 'teste_update1.mp4', 2000, '2021-02-01', '2021-03-14', '2021-03-14'),
(6, 'Teste Update 2', 'teste_update2.mp4', 3000, '2021-03-20', '2021-03-14', '2021-03-14'),
(7, 'Teste update 3', 'teste_update3.mp4', 3000, '2021-03-21', '2021-03-14', '2021-03-14'),
(8, 'Teste update 4', 'teste_update4.mp4', 4000, '2021-03-25', '2021-03-14', '2021-03-14'),
(12, 'Teste Update 5', 'teste_update5.mp4', 5000, '2021-03-31', '2021-03-14', NULL),
(29, 'Ubuntu', 'Ubuntu  (Imagem - Limpa) [Executando] - Oracle VM VirtualBox 2021-02-05 15-22-35.mp4', 1000, '2021-03-20', '2021-03-20', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(60) NOT NULL,
  `senha_usuario` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_usuario`, `senha_usuario`) VALUES
(1, 'jonas', '123');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `palestras`
--
ALTER TABLE `palestras`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `palestras`
--
ALTER TABLE `palestras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
