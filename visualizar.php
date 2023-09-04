<?php
    require_once "src/funcoes.php";

$listaDeAlunos = lerAlunos($conexao);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<style>
        *{box-sizing: border-box;}

        .alunos{
            font-family: 'Segoe UI';
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            width: 80%;
            margin: auto;
        }

    </style>

<link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

    <?php foreach($listaDeAlunos AS $aluno){
        $media = mediaAluno($aluno["primeira"], $aluno["segunda"]);
        $situacao = situacaoAluno($media);
       ?>
       <div class="alunos"> 
        <ol  class="list-group m-3" >
            <li class="list-group-item" ><b>Nome: </b> <?=$aluno["nome"]?></li>
            <li class="list-group-item" ><b>Nota1: </b><?=$aluno["primeira"]?></li>
            <li class="list-group-item"><b>Nota2: </b><?=$aluno["segunda"]?></li>
            <li class="list-group-item"><a href="atualizar.php?id=<?=$aluno["id"]?>">Atualizar</a></li>
            <li class="list-group-item"><a class="excluir" href="excluir.php?id=<?=$aluno["id"]?>">excluir</a></li>
            <li class="list-group-item"><?=$media?></li>
            <li class="list-group-item"><?=$situacao?></li>
        </ol> 

        <hr>
        
</div>

<?php } ?>


   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.



Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->


    <p><a href="index.php">Voltar ao início</a></p>


<script src="js/confirma-exclusao.js" ></script>

</body>
</html>