
<?php
    require('../autenticao.php');
    session_start();
    autenticao();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="chamada.css">
</head>
<body>
    
</body>
</html>

<form method="GET" action="crudencomenda.php">
<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('../conexao.php');

   
  $retorno = $conexao->prepare('SELECT nome, interno FROM aluno');
  $retorno->execute();

?>       


     <table class="table table-striped table-dark">
  <thead>
    
    <tr>
      <th scope="col">NOME</th>
      <th scope="col">Interno?</th>
      <th scope="col">Presente?</th>
    </tr>
  </thead>
  <tbody>
    <form action="crudchamada.php" method="get">
  
                    <?php foreach($retorno->fetchall() as $value) { ?>
                    </tr>
                        <tr>
                           <td> <?php echo $value['nome']?>  </td> 
                           <td> <?php echo $value['interno']?>  </td> 
                           <td><input type="checkbox" name="presente" id="radio"> </td> 
                       
                      </tr>


                      


                      
                    <?php  }  ?> 
                 </tr>
            </tbody>
            
</table>



    <label for="">Horário</label>
     <input type="time" name="horario" required >
<br>
     <label for="">Data Chegada</label>
     <input type="date" name="dataEncomenda" required >
    <br>
     <input type="submit" name="cadastrar" value="cadastrar" class="botao">

            </form>
<?php         
   echo "<button class='button3' id='voltar'><a href='../index.php'>voltar</a></button>  ";
?>
</div>
        
        
