<?php
    session_start();
    include("conexao.php"); 
    if(!isset($_SESSION["logado"])){
        $_SESSION["logado"] =  "não";
    } if($_SESSION["logado"] == "sim"){
        if($_SESSION["usuario_tipo"] == "USUARIO"){
            include("pega_foto_usuario.php");
        }
    } 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mapa.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Locais de Coleta</title>
	<link rel="icon" href="img/eco.png" type="image/png">
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
                                if($_SESSION["logado"] == 'não'){
                            ?>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="index.html#section3" class="active">Procurar</a></li>
                                <li><a href="index.html#section4">Login</a></li>
                                <li><a href="cadastro.html">Cadastro</a></li>
                            <?php
                                }
                                else if ($_SESSION["logado"] == 'sim'){
                            ?>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="home.php#section3" class="active">Procurar</a></li>
                                <li><a href="forum.php">Fórum</a></li>                            
                                <li> <a href="criarpost.html">Postar</a></li> 
                                <li> <a href="denuncia.php" >Denunciar</a></li>
                                <?php
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
                                ?>
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
    <div class="container">
        <h1>Locais de Coleta</h1>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/d/embed?mid=1n6hFtC0va9uOsTT6YfCvMj-0fi66Zqc&ehbc=2E312F" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <h2>Endereços de Coleta</h2>
        <?php
            $sql = "SELECT	NOME,
                            LOCALIZACAO,
                            FOTO,
                            DESCRICAO
                    FROM	COLETA WHERE STATUS = 'aprovado'";

            $stmt = $pdo->prepare($sql);

            // Executando a consulta
            $stmt->execute();

            // Buscando todos os resultados
            $locais = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($locais as $local) {
        ?>


        <div class="collection-list">
            <div class="collection-item">
                <img src="./img/fotos_coleta/<?php echo $local["foto"];?>" style="height: 150px; width: 150px;" alt="Local 1">
                <div class="description">
                    <h3><?php echo $local["nome"]; ?></h3>
                    <p>Endereço: <?php echo $local["localizacao"]; ?></p>
                    <p>Descrição: <?php echo $local["descricao"]; ?></p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>
<script>
   function voltarHome(){
        window.location.href = "home.php#section4";
   }
    function voltarIndex(){
        window.location.href = "index.html#section4";
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</html>


