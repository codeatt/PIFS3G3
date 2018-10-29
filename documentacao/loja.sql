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

-- REMOVER TABELAS
DROP TABLE IF EXISTS `pagamento`;
DROP TABLE IF EXISTS `MovimentoEstoque`;
DROP TABLE IF EXISTS `MovimentoOrigem`;
DROP TABLE IF EXISTS `vendaitem`;
DROP TABLE IF EXISTS `venda`;
DROP TABLE IF EXISTS `livro`;
DROP TABLE IF EXISTS `usuario`;
DROP TABLE IF EXISTS `clienteendereco`;
DROP TABLE IF EXISTS `clientecontato`;
DROP TABLE IF EXISTS `cliente`;
DROP TABLE IF EXISTS `tipocontato`;
DROP TABLE IF EXISTS `pagamentostatus`;
DROP TABLE IF EXISTS `vendastatus`;
DROP TABLE IF EXISTS `editora`;
DROP TABLE IF EXISTS `categoria`;


-- CATEGORIA

CREATE TABLE `categoria` (
  `CategoriaId` int(11) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CategoriaId`),
  ADD UNIQUE KEY `Descricao` (`Descricao`);
  
ALTER TABLE `categoria`
  MODIFY `CategoriaId` int(11) NOT NULL AUTO_INCREMENT;
  
-- EDITORA

CREATE TABLE `editora` (
  `EditoraId` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `editora`
  ADD PRIMARY KEY (`EditoraId`),
  ADD UNIQUE KEY `Nome` (`Nome`);
  
ALTER TABLE `editora`
  MODIFY `EditoraId` int(11) NOT NULL AUTO_INCREMENT;
  
-- VENDASTATUS

CREATE TABLE `vendastatus` (
  `VendaStatusId` int(11) NOT NULL,
  `Descricao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `vendastatus`
  ADD PRIMARY KEY (`VendaStatusId`),
  ADD UNIQUE KEY `Descricao` (`Descricao`);
  
ALTER TABLE `vendastatus`
  MODIFY `VendaStatusId` int(11) NOT NULL AUTO_INCREMENT;
  
-- PAGAMENTOSTATUS

CREATE TABLE `pagamentostatus` (
  `PagamentoStatusId` int(11) NOT NULL,
  `Descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `pagamentostatus`
  ADD PRIMARY KEY (`PagamentoStatusId`),
  ADD UNIQUE KEY `Descricao` (`Descricao`);
  
ALTER TABLE `pagamentostatus`
  MODIFY `PagamentoStatusId` int(11) NOT NULL AUTO_INCREMENT;
  
-- TIPOCONTATO

CREATE TABLE `tipocontato` (
  `TipoContatoId` int(11) NOT NULL,
  `Descricao` varchar(20) NOT NULL,
  `Ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tipocontato`
  ADD PRIMARY KEY (`TipoContatoId`);
  
ALTER TABLE `tipocontato`
  MODIFY `TipoContatoId` int(11) NOT NULL AUTO_INCREMENT;
  
-- CLIENTE

CREATE TABLE `cliente` (
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

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ClienteId`),
  ADD UNIQUE KEY `UK_Cliente_Nome` (`Nome`),
  ADD UNIQUE KEY `UK_Cliente_CPF` (`CPF`);
  
ALTER TABLE `cliente`
  MODIFY `ClienteId` int(11) NOT NULL AUTO_INCREMENT;
  
-- CLIENTECONTATO

CREATE TABLE `clientecontato` (
  `ClienteContatoId` int(11) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `TipoContatoId` int(11) NOT NULL,
  `Contato` int(11) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `clientecontato`
  ADD PRIMARY KEY (`ClienteContatoId`),
  ADD KEY `FK_Contato_Cliente` (`ClienteId`),
  ADD KEY `FK_Contato_Tipo` (`TipoContatoId`);
  
ALTER TABLE `clientecontato`
  MODIFY `ClienteContatoId` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `clientecontato`
  ADD CONSTRAINT `FK_Contato_Cliente` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`ClienteId`),
  ADD CONSTRAINT `FK_Contato_Tipo` FOREIGN KEY (`TipoContatoId`) REFERENCES `tipocontato` (`TipoContatoId`);
  
-- CLIENTEENDERECO

CREATE TABLE `clienteendereco` (
  `ClienteEnderecoId` int(11) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `Logradouro` varchar(50) NOT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Complemento` varchar(30) DEFAULT NULL,
  `Bairro` varchar(30) NOT NULL,
  `Cidade` varchar(30) NOT NULL,
  `UF` char(2) NOT NULL,
  `CEP` char(8) NOT NULL,
  `Entrega` tinyint(1) NOT NULL,
  `Fiscal` tinyint(1) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `clienteendereco`
  ADD PRIMARY KEY (`ClienteEnderecoId`),
  ADD KEY `FK_Endereco_Cliente` (`ClienteId`);
  
ALTER TABLE `clienteendereco`
  MODIFY `ClienteEnderecoId` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `clienteendereco`
  ADD CONSTRAINT `FK_Endereco_Cliente` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`ClienteId`);
  
-- USUARIO

CREATE TABLE `usuario` (
  `UsuarioId` int(11) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `Ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`UsuarioId`),
  ADD UNIQUE KEY `UK_Usuario_Login` (`Login`),
  ADD KEY `FK_Usuario_Cliente` (`ClienteId`);
  
ALTER TABLE `usuario`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_Usuario_Cliente` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`ClienteId`);
  
-- LIVRO

CREATE TABLE `livro` (
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

ALTER TABLE `livro`
  ADD PRIMARY KEY (`LivroId`),
  ADD UNIQUE KEY `Titulo` (`Titulo`),
  ADD KEY `FK_Livro_Editora` (`EditoraId`),
  ADD KEY `FK_Livro_Categoria` (`CategoriaId`);
  
ALTER TABLE `livro`
  MODIFY `LivroId` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `livro`
  ADD CONSTRAINT `FK_Livro_Categoria` FOREIGN KEY (`CategoriaId`) REFERENCES `categoria` (`CategoriaId`),
  ADD CONSTRAINT `FK_Livro_Editora` FOREIGN KEY (`EditoraId`) REFERENCES `editora` (`EditoraId`);
  
-- VENDA

CREATE TABLE `venda` (
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

ALTER TABLE `venda`
  ADD PRIMARY KEY (`PedidoId`),
  ADD KEY `FK_Venda_Status` (`VendaStatusId`),
  ADD KEY `FK_Venda_Cliente` (`ClienteId`),
  ADD KEY `FK_Venda_ClienteEndereco` (`ClienteEnderecoId`);
  
ALTER TABLE `venda`
  MODIFY `PedidoId` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `venda`
  ADD CONSTRAINT `FK_Venda_Status` FOREIGN KEY (`VendaStatusId`) REFERENCES `vendastatus` (`VendaStatusId`),
  ADD CONSTRAINT `FK_Venda_Cliente` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`ClienteId`),
  ADD CONSTRAINT `FK_Venda_ClienteEndereco` FOREIGN KEY (`ClienteEnderecoId`) REFERENCES `clienteendereco` (`ClienteEnderecoId`);
  
-- VENDAITEM

CREATE TABLE `vendaitem` (
  `ItemId` int(11) NOT NULL,
  `LivroId` int(11) NOT NULL,
  `PedidoId` int(11) NOT NULL,
  `ValorItem` decimal(7,2) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `vendaitem`
  ADD PRIMARY KEY (`ItemId`),
  ADD KEY `FK_Item_Livro` (`LivroId`),
  ADD KEY `FK_Item_Venda` (`PedidoId`);
  
ALTER TABLE `vendaitem`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `vendaitem`
  ADD CONSTRAINT `FK_Item_Livro` FOREIGN KEY (`LivroId`) REFERENCES `livro` (`LivroId`),
  ADD CONSTRAINT `FK_Item_Venda` FOREIGN KEY (`PedidoId`) REFERENCES `venda` (`PedidoId`);
  
-- MOVIMENTOORIGEM

CREATE TABLE `MovimentoOrigem` (
  `MovimentoOrigemId` int(11) NOT NULL,
  `Origem` varchar(30) NOT NULL,
  `TipoMovimento` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `MovimentoOrigem`
  ADD PRIMARY KEY (`MovimentoOrigemId`),
  ADD UNIQUE KEY `Origem` (`Origem`);
  
ALTER TABLE `MovimentoOrigem`
  MODIFY `MovimentoOrigemId` int(11) NOT NULL AUTO_INCREMENT;

-- MOVIMENTOESTOQUE

CREATE TABLE `MovimentoEstoque` (
  `MovimentoEstoqueId` int(11) NOT NULL,
  `LivroId` int(11) NOT NULL,
  `Data` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `MovimentoOrigemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `MovimentoEstoque`
  ADD PRIMARY KEY (`MovimentoEstoqueId`),
  ADD KEY `FK_MovimentoEstoque_Origem` (`MovimentoOrigemId`),
  ADD KEY `FK_MovimentoEstoque_Livro` (`LivroId`);
  
ALTER TABLE `MovimentoEstoque`
  MODIFY `MovimentoEstoqueId` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `MovimentoEstoque`
  ADD CONSTRAINT `FK_MovimentoEstoque_Origem` FOREIGN KEY (`MovimentoOrigemId`) REFERENCES `MovimentoOrigem` (`MovimentoOrigemId`),
  ADD CONSTRAINT `FK_MovimentoEstoque_Livro` FOREIGN KEY (`LivroId`) REFERENCES `livro` (`LivroId`);

-- PAGAMENTO

CREATE TABLE `pagamento` (
  `PagamentoId` int(11) NOT NULL,
  `PedidoId` int(11) NOT NULL,
  `PagamentoStatusId` int(11) NOT NULL,
  `DataPagamento` datetime NOT NULL,
  `Observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`PagamentoId`),
  ADD KEY `FK_Pagamento_Venda` (`PedidoId`),
  ADD KEY `FK_Pagamento_Status` (`PagamentoStatusId`);
  
ALTER TABLE `pagamento`
  MODIFY `PagamentoId` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `pagamento`
  ADD CONSTRAINT `FK_Pagamento_Status` FOREIGN KEY (`PagamentoStatusId`) REFERENCES `pagamentostatus` (`PagamentoStatusId`),
  ADD CONSTRAINT `FK_Pagamento_Venda` FOREIGN KEY (`PedidoId`) REFERENCES `venda` (`PedidoId`);
  
insert into `tipocontato` (`Descricao`,`Ativo`) values ('Telefone Residencial',true);
insert into `tipocontato` (`Descricao`,`Ativo`) values ('Telefone Comercial',true);
insert into `tipocontato` (`Descricao`,`Ativo`) values ('E-mail',true);
insert into `tipocontato` (`Descricao`,`Ativo`) values ('Celular',true);
  
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
