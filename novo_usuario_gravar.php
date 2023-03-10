<?php
require('pdo.inc.php');

$user = $_POST['user'] ?? false;
$pass = $_POST['pass'] ?? false;
$email = $_POST['email'] ?? false;
$nome = $_POST['nome'] ?? false;
$admin = $_POST['admin'] ?? false;



if(!$user || !$pass || !$email || !$nome){
    header('location:novo_usuario.php');
    die;
}

$password = password_hash($pass, PASSWORD_BCRYPT);

$sql = $conex->prepare('INSERT INTO usuarios (nome, email, username, senha, admin) VALUES (:user, :pass, :nome, :email, :admin)');

$sql->bindParam(':user', $user);
$sql->bindParam(':pass', $pass);
$sql->bindParam(':email', $email);
$sql->bindParam(':nome', $nome);
$sql->bindParam(':admin', $admin);


$sql->execute();

?>
