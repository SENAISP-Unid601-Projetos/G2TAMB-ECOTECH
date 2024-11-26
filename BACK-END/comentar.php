<?php  
    session_start();
    include("conexao.php");
    if(isset($_POST["id"]) && isset($_POST["comentario"]) && isset($_POST["tipo"])){
        echo $_POST["id"]."<br>".$_POST["comentario"];
        try {
            if($_POST["tipo"] == "USUARIO"){
                // Preparando a consulta SQL
                $sql = "INSERT INTO COMENTARIOS_POSTS (     TEXTO_COMENTARIO, 
                                                            FK_ID_POST,
                                                            FK_ID_USUARIO,
                                                            FK_CNPJ_EMPRESA
                ) 
                VALUES ( 
                                                            '".$_POST["comentario"]."', 
                                                            ".$_POST["id"].", 
                                                            ".$_SESSION["usuario_id"].",
                                                            NULL)";
            }
            else{
                // Preparando a consulta SQL
                $sql = "INSERT INTO COMENTARIOS_POSTS (     TEXTO_COMENTARIO, 
                                                            FK_ID_POST,
                                                            FK_ID_USUARIO,
                                                            FK_CNPJ_EMPRESA
                ) 
                VALUES ( 
                                                            '".$_POST["comentario"]."', 
                                                            ".$_POST["id"].", 
                                                            NULL,
                                                            '".$_SESSION["usuario_cnpj"]."')";
            }
            
            
            $stmt = $pdo->prepare($sql);
        
            // Executando a consulta
            $stmt->execute();
            echo "<script type='text/javascript'>
                alert('Comentário cadastrado com sucesso');
                window.location.href = 'forum.php';
            </script>";

        } catch (PDOException $e) {
            echo "Erro ao cadastrar comentário: " . $e->getMessage();
        }
    }
    else{
        echo "<script>
                    alert('Erro ao cadastrar!'); // Mostra o alerta
                    window.location.href = 'forum.php'; // Redireciona após o alerta
                </script>";
    }
?>