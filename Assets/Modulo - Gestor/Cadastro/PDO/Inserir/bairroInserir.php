<?php

require('../../../../conexao.php');
$nomeBairro = $_POST['nomeBairro'];

$queryBairro = "INSERT INTO bairro (nome_bairro) VALUES (:nomeBairro)";
$stmt = $pdo->prepare($queryBairro);
$stmt->bindParam(':nomeBairro', $nomeBairro);

if ($stmt->execute()) {
    echo json_encode("tudo certo");
} else {
    echo json_encode("Erro ao inserir a modalidade.");
}