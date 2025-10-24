<?php 
$senhaUser = 1234;
$senhaAdmin = 9876;
$hashUser = password_hash($senhaUser, PASSWORD_DEFAULT);
$hashAdmin = password_hash($senhaAdmin, PASSWORD_DEFAULT);

echo "Logins: usuario e admin <br>";
echo "SenhaUsuario: $senhaUser <br>";
echo "SenhaAdmin: $senhaAdmin <br>";
?>