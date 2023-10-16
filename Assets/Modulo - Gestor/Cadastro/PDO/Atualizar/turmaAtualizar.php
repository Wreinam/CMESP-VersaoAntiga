<?php

require('../../../../conexao.php');

  // Obtém o ID da turma do formulário
  $id_turma = $_POST["id_turma"];
    
  // Outras variáveis do formulário
  $id_modalidade = $_POST["id_modalidade"];
  $id_professor = $_POST["id_professor"];
  $id_endereco = $_POST["id_endereco"];
  $nivel = $_POST["nivel"];
  $dias_semana = $_POST["dias_semana"];
  $horario_inicio = $_POST["horario_inicio"];
  $horario_termino = $_POST["horario_termino"];

// SQL para atualizar o item com base no ID
$sql = "UPDATE turma SET id_modalidade = :id_modalidade, id_professor = :id_professor, id_endereco = :id_endereco,
nivel = :nivel, dias_semana = :dias_semana, horario_inicio = :horario_inicio, horario_termino = :horario_termino
 WHERE id_turma = :id";

// Prepara a consulta
$stmt = $pdo->prepare($sql);

// Associa os valores às variáveis da consulta
$stmt->bindParam(':id', $id_turma, PDO::PARAM_INT);
$stmt->bindParam(':id_modalidade', $id_modalidade, PDO::PARAM_INT);
$stmt->bindParam(':id_professor', $id_professor, PDO::PARAM_INT);
$stmt->bindParam(':id_endereco', $id_endereco, PDO::PARAM_INT);
$stmt->bindParam(':nivel', $nivel, PDO::PARAM_STR);
$stmt->bindParam(':dias_semana', $dias_semana, PDO::PARAM_STR);
$stmt->bindParam(':horario_inicio', $horario_inicio, PDO::PARAM_STR);
$stmt->bindParam(':horario_termino', $horario_termino, PDO::PARAM_STR);

// Executa a consulta
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "Turma atualizada com sucesso.";
} else {
    echo "Nenhuma turma foi atualizada. Verifique o ID da turma.";
}
