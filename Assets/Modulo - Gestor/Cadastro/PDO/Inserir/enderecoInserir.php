<?php 

require('../../../../conexao.php');

$rua = $_POST['rua'];
$nomeLocal = $_POST['nomeLocal'];
$bairro = $_POST['bairro'];

$queryEndereco = "INSERT INTO endereco (bairro, rua, nome_local) VALUES (:bairro, :rua, :nome_local)";
$stmt = $pdo->prepare($queryEndereco);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':nome_local', $nomeLocal);

if ($stmt->execute()) {
    echo json_encode("tudo certo");
} else {
    echo json_encode("Erro ao inserir.");
}