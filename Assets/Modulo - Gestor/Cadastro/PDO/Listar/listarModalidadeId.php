<?php 

require('../../../../conexao.php');

$id_modalidade = $_POST["id_modalidade"];
$queryModalidade = "SELECT * FROM `modalidade` WHERE id_modalidade = :id";

$stmt = $pdo->prepare($queryModalidade);
$stmt->bindParam(':id', $id_modalidade,PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);