<?php 

//Inclusão do arquivo para conexão com o banco de dados PDO
include_once '_model/_bancodedados/modelBancodeDados.php';


$jogadoresTimeCasa = array();

$idTimeCasa = 3;

//Obtendo jogadores do time da casa
$consultaJogadoresTimeCasa = 'SELECT id FROM Jogador WHERE idTime = ?';
$preparaConsultaJogadoresTimeCasa = $conn->prepare($consultaJogadoresTimeCasa);
$preparaConsultaJogadoresTimeCasa->bindValue(1, $idTimeCasa);
$preparaConsultaJogadoresTimeCasa->execute();

$result = $preparaConsultaJogadoresTimeCasa->setFetchMode(PDO::FETCH_NUM);
while ($row = $preparaConsultaJogadoresTimeCasa->fetch()) {
		
	$jogadoresTimeCasa[] = $row[0];

}

foreach ($jogadoresTimeCasa as &$value) {
	echo $value;
}
echo "<br><p>";

$inicioGolCasa=0;
$inicioGolVisitante=0;
$golCasa = 10;

while($inicioGolCasa < $golCasa ) {
	$quantidadeGolJogadorTimeCasa = 0;
		
	$recebeIndexArrayJogadorTimeCasa = array_rand($jogadoresTimeCasa, 1);
	echo $quemFezGolTimeCasa = $jogadoresTimeCasa[$recebeIndexArrayJogadorTimeCasa];
		
	//Obtendo jogadores do time casa
	$consultaGolJogadoresTimeCasa = 'SELECT gol FROM Jogador WHERE id = ?';
	$preparaConsultaGolJogadoresTimeCasa = $conn->prepare($consultaGolJogadoresTimeCasa);
	$preparaConsultaGolJogadoresTimeCasa->bindValue(1, $quemFezGolTimeCasa);
	$preparaConsultaGolJogadoresTimeCasa->execute();
		
	$result = $preparaConsultaGolJogadoresTimeCasa->setFetchMode(PDO::FETCH_NUM);
	while ($row = $preparaConsultaGolJogadoresTimeCasa->fetch()) {
			
		$quantidadeGolJogadorTimeCasa = $row[0];
			
	}
	$quantidadeGolJogadorTimeCasa++;
		
	$atualizaGolJogadoresTimeCasa = 'UPDATE Jogador SET  gol=? WHERE id = ?';
	$preparaAtualizaGolJogadoresTimeCasa = $conn->prepare($atualizaGolJogadoresTimeCasa);
	$preparaAtualizaGolJogadoresTimeCasa ->bindValue(1,$quantidadeGolJogadorTimeCasa);
	$preparaAtualizaGolJogadoresTimeCasa ->bindValue(2,$quemFezGolTimeCasa);
	$preparaAtualizaGolJogadoresTimeCasa ->execute();
		
	$inicioGolCasa++;
}
unset($jogadoresTimeCasa);



?>