<?php
    session_start();
    $_SESSION["adm_id"] = '';
    include("conexao.php");
    if(isset($_POST["email"]) && isset($_POST["senha"])) {
        $sql = "SELECT	ID,
                        EMAIL,
                    	SENHA
                FROM 	ADMINISTRADOR
                WHERE	EMAIL = '".$_POST["email"]."'
                AND		SENHA = '".$_POST["senha"]."'";

        $stmt = $pdo->prepare($sql);
        // Executando a consulta
        $stmt->execute();
        // Buscando todos os resultados
        $adms = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($adms) > 0) {
            foreach ($adms as $adm) {
                $_SESSION["adm_id"] = $adm["id"];
                header('Location: perfilADM.php');
            }
        }else {
            echo "<script>
                    alert('Email e/ou senha incorretos'); // Mostra o alerta
                    window.location.href = 'loginadm.html'; // Redireciona após o alerta
                </script>";
        }
    }        
?>