
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
    <link rel="stylesheet" href="crudresponsavel.css">
    <title>CRUD Disciplina</title>
</head>
<body>


<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nome = $_GET["nome"];
        $CPF_Resp = $_GET["CPF_Resp"];
        $email = $_GET["email"];

        ##codigo SQL
        $sql = "INSERT INTO responsavel(CPF_Resp, nome, email ) 
                VALUES('$CPF_Resp', '$nome','$email')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <p><strong>OK!</strong> O responsável
                $nome foi Incluido com sucesso!!!</p>"; 
                echo " <button class='button'><a href='../index.php'>voltar</a></button>";
            }
        }
#######alterar
if(isset($_POST['update'])){


    ##dados recebidos pelo metodo POST
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
            
            echo " <p> <strong>OK!</strong> O responsável que possui CPF: 
            $CPF_Resp foi cadastrado!!!</p>"; 

            echo " <button class='button'><a href='../index.php'>voltar</a></button>";
        }

}        


##Excluir
if(isset($_GET['excluir'])){
    $CPF_Resp = $_GET['CPF_Resp'];
    $stmt =  $conexao->prepare("SELECT * FROM aluno where CPF_Resp = {$CPF_Resp}");
    $stmt->execute();

    if(!$stmt->fetchall()){
            
        $sql ="DELETE FROM `responsavel` WHERE CPF_Resp = {$CPF_Resp}";
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        if($stmt->execute())
            {
                echo "<p> <strong>OK!</strong> O responsável que possui CPF: 
                $CPF_Resp foi excluido!!!</p>"; 

                echo " <button class='button'><a href='listadisc.php'>voltar</a></button>";
            }
    }
    else{
        {
            echo "<p> <strong>OK!</strong> A disciplina
            $CPF_Resp não foi excluida!!!</p>"; 

            echo " <button class='button'><a href='listadisc.php'>voltar</a></button>";
        }
    }


}

        
?>

</body>
</html>




