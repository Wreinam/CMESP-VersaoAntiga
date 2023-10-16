-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Out-2023 às 13:22
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_cmesp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anamnese`
--

CREATE TABLE `anamnese` (
  `id_anamnese` int(11) NOT NULL,
  `id_inscricao` int(11) NOT NULL,
  `cardiaco` varchar(11) NOT NULL,
  `obs_cardiaco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `anamnese`
--

INSERT INTO `anamnese` (`id_anamnese`, `id_inscricao`, `cardiaco`, `obs_cardiaco`) VALUES
(1, 1, 'on', 'sfsf'),
(5, 2, 'off', 'Veia entupidasssa'),
(6, 3, 'off', ''),
(7, 4, 'on', 'Arritimia'),
(8, 5, 'on', 'Arteria Entupida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `id_bairro` int(11) NOT NULL,
  `nome_bairro` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`id_bairro`, `nome_bairro`) VALUES
(1, 'Maresias'),
(2, 'Portal da Olaria'),
(3, 'Portal de Maresias'),
(4, 'Olaria'),
(5, 'Renan'),
(6, 'Teste 2'),
(7, 'Xurras dos parça'),
(8, 'Teste'),
(9, 'Pereque');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(120) NOT NULL,
  `nome_local` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `bairro`, `rua`, `nome_local`) VALUES
(7, 'Xurras dos parça', 'Teste 5', 'Teste 2'),
(8, 'Portal de Maresias', 'fsf', 'sf'),
(9, 'Olaria', '23 de março', 'Edna'),
(10, 'Olaria', 'sf', 'sf'),
(11, 'Maresias', 'Trem', 'Fatec'),
(12, 'Teste', 'Top', 'Top'),
(13, 'Pereque', 'Benedito Fortunato', 'Escola Edna');

-- --------------------------------------------------------

--
-- Estrutura da tabela `iscricao_tab`
--

CREATE TABLE `iscricao_tab` (
  `id_inscricao` int(11) NOT NULL,
  `id_parentesco` int(11) DEFAULT NULL,
  `nome_responsavel` varchar(50) DEFAULT NULL,
  `rg_responsavel` varchar(15) DEFAULT NULL,
  `cpf_responsavel` varchar(15) DEFAULT NULL,
  `rg_responsavel_frente` varchar(120) DEFAULT NULL,
  `rg_responsavel_verso` varchar(120) DEFAULT NULL,
  `nome_aluno` varchar(120) NOT NULL,
  `nome_mae` varchar(120) NOT NULL,
  `nome_pai` varchar(120) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `idade` varchar(10) NOT NULL,
  `cpf_aluno` varchar(15) NOT NULL,
  `rg_aluno` varchar(15) NOT NULL,
  `rg_aluno_frente` varchar(120) NOT NULL,
  `rg_aluno_verso` varchar(120) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `telefone_emergencia` varchar(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `nome_rua` varchar(120) NOT NULL,
  `bairro` varchar(120) NOT NULL,
  `nome_escola` varchar(120) DEFAULT NULL,
  `id_serie` int(11) DEFAULT NULL,
  `periodo` varchar(10) DEFAULT NULL,
  `senha` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `iscricao_tab`
--

INSERT INTO `iscricao_tab` (`id_inscricao`, `id_parentesco`, `nome_responsavel`, `rg_responsavel`, `cpf_responsavel`, `rg_responsavel_frente`, `rg_responsavel_verso`, `nome_aluno`, `nome_mae`, `nome_pai`, `data_nascimento`, `idade`, `cpf_aluno`, `rg_aluno`, `rg_aluno_frente`, `rg_aluno_verso`, `telefone`, `telefone_emergencia`, `email`, `nome_rua`, `bairro`, `nome_escola`, `id_serie`, `periodo`, `senha`) VALUES
(1, 0, '', '', '', '', '', 'renan', 'Renan Vinicius dos Santos Ribeiro', 'Renan Vinicius dos Santos Ribeiro', '2002-02-15', '21', '1234', '1234', 'index.php', 'index.php', '1231212', '2342354235', 'renan_etec@hotmail.com.com', 'Yan', 'Maresias', '', 0, '0', '123'),
(2, 0, '', '', '', '', '', 'Renan Vinicius dos Santos Ribeiro', 'Renan Vinicius dos Santos Ribeiro', 'Renan Vinicius dos Santos Ribeiro', '2002-02-15', '21', '12345', '1234', 'index.php', 'index.php', '12 99792-5669', '2342354235', 'renan_etec@hotmail.com.com', 'Yan', 'Maresias', '', 0, '0', '123'),
(3, 0, '', '', '', '', '', 'Renan Vinicius dos Santos Ribeiro', 'Renan Vinicius dos Santos Ribeiro', 'Renan Vinicius dos Santos Ribeiro', '2002-02-15', '21', '123', '1234', 'index.php', 'index.php', '12 99792-5669', '12997925669', 'renan_etec@hotmail.com.com', 'Renan Vinicius dos Santos Ribeiro', 'Pontal', '', 0, '0', '123'),
(4, 0, '', '', '', '', '', 'RER', 'ER', 'ER', '2002-02-15', '21', '12', '123214', 'banco_cmesp.sql', 'banco_cmesp.sql', '123123', '123123', 'RENAN@HOR.COM', '32423', 'Pontal', '', 0, '0', '123'),
(5, 0, '', '', '', '', '', 'Renan ', 'Daniela', 'Ausente', '2002-02-15', '21', '5175', '123', 'index.php', 'index.php', '12997925669', '12997925669', 'wreynanbr@gmail.com', 'Renan Vinicius dos Santos Ribeiro', 'Maresias', '', 0, '0', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_espera`
--

CREATE TABLE `lista_espera` (
  `id_lista_espera` int(11) NOT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `posicao` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lista_espera`
--

INSERT INTO `lista_espera` (`id_lista_espera`, `id_aluno`, `id_turma`, `posicao`) VALUES
(34, 3, 9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `quant_faltas` int(11) NOT NULL DEFAULT 0,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `id_aluno`, `id_turma`, `quant_faltas`, `status`) VALUES
(47, 1, 9, 0, 'ativo'),
(48, 2, 9, 0, 'ativo'),
(50, 3, 1, 0, 'ativo'),
(51, 3, 11, 0, 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

CREATE TABLE `modalidade` (
  `id_modalidade` int(11) NOT NULL,
  `nome_modalidade` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`id_modalidade`, `nome_modalidade`) VALUES
(55, 'Futebol'),
(56, 'Volei'),
(57, 'Tenis'),
(59, 'Teste'),
(61, 'Natação'),
(62, 'Criquete'),
(63, 'Carro'),
(64, 'rererer'),
(65, 'rere');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `nome_professor` varchar(120) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `nome_professor`, `usuario`, `senha`) VALUES
(17, 'Teste', '123', '123'),
(18, 'Juan Linhares', '123', '123'),
(19, 'Renan', 'renan', '123'),
(20, 'sfds', 'sdf', 'sdf'),
(21, 'Rick', '54321', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `id_modalidade` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `quantidade_vagas` int(11) NOT NULL,
  `nivel` varchar(120) NOT NULL,
  `dias_semana` varchar(30) NOT NULL,
  `horario_inicio` varchar(100) NOT NULL,
  `horario_termino` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `id_modalidade`, `id_professor`, `id_endereco`, `quantidade_vagas`, `nivel`, `dias_semana`, `horario_inicio`, `horario_termino`) VALUES
(1, 55, 17, 7, 78, 'INi', '0010100', '13:00', '14:30'),
(2, 55, 17, 7, 123, '2323', '0100001', '13:00', '14:30'),
(4, 56, 19, 9, 36, 'Iniciante', '1000001', '13:00', '14:30'),
(5, 56, 19, 8, 8, 'plpp', '1000001', '13:00', '14:30'),
(6, 57, 17, 7, 1, '11', '0011000', '13:00', '14:30'),
(7, 56, 19, 12, 0, 'Iniciante', '1101011', '13:00', '14:30'),
(8, 55, 19, 10, 24, 'Iniciante', '0101010', '11:12', '11:12'),
(9, 59, 18, 9, 2, 'Iniciante - Idoso 90+', '0101010', '18:00', '19:00'),
(10, 61, 18, 11, 2, 'Avanzado', '0101010', '13:00', '14:30'),
(11, 62, 21, 13, 10, 'Iniciante', '0101010', '13:00', '14:30');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anamnese`
--
ALTER TABLE `anamnese`
  ADD PRIMARY KEY (`id_anamnese`);

--
-- Índices para tabela `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`id_bairro`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `iscricao_tab`
--
ALTER TABLE `iscricao_tab`
  ADD PRIMARY KEY (`id_inscricao`);

--
-- Índices para tabela `lista_espera`
--
ALTER TABLE `lista_espera`
  ADD PRIMARY KEY (`id_lista_espera`);

--
-- Índices para tabela `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Índices para tabela `modalidade`
--
ALTER TABLE `modalidade`
  ADD PRIMARY KEY (`id_modalidade`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anamnese`
--
ALTER TABLE `anamnese`
  MODIFY `id_anamnese` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `iscricao_tab`
--
ALTER TABLE `iscricao_tab`
  MODIFY `id_inscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `lista_espera`
--
ALTER TABLE `lista_espera`
  MODIFY `id_lista_espera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `id_modalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
