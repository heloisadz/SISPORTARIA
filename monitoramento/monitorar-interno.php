<?php
    require('../autenticao.php');
    session_start();
    autenticao();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="monitorar.css">
    <title>CADASTRO DISCIPLINA</title>
</head>
<body>

   <div class="container">
        <header><h2>SISTEMA DE MONITORAMENTO PORTARIA</h2></header>
        
        <main>
        <nav> 
        <a href="/interdisciplinar/index.php">INÍCIO</a> 
        <a href="/interdisciplinar/responsavel/cadastrar-responsavel.php">CADASTRAR RESPONSÁVEL</a>
            <a href="/interdisciplinar/responsavel/lista-responsavel.php">LISTA RESPONSÁVEIS</a>
            <a href="/interdisciplinar/aluno/cadastrar-aluno.php">CADASTRAR ALUNO</a>
            <a href="/interdisciplinar/aluno/lista-aluno.php">LISTA ALUNO</a>
            <a href="/interdisciplinar/funcionario/cadastrar-funcionario.php">CADASTRAR FUNCIONÁRIO</a>
            <a href="/interdisciplinar/funcionario/lista-funcionario.php">LISTA FUNCIONÁRIOS</a>
            <a href="/interdisciplinar/monitoramento/dados-residentes.php">DADOS RESIDENTES</a>
            <a href="/interdisciplinar/monitoramento/monitorar-interno.php">MONITORAR INTERNO</a>
            <a href="/interdisciplinar/monitoramento/historico-interno.php">REGISTRO ENTRADA/SAÍDA INTERNO</a>
            <a href="/interdisciplinar/monitoramento/monitorar-externo.php">MONITORAR EXTERNO</a>
            <a href="/interdisciplinar/monitoramento/historico-externo.php">REGISTRO ENTRADA/SAÍDA EXTERNO</a>
            <a href="/interdisciplinar/encomenda/cadastrar-encomenda.php">ENCOMENDAS</a>
            <a href="/interdisciplinar/encomenda/historico-encomenda.php">HISTÓRICO ENCOMENDAS</a>
            <a href="/interdisciplinar/externo/cadastrar-externo.php">CADASTRAR EXTERNO</a>
            <a href="/interdisciplinar/externo/lista-externo.php">HISTÓRICO EXTERNO</a>
        </nav>
        <div class="vazio">
        
  <form method="GET" action="crudinterno.php">


    <label for="">Nome </label>
     <input type="text" name="nome_interno" required maxlength="100">

     <label for="">ID Porteiro</label>
     <input type="text" name="id_funcionario" required > 

     <label for="">Horário Saída</label>
     <input type="time" name="horario_saida" required >

     <label for="">Data Saída</label>
     <input type="date" name="data_saida" required >

     <label for="">Horário Chegada</label>
     <input type="time" name="horario_chegada"  >

     <label for="">Data Chegada</label>
     <input type="date" name="data_chegada"  >

     <label for="">Motivo</label>
     <input type="text" name="motivo" required >


     <label for="">Autorizado?</label>
    <select name="autorizado" id="select">
    <option value="nao">Não Autorizado</option>
    <option value="autorizado">Autorizado</option>
   </select>

     <label for="">Matricula</label>
     <input type="text" name="matricula" required >
    


     <input type="submit" name="cadastrar" value="cadastrar" class="botao">
     
     </form>
     
     
     <div class="botao2">
     <button class="botaovoltar"><a href="../index.php">voltar</a></button>
     </div>
     </div>
     </div>

</body>
</html>