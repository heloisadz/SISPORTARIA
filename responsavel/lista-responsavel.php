
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
  <link rel="stylesheet" href="teste.css">
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

   
  $retorno = $conexao->prepare('SELECT CPF_Resp,nome,email FROM responsavel  ');
  $retorno->execute();

?>       
<div class="container mt-3">
  <h2>Responsáveis de Alunos</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Nome</th>
        <th>CPF Responsável</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                    </tr>
                        <tr>
                           <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['CPF_Resp']?>  </td> 
                            <td> <?php echo $value['email']?>  </td> 
                            <td>
                               <form method="POST" action="altresponsavel.php">
                                        <input name="CPF" type="hidden" value="<?php echo $value['CPF_Resp'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>
                             </td> 
                            <td class="centrinho">
                             <form method="GET" action="crudresponsavel.php" onsubmit="return myFunction();">
    <input name="CPF_Resp" type="hidden" value="<?php echo $value['CPF_Resp'];?>"/>
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

