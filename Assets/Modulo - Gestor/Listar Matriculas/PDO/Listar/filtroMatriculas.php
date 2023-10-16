<?php


require('../../../../conexao.php');

try {
    $bairro = $_POST["bairro"];
    $modalidade = $_POST["modalidade"];
    $nivel = $_POST["nivel"];
    //Pega todos os dados e alunos matriculados em qualquer turma
    $query = "SELECT id_matricula,iscricao_tab.nome_aluno, modalidade.nome_modalidade, endereco.bairro, matricula.quant_faltas,
    nivel 
    FROM `matricula` INNER JOIN turma ON turma.id_turma = matricula.id_turma INNER JOIN endereco 
    ON endereco.id_endereco = turma.id_endereco INNER JOIN modalidade 
    ON turma.id_modalidade = modalidade.id_modalidade INNER JOIN iscricao_tab 
    ON iscricao_tab.id_inscricao = matricula.id_aluno;";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dados);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
