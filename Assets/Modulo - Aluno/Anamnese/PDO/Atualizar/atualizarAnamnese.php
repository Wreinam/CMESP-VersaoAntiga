<?php

require('../../../../conexao.php');

session_start();
$id_inscricao = $_SESSION["id_inscricao"];
echo ($id_inscricao);
$cardiaco = $_POST["radio_cardiaco"];
$obs_cardiaco = $_POST["problemaCardiaco"];


// SQL para atualizar o item com base no ID
$sql = "UPDATE anamnese SET `cardiaco` = :cardiaco, `obs_cardiaco` = :obs_cardiaco WHERE id_inscricao = :id";
// Prepara a consulta
$stmt = $pdo->prepare($sql);
// Vincula os valores à consulta
$stmt->bindParam(':id', $id_inscricao, PDO::PARAM_INT);
$stmt->bindParam(':cardiaco', $cardiaco, PDO::PARAM_STR);
$stmt->bindParam(':obs_cardiaco', $obs_cardiaco, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo json_encode("tudo certo");
} else {
    echo json_encode("Erro ao inserir a turma.");
}