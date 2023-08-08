
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
    <link rel="stylesheet" href="cadastrar-funcionario.css">
    <title>CADASTRO DISCIPLINA</title>
</head>
<body>

   <div class="container">
        <header><h2>SISTEMA DE MONITORAMENTO PORTARIA</h2></header>
        
        <main>
        <nav> 
            <a href="/interdisciplinar/index.php">INÍCIO</a> 
            <a href="/interdisciplinar/aluno/cadastrar-aluno.php">CADASTRAR ALUNO</a>
            <a href="/interdisciplinar/aluno/lista-aluno.php">LISTA ALUNO</a>
            <a href="/interdisciplinar/funcionario/cadastrar-funcionario.php">CADASTRAR FUNCIONÁRIO</a>
            <a href="/interdisciplinar/funcionario/lista-funcionario.php">LISTA FUNCIONÁRIOS</a>
            <a href="/interdisciplinar/responsavel/cadastrar-responsavel.php">CADASTRAR RESPONSÁVEL</a>
            <a href="/interdisciplinar/responsavel/lista-responsavel.php">LISTA RESPONSÁVEIS</a>
            <a href="/interdisciplinar/chamada/chamada.php">CHAMADA</a>
            <a href="/interdisciplinar/monitoramento/dados-residentes.php">DADOS RESIDENTES</a>
            <a href="/interdisciplinar/monitoramento/monitorar-interno.php">MONITORAR INTERNO</a>
            <a href="/interdisciplinar/monitoramento/historico-interno.php">REGISTRO ENTRADA/SAÍDA INTERNO</a>
            <a href="/interdisciplinar/monitoramento/monitorar-externo.php">MONITORAR EXTERNO</a>
            <a href="/interdisciplinar/monitoramento/historico-interno.php">REGISTRO ENTRADA/SAÍDA EXTERNO</a>
            <a href="/interdisciplinar/encomenda/cadastrar-encomenda.php">ENCOMENDAS</a>
            <a href="/interdisciplinar/encomenda/historico-encomenda.php">HISTÓRICO ENCOMENDAS</a>
        </nav>
        <div class="vazio">
        
  <form method="GET" action="crudfuncionario.php">
    <label for="">Nome</label>
     <input type="text" name="nome" required maxlength="100">

     <label for="">CPF</label>
     <input type="text" name="CPF" required max="11"> 

     <label for="">funcao</label>
     <select name="funcao" id="select">
        <option value="Porteiro">Porteiro</option>
        <option value="Coordenador">Coordenador</option>
     </select>

     <label for="">Senha</label>
     <input type="password" name="senha" required maxlength="20">


     <input type="submit" name="cadastrar" value="cadastrar" class="botao">
     
     </form>
     
     
     <div class="botao2">
     <button class="botaovoltar"><a href="../index.php">voltar</a></button>
     </div>
     </div>
     </div>

</body>
</html>