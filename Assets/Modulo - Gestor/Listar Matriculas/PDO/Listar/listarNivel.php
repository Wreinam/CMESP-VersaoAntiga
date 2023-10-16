<?php

require('../../../../conexao.php');

try {
    //Pega todos os dados e alunos matriculados em qualquer turma
    $query = "SELECT DISTINCT nivel FROM `turma` ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}