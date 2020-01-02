-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2019 às 11:39
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_agenda`
--

CREATE TABLE `contato_agenda` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `phone` varchar(50) NOT NULL DEFAULT '0',
  `img` varchar(50) NOT NULL DEFAULT 'images/user.png',
  `id_usuario` int(11) NOT NULL DEFAULT 0,
  `description` varchar(100) NOT NULL DEFAULT 'images/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato_agenda`
--

INSERT INTO `contato_agenda` (`id`, `name`, `email`, `phone`, `img`, `id_usuario`, `description`) VALUES
(1, 'Carlos Silva', 'carlos@gmail.com', '2135515339', 'images/5903-foto.jpg', 1, 'images/user.png'),
(8, 'Paula Ferreira', 'paula@teste.com', '21966187719', 'images/3883-foto.png', 1, 'images/user.png'),
(9, 'ddd', 'ddd@eee.com', '21966187719', 'images/user.png', 1, 'images/user.png'),
(10, 'ffwwf', 'wfw@rr.com', '21966187719', 'images/user.png', 1, 'images/user.png'),
(11, 'ffwwf', 'wfw@rr.com', '21966187719', 'images/user.png', 1, 'images/user.png'),
(12, 'ffwwf', 'wfw@rr.com', '21966187719', 'images/user.png', 1, 'images/user.png'),
(13, 'Roberta Campos', 'roberta@teste.com', '21966187719', 'images/9051-foto.jpg', 1, 'images/user.png'),
(15, 'dsds', 'sds@sfsf.com', '3123123', 'images/user.png', 1, 'images/user.png'),
(16, 'ssssss', 'ssss@sssc.com', '221324234343', 'images/user.png', 1, 'images/user.png'),
(17, 'dsds', 'sds@sfsf.com', '3123123', 'images/user.png', 1, 'images/user.png'),
(18, 'Teste com outra sessao', 'paula.reis@live.com', '21313131231', 'images/user.png', 2, 'images/user.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Evento Azul999', '#FF0000', '2017-08-01 00:00:00', '2019-10-16 00:00:00'),
(2, 'Eventos 2', '#40E0D0', '2017-08-02 00:00:00', '2019-10-17 00:00:00'),
(3, 'Doble click para editar evento', '#008000', '2017-08-03 00:00:00', '2019-10-18 00:00:00'),
(4, 'Novo TItulo de Evento', '#008000', '2019-10-15 00:00:00', '2019-10-20 00:00:00'),
(5, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'saafasfsa', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'sdsdsd', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `painel` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT 'images/user.png',
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `senha`, `phone`, `painel`, `img`, `description`) VALUES
(1, 'Jefferson Ferreira', 'jefferson14489@gmail.com', '123', '21966187719', 'Admin', NULL, 'Breve descrição sobre meu perfil'),
(2, 'Paula Ferreira', 'paula.reis@live.com', '123', '21966187719', 'Admin', NULL, 'Breve descrição sobre meu perfil');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contato_agenda`
--
ALTER TABLE `contato_agenda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contato_agenda`
--
ALTER TABLE `contato_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
