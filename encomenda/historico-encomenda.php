
<?php
    require('../autenticao.php');
    session_start();
    autenticao();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('../conexao.php');

   
  $retorno = $conexao->prepare('SELECT codEncomenda, remetente, horario, dataEncomenda FROM encomenda  ');
  $retorno->execute();

?>       
<div class="container mt-3">
  <h2>Histórico de Encomendas Recebidas</h2>
  <table class="table">
    <thead>
      <tr>
        
        <th>CÓDIGO ENCOMENDA</th>
        <th>REMETENTE</th>
        <th>HORÁRIO</th>
        <th>DATA ENCOMENDA</th>
        <th> </th>
        
      </tr>
    </thead>
    <tbody>
    <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                    </tr>
                        <tr>
                        
                           <td> <?php echo $value['codEncomenda']?>  </td> 
                            <td> <?php echo $value['remetente']?> </td>
                            <td> <?php echo $value['horario']?>  </td>
                            <td> <?php echo $value['dataEncomenda']?>  </td>
                            <td>
                               <form method="POST" action="altencomenda.php">
                                        <input name="CPF" type="hidden" value="<?php echo $value['codEncomenda'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 
                            <td>
                             <form method="GET" action="crudencomenda.php" onsubmit="return myFunction();">
    <input name="codEncomenda" type="hidden" value="<?php echo $value['codEncomenda'];?>"/>
    <html>
    <script>
        function myFunction() {
            var r = confirm("Pressione o botão OK ou Cancelar");
            if (r == true) {
                // O usuário pressionou OK, prosseguir com o envio do formulário (excluir aluno)
                return true;
            } else {
                // O usuário pressionou Cancelar, cancelar o envio do formulário (aluno não será excluído)
                return false;
            }
        }
    </script>
    <button name="excluir" type="submit" class="botaoexcluir">Excluir</button>
</form>

                             </td> 



                            





                      </tr>
                    <?php  }  ?> 
                 </tr>      
      
    </tbody>
  </table>
  <div class="botao2">
     <button class="botaovoltar"><a href="../index.php">voltar</a></button>
     </div>
</div>

</body>
</html>

