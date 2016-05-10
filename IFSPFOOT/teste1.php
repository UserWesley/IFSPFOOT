<?php 
//Inclusão do arquivo para conexão com o banco de dados PDO
include_once '_model/_bancodedados/modelBancodeDados.php';


extract($_POST);


echo "Nome: $nome, Mail: $mail";
$insercaoNovoCampeonato = "INSERT INTO Campeonato VALUES (9,'$nome','1', '2016',NULL)";
$conn->exec($insercaoNovoCampeonato);


?>
