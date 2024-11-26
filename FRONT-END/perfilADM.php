<?php
    session_start();
    include("conexao.php");
?>

<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Administrador</title>
    <link rel="icon" href="img/eco.png" type="image/png">
    <link rel="stylesheet" href="css/perfiladm.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
        <header class="header-area header-sticky">
            <div class="cont">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="home.php" class="logo" style="margin-left: 20px">
                                <img src="img/eco.png" alt="Logo">
                            </a>
                            <!-- ***** Logo End ***** -->
                            
                            <!-- ***** Search Start ***** -->
                            <div class="search-input" style="margin-left: 350px;">
                            </div>
                            <!-- ***** Search End ***** -->
                            <div style="margin-left: 550px; display:flex; justify-content: space-around; width: 190px;">
                                <a href="sair.php"><button class="tchau" id="sair" style="border-radius: 40px; border: 1px solid transparent; background: #7c0101; color: #fff; text-align: center; width: 80px; height:30px;">Sair</button></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div>
                <div>
                    <img src="img/perfil.png" alt="Avatar" class="avatar">
                </div>
                <?php
                    $sql = "SELECT	NOME,
                                    EMAIL
                            FROM	ADMINISTRADOR
                            WHERE   ID = ".$_SESSION["adm_id"];
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    // Buscando todos os resultados
                    $adms = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($adms as $adm){
                ?> 
                <div>
                    <h1>Administrador</h1>
                    <p class="username">@<?php echo $adm['nome'];?></p>
                    <p class="username"><?php  echo $adm['email'];?></p>
                </div>
                <?php
                    }
                ?>
            </div>
            
        
        
        <div class="opcoes">
            <button class= "btns" id="contas" name="contas" onclick="apareceContas()" style = "color: #2bac47; border-bottom: 1px solid #2bac47;">Contas</button>
            <button class= "btns" id="locais" name="locais" onclick="apareceLocais()">Locais</button>
            <button class= "btns" id="denuncia" name="denuncia" onclick="apareceDenuncias()">Denúncias</button>
        </div>

        <section class="lista-contas" id="lista-conta" style="display: block;">
            <h2>Lista de Contas de Usuários</h2>
            <table id="tabela_usuario" style=" width: 100% !important;">
                <thead>
                    <tr>
                        <th style="padding: 17px">ID</th>
                        <th style="padding: 17px">Nome</th>
                        <th style="padding: 17px">Nome de Usuario</th>
                        <th style="padding: 17px">Email</th>
                        <th style="padding: 17px">Telefone</th>
                        <th style="padding: 17px">Data Nascimento</th>
                        <th style="padding: 17px"> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT	*
                                FROM	USUARIO ";

                        $stmt = $pdo->prepare($sql);

                        // Executando a consulta
                        $stmt->execute();

                        // Buscando todos os resultados
                        $contas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($contas as $conta){
                    ?>
                    <tr>
                        <form id="form-usuario-<?php echo $conta["id"]; ?>">
                        <input type="text" id="tipo" name="tipo" value="editar" hidden>
                        <input type="text" id="conta" name="conta" value="usuario" hidden>
                        <td style="padding: 17px"><input class="editar_input" id="id-<?php echo $conta["id"]; ?>"               type="text"     value="<?php echo $conta["id"]; ?>" disable style="width:30px;"></td>
                        <td style="padding: 17px"><input class="editar_input" id="nome-<?php echo $conta["id"]; ?>"             type="text"     value="<?php echo $conta["nome"]; ?>"></td>
                        <td style="padding: 17px"><input class="editar_input" id="nome_usuario-<?php echo $conta["id"]; ?>"     type="text"     value="<?php echo $conta["nome_usuario"]; ?>"></td>
                        <td style="padding: 17px"><input class="editar_input" id="email-<?php echo $conta["id"]; ?>"            type="email"    value="<?php echo $conta["email"]; ?>"></td>
                        <td style="padding: 17px"><input class="editar_input" id="telefone-<?php echo $conta["id"]; ?>"         type="text"     value="<?php echo $conta["telefone"]; ?>"></td>
                        <td style="padding: 17px"><input class="editar_input" id="data_nascimento-<?php echo $conta["id"]; ?>"  type="date"     value="<?php echo $conta["data_nascimento"]; ?>"></td>
                        <td style="display: flex; padding: 17px">
                            <button class="Btn" onClick="apagaEdita(<?php echo $conta["id"]; ?>,'editar','usuario')"> 
                                <svg class="svgIcon" viewBox="0 0 512 512">
                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                    </path>
                                </svg>
                            </button>
                            <button class="button" onClick="apagaEdita(<?php echo $conta['id'];?>,'apaga','usuario')">
                                <svg viewBox="0 0 448 512" class="svgIcon">
                                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                    </path>
                                </svg>
                            </button>
                            
                        </td>
                        </form>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>

        <section class="lista-contas" id="lista-conta-empresas" style="display: block;">
            <h2>Lista de Contas de Empresa</h2>
            <table style=" width: 100% !important;">
                <thead>
                    <tr>
                        <th style="padding: 17px">CNPJ</th>
                        <th style="padding: 17px">Nome</th>
                        <th style="padding: 17px">E-mail</th>
                        <th style="padding: 17px">Data de Inauguração</th>
                        <th style="padding: 17px">Telefone</th>
                        <th style="padding: 17px"> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = 
                        $sql = "SELECT	*
                                FROM	EMPRESA ";

                        $stmt = $pdo->prepare($sql);

                        // Executando a consulta
                        $stmt->execute();

                        // Buscando todos os resultados
                        $contas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($contas as $conta){
                    ?>
                    <tr>
                        <td style="padding: 17px"><input class="editar_input" id="cnpj-<?php echo $conta["cnpj"]; ?>"           type="text"     value="<?php echo $conta["cnpj"];?>"></td>
                        <td style="padding: 17px"><input class="editar_input" id="nomeEmpresa-<?php echo $conta["cnpj"]; ?>"      type="text"     value="<?php echo $conta["nome"]; ?>"></td>
                        <td style="padding: 17px"><input class="editar_input" id="emailEmpresa-<?php echo $conta["cnpj"]; ?>"     type="email"    value="<?php echo $conta["email"]; ?>"></td>
                        <td style="padding: 17px"><input class="editar_input" id="data_inauguracao-<?php echo $conta["cnpj"]; ?>" type="date"     value="<?php echo $conta["data_inauguracao"]; ?>"></td>
                        <td style="padding: 17px"><input class="editar_input" id="telefoneEmpresa-<?php echo $conta["cnpj"]; ?>"  type="text"     value="<?php echo $conta["telefone"]; ?>"></td>
                        <td style="display: flex; padding: 17px">
                            <button class="button" id="apaga" name="apaga" onclick="apagaEdita(<?php echo $conta['cnpj']; ?>,'apaga','empresa')">
                            <svg viewBox="0 0 448 512" class="svgIcon">
                                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                </path>
                            </svg>
                            </button>
                            <button class="Btn" id="editar" name="editar" onclick="apagaEdita(<?php echo $conta['cnpj']; ?>,'editar','empresa')"> 
                                <svg class="svgIcon" viewBox="0 0 512 512">
                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                    </path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>

        <section class="locais-coleta" id="lista-locais" style="display: none;">
            <h2>LOCAIS DE COLETA</h2>
            <table style=" width: 100% !important;">
                <thead style="text-align: center;" >
                    <tr>
                        <th style="padding: 17px">Nome</th>
                        <th style="padding: 17px">Endereço</th>
                        <th style="padding: 17px">Descrição</th>
                        <th style="padding: 17px"> </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT	ID,
                                    NOME,
                                    LOCALIZACAO,
                                    DESCRICAO,
                                    STATUS
                            FROM	COLETA ";

                    $stmt = $pdo->prepare($sql);

                    // Executando a consulta
                    $stmt->execute();

                    // Buscando todos os resultados
                    $locais = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($locais as $local){
                ?>
                    <tr>
                        <td><?php echo $local["nome"]; ?></td>
                        <td><?php echo $local["localizacao"]; ?></td>
                        <td><?php echo $local["descricao"]; ?></td>
                        <?php
                            if($local["status"] == "solicitado"){
                        ?>
                        <td>
                            <div style="display: flex;">                   
                                <button class="apv" name= "aprovado" id="aprovado" onclick="AprovaReprova(<?php echo $local['id']; ?>,'aprova')">Aprovar</button>
                                <button class="rpv" name= "reprovado" id="reprovado" onclick="AprovaReprova(<?php echo $local['id']; ?>,'reprova')">Reprovar</button>
                            </div>
                        </td>
                        <?php
                            }
                        ?>
                        <?php
                            if($local["status"] == "aprovado"){
                        ?>
                        <td>
                            <div style="display: flex;">                   
                                <button class="apv apv_fundo" name= "aprovado" id="aprovado" onclick="AprovaReprova(<?php echo $local['id']; ?>,'aprova')">Aprovado</button>
                                <button class="rpv" name= "reprovado" id="reprovado" onclick="AprovaReprova(<?php echo $local['id']; ?>,'reprova')">Reprovar</button>
                            </div>
                        </td>
                        <?php
                            }
                        ?>
                        <?php
                            if($local["status"] == "reprovado"){
                        ?>
                        <td>
                            <div style="display: flex;">                   
                                <button class="apv" name= "aprovado" id="aprovado" onclick="AprovaReprova(<?php echo $local['id']; ?>,'aprova')">Aprovar</button>
                                <button class="rpv rpv_fundo" name= "reprovado" id="reprovado" onclick="AprovaReprova(<?php echo $local['id']; ?>,'reprova')">Reprovado</button>
                            </div>
                        </td>
                        <?php
                            }
                        ?>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>

        <section class="locais-denuncia" id="lista-denuncias" style="display: none;">
            <h2>LOCAIS DE DENÚNCIAS</h2>
            <table style=" width: 100% !important;">
                <thead style="text-align: center;" >
                    <tr>
                        <th style="padding: 17px">Data</th>
                        <th style="padding: 17px">Hora</th>
                        <th style="padding: 17px">Endereço</th>
                        <th style="padding: 17px">Descrição</th>
                        <th style="padding: 17px"> </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT	*
                            FROM	DENUNCIA ";

                    $stmt = $pdo->prepare($sql);

                    // Executando a consulta
                    $stmt->execute();

                    // Buscando todos os resultados
                    $denuncias = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($denuncias as $denuncia){
                ?>
                    <tr>
                        <td><?php echo $denuncia["data"]; ?></td>
                        <td><?php echo $denuncia["hora"]; ?></td>
                        <td><?php echo $denuncia["endereco"]; ?></td>
                        <td><?php echo $denuncia["texto"]; ?></td>
                        <?php
                           // if($local["status"] == "solicitado"){
                        ?>
                        <td>
                            <div style="display: flex;">                   
                                <!-- <button class="apv" name= "aprovado" id="aprovado" onclick="AprovaReprova(<?php echo $denuncia['id']; ?>,'aprova')">Aprovar</button> -->
                                <button class="rpv" name= "reprovado" id="reprovado" onclick="Apaga(<?php echo $denuncia['id']; ?>)">Apagar</button>
                            </div>
                        </td>
                        <?php
                           // }
                        ?>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
<script>
    function AprovaReprova(idLocal, tipo){
        // Impede o comportamento padrão do formulário
        event.preventDefault();

        // Cria um formulário dinamicamente
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "atualiza_status_coleta.php";  // Enviar para o arquivo PHP

        // id
        var idInput = document.createElement("input");
        idInput.type = "hidden";
        idInput.name = "idLocal";
        idInput.value = idLocal;
        form.appendChild(idInput);

        // tipo - aprovado
        var tipoInput = document.createElement("input");
        tipoInput.type = "hidden";
        tipoInput.name = "tipo";
        tipoInput.value = tipo;
        form.appendChild(tipoInput);

        // Adiciona o formulário ao body e envia
        document.body.appendChild(form);
        form.submit();
    }

    function apagaEdita(id, tipo, conta) {
        event.preventDefault();
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "atualiza_dados_usuarios.php";

        // id
        var idInput = document.createElement("input");
        idInput.type = "hidden";
        idInput.name = "id";
        idInput.value = id;
        form.appendChild(idInput);

        // tipo - aprovado
        var tipoInput = document.createElement("input");
        tipoInput.type = "hidden";
        tipoInput.name = "tipo";
        tipoInput.value = tipo;
        form.appendChild(tipoInput);

        // conta - empresa e conta
        var contaInput = document.createElement("input");
        contaInput.type = "hidden";
        contaInput.name = "conta";
        contaInput.value = conta;
        form.appendChild(contaInput);

        if(conta == "usuario"){
            // nome
            var nomeInput = document.createElement("input");
            nomeInput.type = "hidden";
            nomeInput.name = "nome";
            nomeInput.value = document.getElementById('nome-'+id).value;
            form.appendChild(nomeInput);

            // nome usuario
            var nome_usuarioInput = document.createElement("input");
            nome_usuarioInput.type = "hidden";
            nome_usuarioInput.name = "nome_usuario";
            nome_usuarioInput.value = document.getElementById('nome_usuario-'+id).value;
            form.appendChild(nome_usuarioInput);
            

            // email
            var emailInput = document.createElement("input");
            emailInput.type = "hidden";
            emailInput.name = "email";
            emailInput.value = document.getElementById('email-'+id).value;
            form.appendChild(emailInput);

            // telefone
            var telefoneInput = document.createElement("input");
            telefoneInput.type = "hidden";
            telefoneInput.name = "telefone";
            telefoneInput.value = document.getElementById('telefone-'+id).value;
            form.appendChild(telefoneInput);

            // data nascimento
            var data_nascimentoInput = document.createElement("input");
            data_nascimentoInput.type = "hidden";
            data_nascimentoInput.name = "data_nascimento";
            data_nascimentoInput.value = document.getElementById('data_nascimento-'+id).value;
            form.appendChild(data_nascimentoInput);
        }
        else if(conta == "empresa"){
            // nome Empresa 
            var nomeEmpresaInput = document.createElement("input");
            nomeEmpresaInput.type = "hidden";
            nomeEmpresaInput.name = "nomeEmpresa";
            nomeEmpresaInput.value = document.getElementById('nomeEmpresa-'+id).value;
            form.appendChild(nomeEmpresaInput);

            // email EMPRESA
            var emailEmpresaInput = document.createElement("input");
            emailEmpresaInput.type = "hidden";
            emailEmpresaInput.name = "emailEmpresa";
            emailEmpresaInput.value = document.getElementById('emailEmpresa-'+id).value;
            form.appendChild(emailEmpresaInput);

            // telefone EMPRESA 
            var telefoneEmpresaInput = document.createElement("input");
            telefoneEmpresaInput.type = "hidden";
            telefoneEmpresaInput.name = "telefoneEmpresa";
            telefoneEmpresaInput.value = document.getElementById('telefoneEmpresa-'+id).value;
            form.appendChild(telefoneEmpresaInput);

            // data inauguracao
            var data_inauguracaoInput = document.createElement("input");
            data_inauguracaoInput.type = "hidden";
            data_inauguracaoInput.name = "data_inauguracao";
            data_inauguracaoInput.value = document.getElementById('data_inauguracao-'+id).value;
            form.appendChild(data_inauguracaoInput);
        }
        else{
            alert("Tipo de conta inválido");
        }
        // Adiciona o formulário ao body e envia
        document.body.appendChild(form);
        form.submit();
    }

    function Apaga(id) {
        event.preventDefault();
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "apaga-denuncia.php";

        // id
        var idInput = document.createElement("input");
        idInput.type = "hidden";
        idInput.name = "id";
        idInput.value = id;
        form.appendChild(idInput);

        document.body.appendChild(form);
        form.submit();
    }

    var locais = document.getElementById("lista-locais");
    var contas = document.getElementById("lista-conta");
    var contas_empresas = document.getElementById("lista-conta-empresas");
    var btnLocal = document.getElementById("locais");
    var btnConta = document.getElementById("contas");
    var btnDenun = document.getElementById("denuncia");
    var denuncias = document.getElementById("lista-denuncias");

    function apareceLocais() {
        contas.style = "display: none";
        contas_empresas.style = "display: none";
        locais.style = "display: block";
        btnLocal.style = "color: #2bac47; border-bottom: 1px solid #2bac47;"
        btnConta.style = "";
        btnDenun.style = "";
        denuncias.style = "display: none";
    }
    function apareceContas() {
        locais.style = "display: none";
        contas.style = "display: block";
        denuncias.style = "display: none";
        contas_empresas.style = "display: block";
        btnConta.style = "color: #2bac47; border-bottom: 1px solid #2bac47;";
        btnLocal.style = "";
        btnDenun.style = "";
    }
    function apareceDenuncias() {
        locais.style = "display: none";
        contas.style = "display: none";
        contas_empresas.style = "display: none";
        denuncias.style = "display: block";
        btnDenun.style = "color: #2bac47; border-bottom: 1px solid #2bac47;";
        btnLocal.style = "";
        btnConta.style = "";
    }
</script>
</html>
