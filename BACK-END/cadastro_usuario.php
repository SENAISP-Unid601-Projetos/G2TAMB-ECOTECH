<?php
    include("conexao.php");
    try {
        // Preparando a consulta SQL
        $sql = "INSERT INTO usuario (  nome, 
                                        data_nascimento, 
                                        telefone,
                                        email,
                                        senha,
                                        tipo_conta,
                                        foto) 
                            VALUES   (  '".$_POST["nome"].$_POST["sobrenome"]."', 
                                        '".$_POST["data_nascimento"]."', 
                                        '".$_POST["telefone"]."', 
                                        '".$_POST["email"]."',
                                        '".$_POST["senha"]."',
                                        'User',
                                        'usuarioteste_sem_fundo.png')";
        $stmt = $pdo->prepare($sql);
    
        // Executando a consulta
        $stmt->execute();
        header('Location: index.html#section4');
        
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
?>