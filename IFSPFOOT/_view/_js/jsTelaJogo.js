/*Este arquivo será responsável pelo avanço do progress bar, assim como atualizações na tabela*/

function move() {
	
	document.getElementById("idBotaoIniciar").style.visibility= "hidden";
	var elem = document.getElementById("myBar");
	var width = 1;
	var id = setInterval(frame, 1);
	var golCasa=0;
	var golVisitante=0;
	var placar = [0,0,0,0];
		    
	function frame() {
		
		document.getElementById("tempo").innerHTML = 1;	
		
		if (width >= 100) {
			
			clearInterval(id);
		    document.getElementById("tempo").innerHTML = "Fim";
		    document.getElementById("idBotaoContinuar").style.visibility= "visible";	
		            
		}
		
		else {
		
			width++;
			var i;
			
		    for(i=0;i<=1;i++){
		    
		    	var valor = Math.floor((Math.random() * 100) + 1);
		
		    	if(valor<=25){
					
		    		var chanceGol = Math.floor((Math.random() * 10) + 1);
				
					if(chanceGol==5){

						golCasa++;
						document.getElementById("golCasa"+i).innerHTML = golCasa;
						document.getElementById("lance"+i).innerHTML = "Gol do time Casa";
					
						if(i==0){
						
							placar[0] = golCasa;
						
						}
						else {
						
							placar[2] = golCasa;
						}
					}
				}
				else if(valor<=50){
					
					var chanceGol = Math.floor((Math.random() * 10) + 1);
					
					if(chanceGol==5){
					
						golVisitante++;
						document.getElementById("golVisitante"+i).innerHTML = golVisitante;
						document.getElementById("lance"+i).innerHTML = "Gol do time Visitante";
						
						if(i==0){
						
							placar[1] = golVisitante;
						}
						else {
							
							placar[3] = golVisitante;
						}
					}
				}
				else{
				
					if(valor<=70){
						
						document.getElementById("lance"+i).innerHTML = "Troca de Passes entre time da Casa";
					}
					else if(valor<=80){
					
						document.getElementById("lance"+i).innerHTML = "Troca de Passes entre time VIsitante";
					}
					else if(valor<=90){
						
						document.getElementById("lance"+i).innerHTML = "Lateral para time Casa";
					}
					else{
						
						document.getElementById("lance"+i).innerHTML = "Lateral para time VIsitante";
					}
				}

          	}
		    
            elem.style.width = width + '%';
            document.getElementById("label").innerHTML = width * 1;
		            
            if(width > 45){
            
            	document.getElementById("tempo").innerHTML = 2;	
            }
        }
   }
}