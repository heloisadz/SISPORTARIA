
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

   
  $retorno = $conexao->prepare('SELECT id, nome, CPF, funcao, senha FROM funcionario  ');
  $retorno->execute();

?>       
<div class="container mt-3">
  <h2>Funcionários Cadastrados no Sitema</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Função</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                    </tr>
                        <tr>
                        <td> <?php echo $value['id']?>  </td> 
                           <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['CPF']?> </td>
                            <td> <?php echo $value['funcao']?>  </td>
                            <td>
                               <form method="POST" action="altexterno.php">
                                        <input name="CPF" type="hidden" value="<?php echo $value['CPF'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>
                             </td> 
                            <td>
                             <form method="GET" action="crudfuncionario.php" onsubmit="return myFunction();">
    <input name="matricula" type="hidden" value="<?php echo $value['CPF'];?>"/>
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
    <button name="excluir" type="submit">Excluir</button>
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

