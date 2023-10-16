<?php

$hostName = "localhost";
$nomeBanco = "banco_cmesp";
$usuario = "";
$senha = "";

try {
    $pdo = new PDO("mysql:host=$hostName;dbname=$nomeBanco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Falha ao conectar no banco: " . $e->getMessage();
}
