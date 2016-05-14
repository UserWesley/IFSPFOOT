<?php

	session_start();

	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	$donoTime = $_SESSION['idDono'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciamento do Time</title>

    <!-- Bootstrap Core CSS -->
    <link href="_bootstrap-3.3.6-dist/_css/bootstrap.min.css" rel="stylesheet">
    
     <!-- Arquivo de configuração do side-bar (Lateral Esquerda) -->
    <link href="_css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                   
				<a href="viewEquipe.php" target="janela">IFSPFOOT</a>                         
                    
                </li>
				
				<li><a href="viewArtilharia.php" target="janela">Artilharia</a></li>
			
				<li><a href="viewEstadio.php" target="janela">Estádio</a></li>
				
				<li><a href="viewEstrategia.php" target="janela">Estratégia</a></li>

				<li><a href="viewJogador.php" target="janela">Jogadores</a></li>
			
				<li><a href="viewJogos.php" target="janela">Jogos</a></li>
			
				<li><a href="viewRodada.php" target="janela">Rodadas</a></li>
						
				<li><a href="viewTabela.php" target="janela">Tabela</a></li>
				
				<li><a href="viewTime.php" target="janela">Times</a></li>
			
		    	<li><a href="../_controller/controllerPreparaJogo.php" >JOGAR</a></li>
		    	
		    	<li><a href="../_controller/controllerLogout.php">Sair</a></li>
								
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
                	<div class="row">
                    	<div class="col-lg-12">
   							<div class="embed-responsive embed-responsive-16by9">
   							
   							<!--  Iframe responsável por mostrar o conteúdo do arquivo selecionado -->
							<iframe class="embed-responsive-item" src="viewJogador.php" name="janela" id="framePrincipal"></iframe>	
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="_jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="_bootstrap-3.3.6-dist/_js/bootstrap.min.js"></script>

        <!-- Menu Toggle (Exibi ou some com o menu) -->
    <script>
    
    	$("#menu-toggle").click(function(e) {
        	e.preventDefault();
        	$("#wrapper").toggleClass("toggled");
   		});
   		
    </script>

</body>

</html>