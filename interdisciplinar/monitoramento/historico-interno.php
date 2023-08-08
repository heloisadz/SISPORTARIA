
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

   
  $retorno = $conexao->prepare('SELECT id, nome_interno, id_funcionario,interno,horario_saida,data_saida,horario_chegada, data_chegada,motivo, autorizado, matricula  FROM monitoramento  ');
  $retorno->execute();

?>       
<div class="container mt-3">
  <h2>Histórico Entrada e Saída de Internos</h2>
  <table class="table">
    <thead>
      <tr>
      <th>ID</th>
        <th>Nome Interno</th>
        <th>ID Funcionário</th>
        <th>Horário Saída</th>
        <th>Data Saída</th>
        <th>Horário Chegada</th>
        <th>Data Chegada</th>
        <th>Motivo</th>
        <th>Autorização</th>
        <th>Matricula</th>
      </tr>
    </thead>
    <tbody>
    <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                    </tr>
                        <tr>
                        <td> <?php echo $value['id']?>  </td> 
                           <td> <?php echo $value['nome_interno']?>  </td> 
                            <td> <?php echo $value['id_funcionario']?>  </td> 
                            <td> <?php echo $value['horario_saida']?>  </td> 
                            <td> <?php echo $value['data_saida']?> </td>
                            <td> <?php echo $value['horario_chegada']?> </td>
                            <td> <?php echo $value['data_chegada']?>  </td>  
                            <td> <?php echo $value['motivo']?>  </td>  
                            <td> <?php echo $value['autorizado']?>  </td>
                            <td> <?php echo $value['matricula']?>  </td>    
                      </tr>
                    <?php  }  ?> 
                 </tr>      
      
    </tbody>
  </table>
</div>

</body>
</html>

