
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

   
  $retorno = $conexao->prepare('SELECT nome,matricula,interno,autorizado,CPF,CPF_Resp FROM aluno WHERE interno="interno" ');
  $retorno->execute();

?>       
<div class="container mt-3">
  <h2>Alunos Internos</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Matricula</th>
        <th>Interno</th>
        <th>Autorizado</th>
        <th>CPF</th>
        <th>CPF Responsável</th>
      </tr>
    </thead>
    <tbody>
    <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                    </tr>
                        <tr>
                           <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['matricula']?>  </td> 
                            <td> <?php echo $value['interno']?>  </td> 
                            <td> <?php echo $value['autorizado']?> </td>
                            <td> <?php echo $value['CPF']?> </td>
                            <td> <?php echo $value['CPF_Resp']?>  </td>  
                            

                      </tr>
                    <?php  }  ?> 
                 </tr>      
      
    </tbody>
  </table>
</div>

</body>
</html>
