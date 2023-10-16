<?php

require('../../../../conexao.php');
$id_professor = $_POST["id_professor"];  // Substitua pelo ID do item que deseja excluir

// Verifica se a tabela principal está usando o item da tabela auxiliar
$stmt = $pdo->prepare("SELECT COUNT(*) FROM turma WHERE turma.id_professor = :id_professor;");
$stmt->bindParam(':id_professor', $id_professor, PDO::PARAM_INT);
$stmt->execute();

$num_usos = $stmt->fetchColumn();

if ($num_usos == 0) {
    // Não há uso na tabela principal, então podemos excluir
    $stmt = $pdo->prepare("DELETE FROM professor WHERE id_professor = :id");
    $stmt->bindParam(':id', $id_professor, PDO::PARAM_INT);
    $stmt->execute();
} else {
    echo "false";
}