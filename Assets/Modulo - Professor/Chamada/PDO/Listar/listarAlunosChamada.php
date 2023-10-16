<?php
try {
    require('../../../../conexao.php');
    $id_turma = $_POST["id_turma"];
    $query = "SELECT id_matricula, nome_aluno, id_turma FROM `matricula` INNER JOIN iscricao_tab 
    ON iscricao_tab.id_inscricao = matricula.id_aluno WHERE id_turma = :id_turma;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $stmt->execute();

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);
} catch (PDOException $e) {
    echo "Erro na tentativa" . $e;
}
