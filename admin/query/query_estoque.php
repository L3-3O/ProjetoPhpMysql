<?php


$con = Config::connect();


$sql = "SELECT id, produto_id, tipo, quantidade, observacao, criado_em 
        FROM movimentacoes_estoque
        ORDER BY criado_em DESC";

$stmt = $con->prepare($sql);
$stmt->execute();

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);