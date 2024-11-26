<?php
session_start();
include("conexao.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados
    $post = $_POST['post'];

    if($_SESSION["usuario_tipo"] == "USUARIO"){
        $sql = "INSERT INTO CURTIDAS_POSTS   (      FK_ID_POST, 
                                                    FK_ID_USUARIO
                                        ) 
                                VALUES  ( 
                                            ".$post.",
                                            ".$_SESSION["usuario_id"]."
                                        )";
    }
    else if($_SESSION["usuario_tipo"] == "EMPRESA"){
        $sql = "INSERT INTO CURTIDAS_POSTS   (      FK_ID_POST, 
                                                    FK_CNPJ_EMPRESA
                                        ) 
                                VALUES  ( 
                                            ".$post.",
                                            ".$_SESSION["usuario_cnpj"]."
                                        )";

    }
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE 	POST SET CURTIDA = CURTIDA+1 WHERE ID = ".$post;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}
?>