<?php

require('../../../../conexao.php');

$queryEndereco = "SELECT * FROM `endereco`";
$stmt = $pdo->query($queryEndereco);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);