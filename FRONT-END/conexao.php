<?php
try {
    // Definindo parâmetros de conexão
    $dsn = 'pgsql:host=127.0.0.1;port=5432;dbname=ecotech'; // Data Source Name
    $username = 'postgres'; // Nome de usuário do PostgreSQL
    $password = 'Hta#2308';   // Senha do PostgreSQL

    // Criando uma instância de PDO
    $pdo = new PDO($dsn, $username, $password);

    // Definindo o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Caso ocorra um erro na conexão
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
