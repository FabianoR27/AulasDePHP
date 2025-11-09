<?php 
// senha e hash para o usuário de recuperação de senha
$senhaUser = 'Fatec2025SI';
$hashUser = password_hash($senhaUser, PASSWORD_DEFAULT);

// simulação de banco com hash gerada previamente com password_hash
$login = [
    'marcos.sousa12@fatec.sp.gov.br' => $hashUser
];
?>