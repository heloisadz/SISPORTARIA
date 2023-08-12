
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
    <link rel="stylesheet" href="crudaluno.css">
    <title>CRUD Aluno</title>
</head>
<body>


<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nome = $_GET["nome"];
        $matricula = $_GET["matricula"];
        $CPF = $_GET["CPF"];
        $interno = $_GET["interno"];
        $autorizado = $_GET["autorizado"];
        $CPF_Resp = $_GET["CPF_Resp"];

        ##codigo SQL
        $sql = "INSERT INTO aluno(nome, matricula, interno, autorizado, CPF, CPF_Resp ) 
                VALUES('$nome','$matricula','$interno', '$autorizado', '$CPF', '$CPF_Resp')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <p><strong>OK!</strong> o aluno
                $nome foi Incluido com sucesso!!!</p>"; 
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
    $matricula = $_GET['matricula'];
    
    $sql = "DELETE FROM aluno WHERE matricula = :matricula";
    
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':matricula', $matricula, PDO::PARAM_STR);
    
    try {
        $stmt->execute();
        echo "<p><strong>OK!</strong> O aluno com matrícula $matricula foi excluído.</p>"; 
        echo "<button class='button'><a href='listadisc.php'>Voltar</a></button>";
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

        
?>

</body>
</html>




