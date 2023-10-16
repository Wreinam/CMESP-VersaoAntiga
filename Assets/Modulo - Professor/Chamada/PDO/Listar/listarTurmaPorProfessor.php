<?php

try {
    require('../../../../conexao.php');
    session_start();
    $id_professor = $_SESSION["id_professor"];
    date_default_timezone_set('America/Sao_Paulo');
    $dataHoje = date("d/m/Y");
    $hoje = getdate();
    $dias = '';
    for ($i = 0; $i < $hoje["wday"]; $i++) {
        $dias .= '_';
    }
    $dias .= "1%";
    // Volta o resultado apenas as chamadas que o professor da naquele dia e seu estado
    $query = "SELECT turma.id_turma, rua, bairro, nome_local, modalidade.nome_modalidade, nivel, 
    horario_inicio, horario_termino, lista_chamada.status FROM `turma` INNER JOIN modalidade 
    ON modalidade.id_modalidade = turma.id_modalidade INNER JOIN endereco 
    ON endereco.id_endereco = turma.id_endereco LEFT JOIN lista_chamada 
    ON turma.id_turma = lista_chamada.id_turma AND lista_chamada.data = :dataHoje
    WHERE id_professor = :id_professor 
    AND dias_semana LIKE :dias";

    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_professor', $id_professor, PDO::PARAM_INT);
    $stmt->bindParam(':dias', $dias, PDO::PARAM_STR);
    $stmt->bindParam(':dataHoje', $dataHoje, PDO::PARAM_STR);
    $stmt->execute();

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);
} catch (PDOException $e) {
    echo "Erro na tentativa" . $e;
}
