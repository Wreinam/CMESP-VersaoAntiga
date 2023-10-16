<?php

require('../../../../conexao.php');

try {
    $queryBairro = "SELECT * FROM `bairro`";
    $stmt = $pdo->query($queryBairro);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);
}catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}