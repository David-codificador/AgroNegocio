-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Mar-2021 às 14:00
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mvcpadrao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(45) DEFAULT NULL,
  `expiracao_token` datetime DEFAULT NULL,
  `tipo_administrador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `foto`, `telefone`, `email`, `usuario`, `senha`, `status`, `cadastro`, `token`, `expiracao_token`, `tipo_administrador_id`) VALUES
(1, 'David Natan ', '060221103321611.png', '(62) 9 9813-1151', 'natan_seabra@hotmail.com', 'Admin', '123', 1, '2020-09-01 21:23:37', NULL, NULL, 1),
(7, 'David', NULL, '(62) 99112-1222', 'natan_seabra@hotmail.com', 'admin2', '123456', 0, '2021-01-22 19:49:03', NULL, NULL, 1),
(8, 'teste', NULL, '(33) 23222-2222', 'natan_seabra@hotmail.com', 'daadasdad', '1212212', 0, '2021-01-23 10:33:10', NULL, NULL, 3),
(9, 'dadsdddaaaaaaa', NULL, '(62) 99112-1222', 'natan_seabra@hotmail.com', 'dasdassaaaaaa', 'dasdadadad', 0, '2021-01-23 10:33:55', NULL, NULL, 2),
(10, 'Daviddaddsadad', NULL, '(62) 99112-1222', 'natan_seabra@hotmail.com', 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 0, '2021-01-23 10:34:12', NULL, NULL, 3),
(12, 'teste', NULL, '(62) 99112-1222', 'natan_seabra@hotmail.com', 'admin4', '123456', 0, '2021-01-25 20:08:20', NULL, NULL, 3),
(13, 'LIny Kassia de Oliveira', NULL, '(62) 9 9866-0935', 'liny@hotmail.com', 'Liny', '123456', 0, '2021-01-26 23:11:26', NULL, NULL, 1),
(14, 'teste', NULL, '(62) 99112-1222', 'liny@hotmail.com', 'hhhhhhhhhhhhh', '11111111111', 0, '2021-02-04 21:51:57', NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `administrador` int(11) DEFAULT NULL,
  `tabela` varchar(50) DEFAULT NULL,
  `campos` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data` datetime NOT NULL,
  `ip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `auditoria`
--

INSERT INTO `auditoria` (`id`, `tipo`, `administrador`, `tabela`, `campos`, `descricao`, `data`, `ip`) VALUES
(1, 3, 1, 'Contato', '-', 'O  David Natan , efetuou a exclusão de um contato teste', '2021-01-31 11:12:45', '::1'),
(2, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-01-31 18:57:39', '::1'),
(3, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-01 21:38:01', '::1'),
(4, 1, 1, 'Contato', 'campo Nome: teste22<br>campo Telefone: (62) 99813-1153<br>campo Email: liny@hotmail.com<br>campo Assunto: dadas<br>campo Status: 1<br>', 'O  David Natan , efetuou o cadastro de um novo Contato', '2021-02-01 21:38:18', '::1'),
(5, 3, 1, 'Contato', 'campo Status: Excluido', 'O  David Natan , efetuou a exclusão do tipo de administrador \"teste22\".', '2021-02-01 21:38:42', '::1'),
(6, 4, 1, 'Tipo de administrador', 'campo status: Excluido', 'O  David Natan , efetuou a exclusão do tipo de administrador \"usuario\".', '2021-02-01 21:44:59', '::1'),
(7, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-01 21:56:29', '::1'),
(8, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-01 22:02:17', '::1'),
(9, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-01 22:12:08', '::1'),
(10, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-01 22:25:45', '::1'),
(11, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-01 22:25:56', '::1'),
(12, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-03 08:47:21', '::1'),
(13, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-03 08:52:41', '::1'),
(14, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-03 09:03:44', '::1'),
(15, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-03 09:14:21', '::1'),
(16, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-03 09:15:39', '::1'),
(17, 2, 1, 'Contato', 'campo Assunto editado de: \"a\" para \"aaaaa\"<br>', 'O  David Natan , efetuou a edição das informações de um Contato.', '2021-02-03 09:16:09', '::1'),
(18, 2, 1, 'Contato', 'campo Nome editado de: \"David\" para \"Teste de Novo Contato\"<br>', 'O  David Natan , efetuou a edição das informações de um Contato.', '2021-02-03 09:16:27', '::1'),
(19, 2, 1, 'Contato', 'campo Nome editado de: \"Teste de Novo Contato\" para \"David Natan \"<br>', 'O  David Natan , efetuou a edição das informações de um Contato.', '2021-02-03 09:18:25', '::1'),
(20, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-03 09:42:20', '::1'),
(21, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-04 21:30:02', '::1'),
(22, 2, 1, 'Contato', 'campo Telefone editado de: \"(99) 81911-522\" para \"(22) 2 2222-2222\"<br>', 'O  David Natan , efetuou a edição das informações de um Contato.', '2021-02-04 21:34:32', '::1'),
(23, 4, 1, 'Tipo de administrador', 'campo status: Excluido', 'O  David Natan , efetuou a exclusão do tipo de administrador \"David\".', '2021-02-04 21:39:49', '::1'),
(24, 1, 1, 'Contato', 'campo Nome: teste<br>campo Telefone: (99) 81911-522<br>campo Email: liny@hotmail.com<br>campo Assunto: aaaa<br>campo Status: 1<br>', 'O  David Natan , efetuou o cadastro de um novo Contato', '2021-02-04 21:40:34', '::1'),
(25, 4, 1, 'Administrador', 'campo status: Excluido', 'O  David Natan , efetuou a exclusão do administrador ', '2021-02-04 21:51:19', '::1'),
(26, 1, 1, 'Administrador', 'campo nome: teste<br>campo telefone: (62) 99112-1222<br>campo e-mail: liny@hotmail.com<br>campo tipo do administrador: Gerente2<br>campo usuário: hhhhhhhhhhhhh<br>campo status: Ativo<br>', 'O Administrador David Natan , efetuou o cadastro de um novo administrador.', '2021-02-04 21:51:57', '::1'),
(27, 4, 1, 'Administrador', 'campo status: Excluido', 'O  David Natan , efetuou a exclusão do administrador ', '2021-02-04 21:52:49', '::1'),
(28, 4, 1, 'Administrador', 'campo status: Excluido', 'O  David Natan , efetuou a exclusão do administrador ', '2021-02-04 21:53:43', '::1'),
(29, 2, 1, 'Tipo de administrador', 'campo tipo editado de : \"Gerente2\" para \"Usuário\"<br>', 'O  David Natan , efetuou a edição da tipo de administrador \"Usuário\".', '2021-02-04 21:55:40', '::1'),
(30, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-04 22:05:29', '::1'),
(31, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-05 21:48:29', '::1'),
(32, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-05 21:50:44', '::1'),
(33, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 08:05:10', '::1'),
(34, 2, 1, 'Contato', 'campo Nome editado de: \"David Natan \" para \"David Natan Seabra\"<br>', 'O  David Natan , efetuou a edição das informações de um Contato.', '2021-02-06 08:07:32', '::1'),
(35, 2, 1, 'Contato', 'campo Telefone editado de: \"(22) 2 2222-2222\" para \"(22) 2 2224-4444\"<br>campo Assunto editado de: \"aaaaa\" para \"testeaadadad\"<br>', 'O  David Natan , efetuou a edição das informações de um Contato.', '2021-02-06 08:08:57', '::1'),
(36, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 08:15:22', '::1'),
(37, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 08:44:44', '::1'),
(38, 1, 1, 'Contato', 'campo Nome: David Natan Seabra<br>campo Telefone: (22) 22224-444<br>campo Email: natan_seabra@hotmail.com<br>campo Assunto: dadsddasd<br>campo Status: 2<br>', 'O  David Natan , efetuou o cadastro de um novo Contato', '2021-02-06 08:48:54', '::1'),
(39, 1, 1, 'Contato', 'campo Nome: teste3232<br>campo Telefone: 332323232332<br>campo Email: natan@hotmail.com<br>campo Assunto: dsadd<br>campo Status: 2<br>', 'O  David Natan , efetuou o cadastro de um novo Contato', '2021-02-06 08:56:41', '::1'),
(40, 3, 1, 'Contato', 'campo Status: Excluido', 'O  David Natan , efetuou a exclusão do contato\"teste3232\".', '2021-02-06 08:57:31', '::1'),
(41, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 09:05:21', '::1'),
(42, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 09:05:23', '::1'),
(43, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 09:10:34', '::1'),
(44, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 09:18:32', '::1'),
(45, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 09:24:33', '::1'),
(46, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 09:26:56', '::1'),
(47, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 09:33:11', '::1'),
(48, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 09:33:14', '::1'),
(49, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 09:39:33', '::1'),
(50, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 09:40:37', '::1'),
(51, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 09:52:01', '::1'),
(52, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 09:53:11', '::1'),
(53, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 09:58:21', '::1'),
(54, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 10:04:50', '::1'),
(55, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 10:10:32', '::1'),
(56, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 10:19:19', '::1'),
(57, 2, 1, 'Administrador', 'Foto editada de:<br><img src=\"http://localhost/MVCPadrao//public/imagem/administrador/060221100532852.jpg\" width=\"250px\" alt=\"Foto não encontrada!\"><br>para:<br><img src=\"http://localhost/MVCPadrao//public/imagem/administrador/060221101937779.jpeg\" width=\"250px\" alt=\"Foto não encontrada\">', 'O Administrador David Natan , efetuou a ediçao de uma foto de administrador.', '2021-02-06 10:19:37', '::1'),
(58, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 10:24:42', '::1'),
(59, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 10:25:15', '::1'),
(60, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 10:34:46', '::1'),
(61, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-06 10:34:48', '::1'),
(62, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-06 10:39:09', '::1'),
(63, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-03-08 21:29:59', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `assunto` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `telefone`, `email`, `assunto`, `status`) VALUES
(5, 'David Natan Seabra', '(22) 2 2224-4444', 'natan_seabra@hotmail.com', 'testeaadadad', 1),
(11, 'teste22', '(62) 99813-1153', 'liny@hotmail.com', 'dadas', 0),
(12, 'teste', '(99) 81911-522', 'liny@hotmail.com', 'aaaa', 1),
(13, 'David Natan Seabra', '(22) 22224-444', 'natan_seabra@hotmail.com', 'dadsddasd', 1),
(14, 'teste3232', '332323232332', 'natan@hotmail.com', 'dsadd', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `id` int(11) NOT NULL,
  `permissao` varchar(50) NOT NULL,
  `nivel` int(5) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`id`, `permissao`, `nivel`, `status`) VALUES
(1, 'Gerenciar Tipo de Administrador', 1, 1),
(2, 'Gerenciar Administradores', 2, 1),
(3, 'Auditoria', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_administrador`
--

CREATE TABLE `tipo_administrador` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_administrador`
--

INSERT INTO `tipo_administrador` (`id`, `tipo`, `status`) VALUES
(1, 'Administrador', 1),
(2, 'usuario', 0),
(3, 'logistica', 1),
(5, 'teste', 0),
(6, 'tesasa', 0),
(9, 'aaaaa', 1),
(10, 'David', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_permissao`
--

CREATE TABLE `tipo_permissao` (
  `tipo_administrador_id` int(11) NOT NULL,
  `permissao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_permissao`
--

INSERT INTO `tipo_permissao` (`tipo_administrador_id`, `permissao_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 2),
(6, 3),
(9, 3),
(10, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`,`tipo_administrador_id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD KEY `fk_administrador_tipo_administrador1_idx` (`tipo_administrador_id`);

--
-- Índices para tabela `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auditoria_administrador_idx` (`administrador`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_administrador`
--
ALTER TABLE `tipo_administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_UNIQUE` (`tipo`);

--
-- Índices para tabela `tipo_permissao`
--
ALTER TABLE `tipo_permissao`
  ADD PRIMARY KEY (`tipo_administrador_id`,`permissao_id`),
  ADD KEY `fk_tipo_administrador_has_permissao_permissao1_idx` (`permissao_id`),
  ADD KEY `fk_tipo_administrador_has_permissao_tipo_administrador1_idx` (`tipo_administrador_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tipo_administrador`
--
ALTER TABLE `tipo_administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_tipo_administrador1` FOREIGN KEY (`tipo_administrador_id`) REFERENCES `tipo_administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `fk_auditoria_administrador` FOREIGN KEY (`administrador`) REFERENCES `administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tipo_permissao`
--
ALTER TABLE `tipo_permissao`
  ADD CONSTRAINT `fk_tipo_administrador_has_permissao_permissao1` FOREIGN KEY (`permissao_id`) REFERENCES `permissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_administrador_has_permissao_tipo_administrador1` FOREIGN KEY (`tipo_administrador_id`) REFERENCES `tipo_administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
