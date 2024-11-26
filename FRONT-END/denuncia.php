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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
	<link rel="icon" href="img/eco.png" type="image/png">
	<meta name="ecotech_desenvolvimento" content="width=device-width, initial-scale=1">
    <title>EcoTech</title>
	<link rel="icon" href="img/eco.png" type="image/png">
    <link rel="stylesheet" href="css/denuncia.css">
     <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <div class="search-input" style="width: 300px;">
                    
                        </div>
                        <!-- ***** Search End ***** -->
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="home.php#section3">Procurar</a></li>
							<li> <a href="forum.php">Fórum</a></li>
                            <li> <a href="criarpost.php">Postar</a></li>
                            <li> <a href="denuncia.php" class="active">Denunciar</a></li>
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

    <div class="box" style="margin: 100px;">
        <header>
            <h1>Fazer uma denúncia</h1>
        </header>
        <main>
            <form action="denuncia.php" method="POST" enctype="multipart/form-data">
            <div class="tweet-box" style="margin-left: 5%;margin-right: 5%;">
                <div class="user-info">
                    <textarea placeholder="O que está acontecendo?" id="descricao" name="descricao"></textarea>
                </div>
                <div id="endereco" style="display: flex; padding-bottom: 2%;">
                    <div class="input-group">
                        <input style="width: 343px;" required="" id="rua" name="rua" type="text" name="text" autocomplete="off" class="input">
                        <label class="user-label" >Rua</label>
                    </div>
                    <div class="input-group">
                        <input style="width: 80px; margin-left: 17px;" id="num" name="num" required="" type="text" name="text" autocomplete="off" class="input">
                        <label class="label-num" >Número</label>
                    </div>
                    <div class="input-group">
                        <input style="width: 343px; margin-left: 17px;" required="" id="bairro" name="bairro" type="text" name="text" autocomplete="off" class="input">
                        <label class="label-bai" >Bairro</label>
                    </div>
                </div>
                <div class="tweet-footer" style="margin-left: 0px; display: flex; justify-content: space-between;">
                    <div>
                        <label class="custum-file-upload" for="file">
                            <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
                            </div>
                            <div class="text">
                               <span>Adicionar arquivo</span>
                               </div>
                               <input style="display: none;" type="file" id="file" name="file">
                            </label>
                    </div>
                    
                    <button class="tweet-button" id="denuncia">Denunciar</button>
                </div>
                <div id="image-preview" class="image-preview"></div>
            </div>
            </form>
        </main>
    </div>
    <script>
         var voltar = document.getElementById("voltar");
            voltar.addEventListener("click", ()=>{
                window.location.href = "home.html";
        }) 
        
        //  var isso = document.getElementById('file-input').addEventListener('change', function() {
        //     const file = this.files[0];
        //     if (file) {
        //         const reader = new FileReader();
        //         reader.onload = function(e) {
        //             const img = document.createElement('img');
        //             img.src = e.target.result;
        //             img.className = 'preview-img';
        //             const preview = document.getElementById('image-preview');
        //             preview.innerHTML = ''; // Limpar qualquer imagem anterior
        //             preview.appendChild(img);
        //         }
        //         reader.readAsDataURL(file);
        //     }
        // });
        
        // var denuncia = document.getElementById("denuncia").addEventListener("click", ()=>{
        //    /* Swal.fire({
        //       icon: "error",
        //       title: "Oops...",
        //       text: "Alguma coisa deu errado!"
        //     });*/
        //     Swal.fire({
        //       position: "center",
        //       icon: "success",
        //       title: "Denuncia realizada com sucesso",
        //       showConfirmButton: true,
        //       //timer: 1500
        //     });
        //    // window.location.href = "home.html";
        // })
        
</script>
</body>
    <!-- Include FontAwesome for search icon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <?php
        $diretorio = './img/fotos_denuncia/';
        $nomeArquivo = '';
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $arquivoTemp = $_FILES['file']['tmp_name'];
            $nomeArquivo = basename($_FILES['file']['name']);
            $caminhoCompleto = $diretorio . $nomeArquivo;
            // Move o arquivo para o diretório especificado
            move_uploaded_file($arquivoTemp, $caminhoCompleto);
        }

        if (isset($_POST['descricao'])){
            if($_SESSION["usuario_id"] != ''){
                try {
                    date_default_timezone_set('America/Sao_Paulo');
                    // Preparando a consulta SQL
                    $sql = "INSERT INTO DENUNCIA (  ENDERECO,
                                                    DATA,
                                                    HORA,
                                                    TEXTO, 
                                                    FOTO,
                                                    fk_id_usuario,
                                                    fk_cnpj_empresa
                                                ) 
                                        VALUES (    '".$_POST["rua"].$_POST["num"].$_POST["bairro"]."',
                                                    '".date("Y-m-d")."',
                                                    '".date("H:i:s")."',
                                                    '".$_POST["descricao"]."',
                                                    '".$nomeArquivo."',
                                                    ".$_SESSION["usuario_id"].",
                                                    NULL)";
                    $stmt = $pdo->prepare($sql);
                
                    // Executando a consulta
                    $stmt->execute();
                    echo "<script type='text/javascript'>
                        window.location.href = 'home.php';
                    </script>";
    
                } catch (PDOException $e) {
                    echo "Erro ao cadastrar post: " . $e->getMessage();
                }
            }
            else{
                try {
                    // Preparando a consulta SQL
                    $sql = "INSERT INTO DENUNCIA (  ENDERECO,
                                                    DATA,
                                                    HORA,
                                                    TEXTO, 
                                                    FOTO,
                                                    fk_id_usuario,
                                                    fk_cnpj_empresa
                                                ) 
                                        VALUES (    '".$_POST["rua"].$_POST["num"].$_POST["bairro"]."',
                                                    'data',
                                                    'hora',
                                                    '".$_POST["descricao"]."',
                                                    '".$nomeArquivo."',
                                                    ".$_SESSION["usuario_id"].",
                                                    '".$_SESSION["usuario_cnpj"]."')";
                    echo $sql;
                    $stmt = $pdo->prepare($sql);
                
                    // Executando a consulta
                    $stmt->execute();
                    echo "<script type='text/javascript'>
                        window.location.href = 'forum.php';
                    </script>";
                    
    
                } catch (PDOException $e) {
                    echo "Erro ao cadastrar post: " . $e->getMessage();
                }
            }
            
        }
    ?>
</html>

