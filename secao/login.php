<?php 
session_start();
require 'usuarios.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['usuario'] ?? '';
    $password = $_POST['senha'] ?? '';

    if (isset($users[$user]) && password_verify($password, $users[$user])) {
        // Credenciais válidas
        $_SESSION['usuario'] = $user;
        header('Location: home.php');
        exit();
    } else {
        // Credenciais inválidas
        $erro = 'Usuário ou senha inválidos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com hash</title>
</head>
<body>
    <h2>Vamos fazer um login, jovem?</h2>
    <p>A senha já tá aí em cima, é só testar!!</p>
    <?php if ($erro): ?>
        <p style="color:red"><?= $erro ?> </p>
    <?php endif; ?>
    
    <form method="post">
        <label for="usuario">Login:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>