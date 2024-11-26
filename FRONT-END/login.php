<?php
    session_start();
    $_SESSION["usuario_id"] = '';
    $_SESSION["usuario_cnpj"] = '';
    $_SESSION["Logado"] = 'não';
    include("conexao.php");
    if(isset($_POST["email"]) && isset($_POST["senha"])) {
        $sql = "
                    SELECT	EMAIL,
                    		SENHA,
                    		'USUARIO' AS TIPO
                    FROM 	USUARIO
                    WHERE	EMAIL = '".$_POST["email"]."'
                    AND		SENHA = '".$_POST["senha"]."'
                    UNION
                    SELECT	EMAIL,
                    		SENHA,
                    		'EMPRESA' AS TIPO
                    FROM 	EMPRESA
                    WHERE	EMAIL = '".$_POST["email"]."'
                    AND		SENHA = '".$_POST["senha"]."'";

        $stmt = $pdo->prepare($sql);

        // Executando a consulta
        $stmt->execute();

        // Buscando todos os resultados
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Exibindo os resultados
        if (count($usuarios) > 0) {
            foreach ($usuarios as $usuario) {
                $_SESSION["usuario_tipo"] = $usuario["tipo"];
                if($usuario["tipo"] == "USUARIO"){
                    $sql = "
                        SELECT	ID
                        FROM 	USUARIO
                        WHERE	EMAIL = '".$_POST["email"]."'
                        AND		SENHA = '".$_POST["senha"]."'";

                    $stmt = $pdo->prepare($sql);

                    // Executando a consulta
                    $stmt->execute();
                    // Buscando todos os resultados
                    $usus = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (count($usus) > 0) {
                        foreach ($usus as $usu) {
                            $_SESSION["usuario_id"] = $usu["id"];
                            $_SESSION["logado"] = 'sim';
                            header('Location: home.php');
                        }
                    }
                } else if($usuario["tipo"] == "EMPRESA"){
                        echo $usuario["tipo"];
                        $sql = "
                            SELECT	CNPJ
                            FROM 	EMPRESA
                            WHERE	EMAIL = '".$_POST["email"]."'
                            AND		SENHA = '".$_POST["senha"]."'"; 
                        $stmt = $pdo->prepare($sql); 
                        // Executando a consulta
                        $stmt->execute();
                        // Buscando todos os resultados
                        $empres = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if (count($empres) > 0) {
                            foreach ($empres as $empre) {
                                $_SESSION["usuario_cnpj"] = $empre["cnpj"];
                                $_SESSION["logado"] = 'sim';
                                header('Location: home.php');
                            }
                        }
                    }      
            }
        } else {
            echo "<script>
                    alert('Usuário e/ou senha incorretos'); // Mostra o alerta
                    window.location.href = 'index.html'; // Redireciona após o alerta
                </script>";
        }
    }
?>