<?php
// separei esse trecho de código em um include separado para facilitar a manutenção e reaproveitamento do código

use PHPMailer\PHPMailer\PHPMailer; // importa a classe PHPMailer
use PHPMailer\PHPMailer\Exception; // importa a classe Exception

// Configuração do PHPMailer para envio de email via SMTP do Gmail
try {
    // Configurações do servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // servidor SMTP do Gmail
    $mail->Port = 465; // porta SMTP do Gmail (SSL)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // habilita a criptografia TLS ou SSL
    $mail->SMTPAuth = true;
    $mail->Username = 'ffthewhitcher@gmail.com'; // endereço de email do gmail
    $mail->Password = 'okqd fqrx npkb lkcn'; // senha de app do gmail

    // Configurações do email
    $mail->setFrom('ffthewhitcher@gmail.com', 'NO-REPLY | Sistema do Fabiano'); // remetente
    $mail->addAddress($email_destino); // destinatário
    $mail->Subject = $assunto; // assunto
    $mail->Body = nl2br($mensagem); // corpo do email // nl2br para converter quebras de linha em <br>
    $mail->isHTML(true); // define o formato do email como HTML
    $mail->AltBody = strip_tags($mensagem); // corpo do email em texto puro para clientes que não suportam HTML
    $mail->CharSet = 'UTF-8'; // define o charset para UTF-8

    $mail->send(); // envia o email
} catch (Exception $e) {
    echo "Erro ao configurar o servidor SMTP: {$mail->ErrorInfo}";
}