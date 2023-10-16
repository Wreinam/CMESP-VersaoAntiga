<?php 

require('../../../../conexao.php');

$id_endereco = $_POST["id_endereco"];
$queryEndereco = "SELECT * FROM `endereco` WHERE id_endereco = :id";

$stmt = $pdo->prepare($queryEndereco);
$stmt->bindParam(':id', $id_endereco,PDO::PARAM_INT);
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);