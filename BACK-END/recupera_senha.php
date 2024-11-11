<?php
include('conexao.php'); 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function enviar_email($destinatario, $assunto, $corpo) {
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ecotech.lixo.eletronico@gmail.com';
        $mail->Password = 'npwa fotw jqiv zeoz'; // Senha de aplicativo
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('ecotech.lixo.eletronico@gmail.com', 'EcoTech');
        $mail->addAddress($destinatario);

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8'; 
        $mail->Subject = $assunto;
        $mail->Body = $corpo;
        $mail->send();
        echo "<script>
                alert('E-mail de Recuperação de senha enviado com sucesso!'); // Mostra o alerta
                window.location.href = 'index.html#section4'; // Redireciona após o alerta
              </script>";
    } catch (Exception $e) {
        echo "<script>
                alert('Erro ao enviar o e-mail de recuperação!'); // Mostra o alerta
                window.location.href = 'index.html#section4'; // Redireciona após o alerta
              </script>";
    }
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Verifique se o e-mail do usuário existe
    $stmt = $pdo->prepare(" SELECT 	ID
                            FROM	USUARIO
                            WHERE	EMAIL = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifique se o e-mail da empresa existe
    $stmt = $pdo->prepare(" SELECT 	CNPJ
                            FROM	EMPRESA
                            WHERE	EMAIL = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $coop = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se o usuário existir, passa o ID e o tipo USUARIO
    if ($user) {
        $_SESSION['usuario_id'] = $user["id"];
        enviar_email($email, 'EcoTech - Redefinir Senha', "<head><meta charset='UTF-8'></head><body><div class='container' style='max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);'><h1 style='color: #333;'>Recuperação de Senha</h1><p style='font-size: 16px; color: #555;'>Olá,</p><p style='font-size: 16px; color: #555;'>Recebemos um pedido para redefinir sua senha. Clique no botão abaixo para criar uma nova senha:</p><a href='http://localhost/G2TAMB-ECOTECH/nova_senha.php?id=".$_SESSION['usuario_id']."&tipo=USUARIO' class='btn' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #45a049; color: white; text-decoration: none; border-radius: 5px;'>Redefinir Senha</a><p style='font-size: 16px; color: #555;'>Se você não fez esse pedido, ignore este e-mail.</p><div class='footer' style='margin-top: 20px; font-size: 12px; color: #777;'><p>Obrigado,</p><p>EcoTech!</p></div></div></body>");
    }
    // Se a empresa existir, passa o CNPJ e o tipo EMPRESA
    if ($coop) {
        $_SESSION['empresa_cnpj'] = $coop["cnpj"];
        enviar_email($email, 'EcoTech - Redefinir Senha', "<head><meta charset='UTF-8'></head><body><div class='container' style='max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);'><h1 style='color: #333;'>Recuperação de Senha</h1><p style='font-size: 16px; color: #555;'>Olá,</p><p style='font-size: 16px; color: #555;'>Recebemos um pedido para redefinir sua senha. Clique no botão abaixo para criar uma nova senha:</p><a href='http://localhost/G2TAMB-ECOTECH/nova_senha.php?id=".$_SESSION['empresa_cnpj']."&tipo=EMPRESA'' class='btn' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #45a049; color: white; text-decoration: none; border-radius: 5px;'>Redefinir Senha</a><p style='font-size: 16px; color: #555;'>Se você não fez esse pedido, ignore este e-mail.</p><div class='footer' style='margin-top: 20px; font-size: 12px; color: #777;'><p>Obrigado,</p><p>EcoTech!</p></div></div></body>");
    }
}
?>
