<?php
    // Inicia a sessão
    session_start();
    
    // Destrói a sessão
    session_destroy();

    echo "<script>
        alert('Até a próxima 🙋🏻‍♀️'); // Mostra o alerta
        window.location.href = 'index.html'; // Redireciona após o alerta
    </script>";

?>