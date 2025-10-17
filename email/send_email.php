<?php 
// AULA 16/10/2025 - Configurando o Composer e Enviando Emails com PHP e PHPMailer

require 'vendor/autoload.php'; // autoload do Composer

use PHPMailer\PHPMailer\PHPMailer; // importa a classe PHPMailer
use PHPMailer\PHPMailer\Exception; // importa a classe Exception

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_destino = $_POST['email_destino'] ?? '';
    $assunto= $_POST['assunto'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';

    $mail = new PHPMailer(true); // cria uma nova instância do PHPMailer

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // servidor SMTP do Gmail
        $mail->Port = 465; // porta SMTP do Gmail (SSL)
        $mail->SMTPSecure = PHPMailer:: ENCRYPTION_SMTPS; // habilita a criptografia TLS (ou SSL)
        $mail->SMTPAuth = true;
        $mail->Username = 'seuemailaqui@email.com'; // endereço de email do gmail
        $mail->Password = 'sua senha de app aqui'; // senha de app do gmail

        // NÃO VOU ENVIAR MEU EMAIL E MINHA SENHA REAL AQUI, OK?

        // Configurações do email
        $mail->setFrom('seuemailaqui@email.com', 'Fabiano Dos Teclados'); // remetente
        $mail->addAddress($email_destino); // destinatário
        $mail->Subject = $assunto; // assunto
        $mail->Body = nl2br($mensagem); // corpo do email // nl2br para converter quebras de linha em <br>
        $mail->isHTML(true); // define o formato do email como HTML
        $mail->AltBody = strip_tags($mensagem); // corpo do email em texto puro para clientes que não suportam HTML
        $mail->CharSet = 'UTF-8'; // define o charset para UTF-8

        $mail->send(); // envia o email
        echo "Email enviado com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao configurar o servidor SMTP: {$mail->ErrorInfo}";
    }
} else {
    echo "Requisição inválida.";
}