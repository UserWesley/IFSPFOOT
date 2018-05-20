	--Explicações

--Efetuado a troca do banco, devido a empresa ORACLE privada e concorrente ter comprado Mysql, com isso a taxa de melhorias neste SGBD caiu consideralvemente. Estava com medo de trocar o SGBD por causa de perder a facilidades de uso e a equipe pode se perder, já que nas aulas utilizamos o XAMPP um ambiente integrado, no entanto, para garantir um futuro a esta aplicação decidi efetuar a troca, ESTAMOS NA CHUVA PARA SE MOLHAR (Também efetuei algumas alterações no schema)

--Apagando as tabelas se já existirem


DROP TABLE IF EXISTS Usuario CASCADE;
DROP TABLE IF EXISTS Campeonato CASCADE;
DROP TABLE IF EXISTS Estadio CASCADE;
DROP TABLE IF EXISTS Produtos CASCADE;
DROP TABLE IF EXISTS Estadio_Produto CASCADE;
DROP TABLE IF EXISTS Formacao CASCADE;
DROP TABLE IF EXISTS Estrategia CASCADE;
DROP TABLE IF EXISTS NomeTime CASCADE;
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
DROP TABLE IF EXISTS NomePessoal CASCADE;
DROP TABLE IF EXISTS Sobrenome CASCADE;
DROP TABLE IF EXISTS Nacionalidade CASCADE;
DROP TABLE IF EXISTS Nivel CASCADE;
DROP TABLE IF EXISTS Jogador CASCADE;

-- Tabelas do Banco de dados

--Tabela com os dados dos usuários da aplicação
CREATE TABLE Usuario(

	id SERIAL,
	login VARCHAR(12) UNIQUE,
	senha VARCHAR(32) NOT NULL,
	nome VARCHAR(30) NOT NULL,
	sobrenome VARCHAR(60) NOT NULL,
	email VARCHAR(40) NOT NULL,
	celular VARCHAR(11) NOT NULL,

	PRIMARY KEY(id)

);

--T
CREATE TABLE Campeonato (
	
	id SERIAL,
	nome VARCHAR(20) NOT NULL,
	rodadaAtual INT NOT NULL,
	temporada INT NOT NULL,
	nomeCarregamento VARCHAR(20) NOT NULL,
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

CREATE TABLE Produtos(
    id SERIAL,
    nome VARCHAR(20) NOT NULL,
    preco FLOAT,
    
    
    PRIMARY KEY(id)
);


CREATE TABLE Estadio_Produto(
    
    id SERIAL,
    idEstadio INT,
    idProduto INT,
    
    FOREIGN KEY (idEstadio) REFERENCES Estadio (id),
    FOREIGN KEY (idProduto) REFERENCES Produtos (id),
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

CREATE TABLE NomeTime(
	
	id SERIAL,
	nome VARCHAR(25) NOT NULL,

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

--Tabela contendo varios nomes que serão sorteados na hora de montar o jogador
CREATE TABLE NomePessoal (

	id SERIAL,
	nome VARCHAR(20) UNIQUE NOT NULL,

	PRIMARY KEY (id)
);

--Tabela contendo varios sobrenomes que serão sorteados na hora de montar o jogador
CREATE TABLE Sobrenome (

	id SERIAL,
	nome VARCHAR(40) UNIQUE NOT NULL,

	PRIMARY KEY (id)
);

CREATE TABLE Nacionalidade(

	id SERIAL,
	nome VARCHAR(40) UNIQUE NOT NULL,

	PRIMARY KEY (id)

);

CREATE TABLE Nivel(

	id SERIAL,
	nome VARCHAR(40) UNIQUE NOT NULL,

	PRIMARY KEY (id)

);

CREATE TABLE Jogador (

	id SERIAL,
	titular BOOLEAN,
	nome INT NOT NULL,
	sobrenome INT NOT NULL,
	nacionalidade INT NOT NULL,
	idade INT NOT NULL,
	estamina INT NOT NULL,
 	nivel INT NOT NULL,
	gol INT NOT NULL,
	passe VARCHAR(20) NOT NULL,
	salario VARCHAR(20) NOT NULL,
	idTime INT,
	posicao INT,
	habilidade INT,
	temperamento INT,
	estilo INT,
	campeonato INT,	
	
	FOREIGN KEY (nome) REFERENCES NomePessoal (id),
	FOREIGN KEY (sobrenome) REFERENCES Sobrenome (id),
	FOREIGN KEY (nacionalidade) REFERENCES Nacionalidade (id),
	FOREIGN KEY (nivel) REFERENCES Nivel (id),
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
INSERT INTO Temperamento VALUES (DEFAULT, 'Comum');

-- Inserção de Estilo
INSERT INTO Estilo VALUES (DEFAULT,'Esforçado');
INSERT INTO Estilo VALUES (DEFAULT,'Preguiçoso');
INSERT INTO Estilo VALUES (DEFAULT,'Estrela');
INSERT INTO Estilo VALUES (DEFAULT,'Normal');

--Inserção de Niveis
INSERT INTO Nivel VALUES (DEFAULT,'Especial');
INSERT INTO Nivel VALUES (DEFAULT,'Alto');
INSERT INTO Nivel VALUES (DEFAULT,'Médio-Alto');
INSERT INTO Nivel VALUES (DEFAULT,'Médio-Equilibrado');
INSERT INTO Nivel VALUES (DEFAULT,'Médio-Baixo');
INSERT INTO Nivel VALUES (DEFAULT,'Baixo');


--Inserção de Nacionalidades
INSERT INTO Nacionalidade VALUES (DEFAULT,'Argentino');
INSERT INTO Nacionalidade VALUES (DEFAULT,'Brasileiro');
INSERT INTO Nacionalidade VALUES (DEFAULT,'Cubano');
INSERT INTO Nacionalidade VALUES (DEFAULT,'Americano');
INSERT INTO Nacionalidade VALUES (DEFAULT,'Inglês');
INSERT INTO Nacionalidade VALUES (DEFAULT,'Italiano');
INSERT INTO Nacionalidade VALUES (DEFAULT,'Português');


--Nomes pessoais
INSERT INTO NomePessoal VALUES (DEFAULT, 'João');
INSERT INTO NomePessoal VALUES (DEFAULT, 'José');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Caetano');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Wesley');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Jefferson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Jeferson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Cristaldo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Ubaldo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Romario');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Cafu');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Pablo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Rivelino');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Sandro'); 
INSERT INTO NomePessoal VALUES (DEFAULT, 'Marcio');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Riquelme');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Jeremias');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Gomes');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Silas');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Evandro');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Leandro');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Thobias');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Tobias');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Temer');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Michel');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Tadeu');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Marcos');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Marcus');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Sandoval');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Celson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Anselmo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Juvenal');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Pietro');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Aristoteles');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Platão');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Sergio');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Antonio');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Samuel');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Justh');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Wescley');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Willian');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Nivaldo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Ricardo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Paulo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Pedro');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Eduardo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Virgilio');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Lucas');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Luccas');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Ari');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Gervasio');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Fernando');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Flavio');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Fabio');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Claudio');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Claudinei');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Carlos');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Manuel');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Manoel');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Oliver');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Medeiros');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Roberto');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Douglas');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Alex');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Frederico');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Guilherme');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Gustavo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Lenilson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Denilson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Eder');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Ederson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Bruno');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Leo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Leonardo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Ronilson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Rener');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Richard');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Davi');
INSERT INTO NomePessoal VALUES (DEFAULT, 'David');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Doni');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Dorivaldo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Ivan');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Ivanildo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Robson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Denis');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Dênis');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Alberto');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Gilmar');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Gilberto');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Hilbert');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Romualdo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Adriano');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Adrian');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Ademir');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Adalberto');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Allan');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Alan');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Bryan');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Rodrigo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Tony');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Toni');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Valdir');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Valderez');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Valmir');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Walmir');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Washington');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Vanderson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Wanderson');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Felipe');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Filipe');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Filipi');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Miguel');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Luis');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Luiz');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Toledo');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Henrique');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Helder');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Icaro');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Zé');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Zetti');
INSERT INTO NomePessoal VALUES (DEFAULT, 'Zacarias');


--Sobrenomes
INSERT INTO Sobrenome VALUES (DEFAULT,'de Almeida');
INSERT INTO Sobrenome VALUES (DEFAULT,'da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'da Pena');
INSERT INTO Sobrenome VALUES (DEFAULT,'da Costa');
INSERT INTO Sobrenome VALUES (DEFAULT,'Pereira');
INSERT INTO Sobrenome VALUES (DEFAULT,'Tosta');
INSERT INTO Sobrenome VALUES (DEFAULT,'Figueiredo');
INSERT INTO Sobrenome VALUES (DEFAULT,'Figueiredo da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'da Silva Figueiredo');
INSERT INTO Sobrenome VALUES (DEFAULT,'Escobar');
INSERT INTO Sobrenome VALUES (DEFAULT,'Escobar Neto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Escobar Filho');
INSERT INTO Sobrenome VALUES (DEFAULT,'Escobar Junior');
INSERT INTO Sobrenome VALUES (DEFAULT,'Filho Escobar');
INSERT INTO Sobrenome VALUES (DEFAULT,'Filho');
INSERT INTO Sobrenome VALUES (DEFAULT,'Neto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Junior');
INSERT INTO Sobrenome VALUES (DEFAULT,'da Costa Neto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Siqueira');
INSERT INTO Sobrenome VALUES (DEFAULT,'Alves');
INSERT INTO Sobrenome VALUES (DEFAULT,'Averedo');
INSERT INTO Sobrenome VALUES (DEFAULT,'Averedo Neto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Averedo Filho');
INSERT INTO Sobrenome VALUES (DEFAULT,'Averedo Junior');
INSERT INTO Sobrenome VALUES (DEFAULT,'Junior Averedo');
INSERT INTO Sobrenome VALUES (DEFAULT,'Filho Averedo');
INSERT INTO Sobrenome VALUES (DEFAULT,'Neto Averedo');
INSERT INTO Sobrenome VALUES (DEFAULT,'Pedro');
INSERT INTO Sobrenome VALUES (DEFAULT,'Coutinho');
INSERT INTO Sobrenome VALUES (DEFAULT,'Pinto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Guimarães Lima');
INSERT INTO Sobrenome VALUES (DEFAULT,'Guimarães');
INSERT INTO Sobrenome VALUES (DEFAULT,'Lima');
INSERT INTO Sobrenome VALUES (DEFAULT,'Coelho');
INSERT INTO Sobrenome VALUES (DEFAULT,'Coelho Filho');
INSERT INTO Sobrenome VALUES (DEFAULT,'Pedro Coutinho');
INSERT INTO Sobrenome VALUES (DEFAULT,'Alves Siqueira');
INSERT INTO Sobrenome VALUES (DEFAULT,'Siqueira Alves');
INSERT INTO Sobrenome VALUES (DEFAULT,'Coutinho da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'da Silva Coutinho');
INSERT INTO Sobrenome VALUES (DEFAULT,'Perez');
INSERT INTO Sobrenome VALUES (DEFAULT,'da Silva Perez');
INSERT INTO Sobrenome VALUES (DEFAULT,'Fernandes da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'Fernandes');
INSERT INTO Sobrenome VALUES (DEFAULT,'Manoel');
INSERT INTO Sobrenome VALUES (DEFAULT,'Medeiros');
INSERT INTO Sobrenome VALUES (DEFAULT,'da Silva Medeiros');
INSERT INTO Sobrenome VALUES (DEFAULT,'Medeiros da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'Sousa');
INSERT INTO Sobrenome VALUES (DEFAULT,'Sousa da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'Sousa da Costa');
INSERT INTO Sobrenome VALUES (DEFAULT,'Sousa Pereira');
INSERT INTO Sobrenome VALUES (DEFAULT,'Pereira Souza');
INSERT INTO Sobrenome VALUES (DEFAULT,'Oliveira');
INSERT INTO Sobrenome VALUES (DEFAULT,'Oliveira da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'Oliveira da Costa');
INSERT INTO Sobrenome VALUES (DEFAULT,'Oliveira da Couto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Oliveira Teixeira');
INSERT INTO Sobrenome VALUES (DEFAULT,'Teixeira da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'Teixeira da Costa');
INSERT INTO Sobrenome VALUES (DEFAULT,'Teixeira Gomes');
INSERT INTO Sobrenome VALUES (DEFAULT,'Teixeira Mendes');
INSERT INTO Sobrenome VALUES (DEFAULT,'Mendes Pitta');
INSERT INTO Sobrenome VALUES (DEFAULT,'Pitta');
INSERT INTO Sobrenome VALUES (DEFAULT,'Alvarez');
INSERT INTO Sobrenome VALUES (DEFAULT,'Alvarez Pitta');
INSERT INTO Sobrenome VALUES (DEFAULT,'Alvarez Couto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Alveres Pereira');
INSERT INTO Sobrenome VALUES (DEFAULT,'Pereira Alveres ');
INSERT INTO Sobrenome VALUES (DEFAULT,'Cardoso');
INSERT INTO Sobrenome VALUES (DEFAULT,'Cardoso Filho');
INSERT INTO Sobrenome VALUES (DEFAULT,'Cardoso da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'Cardoso Neto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Teixeira Cardoso');
INSERT INTO Sobrenome VALUES (DEFAULT,'Alvares Cardoso ');
INSERT INTO Sobrenome VALUES (DEFAULT,'Mendes');
INSERT INTO Sobrenome VALUES (DEFAULT,'Mendes da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'Mendes da Costa');
INSERT INTO Sobrenome VALUES (DEFAULT,'da Costa Mendes');
INSERT INTO Sobrenome VALUES (DEFAULT,'Silveira');
INSERT INTO Sobrenome VALUES (DEFAULT,'Silveira da Silva');
INSERT INTO Sobrenome VALUES (DEFAULT,'Silveira Neto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Silveira Couto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Gonçalves');
INSERT INTO Sobrenome VALUES (DEFAULT,'Gonçalvez');
INSERT INTO Sobrenome VALUES (DEFAULT,'Gonçalves da Silva ');
INSERT INTO Sobrenome VALUES (DEFAULT,'Gonçalves Neto');
INSERT INTO Sobrenome VALUES (DEFAULT,'Gonçalves Pereira ');


-- Nomes dos times
INSERT INTO NomeTime VALUES (DEFAULT,'ABC FC');
INSERT INTO NomeTime VALUES (DEFAULT,'DEF FC');
INSERT INTO NomeTime VALUES (DEFAULT,'GHI FC');
INSERT INTO NomeTime VALUES (DEFAULT,'JKL FC');
INSERT INTO NomeTime VALUES (DEFAULT,'MNO FC');
INSERT INTO NomeTime VALUES (DEFAULT,'123 FC');
INSERT INTO NomeTime VALUES (DEFAULT,'456 FC');
INSERT INTO NomeTime VALUES (DEFAULT,'15 FC');
INSERT INTO NomeTime VALUES (DEFAULT,'DAS FC');
INSERT INTO NomeTime VALUES (DEFAULT,'DES FC');
INSERT INTO NomeTime VALUES (DEFAULT,'DSA FC');
INSERT INTO NomeTime VALUES (DEFAULT,'BOLO FC');
INSERT INTO NomeTime VALUES (DEFAULT,'BALL FC');
INSERT INTO NomeTime VALUES (DEFAULT,'KAL FC');
INSERT INTO NomeTime VALUES (DEFAULT,'DSADASD FC');
INSERT INTO NomeTime VALUES (DEFAULT,'TESTE FC');
INSERT INTO NomeTime VALUES (DEFAULT,'TES1 FC');
INSERT INTO NomeTime VALUES (DEFAULT,'TES2 FC');
INSERT INTO NomeTime VALUES (DEFAULT,'TES3 FC');
INSERT INTO NomeTime VALUES (DEFAULT,'TES4 FC');
INSERT INTO NomeTime VALUES (DEFAULT,'23 FC');


-- Inserção de Produtos
INSERT INTO Produtos VALUES (DEFAULT,'Arquibancada', 100);
INSERT INTO Produtos VALUES (DEFAULT,'Numeradas', 300);
INSERT INTO Produtos VALUES (DEFAULT,'Camarote', 1000);
INSERT INTO Produtos VALUES (DEFAULT,'Camarote Premium', 10000);
INSERT INTO Produtos VALUES (DEFAULT,'Camarote Daimond', 100000);
