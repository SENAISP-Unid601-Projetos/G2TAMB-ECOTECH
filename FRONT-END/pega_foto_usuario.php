<?php
    $sql = "
    SELECT 	FOTO
    FROM    USUARIO
    WHERE   ID = ".$_SESSION["usuario_id"];
    $stmt = $pdo->prepare($sql);
    // Executando a consulta
    $stmt->execute();
    // Buscando todos os resultados
    $usuas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuas as $usua) {
        $foto = $usua["foto"];
    }
?>