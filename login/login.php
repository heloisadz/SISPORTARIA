<?php
    session_start();
    if(isset($_SESSION['cpf'])){
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header><h2>SISTEMA DE MONITORAMENTO PORTARIA</h2></header>
       
        <main>
        
    <div>
        <form action="teste.php" method="POST">
            <input type="text" name="CPF" placeholder="CPF">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
        </main>
        <footer><p>Desenvolvido por Ana Letícia, Dyjayny, Maria Heloisa e Thayná - 2BII</p></footer>
    </div>
</body>
</html>