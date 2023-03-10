<?php
require('pdo.inc.php');

$user = $_POST['user'];
$password = $_POST['password'];

//Cria a Consulta e aguarda os dados
$sql = $conex->prepare('SELECT * FROM usuarios WHERE username = :usr');

//Adiciona os dados na consulta
$sql->bindParam(':usr', $user);

//Roda a consulta
$sql->execute();


//Login feito com sucesso 
if ($sql->rowCount()) {

    //Login feito com sucesso
    $user = $sql->fetch(PDO::FETCH_OBJ);

    //Verifica se a senha está correta
    if (!password_verify($password, $user->senha)) {

        //Falha no login
        header('location:login.php?erro=1');
        die;
    }

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