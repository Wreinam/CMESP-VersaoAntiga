<?php

require('../../../../conexao.php');

$queryModalidade = "SELECT * FROM `modalidade`";
$stmt = $pdo->query($queryModalidade);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);