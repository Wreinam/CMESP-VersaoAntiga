<?php
try {
    require('../../../../conexao.php');
    $total_aluno_chamada = $_POST["total_aluno_chamada"];

    $id_turma = $_POST["id_turma"];
    date_default_timezone_set('America/Sao_Paulo');
    $dataHoje = date("d/m/Y");
    $query = "INSERT INTO `lista_chamada` (`data`, `status`, `id_turma`) 
    VALUES (:data, 'Efetuada', :id_turma)";


    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':data', $dataHoje, PDO::PARAM_STR);
    $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $stmt->execute();
    $id_lista_chamada = $pdo->lastInsertId();

    for ($i = 1; $i <= $total_aluno_chamada; $i++) {
        $id_matricula_atual = $_POST['id_matricula' . $i];

        if (isset($_POST['presenca' . $i])) {
            $presenca = $_POST['presenca' . $i];
        } else {
            $presenca = "Faltou";
            $query = "UPDATE matricula
            SET quant_faltas = (SELECT quant_faltas + 1 FROM matricula WHERE id_matricula = :id_matricula)
            WHERE id_matricula = :id_matricula";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id_matricula', $id_matricula_atual, PDO::PARAM_INT);
            $stmt->execute();
        }

        $query = "INSERT INTO `presenca_alunos` (`id_lista_chamada`, `id_matricula`, `presenca`) 
        VALUES (:id_lista_chamada, :id_matricula, :presenca)";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_lista_chamada', $id_lista_chamada, PDO::PARAM_INT);
        $stmt->bindParam(':id_matricula', $id_matricula_atual, PDO::PARAM_INT);
        $stmt->bindParam(':presenca', $presenca, PDO::PARAM_STR);
        $stmt->execute();
    }
    echo "Sucesso";
} catch (PDOException $e) {
    echo "Erro na tentativa" . $e;
}
