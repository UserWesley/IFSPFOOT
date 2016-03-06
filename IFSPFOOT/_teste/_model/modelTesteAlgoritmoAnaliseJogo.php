<?php 

//Definição e atribuição de variaveis
$oportunidadeTime1 = 0;
$oportunidadeTime2 = 0;
$oportunidadeEmpate = 0;
$forcaTime1 = $_POST['numberForcaTime1'];
$forcaTime2 = $_POST['numberForcaTime2'];
$numeroExecucoes = $_POST['numberExecucao'];
$empate = $forcaTime1 + ($forcaTime1 + $forcaTime2);
$forcaMaxima = $forcaTime2 + $empate;


//Visualização dos dados
echo "<h4>Dados Iniciais : </h4><p>";
echo "<br>Forca Time 1:  ".$forcaTime1;
echo "<br>Empate : ".$empate;
echo "<br>Forca Time 2 : ".$forcaTime2;
echo "<p>Possibilidade Time 1 :  0 a ".$forcaTime1;
echo "<br>Possibilidade Empate :  ".$forcaTime1." a ".$empate;
echo "<br>Possibilidade Time 2 :  ".$empate." a ".$forcaMaxima;

echo "<p><hr></hr>";

//Visualização da depuração
echo "<h4>Depuração :</h4> <p>";
$x = 0;
while($x != $numeroExecucoes){
	
	echo "<h5>Linha ".$x." 	- ";
	
	if($_POST['selectFuncao'] == 2){
		$valor = rand(0,$forcaMaxima);
	}
	else {
		$valor = mt_rand(0,$forcaMaxima);
	}
	
	echo "Valor :".$valor."  | ";

	if($valor <= $forcaTime1){
		$oportunidadeTime1++ ;
		echo " Oportunidade : Time 1<br>";
	}
	
	elseif($valor <= $empate) {
		$oportunidadeEmpate++;
		echo " Oportunidade : Empate<br>";
	}
	
	else {
		$oportunidadeTime2++;
		echo " Oportunidade : time2<br>";
	}$x++;

}

//Exibindo resultado final
echo "<hr></hr><p><h3>Resultado Final</h3> ";
echo "<h4>Oportunidades Time 1 : ".$oportunidadeTime1;
echo "<br>Oportunidades Time 2 : ".$oportunidadeTime2;
echo "<br>Oportunidades Empate : ".$oportunidadeEmpate."</h4>";

?> 
