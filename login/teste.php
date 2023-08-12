<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['CPF']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('../conexao.php');
        $cpf = $_POST['CPF'];
        $senha = $_POST['senha'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM funcionario WHERE CPF = '$cpf' and senha = '$senha'";

        $result = $conexao->prepare($sql);
        $result->execute();
        if($result->fetchall()){
            $_SESSION['cpf'] = $cpf;
            header('Location: ../index.php');
        }
        else{
            header('Location: login.php');
        }
        // print_r($sql);
        // print_r($result);

    }
?>