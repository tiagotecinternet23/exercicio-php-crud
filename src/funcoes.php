<?php
require_once "conecta.php";

function inserirAluno(PDO $conexao, string $nomeDoAluno, float $primeira, float $segunda):void {
    $sql = "INSERT INTO alunos(nome, primeira, segunda) VALUES (:nome, :primeira, :segunda)";

    try {
        $consulta = $conexao->prepare($sql);

        $consulta->bindValue(":nome", $nomeDoAluno, PDO::PARAM_STR);
        $consulta->bindValue(":primeira", $primeira, PDO::PARAM_STR);
        $consulta->bindValue(":segunda", $segunda, PDO::PARAM_STR);

        $consulta->execute();

    } catch(Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

function lerAlunos(PDO $conexao):array {
    $sql = "SELECT * FROM alunos ORDER BY nome";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }

    return $resultado;
}


function lerUmAluno(PDO $conexao, int $idAluno): array{
    $sql = "SELECT * FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idAluno, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro){
        die ("Erro ao carregar: " .$erro->getMessage());
    }
    
    return $resultado;
}

function atualizarAluno(PDO $conexao, string $nome, int $idAluno): void {
    $sql = "UPDATE alunos SET nome = :nome WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":id", $idAluno, PDO::PARAM_INT);
        $consulta->execute();
    } catch(Exception $erro){
        die("Erro ao atualizar: ".$erro->getMessage());
    }
}

function excluirAluno(PDO $conexao, int $idAluno): void{
    $sql = "DELETE FROM alunos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idAluno, PDO::PARAM_INT);
        $consulta->execute();

    } catch (Exception $erro){
        die("Erro ao excluir: ".$erro->getMessage());
    }
}