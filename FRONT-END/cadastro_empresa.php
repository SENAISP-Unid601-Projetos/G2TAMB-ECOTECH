<?php
    include("conexao.php");
    try {
        // Preparando a consulta SQL
        $sql = "INSERT INTO empresa ( cnpj,
                                      email, 
                                      data_inauguracao,
                                      senha,
                                      nome,
                                      telefone
        ) 
                            VALUES   (  '".$_POST["cnpj"]."', 
                                        '".$_POST["email"]."',
                                        '".$_POST["data_nascimento"]."',                                         
                                        '".$_POST["senha"]."',
                                        '".$_POST["nome"]." ".$_POST["sobrenome"]."', 
                                        '".$_POST["telefone"]."')";
        $stmt = $pdo->prepare($sql);
    
        // Executando a consulta
        $stmt->execute();
        header('Location: index.html#section4');
        
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
?>