<?php
    include("conexao.php");
    $virgula = " , ";
        $diretorio = './img/fotos_coleta/';
        $nomeArquivo = "";
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $arquivoTemp = $_FILES['file']['tmp_name'];
            $nomeArquivo = basename($_FILES['file']['name']);
            $caminhoCompleto = $diretorio . $nomeArquivo;
            // Move o arquivo para o diretório especificado
            move_uploaded_file($arquivoTemp, $caminhoCompleto);
        }
        if($nomeArquivo == ""){
            $nomeArquivo = "local_elixo.png";
        }
        try {
            // Preparando a consulta SQL   
            $virgula = " , ";
            $sql = "INSERT INTO COLETA (  localizacao,
                                          nome, 
                                          foto,
                                          descricao,
                                          status
            ) 
                                VALUES   (  '".$_POST["rua"].$virgula.$_POST["num"].$virgula.$_POST["bairro"]."', 
                                            '".$_POST["nome"]."',
                                            '".$nomeArquivo."',
                                            '".$_POST["descricao"]."',
                                            'solicitado')";
            $stmt = $pdo->prepare($sql);
        
            // Executando a consulta
            $stmt->execute();
            header('Location: index.html#section4');
            
        } catch (PDOException $e) {
            echo "Erro ao cadastrar coleta: " . $e->getMessage();
        }

   
?>