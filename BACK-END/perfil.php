<?php
    session_start();
    include("conexao.php");
    include("pega_foto_usuario.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<link rel="icon" href="img/eco.png" type="image/png">
	<meta name="ecotech_desenvolvimento" content="width=device-width, initial-scale=1">
    <title>EcoTech</title>
    <link rel="stylesheet" href="./css/perfil.css">
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
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html#feature-area">Publicações</a></li>
                            <li><a href="index.html#section3">Procurar</a></li>
							<li> <a href="forum.php">Fórum</a></li>
                            <li> <a href="criarpost.php">Postar</a></li>
							<li><a href="perfil.php" style="padding: 0%; width: 105px;" class="active">Perfil</a></li>
                            <li><a href="perfil.php" style="padding: 0%; width: 105px;"><img src="./img/fotos_usuarios/<?php echo $foto;?>" alt="imagem_perfil"></a></li>
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


    <div class="profile-container" style="margin-top: 90px;">
         <!-- Header do perfil -->
        <div class="profile-header">
            <div class="profile-picture-container">
            <img src="./img/fotos_usuarios/<?php echo $foto;?>" alt="Foto de perfil" class="profile-picture">
            </div>

            <?php
                $sql = 'SELECT	NOME,
                                NOME_USUARIO,
                                FOTO,
                                BIOGRAFIA
                        FROM	USUARIO
                        WHERE   ID = '.$_SESSION["usuario_id"];

                $stmt = $pdo->prepare($sql);

                // Executando a consulta
                $stmt->execute();

                // Buscando todos os resultados
                $usuas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $sql = 'SELECT  COUNT(*) QTD
                        FROM    POST 
                        WHERE   FK_ID_USUARIO = '.$_SESSION["usuario_id"]; 

                $stmt = $pdo->prepare($sql);

                // Executando a consulta
                $stmt->execute();

                // Buscando todos os resultados
                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $qtd_posts = 0;
                foreach ($posts as $post) {
                    $qtd_posts = $post["qtd"];
                }

                foreach ($usuas as $usua) {
            ?>
            <div style="display: flex; justify-content: space-between;">
                <div class="profile-info">
                    <h2 class="username"><?php echo $usua["nome"]; ?></h2>
                    <p class="bio"><?php echo $usua["nome_usuario"]; ?></p>
                    
                    <div class="stats">
                        <div class="stat"><strong><?php echo $qtd_posts; ?></strong> postagens</div>
                    </div>
                    <p class="bio"><?php echo $usua["biografia"]; ?></p>

                </div>
                <button class="save" id="editar" style="float: right">Editar</button>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="opcoes">
            <button class= "btns" id="btnfotos" name="btnfotos" onclick="mostraPostsFotos()" style="color: #2bac47; border-bottom: 1px solid #2bac47;">Fotos</button>
            <button class= "btns" id="btntextos" name="btntextos" onclick="mostraPostsTextos()">Textos</button>
        </div>
        <hr style="1px solid #dbdbdb"/>
        <br/>
        <!-- Grid de Postagens -->
        <div class="posts-grid" id="post" style="display: flex">
        <?php
                $sql = "
                        SELECT 	ID,
                                DESCRICAO,
                                FOTO_POST,
                                CURTIDA,
                                NOME,
                                NOME_USUARIO,
                                FOTO_USUARIO,
                                IDENTIFICACAO
                        FROM 	(
                                SELECT 	P.ID,
                                        P.DESCRICAO,
                                        P.FOTO AS FOTO_POST,
                                        P.CURTIDA,
                                        U.NOME,
                                        U.NOME_USUARIO,
                                        U.FOTO AS FOTO_USUARIO,
                                        CAST(U.ID AS TEXT) AS IDENTIFICACAO
                                FROM 	POST P
                                INNER JOIN USUARIO U ON (P.FK_ID_USUARIO = U.ID)
                                WHERE P.FK_CNPJ_EMPRESA IS NULL

                                UNION

                                SELECT 	P.ID,
                                        P.DESCRICAO,
                                        P.FOTO AS FOTO_POST,
                                        P.CURTIDA,
                                        E.NOME,
                                        '' AS NOME_USUARIO,
                                        NULL AS FOTO_USUARIO,
                                        E.CNPJ AS IDENTIFICACAO
                                FROM 	POST P
                                INNER JOIN EMPRESA E ON (P.FK_CNPJ_EMPRESA = E.CNPJ)
                                WHERE P.FK_ID_USUARIO IS NULL
                                )
                        WHERE	IDENTIFICACAO = '".$_SESSION['usuario_id']."'
                        ORDER BY ID DESC";

                $stmt = $pdo->prepare($sql);

                // Executando a consulta
                $stmt->execute();

                // Buscando todos os resultados
                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($posts as $post) {
                ?>
                    <div class="post">
                        <?php
                            if($post["foto_post"] != ''){
                                ?>
                                <img src="./img/fotos_post/<?php echo $post["foto_post"]; ?>" alt="Postagem">
                                <p><?php echo $post["descricao"]; ?></p>
                                <?php
                            }
                        ?>
                    </div>

                <?php
                }
                ?>
        </div>
        <div class="feed" id="feed" style="display:none">
            <?php
                $sql = "
                        SELECT 	ID,
                                DESCRICAO,
                                FOTO_POST,
                                CURTIDA,
                                NOME,
                                NOME_USUARIO,
                                FOTO_USUARIO,
                                IDENTIFICACAO
                        FROM 	(
                                SELECT P.ID,
                                    P.DESCRICAO,
                                    P.FOTO AS FOTO_POST,
                                    P.CURTIDA,
                                    U.NOME,
                                    U.NOME_USUARIO,
                                    U.FOTO AS FOTO_USUARIO,
                                    CAST(U.ID AS TEXT) AS IDENTIFICACAO
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
                                    E.CNPJ AS IDENTIFICACAO
                                FROM POST P
                                INNER JOIN EMPRESA E ON (P.FK_CNPJ_EMPRESA = E.CNPJ)
                                WHERE P.FK_ID_USUARIO IS NULL
                                )
                        WHERE	IDENTIFICACAO = '".$_SESSION['usuario_id']."'
                        ORDER BY ID DESC";

                $stmt = $pdo->prepare($sql);

                // Executando a consulta
                $stmt->execute();

                // Buscando todos os resultados
                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($posts as $post) {
                    if($post["foto_post"] == ''){
                ?>
                    <!-- Postagem -->
                    <div class="post postTexto">
                        <div class="post-body">
                            <p><?php echo $post["descricao"]; ?></p>
                        </div>
                    </div>
                <?php
                    }}
                ?>
        </div>
    </div>
</body>

<script>
    var voltar = document.getElementById("voltar");
    voltar.addEventListener("click", ()=>{
        window.location.href = "index.html";
    })

    var editar = document.getElementById("editar").addEventListener("click", ()=>{
        window.location.href = "editarperfil.php";
    })

</script>
<!-- Include FontAwesome for search icon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    function mostraPostsFotos(){
        document.getElementById("feed").style.display = "none";
        document.getElementById("post").style.display = "flex";
        document.getElementById("btnfotos").style = "color: #2bac47; border-bottom: 1px solid #2bac47;";
        document.getElementById("btntextos").style = "";
    }
    function mostraPostsTextos(){
        document.getElementById("feed").style.display = "block";
        document.getElementById("post").style.display = "none";
        document.getElementById("btntextos").style = "color: #2bac47; border-bottom: 1px solid #2bac47;";
        document.getElementById("btnfotos").style = " ";
    }
</script>
</html>
