-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Abr-2023 às 04:59
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
-- Banco de dados: `exploding`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`, `status`) VALUES
(1, 'SOFTWARE', 'TODOS OS PRODUTOS RELACIONADO A SOFTWARE', 'A'),
(2, 'STORAGE', 'PRODUTOS RELACIONADOS A ARMAZENAMENTO DE DADOS', 'A'),
(3, 'GABINETE', 'TODOS OS PRODUTOS RELACIONADOS A GABINETE PARA DESKTOPS', 'A'),
(4, 'MODEM/ROTEADOR', 'TODOS PRODUTOS RELACIONADOS A GERENCIAMENTO DE REDE INTERNA/LAN', 'A'),
(5, 'PLACA DE VIDEO', 'TODOS OS PRODUTOS RELACIONADO A PROCESSAMENTO GRAFICO', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `cpf` char(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `endereco`, `telefone`, `cpf`, `status`) VALUES
(1, 'JOAO JOSE MARIA', 'RUA JOAQUIM NABUCO, 1040 - CENTRO - CRICIUMA - SANTA CATARINA', '48996639841', '09865788876', 'A'),
(2, 'ANDRE LUIZ DE SOUZA', 'RUA DESEMB. PEDRO SILVA, 992 - CENTRO - CRICIUMA - SC', '4898823222', '99388398322', 'A'),
(3, 'MARIA APARECIDA SANTOS', 'RUA JOAO DOS AUSENTES, 4999 - CIDADE BAIXA - PIRACICABA - SP', '4994439999', '93944788329', 'A'),
(4, 'JOAO ALBERTO GOMEZ', 'AV CENTENARIO, 4939 - VISTA GROSSA - CURITIBA - PR', '4998004993', '39089923321', 'A'),
(5, 'AFONSO DALAVEQUIA', 'RUA ALMIRANTE BARROSO, 49 - CENTRO - BLUMENAU - SC', '47988943004', '42332666543', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `razao_social` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `cnpj` char(14) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `razao_social`, `endereco`, `telefone`, `cnpj`, `status`) VALUES
(1, 'MAZER DISTRIBUIDORA LTDA', 'AV. SEVERO DULLIUS, 75 - SAO JOAO - PORTO ALEGRE - RS', '5121012100', '94623741000172', 'A'),
(2, 'PAUTA DISTRIBUIÇÃO E LOGISTICA S.A', 'RUA: JUDITE MELO DOS SANTOS - 251 - GALPAO: 10 - Distrito Industrial - SAO JOSE -SC', '4832817500', '83064741000163', 'A'),
(3, 'Fagundez Distribuicao Ltda', 'Avenida Maringa, 1354 - .Bloco D - Unidade 7 - Emiliano Perneta - Pinhais - PR', '4130124500', '07953689000118', 'A'),
(4, 'INFNI INFORMATICA LTDA ME', 'ESTRADA: GERAL SÃO PEDRO, 275 - SÃO PEDRO - URUSSANGA - SC', '4899043252', '20832883000103', 'A'),
(5, 'FUJIOKA ELETRO IMAGEM S.A.', 'R PORTO NACIONAL, 265 - QD. 57 LTS 01/35 - JD GUANABARA - Goiânia - GO', '6232649800', '01008713004909', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `salario` decimal(18,2) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cargo`, `salario`, `telefone`, `endereco`, `status`) VALUES
(1, 'PAULO MAIE', 'DIRETOR', '13400.00', '48994584394', 'RUA CAMPINAS JOSE TEIXEIRA, 400 - PIO CO', 'A'),
(2, 'MARIA SALETE DOS SANTOS ', 'SECRETARIA', '2500.00', '48998330320', 'RUA ARTHUR BERNADES, 904 - SÃO LUIZ - CRICIÚMA - SC ', 'A'),
(3, 'JOSÉ DE ASSIS MAZZUCO', 'TECNICO', '5000.00', '48923403939', 'RUA VICENTE DAL PONT, 501 - FÁBIO SILVA - CRICIUMA - SC', 'A'),
(4, 'CAMILA MAZZUCO', 'FINANCEIRO', '4300.00', '48993949933', 'RUA LODOVICO MARIO MANGILE, 238 - SÃO LUIZ - CRICIUMA - SC', 'A'),
(5, 'MORGANA DE JESUS', 'VENDEDORA', '3890.00', '48993043393', 'RUA ANTONIO ZANETTE, 394 - SANTO ANTONIO - CRICIUMA - SC', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_compra`
--

CREATE TABLE `item_compra` (
  `quantidade` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_pedido`
--

CREATE TABLE `item_pedido` (
  `quantidade` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_compra`
--

CREATE TABLE `pedido_compra` (
  `id` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_venda`
--

CREATE TABLE `pedido_venda` (
  `id` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `status` char(1) NOT NULL,
  `valor_pedido` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` decimal(18,2) NOT NULL,
  `estoque` varchar(50) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `estoque`, `status`) VALUES
(1, 'SSD WD 240GB GREEN SATA3 2.5 7MM WDS240G2G0A', 'Velocidade de leitura de até 545 MB/s, muito leve e compacto, Dashboard gratuita da WD.', '195.00', '5', 'A'),
(2, 'SSD KINGSTON 1TB NV2 M.2 2280 NVME PCIE 4.0 - SNV2', 'Ideal para laptops e PCs de fator de forma pequeno, desempenho NVMe PCle 4.0 geração 4x4.', '341.00', '5', 'A'),
(3, 'SSD CRUCIAL 1TB BX500 3D NAND SATA3 2,5 7MM - CT10', 'SSD Series - BX500, Leitura: 540MB/s, Durabilidade: 360 TB.', '346.00', '3', 'A'),
(5, 'PLACA DE VIDEO ZOTAC 8400GS TC512MB DDR2 64-BIT VG', 'Cores: 768 Units Boost / Base Core Clock: 1455 MHz / 1341 MHz memoria Clock Speed: 7008 MHz memoriA.', '1118.00', '3', 'A'),
(6, 'PLACA DE VIDEO GIGABYTE RADEON RX 570 GAMING 4GB', 'Radeon RX 570 integrada com 4GB GDDR5 256-bit de memoria. WINDFORCE 2X com Blade Fan Design.', '1499.00', '2', 'A'),
(7, 'GABINETE GAMER C3TECK MTG550BK SFONTE', 'O MT-G550BK e o produto ideal para que deseja montar um computador gamer de ultima geração.', '567.00', '9', 'A'),
(8, 'GABINETE S/ FONTE MICRO ATX OFFICE OP-2 PRE PCYE', 'Formato: Mid-tower, armazenamento: 2 x 3.5\'\', 3 x 2.5\'\'.', '250.00', '10', 'A'),
(9, 'ESET ENDPOINT PROTECTION STANDARD', 'O ESET End. Pro. Standard oferece proteção integrada em tempo-real contra vírus entre outros.', '599.00', '2', 'A'),
(10, 'WINDOWS 10 PRO 64B COEM MIDIA', 'O Windows 10 é familiar e fácil de usar, muito parecido com o Windows 7, incluindo o menu Iniciar. ', '1599.00', '24', 'A'),
(11, 'LICENCA ESD OFFICE PRO 2019 DOWNLOAD', 'O Office Professional Plus 2019 é ideal para pequenas empresas.', '1099.00', '2', 'A'),
(12, 'ROT C5 DUAL BAND WIFI AC 1200 2,4 5GHZ TP-LINK ', 'Tenha Wi-Fi mais rápido em ambas bandas de 2.4GHz (450Mbps) e 5GHz (867Mbps).', '379.00', '3', 'A'),
(13, 'ROTEADOR TP-LINK WIFI N 300MBPS TL-WR829N PRESET', 'A velocidade Wi-Fi de 300 Mbps é ideal para tarefas diárias, incluindo navegação, envio de emails...', '189.00', '5', 'A');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido_compra`
--
ALTER TABLE `pedido_compra`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido_venda`
--
ALTER TABLE `pedido_venda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedido_compra`
--
ALTER TABLE `pedido_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_venda`
--
ALTER TABLE `pedido_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
