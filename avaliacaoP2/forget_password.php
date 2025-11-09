<?php

session_start();
require 'usuarios.php';
require 'vendor/autoload.php'; // autoload do Composer

use PHPMailer\PHPMailer\PHPMailer; // importa a classe PHPMailer
use PHPMailer\PHPMailer\Exception; // importa a classe Exception

$erro = '';
$mensagem = '';
$alertaSucesso = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if (isset($login[$email])) {
        // Configuração para envio do email de recuperação de senha
        $email_destino = $email; // envia para o proprio email solicitado
        $assunto = 'RECUPERAÇÃO DE SENHA';
        $mensagem = "A sua nova senha é \"Fatec2025SI\". Volte ao sistema para realizar o seu login. (e anota essa senha em algum lugar seguro, por favor)";

        $mail = new PHPMailer(true); // cria uma nova instância do PHPMailer

        try {
            // Configurações do servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // servidor SMTP do Gmail
            $mail->Port = 465; // porta SMTP do Gmail (SSL)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // habilita a criptografia TLS ou SSL
            $mail->SMTPAuth = true;
            $mail->Username = 'fabianor27@gmail.com'; // endereço de email do gmail
            $mail->Password = 'mlud vapk rolh ajtc'; // senha de app do gmail

            // Configurações do email
            $mail->setFrom('fabianor27@gmail.com', 'NO-REPLY | Sistema do Fabiano'); // remetente
            $mail->addAddress($email_destino); // destinatário
            $mail->Subject = $assunto; // assunto
            $mail->Body = nl2br($mensagem); // corpo do email // nl2br para converter quebras de linha em <br>
            $mail->isHTML(true); // define o formato do email como HTML
            $mail->AltBody = strip_tags($mensagem); // corpo do email em texto puro para clientes que não suportam HTML
            $mail->CharSet = 'UTF-8'; // define o charset para UTF-8

            $mail->send(); // envia o email

            // mensagem de sucesso
            $alertaSucesso = "Sucesso! Deve ter chegado um email para <span class=\"fw-semibold\">{$email_destino}</span> com a sua nova senha. Verifique sua caixa de entrada ou spam. Clique em voltar para fazer o login.";
        } catch (Exception $e) {
            echo "Erro ao configurar o servidor SMTP: {$mail->ErrorInfo}";
        }
    } else {
        $erro = 'Email não cadastrado no sistema. Por favor, verifique e tente novamente.';
    }
}

include 'components/header.php';
?>


<body class="bg-fabi-1 text-light">

    <main class="container m-auto mt-5">
        <div class="text-center">
            <h1 class="text-uppercase">Esqueceu a sua senha?</h1>
            <h2 class="text-uppercase">Recupere-a agora mesmo!</h2>
        </div>

        <div class="p-2 caixa-login m-auto">
            <form class="p-5 rounded-5 bg-fabi-2 shadow" method="post" aria-label="Recuperação de senha">
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Digite o email cadastrado <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                </div>

                <div class="py-3">
                    <button id="btnEntrar" class="btn btn-warning w-100 mb-3 shadow fw-semibold" type="submit"><i class="bi bi-send-fill"></i> Recuperar senha</button>
                </div>

                <hr class="my-3">

                <div class="text-center">
                    <small class="text-light">
                        Ao clicar em Recuperar Senha, um email será enviado para o endereço fornecido com a sua senha.
                    </small>
                </div>
            </form>
        </div>

        <div class="text-center">
            <a href="login.php" class="btn border border-warning text-light mt-3 mb-5">Voltar</a>
        </div>

        <?php if ($erro): ?>
            <div class="alert alert-dismissible fade show alert-danger mt-5 px-4 rounded-5 shadow" role="alert" data-bs-theme="dark">
                <?= $erro ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Dispensar"></button>
            </div>
        <?php elseif ($mensagem): ?>
            <div class="alert alert-dismissible fade show alert-success mt-5 px-4 rounded-5 shadow" role="alert" data-bs-theme="dark">
                <?= $alertaSucesso ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Dispensar"></button>

            </div>
        <?php endif; ?>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>