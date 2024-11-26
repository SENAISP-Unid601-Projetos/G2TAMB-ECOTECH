<?php
    session_start();
    $usua_id = '';
    include("conexao.php");
    if(!isset($_SESSION["logado"])){
        $_SESSION["logado"] =  "não";
    }
    if($_SESSION["logado"] == "sim"){
        if($_SESSION["usuario_tipo"] == "USUARIO"){
            include("pega_foto_usuario.php");
            $usua_id = $_SESSION["usuario_id"];
        }
        else{
            $usua_id = $_SESSION["usuario_cnpj"];
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
    <title>EcoTech</title>
	<link rel="icon" href="img/eco.png" type="image/png">
	<link rel="icon" href="eco.png" type="image/png">
	<meta name="ecotech_desenvolvimento" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/feed.css">
</head>
<body>
    <!-- ***** Header Area COMEÇO ***** -->
    <header class="header-area header-sticky">
        <div>
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                    <?php
                            if($_SESSION["logado"] == "sim"){
                        ?>
                        <!--BOTÃO VOLTAR COMEÇO-->
                        <button class="button" onClick="voltarHome()">
                            <div class="button-box">
                              <span class="button-elem">
                                <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                                </svg>
                              </span>
                            </div>
                        </button>  
                        <!-- ***** Logo Start ***** -->
                        <a href="home.php" class="logo">
                            <img src="img/eco.png" alt="Logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <?php
                            }
                        ?>
                        <?php
                            if($_SESSION["logado"] == "não"){
                        ?>
                        <!--BOTÃO VOLTAR COMEÇO-->
                        <button class="button" onClick="voltarIndex()">
                            <div class="button-box">
                              <span class="button-elem">
                                <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                                </svg>
                              </span>
                            </div>
                        </button>  
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="img/eco.png" alt="Logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <?php
                            }
                        ?>                        
                        <!-- ***** Search Start ***** -->
                        <div class="search-input" style="width: 150px">     
                        </div>
                        <!-- ***** Search End ***** -->
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <?php
                            if($_SESSION["logado"] == "sim"){
                            ?>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="home.php#section3">Procurar</a></li>
                            <?php
                            }
                            else{
                            ?>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html#section3">Procurar</a></li>
                            <?php
                            }
                            ?>
							<li> <a class="active">Fórum</a></li>
                            <?php
                            if($_SESSION["logado"] == "sim"){
                            ?>                            
                            <li> <a href="criarpost.php">Postar</a></li>
                            <li> <a href="denuncia.php" >Denunciar</a></li>
                            <?php
                            }
                            ?>
                            <?php
                            if($_SESSION["logado"] == "sim"){
                                if($_SESSION["usuario_tipo"] == "USUARIO"){
                            ?>
                                <li><a href="perfil.php" style="padding: 0%; width: 105px;">Perfil <img src="./img/fotos_usuarios/<?php echo $foto;?>" alt="imagem_perfil"></a></li>
                            <?php
                                }
                                else{
                            ?>
                            <li> <a href="perfilEmpresa.php">Perfil</a></li> 
                            <?php
                                }
                            }
                            ?>
                        </ul>   
						
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area Final ***** -->

	<div class="container">
        <?php
        if($_SESSION["logado"] == "sim"){
        ?>  
        <div class="post-button-container">
            <a href="criarpost.php"><button class="new-post-button">+ Nova Postagem</button></a>
        </div>
        <?php
        }
        ?>
        <div class="feed">
            <?php
                $sql = "
                        SELECT 	ID,
                                DESCRICAO,
                                FOTO_POST,
                                CURTIDA,
                                NOME,
                                NOME_USUARIO,
                                FOTO_USUARIO,
                                TIPO,
                                ID_AUTOR
                        FROM 	(
                                SELECT P.ID,
                                    P.DESCRICAO,
                                    P.FOTO AS FOTO_POST,
                                    P.CURTIDA,
                                    U.NOME,
                                    U.NOME_USUARIO,
                                    U.FOTO AS FOTO_USUARIO,
                                    'USUA' AS TIPO,
                                    CAST(P.FK_ID_USUARIO AS VARCHAR) AS ID_AUTOR
                                FROM POST P
                                INNER JOIN USUARIO U ON (P.FK_ID_USUARIO = U.ID)
                                WHERE P.FK_CNPJ_EMPRESA IS NULL

                                UNION

                                SELECT P.ID,
                                    P.DESCRICAO,
                                    P.FOTO AS FOTO_POST,
                                    P.CURTIDA,
                                    E.NOME,
                                    '' AS NOME_USUARIO,
                                    NULL AS FOTO_USUARIO,
                                    'EMPR' AS TIPO,
                                    P.FK_CNPJ_EMPRESA AS ID_AUTOR
                                FROM POST P
                                INNER JOIN EMPRESA E ON (P.FK_CNPJ_EMPRESA = E.CNPJ)
                                WHERE P.FK_ID_USUARIO IS NULL
                                )
                        ORDER BY ID DESC";

                $stmt = $pdo->prepare($sql);

                // Executando a consulta
                $stmt->execute();

                // Buscando todos os resultados
                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($posts as $post) {
                   ?>
                    <!-- Postagem -->
                    <div class="post">
                        
                        <div class="post-header" style="cursor:pointer !important;" onClick="abrirPerfilUsuario(<?php echo $usua_id;?>,'<?php echo $post["id_autor"];?>','<?php echo $post["tipo"];?>')">
                        <?php
                        if($post["tipo"] == "USUA"){
                        ?>
                            <img src="./img/fotos_usuarios/<?php echo $post["foto_usuario"];?>" alt="Avatar" class="avatar">
                        <?php
                        }
                        ?>  
                            <div class="post-user">
                                <h2><?php echo $post["nome"]; ?></h2>
                                <span><?php echo $post["nome_usuario"]; ?></span>
                            </div>
                        </div>
                        <?php
                            if($post["foto_post"] != ''){
                                ?>
                                <img src="./img/fotos_post/<?php echo $post["foto_post"]; ?>" alt="Imagem da postagem" class="post-image">
                                <?php
                            }
                        ?>
                        <div class="post-body">
                            <p><?php echo $post["descricao"]; ?></p>
                        </div>
                        <?php
                        if($_SESSION["logado"] == "sim"){
                        ?>
                        <div class="post-footer">
                            <?php
                            if($_SESSION["usuario_tipo"] == "USUARIO"){
                                //$stmt->bindParam(':usuario', $_SESSION["usuario_id"], PDO::PARAM_INT);
                                $sql = "
                                        SELECT COUNT(*) AS QTD
                                        FROM CURTIDAS_POSTS
                                        WHERE FK_ID_USUARIO = ".$_SESSION["usuario_id"]."
                                        AND FK_ID_POST = ".$post["id"];
                            }
                            else if($_SESSION["usuario_tipo"] == "EMPRESA"){
                                //$stmt->bindParam(':usuario', $_SESSION["usuario_cnpj"], PDO::PARAM_INT);
                                $sql = "
                                        SELECT COUNT(*) AS QTD
                                        FROM CURTIDAS_POSTS
                                        WHERE FK_CNPJ_EMPRESA = '".$_SESSION["usuario_cnpj"]."'
                                        AND FK_ID_POST = ".$post["id"];
                            }
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $curtida = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($curtida['qtd'] != 0) {
                                if($_SESSION["usuario_tipo"] == "USUARIO"){
                                    ?>
                                    <button style="color: rgb(80, 132, 80);" class="like-button" onclick="descurtir(<?php echo $post['id'].','.$_SESSION['usuario_id'];?>)"><i class="fas fa-heart"></i> <?php echo $post["curtida"]; ?> Curtidas</button>
                                    <?php
                                }
                                else if($_SESSION["usuario_tipo"] == "EMPRESA"){
                                    ?>
                                    <button style="color: rgb(80, 132, 80);" class="like-button" onclick="descurtir(<?php echo $post['id'].','.$_SESSION['usuario_cnpj'];?>)"><i class="fas fa-heart"></i> <?php echo $post["curtida"]; ?> Curtidas</button>
                                    <?php
                                }
                            }
                            else{
                                if($_SESSION["usuario_tipo"] == "USUARIO"){
                                    ?>
                                    <button class="like-button" onclick="curtir(<?php echo $post['id'].','.$_SESSION['usuario_id'];?>)"><i class="fas fa-heart"></i> <?php echo $post["curtida"]; ?> Curtidas</button>
                                    <?php
                                }
                                else if($_SESSION["usuario_tipo"] == "EMPRESA"){
                                    ?>
                                    <button class="like-button" onclick="curtir(<?php echo $post['id'].','.$_SESSION['usuario_cnpj'];?>)"><i class="fas fa-heart"></i> <?php echo $post["curtida"]; ?> Curtidas</button>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                                $sql = "
                                        SELECT	COUNT(*) AS QTD
                                        FROM	COMENTARIOS_POSTS
                                        WHERE	FK_ID_POST = ".$post["id"];
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                $coments = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <button class="comment-button" onClick="apareceComentario(<?php echo $post["id"]; ?>)"><i class="fas fa-comment"></i> <?php echo $coments["qtd"];?> Comentários</button>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!--mudanças inicio-->
                    <div class="comments-section" id="comments-section-<?php echo $post["id"]; ?>">
                        <h4><?php echo $coments["qtd"];?> Comentários</h4>
                        <div id="comments-container">
                            <?php
                            $sql = "
                                    SELECT		CASE 	WHEN USUARIO.NOME_USUARIO IS NULL
                                                        THEN USUARIO.NOME
                                                        WHEN USUARIO.NOME_USUARIO IS NOT NULL
                                                        THEN USUARIO.NOME_USUARIO
                                                END 	AS USUARIO,
                                                TEXTO_COMENTARIO 
                                    FROM		COMENTARIOS_POSTS
                                    INNER JOIN 	USUARIO ON (USUARIO.ID = COMENTARIOS_POSTS.FK_ID_USUARIO)
                                    WHERE		FK_ID_POST = ".$post["id"]."
                                    AND			FK_CNPJ_EMPRESA IS NULL
                                    UNION
                                    SELECT		NOME AS USUARIO,
                                                TEXTO_COMENTARIO 
                                    FROM		COMENTARIOS_POSTS
                                    INNER JOIN 	EMPRESA ON (EMPRESA.CNPJ = COMENTARIOS_POSTS.FK_CNPJ_EMPRESA)
                                    WHERE		FK_ID_POST = ".$post["id"]."
                                    AND			FK_ID_USUARIO IS NULL
                                    ";
            
                            $stmt = $pdo->prepare($sql);
            
                            // Executando a consulta
                            $stmt->execute();
            
                            // Buscando todos os resultados
                            $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                            foreach ($comentarios as $comentario) {
                            ?>
                            <div class="comment">
                                <strong><?php echo $comentario["usuario"]; ?>:</strong> <p><?php echo $comentario["texto_comentario"]; ?></p>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <textarea class="textoComentario"   id="new-comment-<?php echo $post["id"]; ?>" placeholder="Adicione um comentário..."></textarea>
                        <button class="btnComentario"       id="post-comment-<?php echo $post["id"]; ?>" onClick="comentar(<?php echo $post["id"]; ?>,'<?php echo $_SESSION["usuario_tipo"];?>')">Publicar</button>
                    </div>
                    <br/><br/>
                    <!--mudanças fim-->
                   <?php
                }
            ?>
        </div>
    </div>

    <script>
        var voltar = document.getElementById("voltar");
        voltar.addEventListener("click", ()=>{
            window.location.href = "index.html";
        })
        function curtir(post,usuario){
            // Cria um objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();
            
            // Configura a requisição
            xhr.open("POST", "curtir_post.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Define o que fazer quando a resposta chegar
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Aqui você pode manipular a resposta do PHP
                    console.log(xhr.responseText); // Para depuração
                    location.reload(); // Recarrega a página
                }
            };
            
            // Envia os dados para o PHP
            xhr.send("post=" + encodeURIComponent(post) + "&usuario=" + encodeURIComponent(usuario));
        }
        function descurtir(post,usuario){
            // Cria um objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();
            
            // Configura a requisição
            xhr.open("POST", "descurtir_post.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Define o que fazer quando a resposta chegar
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Aqui você pode manipular a resposta do PHP
                    console.log(xhr.responseText); // Para depuração
                    location.reload(); // Recarrega a página
                }
            };
            
            // Envia os dados para o PHP
            xhr.send("post=" + encodeURIComponent(post) + "&usuario=" + encodeURIComponent(usuario));
        }

        document.getElementById('post-comment').addEventListener('click', function() {
            const commentText = document.getElementById('new-comment').value;
            
            if (commentText.trim()) {
                const commentsContainer = document.getElementById('comments-container');
                
                const newCommentDiv = document.createElement('div');
                newCommentDiv.classList.add('comment');
                newCommentDiv.innerHTML = `<strong>Você:</strong> <p>${commentText}</p>`;
                
                commentsContainer.appendChild(newCommentDiv);
                document.getElementById('new-comment').value = ''; // Limpa o campo
            }
        });
        function apareceComentario(id){
            const comentarios = document.getElementById("comments-section-"+id);
            
            if(comentarios.style.display == ""){
            comentarios.style.display = "block";
            }
            else {
            comentarios.style.display = "";
            }
        }
        function comentar(id,tipo){
            const comentario = document.getElementById("new-comment-"+id).value;

            // Impede o comportamento padrão do formulário
            event.preventDefault();

            // Cria um formulário dinamicamente
            var form = document.createElement("form");
            form.method = "POST";
            form.action = "comentar.php";  // Enviar para o arquivo PHP

            // id
            var idInput = document.createElement("input");
            idInput.type = "hidden";
            idInput.name = "id";
            idInput.value = id;
            form.appendChild(idInput);

            // tipo
            var tipoInput = document.createElement("input");
            tipoInput.type = "hidden";
            tipoInput.name = "tipo";
            tipoInput.value = tipo;
            form.appendChild(tipoInput);

            // Comentario
            var comentarioInput = document.createElement("input");
            comentarioInput.type = "hidden";
            comentarioInput.name = "comentario";
            comentarioInput.value = comentario;
            form.appendChild(comentarioInput);

            // Adiciona o formulário ao body e envia
            document.body.appendChild(form);
            form.submit();

        }

        function voltarHome(){
        window.location.href = "home.php";
        }
        function voltarIndex(){
             window.location.href = "index.html";
        }
        function abrirPerfilUsuario(usua_id, id,tipo){
            if(usua_id ==  id){
                window.location.href = "perfil.php";
            }
            else{
                // Impede o comportamento padrão do formulário
                event.preventDefault();

                // Cria um formulário dinamicamente
                var form = document.createElement("form");
                form.method = "POST";
                form.action = "perfilUsuario.php";  // Enviar para o arquivo PHP

                // id
                var idInput = document.createElement("input");
                idInput.type = "hidden";
                idInput.name = "id";
                idInput.value = id;
                form.appendChild(idInput);

                // tipo
                var tipoInput = document.createElement("input");
                tipoInput.type = "hidden";
                tipoInput.name = "tipo";
                tipoInput.value = tipo;
                form.appendChild(tipoInput);

                // Adiciona o formulário ao body e envia
                document.body.appendChild(form);
                form.submit();
            }
            
        }
    </script>

   <!-- Inclua Font Awesome para ícones -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Include FontAwesome for search icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>