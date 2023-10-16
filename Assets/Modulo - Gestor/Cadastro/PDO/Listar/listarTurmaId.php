<?php 

require('../../../../conexao.php');

$id_turma = $_POST["id_turma"];
$queryTurma = "SELECT * FROM `turma` WHERE id_turma = :id";

$stmt = $pdo->prepare($queryTurma);
$stmt->bindParam(':id', $id_turma,PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);