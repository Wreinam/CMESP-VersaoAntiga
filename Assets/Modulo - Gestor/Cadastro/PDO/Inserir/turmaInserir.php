<?php
require('../../../../conexao.php');

$id_modalidade = $_POST['id_modalidade'];
$id_professor = $_POST['id_professor'];
$id_endereco = $_POST['id_endereco'];
$quantidade_vagas = $_POST['quantidade_vagas'];
$nivel = $_POST['nivel'];
$dias_semana = $_POST['dias_semana'];
$horario_inicio = $_POST['horario_inicio'];
$horario_termino = $_POST['horario_termino'];


$queryTurma = "INSERT INTO `turma` (`id_modalidade`, `id_professor`, `id_endereco`, `quantidade_vagas`, `nivel`, `dias_semana`, `horario_inicio`, `horario_termino`) 
VALUES (:id_modalidade, :id_professor, :id_endereco, :quantidade_vagas, :nivel, :dias_semana, :horario_inicio, :horario_termino)";
$stmt = $pdo->prepare($queryTurma);
$stmt->bindParam(':id_modalidade', $id_modalidade);
$stmt->bindParam(':id_professor', $id_professor);
$stmt->bindParam(':id_endereco', $id_endereco);
$stmt->bindParam(':quantidade_vagas', $quantidade_vagas);
$stmt->bindParam(':nivel', $nivel);
$stmt->bindParam(':dias_semana', $dias_semana);
$stmt->bindParam(':horario_inicio', $horario_inicio);
$stmt->bindParam(':horario_termino', $horario_termino);

if ($stmt->execute()) {
    echo json_encode("tudo certo");
} else {
    echo json_encode("Erro ao inserir a turma.");
}
