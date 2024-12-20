<?php
    session_start();
    include("conexao.php");
	if($_SESSION["usuario_tipo"] == "USUARIO"){
		include("pega_foto_usuario.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EcoTech</title>
	<link rel="icon" href="img/eco.png" type="image/png">
	<meta name="ecotech_desenvolvimento" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>

	<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="home.php" class="logo">
                            <img src="img/eco.png" alt="Logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Search Start ***** -->
						<div class="search-input" style="width: 350px">     
                        </div>
                        <!-- ***** Search End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="home.php" class="active">Home</a></li>
                            <li><a href="#section3">Procurar</a></li>
							<li> <a href="forum.php">Fórum</a></li>							
                            <li> <a href="criarpost.php">Postar</a></li>							
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
    <!-- ***** Header Area End ***** -->

	<div id="section2">
		<section id="blog-area">
			<div class="container">
				<div class="row text-center inner">
					<div class="col-sm-6">
						<div class="blog-content">
							<img src="img/fundo.jpg" alt="Image" style="width: 35%; height: 30%; margin: 15px; border-radius: 50%;">
							<p style="text-align: justify;"> O crescente volume de resíduos produzidos por consumidores e empresas levanta preocupações significativas sobre o impacto do descarte imprório do material na natureza.
								Com isso, nossa empresa visa transformar a forma como a coleta de resíduos eletrônicos é realizada em Tambaú-SP e região, a transformando em algo acessível para todos os cidadãos.
								Para atingir esse objetivo, nosso site contará com aplicativos que serão ferramentas fundamentais para conectar os moradores da cidade com serviços de coleta de lixo eletrônico.
								O projeto visa também promover uma conscientização mais profunda sobre a importância do descarte responsável de eletrônicos.
							</p>
								<br>

							</div>
						</div>
						
						</div>
					</div>
				</section>
			</div>
			<div id="section3">
				<!-- Start Services Area -->
				<section id="services-area" class="services-section">
					
					</section>
					<!-- End Services Area -->

					<!-- Start Testimornial Area -->
					<section id="testimornial-area">
						<div class="container">
							<div class="row text-center">
								
							
							
								<div class="row">
									<div class="col-lg-12">
										<div class="tm-box">
											<!--<img src="img/4-5.jpg" alt="Image" class="img-responsive">-->
											<iframe src="https://www.google.com/maps/d/embed?mid=1n6hFtC0va9uOsTT6YfCvMj-0fi66Zqc&ehbc=2E312F" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
											<div class="tm-box-description">
												<h2>LOCALIZE AQUI!</h2>
												<p class="tm-box-p">Aqui estão os lugares disponíveis para o descarte de lixos eletrônicos. </p>
												
												<a href="mapa.php"><button class="vermais">Ver mais</button></a>
	
										
												   
											</div>                        
										</div>                    
									</div>
								</div>
						</div>
					</section>
					<!-- End Testimornial Area -->
				</div>
				<div id="section4">
					<!-- Start Contact Area -->
					<section id="contact-area" class="contact-section">
						<div class="container">
							<div class="row">
								<!-- Formulário Original -->
								<!-- <div class="col-lg-6">	 
									<form class="form" action="login.php" method="POST">
										<h4 style="text-align: center;">LOGIN</h4>
									    <div class="flex-column">
									      <label>Email </label></div>
									      <div class="inputForm">
									        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
									        <input id="email" name="email" type="text" class="input" placeholder="Coloque seu email">
									      </div>
									  
									    <div class="flex-column">
									      <label>Senha </label></div>
									      <div class="inputForm">
									        <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
									        <input id="senha" name="senha"  type="password" class="input" placeholder="Coloque sua senha">
									        <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg>
									      </div>
									  
									    <div class="flex-row">
									      <div>
									      <input type="checkbox">
									      <label>Lembre de mim </label>
									      </div>
									      <a href="rec_senha.html">Recuperar senha</a>
									    </div>
									    <button class="button-submit">Entrar</button>
									    <p class="p">Não tem uma conta? <a href="cadastro.html">Cadastrar-se</a>
										
									    <form>
								</div> -->
							</div>
						</div>
					</section>
					<!-- End Contact Area -->
				</div>

					<!-- Start Footer Area -->
					
						<!-- End Footer Area -->

						<script src="js/jquery-1.11.2.min.js"></script>
						<script src="js/jquery.scrollUp.min.js"></script> <!-- https://github.com/markgoodyear/scrollup -->
						<script src="js/jquery.singlePageNav.min.js"></script> <!-- https://github.com/ChrisWojcik/single-page-nav -->
						<script src="js/parallax.js-1.3.1/parallax.js"></script> <!-- http://pixelcog.github.io/parallax.js/ -->
						<script>

    // HTML document is loaded. DOM is ready.
    $(function() {  

    // Parallax
        $('.intro-section').parallax({
        	imageSrc: 'img/fundo.jpg',
        	speed: 0.2
        });
        $('.services-section').parallax({
        	imageSrc: 'img/bg-2.jpg',
        	speed: 0.2
    	});
        $('.contact-section').parallax({
        	imageSrc: 'img/bg-3.jpg',
        	speed: 0.2
        });    

        // jQuery Scroll Up / Back To Top Image
        $.scrollUp({
                scrollName: 'scrollUp',      // Element ID
		        scrollDistance: 300,         // Distance from top/bottom before showing element (px)
		        scrollFrom: 'top',           // 'top' or 'bottom'
		        scrollSpeed: 1000,            // Speed back to top (ms)
		        easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
		        animation: 'fade',           // Fade, slide, none
		        animationSpeed: 300,         // Animation speed (ms)		        
		        scrollText: '', // Text for element, can contain HTML		        
		        scrollImg: true            // Set true to use image		        
            });

        // ScrollUp Placement
        $( window ).on( 'scroll', function() {

            // If the height of the document less the height of the document is the same as the
            // distance the window has scrolled from the top...
            if ( $( document ).height() - $( window ).height() === $( window ).scrollTop() ) {

                // Adjust the scrollUp image so that it's a few pixels above the footer
                $('#scrollUp').css( 'bottom', '80px' );

            } else {      
                // Otherwise, leave set it to its default value.
                $('#scrollUp').css( 'bottom', '30px' );        
            }
        });

        $('.single-page-nav').singlePageNav({
        	offset: $('.single-page-nav').outerHeight(),
        	speed: 1500,
        	filter: ':not(.external)',
        	updateHash: true
        });

        $('.navbar-toggle').click(function(){
        	$('.single-page-nav').toggleClass('show');
        });

        $('.single-page-nav a').click(function(){
        	$('.single-page-nav').removeClass('show');
        });
        
    });
</script>

<!-- Include FontAwesome for search icon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>