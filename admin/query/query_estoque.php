<?php

$tipo = "Estoque";

$con =Config::connect();

$sql = "SELECT id,	produto_id,	tipo,	quantidade,	observacao,	criado_em	

        FROM movimentacoes_estoque
        WHERE tipo = :tipo
        ORDER BY tipo DESC";

$stmt = $con->prepare($sql);

$stmt->execute([
    ':tipo' => $tipo
]);

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
