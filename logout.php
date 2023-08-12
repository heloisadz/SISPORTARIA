<?php

    session_start();
    if(isset($_SESSION['cpf'])){
        session_destroy();
        unset($_SESSION['cpf']);
        header('Location: login/login.php');
    }


?>