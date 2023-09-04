<?php
require_once "src/funcoes.php";
$idAluno = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
excluirAluno($conexao, $idAluno);
header("location:visualizar.php");

?>