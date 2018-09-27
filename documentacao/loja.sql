-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Set-2018 às 18:49
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS  `categoria` (
  `CategoriaId` int(11) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE IF NOT EXISTS  `editora` (
  `EditoraId` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS  `cliente` (
  `ClienteId` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Sexo` char(1) NOT NULL,
  `FotoUrl` varchar(100) DEFAULT NULL,
  `FotoDescricao` varchar(30) DEFAULT NULL,
  `AutorizaEmail` tinyint(1) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS  `livro` (
  `LivroId` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Autor` varchar(30) NOT NULL,
  `Preco` float(7,2) NOT NULL,
  `QtdEstoque` int(11) NOT NULL,
  `Edicao` varchar(20) NOT NULL,
  `Ativo` tinyint(1) NOT NULL,
  `EditoraId` int(11) NOT NULL,
  `CategoriaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendastatus`
--

CREATE TABLE IF NOT EXISTS  `vendastatus` (
  `VendaStatusId` int(11) NOT NULL,
  `Descricao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentostatus`
--

CREATE TABLE IF NOT EXISTS  `pagamentostatus` (
  `PagamentoStatusId` int(11) NOT NULL,
  `Descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipocontato`
--

CREATE TABLE IF NOT EXISTS  `tipocontato` (
  `TipoContatoId` int(11) NOT NULL,
  `Descricao` varchar(20) NOT NULL,
  `Ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `clientecontato`
--

CREATE TABLE IF NOT EXISTS  `clientecontato` (
  `ClienteContatoId` int(11) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `TipoContatoId` int(11) NOT NULL,
  `Contato` int(11) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clienteendereco`
--

CREATE TABLE IF NOT EXISTS  `clienteendereco` (
  `ClienteEnderecoId` int(11) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `Logradouro` varchar(50) NOT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Complemento` varchar(30) DEFAULT NULL,
  `Bairro` varchar(30) NOT NULL,
  `Cidade` varchar(30) NOT NULL,
  `UF` char(2) NOT NULL,
  `Entrega` tinyint(1) NOT NULL,
  `Fiscal` tinyint(1) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE IF NOT EXISTS  `venda` (
  `PedidoId` int(11) NOT NULL,
  `VendaStatusId` int(11) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `ClienteEnderecoId` int(11) NOT NULL,
  `DataVenda` datetime NOT NULL,
  `ValorBruto` decimal(7,2) NOT NULL,
  `ValorFrete` decimal(7,2) NOT NULL,
  `ValorImposto` decimal(7,2) NOT NULL,
  `ValorDesconto` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE IF NOT EXISTS  `estoque` (
  `EstoqueId` int(11) NOT NULL,
  `LivroId` int(11) NOT NULL,
  `Data` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `MovimentoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento`
--

CREATE TABLE IF NOT EXISTS  `movimento` (
  `MovimentoId` int(11) NOT NULL,
  `Motivo` varchar(30) NOT NULL,
  `TipoMovimento` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE IF NOT EXISTS  `pagamento` (
  `PagamentoId` int(11) NOT NULL,
  `PedidoId` int(11) NOT NULL,
  `PagamentoStatusId` int(11) NOT NULL,
  `DataPagamento` datetime NOT NULL,
  `Observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS  `usuario` (
  `UsuarioId` int(11) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendaitem`
--

CREATE TABLE IF NOT EXISTS  `vendaitem` (
  `ItemId` int(11) NOT NULL,
  `LivroId` int(11) NOT NULL,
  `PedidoId` int(11) NOT NULL,
  `ValorItem` decimal(7,2) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CategoriaId`),
  ADD UNIQUE KEY `Descricao` (`Descricao`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ClienteId`),
  ADD UNIQUE KEY `UK_Cliente_Nome` (`Nome`),
  ADD UNIQUE KEY `UK_Cliente_CPF` (`CPF`);

--
-- Indexes for table `clientecontato`
--
ALTER TABLE `clientecontato`
  ADD PRIMARY KEY (`ClienteContatoId`),
  ADD KEY `FK_Contato_Cliente` (`ClienteId`),
  ADD KEY `FK_Contato_Tipo` (`TipoContatoId`);

--
-- Indexes for table `clienteendereco`
--
ALTER TABLE `clienteendereco`
  ADD PRIMARY KEY (`ClienteEnderecoId`),
  ADD KEY `FK_Endereco_Cliente` (`ClienteId`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`EditoraId`),
  ADD UNIQUE KEY `Nome` (`Nome`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`LivroId`),
  ADD UNIQUE KEY `Titulo` (`Titulo`),
  ADD KEY `FK_Livro_Editora` (`EditoraId`),
  ADD KEY `FK_Livro_Categoria` (`CategoriaId`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`PagamentoId`),
  ADD KEY `FK_Pagamento_Venda` (`PedidoId`),
  ADD KEY `FK_Pagamento_Status` (`PagamentoStatusId`);

--
-- Indexes for table `pagamentostatus`
--
ALTER TABLE `pagamentostatus`
  ADD PRIMARY KEY (`PagamentoStatusId`),
  ADD UNIQUE KEY `Descricao` (`Descricao`);

--
-- Indexes for table `tipocontato`
--
ALTER TABLE `tipocontato`
  ADD PRIMARY KEY (`TipoContatoId`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`UsuarioId`),
  ADD UNIQUE KEY `UK_Usuario_Login` (`Login`),
  ADD KEY `FK_Usuario_Cliente` (`ClienteId`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`PedidoId`),
  ADD KEY `FK_Venda_Cliente` (`ClienteId`),
  ADD KEY `FK_Venda_ClienteEndereco` (`ClienteEnderecoId`);

--
-- Indexes for table `vendaitem`
--
ALTER TABLE `vendaitem`
  ADD PRIMARY KEY (`ItemId`);
  ADD KEY `FK_Item_Livro` (`LivrId`),
  ADD KEY `FK_Item_Venda` (`PedidoId`);

--
-- Indexes for table `vendastatus`
--
ALTER TABLE `vendastatus`
  ADD PRIMARY KEY (`VendaStatusId`),
  ADD UNIQUE KEY `Descricao` (`Descricao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CategoriaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ClienteId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientecontato`
--
ALTER TABLE `clientecontato`
  MODIFY `ClienteContatoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clienteendereco`
--
ALTER TABLE `clienteendereco`
  MODIFY `ClienteEnderecoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `editora`
--
ALTER TABLE `editora`
  MODIFY `EditoraId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `LivroId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `PagamentoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagamentostatus`
--
ALTER TABLE `pagamentostatus`
  MODIFY `PagamentoStatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipocontato`
--
ALTER TABLE `tipocontato`
  MODIFY `TipoContatoId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `PedidoId` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT for table `vendaitem`
--
ALTER TABLE `vendaitem`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendastatus`
--
ALTER TABLE `vendastatus`
  MODIFY `VendaStatusId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `clientecontato`
--
ALTER TABLE `clientecontato`
  ADD CONSTRAINT `FK_Contato_Cliente` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`ClienteId`),
  ADD CONSTRAINT `FK_Contato_Tipo` FOREIGN KEY (`TipoContatoId`) REFERENCES `tipocontato` (`TipoContatoId`);

--
-- Limitadores para a tabela `clienteendereco`
--
ALTER TABLE `clienteendereco`
  ADD CONSTRAINT `FK_Endereco_Cliente` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`ClienteId`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `FK_Livro_Categoria` FOREIGN KEY (`CategoriaId`) REFERENCES `categoria` (`CategoriaId`),
  ADD CONSTRAINT `FK_Livro_Editora` FOREIGN KEY (`EditoraId`) REFERENCES `editora` (`EditoraId`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `FK_Pagamento_Status` FOREIGN KEY (`PagamentoStatusId`) REFERENCES `pagamentostatus` (`PagamentoStatusId`),
  ADD CONSTRAINT `FK_Pagamento_Venda` FOREIGN KEY (`PedidoId`) REFERENCES `venda` (`PedidoId`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_Usuario_Cliente` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`ClienteId`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `FK_Venda_Cliente` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`ClienteId`),
  ADD CONSTRAINT `FK_Venda_ClienteEndereco` FOREIGN KEY (`ClienteEnderecoId`) REFERENCES `clienteendereco` (`ClienteEnderecoId`);

--
-- Limitadores para a tabela `vendaitem`
--
ALTER TABLE `vendaitem`
  ADD CONSTRAINT `FK_Item_Livro` FOREIGN KEY (`LivroId`) REFERENCES `livro` (`LivroId`),
  ADD CONSTRAINT `FK_Item_Venda` FOREIGN KEY (`PedidoId`) REFERENCES `venda` (`PedidoId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
