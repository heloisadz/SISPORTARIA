
<?php
    require('../autenticao.php');
    session_start();
    autenticao();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Alunos Cadastrados no Sistema</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

   <div class="container">
        <header><h2>Alunos Cadastrados no Sistema</h2></header>
        
        <main>
         
        <div class="vazio">
<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('../conexao.php');

   
  
  $retorno = $conexao->prepare('SELECT nome, matricula, interno, autorizado, CPF, CPF_Resp FROM aluno ORDER BY nome ASC');

  $retorno->execute();

?>       
<div class="container mt-3">

  <table class="table">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Matricula</th>
        <th>Interno</th>
        <th>Autorizado</th>
        <th>CPF</th>
        <th>CPF Responsável</th>
        <th></th>
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
                            <td>
                               <form method="POST" action="altexterno.php">
                                        <input name="CPF" type="hidden" value="<?php echo $value['CPF'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 
                            <td>
                             <form method="GET" action="crudaluno.php" onsubmit="return myFunction();">
    <input name="matricula" type="hidden" value="<?php echo $value['matricula'];?>"/>
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
</div>

     </div>

     <div class="botao2">
     <button class="botaovoltar"><a href="../index.php">voltar</a></button>
     </div>
     </div>


</body>
</html>