<?php
	
	/*Este arquivo lhe mostra as opções disponíveis na lateral esquida do arquivo e a abri
	 em um iframe no mesma tela*/
	
	//Inclui cabeçalho na página
	include_once '../_model/_bancodedados/modelBancodeDados.php';

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

	<title>Escolha seu Time</title>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
                    <a href="viewEquipe.php" target="janela">
                        IFSPFOOT
                    </a>
                </li>
                       
            		<li><a href="viewMenuEscolhaTime.php" target="janela">Escolher Time</a></li>
            		
            		<li><a href="../_model/modelIniciarJogo.php">Iniciar</a></li>
        
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
							<iframe class="embed-responsive-item" src="viewMenuEscolhaTime.php" name="janela" id="framePrincipal"></iframe>
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