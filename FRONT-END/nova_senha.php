<?php
include("conexao.php");
if(!isset($_GET["id"]) && !isset($_GET["tipo"]) ){
  echo "<script>
                        alert('Erro ao recuperar a senha!'); // Mostra o alerta
                        window.location.href = 'home.php#section4'; // Redireciona após o alerta
                      </script>";
}
else{
  session_start();
  $_SESSION["usuario_id"] = $_GET["id"];
  $_SESSION["tipo"] = $_GET["tipo"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="icon" href="img/eco.png" type="image/png">
	<meta name="ecotech_desenvolvimento" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>EcoTech</title>
	<link rel="icon" href="img/eco.png" type="image/png">
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
                        <div class="search-input">
                            <form id="search" action="#" style="display: flex; align-items: center;">
                              <input type="text" placeholder="Pesquise aqui" id='searchText' name="searchKeyword" onkeypress="handle" />
                              <i class="fa fa-search" id="pesquisar"></i>
                            </form>
                          </div>
                        <!-- ***** Search End ***** -->
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="home.php#feature-area">Publicações</a></li>
                            <li><a href="index.html#section3">Procurar</a></li>
                            <li><a href="home.php#section4">Login</a></li>
                            <li><a href="cadastro.html">Cadastro</a></li>
                            <li> <a href="forum.php">Fórum</a></li>
                            <li> <a href="criarpost.php">Postar</a></li>
                            <li><a href="perfil.php" style="padding: 0%; width: 105px;">Perfil</a></li>
                            <li><a href="perfil.php" style="padding: 0%; width: 105px;"> <img src="img/robertaoperfil.jpg" alt="imagem_perfil"></a></li>
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
   
    <div class="container" style="margin: 90px;">
        <form class="form-control" action="atualiza_senha.php" method="POST"> 
            <p class="title">Recuperar senha</p>    
                <label>
                    <input class="input" type="password" placeholder="" required id="senha" name="senha">
                    <span>Nova senha</span>
                </label>
            
            <label>
                <input class="input" type="password" placeholder=" " required id="confirma_senha" name="confirma_senha">
                <span>Confirme sua nova senha</span>
            </label>
            
            <button id="cadastro" class="submit-btn">Confirmar</button>
          </form>
      
    </div>
   
</body>
<script>
    var voltar = document.getElementById("voltar");
      voltar.addEventListener("click", ()=>{
        window.location.href = "home.php#section4";
    })
  </script>
</html>