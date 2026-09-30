<?php

header("Content-Type: application/json");

require "conexao.php";

$metodo = $_SERVER["REQUEST_METHOD"];

if ($metodo == "POST") {

    $dados = json_decode(file_get_contents("php://input"), true);

    if (
        empty($dados["nome"]) ||
        empty($dados["categoria"]) ||
        empty($dados["fornecedor"]) ||
        !isset($dados["quantidade"]) ||
        !isset($dados["preco_unitario"])
    ) {
        echo json_encode([
            "mensagem" => "Preencha todos os campos obrigatórios"
        ]);
        exit;
    }

    if (!in_array($dados["categoria"], ["eletrica", "mecanica", "hidraulica"])) {
        echo json_encode([
            "mensagem" => "Categoria inválida"
        ]);
        exit;
    }

    if ($dados["quantidade"] < 0) {
        echo json_encode([
            "mensagem" => "A quantidade não pode ser negativa"
        ]);
        exit;
    }

    if ($dados["preco_unitario"] <= 0) {
        echo json_encode([
            "mensagem" => "O preço deve ser maior que zero"
        ]);
        exit;
    }

    $sql = "INSERT INTO pecas 
            (nome, categoria, fornecedor, quantidade, preco)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $dados["nome"],
        $dados["categoria"],
        $dados["fornecedor"],
        $dados["quantidade"],
        $dados["preco_unitario"]
    ]);

    echo json_encode([
        "mensagem" => "Peça cadastrada com sucesso"
    ]);

} elseif ($metodo == "GET") {

    $sql = "SELECT * FROM pecas ORDER BY id";

    $stmt = $pdo->query($sql);

    $pecas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($pecas);
}

elseif ($metodo == "PUT") {

    $id = $_GET["id"] ?? null;

    if (!$id) {
        echo json_encode([
            "mensagem" => "Informe o id da peça"
        ]);
        exit;
    }

    $dados = json_decode(file_get_contents("php://input"), true);

    if (
        empty($dados["nome"]) ||
        empty($dados["categoria"]) ||
        empty($dados["fornecedor"]) ||
        !isset($dados["quantidade"]) ||
        !isset($dados["preco_unitario"])
    ) {
        echo json_encode([
            "mensagem" => "Preencha todos os campos obrigatórios"
        ]);
        exit;
    }

    if (!in_array($dados["categoria"], ["eletrica", "mecanica", "hidraulica"])) {
        echo json_encode([
            "mensagem" => "Categoria inválida"
        ]);
        exit;
    }

    if ($dados["quantidade"] < 0) {
        echo json_encode([
            "mensagem" => "A quantidade não pode ser negativa"
        ]);
        exit;
    }

    if ($dados["preco_unitario"] <= 0) {
        echo json_encode([
            "mensagem" => "O preço deve ser maior que zero"
        ]);
        exit;
    }

    $sql = "UPDATE pecas
            SET nome = ?, categoria = ?, fornecedor = ?,
                quantidade = ?, preco = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $dados["nome"],
        $dados["categoria"],
        $dados["fornecedor"],
        $dados["quantidade"],
        $dados["preco_unitario"],
        $id
    ]);

    echo json_encode([
        "mensagem" => "Peça atualizada com sucesso"
    ]);
}

elseif ($metodo == "DELETE") {

    $id = $_GET["id"] ?? null;

    if (!$id) {
        echo json_encode([
            "mensagem" => "Informe o id da peça"
        ]);
        exit;
    }

    $sql = "DELETE FROM pecas WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$id]);

    echo json_encode([
        "mensagem" => "Peça excluída com sucesso"
    ]);
}