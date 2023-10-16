<?php

require('../../../../conexao.php');

$id_modalidade = $_POST["id_modalidade"];
$novoNome = $_POST["nome_modalidade"];

// SQL para atualizar o item com base no ID
$sql = "UPDATE modalidade SET nome_modalidade = :nome WHERE id_modalidade = :id";

// Prepara a consulta
$stmt = $pdo->prepare($sql);

// Vincula os valores à consulta
$stmt->bindParam(':id', $id_modalidade, PDO::PARAM_INT);
$stmt->bindParam(':nome', $novoNome, PDO::PARAM_STR);

// Executa a consulta
$stmt->execute();
