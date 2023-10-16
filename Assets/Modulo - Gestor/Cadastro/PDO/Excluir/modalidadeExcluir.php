<?php
require('../../../../conexao.php');
$id_modalidade = $_POST["id_modalidade"];  // Substitua pelo ID do item que deseja excluir

// Verifica se a tabela principal está usando o item da tabela auxiliar
$stmt = $pdo->prepare("SELECT COUNT(*) FROM turma WHERE turma.id_modalidade = :id_modalidade;");
$stmt->bindParam(':id_modalidade', $id_modalidade, PDO::PARAM_INT);
$stmt->execute();

$num_usos = $stmt->fetchColumn();

if ($num_usos == 0) {
    // Não há uso na tabela principal, então podemos excluir
    $stmt = $pdo->prepare("DELETE FROM modalidade WHERE id_modalidade = :id");
    $stmt->bindParam(':id', $id_modalidade, PDO::PARAM_INT);
    $stmt->execute();
} else {
    echo "false";
}