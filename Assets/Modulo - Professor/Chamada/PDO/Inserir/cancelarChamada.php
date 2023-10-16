<?php
try {
    require('../../../../conexao.php');
    $id_turma = $_POST["id_turma"];
    date_default_timezone_set('America/Sao_Paulo');
    $dataHoje = date("d/m/Y");
    $query = "INSERT INTO `lista_chamada` (`data`, `status`, `id_turma`) 
    VALUES (:data, 'Cancelada', :id_turma)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':data', $dataHoje, PDO::PARAM_STR);
    $stmt->bindParam(':id_turma', $id_turma, PDO::PARAM_INT);
    $stmt->execute();
    echo "Cancelado";
} catch (PDOException $e) {
    echo "Erro na tentativa" . $e;
}
