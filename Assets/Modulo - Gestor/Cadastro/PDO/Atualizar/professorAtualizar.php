<?php

require('../../../../conexao.php');

$id_professor = $_POST["id_professor"];
$novoNome = $_POST["nome_professor"];

// SQL para atualizar o item com base no ID
$sql = "UPDATE professor SET nome_professor = :nome WHERE id_professor = :id";

// Prepara a consulta
$stmt = $pdo->prepare($sql);

// Vincula os valores à consulta
$stmt->bindParam(':id', $id_professor, PDO::PARAM_INT);
$stmt->bindParam(':nome', $novoNome, PDO::PARAM_STR);

// Executa a consulta
$stmt->execute();