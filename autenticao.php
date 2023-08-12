<?php

    function autenticao(){
        if(!isset($_SESSION['cpf'])){
            header('Location: login/login.php');
            return;
        }
    }

    
?>