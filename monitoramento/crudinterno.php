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
    
        
        $nome_interno = $_GET["nome_interno"];
        $id_funcionario = $_GET["id_funcionario"];
        $horario_saida = $_GET["horario_saida"];
        $data_saida = $_GET["data_saida"];
        $horario_chegada = $_GET["horario_chegada"];
        $data_chegada = $_GET["data_chegada"];
        $motivo = $_GET["motivo"];
        $autorizado = $_GET["autorizado"];
        $matricula = $_GET["matricula"];

        ##codigo SQL
        $sql = "INSERT INTO monitoramento(nome_interno, ID_funcionario, horario_saida, data_saida, horario_chegada, data_chegada, motivo, autorizado, matricula ) 
                VALUES('$nome_interno','$id_funcionario','$horario_saida', '$data_saida', '$horario_chegada', '$data_chegada','$motivo','$autorizado', '$matricula')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <p><strong>OK!</strong> o aluno
                $nome_interno foi Incluido com sucesso!!!</p>"; 
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
            echo " <p> <strong>OK!</strong> A disciplina
             $nomedisciplina foi Alterada com sucesso!!!</p>"; 

            echo " <button class='button'><a href='../index.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $id = $_GET['id'];
    $sql ="DELETE FROM `disciplina` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->execute())
        {
            echo "<p> <strong>OK!</strong> A disciplina
             $id foi excluida!!!</p>"; 

            echo " <button class='button'><a href='listadisc.php'>voltar</a></button>";
        }

}

        
?>

</body>
</html>