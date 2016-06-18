	--Explicações

--Efetuado a troca do banco, devido a empresa ORACLE privada e concorrente ter comprado Mysql, com isso a taxa de melhorias neste SGBD caiu consideralvemente. Estava com medo de trocar o SGBD por causa de perder a facilidades de uso e a equipe pode se perder, já que nas aulas utilizamos o XAMPP um ambiente integrado, no entanto, para garantir um futuro a esta aplicação decidi efetuar a troca, ESTAMOS NA CHUVA PARA SE MOLHAR (Também efetuei algumas alterações no schema)

--Apagando as tabelas se já existirem

DROP TABLE IF EXISTS Usuario CASCADE;
DROP TABLE IF EXISTS Campeonato CASCADE;
DROP TABLE IF EXISTS Estadio CASCADE;
DROP TABLE IF EXISTS Formacao CASCADE;
DROP TABLE IF EXISTS Estrategia CASCADE;
DROP TABLE IF EXISTS Agressividade CASCADE;
DROP TABLE IF EXISTS Tabela CASCADE;
DROP TABLE IF EXISTS Time CASCADE;
DROP TABLE IF EXISTS Rodada CASCADE;
DROP TABLE IF EXISTS Clima CASCADE;
DROP TABLE IF EXISTS Jogo CASCADE;
DROP TABLE IF EXISTS Posicao CASCADE;
DROP TABLE IF EXISTS Habilidade CASCADE;
DROP TABLE IF EXISTS Temperamento CASCADE;
DROP TABLE IF EXISTS Estilo CASCADE;
DROP TABLE IF EXISTS Jogador CASCADE;

-- Tabelas do Banco de dados

--Tabela com os dados dos usuários da aplicação
CREATE TABLE Usuario(

	id SERIAL,
	login VARCHAR(12) UNIQUE,
	senha VARCHAR(32) NOT NULL,
	nome VARCHAR(30) NOT NULL,
	sobrenome VARCHAR(60) NOT NULL,
	email VARCHAR(40) UNIQUE,
	celular VARCHAR(11) NOT NULL,

	PRIMARY KEY(id)

);

--T
CREATE TABLE Campeonato (
	
	id SERIAL,
	nome VARCHAR(20) NOT NULL,
	rodadaAtual INT NOT NULL,
	temporada INT NOT NULL,
	nomeCarregamento VARCHAR(20),
	usuario INT NOT NULL,
	
	FOREIGN KEY (usuario) REFERENCES Usuario (id),
	PRIMARY KEY (id)
	
);


CREATE TABLE Estadio(

	id SERIAL,
	nome VARCHAR(20) NOT NULL,
	capacidade INT NOT NULL,
	campeonato INT NOT NULL,

	
	FOREIGN KEY(campeonato) REFERENCES Campeonato (id),
	PRIMARY KEY(id)	

);

CREATE TABLE Tabela(
	
	id SERIAL,
	vitoria INT NOT NULL,
	empate INT NOT NULL,
	derrota INT NOT NULL,
	pontos INT NOT NULL,
	campeonato INT NOT NULL,
	
	FOREIGN KEY (campeonato) REFERENCES Campeonato (id),
	PRIMARY KEY (id)
);

CREATE TABLE Formacao (
	
	id SERIAL,
	nome VARCHAR(20) NOT NULL,
 
	PRIMARY KEY(id)

);


CREATE TABLE Estrategia (
	
	id SERIAL,
	nome VARCHAR(20) NOT NULL,
 
	PRIMARY KEY(id)

);


CREATE TABLE Agressividade (
	
	id SERIAL,
	nome VARCHAR(20) NOT NULL,
 
	PRIMARY KEY(id)

);



CREATE TABLE Time (
	
	id SERIAL,
	nome VARCHAR(30) NOT NULL,
	mascote VARCHAR(20) NOT NULL,
	cor VARCHAR(20) NOT NULL,
	dinheiro VARCHAR(20) NOT NULL,
	torcida INT NOT NULL,
	dono INT,
	campeonato INT,	
	estadio INT,		
	formacao INT,
	estrategia INT,
	agressividade INT,
	tabela INT,
	

	FOREIGN KEY (dono) REFERENCES Usuario (id),	
	FOREIGN KEY (campeonato) REFERENCES Campeonato (id),
	FOREIGN KEY (estadio) REFERENCES Estadio (id),
	FOREIGN KEY (formacao) REFERENCES Formacao (id),	
	FOREIGN KEY (estrategia) REFERENCES Estrategia (id),	
	FOREIGN KEY (agressividade) REFERENCES Agressividade(id),				
	FOREIGN KEY (tabela) REFERENCES Tabela (id),
	
	PRIMARY KEY(id)

);

CREATE TABLE Rodada(
	
	id SERIAL,
	numero INT NOT NULL,
	campeonato INT,
	
	FOREIGN KEY (campeonato) REFERENCES Campeonato(id),
	PRIMARY KEY(id) 
);

CREATE TABLE Clima (
	
	id SERIAL,
	nome VARCHAR(20),

	PRIMARY KEY(id)
);

CREATE TABLE Jogo (
	
	id SERIAL,
	placarCasa int,
	placarVisitante int,
	data DATE NOT NULL,	
	campeonato INT NOT NULL,
	rodada INT NOT NULL,	
	timeCasa INT NOT NULL,
	timeVisitante INT  NOT NULL,
	clima INT  NOT NULL,

	FOREIGN KEY (campeonato) REFERENCES Campeonato(id),
	FOREIGN KEY (rodada) REFERENCES Rodada(id),
	FOREIGN KEY (timeCasa) REFERENCES Time(id),
	FOREIGN KEY (timeVisitante) REFERENCES Time(id),
	FOREIGN KEY (clima) REFERENCES Clima(id),			
	PRIMARY KEY(id)
	
);

CREATE TABLE Posicao(

	id SERIAL,
	nome VARCHAR(20),
	
	PRIMARY KEY (id)
);


CREATE TABLE Habilidade (

	id SERIAL,
	agilidade INT NOT NULL,	
	ataque INT NOT NULL,
	chute INT NOT NULL,
	defesa INT NOT NULL,	
	forca INT NOT NULL,
	passe INT NOT NULL,
	resistencia INT NOT NULL,
	
	PRIMARY KEY (id)
		
);

CREATE TABLE Temperamento (
	
	id SERIAL,
	nome VARCHAR(20) NOT NULL,

	PRIMARY KEY(id)

);

CREATE TABLE Estilo(
	
	id SERIAL,
	nome VARCHAR(20) NOT NULL,

	PRIMARY KEY(id)
);

CREATE TABLE Jogador (

	id SERIAL,
	titular BOOLEAN,
	nome VARCHAR(20) NOT NULL,
	sobrenome VARCHAR(60) NOT NULL,
	nacionalidade VARCHAR(40) NOT NULL,
	idade INT NOT NULL,
	estamina INT NOT NULL,
 	nivel VARCHAR NOT NULL,
	gol INT NOT NULL,
	passe VARCHAR(20) NOT NULL,
	salario VARCHAR(20) NOT NULL,
	idTime INT,
	posicao INT,
	habilidade INT,
	temperamento INT,
	estilo INT,
	campeonato INT,	

	FOREIGN KEY (idTime) REFERENCES Time (id),
	FOREIGN KEY (posicao) REFERENCES Posicao (id),
	FOREIGN KEY (habilidade) REFERENCES Habilidade (id), 
	FOREIGN KEY (temperamento) REFERENCES Temperamento (id),
	FOREIGN KEY (estilo) REFERENCES Estilo (id),
	FOREIGN KEY (campeonato) REFERENCES Campeonato (id),	
	PRIMARY KEY (id)
	
);

-- Inserções do banco de dados

--Inserção das Formações
INSERT INTO Formacao VALUES(DEFAULT, '5-4-1');
INSERT INTO Formacao VALUES(DEFAULT, '4-5-1');
INSERT INTO Formacao VALUES(DEFAULT, '4-4-2');
INSERT INTO Formacao VALUES(DEFAULT, '4-3-3');
INSERT INTO Formacao VALUES(DEFAULT, '3-5-2');
	
--Inserção das Estratégias
INSERT INTO Estrategia VALUES(DEFAULT, 'Contra-Ataque');
INSERT INTO Estrategia VALUES(DEFAULT, 'Defesa Total');
INSERT INTO Estrategia VALUES(DEFAULT, 'Ataque Total');
INSERT INTO Estrategia VALUES(DEFAULT, 'Equilibrado');

--Inserção das Agressividades
INSERT INTO Agressividade VALUES(DEFAULT,'Marcação Leve');
INSERT INTO Agressividade VALUES(DEFAULT,'Marcação Normal');
INSERT INTO Agressividade VALUES(DEFAULT,'Marcação Pesada');

--Inserção dos Climas
INSERT INTO Clima VALUES (DEFAULT, 'Chuva');
INSERT INTO Clima VALUES (DEFAULT, 'Nublado');
INSERT INTO Clima VALUES (DEFAULT, 'Sol');
INSERT INTO Clima VALUES (DEFAULT, 'Chuva-Sol');
INSERT INTO Clima VALUES (DEFAULT, 'Sol-Chuva');
INSERT INTO Clima VALUES (DEFAULT, 'Nublado-Sol');
INSERT INTO Clima VALUES (DEFAULT, 'Sol-Nublado');
INSERT INTO Clima VALUES (DEFAULT, 'Nublado-Chuva');
INSERT INTO Clima VALUES (DEFAULT, 'Chuva-Nublado');
 
--Inserção das Posições
INSERT INTO Posicao VALUES (DEFAULT, 'Goleiro');
INSERT INTO Posicao VALUES (DEFAULT, 'Zagueiro Central');
INSERT INTO Posicao VALUES (DEFAULT, 'Zagueiro Direito');
INSERT INTO Posicao VALUES (DEFAULT, 'Zagueiro Esquerdo');
INSERT INTO Posicao VALUES (DEFAULT, 'Lateral Direito');
INSERT INTO Posicao VALUES (DEFAULT, 'Lateral Esquerdo');
INSERT INTO Posicao VALUES (DEFAULT, 'Volante Central');
INSERT INTO Posicao VALUES (DEFAULT, 'Volante Direito');
INSERT INTO Posicao VALUES (DEFAULT, 'Volante Esquerdo');
INSERT INTO Posicao VALUES (DEFAULT, 'Ala Direita');
INSERT INTO Posicao VALUES (DEFAULT, 'Ala Esquerdo');
INSERT INTO Posicao VALUES (DEFAULT, 'Meia Campo Central');
INSERT INTO Posicao VALUES (DEFAULT, 'Meia Campo Direito');
INSERT INTO Posicao VALUES (DEFAULT, 'Meia Campo Esquerdo');
INSERT INTO Posicao VALUES (DEFAULT, 'Atacante Central');
INSERT INTO Posicao VALUES (DEFAULT, 'Atacante Direito');
INSERT INTO Posicao VALUES (DEFAULT, 'Atacante Esquerdo');

--Inserção do Temperamento
INSERT INTO Temperamento VALUES (DEFAULT, 'Calmo');
INSERT INTO Temperamento VALUES (DEFAULT, 'Nervoso');
INSERT INTO Temperamento VALUES (DEFAULT, 'Calmo-Nervoso');

-- Inserção de Estilo
INSERT INTO Estilo VALUES (DEFAULT,'Esforçado');
INSERT INTO Estilo VALUES (DEFAULT,'Preguiçoso');

