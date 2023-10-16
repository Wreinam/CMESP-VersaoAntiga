<?php

require('../../../../conexao.php');

$queryTurma = "SELECT `id_turma`, `quantidade_vagas`, `nivel`, `dias_semana`, `horario_inicio`, `horario_termino`, 
`nome_modalidade`, `nome_professor` FROM `turma` INNER JOIN modalidade ON turma.id_modalidade = modalidade.id_modalidade 
INNER JOIN professor ON turma.id_professor = professor.id_professor;";
$stmt = $pdo->query($queryTurma);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);