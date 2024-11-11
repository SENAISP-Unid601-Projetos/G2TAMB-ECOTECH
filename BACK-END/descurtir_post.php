<?php
include("conexao.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados
    $post = $_POST['post'];
    $usuario = $_POST['usuario'];

    $sql = "DELETE FROM CURTIDAS_POSTS WHERE FK_ID_POST = ".$post." AND FK_ID_USUARIO = ".$usuario;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE 	POST SET CURTIDA = CURTIDA-1 WHERE ID = ".$post;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}
?>