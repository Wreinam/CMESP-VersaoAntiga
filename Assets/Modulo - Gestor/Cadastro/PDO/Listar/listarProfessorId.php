<?php 

require('../../../../conexao.php');

$id_professor = $_POST["id_professor"];
$queryProfessor = "SELECT * FROM `professor` WHERE id_professor = :id";

$stmt = $pdo->prepare($queryProfessor);
$stmt->bindParam(':id', $id_professor,PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);