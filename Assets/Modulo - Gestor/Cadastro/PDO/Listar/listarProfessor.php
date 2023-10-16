<?php

require('../../../../conexao.php');

$queryProfessor = "SELECT `id_professor`, `nome_professor` FROM `professor`";
$stmt = $pdo->query($queryProfessor);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);