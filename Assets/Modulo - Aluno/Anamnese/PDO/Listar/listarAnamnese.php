<?php
require('../../../../conexao.php');
session_start();
$id_inscricao = $_SESSION["id_inscricao"];

$queryAnamnese = "SELECT * FROM `anamnese` WHERE `id_inscricao` = :id";
$stmt = $pdo->prepare($queryAnamnese);
$stmt->bindParam(':id', $id_inscricao,PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);