-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jul-2021 às 19:08
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
(1, 'David', NULL, '(62) 9 9813-1151', 'natan_seabra@hotmail.com', 'admin', '123', 1, '2021-04-13 16:10:55', NULL, NULL, 1);

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
(103, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-17 15:32:35', '::1'),
(104, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:00:00', '::1'),
(105, 2, 1, 'Tipo de administrador', '<br>Permissões concedidas:<br>Gerenciar Noticias<br>', 'O  David, efetuou a edição da tipo de administrador \"Administrador\".', '2021-06-22 15:00:12', '::1'),
(106, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 15:00:12', '::1'),
(107, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:00:13', '::1'),
(108, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:07:47', '::1'),
(109, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 15:13:34', '::1'),
(110, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:13:41', '::1'),
(111, 2, 1, 'Tipo de administrador', '<br>Permissões negadas:<br>Gerenciar Noticias<br>', 'O  David, efetuou a edição da tipo de administrador \"Administrador\".', '2021-06-22 15:17:28', '::1'),
(112, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 15:17:28', '::1'),
(113, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:17:29', '::1'),
(114, 2, 1, 'Tipo de administrador', '<br>Permissões concedidas:<br>Gerenciar Noticias<br>', 'O  David, efetuou a edição da tipo de administrador \"Administrador\".', '2021-06-22 15:17:37', '::1'),
(115, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 15:17:37', '::1'),
(116, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:17:38', '::1'),
(117, 2, 1, 'Tipo de administrador', '<br>Permissões concedidas:<br>Gerenciar Noticias<br>', 'O  David, efetuou a edição da tipo de administrador \"Administrador\".', '2021-06-22 15:19:12', '::1'),
(118, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 15:19:12', '::1'),
(119, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:19:14', '::1'),
(120, 1, 1, 'Noticias', 'campo Titulo: teste<br>campo Descricao: <p>rwa</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/noticias/22_06_2021_03_20_28_825.png\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova Notícia.', '2021-06-22 15:20:28', '::1'),
(121, 1, 1, 'Noticias', 'campo Titulo: teste<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/noticias/22_06_2021_03_23_39_913.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova Notícia.', '2021-06-22 15:23:39', '::1'),
(122, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 15:29:02', '::1'),
(123, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:30:16', '::1'),
(124, 1, 1, 'Noticias', 'campo Titulo: teste<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/noticias/22_06_2021_03_32_21_748.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova Notícia.', '2021-06-22 15:32:21', '::1'),
(125, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 15:40:50', '::1'),
(126, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:44:39', '::1'),
(127, 3, 1, 'Noticias', '-', 'O  David, efetuou a exclusão de uma Notícia.', '2021-06-22 15:44:45', '::1'),
(128, 3, 1, 'Noticias', '-', 'O  David, efetuou a exclusão de uma Notícia.', '2021-06-22 15:48:03', '::1'),
(129, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 15:53:13', '::1'),
(130, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 15:53:32', '::1'),
(131, 1, 1, 'Noticias', 'campo Titulo: teste<br>campo Descricao: <p>teste</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/noticias/22_06_2021_03_53_44_339.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova Notícia.', '2021-06-22 15:53:44', '::1'),
(132, 2, 1, 'Noticias', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/noticias/22_06_2021_03_53_44_339.jpg\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/noticias/22_06_2021_04_10_58_286.jpeg\" /><br>', 'O  David, efetuou a edição da imagem da Noticia teste', '2021-06-22 16:10:58', '::1'),
(133, 2, 1, 'Noticias', 'campo Titulo editado de: \"teste\" para \"teste 1\"<br>campo Descricao editado de: \"<p>teste</p>\r\n\" para \"<p>teste fasa</p>\r\n\"<br>', 'O  David, efetuou a edição das informações de uma Notícia', '2021-06-22 16:15:08', '::1'),
(134, 2, 1, 'Noticias', 'campo Descricao editado de: \"<p>teste fasa</p>\r\n\" para \"<p><strong>teste fasa</strong></p>\r\n\"<br>', 'O  David, efetuou a edição das informações de uma Notícia', '2021-06-22 16:18:41', '::1'),
(135, 2, 1, 'Administrador', 'campo telefone editado de: \"62998131151\" para \"(62) 9 9813-1151\"<br>', 'O Administrador David, efetuou a edição da administrador \"David\".', '2021-06-22 16:21:15', '::1'),
(136, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 16:21:15', '::1'),
(137, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 16:21:16', '::1'),
(138, 2, 1, 'Tipo de administrador', '<br>Permissões negadas:<br>Gerenciar Produtos<br>Gerenciar Noticias<br>', 'O  David, efetuou a edição da tipo de administrador \"Administrador\".', '2021-06-22 16:25:33', '::1'),
(139, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 16:25:33', '::1'),
(140, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 16:25:35', '::1'),
(141, 2, 1, 'Tipo de administrador', '<br>Permissões concedidas:<br>Gerenciar Noticias<br>Gerenciar Produtos<br>', 'O  David, efetuou a edição da tipo de administrador \"Administrador\".', '2021-06-22 16:26:03', '::1'),
(142, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 16:26:03', '::1'),
(143, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 16:26:05', '::1'),
(144, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 16:31:12', '::1'),
(145, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 16:40:18', '::1'),
(146, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 16:49:18', '::1'),
(147, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 16:49:39', '::1'),
(148, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 16:53:22', '::1'),
(149, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 16:56:54', '::1'),
(150, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 16:57:29', '::1'),
(151, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-22 22:44:58', '::1'),
(152, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-22 22:45:15', '::1'),
(153, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-23 11:56:09', '::1'),
(154, 1, 1, 'Noticias', 'campo Titulo: teste de um produto<br>campo Descricao: <p>cara</p>\r\n<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/noticias/23_06_2021_11_56_28_245.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova Notícia.', '2021-06-23 11:56:28', '::1'),
(155, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-23 11:56:36', '::1'),
(156, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-24 11:38:04', '::1'),
(157, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-24 11:43:05', '::1'),
(158, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-24 11:43:54', '::1'),
(159, 2, 1, 'Tipo de administrador', '<br>Permissões concedidas:<br>Gerenciar Galeria<br>', 'O  David, efetuou a edição da tipo de administrador \"Administrador\".', '2021-06-24 11:44:37', '::1'),
(160, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-24 11:44:37', '::1'),
(161, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-24 11:44:39', '::1'),
(162, 1, 1, 'Galeria', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/24_06_2021_11_52_56_898.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova imagem na Galeria.', '2021-06-24 11:52:56', '::1'),
(163, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-24 15:25:46', '::1'),
(164, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-24 15:40:36', '::1'),
(165, 1, 1, 'Galeria', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/24_06_2021_03_45_00_663.jpeg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova imagem na Galeria.', '2021-06-24 15:45:00', '::1'),
(166, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-24 15:50:00', '::1'),
(167, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-24 15:50:11', '::1'),
(168, 3, 1, 'Galeria', '-', 'O  David, efetuou a exclusão de uma imagem da galeria: 24_06_2021_03_45_00_663.jpeg', '2021-06-24 15:52:46', '::1'),
(169, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-24 15:57:46', '::1'),
(170, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-24 16:31:29', '::1'),
(171, 2, 1, 'Galeria', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/24_06_2021_11_52_56_898.jpg\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/24_06_2021_04_35_29_147.jpg\" /><br>', 'O  David, efetuou a edição da imagem do galeria ', '2021-06-24 16:35:29', '::1'),
(172, 2, 1, 'Galeria', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/24_06_2021_04_35_29_147.jpg\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/24_06_2021_04_36_26_206.jpg\" /><br>', 'O  David, efetuou a edição da imagem do galeria ', '2021-06-24 16:36:26', '::1'),
(173, 2, 1, 'Galeria', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/24_06_2021_04_36_26_206.jpg\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/24_06_2021_04_36_38_131.jpeg\" /><br>', 'O  David, efetuou a edição da imagem do galeria ', '2021-06-24 16:36:38', '::1'),
(174, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-24 16:51:54', '::1'),
(175, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-25 08:55:28', '::1'),
(176, 1, 1, 'Galeria', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/25_06_2021_08_55_35_277.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova imagem na Galeria.', '2021-06-25 08:55:35', '::1'),
(177, 1, 1, 'Galeria', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/25_06_2021_08_55_42_653.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova imagem na Galeria.', '2021-06-25 08:55:42', '::1'),
(178, 1, 1, 'Galeria', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/galeria/25_06_2021_08_55_49_196.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um nova imagem na Galeria.', '2021-06-25 08:55:49', '::1'),
(179, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-25 08:55:54', '::1'),
(180, 1, NULL, 'Contato', 'campo Nome: david<br>campo Telefone: 433232323232323<br>campo Email: natan_seabra@hotmail.com.br<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 09:57:33', '::1'),
(181, 1, NULL, 'Contato', 'campo Nome: david<br>campo Telefone: 433232323232323<br>campo Email: natan_seabra@hotmail.com.br<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 09:57:37', '::1'),
(182, 1, NULL, 'Contato', 'campo Nome: david<br>campo Telefone: 433232323232323<br>campo Email: natan_seabra@hotmail.com.br<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 09:57:39', '::1'),
(183, 1, NULL, 'Contato', 'campo Nome: david<br>campo Telefone: 433232323232323<br>campo Email: natan_seabra@hotmail.com.br<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 09:57:41', '::1'),
(184, 1, NULL, 'Contato', 'campo Nome: david<br>campo Telefone: 433232323232323<br>campo Email: natan_seabra@hotmail.com.br<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 09:57:48', '::1'),
(185, 1, NULL, 'Contato', 'campo Nome: ts<br>campo Telefone: 9292121221212<br>campo Email: tesda@gmail.com<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 09:59:01', '::1'),
(186, 1, NULL, 'Contato', 'campo Nome: ts<br>campo Telefone: 9292121221212<br>campo Email: tesda@gmail.com<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 09:59:57', '::1'),
(187, 1, NULL, 'Contato', 'campo Nome: david<br>campo Telefone: teste<br>campo Email: dads@gmail.com<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 10:00:11', '::1'),
(188, 1, NULL, 'Contato', 'campo Nome: david<br>campo Telefone: (22) 22222-22<br>campo Email: natan_seabr@hotmail.com<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 11:08:15', '::1'),
(189, 1, NULL, 'Contato', 'campo Nome: Gustavo<br>campo Telefone: (22) 22222-2222<br>campo Email: dnatan008@gmail.com<br>campo Assunto: teste de primeira mão e vai<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 11:23:49', '::1'),
(190, 1, NULL, 'Contato', 'campo Nome: te<br>campo Telefone: (22) 22222-2222<br>campo Email: natan_asearba@gmail.com<br>campo Assunto: dadad<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-25 11:32:12', '::1'),
(191, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-25 11:42:18', '::1'),
(192, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-25 11:42:35', '::1'),
(193, 1, NULL, 'Contato', 'campo Nome: David<br>campo Telefone: (62) 99813-1151<br>campo Email: natan_seabra@hotmail.com<br>campo Assunto: teste<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-06-26 08:18:46', '::1'),
(194, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-06-28 09:08:42', '::1'),
(195, 3, 1, 'Produtos', '-', 'O  David, efetuou a exclusão de um Podruto.', '2021-06-28 09:09:03', '::1'),
(196, 3, 1, 'Produtos', '-', 'O  David, efetuou a exclusão de um Podruto.', '2021-06-28 09:09:07', '::1'),
(197, 3, 1, 'Produtos', '-', 'O  David, efetuou a exclusão de um Podruto.', '2021-06-28 09:09:09', '::1'),
(198, 3, 1, 'Produtos', '-', 'O  David, efetuou a exclusão de um Podruto.', '2021-06-28 09:09:11', '::1'),
(199, 3, 1, 'Produtos', '-', 'O  David, efetuou a exclusão de um Podruto.', '2021-06-28 09:09:14', '::1'),
(200, 3, 1, 'Produtos', '-', 'O  David, efetuou a exclusão de um Podruto.', '2021-06-28 09:09:18', '::1'),
(201, 3, 1, 'Produtos', '-', 'O  David, efetuou a exclusão de um Podruto.', '2021-06-28 09:09:21', '::1'),
(202, 2, 1, 'Noticias', 'campo Titulo editado de: \"teste de um produto\" para \"Produto 1\"<br>', 'O  David, efetuou a edição das informações de uma Notícia', '2021-06-28 09:09:41', '::1'),
(203, 2, 1, 'Noticias', 'campo Titulo editado de: \"teste de primeira mão e vai\" para \"produto 2\"<br>campo Descricao editado de: \"<p><strong>teste fasa</strong></p>\r\n\" para \"<p><u><em><strong>teste</strong></em></u></p>\r\n\"<br>', 'O  David, efetuou a edição das informações de uma Notícia', '2021-06-28 09:09:58', '::1'),
(204, 3, 1, 'Contato', 'campo Status: Excluido', 'O  David, efetuou a exclusão do contato\"te\".', '2021-06-28 09:10:30', '::1'),
(205, 3, 1, 'Contato', 'campo Status: Excluido', 'O  David, efetuou a exclusão do contato\"Gustavo\".', '2021-06-28 09:10:33', '::1'),
(206, 3, 1, 'Contato', 'campo Status: Excluido', 'O  David, efetuou a exclusão do contato\"David\".', '2021-06-28 09:10:36', '::1'),
(207, 3, 1, 'Contato', 'campo Status: Excluido', 'O  David, efetuou a exclusão do contato\"david\".', '2021-06-28 09:10:43', '::1'),
(208, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-06-28 09:14:16', '::1'),
(209, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-07-01 11:31:44', '::1'),
(210, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-07-01 11:36:48', '::1'),
(211, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-07-01 18:32:17', '::1'),
(212, 1, 1, 'Banner', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/01_07_2021_06_32_25_933.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Banner.', '2021-07-01 18:32:25', '::1'),
(213, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-07-01 18:32:31', '::1'),
(214, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-07-01 18:32:42', '::1'),
(215, 3, 1, 'Banner', '-', 'O  David, efetuou a exclusão de um banner: 01_07_2021_06_32_25_933.jpg', '2021-07-01 18:32:47', '::1'),
(216, 1, 1, 'Banner', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/01_07_2021_06_36_04_724.gif\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Banner.', '2021-07-01 18:36:04', '::1'),
(217, 3, 1, 'Banner', '-', 'O  David, efetuou a exclusão de um banner: 01_07_2021_06_36_04_724.gif', '2021-07-01 18:36:09', '::1'),
(218, 1, 1, 'Banner', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/01_07_2021_06_36_19_425.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Banner.', '2021-07-01 18:36:20', '::1'),
(219, 3, 1, 'Banner', '-', 'O  David, efetuou a exclusão de um banner: 01_07_2021_06_36_19_425.jpg', '2021-07-01 18:37:04', '::1'),
(220, 1, 1, 'Banner', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/01_07_2021_06_37_13_382.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Banner.', '2021-07-01 18:37:13', '::1'),
(221, 3, 1, 'Banner', '-', 'O  David, efetuou a exclusão de um banner: 01_07_2021_06_37_13_382.jpg', '2021-07-01 18:37:16', '::1'),
(222, 1, 1, 'Banner', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/01_07_2021_06_38_24_159.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Banner.', '2021-07-01 18:38:24', '::1'),
(223, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/01_07_2021_06_38_24_159.jpg\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/01_07_2021_06_39_56_149.jpg\" /><br>', 'O  David, efetuou a edição da imagem do banner ', '2021-07-01 18:39:57', '::1'),
(224, 3, 1, 'Banner', '-', 'O  David, efetuou a exclusão de um banner: 17_06_2021_02_49_31_272.png', '2021-07-01 18:41:24', '::1'),
(225, 3, 1, 'Banner', '-', 'O  David, efetuou a exclusão de um banner: 17_06_2021_03_27_34_214.png', '2021-07-01 18:41:26', '::1'),
(226, 1, 1, 'Banner', '<img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/01_07_2021_06_41_36_532.jpg\" style=\"width: 100%\">', 'O  David, efetuou o cadastro de um novo Banner.', '2021-07-01 18:41:36', '::1'),
(227, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-07-01 21:09:11', '::1'),
(228, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-07-12 15:44:31', '::1'),
(229, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-07-12 15:44:58', '::1'),
(230, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-07-12 15:49:12', '::1'),
(231, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-07-29 08:37:46', '::1'),
(232, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/01_07_2021_06_39_56_149.jpg\" /><br>para:<br><img src=\"http://localhost/AgroNegocio//public/imagemSite/banner/29_07_2021_08_37_58_132.png\" /><br>', 'O  David, efetuou a edição da imagem do banner ', '2021-07-29 08:37:58', '::1'),
(233, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-07-29 08:38:07', '::1'),
(234, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2021-07-29 11:04:17', '::1'),
(235, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-07-29 11:04:43', '::1');

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
(8, '29_07_2021_08_37_58_132.png', '2021-07-01 18:38:24', 1),
(9, '01_07_2021_06_41_36_532.jpg', '2021-07-01 18:41:36', 1);

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
(1, 'david', '(22) 22222-22', 'natan_seabr@hotmail.com', 'teste', 0),
(2, 'Gustavo', '(22) 22222-2222', 'dnatan008@gmail.com', 'teste de primeira mão e vai', 0),
(3, 'te', '(22) 22222-2222', 'natan_asearba@gmail.com', 'dadad', 0),
(4, 'David', '(62) 99813-1151', 'natan_seabra@hotmail.com', 'teste', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `administrador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id`, `imagem`, `data_cadastro`, `administrador_id`) VALUES
(1, '24_06_2021_04_36_38_131.jpeg', '2021-06-24 11:52:56', 1),
(3, '25_06_2021_08_55_35_277.jpg', '2021-06-25 08:55:35', 1),
(4, '25_06_2021_08_55_42_653.jpg', '2021-06-25 08:55:42', 1),
(5, '25_06_2021_08_55_49_196.jpg', '2021-06-25 08:55:49', 1);

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

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `imagem`, `titulo`, `texto`, `data_publicacao`, `administrador_id`) VALUES
(4, '22_06_2021_04_10_58_286.jpeg', 'produto 2', '<p><u><em><strong>teste</strong></em></u></p>\r\n', '2021-06-22 15:53:44', 1),
(5, '23_06_2021_11_56_28_245.jpg', 'Produto 1', '<p>cara</p>\r\n', '2021-06-23 11:56:28', 1);

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
(3, 'Gerenciar Auditoria', 3, 1),
(4, 'Gerenciar Produtos', 4, 1),
(5, 'Gerenciar Banner', 5, 1),
(6, 'Gerenciar Noticias', 6, 1),
(7, 'Gerenciar Galeria', 7, 1);

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
(7, '15_06_2021_08_25_54_601.jpg', 'Melancia 2', '<p>teste</p>\r\n', '2021-06-15 08:25:54', 1),
(8, '15_06_2021_04_02_20_429.jpg', 'Melancia 3', '<p>teste</p>\r\n', '2021-06-15 16:02:20', 1);

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
(1, 6),
(1, 7),
(1, 8),
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
-- Índices para tabela `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_administrador_id_ga_idx` (`administrador_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Limitadores para a tabela `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `fk_administrador_id_ga` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
