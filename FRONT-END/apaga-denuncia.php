<?php
    include("conexao.php");
    $sql = "DELETE FROM	DENUNCIA 
            WHERE   ID = ".$_POST['id'];
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    echo "
    <script>
        alert('Excluído com sucesso');
        window.location.href = 'perfilADM.php'; 
    </script>";

?>
