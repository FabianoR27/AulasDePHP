<?php
session_start();
require 'usuarios.php';
require 'vendor/autoload.php'; // autoload do Composer

use PHPMailer\PHPMailer\PHPMailer; // importa a classe PHPMailer
// use PHPMailer\PHPMailer\Exception; // importa a classe Exception

$erro = '';

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_destroy();
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['usuario'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($login[$email]) && password_verify($password, $login[$email])) {
        // Credenciais válidas
        $_SESSION['usuario'] = $user;
        $_SESSION['email'] = $email;

        // Aqui começa o envio do email de confirmação de login
        $mail = new PHPMailer(true); // cria uma nova instância do PHPMailer

        // data e hora atual
        date_default_timezone_set('America/Sao_Paulo'); // Define o fuso horário (sempre antes de usar date())
        $data = date('d/m/Y H:i'); // Formata a data e hora atual
        $email_destino = 'marcos.sousa12@fatec.sp.gov.br'; // envia para este email (pode ser alterado para o email do usuário se desejado)
        $assunto = 'ALERTA DE LOGIN BEM-SUCEDIDO';
        $mensagem = "
            <h2>Confirmação de Login</h2>
            <p>Olá, <strong>{$user}</strong>!</p>
            <p>Um login foi realizado na sua conta em <strong>{$data}</strong>.</p>
            <p>Se foi você, não é necessário fazer nada.</p>
            <p>Se <strong>não</strong> reconhece este acesso, recomendamos alterar sua senha imediatamente.</p>
            <br>
            <p>Atenciosamente,<br>Sistema do Fabi.</p>
        ";

        // configurações do servidor SMTP e envio do email nesse include separado
        include 'components/mailerConfig.php';

        // redireciona para a página home após o login bem-sucedido
        header('Location: home.php');
        exit();
    } else {

        // Credenciais inválidas
        $erro = 'Usuário ou senha inválidos.';
    }
}

include 'components/header.php'
?>


<body class="bg-fabi-1 text-light">

    <main class="container m-auto my-5">
        <div class="text-center my-3">
            <h1 class="text-uppercase fw-semibold">Bem-vindo à Página do Fabiano</h1>
            <h2 class="text-uppercase">Faça seu login</h2>
        </div>

        <div class="p-2 caixa-login m-auto">
            <form class="p-5 rounded-5 bg-fabi-2 shadow-lg" method="POST" aria-label="Faça seu login">
                <div class="mb-3">
                    <label for="inputNome" class="form-label">Usuário <span class="text-danger">*</span></label>
                    <input type="name" class="form-control" id="inputNome" name="usuario" required>
                </div>

                <div class="mb-3">
                    <label for="inputEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="inputSenha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="inputSenha" name="password" required>
                </div>

                <div class="py-3">
                    <button id="btnEntrar" class="btn btn-warning w-100 mb-3 fw-semibold shadow" type="submit"><i class="bi bi-door-open-fill"></i> Entrar</button>
                    <a href="password_recovery.php" id="btnEsqueciSenha" class="btn text-light border-warning w-100 mb-3 shadow">Esqueci minha senha</a>
                </div>

                <small class="fw-light"><span class="text-danger">*</span> Somente o campo usuário pode ser qualquer nome.</small>
                <hr class="my-3">

                <div class="text-center">
                    <small class="text-light">
                        Ao clicar em Entrar, você concorda que pro beta <a href="" class="text-warning">não sobra nada.</a>
                    </small>
                </div>
            </form>

            <?php if ($erro): ?>
                <div class="alert alert-dismissible fade show alert-danger mt-3 px-4 rounded-5" role="alert" data-bs-theme="dark">
                    <?= $erro ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Dispensar"></button>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"></script>

</body>
</html>