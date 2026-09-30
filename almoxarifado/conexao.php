<?php

$host = "192.168.10.93";
$dbname = "almoxarifado";
$user = "postgres";
$password = "0604";

try {
    $pdo = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo json_encode([
        "erro" => "Erro na conexão com o banco"
    ]);
}