<?php

require('../../../../conexao.php');
session_start();
$id_inscricao = $_SESSION["id_inscricao"];
$cardiaco = $_POST["radio_cardiaco"];
$problemaCardiaco = $_POST["problemaCardiaco"];

$queryAnamnese = "INSERT INTO anamnese (`id_inscricao`,`cardiaco`,`obs_cardiaco`) 
VALUES (:id_inscricao,:cardiaco,:obs_cardiaco)";
$stmt = $pdo->prepare($queryAnamnese);
$stmt->bindParam(':id_inscricao', $id_inscricao);
$stmt->bindParam(':cardiaco', $cardiaco);
$stmt->bindParam(':obs_cardiaco', $problemaCardiaco);

if ($stmt->execute()) {
    echo json_encode("tudo certo");
} else {
    echo json_encode("Erro ao inserir a modalidade.");
}
