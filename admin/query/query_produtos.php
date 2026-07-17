<?php

$categoria = "Informática";

$con =Config::connect();

$sql = "SELECT id, nome, categoria, preco, estoque, status
        FROM produtos
        WHERE categoria = :categoria
        ORDER BY nome DESC";

$stmt = $con->prepare($sql);

$stmt->execute([
    ':categoria' => $categoria
]);

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
