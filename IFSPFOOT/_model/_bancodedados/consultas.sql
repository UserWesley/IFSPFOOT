-- Consultas do banco de dados

--Consulta Clima
SELECT * FROM Clima;

--Consulta Posição
SELECT * FROM Posicao;

--Consulta Temperamento
SELECT * FROM Temperamento;

--Consulta Estilo 
SELECT * FROM Estilo;

--Jogos do usuario
SELECT Campeonato.nomeCarregamento FROM Usuario,Campeonato WHERE Usuario.id = Campeonato.usuario;

--Artilharia 
SELECT Jogador.nome, Jogador.sobrenome, Time.nome, Jogador.gol FROM Campeonato, Jogador,Time WHERE Campeonato.id = Time.campeonato AND Jogador.idTime = Time.id;  

--Jogos do Campeonato 
SELECT Jogo.timeCasa,Jogo.placarCasa, Jogo.placarVisitante, Jogo.timeVisitante,Jogo.data, Clima.nome FROM Jogo,Campeonato,Clima WHERE Campeonato.id = Jogo.campeonato AND Jogo.clima = Clima.id ;  

--Jogos por rodada do Campeonato
SELECT Rodada.numero, Jogo.timeCasa, Jogo.timeVisitante, Jogo.data FROM  Campeonato,Rodada,Jogo WHERE Rodada.campeonato = Campeonato.id AND Jogo.rodada = Rodada.id; 

--Tabela Campeonato
SELECT Time.nome,Tabela.vitoria,Tabela.empate, Tabela.Vitoria FROM Campeonato, Time,Tabela WHERE campeonato.id = Time.campeonato AND Time.id = Time.tabela;
