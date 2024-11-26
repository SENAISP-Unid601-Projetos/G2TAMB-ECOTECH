<?php
    session_start();
    include("conexao.php");
    if(!isset($_SESSION["logado"])){
        $_SESSION["logado"] =  "não";
    }
    if($_SESSION["logado"] == "sim"){
        if($_SESSION["usuario_tipo"] == "USUARIO"){
            include("pega_foto_usuario.php");
        }
    }

    if(!isset($_POST["id"]) && !isset($_POST["tipo"])){
        echo "<script>
                    alert('É necessário fazer login!'); // Mostra o alerta
                    window.location.href = 'index.html'; // Redireciona após o alerta
                </script>";
    }
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<link rel="icon" href="img/eco.png" type="image/png">
	<meta name="ecotech_desenvolvimento" content="width=device-width, initial-scale=1">
    <title>EcoTech</title>
	<link rel="icon" href="img/eco.png" type="image/png">
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
                        <a href="home.php" class="logo">
                            <img src="img/eco.png" alt="Logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Search Start ***** -->
                        <div class="search-input" style="width: 200px">     
                        </div>
                        <!-- ***** Search End ***** -->
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="home.php#section3">Procurar</a></li>
							<li> <a href="forum.php">Fórum</a></li>
                            <li> <a href="criarpost.php">Postar</a></li>                            
                            <li> <a href="denuncia.php" >Denunciar</a></li>
							<li><a href="perfil.php" style="padding: 0%; width: 105px;">Perfil</a></li>
                            <?php
                                if($_SESSION["usuario_tipo"] == "USUARIO"){
                            ?>
                                <li><img src="./img/fotos_usuarios/<?php echo $foto;?>" alt="imagem_perfil"></a></li>
                            <?php
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


    <div class="profile-container" style="margin-top: 90px;">
         <!-- Header do perfil -->
        <div class="profile-header">
            <?php
                $sql = "SELECT	ID,
                                NOME,
                                NOME_USUARIO,
                                FOTO,
                                BIOGRAFIA
                        FROM	(
                                    SELECT	CAST(ID AS VARCHAR) AS ID,
                                            NOME,
                                            NOME_USUARIO,
                                            FOTO,
                                            BIOGRAFIA
                                    FROM	USUARIO
                                    UNION
                                    SELECT	CNPJ,
                                            NOME,
                                            EMAIL,
                                            NULL,
                                            CONCAT('TELEFONE: ',TELEFONE) AS BIOGRAFIA
                                    FROM	EMPRESA
                        )
                        WHERE	ID = '".$_POST["id"]."'";
                $stmt = $pdo->prepare($sql);

                // Executando a consulta
                $stmt->execute();

                // Buscando todos os resultados
                $usuas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $sql = "SELECT  COUNT(*) QTD
                        FROM    POST 
                        WHERE   FK_ID_USUARIO = ".$_POST["id"]."
                        OR      FK_CNPJ_EMPRESA = '".$_POST["id"]."'"; 

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
            <div class="profile-picture-container">
            <?php
            if($_POST["tipo"] == "USUA"){
            ?>
            <img src="./img/fotos_usuarios/<?php echo $usua["foto"];?>" alt="Foto de perfil" class="profile-picture">
            <?php
            }
            ?>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div class="profile-info">
                    <h2 class="username"><?php echo $usua["nome"]; ?></h2>
                    <p class="bio"><?php echo $usua["nome_usuario"]; ?></p>
                    
                    <div class="stats">
                        <div class="stat"><strong><?php echo $qtd_posts; ?></strong> postagens</div>
                    </div>
                    <p class="bio"><?php echo $usua["biografia"]; ?></p>

                </div>
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
                        WHERE	IDENTIFICACAO = '".$_POST["id"]."'
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
                                <img style="border-radius:15px;" src="./img/fotos_post/<?php echo $post["foto_post"]; ?>" alt="Postagem">
                                <p class="pLimitado"><?php echo $post["descricao"]; ?></p>
                                <?php
                            }
                        ?>
                    </div>

                <?php
                }
                ?>
        </div>
        <div class="feed" id="feed" style="display: none">
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
                        WHERE	IDENTIFICACAO = '".$_POST["id"]."'
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
        window.location.href = "forum.php";
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