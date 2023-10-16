<?php
require('../../../../conexao.php');
//Volta uma lista de enderços sem repetição por id de modalidade;
$id_modalidade = $_POST["id_modalidade"];
$queryBairro = "SELECT DISTINCT bairro FROM endereco
INNER JOIN turma ON turma.id_modalidade = :id_modalidade
WHERE endereco.id_endereco = turma.id_endereco;";

$stmt = $pdo->prepare($queryBairro);
$stmt->bindParam(':id_modalidade', $id_modalidade,PDO::PARAM_INT);
$stmt->execute();

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);