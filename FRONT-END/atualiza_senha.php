<?php
include("conexao.php");
session_start();
if (isset($_POST["senha"]) && isset($_POST["confirma_senha"])) {
    if($_POST["senha"] != $_POST["confirma_senha"]){
        echo "<script>
            alert('As senhas devem ser iguais!'); // Mostra o alerta
            window.location.href = 'nova_senha.php?id=".$_SESSION["usuario_id"]."'; // Redireciona após o alerta
            </script>";
    }else{
        if($_SESSION["tipo"] == "USUARIO"){
            $stmt = $pdo->prepare("UPDATE USUARIO SET SENHA = :password WHERE id = :id");
            $stmt->bindParam(':password', $_POST["senha"]);
            $stmt->bindParam(':id', $_SESSION["usuario_id"]);
            $stmt->execute();
            echo "<script>
                alert('Sua senha foi redefinida com sucesso!'); // Mostra o alerta
                window.location.href = 'home.php#section4'; // Redireciona após o alerta
                </script>";
        }
        else if($_SESSION["tipo"] == "EMPRESA"){
            $stmt = $pdo->prepare("UPDATE EMPRESA SET SENHA = :password WHERE CNPJ = :id");
            $stmt->bindParam(':password', $_POST["senha"]);
            $stmt->bindParam(':id', $_SESSION["empresa_cnpj"]);
            $stmt->execute();
            echo "<script>
                alert('Sua senha foi redefinida com sucesso!'); // Mostra o alerta
                window.location.href = 'home.php#section4'; // Redireciona após o alerta
                </script>";
        }
        else{
            echo "<script>
            alert('Dados Inválidos!'); // Mostra o alerta
            window.location.href = 'home.php#section4'; // Redireciona após o alerta
            </script>";
        }
        
    }
} else {
    echo "<script>
        alert('Dados Inválidos!'); // Mostra o alerta
        window.location.href = 'home.php#section4'; // Redireciona após o alerta
        </script>";
}
?>
