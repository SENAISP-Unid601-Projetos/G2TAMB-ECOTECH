<?php
    include("conexao.php");
    
    if(isset($_POST["id"]) && isset($_POST["tipo"])){
        if($_POST["tipo"] == "editar" && $_POST["conta"] == "usuario"){
            $sql = "UPDATE 	USUARIO 
                    SET NOME ='".$_POST['nome']."',
                        NOME_USUARIO = '".$_POST['nome_usuario']."',
                        EMAIL = '".$_POST['email']."',
                        TELEFONE = '".$_POST['telefone']."',
                        DATA_NASCIMENTO = '".$_POST['data_nascimento']."'
                    WHERE   ID = ".$_POST['id'];
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            echo "<script>
            alert('Dados atualizados com sucesso!'); // Mostra o alerta
            window.location.href = 'perfilADM.php'; // Redireciona após o alerta
            </script>";
        }
        else if($_POST["tipo"] == "editar" && $_POST["conta"] == "empresa"){
            $sql = "UPDATE 	EMPRESA 
                    SET NOME ='".$_POST['nomeEmpresa']."',
                        EMAIL = '".$_POST['emailEmpresa']."',
                        TELEFONE = '".$_POST['telefoneEmpresa']."',
                        DATA_INAUGURACAO = '".$_POST['data_inauguracao']."'
                    WHERE   CNPJ = '".$_POST['id']."'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            echo "<script>
            alert('Dados atualizados com sucesso!'); // Mostra o alerta
            window.location.href = 'perfilADM.php'; // Redireciona após o alerta
            </script>";
        }
        else if($_POST["tipo"] == "apaga" && $_POST["conta"] == "empresa"){
            $sql = "DELETE FROM	EMPRESA 
                    WHERE   CNPJ = '".$_POST['id']."'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            echo "<script>
            alert('Dados apagados com sucesso!'); // Mostra o alerta
            window.location.href = 'perfilADM.php'; // Redireciona após o alerta
            </script>";
        }
        else if($_POST["tipo"] == "apaga" && $_POST["conta"] == "usuario"){
            $sql = "DELETE FROM	USUARIO 
                    WHERE   ID = '".$_POST['id']."'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            echo "<script>
            alert('Dados apagados com sucesso!'); // Mostra o alerta
            window.location.href = 'perfilADM.php'; // Redireciona após o alerta
            </script>";
        } else{
            echo "<script>
            alert('Erro ao consultar os dados, tente novamente!'); // Mostra o alerta
            window.location.href = 'perfilADM.php'; // Redireciona após o alerta
            </script>";
        }
    }
?>                      