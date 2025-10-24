<?php 
// incluí a hash.php para puxar as senhas hasheadas.
include 'hash.php';
// simulação de banco  com hash gerada previamente com password_hash
$users = [
    'usuario' => $hashUser,
    'admin' => $hashAdmin
];
?>