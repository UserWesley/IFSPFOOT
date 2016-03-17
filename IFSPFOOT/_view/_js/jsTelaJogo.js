function move() {
	
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 50);
    
    function frame() {
    	document.getElementById("tempo").innerHTML = 1;	
        if (width >= 100) {
            clearInterval(id);
            document.getElementById("tempo").innerHTML = "Fim";
        } else {
            width++;
            elem.style.width = width + '%';
            document.getElementById("label").innerHTML = width * 1;
            
            if(width > 45){
            	document.getElementById("tempo").innerHTML = 2;	
            }
        }
    }
}