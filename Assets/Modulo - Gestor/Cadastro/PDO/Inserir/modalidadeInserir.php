<?php
require('../../../../conexao.php');
$nome = $_POST['nome'];

$queryModalidade = "INSERT INTO modalidade (nome_modalidade) VALUES (:nome)";
$stmt = $pdo->prepare($queryModalidade);
$stmt->bindParam(':nome', $nome);

if ($stmt->execute()) {
    echo json_encode("tudo certo");
} else {
    echo json_encode("Erro ao inserir a modalidade.");
}

