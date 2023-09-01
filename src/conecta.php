<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "crud_escola_leandro";

try {
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utfb8", $usuarioi, $senha
    );

    $conexao->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (Exception $erro){
    die("deu ruim:".$erro->getMessage());
}