<?php
require('../../../../conexao.php');


try {
    session_start();
    $id_inscricao = $_SESSION["id_inscricao"];
    $query = "SELECT nivel, posicao, dias_semana, horario_inicio, horario_termino, nome_modalidade, bairro, 
    rua, nome_local FROM lista_espera INNER JOIN turma ON lista_espera.id_turma = turma.id_turma 
    INNER JOIN modalidade ON turma.id_modalidade = modalidade.id_modalidade INNER JOIN endereco 
    ON turma.id_endereco = endereco.id_endereco WHERE lista_espera.id_aluno = :id_aluno;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_aluno', $id_inscricao, PDO::PARAM_INT);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
