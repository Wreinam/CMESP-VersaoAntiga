<?php

require('../../../../conexao.php');

require('../../../../conexao.php');
$id_endereco = $_POST["id_endereco"];  // Substitua pelo ID do item que deseja excluir

// Verifica se a tabela principal está usando o item da tabela auxiliar
$stmt = $pdo->prepare("SELECT COUNT(*) FROM turma WHERE turma.id_endereco = :id_endereco;");
$stmt->bindParam(':id_endereco', $id_endereco, PDO::PARAM_INT);
$stmt->execute();

$num_usos = $stmt->fetchColumn();

if ($num_usos == 0) {
    // Não há uso na tabela principal, então podemos excluir
    $stmt = $pdo->prepare("DELETE FROM endereco WHERE id_endereco = :id");
    $stmt->bindParam(':id', $id_endereco, PDO::PARAM_INT);
    $stmt->execute();
} else {
    echo "false";
}