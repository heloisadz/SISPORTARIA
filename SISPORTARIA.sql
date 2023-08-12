-- DROP DATABASE SISPORTARIA;
CREATE DATABASE SISPORTARIA;

USE SISPORTARIA;

CREATE TABLE Funcionario(
ID int primary key AUTO_INCREMENT,
nome varchar(100),
CPF VARCHAR(11),
funcao varchar (11),
senha VARCHAR(20)
);


CREATE TABLE Responsavel(
CPF_Resp VARCHAR(11) primary key,
nome varchar(100),
email VARCHAR(100)
);
INSERT INTO Responsavel (CPF_Resp, nome, email) VALUES ('234567', 'ISAAAA', 'ISAAA@GMAIL.OCM');


CREATE TABLE Aluno(
nome VARCHAR(100),
matricula varchar(15), 
interno VARCHAR(7),
autorizado VARCHAR(10),
CPF VARCHAR(11),
CPF_Resp VARCHAR(11) NULL,
FOREIGN KEY (CPF_Resp) REFERENCES Responsavel(CPF_Resp),
primary key (matricula, interno, autorizado)
);
CREATE INDEX idx_aluno_interno ON Aluno (interno);
CREATE INDEX idx_aluno_autorizado ON Aluno (autorizado);
CREATE INDEX idx_aluno_nome ON Aluno (nome);
CREATE INDEX idx_aluno_CPF ON Aluno (CPF);
CREATE INDEX idx_aluno_CPF_Resp ON Aluno (CPF_Resp);

CREATE TABLE Externo(
nome VARCHAR(100),
Motivo varchar(100),
CPF VARCHAR(11),
PRIMARY KEY (cpf, motivo, nome)
);

CREATE INDEX idx_externo_nome ON Externo (nome);
CREATE INDEX idx_externo_CPF ON Externo (CPF);
CREATE INDEX idx_externo_Motivo ON Externo (Motivo);

CREATE TABLE Encomenda(
codEncomenda VARCHAR(20) primary key,
remetente varchar(100),
horario time,
dataEncomenda date
); 

CREATE TABLE Recebe(
ID int,
codEncomenda VARCHAR(20),
matricula varchar(15), 
PRIMARY KEY (ID, codEncomenda, matricula),
FOREIGN KEY (ID) REFERENCES Funcionario(ID),
FOREIGN KEY (codEncomenda) REFERENCES Encomenda(codEncomenda),
FOREIGN KEY (matricula) REFERENCES Aluno(matricula)
);


CREATE TABLE Monitoramento(
nome_Externo VARCHAR(100) null,
nome_Interno VARCHAR(100) null,
id int primary key auto_increment,
ID_funcionario int,
data_saida date,
horario_saida time,
data_chegada date,
horario_chegada time,
CPF_Externo VARCHAR(11) null,
motivo VARCHAR(100),
interno VARCHAR(7) null,
autorizado  VARCHAR(11) null,
matricula VARCHAR(20) null,
FOREIGN KEY (nome_Interno) REFERENCES aluno(nome),
FOREIGN KEY (nome_Externo) REFERENCES externo(nome),
FOREIGN KEY (interno) REFERENCES aluno(interno),
FOREIGN KEY (autorizado) REFERENCES aluno(autorizado),
FOREIGN KEY (CPF_Externo) REFERENCES externo(CPF),
FOREIGN KEY (ID_funcionario) REFERENCES Funcionario(ID),
FOREIGN KEY (matricula) REFERENCES Aluno(matricula)
);



INSERT INTO Aluno (nome, matricula, interno, autorizado) 
VALUES ('Ana', '20211GBI23I0071', 'Interno', 'Autorizado');

SELECT nome, matricula, interno, autorizado
FROM Aluno;

DROP TABLE Monitoramento;
