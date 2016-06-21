<?php
      include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
      
      
      session_start();

      $donoTime = $_SESSION['idDono'];
      $_SESSION['donoTime'] = $donoTime;
      $idCampeonato = $_SESSION['IdCampeonato'];
      
      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }else{
               $_SESSION['carrinho'][$id] = 1;
            }
         }
          
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }
       
      }
       
       
?>
<!DOCTYPE html>
<html>
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="../../css/style.css" />
<title>Carinho</title>
<!-- Visualização Mobile" -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Incluindo Bootstrap CSS -->
  <link href="_bootstrap-3.3.6-dist/_css/bootstrap.min.css" rel="stylesheet" media="screen">
  
  <!-- Incluindo Bootstrap JavaScript-->
  <script src="_bootstrap-3.3.6-dist/_js/bootstrap.min.js"></script>
  
  <!-- Incluindo jquery-->
  <script src="_jquery/jquery.js"></script>
</head>
 
<body>
        <script type='text/javascript'>
        function confirmarCompra(){
           if(confirm('Confirmar Compra? Click "OK" to proceed.')) {
                        location.href="viewAtualizarEstadioDinheiro.php";
              }else{
                 location.href="carrinho.php"; 
              }
            }
      </script>
<div id="gp2">
<table>
    <caption>Carrinho de Compras</caption>
    <thead>
          <tr>
            <th width="244">Produto</th>
            <th width="79">Quantidade</th>
            <th width="89">Pre&ccedil;o</th>
            <th width="100">SubTotal</th>
            <th width="64">Remover</th>
          </tr>
    </thead>
            <form action="?acao=up" method="post">
    <tfoot>
           <tr>
            <td colspan="5"><input type="submit" value="Atualizar Carrinho" /></td>
            <tr>
            <td colspan="5"><a href="viewComprarProduto.php">Continuar Comprando</a></td>
            <tr>
            <td colspan="5"><a href="viewEstadio.php">Voltar</a></td>
            <tr>
            <td colspan="5"><input type="button" value="Finalizar Compras" class="botao"  
                              onclick="location.href='javascript:confirmarCompra()';" /></td>

    </tfoot> 
    <tbody>
               <?php
                	
                     if(count($_SESSION['carrinho']) == 0){
                        echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                     }else{

                                                               $total = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                              $conn = Database::conexao();
                              $buscarProdutoCarrinho   = "SELECT p.*, 
                                                                 t.dinheiro 
                                                          FROM produtos as p
                                                              ,time as t 
                                                          WHERE p.id = '$id'
                                                          AND   t.dono = '$donoTime'
                              								AND t.campeonato = $idCampeonato";
                              $preparaBuscarProdutoCarrinho = $conn->prepare($buscarProdutoCarrinho);
                              $preparaBuscarProdutoCarrinho->execute();

                              $result = $preparaBuscarProdutoCarrinho->setFetchMode(PDO::FETCH_ASSOC);

                              $ln = $preparaBuscarProdutoCarrinho->fetch();                   
                            

                              $nome  = $ln['nome'];
                              $preco = number_format($ln['preco'], 2, ',', '.');
                              $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');
                              $caixa = $ln['dinheiro'];
                              
                              $_SESSION['caixa'] = $caixa;


                              $total    += $ln['preco'] * $qtd;
                             
                              //$caixa    += $ln['dinheiro'];

                              $desconto  = $ln['dinheiro'] - $total;
                             
                              $_SESSION['total'] = $total;
                              $_SESSION['desconto'] = $desconto;
                              $_SESSION['quantidade'] = $qtd;

                           echo '<tr>       
                                 <td>'.$nome.'</td>
                                 <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
                                 <td>IF$:'.$preco.'</td>
                                 <td>IF$:'.$sub.'</td>
                                 <td><a href="?acao=del&id='.$id.'">Remove</a></td>
                                 </tr>';
                        }
                            $total = number_format($total, 2, ',', '.');
                              echo '<tr>
                                    <td colspan="4">Total</td>
                                    <td>IF$:'.$total.'</td>
                                    </tr>';

                          
                            $caixa = number_format($caixa, 2, ',', '.');
                              echo '<tr>
                                    <td colspan="4">caixa</td>
                                    <td>IF$:'.$caixa.'</td>
                              </tr>';

                            $desconto = number_format($desconto, 2, ',', '.');
                              echo '<tr>
                                    <td colspan="4">Desconto</td>
                                    <td>IF$:'.$desconto.'</td>
                                    </tr>';       
                            
                     }

                   
                         
               ?>
    
     </tbody>
        </form>
</table>
</div>
</body>
</html>