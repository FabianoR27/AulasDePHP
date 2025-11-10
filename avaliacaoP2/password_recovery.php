<?php

session_start();
require 'usuarios.php';
require 'vendor/autoload.php'; // autoload do Composer

use PHPMailer\PHPMailer\PHPMailer; // importa a classe PHPMailer
// use PHPMailer\PHPMailer\Exception; // importa a classe Exception

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
        // mensagem de sucesso
        $alertaSucesso = "Sucesso! Deve ter chegado um email para <span class=\"fw-semibold\">{$email_destino}</span> com a sua nova senha. Verifique sua caixa de entrada ou spam. Clique em voltar para fazer o login.";

        $mail = new PHPMailer(true); // cria uma nova instância do PHPMailer

        // configurações do servidor SMTP e envio do email nesse include
        include 'components/mailerConfig.php';
    } else {

        // email não cadastrado
        $erro = 'Email não cadastrado no sistema. Por favor, verifique e tente novamente.';
    }
}

include 'components/header.php';
?>


<body class="bg-fabi-1 text-light">
    <div class="d-flex flex-column justify-content-center min-vh-100">
        <main class="container">
            <div class="text-center">
                <h1 class="text-uppercase">Esqueceu a sua senha?</h1>
                <h2 class="text-uppercase">Recupere-a agora mesmo!</h2>
            </div>

            <div class="p-2 caixa-login m-auto align-self-center">
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>