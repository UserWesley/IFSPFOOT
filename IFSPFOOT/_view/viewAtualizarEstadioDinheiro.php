<?php

        include_once '../_model/modelClassTime.php';
        include_once '../_model/modelClassProduto.php';
        include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
    
        //session_start();
  
        $desconto                  = $_SESSION['desconto'];
        $total_gastos              = $_SESSION['total'];
        $caixa                     = $_SESSION['caixa'];
        $quantidade                = $_SESSION['quantidade'];
        $idDono                    = $_SESSION['idDono'];


            if($caixa >= $total_gastos){
                 $conn = Database::conexao();
                 
                $buscarEstadioCampeonato = new modelClassProduto();
                $buscarEstadioCampeonato->acharIdDoEstadioPorCampeonato();
                $idEstadio = $buscarEstadioCampeonato->acharIdDoEstadioPorCampeonato();

               
                $atualizaCapacidade ="UPDATE estadio
                                      SET capacidade = '$quantidade' + (SELECT capacidade 
                                                                        FROM estadio
                                                                        WHERE id = '$idEstadio')
                                     WHERE id = '$idEstadio';";
		            $preparaAtualizarCapacidadeEstadio = $conn->prepare($atualizaCapacidade);					   
		  
		            $preparaAtualizarCapacidadeEstadio->execute();
		   
		            $result = $preparaAtualizarCapacidadeEstadio->setFetchMode(PDO::FETCH_ASSOC);
		   
                $gastos = parse_ini_string($total_gastos);
                  
                  $atualizarDinheiro = "UPDATE time
                                        SET dinheiro = '$desconto' 
                                        WHERE dono = (SELECT time.id
                                                        FROM time as time
                                                        WHERE time.id = time.campeonato);"; 
                $preparaAtualizarDinheiroDoClub = $conn->prepare($atualizarDinheiro);
                $preparaAtualizarDinheiroDoClub->execute();
                
                $retults = $preparaAtualizarDinheiroDoClub->setFetchMode(PDO::FETCH_ASSOC);
                echo "<script>
                            alert('Melhoria Comprada com sucesso'); location= 'viewComprarProduto.php';
                      </script>";
            }
            else{
                
                echo "<script>
                            alert('Não a dinheiro suficiente pra compra essa melhoria'); location= 'viewComprarProduto.php';
                      </script>";
		   
        }
?>