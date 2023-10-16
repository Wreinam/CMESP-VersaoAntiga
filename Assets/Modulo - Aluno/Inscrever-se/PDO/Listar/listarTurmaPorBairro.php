<?php
require('../../../../conexao.php');
try {
    $nome_bairro = $_POST["nome_bairro"];
    $id_modalidade = $_POST["id_modalidade"];
    // Volta uma lista de turmas com todas as informações de endereço, professor e da própria turma, tudo isso por id_endereco;
    $queryTurma = "SELECT id_turma, dias_semana, horario_inicio, horario_termino, nome_modalidade, 
    quantidade_vagas, nivel, nome_professor, rua, nome_local FROM turma INNER JOIN modalidade ON 
    turma.id_modalidade = modalidade.id_modalidade INNER JOIN professor ON turma.id_professor = 
    professor.id_professor INNER JOIN endereco ON turma.id_endereco = endereco.id_endereco WHERE 
    endereco.bairro = :nome_bairro AND turma.id_modalidade = :id_modalidade";

    $stmt = $pdo->prepare($queryTurma);
    $stmt->bindParam(':nome_bairro', $nome_bairro, PDO::PARAM_STR);
    $stmt->bindParam(':id_modalidade', $id_modalidade, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($dados);
    } else {
        echo "deu errado";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

