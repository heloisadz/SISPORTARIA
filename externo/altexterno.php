<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
    require_once('../conexao.php');


   $CPF = $_POST['CPF'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM externo where CPF= :CPF";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':CPF',$CPF, PDO::PARAM_STR);
   $retorno->bindParam(':motivo',$motivo, PDO::PARAM_STR);
   $retorno->bindParam(':nome',$nome, PDO::PARAM_STR);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $motivo = $array_retorno['motivo'];
   $CPF = $array_retorno['CPF'];
   
?>

  <form method="POST" action="crudexterno.php">
        <label for="">nome</label>
        <input type="text" name="nome" id="" value=<?php echo $nome?> required >
        <label for="">motivo</label>                                        
        <input type="text" name="motivo" id="" required value=<?php echo $motivo?>  >
        <label for="">CPF</label>
        <input type="text" name="CPF" id="" value=<?php echo $CPF ?> required >
        
        <input type="submit" name="update" value="Alterar">
  </form>
</body>
</html>