<?php
try {
    require('../../../../conexao.php');
    $id_matricula = $_POST["id_matricula"];
    $query = "SELECT iscricao_tab.*, anamnese.* FROM matricula INNER JOIN iscricao_tab 
    ON iscricao_tab.id_inscricao = matricula.id_aluno INNER JOIN anamnese 
    ON anamnese.id_inscricao = matricula.id_aluno WHERE matricula.id_matricula = :id_matricula";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_matricula', $id_matricula, PDO::PARAM_INT);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
