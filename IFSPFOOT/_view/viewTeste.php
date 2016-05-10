<?php 
include_once '../_model/_bancodedados/modelBancodeDados.php';

/*
$nome = "b";

$sql = 'SELECT * FROM Login where usuario = ?';
$stm = $conn->prepare($sql);
$stm->bindValue(1, $nome);
$stm->execute();
$dados = $stm->fetchColumn(0);
echo $dados;
*/
/*
$sql1 = 'SELECT id FROM Time ORDER BY id desc';
$stm1 = $conn->query($sql1);
//$stm1->bindValue(1, $usuario);
//$stm1->execute();
$ultimoid = $stm1->fetchColumn(0);


echo $ultimoid + 1;
*/


/*
$consultaTime = 'SELECT nome,mascote,cor, dinheiro,torcida FROM Time WHERE dono = ? ';
$preparaConsultaTime = $conn->prepare($consultaTime);
$preparaConsultaTime->bindValue(1, 1);
$preparaConsultaTime->execute();


$row =$preparaConsultaTime->fetchAll();
print_r($row);
*/
/*
$consultaTime = 'SELECT nome,mascote,cor, dinheiro,torcida FROM Time WHERE dono = ? ';
$preparaConsultaTime = $conn->prepare($consultaTime);
$preparaConsultaTime->bindValue(1, 1);
$preparaConsultaTime->execute();


$row1 =$preparaConsultaTime->fetchColumn(3);
print("row1 = $row1\n");

$row1 =$preparaConsultaTime->fetchColumn(4);
print("name = $row1\n");
*/
/*
$consultaTime = 'SELECT nome,mascote,cor, dinheiro,torcida FROM Time WHERE dono = ? ';
$preparaConsultaTime = $conn->prepare($consultaTime);
$preparaConsultaTime->bindValue(1, 1);
$preparaConsultaTime->execute();

$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
while ($row = $preparaConsultaTime->fetch()) {
	print $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\t". $row[3] . "\t". $row[4] . "\n";
}

?>

<?php

$consultaJogador = 'SELECT * FROM Jogador WHERE idTime = ? ';
$preparaConsultaJogador = $conn->prepare($consultaJogador);
$preparaConsultaJogador->bindValue(1, $idTime);
$preparaConsultaJogador->execute();

$result = $preparaConsultaJogador->setFetchMode(PDO::FETCH_NUM);
while ($row = $preparaConsultaJogador->fetch()) {
	echo "id : ". $row[0] . "\t Nome : " . $row[1]  ;
	echo "\t Sobrenome : " . $row[2] . "\n Idade : ". $row[3] . "\t Forca : ". $row[4] . "\n";
}
*/

/*
 //Consulta Tabela time para pegar último id do time cadastrado, campo de autoincremento
$consultaUltimoIdTime = 'SELECT id FROM Time ORDER BY id DESC';
$preparaIdTime = $conn->query($consultaUltimoIdTime);
$ultimoIdTime = $preparaIdTime->fetchColumn(0);

//Pegando último time cadastrado para incrementar 1
$idInseriTime = $ultimoIdTime + 1;
*/
/*
try{

	$zerarTabelaJogador = "DELETE FROM Jogador;";
	$zerarTabelaJogo = "DELETE FROM Jogo ;";
	$zerarTabelaTime = "DELETE FROM Time ;";
	
	$conn->exec($zerarTabelaJogo);
	$conn->exec($zerarTabelaTime);
	$conn->exec($zerarTabelaJogador);
	echo "Limpas";

}catch(PDOException $e){

	echo $sql . "<br>" . $e->getMessage();
}

$dono = "1";

//Regra do Jogo
$dinheiroInicial = "10,00";
$torcidaInicial = "10";
$capacidade = "10";
$nomeTime="ds";
$nomeEstadio="ds";
$mascote="ds";
$cor="ds";

$insercaoNovoTime = "INSERT INTO Time VALUES (1,'$nomeTime','$mascote','$cor','$dono','$dinheiroInicial','$torcidaInicial','$nomeEstadio','$capacidade')";
$conn->exec($insercaoNovoTime);
*/

//ALTER TABLE Rodada ADD CONSTRAINT fk_idCampeonato FOREIGN KEY (campeonato) REFERENCES Campeonato (id);
//ALTER TABLE Orders DROP FOREIGN KEY fk_PerOrders

session_start();
echo $_SESSION['golCasa'];

/*
<script type="text/javascript">
var valor = window.innerWidth;
document.location.href = 'utiliza_numerojs.php?valor=' + valor;
</script>*/
/*
$.post('modelCadastrarPlacar.php',{
	gols : placar;
},function(){
	// ação quando for concluída a solicitação
})
*/
?>


