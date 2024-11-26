<?php
    session_start();
    include("conexao.php");
    if($_SESSION["usuario_tipo"] == "USUARIO"){
        include("pega_foto_usuario.php");
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
    <link rel="stylesheet" href="css/editar.css">
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
                        <li><a href="perfil.php" style="padding: 0%; width: 105px;" class="active">Perfil</a></li>
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

    <div class="container" style="margin-top: 115px;">
        <header>
            <h1>Editar Perfil</h1>
        </header>
        <main>
<?php
    if($_SESSION["usuario_tipo"] == "USUARIO"){
?>
                <form class="edit-form" action="" method="POST" enctype="multipart/form-data">
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
                        foreach ($usuas as $usua) {
                    ?>
                    <section class="profile-photo">
                        <img src="./img/fotos_usuarios/<?php echo $foto;?>" alt="Foto de perfil">
                        <div class="arquivo">
                            <label class="external" for="file">
                                <div class="cancel">
                                <span>Alterar Foto</span>
                                </div>
                                <input style="display: none;" type="file" id="file" name="file" value="<?php echo $usua["foto"]; ?>">
                            </label>
                        </div>
                    </section>
                    <label for="username">Nome:</label>
                    <input type="text" id="name" name="name" value="" placeholder="<?php echo $usua["nome"]; ?>" disabled>

                    <label for="username">Nome de Usuário:</label>
                    <input type="text" id="username" name="username" value="<?php echo $usua["nome_usuario"]; ?>" placeholder="<?php echo $usua["nome_usuario"]; ?>">

                    <label for="bio">Bio:</label>
                    <textarea id="bio" name="bio" rows="4" placeholder="<?php echo $usua["biografia"]; ?>"><?php echo $usua["biografia"]; ?></textarea>
                    <?php
                    }
                    ?>
                    <div class="button-group">
                        <button type="submit" class="save">Salvar</button>
                        <a href="perfil.php" class="external" title="+templatemo page"><button type="button" class="cancel">Cancelar</button></a>
                    </div>
                </form>
            </main>
        </div>
    </body>
    <?php
        $nomeArquivo = $usua["foto"];
        $diretorio = './img/fotos_usuarios/';
                    
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $arquivoTemp = $_FILES['file']['tmp_name'];
            $nomeArquivo = basename($_FILES['file']['name']);
            $caminhoCompleto = $diretorio . $nomeArquivo;
            // Move o arquivo para o diretório especificado
            move_uploaded_file($arquivoTemp, $caminhoCompleto);
        }

        if(isset($_POST["username"]) && isset($_POST["bio"])){
            $sql = "UPDATE 	USUARIO 
                    SET     NOME_USUARIO = '".$_POST["username"]."',
                            BIOGRAFIA = '".$_POST["bio"]."',
                            FOTO = '".$nomeArquivo."'
                    WHERE   ID = ".$_SESSION["usuario_id"];
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            echo "<script>
            alert('Dados atualizados com sucesso!'); // Mostra o alerta
            window.location.href = 'perfil.php'; // Redireciona após o alerta
            </script>";
        }
    ?>
    <script>
        var voltar = document.getElementById("voltar");
            voltar.addEventListener("click", ()=>{
                window.location.href = "perfil.php";
        })
    </script>
<?php
    }
    else if ($_SESSION["usuario_tipo"] == "EMPRESA") {
?>
                <form class="edit-form" action="" method="POST" enctype="multipart/form-data">
                    <?php
                        $sql = "SELECT	NOME,
                                        EMAIL,
                                        CNPJ,
                                        TELEFONE
                                FROM	EMPRESA
                                WHERE   CNPJ = '".$_SESSION["usuario_cnpj"]."'";

                        $stmt = $pdo->prepare($sql);
                        // Executando a consulta
                        $stmt->execute();
                        // Buscando todos os resultados
                        $empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($empresas as $empresa) {
                    ?>
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" id="cnpj" name="cnpj" value="" placeholder="<?php echo $empresa["cnpj"]; ?>" disabled>

                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo $empresa["nome"]; ?>" placeholder="<?php echo $usua["nome"]; ?>">

                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo $empresa["email"]; ?>" placeholder="<?php echo $usua["email"]; ?>">

                    <label for="tel">Telefone:</label>
                    <input type="text" id="tel" name="tel" rows="4" placeholder="<?php echo $empresa["telefone"]; ?>">
                    <?php
                    }
                    ?>
                    <div class="button-group">
                        <button type="submit" class="save">Salvar</button>
                        <a href="perfilEmpresa.php" class="external" title="+templatemo page"><button type="button" class="cancel">Cancelar</button></a>
                    </div>
                </form>
            </main>
        </div>
    </body>
    <?php
        if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["tel"])){
            $sql = "UPDATE 	EMPRESA 
                    SET     NOME = '".$_POST["nome"]."',
                            TELEFONE = '".$_POST["tel"]."',
                            EMAIL = '".$_POST["email"]."'
                    WHERE   CNPJ = '".$_SESSION["usuario_cnpj"]."'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            echo "<script>
            alert('Dados atualizados com sucesso!'); // Mostra o alerta
            window.location.href = 'perfilEmpresa.php'; // Redireciona após o alerta
            </script>";
        }
    ?>
    <script>
        var voltar = document.getElementById("voltar");
            voltar.addEventListener("click", ()=>{
                window.location.href = "perfilEmpresa.php";
        })
    </script>
<?php
    }
?>
</html>
