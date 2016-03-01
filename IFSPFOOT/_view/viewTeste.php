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

$consultaTime = 'SELECT nome,mascote,cor, dinheiro,torcida FROM Time WHERE dono = ? ';
$preparaConsultaTime = $conn->prepare($consultaTime);
$preparaConsultaTime->bindValue(1, 1);
$preparaConsultaTime->execute();

$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
while ($row = $preparaConsultaTime->fetch()) {
	print $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\t". $row[3] . "\t". $row[4] . "\n";
}



?>
