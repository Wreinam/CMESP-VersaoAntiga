<?php

require('../../../../conexao.php');
try {
    session_start();
    $id_inscricao = $_SESSION["id_inscricao"];
    $query = "SELECT id_matricula, quant_faltas, `status`, nivel, horario_inicio, horario_termino, 
    dias_semana, nome_modalidade, turma.id_turma, rua, nome_local FROM matricula INNER JOIN turma ON turma.id_turma = matricula.id_turma 
    INNER JOIN modalidade ON turma.id_modalidade = modalidade.id_modalidade INNER JOIN endereco ON 
    turma.id_endereco = endereco.id_endereco WHERE id_aluno = :id_aluno;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_aluno', $id_inscricao, PDO::PARAM_INT);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
