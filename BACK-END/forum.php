<?php
    session_start();
    include("conexao.php");
    include("pega_foto_usuario.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
    <title>EcoTech</title>
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
                         <!--BOTÃO VOLTAR COMEÇO-->
                        <button class="button" id="voltar">
                            <div class="button-box">
                              <span class="button-elem">
                                <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                                  <path
                                    d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                                  ></path>
                                </svg>
                              </span>
                              <span class="button-elem">
                                <svg viewBox="0 0 46 40">
                                  <path
                                    d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
                                  ></path>
                                </svg>
                              </span>
                            </div>
                          </button>                                       
                        <!--BOTÃO VOLTAR FINAL -->
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="img/eco.png" alt="Logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        
                        <!-- ***** Search Start ***** -->
                        <div class="search-input">
                            <form id="search" action="#" style="display: flex; align-items: center;">
                              <input type="text" placeholder="Pesquise aqui" id='searchText' name="searchKeyword" onkeypress="handle" />
                              <i class="fa fa-search" id="pesquisar"></i>
                            </form>
                          </div>
                        <!-- ***** Search End ***** -->
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html#feature-area">Publicações</a></li>
                            <li><a href="index.html#section3">Procurar</a></li>
                            <li><a href="index.html#section4">Login</a></li>
							<li><a href="cadastro.html">Cadastro</a></li>
							<li> <a class="active">Fórum</a></li>                            
                            <li> <a href="criarpost.php">Postar</a></li>
                        <li><a href="perfil.php" style="padding: 0%; width: 105px;">Perfil <img src="./img/fotos_usuarios/<?php echo $foto;?>" alt="imagem_perfil"></a></li>
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
        <div class="post-button-container">
            <a href="criarpost.php"><button class="new-post-button">+ Nova Postagem</button></a>
        </div>
        <div class="feed">
            <?php
                $sql = "
                        SELECT 	ID,
                                DESCRICAO,
                                FOTO_POST,
                                CURTIDA,
                                NOME,
                                NOME_USUARIO,
                                FOTO_USUARIO
                        FROM 	(
                                SELECT P.ID,
                                    P.DESCRICAO,
                                    P.FOTO AS FOTO_POST,
                                    P.CURTIDA,
                                    U.NOME,
                                    U.NOME_USUARIO,
                                    U.FOTO AS FOTO_USUARIO
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
                                    NULL AS FOTO_USUARIO
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
                        <div class="post-header">
                            <img src="./img/fotos_usuarios/<?php echo $post["foto_usuario"];?>" alt="Avatar" class="avatar">
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
                        <div class="post-footer">
                            <?php
                            $sql = "
                            SELECT COUNT(*) AS QTD
                            FROM CURTIDAS_POSTS
                            WHERE FK_ID_USUARIO = :usuario
                            AND FK_ID_POST = :post";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindParam(':usuario', $_SESSION['usuario_id'], PDO::PARAM_INT);
                            $stmt->bindParam(':post', $post["id"], PDO::PARAM_INT);
                            $stmt->execute();
                            $curtida = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($curtida['qtd'] != 0) {
                            ?>
                            <button style="color: rgb(80, 132, 80);" class="like-button" onclick="descurtir(<?php echo $post['id'].','.$_SESSION['usuario_id'];?>)"><i class="fas fa-heart"></i> <?php echo $post["curtida"]; ?> Curtidas</button>
                            <?php
                            }
                            else{
                            ?>
                            <button class="like-button" onclick="curtir(<?php echo $post['id'].','.$_SESSION['usuario_id'];?>)"><i class="fas fa-heart"></i> <?php echo $post["curtida"]; ?> Curtidas</button>
                            <?php
                            }
                            ?>
                            <button class="comment-button" onClick="apareceComentario(this)"><i class="fas fa-comment"></i> Comentar</button>
                            <button class="share-button"><i class="fas fa-share"></i> Compartilhar</button>
                        </div>
                    </div>
                    <!--mudanças inicio-->
                    <div class="comments-section" id="comments-section">
                        <h4>Comentários</h4>
                        <div id="comments-container"></div>
                        <textarea id="new-comment" placeholder="Adicione um comentário..."></textarea>
                        <button id="post-comment">Publicar</button>
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
        function apareceComentario(post){
            const comentarios = document.getElementById("comments-section");
            
            if(comentarios.style.display == ""){
            comentarios.style.display = "block";
            }
            else {
            comentarios.style.display = "";
            }
        }

    </script>

   <!-- Inclua Font Awesome para ícones -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Include FontAwesome for search icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>