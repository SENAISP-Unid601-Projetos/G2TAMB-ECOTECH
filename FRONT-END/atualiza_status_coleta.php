<?php
    include("conexao.php");
    if(isset($_POST["idLocal"]) && isset($_POST["tipo"])){
        if($_POST["tipo"] == "aprova"){
            $sql = "UPDATE 	COLETA 
                    SET     STATUS = 'aprovado'
                    WHERE   ID = ".$_POST["idLocal"];
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            echo "<script>
            alert('Dados atualizados com sucesso!'); // Mostra o alerta
            window.location.href = 'perfilADM.php'; // Redireciona após o alerta
            </script>";
        }
        else if($_POST["tipo"] == "reprova"){
            $sql = "UPDATE 	COLETA 
                    SET     STATUS = 'reprovado'
                    WHERE   ID = ".$_POST["idLocal"];
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            echo "<script>
            alert('Dados atualizados com sucesso!'); // Mostra o alerta
            window.location.href = 'perfilADM.php'; // Redireciona após o alerta
            </script>";
        }
        else{
            echo "<script>
            alert('Erro ao consultar os dados, tente novamente!'); // Mostra o alerta
            window.location.href = 'perfilADM.php'; // Redireciona após o alerta
            </script>";
        }
    }
?>