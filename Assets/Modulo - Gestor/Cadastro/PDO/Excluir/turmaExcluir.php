<?php

require('../../../../conexao.php');

$id_turma = $_POST["id_turma"];

try {
    $query = "SELECT CASE WHEN EXISTS (SELECT 1 FROM matricula WHERE matricula.id_turma = :id_turma) 
    THEN 'Existe' ELSE 'Nenhuma tabela' END AS existe;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $stmt->execute();
    $Existe = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($Existe["existe"] == "Existe") {
        echo "Existe";
    } else {
        $sql = "DELETE FROM turma WHERE id_turma = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id_turma, PDO::PARAM_INT);
        $stmt->execute();
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
