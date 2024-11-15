<?php
    session_start();
    include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mapa.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Locais de Coleta</title>
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
                            <li><a href="reciclagem.html">Coleta</a></li>
							<li> <a class="active">Fórum</a></li>                            
                            <li> <a href="criarpost.html">Postar</a></li>
							<li><a href="perfil.php" style="padding: 0%; width: 105px;">Perfil <img src="img/robertaoperfil.jpg" alt="imagem_perfil"></a></li>
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
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d59176.85005892753!2d-47.92540211364653!3d-22.02842704978872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1slugares%20que%20coletam%20lixo%20eletronico%20sao%20carlos!5e0!3m2!1spt-BR!2sbr!4v1723558770953!5m2!1spt-BR!2sbr"width="600"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
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
    var voltar = document.getElementById("voltar");
      voltar.addEventListener("click", ()=>{
        window.location.href = "index.html#section4";
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</html>


