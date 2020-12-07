-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Dez-2020 às 22:15
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ufmt`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `ID` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`ID`, `Codigo`, `Descricao`) VALUES
(1, 1, 'Educação'),
(2, 2, 'Saúde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clienteendereco`
--

CREATE TABLE `clienteendereco` (
  `ID` int(11) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `Estado` varchar(250) NOT NULL,
  `Cidade` varchar(250) NOT NULL,
  `Bairro` varchar(250) NOT NULL,
  `Logradouro` varchar(250) NOT NULL,
  `Complemento` varchar(250) NOT NULL,
  `Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clienteendereco`
--

INSERT INTO `clienteendereco` (`ID`, `ClienteID`, `Estado`, `Cidade`, `Bairro`, `Logradouro`, `Complemento`, `Numero`) VALUES
(1, 1, 'Mato Grosso', 'Várzea Grande', 'Dom Orlando Chaves', 'Travessa das Flores', 'Quadra 09', 14),
(2, 4, 'Mato Grosso do Sul', 'Dourados', 'Verde', 'Rua Limão', 'Quadra 02', 20),
(3, 2, 'Mato Grosso', 'Juína', 'São Carlos', 'Rua das Flores', 'Quadra 203', 1518);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `PessoaID` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`ID`, `PessoaID`, `Codigo`) VALUES
(1, 1, 195495),
(2, 2, 198478),
(3, 3, 981981),
(4, 5, 99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `Chave` varchar(60) NOT NULL,
  `Valor` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`Chave`, `Valor`) VALUES
('NOME_PROJETO', 'UFMT - WEB1'),
('NOME_APROJETO', '1'),
('SUBTITULO_PROJETO', 'Controle de Clientes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `Sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`ID`, `Nome`, `CPF`, `Sexo`) VALUES
(1, 'Whinderson Nunes', '70556808088', 'M'),
(2, 'Jussara Santos', '05884589027', 'F'),
(3, 'Julieynny Katiuscia', '15995195115', 'M'),
(4, 'Maykão Douglas', '95195115915', 'M'),
(5, 'Patricia Soares', '19849529848', 'F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Valor` double NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Imagem` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`ID`, `Nome`, `Valor`, `Quantidade`, `Imagem`) VALUES
(2, 'Bola de volei', 1, 20, 'https://images-na.ssl-images-amazon.com/images/I/61fjx-MqcVL._AC_SY355_.jpg'),
(3, 'Bola de Futebol Pivot Umbro - Bola futebol de campo', 59.99, 100, 'https://decathlonpro.vteximg.com.br/arquivos/ids/2443948-1000-1000/bola-futebol-de-campo-pivot-supporter1.jpg?v=637129769419230000'),
(4, 'Martelo Unha 29mm Polido Master 40370', 73.39, 59, 'https://anhangueraferramentas.fbitsstatic.net/img/p/martelo-unha-com-cabo-de-madeira-335mm-40370-029-tramontina-79986/267625-4.jpg?w=460&h=460&v=no-change'),
(5, 'Avião de papel', 0.5, 1, 'data:image/jpeg;base64,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');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtosvendas`
--

CREATE TABLE `produtosvendas` (
  `ID` int(11) NOT NULL,
  `ProdutoID` int(11) NOT NULL,
  `VendaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtosvendas`
--

INSERT INTO `produtosvendas` (`ID`, `ProdutoID`, `VendaID`) VALUES
(1, 2, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `ID` int(11) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `VendedorID` int(11) NOT NULL,
  `LojaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`ID`, `ClienteID`, `VendedorID`, `LojaID`) VALUES
(1, 1, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `clienteendereco`
--
ALTER TABLE `clienteendereco`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `produtosvendas`
--
ALTER TABLE `produtosvendas`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clienteendereco`
--
ALTER TABLE `clienteendereco`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtosvendas`
--
ALTER TABLE `produtosvendas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
