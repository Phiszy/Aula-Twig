<?php
require('pdo.inc.php');

$user = $_POST['user'];
$password = $_POST['password'];

//Cria a Consulta e aguarda os dados
$sql = $conex->prepare('SELECT * FROM usuarios WHERE username = :usr AND senha = :pass');

//Adiciona os dados na consulta
$sql->bindParam(':usr', $user);
$sql->bindParam(':pass', $password);

//Roda a consulta
$sql->execute();


//Login feito com sucesso 
if ($sql->rowCount()) {

    $user = $sql->fetch(PDO::FETCH_OBJ);

    //Cria uma sessão para armazenar o usuário
    session_start();
    $_SESSION['user'] = $user->nome;

    //Redireciona o usuário
    header('location:boasvindas.php');
    die;

} else {
    //Falha no login
    header('location:login.php?erro=1');
    die;
}

?>