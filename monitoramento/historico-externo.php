
<?php
    require('../autenticao.php');
    session_start();
    autenticao();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Histórico Entrada e Saída Internos</title>
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

   
  $retorno = $conexao->prepare('SELECT nome_Externo, ID_funcionario,horario_saida,data_saida,horario_chegada, data_chegada,motivo FROM monitoramento  ');
  $retorno->execute();

?>       
<div class="container mt-3">
  <h2>Histórico Entrada e Saída de Externos</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nome Externo</th>
        <th>CPF Externo</th>
        <th>ID Funcionário</th>
        <th>Horário Saída</th>
        <th>Data Saída</th>
        <th>Horário Chegada</th>
        <th>Data Chegada</th>
        <th>Motivo</th>
        
      </tr>
    </thead>
    <tbody>
    <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                    </tr>
                        <tr>
                           <td> <?php echo $value['nome_Externo']?>  </td> 
                           <td> <?php echo $value['nome_Externo']?>  </td> 
                            <td> <?php echo $value['ID_funcionario']?>  </td> 
                            <td> <?php echo $value['horario_saida']?>  </td> 
                            <td> <?php echo $value['data_saida']?> </td>
                            <td> <?php echo $value['horario_chegada']?> </td>
                            <td> <?php echo $value['data_chegada']?>  </td>  
                            <td> <?php echo $value['motivo']?>  </td>  
                            
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

