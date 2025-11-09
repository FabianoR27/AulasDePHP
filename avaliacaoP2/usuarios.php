<?php 
// senha e hash para o usuário e recuperação de senha
$senhaUser = 'Fatec2025SI';
$senhaFabi = 'fabianoRamos';
$senhaTeste = "teste";
$senhaAdmin = "admin";

$hashUser = password_hash($senhaUser, PASSWORD_DEFAULT);
$hashFabi = password_hash($senhaFabi, PASSWORD_DEFAULT);
$hashTeste = password_hash($senhaTeste, PASSWORD_DEFAULT);
$hashAdmin = password_hash($senhaAdmin, PASSWORD_DEFAULT);

// simulação de banco com hash gerada previamente com password_hash
$login = [
    'marcos.sousa12@fatec.sp.gov.br' => $hashUser,
    'fabianor27@gmail.com' => $hashFabi,
    'teste@teste' => $hashTeste,
    'admin@admin' => $hashAdmin
];
?>