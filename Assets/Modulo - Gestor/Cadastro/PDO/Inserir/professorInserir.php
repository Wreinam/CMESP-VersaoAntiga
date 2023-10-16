<?php 

require('../../../../conexao.php');

$nome = $_POST['nome_professor'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$queryProfessor = "INSERT INTO professor (nome_professor, usuario, senha) VALUES (:nome, :usuario, :senha)";
$stmt = $pdo->prepare($queryProfessor);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':senha', $senha);

if ($stmt->execute()) {
    echo json_encode("tudo certo");
} else {
    echo json_encode("Erro ao inserir.");
}