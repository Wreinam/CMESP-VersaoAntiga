<?php
require('../../../conexao.php');
$cpf = $_POST["CPF"];
$senha = $_POST["senha"];

try {
    $query = "SELECT `id_inscricao` FROM `iscricao_tab` WHERE cpf_aluno = :cpf and senha = :senha LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) == 1) {
        @session_start(); // inicia a sessão
        $row = $result[0];
        $_SESSION['id_inscricao'] = $row["id_inscricao"];
        echo ("Logado");
    } else {
        try {
            $query = "SELECT `id_professor` FROM `professor` WHERE usuario = :cpf and senha = :senha LIMIT 1";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) == 1) {
                @session_start(); // inicia a sessão
                $row = $result[0];
                $_SESSION['id_professor'] = $row["id_professor"];
                echo ("LogadoProfessor");
            } else {
                echo ("ErroLogin");
            }
        } catch (PDOException $e) {
            echo "Erro na tentativa de fazer o cadastro. Volte e tente novamente.";
        }
    }
} catch (PDOException $e) {
    echo "Erro na tentativa de fazer o cadastro. Volte e tente novamente.";
}
