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
   $nome_Externo = $array_retorno['nome_Externo'];
   $ID_funcionario = $array_retorno['ID_funcionario'];
   $CPF_Externo = $array_retorno['CPF_Externo'];
   $horario_saida = $array_retorno['horario_saida'];
   $data_saida = $array_retorno['data_saida'];
   $horario_chegada = $array_retorno['horario_chegada'];
   $data_chegada = $array_retorno['data_chegada'];
   $motivo = $array_retorno['motivo'];
?>

  <form method="POST" action="crudexterno.php">
        
    <label for="">Nome </label>
     <input type="text" name="nome_Externo" required maxlength="100">

     <label for="">CPF </label>
     <input type="text" name="CPF_Externo" required maxlength="11">

     <label for="">ID Porteiro</label>
     <input type="text" name="ID_funcionario" required > 

     <label for="">Horário Chegada</label>
     <input type="time" name="horario_chegada" required >

     <label for="">Data Chegada</label>
     <input type="date" name="data_chegada" required >

     <label for="">Horário Saída</label>
     <input type="time" name="horario_saida" required >

     <label for="">Data Saída</label>
     <input type="date" name="data_saida" required >

     <label for="">Motivo</label>
     <input type="text" name="motivo" required >
        
        <input type="submit" name="update" value="Alterar">
  </form>
</body>
</html>