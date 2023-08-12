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
    <link rel="stylesheet" href="crudinterno.css">
    <title>CRUD Aluno</title>
</head>
<body>


<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
    
        
        $nome_Externo = $_GET["nome_Externo"];
        $ID_funcionario = $_GET["ID_funcionario"];
        $CPF_Externo = $_GET["CPF_Externo"];
        $horario_saida = $_GET["horario_saida"];
        $data_saida = $_GET["data_saida"];
        $horario_chegada = $_GET["horario_chegada"];
        $data_chegada = $_GET["data_chegada"];
        $motivo = $_GET["motivo"];
        
       

        ##codigo SQL
        $sql = "INSERT INTO monitoramento(nome_Externo, CPF_Externo, ID_funcionario, horario_saida, data_saida, horario_chegada, data_chegada, motivo ) 
                VALUES('$nome_Externo','$ID_funcionario', '$ID_funcionario','$horario_saida', '$data_saida', '$horario_chegada', '$data_chegada','$motivo')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo "<p> <strong>OK!</strong> O monitoramento do externo de CPF número
                $CPF_Externo foi cadastrado!!!</p>"; 
                echo " <button class='button'><a href='../index.php'>voltar</a></button>";
            }
        }
#######alterar
if(isset($_POST['update'])){


    ##dados recebidos pelo metodo POST
    $id=  $_POST["id"];
    $nomedisciplina = $_POST["nomedisciplina"];
    //$ch = $_POST["ch"];
    //$semestre = $_POST["semestre"];
    
    
   
      ##codigo sql
    $sql = "UPDATE  disciplina SET nomedisciplina= :nomedisciplina, ch= :ch, semestre= :semestre ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nomedisciplina',$nomedisciplina, PDO::PARAM_STR);
    $stmt->bindParam(':ch',$ch, PDO::PARAM_STR);
    $stmt->bindParam(':semestre',$semestre, PDO::PARAM_STR);
    
    $stmt->execute();
 


    if($stmt->execute())
        {
            echo "<p> <strong>OK!</strong> O monitoramento do externo de CPF número
             $CPF_Externo foi alterado!!!</p>";  

            echo " <button class='button'><a href='../index.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $CPF_Externo = $_GET['CPF_Externo'];
    $sql ="DELETE FROM `disciplina` WHERE CPF_Externo={$CPF_Externo}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo "<p> <strong>OK!</strong> O monitoramento do externo de CPF número
             $CPF_Externo foi excluido!!!</p>"; 

            echo " <button class='button'><a href='listadisc.php'>voltar</a></button>";
        }

}

        
?>

</body>
</html>