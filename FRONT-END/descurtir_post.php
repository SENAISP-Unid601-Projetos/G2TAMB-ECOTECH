<?php
session_start();
include("conexao.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = $_POST['post'];

    if($_SESSION["usuario_tipo"] == "USUARIO"){
        $sql = "DELETE FROM CURTIDAS_POSTS WHERE FK_ID_POST = ".$post." AND FK_ID_USUARIO = ".$_SESSION["usuario_id"];
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $sql = "UPDATE 	POST SET CURTIDA = CURTIDA-1 WHERE ID = ".$post;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
    else if($_SESSION["usuario_tipo"] == "EMPRESA"){
        $sql = "DELETE FROM CURTIDAS_POSTS WHERE FK_ID_POST = ".$post." AND FK_CNPJ_EMPRESA = '".$_SESSION["usuario_cnpj"]."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $sql = "UPDATE 	POST SET CURTIDA = CURTIDA-1 WHERE ID = ".$post;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
}
?>