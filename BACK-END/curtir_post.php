<?php
include("conexao.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados
    $post = $_POST['post'];
    $usuario = $_POST['usuario'];

    $sql = "INSERT INTO CURTIDAS_POSTS   (   FK_ID_POST, 
                                            FK_ID_USUARIO
                                        ) 
                                VALUES  ( 
                                            ".$post.",
                                            ".$usuario."
                                        )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE 	POST SET CURTIDA = CURTIDA+1 WHERE ID = ".$post;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}
?>