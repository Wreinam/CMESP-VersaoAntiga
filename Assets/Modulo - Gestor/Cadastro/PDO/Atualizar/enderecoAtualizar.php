<?php

require('../../../../conexao.php');

$id_endereco = $_POST["id_endereco"];
$novoBairro = $_POST["bairro"];
$novoRua = $_POST["rua"];
$novoNomeLocal = $_POST["nome_local"];

// SQL para atualizar o item com base no ID
$sql = "UPDATE endereco SET bairro = :bairro, rua = :rua, nome_local = :nome_local WHERE id_endereco = :id";

// Prepara a consulta
$stmt = $pdo->prepare($sql);

// Vincula os valores à consulta
$stmt->bindParam(':id', $id_endereco, PDO::PARAM_INT);
$stmt->bindParam(':bairro', $novoBairro, PDO::PARAM_STR);
$stmt->bindParam(':rua', $novoRua, PDO::PARAM_STR);
$stmt->bindParam(':nome_local', $novoNomeLocal, PDO::PARAM_STR);

// Executa a consulta
$stmt->execute();