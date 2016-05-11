<?php 

//Definição e atribuição de variaveis
$golTime1 = 0;
$golTime2 = 0;
$oportunidadeTime1 = 0;
$oportunidadeTime2 = 0;
$oportunidadeEmpate = 0;
$valorGol = 0;

$barraGol1 = 10;
$barraGol2 = 10;


/*$torcidaTime1 = $_POST['numberTorcidaTime1'];
$torcidaTime2 = $_POST['numberTorcidaTime2'];
$estiloTime1= $_POST['selectEstiloTime1'];
$estiloTime2= $_POST['selectEstiloTime2'];
$jogoCasa = $_POST['radioCasa'];

if($torcidaTime1 > $torcidaTime2){
	
	$barraGol1--; 

}
elseif ($torcidaTime1 < $torcidaTime2){
	
	$barraGol2--;
}
else{}

if(jogoCasa == 1){
	
	$barraGol1--;
	
}
else {
	
	$barraGol2 --;
	
}
*/
$forcaTime1 = $_POST['numberForcaTime1'];
$forcaTime2 = $_POST['numberForcaTime2'];
$numeroExecucoes = $_POST['numberExecucao'];

$empate = $forcaTime1 + ($forcaTime1 + $forcaTime2);
$forcaMaxima =  $empate+$forcaTime2;

//Visualização dos dados
echo "<h4>Dados Iniciais : </h4><p>";
echo "<br>Forca Time 1:  ".$forcaTime1;
echo "<br>Empate : ".$empate;
echo "<br>Forca Time 2 : ".$forcaTime2;
echo "<p>Possibilidade Time 1 :  0 a ".$forcaTime1;
echo "<br>Possibilidade Empate :  ".$forcaTime1." a ".$empate;
echo "<br>Possibilidade Time 2 :  ".$empate." a ".$forcaMaxima;

//echo "<br>Torcidade Time 1 : ".$torcidaTime1;
//echo "<br>Torcidade Time 2 : ".$torcidaTime2;
//echo "<br>Casa : ".$jogoCasa;
echo "<br>Barra Gol 1 : ".$barraGol1;
echo "<br>Barra Gol 2 : ".$barraGol2;
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
		echo " Oportunidade : Time 1<br><hr></hr>";
		$valorGol = mt_rand(0,$barraGol1);
		if($valorGol == 5){
			$golTime1++;
		}
	}
	
	elseif($valor <= $empate) {
		$oportunidadeEmpate++;
		echo " Oportunidade : Empate<br><hr></hr>";
	}
	
	else {
		$oportunidadeTime2++;
		echo " Oportunidade : time2<br><hr></hr>";
		$valorGol = mt_rand(0,$barraGol2);
		if($valorGol == 5){
			$golTime2++;
		}
	}$x++;

}

//Exibindo resultado final
echo "<hr></hr><p><h3>Resultado Final</h3> ";
echo "<h4>Oportunidades Time 1 : ".$oportunidadeTime1;
echo "<br>Oportunidades Time 2 : ".$oportunidadeTime2;
echo "<br>Oportunidades Empate : ".$oportunidadeEmpate."</h4>";
echo "<br>Gol 1 : ".$golTime1;
echo "<br>Gol 2 : ".$golTime2;

?> 
