-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jun-2021 às 19:46
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
-- Banco de dados: `agronegocio`
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
(1, 'David', NULL, '62998131151', 'natan_seabra@hotmail.com', 'admin', '123', 1, '2021-04-13 16:10:55', NULL, NULL, 1);

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
(1, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-04-13 16:11:02', '::1'),
(2, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-04-16 10:21:12', '::1'),
(3, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-04-16 10:21:56', '::1'),
(4, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-14 14:13:13', '::1'),
(5, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-14 14:15:50', '::1'),
(6, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-14 15:28:55', '::1'),
(7, 2, 1, 'Tipo de administrador', '<br>Permissões concedidas:<br>Produtos<br>', 'O  David, efetuou a edição da tipo de administrador \"Administrador\".', '2021-06-14 15:36:54', '::1'),
(8, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-14 15:36:54', '::1'),
(9, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-14 15:36:55', '::1'),
(10, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-14 15:44:42', '::1'),
(11, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-14 15:54:56', '::1'),
(12, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-14 16:18:20', '::1'),
(13, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-14 16:20:03', '::1'),
(14, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-14 16:25:05', '::1'),
(15, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-15 08:18:40', '::1'),
(16, 1, 1, 'Produtos', 'campo Titulo: Melancia 1<br>campo Descricao: <p>Teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_08_22_01_445.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-15 08:22:02', '::1'),
(17, 1, 1, 'Produtos', 'campo Titulo: Melancia 2<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_08_25_54_601.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-15 08:25:54', '::1'),
(18, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-15 08:30:54', '::1'),
(19, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-15 16:02:00', '::1'),
(20, 1, 1, 'Produtos', 'campo Titulo: Melancia 3<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_04_02_20_429.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-15 16:02:20', '::1'),
(21, 1, 1, 'Produtos', 'campo Titulo: Melancia 4<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_04_02_33_599.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-15 16:02:33', '::1'),
(22, 1, 1, 'Produtos', 'campo Titulo: Melancia 5<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_04_02_46_151.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-15 16:02:46', '::1'),
(23, 1, 1, 'Produtos', 'campo Titulo: Melancia 6<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_04_02_57_572.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-15 16:02:57', '::1'),
(24, 1, 1, 'Produtos', 'campo Titulo: Melancia 7<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_04_03_07_219.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-15 16:03:07', '::1'),
(25, 1, 1, 'Produtos', 'campo Titulo: Melancia 8<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_04_03_18_961.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-15 16:03:18', '::1'),
(26, 1, 1, 'Produtos', 'campo Titulo: Melancia 9<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_04_03_35_612.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-15 16:03:35', '::1'),
(27, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-15 16:03:52', '::1'),
(28, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 14:48:15', '::1'),
(29, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 14:52:07', '::1'),
(30, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 14:59:28', '::1'),
(31, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 15:06:54', '::1'),
(32, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 15:09:04', '::1'),
(33, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 15:16:46', '::1'),
(34, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 15:18:26', '::1'),
(35, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 15:28:23', '::1'),
(36, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 15:37:24', '::1'),
(37, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 15:43:39', '::1'),
(38, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 15:44:46', '::1'),
(39, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 16:07:09', '::1'),
(40, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 16:07:36', '::1'),
(41, 1, 1, 'Produtos', 'campo Titulo: carr<br>campo Descricao: <p>aadasd</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/16_06_2021_04_12_42_534.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Produto.', '2021-06-16 16:12:42', '::1'),
(42, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 16:18:07', '::1'),
(43, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 16:30:14', '::1'),
(44, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 16:34:58', '::1'),
(45, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 16:43:00', '::1'),
(46, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 16:48:00', '::1'),
(47, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 16:49:44', '::1'),
(48, 3, 1, 'Produtos', '-', 'O  David, efetuou a exclusão de um Podruto.', '2021-06-16 16:49:50', '::1'),
(49, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 16:54:07', '::1'),
(50, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-16 17:07:18', '::1'),
(51, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-16 17:08:44', '::1'),
(52, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 09:59:10', '::1'),
(53, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 10:04:13', '::1'),
(54, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 10:12:23', '::1'),
(55, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 10:17:32', '::1'),
(56, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 10:17:55', '::1'),
(57, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 10:22:42', '::1'),
(58, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 10:28:43', '::1'),
(59, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 10:35:35', '::1'),
(60, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 10:40:50', '::1'),
(61, 2, 1, 'Produtos', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/15_06_2021_04_03_35_612.jpg\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/17_06_2021_10_40_58_399.jpg\" /><br>', 'O  David, efetuou a edição da imagem do Produto Melancia 9', '2021-06-17 10:40:58', '::1'),
(62, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 10:45:58', '::1'),
(63, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 10:48:00', '::1'),
(64, 2, 1, 'Produtos', 'campo Descricao editado de: \"<p>teste</p>\r\n\" para \"<p>teste 1</p>\r\n\"<br>', 'O  David, efetuou a edição das informações de um Produto', '2021-06-17 10:48:09', '::1'),
(65, 2, 1, 'Produtos', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/17_06_2021_10_40_58_399.jpg\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/produtos/17_06_2021_10_48_36_356.png\" /><br>', 'O  David, efetuou a edição da imagem do Produto Melancia 9', '2021-06-17 10:48:36', '::1'),
(66, 2, 1, 'Produtos', 'campo Titulo editado de: \"Melancia 9\" para \"Melancia 20\"<br>campo Descricao editado de: \"<p>teste 1</p>\r\n\" para \"<p>teste 2</p>\r\n\"<br>', 'O  David, efetuou a edição das informações de um Produto', '2021-06-17 10:48:47', '::1'),
(67, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 10:56:07', '::1'),
(68, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 10:57:56', '::1'),
(69, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 11:02:56', '::1'),
(70, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 11:03:35', '::1'),
(71, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 11:08:35', '::1'),
(72, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 11:33:51', '::1'),
(73, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 11:38:51', '::1'),
(74, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 11:45:57', '::1'),
(75, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 11:50:57', '::1'),
(76, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 11:57:07', '::1'),
(77, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 13:32:23', '::1'),
(78, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 13:55:37', '::1'),
(79, 2, 1, 'Tipo de administrador', '<br>Permissões concedidas:<br>Banner<br>', 'O  David, efetuou a edição da tipo de administrador \"Administrador\".', '2021-06-17 13:59:16', '::1'),
(80, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 13:59:16', '::1'),
(81, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 13:59:17', '::1'),
(82, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 14:04:19', '::1'),
(83, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 14:12:59', '::1'),
(84, 1, 1, 'Banner', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/obras/17_06_2021_02_13_17_554.png\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Banner.', '2021-06-17 14:13:17', '::1'),
(85, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 14:18:17', '::1'),
(86, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 14:27:35', '::1'),
(87, 1, 1, 'Banner', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_02_27_43_577.png\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Banner.', '2021-06-17 14:27:43', '::1'),
(88, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 14:32:43', '::1'),
(89, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 14:41:49', '::1'),
(90, 3, 1, 'Banner', '-', 'O  David, efetuou a exclusão de um banner: 17_06_2021_02_13_17_554.png', '2021-06-17 14:49:23', '::1'),
(91, 1, 1, 'Banner', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_02_49_31_272.png\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Banner.', '2021-06-17 14:49:32', '::1'),
(92, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 14:54:32', '::1'),
(93, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 14:56:43', '::1'),
(94, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 15:02:16', '::1'),
(95, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 15:02:43', '::1'),
(96, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 15:15:40', '::1'),
(97, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-17 15:17:37', '::1'),
(98, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_02_27_43_577.png\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_03_17_44_219.png\" /><br>', 'O  David, efetuou a edição da imagem do banner ', '2021-06-17 15:17:45', '::1'),
(99, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_03_17_44_219.png\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_03_20_53_138.png\" /><br>', 'O  David, efetuou a edição da imagem do banner ', '2021-06-17 15:20:54', '::1'),
(100, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_03_20_53_138.png\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_03_22_26_136.png\" /><br>', 'O  David, efetuou a edição da imagem do banner ', '2021-06-17 15:22:27', '::1'),
(101, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_03_22_26_136.png\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_03_22_47_169.png\" /><br>', 'O  David, efetuou a edição da imagem do banner ', '2021-06-17 15:22:48', '::1'),
(102, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_03_22_47_169.png\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/17_06_2021_03_27_34_214.png\" /><br>', 'O  David, efetuou a edição da imagem do banner ', '2021-06-17 15:27:35', '::1'),
(103, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 15:32:35', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `imagem` varchar(30) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `administrador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `imagem`, `data_cadastro`, `administrador_id`) VALUES
(2, '17_06_2021_03_27_34_214.png', '2021-06-17 14:27:43', 1),
(3, '17_06_2021_02_49_31_272.png', '2021-06-17 14:49:31', 1);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `data_publicacao` datetime NOT NULL,
  `administrador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'Auditoria', 3, 1),
(4, 'Produtos', 4, 1),
(5, 'Banner', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(30) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `administrador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `imagem`, `titulo`, `descricao`, `data_cadastro`, `administrador_id`) VALUES
(6, '15_06_2021_08_22_01_445.jpg', 'Melancia 1', '<p>Teste</p>\r\n', '2021-06-15 08:22:01', 1),
(7, '15_06_2021_08_25_54_601.jpg', 'Melancia 2', '<p>teste</p>\r\n', '2021-06-15 08:25:54', 1),
(8, '15_06_2021_04_02_20_429.jpg', 'Melancia 3', '<p>teste</p>\r\n', '2021-06-15 16:02:20', 1),
(9, '15_06_2021_04_02_33_599.jpg', 'Melancia 4', '<p>teste</p>\r\n', '2021-06-15 16:02:33', 1),
(10, '15_06_2021_04_02_46_151.jpg', 'Melancia 5', '<p>teste</p>\r\n', '2021-06-15 16:02:46', 1),
(11, '15_06_2021_04_02_57_572.jpg', 'Melancia 6', '<p>teste</p>\r\n', '2021-06-15 16:02:57', 1),
(12, '15_06_2021_04_03_07_219.jpg', 'Melancia 7', '<p>teste</p>\r\n', '2021-06-15 16:03:07', 1),
(13, '15_06_2021_04_03_18_961.jpg', 'Melancia 8', '<p>teste</p>\r\n', '2021-06-15 16:03:18', 1),
(14, '17_06_2021_10_48_36_356.png', 'Melancia 20', '<p>teste 2</p>\r\n', '2021-06-15 16:03:35', 1);

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
(3, 'logistica', 1);

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
(1, 4),
(1, 5),
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
-- Índices para tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_administrador_id_idx` (`administrador_id`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_administrador_id_idx` (`administrador_id`);

--
-- Índices para tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_administrador_id_pro_idx` (`administrador_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Limitadores para a tabela `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `fk_administrador_id` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_administrador_id_no` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_administrador_id_pro` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
